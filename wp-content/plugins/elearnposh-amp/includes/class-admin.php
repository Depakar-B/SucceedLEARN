<?php
/**
 * Admin Panel Class
 *
 * @package ElearnPOSH\AMP
 */

namespace ElearnPOSH\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin Class - Handles WordPress admin panel
 */
class Admin {
	/**
	 * Config instance
	 *
	 * @var Config
	 */
	private $config;

	/**
	 * Constructor
	 *
	 * @param Config $config Config instance.
	 */
	public function __construct( Config $config ) {
		$this->config = $config;
	}

	/**
	 * Initialize admin
	 */
	public function init() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_init', array( $this, 'register_banner_settings' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
	}

	// =========================================================================
	// MENU REGISTRATION
	// =========================================================================

	/**
	 * Add admin menu pages
	 */
	public function add_admin_menu() {
		// Main settings page
		add_menu_page(
			__( 'eLearnPOSH AMP', 'elearnposh-amp' ),
			__( 'eLearnPOSH AMP', 'elearnposh-amp' ),
			'manage_options',
			'elearnposh-amp',
			array( $this, 'render_admin_page' ),
			'dashicons-embed-generic',
			30
		);

		// Webinar Banner submenu
		add_submenu_page(
			'elearnposh-amp',
			__( 'Webinar Banner', 'elearnposh-amp' ),
			__( '📢 Webinar Banner', 'elearnposh-amp' ),
			'manage_options',
			'elearnposh-amp-banner',
			array( $this, 'render_webinar_banner_page' )
		);
	}

	// =========================================================================
	// MAIN SETTINGS REGISTRATION
	// =========================================================================

	/**
	 * Register main plugin settings (everything except the webinar banner)
	 */
	public function register_settings() {
		register_setting(
			'elearnposh_amp_settings_group',
			'elearnposh_amp_settings',
			array(
				'sanitize_callback' => array( $this, 'sanitize_settings' ),
			)
		);

		// ── Page IDs ──────────────────────────────────────────────────────────
		add_settings_section(
			'elearnposh_amp_page_ids',
			__( 'Page Configuration', 'elearnposh-amp' ),
			array( $this, 'render_page_ids_section' ),
			'elearnposh-amp'
		);

		add_settings_field(
			'newsletter_page_id',
			__( 'Newsletter List Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'newsletter_page_id', 'description' => __( 'Enter the page ID for the newsletter list page.', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'blog_page_id',
			__( 'Blog List Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'blog_page_id', 'description' => __( 'Enter the page ID for the blog list page.', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'contact_page_id',
			__( 'Contact Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'contact_page_id', 'description' => __( 'Enter the page ID for the contact page.', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'thankyou_page_id',
			__( 'Thank You Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'thankyou_page_id', 'description' => __( 'Contact form thank-you page (slug: thankyou). Leave blank to auto-detect by slug.', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'terms_page_id',
			__( 'Terms & Conditions Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'terms_page_id', 'description' => __( 'Terms and conditions page (default: 16356).', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'faq_page_id',
			__( 'FAQ Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'faq_page_id', 'description' => __( 'Optional. FAQ page ID; slug fallback is used when empty.', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'privacy_page_id',
			__( 'Privacy Policy Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'privacy_page_id', 'description' => __( 'Optional. Privacy policy page ID; slug fallback is used when empty.', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'press_media_page_id',
			__( 'Press & Media Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'press_media_page_id', 'description' => __( 'Enter the page ID for the press and media coverage page (default: 6980).', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'enterprise_features_page_id',
			__( 'Enterprise Features Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'enterprise_features_page_id', 'description' => __( 'Enter the page ID for the enterprise features page (default: 7689).', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'our_webinars_page_id',
			__( 'Our Webinars Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'our_webinars_page_id', 'description' => __( 'Enter the page ID for the Our Webinars page (production default: 11438).', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'posh_act_page_id',
			__( 'POSH Act Page ID', 'elearnposh-amp' ),
			array( $this, 'render_number_field' ),
			'elearnposh-amp',
			'elearnposh_amp_page_ids',
			array( 'field' => 'posh_act_page_id', 'description' => __( 'Enter the page ID for the POSH Act reference page (production default: 8301).', 'elearnposh-amp' ) )
		);

		// ── Custom Styling ────────────────────────────────────────────────────
		add_settings_section(
			'elearnposh_amp_custom_css',
			__( 'Custom Styling', 'elearnposh-amp' ),
			array( $this, 'render_custom_css_section' ),
			'elearnposh-amp'
		);

		add_settings_field(
			'enable_custom_css',
			__( 'Enable Custom CSS', 'elearnposh-amp' ),
			array( $this, 'render_checkbox_field' ),
			'elearnposh-amp',
			'elearnposh_amp_custom_css',
			array( 'field' => 'enable_custom_css', 'description' => __( 'Enable custom CSS for AMP pages.', 'elearnposh-amp' ) )
		);

		add_settings_field(
			'custom_css',
			__( 'Custom CSS', 'elearnposh-amp' ),
			array( $this, 'render_textarea_field' ),
			'elearnposh-amp',
			'elearnposh_amp_custom_css',
			array( 'field' => 'custom_css', 'description' => __( 'Add your custom CSS here. Note: AMP has a 75KB limit for inline styles.', 'elearnposh-amp' ) )
		);

		// ── ERPNext Integration ───────────────────────────────────────────────
		add_settings_section(
			'elearnposh_amp_erpnext',
			__( 'ERPNext Integration', 'elearnposh-amp' ),
			array( $this, 'render_erpnext_section' ),
			'elearnposh-amp'
		);

		add_settings_field(
			'erpnext_settings_link',
			__( 'ERPNext Credentials', 'elearnposh-amp' ),
			array( $this, 'render_erpnext_settings_link' ),
			'elearnposh-amp',
			'elearnposh_amp_erpnext'
		);

		// ── Email Configuration ───────────────────────────────────────────────
		add_settings_section(
			'elearnposh_amp_email',
			__( 'Email Configuration', 'elearnposh-amp' ),
			array( $this, 'render_email_section' ),
			'elearnposh-amp'
		);

		add_settings_field(
			'contact_email_recipients',
			__( 'Contact Form Recipients', 'elearnposh-amp' ),
			array( $this, 'render_admin_recipient_field' ),
			'elearnposh-amp',
			'elearnposh_amp_email',
			array( 'description' => __( 'One email address per line. All listed addresses receive contact form notifications.', 'elearnposh-amp' ) )
		);
	}

	/**
	 * Sanitize main settings (does NOT touch banner settings)
	 *
	 * @param array $input Input values.
	 * @return array Sanitized values.
	 */
	public function sanitize_settings( $input ) {
		$sanitized = array();

		// Sanitize page IDs
		$page_id_fields = array( 'newsletter_page_id', 'blog_page_id', 'contact_page_id', 'thankyou_page_id', 'terms_page_id', 'faq_page_id', 'privacy_page_id', 'press_media_page_id', 'enterprise_features_page_id', 'our_webinars_page_id', 'posh_act_page_id', 'home_page_id' );
		$existing = get_option( 'elearnposh_amp_settings', array() );
		foreach ( $page_id_fields as $field ) {
			if ( ! isset( $input[ $field ] ) ) {
				continue;
			}
			$value = absint( $input[ $field ] );
			// Do not save 0 — it breaks AMP page mapping; keep previous or default.
			if ( $value > 0 ) {
				$sanitized[ $field ] = $value;
			} elseif ( ! empty( $existing[ $field ] ) ) {
				$sanitized[ $field ] = absint( $existing[ $field ] );
			}
		}

		// Sanitize course IDs
		if ( isset( $input['course_page_ids'] ) && is_array( $input['course_page_ids'] ) ) {
			$sanitized['course_page_ids'] = array_map( 'absint', $input['course_page_ids'] );
		}

		// Sanitize boolean fields
		$sanitized['enable_custom_css'] = isset( $input['enable_custom_css'] ) ? true : false;

		// Sanitize CSS (strip tags but allow CSS)
		if ( isset( $input['custom_css'] ) ) {
			$sanitized['custom_css'] = wp_strip_all_tags( $input['custom_css'] );
		}

		// Preserve ERP credentials (managed in Settings → eLearnPOSH ERP).
		if ( ! empty( $existing['erpnext_api_url'] ) ) {
			$sanitized['erpnext_api_url'] = esc_url_raw( $existing['erpnext_api_url'] );
		}
		if ( ! empty( $existing['erpnext_api_key'] ) ) {
			$sanitized['erpnext_api_key'] = sanitize_text_field( $existing['erpnext_api_key'] );
		}

		if ( isset( $input['contact_email_recipients'] ) ) {
			$raw_recipients = $input['contact_email_recipients'];
			if ( is_string( $raw_recipients ) ) {
				$raw_recipients = preg_split( '/[\s,;]+/', $raw_recipients );
			}
			if ( is_array( $raw_recipients ) ) {
				$sanitized['contact_email_recipients'] = array_values(
					array_unique(
						array_filter(
							array_map( 'sanitize_email', $raw_recipients ),
							'is_email'
						)
					)
				);
			}
		}

		if ( empty( $sanitized['contact_email_recipients'] ) ) {
			$sanitized['contact_email_recipients'] = Email::get_default_admin_recipients();
		}

		// Preserve phone numbers and other arrays
		if ( isset( $input['phone_numbers'] ) ) {
			$sanitized['phone_numbers'] = $input['phone_numbers'];
		}

		return $sanitized;
	}

	// =========================================================================
	// WEBINAR BANNER SETTINGS REGISTRATION (separate option)
	// =========================================================================

	/**
	 * Register the Webinar Banner settings (stored in elearnposh_amp_banner_settings)
	 */
	public function register_banner_settings() {
		register_setting(
			'elearnposh_amp_banner_group',
			'elearnposh_amp_banner_settings',
			array(
				'sanitize_callback' => array( $this, 'sanitize_banner_settings' ),
			)
		);

		// Single section for the banner page
		add_settings_section(
			'ep_banner_main',
			'',
			'__return_false',
			'elearnposh-amp-banner'
		);

		// Enable / disable toggle
		add_settings_field(
			'webinar_banner_enabled',
			__( 'Enable Banner', 'elearnposh-amp' ),
			array( $this, 'render_banner_checkbox' ),
			'elearnposh-amp-banner',
			'ep_banner_main',
			array(
				'field'       => 'webinar_banner_enabled',
				'description' => __( 'Check to show the banner on every page. Uncheck to hide it between webinar seasons.', 'elearnposh-amp' ),
			)
		);

		// Banner text
		add_settings_field(
			'webinar_banner_text',
			__( 'Banner Text', 'elearnposh-amp' ),
			array( $this, 'render_banner_text_field' ),
			'elearnposh-amp-banner',
			'ep_banner_main',
			array(
				'field'       => 'webinar_banner_text',
				'description' => __( 'Main message in the banner. Basic HTML (bold, italic, etc.) is allowed.', 'elearnposh-amp' ),
			)
		);

		// Banner background colour
		add_settings_field(
			'webinar_banner_bg_color',
			__( 'Banner Background Colour', 'elearnposh-amp' ),
			array( $this, 'render_color_field' ),
			'elearnposh-amp-banner',
			'ep_banner_main',
			array(
				'field'       => 'webinar_banner_bg_color',
				'default'     => '#002a38',
				'description' => __( 'Background colour of the notification bar.', 'elearnposh-amp' ),
			)
		);

		// Primary button label
		add_settings_field(
			'webinar_banner_primary_btn_text',
			__( 'Primary Button Label', 'elearnposh-amp' ),
			array( $this, 'render_banner_text_input' ),
			'elearnposh-amp-banner',
			'ep_banner_main',
			array(
				'field'       => 'webinar_banner_primary_btn_text',
				'description' => __( 'Label for the primary button (white text, solid background). Leave blank to hide the button.', 'elearnposh-amp' ),
			)
		);

		// Primary button URL
		add_settings_field(
			'webinar_banner_primary_btn_url',
			__( 'Primary Button URL', 'elearnposh-amp' ),
			array( $this, 'render_banner_text_input' ),
			'elearnposh-amp-banner',
			'ep_banner_main',
			array(
				'field'       => 'webinar_banner_primary_btn_url',
				'description' => __( 'Destination URL. Button is only shown when both label and URL are filled.', 'elearnposh-amp' ),
			)
		);

		// Primary button background colour
		add_settings_field(
			'webinar_banner_primary_btn_color',
			__( 'Primary Button Colour', 'elearnposh-amp' ),
			array( $this, 'render_color_field' ),
			'elearnposh-amp-banner',
			'ep_banner_main',
			array(
				'field'       => 'webinar_banner_primary_btn_color',
				'default'     => '#fa8b05',
				'description' => __( 'Background colour of the primary button. Button text is always white.', 'elearnposh-amp' ),
			)
		);

		// Secondary button label
		add_settings_field(
			'webinar_banner_secondary_btn_text',
			__( 'Secondary Button Label', 'elearnposh-amp' ),
			array( $this, 'render_banner_text_input' ),
			'elearnposh-amp-banner',
			'ep_banner_main',
			array(
				'field'       => 'webinar_banner_secondary_btn_text',
				'description' => __( 'Label for the secondary button (outline style). Leave blank to hide the button.', 'elearnposh-amp' ),
			)
		);

		// Secondary button URL
		add_settings_field(
			'webinar_banner_secondary_btn_url',
			__( 'Secondary Button URL', 'elearnposh-amp' ),
			array( $this, 'render_banner_text_input' ),
			'elearnposh-amp-banner',
			'ep_banner_main',
			array(
				'field'       => 'webinar_banner_secondary_btn_url',
				'description' => __( 'Destination URL. Button is only shown when both label and URL are filled.', 'elearnposh-amp' ),
			)
		);

		// Secondary button background colour
		add_settings_field(
			'webinar_banner_secondary_btn_color',
			__( 'Secondary Button Colour', 'elearnposh-amp' ),
			array( $this, 'render_color_field' ),
			'elearnposh-amp-banner',
			'ep_banner_main',
			array(
				'field'       => 'webinar_banner_secondary_btn_color',
				'default'     => '#1a6b8a',
				'description' => __( 'Background colour of the secondary button. Button text is always white.', 'elearnposh-amp' ),
			)
		);

		// Excluded page IDs
		add_settings_field(
			'webinar_banner_excluded_ids',
			__( 'Hide Banner on These Pages', 'elearnposh-amp' ),
			array( $this, 'render_banner_excluded_ids_field' ),
			'elearnposh-amp-banner',
			'ep_banner_main',
			array(
				'field'       => 'webinar_banner_excluded_ids',
				'description' => __( 'Comma-separated page/post IDs where the banner should NOT appear. e.g. 21597, 300, 450', 'elearnposh-amp' ),
			)
		);

		// WhatsApp CTA Section Separator
		add_settings_section(
			'ep_whatsapp_cta',
			'<hr style="margin:30px 0 20px;"><h2 style="font-size:18px;margin:0 0 10px;">💬 ' . __( 'WhatsApp CTA Button', 'elearnposh-amp' ) . '</h2>',
			'__return_false',
			'elearnposh-amp-banner'
		);

		// WhatsApp CTA Enable / disable toggle
		add_settings_field(
			'whatsapp_cta_enabled',
			__( 'Enable WhatsApp Button', 'elearnposh-amp' ),
			array( $this, 'render_banner_checkbox' ),
			'elearnposh-amp-banner',
			'ep_whatsapp_cta',
			array(
				'field'       => 'whatsapp_cta_enabled',
				'description' => __( 'Check to show the WhatsApp button on mobile/tablet devices. The button appears in the bottom-right corner above the webinar banner.', 'elearnposh-amp' ),
			)
		);

		// WhatsApp phone number
		add_settings_field(
			'whatsapp_cta_phone',
			__( 'WhatsApp Phone Number', 'elearnposh-amp' ),
			array( $this, 'render_banner_text_input' ),
			'elearnposh-amp-banner',
			'ep_whatsapp_cta',
			array(
				'field'       => 'whatsapp_cta_phone',
				'description' => __( 'Enter WhatsApp number with country code (no + or spaces). Example: 919036837674 for +91-90368 37674', 'elearnposh-amp' ),
			)
		);

		// WhatsApp default message
		add_settings_field(
			'whatsapp_cta_message',
			__( 'Default Message', 'elearnposh-amp' ),
			array( $this, 'render_banner_text_field' ),
			'elearnposh-amp-banner',
			'ep_whatsapp_cta',
			array(
				'field'       => 'whatsapp_cta_message',
				'description' => __( 'Default message that will be pre-filled when users click the WhatsApp button. This message will appear in their WhatsApp chat.', 'elearnposh-amp' ),
			)
		);
	}

	/**
	 * Sanitize Webinar Banner settings
	 *
	 * @param array $input Input values.
	 * @return array Sanitized values.
	 */
	public function sanitize_banner_settings( $input ) {
		$existing  = get_option( 'elearnposh_amp_banner_settings', array() );
		$sanitized = is_array( $existing ) ? $existing : array();

		// Toggle (unchecked checkboxes are omitted from POST).
		$sanitized['webinar_banner_enabled'] = ! empty( $input['webinar_banner_enabled'] );

		// Rich text (allows basic HTML tags)
		if ( isset( $input['webinar_banner_text'] ) ) {
			$sanitized['webinar_banner_text'] = wp_kses_post( $input['webinar_banner_text'] );
		}

		// Plain-text button labels
		foreach ( array( 'webinar_banner_primary_btn_text', 'webinar_banner_secondary_btn_text' ) as $field ) {
			if ( isset( $input[ $field ] ) ) {
				$sanitized[ $field ] = sanitize_text_field( $input[ $field ] );
			}
		}

		// URLs
		foreach ( array( 'webinar_banner_primary_btn_url', 'webinar_banner_secondary_btn_url' ) as $field ) {
			if ( isset( $input[ $field ] ) ) {
				$sanitized[ $field ] = esc_url_raw( $input[ $field ] );
			}
		}

		// Excluded page IDs — store as a clean array of integers
		if ( isset( $input['webinar_banner_excluded_ids'] ) ) {
			$raw_ids = explode( ',', $input['webinar_banner_excluded_ids'] );
			$raw_ids = array_map( 'trim', $raw_ids );
			$raw_ids = array_filter( $raw_ids, 'is_numeric' );
			$sanitized['webinar_banner_excluded_ids'] = array_values( array_map( 'absint', $raw_ids ) );
		}

		// Hex colours — sanitize_hex_color returns '' for invalid values; fall back to default
		$color_defaults = array(
			'webinar_banner_bg_color'            => '#002a38',
			'webinar_banner_primary_btn_color'   => '#fa8b05',
			'webinar_banner_secondary_btn_color' => '#1a6b8a',
		);
		foreach ( $color_defaults as $field => $default ) {
			$raw   = isset( $input[ $field ] ) ? $input[ $field ] : '';
			$clean = sanitize_hex_color( $raw );
			$sanitized[ $field ] = $clean ? $clean : $default;
		}

		// WhatsApp CTA settings
		$sanitized['whatsapp_cta_enabled'] = ! empty( $input['whatsapp_cta_enabled'] );
		
		if ( isset( $input['whatsapp_cta_phone'] ) ) {
			// Remove all non-numeric characters
			$phone = preg_replace( '/[^0-9]/', '', $input['whatsapp_cta_phone'] );
			$sanitized['whatsapp_cta_phone'] = sanitize_text_field( $phone );
		}

		if ( isset( $input['whatsapp_cta_message'] ) ) {
			// Allow basic HTML and sanitize
			$sanitized['whatsapp_cta_message'] = sanitize_textarea_field( $input['whatsapp_cta_message'] );
		}

		return $sanitized;
	}

	// =========================================================================
	// PAGE RENDERERS
	// =========================================================================

	/**
	 * Render main admin page
	 */
	public function render_admin_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

			<div class="notice notice-info">
				<p>
					<strong><?php esc_html_e( 'Plugin Version:', 'elearnposh-amp' ); ?></strong>
					<?php echo esc_html( ELEARNPOSH_AMP_VERSION ); ?>
				</p>
				<p>
					<?php esc_html_e( 'This is the modern, AMP-compliant version of the eLearnPOSH AMP plugin. All templates follow the latest AMP HTML standards.', 'elearnposh-amp' ); ?>
				</p>
				<p>
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=elearnposh-amp-banner' ) ); ?>" class="button button-secondary">
						📢 <?php esc_html_e( 'Manage Webinar Banner →', 'elearnposh-amp' ); ?>
					</a>
				</p>
			</div>

			<form action="options.php" method="post">
				<?php
				settings_fields( 'elearnposh_amp_settings_group' );
				do_settings_sections( 'elearnposh-amp' );
				submit_button( __( 'Save Settings', 'elearnposh-amp' ) );
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Render Webinar Banner dedicated admin page
	 */
	public function render_webinar_banner_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		// Load saved banner settings for the live preview
		$banner   = get_option( 'elearnposh_amp_banner_settings', array() );
		$enabled  = ! empty( $banner['webinar_banner_enabled'] );
		$text     = isset( $banner['webinar_banner_text'] ) ? $banner['webinar_banner_text'] : '';
		$p_label  = isset( $banner['webinar_banner_primary_btn_text'] ) ? $banner['webinar_banner_primary_btn_text'] : '';
		$p_url    = isset( $banner['webinar_banner_primary_btn_url'] ) ? $banner['webinar_banner_primary_btn_url'] : '#';
		$s_label  = isset( $banner['webinar_banner_secondary_btn_text'] ) ? $banner['webinar_banner_secondary_btn_text'] : '';
		$s_url    = isset( $banner['webinar_banner_secondary_btn_url'] ) ? $banner['webinar_banner_secondary_btn_url'] : '#';
		$bg_color = isset( $banner['webinar_banner_bg_color'] ) && $banner['webinar_banner_bg_color'] ? $banner['webinar_banner_bg_color'] : '#002a38';
		$p_color  = isset( $banner['webinar_banner_primary_btn_color'] ) && $banner['webinar_banner_primary_btn_color'] ? $banner['webinar_banner_primary_btn_color'] : '#fa8b05';
		$s_color  = isset( $banner['webinar_banner_secondary_btn_color'] ) && $banner['webinar_banner_secondary_btn_color'] ? $banner['webinar_banner_secondary_btn_color'] : '#1a6b8a';

		$show_primary   = ( ! empty( $p_label ) && ! empty( $p_url ) );
		$show_secondary = ( ! empty( $s_label ) && ! empty( $s_url ) );

		// WhatsApp CTA settings
		$whatsapp_enabled = ! empty( $banner['whatsapp_cta_enabled'] );
		$whatsapp_phone   = isset( $banner['whatsapp_cta_phone'] ) ? $banner['whatsapp_cta_phone'] : '919036837674';
		$whatsapp_message = isset( $banner['whatsapp_cta_message'] ) ? $banner['whatsapp_cta_message'] : 'Hi, I am interested in eLearnPOSH courses';
		?>
		<div class="wrap">
			<h1>
				📢 <?php esc_html_e( 'Webinar Notification Banner', 'elearnposh-amp' ); ?>
			</h1>
			<p class="description" style="font-size:14px;margin-bottom:20px;">
				<?php esc_html_e( 'This banner sticks to the bottom of every page on your site. Use it during webinar seasons (typically twice a year) and switch it off when no webinar is running.', 'elearnposh-amp' ); ?>
			</p>

			<?php if ( $enabled ) : ?>
			<div class="notice notice-success" style="display:inline-block;padding:6px 14px;">
				<p>✅ <strong><?php esc_html_e( 'Banner is currently LIVE on all pages.', 'elearnposh-amp' ); ?></strong></p>
			</div>
			<?php else : ?>
			<div class="notice notice-warning" style="display:inline-block;padding:6px 14px;">
				<p>⏸️ <strong><?php esc_html_e( 'Banner is currently disabled.', 'elearnposh-amp' ); ?></strong></p>
			</div>
			<?php endif; ?>

			<!-- Live Preview -->
			<div style="margin:24px 0 28px;">
				<h2 style="font-size:14px;text-transform:uppercase;letter-spacing:.5px;color:#666;margin-bottom:10px;">
					<?php esc_html_e( 'Preview', 'elearnposh-amp' ); ?>
				</h2>
				<div
					id="ep-banner-preview"
					style="
						background:<?php echo esc_attr( $bg_color ); ?>;
						color:#fff;
						padding:14px 20px;
						border-radius:6px;
						display:flex;
						align-items:center;
						justify-content:space-between;
						flex-wrap:wrap;
						gap:10px;
						box-shadow:0 4px 12px rgba(0,0,0,0.2);
					"
				>
					<p id="ep-preview-text" style="margin:0;font-size:14px;line-height:1.5;color:#fff;flex:1;min-width:160px;">
						<?php echo wp_kses_post( $text ? $text : __( '(Your banner text will appear here)', 'elearnposh-amp' ) ); ?>
					</p>
					<div style="display:flex;gap:8px;flex-wrap:wrap;">
						<?php if ( $show_primary ) : ?>
						<a
							href="<?php echo esc_url( $p_url ); ?>"
							id="ep-preview-primary"
							style="
								display:inline-block;
								background:<?php echo esc_attr( $p_color ); ?>;
								color:#ffffff;
								padding:9px 18px;
								border-radius:5px;
								font-size:13px;
								font-weight:700;
								text-decoration:none;
								white-space:nowrap;
								border:2px solid <?php echo esc_attr( $p_color ); ?>;
							"
						>
							<?php echo esc_html( $p_label ); ?>
						</a>
						<?php endif; ?>
						<?php if ( $show_secondary ) : ?>
						<a
							href="<?php echo esc_url( $s_url ); ?>"
							id="ep-preview-secondary"
							style="
								display:inline-block;
								background:<?php echo esc_attr( $s_color ); ?>;
								color:#ffffff;
								padding:9px 18px;
								border-radius:5px;
								font-size:13px;
								font-weight:700;
								text-decoration:none;
								white-space:nowrap;
								border:2px solid <?php echo esc_attr( $s_color ); ?>;
							"
						>
							<?php echo esc_html( $s_label ); ?>
						</a>
						<?php endif; ?>
					</div>
				</div>
				<p style="font-size:12px;color:#999;margin-top:6px;">
					<?php esc_html_e( '↑ Preview updates live as you change colours below. Buttons only appear when both label and URL are saved.', 'elearnposh-amp' ); ?>
				</p>
			</div>

			<!-- WhatsApp CTA Status -->
			<?php if ( $whatsapp_enabled ) : ?>
			<div class="notice notice-info" style="margin:20px 0;">
				<p>💬 <strong><?php esc_html_e( 'WhatsApp CTA is currently ENABLED.', 'elearnposh-amp' ); ?></strong> 
				<?php if ( ! empty( $whatsapp_phone ) ) : ?>
					<?php esc_html_e( 'Phone:', 'elearnposh-amp' ); ?> <code><?php echo esc_html( $whatsapp_phone ); ?></code>
				<?php endif; ?>
				<?php if ( ! empty( $whatsapp_message ) ) : ?>
					<br><?php esc_html_e( 'Default Message:', 'elearnposh-amp' ); ?> <em><?php echo esc_html( $whatsapp_message ); ?></em>
				<?php endif; ?>
				</p>
			</div>
			<?php else : ?>
			<div class="notice notice-warning" style="margin:20px 0;">
				<p>⏸️ <strong><?php esc_html_e( 'WhatsApp CTA is currently DISABLED.', 'elearnposh-amp' ); ?></strong></p>
			</div>
			<?php endif; ?>

			<!-- Settings Form -->
			<form action="options.php" method="post">
				<?php
				settings_fields( 'elearnposh_amp_banner_group' );
				do_settings_sections( 'elearnposh-amp-banner' );
				submit_button( __( 'Save Banner Settings', 'elearnposh-amp' ) );
				?>
			</form>
		</div>
		<?php
	}

	// =========================================================================
	// SECTION DESCRIPTION RENDERERS
	// =========================================================================

	/**
	 * Render page IDs section description
	 */
	public function render_page_ids_section() {
		echo '<p>' . esc_html__( 'Configure the page IDs for different templates. These IDs determine which custom AMP template to use.', 'elearnposh-amp' ) . '</p>';
	}

	/**
	 * Render custom CSS section description
	 */
	public function render_custom_css_section() {
		echo '<p>' . esc_html__( 'Add custom CSS to override default styles. Note: AMP has a 75KB inline CSS limit.', 'elearnposh-amp' ) . '</p>';
	}

	/**
	 * Render ERPNext section description
	 */
	public function render_erpnext_section() {
		echo '<p>' . esc_html__( 'ERPNext credentials and sync status are managed centrally for all contact forms.', 'elearnposh-amp' ) . '</p>';
	}

	/**
	 * Link to Settings → eLearnPOSH ERP (canonical credential store).
	 */
	public function render_erpnext_settings_link() {
		$url    = admin_url( 'options-general.php?page=elearnposh-erp' );
		$sync   = admin_url( 'admin.php?page=eperpsync' );
		$active = function_exists( 'elearnposh_get_erp_api_url' ) ? elearnposh_get_erp_api_url() : '';
		?>
		<p>
			<a class="button button-secondary" href="<?php echo esc_url( $url ); ?>"><?php esc_html_e( 'Open eLearnPOSH ERP Settings', 'elearnposh-amp' ); ?></a>
			<a class="button button-link" href="<?php echo esc_url( $sync ); ?>"><?php esc_html_e( 'ERP Sync Status', 'elearnposh-amp' ); ?></a>
		</p>
		<?php if ( $active ) : ?>
			<p class="description">
				<?php
				printf(
					/* translators: %s: active ERP API URL */
					esc_html__( 'Active endpoint: %s', 'elearnposh-amp' ),
					esc_html( $active )
				);
				?>
			</p>
		<?php endif; ?>
		<?php
	}

	/**
	 * Render email section description
	 */
	public function render_email_section() {
		echo '<p>' . esc_html__( 'Contact form emails use WordPress wp_mail (POST SMTP). Admin notifications go to all recipients listed below; users receive a confirmation email with the brochure when possible.', 'elearnposh-amp' ) . '</p>';
	}

	/**
	 * Render admin notification recipients.
	 *
	 * @param array $args Field arguments.
	 */
	public function render_admin_recipient_field( $args ) {
		$settings   = $this->config->get_all();
		$recipients = isset( $settings['contact_email_recipients'] ) && is_array( $settings['contact_email_recipients'] )
			? $settings['contact_email_recipients']
			: Email::get_default_admin_recipients();
		?>
		<textarea
			name="elearnposh_amp_settings[contact_email_recipients]"
			class="large-text code"
			rows="12"
			cols="50"
		><?php echo esc_textarea( implode( "\n", $recipients ) ); ?></textarea>
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="description"><?php echo esc_html( $args['description'] ); ?></p>
		<?php endif; ?>
		<?php
	}

	// =========================================================================
	// FIELD RENDERERS — MAIN SETTINGS
	// =========================================================================

	/**
	 * Render number input field
	 *
	 * @param array $args Field arguments.
	 */
	public function render_number_field( $args ) {
		$settings = $this->config->get_all();
		$field    = $args['field'];
		$value    = isset( $settings[ $field ] ) ? $settings[ $field ] : '';
		?>
		<input type="number"
			   name="elearnposh_amp_settings[<?php echo esc_attr( $field ); ?>]"
			   value="<?php echo esc_attr( $value ); ?>"
			   class="regular-text" />
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="description"><?php echo esc_html( $args['description'] ); ?></p>
		<?php endif; ?>
		<?php
	}

	/**
	 * Render checkbox field (main settings)
	 *
	 * @param array $args Field arguments.
	 */
	public function render_checkbox_field( $args ) {
		$settings = $this->config->get_all();
		$field    = $args['field'];
		$value    = isset( $settings[ $field ] ) ? $settings[ $field ] : false;
		?>
		<label>
			<input type="checkbox"
				   name="elearnposh_amp_settings[<?php echo esc_attr( $field ); ?>]"
				   value="1"
				   <?php checked( $value, true ); ?> />
			<?php echo esc_html( $args['description'] ); ?>
		</label>
		<?php
	}

	/**
	 * Render textarea field
	 *
	 * @param array $args Field arguments.
	 */
	public function render_textarea_field( $args ) {
		$settings = $this->config->get_all();
		$field    = $args['field'];
		$value    = isset( $settings[ $field ] ) ? $settings[ $field ] : '';

		// Handle array values (like email recipients)
		if ( is_array( $value ) ) {
			$value = implode( "\n", $value );
		}
		?>
		<textarea name="elearnposh_amp_settings[<?php echo esc_attr( $field ); ?>]"
				  rows="10"
				  class="large-text code"><?php echo esc_textarea( $value ); ?></textarea>
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="description"><?php echo esc_html( $args['description'] ); ?></p>
		<?php endif; ?>
		<?php
	}

	/**
	 * Render text input field (main settings)
	 *
	 * @param array $args Field arguments.
	 */
	public function render_text_field( $args ) {
		$settings = $this->config->get_all();
		$field    = $args['field'];
		$value    = isset( $settings[ $field ] ) ? $settings[ $field ] : '';
		$type     = isset( $args['type'] ) ? $args['type'] : 'text';
		?>
		<input type="<?php echo esc_attr( $type ); ?>"
			   name="elearnposh_amp_settings[<?php echo esc_attr( $field ); ?>]"
			   value="<?php echo esc_attr( $value ); ?>"
			   class="regular-text" />
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="description"><?php echo esc_html( $args['description'] ); ?></p>
		<?php endif; ?>
		<?php
	}

	// =========================================================================
	// FIELD RENDERERS — WEBINAR BANNER SETTINGS
	// All use the elearnposh_amp_banner_settings option key
	// =========================================================================

	/**
	 * Helper: get a banner setting value from the separate banner option
	 *
	 * @param string $field   Field key.
	 * @param mixed  $default Fallback.
	 * @return mixed
	 */
	private function get_banner_value( $field, $default = '' ) {
		$banner = get_option( 'elearnposh_amp_banner_settings', array() );
		return isset( $banner[ $field ] ) ? $banner[ $field ] : $default;
	}

	/**
	 * Render banner enable/disable checkbox
	 *
	 * @param array $args Field arguments.
	 */
	public function render_banner_checkbox( $args ) {
		$field = $args['field'];
		$value = $this->get_banner_value( $field, false );
		?>
		<label style="display:flex;align-items:center;gap:8px;font-size:14px;">
			<input type="checkbox"
				   name="elearnposh_amp_banner_settings[<?php echo esc_attr( $field ); ?>]"
				   value="1"
				   <?php checked( $value, true ); ?>
				   style="width:18px;height:18px;" />
			<span><?php echo esc_html( $args['description'] ); ?></span>
		</label>
		<?php
	}

	/**
	 * Render banner text textarea (allows basic HTML)
	 *
	 * @param array $args Field arguments.
	 */
	public function render_banner_text_field( $args ) {
		$field = $args['field'];
		$value = $this->get_banner_value( $field, '' );
		?>
		<textarea
			name="elearnposh_amp_banner_settings[<?php echo esc_attr( $field ); ?>]"
			rows="3"
			class="large-text"
			placeholder="<?php esc_attr_e( 'e.g. 🔴 Live POSH Webinar on 25 Mar — seats filling fast!', 'elearnposh-amp' ); ?>"
		><?php echo esc_textarea( $value ); ?></textarea>
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="description"><?php echo esc_html( $args['description'] ); ?></p>
		<?php endif; ?>
		<?php
	}

	/**
	 * Render a plain text input for banner button labels / URLs
	 *
	 * @param array $args Field arguments.
	 */
	public function render_banner_text_input( $args ) {
		$field = $args['field'];
		$value = $this->get_banner_value( $field, '' );
		?>
		<input type="text"
			   name="elearnposh_amp_banner_settings[<?php echo esc_attr( $field ); ?>]"
			   value="<?php echo esc_attr( $value ); ?>"
			   class="regular-text"
			   style="width:400px;" />
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="description"><?php echo esc_html( $args['description'] ); ?></p>
		<?php endif; ?>
		<?php
	}

	/**
	 * Render the "exclude banner from pages" text input
	 *
	 * @param array $args Field arguments.
	 */
	public function render_banner_excluded_ids_field( $args ) {
		$field  = $args['field'];
		$raw    = $this->get_banner_value( $field, array() );

		// Stored as array of ints; display as comma-separated string
		if ( is_array( $raw ) ) {
			$display = implode( ', ', $raw );
		} else {
			$display = sanitize_text_field( (string) $raw );
		}
		?>
		<input type="text"
			   name="elearnposh_amp_banner_settings[<?php echo esc_attr( $field ); ?>]"
			   value="<?php echo esc_attr( $display ); ?>"
			   class="regular-text"
			   style="width:400px;"
			   placeholder="<?php esc_attr_e( 'e.g. 21597, 300, 450', 'elearnposh-amp' ); ?>" />
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="description"><?php echo esc_html( $args['description'] ); ?></p>
		<?php endif; ?>
		<?php
	}

	/**
	 * Render a colour picker input (uses WP Iris colour picker)
	 *
	 * @param array $args Field arguments.
	 */
	public function render_color_field( $args ) {
		$field   = $args['field'];
		$default = isset( $args['default'] ) ? $args['default'] : '#000000';
		$value   = $this->get_banner_value( $field, $default );
		if ( ! $value ) {
			$value = $default;
		}
		?>
		<input type="text"
			   name="elearnposh_amp_banner_settings[<?php echo esc_attr( $field ); ?>]"
			   value="<?php echo esc_attr( $value ); ?>"
			   class="ep-color-picker"
			   data-default-color="<?php echo esc_attr( $default ); ?>"
			   data-target="<?php echo esc_attr( $field ); ?>" />
		<?php if ( ! empty( $args['description'] ) ) : ?>
			<p class="description"><?php echo esc_html( $args['description'] ); ?></p>
		<?php endif; ?>
		<?php
	}

	// =========================================================================
	// ASSETS
	// =========================================================================

	/**
	 * Enqueue admin assets for both the main page and the banner page
	 *
	 * @param string $hook Current admin page hook.
	 */
	public function enqueue_admin_assets( $hook ) {
		// Main settings page
		$main_hook   = 'toplevel_page_elearnposh-amp';
		// Banner submenu page — WP generates the hook as: {parent_slug}_page_{page_slug}
		$banner_hook = 'elearnposh-amp_page_elearnposh-amp-banner';

		if ( $main_hook !== $hook && $banner_hook !== $hook ) {
			return;
		}

		// Enqueue WP Iris colour picker
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );

		// Inline JS: initialise colour pickers + live-preview updates
		$inline_js = <<<'JS'
jQuery(function ($) {
	// Map each colour picker field to a preview element / CSS property
	var previewMap = {
		webinar_banner_bg_color:            { target: '#ep-banner-preview', prop: 'background' },
		webinar_banner_primary_btn_color:   { target: '#ep-preview-primary',   prop: 'background' },
		webinar_banner_secondary_btn_color: { target: '#ep-preview-secondary',  prop: 'background' }
	};

	$('.ep-color-picker').each(function () {
		var $input   = $(this);
		var fieldKey = $input.data('target');

		$input.wpColorPicker({
			change: function (event, ui) {
				var colour = ui.color.toString();
				if (previewMap[fieldKey]) {
					var info = previewMap[fieldKey];
					$(info.target).css(info.prop, colour);
					// Also update the border on button previews to match bg
					if (info.target !== '#ep-banner-preview') {
						$(info.target).css('border-color', colour);
					}
				}
			}
		});
	});
});
JS;
		wp_add_inline_script( 'wp-color-picker', $inline_js );
	}
}
