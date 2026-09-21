<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_ERP_Plugin {
	const OPTION_KEY = 'succeedlearn_form_erp_settings';

	const DEFAULT_PROD_API_URL = 'https://intranet.succeedtech.com/api/resource/Lead';
	const DEFAULT_UAT_API_URL  = 'https://uaterp.succeedtech.com/api/resource/Lead';

	private static $instance = null;
	private $client;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		$this->client = new SL_ERP_Client();
		add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * @return array<string, mixed>
	 */
	public static function get_settings() {
		$settings = get_option( self::OPTION_KEY, array() );
		return is_array( $settings ) ? $settings : array();
	}

	public function is_enabled() {
		$settings = self::get_settings();
		if ( array_key_exists( 'enabled', $settings ) ) {
			return (bool) $settings['enabled'];
		}
		return true;
	}

	public static function get_naming_series() {
		$settings = self::get_settings();
		return ! empty( $settings['naming_series'] ) ? (string) $settings['naming_series'] : '';
	}

	public function send_submission( array $submission, array $context = array() ) {
		$result   = array( 'success' => false, 'response' => '', 'utm_source' => '', 'lead_data' => array() );
		$form_key = ! empty( $context['form_key'] ) ? sanitize_text_field( (string) $context['form_key'] ) : 'unknown';
		$email    = (string) ( $submission['email'] ?? '' );

		if ( ! $this->is_enabled() ) {
			$disabled = wp_json_encode(
				array(
					'success' => false,
					'error'   => 'erp_disabled',
					'message' => 'SucceedLEARN ERP sync is disabled in Settings.',
				)
			);
			SL_ERP_Logger::log( $form_key, $email, '', $disabled, array() );
			$result['response'] = $disabled;
			return $result;
		}

		$context    = apply_filters( 'succeedlearn_erp_context', $context, $submission );
		$lead_data  = SL_ERP_Mapper::build_lead_payload( $submission, $context );
		$utm_source = isset( $lead_data['utm_source'] ) ? (string) $lead_data['utm_source'] : SL_ERP_Mapper::UTM_DIRECT;
		$response   = $this->client->create_lead( $lead_data );
		$success    = is_string( $response ) && '' !== $response && false === stripos( $response, '"exc_type"' ) && false === stripos( $response, '"error"' );

		SL_ERP_Logger::log( $form_key, $email, $utm_source, $response, $lead_data );
		do_action( 'succeedlearn_erp_after_submission', $submission, $response, $context );

		$result['success']    = $success;
		$result['response']   = (string) $response;
		$result['utm_source'] = $utm_source;
		$result['lead_data']  = $lead_data;
		return $result;
	}

	public function register_admin_menu() {
		add_options_page(
			__( 'SucceedLEARN Form ERP', 'succeedlearn-form-erp' ),
			__( 'SucceedLEARN ERP', 'succeedlearn-form-erp' ),
			'manage_options',
			'succeedlearn-form-erp',
			array( $this, 'render_settings_page' )
		);
	}

	public function register_settings() {
		register_setting( 'succeedlearn_form_erp', self::OPTION_KEY, array( $this, 'sanitize_settings' ) );
	}

	public function sanitize_settings( $input ) {
		$input    = is_array( $input ) ? $input : array();
		$existing = self::get_settings();

		$api_key = isset( $input['api_key'] ) ? sanitize_text_field( $input['api_key'] ) : '';
		if ( '' === $api_key && ! empty( $existing['api_key'] ) ) {
			$api_key = (string) $existing['api_key'];
		}

		$api_secret = isset( $input['api_secret'] ) ? sanitize_text_field( $input['api_secret'] ) : '';
		if ( '' === $api_secret && ! empty( $existing['api_secret'] ) ) {
			$api_secret = (string) $existing['api_secret'];
		}

		$uat_api_key = isset( $input['uat_api_key'] ) ? sanitize_text_field( $input['uat_api_key'] ) : '';
		if ( '' === $uat_api_key && ! empty( $existing['uat_api_key'] ) ) {
			$uat_api_key = (string) $existing['uat_api_key'];
		}

		$uat_api_secret = isset( $input['uat_api_secret'] ) ? sanitize_text_field( $input['uat_api_secret'] ) : '';
		if ( '' === $uat_api_secret && ! empty( $existing['uat_api_secret'] ) ) {
			$uat_api_secret = (string) $existing['uat_api_secret'];
		}

		return array(
			'enabled'        => ! empty( $input['enabled'] ) ? 1 : 0,
			'api_url'        => isset( $input['api_url'] ) ? esc_url_raw( $input['api_url'] ) : '',
			'api_key'        => $api_key,
			'api_secret'     => $api_secret,
			'naming_series'  => isset( $input['naming_series'] ) ? sanitize_text_field( $input['naming_series'] ) : '',
			'uat_api_url'    => isset( $input['uat_api_url'] ) ? esc_url_raw( $input['uat_api_url'] ) : '',
			'uat_api_key'    => $uat_api_key,
			'uat_api_secret' => $uat_api_secret,
		);
	}

	public function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$settings = self::get_settings();
		$test_on  = function_exists( 'scf_is_admin_email_test_mode' ) && scf_is_admin_email_test_mode();
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'SucceedLEARN Form ERP', 'succeedlearn-form-erp' ); ?></h1>
			<p><?php esc_html_e( 'Global ERPNext sync for all SucceedLEARN forms. Credentials are stored in these admin settings only (not wp-config).', 'succeedlearn-form-erp' ); ?></p>
			<p>
				<?php
				printf(
					/* translators: %s: settings page link */
					esc_html__( 'Shared reCAPTCHA settings: %s', 'succeedlearn-form-erp' ),
					'<a href="' . esc_url( admin_url( 'options-general.php?page=succeedlearn-form-recaptcha' ) ) . '">' . esc_html__( 'SucceedLEARN reCAPTCHA', 'succeedlearn-form-erp' ) . '</a>'
				);
				?>
			</p>
			<p class="description">
				<?php
				esc_html_e( 'When Contact Form admin email test mode is ON, the UAT section is used; otherwise the Production section is used. Both credential sets are stored separately.', 'succeedlearn-form-erp' );
				?>
			</p>
			<?php if ( $test_on ) : ?>
				<div class="notice notice-warning inline"><p><?php esc_html_e( 'SCF admin email test mode is currently ON — form submissions will use the UAT credentials below.', 'succeedlearn-form-erp' ); ?></p></div>
			<?php endif; ?>
			<form method="post" action="options.php">
				<?php settings_fields( 'succeedlearn_form_erp' ); ?>

				<h2><?php esc_html_e( 'Production (test mode OFF)', 'succeedlearn-form-erp' ); ?></h2>
				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><?php esc_html_e( 'Enable ERP sync', 'succeedlearn-form-erp' ); ?></th>
						<td><label><input type="checkbox" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[enabled]" value="1" <?php checked( ! empty( $settings['enabled'] ) || ! isset( $settings['enabled'] ) ); ?> /> <?php esc_html_e( 'Send leads to ERPNext', 'succeedlearn-form-erp' ); ?></label></td>
					</tr>
					<tr>
						<th scope="row"><label for="sl_erp_api_url"><?php esc_html_e( 'API URL', 'succeedlearn-form-erp' ); ?></label></th>
						<td><input type="url" class="regular-text" id="sl_erp_api_url" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[api_url]" value="<?php echo esc_attr( $settings['api_url'] ?? self::DEFAULT_PROD_API_URL ); ?>" placeholder="<?php echo esc_attr( self::DEFAULT_PROD_API_URL ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="sl_erp_api_key"><?php esc_html_e( 'API Key', 'succeedlearn-form-erp' ); ?></label></th>
						<td><input type="password" class="regular-text" id="sl_erp_api_key" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[api_key]" value="<?php echo esc_attr( $settings['api_key'] ?? '' ); ?>" autocomplete="new-password" /><p class="description"><?php esc_html_e( 'Leave blank when saving to keep the existing key.', 'succeedlearn-form-erp' ); ?></p></td>
					</tr>
					<tr>
						<th scope="row"><label for="sl_erp_api_secret"><?php esc_html_e( 'API Secret', 'succeedlearn-form-erp' ); ?></label></th>
						<td><input type="password" class="regular-text" id="sl_erp_api_secret" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[api_secret]" value="<?php echo esc_attr( $settings['api_secret'] ?? '' ); ?>" autocomplete="new-password" /><p class="description"><?php esc_html_e( 'Leave blank when saving to keep the existing secret.', 'succeedlearn-form-erp' ); ?></p></td>
					</tr>
					<tr>
						<th scope="row"><label for="sl_erp_naming_series"><?php esc_html_e( 'Naming series', 'succeedlearn-form-erp' ); ?></label></th>
						<td><input type="text" class="regular-text" id="sl_erp_naming_series" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[naming_series]" value="<?php echo esc_attr( $settings['naming_series'] ?? '' ); ?>" placeholder="ST-SLLEAD-.YYYY.-" /><p class="description"><?php esc_html_e( 'Configure in ERPNext first. Leave blank until ready.', 'succeedlearn-form-erp' ); ?></p></td>
					</tr>
				</table>

				<h2><?php esc_html_e( 'UAT (test mode ON)', 'succeedlearn-form-erp' ); ?></h2>
				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="sl_erp_uat_api_url"><?php esc_html_e( 'UAT API URL', 'succeedlearn-form-erp' ); ?></label></th>
						<td><input type="url" class="regular-text" id="sl_erp_uat_api_url" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[uat_api_url]" value="<?php echo esc_attr( $settings['uat_api_url'] ?? self::DEFAULT_UAT_API_URL ); ?>" placeholder="<?php echo esc_attr( self::DEFAULT_UAT_API_URL ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="sl_erp_uat_api_key"><?php esc_html_e( 'UAT API Key', 'succeedlearn-form-erp' ); ?></label></th>
						<td><input type="password" class="regular-text" id="sl_erp_uat_api_key" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[uat_api_key]" value="<?php echo esc_attr( $settings['uat_api_key'] ?? '' ); ?>" autocomplete="new-password" /><p class="description"><?php esc_html_e( 'Leave blank when saving to keep the existing key.', 'succeedlearn-form-erp' ); ?></p></td>
					</tr>
					<tr>
						<th scope="row"><label for="sl_erp_uat_api_secret"><?php esc_html_e( 'UAT API Secret', 'succeedlearn-form-erp' ); ?></label></th>
						<td><input type="password" class="regular-text" id="sl_erp_uat_api_secret" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[uat_api_secret]" value="<?php echo esc_attr( $settings['uat_api_secret'] ?? '' ); ?>" autocomplete="new-password" /><p class="description"><?php esc_html_e( 'Leave blank when saving to keep the existing secret.', 'succeedlearn-form-erp' ); ?></p></td>
					</tr>
				</table>

				<?php submit_button(); ?>
			</form>
			<h2><?php esc_html_e( 'UTM Source mapping', 'succeedlearn-form-erp' ); ?></h2>
			<ul style="list-style:disc;margin-left:20px;">
				<li>SucceedLEARN RequestDemo (course/demo forms)</li>
				<li>SucceedLEARN InfoSEC</li>
				<li>SucceedLEARN Homepage</li>
				<li>SucceedLEARN Blogs</li>
				<li>SucceedLEARN ContactUs</li>
				<li>direct (fallback)</li>
			</ul>
		</div>
		<?php
	}
}
