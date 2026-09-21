<?php
/**
 * Shared Google reCAPTCHA v3 settings for all SucceedLEARN forms.
 *
 * @package SucceedLEARN_Form_ERP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_Form_Recaptcha {

	const OPTION_KEY         = 'succeedlearn_form_recaptcha_settings';
	const LEGACY_SCF_OPTION  = 'scf_settings';
	const DEFAULT_SCORE      = 0.5;

	/** @var self|null */
	private static $instance = null;

	/**
	 * @return self
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_init', array( $this, 'maybe_migrate_legacy_settings' ), 5 );
	}

	/**
	 * @return array<string, mixed>
	 */
	public function get_settings() {
		$settings = get_option( self::OPTION_KEY, array() );
		return is_array( $settings ) ? $settings : array();
	}

	/**
	 * @return string
	 */
	public function get_site_key() {
		$settings = $this->get_settings();
		return ! empty( $settings['site_key'] ) ? (string) $settings['site_key'] : '';
	}

	/**
	 * @return string
	 */
	public function get_secret_key() {
		$settings = $this->get_settings();
		return ! empty( $settings['secret_key'] ) ? (string) $settings['secret_key'] : '';
	}

	/**
	 * @return float
	 */
	public function get_score_threshold() {
		$settings = $this->get_settings();
		if ( isset( $settings['score_threshold'] ) ) {
			return max( 0.0, min( 1.0, (float) $settings['score_threshold'] ) );
		}
		return self::DEFAULT_SCORE;
	}

	/**
	 * @return bool
	 */
	public function is_enabled() {
		return '' !== $this->get_site_key() && '' !== $this->get_secret_key();
	}

	/**
	 * Verify a reCAPTCHA v3 token.
	 *
	 * @param string $token     Token from the browser.
	 * @param string $action    Expected action name.
	 * @param string $remote_ip Optional client IP.
	 * @return bool
	 */
	public function verify_token( $token, $action = 'submit', $remote_ip = '' ) {
		$token = sanitize_text_field( (string) $token );
		if ( ! $this->is_enabled() || '' === $token ) {
			return false;
		}

		$body = array(
			'secret'   => $this->get_secret_key(),
			'response' => $token,
		);
		if ( '' !== $remote_ip ) {
			$body['remoteip'] = sanitize_text_field( (string) $remote_ip );
		}

		$response = wp_remote_post(
			'https://www.google.com/recaptcha/api/siteverify',
			array(
				'body'    => $body,
				'timeout' => 10,
			)
		);

		if ( is_wp_error( $response ) ) {
			return false;
		}

		$result = json_decode( (string) wp_remote_retrieve_body( $response ), true );
		if ( ! is_array( $result ) || empty( $result['success'] ) ) {
			return false;
		}

		$action = sanitize_key( (string) $action );
		if ( '' !== $action && ! empty( $result['action'] ) && $action !== (string) $result['action'] ) {
			return false;
		}

		if ( isset( $result['score'] ) && (float) $result['score'] < $this->get_score_threshold() ) {
			return false;
		}

		return true;
	}

	/**
	 * Copy keys from the legacy contact-form settings once.
	 */
	public function maybe_migrate_legacy_settings() {
		if ( get_option( 'succeedlearn_form_recaptcha_migrated', false ) ) {
			return;
		}

		$current = $this->get_settings();
		if ( ! empty( $current['site_key'] ) || ! empty( $current['secret_key'] ) ) {
			update_option( 'succeedlearn_form_recaptcha_migrated', 1, false );
			return;
		}

		$legacy = get_option( self::LEGACY_SCF_OPTION, array() );
		if ( ! is_array( $legacy ) ) {
			update_option( 'succeedlearn_form_recaptcha_migrated', 1, false );
			return;
		}

		$site_key   = ! empty( $legacy['recaptcha_site_key'] ) ? (string) $legacy['recaptcha_site_key'] : '';
		$secret_key = ! empty( $legacy['recaptcha_secret_key'] ) ? (string) $legacy['recaptcha_secret_key'] : '';
		if ( '' === $site_key && '' === $secret_key ) {
			update_option( 'succeedlearn_form_recaptcha_migrated', 1, false );
			return;
		}

		update_option(
			self::OPTION_KEY,
			array(
				'site_key'        => sanitize_text_field( $site_key ),
				'secret_key'      => sanitize_text_field( $secret_key ),
				'score_threshold' => isset( $legacy['recaptcha_score_threshold'] )
					? max( 0.0, min( 1.0, (float) $legacy['recaptcha_score_threshold'] ) )
					: self::DEFAULT_SCORE,
			),
			false
		);
		update_option( 'succeedlearn_form_recaptcha_migrated', 1, false );
	}

	public function register_admin_menu() {
		add_options_page(
			__( 'SucceedLEARN reCAPTCHA', 'succeedlearn-form-erp' ),
			__( 'SucceedLEARN reCAPTCHA', 'succeedlearn-form-erp' ),
			'manage_options',
			'succeedlearn-form-recaptcha',
			array( $this, 'render_settings_page' )
		);
	}

	public function register_settings() {
		register_setting( 'succeedlearn_form_recaptcha', self::OPTION_KEY, array( $this, 'sanitize_settings' ) );
	}

	/**
	 * @param array $input Raw settings.
	 * @return array
	 */
	public function sanitize_settings( $input ) {
		$input = is_array( $input ) ? $input : array();
		$threshold = isset( $input['score_threshold'] ) ? (float) $input['score_threshold'] : self::DEFAULT_SCORE;

		return array(
			'site_key'        => isset( $input['site_key'] ) ? sanitize_text_field( (string) $input['site_key'] ) : '',
			'secret_key'      => isset( $input['secret_key'] ) ? sanitize_text_field( (string) $input['secret_key'] ) : '',
			'score_threshold' => max( 0.0, min( 1.0, $threshold ) ),
		);
	}

	public function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$settings = $this->get_settings();
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'SucceedLEARN reCAPTCHA', 'succeedlearn-form-erp' ); ?></h1>
			<p><?php esc_html_e( 'One shared Google reCAPTCHA v3 configuration for all SucceedLEARN forms on this site.', 'succeedlearn-form-erp' ); ?></p>
			<form method="post" action="options.php">
				<?php settings_fields( 'succeedlearn_form_recaptcha' ); ?>
				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="sl_recaptcha_site_key"><?php esc_html_e( 'Site Key', 'succeedlearn-form-erp' ); ?></label></th>
						<td>
							<input type="text" class="regular-text" id="sl_recaptcha_site_key" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[site_key]" value="<?php echo esc_attr( $settings['site_key'] ?? '' ); ?>" />
							<p class="description">
								<?php esc_html_e( 'Google reCAPTCHA v3 site key for succeedlearn.com (and localhost for testing).', 'succeedlearn-form-erp' ); ?>
								<a href="https://www.google.com/recaptcha/admin/create" target="_blank" rel="noopener"><?php esc_html_e( 'Create keys', 'succeedlearn-form-erp' ); ?></a>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="sl_recaptcha_secret_key"><?php esc_html_e( 'Secret Key', 'succeedlearn-form-erp' ); ?></label></th>
						<td>
							<input type="password" class="regular-text" id="sl_recaptcha_secret_key" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[secret_key]" value="<?php echo esc_attr( $settings['secret_key'] ?? '' ); ?>" autocomplete="new-password" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="sl_recaptcha_score_threshold"><?php esc_html_e( 'Score Threshold', 'succeedlearn-form-erp' ); ?></label></th>
						<td>
							<input type="number" class="small-text" id="sl_recaptcha_score_threshold" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[score_threshold]" value="<?php echo esc_attr( $settings['score_threshold'] ?? (string) self::DEFAULT_SCORE ); ?>" min="0" max="1" step="0.1" />
							<p class="description"><?php esc_html_e( 'Default 0.5. Lower values are stricter.', 'succeedlearn-form-erp' ); ?></p>
						</td>
					</tr>
				</table>
				<p class="description">
					<strong><?php esc_html_e( 'Used by:', 'succeedlearn-form-erp' ); ?></strong>
					<?php esc_html_e( 'Succeed Common Contact Form and any future SucceedLEARN forms that call succeedlearn_form_recaptcha_verify().', 'succeedlearn-form-erp' ); ?>
					<br />
					<strong><?php esc_html_e( 'AMP forms:', 'succeedlearn-form-erp' ); ?></strong>
					<?php esc_html_e( 'reCAPTCHA v3 is not used on AMP; those forms rely on honeypot and timing checks.', 'succeedlearn-form-erp' ); ?>
				</p>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}
