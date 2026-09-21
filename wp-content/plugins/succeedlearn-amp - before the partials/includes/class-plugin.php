<?php
/**
 * Main Plugin Class
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main Plugin Class
 */
class Plugin {

	/**
	 * @var Plugin|null
	 */
	private static $instance = null;

	/**
	 * @var Template_Manager
	 */
	private $template_manager;

	/**
	 * @var Config
	 */
	private $config;

	/**
	 * @var Admin
	 */
	private $admin;

	/**
	 * @var Performance_Optimizer
	 */
	private $performance_optimizer;

	/**
	 * @var Amp_Router
	 */
	private $amp_router;

	/**
	 * @var bool
	 */
	private $amp_output_buffer_started = false;

	/**
	 * @return Plugin
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		$this->config = new Config();
	}

	public function init() {
		if ( is_admin() ) {
			add_action( 'admin_notices', array( $this, 'maybe_ampforwp_missing_notice' ) );
		}

		$this->template_manager = new Template_Manager( $this->config );
		$this->template_manager->init();

		if ( class_exists( __NAMESPACE__ . '\\Amp_Router' ) ) {
			$this->amp_router = new Amp_Router( $this->config );
			$this->amp_router->init();
		}

		if ( is_admin() && class_exists( __NAMESPACE__ . '\\Admin' ) ) {
			$this->admin = new Admin( $this->config );
			$this->admin->init();
		}

		$this->performance_optimizer = Performance_Optimizer::get_instance();
		$this->performance_optimizer->init();
		$this->maybe_clear_stale_amp_css_cache();

		if ( class_exists( __NAMESPACE__ . '\\Form_Handler' ) ) {
			Form_Handler::init();
		}

		$this->remove_default_amp_actions();
		$this->register_hooks();

		add_action( 'init', array( $this, 'prevent_page_cache_for_logged_in_users' ), 0 );
		add_action( 'amp_post_template_footer', 'succeedlearn_amp_render_fixed_widgets', 5 );
	}

	private function maybe_clear_stale_amp_css_cache() {
		$stored = get_option( 'succeedlearn_amp_css_cache_version', '' );
		if ( (string) $stored === (string) SUCCEEDLEARN_AMP_VERSION ) {
			return;
		}
		$this->performance_optimizer->clear_cache();
		update_option( 'succeedlearn_amp_css_cache_version', SUCCEEDLEARN_AMP_VERSION, false );
	}

	private function remove_default_amp_actions() {
		add_action( 'pre_amp_render_post', array( $this, 'start_amp_output_buffer' ), 1 );
		add_action( 'pre_amp_render_post', array( $this, 'disable_w3tc_minify_for_amp' ), 1 );
		add_action( 'pre_amp_render_post', array( $this, 'prepare_custom_amp_page' ), 15 );
		add_action( 'template_redirect', array( $this, 'maybe_start_amp_output_buffer' ), 0 );
	}

	private function register_hooks() {
		add_action( 'amp_post_template_head', array( $this, 'add_preconnect_hints' ), 1 );
		add_action( 'wp', array( $this, 'register_amp_components' ) );
		add_filter( 'ampforwp_the_content_last_filter', array( $this, 'sanitize_amp_the_content' ), 20 );
		add_filter( 'ampforwp_the_content_last_filter', 'succeedlearn_amp_restore_custom_amp_css', 99 );
		add_filter( 'the_content', array( $this, 'sanitize_amp_the_content' ), 20 );
		add_action( 'template_redirect', array( $this, 'prevent_duplicate_amp_canonicals' ), 5 );
		add_action( 'wp', array( $this, 'guard_amp_page_cache_for_logged_in_users' ), 0 );
		add_filter( 'ampforwp_tree_shaking_white_list_selector', array( $this, 'whitelist_home_css_for_tree_shaking' ) );
	}

	/**
	 * Strip AMPforWP default CSS injections on our AMP templates.
	 *
	 * @param int $post_id Post ID.
	 */
	public function prepare_custom_amp_page( $post_id = 0 ) {
		unset( $post_id );
		if ( ! $this->is_amp_request() ) {
			return;
		}
		remove_action( 'amp_post_template_css', 'ampforwp_head_css' );
		remove_all_actions( 'ampforwp_admin_menu_bar_front' );
		$this->disable_ampforwp_back_to_top();
		$this->prevent_duplicate_amp_canonicals();
	}

	/**
	 * Prefer SucceedLEARN scroll-to-top; hide AMPforWP’s gray .btt.
	 */
	private function disable_ampforwp_back_to_top() {
		global $redux_builder_amp;

		if ( is_array( $redux_builder_amp ) ) {
			$redux_builder_amp['ampforwp-footer-top'] = false;
		}

		remove_action( 'ampforwp_body_beginning', 'ampforwp_back_to_top_markup' );
	}

