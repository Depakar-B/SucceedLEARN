<?php
/**
 * Main Plugin Class
 *
 * @package ElearnPOSH\AMP
 */

namespace ElearnPOSH\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main Plugin Class
 */
class Plugin {
	/**
	 * Singleton instance
	 *
	 * @var Plugin
	 */
	private static $instance = null;

	/**
	 * Template Manager instance
	 *
	 * @var Template_Manager
	 */
	private $template_manager;

	/**
	 * Config instance
	 *
	 * @var Config
	 */
	private $config;

	/**
	 * Admin instance
	 *
	 * @var Admin
	 */
	private $admin;

	/**
	 * Performance Optimizer instance
	 *
	 * @var Performance_Optimizer
	 */
	private $performance_optimizer;

	/**
	 * AMP Router instance
	 *
	 * @var Amp_Router
	 */
	private $amp_router;

	/**
	 * Whether the outer AMP HTML output buffer is active.
	 *
	 * @var bool
	 */
	private $amp_output_buffer_started = false;

	/**
	 * Get singleton instance
	 *
	 * @return Plugin
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Private constructor
	 */
	private function __construct() {
		$this->config = new Config();
	}

	/**
	 * Initialize the plugin
	 */
	public function init() {
		if ( is_admin() ) {
			add_action( 'admin_notices', array( $this, 'maybe_ampforwp_missing_notice' ) );
		}

		// Initialize template manager
		$this->template_manager = new Template_Manager( $this->config );
		$this->template_manager->init();

		// AMPforWP: mobile/tablet AMP redirect for plugin custom pages (theme disables mobile AMP globally).
		if ( class_exists( __NAMESPACE__ . '\\Amp_Router' ) ) {
			$this->amp_router = new Amp_Router( $this->config );
			$this->amp_router->init();
		}

		// Initialize admin panel
		if ( is_admin() ) {
			$this->admin = new Admin( $this->config );
			$this->admin->init();
		}

		// Initialize performance optimizer
		$this->performance_optimizer = Performance_Optimizer::get_instance();
		$this->performance_optimizer->init();
		$this->maybe_migrate_erp_settings();
		$this->maybe_clear_stale_amp_css_cache();

		// Remove default AMPforWP injections
		$this->remove_default_amp_actions();

		// Register custom hooks
		$this->register_hooks();

		add_action( 'init', array( $this, 'prevent_page_cache_for_logged_in_users' ), 0 );
		add_action( 'init', array( $this, 'prevent_amp_page_cache' ), 0 );

		// Fixed widgets on AMP templates that call amp_post_template_footer (deduped in helper).
		add_action( 'amp_post_template_footer', 'elearnposh_amp_render_fixed_widgets', 5 );
		
		// Form handler serves AMP submissions; always init unless a unified contact plugin owns it.
		if ( ! defined( 'ELEARNPOSH_CONTACT_FORM_LOADED' ) ) {
			Form_Handler::init();
		} else {
			// Unified plugin owns AJAX; still alias erp-contact REST if that plugin missed it.
			add_action( 'rest_api_init', array( Form_Handler::class, 'register_rest_routes' ), 20 );
		}
	}

	/**
	 * Clear uploaded CSS cache after plugin updates so footer/menu style changes apply immediately.
	 */
	private function maybe_clear_stale_amp_css_cache() {
		$settings = get_option( 'elearnposh_amp_settings', array() );
		$stored   = isset( $settings['version'] ) ? (string) $settings['version'] : '';

		if ( $stored === ELEARNPOSH_AMP_VERSION ) {
			return;
		}

		$this->maybe_migrate_erp_settings();

		$this->performance_optimizer->clear_cache();

		$settings['version'] = ELEARNPOSH_AMP_VERSION;
		update_option( 'elearnposh_amp_settings', $settings );
	}

