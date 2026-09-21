<?php
/**
 * Admin Panel Class
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin Class — Phase 1: home page ID, emails, ERP.
 */
class Admin {

	/**
	 * @var Config
	 */
	private $config;

	/**
	 * @param Config $config Config.
	 */
	public function __construct( Config $config ) {
		$this->config = $config;
	}

	public function init() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	public function add_admin_menu() {
		add_menu_page(
			__( 'SucceedLEARN AMP', 'succeedlearn-amp' ),
			__( 'SucceedLEARN AMP', 'succeedlearn-amp' ),
			'manage_options',
			'succeedlearn-amp',
			array( $this, 'render_admin_page' ),
			'dashicons-embed-generic',
			30
		);
	}

	public function register_settings() {
		register_setting(
			'succeedlearn_amp_settings_group',
			'succeedlearn_amp_settings',
			array( 'sanitize_callback' => array( $this, 'sanitize_settings' ) )
		);

		add_settings_section(
			'succeedlearn_amp_page_ids',
			__( 'Page Configuration', 'succeedlearn-amp' ),
			static function () {
				echo '<p>' . esc_html__( 'Phase 1 uses the WordPress front page for AMP Home. Optional IDs below help forms and future pages.', 'succeedlearn-amp' ) . '</p>';
			},
			'succeedlearn-amp'
		);

		$fields = array(
			'home_page_id'     => __( 'Home Page ID (optional override)', 'succeedlearn-amp' ),
			'clients_page_id'  => __( 'Clients Page ID', 'succeedlearn-amp' ),
			'contact_page_id'  => __( 'Contact Page ID', 'succeedlearn-amp' ),
			'thankyou_page_id' => __( 'Thank You Page ID', 'succeedlearn-amp' ),
			'blog_page_id'       => __( 'Blog Page ID', 'succeedlearn-amp' ),
			'newsletter_page_id' => __( 'Newsletter Page ID', 'succeedlearn-amp' ),
		);
		foreach ( $fields as $key => $label ) {
			add_settings_field(
				$key,
				$label,
				array( $this, 'render_number_field' ),
				'succeedlearn-amp',
				'succeedlearn_amp_page_ids',
				array( 'field' => $key )
			);
		}

		add_settings_section(
			'succeedlearn_amp_email',
			__( 'Contact Email Recipients', 'succeedlearn-amp' ),
			'__return_false',
			'succeedlearn-amp'
		);
		add_settings_field(
			'contact_email_recipients',
			__( 'Admin notification emails', 'succeedlearn-amp' ),
			array( $this, 'render_recipients_field' ),
			'succeedlearn-amp',
			'succeedlearn_amp_email'
		);

		add_settings_section(
			'succeedlearn_amp_erp',
			__( 'ERPNext Integration', 'succeedlearn-amp' ),
			static function () {
				echo '<p>' . esc_html__( 'Leave the API key blank to disable ERP sync. Prefer defining SUCCEEDLEARN_ERP_API_KEY in wp-config.php.', 'succeedlearn-amp' ) . '</p>';
			},
			'succeedlearn-amp'
		);
		add_settings_field(
			'erpnext_api_url',
			__( 'API URL', 'succeedlearn-amp' ),
			array( $this, 'render_text_field' ),
			'succeedlearn-amp',
			'succeedlearn_amp_erp',
			array( 'field' => 'erpnext_api_url' )
		);
		add_settings_field(
			'erpnext_api_key',
			__( 'API Key', 'succeedlearn-amp' ),
			array( $this, 'render_password_field' ),
			'succeedlearn-amp',
			'succeedlearn_amp_erp',
			array( 'field' => 'erpnext_api_key' )
		);
	}

	/**
	 * @param array $input Input.
	 * @return array
	 */
	public function sanitize_settings( $input ) {
		$current = get_option( 'succeedlearn_amp_settings', array() );
		if ( ! is_array( $current ) ) {
			$current = array();
		}
		if ( ! is_array( $input ) ) {
			return $current;
		}

		$output = $current;

		foreach ( array( 'home_page_id', 'clients_page_id', 'contact_page_id', 'thankyou_page_id', 'blog_page_id', 'newsletter_page_id' ) as $key ) {
			if ( isset( $input[ $key ] ) ) {
				$output[ $key ] = absint( $input[ $key ] );
			}
		}

		if ( isset( $input['erpnext_api_url'] ) ) {
			$output['erpnext_api_url'] = esc_url_raw( $input['erpnext_api_url'] );
		}
		if ( isset( $input['erpnext_api_key'] ) ) {
			$key = trim( (string) $input['erpnext_api_key'] );
			if ( '' !== $key ) {
				$output['erpnext_api_key'] = sanitize_text_field( $key );
			}
		}

		if ( isset( $input['contact_email_recipients'] ) ) {
			$raw = is_array( $input['contact_email_recipients'] )
				? $input['contact_email_recipients']
				: preg_split( '/[\r\n,;]+/', (string) $input['contact_email_recipients'] );
			$output['contact_email_recipients'] = array_values(
				array_unique(
					array_filter(
						array_map( 'sanitize_email', (array) $raw ),
						'is_email'
					)
				)
			);
		}

		$output['version'] = SUCCEEDLEARN_AMP_VERSION;
		return $output;
	}

	/**
	 * @param array $args Args.
	 */
	public function render_number_field( $args ) {
		$field = $args['field'];
		$value = absint( $this->config->get( $field, 0 ) );
		printf(
			'<input type="number" min="0" class="small-text" name="succeedlearn_amp_settings[%1$s]" value="%2$d" />',
			esc_attr( $field ),
			$value
		);
	}

	/**
	 * @param array $args Args.
	 */
	public function render_text_field( $args ) {
		$field = $args['field'];
		$value = (string) $this->config->get( $field, '' );
		printf(
			'<input type="url" class="regular-text" name="succeedlearn_amp_settings[%1$s]" value="%2$s" />',
			esc_attr( $field ),
			esc_attr( $value )
		);
	}

	/**
	 * @param array $args Args.
	 */
	public function render_password_field( $args ) {
		$field = $args['field'];
		$value = (string) $this->config->get( $field, '' );
		printf(
			'<input type="password" class="regular-text" name="succeedlearn_amp_settings[%1$s]" value="%2$s" autocomplete="off" placeholder="%3$s" />',
			esc_attr( $field ),
			esc_attr( $value ),
			esc_attr__( 'Leave blank to keep existing / use wp-config', 'succeedlearn-amp' )
		);
	}

	public function render_recipients_field() {
		$recipients = $this->config->get( 'contact_email_recipients', array() );
		if ( is_array( $recipients ) ) {
			$recipients = implode( "\n", $recipients );
		}
		printf(
			'<textarea class="large-text" rows="5" name="succeedlearn_amp_settings[contact_email_recipients]">%s</textarea><p class="description">%s</p>',
			esc_textarea( (string) $recipients ),
			esc_html__( 'One email address per line.', 'succeedlearn-amp' )
		);
	}

	public function render_admin_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'SucceedLEARN AMP Settings', 'succeedlearn-amp' ); ?></h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'succeedlearn_amp_settings_group' );
				do_settings_sections( 'succeedlearn-amp' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}
}