	/**
	 * Keep SucceedLEARN layout selectors when AMPforWP tree shaking runs.
	 *
	 * @param array $white_list Whitelist.
	 * @return array
	 */
	public function whitelist_home_css_for_tree_shaking( $white_list ) {
		$selectors = array(
			'.sl-home',
			'.sl-hero',
			'.sl-section',
			'.sl-wrap',
			'.sl-btn',
			'.amp-site-header',
			'.amp-site-header__logo',
			'.amp-site-header__toggle',
			'.sl-amp-footer',
			'.sl-amp-sidebar',
			'.sl-amp-sidebar__top',
			'.sl-amp-sidebar__nav',
			'.sl-amp-sidebar__list',
			'.sl-amp-sidebar__item',
			'.sl-amp-sidebar__link',
			'.sl-amp-sidebar__accordion',
			'.sl-amp-sidebar__parent-title',
			'.sl-amp-sidebar__parent-label',
			'.sl-amp-sidebar__chevron',
			'.sl-amp-sidebar__chevron-right',
			'.sl-amp-sidebar__chevron-down',
			'.sl-amp-sidebar__children',
			'.sl-amp-sidebar__link--child',
			'.sl-amp-sidebar__footer',
			'.sl-amp-btn',
			'.slcf-form',
			'.sl-clients',
			'.sl-clients__grid',
			'.sl-clients__cell',
			'.sl-clients__cta',
			'.sl-clients__view-all',
			'.sl-clients__page-cta',
			'.sl-clients-page',
			'.sl-testimonials',
			'.sl-testimonials__grid',
			'.sl-testimonials__card',
			'.sl-card',
			'.sl-grid-2',
			'.sl-grid-3',
			'.sl-grid-4',
			'.sl-stats',
			'.sl-stat',
			'.sl-stat__value',
			'.sl-stat__label',
			'.sl-outcome-tags',
			'.sl-outcome-tag',
			'.sl-reality',
			'.sl-reality__grid',
			'.sl-reality__media',
			'.sl-reality__content',
			'.sl-scroll-top',
			'.sl-scroll-top-wrap',
			'.sl-scroll-top__icon',
			'#sl-scroll-top',
		);
		return array_merge( (array) $white_list, $selectors );
	}

	public function prevent_page_cache_for_logged_in_users() {
		if ( is_user_logged_in() && ! defined( 'DONOTCACHEPAGE' ) ) {
			define( 'DONOTCACHEPAGE', true );
		}
	}

	public function disable_w3tc_minify_for_amp() {
		if ( ! defined( 'DONOTMINIFY' ) ) {
			define( 'DONOTMINIFY', true );
		}
	}

	public function guard_amp_page_cache_for_logged_in_users() {
		if ( ! $this->is_amp_request() ) {
			return;
		}
		if ( is_user_logged_in() && ! defined( 'DONOTCACHEPAGE' ) ) {
			define( 'DONOTCACHEPAGE', true );
		}
		show_admin_bar( false );
	}

	public function start_amp_output_buffer() {
		if ( $this->amp_output_buffer_started ) {
			return;
		}
		if ( function_exists( 'succeedlearn_amp_finalize_amp_html' ) ) {
			ob_start( 'succeedlearn_amp_finalize_amp_html' );
			$this->amp_output_buffer_started = true;
		}
	}

	public function maybe_start_amp_output_buffer() {
		if ( $this->amp_output_buffer_started || ! $this->is_amp_request() ) {
			return;
		}
		$this->start_amp_output_buffer();
		$this->disable_w3tc_minify_for_amp();
	}

	public function add_preconnect_hints() {
		echo '<link rel="dns-prefetch" href="https://cdn.ampproject.org">' . "\n";
	}

	public function register_amp_components() {
		if ( ! $this->is_amp_request() ) {
			return;
		}
		global $data;
		if ( ! is_array( $data ) ) {
			$data = array();
		}
		if ( empty( $data['amp_component_scripts'] ) || ! is_array( $data['amp_component_scripts'] ) ) {
			$data['amp_component_scripts'] = array();
		}
		$scripts = array(
			'amp-sidebar'   => 'https://cdn.ampproject.org/v0/amp-sidebar-0.1.js',
			'amp-accordion' => 'https://cdn.ampproject.org/v0/amp-accordion-0.1.js',
			'amp-bind'      => 'https://cdn.ampproject.org/v0/amp-bind-0.1.js',
			'amp-form'      => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
			'amp-mustache'  => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
		);
		$data['amp_component_scripts'] = array_merge( $data['amp_component_scripts'], $scripts );
	}

	/**
	 * @param string $content Content.
	 * @return string
	 */
	public function sanitize_amp_the_content( $content ) {
		if ( ! $this->is_amp_request() || ! is_string( $content ) ) {
			return $content;
		}
		if ( function_exists( 'succeedlearn_amp_sanitize_amp_fragment' ) ) {
			return succeedlearn_amp_sanitize_amp_fragment( $content );
		}
		return $content;
	}

	public function prevent_duplicate_amp_canonicals() {
		if ( ! $this->is_amp_request() ) {
			return;
		}
		remove_action( 'wp_head', 'rel_canonical' );
		if ( defined( 'WPSEO_VERSION' ) ) {
			add_filter( 'wpseo_canonical', '__return_false', 99 );
		}
		if ( class_exists( 'RankMath' ) ) {
			add_filter( 'rank_math/frontend/canonical', '__return_false', 99 );
		}
	}

	public function maybe_ampforwp_missing_notice() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		if ( defined( 'AMPFORWP_VERSION' ) || class_exists( 'AMPFORWP_Options_Manager' ) || function_exists( 'ampforwp_is_amp_endpoint' ) ) {
			return;
		}
		echo '<div class="notice notice-warning"><p><strong>SucceedLEARN AMP:</strong> ';
		echo esc_html__( 'AMPforWP (accelerated-mobile-pages) should be installed and active for AMP templates to work.', 'succeedlearn-amp' );
		echo '</p></div>';
	}

	/**
	 * @return bool
	 */
	private function is_amp_request() {
		if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) ) {
			return succeedlearn_amp_is_serving_amp();
		}
		if ( isset( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return true;
		}
		return false;
	}

	/**
	 * @return Config
	 */
	public function get_config() {
		return $this->config;
	}
}