	/**
	 * Replace broken ERP API keys saved in wp_options after intranet key rotation.
	 */
	private function maybe_migrate_erp_settings() {
		$settings = get_option( 'elearnposh_amp_settings', array() );
		if ( ! is_array( $settings ) ) {
			$settings = array();
		}

		$changed     = false;
		$current     = isset( $settings['erpnext_api_key'] ) ? (string) $settings['erpnext_api_key'] : '';
		$deprecated  = class_exists( __NAMESPACE__ . '\\ERPNext' ) ? ERPNext::DEPRECATED_API_KEYS : array( 'NzAxNTJjNjk4MjQ5NzIxOjcxYzRkZGFmYTI1NzM1NA==' );
		$default_key = class_exists( __NAMESPACE__ . '\\ERPNext' ) ? ERPNext::DEFAULT_API_KEY : Config::FALLBACK_ERP_API_KEY;
		$prod_url    = 'https://intranet.succeedtech.com/api/resource/Lead';
		$current_url = isset( $settings['erpnext_api_url'] ) ? (string) $settings['erpnext_api_url'] : '';

		// wp-config overrides win (local UAT testing via ELEARNPOSH_ERP_*).
		if ( defined( 'ELEARNPOSH_ERP_API_KEY' ) && ELEARNPOSH_ERP_API_KEY ) {
			if ( $current !== (string) ELEARNPOSH_ERP_API_KEY ) {
				$settings['erpnext_api_key'] = (string) ELEARNPOSH_ERP_API_KEY;
				$changed                     = true;
			}
		} elseif ( '' === $current || in_array( $current, $deprecated, true ) ) {
			$settings['erpnext_api_key'] = $default_key;
			$changed                     = true;
		}

		if ( defined( 'ELEARNPOSH_ERP_API_URL' ) && ELEARNPOSH_ERP_API_URL ) {
			if ( $current_url !== (string) ELEARNPOSH_ERP_API_URL ) {
				$settings['erpnext_api_url'] = (string) ELEARNPOSH_ERP_API_URL;
				$changed                     = true;
			}
		} elseif ( '' === $current_url ) {
			$settings['erpnext_api_url'] = $prod_url;
			$changed                     = true;
		}

		if ( $changed ) {
			update_option( 'elearnposh_amp_settings', $settings );
		}
	}

	/**
	 * Remove default AMPforWP actions
	 */
	private function remove_default_amp_actions() {
		add_action( 'init', function() {
			remove_action( 'pre_amp_render_post', 'ampforwp_stylesheet_file_insertion', 12 );
			remove_filter( 'amp_post_template_file', 'ampforwp_custom_header', 10, 3 );
			remove_filter( 'amp_post_template_file', 'ampforwp_custom_template', 10, 3 );

			add_action( 'amp_post_template_head', function() {
				remove_action( 'amp_post_template_head', 'amp_post_template_add_fonts' );
			}, 9 );
		}, 11 );

		// Remove user notifications
		add_action( 'init', function() {
			remove_action( 'amp_post_template_body_open', 'ampforwp_user_notification' );
			remove_action( 'amp_post_template_footer', 'ampforwp_user_notification' );

			add_filter( 'ampforwp_amp_component_scripts', function( $components ) {
				if ( isset( $components['amp-user-notification'] ) ) {
					unset( $components['amp-user-notification'] );
				}
				return $components;
			}, 20 );
		}, 20 );

		// Full-page AMP validation fixes (role/tabindex, canonical, iframe, inline !important).
		add_action( 'pre_amp_render_post', array( $this, 'start_amp_output_buffer' ), 0 );
		add_action( 'pre_amp_render_post', array( $this, 'disable_w3tc_minify_for_amp' ), 0 );
	}

