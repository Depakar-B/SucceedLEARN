<?php
/**
 * Plugin Name: ESG India Contact Form
 * Description: AJAX powered contact form with UTM capture, email notifications, and submission dashboard.
 * Version: 1.0.0
 * Author: ESG India
 * Text Domain: esg-india-contact-form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class ESG_India_Contact_Form_Plugin {
	const VERSION = '1.0.0';
	const OPTION_KEY = 'esg_india_contact_form_settings';
	const WEEKLY_REPORT_HOOK = 'esg_india_contact_form_send_weekly_report';

	/**
	 * Singleton instance.
	 *
	 * @var ESG_India_Contact_Form_Plugin|null
	 */
	private static $instance = null;

	/**
	 * Table name cache.
	 *
	 * @var string|null
	 */
	private $table_name = null;

	/**
	 * Get singleton instance.
	 *
	 * @return ESG_India_Contact_Form_Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		add_action( 'init', array( $this, 'register_shortcodes' ) );
		add_action( 'init', array( $this, 'maybe_update_schema' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'wp_ajax_esg_india_contact_form_submit_form', array( $this, 'handle_form_submission' ) );
		add_action( 'wp_ajax_nopriv_esg_india_contact_form_submit_form', array( $this, 'handle_form_submission' ) );
		add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'maybe_export_csv' ) );
		add_action( 'admin_init', array( $this, 'maybe_send_weekly_report_manual' ) );
		add_action( 'wp_head', array( $this, 'add_amp_scripts' ) );
		add_action( 'init', array( $this, 'maybe_schedule_weekly_report' ) );
		add_action( self::WEEKLY_REPORT_HOOK, array( $this, 'send_weekly_report' ) );
	}

	/**
	 * Plugin activation callback.
	 */
	public function activate() {
		global $wpdb;

		$table_name      = $this->get_table_name();
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE {$table_name} (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL,
			email VARCHAR(255) NOT NULL,
			organization VARCHAR(255) DEFAULT '',
			message TEXT,
			privacy_accepted TINYINT(1) DEFAULT 0,
			utm_source VARCHAR(255) DEFAULT '',
			utm_medium VARCHAR(255) DEFAULT '',
			utm_campaign VARCHAR(255) DEFAULT '',
			utm_term VARCHAR(255) DEFAULT '',
			utm_content VARCHAR(255) DEFAULT '',
			source_tag VARCHAR(100) DEFAULT '',
			page_url TEXT,
			user_ip VARCHAR(100) DEFAULT '',
			user_agent TEXT,
			created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (id),
			KEY email (email),
			KEY created_at (created_at)
		) {$charset_collate};";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );

		$this->maybe_schedule_weekly_report();
	}

	/**
	 * Plugin deactivation callback.
	 */
	public function deactivate() {
		$this->clear_weekly_report_schedule();
	}

	/**
	 * Return database table name.
	 *
	 * @return string
	 */
	private function get_table_name() {
		global $wpdb;

		if ( null === $this->table_name ) {
			$this->table_name = "{$wpdb->prefix}esg_india_contact_form_submissions";
		}

		return $this->table_name;
	}

	/**
	 * Add missing columns when plugin updates.
	 */
	public function maybe_update_schema() {
		global $wpdb;

		$table_name = $this->get_table_name();

		$table_exists = $wpdb->get_var(
			$wpdb->prepare( 'SHOW TABLES LIKE %s', $table_name )
		);

		if ( $table_exists !== $table_name ) {
			return;
		}

		$column_exists = $wpdb->get_var(
			$wpdb->prepare(
				"SHOW COLUMNS FROM {$table_name} LIKE %s",
				'source_tag'
			)
		);

		if ( ! $column_exists ) {
			$wpdb->query(
				"ALTER TABLE {$table_name} ADD source_tag VARCHAR(100) DEFAULT '' AFTER utm_content"
			);
		}
	}

	/**
	 * Register shortcode.
	 */
	public function register_shortcodes() {
		add_shortcode( 'esg-india-contact-form', array( $this, 'render_form' ) );
	}

	/**
	 * Enqueue front-end assets.
	 */
	/**
	 * Add AMP component scripts to head.
	 */
	public function add_amp_scripts() {
		if ( ! $this->is_amp() ) {
			return;
		}

		global $post;
		$post_content = $post ? $post->post_content : '';
		
		if ( ! has_shortcode( $post_content, 'esg-india-contact-form' ) ) {
			return;
		}

		$settings = get_option( self::OPTION_KEY, array() );
		$recaptcha_site_key = ! empty( $settings['recaptcha_site_key'] ) ? $settings['recaptcha_site_key'] : '';
		?>
		<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
		<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
		<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
		<?php if ( ! empty( $recaptcha_site_key ) ) : ?>
		<script async custom-element="amp-recaptcha-input" src="https://cdn.ampproject.org/v0/amp-recaptcha-input-0.1.js"></script>
		<?php endif; ?>
		<?php
	}

	public function enqueue_assets() {
		// Don't enqueue JS/CSS on AMP pages
		if ( $this->is_amp() ) {
			return;
		}

		if ( ! is_singular() ) {
			return;
		}

		global $post;
		$post_content = $post ? $post->post_content : '';

		if ( has_shortcode( $post_content, 'esg-india-contact-form' ) ) {
			wp_enqueue_style(
				'esg-india-contact-form-form',
				plugins_url( 'assets/css/esg-india-contact-form.css', __FILE__ ),
				array(),
				self::VERSION
			);

			wp_enqueue_script(
				'esg-india-contact-form-form',
				plugins_url( 'assets/js/esg-india-contact-form.js', __FILE__ ),
				array(),
				self::VERSION,
				true
			);

			$settings = get_option( self::OPTION_KEY, array() );
			$recaptcha_site_key = ! empty( $settings['recaptcha_site_key'] ) ? $settings['recaptcha_site_key'] : '';
			
			// Enqueue reCAPTCHA v3 if enabled
			if ( ! empty( $recaptcha_site_key ) ) {
				wp_enqueue_script(
					'google-recaptcha',
					'https://www.google.com/recaptcha/api.js?render=' . esc_attr( $recaptcha_site_key ),
					array(),
					null,
					true
				);
			}

			wp_localize_script(
				'esg-india-contact-form-form',
				'ESG_INDIA_CONTACT_FORM',
				array(
					'ajaxUrl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'esg_india_contact_form_submit' ),
					'recaptchaSiteKey' => $recaptcha_site_key,
					'messages' => array(
						'success' => __( 'Thank you! ESG India team will contact you soon.', 'esg-india-contact-form' ),
						'error'   => __( 'Something went wrong. Please try again.', 'esg-india-contact-form' ),
						'privacy' => __( 'You must accept the privacy policy.', 'esg-india-contact-form' ),
						'bot'     => __( 'Bot detected. Submission rejected.', 'esg-india-contact-form' ),
					),
				)
			);
		}
	}

	/**
	 * Check if current page is AMP.
	 *
	 * @return bool
	 */
	private function is_amp() {
		// Check for AMP plugin
		if ( function_exists( 'is_amp_endpoint' ) ) {
			return is_amp_endpoint();
		}
		// Check for query var
		if ( isset( $_GET['amp'] ) && '1' === $_GET['amp'] ) {
			return true;
		}
		// Check URL structure
		if ( isset( $_SERVER['REQUEST_URI'] ) && strpos( $_SERVER['REQUEST_URI'], '/amp/' ) !== false ) {
			return true;
		}
		return false;
	}

	/**
	 * Determine source tag based on URL/slug.
	 *
	 * @param string $page_url Page URL.
	 *
	 * @return string
	 */
	private function determine_source_tag( $page_url = '' ) {
		$path = $this->extract_path_from_url( $page_url );
		$tag = '';

		if ( '' === $path || 'home' === $path ) {
			$tag = 'ESG India HomePage';
		}
		elseif ( preg_match( '/(course|courses|lp-course|lp-courses)/i', $path ) ) {
			$tag = 'ESG India InfoSEC';
		}
		elseif ( false !== strpos( $path, 'blog' ) || false !== strpos( $path, 'news' ) ) {
			$tag = 'ESG India Blog';
		}
		elseif ( false !== strpos( $path, 'contact' ) ) {
			$tag = 'ESG India ContactUs';
		}
		else {
			$tag = 'ESG India Others';
		}

		return apply_filters( 'esg_india_contact_form_source_tag', $tag, $path, $page_url );
	}

	/**
	 * Extract and normalize the request path from a URL.
	 *
	 * @param string $page_url Page URL.
	 *
	 * @return string
	 */
	private function extract_path_from_url( $page_url = '' ) {
		$target_url = $page_url;

		if ( empty( $target_url ) && isset( $_SERVER['REQUEST_URI'] ) ) {
			$target_url = home_url( $_SERVER['REQUEST_URI'] );
		}

		if ( empty( $target_url ) ) {
			return '';
		}

		$parsed = wp_parse_url( $target_url );
		if ( empty( $parsed['path'] ) ) {
			return '';
		}

		return strtolower( trim( $parsed['path'], '/' ) );
	}

	/**
	 * Render form shortcode.
	 *
	 * @return string
	 */
	public function render_form() {
		// Render AMP form if on AMP page
		if ( $this->is_amp() ) {
			return $this->render_amp_form();
		}
		
		ob_start();
		$privacy_url = get_privacy_policy_url();
		
		$source_tag = $this->determine_source_tag();

		// Generate math captcha (10-20 + 10-20)
		$captcha_a = rand( 10, 20 );
		$captcha_b = rand( 10, 20 );
		
		// Generate server-side form token
		$form_token = $this->generate_form_token();
		
		// Generate random honeypot field names to make them harder to detect
		$honeypot_names = array(
			'website' => 'website_' . wp_generate_password( 6, false ),
			'company' => 'company_' . wp_generate_password( 6, false ),
			'url' => 'url_' . wp_generate_password( 6, false ),
		);
		
		// Store honeypot names in transient for validation
		set_transient( 'esg_india_contact_form_honeypots_' . md5( $form_token ), $honeypot_names, 3600 );
		?>
		<form id="esg-india-contact-form-form" class="esg-india-contact-form-form" method="post">
			<input type="hidden" name="esg_india_contact_form_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
			<input type="hidden" name="esg_india_contact_form_form_time" value="<?php echo esc_attr( time() ); ?>" />
			<input type="hidden" name="source_tag" value="<?php echo esc_attr( $source_tag ); ?>" />
			
			<!-- Multiple Honeypot fields - hidden from users but bots will fill them -->
			<div class="esg-india-contact-form-honeypot">
				<label for="esg-india-contact-form-website"><?php esc_html_e( 'Website', 'esg-india-contact-form' ); ?></label>
				<input type="text" id="esg-india-contact-form-website" name="<?php echo esc_attr( $honeypot_names['website'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div class="esg-india-contact-form-honeypot">
				<label for="esg-india-contact-form-company"><?php esc_html_e( 'Company URL', 'esg-india-contact-form' ); ?></label>
				<input type="text" id="esg-india-contact-form-company" name="<?php echo esc_attr( $honeypot_names['company'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div class="esg-india-contact-form-honeypot">
				<label for="esg-india-contact-form-url"><?php esc_html_e( 'Your URL', 'esg-india-contact-form' ); ?></label>
				<input type="url" id="esg-india-contact-form-url" name="<?php echo esc_attr( $honeypot_names['url'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div class="esg-india-contact-form-field">
				<label for="esg-india-contact-form-name"><?php esc_html_e( 'Full Name', 'esg-india-contact-form' ); ?> <span class="esg-india-contact-form-required">*</span></label>
				<input type="text" id="esg-india-contact-form-name" name="name" required />
				<span class="esg-india-contact-form-error-message"></span>
			</div>
			<div class="esg-india-contact-form-field">
				<label for="esg-india-contact-form-email"><?php esc_html_e( 'Organization Email', 'esg-india-contact-form' ); ?> <span class="esg-india-contact-form-required">*</span></label>
				<input type="email" id="esg-india-contact-form-email" name="email" required />
				<span class="esg-india-contact-form-error-message"></span>
			</div>
			<div class="esg-india-contact-form-field">
				<label for="esg-india-contact-form-organization"><?php esc_html_e( 'Organization', 'esg-india-contact-form' ); ?> <span class="esg-india-contact-form-required">*</span></label>
				<input type="text" id="esg-india-contact-form-organization" name="organization" required />
				<span class="esg-india-contact-form-error-message"></span>
			</div>
			<div class="esg-india-contact-form-field">
				<label for="esg-india-contact-form-message"><?php esc_html_e( 'Your Message', 'esg-india-contact-form' ); ?></label>
				<textarea id="esg-india-contact-form-message" name="message" rows="4"></textarea>
				<span class="esg-india-contact-form-error-message"></span>
			</div>
			<div class="esg-india-contact-form-field esg-india-contact-form-checkbox">
				<input type="checkbox" id="esg-india-contact-form-privacy" name="privacy" value="1" required />
				<label for="esg-india-contact-form-privacy">
					<?php
					printf(
						wp_kses(
							/* translators: %s privacy policy url */
							__( 'I Accept <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'esg-india-contact-form' ),
							array(
								'a' => array(
									'href'   => array(),
									'target' => array(),
									'rel'    => array(),
								),
							)
						),
						esc_url( $privacy_url ? $privacy_url : '#' )
					);
					?>
					<span class="esg-india-contact-form-required"> *</span>
				</label>
				<span class="esg-india-contact-form-error-message"></span>
			</div>
			
			<!-- Enhanced Math Captcha for additional security -->
			<div class="esg-india-contact-form-field">
				<label for="esg-india-contact-form-captcha">
					<?php 
					/* translators: %1$d and %2$d are numbers for math captcha */
					printf( esc_html__( 'Security Question: What is %1$d + %2$d?', 'esg-india-contact-form' ), $captcha_a, $captcha_b ); 
					?> 
					<span class="esg-india-contact-form-required"> *</span>
				</label>
				<input type="number" id="esg-india-contact-form-captcha" name="esg_india_contact_form_captcha" required min="0" max="40" />
				<input type="hidden" name="esg_india_contact_form_captcha_a" value="<?php echo esc_attr( $captcha_a ); ?>" />
				<input type="hidden" name="esg_india_contact_form_captcha_b" value="<?php echo esc_attr( $captcha_b ); ?>" />
				<span class="esg-india-contact-form-error-message"></span>
			</div>
			
			<input type="hidden" name="page_url" />
			<button type="submit" class="esg-india-contact-form-submit">
				<span class="esg-india-contact-form-submit-text"><?php esc_html_e( 'Submit', 'esg-india-contact-form' ); ?></span>
				<span class="esg-india-contact-form-submit-loading" style="display: none;">
					<span class="esg-india-contact-form-spinner"></span>
					<?php esc_html_e( 'Submitting...', 'esg-india-contact-form' ); ?>
				</span>
			</button>
			<p class="esg-india-contact-form-response" role="status" aria-live="polite"></p>
		</form>
		<?php
		return ob_get_clean();
	}

	/**
	 * Render AMP-compatible form.
	 *
	 * @return string
	 */
	private function render_amp_form() {
		ob_start();
		$privacy_url = get_privacy_policy_url();
		$settings = get_option( self::OPTION_KEY, array() );
		$recaptcha_site_key = ! empty( $settings['recaptcha_site_key'] ) ? $settings['recaptcha_site_key'] : '';
		$ajax_url = admin_url( 'admin-ajax.php' );
		$nonce = wp_create_nonce( 'esg_india_contact_form_submit' );
		$current_url = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$source_tag = $this->determine_source_tag( $current_url );
		
		// Generate math captcha (10-20 + 10-20)
		$captcha_a = rand( 10, 20 );
		$captcha_b = rand( 10, 20 );
		$captcha_sum = $captcha_a + $captcha_b;
		
		// Generate server-side form token
		$form_token = $this->generate_form_token();
		?>
		<!-- AMP form state for button text and form time -->
		<amp-state id="buttonState">
			<script type="application/json">{"text":"<?php echo esc_js( __( 'Submit', 'esg-india-contact-form' ) ); ?>","loading":false}</script>
		</amp-state>
		<amp-state id="formTime">
			<script type="application/json"><?php echo esc_js( time() ); ?></script>
		</amp-state>
		
		<form 
			id="esg-india-contact-form-form" 
			class="esg-india-contact-form-form" 
			method="post" 
			action-xhr="<?php echo esc_url( $ajax_url ); ?>" 
			target="_top" 
			reset-on-success
			on="
				submit: AMP.setState({ buttonState: {text: '<?php echo esc_js( __( 'Submitting...', 'esg-india-contact-form' ) ); ?>', loading: true} });
				submit-success: success-popup.open, AMP.setState({ buttonState: {text: '<?php echo esc_js( __( 'Submit', 'esg-india-contact-form' ) ); ?>', loading: false}, formTime: <?php echo esc_js( time() ); ?> }), esg-india-contact-form-form.clear;
				submit-error: error-popup.open, AMP.setState({ buttonState: {text: '<?php echo esc_js( __( 'Submit', 'esg-india-contact-form' ) ); ?>', loading: false} });
			"
		>
			<input type="hidden" name="action" value="esg_india_contact_form_submit_form" />
			<input type="hidden" name="nonce" value="<?php echo esc_attr( $nonce ); ?>" />
			<input type="hidden" name="esg_india_contact_form_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
			<input type="hidden" name="esg_india_contact_form_form_time" id="esg-india-contact-form-form-time" [value]="formTime || <?php echo esc_js( time() ); ?>" value="<?php echo esc_attr( time() ); ?>" />
			
			<!-- Multiple Honeypot fields - hidden from users but bots will fill them -->
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="esg-india-contact-form-website-amp"><?php esc_html_e( 'Website', 'esg-india-contact-form' ); ?></label>
				<input type="text" id="esg-india-contact-form-website-amp" name="website" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="esg-india-contact-form-company-amp"><?php esc_html_e( 'Company URL', 'esg-india-contact-form' ); ?></label>
				<input type="text" id="esg-india-contact-form-company-amp" name="company" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="esg-india-contact-form-url-amp"><?php esc_html_e( 'Your URL', 'esg-india-contact-form' ); ?></label>
				<input type="url" id="esg-india-contact-form-url-amp" name="url" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			
			<div class="esg-india-contact-form-field">
				<label for="esg-india-contact-form-name"><?php esc_html_e( 'Full Name', 'esg-india-contact-form' ); ?> <span class="esg-india-contact-form-required">*</span></label>
				<input type="text" id="esg-india-contact-form-name" name="name" required />
				<span visible-when-invalid="valueMissing" validation-for="esg-india-contact-form-name" class="esg-india-contact-form-error-message">Please fill out this field.</span>
			</div>
			
			<div class="esg-india-contact-form-field">
				<label for="esg-india-contact-form-email"><?php esc_html_e( 'Organization Email', 'esg-india-contact-form' ); ?> <span class="esg-india-contact-form-required">*</span></label>
				<input type="email" id="esg-india-contact-form-email" name="email" required />
				<span visible-when-invalid="valueMissing" validation-for="esg-india-contact-form-email" class="esg-india-contact-form-error-message">Enter a organizational mailid</span>
				<span visible-when-invalid="typeMismatch" validation-for="esg-india-contact-form-email" class="esg-india-contact-form-error-message">Enter a organizational mailid</span>
			</div>
			
			<div class="esg-india-contact-form-field">
				<label for="esg-india-contact-form-organization"><?php esc_html_e( 'Organization', 'esg-india-contact-form' ); ?> <span class="esg-india-contact-form-required">*</span></label>
				<input type="text" id="esg-india-contact-form-organization" name="organization" required />
				<span visible-when-invalid="valueMissing" validation-for="esg-india-contact-form-organization" class="esg-india-contact-form-error-message">Please fill out this field.</span>
			</div>
			
			<div class="esg-india-contact-form-field">
				<label for="esg-india-contact-form-message"><?php esc_html_e( 'Your Message', 'esg-india-contact-form' ); ?></label>
				<textarea id="esg-india-contact-form-message" name="message" rows="4"></textarea>
			</div>
			
			<div class="esg-india-contact-form-field esg-india-contact-form-checkbox">
				<input type="checkbox" id="esg-india-contact-form-privacy" name="privacy" value="1" required />
				<label for="esg-india-contact-form-privacy">
					<?php
					printf(
						wp_kses(
							/* translators: %s privacy policy url */
							__( 'I Accept <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'esg-india-contact-form' ),
							array(
								'a' => array(
									'href'   => array(),
									'target' => array(),
									'rel'    => array(),
								),
							)
						),
						esc_url( $privacy_url ? $privacy_url : '#' )
					);
					?>
					<span class="esg-india-contact-form-required"> *</span>
				</label>
				<span visible-when-invalid="valueMissing" validation-for="esg-india-contact-form-privacy" class="esg-india-contact-form-error-message">Please accept the privacy policy.</span>
			</div>
			
			<!-- Enhanced Math Captcha for additional security -->
			<div class="esg-india-contact-form-field">
				<label for="esg-india-contact-form-captcha">
					<?php 
					/* translators: %1$d and %2$d are numbers for math captcha */
					printf( esc_html__( 'Security Question: What is %1$d + %2$d?', 'esg-india-contact-form' ), $captcha_a, $captcha_b ); 
					?> 
					<span class="esg-india-contact-form-required"> *</span>
				</label>
				<input type="number" id="esg-india-contact-form-captcha" name="esg_india_contact_form_captcha" required min="0" max="40" />
				<input type="hidden" name="esg_india_contact_form_captcha_a" value="<?php echo esc_attr( $captcha_a ); ?>" />
				<input type="hidden" name="esg_india_contact_form_captcha_b" value="<?php echo esc_attr( $captcha_b ); ?>" />
				<span visible-when-invalid="valueMissing" validation-for="esg-india-contact-form-captcha" class="esg-india-contact-form-error-message"><?php esc_html_e( 'Please answer the security question.', 'esg-india-contact-form' ); ?></span>
			</div>
			
			<?php if ( ! empty( $recaptcha_site_key ) ) : ?>
				<amp-recaptcha-input 
					layout="nodisplay" 
					name="recaptcha_token"
					data-sitekey="<?php echo esc_attr( $recaptcha_site_key ); ?>"
					data-action="submit">
				</amp-recaptcha-input>
			<?php endif; ?>
			
			<input type="hidden" name="page_url" value="<?php echo esc_attr( esc_url_raw( $current_url ) ); ?>" />
			<input type="hidden" name="source_tag" value="<?php echo esc_attr( $source_tag ); ?>" />
			
			<button type="submit" class="esg-india-contact-form-submit" [disabled]="buttonState.loading">
				<span [text]="buttonState.text"><?php esc_html_e( 'Submit', 'esg-india-contact-form' ); ?></span>
			</button>
			
		</form>
		
		<!-- Success Lightbox -->
		<amp-lightbox id="success-popup" layout="nodisplay">
			<div class="esg-india-contact-form-lightbox-overlay">
				<div class="esg-india-contact-form-lightbox-content esg-india-contact-form-lightbox-success">
					<div class="esg-india-contact-form-lightbox-icon">🎉</div>
					<div class="esg-india-contact-form-lightbox-title"><?php esc_html_e( 'Submitted Successfully', 'esg-india-contact-form' ); ?></div>
					<div class="esg-india-contact-form-lightbox-message"><?php esc_html_e( 'Thank you! ESG India team will contact you soon.', 'esg-india-contact-form' ); ?></div>
					<button on="tap:success-popup.close" class="esg-india-contact-form-lightbox-button">
						<?php esc_html_e( 'Close', 'esg-india-contact-form' ); ?>
					</button>
				</div>
			</div>
		</amp-lightbox>
		
		<!-- Error Lightbox -->
		<amp-lightbox id="error-popup" layout="nodisplay">
			<div class="esg-india-contact-form-lightbox-overlay">
				<div class="esg-india-contact-form-lightbox-content esg-india-contact-form-lightbox-error">
					<div class="esg-india-contact-form-lightbox-icon">❌</div>
					<div class="esg-india-contact-form-lightbox-title"><?php esc_html_e( 'Submission Failed', 'esg-india-contact-form' ); ?></div>
					<div class="esg-india-contact-form-lightbox-message">
						<?php esc_html_e( 'Please check your information and try again.', 'esg-india-contact-form' ); ?>
					</div>
					<button on="tap:error-popup.close" class="esg-india-contact-form-lightbox-button">
						<?php esc_html_e( 'Close', 'esg-india-contact-form' ); ?>
					</button>
				</div>
			</div>
		</amp-lightbox>

		<?php
		return ob_get_clean();
	}

	/**
	 * Detect bot submissions.
	 *
	 * @return bool True if bot detected, false otherwise.
	 */
	private function detect_bot() {
		// 0. Verify server-side form token FIRST (but don't delete it yet)
		$form_token = sanitize_text_field( wp_unslash( $_POST['esg_india_contact_form_form_token'] ?? '' ) );
		if ( ! $this->verify_form_token( $form_token, false ) ) {
			return true; // Invalid or missing token
		}
		
		// Get honeypot field names from transient (don't delete yet - only on success)
		$honeypot_key = 'esg_india_contact_form_honeypots_' . md5( $form_token );
		$honeypot_names = get_transient( $honeypot_key );
		if ( $honeypot_names && is_array( $honeypot_names ) ) {
			// Check all honeypot fields
			foreach ( $honeypot_names as $key => $field_name ) {
				$honeypot_value = sanitize_text_field( wp_unslash( $_POST[ $field_name ] ?? '' ) );
				if ( ! empty( $honeypot_value ) ) {
					// Bot filled a honeypot field - delete transient and token
					delete_transient( $honeypot_key );
					$this->verify_form_token( $form_token, true );
					return true;
				}
			}
			// Don't delete transient here - only delete on successful submission
		} else {
			// Fallback to old honeypot field names (for AMP forms or legacy)
			$honeypot_fields = array( 'website', 'company', 'url' );
			foreach ( $honeypot_fields as $field ) {
				$honeypot_value = sanitize_text_field( wp_unslash( $_POST[ $field ] ?? '' ) );
				if ( ! empty( $honeypot_value ) ) {
					return true;
				}
			}
		}

		// 1. Check enhanced math captcha
		$captcha_a = absint( $_POST['esg_india_contact_form_captcha_a'] ?? 0 );
		$captcha_b = absint( $_POST['esg_india_contact_form_captcha_b'] ?? 0 );
		$captcha_user = absint( $_POST['esg_india_contact_form_captcha'] ?? 0 );
		$captcha_expected = $captcha_a + $captcha_b;
		
		if ( $captcha_a > 0 && $captcha_b > 0 && $captcha_user !== $captcha_expected ) {
			return true;
		}

		// 2. Check for missing or suspicious User-Agent
		$user_agent = sanitize_textarea_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ?? '' ) );
		if ( empty( $user_agent ) || strlen( $user_agent ) < 10 ) {
			return true;
		}
		
		// Block common bot user agents (but allow legitimate ones)
		$bot_patterns = array( 'bot', 'crawler', 'spider', 'scraper', 'curl', 'wget' );
		$allowed_patterns = array( 'googlebot', 'bingbot', 'slurp', 'duckduckbot', 'baiduspider', 'yandexbot', 'sogou', 'exabot', 'facebot', 'ia_archiver' );
		$user_agent_lower = strtolower( $user_agent );
		
		foreach ( $bot_patterns as $pattern ) {
			if ( strpos( $user_agent_lower, $pattern ) !== false ) {
				// Check if it's an allowed bot
				$is_allowed = false;
				foreach ( $allowed_patterns as $allowed ) {
					if ( strpos( $user_agent_lower, $allowed ) !== false ) {
						$is_allowed = true;
						break;
					}
				}
				if ( ! $is_allowed ) {
					return true;
				}
			}
		}

		// 4. IP-based rate limiting - prevent rapid submissions from same IP
		$user_ip = $this->get_user_ip();
		if ( ! empty( $user_ip ) ) {
			$rate_limit_key = 'esg_india_contact_form_rate_limit_' . md5( $user_ip );
			$last_submission = get_transient( $rate_limit_key );
			
			if ( false !== $last_submission ) {
				// Same IP submitted within last 30 seconds - likely a bot
				// Log for debugging (remove in production if needed)
				error_log( 'ESG India Contact Form Rate Limit: IP ' . $user_ip . ' blocked. Last submission: ' . $last_submission );
				return true;
			}
			// Note: Transient will be set AFTER successful submission, not here
		}

		// 5. Check time-based validation - if submitted too quickly, likely a bot
		$form_time = absint( $_POST['esg_india_contact_form_form_time'] ?? 0 );
		if ( $form_time > 0 ) {
			$time_elapsed = time() - $form_time;
			// If form submitted in less than 5 seconds, likely a bot
			if ( $time_elapsed < 5 ) {
				return true;
			}
			// If form submitted after more than 1 hour, might be stale
			if ( $time_elapsed > 3600 ) {
				return true;
			}
		}

		// 6. Check for spam patterns in content
		$name = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
		$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
		$message = wp_kses_post( wp_unslash( $_POST['message'] ?? '' ) );
		
		// Check for suspicious patterns
		$spam_patterns = array( 'http://', 'https://', 'www.', '.com', '.net', '.org', 'viagra', 'casino', 'poker', 'loan', 'mortgage', 'click here', 'buy now' );
		$content_to_check = strtolower( $name . ' ' . $email . ' ' . $message );
		
		$spam_count = 0;
		foreach ( $spam_patterns as $pattern ) {
			if ( substr_count( $content_to_check, $pattern ) > 2 ) {
				$spam_count++;
			}
		}
		
		// If multiple spam patterns found, likely spam
		if ( $spam_count >= 3 ) {
			return true;
		}
		
		// Check for excessive links in message
		if ( ! empty( $message ) ) {
			$link_count = substr_count( strtolower( $message ), 'http' ) + substr_count( strtolower( $message ), 'www.' );
			if ( $link_count > 2 ) {
				return true;
			}
		}
		
		// 6. Enhanced email validation with comprehensive disposable email check
		if ( ! empty( $email ) ) {
			// Check disposable email domains
			if ( $this->is_disposable_email( $email ) ) {
				return true;
			}
			
			// Check for suspicious email patterns
			if ( preg_match( '/[0-9]{6,}/', $email ) && strlen( $email ) > 30 ) {
				// Email with many numbers and long length
				return true;
			}
			
			// Check for suspicious email format
			if ( preg_match( '/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i', $email ) === 0 ) {
				// Invalid email format
				return true;
			}
		}

		// 7. Verify reCAPTCHA v3 if enabled
		$settings = get_option( self::OPTION_KEY, array() );
		$recaptcha_secret_key = ! empty( $settings['recaptcha_secret_key'] ) ? $settings['recaptcha_secret_key'] : '';
		
		if ( ! empty( $recaptcha_secret_key ) ) {
			$recaptcha_token = sanitize_text_field( wp_unslash( $_POST['recaptcha_token'] ?? '' ) );
			if ( empty( $recaptcha_token ) ) {
				return true;
			}

			$verify_url = 'https://www.google.com/recaptcha/api/siteverify';
			$verify_data = array(
				'secret'   => $recaptcha_secret_key,
				'response' => $recaptcha_token,
				'remoteip' => $this->get_user_ip(),
			);

			$response = wp_remote_post(
				$verify_url,
				array(
					'body' => $verify_data,
					'timeout' => 10,
				)
			);

			if ( is_wp_error( $response ) ) {
				// If reCAPTCHA verification fails, reject submission
				return true;
			}

			$response_body = wp_remote_retrieve_body( $response );
			$result = json_decode( $response_body, true );

			// Check if reCAPTCHA verification succeeded and score is acceptable
			if ( ! isset( $result['success'] ) || ! $result['success'] ) {
				return true;
			}

			// Check score (0.0 = bot, 1.0 = human, threshold typically 0.5)
			$score_threshold = ! empty( $settings['recaptcha_score_threshold'] ) ? floatval( $settings['recaptcha_score_threshold'] ) : 0.5;
			if ( isset( $result['score'] ) && $result['score'] < $score_threshold ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Ensure weekly report is scheduled.
	 */
	public function maybe_schedule_weekly_report() {
		if ( ! wp_next_scheduled( self::WEEKLY_REPORT_HOOK ) ) {
			$next_run = $this->get_next_report_run_time();
			wp_schedule_event( $next_run, 'weekly', self::WEEKLY_REPORT_HOOK );
		}
	}

	/**
	 * Clear the weekly report schedule.
	 */
	private function clear_weekly_report_schedule() {
		$timestamp = wp_next_scheduled( self::WEEKLY_REPORT_HOOK );
		while ( $timestamp ) {
			wp_unschedule_event( $timestamp, self::WEEKLY_REPORT_HOOK );
			$timestamp = wp_next_scheduled( self::WEEKLY_REPORT_HOOK );
		}
	}

	/**
	 * Calculate the next Monday 7:55 AM run time.
	 *
	 * @return int
	 */
	private function get_next_report_run_time() {
		$timezone = wp_timezone();
		$now      = new DateTime( 'now', $timezone );
		$run      = new DateTime( 'monday this week 7:55 am', $timezone );

		if ( $now >= $run ) {
			$run->modify( '+1 week' );
		}

		return $run->getTimestamp();
	}

	/**
	 * Send weekly CSV report to admin.
	 *
	 * @param bool $is_manual Whether this is a manual trigger (default false for automatic).
	 */
	public function send_weekly_report( $is_manual = false ) {
		global $wpdb;

		$timezone = wp_timezone();
		$now      = new DateTime( 'now', $timezone );

		// Calculate this Monday at 00:00
		$this_monday = new DateTime( 'monday this week 00:00', $timezone );
		
		// If current time is before this Monday 00:00, we're still in last week
		if ( $now < $this_monday ) {
			$this_monday->modify( '-1 week' );
		}
		
		// Start is always last Monday 00:00 (one week before this Monday)
		$start = clone $this_monday;
		$start->modify( '-1 week' );
		
		// End date: For automatic = this Monday 00:00, For manual = current time
		if ( $is_manual ) {
			$end = clone $now;
		} else {
			$end = clone $this_monday;
		}

		$table_name = $this->get_table_name();
		
		// For manual, use <= to include current time; for automatic, use < to exclude end time
		$comparison = $is_manual ? '<=' : '<';
		$results    = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM {$table_name} WHERE created_at >= %s AND created_at {$comparison} %s ORDER BY created_at ASC",
				$start->format( 'Y-m-d H:i:s' ),
				$end->format( 'Y-m-d H:i:s' )
			),
			ARRAY_A
		);

		// Create temporary file with .csv extension
		$upload_dir = wp_upload_dir();
		$tmp_dir = get_temp_dir();
		$tmp_file = $tmp_dir . 'esg-india-contact-form-weekly-report-' . wp_generate_password( 8, false ) . '.csv';
		
		// Ensure directory is writable
		if ( ! is_writable( $tmp_dir ) ) {
			error_log( 'ESG India Contact Form Weekly Report: Temp directory is not writable: ' . $tmp_dir );
			return;
		}

		$fh = fopen( $tmp_file, 'w' );
		if ( ! $fh ) {
			error_log( 'ESG India Contact Form Weekly Report: Failed to open file for writing: ' . $tmp_file );
			return;
		}

		// Always write CSV headers
		fputcsv(
			$fh,
			array(
				'ID',
				'Date',
				'Name',
				'Email',
				'Organization',
				'Message',
				'Source Tag',
				'UTM Source',
				'UTM Medium',
				'UTM Campaign',
				'UTM Term',
				'UTM Content',
				'Page URL',
				'IP',
			)
		);

		// Write submission data if available
		if ( ! empty( $results ) ) {
			foreach ( $results as $row ) {
				fputcsv(
					$fh,
					array(
						$row['id'],
						$row['created_at'],
						$row['name'],
						$row['email'],
						$row['organization'],
						$row['message'],
						$row['source_tag'],
						$row['page_url'],
						$row['user_ip'],
					)
				);
			}
		} else {
			// Add a note row when there are no submissions
			fputcsv(
				$fh,
				array(
					'No submissions',
					'',
					'',
					'',
					'',
					'No contact form submissions were received during this reporting period.',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
				)
			);
		}

		fclose( $fh );

		$start_label = $start->format( 'M d, Y H:i' );
		$end_label   = $end->format( 'M d, Y H:i' );

		$recipient = apply_filters( 'esg_india_contact_form_weekly_report_recipient', 'depakar@succeedtech.com' );
		$subject   = sprintf(
			__( 'Weekly ESG India Contact Form Report (%1$s - %2$s)', 'esg-india-contact-form' ),
			$start_label,
			$end_label
		);

		$submission_count = count( $results );

		// Professional subject line
		if ( 0 === $submission_count ) {
			$subject = sprintf(
				__( 'Weekly ESG India Contact Form Report - No Submissions (%1$s - %2$s)', 'esg-india-contact-form' ),
				$start_label,
				$end_label
			);
		} else {
			$subject = sprintf(
				__( 'Weekly ESG India Contact Form Report - %1$d Submission(s) (%2$s - %3$s)', 'esg-india-contact-form' ),
				$submission_count,
				$start_label,
				$end_label
			);
		}

		// Professional email body
		$body = '<div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">';
		$body .= '<h2 style="color: #2563eb; margin-bottom: 20px;">' . esc_html__( 'Weekly ESG India Contact Form Report', 'esg-india-contact-form' ) . '</h2>';
		
		$body .= '<p style="margin-bottom: 15px;">';
		$body .= sprintf(
			esc_html__( 'Report Period: %1$s to %2$s', 'esg-india-contact-form' ),
			'<strong>' . esc_html( $start_label ) . '</strong>',
			'<strong>' . esc_html( $end_label ) . '</strong>'
		);
		$body .= '</p>';
		
		$body .= '<div style="background-color: #f8f9fa; padding: 15px; border-radius: 6px; margin-bottom: 20px;">';
		$body .= '<p style="margin: 0;">';
		$body .= sprintf(
			'<strong style="color: #2563eb;">%s:</strong> <span style="font-size: 18px; color: #15803d;">%d</span>',
			esc_html__( 'Total Submissions', 'esg-india-contact-form' ),
			$submission_count
		);
		$body .= '</p>';
		$body .= '</div>';

		if ( 0 === $submission_count ) {
			$body .= '<div style="background-color: #fef3c7; border-left: 4px solid #f59e0b; padding: 20px; margin-bottom: 20px; border-radius: 6px;">';
			$body .= '<p style="margin: 0; color: #92400e; font-size: 16px; font-weight: 600;">';
			$body .= esc_html__( 'No form submissions in the past week.', 'esg-india-contact-form' );
			$body .= '</p>';
			$body .= '</div>';
		} else {
			$body .= '<p style="margin-bottom: 15px;">';
			$body .= esc_html__( 'Please find the detailed submission data attached in the CSV file.', 'esg-india-contact-form' );
			$body .= '</p>';
		}
		
		$body .= '<hr style="border: none; border-top: 1px solid #e5e7eb; margin: 25px 0;" />';
		$body .= '<p style="color: #9ca3af; font-size: 12px; margin: 0;">';
		$body .= esc_html__( 'This is an automated email from the ESG India Form Submissions system.', 'esg-india-contact-form' );
		$body .= '</p>';
		$body .= '</div>';

		$headers = array( 'Content-Type: text/html; charset=UTF-8' );

		// Ensure file exists and is readable before sending
		if ( ! file_exists( $tmp_file ) || ! is_readable( $tmp_file ) ) {
			error_log( 'ESG India Contact Form Weekly Report: CSV file not found or not readable: ' . $tmp_file );
			@unlink( $tmp_file );
			return;
		}
		
		// Get file size for logging
		$file_size = filesize( $tmp_file );
		error_log( 'ESG India Contact Form Weekly Report: Sending email with attachment. File: ' . $tmp_file . ', Size: ' . $file_size . ' bytes' );

		$sent = wp_mail(
			$recipient,
			$subject,
			$body,
			$headers,
			array( $tmp_file )
		);
		
		error_log( 'ESG India Contact Form Weekly Report: wp_mail result: ' . ( $sent ? 'SUCCESS' : 'FAILED' ) );

		if ( ! $sent ) {
			$warning_recipient = apply_filters( 'esg_india_contact_form_weekly_report_warning_recipient', get_option( 'admin_email' ) );
			if ( empty( $warning_recipient ) ) {
				$warning_recipient = $recipient;
			}

			$warning_subject = sprintf(
				__( 'Weekly report delivery failed (%1$s - %2$s)', 'esg-india-contact-form' ),
				$start_label,
				$end_label
			);

			$warning_body = sprintf(
				__( "The weekly ESG India contact form report could not be delivered to ESG recipient %1\$s.\nPlease check the mail server logs and try sending the report manually.\n\nReport Period: %2\$s to %3\$s\nTotal Submissions: %4\$d", 'esg-india-contact-form' ),
				$recipient,
				$start_label,
				$end_label,
				$submission_count
			);

			wp_mail(
				$warning_recipient,
				$warning_subject,
				$warning_body,
				array( 'Content-Type: text/plain; charset=UTF-8' )
			);
		}

		// Clean up the temporary file
		if ( file_exists( $tmp_file ) ) {
			@unlink( $tmp_file );
		}
	}

	/**
	 * Send response for both AMP and non-AMP.
	 *
	 * @param string $message Response message.
	 * @param bool   $success Whether response is success.
	 * @param int    $status_code HTTP status code.
	 */
	private function send_response( $message, $success = true, $status_code = 200 ) {
		// Check if this is an AMP request
		$is_amp_request = $this->is_amp() || 
						  ( isset( $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) && 'true' === $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) ||
						  ( isset( $_POST['action'] ) && 'esg_india_contact_form_submit_form' === $_POST['action'] && ! wp_doing_ajax() );
		
		// For AMP, we need to send proper JSON format with CORS headers
		if ( $is_amp_request ) {
			// Prevent WordPress from interfering
			if ( ! defined( 'DOING_AJAX' ) ) {
				define( 'DOING_AJAX', true );
			}
			
			// Clean any previous output
			while ( ob_get_level() ) {
				ob_end_clean();
			}
			
			// Remove any existing headers
			if ( ! headers_sent() ) {
				header_remove();
			}
			
			// Set AMP CORS headers
			$source_origin = home_url();
			if ( ! headers_sent() ) {
				header( 'Content-Type: application/json; charset=utf-8' );
				header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $source_origin ) );
				header( 'Access-Control-Allow-Credentials: true' );
				header( 'AMP-Access-Control-Allow-Source-Origin: ' . esc_url_raw( $source_origin ) );
				header( 'Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin' );
				http_response_code( $status_code );
			}
			
			$response = array( 'message' => $message );
			if ( $success ) {
				$response['success'] = true;
			}
			
			// Send clean JSON response
			echo wp_json_encode( $response );
			exit;
		}
		
		// For non-AMP, use WordPress functions
		if ( $success ) {
			wp_send_json_success( array( 'message' => $message ) );
		} else {
			wp_send_json_error( array( 'message' => $message ), $status_code );
		}
	}

	/**
	 * Handle AJAX submissions.
	 */
	public function handle_form_submission() {
		// Verify nonce
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'esg_india_contact_form_submit' ) ) {
			$this->send_response( 
				__( 'Security check failed. Please refresh the page and try again.', 'esg-india-contact-form' ),
				false,
				403
			);
		}

		// Bot protection checks
		$bot_detected = $this->detect_bot();
		if ( $bot_detected ) {
			$user_ip = $this->get_user_ip();
			$rate_limit_key = 'esg_india_contact_form_rate_limit_' . md5( $user_ip );
			$last_submission = get_transient( $rate_limit_key );
			
			// Check if it's a wrong captcha answer
			$captcha_a = absint( $_POST['esg_india_contact_form_captcha_a'] ?? 0 );
			$captcha_b = absint( $_POST['esg_india_contact_form_captcha_b'] ?? 0 );
			$captcha_user = absint( $_POST['esg_india_contact_form_captcha'] ?? 0 );
			$captcha_expected = $captcha_a + $captcha_b;
			$is_wrong_captcha = ( $captcha_a > 0 && $captcha_b > 0 && $captcha_user !== $captcha_expected );
			
			// Provide clear error message for wrong security answer, and a professional rate-limit message
			if ( false !== $last_submission ) {
				$time_remaining = 30 - ( time() - $last_submission );
				$message = sprintf(
					__( 'You have recently submitted the form. Please wait %d seconds before submitting again to ensure we reduce spam. Thank you for your patience.', 'esg-india-contact-form' ),
					max( 1, $time_remaining )
				);
			} elseif ( $is_wrong_captcha ) {
				$message = __( 'The answer to the security question is incorrect. Please check your calculation and try again.', 'esg-india-contact-form' );
			} else {
				$message = __( 'There was an issue with your submission. Please review your information and try again.', 'esg-india-contact-form' );
			}

			$this->send_response( $message, false, 403 );
			return;
		}

		$name          = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
		$email         = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
		$organization  = sanitize_text_field( wp_unslash( $_POST['organization'] ?? '' ) );
		$message       = wp_kses_post( wp_unslash( $_POST['message'] ?? '' ) );
		$privacy       = isset( $_POST['privacy'] );
		$page_url      = esc_url_raw( wp_unslash( $_POST['page_url'] ?? '' ) );
		$source_tag    = $this->determine_source_tag( $page_url );

		if ( empty( $name ) || empty( $email ) || empty( $organization ) || ! $privacy ) {
			$this->send_response( 
				__( 'Please fill in all required fields and accept the privacy policy.', 'esg-india-contact-form' ),
				false,
				400
			);
		}

		$data = array(
			'name'             => $name,
			'email'            => $email,
			'organization'     => $organization,
			'message'          => $message,
			'privacy_accepted' => $privacy ? 1 : 0,
			'source_tag'       => $source_tag,
			'page_url'         => $page_url,
			'user_ip'          => $this->get_user_ip(),
			'user_agent'       => sanitize_textarea_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ?? '' ) ),
			'created_at'       => current_time( 'mysql' ),
		);

		global $wpdb;
		$inserted = $wpdb->insert( $this->get_table_name(), $data );

		if ( false === $inserted ) {
			$this->send_response( 
				__( 'Unable to save your submission. Please try again later.', 'esg-india-contact-form' ),
				false,
				500
			);
		}

		// Set rate limiting transient AFTER successful submission
		$user_ip = $this->get_user_ip();
		if ( ! empty( $user_ip ) ) {
			$rate_limit_key = 'esg_india_contact_form_rate_limit_' . md5( $user_ip );
			// Set transient for 30 seconds to prevent rapid resubmissions
			set_transient( $rate_limit_key, time(), 30 );
		}

		// Delete form token and honeypot transient only after successful submission
		$form_token = sanitize_text_field( wp_unslash( $_POST['esg_india_contact_form_form_token'] ?? '' ) );
		if ( ! empty( $form_token ) ) {
			$this->verify_form_token( $form_token, true );
			$honeypot_key = 'esg_india_contact_form_honeypots_' . md5( $form_token );
			delete_transient( $honeypot_key );
		}

		$this->send_admin_email( $data );
		$this->send_user_email( $data );
		$this->send_to_erp( $data );

		$this->send_response( 
			__( 'Thank you! ESG India team will contact you soon.', 'esg-india-contact-form' ),
			true
		);
	}

	/**
	 * Send admin notification.
	 *
	 * @param array $data Submission data.
	 */
	private function send_admin_email( $data ) {
		$admin_emails = array(
			'contact@esgindia.com',
			'santhosh.kt@succeedtech.com',
			'depakar@succeedtech.com',
		);
		$subject     = sprintf( __( 'New ESG India Contact Submission from %s', 'esg-india-contact-form' ), $data['name'] );
		$headers     = array(
			'Content-Type: text/html; charset=UTF-8',
			'From: SucceedLEARN <noreply@succeedlearn.com>',
			'Reply-To: ' . $data['name'] . ' <' . $data['email'] . '>',
		);

		$body = sprintf(
			'<h2>New ESG India Contact Submission</h2>
			<p><strong>Name:</strong> %1$s</p>
			<p><strong>Email:</strong> %2$s</p>
			<p><strong>Organization:</strong> %3$s</p>
			<p><strong>Message:</strong><br/>%4$s</p>
			<p><strong>Page URL:</strong> <a href="%5$s">%5$s</a></p>
			<p><strong>IP:</strong> %6$s</p>',
			esc_html( $data['name'] ),
			esc_html( $data['email'] ),
			esc_html( $data['organization'] ),
			nl2br( esc_html( $data['message'] ) ),
			esc_url( $data['page_url'] ),
			esc_html( $data['user_ip'] )
		);

		foreach ( $admin_emails as $admin_email ) {
			$admin_email = sanitize_email( $admin_email );
			if ( ! empty( $admin_email ) ) {
				wp_mail( $admin_email, $subject, $body, $headers );
			}
		}
	}

	/**
	 * Send confirmation to user.
	 *
	 * @param array $data Submission data.
	 */
	private function send_user_email( $data ) {
		if ( empty( $data['email'] ) || ! is_email( $data['email'] ) ) {
			return;
		}
		if ( ! $this->can_send_user_reply_email( $data['email'] ) ) {
			return;
		}
		$subject = __( 'We received your message', 'esg-india-contact-form' );
		$headers = array(
			'Content-Type: text/html; charset=UTF-8',
			'From: SucceedLEARN <noreply@succeedlearn.com>',
		);
		$body    = sprintf(
			'<p>Hi %1$s,</p><p>Thanks for reaching out to SucceedLEARN. Our team will contact you within the next 24 hours (on a working day).</p><p>In the mean time, if you wish to reach out to us with more information, please write to <a href="mailto:ESGTraining@succeedtech.com">ESGTraining@succeedtech.com</a>.</p><p>Regards,<br/>SucceedLEARN Team</p>',
			esc_html( $data['name'] )
		);

		$sent = wp_mail( $data['email'], $subject, $body, $headers );
		if ( $sent ) {
			$this->increment_user_reply_email_count( $data['email'] );
		}
	}

	/**
	 * @param string $email User email.
	 * @return bool
	 */
	private function can_send_user_reply_email( $email ) {
		$normalized_email = strtolower( sanitize_email( $email ) );
		if ( '' === $normalized_email ) {
			return false;
		}
		if ( $this->is_user_reply_email_exempt( $normalized_email ) ) {
			return true;
		}
		$max_replies = (int) apply_filters( 'succeedlearn_user_reply_limit', 2, $normalized_email );
		if ( $max_replies < 1 ) {
			$max_replies = 1;
		}
		$current_count = (int) get_option( $this->get_user_reply_email_count_option_key( $normalized_email ), 0 );
		return $current_count < $max_replies;
	}

	/**
	 * @param string $email User email.
	 * @return void
	 */
	private function increment_user_reply_email_count( $email ) {
		$normalized_email = strtolower( sanitize_email( $email ) );
		if ( '' === $normalized_email ) {
			return;
		}
		$option_key   = $this->get_user_reply_email_count_option_key( $normalized_email );
		$current      = (int) get_option( $option_key, 0 );
		$next_counter = $current + 1;
		if ( false === get_option( $option_key, false ) ) {
			add_option( $option_key, $next_counter, '', false );
			return;
		}
		update_option( $option_key, $next_counter, false );
	}

	/**
	 * @param string $normalized_email Normalized email.
	 * @return string
	 */
	private function get_user_reply_email_count_option_key( $normalized_email ) {
		return 'succeedlearn_user_reply_count_' . md5( $normalized_email );
	}

	/**
	 * @param string $normalized_email Normalized email.
	 * @return bool
	 */
	private function is_user_reply_email_exempt( $normalized_email ) {
		$default_exempt = array(
			'depakar@succeedtech.com',
		);
		$exempt_emails = apply_filters( 'succeedlearn_user_reply_exempt_emails', $default_exempt );
		$exempt_emails = is_array( $exempt_emails ) ? $exempt_emails : array();
		$exempt_emails = array_filter(
			array_map(
				static function ( $email ) {
					return strtolower( sanitize_email( (string) $email ) );
				},
				$exempt_emails
			)
		);
		return in_array( $normalized_email, $exempt_emails, true );
	}

	/**
	 * Push submission data to ERP.
	 *
	 * @param array $data Submission data.
	 */
	private function send_to_erp( $data ) {
		/**
		 * Allow developers to hook before ERP sync.
		 */
		// 1) Resolve ERP endpoint (filterable). If none provided, skip ERP sync by default.
		$endpoint = apply_filters( 'esg_india_contact_form_erp_endpoint', '' );
		if ( empty( $endpoint ) ) {
			return;
		}

		// 2) Build payload (filterable). If no filter supplied, use a sensible default mapping for ERPNext Lead.
		$payload = apply_filters( 'esg_india_contact_form_erp_payload', null, $data );
		if ( null === $payload ) {
			// Prepare message body with additional context
			$context_lines = array();
			if ( ! empty( $data['page_url'] ) ) {
				$context_lines[] = 'Page URL: ' . $data['page_url'];
			}
			if ( ! empty( $data['source_tag'] ) ) {
				$context_lines[] = 'Source Tag: ' . $data['source_tag'];
			}

			$message_parts = array();
			if ( ! empty( $data['message'] ) ) {
				$message_parts[] = nl2br( esc_html( $data['message'] ) );
			}
			if ( ! empty( $context_lines ) ) {
				$message_parts[] = '<br><strong>Context</strong><br>' . implode( '<br>', array_map( 'esc_html', $context_lines ) );
			}
			$message_html = '<div>' . implode( '<br>', $message_parts ) . '</div>';

			$payload = array(
				'data' => array(
					'lead_name'      => $data['name'],
					'doctype'        => 'Lead',
					'company_name'   => $data['organization'],
					'lead_owner'     => 'Administrator',
					'owner'          => '',
					'modified_by'    => '',
					'source'         => ! empty( $data['source_tag'] ) ? $data['source_tag'] : 'epcontactus',
					'message'        => $message_html,
					'mobile_no'      => '',
					'email_id'       => $data['email'],
					'status'         => 'Lead',
					'naming_series'  => 'ESG-LEAD-.YYYY.-',
					'company'        => 'ESG INDIA',
					'website'        => $data['page_url'],
				),
			);
		}

		// 3) Auth header (filterable) - default is Basic auth used in legacy integration
		$auth_header = apply_filters(
			'esg_india_contact_form_erp_auth_header',
			''
		);

		// 4) Send to ERP
		$response = wp_remote_post(
			$endpoint,
			array(
				'timeout' => 15,
				'headers' => array(
					'Content-Type'  => 'application/json',
					'Accept'        => 'application/json',
					'Authorization' => $auth_header,
				),
				'body'    => wp_json_encode( $payload ),
			)
		);

		// 5) Fire hook for logging/handling responses
		do_action( 'esg_india_contact_form_after_submission', $data, $response );
	}

	/**
	 * Determine user IP.
	 *
	 * @return string
	 */
	private function get_user_ip() {
		$keys = array(
			'HTTP_CLIENT_IP',
			'HTTP_X_FORWARDED_FOR',
			'HTTP_X_FORWARDED',
			'HTTP_X_CLUSTER_CLIENT_IP',
			'HTTP_FORWARDED_FOR',
			'HTTP_FORWARDED',
			'REMOTE_ADDR',
		);

		foreach ( $keys as $key ) {
			if ( array_key_exists( $key, $_SERVER ) ) {
				foreach ( explode( ',', $_SERVER[ $key ] ) as $ip ) {
					$ip = trim( $ip );
					if ( filter_var( $ip, FILTER_VALIDATE_IP ) ) {
						return $ip;
					}
				}
			}
		}

		return '';
	}

	/**
	 * Generate and store a unique form token.
	 *
	 * @return string Token.
	 */
	private function generate_form_token() {
		$token = wp_generate_password( 32, false );
		$token_key = 'esg_india_contact_form_token_' . md5( $token );
		// Store token for 1 hour
		set_transient( $token_key, time(), 3600 );
		return $token;
	}

	/**
	 * Verify form token.
	 *
	 * @param string $token Token to verify.
	 * @param bool $delete Whether to delete the token after verification. Default false.
	 * @return bool True if valid, false otherwise.
	 */
	private function verify_form_token( $token, $delete = false ) {
		if ( empty( $token ) ) {
			return false;
		}
		
		$token_key = 'esg_india_contact_form_token_' . md5( $token );
		$token_time = get_transient( $token_key );
		
		if ( false === $token_time ) {
			// Token doesn't exist or expired
			return false;
		}
		
		// Check if token is not too old (max 1 hour)
		if ( ( time() - $token_time ) > 3600 ) {
			return false;
		}
		
		// Only delete token if explicitly requested (after successful submission)
		if ( $delete ) {
			delete_transient( $token_key );
		}
		
		return true;
	}

	/**
	 * Check if email is from a disposable email service.
	 *
	 * @param string $email Email address.
	 * @return bool True if disposable, false otherwise.
	 */
	private function is_disposable_email( $email ) {
		if ( empty( $email ) ) {
			return false;
		}
		
		$email_parts = explode( '@', $email );
		if ( count( $email_parts ) !== 2 ) {
			return false;
		}
		
		$domain = strtolower( trim( $email_parts[1] ) );
		
		// Comprehensive list of disposable email domains
		$disposable_domains = array(
			'10minutemail.com', '10minutemail.de', '10minutemail.net', '10minutemail.org',
			'20minutemail.com', '33mail.com', 'guerrillamail.com', 'guerrillamail.net',
			'guerrillamail.org', 'guerrillamailblock.com', 'mailinator.com', 'mailinator.net',
			'tempmail.com', 'tempmail.net', 'tempmail.org', 'throwaway.email',
			'trashmail.com', 'trashmail.net', 'yopmail.com', 'yopmail.net',
			'maildrop.cc', 'mohmal.com', 'mintemail.com', 'getnada.com',
			'fakeinbox.com', 'dispostable.com', 'meltmail.com', 'spamgourmet.com',
			'emailondeck.com', 'sharklasers.com', 'grr.la', 'getairmail.com',
			'mytrashmail.com', 'temp-mail.org', 'tempail.com', 'tempinbox.co.uk',
			'emailtemp.info', 'throwawaymail.com', 'mailcatch.com',
			'emailias.com', 'spamfree24.org', 'spamfree24.de', 'spamfree24.eu',
			'emailmiser.com', 'spamhole.com', 'spam.la', 'spambox.us',
			'getmeltmail.com', 'melt.li', 'meltmail.com', 'meltmail.net',
			'pokemail.net', 'spam4.me', 'bccto.me', 'chammy.info',
			'devnullmail.com', 'mailnull.com', 'nowmymail.com', 'mytemp.email',
			'temp-mail.io', 'tempail.com', 'tempinbox.com', 'tempr.email',
			'throwaway.email', 'tmpmail.org', 'tmpmail.net', 'tmpmail.com',
			'inboxkitten.com', 'zoho.eu',
		);
		
		// Check exact domain match
		if ( in_array( $domain, $disposable_domains, true ) ) {
			return true;
		}
		
		// Check if domain contains any disposable pattern
		$disposable_patterns = array(
			'tempmail', 'guerrillamail', 'mailinator', '10minutemail', 'throwaway',
			'trashmail', 'yopmail', 'maildrop', 'mohmal', 'mintemail', 'getnada',
			'fakeinbox', 'dispostable', 'meltmail', 'spamgourmet', 'emailondeck',
			'sharklasers', 'mytrashmail', 'temp-mail', 'tempail', 'tempinbox',
			'emailtemp', 'throwawaymail', 'mailcatch', 'emailias', 'spamfree24',
			'emailmiser', 'spamhole', 'spambox', 'getmeltmail', 'melt.li',
			'pokemail', 'spam4', 'bccto', 'chammy', 'devnullmail', 'mailnull',
			'nowmymail', 'mytemp', 'tmpmail', 'inboxkitten',
		);
		
		foreach ( $disposable_patterns as $pattern ) {
			if ( strpos( $domain, $pattern ) !== false ) {
				return true;
			}
		}
		
		return false;
	}

	/**
	 * Register admin page.
	 */
	public function register_admin_menu() {
		add_menu_page(
			__( 'ESG India Form Submissions', 'esg-india-contact-form' ),
			__( 'ESG India Form Submissions', 'esg-india-contact-form' ),
			'manage_options',
			'esg-india-contact-form-submissions',
			array( $this, 'render_admin_page' ),
			'dashicons-email-alt2',
			58
		);
		add_submenu_page(
			'esg-india-contact-form-submissions',
			__( 'Settings', 'esg-india-contact-form' ),
			__( 'Settings', 'esg-india-contact-form' ),
			'manage_options',
			'esg-india-contact-form-settings',
			array( $this, 'render_settings_page' )
		);
	}

	/**
	 * Render admin table.
	 */
	public function render_admin_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$filters = $this->get_filters();
		$items   = $this->get_submissions( $filters );
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'ESG India Form Submissions', 'esg-india-contact-form' ); ?></h1>
			
			<?php
			// Show success/error message if weekly report was sent manually
			if ( isset( $_GET['weekly_report_sent'] ) ) {
				$message_type = sanitize_text_field( wp_unslash( $_GET['weekly_report_sent'] ) );
				if ( 'success' === $message_type ) {
					echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Weekly report email sent successfully!', 'esg-india-contact-form' ) . '</p></div>';
				} elseif ( 'error' === $message_type ) {
					echo '<div class="notice notice-error is-dismissible"><p>' . esc_html__( 'Failed to send weekly report email. Please check your email settings.', 'esg-india-contact-form' ) . '</p></div>';
				}
			}
			?>
			
			<form method="get" style="margin-bottom: 20px;">
				<input type="hidden" name="page" value="esg-india-contact-form-submissions" />
				<label>
					<?php esc_html_e( 'Start Date', 'esg-india-contact-form' ); ?>
					<input type="date" name="start_date" value="<?php echo esc_attr( $filters['start_date'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'End Date', 'esg-india-contact-form' ); ?>
					<input type="date" name="end_date" value="<?php echo esc_attr( $filters['end_date'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'Email', 'esg-india-contact-form' ); ?>
					<input type="search" name="email" value="<?php echo esc_attr( $filters['email'] ); ?>" />
				</label>
				<button class="button button-primary" type="submit"><?php esc_html_e( 'Filter', 'esg-india-contact-form' ); ?></button>
				<?php wp_nonce_field( 'esg_india_contact_form_export', 'esg_india_contact_form_export_nonce' ); ?>
				<button class="button" name="esg_india_contact_form_export" value="1"><?php esc_html_e( 'Export CSV', 'esg-india-contact-form' ); ?></button>
			</form>
			
			<div style="margin-bottom: 20px; padding: 15px; background: #fff; border-left: 4px solid #2271b1; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
				<h2 style="margin-top: 0;"><?php esc_html_e( 'Weekly Report', 'esg-india-contact-form' ); ?></h2>
				<p><?php esc_html_e( 'Manually trigger the weekly report email to be sent immediately.', 'esg-india-contact-form' ); ?></p>
				<form method="post" action="">
					<?php wp_nonce_field( 'esg_india_contact_form_send_weekly_report_manual', 'esg_india_contact_form_weekly_report_nonce' ); ?>
					<input type="hidden" name="esg_india_contact_form_send_weekly_report" value="1" />
					<button type="submit" class="button button-secondary" onclick="return confirm('<?php echo esc_js( __( 'Are you sure you want to send the weekly report email now?', 'esg-india-contact-form' ) ); ?>');">
						<?php esc_html_e( 'Send Weekly Mail', 'esg-india-contact-form' ); ?>
					</button>
				</form>
			</div>
			<table class="widefat fixed striped">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Date', 'esg-india-contact-form' ); ?></th>
						<th><?php esc_html_e( 'Name', 'esg-india-contact-form' ); ?></th>
						<th><?php esc_html_e( 'Email', 'esg-india-contact-form' ); ?></th>
						<th><?php esc_html_e( 'Organization', 'esg-india-contact-form' ); ?></th>
						<th><?php esc_html_e( 'Message', 'esg-india-contact-form' ); ?></th>
						<th><?php esc_html_e( 'Source Tag', 'esg-india-contact-form' ); ?></th>
						<th><?php esc_html_e( 'Page URL', 'esg-india-contact-form' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if ( empty( $items ) ) : ?>
						<tr>
							<td colspan="8"><?php esc_html_e( 'No submissions found.', 'esg-india-contact-form' ); ?></td>
						</tr>
					<?php else : ?>
						<?php
						$date_format = get_option( 'date_format', 'Y-m-d' ) . ' ' . get_option( 'time_format', 'H:i' );
						foreach ( $items as $item ) :
							$timestamp = strtotime( $item->created_at );
							?>
							<tr>
								<td><?php echo esc_html( wp_date( $date_format, $timestamp ) ); ?></td>
								<td><?php echo esc_html( $item->name ); ?></td>
								<td><?php echo esc_html( $item->email ); ?></td>
								<td><?php echo esc_html( $item->organization ); ?></td>
								<td><?php echo esc_html( wp_trim_words( $item->message, 15 ) ); ?></td>
								<td><?php echo esc_html( $item->source_tag ); ?></td>
								<td><a href="<?php echo esc_url( $item->page_url ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'View', 'esg-india-contact-form' ); ?></a></td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
		<?php
	}

	/**
	 * Retrieve filter values.
	 *
	 * @return array
	 */
	private function get_filters() {
		return array(
			'start_date' => sanitize_text_field( wp_unslash( $_GET['start_date'] ?? '' ) ),
			'end_date'   => sanitize_text_field( wp_unslash( $_GET['end_date'] ?? '' ) ),
			'email'      => sanitize_email( wp_unslash( $_GET['email'] ?? '' ) ),
		);
	}

	/**
	 * Fetch submissions.
	 *
	 * @param array $filters Filters array.
	 *
	 * @return array
	 */
	private function get_submissions( $filters ) {
		global $wpdb;

		$where   = array();
		$prepare = array();

		if ( ! empty( $filters['start_date'] ) ) {
			$where[]   = 'created_at >= %s';
			$prepare[] = gmdate( 'Y-m-d 00:00:00', strtotime( $filters['start_date'] ) );
		}

		if ( ! empty( $filters['end_date'] ) ) {
			$where[]   = 'created_at <= %s';
			$prepare[] = gmdate( 'Y-m-d 23:59:59', strtotime( $filters['end_date'] ) );
		}

		if ( ! empty( $filters['email'] ) ) {
			$where[]   = 'email LIKE %s';
			$prepare[] = '%' . $wpdb->esc_like( $filters['email'] ) . '%';
		}

		$sql = 'SELECT * FROM ' . $this->get_table_name();
		if ( $where ) {
			$sql .= ' WHERE ' . implode( ' AND ', $where );
		}
		$sql .= ' ORDER BY created_at DESC LIMIT 200';

		if ( $prepare ) {
			$sql = $wpdb->prepare( $sql, $prepare ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		}

		return $wpdb->get_results( $sql );
	}

	/**
	 * Send weekly report manually if requested.
	 */
	public function maybe_send_weekly_report_manual() {
		if ( ! isset( $_POST['esg_india_contact_form_send_weekly_report'] ) || '1' !== $_POST['esg_india_contact_form_send_weekly_report'] ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'esg-india-contact-form' ) );
		}

		if ( ! isset( $_POST['esg_india_contact_form_weekly_report_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['esg_india_contact_form_weekly_report_nonce'] ) ), 'esg_india_contact_form_send_weekly_report_manual' ) ) {
			wp_die( esc_html__( 'Invalid request.', 'esg-india-contact-form' ) );
		}

		// Trigger the weekly report manually (pass true to use current time as end date)
		ob_start();
		$this->send_weekly_report( true );
		ob_end_clean();

		// Redirect back with success message (send_weekly_report handles errors internally)
		$redirect_url = add_query_arg(
			array(
				'page'                => 'esg-india-contact-form-submissions',
				'weekly_report_sent' => 'success',
			),
			admin_url( 'admin.php' )
		);
		wp_safe_redirect( $redirect_url );
		exit;
	}

	/**
	 * Export CSV if requested.
	 */
	public function maybe_export_csv() {
		$export_flag = isset( $_GET['esg_india_contact_form_export'] ) ? sanitize_text_field( wp_unslash( $_GET['esg_india_contact_form_export'] ) ) : '';
		if ( '1' !== $export_flag ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'esg-india-contact-form' ) );
		}

		if ( ! isset( $_GET['esg_india_contact_form_export_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['esg_india_contact_form_export_nonce'] ) ), 'esg_india_contact_form_export' ) ) {
			wp_die( esc_html__( 'Invalid export request.', 'esg-india-contact-form' ) );
		}

		$filters = $this->get_filters();
		$data    = $this->get_submissions( $filters );

		$filename = 'esg-india-contact-form-submissions-' . gmdate( 'Ymd-His' ) . '.csv';

		nocache_headers();
		header( 'Content-Type: text/csv; charset=UTF-8' );
		header( 'Content-Disposition: attachment; filename=' . $filename );

		$fh = fopen( 'php://output', 'w' );
		fputcsv(
			$fh,
			array(
				'ID',
				'Date',
				'Name',
				'Email',
				'Organization',
				'Message',
				'Source Tag',
				'Page URL',
				'IP',
			)
		);

		foreach ( $data as $row ) {
			fputcsv(
				$fh,
				array(
					$row->id,
					$row->created_at,
					$row->name,
					$row->email,
					$row->organization,
					$row->message,
					$row->source_tag,
					$row->page_url,
					$row->user_ip,
				)
			);
		}

		fclose( $fh );
		exit;
	}

	/**
	 * Register settings.
	 */
	public function register_settings() {
		register_setting( 'esg_india_contact_form_settings', self::OPTION_KEY, array( $this, 'sanitize_settings' ) );
	}

	/**
	 * Sanitize settings.
	 *
	 * @param array $input Settings input.
	 * @return array Sanitized settings.
	 */
	public function sanitize_settings( $input ) {
		$sanitized = array();
		
		if ( isset( $input['recaptcha_site_key'] ) ) {
			$sanitized['recaptcha_site_key'] = sanitize_text_field( $input['recaptcha_site_key'] );
		}
		
		if ( isset( $input['recaptcha_secret_key'] ) ) {
			$sanitized['recaptcha_secret_key'] = sanitize_text_field( $input['recaptcha_secret_key'] );
		}
		
		if ( isset( $input['recaptcha_score_threshold'] ) ) {
			$threshold = floatval( $input['recaptcha_score_threshold'] );
			$sanitized['recaptcha_score_threshold'] = max( 0.0, min( 1.0, $threshold ) );
		} else {
			$sanitized['recaptcha_score_threshold'] = 0.5;
		}
		
		return $sanitized;
	}

	/**
	 * Render settings page.
	 */
	public function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) ) {
			add_settings_error( 'esg_india_contact_form_messages', 'esg_india_contact_form_message', __( 'Settings saved.', 'esg-india-contact-form' ), 'updated' );
		}

		settings_errors( 'esg_india_contact_form_messages' );
		$settings = get_option( self::OPTION_KEY, array() );
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php settings_fields( 'esg_india_contact_form_settings' ); ?>
				<table class="form-table">
					<tr>
						<th scope="row">
							<label for="recaptcha_site_key"><?php esc_html_e( 'reCAPTCHA Site Key', 'esg-india-contact-form' ); ?></label>
						</th>
						<td>
							<input type="text" id="recaptcha_site_key" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[recaptcha_site_key]" value="<?php echo esc_attr( $settings['recaptcha_site_key'] ?? '' ); ?>" class="regular-text" />
							<p class="description">
								<?php esc_html_e( 'Enter your Google reCAPTCHA v3 Site Key. Leave empty to disable reCAPTCHA (honeypot and time-based protection will still work).', 'esg-india-contact-form' ); ?>
								<br />
								<a href="https://www.google.com/recaptcha/admin/create" target="_blank" rel="noopener"><?php esc_html_e( 'Get your keys', 'esg-india-contact-form' ); ?></a>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="recaptcha_secret_key"><?php esc_html_e( 'reCAPTCHA Secret Key', 'esg-india-contact-form' ); ?></label>
						</th>
						<td>
							<input type="text" id="recaptcha_secret_key" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[recaptcha_secret_key]" value="<?php echo esc_attr( $settings['recaptcha_secret_key'] ?? '' ); ?>" class="regular-text" />
							<p class="description">
								<?php esc_html_e( 'Enter your Google reCAPTCHA v3 Secret Key.', 'esg-india-contact-form' ); ?>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="recaptcha_score_threshold"><?php esc_html_e( 'Score Threshold', 'esg-india-contact-form' ); ?></label>
						</th>
						<td>
							<input type="number" id="recaptcha_score_threshold" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[recaptcha_score_threshold]" value="<?php echo esc_attr( $settings['recaptcha_score_threshold'] ?? '0.5' ); ?>" min="0" max="1" step="0.1" />
							<p class="description">
								<?php esc_html_e( 'reCAPTCHA score threshold (0.0 = bot, 1.0 = human). Default: 0.5. Lower values are more strict.', 'esg-india-contact-form' ); ?>
							</p>
						</td>
					</tr>
				</table>
				<p class="description" style="margin-top: 20px;">
					<strong><?php esc_html_e( 'Bot Protection Features:', 'esg-india-contact-form' ); ?></strong><br />
					• <?php esc_html_e( 'Honeypot field (always active - invisible to users)', 'esg-india-contact-form' ); ?><br />
					• <?php esc_html_e( 'Time-based validation (prevents instant submissions)', 'esg-india-contact-form' ); ?><br />
					• <?php esc_html_e( 'Google reCAPTCHA v3 (optional - configure above)', 'esg-india-contact-form' ); ?>
				</p>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}

ESG_India_Contact_Form_Plugin::instance();




