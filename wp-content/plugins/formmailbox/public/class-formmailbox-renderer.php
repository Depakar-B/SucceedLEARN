<?php
/**
 * Frontend rendering and submission handling.
 *
 * @package FormMailbox
 */

defined( 'ABSPATH' ) || exit;

/** Renders forms and processes public submissions. */
final class FormMailbox_Renderer {
	/** @var FormMailbox_Repository */
	private $repository;

	/** @param FormMailbox_Repository $repository Repository. */
	public function __construct( FormMailbox_Repository $repository ) {
		$this->repository = $repository;
	}

	/** @return void */
	public function register_hooks() {
		add_shortcode( 'formmailbox', array( $this, 'shortcode' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
		add_action( 'admin_post_nopriv_formmailbox_submit', array( $this, 'process_submission' ) );
		add_action( 'admin_post_formmailbox_submit', array( $this, 'process_submission' ) );
	}

	/** @return void */
	public function register_assets() {
		wp_register_style( 'formmailbox', FORMMAILBOX_URL . 'public/css/formmailbox.css', array(), FORMMAILBOX_VERSION );
	}

	/**
	 * Shortcode callback.
	 *
	 * @param array $attributes Shortcode attributes.
	 * @return string
	 */
	public function shortcode( $attributes ) {
		$attributes = shortcode_atts( array( 'id' => 0, 'class' => '', 'show_title' => 'no' ), $attributes, 'formmailbox' );
		$form       = $this->repository->get_form( absint( $attributes['id'] ) );
		if ( ! $form || 'published' !== $form->status ) {
			return current_user_can( 'manage_options' ) ? '<p class="fmbx-form-notice">' . esc_html__( 'This form is unavailable or still in draft.', 'formmailbox' ) . '</p>' : '';
		}

		wp_enqueue_style( 'formmailbox' );
		$fields   = $this->repository->decode_json( $form->schema_json );
		$settings = wp_parse_args( $this->repository->decode_json( $form->settings_json ), FormMailbox_Templates::default_settings() );
		if ( 'recaptcha_v2' === $settings['captcha_provider'] && ! empty( $settings['recaptcha_site_key'] ) ) {
			wp_enqueue_script( 'google-recaptcha', 'https://www.google.com/recaptcha/api.js', array(), null, true );
		}
		$instance = wp_unique_id( 'fmbx-' . absint( $form->id ) . '-' );
		$message  = isset( $_GET['fmbx_status'] ) ? sanitize_key( wp_unslash( $_GET['fmbx_status'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		ob_start();
		?>
		<div class="fmbx-form-wrap <?php echo esc_attr( sanitize_html_class( $attributes['class'] ) ); ?>">
			<?php if ( 'yes' === $attributes['show_title'] ) : ?>
				<h2 class="fmbx-form-title"><?php echo esc_html( $form->name ); ?></h2>
			<?php endif; ?>
			<?php if ( 'success' === $message ) : ?>
				<div class="fmbx-alert fmbx-alert--success" role="status"><?php echo esc_html( $settings['success_message'] ); ?></div>
			<?php elseif ( 'error' === $message ) : ?>
				<div class="fmbx-alert fmbx-alert--error" role="alert"><?php echo esc_html__( 'Please check the form and try again.', 'formmailbox' ); ?></div>
			<?php endif; ?>
			<form id="<?php echo esc_attr( $instance ); ?>" class="fmbx-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="formmailbox_submit">
				<input type="hidden" name="form_id" value="<?php echo esc_attr( $form->id ); ?>">
				<input type="hidden" name="source_post_id" value="<?php echo esc_attr( get_queried_object_id() ); ?>">
				<input type="hidden" name="source_url" value="<?php echo esc_url( self::current_url() ); ?>">
				<input type="hidden" name="started_at" value="<?php echo esc_attr( time() ); ?>">
				<?php wp_nonce_field( 'formmailbox_submit_' . absint( $form->id ), 'formmailbox_nonce' ); ?>
				<div class="fmbx-honeypot" aria-hidden="true">
					<label>Website<input type="text" name="company_website" value="" tabindex="-1" autocomplete="off"></label>
				</div>
				<?php foreach ( $fields as $field ) : ?>
					<?php $this->render_field( $field, $instance ); ?>
				<?php endforeach; ?>
				<?php $this->render_captcha( $settings, $instance ); ?>
				<button type="submit" class="fmbx-submit"><?php echo esc_html__( 'Submit', 'formmailbox' ); ?></button>
			</form>
		</div>
		<?php
		return (string) ob_get_clean();
	}

	/** @param array $settings Form settings. @param string $instance Unique form instance. @return void */
	private function render_captcha( array $settings, $instance ) {
		if ( 'math' === $settings['captcha_provider'] ) {
			$first = wp_rand( 1, 9 ); $second = wp_rand( 1, 9 );
			$token = $first . '|' . $second; $signature = hash_hmac( 'sha256', $token, wp_salt( 'nonce' ) );
			$math_id = $instance . '-math';
			?><div class="fmbx-field"><label for="<?php echo esc_attr( $math_id ); ?>"><?php echo esc_html( sprintf( __( 'Security question: What is %1$d + %2$d?', 'formmailbox' ), $first, $second ) ); ?></label><input id="<?php echo esc_attr( $math_id ); ?>" type="number" name="fmbx_math_answer" required><input type="hidden" name="fmbx_math_token" value="<?php echo esc_attr( $token ); ?>"><input type="hidden" name="fmbx_math_signature" value="<?php echo esc_attr( $signature ); ?>"></div><?php
		} elseif ( 'recaptcha_v2' === $settings['captcha_provider'] && ! empty( $settings['recaptcha_site_key'] ) ) {
			?><div class="fmbx-field"><div class="g-recaptcha" data-sitekey="<?php echo esc_attr( $settings['recaptcha_site_key'] ); ?>"></div></div><?php
		}
	}

	/** @param array $field Field definition. @param string $instance Instance ID. @return void */
	private function render_field( array $field, $instance ) {
		$key      = sanitize_key( $field['key'] );
		$type     = sanitize_key( $field['type'] );
		$label    = isset( $field['label'] ) ? $field['label'] : $key;
		$required = ! empty( $field['required'] );
		$id       = $instance . '-' . $key;
		$options  = ! empty( $field['options'] ) && is_array( $field['options'] ) ? $field['options'] : array();
		$placeholder = isset( $field['placeholder'] ) ? sanitize_text_field( $field['placeholder'] ) : '';
		?>
		<div class="fmbx-field fmbx-field--<?php echo esc_attr( $type ); ?>">
			<?php if ( in_array( $type, array( 'radio', 'checkbox' ), true ) ) : ?>
				<fieldset><legend><?php echo esc_html( $label ); ?><?php echo $required ? ' <span aria-hidden="true">*</span>' : ''; ?></legend>
				<?php foreach ( $options as $index => $option ) : ?>
					<label class="fmbx-choice"><input type="<?php echo esc_attr( $type ); ?>" name="fields[<?php echo esc_attr( $key ); ?>]<?php echo 'checkbox' === $type ? '[]' : ''; ?>" value="<?php echo esc_attr( $option ); ?>" <?php echo $required && 0 === $index ? 'required' : ''; ?>> <span><?php echo esc_html( $option ); ?></span></label>
				<?php endforeach; ?></fieldset>
			<?php else : ?>
				<label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?><?php echo $required ? ' <span aria-hidden="true">*</span>' : ''; ?></label>
				<?php if ( 'textarea' === $type ) : ?>
					<textarea id="<?php echo esc_attr( $id ); ?>" name="fields[<?php echo esc_attr( $key ); ?>]" rows="5" placeholder="<?php echo esc_attr( $placeholder ); ?>" <?php echo $required ? 'required' : ''; ?>></textarea>
				<?php elseif ( 'select' === $type ) : ?>
					<select id="<?php echo esc_attr( $id ); ?>" name="fields[<?php echo esc_attr( $key ); ?>]" <?php echo $required ? 'required' : ''; ?>><option value=""><?php echo esc_html__( 'Select an option', 'formmailbox' ); ?></option><?php foreach ( $options as $option ) : ?><option value="<?php echo esc_attr( $option ); ?>"><?php echo esc_html( $option ); ?></option><?php endforeach; ?></select>
				<?php else : ?>
					<input id="<?php echo esc_attr( $id ); ?>" type="<?php echo esc_attr( in_array( $type, array( 'email', 'tel', 'number', 'url', 'date', 'time' ), true ) ? $type : 'text' ); ?>" name="fields[<?php echo esc_attr( $key ); ?>]" placeholder="<?php echo esc_attr( $placeholder ); ?>" <?php echo $required ? 'required' : ''; ?>>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php
	}

	/** @return void */
	public function process_submission() {
		$form_id = isset( $_POST['form_id'] ) ? absint( $_POST['form_id'] ) : 0;
		$form    = $this->repository->get_form( $form_id );
		if ( ! $form || 'published' !== $form->status ) {
			$this->redirect( 'error' );
		}

		$nonce = isset( $_POST['formmailbox_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['formmailbox_nonce'] ) ) : '';
		if ( ! wp_verify_nonce( $nonce, 'formmailbox_submit_' . $form_id ) ) {
			$this->redirect( 'error' );
		}

		$settings = wp_parse_args( $this->repository->decode_json( $form->settings_json ), FormMailbox_Templates::default_settings() );
		if ( ! empty( $settings['honeypot'] ) && ! empty( $_POST['company_website'] ) ) {
			$this->redirect( 'success' );
		}

		$started_at = isset( $_POST['started_at'] ) ? absint( $_POST['started_at'] ) : 0;
		if ( ! empty( $settings['timing'] ) && ( ! $started_at || time() - $started_at < 2 ) ) {
			$this->redirect( 'error' );
		}
		if ( ! $this->verify_captcha( $settings ) ) {
			$this->redirect( 'error' );
		}

		$rate_key = 'fmbx_rate_' . hash( 'sha256', self::client_ip() . '|' . $form_id );
		if ( get_transient( $rate_key ) ) {
			$this->redirect( 'error' );
		}
		set_transient( $rate_key, 1, 20 );

		$fields = $this->repository->decode_json( $form->schema_json );
		$raw    = isset( $_POST['fields'] ) && is_array( $_POST['fields'] ) ? wp_unslash( $_POST['fields'] ) : array();
		$values = $this->validate_values( $fields, $raw );
		if ( is_wp_error( $values ) ) {
			$this->redirect( 'error' );
		}

		$source_url = isset( $_POST['source_url'] ) ? wp_validate_redirect( esc_url_raw( wp_unslash( $_POST['source_url'] ) ), home_url( '/' ) ) : home_url( '/' );
		$entry_id   = $this->repository->create_entry( $form_id, $values, $fields, isset( $_POST['source_post_id'] ) ? absint( $_POST['source_post_id'] ) : 0, $source_url );
		if ( ! $entry_id ) {
			$this->redirect( 'error' );
		}

		$status = $this->send_notifications( $entry_id, $form, $fields, $values, $settings );
		$this->repository->update_entry_email_status( $entry_id, $status );
		$this->redirect( 'success', $source_url );
	}

	/** @param array $settings Form settings. @return bool */
	private function verify_captcha( array $settings ) {
		if ( 'none' === $settings['captcha_provider'] ) { return true; }
		if ( 'math' === $settings['captcha_provider'] ) {
			$token = isset( $_POST['fmbx_math_token'] ) ? sanitize_text_field( wp_unslash( $_POST['fmbx_math_token'] ) ) : '';
			$signature = isset( $_POST['fmbx_math_signature'] ) ? sanitize_text_field( wp_unslash( $_POST['fmbx_math_signature'] ) ) : '';
			$answer = isset( $_POST['fmbx_math_answer'] ) ? absint( $_POST['fmbx_math_answer'] ) : 0;
			$parts = explode( '|', $token );
			return 2 === count( $parts ) && hash_equals( hash_hmac( 'sha256', $token, wp_salt( 'nonce' ) ), $signature ) && absint( $parts[0] ) + absint( $parts[1] ) === $answer;
		}
		if ( 'recaptcha_v2' === $settings['captcha_provider'] ) {
			$response = isset( $_POST['g-recaptcha-response'] ) ? sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ) ) : '';
			if ( ! $response || empty( $settings['recaptcha_secret_key'] ) ) { return false; }
			$request = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify', array( 'timeout' => 10, 'body' => array( 'secret' => $settings['recaptcha_secret_key'], 'response' => $response, 'remoteip' => self::client_ip() ) ) );
			if ( is_wp_error( $request ) ) { return false; }
			$body = json_decode( wp_remote_retrieve_body( $request ), true );
			return ! empty( $body['success'] );
		}
		return false;
	}

	/** @return array|WP_Error */
	private function validate_values( array $fields, array $raw ) {
		$values = array();
		foreach ( $fields as $field ) {
			$key   = sanitize_key( $field['key'] );
			$value = isset( $raw[ $key ] ) ? $raw[ $key ] : '';
			if ( ! empty( $field['required'] ) && ( '' === $value || array() === $value ) ) {
				return new WP_Error( 'required_field' );
			}
			if ( is_array( $value ) ) {
				$values[ $key ] = array_map( 'sanitize_text_field', $value );
				if ( ! empty( $field['options'] ) && array_diff( $values[ $key ], $field['options'] ) ) { return new WP_Error( 'invalid_option' ); }
			} elseif ( 'email' === $field['type'] ) {
				$values[ $key ] = sanitize_email( $value );
				if ( $value && ! is_email( $values[ $key ] ) ) {
					return new WP_Error( 'invalid_email' );
				}
			} elseif ( 'textarea' === $field['type'] ) {
				$values[ $key ] = sanitize_textarea_field( $value );
			} elseif ( 'url' === $field['type'] ) {
				$values[ $key ] = esc_url_raw( $value );
			} elseif ( 'number' === $field['type'] ) {
				$values[ $key ] = is_numeric( $value ) ? (string) $value : '';
			} else {
				$values[ $key ] = sanitize_text_field( $value );
				if ( in_array( $field['type'], array( 'select', 'radio' ), true ) && $values[ $key ] && ! in_array( $values[ $key ], $field['options'], true ) ) { return new WP_Error( 'invalid_option' ); }
			}
		}
		return $values;
	}

	/** @return string */
	private function send_notifications( $entry_id, $form, array $fields, array $values, array $settings ) {
		$labels = array();
		foreach ( $fields as $field ) {
			$labels[ $field['key'] ] = $field['label'];
		}
		$lines = array();
		foreach ( $values as $key => $value ) {
			$lines[] = ( isset( $labels[ $key ] ) ? $labels[ $key ] : $key ) . ': ' . ( is_array( $value ) ? implode( ', ', $value ) : $value );
		}

		$recipient = sanitize_email( $settings['admin_email'] );
		$subject   = str_replace( '{form_name}', $form->name, $settings['admin_subject'] );
		$sent      = $recipient ? wp_mail( $recipient, $subject, implode( "\n\n", $lines ) ) : false;
		$this->repository->log_email( $entry_id, 'admin', $recipient, $subject, $sent ? 'accepted' : 'failed' );

		if ( ! empty( $settings['confirmation'] ) && ! empty( $values['email'] ) ) {
			$confirmation_sent = wp_mail( $values['email'], $settings['confirmation_subject'], $settings['confirmation_message'] );
			$this->repository->log_email( $entry_id, 'customer', $values['email'], $settings['confirmation_subject'], $confirmation_sent ? 'accepted' : 'failed' );
			$sent = $sent && $confirmation_sent;
		}

		return $sent ? 'accepted' : 'failed';
	}

	/** @return string */
	private static function current_url() {
		$uri    = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		return esc_url_raw( home_url( $uri ) );
	}

	/** @return string */
	private static function client_ip() {
		return isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
	}

	/** @return void */
	private function redirect( $status, $url = '' ) {
		$url = $url ? $url : wp_get_referer();
		$url = $url ? $url : home_url( '/' );
		wp_safe_redirect( add_query_arg( 'fmbx_status', sanitize_key( $status ), $url ) );
		exit;
	}
}

/**
 * Developer-facing rendering function.
 *
 * @param int   $form_id Form ID.
 * @param array $attributes Optional attributes.
 * @return void
 */
function formmailbox_render_form( $form_id, array $attributes = array() ) {
	$shortcode = sprintf( '[formmailbox id="%d"', absint( $form_id ) );
	if ( ! empty( $attributes['class'] ) ) {
		$shortcode .= ' class="' . sanitize_html_class( $attributes['class'] ) . '"';
	}
	if ( ! empty( $attributes['show_title'] ) ) {
		$shortcode .= ' show_title="yes"';
	}
	$shortcode .= ']';
	echo do_shortcode( $shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