	/**
	 * Register plugin hooks
	 */
	private function register_hooks() {
		// Add Google Fonts
		add_action( 'amp_post_template_head', array( $this, 'add_custom_google_fonts' ) );

		// Register AMP menu scripts if needed
		add_action( 'wp', array( $this, 'register_amp_components' ) );

		// Sanitize newsletter shortcode output (legacy reset-on-success / span submit-error).
		add_filter( 'do_shortcode_tag', array( $this, 'sanitize_newsletter_shortcode_amp_markup' ), 20, 2 );

		// Sanitize post/content fragments before they are embedded in AMP templates.
		add_filter( 'ampforwp_tree_shaking_white_list_selector', array( $this, 'whitelist_page_hero_css_for_tree_shaking' ) );
		add_filter( 'ampforwp_the_content_last_filter', 'elearnposh_amp_inject_page_specific_amp_custom_css', 99 );
		add_filter( 'ampforwp_the_content_last_filter', 'elearnposh_amp_repair_amp_custom_css_syntax', 100 );
		add_filter( 'ampforwp_the_content_last_filter', 'elearnposh_amp_repair_mangled_amp_bind_markup', 101 );

		add_filter( 'ampforwp_modify_the_content', 'elearnposh_amp_sanitize_amp_fragment', 99 );
		add_filter( 'the_content', array( $this, 'sanitize_amp_the_content' ), 99 );

		// Keep rel=amphtml free of utm_* / request query junk (GSC AMP pairing).
		add_filter( 'ampforwp_url_purifier', 'elearnposh_amp_clean_amphtml_url', 99 );
		add_filter( 'ampforwp_modify_rel_canonical', 'elearnposh_amp_clean_amphtml_url', 99 );

		add_action( 'pre_amp_render_post', array( $this, 'guard_amp_page_cache_for_logged_in_users' ), 1 );
		add_action( 'pre_amp_render_post', array( $this, 'prepare_custom_amp_page' ), 15 );

		// Legacy course URLs (GSC / bookmarks) → canonical pages.
		add_action( 'template_redirect', 'elearnposh_amp_maybe_redirect_legacy_course_urls', 0 );

		// Fallback when AMPforWP does not fire pre_amp_render_post (some custom page templates).
		add_action( 'template_redirect', array( $this, 'maybe_start_amp_output_buffer' ), 0 );
		add_action( 'template_redirect', array( $this, 'disable_w3tc_minify_for_amp' ), 0 );
		add_action( 'template_redirect', array( $this, 'prevent_duplicate_amp_canonicals_on_amp' ), 1 );
	}

	/**
	 * Prevent page-cache plugins from storing AMP HTML generated while an admin is logged in.
	 */
	public function prevent_page_cache_for_logged_in_users() {
		if ( is_user_logged_in() && ! defined( 'DONOTCACHEPAGE' ) ) {
			define( 'DONOTCACHEPAGE', true );
		}
	}

	/**
	 * Disable HTML minify on AMP (W3TC minify strips head/body). Page cache remains allowed.
	 */
	public function prevent_amp_page_cache() {
		if ( ! function_exists( 'elearnposh_amp_is_serving_amp' ) || ! elearnposh_amp_is_serving_amp() ) {
			return;
		}

		$this->disable_w3tc_minify_for_amp();
	}

	/**
	 * Prevent page-cache plugins from storing AMP HTML generated while an admin is logged in.
	 *
	 * @param int $post_id Post ID.
	 */
	public function guard_amp_page_cache_for_logged_in_users( $post_id ) {
		unset( $post_id );

		$this->prevent_page_cache_for_logged_in_users();

		add_filter( 'show_admin_bar', '__return_false', 99 );
	}

	/**
	 * Wrap AMP template output with validation sanitizers.
	 *
	 * @param int $post_id Post ID.
	 */
	public function start_amp_output_buffer( $post_id ) {
		unset( $post_id );

		if ( $this->amp_output_buffer_started || ! function_exists( 'elearnposh_amp_finalize_amp_html' ) ) {
			return;
		}

		$this->amp_output_buffer_started = true;
		ob_start( 'elearnposh_amp_finalize_amp_html' );
	}

	/**
	 * Prevent W3 Total Cache HTML minify from stripping <head>/<body> on AMP pages.
	 *
	 * @param int $post_id Post ID.
	 */
	public function disable_w3tc_minify_for_amp( $post_id = 0 ) {
		unset( $post_id );

		if ( ! defined( 'DONOTMINIFY' ) ) {
			define( 'DONOTMINIFY', true );
		}
	}

