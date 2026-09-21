<?php
/**
 * Plugin Name: Succeed Common Contact Form
 * Description: AJAX powered contact form with UTM capture, email notifications, and submission dashboard.
 * Version: 1.3.2
 * Author: SucceedTech
 * Text Domain: contact-form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class SCF_Contact_Form_Plugin {
	const VERSION = '1.3.2';
	const OPTION_KEY = 'scf_settings';
	const CUSTOM_LEAD_PATH_MAX_LENGTH = 500;
	const CUSTOM_LEAD_PATH_SEGMENT_MAX_LENGTH = 64;
	const WEEKLY_REPORT_HOOK = 'scf_send_weekly_report';
	const DEFAULT_MIN_MESSAGE_LENGTH = 10;
	const ADMIN_EMAIL_TEST_RECIPIENT = 'depakar@succeedtech.com';
	const ERP_UAT_API_URL = 'https://uaterp.succeedtech.com/api/resource/Lead';

	/**
	 * Singleton instance.
	 *
	 * @var STCF_Plugin|null
	 */
	private static $instance = null;

	/**
	 * Table name cache.
	 *
	 * @var string|null
	 */
	private $table_name = null;

	/**
	 * Course table name cache.
	 *
	 * @var string|null
	 */
	private $course_table_name = null;

	/**
	 * Whether SCF is currently sending mail (for scoped wp_mail_from filters).
	 *
	 * @var bool
	 */
	private $is_sending_scf_email = false;

	/**
	 * Get singleton instance.
	 *
	 * @return STCF_Plugin
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
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_cta_path_tracker' ), 5 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'wp_footer', array( $this, 'render_amp_cta_path_tracker' ), 99 );
		add_action( 'wp_ajax_scf_submit_form', array( $this, 'handle_form_submission' ) );
		add_action( 'wp_ajax_nopriv_scf_submit_form', array( $this, 'handle_form_submission' ) );
		add_action( 'wp_ajax_scf_refresh_form_security', array( $this, 'handle_refresh_form_security' ) );
		add_action( 'wp_ajax_nopriv_scf_refresh_form_security', array( $this, 'handle_refresh_form_security' ) );
		add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_init', array( $this, 'maybe_export_csv' ) );
		add_action( 'admin_init', array( $this, 'maybe_send_weekly_report_manual' ) );
		add_action( 'admin_init', array( $this, 'maybe_reset_user_reply_email_count' ) );
		add_action( 'wp_head', array( $this, 'add_amp_scripts' ) );
		add_action( 'wp_head', array( $this, 'output_page_journey_meta' ), 6 );
		add_action( 'init', array( $this, 'maybe_schedule_weekly_report' ) );
		add_action( self::WEEKLY_REPORT_HOOK, array( $this, 'send_weekly_report' ) );
		add_action( 'scf_send_emails_async', array( $this, 'send_emails_async' ), 10, 1 );
		add_filter( 'wp_mail_failed', array( $this, 'log_wp_mail_error' ) );
		add_filter( 'wp_mail_from', array( $this, 'set_scf_from_email' ), 10 );
		add_filter( 'wp_mail_from_name', array( $this, 'set_scf_from_name' ), 999 );
	}
	
	/**
	 * Log wp_mail errors for debugging.
	 *
	 * @param WP_Error $error The error object.
	 */
	public function log_wp_mail_error( $error ) {
		$debug_mode = defined( 'WP_DEBUG' ) && WP_DEBUG;
		if ( $debug_mode ) {
			error_log( 'SCF wp_mail Error: ' . $error->get_error_message() );
		}
	}

	/**
	 * Plugin activation callback.
	 */
	public function activate() {
		$this->create_submission_table( $this->get_table_name() );
		$this->create_submission_table( $this->get_course_table_name() );

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
			$this->table_name = "{$wpdb->prefix}scf_contact_submissions";
		}

		return $this->table_name;
	}

	/**
	 * Return database table name for course form submissions.
	 *
	 * @return string
	 */
	private function get_course_table_name() {
		global $wpdb;

		if ( null === $this->course_table_name ) {
			$this->course_table_name = "{$wpdb->prefix}scf_course_submissions";
		}

		return $this->course_table_name;
	}

	/**
	 * Return selectable "Interested In" options.
	 *
	 * @return array<int, string>
	 */
	private function get_course_interest_options() {
		return array(
			'Security Awareness & Phishing',
			'HR Compliance Suite',
			'Financial Crime Prevention',
			'Workplace Health & Safety',
			'Code of Conduct',
			'PE/VC Compliance',
			'ESG Awareness',
			'POSH India',
			'Custom Development',
			'Others',
		);
	}

	/**
	 * Sanitize multiple "Interested In" values from request.
	 *
	 * @param mixed $raw_interest Raw request value.
	 * @return array<int, string>
	 */
	private function sanitize_course_interest_values( $raw_interest ) {
		$selected = is_array( $raw_interest ) ? $raw_interest : array( $raw_interest );
		$allowed  = $this->get_course_interest_options();
		$cleaned  = array();

		foreach ( $selected as $item ) {
			$value = sanitize_text_field( wp_unslash( (string) $item ) );
			if ( '' === $value || ! in_array( $value, $allowed, true ) ) {
				continue;
			}
			$cleaned[] = $value;
		}

		return array_values( array_unique( $cleaned ) );
	}

	/**
	 * Convert selected interests to display string.
	 *
	 * @param array<int, string> $interests Selected items.
	 * @return string
	 */
	private function format_course_interest_string( array $interests ) {
		return implode( ', ', $interests );
	}

	/**
	 * Create submission table if missing.
	 *
	 * @param string $table_name Table to create/update.
	 */
	private function create_submission_table( $table_name ) {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE {$table_name} (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL,
			email VARCHAR(255) NOT NULL,
			organization VARCHAR(255) DEFAULT '',
			phone_country_code VARCHAR(10) DEFAULT '',
			phone_number VARCHAR(30) DEFAULT '',
			course_interest TEXT,
			form_variant VARCHAR(20) DEFAULT 'default',
			message TEXT,
			privacy_accepted TINYINT(1) DEFAULT 0,
			utm_source VARCHAR(255) DEFAULT '',
			utm_medium VARCHAR(255) DEFAULT '',
			utm_campaign VARCHAR(255) DEFAULT '',
			utm_term VARCHAR(255) DEFAULT '',
			utm_content VARCHAR(255) DEFAULT '',
			source_tag VARCHAR(100) DEFAULT '',
			custom_lead_path VARCHAR(500) DEFAULT '',
			page_url TEXT,
			user_ip VARCHAR(100) DEFAULT '',
			user_agent TEXT,
			erp_sync_status VARCHAR(20) DEFAULT '',
			erp_sync_detail TEXT,
			erp_lead_name VARCHAR(140) DEFAULT '',
			created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (id),
			KEY email (email),
			KEY created_at (created_at)
		) {$charset_collate};";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}

	/**
	 * Ensure a submission table exists (creates it if missing).
	 *
	 * Course table is new in a plugin update; sites that only copied files
	 * without re-activating would otherwise get failed inserts / HTTP 500.
	 *
	 * @param string $table_name Full table name including prefix.
	 */
	private function ensure_submission_table_exists( $table_name ) {
		global $wpdb;

		$exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table_name ) );
		if ( $exists === $table_name ) {
			return;
		}

		$this->create_submission_table( $table_name );
	}

	/**
	 * Add missing columns when plugin updates.
	 */
	public function maybe_update_schema() {
		global $wpdb;

		$table_names = array(
			$this->get_table_name(),
			$this->get_course_table_name(),
		);

		foreach ( $table_names as $table_name ) {
			$this->ensure_submission_table_exists( $table_name );

			$table_exists = $wpdb->get_var(
				$wpdb->prepare( 'SHOW TABLES LIKE %s', $table_name )
			);

			if ( $table_exists !== $table_name ) {
				continue;
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

			$phone_cc_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'phone_country_code'
				)
			);
			if ( ! $phone_cc_exists ) {
				$wpdb->query(
					"ALTER TABLE {$table_name} ADD phone_country_code VARCHAR(10) DEFAULT '' AFTER organization"
				);
			}

			$phone_number_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'phone_number'
				)
			);
			if ( ! $phone_number_exists ) {
				$wpdb->query(
					"ALTER TABLE {$table_name} ADD phone_number VARCHAR(30) DEFAULT '' AFTER phone_country_code"
				);
			}

			$course_interest_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'course_interest'
				)
			);
			if ( ! $course_interest_exists ) {
				$wpdb->query(
					"ALTER TABLE {$table_name} ADD course_interest VARCHAR(255) DEFAULT '' AFTER phone_number"
				);
			}
			$course_interest_meta = $wpdb->get_row(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'course_interest'
				),
				ARRAY_A
			);
			if ( $course_interest_meta && ! empty( $course_interest_meta['Type'] ) ) {
				$type = strtolower( (string) $course_interest_meta['Type'] );
				if ( false === strpos( $type, 'text' ) ) {
					$wpdb->query(
						"ALTER TABLE {$table_name} MODIFY course_interest TEXT"
					);
				}
			}

			$form_variant_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'form_variant'
				)
			);
			if ( ! $form_variant_exists ) {
				$wpdb->query(
					"ALTER TABLE {$table_name} ADD form_variant VARCHAR(20) DEFAULT 'default' AFTER course_interest"
				);
			}

			$user_ip_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'user_ip'
				)
			);
			if ( ! $user_ip_exists ) {
				$wpdb->query(
					"ALTER TABLE {$table_name} ADD user_ip VARCHAR(100) DEFAULT '' AFTER page_url"
				);
			}

			$erp_status_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'erp_sync_status'
				)
			);
			if ( ! $erp_status_exists ) {
				$wpdb->query(
					"ALTER TABLE {$table_name} ADD erp_sync_status VARCHAR(20) DEFAULT '' AFTER user_agent"
				);
			}

			$erp_detail_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'erp_sync_detail'
				)
			);
			if ( ! $erp_detail_exists ) {
				$wpdb->query(
					"ALTER TABLE {$table_name} ADD erp_sync_detail TEXT AFTER erp_sync_status"
				);
			}

			$erp_lead_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'erp_lead_name'
				)
			);
			if ( ! $erp_lead_exists ) {
				$wpdb->query(
					"ALTER TABLE {$table_name} ADD erp_lead_name VARCHAR(140) DEFAULT '' AFTER erp_sync_detail"
				);
			}

			$custom_lead_path_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'custom_lead_path'
				)
			);
			if ( ! $custom_lead_path_exists ) {
				$wpdb->query(
					"ALTER TABLE {$table_name} ADD custom_lead_path VARCHAR(500) DEFAULT '' AFTER source_tag"
				);
			}

			// Migrate legacy cta_path column data if present from an earlier release.
			$legacy_cta_path_exists = $wpdb->get_var(
				$wpdb->prepare(
					"SHOW COLUMNS FROM {$table_name} LIKE %s",
					'cta_path'
				)
			);
			if ( $legacy_cta_path_exists ) {
				$wpdb->query(
					"UPDATE {$table_name} SET custom_lead_path = cta_path WHERE ( custom_lead_path = '' OR custom_lead_path IS NULL ) AND cta_path != ''"
				);
			}
		}
	}

	/**
	 * Store ERP sync result on a submission row for the admin list.
	 *
	 * @param string $table_name Full table name.
	 * @param int    $submission_id Row ID.
	 * @param string $status        synced|failed|pending|duplicate.
	 * @param string $detail        Short error or note.
	 * @param string $lead_name     ERP Lead name when synced.
	 */
	public function record_erp_sync( $table_name, $submission_id, $status, $detail = '', $lead_name = '' ) {
		global $wpdb;

		$submission_id = absint( $submission_id );
		$table_name    = (string) $table_name;
		if ( $submission_id < 1 || '' === $table_name ) {
			return;
		}

		$allowed = array( $this->get_table_name(), $this->get_course_table_name() );
		if ( ! in_array( $table_name, $allowed, true ) ) {
			return;
		}

		$this->maybe_update_schema();

		$wpdb->update(
			$table_name,
			array(
				'erp_sync_status' => sanitize_key( $status ),
				'erp_sync_detail' => sanitize_textarea_field( wp_strip_all_tags( (string) $detail ) ),
				'erp_lead_name'   => sanitize_text_field( (string) $lead_name ),
			),
			array( 'id' => $submission_id ),
			array( '%s', '%s', '%s' ),
			array( '%d' )
		);
	}

	/**
	 * Register shortcode.
	 */
	public function register_shortcodes() {
		add_shortcode( 'contact_form', array( $this, 'render_form' ) );
		add_shortcode( 'succeedlearn_course_form', array( $this, 'render_course_form' ) );
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

		?>
		<script async custom-element="amp-script" src="https://cdn.ampproject.org/v0/amp-script-0.1.js"></script>
		<?php
		$this->output_amp_cta_path_script_hash();

		global $post;
		$post_content = $post ? $post->post_content : '';
		
		$has_contact_shortcode = has_shortcode( $post_content, 'contact_form' );
		$has_course_shortcode  = has_shortcode( $post_content, 'succeedlearn_course_form' );
		if ( ! $has_contact_shortcode && ! $has_course_shortcode ) {
			return;
		}
		?>
		<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
		<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
		<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
		<?php
	}

	/**
	 * Enqueue global CTA path tracker on non-AMP front-end pages.
	 */
	public function enqueue_cta_path_tracker() {
		if ( is_admin() || $this->is_amp() ) {
			return;
		}

		$script_path = plugin_dir_path( __FILE__ ) . 'assets/js/cta-path-tracker.js';
		wp_enqueue_script(
			'scf-cta-path-tracker',
			plugins_url( 'assets/js/cta-path-tracker.js', __FILE__ ),
			array(),
			file_exists( $script_path ) ? (string) filemtime( $script_path ) : self::VERSION,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);

		$page_segment = $this->get_page_journey_segment();
		if ( '' !== $page_segment ) {
			wp_localize_script(
				'scf-cta-path-tracker',
				'SCF_CTA_PATH_CONFIG',
				array(
					'pageSegment' => $page_segment,
				)
			);
		}
	}

	/**
	 * Output current page journey segment for AMP amp-script and non-JS fallback.
	 */
	public function output_page_journey_meta() {
		if ( is_admin() ) {
			return;
		}

		$page_segment = $this->get_page_journey_segment();
		if ( '' === $page_segment ) {
			return;
		}

		echo '<meta name="scf-page-journey" content="' . esc_attr( $page_segment ) . '">' . "\n";
	}

	/**
	 * Resolve a single journey segment for the current front-end request.
	 *
	 * @return string Sanitized segment or empty when not applicable.
	 */
	public function get_page_journey_segment() {
		if ( is_admin() ) {
			return '';
		}

		$segment = '';

		if ( is_front_page() ) {
			$segment = 'home';
		} elseif ( is_singular( 'page' ) ) {
			$slug = get_post_field( 'post_name', get_queried_object_id() );
			$segment = $slug ? 'page-' . $slug : 'page';
		} elseif ( is_singular( 'lp_course' ) ) {
			$slug = get_post_field( 'post_name', get_queried_object_id() );
			$segment = $slug ? 'course-' . $slug : 'course';
		} elseif ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) {
			$segment = 'courses';
		} elseif ( function_exists( 'learn_press_is_courses' ) && learn_press_is_courses() ) {
			$segment = 'courses';
		} elseif ( is_home() || is_post_type_archive( 'post' ) ) {
			$segment = 'blog';
		} elseif ( is_singular( 'post' ) ) {
			$slug = get_post_field( 'post_name', get_queried_object_id() );
			$segment = $slug ? 'blog-' . $slug : 'blog-post';
		} elseif ( is_search() ) {
			$segment = 'search';
		} elseif ( is_404() ) {
			$segment = '404';
		}

		$segment = $this->sanitize_journey_segment( $segment );

		return (string) apply_filters( 'scf_page_journey_segment', $segment );
	}

	/**
	 * Sanitize one journey segment identifier.
	 *
	 * @param string $raw Raw segment.
	 * @return string
	 */
	private function sanitize_journey_segment( $raw ) {
		$raw = strtolower( trim( sanitize_text_field( (string) $raw ) ) );
		if ( '' === $raw ) {
			return '';
		}

		if ( strlen( $raw ) > self::CUSTOM_LEAD_PATH_SEGMENT_MAX_LENGTH ) {
			$raw = substr( $raw, 0, self::CUSTOM_LEAD_PATH_SEGMENT_MAX_LENGTH );
		}

		if ( ! preg_match( '/^[a-z0-9_-]+$/', $raw ) ) {
			return '';
		}

		return $raw;
	}

	/**
	 * Resolve journey segment from a submitted page URL.
	 *
	 * @param string $page_url Page URL from the form.
	 * @return string
	 */
	public function get_page_journey_segment_from_url( $page_url = '' ) {
		$page_url = trim( (string) $page_url );
		if ( '' === $page_url ) {
			return '';
		}

		$path = $this->extract_path_from_url( $page_url );
		if ( '' === $path || 'home' === $path ) {
			return 'home';
		}

		$post_id = url_to_postid( $page_url );
		if ( $post_id ) {
			$post = get_post( $post_id );
			if ( $post instanceof WP_Post ) {
				if ( 'page' === $post->post_type && $post->post_name ) {
					return $this->sanitize_journey_segment( 'page-' . $post->post_name );
				}
				if ( 'lp_course' === $post->post_type && $post->post_name ) {
					return $this->sanitize_journey_segment( 'course-' . $post->post_name );
				}
				if ( 'post' === $post->post_type && $post->post_name ) {
					return $this->sanitize_journey_segment( 'blog-' . $post->post_name );
				}
			}
		}

		if ( false !== strpos( $path, 'course' ) ) {
			return 'courses';
		}
		if ( false !== strpos( $path, 'blog' ) ) {
			return 'blog';
		}

		$slug_parts = array_filter( explode( '/', $path ) );
		$slug       = end( $slug_parts );
		if ( is_string( $slug ) && '' !== $slug ) {
			$page = get_page_by_path( $slug );
			if ( $page instanceof WP_Post ) {
				return $this->sanitize_journey_segment( 'page-' . $page->post_name );
			}
			return $this->sanitize_journey_segment( 'page-' . $slug );
		}

		return '';
	}

	/**
	 * Resolve final custom_lead_path from POST, cookies, and page URL.
	 *
	 * @param string $posted_path Raw POST value.
	 * @param string $page_url    Submitted page URL.
	 * @return string
	 */
	private function resolve_custom_lead_path( $posted_path, $page_url = '' ) {
		$path = $this->sanitize_custom_lead_path( (string) $posted_path );

		if ( '' === $path && ! empty( $_COOKIE['scf_custom_lead_path'] ) ) {
			$path = $this->sanitize_custom_lead_path( wp_unslash( $_COOKIE['scf_custom_lead_path'] ) );
		}

		if ( '' === $path && ! empty( $_COOKIE['custom_lead_path'] ) ) {
			$path = $this->sanitize_custom_lead_path( wp_unslash( $_COOKIE['custom_lead_path'] ) );
		}

		$page_segment = $this->get_page_journey_segment_from_url( $page_url );
		if ( '' === $page_segment ) {
			return $path;
		}

		if ( '' === $path ) {
			return $page_segment;
		}

		$parts = explode( '>', $path );
		$last  = end( $parts );
		if ( $last === $page_segment ) {
			return $path;
		}

		return $this->sanitize_custom_lead_path( $path . '>' . $page_segment );
	}

	/**
	 * Inline recorder so journey is captured even when optimizers strip tracker JS.
	 */
	private function render_inline_journey_recorder() {
		$page_segment = $this->get_page_journey_segment();
		if ( '' === $page_segment ) {
			return;
		}
		?>
		<script>
		(function () {
			var segment = <?php echo wp_json_encode( $page_segment ); ?>;
			var storageKey = 'custom_lead_path';
			var cookieKey = 'scf_custom_lead_path';
			if (!segment) { return; }
			try {
				var current = sessionStorage.getItem(storageKey) || '';
				var parts = current ? current.split('>') : [];
				var next = current;
				if (!current) {
					next = segment;
				} else if (parts[parts.length - 1] !== segment) {
					next = current + '>' + segment;
				}
				sessionStorage.setItem(storageKey, next);
				document.cookie = cookieKey + '=' + encodeURIComponent(next) + '; path=/; SameSite=Lax';
			} catch (e) {}
		})();
		</script>
		<?php
	}

	/**
	 * Return SHA-384 hash for AMP amp-script registration.
	 *
	 * @return string
	 */
	private function get_amp_cta_path_script_hash() {
		$script_path = plugin_dir_path( __FILE__ ) . 'assets/js/cta-path-tracker.amp.js';
		if ( ! is_readable( $script_path ) ) {
			return '';
		}

		$contents = file_get_contents( $script_path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		if ( false === $contents || '' === $contents ) {
			return '';
		}

		return 'sha384-' . base64_encode( hash( 'sha384', $contents, true ) ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
	}

	/**
	 * Output AMP meta hash for the CTA tracker amp-script.
	 */
	private function output_amp_cta_path_script_hash() {
		$hash = $this->get_amp_cta_path_script_hash();
		if ( '' === $hash ) {
			return;
		}
		echo '<meta name="amp-script-src" content="' . esc_attr( $hash ) . '">' . "\n";
	}

	/**
	 * Render AMP amp-script CTA tracker in footer.
	 */
	public function render_amp_cta_path_tracker() {
		if ( ! $this->is_amp() ) {
			return;
		}

		$script_url = plugins_url( 'assets/js/cta-path-tracker.amp.js', __FILE__ );
		?>
		<amp-script layout="fixed-height" height="1" src="<?php echo esc_url( $script_url ); ?>"></amp-script>
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

		// Shortcode can be rendered from templates (not just post content), e.g. course templates.
		$should_enqueue = has_shortcode( $post_content, 'contact_form' ) || has_shortcode( $post_content, 'succeedlearn_course_form' );
		if ( ! $should_enqueue && function_exists( 'is_singular' ) && is_singular( 'lp_course' ) ) {
			$should_enqueue = true;
		}
		// Elementor / builders often store shortcodes outside classic post_content.
		if ( ! $should_enqueue && is_string( $post_content ) && ( false !== strpos( $post_content, 'contact_form' ) || false !== strpos( $post_content, 'succeedlearn_course_form' ) ) ) {
			$should_enqueue = true;
		}

		if ( $should_enqueue ) {
			$this->enqueue_form_assets();
		}
	}

	/**
	 * Front-end config shared by wp_localize_script and inline bootstrap.
	 *
	 * @return array
	 */
	private function get_form_front_config() {
		$recaptcha_site_key = '';
		if ( $this->is_recaptcha_enabled() && function_exists( 'succeedlearn_form_recaptcha_get_site_key' ) ) {
			$recaptcha_site_key = succeedlearn_form_recaptcha_get_site_key();
		}

		return array(
			'ajaxUrl'          => admin_url( 'admin-ajax.php' ),
			'nonce'            => wp_create_nonce( 'scf_submit' ),
			'recaptchaSiteKey' => $recaptcha_site_key,
			'recaptchaAction'  => 'scf_submit',
			'minMessageLength' => $this->get_min_message_length(),
			'messages'         => array(
				'success'         => __( 'Thank you! Our team will contact you soon.', 'contact-form' ),
				'error'           => __( 'Something went wrong. Please try again.', 'contact-form' ),
				'privacy'         => __( 'You must accept the privacy policy.', 'contact-form' ),
				'bot'             => __( 'Bot detected. Submission rejected.', 'contact-form' ),
				'messageTooShort' => __( 'Please enter a longer message.', 'contact-form' ),
			),
			'intlTel'          => array(
				'initialCountry'     => 'us',
				'countrySearch'      => true,
				'preferredCountries' => array( 'us', 'gb' ),
			),
			'assets'           => array(
				'css'        => plugins_url( 'assets/css/form.css', __FILE__ ),
				'js'         => plugins_url( 'assets/js/form.js', __FILE__ ),
				'ctaTracker' => plugins_url( 'assets/js/cta-path-tracker.js', __FILE__ ),
				'version'    => self::VERSION,
			),
			'pageSegment'      => $this->get_page_journey_segment(),
		);
	}

	/**
	 * Enqueue front-end form CSS/JS (safe to call from shortcode render).
	 */
	private function enqueue_form_assets() {
		if ( $this->is_amp() ) {
			return;
		}

		$this->enqueue_cta_path_tracker();

		$config             = $this->get_form_front_config();
		$recaptcha_site_key = $config['recaptchaSiteKey'];
		$form_script_deps   = array( 'scf-cta-path-tracker' );

		$form_css_path = plugin_dir_path( __FILE__ ) . 'assets/css/form.css';
		$form_css_ver  = file_exists( $form_css_path ) ? (string) filemtime( $form_css_path ) : self::VERSION;

		wp_enqueue_style(
			'scf-form',
			$config['assets']['css'],
			array(),
			$form_css_ver
		);

		// Enqueue reCAPTCHA v3 if enabled (must load before form.js).
		if ( ! empty( $recaptcha_site_key ) ) {
			wp_enqueue_script(
				'google-recaptcha',
				'https://www.google.com/recaptcha/api.js?render=' . rawurlencode( $recaptcha_site_key ),
				array(),
				null,
				true
			);
			$form_script_deps[] = 'google-recaptcha';
		}

		wp_enqueue_script(
			'scf-form',
			$config['assets']['js'],
			$form_script_deps,
			self::VERSION,
			true
		);

		wp_localize_script( 'scf-form', 'SCF_FORM', $config );
	}

	/**
	 * Inline bootstrap so the form still works when optimizers strip enqueued assets.
	 */
	private function render_form_asset_bootstrap() {
		if ( $this->is_amp() ) {
			return;
		}

		$config = $this->get_form_front_config();
		?>
		<script>
		(function () {
			if (!window.SCF_FORM) {
				window.SCF_FORM = <?php echo wp_json_encode( $config ); ?>;
			}
			var assets = (window.SCF_FORM && window.SCF_FORM.assets) || {};
			var cssUrl = assets.css || '';
			var jsUrl = assets.js || '';
			var ctaTrackerUrl = assets.ctaTracker || '';
			var version = assets.version || '';
			var siteKey = window.SCF_FORM.recaptchaSiteKey || '';
			var pageSegment = window.SCF_FORM.pageSegment || '';

			if (pageSegment && !window.SCF_CTA_PATH_CONFIG) {
				window.SCF_CTA_PATH_CONFIG = { pageSegment: pageSegment };
			}

			function hasStylesheet(url) {
				return !!document.querySelector('link[href*="form.css"]');
			}
			function hasScript(url) {
				if (!url) return false;
				return !!document.querySelector('script[src*="assets/js/' + url.split('/assets/js/').pop().split('?')[0] + '"]');
			}
			function hasCtaTracker() {
				return !!window.SCF_CTA_PATH || hasScript(ctaTrackerUrl);
			}
			function loadCss(url) {
				if (!url || hasStylesheet(url)) return;
				var link = document.createElement('link');
				link.rel = 'stylesheet';
				link.href = url + (version ? '?ver=' + encodeURIComponent(version) : '');
				document.head.appendChild(link);
			}
			function loadScript(url, onload) {
				if (!url) {
					if (onload) onload();
					return;
				}
				var existing = document.querySelector('script[src*="' + url.split('?')[0].replace(/"/g, '') + '"]');
				if (existing) {
					if (onload) onload();
					return;
				}
				var script = document.createElement('script');
				script.src = url;
				script.async = true;
				if (onload) script.onload = onload;
				document.head.appendChild(script);
			}
			function initForms() {
				if (typeof window.scfInitContactForms === 'function') {
					window.scfInitContactForms();
				}
			}
			function bootFormJs() {
				if (hasScript(jsUrl) && typeof window.scfInitContactForms === 'function') {
					initForms();
					return;
				}
				loadScript(jsUrl + (version ? '?ver=' + encodeURIComponent(version) : ''), initForms);
			}
			function bootCtaTracker(next) {
				if (hasCtaTracker()) {
					if (next) next();
					return;
				}
				loadScript(
					ctaTrackerUrl + (version ? '?ver=' + encodeURIComponent(version) : ''),
					function () {
						if (next) next();
					}
				);
			}

			loadCss(cssUrl);

			function boot() {
				var afterTracker = function () {
					if (siteKey && typeof window.grecaptcha === 'undefined') {
						loadScript(
							'https://www.google.com/recaptcha/api.js?render=' + encodeURIComponent(siteKey),
							bootFormJs
						);
						return;
					}
					bootFormJs();
				};

				if (ctaTrackerUrl) {
					bootCtaTracker(afterTracker);
					return;
				}
				afterTracker();
			}

			if (document.readyState === 'loading') {
				document.addEventListener('DOMContentLoaded', boot);
			} else {
				boot();
			}
		})();
		</script>
		<?php
	}

	/**
	 * Minimum message length to accept for submissions.
	 *
	 * @return int
	 */
	private function get_min_message_length() {
		$settings = get_option( self::OPTION_KEY, array() );
		$min = isset( $settings['min_message_length'] ) ? absint( $settings['min_message_length'] ) : self::DEFAULT_MIN_MESSAGE_LENGTH;
		return max( 1, $min );
	}

	/**
	 * Check if reCAPTCHA v3 is configured.
	 *
	 * @return bool
	 */
	private function is_recaptcha_enabled() {
		if ( $this->is_admin_email_test_mode() ) {
			return false;
		}

		return function_exists( 'succeedlearn_form_recaptcha_is_enabled' ) && succeedlearn_form_recaptcha_is_enabled();
	}

	/**
	 * Check if current page is AMP.
	 *
	 * @return bool
	 */
	private function is_amp() {
		if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() ) {
			return true;
		}
		// Check for AMP plugin
		if ( function_exists( 'is_amp_endpoint' ) ) {
			return is_amp_endpoint();
		}
		if ( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() ) {
			return true;
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
	 * Detect AMP form submissions (page render or AJAX/XHR).
	 *
	 * @return bool
	 */
	private function is_amp_form_request() {
		if ( $this->is_amp() ) {
			return true;
		}
		if ( isset( $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) && 'true' === $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) {
			return true;
		}
		if ( isset( $_SERVER['HTTP_ORIGIN'] ) && false !== strpos( (string) $_SERVER['HTTP_ORIGIN'], 'cdn.ampproject.org' ) ) {
			return true;
		}
		if ( isset( $_GET['__amp_source_origin'] ) || isset( $_REQUEST['__amp_source_origin'] ) ) {
			return true;
		}
		if (
			isset( $_POST['action'], $_SERVER['REQUEST_URI'] )
			&& 'scf_submit_form' === $_POST['action']
			&& false !== strpos( (string) $_SERVER['REQUEST_URI'], '/amp' )
		) {
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

		return apply_filters( 'scf_source_tag', $tag, $path, $page_url );
	}

	/**
	 * Sanitize client-provided CTA journey path.
	 *
	 * @param string $raw Raw custom_lead_path from POST.
	 * @return string
	 */
	private function sanitize_custom_lead_path( $raw ) {
		$raw = sanitize_text_field( (string) $raw );
		if ( '' === $raw ) {
			return '';
		}

		$segments = explode( '>', $raw );
		$valid    = array();

		foreach ( $segments as $segment ) {
			$segment = strtolower( trim( (string) $segment ) );
			if ( '' === $segment ) {
				continue;
			}
			if ( strlen( $segment ) > self::CUSTOM_LEAD_PATH_SEGMENT_MAX_LENGTH ) {
				$segment = substr( $segment, 0, self::CUSTOM_LEAD_PATH_SEGMENT_MAX_LENGTH );
			}
			if ( ! preg_match( '/^[a-z0-9_-]+$/', $segment ) ) {
				continue;
			}
			$valid[] = $segment;
		}

		if ( empty( $valid ) ) {
			return '';
		}

		$path = implode( '>', $valid );
		if ( strlen( $path ) > self::CUSTOM_LEAD_PATH_MAX_LENGTH ) {
			$path = substr( $path, 0, self::CUSTOM_LEAD_PATH_MAX_LENGTH );
		}

		return $path;
	}

	/**
	 * Human-readable CTA journey for emails and admin UI.
	 *
	 * @param string $path Stored custom_lead_path value.
	 * @return string Empty when no path segments exist.
	 */
	private function format_custom_lead_path_display( $path ) {
		$path = trim( (string) $path );
		if ( '' === $path ) {
			return '';
		}

		$segments = array_filter(
			array_map(
				static function ( $segment ) {
					return trim( (string) $segment );
				},
				explode( '>', $path )
			)
		);

		if ( empty( $segments ) ) {
			return '';
		}

		$labels = array_map( array( $this, 'format_journey_segment_label' ), $segments );

		return implode( ' → ', $labels );
	}

	/**
	 * Convert one stored journey segment into a readable label.
	 *
	 * @param string $segment Raw segment from custom_lead_path.
	 * @return string
	 */
	private function format_journey_segment_label( $segment ) {
		$segment = strtolower( trim( (string) $segment ) );
		if ( '' === $segment ) {
			return '';
		}

		$known_cta_labels = array(
			'home'          => __( 'Homepage', 'contact-form' ),
			'courses'       => __( 'Courses', 'contact-form' ),
			'blog'          => __( 'Blog', 'contact-form' ),
			'search'        => __( 'Search', 'contact-form' ),
			'404'           => __( '404 Page', 'contact-form' ),
			'hero-demo'     => __( 'Home — Book Demo', 'contact-form' ),
			'about-contact' => __( 'About — Get in Touch', 'contact-form' ),
			'fcp-demo'      => __( 'FCP — Book Demo', 'contact-form' ),
			'clients-contact' => __( 'Clients — Talk to Us', 'contact-form' ),
		);

		if ( isset( $known_cta_labels[ $segment ] ) ) {
			return $known_cta_labels[ $segment ];
		}

		if ( 0 === strpos( $segment, 'page-' ) ) {
			$slug = substr( $segment, 5 );
			if ( '' !== $slug ) {
				$page = get_page_by_path( $slug );
				if ( $page instanceof WP_Post ) {
					return get_the_title( $page );
				}
				return ucwords( str_replace( '-', ' ', $slug ) );
			}
		}

		if ( 0 === strpos( $segment, 'course-' ) ) {
			$slug = substr( $segment, 7 );
			if ( '' !== $slug ) {
				$course = get_page_by_path( $slug, OBJECT, 'lp_course' );
				if ( $course instanceof WP_Post ) {
					return get_the_title( $course );
				}
				return ucwords( str_replace( '-', ' ', $slug ) );
			}
		}

		if ( 0 === strpos( $segment, 'blog-' ) ) {
			$slug = substr( $segment, 5 );
			if ( '' !== $slug ) {
				$post = get_page_by_path( $slug, OBJECT, 'post' );
				if ( $post instanceof WP_Post ) {
					return sprintf(
						/* translators: %s: blog post title */
						__( 'Blog — %s', 'contact-form' ),
						get_the_title( $post )
					);
				}
				return sprintf(
					/* translators: %s: blog post slug */
					__( 'Blog — %s', 'contact-form' ),
					ucwords( str_replace( '-', ' ', $slug ) )
				);
			}
		}

		$humanized = ucwords( str_replace( array( '-', '_' ), ' ', $segment ) );

		return (string) apply_filters( 'scf_journey_segment_label', $humanized, $segment );
	}

	/**
	 * Display label for utm_source in admin/CSV (empty → direct).
	 *
	 * @param string $utm_source Raw stored value.
	 * @return string
	 */
	private function format_utm_source_display( $utm_source ) {
		$utm_source = trim( (string) $utm_source );
		return '' !== $utm_source ? $utm_source : 'direct';
	}

	/**
	 * Infer traffic source from a referrer host (google, linkedin, etc.).
	 *
	 * @param string $ref_host Host only, lowercased.
	 * @return string Empty if unknown.
	 */
	private function infer_utm_source_from_host( $ref_host ) {
		$ref_host = strtolower( trim( (string) $ref_host ) );
		if ( '' === $ref_host ) {
			return '';
		}

		$site_host = wp_parse_url( home_url(), PHP_URL_HOST );
		$site_host = is_string( $site_host ) ? strtolower( $site_host ) : '';
		if ( '' !== $site_host && ( $ref_host === $site_host || false !== strpos( $ref_host, $site_host ) ) ) {
			return '';
		}

		if ( false !== strpos( $ref_host, 'google.' ) || 0 === strpos( $ref_host, 'google' ) ) {
			return 'google';
		}
		if ( false !== strpos( $ref_host, 'bing.' ) ) {
			return 'bing';
		}
		if ( false !== strpos( $ref_host, 'yahoo.' ) ) {
			return 'yahoo';
		}
		if ( false !== strpos( $ref_host, 'linkedin.' ) || false !== strpos( $ref_host, 'lnkd.' ) ) {
			return 'linkedin';
		}
		if ( false !== strpos( $ref_host, 'youtube.' ) || false !== strpos( $ref_host, 'youtu.be' ) ) {
			return 'youtube';
		}
		if ( false !== strpos( $ref_host, 'facebook.' ) || false !== strpos( $ref_host, 'fb.' ) || false !== strpos( $ref_host, 'fb.com' ) ) {
			return 'facebook';
		}
		if ( false !== strpos( $ref_host, 'instagram.' ) ) {
			return 'instagram';
		}
		if ( false !== strpos( $ref_host, 'twitter.' ) || false !== strpos( $ref_host, 't.co' ) || false !== strpos( $ref_host, 'x.com' ) ) {
			return 'twitter';
		}

		return '';
	}

	/**
	 * Resolve utm_source from POST, page URL, HandL cookies, and referrer.
	 *
	 * @param string $utm_source Current candidate.
	 * @param string $page_url   Submitted page URL.
	 * @return string Never empty — falls back to "direct".
	 */
	private function resolve_utm_source( $utm_source, $page_url = '' ) {
		$utm_source = sanitize_text_field( (string) $utm_source );

		if ( '' === $utm_source && ! empty( $page_url ) ) {
			$parsed = wp_parse_url( $page_url );
			if ( ! empty( $parsed['query'] ) ) {
				parse_str( $parsed['query'], $params );
				$utm_source = sanitize_text_field( $params['utm_source'] ?? '' );
			}
		}

		// HandL UTM Grabber persists first-touch params in cookies.
		if ( '' === $utm_source && ! empty( $_COOKIE['utm_source'] ) ) {
			$utm_source = sanitize_text_field( wp_unslash( $_COOKIE['utm_source'] ) );
		}

		if ( '' === $utm_source ) {
			$ref_candidates = array(
				isset( $_COOKIE['handl_original_ref'] ) ? wp_unslash( $_COOKIE['handl_original_ref'] ) : '',
				isset( $_COOKIE['handl_ref'] ) ? wp_unslash( $_COOKIE['handl_ref'] ) : '',
				isset( $_SERVER['HTTP_REFERER'] ) ? wp_unslash( $_SERVER['HTTP_REFERER'] ) : '',
			);
			foreach ( $ref_candidates as $ref_url ) {
				$ref_url = esc_url_raw( (string) $ref_url );
				if ( '' === $ref_url ) {
					continue;
				}
				$parsed_ref = wp_parse_url( $ref_url );
				$host       = ! empty( $parsed_ref['host'] ) ? strtolower( (string) $parsed_ref['host'] ) : '';
				$inferred   = $this->infer_utm_source_from_host( $host );
				if ( '' !== $inferred ) {
					$utm_source = $inferred;
					break;
				}
			}
		}

		if ( '' === $utm_source ) {
			$utm_source = 'direct';
		}

		return $utm_source;
	}

	/**
	 * Append stored UTM values to page_url when the submitted URL is clean.
	 *
	 * @param string               $page_url Page URL from the form.
	 * @param array<string,string> $utm      Resolved UTM values.
	 * @return string
	 */
	private function enrich_page_url_with_utm( $page_url, array $utm ) {
		$page_url = trim( (string) $page_url );
		if ( '' === $page_url ) {
			return '';
		}

		$parsed = wp_parse_url( $page_url );
		if ( empty( $parsed['scheme'] ) || empty( $parsed['host'] ) ) {
			return esc_url_raw( $page_url );
		}

		$query = array();
		if ( ! empty( $parsed['query'] ) ) {
			parse_str( $parsed['query'], $query );
		}

		$utm_keys = array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid' );
		foreach ( $utm_keys as $key ) {
			if ( ! empty( $query[ $key ] ) ) {
				continue;
			}

			$value = sanitize_text_field( (string) ( $utm[ $key ] ?? '' ) );
			if ( '' === $value && ! empty( $_COOKIE[ $key ] ) ) {
				$value = sanitize_text_field( wp_unslash( $_COOKIE[ $key ] ) );
			}

			if ( '' === $value ) {
				continue;
			}

			if ( 'utm_source' === $key && 'direct' === $value ) {
				continue;
			}

			$query[ $key ] = $value;
		}

		$base = $parsed['scheme'] . '://' . $parsed['host'];
		if ( ! empty( $parsed['port'] ) ) {
			$base .= ':' . $parsed['port'];
		}
		$base .= isset( $parsed['path'] ) ? $parsed['path'] : '/';

		if ( empty( $query ) ) {
			return esc_url_raw( $base );
		}

		return esc_url_raw( $base . '?' . http_build_query( $query ) );
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
	public function render_form( $atts = array() ) {
		$atts = shortcode_atts(
			array(
				'form_variant' => 'default',
				'title'        => '',
			),
			$atts,
			'contact_form'
		);
		$form_variant = 'course' === $atts['form_variant'] ? 'course' : 'default';
		$is_course_form = 'course' === $form_variant;
		$form_title = '' !== trim( (string) $atts['title'] )
			? sanitize_text_field( $atts['title'] )
			: ( $is_course_form ? __( 'Request a Demo', 'contact-form' ) : '' );

		// Render AMP form if on AMP page
		if ( $this->is_amp() ) {
			return $this->render_amp_form( $form_variant, $form_title );
		}

		// Ensure assets load even when shortcode is rendered from builders/templates.
		$this->enqueue_form_assets();
		
		ob_start();
		$privacy_url = get_privacy_policy_url();
		$min_message_length = $this->get_min_message_length();
		
		$source_tag = $this->determine_source_tag();
		$recaptcha_enabled = $this->is_recaptcha_enabled();
		
		// Generate server-side form token
		$form_token = $this->generate_form_token();
		
		// Generate random honeypot field names to make them harder to detect
		$honeypot_names = array(
			'website' => 'website_' . wp_generate_password( 6, false ),
			'company' => 'company_' . wp_generate_password( 6, false ),
			'url' => 'url_' . wp_generate_password( 6, false ),
		);
		
		// Store honeypot names in transient for validation (match form token lifetime).
		set_transient( 'scf_honeypots_' . md5( $form_token ), $honeypot_names, 10800 );
		$nonce = wp_create_nonce( 'scf_submit' );
		?>
		<div class="scf-form-wrap <?php echo esc_attr( $is_course_form ? 'scf-form-wrap-course' : '' ); ?>">
		<?php $this->render_inline_journey_recorder(); ?>
		<?php if ( $is_course_form && '' !== $form_title ) : ?>
			<h2 class="scf-form-title"><?php echo esc_html( $form_title ); ?></h2>
		<?php endif; ?>
		<form id="scf-form" class="scf-form" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" onsubmit="if(!this.getAttribute('data-scf-initialized')){event.preventDefault();return false;}">
			<input type="hidden" name="action" value="scf_submit_form" />
			<input type="hidden" name="nonce" value="<?php echo esc_attr( $nonce ); ?>" />
			<input type="hidden" name="scf_form_variant" value="<?php echo esc_attr( $form_variant ); ?>" />
			<input type="hidden" name="scf_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
			<input type="hidden" name="scf_form_time" value="<?php echo esc_attr( time() ); ?>" />
			<input type="hidden" name="source_tag" value="<?php echo esc_attr( $source_tag ); ?>" />
			
			<!-- Multiple Honeypot fields - hidden from users but bots will fill them -->
			<div class="scf-honeypot">
				<label for="scf-website"><?php esc_html_e( 'Website', 'contact-form' ); ?></label>
				<input type="text" id="scf-website" name="<?php echo esc_attr( $honeypot_names['website'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div class="scf-honeypot">
				<label for="scf-company"><?php esc_html_e( 'Company URL', 'contact-form' ); ?></label>
				<input type="text" id="scf-company" name="<?php echo esc_attr( $honeypot_names['company'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div class="scf-honeypot">
				<label for="scf-url"><?php esc_html_e( 'Your URL', 'contact-form' ); ?></label>
				<input type="url" id="scf-url" name="<?php echo esc_attr( $honeypot_names['url'] ); ?>" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div class="scf-field">
				<label for="scf-name"><?php esc_html_e( 'Full Name', 'contact-form' ); ?> <span class="scf-required">*</span></label>
				<input type="text" id="scf-name" name="name" required />
				<span class="scf-error-message"></span>
			</div>
			<div class="scf-field">
				<label for="scf-email"><?php esc_html_e( 'Work Email', 'contact-form' ); ?> <span class="scf-required">*</span></label>
				<input type="email" id="scf-email" name="email" required />
				<span class="scf-error-message"></span>
			</div>
				<?php if ( ! $is_course_form ) : ?>
				<div class="scf-field">
					<label><?php esc_html_e( 'Interested In', 'contact-form' ); ?> <span class="scf-required">*</span></label>
					<div class="scf-interest-group" role="group" aria-labelledby="scf-interest-group-label">
						<span id="scf-interest-group-label" class="screen-reader-text"><?php esc_html_e( 'Interested In', 'contact-form' ); ?></span>
						<?php foreach ( $this->get_course_interest_options() as $index => $interest_option ) : ?>
							<div class="scf-interest-option">
								<input type="checkbox" id="<?php echo esc_attr( 'scf-course-interest-' . $index ); ?>" name="course_interest[]" value="<?php echo esc_attr( $interest_option ); ?>" />
								<label for="<?php echo esc_attr( 'scf-course-interest-' . $index ); ?>"><?php echo esc_html( $interest_option ); ?></label>
							</div>
						<?php endforeach; ?>
					</div>
					<span class="scf-error-message"></span>
					<small class="scf-helper-text scf-other-course-hint is-hidden"><?php esc_html_e( 'If you selected Others, please mention your required course here.', 'contact-form' ); ?></small>
				</div>
				<?php endif; ?>
			<div class="scf-field">
		<label for="scf-message"><?php esc_html_e( 'Your Message', 'contact-form' ); ?></label>
		<textarea id="scf-message" name="message" rows="3" minlength="<?php echo esc_attr( $min_message_length ); ?>"></textarea>
		<span class="scf-error-message"></span>
			</div>
			<div class="scf-field scf-checkbox">
				<input type="checkbox" id="scf-privacy" name="privacy" value="1" required />
				<label for="scf-privacy">
					<?php
					printf(
						wp_kses(
							/* translators: %s privacy policy url */
							__( 'I Accept <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'contact-form' ),
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
					<span class="scf-required"> *</span>
				</label>
				<span class="scf-error-message"></span>
			</div>
			
			<?php if ( $recaptcha_enabled ) : ?>
			<p class="scf-recaptcha-notice">
				<?php esc_html_e( 'This site is protected by reCAPTCHA.', 'contact-form' ); ?>
			</p>
			<?php endif; ?>
			
			<input type="hidden" name="utm_source" />
			<input type="hidden" name="utm_medium" />
			<input type="hidden" name="utm_campaign" />
			<input type="hidden" name="utm_term" />
			<input type="hidden" name="utm_content" />
			<input type="hidden" name="page_url" />
			<input type="hidden" name="custom_lead_path" value="" />
			<button type="submit" class="scf-submit">
				<span class="scf-submit-text"><?php esc_html_e( 'Submit', 'contact-form' ); ?></span>
				<span class="scf-submit-loading" style="display: none;">
					<span class="scf-spinner"></span>
					<?php esc_html_e( 'Submitting...', 'contact-form' ); ?>
				</span>
			</button>
			<p class="scf-response" role="status" aria-live="polite" hidden></p>
		</form>
		<?php $this->render_form_asset_bootstrap(); ?>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Render dedicated course form shortcode.
	 *
	 * @return string
	 */
	public function render_course_form( $atts = array() ) {
		$atts = is_array( $atts ) ? $atts : array();
		$atts['form_variant'] = 'course';
		return $this->render_form( $atts );
	}

	/**
	 * Render AMP-compatible form.
	 *
	 * @param string $form_variant Form variant.
	 * @param string $form_title   Optional heading above the form.
	 * @return string
	 */
	private function render_amp_form( $form_variant = 'default', $form_title = '' ) {
		ob_start();
		$is_course_form = 'course' === $form_variant;
		if ( $is_course_form && '' === trim( (string) $form_title ) ) {
			$form_title = __( 'Request a Demo', 'contact-form' );
		}
		$privacy_url = get_privacy_policy_url();
		$min_message_length = $this->get_min_message_length();
		$ajax_url = admin_url( 'admin-ajax.php' );
		$nonce = wp_create_nonce( 'scf_submit' );
		$current_url = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$source_tag = $this->determine_source_tag( $current_url );
		
		// Generate server-side form token
		$form_token = $this->generate_form_token();
		?>
		<!-- AMP form state for button text and form time -->
		<amp-state id="buttonState">
			<script type="application/json">{"text":"<?php echo esc_js( __( 'Submit', 'contact-form' ) ); ?>","loading":false}</script>
		</amp-state>
		<amp-state id="formTime">
			<script type="application/json"><?php echo esc_js( time() ); ?></script>
		</amp-state>
		<amp-state id="errorState">
			<script type="application/json">{"message":"<?php echo esc_js( __( 'Please check your information and try again.', 'contact-form' ) ); ?>"}</script>
		</amp-state>
		<amp-state id="courseState">
			<script type="application/json">{"showOthers":false}</script>
		</amp-state>
		
		<div class="scf-form-wrap <?php echo esc_attr( $is_course_form ? 'scf-form-wrap-course' : '' ); ?>">
		<?php if ( $is_course_form && '' !== $form_title ) : ?>
			<h2 class="scf-form-title"><?php echo esc_html( $form_title ); ?></h2>
		<?php endif; ?>
		<form 
			id="scfForm" 
			class="scf-form" 
			method="post" 
			action-xhr="<?php echo esc_url( $ajax_url ); ?>" 
			target="_top" 
			on="submit:AMP.setState({buttonState:{text:'<?php echo esc_js( __( 'Submitting...', 'contact-form' ) ); ?>',loading:true}});
				submit-success:AMP.setState({buttonState:{text:'<?php echo esc_js( __( 'Submit', 'contact-form' ) ); ?>',loading:false},formTime:<?php echo esc_js( time() ); ?>}),scfForm.clear,<?php echo esc_attr( $is_course_form ? 'course-success-popup' : 'success-popup' ); ?>.open;
				submit-error:AMP.setState({buttonState:{text:'<?php echo esc_js( __( 'Submit', 'contact-form' ) ); ?>',loading:false},errorState:{message:(event.response && event.response.message)?event.response.message:'<?php echo esc_js( __( 'Please check your information and try again.', 'contact-form' ) ); ?>'}}),<?php echo esc_attr( $is_course_form ? 'course-error-popup' : 'error-popup' ); ?>.open;"
		>
			<input type="hidden" name="action" value="scf_submit_form" />
			<input type="hidden" name="scf_form_variant" value="<?php echo esc_attr( $form_variant ); ?>" />
			<input type="hidden" name="nonce" value="<?php echo esc_attr( $nonce ); ?>" />
			<input type="hidden" name="scf_form_token" value="<?php echo esc_attr( $form_token ); ?>" />
			<input type="hidden" name="scf_form_time" id="scf-form-time" [value]="formTime || <?php echo esc_js( time() ); ?>" value="<?php echo esc_attr( time() ); ?>" />
			
			<!-- Multiple Honeypot fields - hidden from users but bots will fill them -->
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="scf-website-amp"><?php esc_html_e( 'Website', 'contact-form' ); ?></label>
				<input type="text" id="scf-website-amp" name="website" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="scf-company-amp"><?php esc_html_e( 'Company URL', 'contact-form' ); ?></label>
				<input type="text" id="scf-company-amp" name="company" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			<div style="position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; opacity: 0; pointer-events: none; visibility: hidden;">
				<label for="scf-url-amp"><?php esc_html_e( 'Your URL', 'contact-form' ); ?></label>
				<input type="url" id="scf-url-amp" name="url" tabindex="-1" autocomplete="new-password" aria-hidden="true" data-lpignore="true" data-form-type="other" inputmode="none" />
			</div>
			
			<div class="scf-field">
				<label for="scf-name"><?php esc_html_e( 'Full Name', 'contact-form' ); ?> <span class="scf-required">*</span></label>
				<input type="text" id="scf-name" name="name" required />
				<span visible-when-invalid="valueMissing" validation-for="scf-name" class="scf-error-message"><?php esc_html_e( 'Please fill out this field.', 'contact-form' ); ?></span>
			</div>
			<div class="scf-field">
				<label for="scf-email"><?php esc_html_e( 'Work Email', 'contact-form' ); ?> <span class="scf-required">*</span></label>
				<input type="email" id="scf-email" name="email" required />
				<span visible-when-invalid="valueMissing" validation-for="scf-email" class="scf-error-message"><?php esc_html_e( 'Please fill out this field.', 'contact-form' ); ?></span>
				<span visible-when-invalid="typeMismatch" validation-for="scf-email" class="scf-error-message"><?php esc_html_e( 'Please enter a valid email address.', 'contact-form' ); ?></span>
			</div>
			<?php if ( ! $is_course_form ) : ?>
			<div class="scf-field">
				<label><?php esc_html_e( 'Interested In', 'contact-form' ); ?> <span class="scf-required">*</span></label>
				<div class="scf-interest-group" role="group" aria-labelledby="scf-interest-group-label-amp">
					<span id="scf-interest-group-label-amp" class="screen-reader-text"><?php esc_html_e( 'Interested In', 'contact-form' ); ?></span>
					<?php foreach ( $this->get_course_interest_options() as $index => $interest_option ) : ?>
						<?php $is_others = 'Others' === $interest_option; ?>
						<div class="scf-interest-option">
							<?php if ( $is_others ) : ?>
								<input type="checkbox" id="<?php echo esc_attr( 'scf-course-interest-amp-' . $index ); ?>" name="course_interest[]" value="<?php echo esc_attr( $interest_option ); ?>" on="change:AMP.setState({courseState:{showOthers:event.checked}})" />
							<?php else : ?>
								<input type="checkbox" id="<?php echo esc_attr( 'scf-course-interest-amp-' . $index ); ?>" name="course_interest[]" value="<?php echo esc_attr( $interest_option ); ?>" />
							<?php endif; ?>
							<label for="<?php echo esc_attr( 'scf-course-interest-amp-' . $index ); ?>"><?php echo esc_html( $interest_option ); ?></label>
						</div>
					<?php endforeach; ?>
				</div>
				<small class="scf-helper-text scf-other-course-hint" hidden [hidden]="!courseState.showOthers"><?php esc_html_e( 'If you selected Others, please mention your required course here.', 'contact-form' ); ?></small>
			</div>
			<?php endif; ?>

			<div class="scf-field">
			<label for="scf-message"><?php esc_html_e( 'Your Message', 'contact-form' ); ?></label>
			<textarea id="scf-message" name="message" rows="3" minlength="<?php echo esc_attr( $min_message_length ); ?>"></textarea>
			<span visible-when-invalid="tooShort" validation-for="scf-message" class="scf-error-message"><?php echo esc_html( sprintf( __( 'Please lengthen this text to %d characters or more.', 'contact-form' ), $min_message_length ) ); ?></span>
		</div>
			<div class="scf-field scf-checkbox" style="margin-bottom:0;">
				<input type="checkbox" id="scf-privacy" name="privacy" value="1" required />
				<label for="scf-privacy" style="margin-bottom:0;">
					<?php
					printf(
						wp_kses(
							/* translators: %s privacy policy url */
							__( 'I Accept <a href="%s" target="_blank" rel="noopener">privacy policy</a>', 'contact-form' ),
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
					<span class="scf-required"> *</span>
				</label>
				<span visible-when-invalid="valueMissing" validation-for="scf-privacy" class="scf-error-message"><?php esc_html_e( 'Please fill out this field.', 'contact-form' ); ?></span>
			</div>
			
			<input type="hidden" name="utm_source" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_source'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_medium" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_medium'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_campaign" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_campaign'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_term" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_term'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="utm_content" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['utm_content'] ?? '' ) ) ); ?>" />
			<input type="hidden" name="page_url" value="<?php echo esc_attr( esc_url_raw( $current_url ) ); ?>" />
			<input type="hidden" name="source_tag" value="<?php echo esc_attr( $source_tag ); ?>" />
			<input type="hidden" name="custom_lead_path" id="scf-custom-lead-path" value="" />
			
			<button type="submit" class="scf-submit" [disabled]="buttonState.loading">
				<span [text]="buttonState.text"><?php esc_html_e( 'Submit', 'contact-form' ); ?></span>
			</button>
			
		</form>
		</div>
		
		<!-- Success Lightbox -->
		<amp-lightbox id="<?php echo esc_attr( $is_course_form ? 'course-success-popup' : 'success-popup' ); ?>" layout="nodisplay" on="close: scfForm.clear">
			<div class="scf-lightbox-overlay">
				<div class="scf-lightbox-content scf-lightbox-success <?php echo esc_attr( $is_course_form ? 'scf-lightbox-course-success' : '' ); ?>">
					<div class="scf-lightbox-icon"><?php echo esc_html( $is_course_form ? '📚' : '🎉' ); ?></div>
					<div class="scf-lightbox-title"><?php esc_html_e( 'Submitted Successfully', 'contact-form' ); ?></div>
					<div class="scf-lightbox-message"><?php esc_html_e( 'Thank you! Our team will contact you soon.', 'contact-form' ); ?></div>
					<button on="tap:<?php echo esc_attr( $is_course_form ? 'course-success-popup' : 'success-popup' ); ?>.close" class="scf-lightbox-button">
						<?php esc_html_e( 'Close', 'contact-form' ); ?>
					</button>
				</div>
			</div>
		</amp-lightbox>
		
		<!-- Error Lightbox -->
		<amp-lightbox id="<?php echo esc_attr( $is_course_form ? 'course-error-popup' : 'error-popup' ); ?>" layout="nodisplay">
			<div class="scf-lightbox-overlay">
				<div class="scf-lightbox-content scf-lightbox-error">
					<div class="scf-lightbox-icon">❌</div>
					<div class="scf-lightbox-title"><?php esc_html_e( 'Submission Failed', 'contact-form' ); ?></div>
					<div class="scf-lightbox-message" [text]="errorState.message"><?php esc_html_e( 'Please check your information and try again.', 'contact-form' ); ?></div>
					<button on="tap:<?php echo esc_attr( $is_course_form ? 'course-error-popup' : 'error-popup' ); ?>.close" class="scf-lightbox-button">
						<?php esc_html_e( 'Close', 'contact-form' ); ?>
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
		$test_mode = $this->is_admin_email_test_mode();

		// 0. Verify server-side form token FIRST (but don't delete it yet)
		$form_token = sanitize_text_field( wp_unslash( $_POST['scf_form_token'] ?? '' ) );
		if ( ! $test_mode && ! $this->verify_form_token( $form_token, false ) ) {
			return true; // Invalid or missing token
		}
		
		// Get honeypot field names from transient (don't delete yet - only on success)
		$honeypot_key = ! empty( $form_token ) ? 'scf_honeypots_' . md5( $form_token ) : '';
		$honeypot_names = ! empty( $honeypot_key ) ? get_transient( $honeypot_key ) : false;
		if ( $honeypot_names && is_array( $honeypot_names ) ) {
			// Check all honeypot fields
			foreach ( $honeypot_names as $key => $field_name ) {
				$honeypot_value = sanitize_text_field( wp_unslash( $_POST[ $field_name ] ?? '' ) );
				if ( ! empty( $honeypot_value ) ) {
					// Bot filled a honeypot field - delete transient and token
					if ( ! empty( $honeypot_key ) ) {
						delete_transient( $honeypot_key );
					}
					if ( ! empty( $form_token ) ) {
						$this->verify_form_token( $form_token, true );
					}
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

		// In admin test mode we prioritize reliable delivery over strict anti-bot heuristics.
		// Honeypot checks above still run, but timing / UA / DNS / pattern checks are skipped.
		if ( $test_mode ) {
			return false;
		}

		// 1. Detect AMP submissions (reCAPTCHA is not enforced on AMP).
		$is_amp_submission = $this->is_amp_form_request();

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
			$rate_limit_key = 'scf_rate_limit_' . md5( $user_ip );
			$last_submission = get_transient( $rate_limit_key );
			
			if ( false !== $last_submission ) {
				// Same IP submitted within last 30 seconds - likely a bot
				// Log for debugging (remove in production if needed)
				error_log( 'STCF Rate Limit: IP ' . $user_ip . ' blocked. Last submission: ' . $last_submission );
				return true;
			}
			// Note: Transient will be set AFTER successful submission, not here
		}

		// 5. Check time-based validation - if submitted too quickly, likely a bot
		$form_time = absint( $_POST['scf_form_time'] ?? 0 );
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

		// 7. Verify reCAPTCHA v3 if enabled (skipped for AMP and admin email test mode).
		// If reCAPTCHA fails to load or validate due to environment/config issues,
		// continue with layered anti-spam checks instead of hard-blocking submission.
		if ( $this->is_recaptcha_enabled() && ! $is_amp_submission ) {
			$recaptcha_token = sanitize_text_field( wp_unslash( $_POST['recaptcha_token'] ?? '' ) );
			if ( ! empty( $recaptcha_token ) && function_exists( 'succeedlearn_form_recaptcha_verify' ) ) {
				if ( ! succeedlearn_form_recaptcha_verify( $recaptcha_token, 'scf_submit', $this->get_user_ip() ) ) {
					if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
						error_log( 'SCF Form: reCAPTCHA verification failed; falling back to non-reCAPTCHA anti-spam checks.' );
					}
				}
			} elseif ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'SCF Form: reCAPTCHA token unavailable or verifier missing; falling back to non-reCAPTCHA anti-spam checks.' );
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
		$tmp_file = $tmp_dir . 'scf-weekly-report-' . wp_generate_password( 8, false ) . '.csv';
		
		// Ensure directory is writable
		if ( ! is_writable( $tmp_dir ) ) {
			error_log( 'SCF Weekly Report: Temp directory is not writable: ' . $tmp_dir );
			return;
		}

		$fh = fopen( $tmp_file, 'w' );
		if ( ! $fh ) {
			error_log( 'SCF Weekly Report: Failed to open file for writing: ' . $tmp_file );
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
				'Message',
				'Source Tag',
				'Lead Path',
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
						$row['message'],
						$row['source_tag'],
						$row['custom_lead_path'] ?? '',
						$this->format_utm_source_display( $row['utm_source'] ?? '' ),
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

		$recipient = apply_filters( 'scf_weekly_report_recipient', 'depakar@succeedtech.com' );
		$subject   = sprintf(
			__( 'Weekly Contact Form Report (%1$s - %2$s)', 'contact-form' ),
			$start_label,
			$end_label
		);

		$submission_count = count( $results );

		// Professional subject line
		if ( 0 === $submission_count ) {
			$subject = sprintf(
				__( 'Weekly Contact Form Report - No Submissions (%1$s - %2$s)', 'contact-form' ),
				$start_label,
				$end_label
			);
		} else {
			$subject = sprintf(
				__( 'Weekly Contact Form Report - %1$d Submission(s) (%2$s - %3$s)', 'contact-form' ),
				$submission_count,
				$start_label,
				$end_label
			);
		}

		// Professional email body
		$body = '<div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">';
		$body .= '<h2 style="color: #2563eb; margin-bottom: 20px;">' . esc_html__( 'Weekly Contact Form Report', 'contact-form' ) . '</h2>';
		
		$body .= '<p style="margin-bottom: 15px;">';
		$body .= sprintf(
			esc_html__( 'Report Period: %1$s to %2$s', 'contact-form' ),
			'<strong>' . esc_html( $start_label ) . '</strong>',
			'<strong>' . esc_html( $end_label ) . '</strong>'
		);
		$body .= '</p>';
		
		$body .= '<div style="background-color: #f8f9fa; padding: 15px; border-radius: 6px; margin-bottom: 20px;">';
		$body .= '<p style="margin: 0;">';
		$body .= sprintf(
			'<strong style="color: #2563eb;">%s:</strong> <span style="font-size: 18px; color: #15803d;">%d</span>',
			esc_html__( 'Total Submissions', 'contact-form' ),
			$submission_count
		);
		$body .= '</p>';
		$body .= '</div>';

		if ( 0 === $submission_count ) {
			$body .= '<div style="background-color: #fef3c7; border-left: 4px solid #f59e0b; padding: 20px; margin-bottom: 20px; border-radius: 6px;">';
			$body .= '<p style="margin: 0; color: #92400e; font-size: 16px; font-weight: 600;">';
			$body .= esc_html__( 'No form submissions in the past week.', 'contact-form' );
			$body .= '</p>';
			$body .= '</div>';
		} else {
			$body .= '<p style="margin-bottom: 15px;">';
			$body .= esc_html__( 'Please find the detailed submission data attached in the CSV file.', 'contact-form' );
			$body .= '</p>';
		}
		
		$body .= '<hr style="border: none; border-top: 1px solid #e5e7eb; margin: 25px 0;" />';
		$body .= '<p style="color: #9ca3af; font-size: 12px; margin: 0;">';
		$body .= esc_html__( 'This is an automated email from the Succeed Form Submissions system.', 'contact-form' );
		$body .= '</p>';
		$body .= '</div>';

		$headers = array( 'Content-Type: text/html; charset=UTF-8' );

		// Ensure file exists and is readable before sending
		if ( ! file_exists( $tmp_file ) || ! is_readable( $tmp_file ) ) {
			error_log( 'SCF Weekly Report: CSV file not found or not readable: ' . $tmp_file );
			@unlink( $tmp_file );
			return;
		}
		
		// Get file size for logging
		$file_size = filesize( $tmp_file );
		error_log( 'SCF Weekly Report: Sending email with attachment. File: ' . $tmp_file . ', Size: ' . $file_size . ' bytes' );

		$sent = wp_mail(
			$recipient,
			$subject,
			$body,
			$headers,
			array( $tmp_file )
		);
		
		error_log( 'SCF Weekly Report: wp_mail result: ' . ( $sent ? 'SUCCESS' : 'FAILED' ) );

		if ( ! $sent ) {
			$warning_recipient = apply_filters( 'scf_weekly_report_warning_recipient', get_option( 'admin_email' ) );
			if ( empty( $warning_recipient ) ) {
				$warning_recipient = $recipient;
			}

			$warning_subject = sprintf(
				__( 'Weekly report delivery failed (%1$s - %2$s)', 'contact-form' ),
				$start_label,
				$end_label
			);

			$warning_body = sprintf(
				__( "The weekly contact form report could not be delivered to %1\$s.\nPlease check the mail server logs and try sending the report manually.\n\nReport Period: %2\$s to %3\$s\nTotal Submissions: %4\$d", 'contact-form' ),
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
	 * Send response for both AMP and non-AMP (without exit - for email sending after response).
	 *
	 * @param string $message Response message.
	 * @param bool   $success Whether response is success.
	 * @param int    $status_code HTTP status code.
	 * @param bool   $exit Whether to exit after sending response.
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
		// AMP forms send requests with specific headers or from AMP pages
		$is_amp_request = $this->is_amp_form_request();
		
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
			// AMP cache submissions often come from https://cdn.ampproject.org (or an AMP viewer).
			// We must reflect the request Origin (when present) so the browser will allow AMP to read the response.
			$source_origin = home_url();
			$request_origin = isset( $_SERVER['HTTP_ORIGIN'] ) ? esc_url_raw( wp_unslash( $_SERVER['HTTP_ORIGIN'] ) ) : '';
			$allow_origin = $source_origin;
			if ( ! empty( $request_origin ) ) {
				// Allow AMP cache / AMP viewer origins and same-site origins.
				$parsed = wp_parse_url( $request_origin );
				$host = ! empty( $parsed['host'] ) ? strtolower( $parsed['host'] ) : '';
				$scheme = ! empty( $parsed['scheme'] ) ? strtolower( $parsed['scheme'] ) : '';
				$site_parsed = wp_parse_url( $source_origin );
				$site_host = ! empty( $site_parsed['host'] ) ? strtolower( $site_parsed['host'] ) : '';
				$is_amp_host = ( 'cdn.ampproject.org' === $host );
				if ( ! $is_amp_host && ! empty( $host ) ) {
					$suffix = '.ampproject.org';
					$is_amp_host = ( strlen( $host ) > strlen( $suffix ) && substr( $host, -strlen( $suffix ) ) === $suffix );
				}

				if ( ( 'https' === $scheme && $is_amp_host ) || ( ! empty( $site_host ) && $host === $site_host ) ) {
					$allow_origin = $request_origin;
				}
			}
			if ( ! headers_sent() ) {
				header( 'Content-Type: application/json; charset=utf-8' );
				header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $allow_origin ) );
				header( 'Access-Control-Allow-Credentials: true' );
				header( 'AMP-Access-Control-Allow-Source-Origin: ' . esc_url_raw( $source_origin ) );
				header( 'Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin' );
				header( 'Vary: Origin' );
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
			$payload = wp_json_encode( $response );
			if ( ! $exit && ! headers_sent() ) {
				header( 'Content-Length: ' . strlen( $payload ) );
				header( 'Connection: close' );
			}
			echo $payload;
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
			// Send response without exit so emails/ERP can continue after the browser gets success.
			$payload = $success
				? wp_json_encode( array( 'success' => true, 'data' => array( 'message' => $message ) ) )
				: wp_json_encode( array( 'success' => false, 'data' => array( 'message' => $message ) ) );

			// Drop any prior buffered output (notices/warnings) so the AJAX body is clean JSON.
			while ( ob_get_level() > 0 ) {
				ob_end_clean();
			}

			if ( ! headers_sent() ) {
				header( 'Content-Type: application/json; charset=utf-8' );
				header( 'Content-Length: ' . strlen( $payload ) );
				header( 'Connection: close' );
				http_response_code( $status_code );
			}
			echo $payload;
		}
	}

	/**
	 * Flush the HTTP response to the browser, then keep PHP running for background work.
	 */
	private function close_http_connection() {
		ignore_user_abort( true );

		if ( function_exists( 'session_write_close' ) ) {
			session_write_close();
		}

		if ( function_exists( 'apache_setenv' ) ) {
			@apache_setenv( 'no-gzip', '1' );
		}
		@ini_set( 'zlib.output_compression', '0' );
		@ini_set( 'implicit_flush', '1' );

		while ( ob_get_level() > 0 ) {
			ob_end_flush();
		}
		flush();

		if ( function_exists( 'fastcgi_finish_request' ) ) {
			fastcgi_finish_request();
		} elseif ( function_exists( 'litespeed_finish_request' ) ) {
			litespeed_finish_request();
		}

		// Catch any accidental output from mail/ERP plugins so it cannot corrupt the AJAX body.
		ob_start();

		if ( function_exists( 'set_time_limit' ) ) {
			@set_time_limit( 120 );
		}
	}

	/**
	 * Send admin/user emails and sync ERP after the client already received success.
	 *
	 * @param array $data Submission data.
	 * @param int   $submission_id Saved row ID.
	 */
	private function process_post_submission_tasks( $data, $submission_id = 0 ) {
		$debug_mode = defined( 'WP_DEBUG' ) && WP_DEBUG;

		if ( $debug_mode ) {
			error_log( 'SCF: Starting post-response tasks. Submission ID: ' . $submission_id );
		}

		try {
			$data['submission_id'] = absint( $submission_id );
			$form_variant          = sanitize_text_field( (string) ( $data['form_variant'] ?? 'default' ) );
			$data['scf_table']     = ( 'course' === $form_variant ) ? $this->get_course_table_name() : $this->get_table_name();
			$this->send_admin_email( $data );
			$this->send_user_email( $data );
			$this->send_to_erp( $data );

			if ( $debug_mode ) {
				error_log( 'SCF: Post-response tasks completed for submission ID: ' . $submission_id );
			}
		} catch ( Exception $e ) {
			if ( $debug_mode ) {
				error_log( 'SCF: Error in post-response tasks: ' . $e->getMessage() );
			}
		} catch ( Throwable $e ) {
			if ( $debug_mode ) {
				error_log( 'SCF: Fatal in post-response tasks: ' . $e->getMessage() );
			}
		} finally {
			while ( ob_get_level() > 0 ) {
				ob_end_clean();
			}
		}
	}

	/**
	 * Validate email and return specific error message if invalid.
	 *
	 * @param string $email Email address.
	 * @return string|false Error message if invalid, false if valid.
	 */
	private function validate_email_with_message( $email ) {
		if ( empty( $email ) ) {
			return __( 'Please enter a valid organizational email id.', 'contact-form' );
		}
		
		$email_parts = explode( '@', $email );
		if ( count( $email_parts ) !== 2 ) {
			return __( 'Please enter a valid organizational email id.', 'contact-form' );
		}
		
		$domain = strtolower( trim( $email_parts[1] ) );
		
		// Check if email format is valid
		if ( preg_match( '/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i', $email ) === 0 ) {
			return __( 'Please enter a valid organizational email id.', 'contact-form' );
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
			return __( 'Please enter an organizational email id.', 'contact-form' );
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
			return __( 'Please enter a valid organizational email id.', 'contact-form' );
		}
		
		// Check for test patterns in local part
		$local_part = strtolower( trim( $email_parts[0] ) );
		$test_patterns = array(
			'test', 'testing', 'tester', 'demo', 'sample', 'fake', 'dummy',
			'invalid', 'example', 'temp', 'temporary', 'spamtest', 'test123',
			'test1', 'test2', 'test3', 'demo1', 'sample1', 'fake1',
		);
		
		if ( in_array( $local_part, $test_patterns, true ) ) {
			return __( 'Please enter a valid organizational email id.', 'contact-form' );
		}
		
		if ( preg_match( '/^[0-9]+$/', $local_part ) || strlen( $local_part ) < 3 ) {
			return __( 'Please enter a valid organizational email id.', 'contact-form' );
		}
		
		if ( preg_match( '/^(test|demo|sample|fake|dummy|invalid|example|temp|temporary)[0-9]+$/', $local_part ) ) {
			return __( 'Please enter a valid organizational email id.', 'contact-form' );
		}
		
		// Check disposable emails
		if ( $this->is_disposable_email( $email ) ) {
			return __( 'Please enter a valid organizational email id.', 'contact-form' );
		}
		
		// Verify email domain: DNS resolution and MX records
		if ( ! $this->validate_email_domain( $email ) ) {
			return __( 'Please enter a valid organizational email id with a verified domain.', 'contact-form' );
		}
		
		// Note: SMTP email verification is disabled as it's unreliable and many servers block it
		// We rely on domain validation and disposable email checks instead
		// If you need strict email verification, enable it here (not recommended)
		// if ( ! $this->verify_email_exists( $email ) ) {
		// 	return __( 'The email address does not exist. Please enter a valid organizational email id.', 'contact-form' );
		// }
		
		return false; // Email is valid
	}

	/**
	 * Issue a fresh nonce + form token for cached pages.
	 * Called on form init so submissions still work when HTML was cached with a stale nonce.
	 */
	public function handle_refresh_form_security() {
		nocache_headers();

		$form_token = $this->generate_form_token();
		$honeypot_names = array(
			'website' => 'website_' . wp_generate_password( 6, false ),
			'company' => 'company_' . wp_generate_password( 6, false ),
			'url'     => 'url_' . wp_generate_password( 6, false ),
		);
		set_transient( 'scf_honeypots_' . md5( $form_token ), $honeypot_names, 10800 );

		wp_send_json_success(
			array(
				'nonce'          => wp_create_nonce( 'scf_submit' ),
				'formToken'      => $form_token,
				'formTime'       => time(),
				'honeypotNames'  => $honeypot_names,
			)
		);
	}

	/**
	 * Handle AJAX submissions.
	 */
	public function handle_form_submission() {
		// Enable error logging for debugging (remove in production if needed)
		$debug_mode = defined( 'WP_DEBUG' ) && WP_DEBUG;
		
		try {
			// Verify nonce (softened in admin test mode to avoid false negatives on cached/demo pages).
			$nonce_valid = isset( $_POST['nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'scf_submit' );
			if ( ! $nonce_valid && ! $this->is_admin_email_test_mode() ) {
				if ( $debug_mode ) {
					error_log( 'SCF Form: Nonce verification failed' );
				}
				$this->send_response( 
					__( 'Security check failed. Please refresh the page and try again.', 'contact-form' ),
					false,
					403
				);
				return;
			} elseif ( ! $nonce_valid && $debug_mode ) {
				error_log( 'SCF Form: Nonce verification skipped in admin email test mode.' );
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
			$rate_limit_key = 'scf_rate_limit_' . md5( $user_ip );
			$last_submission = get_transient( $rate_limit_key );
			
			// Check form token
			$form_token = sanitize_text_field( wp_unslash( $_POST['scf_form_token'] ?? '' ) );
			$is_invalid_token = empty( $form_token ) || ! $this->verify_form_token( $form_token, false );
			
			if ( $debug_mode && $is_invalid_token ) {
				error_log( 'SCF Form: Token validation failed. Token present: ' . ( ! empty( $form_token ) ? 'yes' : 'no' ) );
				if ( ! empty( $form_token ) ) {
					error_log( 'SCF Form: Token length: ' . strlen( $form_token ) );
				}
			}
			
			// Check time-based validation (increased to 3 hours to match token expiration)
			$form_time = absint( $_POST['scf_form_time'] ?? 0 );
			$time_elapsed = $form_time > 0 ? ( time() - $form_time ) : 0;
			$is_too_fast = $form_time > 0 && $time_elapsed < 5;
			$is_too_old = $form_time > 0 && $time_elapsed > 10800; // 3 hours
			
			// Provide clear error message for different failure scenarios
			if ( false !== $last_submission ) {
				$time_remaining = 30 - ( time() - $last_submission );
				$message = sprintf(
					__( 'You have recently submitted the form. Please wait %d seconds before submitting again to ensure we reduce spam. Thank you for your patience.', 'contact-form' ),
					max( 1, $time_remaining )
				);
			} elseif ( $is_invalid_token ) {
				$message = __( 'Your form session has expired. Please refresh the page to get a new form and try again.', 'contact-form' );
			} elseif ( $is_too_fast ) {
				$message = __( 'Please take your time to fill out the form properly.', 'contact-form' );
			} elseif ( $is_too_old ) {
				$message = __( 'This form session has expired. Please refresh the page and try again.', 'contact-form' );
			} else {
				$message = __( 'There was an issue with your submission. Please refresh the page and try again.', 'contact-form' );
			}

			$this->send_response( $message, false, 403 );
			return;
		}

		$name          = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
		$email         = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
		$organization  = sanitize_text_field( wp_unslash( $_POST['organization'] ?? '' ) );
		$form_variant  = sanitize_text_field( wp_unslash( $_POST['scf_form_variant'] ?? 'default' ) );
		$is_course_form = 'course' === $form_variant;
		$course_interest_values = $this->sanitize_course_interest_values( $_POST['course_interest'] ?? array() );
		$course_interest = $this->format_course_interest_string( $course_interest_values );
		$phone_country_code = sanitize_text_field( wp_unslash( $_POST['phone_country_code'] ?? '' ) );
		$phone_number = sanitize_text_field( wp_unslash( $_POST['phone_number'] ?? '' ) );
		$message       = wp_kses_post( wp_unslash( $_POST['message'] ?? '' ) );
		$min_message_length = $this->get_min_message_length();
		$privacy       = isset( $_POST['privacy'] );
		$page_url      = esc_url_raw( wp_unslash( $_POST['page_url'] ?? '' ) );
		$source_tag    = $this->determine_source_tag( $page_url );

		// UTM values: prefer explicit hidden fields from POST.
		$utm_source    = sanitize_text_field( wp_unslash( $_POST['utm_source'] ?? '' ) );
		$utm_medium    = sanitize_text_field( wp_unslash( $_POST['utm_medium'] ?? '' ) );
		$utm_campaign  = sanitize_text_field( wp_unslash( $_POST['utm_campaign'] ?? '' ) );
		$utm_term      = sanitize_text_field( wp_unslash( $_POST['utm_term'] ?? '' ) );
		$utm_content   = sanitize_text_field( wp_unslash( $_POST['utm_content'] ?? '' ) );

		// If some UTM values are still missing, derive them from current page URL query / HandL cookies.
		$page_query_params = array();
		$parsed_page_url = wp_parse_url( $page_url );
		if ( ! empty( $parsed_page_url['query'] ) ) {
			parse_str( $parsed_page_url['query'], $page_query_params );
		}
		if ( '' === $utm_medium ) {
			$utm_medium = sanitize_text_field( $page_query_params['utm_medium'] ?? '' );
			if ( '' === $utm_medium && ! empty( $_COOKIE['utm_medium'] ) ) {
				$utm_medium = sanitize_text_field( wp_unslash( $_COOKIE['utm_medium'] ) );
			}
		}
		if ( '' === $utm_campaign ) {
			$utm_campaign = sanitize_text_field( $page_query_params['utm_campaign'] ?? '' );
			if ( '' === $utm_campaign && ! empty( $_COOKIE['utm_campaign'] ) ) {
				$utm_campaign = sanitize_text_field( wp_unslash( $_COOKIE['utm_campaign'] ) );
			}
		}
		if ( '' === $utm_term ) {
			$utm_term = sanitize_text_field( $page_query_params['utm_term'] ?? '' );
			if ( '' === $utm_term && ! empty( $_COOKIE['utm_term'] ) ) {
				$utm_term = sanitize_text_field( wp_unslash( $_COOKIE['utm_term'] ) );
			}
		}
		if ( '' === $utm_content ) {
			$utm_content = sanitize_text_field( $page_query_params['utm_content'] ?? '' );
			if ( '' === $utm_content && ! empty( $_COOKIE['utm_content'] ) ) {
				$utm_content = sanitize_text_field( wp_unslash( $_COOKIE['utm_content'] ) );
			}
		}

		$utm_source = $this->resolve_utm_source( $utm_source, $page_url );
		$page_url   = $this->enrich_page_url_with_utm(
			$page_url,
			array(
				'utm_source'   => $utm_source,
				'utm_medium'   => $utm_medium,
				'utm_campaign' => $utm_campaign,
				'utm_term'     => $utm_term,
				'utm_content'  => $utm_content,
			)
		);
		$custom_lead_path = $this->resolve_custom_lead_path(
			wp_unslash( $_POST['custom_lead_path'] ?? '' ),
			$page_url
		);
		if ( '' === $custom_lead_path && ! empty( $_POST['cta_path'] ) ) {
			$custom_lead_path = $this->resolve_custom_lead_path(
				wp_unslash( $_POST['cta_path'] ),
				$page_url
			);
		}

		if ( empty( $name ) || empty( $email ) || ( ! $is_course_form && empty( $course_interest_values ) ) || ! $privacy ) {
			$this->send_response( 
				__( 'Please fill in all required fields and accept the privacy policy.', 'contact-form' ),
				false,
				400
			);
		}
		
		// Enforce minimum message length only when a message is provided.
		$plain_message = trim( wp_strip_all_tags( $message, true ) );
		$message_length = function_exists( 'mb_strlen' ) ? mb_strlen( $plain_message ) : strlen( $plain_message );
		if ( '' !== $plain_message && $message_length < $min_message_length ) {
			$this->send_response(
				sprintf( __( 'Please enter at least %d characters in the message field.', 'contact-form' ), $min_message_length ),
				false,
				400
			);
		}

		$data = array(
			'name'             => $name,
			'email'            => $email,
			'organization'     => $organization,
			'phone_country_code' => $phone_country_code,
			'phone_number'       => $phone_number,
			'course_interest'    => $course_interest,
			'message'            => $message,
			'form_variant'       => $form_variant,
			'privacy_accepted'   => $privacy ? 1 : 0,
			'utm_source'       => $utm_source,
			'utm_medium'       => $utm_medium,
			'utm_campaign'     => $utm_campaign,
			'utm_term'         => $utm_term,
			'utm_content'      => $utm_content,
			'source_tag'       => $source_tag,
			'custom_lead_path' => $custom_lead_path,
			'page_url'         => $page_url,
			'user_ip'          => $this->get_user_ip(),
			'user_agent'       => sanitize_textarea_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ?? '' ) ),
			'created_at'       => current_time( 'mysql' ),
		);

		global $wpdb;
		$target_table = $is_course_form ? $this->get_course_table_name() : $this->get_table_name();
		$this->ensure_submission_table_exists( $target_table );

		$inserted = $wpdb->insert( $target_table, $data );

		if ( false === $inserted ) {
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'SCF: DB insert failed. Table: ' . $target_table . ' Error: ' . $wpdb->last_error );
			}
			$this->send_response( 
				__( 'Unable to save your submission. Please try again later.', 'contact-form' ),
				false,
				500
			);
		}

		// Set rate limiting transient AFTER successful submission
		$user_ip = $this->get_user_ip();
		if ( ! empty( $user_ip ) ) {
			$rate_limit_key = 'scf_rate_limit_' . md5( $user_ip );
			// Set transient for 30 seconds to prevent rapid resubmissions
			set_transient( $rate_limit_key, time(), 30 );
		}

		// Delete form token and honeypot transient only after successful submission
		$form_token = sanitize_text_field( wp_unslash( $_POST['scf_form_token'] ?? '' ) );
		if ( ! empty( $form_token ) ) {
			$this->verify_form_token( $form_token, true );
			$honeypot_key = 'scf_honeypots_' . md5( $form_token );
			delete_transient( $honeypot_key );
		}

		// Get submission ID for traceability in logs.
		$submission_id = $wpdb->insert_id;

		// Respond immediately after a successful save so the UI feels instant.
		// Admin emails, user confirmation, and ERP sync continue below after flush.
		$this->send_response_no_exit(
			__( 'Thank you! Our team will contact you soon.', 'contact-form' ),
			true,
			200
		);
		$this->close_http_connection();
		$this->process_post_submission_tasks( $data, $submission_id );
		return;

		} catch ( Exception $e ) {
			// Log error for debugging
			if ( $debug_mode ) {
				error_log( 'SCF Form Error: ' . $e->getMessage() );
			}
			// Send error response
			$this->send_response( 
				__( 'An error occurred while processing your submission. Please try again.', 'contact-form' ),
				false,
				500
			);
		}
	}

	/**
	 * Whether admin email test mode is enabled.
	 *
	 * @return bool
	 */
	public function is_admin_email_test_mode() {
		$settings = get_option( self::OPTION_KEY, array() );
		$enabled  = ! empty( $settings['admin_email_test_mode'] );
		return (bool) apply_filters( 'scf_is_admin_email_test_mode', $enabled );
	}

	/**
	 * Resolve admin notification recipients.
	 *
	 * @return array<int, string>
	 */
	public function get_admin_email_recipients() {
		if ( $this->is_admin_email_test_mode() ) {
			$recipients = array( self::ADMIN_EMAIL_TEST_RECIPIENT );
		} else {
			$recipients = array(
				'santhosh.kt@succeedtech.com',
				'vivek@succeedtech.com',
				'Vinay@succeedtech.com',
				'vishwadeep@succeedtech.com',
				'vridhi.shah@succeedtech.com',
				'pooja.wagh@succeedtech.com',
				'depakar@succeedtech.com',
				'sanmathi@succeedtech.com',
			);
		}

		$recipients = apply_filters( 'scf_admin_email_recipients', $recipients );

		return array_values(
			array_unique(
				array_filter(
					array_map( 'sanitize_email', (array) $recipients ),
					'is_email'
				)
			)
		);
	}

	/**
	 * Resolve authenticated From email (Post SMTP sender when available).
	 *
	 * @return string
	 */
	private function get_mail_from_email() {
		$postman = get_option( 'postman_options', array() );
		if ( is_array( $postman ) && ! empty( $postman['sender_email'] ) && is_email( $postman['sender_email'] ) ) {
			return sanitize_email( $postman['sender_email'] );
		}

		$admin_email = get_option( 'admin_email' );
		if ( $admin_email && is_email( $admin_email ) ) {
			return sanitize_email( $admin_email );
		}

		return 'noreply@succeedlearn.com';
	}

	/**
	 * Resolve From display name.
	 *
	 * @return string
	 */
	private function get_mail_from_name() {
		$postman = get_option( 'postman_options', array() );
		if ( is_array( $postman ) && ! empty( $postman['sender_name'] ) ) {
			return sanitize_text_field( (string) $postman['sender_name'] );
		}

		$site_name = get_bloginfo( 'name' );
		return $site_name ? $site_name : 'SucceedLEARN';
	}

	/**
	 * Build mail headers aligned with Post SMTP authenticated sender.
	 *
	 * @param string $reply_name  Reply-to name.
	 * @param string $reply_email Reply-to email.
	 * @return array<int, string>
	 */
	private function build_mail_headers( $reply_name = '', $reply_email = '' ) {
		$from_email = $this->get_mail_from_email();
		$from_name  = $this->get_mail_from_name();
		$headers    = array(
			'Content-Type: text/html; charset=UTF-8',
			sprintf( 'From: %s <%s>', $from_name, $from_email ),
		);

		if ( ! empty( $reply_email ) && is_email( $reply_email ) ) {
			$safe_name   = sanitize_text_field( $reply_name );
			$headers[]   = sprintf(
				'Reply-To: %s <%s>',
				$safe_name ? $safe_name : sanitize_email( $reply_email ),
				sanitize_email( $reply_email )
			);
		}

		return $headers;
	}

	/**
	 * Scoped wp_mail_from filter for SCF sends.
	 *
	 * @param string $email Original from email.
	 * @return string
	 */
	public function set_scf_from_email( $email ) {
		if ( $this->is_sending_scf_email ) {
			return $this->get_mail_from_email();
		}
		return $email;
	}

	/**
	 * Scoped wp_mail_from_name filter for SCF sends.
	 *
	 * @param string $name Original from name.
	 * @return string
	 */
	public function set_scf_from_name( $name ) {
		if ( $this->is_sending_scf_email ) {
			return $this->get_mail_from_name();
		}
		return $name;
	}

	/**
	 * Send admin notification.
	 *
	 * @param array $data Submission data.
	 */
	private function send_admin_email( $data ) {
		$admin_emails = $this->get_admin_email_recipients();
		$subject      = sprintf( __( 'New Contact Submission from %s', 'contact-form' ), $data['name'] );
		if ( $this->is_admin_email_test_mode() ) {
			$subject = '[TEST] ' . $subject;
		}
		$headers = $this->build_mail_headers( $data['name'], $data['email'] );

		$utm_source_display = $this->format_utm_source_display( $data['utm_source'] ?? '' );
		$source_tag_display = ! empty( $data['source_tag'] ) ? $data['source_tag'] : '';
		if ( '' === $source_tag_display && ! empty( $data['page_url'] ) ) {
			$source_tag_display = $this->determine_source_tag( $data['page_url'] );
		}
		$erp_source_display = $this->resolve_erp_source_label( $data );

		$user_ip = ! empty( $data['user_ip'] ) ? (string) $data['user_ip'] : $this->get_user_ip();
		if ( '' === $user_ip ) {
			$user_ip = 'N/A';
		}

		$phone_parts = array_filter(
			array(
				trim( (string) ( $data['phone_country_code'] ?? '' ) ),
				trim( (string) ( $data['phone_number'] ?? '' ) ),
			)
		);
		$phone_display = ! empty( $phone_parts ) ? implode( ' ', $phone_parts ) : '';

		$organization = trim( (string) ( $data['organization'] ?? '' ) );

		$course_interest_raw = $data['course_interest'] ?? '';
		$course_interest    = is_array( $course_interest_raw )
			? implode( ', ', array_map( 'sanitize_text_field', $course_interest_raw ) )
			: trim( (string) $course_interest_raw );

		$extra_rows = '';
		if ( '' !== $organization ) {
			$extra_rows .= '<p><strong>Organization:</strong> ' . esc_html( $organization ) . '</p>';
		}
		if ( '' !== $phone_display ) {
			$extra_rows .= '<p><strong>Phone:</strong> ' . esc_html( $phone_display ) . '</p>';
		}
		if ( '' !== $course_interest ) {
			$extra_rows .= '<p><strong>Interested In:</strong> ' . esc_html( $course_interest ) . '</p>';
		}
		if ( '' !== $source_tag_display ) {
			$extra_rows .= '<p><strong>Form Source:</strong> ' . esc_html( $source_tag_display ) . '</p>';
		}
		if ( '' !== $erp_source_display ) {
			$extra_rows .= '<p><strong>ERP Source (utm_source):</strong> ' . esc_html( $erp_source_display ) . '</p>';
		}

		$lead_path_display = trim( (string) ( $data['custom_lead_path'] ?? '' ) );
		$user_journey_formatted = $this->format_custom_lead_path_display( $lead_path_display );
		if ( '' !== $user_journey_formatted ) {
			$user_journey_html = esc_html( $user_journey_formatted );
		} else {
			$user_journey_html = '<span style="color:#6b7c93;">' . esc_html__( 'Not recorded', 'contact-form' ) . '</span>';
		}

		$plain_message = trim( wp_strip_all_tags( (string) ( $data['message'] ?? '' ) ) );
		$message_display = '' !== $plain_message ? $plain_message : __( 'None provided', 'contact-form' );

		$debug_mode = defined( 'WP_DEBUG' ) && WP_DEBUG;

		// Validate email addresses
		$valid_emails = array();
		foreach ( $admin_emails as $email ) {
			if ( is_email( $email ) ) {
				$valid_emails[] = $email;
			} elseif ( $debug_mode ) {
				error_log( 'SCF: Invalid admin email address: ' . $email );
			}
		}

		if ( empty( $valid_emails ) ) {
			if ( $debug_mode ) {
				error_log( 'SCF: No valid admin email addresses to send to' );
			}
			return;
		}

		// List every admin recipient in the body so each admin can see the full distribution list
		// (individual To: sends otherwise only show the current recipient).
		$notified_admins_html = esc_html( implode( ', ', $valid_emails ) );

		$body = sprintf(
			'<h2>New Contact Submission</h2>
			<p><strong>Name:</strong> %1$s</p>
			<p><strong>Email:</strong> %2$s</p>
			%3$s
			<p><strong>UTM Channel:</strong> %4$s</p>
			<p><strong>User Journey:</strong> %8$s</p>
			<p><strong>Message:</strong> %5$s</p>
			<p><strong>Page URL:</strong> <a href="%6$s">%6$s</a></p>
			<p><strong>IP Address:</strong> %7$s</p>
			<p><strong>Notified admins:</strong> %9$s</p>',
			esc_html( $data['name'] ),
			esc_html( $data['email'] ),
			$extra_rows,
			esc_html( $utm_source_display ),
			nl2br( esc_html( $message_display ) ),
			esc_url( $data['page_url'] ),
			esc_html( $user_ip ),
			$user_journey_html,
			$notified_admins_html
		);

		if ( $debug_mode ) {
			error_log( 'SCF: Attempting to send admin email to: ' . implode( ', ', $valid_emails ) );
			error_log( 'SCF: Subject: ' . $subject );
			error_log( 'SCF: wp_mail function exists: ' . ( function_exists( 'wp_mail' ) ? 'yes' : 'no' ) );
		}

		// Ensure wp_mail function exists
		if ( ! function_exists( 'wp_mail' ) ) {
			if ( $debug_mode ) {
				error_log( 'SCF: wp_mail function does not exist!' );
			}
			return;
		}

		$this->is_sending_scf_email = true;

		// Send one email per admin for better Post SMTP compatibility.
		// Body includes the full notified-admins list so every recipient can see the others.
		foreach ( $valid_emails as $recipient ) {
			if ( $debug_mode ) {
				error_log( 'SCF: About to call wp_mail for admin email to: ' . $recipient );
			}

			$result = wp_mail( $recipient, $subject, $body, $headers );

			if ( $debug_mode ) {
				if ( $result ) {
					error_log( 'SCF: Admin email sent successfully to: ' . $recipient );
				} else {
					error_log( 'SCF: Admin email failed to send to: ' . $recipient );
					global $phpmailer;
					if ( isset( $phpmailer ) && is_object( $phpmailer ) && ! empty( $phpmailer->ErrorInfo ) ) {
						error_log( 'SCF: PHPMailer error for ' . $recipient . ': ' . $phpmailer->ErrorInfo );
					}
				}
			}
		}

		$this->is_sending_scf_email = false;
	}

	/**
	 * Send confirmation to user.
	 *
	 * @param array $data Submission data.
	 */
	private function send_user_email( $data ) {
		$subject = __( 'We received your message', 'contact-form' );
		$headers = $this->build_mail_headers();
		$course_interest_raw = $data['course_interest'] ?? '';
		$course_interest   = is_array( $course_interest_raw )
			? implode( ', ', array_map( 'sanitize_text_field', $course_interest_raw ) )
			: trim( (string) $course_interest_raw );
		// Show "Other" in user email when the form option "Others" was selected.
		if ( '' !== $course_interest ) {
			$interest_parts = array_map( 'trim', explode( ',', $course_interest ) );
			$interest_parts = array_map(
				static function ( $part ) {
					return 'Others' === $part ? 'Other' : $part;
				},
				$interest_parts
			);
			$course_interest = implode( ', ', array_filter( $interest_parts ) );
		}
		$interested_in_display = '' !== $course_interest ? $course_interest : __( 'None provided', 'contact-form' );

		$plain_message = trim( wp_strip_all_tags( (string) ( $data['message'] ?? '' ) ) );
		$details_display = '' !== $plain_message ? $plain_message : __( 'None provided', 'contact-form' );

		$body = sprintf(
			'<p>Hi %1$s,</p>
			<p>Thanks for reaching out to SucceedLEARN! We have received your inquiry and our team will get back to you shortly.</p>
			<p><strong>Submission Details:</strong></p>
			<p><strong>Interested In:</strong> %2$s</p>
			<p><strong>Details/Notes:</strong> %3$s</p>
			<p>Regards,<br/>SucceedLEARN Team</p>',
			esc_html( $data['name'] ),
			esc_html( $interested_in_display ),
			nl2br( esc_html( $details_display ) )
		);

		$debug_mode = defined( 'WP_DEBUG' ) && WP_DEBUG;
		
		// Validate email address
		if ( ! is_email( $data['email'] ) ) {
			if ( $debug_mode ) {
				error_log( 'SCF: Invalid user email address: ' . $data['email'] );
			}
			return;
		}
		if ( ! $this->can_send_user_reply_email( $data['email'] ) ) {
			if ( $debug_mode ) {
				error_log( 'SCF: User confirmation suppressed because reply limit reached for: ' . $data['email'] );
			}
			return;
		}
		
		if ( $debug_mode ) {
			error_log( 'SCF: Attempting to send user email to: ' . $data['email'] );
			error_log( 'SCF: Subject: ' . $subject );
			error_log( 'SCF: wp_mail function exists: ' . ( function_exists( 'wp_mail' ) ? 'yes' : 'no' ) );
		}
		
		// Ensure wp_mail function exists
		if ( ! function_exists( 'wp_mail' ) ) {
			if ( $debug_mode ) {
				error_log( 'SCF: wp_mail function does not exist!' );
			}
			return;
		}

		$this->is_sending_scf_email = true;
		$result = wp_mail( $data['email'], $subject, $body, $headers );
		$this->is_sending_scf_email = false;
		if ( $result ) {
			$this->increment_user_reply_email_count( $data['email'] );
		}

		if ( $debug_mode ) {
			if ( $result ) {
				error_log( 'SCF: User email sent successfully. Return value: ' . var_export( $result, true ) );
			} else {
				error_log( 'SCF: User email failed to send. Return value: ' . var_export( $result, true ) );
				global $phpmailer;
				if ( isset( $phpmailer ) && is_object( $phpmailer ) && ! empty( $phpmailer->ErrorInfo ) ) {
					error_log( 'SCF: PHPMailer error: ' . $phpmailer->ErrorInfo );
				}
			}
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
			strtolower( sanitize_email( self::ADMIN_EMAIL_TEST_RECIPIENT ) ),
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
		$submission_id = absint( $data['submission_id'] ?? 0 );
		$scf_table     = (string) ( $data['scf_table'] ?? '' );
		if ( $submission_id && $scf_table ) {
			$status = function_exists( 'succeedlearn_form_send_to_erp' ) ? 'pending' : 'failed';
			$detail = function_exists( 'succeedlearn_form_send_to_erp' )
				? 'ERP sync started'
				: 'SucceedLEARN Form ERP plugin is not active';
			$this->record_erp_sync( $scf_table, $submission_id, $status, $detail, '' );
		}

		/**
		 * Allow developers to hook before ERP sync.
		 */
		$endpoint = apply_filters( 'scf_erp_endpoint', '' );

		if ( empty( $endpoint ) ) {
			/**
			 * Fires after a submission is stored. Use this to integrate with custom systems.
			 *
			 * @param array $data Submission data.
			 */
			do_action( 'scf_after_submission', $data, null );
			return;
		}

		$payload = apply_filters( 'scf_erp_payload', $data );

		$response = wp_remote_post(
			$endpoint,
			array(
				'timeout' => 15,
				'headers' => array(
					'Content-Type' => 'application/json',
				),
				'body'    => wp_json_encode( $payload ),
			)
		);

		do_action( 'scf_after_submission', $data, $response );
	}

	/**
	 * Send emails asynchronously after form submission.
	 *
	 * @param int $submission_id Submission ID from database.
	 */
	public function send_emails_async( $submission_id ) {
		global $wpdb;

		$submission_id = absint( $submission_id );
		if ( $submission_id < 1 ) {
			return;
		}

		$table_name = $this->get_table_name();
		$submission = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE id = %d", $submission_id ), ARRAY_A );

		if ( ! $submission ) {
			$course_table = $this->get_course_table_name();
			$submission   = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$course_table} WHERE id = %d", $submission_id ), ARRAY_A );
		}

		if ( ! $submission ) {
			return;
		}

		// Convert database row to data array format
		$data = array(
			'name'               => $submission['name'],
			'email'              => $submission['email'],
			'organization'       => $submission['organization'],
			'phone_country_code' => $submission['phone_country_code'] ?? '',
			'phone_number'       => $submission['phone_number'] ?? '',
			'course_interest'    => $submission['course_interest'] ?? '',
			'message'            => $submission['message'],
			'form_variant'       => $submission['form_variant'] ?? 'default',
			'privacy_accepted'   => $submission['privacy_accepted'],
			'utm_source'         => $submission['utm_source'],
			'utm_medium'         => $submission['utm_medium'],
			'utm_campaign'       => $submission['utm_campaign'],
			'utm_term'           => $submission['utm_term'],
			'utm_content'        => $submission['utm_content'],
			'source_tag'         => $submission['source_tag'],
			'page_url'           => $submission['page_url'],
			'user_ip'            => $submission['user_ip'],
			'user_agent'         => $submission['user_agent'],
		);

		$this->process_post_submission_tasks( $data, $submission_id );
	}

	/**
	 * Map SCF source_tag / form variant to the ERP utm_source label for emails.
	 *
	 * @param array $data Submission data.
	 * @return string
	 */
	private function resolve_erp_source_label( $data ) {
		$form_variant = sanitize_text_field( (string) ( $data['form_variant'] ?? '' ) );
		if ( 'course' === $form_variant ) {
			return 'SucceedLEARN RequestDemo';
		}

		$source_tag = sanitize_text_field( (string) ( $data['source_tag'] ?? '' ) );
		if ( '' === $source_tag && ! empty( $data['page_url'] ) ) {
			$source_tag = $this->determine_source_tag( $data['page_url'] );
		}

		$map = array(
			'SucceedLEARN HomePage'  => 'SucceedLEARN Homepage',
			'SucceedLEARN InfoSEC'   => 'SucceedLEARN InfoSEC',
			'SucceedLEARN Blog'      => 'SucceedLEARN Blogs',
			'SucceedLEARN ContactUs' => 'SucceedLEARN ContactUs',
			'SucceedLEARN Others'    => 'direct',
		);

		if ( isset( $map[ $source_tag ] ) ) {
			return $map[ $source_tag ];
		}

		return 'direct';
	}

	/**
	 * Determine user IP (supports proxies / Cloudflare).
	 *
	 * @return string
	 */
	private function get_user_ip() {
		$candidates = array();

		// Cloudflare / common reverse-proxy headers (left-most = original client).
		$header_keys = array(
			'HTTP_CF_CONNECTING_IP',
			'HTTP_TRUE_CLIENT_IP',
			'HTTP_X_REAL_IP',
			'HTTP_CLIENT_IP',
			'HTTP_X_FORWARDED_FOR',
			'HTTP_X_FORWARDED',
			'HTTP_X_CLUSTER_CLIENT_IP',
			'HTTP_FORWARDED_FOR',
			'HTTP_FORWARDED',
			'REMOTE_ADDR',
		);

		foreach ( $header_keys as $key ) {
			if ( empty( $_SERVER[ $key ] ) || ! is_string( $_SERVER[ $key ] ) ) {
				continue;
			}
			foreach ( explode( ',', wp_unslash( $_SERVER[ $key ] ) ) as $part ) {
				$ip = trim( $part );
				// Strip port if present (e.g. 1.2.3.4:12345).
				if ( preg_match( '/^\[?([0-9a-fA-F:.]+)\]?:\d+$/', $ip, $m ) ) {
					$ip = $m[1];
				}
				if ( '' !== $ip ) {
					$candidates[] = $ip;
				}
			}
		}

		foreach ( $candidates as $ip ) {
			if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 ) ) {
				return $ip;
			}
		}

		// Last resort: REMOTE_ADDR even if earlier headers were malformed.
		if ( ! empty( $_SERVER['REMOTE_ADDR'] ) ) {
			$remote = trim( (string) wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
			if ( filter_var( $remote, FILTER_VALIDATE_IP ) ) {
				return $remote;
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
		$token_key = 'scf_token_' . md5( $token );
		// Store token for 3 hours (10800 seconds) to allow users more time
		// Also store in options table as backup in case transients are cleared
		set_transient( $token_key, time(), 10800 );
		// Backup storage in options (auto-cleanup after 4 hours)
		$tokens = get_option( 'scf_active_tokens', array() );
		$tokens[ $token_key ] = time();
		// Clean old tokens (older than 4 hours)
		foreach ( $tokens as $key => $timestamp ) {
			if ( ( time() - $timestamp ) > 14400 ) {
				unset( $tokens[ $key ] );
			}
		}
		update_option( 'scf_active_tokens', $tokens );
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
		
		$token_key = 'scf_token_' . md5( $token );
		$token_time = get_transient( $token_key );
		
		// If transient is missing, check backup storage in options
		if ( false === $token_time ) {
			$tokens = get_option( 'scf_active_tokens', array() );
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
			$tokens = get_option( 'scf_active_tokens', array() );
			unset( $tokens[ $token_key ] );
			update_option( 'scf_active_tokens', $tokens );
			return false;
		}
		
		// Only delete token if explicitly requested (after successful submission)
		if ( $delete ) {
			delete_transient( $token_key );
			// Also remove from backup
			$tokens = get_option( 'scf_active_tokens', array() );
			unset( $tokens[ $token_key ] );
			update_option( 'scf_active_tokens', $tokens );
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
			'abc.com',
			'test.com',
			'test.net',
			'test.org',
			'example.com',
			'example.net',
			'example.org',
			'fake.com',
			'fake.net',
			'fake.org',
			'invalid.com',
			'invalid.net',
			'invalid.org',
			'dummy.com',
			'dummy.net',
			'dummy.org',
			'sample.com',
			'sample.net',
			'sample.org',
			'demo.com',
			'demo.net',
			'demo.org',
			'localhost.com',
			'localhost.net',
			'nonexistent.com',
			'nonexistent.net',
			'nonexistent.org',
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
	 * Verify if email address actually exists using SMTP.
	 *
	 * @param string $email Email address to verify.
	 * @return bool True if email exists or verification is not possible, false if email doesn't exist.
	 */
	private function verify_email_exists( $email ) {
		if ( empty( $email ) ) {
			return false;
		}
		
		$email_parts = explode( '@', $email );
		if ( count( $email_parts ) !== 2 ) {
			return false;
		}
		
		$domain = strtolower( trim( $email_parts[1] ) );
		$local_part = $email_parts[0];
		
		// Get MX records for the domain
		$mx_records = array();
		$mx_weights = array();
		$mx_result = @getmxrr( $domain, $mx_records, $mx_weights );
		
		// If no MX records, use domain itself as mail server
		if ( ! $mx_result || empty( $mx_records ) ) {
			$mx_hosts = array( $domain );
		} else {
			// getmxrr already sorts by priority, use the first one
			$mx_hosts = array( $mx_records[0] );
		}
		
		// Try to verify email using SMTP RCPT TO command
		foreach ( $mx_hosts as $mx_host ) {
			// Skip if host is invalid
			if ( empty( $mx_host ) ) {
				continue;
			}
			
			// Connect to SMTP server with short timeout
			$connection = @fsockopen( $mx_host, 25, $errno, $errstr, 5 );
			if ( ! $connection ) {
				// If connection fails, assume email might exist (can't verify)
				continue;
			}
			
			// Set timeout
			stream_set_timeout( $connection, 5 );
			
			// Read server greeting
			$response = fgets( $connection, 515 );
			if ( ! $response || ! preg_match( '/^220/', $response ) ) {
				fclose( $connection );
				continue;
			}
			
			// Send EHLO
			fputs( $connection, "EHLO " . $domain . "\r\n" );
			$response = fgets( $connection, 515 );
			
			// Send MAIL FROM
			fputs( $connection, "MAIL FROM: <noreply@" . $domain . ">\r\n" );
			$response = fgets( $connection, 515 );
			if ( ! preg_match( '/^250/', $response ) ) {
				fclose( $connection );
				continue;
			}
			
			// Send RCPT TO - this is where we check if email exists
			fputs( $connection, "RCPT TO: <" . $email . ">\r\n" );
			$response = fgets( $connection, 515 );
			fclose( $connection );
			
			// Check response
			if ( preg_match( '/^250/', $response ) ) {
				// Email exists
				return true;
			} elseif ( preg_match( '/^550|^551|^553/', $response ) ) {
				// Email doesn't exist (550 = mailbox unavailable, 551 = user not local, 553 = mailbox name not allowed)
				return false;
			}
			// Other responses - can't determine, assume might exist
		}
		
		// If we couldn't verify (connection failed, timeout, etc.), allow it (better UX)
		// Only reject if we got a definitive "doesn't exist" response
		return true;
	}

	/**
	 * Register admin page.
	 */
	public function register_admin_menu() {
		add_menu_page(
			__( 'Succeed Contact form Submissions', 'contact-form' ),
			__( 'Succeed Contact form Submissions', 'contact-form' ),
			'manage_options',
			'scf-submissions',
			array( $this, 'render_admin_page' ),
			'dashicons-email-alt2',
			58
		);
		add_submenu_page(
			'scf-submissions',
			__( 'Settings', 'contact-form' ),
			__( 'Settings', 'contact-form' ),
			'manage_options',
			'scf-settings',
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
			<h1><?php esc_html_e( 'Succeed Contact form Submissions', 'contact-form' ); ?></h1>

			<?php if ( $this->is_admin_email_test_mode() ) : ?>
				<div class="notice notice-warning">
					<p>
						<strong><?php esc_html_e( 'Admin email test mode is ON.', 'contact-form' ); ?></strong>
						<?php
						printf(
							/* translators: %s: test recipient email address */
							esc_html__( 'Admin notifications are sent only to %s and ERP sync uses UAT. Turn this off in Settings when testing is complete.', 'contact-form' ),
							esc_html( self::ADMIN_EMAIL_TEST_RECIPIENT )
						);
						?>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=scf-settings' ) ); ?>"><?php esc_html_e( 'Go to Settings', 'contact-form' ); ?></a>
					</p>
				</div>
			<?php endif; ?>
			
			<?php
			// Show success/error message if weekly report was sent manually
			if ( isset( $_GET['weekly_report_sent'] ) ) {
				$message_type = sanitize_text_field( wp_unslash( $_GET['weekly_report_sent'] ) );
				if ( 'success' === $message_type ) {
					echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Weekly report email sent successfully!', 'contact-form' ) . '</p></div>';
				} elseif ( 'error' === $message_type ) {
					echo '<div class="notice notice-error is-dismissible"><p>' . esc_html__( 'Failed to send weekly report email. Please check your email settings.', 'contact-form' ) . '</p></div>';
				}
			}
			?>
			
			<form method="get" style="margin-bottom: 20px;">
				<input type="hidden" name="page" value="scf-submissions" />
				<label>
					<?php esc_html_e( 'Start Date', 'contact-form' ); ?>
					<input type="date" name="start_date" value="<?php echo esc_attr( $filters['start_date'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'End Date', 'contact-form' ); ?>
					<input type="date" name="end_date" value="<?php echo esc_attr( $filters['end_date'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'Email', 'contact-form' ); ?>
					<input type="search" name="email" value="<?php echo esc_attr( $filters['email'] ); ?>" />
				</label>
				<label>
					<?php esc_html_e( 'UTM Source', 'contact-form' ); ?>
					<input type="search" name="utm_source" value="<?php echo esc_attr( $filters['utm_source'] ); ?>" />
				</label>
				<button class="button button-primary" type="submit"><?php esc_html_e( 'Filter', 'contact-form' ); ?></button>
				<?php wp_nonce_field( 'scf_export', 'scf_export_nonce' ); ?>
				<button class="button" name="scf_export" value="1"><?php esc_html_e( 'Export CSV', 'contact-form' ); ?></button>
			</form>
			
			<div style="margin-bottom: 20px; padding: 15px; background: #fff; border-left: 4px solid #2271b1; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
				<h2 style="margin-top: 0;"><?php esc_html_e( 'Weekly Report', 'contact-form' ); ?></h2>
				<p><?php esc_html_e( 'Manually trigger the weekly report email to be sent immediately.', 'contact-form' ); ?></p>
				<form method="post" action="">
					<?php wp_nonce_field( 'scf_send_weekly_report_manual', 'scf_weekly_report_nonce' ); ?>
					<input type="hidden" name="scf_send_weekly_report" value="1" />
					<button type="submit" class="button button-secondary" onclick="return confirm('<?php echo esc_js( __( 'Are you sure you want to send the weekly report email now?', 'contact-form' ) ); ?>');">
						<?php esc_html_e( 'Send Weekly Mail', 'contact-form' ); ?>
					</button>
				</form>
			</div>
			<table class="widefat fixed striped">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Date', 'contact-form' ); ?></th>
						<th><?php esc_html_e( 'Name', 'contact-form' ); ?></th>
						<th><?php esc_html_e( 'Email', 'contact-form' ); ?></th>
						<th><?php esc_html_e( 'Interested In', 'contact-form' ); ?></th>
						<th><?php esc_html_e( 'Message', 'contact-form' ); ?></th>
						<th><?php esc_html_e( 'Source Tag', 'contact-form' ); ?></th>
						<th><?php esc_html_e( 'Lead Path', 'contact-form' ); ?></th>
						<th><?php esc_html_e( 'UTM Source', 'contact-form' ); ?></th>
						<th><?php esc_html_e( 'ERP Sync', 'contact-form' ); ?></th>
						<th><?php esc_html_e( 'Page URL', 'contact-form' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if ( empty( $items ) ) : ?>
						<tr>
							<td colspan="10"><?php esc_html_e( 'No submissions found.', 'contact-form' ); ?></td>
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
								<td><?php echo esc_html( $item->course_interest ?? '' ); ?></td>
								<td><?php echo esc_html( wp_trim_words( $item->message, 15 ) ); ?></td>
								<td><?php echo esc_html( $item->source_tag ); ?></td>
								<td><?php echo esc_html( $item->custom_lead_path ?? '' ); ?></td>
								<td><?php echo esc_html( $this->format_utm_source_display( $item->utm_source ?? '' ) ); ?></td>
								<td><?php echo wp_kses_post( $this->format_erp_sync_cell( $item ) ); ?></td>
								<td><a href="<?php echo esc_url( $item->page_url ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'View', 'contact-form' ); ?></a></td>
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

		$items = $wpdb->get_results( $sql );
		return $this->hydrate_erp_sync_from_logs( is_array( $items ) ? $items : array() );
	}

	/**
	 * Fill empty ERP sync cells from the ERP plugin log table.
	 *
	 * @param array $items Submission rows.
	 * @return array
	 */
	private function hydrate_erp_sync_from_logs( $items ) {
		global $wpdb;

		if ( empty( $items ) ) {
			return $items;
		}

		$log_table = $wpdb->prefix . 'sl_erp_responses';
		$exists    = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $log_table ) );
		if ( $exists !== $log_table ) {
			return $items;
		}

		$emails = array();
		foreach ( $items as $item ) {
			$status = isset( $item->erp_sync_status ) ? trim( (string) $item->erp_sync_status ) : '';
			if ( '' === $status && ! empty( $item->email ) ) {
				$emails[] = strtolower( (string) $item->email );
			}
		}
		$emails = array_values( array_unique( $emails ) );
		if ( empty( $emails ) ) {
			return $items;
		}

		$placeholders = implode( ',', array_fill( 0, count( $emails ), '%s' ) );
		$sql          = "SELECT email, erp_response FROM {$log_table} WHERE email IN ({$placeholders}) ORDER BY id DESC";
		$logs         = $wpdb->get_results( $wpdb->prepare( $sql, $emails ) ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$by_email     = array();
		foreach ( (array) $logs as $log ) {
			$key = strtolower( (string) $log->email );
			if ( ! isset( $by_email[ $key ] ) ) {
				$by_email[ $key ] = $log->erp_response;
			}
		}

		foreach ( $items as $item ) {
			$status = isset( $item->erp_sync_status ) ? trim( (string) $item->erp_sync_status ) : '';
			if ( '' !== $status ) {
				continue;
			}
			$key = strtolower( (string) $item->email );
			if ( ! isset( $by_email[ $key ] ) ) {
				continue;
			}
			$parsed                 = $this->summarize_erp_log_body( (string) $by_email[ $key ] );
			$item->erp_sync_status  = $parsed['status'];
			$item->erp_sync_detail  = $parsed['detail'];
			$item->erp_lead_name    = $parsed['lead_name'];
			if ( ! empty( $item->id ) ) {
				$this->record_erp_sync( $this->get_table_name(), (int) $item->id, $parsed['status'], $parsed['detail'], $parsed['lead_name'] );
			}
		}

		return $items;
	}

	/**
	 * Parse a stored ERP JSON body into admin status fields.
	 *
	 * @param string $response Raw ERP response.
	 * @return array{status:string,detail:string,lead_name:string}
	 */
	private function summarize_erp_log_body( $response ) {
		$decoded = json_decode( (string) $response, true );
		if ( ! is_array( $decoded ) ) {
			$decoded = array();
		}

		$lead_name = ! empty( $decoded['data']['name'] ) ? (string) $decoded['data']['name'] : '';
		$detail    = '';
		if ( ! empty( $decoded['message'] ) ) {
			$detail = (string) $decoded['message'];
		} elseif ( ! empty( $decoded['exc_type'] ) ) {
			$detail = (string) $decoded['exc_type'];
		} elseif ( ! empty( $decoded['_server_messages'] ) ) {
			$detail = wp_strip_all_tags( (string) $decoded['_server_messages'] );
		} elseif ( ! empty( $decoded['error'] ) ) {
			$detail = (string) $decoded['error'];
		}

		$blob   = strtolower( $detail . ' ' . $response );
		$is_dup = ( false !== strpos( $blob, 'duplicate' ) );
		$ok     = '' !== $lead_name && false === stripos( $response, '"exc_type"' ) && false === stripos( $response, '"error"' );

		if ( $is_dup ) {
			return array(
				'status'    => 'duplicate',
				'detail'    => '' !== $detail ? $detail : 'Duplicate entry in ERP',
				'lead_name' => $lead_name,
			);
		}

		if ( $ok ) {
			return array(
				'status'    => 'synced',
				'detail'    => $lead_name,
				'lead_name' => $lead_name,
			);
		}

		return array(
			'status'    => 'failed',
			'detail'    => '' !== $detail ? $detail : wp_trim_words( wp_strip_all_tags( (string) $response ), 20 ),
			'lead_name' => $lead_name,
		);
	}

	/**
	 * Send weekly report manually if requested.
	 */
	public function maybe_send_weekly_report_manual() {
		if ( ! isset( $_POST['scf_send_weekly_report'] ) || '1' !== $_POST['scf_send_weekly_report'] ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'contact-form' ) );
		}

		if ( ! isset( $_POST['scf_weekly_report_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['scf_weekly_report_nonce'] ) ), 'scf_send_weekly_report_manual' ) ) {
			wp_die( esc_html__( 'Invalid request.', 'contact-form' ) );
		}

		// Trigger the weekly report manually (pass true to use current time as end date)
		ob_start();
		$this->send_weekly_report( true );
		ob_end_clean();

		// Redirect back with success message (send_weekly_report handles errors internally)
		$redirect_url = add_query_arg(
			array(
				'page'                => 'scf-submissions',
				'weekly_report_sent' => 'success',
			),
			admin_url( 'admin.php' )
		);
		wp_safe_redirect( $redirect_url );
		exit;
	}

	/**
	 * Reset user auto-reply counter for a specific email from admin settings page.
	 */
	public function maybe_reset_user_reply_email_count() {
		if ( ! isset( $_POST['scf_reset_user_reply_count'] ) || '1' !== $_POST['scf_reset_user_reply_count'] ) {
			return;
		}
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'contact-form' ) );
		}
		if ( ! isset( $_POST['scf_reset_user_reply_count_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['scf_reset_user_reply_count_nonce'] ) ), 'scf_reset_user_reply_count_action' ) ) {
			wp_die( esc_html__( 'Invalid request.', 'contact-form' ) );
		}
		$email = isset( $_POST['scf_reset_reply_email'] ) ? sanitize_email( wp_unslash( $_POST['scf_reset_reply_email'] ) ) : '';
		if ( ! is_email( $email ) ) {
			$redirect_url = add_query_arg(
				array(
					'page'                   => 'scf-settings',
					'reply_count_reset'      => 'invalid',
				),
				admin_url( 'admin.php' )
			);
			wp_safe_redirect( $redirect_url );
			exit;
		}
		$normalized_email = strtolower( $email );
		$option_key       = $this->get_user_reply_email_count_option_key( $normalized_email );
		delete_option( $option_key );
		$redirect_url = add_query_arg(
			array(
				'page'              => 'scf-settings',
				'reply_count_reset' => 'success',
				'reset_email'       => rawurlencode( $normalized_email ),
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
		$export_flag = isset( $_GET['scf_export'] ) ? sanitize_text_field( wp_unslash( $_GET['scf_export'] ) ) : '';
		if ( '1' !== $export_flag ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Unauthorized', 'contact-form' ) );
		}

		if ( ! isset( $_GET['scf_export_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['scf_export_nonce'] ) ), 'scf_export' ) ) {
			wp_die( esc_html__( 'Invalid export request.', 'contact-form' ) );
		}

		$filters = $this->get_filters();
		$data    = $this->get_submissions( $filters );

		$filename = 'scf-submissions-' . gmdate( 'Ymd-His' ) . '.csv';

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
				'Interested In',
				'Message',
				'Source Tag',
				'Lead Path',
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
					$row->course_interest ?? '',
					$row->message,
					$row->source_tag,
					$row->custom_lead_path ?? '',
					$this->format_utm_source_display( $row->utm_source ?? '' ),
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
		register_setting( 'scf_settings', self::OPTION_KEY, array( $this, 'sanitize_settings' ) );
	}

	/**
	 * Sanitize settings.
	 *
	 * @param array $input Settings input.
	 * @return array Sanitized settings.
	 */
	public function sanitize_settings( $input ) {
		$existing  = get_option( self::OPTION_KEY, array() );
		$sanitized = is_array( $existing ) ? $existing : array();

		if ( isset( $input['min_message_length'] ) ) {
			$sanitized['min_message_length'] = max( 1, absint( $input['min_message_length'] ) );
		} else {
			$sanitized['min_message_length'] = self::DEFAULT_MIN_MESSAGE_LENGTH;
		}

		$sanitized['admin_email_test_mode'] = ! empty( $input['admin_email_test_mode'] ) ? 1 : 0;

		unset( $sanitized['recaptcha_site_key'], $sanitized['recaptcha_secret_key'], $sanitized['recaptcha_score_threshold'] );

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
			add_settings_error( 'scf_messages', 'scf_message', __( 'Settings saved.', 'contact-form' ), 'updated' );
		}
		if ( isset( $_GET['reply_count_reset'] ) ) {
			$reset_status = sanitize_text_field( wp_unslash( $_GET['reply_count_reset'] ) );
			if ( 'success' === $reset_status ) {
				$reset_email = isset( $_GET['reset_email'] ) ? sanitize_email( wp_unslash( $_GET['reset_email'] ) ) : '';
				$message     = $reset_email
					? sprintf( __( 'Auto-reply counter reset for %s.', 'contact-form' ), $reset_email )
					: __( 'Auto-reply counter reset.', 'contact-form' );
				add_settings_error( 'scf_messages', 'scf_reply_reset_success', $message, 'updated' );
			} elseif ( 'invalid' === $reset_status ) {
				add_settings_error( 'scf_messages', 'scf_reply_reset_invalid', __( 'Please enter a valid email address to reset.', 'contact-form' ), 'error' );
			}
		}

		settings_errors( 'scf_messages' );
		$settings = get_option( self::OPTION_KEY, array() );
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php settings_fields( 'scf_settings' ); ?>
				<table class="form-table">
					<tr>
						<th scope="row">
							<label for="min_message_length"><?php esc_html_e( 'Minimum Message Length', 'contact-form' ); ?></label>
						</th>
						<td>
							<input type="number" id="min_message_length" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[min_message_length]" value="<?php echo esc_attr( $settings['min_message_length'] ?? self::DEFAULT_MIN_MESSAGE_LENGTH ); ?>" min="1" step="1" />
							<p class="description">
								<?php esc_html_e( 'Minimum number of characters required in the Message field. This helps block spam submissions like ".".', 'contact-form' ); ?>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<?php esc_html_e( 'Admin Email Test Mode', 'contact-form' ); ?>
						</th>
						<td>
							<label for="admin_email_test_mode">
								<input type="checkbox" id="admin_email_test_mode" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[admin_email_test_mode]" value="1" <?php checked( ! empty( $settings['admin_email_test_mode'] ) ); ?> />
								<?php esc_html_e( 'Enable admin email test mode', 'contact-form' ); ?>
							</label>
							<p class="description">
								<?php
								printf(
									/* translators: %s: test recipient email address */
									esc_html__( 'When enabled, admin notification emails are sent only to %s (subject prefixed with [TEST]). User confirmation emails are unchanged. ERP sync routes to UAT instead of intranet. reCAPTCHA is bypassed while test mode is active. Remember to disable this after testing on the live site.', 'contact-form' ),
									esc_html( self::ADMIN_EMAIL_TEST_RECIPIENT )
								);
								?>
							</p>
						</td>
					</tr>
				</table>
				<div class="notice notice-info inline" style="margin: 20px 0; padding: 12px;">
					<p>
						<strong><?php esc_html_e( 'reCAPTCHA', 'contact-form' ); ?>:</strong>
						<?php
						if ( function_exists( 'succeedlearn_form_recaptcha_is_enabled' ) && succeedlearn_form_recaptcha_is_enabled() ) {
							esc_html_e( 'Shared reCAPTCHA is active for all SucceedLEARN forms.', 'contact-form' );
						} else {
							esc_html_e( 'Shared reCAPTCHA is not configured yet. Forms continue to use built-in anti-spam protections.', 'contact-form' );
						}
						?>
					</p>
				</div>
				<p class="description" style="margin-top: 20px;">
					<strong><?php esc_html_e( 'Bot Protection Features:', 'contact-form' ); ?></strong><br />
					• <?php esc_html_e( 'Honeypot field (always active - invisible to users)', 'contact-form' ); ?><br />
					• <?php esc_html_e( 'Time-based validation (prevents instant submissions)', 'contact-form' ); ?><br />
					• <?php esc_html_e( 'Google reCAPTCHA v3 (shared site-wide when configured)', 'contact-form' ); ?>
				</p>
				<?php submit_button(); ?>
			</form>
			<hr />
			<h2><?php esc_html_e( 'Auto-Reply Counter Utility', 'contact-form' ); ?></h2>
			<p class="description">
				<?php esc_html_e( 'Use this utility to reset the user confirmation email counter for a specific email address.', 'contact-form' ); ?>
			</p>
			<form method="post" action="">
				<?php wp_nonce_field( 'scf_reset_user_reply_count_action', 'scf_reset_user_reply_count_nonce' ); ?>
				<input type="hidden" name="scf_reset_user_reply_count" value="1" />
				<table class="form-table">
					<tr>
						<th scope="row">
							<label for="scf_reset_reply_email"><?php esc_html_e( 'Email Address', 'contact-form' ); ?></label>
						</th>
						<td>
							<input type="email" id="scf_reset_reply_email" name="scf_reset_reply_email" class="regular-text" placeholder="user@example.com" required />
							<p class="description">
								<?php esc_html_e( 'After reset, this email can receive up to 2 auto-replies again.', 'contact-form' ); ?>
							</p>
						</td>
					</tr>
				</table>
				<?php submit_button( __( 'Reset Counter', 'contact-form' ), 'secondary', 'submit', false ); ?>
			</form>
		</div>
		<?php
	}

	/**
	 * Format ERP sync status for the submissions list.
	 *
	 * @param object $item Submission row.
	 * @return string HTML.
	 */
	private function format_erp_sync_cell( $item ) {
		$status = isset( $item->erp_sync_status ) ? (string) $item->erp_sync_status : '';
		$detail = isset( $item->erp_sync_detail ) ? (string) $item->erp_sync_detail : '';
		$lead   = isset( $item->erp_lead_name ) ? (string) $item->erp_lead_name : '';

		if ( 'synced' === $status ) {
			$label = $lead
				? sprintf( __( 'Synced (%s)', 'contact-form' ), $lead )
				: __( 'Synced', 'contact-form' );
			return '<strong style="color:#0d723b;">' . esc_html( $label ) . '</strong>';
		}

		if ( 'duplicate' === $status ) {
			$html = '<strong style="color:#f68c1e;">' . esc_html__( 'Duplicate', 'contact-form' ) . '</strong>';
			if ( '' !== $detail ) {
				$html .= '<br /><span title="' . esc_attr( $detail ) . '">' . esc_html( wp_trim_words( $detail, 18 ) ) . '</span>';
			}
			return $html;
		}

		if ( 'failed' === $status ) {
			$html = '<strong style="color:#ea3e24;">' . esc_html__( 'Failed', 'contact-form' ) . '</strong>';
			if ( '' !== $detail ) {
				$html .= '<br /><span title="' . esc_attr( $detail ) . '">' . esc_html( wp_trim_words( $detail, 18 ) ) . '</span>';
			}
			return $html;
		}

		if ( 'pending' === $status ) {
			return '<span style="color:#f68c1e;">' . esc_html__( 'Pending', 'contact-form' ) . '</span>';
		}

		return '<span style="color:#6B7C93;">' . esc_html__( 'Not synced', 'contact-form' ) . '</span>';
	}
}

SCF_Contact_Form_Plugin::instance();

/**
 * Whether SCF admin email test mode is enabled.
 *
 * @return bool
 */
function scf_is_admin_email_test_mode() {
	if ( class_exists( 'SCF_Contact_Form_Plugin' ) ) {
		return SCF_Contact_Form_Plugin::instance()->is_admin_email_test_mode();
	}

	$settings = get_option( 'scf_settings', array() );
	return ! empty( $settings['admin_email_test_mode'] );
}

/**
 * Record ERP sync status on a contact/course submission row.
 *
 * @param string $table_name    Full table name.
 * @param int    $submission_id Row ID.
 * @param string $status        synced|failed|pending|duplicate.
 * @param string $detail        Error or note.
 * @param string $lead_name     ERP Lead name.
 */
function scf_record_erp_sync( $table_name, $submission_id, $status, $detail = '', $lead_name = '' ) {
	if ( class_exists( 'SCF_Contact_Form_Plugin' ) ) {
		SCF_Contact_Form_Plugin::instance()->record_erp_sync( $table_name, $submission_id, $status, $detail, $lead_name );
	}
}

