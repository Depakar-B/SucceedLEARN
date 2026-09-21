<?php
/**
 * Shortcode rendering — desktop and AMP markup.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_ECTA_Render {

	/** @var SL_ECTA_Security */
	private $security;

	/** @var int */
	private static $instance_count = 0;

	public function __construct( SL_ECTA_Security $security ) {
		$this->security = $security;
	}

	public function register_shortcode() {
		add_shortcode( 'sl_email_cta', array( $this, 'render' ) );
	}

	/**
	 * Render the Email CTA form.
	 *
	 * Usage: [sl_email_cta heading="Get in touch" heading_tag="h2" button="Submit" source="EmailCTA" placeholder="Enter your email"]
	 *
	 * @param array|string $atts Shortcode attributes.
	 * @return string
	 */
	public function render( $atts = array() ) {
		$atts = shortcode_atts(
			array(
				'heading'     => '',
				'heading_tag' => 'h2',
				'button'      => __( 'Submit', 'succeedlearn-email-cta' ),
				'source'      => 'EmailCTA',
				'placeholder' => __( 'Enter your email', 'succeedlearn-email-cta' ),
			),
			$atts,
			'sl_email_cta'
		);

		$heading_tag = strtolower( sanitize_key( $atts['heading_tag'] ) );
		if ( ! in_array( $heading_tag, array( 'h2', 'h3' ), true ) ) {
			$heading_tag = 'h2';
		}

		SL_ECTA_Plugin::instance()->mark_shortcode_used();
		SL_ECTA_Assets::mark_needed();

		if ( $this->security->is_amp() ) {
			return $this->render_amp( $atts, $heading_tag );
		}

		return $this->render_desktop( $atts, $heading_tag );
	}

	/**
	 * @param array  $atts        Attributes.
	 * @param string $heading_tag h2|h3.
	 * @return string
	 */
	private function render_desktop( $atts, $heading_tag ) {
		self::$instance_count++;
		$form_id        = 'sl-ecta-form-' . self::$instance_count;
		$form_token     = $this->security->generate_form_token();
		$honeypot_names = $this->security->create_honeypots( $form_token );
		$privacy_url    = get_privacy_policy_url();
		$nonce          = wp_create_nonce( 'sl_ecta_submit' );
		$current_url    = $this->get_current_url();

		ob_start();
		?>
		<div class="sl-ecta-wrap" data-sl-ecta>
			<?php if ( '' !== trim( (string) $atts['heading'] ) ) : ?>
				<<?php echo tag_escape( $heading_tag ); ?> class="sl-ecta-heading"><?php echo esc_html( $atts['heading'] ); ?></<?php echo tag_escape( $heading_tag ); ?>>
			<?php endif; ?>
			<form id="<?php echo esc_attr( $form_id ); ?>" class="sl-ecta-form" method="post" novalidate>
				<input type="hidden" name="action" value="sl_ecta_submit" />
				<input type="hidden" name="nonce" value="<?php echo esc_attr( $nonce ); ?>" />
				<input type="hidden" name="sl_ecta_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
				<input type="hidden" name="sl_ecta_form_time" value="<?php echo esc_attr( (string) time() ); ?>" />
				<input type="hidden" name="source" value="<?php echo esc_attr( $atts['source'] ); ?>" />
				<input type="hidden" name="page_url" value="<?php echo esc_url( $current_url ); ?>" />
				<?php
				$utm_seed = $this->get_utm_seed_values();
				foreach ( array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content' ) as $utm_key ) :
					?>
					<input type="hidden" name="<?php echo esc_attr( $utm_key ); ?>" value="<?php echo esc_attr( $utm_seed[ $utm_key ] ); ?>" />
				<?php endforeach; ?>

				<div class="sl-ecta-honeypot" aria-hidden="true">
					<label for="<?php echo esc_attr( $form_id ); ?>-website"><?php esc_html_e( 'Website', 'succeedlearn-email-cta' ); ?></label>
					<input type="text" id="<?php echo esc_attr( $form_id ); ?>-website" name="<?php echo esc_attr( $honeypot_names['website'] ); ?>" tabindex="-1" autocomplete="off" />
				</div>
				<div class="sl-ecta-honeypot" aria-hidden="true">
					<label for="<?php echo esc_attr( $form_id ); ?>-company"><?php esc_html_e( 'Company', 'succeedlearn-email-cta' ); ?></label>
					<input type="text" id="<?php echo esc_attr( $form_id ); ?>-company" name="<?php echo esc_attr( $honeypot_names['company'] ); ?>" tabindex="-1" autocomplete="off" />
				</div>

				<div class="sl-ecta-row">
					<label class="screen-reader-text" for="<?php echo esc_attr( $form_id ); ?>-email"><?php esc_html_e( 'Email address', 'succeedlearn-email-cta' ); ?></label>
					<input
						type="email"
						id="<?php echo esc_attr( $form_id ); ?>-email"
						class="sl-ecta-email"
						name="email"
						required
						placeholder="<?php echo esc_attr( $atts['placeholder'] ); ?>"
						autocomplete="email"
						inputmode="email"
					/>
					<button type="submit" class="sl-ecta-submit">
						<span class="sl-ecta-submit-text"><?php echo esc_html( $atts['button'] ); ?></span>
						<span class="sl-ecta-submit-loading" hidden><?php esc_html_e( 'Sending…', 'succeedlearn-email-cta' ); ?></span>
					</button>
				</div>

				<?php if ( $privacy_url ) : ?>
					<p class="sl-ecta-privacy">
						<?php
						printf(
							wp_kses(
								/* translators: %s: privacy policy URL */
								__( 'By submitting, you agree to our <a href="%s" target="_blank" rel="noopener noreferrer">privacy policy</a>.', 'succeedlearn-email-cta' ),
								array(
									'a' => array(
										'href'   => array(),
										'target' => array(),
										'rel'    => array(),
									),
								)
							),
							esc_url( $privacy_url )
						);
						?>
					</p>
				<?php endif; ?>

				<p class="sl-ecta-response" role="status" aria-live="polite"></p>
			</form>
			<div class="sl-ecta-success" hidden>
				<p class="sl-ecta-success-message"></p>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * @param array  $atts        Attributes.
	 * @param string $heading_tag h2|h3.
	 * @return string
	 */
	private function render_amp( $atts, $heading_tag ) {
		self::$instance_count++;
		$form_id     = 'sl-ecta-amp-' . self::$instance_count;
		$form_token  = $this->security->generate_form_token();
		$privacy_url = get_privacy_policy_url();
		$nonce       = wp_create_nonce( 'sl_ecta_submit' );
		$ajax_url    = admin_url( 'admin-ajax.php' );
		$current_url = $this->get_current_url();

		ob_start();
		?>
		<div class="sl-ecta-wrap sl-ecta-wrap--amp">
			<?php if ( '' !== trim( (string) $atts['heading'] ) ) : ?>
				<<?php echo tag_escape( $heading_tag ); ?> class="sl-ecta-heading"><?php echo esc_html( $atts['heading'] ); ?></<?php echo tag_escape( $heading_tag ); ?>>
			<?php endif; ?>
			<form
				id="<?php echo esc_attr( $form_id ); ?>"
				class="sl-ecta-form"
				method="post"
				action-xhr="<?php echo esc_url( $ajax_url ); ?>"
				target="_top"
				custom-validation-reporting="show-all-on-submit"
			>
				<input type="hidden" name="action" value="sl_ecta_submit" />
				<input type="hidden" name="amp_submission" value="1" />
				<input type="hidden" name="nonce" value="<?php echo esc_attr( $nonce ); ?>" />
				<input type="hidden" name="sl_ecta_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
				<input type="hidden" name="sl_ecta_form_time" value="<?php echo esc_attr( (string) time() ); ?>" />
				<input type="hidden" name="source" value="<?php echo esc_attr( $atts['source'] ); ?>" />
				<input type="hidden" name="page_url" value="<?php echo esc_url( $current_url ); ?>" />
				<?php
				$utm_seed = $this->get_utm_seed_values();
				foreach ( array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content' ) as $utm_key ) :
					?>
					<input type="hidden" name="<?php echo esc_attr( $utm_key ); ?>" value="<?php echo esc_attr( $utm_seed[ $utm_key ] ); ?>" />
				<?php endforeach; ?>

				<div class="sl-ecta-honeypot" aria-hidden="true">
					<label for="<?php echo esc_attr( $form_id ); ?>-website"><?php esc_html_e( 'Website', 'succeedlearn-email-cta' ); ?></label>
					<input type="text" id="<?php echo esc_attr( $form_id ); ?>-website" name="website" tabindex="-1" autocomplete="off" />
				</div>
				<div class="sl-ecta-honeypot" aria-hidden="true">
					<label for="<?php echo esc_attr( $form_id ); ?>-company"><?php esc_html_e( 'Company', 'succeedlearn-email-cta' ); ?></label>
					<input type="text" id="<?php echo esc_attr( $form_id ); ?>-company" name="company" tabindex="-1" autocomplete="off" />
				</div>

				<div class="sl-ecta-row">
					<label class="screen-reader-text" for="<?php echo esc_attr( $form_id ); ?>-email"><?php esc_html_e( 'Email address', 'succeedlearn-email-cta' ); ?></label>
					<input
						type="email"
						id="<?php echo esc_attr( $form_id ); ?>-email"
						class="sl-ecta-email"
						name="email"
						required
						placeholder="<?php echo esc_attr( $atts['placeholder'] ); ?>"
						autocomplete="email"
					/>
					<span visible-when-invalid="valueMissing" validation-for="<?php echo esc_attr( $form_id ); ?>-email" class="sl-ecta-amp-error"><?php esc_html_e( 'Please enter your email.', 'succeedlearn-email-cta' ); ?></span>
					<span visible-when-invalid="typeMismatch" validation-for="<?php echo esc_attr( $form_id ); ?>-email" class="sl-ecta-amp-error"><?php esc_html_e( 'Please enter a valid email address.', 'succeedlearn-email-cta' ); ?></span>
					<button type="submit" class="sl-ecta-submit"><?php echo esc_html( $atts['button'] ); ?></button>
				</div>

				<?php if ( $privacy_url ) : ?>
					<p class="sl-ecta-privacy">
						<?php
						printf(
							wp_kses(
								/* translators: %s: privacy policy URL */
								__( 'By submitting, you agree to our <a href="%s" target="_blank" rel="noopener noreferrer">privacy policy</a>.', 'succeedlearn-email-cta' ),
								array(
									'a' => array(
										'href'   => array(),
										'target' => array(),
										'rel'    => array(),
									),
								)
							),
							esc_url( $privacy_url )
						);
						?>
					</p>
				<?php endif; ?>

				<div submit-success>
					<template type="amp-mustache">
						<p class="sl-ecta-success-message">{{message}}</p>
					</template>
				</div>
				<div submit-error>
					<template type="amp-mustache">
						<p class="sl-ecta-error-message">{{message}}</p>
					</template>
				</div>
			</form>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Seed UTM hidden fields from query string and HandL cookies.
	 *
	 * @return array<string, string>
	 */
	private function get_utm_seed_values() {
		$keys   = array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content' );
		$values = array_fill_keys( $keys, '' );

		foreach ( $keys as $key ) {
			if ( isset( $_GET[ $key ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$values[ $key ] = sanitize_text_field( wp_unslash( $_GET[ $key ] ) );
			}
		}

		foreach ( $keys as $key ) {
			if ( '' !== $values[ $key ] ) {
				continue;
			}
			if ( isset( $_COOKIE[ $key ] ) && '' !== (string) $_COOKIE[ $key ] ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				$values[ $key ] = sanitize_text_field( wp_unslash( $_COOKIE[ $key ] ) );
			}
		}

		return $values;
	}

	/**
	 * @return string
	 */
	private function get_current_url() {
		$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '/';
		$req_host    = isset( $_SERVER['HTTP_HOST'] ) ? (string) wp_unslash( $_SERVER['HTTP_HOST'] ) : '';

		// Local / missing host: build from home_url so page_url is never "http://".
		if ( '' === $req_host || 'localhost' === strtolower( $req_host ) || false !== strpos( $req_host, '127.0.0.1' ) ) {
			$home_path = (string) wp_parse_url( home_url(), PHP_URL_PATH );
			$path      = $request_uri;
			if ( $home_path && '/' !== $home_path && 0 === strpos( $request_uri, $home_path ) ) {
				$path = substr( $request_uri, strlen( $home_path ) );
				$path = ( '' === $path ) ? '/' : $path;
			}
			return esc_url_raw( home_url( $path ) );
		}

		$is_ssl = ( ! empty( $_SERVER['HTTPS'] ) && 'off' !== strtolower( (string) $_SERVER['HTTPS'] ) )
			|| ( isset( $_SERVER['SERVER_PORT'] ) && '443' === (string) $_SERVER['SERVER_PORT'] )
			|| ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === strtolower( (string) $_SERVER['HTTP_X_FORWARDED_PROTO'] ) );

		return esc_url_raw( ( $is_ssl ? 'https' : 'http' ) . '://' . $req_host . $request_uri );
	}
}
