<?php
/**
 * Plugin Name: SucceedLearn Marketing Landing Form
 * Description: AJAX powered marketing landing form with UTM capture, email notifications, and submission dashboard.
 * Version: 1.0.0
 * Author: SucceedTech
 * Text Domain: marketing-landing-form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class SMLF_Marketing_Landing_Form_Plugin {
	const VERSION = '1.0.0';
	const OPTION_KEY = 'smlf_settings';
	const WEEKLY_REPORT_HOOK = 'smlf_send_weekly_report';

	/**
	 * Singleton instance.
	 *
	 * @var SMLF_Plugin|null
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
	 * @return SMLF_Plugin
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
		add_action( 'wp_ajax_smlf_submit_form', array( $this, 'handle_form_submission' ) );
		add_action( 'wp_ajax_nopriv_smlf_submit_form', array( $this, 'handle_form_submission' ) );
		add_action( 'wp_ajax_smlf_refresh_captcha', array( $this, 'refresh_captcha' ) );
		add_action( 'wp_ajax_nopriv_smlf_refresh_captcha', array( $this, 'refresh_captcha' ) );
		add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_init', array( $this, 'maybe_export_csv' ) );
		add_action( 'admin_init', array( $this, 'maybe_send_weekly_report_manual' ) );
		add_action( 'wp_head', array( $this, 'add_amp_scripts' ) );
		add_action( 'init', array( $this, 'maybe_schedule_weekly_report' ) );
		add_action( self::WEEKLY_REPORT_HOOK, array( $this, 'send_weekly_report' ) );
		add_action( 'smlf_send_admin_email', array( $this, 'process_admin_email' ), 10, 1 );
		add_action( 'smlf_send_user_email', array( $this, 'process_user_email' ), 10, 1 );
		add_action( 'smlf_send_to_erp', array( $this, 'process_erp_sync' ), 10, 1 );
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
			phone_number VARCHAR(50) DEFAULT '',
			company_name VARCHAR(255) DEFAULT '',
			team_size VARCHAR(50) DEFAULT '',
			interested_in VARCHAR(255) DEFAULT '',
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
		// Flush rewrite rules on deactivation
		flush_rewrite_rules();
	}

	/**
	 * Return database table name.
	 *
	 * @return string
	 */
	private function get_table_name() {
		global $wpdb;

		if ( null === $this->table_name ) {
			$this->table_name = "{$wpdb->prefix}smlf_marketing_submissions";
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

		// Check and add new columns for marketing form
		$new_columns = array(
			'phone_number' => "ALTER TABLE {$table_name} ADD phone_number VARCHAR(50) DEFAULT '' AFTER email",
			'company_name' => "ALTER TABLE {$table_name} ADD company_name VARCHAR(255) DEFAULT '' AFTER phone_number",
			'team_size' => "ALTER TABLE {$table_name} ADD team_size VARCHAR(50) DEFAULT '' AFTER company_name",
			'interested_in' => "ALTER TABLE {$table_name} ADD interested_in VARCHAR(255) DEFAULT '' AFTER team_size",
			'source_tag' => "ALTER TABLE {$table_name} ADD source_tag VARCHAR(100) DEFAULT '' AFTER utm_content",
		);

		foreach ( $new_columns as $column => $sql ) {
			$column_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					$column
				)
			);

			if ( ! $column_exists ) {
				$wpdb->query( $sql ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
			}
		}
	}

	/**
	 * Register shortcode.
	 */
	public function register_shortcodes() {
		add_shortcode( 'marketing_landing_form', array( $this, 'render_form' ) );
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
		
		if ( ! has_shortcode( $post_content, 'marketing_landing_form' ) ) {
			return;
		}

		?>
		<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
		<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
		<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
		<script async custom-element="amp-script" src="https://cdn.ampproject.org/v0/amp-script-0.1.js"></script>
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

		if ( has_shortcode( $post_content, 'marketing_landing_form' ) ) {
			wp_enqueue_style(
				'smlf-form',
				plugins_url( 'assets/css/form.css', __FILE__ ),
				array(),
				self::VERSION
			);

			wp_enqueue_script(
				'smlf-form',
				plugins_url( 'assets/js/form.js', __FILE__ ),
				array(),
				self::VERSION,
				true
			);

			wp_localize_script(
				'smlf-form',
				'SMLF_FORM',
				array(
					'ajaxUrl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'smlf_submit' ),
					'messages' => array(
						'success' => __( 'Thank you! We will contact you soon.', 'marketing-landing-form' ),
						'error'   => __( 'Something went wrong. Please try again.', 'marketing-landing-form' ),
						'privacy' => __( 'You must accept the privacy policy.', 'marketing-landing-form' ),
						'bot'     => __( 'Bot detected. Submission rejected.', 'marketing-landing-form' ),
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
			$tag = 'SucceedLEARN HomePage';
		}
		elseif ( preg_match( '/(course|courses|lp-course|lp-courses)/i', $path ) ) {
			$tag = 'SucceedLEARN InfoSEC';
		}
		elseif ( false !== strpos( $path, 'blog' ) || false !== strpos( $path, 'news' ) ) {
			$tag = 'SucceedLEARN Blog';
		}
		elseif ( false !== strpos( $path, 'contact' ) ) {
			$tag = 'SucceedLEARN ContactUs';
		}
		else {
			$tag = 'SucceedLEARN Others';
		}

		return apply_filters( 'smlf_source_tag', $tag, $path, $page_url );
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

		// Generate math captcha (10-20 + 10-20) - use random_int for cryptographically secure randomness
		// Fallback to mt_rand if random_int is not available
		if ( function_exists( 'random_int' ) ) {
			$captcha_a = random_int( 10, 20 );
			$captcha_b = random_int( 10, 20 );
		} else {
			// Use mt_rand with time-based seed for better randomness
			mt_srand( (int) ( microtime( true ) * 1000000 ) + get_current_user_id() );
			$captcha_a = mt_rand( 10, 20 );
			$captcha_b = mt_rand( 10, 20 );
		}
		
		// Generate server-side form token
		$form_token = $this->generate_form_token();
		
		// Generate random honeypot field names to make them harder to detect
		$honeypot_names = array(
			'website' => 'website_' . wp_generate_password( 6, false ),
			'company' => 'company_' . wp_generate_password( 6, false ),
			'url' => 'url_' . wp_generate_password( 6, false ),
		);
		
		// Store honeypot names in transient for validation
		set_transient( 'smlf_honeypots_' . md5( $form_token ), $honeypot_names, 3600 );
		?>
		<div class="smlf-marketing-form-wrapper">
			<h2 class="smlf-form-title"><?php esc_html_e( 'Book Your Strategy Session', 'marketing-landing-form' ); ?></h2>
			<form id="smlf-form" class="smlf-form smlf-marketing-form" method="post">
				<input type="hidden" name="smlf_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
				<input type="hidden" name="smlf_form_time" value="<?php echo esc_attr( time() ); ?>" />
				<input type="hidden" name="source_tag" value="<?php echo esc_attr( $source_tag ); ?>" />
				
				<!-- Multiple Honeypot fields - hidden from users but bots will fill them -->
				<div class="smlf-honeypot">
					<label for="smlf-website"><?php esc_html_e( 'Website', 'marketing-landing-form' ); ?></label>
					<input type="text" id="smlf-website" name="<?php echo esc_attr( $honeypot_names['website'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
				</div>
				<div class="smlf-honeypot">
					<label for="smlf-company"><?php esc_html_e( 'Company URL', 'marketing-landing-form' ); ?></label>
					<input type="text" id="smlf-company" name="<?php echo esc_attr( $honeypot_names['company'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
				</div>
				<div class="smlf-honeypot">
					<label for="smlf-url"><?php esc_html_e( 'Your URL', 'marketing-landing-form' ); ?></label>
					<input type="url" id="smlf-url" name="<?php echo esc_attr( $honeypot_names['url'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
				</div>
				
				<div class="smlf-form-row">
					<div class="smlf-form-col">
						<div class="smlf-field">
							<label for="smlf-name"><?php esc_html_e( 'Full Name', 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
							<input type="text" id="smlf-name" name="name" required />
							<span class="smlf-error-message"></span>
						</div>
					</div>
					<div class="smlf-form-col">
						<div class="smlf-field">
							<label for="smlf-email"><?php esc_html_e( 'Work Email', 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
							<input type="email" id="smlf-email" name="email" required />
							<span class="smlf-error-message"></span>
						</div>
					</div>
				</div>
				
				<div class="smlf-form-row">
					<div class="smlf-form-col">
						<div class="smlf-field">
							<label for="smlf-phone"><?php esc_html_e( 'Phone Number', 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
							<input type="tel" id="smlf-phone" name="phone_number" required />
							<span class="smlf-error-message"></span>
						</div>
					</div>
					<div class="smlf-form-col">
						<div class="smlf-field">
							<label for="smlf-company-name"><?php esc_html_e( 'Company Name', 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
							<input type="text" id="smlf-company-name" name="company_name" required />
							<span class="smlf-error-message"></span>
						</div>
					</div>
				</div>
				
				<div class="smlf-form-row">
					<div class="smlf-form-col">
						<div class="smlf-field">
							<label for="smlf-team-size"><?php esc_html_e( 'Team Size', 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
							<select id="smlf-team-size" name="team_size" class="smlf-select" required>
								<option value=""><?php esc_html_e( 'Select Team Size', 'marketing-landing-form' ); ?></option>
								<option value="50-100">50 - 100</option>
								<option value="100-200">100 - 200</option>
								<option value="200-500">200 - 500</option>
								<option value="500+">500+</option>
							</select>
							<span class="smlf-error-message"></span>
						</div>
					</div>
					<div class="smlf-form-col">
						<div class="smlf-field">
							<label for="smlf-interested-in"><?php esc_html_e( "I'm interested in...", 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
							<select id="smlf-interested-in" name="interested_in" class="smlf-select" required>
								<option value=""><?php esc_html_e( 'Select an option', 'marketing-landing-form' ); ?></option>
								<option value="Phishing Simulations"><?php esc_html_e( 'Phishing Simulations', 'marketing-landing-form' ); ?></option>
								<option value="Microlearning Content"><?php esc_html_e( 'Microlearning Content', 'marketing-landing-form' ); ?></option>
								<option value="Compliance Training"><?php esc_html_e( 'Compliance Training', 'marketing-landing-form' ); ?></option>
								<option value="Complete Solution"><?php esc_html_e( 'Complete Solution', 'marketing-landing-form' ); ?></option>
							</select>
							<span class="smlf-error-message"></span>
						</div>
					</div>
				</div>
				
				<div class="smlf-field smlf-checkbox">
					<input type="checkbox" id="smlf-privacy" name="privacy" value="1" required />
					<label for="smlf-privacy">
						<?php
						printf(
							wp_kses(
								/* translators: %s privacy policy url */
								__( 'I Accept <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'marketing-landing-form' ),
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
						<span class="smlf-required"> *</span>
					</label>
					<span class="smlf-error-message"></span>
				</div>
				
				<!-- Enhanced Math Captcha for additional security -->
				<div class="smlf-field">
					<label for="smlf-captcha" id="smlf-captcha-label">
						<span id="smlf-captcha-question">
						<?php 
						/* translators: %1$d and %2$d are numbers for math captcha */
						printf( esc_html__( 'Security Question: What is %1$d + %2$d?', 'marketing-landing-form' ), $captcha_a, $captcha_b ); 
						?> 
						</span>
						<span class="smlf-required"> *</span>
					</label>
					<input type="number" id="smlf-captcha" name="smlf_captcha" required min="0" max="40" />
					<input type="hidden" name="smlf_captcha_a" id="smlf_captcha_a" value="<?php echo esc_attr( $captcha_a ); ?>" />
					<input type="hidden" name="smlf_captcha_b" id="smlf_captcha_b" value="<?php echo esc_attr( $captcha_b ); ?>" />
					<span class="smlf-error-message"></span>
				</div>
				
				<input type="hidden" name="utm_source" />
				<input type="hidden" name="utm_medium" />
				<input type="hidden" name="utm_campaign" />
				<input type="hidden" name="utm_term" />
				<input type="hidden" name="utm_content" />
				<input type="hidden" name="page_url" />
				<button type="submit" class="smlf-submit">
					<span class="smlf-submit-text"><?php esc_html_e( 'Book Your Free 30-Minute Strategy Session', 'marketing-landing-form' ); ?></span>
					<span class="smlf-submit-loading" style="display: none;">
						<span class="smlf-spinner"></span>
						<?php esc_html_e( 'Submitting...', 'marketing-landing-form' ); ?>
					</span>
				</button>
				<p class="smlf-response" role="status" aria-live="polite"></p>
				
				<div class="smlf-form-footer">
					<p class="smlf-urgency-text"><?php esc_html_e( 'Hurry! Only 6 slots remain for April - secure yours now!', 'marketing-landing-form' ); ?></p>
					<p class="smlf-value-text"><?php esc_html_e( 'First-come, first-served. No sales pitch, just expert guidance on building your human firewall.', 'marketing-landing-form' ); ?></p>
				</div>
			</form>
		</div>
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
		$ajax_url = admin_url( 'admin-ajax.php' );
		$nonce = wp_create_nonce( 'smlf_submit' );
		$current_url = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$source_tag = $this->determine_source_tag( $current_url );
		
		// Generate math captcha (10-20 + 10-20) - use random_int for cryptographically secure randomness
		// Fallback to mt_rand if random_int is not available
		if ( function_exists( 'random_int' ) ) {
			$captcha_a = random_int( 10, 20 );
			$captcha_b = random_int( 10, 20 );
		} else {
			// Use mt_rand with time-based seed for better randomness
			mt_srand( (int) ( microtime( true ) * 1000000 ) + get_current_user_id() );
			$captcha_a = mt_rand( 10, 20 );
			$captcha_b = mt_rand( 10, 20 );
		}
		$captcha_sum = $captcha_a + $captcha_b;
		
		// Generate server-side form token
		$form_token = $this->generate_form_token();
		?>
		<!-- AMP form state for button text and form time -->
		<amp-state id="buttonState">
			<script type="application/json">{"text":"<?php echo esc_js( __( 'Submit', 'marketing-landing-form' ) ); ?>","loading":false}</script>
		</amp-state>
		<amp-state id="formTime">
			<script type="application/json"><?php echo esc_js( time() ); ?></script>
		</amp-state>
		
		<amp-state id="formResponse">
			<script type="application/json">{}</script>
		</amp-state>
		
		<form 
			id="smlf-form" 
			class="smlf-form" 
			method="post" 
			action-xhr="<?php echo esc_url( $ajax_url ); ?>" 
			target="_top" 
			on="
				submit: AMP.setState({ buttonState: {text: '<?php echo esc_js( __( 'Submitting...', 'marketing-landing-form' ) ); ?>', loading: true} });
				submit-success: 
					AMP.setState({ 
						buttonState: {text: '<?php echo esc_js( __( 'Submit', 'marketing-landing-form' ) ); ?>', loading: false}, 
						formTime: <?php echo esc_js( time() ); ?>,
						formResponse: event.response
					}),
					smlf-form.clear
				submit-error: error-popup.open, AMP.setState({ buttonState: {text: '<?php echo esc_js( __( 'Submit', 'marketing-landing-form' ) ); ?>', loading: false} });
			"
		>
			<input type="hidden" name="action" value="smlf_submit_form" />
			<input type="hidden" name="nonce" value="<?php echo esc_attr( $nonce ); ?>" />
			<input type="hidden" name="smlf_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
			<input type="hidden" name="smlf_form_time" id="smlf-form-time" [value]="formTime || <?php echo esc_js( time() ); ?>" value="<?php echo esc_attr( time() ); ?>" />
			
			<!-- Multiple Honeypot fields - hidden from users but bots will fill them -->
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="smlf-website-amp"><?php esc_html_e( 'Website', 'marketing-landing-form' ); ?></label>
				<input type="text" id="smlf-website-amp" name="website" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="smlf-company-amp"><?php esc_html_e( 'Company URL', 'marketing-landing-form' ); ?></label>
				<input type="text" id="smlf-company-amp" name="company" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="smlf-url-amp"><?php esc_html_e( 'Your URL', 'marketing-landing-form' ); ?></label>
				<input type="url" id="smlf-url-amp" name="url" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			
			<div class="smlf-field">
				<label for="smlf-name"><?php esc_html_e( 'Full Name', 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
				<input type="text" id="smlf-name" name="name" required />
				<span visible-when-invalid="valueMissing" validation-for="smlf-name" class="smlf-error-message">Please fill out this field.</span>
			</div>
			
			<div class="smlf-field">
				<label for="smlf-email"><?php esc_html_e( 'Work Email', 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
				<input type="email" id="smlf-email" name="email" required />
				<span visible-when-invalid="valueMissing" validation-for="smlf-email" class="smlf-error-message">Enter a organizational mailid</span>
				<span visible-when-invalid="typeMismatch" validation-for="smlf-email" class="smlf-error-message">Enter a organizational mailid</span>
			</div>
			
			<div class="smlf-field">
				<label for="smlf-phone"><?php esc_html_e( 'Phone Number', 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
				<input type="tel" id="smlf-phone" name="phone_number" required />
				<span visible-when-invalid="valueMissing" validation-for="smlf-phone" class="smlf-error-message">Please fill out this field.</span>
			</div>
			
			<div class="smlf-field">
				<label for="smlf-company-name"><?php esc_html_e( 'Company Name', 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
				<input type="text" id="smlf-company-name" name="company_name" required />
				<span visible-when-invalid="valueMissing" validation-for="smlf-company-name" class="smlf-error-message">Please fill out this field.</span>
			</div>
			
			<div class="smlf-field">
				<label for="smlf-team-size"><?php esc_html_e( 'Team Size', 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
				<select id="smlf-team-size" name="team_size" required>
					<option value=""><?php esc_html_e( 'Select Team Size', 'marketing-landing-form' ); ?></option>
					<option value="50-100">50 - 100</option>
					<option value="100-200">100 - 200</option>
					<option value="200-500">200 - 500</option>
					<option value="500+">500+</option>
				</select>
				<span visible-when-invalid="valueMissing" validation-for="smlf-team-size" class="smlf-error-message">Please select an option.</span>
			</div>
			
			<div class="smlf-field">
				<label for="smlf-interested-in"><?php esc_html_e( "I'm interested in...", 'marketing-landing-form' ); ?> <span class="smlf-required">*</span></label>
				<select id="smlf-interested-in" name="interested_in" required>
					<option value=""><?php esc_html_e( 'Select an option', 'marketing-landing-form' ); ?></option>
					<option value="Phishing Simulations"><?php esc_html_e( 'Phishing Simulations', 'marketing-landing-form' ); ?></option>
					<option value="Microlearning Content"><?php esc_html_e( 'Microlearning Content', 'marketing-landing-form' ); ?></option>
					<option value="Compliance Training"><?php esc_html_e( 'Compliance Training', 'marketing-landing-form' ); ?></option>
					<option value="Complete Solution"><?php esc_html_e( 'Complete Solution', 'marketing-landing-form' ); ?></option>
				</select>
				<span visible-when-invalid="valueMissing" validation-for="smlf-interested-in" class="smlf-error-message">Please select an option.</span>
			</div>
			
			<div class="smlf-field smlf-checkbox">
				<input type="checkbox" id="smlf-privacy" name="privacy" value="1" required />
				<label for="smlf-privacy">
					<?php
					printf(
						wp_kses(
							/* translators: %s privacy policy url */
							__( 'I Accept <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'marketing-landing-form' ),
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
					<span class="smlf-required"> *</span>
				</label>
				<span visible-when-invalid="valueMissing" validation-for="smlf-privacy" class="smlf-error-message">Please accept the privacy policy.</span>
			</div>
			
			<!-- Enhanced Math Captcha for additional security -->
			<div class="smlf-field">
				<label for="smlf-captcha">
					<?php 
					/* translators: %1$d and %2$d are numbers for math captcha */
					printf( esc_html__( 'Security Question: What is %1$d + %2$d?', 'marketing-landing-form' ), $captcha_a, $captcha_b ); 
					?> 
					<span class="smlf-required"> *</span>
				</label>
				<input type="number" id="smlf-captcha" name="smlf_captcha" required min="0" max="40" />
				<input type="hidden" name="smlf_captcha_a" value="<?php echo esc_attr( $captcha_a ); ?>" />
				<input type="hidden" name="smlf_captcha_b" value="<?php echo esc_attr( $captcha_b ); ?>" />
				<span visible-when-invalid="valueMissing" validation-for="smlf-captcha" class="smlf-error-message"><?php esc_html_e( 'Please answer the security question.', 'marketing-landing-form' ); ?></span>
			</div>
			
			<input type="hidden" name="utm_source" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_source'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_medium" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_medium'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_campaign" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_campaign'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_term" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_term'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_content" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_content'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="page_url" value="<?php echo esc_attr( esc_url_raw( $current_url ) ); ?>" />
			<input type="hidden" name="source_tag" value="<?php echo esc_attr( $source_tag ); ?>" />
			
			<button type="submit" class="smlf-submit" [disabled]="buttonState.loading">
				<span [text]="buttonState.text"><?php esc_html_e( 'Book Your Free 30-Minute Strategy Session', 'marketing-landing-form' ); ?></span>
			</button>
			
			<div class="smlf-form-footer">
				<p class="smlf-urgency-text"><?php esc_html_e( 'Hurry! Only 6 slots remain for April - secure yours now!', 'marketing-landing-form' ); ?></p>
				<p class="smlf-value-text"><?php esc_html_e( 'First-come, first-served. No sales pitch, just expert guidance on building your human firewall.', 'marketing-landing-form' ); ?></p>
			</div>
			
		</form>
		
		<!-- Success Lightbox -->
		<amp-lightbox id="success-popup" layout="nodisplay" on="lightboxOpen: fbq-track-lead.execute">
			<div class="smlf-lightbox-overlay">
				<div class="smlf-lightbox-content smlf-lightbox-success">
					<div class="smlf-lightbox-icon">🎉</div>
					<div class="smlf-lightbox-title"><?php esc_html_e( 'Submitted Successfully', 'marketing-landing-form' ); ?></div>
					<div class="smlf-lightbox-message"><?php esc_html_e( 'Thank you! We will contact you soon.', 'marketing-landing-form' ); ?></div>
					<button on="tap:success-popup.close" class="smlf-lightbox-button">
						<?php esc_html_e( 'Close', 'marketing-landing-form' ); ?>
					</button>
				</div>
			</div>
		</amp-lightbox>
		
		<!-- Facebook Pixel Lead Tracking for AMP -->
		<amp-script id="fbq-track-lead" script="fbq-track-lead-script"></amp-script>
		<script id="fbq-track-lead-script" type="text/plain" target="amp-script">
			if (typeof window.fbq !== 'undefined' && typeof window.fbq === 'function') {
				try {
					window.fbq('track', 'Lead');
				} catch (error) {
					console.warn('Facebook Pixel tracking error:', error);
				}
			}
		</script>
		
		<!-- AMP-Redirect-To header is handled automatically by AMP - no JavaScript needed -->
		
		<!-- Error Lightbox -->
		<amp-lightbox id="error-popup" layout="nodisplay">
			<div class="smlf-lightbox-overlay">
				<div class="smlf-lightbox-content smlf-lightbox-error">
					<div class="smlf-lightbox-icon">❌</div>
					<div class="smlf-lightbox-title"><?php esc_html_e( 'Submission Failed', 'marketing-landing-form' ); ?></div>
					<div class="smlf-lightbox-message">
						<?php esc_html_e( 'Please check your information and try again.', 'marketing-landing-form' ); ?>
					</div>
					<button on="tap:error-popup.close" class="smlf-lightbox-button">
						<?php esc_html_e( 'Close', 'marketing-landing-form' ); ?>
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
	 * @return bool|string False if no bot detected, true or error message string if bot detected.
	 */
	private function detect_bot() {
		// 0. Verify server-side form token FIRST (but don't delete it yet).
		// If token verification fails (e.g., cached page or transient cleared),
		// do NOT hard-block; fall back to legacy honeypot checks to reduce false positives.
		$form_token = sanitize_text_field( wp_unslash( $_POST['smlf_form_token'] ?? '' ) );
		$token_valid = $this->verify_form_token( $form_token, false );
		
		// Get honeypot field names from transient (don't delete yet - only on success)
		$honeypot_key   = 'smlf_honeypots_' . md5( $form_token );
		$honeypot_names = $token_valid ? get_transient( $honeypot_key ) : false;
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
		$captcha_a       = absint( $_POST['smlf_captcha_a'] ?? 0 );
		$captcha_b       = absint( $_POST['smlf_captcha_b'] ?? 0 );
		$captcha_user    = absint( $_POST['smlf_captcha'] ?? 0 );
		$captcha_expected = $captcha_a + $captcha_b;
		
		if ( $captcha_a > 0 && $captcha_b > 0 && $captcha_user !== $captcha_expected ) {
			return __( 'The answer to the security question is incorrect. Please check your calculation and try again.', 'marketing-landing-form' );
		}

		// 2. Check for missing or suspicious User-Agent
		$user_agent = sanitize_textarea_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ?? '' ) );
		if ( empty( $user_agent ) || strlen( $user_agent ) < 10 ) {
			// Lenient: allow but log, to avoid blocking legitimate users behind proxies/ad-blockers
			error_log( 'SMLF Warning: Missing or short user agent' );
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
			$rate_limit_key = 'smlf_rate_limit_' . md5( $user_ip );
			$last_submission = get_transient( $rate_limit_key );
			
			if ( false !== $last_submission ) {
				// Same IP submitted within last 30 seconds - likely a bot
				// Log for debugging (remove in production if needed)
				error_log( 'SMLF Rate Limit: IP ' . $user_ip . ' blocked. Last submission: ' . $last_submission );
				return true;
			}
			// Note: Transient will be set AFTER successful submission, not here
		}

		// 5. Check time-based validation - if submitted too quickly, likely a bot
		$form_time = absint( $_POST['smlf_form_time'] ?? 0 );
		if ( $form_time > 0 ) {
			$time_elapsed = time() - $form_time;
			// If form submitted in less than 3 seconds, likely a bot (reduced from 5 to be less strict)
			if ( $time_elapsed < 3 ) {
				return __( 'Form submitted too quickly. Please take a moment to review your information before submitting.', 'marketing-landing-form' );
			}
			// If form submitted after more than 2 hours, might be stale (increased from 1 hour)
			if ( $time_elapsed > 7200 ) {
				return __( 'This form session has expired. Please refresh the page and try again.', 'marketing-landing-form' );
			}
		} else {
			// Form time not provided - this shouldn't happen, but be lenient
			// Don't block, just log for debugging
			error_log( 'SMLF Warning: Form time not provided in submission' );
		}

		// 6. Check for spam patterns in content
		$name = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
		$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
		
		// Check for suspicious patterns
		$spam_patterns = array( 'http://', 'https://', 'www.', '.com', '.net', '.org', 'viagra', 'casino', 'poker', 'loan', 'mortgage', 'click here', 'buy now' );
		$content_to_check = strtolower( $name . ' ' . $email );
		
		$spam_count = 0;
		foreach ( $spam_patterns as $pattern ) {
			if ( substr_count( $content_to_check, $pattern ) > 2 ) {
				$spam_count++;
			}
		}
		
		// If multiple spam patterns found, likely spam
		if ( $spam_count >= 3 ) {
			return __( 'Your submission looks suspicious. Please revise your details and try again.', 'marketing-landing-form' );
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
		$tmp_file = $tmp_dir . 'smlf-weekly-report-' . wp_generate_password( 8, false ) . '.csv';
		
		// Ensure directory is writable
		if ( ! is_writable( $tmp_dir ) ) {
			error_log( 'SMLF Weekly Report: Temp directory is not writable: ' . $tmp_dir );
			return;
		}

		$fh = fopen( $tmp_file, 'w' );
		if ( ! $fh ) {
			error_log( 'SMLF Weekly Report: Failed to open file for writing: ' . $tmp_file );
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
				'Phone Number',
				'Company Name',
				'Team Size',
				'Interested In',
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
						$row['phone_number'] ?? '',
						$row['company_name'] ?? '',
						$row['team_size'] ?? '',
						$row['interested_in'] ?? '',
						$row['source_tag'],
						$row['utm_source'],
						$row['utm_medium'],
						$row['utm_campaign'],
						$row['utm_term'],
						$row['utm_content'],
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
					'',
					'',
					'',
					'No marketing form submissions were received during this reporting period.',
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

		$recipient = apply_filters( 'smlf_weekly_report_recipient', 'depakar@succeedtech.com' );
		$subject   = sprintf(
			__( 'Weekly Marketing Form Report (%1$s - %2$s)', 'marketing-landing-form' ),
			$start_label,
			$end_label
		);

		$submission_count = count( $results );

		// Professional subject line
		if ( 0 === $submission_count ) {
			$subject = sprintf(
				__( 'Weekly Marketing Form Report - No Submissions (%1$s - %2$s)', 'marketing-landing-form' ),
				$start_label,
				$end_label
			);
		} else {
			$subject = sprintf(
				__( 'Weekly Marketing Form Report - %1$d Submission(s) (%2$s - %3$s)', 'marketing-landing-form' ),
				$submission_count,
				$start_label,
				$end_label
			);
		}

		// Professional email body
		$body = '<div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">';
		$body .= '<h2 style="color: #2563eb; margin-bottom: 20px;">' . esc_html__( 'Weekly Marketing Form Report', 'marketing-landing-form' ) . '</h2>';
		
		$body .= '<p style="margin-bottom: 15px;">';
		$body .= sprintf(
			esc_html__( 'Report Period: %1$s to %2$s', 'marketing-landing-form' ),
			'<strong>' . esc_html( $start_label ) . '</strong>',
			'<strong>' . esc_html( $end_label ) . '</strong>'
		);
		$body .= '</p>';
		
		$body .= '<div style="background-color: #f8f9fa; padding: 15px; border-radius: 6px; margin-bottom: 20px;">';
		$body .= '<p style="margin: 0;">';
		$body .= sprintf(
			'<strong style="color: #2563eb;">%s:</strong> <span style="font-size: 18px; color: #15803d;">%d</span>',
			esc_html__( 'Total Submissions', 'marketing-landing-form' ),
			$submission_count
		);
		$body .= '</p>';
		$body .= '</div>';

		if ( 0 === $submission_count ) {
			$body .= '<div style="background-color: #fef3c7; border-left: 4px solid #f59e0b; padding: 20px; margin-bottom: 20px; border-radius: 6px;">';
			$body .= '<p style="margin: 0; color: #92400e; font-size: 16px; font-weight: 600;">';
			$body .= esc_html__( 'No form submissions in the past week.', 'marketing-landing-form' );
			$body .= '</p>';
			$body .= '</div>';
		} else {
			$body .= '<p style="margin-bottom: 15px;">';
			$body .= esc_html__( 'Please find the detailed submission data attached in the CSV file.', 'marketing-landing-form' );
			$body .= '</p>';
		}
		
		$body .= '<hr style="border: none; border-top: 1px solid #e5e7eb; margin: 25px 0;" />';
		$body .= '<p style="color: #9ca3af; font-size: 12px; margin: 0;">';
		$body .= esc_html__( 'This is an automated email from the Marketing Form Submissions system.', 'marketing-landing-form' );
		$body .= '</p>';
		$body .= '</div>';

		$headers = array( 'Content-Type: text/html; charset=UTF-8' );

		// Ensure file exists and is readable before sending
		if ( ! file_exists( $tmp_file ) || ! is_readable( $tmp_file ) ) {
			error_log( 'SMLF Weekly Report: CSV file not found or not readable: ' . $tmp_file );
			@unlink( $tmp_file );
			return;
		}
		
		// Get file size for logging
		$file_size = filesize( $tmp_file );
		error_log( 'SMLF Weekly Report: Sending email with attachment. File: ' . $tmp_file . ', Size: ' . $file_size . ' bytes' );

		$sent = wp_mail(
			$recipient,
			$subject,
			$body,
			$headers,
			array( $tmp_file )
		);
		
		error_log( 'SMLF Weekly Report: wp_mail result: ' . ( $sent ? 'SUCCESS' : 'FAILED' ) );

		if ( ! $sent ) {
			// For testing - using only depakar@succeedtech.com
			$warning_recipient = apply_filters( 'smlf_weekly_report_warning_recipient', 'depakar@succeedtech.com' );
			if ( empty( $warning_recipient ) ) {
				$warning_recipient = 'depakar@succeedtech.com';
			}

			$warning_subject = sprintf(
				__( 'Weekly report delivery failed (%1$s - %2$s)', 'marketing-landing-form' ),
				$start_label,
				$end_label
			);

			$warning_body = sprintf(
				__( "The weekly marketing form report could not be delivered to %1\$s.\nPlease check the mail server logs and try sending the report manually.\n\nReport Period: %2\$s to %3\$s\nTotal Submissions: %4\$d", 'marketing-landing-form' ),
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
	 * @param string $redirect_url Optional redirect URL.
	 */
	private function send_response( $message, $success = true, $status_code = 200, $redirect_url = '' ) {
		// Check if this is an AMP request
		$is_amp_request = $this->is_amp() || 
						  ( isset( $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) && 'true' === $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) ||
						  ( isset( $_POST['action'] ) && 'smlf_submit_form' === $_POST['action'] && ! wp_doing_ajax() );
		
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
				
				// Add AMP-Redirect-To header if redirect URL is provided (AMP-native redirect)
				if ( $success && ! empty( $redirect_url ) ) {
					header( 'AMP-Redirect-To: ' . esc_url_raw( $redirect_url ) );
					// Expose both headers
					header( 'Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin, AMP-Redirect-To' );
				} else {
					header( 'Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin' );
				}
				
				http_response_code( $status_code );
			}
			
			$response = array( 'message' => $message );
			if ( $success ) {
				$response['success'] = true;
				// Include redirect_url in JSON response as well (for fallback or desktop)
				if ( ! empty( $redirect_url ) ) {
					$response['redirect_url'] = esc_url_raw( $redirect_url );
				}
			}
			
			// Send clean JSON response
			$json_response = wp_json_encode( $response );
			echo $json_response;
			exit;
		}
		
		// For non-AMP, use WordPress functions
		if ( $success ) {
			$response_data = array( 'message' => $message );
			if ( ! empty( $redirect_url ) ) {
				$response_data['redirect_url'] = $redirect_url;
				// Also include thank you URL for JavaScript localStorage
				$settings = get_option( self::OPTION_KEY, array() );
				$thank_you_page_url = isset( $settings['thank_you_page_url'] ) ? $settings['thank_you_page_url'] : '';
				if ( ! empty( $thank_you_page_url ) ) {
					$response_data['thank_you_url'] = $thank_you_page_url;
				}
			}
			wp_send_json_success( $response_data );
		} else {
			wp_send_json_error( array( 'message' => $message ), $status_code );
		}
	}

	/**
	 * Refresh captcha numbers via AJAX.
	 */
	public function refresh_captcha() {
		// Generate new math captcha numbers
		if ( function_exists( 'random_int' ) ) {
			$captcha_a = random_int( 10, 20 );
			$captcha_b = random_int( 10, 20 );
		} else {
			mt_srand( (int) ( microtime( true ) * 1000000 ) + get_current_user_id() );
			$captcha_a = mt_rand( 10, 20 );
			$captcha_b = mt_rand( 10, 20 );
		}
		
		wp_send_json_success( array(
			'captcha_a' => $captcha_a,
			'captcha_b' => $captcha_b,
			'question' => sprintf( esc_html__( 'Security Question: What is %1$d + %2$d?', 'marketing-landing-form' ), $captcha_a, $captcha_b ),
		) );
	}

	/**
	 * Handle AJAX submissions.
	 */
	public function handle_form_submission() {
		// Verify nonce
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'smlf_submit' ) ) {
			$this->send_response( 
				__( 'Security check failed. Please refresh the page and try again.', 'marketing-landing-form' ),
				false,
				403
			);
		}

		// Bot protection checks - get specific error reason
		$bot_check_result = $this->detect_bot();
		if ( $bot_check_result !== false ) {
			$user_ip = $this->get_user_ip();
			$rate_limit_key = 'smlf_rate_limit_' . md5( $user_ip );
			$last_submission = get_transient( $rate_limit_key );
			
			// Check if it's a wrong captcha answer
			$captcha_a = absint( $_POST['smlf_captcha_a'] ?? 0 );
			$captcha_b = absint( $_POST['smlf_captcha_b'] ?? 0 );
			$captcha_user = absint( $_POST['smlf_captcha'] ?? 0 );
			$captcha_expected = $captcha_a + $captcha_b;
			$is_wrong_captcha = ( $captcha_a > 0 && $captcha_b > 0 && $captcha_user !== $captcha_expected );
			
			// Provide clear error message based on the specific issue
			if ( false !== $last_submission ) {
				$time_remaining = 30 - ( time() - $last_submission );
				$message = sprintf(
					__( 'You have recently submitted the form. Please wait %d seconds before submitting again to ensure we reduce spam. Thank you for your patience.', 'marketing-landing-form' ),
					max( 1, $time_remaining )
				);
			} elseif ( $is_wrong_captcha ) {
				$message = __( 'The answer to the security question is incorrect. Please check your calculation and try again.', 'marketing-landing-form' );
			} elseif ( is_string( $bot_check_result ) ) {
				// Use specific error message from detect_bot
				$message = $bot_check_result;
			} else {
				// Generic fallback with helpful suggestion
				$message = __( 'There was an issue with your submission. Please refresh the page and try again. If the problem persists, please wait a few moments before submitting.', 'marketing-landing-form' );
			}

			$this->send_response( $message, false, 403 );
			return;
		}

		$name          = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
		$email         = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
		$phone_number  = sanitize_text_field( wp_unslash( $_POST['phone_number'] ?? '' ) );
		$company_name  = sanitize_text_field( wp_unslash( $_POST['company_name'] ?? '' ) );
		$team_size     = sanitize_text_field( wp_unslash( $_POST['team_size'] ?? '' ) );
		$interested_in = sanitize_text_field( wp_unslash( $_POST['interested_in'] ?? '' ) );
		$privacy       = isset( $_POST['privacy'] );
		$utm_source    = sanitize_text_field( wp_unslash( $_POST['utm_source'] ?? '' ) );
		$utm_medium    = sanitize_text_field( wp_unslash( $_POST['utm_medium'] ?? '' ) );
		$utm_campaign  = sanitize_text_field( wp_unslash( $_POST['utm_campaign'] ?? '' ) );
		$utm_term      = sanitize_text_field( wp_unslash( $_POST['utm_term'] ?? '' ) );
		$utm_content   = sanitize_text_field( wp_unslash( $_POST['utm_content'] ?? '' ) );
		$page_url      = esc_url_raw( wp_unslash( $_POST['page_url'] ?? '' ) );
		$source_tag    = $this->determine_source_tag( $page_url );

		if ( empty( $name ) || empty( $email ) || empty( $phone_number ) || empty( $company_name ) || empty( $team_size ) || empty( $interested_in ) || ! $privacy ) {
			$this->send_response( 
				__( 'Please fill in all required fields and accept the privacy policy.', 'marketing-landing-form' ),
				false,
				400
			);
		}

		$data = array(
			'name'             => $name,
			'email'            => $email,
			'phone_number'     => $phone_number,
			'company_name'    => $company_name,
			'team_size'       => $team_size,
			'interested_in'   => $interested_in,
			'privacy_accepted' => $privacy ? 1 : 0,
			'utm_source'       => $utm_source,
			'utm_medium'       => $utm_medium,
			'utm_campaign'     => $utm_campaign,
			'utm_term'         => $utm_term,
			'utm_content'      => $utm_content,
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
				__( 'Unable to save your submission. Please try again later.', 'marketing-landing-form' ),
				false,
				500
			);
		}

		// Set rate limiting transient AFTER successful submission
		$user_ip = $this->get_user_ip();
		if ( ! empty( $user_ip ) ) {
			$rate_limit_key = 'smlf_rate_limit_' . md5( $user_ip );
			// Set transient for 30 seconds to prevent rapid resubmissions
			set_transient( $rate_limit_key, time(), 30 );
		}

		// Delete form token and honeypot transient only after successful submission
		$form_token = sanitize_text_field( wp_unslash( $_POST['smlf_form_token'] ?? '' ) );
		if ( ! empty( $form_token ) ) {
			$this->verify_form_token( $form_token, true );
			$honeypot_key = 'smlf_honeypots_' . md5( $form_token );
			delete_transient( $honeypot_key );
		}

		// Schedule emails and ERP sync to run in background for faster response
		wp_schedule_single_event( time(), 'smlf_send_admin_email', array( $data ) );
		wp_schedule_single_event( time(), 'smlf_send_user_email', array( $data ) );
		wp_schedule_single_event( time(), 'smlf_send_to_erp', array( $data ) );

		// Trigger background processing immediately (spawn cron if needed)
		// Skip on AMP to avoid loopback latency; WP-Cron will run shortly.
		$is_amp_request = $this->is_amp() || 
						  ( isset( $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) && 'true' === $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) ||
						  ( isset( $_POST['action'] ) && 'smlf_submit_form' === $_POST['action'] && ! wp_doing_ajax() );
		if ( ! $is_amp_request ) {
			spawn_cron();
		}

		// Build redirect URL based on team size - read from admin settings
		$settings = get_option( self::OPTION_KEY, array() );
		$calendly_url = isset( $settings['calendly_url'] ) ? $settings['calendly_url'] : '';
		$team_size_50_100_url = isset( $settings['team_size_50_100_url'] ) ? $settings['team_size_50_100_url'] : '';
		
		$redirect_url = '';
		
		// Check if team size is "50-100" - redirect to alternative URL
		if ( $team_size === '50-100' && ! empty( $team_size_50_100_url ) ) {
			$redirect_url = $team_size_50_100_url;
			$message = __( 'Thank you! Redirecting to your page...', 'marketing-landing-form' );
		}
		// Otherwise, redirect to Calendly
		elseif ( ! empty( $calendly_url ) ) {
			$redirect_url = $calendly_url;
			$message = __( 'Thank you! Redirecting to booking page...', 'marketing-landing-form' );
		} else {
			$message = __( 'Thank you! We will contact you soon.', 'marketing-landing-form' );
		}

		$this->send_response( 
			$message,
			true,
			200,
			$redirect_url
		);
	}

	/**
	 * Process admin email in background.
	 *
	 * @param array $data Submission data.
	 */
	public function process_admin_email( $data ) {
		$this->send_admin_email( $data );
	}

	/**
	 * Process user email in background.
	 *
	 * @param array $data Submission data.
	 */
	public function process_user_email( $data ) {
		$this->send_user_email( $data );
	}

	/**
	 * Process ERP sync in background.
	 *
	 * @param array $data Submission data.
	 */
	public function process_erp_sync( $data ) {
		$this->send_to_erp( $data );
	}

	/**
	 * Send admin notification.
	 *
	 * @param array $data Submission data.
	 */
	private function send_admin_email( $data ) {
		// Admin email recipients - send individual emails so they cannot see each other
		$admin_emails = array(
			'depakar@succeedtech.com',
			'suprit@succeedtech.com',
			'sriethiraj@getnos.io',
		);
		$subject     = __( 'Succeedlearn Human-First Security Training', 'marketing-landing-form' );

		$utm_details = sprintf(
			'<ul>
				<li><strong>UTM Source:</strong> %1$s</li>
				<li><strong>UTM Medium:</strong> %2$s</li>
				<li><strong>UTM Campaign:</strong> %3$s</li>
				<li><strong>UTM Term:</strong> %4$s</li>
				<li><strong>UTM Content:</strong> %5$s</li>
			</ul>',
			esc_html( $data['utm_source'] ),
			esc_html( $data['utm_medium'] ),
			esc_html( $data['utm_campaign'] ),
			esc_html( $data['utm_term'] ),
			esc_html( $data['utm_content'] )
		);

		$body = sprintf(
			'<h2>New Marketing Form Submission</h2>
			<p><strong>Name:</strong> %1$s</p>
			<p><strong>Email:</strong> %2$s</p>
			<p><strong>Phone Number:</strong> %3$s</p>
			<p><strong>Company Name:</strong> %4$s</p>
			<p><strong>Team Size:</strong> %5$s</p>
			<p><strong>Interested In:</strong> %6$s</p>
			<p><strong>Page URL:</strong> <a href="%7$s">%7$s</a></p>
			<p><strong>IP:</strong> %8$s</p>',
			esc_html( $data['name'] ),
			esc_html( $data['email'] ),
			esc_html( $data['phone_number'] ?? '' ),
			esc_html( $data['company_name'] ?? '' ),
			esc_html( $data['team_size'] ?? '' ),
			esc_html( $data['interested_in'] ?? '' ),
			esc_url( $data['page_url'] ),
			esc_html( $data['user_ip'] )
		);

		// Send individual emails to each admin so they cannot see each other's addresses
		foreach ( $admin_emails as $admin_email ) {
			$headers = array(
				'Content-Type: text/html; charset=UTF-8',
				'From: noreply@succeedlearn.com',
				'Reply-To: ' . $data['name'] . ' <' . $data['email'] . '>',
			);
			wp_mail( $admin_email, $subject, $body, $headers );
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
		$subject = __( 'We received your message', 'marketing-landing-form' );
		$headers = array(
			'Content-Type: text/html; charset=UTF-8',
			'From: noreply@succeedlearn.com',
		);
		$body    = sprintf(
			'<p>Hi %1$s,</p><p>Thanks for reaching out to SucceedLEARN. Our team will contact you soon.</p><p>Regards,<br/>SucceedLEARN Team</p>',
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
		$endpoint = apply_filters( 'smlf_erp_endpoint', '' );

		if ( empty( $endpoint ) ) {
			/**
			 * Fires after a submission is stored. Use this to integrate with custom systems.
			 *
			 * @param array $data Submission data.
			 */
			do_action( 'smlf_after_submission', $data, null );
			return;
		}

		$payload = apply_filters( 'smlf_erp_payload', $data );

		// Use shorter timeout and non-blocking request for faster processing
		$response = wp_remote_post(
			$endpoint,
			array(
				'timeout' => 5,
				'blocking' => false,
				'headers' => array(
					'Content-Type' => 'application/json',
				),
				'body'    => wp_json_encode( $payload ),
			)
		);

		do_action( 'smlf_after_submission', $data, $response );
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
		$token_key = 'smlf_token_' . md5( $token );
		// Store token for 2 hours (increased from 1 hour to be more lenient)
		set_transient( $token_key, time(), 7200 );
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
		
		$token_key = 'smlf_token_' . md5( $token );
		$token_time = get_transient( $token_key );
		
		if ( false === $token_time ) {
			// Token doesn't exist or expired
			return false;
		}
		
		// Check if token is not too old (max 2 hours, increased from 1 hour)
		if ( ( time() - $token_time ) > 7200 ) {
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
			__( 'Marketing Form Submissions', 'marketing-landing-form' ),
			__( 'Marketing Form', 'marketing-landing-form' ),
			'manage_options',
			'smlf-submissions',
			array( $this, 'render_admin_page' ),
			'dashicons-email-alt2',
			58
		);
		add_submenu_page(
			'smlf-submissions',
			__( 'Settings', 'marketing-landing-form' ),
			__( 'Settings', 'marketing-landing-form' ),
			'manage_options',
			'smlf-settings',
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
			<h1><?php esc_html_e( 'Marketing Form Submissions', 'marketing-landing-form' ); ?></h1>
			
			<?php
			// Show success/error message if weekly report was sent manually
			if ( isset( $_GET['weekly_report_sent'] ) ) {
				$message_type = sanitize_text_field( wp_unslash( $_GET['weekly_report_sent'] ) );
				if ( 'success' === $message_type ) {
					echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Weekly report email sent successfully!', 'marketing-landing-form' ) . '</p></div>';
				} elseif ( 'error' === $message_type ) {
					echo '<div class="notice notice-error is-dismissible"><p>' . esc_html__( 'Failed to send weekly report email. Please check your email settings.', 'marketing-landing-form' ) . '</p></div>';
				}
			}
			?>
			
			<form method="get" style="margin-bottom: 20px;">
				<input type="hidden" name="page" value="smlf-submissions" />
				<label>
					<?php esc_html_e( 'Start Date', 'marketing-landing-form' ); ?>
					<input type="date" name="start_date" value="<?php echo esc_attr( $filters['start_date'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'End Date', 'marketing-landing-form' ); ?>
					<input type="date" name="end_date" value="<?php echo esc_attr( $filters['end_date'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'Email', 'marketing-landing-form' ); ?>
					<input type="search" name="email" value="<?php echo esc_attr( $filters['email'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'UTM Source', 'marketing-landing-form' ); ?>
					<input type="search" name="utm_source" value="<?php echo esc_attr( $filters['utm_source'] ); ?>" />
				</label>
				<button class="button button-primary" type="submit"><?php esc_html_e( 'Filter', 'marketing-landing-form' ); ?></button>
				<?php wp_nonce_field( 'smlf_export', 'smlf_export_nonce' ); ?>
				<button class="button" name="smlf_export" value="1"><?php esc_html_e( 'Export CSV', 'marketing-landing-form' ); ?></button>
			</form>
			
			<div style="margin-bottom: 20px; padding: 15px; background: #fff; border-left: 4px solid #2271b1; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
				<h2 style="margin-top: 0;"><?php esc_html_e( 'Weekly Report', 'marketing-landing-form' ); ?></h2>
				<p><?php esc_html_e( 'Manually trigger the weekly report email to be sent immediately.', 'marketing-landing-form' ); ?></p>
				<form method="post" action="">
					<?php wp_nonce_field( 'smlf_send_weekly_report_manual', 'smlf_weekly_report_nonce' ); ?>
					<input type="hidden" name="smlf_send_weekly_report" value="1" />
					<button type="submit" class="button button-secondary" onclick="return confirm('<?php echo esc_js( __( 'Are you sure you want to send the weekly report email now?', 'marketing-landing-form' ) ); ?>');">
						<?php esc_html_e( 'Send Weekly Mail', 'marketing-landing-form' ); ?>
					</button>
				</form>
			</div>
			<table class="widefat fixed striped">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Date', 'marketing-landing-form' ); ?></th>
						<th><?php esc_html_e( 'Name', 'marketing-landing-form' ); ?></th>
						<th><?php esc_html_e( 'Email', 'marketing-landing-form' ); ?></th>
						<th><?php esc_html_e( 'Phone', 'marketing-landing-form' ); ?></th>
						<th><?php esc_html_e( 'Company', 'marketing-landing-form' ); ?></th>
						<th><?php esc_html_e( 'Team Size', 'marketing-landing-form' ); ?></th>
						<th><?php esc_html_e( 'Interested In', 'marketing-landing-form' ); ?></th>
						<th><?php esc_html_e( 'Source Tag', 'marketing-landing-form' ); ?></th>
						<th><?php esc_html_e( 'Page URL', 'marketing-landing-form' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if ( empty( $items ) ) : ?>
						<tr>
							<td colspan="9"><?php esc_html_e( 'No submissions found.', 'marketing-landing-form' ); ?></td>
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
								<td><?php echo esc_html( $item->phone_number ?? '' ); ?></td>
								<td><?php echo esc_html( $item->company_name ?? '' ); ?></td>
								<td><?php echo esc_html( $item->team_size ?? '' ); ?></td>
								<td><?php echo esc_html( $item->interested_in ?? '' ); ?></td>
								<td><?php echo esc_html( $item->source_tag ); ?></td>
								<td><a href="<?php echo esc_url( $item->page_url ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'View', 'marketing-landing-form' ); ?></a></td>
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
			$where[]   = 'utm_source LIKE %s';
			$prepare[] = '%' . $wpdb->esc_like( $filters['utm_source'] ) . '%';
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
		if ( ! isset( $_POST['smlf_send_weekly_report'] ) || '1' !== $_POST['smlf_send_weekly_report'] ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'marketing-landing-form' ) );
		}

		if ( ! isset( $_POST['smlf_weekly_report_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['smlf_weekly_report_nonce'] ) ), 'smlf_send_weekly_report_manual' ) ) {
			wp_die( esc_html__( 'Invalid request.', 'marketing-landing-form' ) );
		}

		// Trigger the weekly report manually (pass true to use current time as end date)
		ob_start();
		$this->send_weekly_report( true );
		ob_end_clean();

		// Redirect back with success message (send_weekly_report handles errors internally)
		$redirect_url = add_query_arg(
			array(
				'page'                => 'smlf-submissions',
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
		$export_flag = isset( $_GET['smlf_export'] ) ? sanitize_text_field( wp_unslash( $_GET['smlf_export'] ) ) : '';
		if ( '1' !== $export_flag ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'marketing-landing-form' ) );
		}

		if ( ! isset( $_GET['smlf_export_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['smlf_export_nonce'] ) ), 'smlf_export' ) ) {
			wp_die( esc_html__( 'Invalid export request.', 'marketing-landing-form' ) );
		}

		$filters = $this->get_filters();
		$data    = $this->get_submissions( $filters );

		$filename = 'smlf-submissions-' . gmdate( 'Ymd-His' ) . '.csv';

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
				'Phone Number',
				'Company Name',
				'Team Size',
				'Interested In',
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

		foreach ( $data as $row ) {
			fputcsv(
				$fh,
				array(
					$row->id,
					$row->created_at,
					$row->name,
					$row->email,
					$row->phone_number ?? '',
					$row->company_name ?? '',
					$row->team_size ?? '',
					$row->interested_in ?? '',
					$row->source_tag,
					$row->utm_source,
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
		register_setting( 'smlf_settings', self::OPTION_KEY, array( $this, 'sanitize_settings' ) );
	}

	/**
	 * Sanitize settings.
	 *
	 * @param array $input Settings input.
	 * @return array Sanitized settings.
	 */
	public function sanitize_settings( $input ) {
		$sanitized = array();
		
		if ( isset( $input['calendly_url'] ) ) {
			$sanitized['calendly_url'] = esc_url_raw( $input['calendly_url'] );
		}
		
		if ( isset( $input['team_size_50_100_url'] ) ) {
			$sanitized['team_size_50_100_url'] = esc_url_raw( $input['team_size_50_100_url'] );
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
			add_settings_error( 'smlf_messages', 'smlf_message', __( 'Settings saved.', 'marketing-landing-form' ), 'updated' );
		}

		settings_errors( 'smlf_messages' );
		$settings = get_option( self::OPTION_KEY, array() );
		$calendly_url = isset( $settings['calendly_url'] ) ? $settings['calendly_url'] : '';
		$team_size_50_100_url = isset( $settings['team_size_50_100_url'] ) ? $settings['team_size_50_100_url'] : '';
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php settings_fields( 'smlf_settings' ); ?>
				
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								<label for="calendly_url"><?php esc_html_e( 'Calendly Booking URL', 'marketing-landing-form' ); ?></label>
							</th>
							<td>
								<input type="url" id="calendly_url" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[calendly_url]" value="<?php echo esc_attr( $calendly_url ); ?>" class="regular-text" placeholder="https://calendly.com/succeedlearn/30min?month=2026-01" />
								<p class="description">
									<?php esc_html_e( 'Enter your Calendly booking page URL. Users will be redirected here after form submission (except for team size 50-100).', 'marketing-landing-form' ); ?>
								</p>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="team_size_50_100_url"><?php esc_html_e( 'Thank You Page URL (Team Size 50-100)', 'marketing-landing-form' ); ?></label>
							</th>
							<td>
								<input type="url" id="team_size_50_100_url" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[team_size_50_100_url]" value="<?php echo esc_attr( $team_size_50_100_url ); ?>" class="regular-text" placeholder="https://succeedlearn.com/welcome/" />
								<p class="description">
									<?php esc_html_e( 'Enter the thank you page URL for users who select "50-100" team size. These users will be redirected to this page instead of Calendly. Leave empty to redirect all users to Calendly.', 'marketing-landing-form' ); ?>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				
				<p class="description" style="margin-top: 20px;">
					<strong><?php esc_html_e( 'Bot Protection Features:', 'marketing-landing-form' ); ?></strong><br />
					• <?php esc_html_e( 'Honeypot field (always active - invisible to users)', 'marketing-landing-form' ); ?><br />
					• <?php esc_html_e( 'Time-based validation (prevents instant submissions)', 'marketing-landing-form' ); ?><br />
					• <?php esc_html_e( 'Math captcha (security question)', 'marketing-landing-form' ); ?>
				</p>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

}

SMLF_Marketing_Landing_Form_Plugin::instance();