	/**
	 * Strip WP admin bar and legacy AMPforWP injections on plugin custom templates.
	 *
	 * @param int $post_id Post ID.
	 */
	public function prepare_custom_amp_page( $post_id ) {
		$post_id = absint( $post_id );
		if ( ! $post_id || ! $this->config->is_plugin_custom_amp_page( $post_id ) ) {
			return;
		}

		remove_all_actions( 'ampforwp_admin_menu_bar_front' );
		remove_action( 'amp_post_template_css', 'ampforwp_head_css' );
		remove_action( 'ampforwp_after_header', 'amp_custom_banner_extension_insert_banner' );
		$this->prevent_duplicate_amp_canonicals();
	}

	/**
	 * Start the AMP output buffer on any AMP endpoint (fallback for list/archive templates).
	 */
	public function maybe_start_amp_output_buffer() {
		if ( $this->amp_output_buffer_started ) {
			return;
		}
		if ( ! function_exists( 'elearnposh_amp_is_serving_amp' ) || ! elearnposh_amp_is_serving_amp() ) {
			return;
		}

		$this->disable_w3tc_minify_for_amp();
		$this->start_amp_output_buffer( absint( get_queried_object_id() ) );
	}

	/**
	 * Detach SEO-plugin canonical output on AMP; AMPforWP already prints one via amp_post_template_head.
	 */
	public function prevent_duplicate_amp_canonicals_on_amp() {
		if ( ! function_exists( 'ampforwp_is_amp_endpoint' ) || ! ampforwp_is_amp_endpoint() ) {
			return;
		}
		$this->prevent_duplicate_amp_canonicals();
	}

	/**
	 * Detach SEO-plugin canonical output on AMP; AMPforWP already prints one via amp_post_template_head.
	 */
	private function prevent_duplicate_amp_canonicals() {
		remove_action( 'amp_post_template_head', 'rel_canonical' );

		if ( defined( 'WPSEO_VERSION' ) ) {
			remove_action( 'amp_post_template_head', 'ampforwp_yoast_canonical', 1 );
			remove_action( 'amp_post_template_head', 'ampforwp_yoast_home_canonical', 1 );
		}

		if ( defined( 'RANK_MATH_VERSION' ) ) {
			remove_action( 'amp_post_template_head', 'rank_math_print_amp_canonical', 1 );
		}

		if ( defined( 'AIOSEO_VERSION' ) ) {
			remove_action( 'amp_post_template_head', 'aioseo_amp_output_canonical', 1 );
		}
	}

	/**
	 * Sanitize WordPress post content on AMP endpoints.
	 *
	 * @param string $content Post content HTML.
	 * @return string
	 */
	public function sanitize_amp_the_content( $content ) {
		if ( ! is_string( $content ) || '' === $content ) {
			return $content;
		}
		if ( function_exists( 'elearnposh_amp_is_serving_amp' ) && elearnposh_amp_is_serving_amp() && function_exists( 'elearnposh_amp_sanitize_amp_fragment' ) ) {
			return elearnposh_amp_sanitize_amp_fragment( $content );
		}
		return $content;
	}

	/**
	 * Strip invalid AMP form attributes from newsletter shortcodes.
	 *
	 * @param string $output Shortcode HTML.
	 * @param string $tag    Shortcode tag.
	 * @return string
	 */
	public function sanitize_newsletter_shortcode_amp_markup( $output, $tag ) {
		$newsletter_tags = array( 'newsletter_subscribe', 'newsletter_subscription_footer', 'newsletter_subscritpion_footer' );
		if ( ! in_array( $tag, $newsletter_tags, true ) ) {
			return $output;
		}
		if ( function_exists( 'elearnposh_amp_sanitize_amp_form_markup' ) ) {
			return elearnposh_amp_sanitize_amp_form_markup( $output );
		}
		if ( function_exists( 'ns_sanitize_amp_form_markup' ) ) {
			return ns_sanitize_amp_form_markup( $output );
		}
		return $output;
	}

