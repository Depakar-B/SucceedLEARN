<?php
/**
 * Non-AMP site footer renderer.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom footer for Genesis (replaces Elementor HFE footer).
 */
class AHF_Footer {

	/**
	 * Register hooks.
	 */
	public static function init() {
		add_action( 'save_post_course', array( 'AHF_Footer_Items', 'flush_complete_solutions_cache' ) );
		add_action( 'save_post_lp_course', array( 'AHF_Footer_Items', 'flush_complete_solutions_cache' ) );
		add_action( 'edited_course_category', array( 'AHF_Footer_Items', 'flush_complete_solutions_cache' ) );
		add_action( 'created_course_category', array( 'AHF_Footer_Items', 'flush_complete_solutions_cache' ) );
		add_action( 'delete_course_category', array( 'AHF_Footer_Items', 'flush_complete_solutions_cache' ) );
		add_action( 'edited_lp_course_category', array( 'AHF_Footer_Items', 'flush_complete_solutions_cache' ) );
		add_action( 'created_lp_course_category', array( 'AHF_Footer_Items', 'flush_complete_solutions_cache' ) );
		add_action( 'delete_lp_course_category', array( 'AHF_Footer_Items', 'flush_complete_solutions_cache' ) );

		if ( AHF_AMP::is_amp() || is_admin() || ! AHF_Config::feature_enabled( 'footer' ) ) {
			return;
		}

		add_action( 'wp', array( __CLASS__, 'prepare_genesis_footer' ), 99 );
		add_action( 'genesis_footer', array( __CLASS__, 'render' ), 16 );
		add_action( 'ahf_render_site_footer', array( __CLASS__, 'render' ) );
		add_action( 'epsh_render_site_footer', array( __CLASS__, 'render' ) ); // BC.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ), 110 );
		add_filter( 'body_class', array( __CLASS__, 'body_class' ) );
	}

	/**
	 * Whether the custom footer should render on this request.
	 */
	public static function should_show() {
		if ( AHF_AMP::is_amp() || is_admin() || ! AHF_Config::feature_enabled( 'footer' ) ) {
			return false;
		}

		if ( is_page_template( 'page-templates/landing.php' ) ) {
			return false;
		}

		return (bool) apply_filters( 'ahf_footer_should_show', true );
	}

	/**
	 * Strip default Genesis / HFE footer output before render.
	 */
	public static function prepare_genesis_footer() {
		if ( ! self::should_show() ) {
			return;
		}

		if ( function_exists( 'hfe_footer_enabled' ) && hfe_footer_enabled() && class_exists( 'HFE_Genesis_Compat' ) ) {
			$hfe = HFE_Genesis_Compat::instance();
			remove_action( 'template_redirect', array( $hfe, 'genesis_setup_footer' ) );
			remove_action( 'genesis_footer', array( $hfe, 'genesis_footer_markup_open' ), 16 );
			remove_action( 'genesis_footer', array( $hfe, 'genesis_footer_markup_close' ), 25 );
			remove_action( 'genesis_footer', array( 'Header_Footer_Elementor', 'get_footer_content' ), 16 );
		}

		if ( function_exists( 'hfe_is_before_footer_enabled' ) && hfe_is_before_footer_enabled() ) {
			remove_action( 'genesis_footer', array( 'Header_Footer_Elementor', 'get_before_footer_content' ), 16 );
		}

		remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
		remove_action( 'genesis_footer', 'genesis_do_footer' );
		remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
		remove_action( 'genesis_footer', 'genesis_do_subnav', 10 );
	}

	/**
	 * Output footer markup.
	 */
	public static function render() {
		if ( ! self::should_show() ) {
			return;
		}

		$template = AHF_PLUGIN_DIR . 'templates/footer.php';
		if ( is_readable( $template ) ) {
			include $template;
		}
	}

	/**
	 * Enqueue footer styles.
	 */
	public static function enqueue_assets() {
		if ( ! self::should_show() ) {
			return;
		}

		wp_enqueue_style(
			'epsh-footer',
			AHF_PLUGIN_URL . 'assets/css/footer.css',
			array(),
			AHF_VERSION,
			'all'
		);
	}

	/**
	 * @param string[] $classes Body classes.
	 * @return string[]
	 */
	public static function body_class( $classes ) {
		if ( self::should_show() ) {
			$classes[] = 'epsh-has-custom-footer';
		}

		return $classes;
	}
}
