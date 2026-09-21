<?php
/**
 * Plugin Name: Succeed Landing Page Contact Form
 * Description: AJAX powered landing page contact form with UTM capture, email notifications, and submission dashboard.
 * Version: 1.0.0
 * Author: SucceedTech
 * Text Domain: succeed-landing-page-form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class LPF_Plugin {
	const VERSION = '1.0.0';
	const OPTION_KEY = 'lpf_settings';

	/**
	 * Singleton instance.
	 *
	 * @var LPF_Plugin|null
	 */
	private static $instance = null;

	/**
	 * Table name cache.
	 *
	 * @var string|null
	 */
	private $table_name = null;

	/**
	 * Flag to track when we're sending our plugin's emails.
	 *
	 * @var bool
	 */
	private $is_sending_lpf_email = false;

	/**
	 * Get singleton instance.
	 *
	 * @return LPF_Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		add_action( 'init', array( $this, 'register_shortcodes' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'wp_ajax_lpf_submit_form', array( $this, 'handle_form_submission' ) );
		add_action( 'wp_ajax_nopriv_lpf_submit_form', array( $this, 'handle_form_submission' ) );
		add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'maybe_export_csv' ) );
		add_action( 'wp_head', array( $this, 'add_amp_scripts' ) );
		add_action( 'lpf_send_emails', array( $this, 'process_emails_background' ) );
		// Set custom "From" email address and name for our plugin's emails
		add_filter( 'wp_mail_from', array( $this, 'set_lpf_from_email' ), 10 );
		add_filter( 'wp_mail_from_name', array( $this, 'set_lpf_from_name' ), 10 );
		// Force "SucceedLEARN" as From name for our emails (Post SMTP will handle AWS SES compatibility)
		add_filter( 'wp_mail_from_name', array( $this, 'set_lpf_from_name_global' ), 999 );
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
		
		// Migrate old table if it exists
		$this->migrate_old_table();
	}

	/**
	 * Migrate data from old table to new table if old table exists.
	 */
	private function migrate_old_table() {
		global $wpdb;
		
		$old_table = "{$wpdb->prefix}stcf_lp_submissions";
		$new_table = $this->get_table_name();
		
		// Check if old table exists
		$old_table_exists = $wpdb->get_var( $wpdb->prepare( 
			"SHOW TABLES LIKE %s", 
			$old_table 
		) ) === $old_table;
		
		if ( $old_table_exists ) {
			// Check if new table exists
			$new_table_exists = $wpdb->get_var( $wpdb->prepare( 
				"SHOW TABLES LIKE %s", 
				$new_table 
			) ) === $new_table;
			
			if ( ! $new_table_exists ) {
				// Rename old table to new table
				$wpdb->query( "RENAME TABLE `{$old_table}` TO `{$new_table}`" );
			} else {
				// Both tables exist, copy data and drop old table
				$wpdb->query( "INSERT INTO `{$new_table}` SELECT * FROM `{$old_table}`" );
				$wpdb->query( "DROP TABLE IF EXISTS `{$old_table}`" );
			}
		}
	}

	/**
	 * Ensure the database table exists.
	 */
	private function ensure_table_exists() {
		global $wpdb;
		
		// First, try to migrate old table if it exists
		$this->migrate_old_table();
		
		$table_name = $this->get_table_name();
		
		// Check if table exists
		$table_exists = $wpdb->get_var( $wpdb->prepare( 
			"SHOW TABLES LIKE %s", 
			$table_name 
		) ) === $table_name;
		
		if ( ! $table_exists ) {
			// Table doesn't exist, create it
			$this->activate();
		}
	}

	/**
	 * Return database table name.
	 *
	 * @return string
	 */
	private function get_table_name() {
		global $wpdb;

		if ( null === $this->table_name ) {
			$this->table_name = "{$wpdb->prefix}lpf_submissions";
		}

		return $this->table_name;
	}

	/**
	 * Register shortcode.
	 */
	public function register_shortcodes() {
		add_shortcode( 'succeed_landing_page_form', array( $this, 'render_form' ) );
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
		
		if ( ! has_shortcode( $post_content, 'succeed_landing_page_form' ) ) {
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

		if ( has_shortcode( $post_content, 'succeed_landing_page_form' ) ) {
			wp_enqueue_style(
				'lpf-form',
				plugins_url( 'assets/css/form.css', __FILE__ ),
				array(),
				self::VERSION
			);

			wp_enqueue_script(
				'lpf-form',
				plugins_url( 'assets/js/form.js', __FILE__ ),
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
				'lpf-form',
				'LPF_FORM',
				array(
					'ajaxUrl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'lpf_submit' ),
					'recaptchaSiteKey' => $recaptcha_site_key,
					'messages' => array(
						'success' => __( 'Thank you! We will contact you soon.', 'succeed-landing-page-form' ),
						'error'   => __( 'Something went wrong. Please try again.', 'succeed-landing-page-form' ),
						'privacy' => __( 'You must accept the privacy policy.', 'succeed-landing-page-form' ),
						'bot'     => __( 'Bot detected. Submission rejected.', 'succeed-landing-page-form' ),
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
	 * Render form shortcode.
	 *
	 * @return string
	 */
	public function render_form() {
		// Prevent caching so math captcha regenerates and dynamic data stays fresh.
		if ( ! defined( 'DONOTCACHEPAGE' ) ) {
			define( 'DONOTCACHEPAGE', true );
		}
		if ( ! headers_sent() ) {
			nocache_headers();
		}

		// Render AMP form if on AMP page
		if ( $this->is_amp() ) {
			return $this->render_amp_form();
		}
		
		ob_start();
		$privacy_url = get_privacy_policy_url();
		
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
		set_transient( 'lpf_honeypots_' . md5( $form_token ), $honeypot_names, 3600 );
		?>
		<form id="lpf-form" class="lpf-form" method="post">
			<input type="hidden" name="lpf_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
			<input type="hidden" name="lpf_form_time" value="<?php echo esc_attr( time() ); ?>" />
			<!-- Multiple Honeypot fields - hidden from users but bots will fill them -->
			<div class="lpf-honeypot">
				<label for="lpf-website"><?php esc_html_e( 'Website', 'succeed-landing-page-form' ); ?></label>
				<input type="text" id="lpf-website" name="<?php echo esc_attr( $honeypot_names['website'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div class="lpf-honeypot">
				<label for="lpf-company"><?php esc_html_e( 'Company URL', 'succeed-landing-page-form' ); ?></label>
				<input type="text" id="lpf-company" name="<?php echo esc_attr( $honeypot_names['company'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div class="lpf-honeypot">
				<label for="lpf-url"><?php esc_html_e( 'Your URL', 'succeed-landing-page-form' ); ?></label>
				<input type="url" id="lpf-url" name="<?php echo esc_attr( $honeypot_names['url'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div class="lpf-field">
				<label for="lpf-name"><?php esc_html_e( 'Full Name', 'succeed-landing-page-form' ); ?> <span class="lpf-required">*</span></label>
				<input type="text" id="lpf-name" name="name" required />
				<span class="lpf-error-message"></span>
			</div>
			<div class="lpf-field">
				<label for="lpf-email"><?php esc_html_e( 'Business Email', 'succeed-landing-page-form' ); ?> <span class="lpf-required">*</span></label>
				<input type="email" id="lpf-email" name="email" required />
				<span class="lpf-error-message"></span>
			</div>
			<div class="lpf-field">
				<label for="lpf-organization"><?php esc_html_e( 'Company Name', 'succeed-landing-page-form' ); ?> <span class="lpf-required">*</span></label>
				<input type="text" id="lpf-organization" name="organization" required />
				<span class="lpf-error-message"></span>
			</div>
			<div class="lpf-field">
				<label for="lpf-message"><?php esc_html_e( 'Your Message', 'succeed-landing-page-form' ); ?></label>
				<textarea id="lpf-message" name="message" rows="4"></textarea>
				<span class="lpf-error-message"></span>
			</div>
			<div class="lpf-field lpf-checkbox">
				<input type="checkbox" id="lpf-privacy" name="privacy" value="1" required />
				<label for="lpf-privacy">
					<?php
					printf(
						wp_kses(
							/* translators: %s privacy policy url */
							__( 'I Accept <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'succeed-landing-page-form' ),
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
					<span class="lpf-required"> *</span>
				</label>
				<span class="lpf-error-message"></span>
			</div>
			
			<!-- Enhanced Math Captcha for additional security -->
			<div class="lpf-field">
				<label for="lpf-captcha" id="lpf-captcha-label">
					<?php 
					/* translators: %1$d and %2$d are numbers for math captcha */
					printf( esc_html__( 'Security Question: What is %1$d + %2$d?', 'succeed-landing-page-form' ), $captcha_a, $captcha_b ); 
					?> 
					<span class="lpf-required"> *</span>
				</label>
				<input type="number" id="lpf-captcha" name="lpf_captcha" required min="0" max="40" />
				<input type="hidden" name="lpf_captcha_a" id="lpf-captcha-a" value="<?php echo esc_attr( $captcha_a ); ?>" />
				<input type="hidden" name="lpf_captcha_b" id="lpf-captcha-b" value="<?php echo esc_attr( $captcha_b ); ?>" />
				<span class="lpf-error-message"></span>
			</div>
			
			<input type="hidden" name="utm_source" />
			<input type="hidden" name="utm_medium" />
			<input type="hidden" name="utm_campaign" />
			<input type="hidden" name="utm_term" />
			<input type="hidden" name="utm_content" />
			<input type="hidden" name="page_url" />
			<button type="submit" class="lpf-submit">
				<span class="lpf-submit-text"><?php esc_html_e( 'Submit', 'succeed-landing-page-form' ); ?></span>
				<span class="lpf-submit-loading" style="display: none;">
					<span class="lpf-spinner"></span>
					<?php esc_html_e( 'Submitting...', 'succeed-landing-page-form' ); ?>
				</span>
			</button>
			<p class="lpf-response" role="status" aria-live="polite"></p>
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
		$nonce = wp_create_nonce( 'lpf_submit' );
		$current_url = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		
		// Generate math captcha (10-20 + 10-20)
		$captcha_a = rand( 10, 20 );
		$captcha_b = rand( 10, 20 );
		$captcha_sum = $captcha_a + $captcha_b;
		
		// Generate server-side form token
		$form_token = $this->generate_form_token();
		?>
		<!-- AMP form state for button text and form time -->
		<amp-state id="buttonState">
			<script type="application/json">{"text":"<?php echo esc_js( __( 'Submit', 'succeed-landing-page-form' ) ); ?>","loading":false}</script>
		</amp-state>
		<amp-state id="formTime">
			<script type="application/json"><?php echo esc_js( time() ); ?></script>
		</amp-state>
		<amp-state id="formFields">
			<script type="application/json">{"name":"","email":"","organization":"","message":"","captcha":"","privacy":false}</script>
		</amp-state>
		<amp-state id="errorMessage">
			<script type="application/json">""</script>
		</amp-state>
		
		<form 
			id="lpf-form" 
			class="lpf-form" 
			method="post" 
			action-xhr="<?php echo esc_url( $ajax_url ); ?>" 
			target="_top"
			on="
				submit: AMP.setState({ buttonState: {text: '<?php echo esc_js( __( 'Submitting...', 'succeed-landing-page-form' ) ); ?>', loading: true} });
				submit-success: AMP.setState({ buttonState: {text: '<?php echo esc_js( __( 'Submit', 'succeed-landing-page-form' ) ); ?>', loading: false}, formTime: <?php echo esc_js( time() ); ?>, formFields: {name: '', email: '', organization: '', message: '', captcha: '', privacy: false} }), lpf-form.reset, success-popup.open;
				submit-error: AMP.setState({ buttonState: {text: '<?php echo esc_js( __( 'Submit', 'succeed-landing-page-form' ) ); ?>', loading: false} });
			"
		>
			<input type="hidden" name="action" value="lpf_submit_form" />
			<input type="hidden" name="nonce" value="<?php echo esc_attr( $nonce ); ?>" />
			<input type="hidden" name="lpf_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
			<input type="hidden" name="lpf_form_time" id="lpf-form-time" [value]="formTime || <?php echo esc_js( time() ); ?>" value="<?php echo esc_attr( time() ); ?>" />
			
			<!-- Multiple Honeypot fields - hidden from users but bots will fill them -->
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="lpf-website-amp"><?php esc_html_e( 'Website', 'succeed-landing-page-form' ); ?></label>
				<input type="text" id="lpf-website-amp" name="website" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="lpf-company-amp"><?php esc_html_e( 'Company URL', 'succeed-landing-page-form' ); ?></label>
				<input type="text" id="lpf-company-amp" name="company" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="lpf-url-amp"><?php esc_html_e( 'Your URL', 'succeed-landing-page-form' ); ?></label>
				<input type="url" id="lpf-url-amp" name="url" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			
			<div class="lpf-field">
				<label for="lpf-name"><?php esc_html_e( 'Full Name', 'succeed-landing-page-form' ); ?> <span class="lpf-required">*</span></label>
				<input type="text" id="lpf-name" name="name" [value]="formFields.name" required />
				<span visible-when-invalid="valueMissing" validation-for="lpf-name" class="lpf-error-message">Please fill out this field.</span>
			</div>
			
			<div class="lpf-field">
				<label for="lpf-email"><?php esc_html_e( 'Business Email', 'succeed-landing-page-form' ); ?> <span class="lpf-required">*</span></label>
				<input type="email" id="lpf-email" name="email" [value]="formFields.email" required />
				<span visible-when-invalid="valueMissing" validation-for="lpf-email" class="lpf-error-message">Enter a business email</span>
				<span visible-when-invalid="typeMismatch" validation-for="lpf-email" class="lpf-error-message">Enter a business email</span>
			</div>
			
			<div class="lpf-field">
				<label for="lpf-organization"><?php esc_html_e( 'Company Name', 'succeed-landing-page-form' ); ?> <span class="lpf-required">*</span></label>
				<input type="text" id="lpf-organization" name="organization" [value]="formFields.organization" required />
				<span visible-when-invalid="valueMissing" validation-for="lpf-organization" class="lpf-error-message">Please fill out this field.</span>
			</div>
			
			<div class="lpf-field">
				<label for="lpf-message"><?php esc_html_e( 'Your Message', 'succeed-landing-page-form' ); ?></label>
				<textarea id="lpf-message" name="message" [text]="formFields.message" rows="4"></textarea>
			</div>
			
			<div class="lpf-field lpf-checkbox">
				<input type="checkbox" id="lpf-privacy" name="privacy" value="1" [checked]="formFields.privacy" required />
				<label for="lpf-privacy">
					<?php
					printf(
						wp_kses(
							/* translators: %s privacy policy url */
							__( 'I Accept <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'succeed-landing-page-form' ),
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
					<span class="lpf-required"> *</span>
				</label>
				<span visible-when-invalid="valueMissing" validation-for="lpf-privacy" class="lpf-error-message">Please accept the privacy policy.</span>
			</div>
			
			<!-- Enhanced Math Captcha for additional security -->
			<div class="lpf-field">
				<label for="lpf-captcha">
					<?php 
					/* translators: %1$d and %2$d are numbers for math captcha */
					printf( esc_html__( 'Security Question: What is %1$d + %2$d?', 'succeed-landing-page-form' ), $captcha_a, $captcha_b ); 
					?> 
					<span class="lpf-required"> *</span>
				</label>
				<input type="number" id="lpf-captcha" name="lpf_captcha" [value]="formFields.captcha" required min="0" max="40" />
				<input type="hidden" name="lpf_captcha_a" value="<?php echo esc_attr( $captcha_a ); ?>" />
				<input type="hidden" name="lpf_captcha_b" value="<?php echo esc_attr( $captcha_b ); ?>" />
				<span visible-when-invalid="valueMissing" validation-for="lpf-captcha" class="lpf-error-message"><?php esc_html_e( 'Please answer the security question.', 'succeed-landing-page-form' ); ?></span>
			</div>
			
			<?php if ( ! empty( $recaptcha_site_key ) ) : ?>
				<amp-recaptcha-input 
					layout="nodisplay" 
					name="recaptcha_token"
					data-sitekey="<?php echo esc_attr( $recaptcha_site_key ); ?>"
					data-action="submit">
				</amp-recaptcha-input>
			<?php endif; ?>
			
			<input type="hidden" name="utm_source" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_source'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_medium" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_medium'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_campaign" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_campaign'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_term" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_term'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_content" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_content'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="page_url" value="<?php echo esc_attr( esc_url_raw( $current_url ) ); ?>" />
			
			<button type="submit" class="lpf-submit" [disabled]="buttonState.loading">
				<span [text]="buttonState.text"><?php esc_html_e( 'Submit', 'succeed-landing-page-form' ); ?></span>
			</button>
			
			<!-- Error response template for AMP - shows error message in lightbox style -->
			<div submit-error class="lpf-amp-error">
				<template type="amp-mustache">
					<div class="lpf-lightbox-overlay">
						<div class="lpf-lightbox-content lpf-lightbox-error">
							<div class="lpf-lightbox-icon">❌</div>
							<div class="lpf-lightbox-title"><?php esc_html_e( 'Submission Failed', 'succeed-landing-page-form' ); ?></div>
							<div class="lpf-lightbox-message">{{message}}</div>
							<button on="tap:lpf-form.submit-error.hide" class="lpf-lightbox-button">
								<?php esc_html_e( 'Close', 'succeed-landing-page-form' ); ?>
							</button>
						</div>
					</div>
				</template>
			</div>
			<div submit-success style="display: none;">
				<template type="amp-mustache">
					<!-- Success is handled by lightbox -->
				</template>
			</div>
			
		</form>
		
		<!-- Success Lightbox -->
		<amp-lightbox id="success-popup" layout="nodisplay">
			<div class="lpf-lightbox-overlay">
				<div class="lpf-lightbox-content lpf-lightbox-success">
					<div class="lpf-lightbox-icon">🎉</div>
					<div class="lpf-lightbox-title"><?php esc_html_e( 'Submitted Successfully', 'succeed-landing-page-form' ); ?></div>
					<div class="lpf-lightbox-message"><?php esc_html_e( 'Thank you! We will contact you soon.', 'succeed-landing-page-form' ); ?></div>
					<button on="tap:success-popup.close" class="lpf-lightbox-button">
						<?php esc_html_e( 'Close', 'succeed-landing-page-form' ); ?>
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
		$form_token = sanitize_text_field( wp_unslash( $_POST['lpf_form_token'] ?? '' ) );
		if ( ! $this->verify_form_token( $form_token, false ) ) {
			return true; // Invalid or missing token
		}
		
		// Get honeypot field names from transient (don't delete yet - only on success)
		$honeypot_key = 'lpf_honeypots_' . md5( $form_token );
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
		$captcha_a = absint( $_POST['lpf_captcha_a'] ?? 0 );
		$captcha_b = absint( $_POST['lpf_captcha_b'] ?? 0 );
		$captcha_user = absint( $_POST['lpf_captcha'] ?? 0 );
		
		// Validate captcha: both values must be present and user answer must match
		if ( $captcha_a <= 0 || $captcha_b <= 0 ) {
			// Missing captcha values - invalid submission
			return true;
		}
		
		$captcha_expected = $captcha_a + $captcha_b;
		if ( $captcha_user !== $captcha_expected ) {
			// Wrong answer
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

		$user_ip = $this->get_user_ip();
		if ( ! empty( $user_ip ) ) {
			$rate_limit_key = 'lpf_rate_limit_' . md5( $user_ip );
			$last_submission = get_transient( $rate_limit_key );
			
			if ( false !== $last_submission ) {
				// Same IP submitted within last 30 seconds - likely a bot
				// Log for debugging (remove in production if needed)
				error_log( 'LPF Rate Limit: IP ' . $user_ip . ' blocked. Last submission: ' . $last_submission );
				return true;
			}
			// Note: Transient will be set AFTER successful submission, not here
		}

		// 4. Check time-based validation - if submitted too quickly, likely a bot
		$form_time = absint( $_POST['lpf_form_time'] ?? 0 );
		if ( $form_time > 0 ) {
			$time_elapsed = time() - $form_time;
			// If form submitted in less than 5 seconds, likely a bot
			if ( $time_elapsed < 5 ) {
				return true;
			}
			// If form submitted after more than 3 hours, might be stale (increased to match token expiration)
			if ( $time_elapsed > 10800 ) {
				return true;
			}
		}

		// 5. Check for spam patterns in content
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
			
			// Check for suspicious email patterns in local part (before @)
			$email_parts = explode( '@', $email );
			if ( count( $email_parts ) === 2 ) {
				$local_part = strtolower( trim( $email_parts[0] ) );
				
				// Block obvious test/fake email patterns (exact matches only to avoid blocking legitimate emails)
				$test_patterns = array(
					'test', 'testing', 'tester', 'demo', 'sample', 'fake', 'dummy',
					'invalid', 'example', 'temp', 'temporary', 'spamtest', 'test123',
					'test1', 'test2', 'test3', 'demo1', 'sample1', 'fake1',
				);
				
				// Check for exact match with test patterns
				if ( in_array( $local_part, $test_patterns, true ) ) {
					return true;
				}
				
				// Block emails that are just numbers or very short (less than 3 characters)
				if ( preg_match( '/^[0-9]+$/', $local_part ) || strlen( $local_part ) < 3 ) {
					return true;
				}
				
				// Block patterns like "test123", "demo456" etc. (test/demo/sample/fake followed by numbers)
				if ( preg_match( '/^(test|demo|sample|fake|dummy|invalid|example|temp|temporary)[0-9]+$/', $local_part ) ) {
					return true;
				}
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
			
			// Verify email domain: MX records, DNS, and legitimacy
			if ( ! $this->validate_email_domain( $email ) ) {
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
					'timeout' => 5, // Reduced from 10 to 5 seconds for faster response
					'blocking' => true,
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
	 * Send response for both AMP and non-AMP (without exit - for email sending after response).
	 *
	 * @param string $message Response message.
	 * @param bool   $success Whether response is success.
	 * @param int    $status_code HTTP status code.
	 */
	private function send_response_no_exit( $message, $success = true, $status_code = 200 ) {
		$this->send_response_internal( $message, $success, $status_code, false );
	}

	/**
	 * Send response for both AMP and non-AMP.
	 *
	 * @param string $message Response message.
	 * @param bool   $success Whether response is success.
	 * @param int    $status_code HTTP status code.
	 */
	private function send_response( $message, $success = true, $status_code = 200 ) {
		$this->send_response_internal( $message, $success, $status_code, true );
	}

	/**
	 * Internal method to send response.
	 *
	 * @param string $message Response message.
	 * @param bool   $success Whether response is success.
	 * @param int    $status_code HTTP status code.
	 * @param bool   $exit Whether to exit after sending response.
	 */
	private function send_response_internal( $message, $success = true, $status_code = 200, $exit = true ) {
		// Check if this is an AMP request
		$is_amp_request = $this->is_amp() || 
						  ( isset( $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) && 'true' === $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) ||
						  ( isset( $_POST['action'] ) && 'lpf_submit_form' === $_POST['action'] && ! wp_doing_ajax() );
		
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
			
			// AMP expects specific JSON format
			// For success: {"success": true} or just valid JSON
			// For error: HTTP 4xx status with error message
			if ( $success ) {
				$response = array( 
					'success' => true,
					'message' => $message 
				);
			} else {
				// For errors, AMP expects the message in the response
				$response = array( 
					'message' => $message 
				);
			}
			
			// Send clean JSON response
			echo wp_json_encode( $response );
			if ( $exit ) {
				exit;
			}
			return;
		}
		
		// For non-AMP, use WordPress functions
		if ( $exit ) {
			if ( $success ) {
				wp_send_json_success( array( 'message' => $message ) );
			} else {
				wp_send_json_error( array( 'message' => $message ), $status_code );
			}
		} else {
			// Send response without exit (for non-AMP, we'll handle it differently)
			// Since wp_send_json_* functions exit, we need to send manually
			header( 'Content-Type: application/json; charset=utf-8' );
			http_response_code( $status_code );
			if ( $success ) {
				echo wp_json_encode( array( 'success' => true, 'data' => array( 'message' => $message ) ) );
			} else {
				echo wp_json_encode( array( 'success' => false, 'data' => array( 'message' => $message ) ) );
			}
		}
	}

	/**
	 * Handle AJAX submissions.
	 */
	public function handle_form_submission() {
		// Enable error logging for debugging (remove in production if needed)
		$debug_mode = defined( 'WP_DEBUG' ) && WP_DEBUG;
		
		try {
			// Verify nonce
			$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
			
			if ( empty( $nonce ) ) {
				if ( $debug_mode ) {
					error_log( 'LPF Form: Nonce verification failed - nonce is empty' );
				}
				$this->send_response( 
					__( 'Security token is missing. Please refresh the page and try again.', 'succeed-landing-page-form' ),
					false,
					403
				);
				return;
			}
			
			$nonce_verified = wp_verify_nonce( $nonce, 'lpf_submit' );
			
			if ( ! $nonce_verified ) {
				// Log for debugging (remove in production if needed)
				if ( $debug_mode ) {
					error_log( 'LPF Form: Nonce verification failed. Nonce received: ' . substr( $nonce, 0, 10 ) . '...' );
				}
				$this->send_response( 
					__( 'Security check failed. Please refresh the page and try again.', 'succeed-landing-page-form' ),
					false,
					403
				);
				return;
			}

		// Validate email first and return specific error message
		$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
		$email_error = $this->validate_email_with_message( $email );
		if ( $email_error ) {
			$this->send_response( $email_error, false, 400 );
			return;
		}

		// Bot protection checks
		$bot_detected = $this->detect_bot();
		if ( $bot_detected ) {
			$user_ip = $this->get_user_ip();
			$rate_limit_key = 'lpf_rate_limit_' . md5( $user_ip );
			$last_submission = get_transient( $rate_limit_key );
			
			// Check if it's a wrong captcha answer
			$captcha_a = absint( $_POST['lpf_captcha_a'] ?? 0 );
			$captcha_b = absint( $_POST['lpf_captcha_b'] ?? 0 );
			$captcha_user = absint( $_POST['lpf_captcha'] ?? 0 );
			$captcha_expected = $captcha_a + $captcha_b;
			$is_wrong_captcha = ( $captcha_a > 0 && $captcha_b > 0 && $captcha_user !== $captcha_expected );
			
			// Check form token
			$form_token = sanitize_text_field( wp_unslash( $_POST['lpf_form_token'] ?? '' ) );
			$is_invalid_token = empty( $form_token ) || ! $this->verify_form_token( $form_token, false );
			
			// Check time-based validation (increased to 3 hours to match token expiration)
			$form_time = absint( $_POST['lpf_form_time'] ?? 0 );
			$time_elapsed = $form_time > 0 ? ( time() - $form_time ) : 0;
			$is_too_fast = $form_time > 0 && $time_elapsed < 5;
			$is_too_old = $form_time > 0 && $time_elapsed > 10800; // 3 hours
			
			// Provide clear error message for different failure scenarios
			if ( false !== $last_submission ) {
				$time_remaining = 30 - ( time() - $last_submission );
				$message = sprintf(
					__( 'You have recently submitted the form. Please wait %d seconds before submitting again to ensure we reduce spam. Thank you for your patience.', 'succeed-landing-page-form' ),
					max( 1, $time_remaining )
				);
			} elseif ( $is_wrong_captcha ) {
				$message = __( 'The answer to the security question is incorrect. Please check your calculation and try again.', 'succeed-landing-page-form' );
			} elseif ( $is_invalid_token ) {
				$message = __( 'Your form session has expired. Please refresh the page to get a new form and try again.', 'succeed-landing-page-form' );
			} elseif ( $is_too_fast ) {
				$message = __( 'Please take your time to fill out the form properly.', 'succeed-landing-page-form' );
			} elseif ( $is_too_old ) {
				$message = __( 'This form session has expired. Please refresh the page and try again.', 'succeed-landing-page-form' );
			} else {
				$message = __( 'There was an issue with your submission. Please refresh the page and try again.', 'succeed-landing-page-form' );
			}

			$this->send_response( $message, false, 403 );
			return;
		}

		$name          = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
		$email         = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
		$organization  = sanitize_text_field( wp_unslash( $_POST['organization'] ?? '' ) );
		$message       = wp_kses_post( wp_unslash( $_POST['message'] ?? '' ) );
		$privacy       = isset( $_POST['privacy'] );
		$utm_source    = sanitize_text_field( wp_unslash( $_POST['utm_source'] ?? '' ) );
		$utm_medium    = sanitize_text_field( wp_unslash( $_POST['utm_medium'] ?? '' ) );
		$utm_campaign  = sanitize_text_field( wp_unslash( $_POST['utm_campaign'] ?? '' ) );
		$utm_term      = sanitize_text_field( wp_unslash( $_POST['utm_term'] ?? '' ) );
		$utm_content   = sanitize_text_field( wp_unslash( $_POST['utm_content'] ?? '' ) );
		$page_url      = esc_url_raw( wp_unslash( $_POST['page_url'] ?? '' ) );

		if ( empty( $name ) || empty( $email ) || empty( $organization ) || ! $privacy ) {
			$this->send_response( 
				__( 'Please fill in all required fields and accept the privacy policy.', 'succeed-landing-page-form' ),
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
			'utm_source'       => $utm_source,
			'utm_medium'       => $utm_medium,
			'utm_campaign'     => $utm_campaign,
			'utm_term'         => $utm_term,
			'utm_content'      => $utm_content,
			'page_url'         => $page_url,
			'user_ip'          => $this->get_user_ip(),
			'user_agent'       => sanitize_textarea_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ?? '' ) ),
			'created_at'       => current_time( 'mysql' ),
		);

		global $wpdb;
		
		// Ensure table exists
		$this->ensure_table_exists();
		
		$inserted = $wpdb->insert( $this->get_table_name(), $data );

		if ( false === $inserted ) {
			// Log the actual database error for debugging
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'LPF Form: Database insert failed. Error: ' . $wpdb->last_error );
				error_log( 'LPF Form: Table name: ' . $this->get_table_name() );
			}
			
			$this->send_response( 
				__( 'Unable to save your submission. Please try again later.', 'succeed-landing-page-form' ),
				false,
				500
			);
		}

		// Set rate limiting transient AFTER successful submission
		$user_ip = $this->get_user_ip();
		if ( ! empty( $user_ip ) ) {
			$rate_limit_key = 'lpf_rate_limit_' . md5( $user_ip );
			// Set transient for 30 seconds to prevent rapid resubmissions
			set_transient( $rate_limit_key, time(), 30 );
		}

		// Delete form token and honeypot transient only after successful submission
		$form_token = sanitize_text_field( wp_unslash( $_POST['lpf_form_token'] ?? '' ) );
		if ( ! empty( $form_token ) ) {
			$this->verify_form_token( $form_token, true );
			$honeypot_key = 'lpf_honeypots_' . md5( $form_token );
			delete_transient( $honeypot_key );
		}

		// Get submission ID before sending response
		$submission_id = $wpdb->insert_id;
		
		$debug_mode = defined( 'WP_DEBUG' ) && WP_DEBUG;
		
		if ( $debug_mode ) {
			error_log( 'LPF: Starting email sending process. Submission ID: ' . $submission_id );
			error_log( 'LPF: Email data - Name: ' . $data['name'] . ', Email: ' . $data['email'] );
		}
		
		// Send response first for fast user experience
		$this->send_response_no_exit( 
			__( 'Thank you! We will contact you soon.', 'succeed-landing-page-form' ),
			true
		);
		
		// Flush output to ensure response is sent to user
		if ( ob_get_level() ) {
			ob_end_flush();
		}
		flush();
		
		// Send emails directly after response is sent (but still in same request)
		// This ensures Post SMTP can process them properly
		if ( function_exists( 'fastcgi_finish_request' ) ) {
			// Finish sending response to user first
			fastcgi_finish_request();
			if ( $debug_mode ) {
				error_log( 'LPF: Response sent via FastCGI, now sending emails' );
			}
		} else {
			if ( $debug_mode ) {
				error_log( 'LPF: FastCGI not available, sending emails directly' );
			}
		}
		
		// Send emails directly with the data we have
		try {
			if ( $debug_mode ) {
				error_log( 'LPF: Calling send_admin_email' );
			}
			$this->send_admin_email( $data );
			
			if ( $debug_mode ) {
				error_log( 'LPF: Calling send_user_email' );
			}
			$this->send_user_email( $data );
			
			if ( $debug_mode ) {
				error_log( 'LPF: All emails sent successfully' );
			}
		} catch ( Exception $e ) {
			if ( $debug_mode ) {
				error_log( 'LPF: Error sending emails: ' . $e->getMessage() );
				error_log( 'LPF: Error trace: ' . $e->getTraceAsString() );
			}
		}
		
		// Exit after emails are sent
		exit;
		
		} catch ( Exception $e ) {
			// Log error for debugging
			if ( $debug_mode ) {
				error_log( 'LPF Form Error: ' . $e->getMessage() );
			}
			// Send error response
			$this->send_response( 
				__( 'An error occurred while processing your submission. Please try again.', 'succeed-landing-page-form' ),
				false,
				500
			);
		}
	}

	/**
	 * Send admin notification.
	 *
	 * @param array $data Submission data.
	 */
	public function send_admin_email( $data ) {
		$admin_emails = array(
			'depakar@succeedtech.com',
			'vishwadeep@succeedtech.com',
		);
		
		$subject     = sprintf( __( 'New Landing Page Contact Submission from %s', 'succeed-landing-page-form' ), $data['name'] );
		
		// Format headers properly for Post SMTP compatibility
		// Post SMTP will format the From header with display name for AWS SES
		$headers = array();
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'From: SucceedLEARN <noreply@succeedlearn.com>';
		$headers[] = 'Reply-To: ' . sanitize_text_field( $data['name'] ) . ' <' . sanitize_email( $data['email'] ) . '>';

		// Email body without UTM parameters and Page URL
		$body = sprintf(
			'<h2>New Form Submission from Landing Page</h2>
			<p><strong>Name:</strong> %1$s</p>
			<p><strong>Email:</strong> %2$s</p>
			<p><strong>Company Name:</strong> %3$s</p>
			<p><strong>Message:</strong><br/>%4$s</p>
			<p><strong>IP:</strong> %5$s</p>',
			esc_html( $data['name'] ),
			esc_html( $data['email'] ),
			esc_html( $data['organization'] ),
			nl2br( esc_html( $data['message'] ) ),
			esc_html( $data['user_ip'] )
		);

		$debug_mode = defined( 'WP_DEBUG' ) && WP_DEBUG;
		
		// Validate email addresses
		$valid_emails = array();
		foreach ( $admin_emails as $email ) {
			if ( is_email( $email ) ) {
				$valid_emails[] = $email;
			} else {
				if ( $debug_mode ) {
					error_log( 'LPF: Invalid admin email address: ' . $email );
				}
			}
		}
		
		if ( empty( $valid_emails ) ) {
			if ( $debug_mode ) {
				error_log( 'LPF: No valid admin email addresses to send to' );
			}
			return;
		}
		
		if ( $debug_mode ) {
			error_log( 'LPF: Attempting to send admin email to: ' . implode( ', ', $valid_emails ) );
			error_log( 'LPF: Subject: ' . $subject );
			error_log( 'LPF: wp_mail function exists: ' . ( function_exists( 'wp_mail' ) ? 'yes' : 'no' ) );
		}
		
		// Ensure wp_mail function exists
		if ( ! function_exists( 'wp_mail' ) ) {
			if ( $debug_mode ) {
				error_log( 'LPF: wp_mail function does not exist!' );
			}
			return;
		}

		// Set flag to enable our custom From filters
		$this->is_sending_lpf_email = true;

		// Send emails one at a time for better Post SMTP compatibility
		$all_sent = true;
		foreach ( $valid_emails as $email ) {
			if ( $debug_mode ) {
				error_log( 'LPF: About to call wp_mail for admin email to: ' . $email );
				error_log( 'LPF: Headers: ' . print_r( $headers, true ) );
			}
			
			$result = wp_mail( $email, $subject, $body, $headers );
			
			if ( $debug_mode ) {
				if ( $result ) {
					error_log( 'LPF: Admin email sent successfully to: ' . $email . '. Return value: ' . var_export( $result, true ) );
				} else {
					error_log( 'LPF: Admin email failed to send to: ' . $email . '. Return value: ' . var_export( $result, true ) );
					$all_sent = false;
					global $phpmailer;
					if ( isset( $phpmailer ) && is_object( $phpmailer ) ) {
						if ( ! empty( $phpmailer->ErrorInfo ) ) {
							error_log( 'LPF: PHPMailer error for ' . $email . ': ' . $phpmailer->ErrorInfo );
						}
						if ( ! empty( $phpmailer->get_error_messages() ) ) {
							error_log( 'LPF: PHPMailer error messages: ' . print_r( $phpmailer->get_error_messages(), true ) );
						}
					}
				}
			} else {
				if ( ! $result ) {
					$all_sent = false;
				}
			}
		}

		// Reset flag
		$this->is_sending_lpf_email = false;
		
		return $all_sent;
	}

	/**
	 * Send confirmation to user.
	 *
	 * @param array $data Submission data.
	 */
	public function send_user_email( $data ) {
		// Derive first name from full name for personalization.
		$first_name = trim( strtok( $data['name'], ' ' ) );
		if ( empty( $first_name ) ) {
			$first_name = $data['name'];
		}

		$subject = sprintf(
			__( "Thanks for Showing Interest - Let's Connect, %s", 'succeed-landing-page-form' ),
			esc_html( $first_name )
		);

		// Format headers properly for Post SMTP compatibility
		// Post SMTP will format the From header with display name for AWS SES
		$headers = array();
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'From: SucceedLEARN <noreply@succeedlearn.com>';

		$debug_mode = defined( 'WP_DEBUG' ) && WP_DEBUG;
		
		// Validate email address
		if ( ! is_email( $data['email'] ) ) {
			if ( $debug_mode ) {
				error_log( 'LPF: Invalid user email address: ' . $data['email'] );
			}
			return;
		}
		if ( ! $this->can_send_user_reply_email( $data['email'] ) ) {
			if ( $debug_mode ) {
				error_log( 'LPF: User confirmation suppressed because reply limit reached for: ' . $data['email'] );
			}
			return;
		}
		
		if ( $debug_mode ) {
			error_log( 'LPF: Attempting to send user email to: ' . $data['email'] );
			error_log( 'LPF: Subject: ' . $subject );
			error_log( 'LPF: wp_mail function exists: ' . ( function_exists( 'wp_mail' ) ? 'yes' : 'no' ) );
		}
		
		// Ensure wp_mail function exists
		if ( ! function_exists( 'wp_mail' ) ) {
			if ( $debug_mode ) {
				error_log( 'LPF: wp_mail function does not exist!' );
			}
			return;
		}

		$sales_email    = 'sales@succeedtech.com';
		$brochure_url   = 'https://succeedlearn.com/wp-content/uploads/2025/12/InfoSec-Brochure-SucceedLEARN.pdf';
		$attachments    = array();
		$temp_file_path = '';

		// Download the brochure to a temp file so it can be attached.
		if ( ! function_exists( 'download_url' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}

		// Cache brochure PDF to avoid downloading on every submission
		$cache_key = 'lpf_brochure_cache';
		$cached_brochure = get_transient( $cache_key );
		
		if ( false === $cached_brochure || ( ! empty( $cached_brochure ) && ! file_exists( $cached_brochure ) ) ) {
			// Download and cache the brochure (cache for 24 hours)
			$temp_file_path = download_url( $brochure_url, 5 ); // 5 second timeout
			if ( ! is_wp_error( $temp_file_path ) && ! empty( $temp_file_path ) && file_exists( $temp_file_path ) ) {
				// Copy to a permanent cache location
				$upload_dir = wp_upload_dir();
				$cache_dir = $upload_dir['basedir'] . '/lpf-cache';
				if ( ! file_exists( $cache_dir ) ) {
					wp_mkdir_p( $cache_dir );
				}
				$cached_file = $cache_dir . '/brochure.pdf';
				
				// Copy to cache location
				if ( @copy( $temp_file_path, $cached_file ) ) {
					@unlink( $temp_file_path ); // Remove temp file
					set_transient( $cache_key, $cached_file, DAY_IN_SECONDS );
					$cached_brochure = $cached_file;
					$temp_file_path = ''; // No temp file to clean up
				} else {
					// If copy fails, use temp file for this request
					$cached_brochure = $temp_file_path;
				}
			} else {
				$temp_file_path = ''; // Download failed, no file to clean up
			}
		} else {
			// Using cached file
			$temp_file_path = ''; // No temp file to clean up
		}
		
		// Use cached brochure if available
		if ( ! empty( $cached_brochure ) && file_exists( $cached_brochure ) ) {
			$attachments[] = $cached_brochure;
		}

		$body = sprintf(
			'<p>Hi %1$s,</p>
			<p>Thanks for reaching out to SucceedLEARN! Our team will get in touch with you within the next 24 working hours.</p>
			<p>In the meantime, feel free to explore our attached brochure for more details about what we offer.</p>
			<p>If you need anything sooner, you can reach us at <a href="mailto:%2$s">%2$s</a></p>
			<p>Best Regards,<br/>Team <a href="https://succeedlearn.com/">SucceedLEARN.com</a></p>',
			esc_html( $first_name ),
			esc_attr( $sales_email )
		);

		// Set flag to enable our custom From filters
		$this->is_sending_lpf_email = true;

		if ( $debug_mode ) {
			error_log( 'LPF: About to call wp_mail for user email to: ' . $data['email'] );
			error_log( 'LPF: Headers: ' . print_r( $headers, true ) );
			error_log( 'LPF: Has attachments: ' . ( ! empty( $attachments ) ? 'yes (' . count( $attachments ) . ')' : 'no' ) );
		}

		$result = wp_mail( $data['email'], $subject, $body, $headers, $attachments );
		if ( $result ) {
			$this->increment_user_reply_email_count( $data['email'] );
		}
		
		if ( $debug_mode ) {
			if ( $result ) {
				error_log( 'LPF: User email sent successfully. Return value: ' . var_export( $result, true ) );
			} else {
				error_log( 'LPF: User email failed to send. Return value: ' . var_export( $result, true ) );
				global $phpmailer;
				if ( isset( $phpmailer ) && is_object( $phpmailer ) ) {
					if ( ! empty( $phpmailer->ErrorInfo ) ) {
						error_log( 'LPF: PHPMailer error: ' . $phpmailer->ErrorInfo );
					}
					if ( ! empty( $phpmailer->get_error_messages() ) ) {
						error_log( 'LPF: PHPMailer error messages: ' . print_r( $phpmailer->get_error_messages(), true ) );
					}
				}
			}
		}

		// Reset flag
		$this->is_sending_lpf_email = false;
		
		return $result;

		// Clean up temp file.
		if ( ! empty( $temp_file_path ) && file_exists( $temp_file_path ) ) {
			@unlink( $temp_file_path );
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
	 * Force "SucceedLEARN" as From name for our emails.
	 *
	 * @param array $args Email arguments.
	 * @return array
	 */
	public function force_succeedlearn_from_name( $args ) {
		// Only modify emails from our noreply address
		if ( ! empty( $args['headers'] ) ) {
			$headers = is_array( $args['headers'] ) ? $args['headers'] : explode( "\n", $args['headers'] );
			$modified_headers = array();
			$found_from = false;

			foreach ( $headers as $header ) {
				if ( preg_match( '/^From:\s*(.+)$/i', $header, $matches ) ) {
					$from_value = trim( $matches[1] );
					// Check if it contains noreply@succeedlearn.com
					if ( strpos( $from_value, 'noreply@succeedlearn.com' ) !== false ) {
						// Keep display name for Post SMTP to handle properly
						$modified_headers[] = 'From: SucceedLEARN <noreply@succeedlearn.com>';
						$found_from = true;
					} else {
						$modified_headers[] = $header;
					}
				} else {
					$modified_headers[] = $header;
				}
			}

			if ( $found_from ) {
				$args['headers'] = is_array( $args['headers'] ) ? $modified_headers : implode( "\n", $modified_headers );
			}
		}

		return $args;
	}

	/**
	 * Set custom "From" email address for our plugin's emails.
	 *
	 * @param string $email Original email address.
	 * @return string
	 */
	public function set_lpf_from_email( $email ) {
		if ( $this->is_sending_lpf_email ) {
			return 'noreply@succeedlearn.com';
		}
		return $email;
	}

	/**
	 * Set custom "From" name for our plugin's emails.
	 * Post SMTP will handle the display name properly for AWS SES compatibility.
	 *
	 * @param string $name Original name.
	 * @return string
	 */
	public function set_lpf_from_name( $name ) {
		if ( $this->is_sending_lpf_email ) {
			return 'SucceedLEARN';
		}
		return $name;
	}

	/**
	 * Global filter to force "SucceedLEARN" as From name (high priority).
	 * Post SMTP will handle AWS SES compatibility.
	 *
	 * @param string $name Original name.
	 * @return string
	 */
	public function set_lpf_from_name_global( $name ) {
		if ( $this->is_sending_lpf_email ) {
			return 'SucceedLEARN';
		}
		return $name;
	}

	/**
	 * Generate and store a unique form token.
	 *
	 * @return string Token.
	 */
	private function generate_form_token() {
		$token = wp_generate_password( 32, false );
		$token_key = 'lpf_token_' . md5( $token );
		// Store token for 3 hours (10800 seconds) to allow users more time
		// Also store in options table as backup in case transients are cleared
		set_transient( $token_key, time(), 10800 );
		// Backup storage in options (auto-cleanup after 4 hours)
		$tokens = get_option( 'lpf_active_tokens', array() );
		$tokens[ $token_key ] = time();
		// Clean old tokens (older than 4 hours)
		foreach ( $tokens as $key => $timestamp ) {
			if ( ( time() - $timestamp ) > 14400 ) {
				unset( $tokens[ $key ] );
			}
		}
		update_option( 'lpf_active_tokens', $tokens );
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
		
		$token_key = 'lpf_token_' . md5( $token );
		$token_time = get_transient( $token_key );
		
		// If transient is missing, check backup storage in options
		if ( false === $token_time ) {
			$tokens = get_option( 'lpf_active_tokens', array() );
			if ( isset( $tokens[ $token_key ] ) ) {
				$token_time = $tokens[ $token_key ];
				// Restore to transient if found in backup
				set_transient( $token_key, $token_time, 10800 );
			} else {
				// Token doesn't exist
				return false;
			}
		}
		
		// Check if token is not too old (max 3 hours, with 15 minute grace period)
		$max_age = 10800; // 3 hours
		$grace_period = 900; // 15 minutes grace period
		$age = time() - $token_time;
		
		if ( $age > ( $max_age + $grace_period ) ) {
			// Token is too old, remove from backup
			$tokens = get_option( 'lpf_active_tokens', array() );
			unset( $tokens[ $token_key ] );
			update_option( 'lpf_active_tokens', $tokens );
			return false;
		}
		
		// Only delete token if explicitly requested (after successful submission)
		if ( $delete ) {
			delete_transient( $token_key );
			// Also remove from backup
			$tokens = get_option( 'lpf_active_tokens', array() );
			unset( $tokens[ $token_key ] );
			update_option( 'lpf_active_tokens', $tokens );
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
			'inboxkitten.com',
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
	 * Validate email domain: check MX records, DNS resolution, and fake domains.
	 *
	 * @param string $email Email address.
	 * @return bool True if domain is valid, false otherwise.
	 */
	private function validate_email_domain( $email ) {
		if ( empty( $email ) ) {
			return false;
		}
		
		$email_parts = explode( '@', $email );
		if ( count( $email_parts ) !== 2 ) {
			return false;
		}
		
		$domain = strtolower( trim( $email_parts[1] ) );
		
		// Blacklist of common free email providers (only organizational emails allowed)
		$common_email_providers = array(
			'gmail.com', 'googlemail.com',
			'yahoo.com', 'yahoo.co.uk', 'yahoo.co.in', 'yahoo.fr', 'yahoo.de', 'yahoo.es', 'yahoo.it', 'yahoo.ca', 'yahoo.com.au', 'yahoo.com.br', 'yahoo.com.mx', 'yahoo.co.jp', 'yahoo.co.kr',
			'outlook.com', 'hotmail.com', 'hotmail.co.uk', 'hotmail.fr', 'hotmail.de', 'hotmail.es', 'hotmail.it', 'hotmail.ca', 'hotmail.com.au', 'hotmail.co.jp',
			'live.com', 'msn.com',
			'aol.com', 'aol.co.uk', 'aol.fr', 'aol.de',
			'icloud.com', 'me.com', 'mac.com',
			'protonmail.com', 'proton.me',
			'zoho.com', 'zoho.eu',
			'yandex.com', 'yandex.ru', 'yandex.ua',
			'mail.com', 'email.com', 'gmx.com', 'gmx.de', 'gmx.net',
			'rediffmail.com', 'rediffmailpro.com',
			'inbox.com', 'fastmail.com',
			'aim.com', 'rocketmail.com',
		);
		
		// Block common email providers
		if ( in_array( $domain, $common_email_providers, true ) ) {
			return false;
		}
		
		// Blacklist of known fake/test domains
		$fake_domains = array(
			'abc.com', 'test.com', 'test.net', 'test.org',
			'example.com', 'example.net', 'example.org',
			'fake.com', 'fake.net', 'fake.org',
			'invalid.com', 'invalid.net', 'invalid.org',
			'dummy.com', 'dummy.net', 'dummy.org',
			'sample.com', 'sample.net', 'sample.org',
			'demo.com', 'demo.net', 'demo.org',
			'localhost.com', 'localhost.net',
			'nonexistent.com', 'nonexistent.net', 'nonexistent.org',
		);
		
		// Check against fake domain blacklist
		if ( in_array( $domain, $fake_domains, true ) ) {
			return false;
		}
		
		// Check if domain resolves (DNS validation)
		$ip = gethostbyname( $domain );
		if ( $ip === $domain ) {
			// Domain doesn't resolve - no valid DNS record
			return false;
		}
		
		// Check for valid MX records
		$mx_records = array();
		$mx_result = @getmxrr( $domain, $mx_records );
		
		// If no MX records found, check if domain has A record (some domains use A record for email)
		if ( ! $mx_result || empty( $mx_records ) ) {
			// Check if domain has A record as fallback
			$dns_records = @dns_get_record( $domain, DNS_A );
			if ( empty( $dns_records ) ) {
				// No MX records and no A record - invalid domain
				return false;
			}
		}
		
		return true;
	}

	/**
	 * Validate email and return specific error message if invalid.
	 *
	 * @param string $email Email address.
	 * @return string|false Error message if invalid, false if valid.
	 */
	private function validate_email_with_message( $email ) {
		if ( empty( $email ) ) {
			return __( 'Please enter a valid organizational email id.', 'succeed-landing-page-form' );
		}
		
		$email_parts = explode( '@', $email );
		if ( count( $email_parts ) !== 2 ) {
			return __( 'Please enter a valid organizational email id.', 'succeed-landing-page-form' );
		}
		
		$domain = strtolower( trim( $email_parts[1] ) );
		
		// Check if email format is valid
		if ( preg_match( '/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i', $email ) === 0 ) {
			return __( 'Please enter a valid organizational email id.', 'succeed-landing-page-form' );
		}
		
		// Check if domain is from common email providers
		$common_email_providers = array(
			'gmail.com', 'googlemail.com',
			'yahoo.com', 'yahoo.co.uk', 'yahoo.co.in', 'yahoo.fr', 'yahoo.de', 'yahoo.es', 'yahoo.it', 'yahoo.ca', 'yahoo.com.au', 'yahoo.com.br', 'yahoo.com.mx', 'yahoo.co.jp', 'yahoo.co.kr',
			'outlook.com', 'hotmail.com', 'hotmail.co.uk', 'hotmail.fr', 'hotmail.de', 'hotmail.es', 'hotmail.it', 'hotmail.ca', 'hotmail.com.au', 'hotmail.co.jp',
			'live.com', 'msn.com',
			'aol.com', 'aol.co.uk', 'aol.fr', 'aol.de',
			'icloud.com', 'me.com', 'mac.com',
			'protonmail.com', 'proton.me',
			'zoho.com', 'zoho.eu',
			'yandex.com', 'yandex.ru', 'yandex.ua',
			'mail.com', 'email.com', 'gmx.com', 'gmx.de', 'gmx.net',
			'rediffmail.com', 'rediffmailpro.com',
			'inbox.com', 'fastmail.com',
			'aim.com', 'rocketmail.com',
		);
		
		if ( in_array( $domain, $common_email_providers, true ) ) {
			return __( 'Please enter an organizational email id.', 'succeed-landing-page-form' );
		}
		
		// Check if domain is fake/test domain
		$fake_domains = array(
			'abc.com', 'test.com', 'test.net', 'test.org',
			'example.com', 'example.net', 'example.org',
			'fake.com', 'fake.net', 'fake.org',
			'invalid.com', 'invalid.net', 'invalid.org',
			'dummy.com', 'dummy.net', 'dummy.org',
			'sample.com', 'sample.net', 'sample.org',
			'demo.com', 'demo.net', 'demo.org',
			'localhost.com', 'localhost.net',
			'nonexistent.com', 'nonexistent.net', 'nonexistent.org',
		);
		
		if ( in_array( $domain, $fake_domains, true ) ) {
			return __( 'Please enter a valid organizational email id.', 'succeed-landing-page-form' );
		}
		
		// Check for test patterns in local part
		$local_part = strtolower( trim( $email_parts[0] ) );
		$test_patterns = array(
			'test', 'testing', 'tester', 'demo', 'sample', 'fake', 'dummy',
			'invalid', 'example', 'temp', 'temporary', 'spamtest', 'test123',
			'test1', 'test2', 'test3', 'demo1', 'sample1', 'fake1',
		);
		
		if ( in_array( $local_part, $test_patterns, true ) ) {
			return __( 'Please enter a valid organizational email id.', 'succeed-landing-page-form' );
		}
		
		if ( preg_match( '/^[0-9]+$/', $local_part ) || strlen( $local_part ) < 3 ) {
			return __( 'Please enter a valid organizational email id.', 'succeed-landing-page-form' );
		}
		
		if ( preg_match( '/^(test|demo|sample|fake|dummy|invalid|example|temp|temporary)[0-9]+$/', $local_part ) ) {
			return __( 'Please enter a valid organizational email id.', 'succeed-landing-page-form' );
		}
		
		// Check disposable emails
		if ( $this->is_disposable_email( $email ) ) {
			return __( 'Please enter a valid organizational email id.', 'succeed-landing-page-form' );
		}
		
		// Verify email domain: DNS resolution and MX records
		if ( ! $this->validate_email_domain( $email ) ) {
			return __( 'Please enter a valid organizational email id with a verified domain.', 'succeed-landing-page-form' );
		}
		
		return false; // Email is valid
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
	 * Register admin page.
	 */
	public function register_admin_menu() {
		add_menu_page(
			__( 'Landing Page Contact Submissions', 'succeed-landing-page-form' ),
			__( 'Landing Page Contact Submissions', 'succeed-landing-page-form' ),
			'manage_options',
			'lpf-submissions',
			array( $this, 'render_admin_page' ),
			'dashicons-email-alt2',
			58
		);
		add_submenu_page(
			'lpf-submissions',
			__( 'Settings', 'succeed-landing-page-form' ),
			__( 'Settings', 'succeed-landing-page-form' ),
			'manage_options',
			'lpf-settings',
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
			<h1><?php esc_html_e( 'Landing Page Contact Form Submissions', 'succeed-landing-page-form' ); ?></h1>
			<form method="get">
				<input type="hidden" name="page" value="lpf-submissions" />
				<label>
					<?php esc_html_e( 'Start Date', 'succeed-landing-page-form' ); ?>
					<input type="date" name="start_date" value="<?php echo esc_attr( $filters['start_date'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'End Date', 'succeed-landing-page-form' ); ?>
					<input type="date" name="end_date" value="<?php echo esc_attr( $filters['end_date'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'Email', 'succeed-landing-page-form' ); ?>
					<input type="search" name="email" value="<?php echo esc_attr( $filters['email'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'UTM Source / Date', 'succeed-landing-page-form' ); ?>
					<input type="search" name="utm_source" value="<?php echo esc_attr( $filters['utm_source'] ); ?>" placeholder="<?php esc_attr_e( 'Search by UTM Source or Date', 'succeed-landing-page-form' ); ?>" />
				</label>
				<button class="button button-primary" type="submit"><?php esc_html_e( 'Filter', 'succeed-landing-page-form' ); ?></button>
				<?php wp_nonce_field( 'lpf_export', 'lpf_export_nonce' ); ?>
				<button class="button" name="lpf_export" value="1"><?php esc_html_e( 'Export CSV', 'succeed-landing-page-form' ); ?></button>
			</form>
			<table class="widefat fixed striped">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Date', 'succeed-landing-page-form' ); ?></th>
						<th><?php esc_html_e( 'Name', 'succeed-landing-page-form' ); ?></th>
						<th><?php esc_html_e( 'Email', 'succeed-landing-page-form' ); ?></th>
						<th><?php esc_html_e( 'Company Name', 'succeed-landing-page-form' ); ?></th>
						<th><?php esc_html_e( 'Message', 'succeed-landing-page-form' ); ?></th>
						<th><?php esc_html_e( 'UTM Source / Date', 'succeed-landing-page-form' ); ?></th>
						<th><?php esc_html_e( 'Page URL', 'succeed-landing-page-form' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if ( empty( $items ) ) : ?>
						<tr>
							<td colspan="7"><?php esc_html_e( 'No submissions found.', 'succeed-landing-page-form' ); ?></td>
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
								<td><?php echo esc_html( ! empty( $item->utm_source ) ? $item->utm_source : wp_date( get_option( 'date_format', 'Y-m-d' ), $timestamp ) ); ?></td>
								<td><a href="<?php echo esc_url( $item->page_url ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'View', 'succeed-landing-page-form' ); ?></a></td>
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
			'utm_source' => sanitize_text_field( wp_unslash( $_GET['utm_source'] ?? '' ) ),
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

		if ( ! empty( $filters['utm_source'] ) ) {
			// Search in both utm_source and date (created_at)
			$search_term = '%' . $wpdb->esc_like( $filters['utm_source'] ) . '%';
			$date_format = get_option( 'date_format', 'Y-m-d' );
			// Convert WordPress date format to MySQL DATE_FORMAT format
			$mysql_date_format = str_replace( array( 'Y', 'm', 'd' ), array( '%Y', '%m', '%d' ), $date_format );
			$where[]   = '(utm_source LIKE %s OR DATE_FORMAT(created_at, %s) LIKE %s)';
			$prepare[] = $search_term;
			$prepare[] = $mysql_date_format;
			$prepare[] = $search_term;
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
	 * Export CSV if requested.
	 */
	public function maybe_export_csv() {
		$export_flag = isset( $_GET['lpf_export'] ) ? sanitize_text_field( wp_unslash( $_GET['lpf_export'] ) ) : '';
		if ( '1' !== $export_flag ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'succeed-landing-page-form' ) );
		}

		if ( ! isset( $_GET['lpf_export_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['lpf_export_nonce'] ) ), 'lpf_export' ) ) {
			wp_die( esc_html__( 'Invalid export request.', 'succeed-landing-page-form' ) );
		}

		$filters = $this->get_filters();
		$data    = $this->get_submissions( $filters );

		$filename = 'lpf-submissions-' . gmdate( 'Ymd-His' ) . '.csv';

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
				'Company Name',
				'Message',
				'UTM Source / Date',
				'UTM Medium',
				'UTM Campaign',
				'UTM Term',
				'UTM Content',
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
					! empty( $row->utm_source ) ? $row->utm_source : wp_date( get_option( 'date_format', 'Y-m-d' ), strtotime( $row->created_at ) ),
					$row->utm_medium,
					$row->utm_campaign,
					$row->utm_term,
					$row->utm_content,
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
		register_setting( 'lpf_settings', self::OPTION_KEY, array( $this, 'sanitize_settings' ) );
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
			add_settings_error( 'lpf_messages', 'lpf_message', __( 'Settings saved.', 'succeed-landing-page-form' ), 'updated' );
		}

		settings_errors( 'lpf_messages' );
		$settings = get_option( self::OPTION_KEY, array() );
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php settings_fields( 'lpf_settings' ); ?>
				<table class="form-table">
					<tr>
						<th scope="row">
							<label for="recaptcha_site_key"><?php esc_html_e( 'reCAPTCHA Site Key', 'succeed-landing-page-form' ); ?></label>
						</th>
						<td>
							<input type="text" id="recaptcha_site_key" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[recaptcha_site_key]" value="<?php echo esc_attr( $settings['recaptcha_site_key'] ?? '' ); ?>" class="regular-text" />
							<p class="description">
								<?php esc_html_e( 'Enter your Google reCAPTCHA v3 Site Key. Leave empty to disable reCAPTCHA (honeypot and time-based protection will still work).', 'succeed-landing-page-form' ); ?>
								<br />
								<a href="https://www.google.com/recaptcha/admin/create" target="_blank" rel="noopener"><?php esc_html_e( 'Get your keys', 'succeed-landing-page-form' ); ?></a>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="recaptcha_secret_key"><?php esc_html_e( 'reCAPTCHA Secret Key', 'succeed-landing-page-form' ); ?></label>
						</th>
						<td>
							<input type="text" id="recaptcha_secret_key" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[recaptcha_secret_key]" value="<?php echo esc_attr( $settings['recaptcha_secret_key'] ?? '' ); ?>" class="regular-text" />
							<p class="description">
								<?php esc_html_e( 'Enter your Google reCAPTCHA v3 Secret Key.', 'succeed-landing-page-form' ); ?>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="recaptcha_score_threshold"><?php esc_html_e( 'Score Threshold', 'succeed-landing-page-form' ); ?></label>
						</th>
						<td>
							<input type="number" id="recaptcha_score_threshold" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[recaptcha_score_threshold]" value="<?php echo esc_attr( $settings['recaptcha_score_threshold'] ?? '0.5' ); ?>" min="0" max="1" step="0.1" />
							<p class="description">
								<?php esc_html_e( 'reCAPTCHA score threshold (0.0 = bot, 1.0 = human). Default: 0.5. Lower values are more strict.', 'succeed-landing-page-form' ); ?>
							</p>
						</td>
					</tr>
				</table>
				<p class="description" style="margin-top: 20px;">
					<strong><?php esc_html_e( 'Bot Protection Features:', 'succeed-landing-page-form' ); ?></strong><br />
					• <?php esc_html_e( 'Honeypot field (always active - invisible to users)', 'succeed-landing-page-form' ); ?><br />
					• <?php esc_html_e( 'Time-based validation (prevents instant submissions)', 'succeed-landing-page-form' ); ?><br />
					• <?php esc_html_e( 'Google reCAPTCHA v3 (optional - configure above)', 'succeed-landing-page-form' ); ?>
				</p>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}

LPF_Plugin::instance();