	/**
	 * Add custom Google Fonts for AMP
	 *
	 * External stylesheets are invalid in AMP HTML. Preconnect is handled by
	 * Performance_Optimizer; font stacks in amp-custom use system/fallback faces.
	 *
	 * @param object $amp_template AMP template object.
	 */
	public function add_custom_google_fonts( $amp_template ) {
		unset( $amp_template );
	}

	/**
	 * Register AMP components needed for templates
	 */
	public function register_amp_components() {
		global $data;

		// Register amp-accordion for menu
		if ( has_nav_menu( 'amp-menu' ) ) {
			if ( empty( $data['amp_component_scripts']['amp-accordion'] ) ) {
				$data['amp_component_scripts']['amp-accordion'] = 'https://cdn.ampproject.org/v0/amp-accordion-0.1.js';
			}
		}

		// Register amp-sidebar
		if ( empty( $data['amp_component_scripts']['amp-sidebar'] ) ) {
			$data['amp_component_scripts']['amp-sidebar'] = 'https://cdn.ampproject.org/v0/amp-sidebar-0.1.js';
		}

		// Scroll-to-top visibility on AMP pages.
		if ( empty( $data['amp_component_scripts']['amp-bind'] ) ) {
			$data['amp_component_scripts']['amp-bind'] = 'https://cdn.ampproject.org/v0/amp-bind-0.1.js';
		}

		if ( empty( $data['amp_component_scripts']['amp-position-observer'] ) ) {
			$data['amp_component_scripts']['amp-position-observer'] = 'https://cdn.ampproject.org/v0/amp-position-observer-0.1.js';
		}

		if ( empty( $data['amp_component_scripts']['amp-animation'] ) ) {
			$data['amp_component_scripts']['amp-animation'] = 'https://cdn.ampproject.org/v0/amp-animation-0.1.js';
		}

		// Register amp-social-share
		if ( empty( $data['amp_component_scripts']['amp-social-share'] ) ) {
			$data['amp_component_scripts']['amp-social-share'] = 'https://cdn.ampproject.org/v0/amp-social-share-0.1.js';
		}
	}

	/**
	 * Warn when AMPforWP is missing — custom templates only load on AMP endpoints.
	 */
	public function maybe_ampforwp_missing_notice() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		if ( function_exists( 'ampforwp_is_amp_endpoint' ) || defined( 'AMPFORWP_PLUGIN_DIR' ) ) {
			return;
		}
		echo '<div class="notice notice-warning"><p><strong>eLearnPOSH AMP:</strong> ';
		echo esc_html__( 'Accelerated Mobile Pages (AMP for WP) is not active. Custom AMP layouts only appear on AMP URLs (e.g. add ?amp=1 or use a mobile/tablet device).', 'elearnposh-amp' );
		echo '</p></div>';
	}

	/**
	 * Preserve page hero spacing when AMPforWP CSS tree shaking runs.
	 *
	 * @param array $white_list Selector patterns for ampforwp_white_list_selectors().
	 * @return array
	 */
	public function whitelist_page_hero_css_for_tree_shaking( $white_list ) {
		$heroes = array(
			'.ep-contact-hero',
			'.ep-about-hero',
			'.ep-enterprise-hero',
			'.ep-clients-hero',
			'.elp-legal-hero',
		);

		return array_merge( (array) $white_list, $heroes );
	}

	/**
	 * Get config instance
	 *
	 * @return Config
	 */
	public function get_config() {
		return $this->config;
	}

	/**
	 * Get template manager instance
	 *
	 * @return Template_Manager
	 */
	public function get_template_manager() {
		return $this->template_manager;
	}

	/**
	 * Get performance optimizer instance
	 *
	 * @return Performance_Optimizer
	 */
	public function get_performance_optimizer() {
		return $this->performance_optimizer;
	}
}


