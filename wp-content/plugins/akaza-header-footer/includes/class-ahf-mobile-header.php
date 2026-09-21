<?php
/**
 * Non-AMP mobile header: assets + footer markup.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Mobile header bar and slide-out navigation.
 */
class AHF_Mobile_Header {

	/**
	 * Register hooks.
	 */
	public static function init() {
		add_action( 'after_setup_theme', array( __CLASS__, 'disable_legacy_mobile_hooks' ), 100 );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ), 30 );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'disable_legacy_mobile_assets' ), 999 );
		add_action( 'wp_footer', array( __CLASS__, 'disable_legacy_mobile_hooks' ), 1 );
		add_action( 'wp_body_open', array( __CLASS__, 'render' ), 5 );
		add_action( 'wp_footer', array( __CLASS__, 'render' ), 5 );
		add_filter( 'body_class', array( __CLASS__, 'body_class' ) );
	}

	/**
	 * @param string[] $classes Body classes.
	 * @return string[]
	 */
	public static function body_class( $classes ) {
		if ( self::should_load() ) {
			$classes[] = 'epsh-has-mobile-header';
		}
		return $classes;
	}

	/**
	 * Stop legacy child-theme mobile header hooks when plugin is active.
	 */
	public static function disable_legacy_mobile_hooks() {
		remove_action( 'wp_enqueue_scripts', 'ep_header_mobile_enqueue', 30 );
		remove_action( 'wp_footer', 'ep_header_mobile_render', 5 );
		remove_action( 'wp_body_open', 'ep_header_mobile_render', 5 );
		remove_action( 'wp_body_open', 'ep_header_mobile_render', 10 );
		remove_action( 'wp_footer', 'ep_header_mobile_render', 10 );
		remove_action( 'wp_footer', 'custom_non_amp_mobile_sidebar_header', 10 );
	}

	/**
	 * Dequeue legacy mobile assets to avoid duplicate click handlers.
	 */
	public static function disable_legacy_mobile_assets() {
		wp_dequeue_style( 'ep-header-mobile' );
		wp_deregister_style( 'ep-header-mobile' );
		wp_dequeue_script( 'ep-header-mobile' );
		wp_deregister_script( 'ep-header-mobile' );
		wp_dequeue_script( 'ep-mobile-header' );
		wp_deregister_script( 'ep-mobile-header' );
	}

	/**
	 * Whether mobile header should load.
	 */
	public static function should_load() {
		if ( AHF_AMP::is_amp() || is_admin() ) {
			return false;
		}

		return (bool) apply_filters( 'ahf_mobile_header_should_load', true );
	}

	/**
	 * Enqueue mobile CSS/JS.
	 */
	public static function enqueue() {
		if ( ! self::should_load() ) {
			return;
		}

		$config = AHF_Config::get();
		$bp     = (int) $config['breakpoint'];

		wp_enqueue_style(
			'epsh-mobile-header',
			AHF_PLUGIN_URL . 'assets/css/mobile-header.css',
			array(),
			AHF_VERSION
		);

		wp_style_add_data( 'epsh-mobile-header', 'epsh-breakpoint', (string) $bp );

		$min_desktop = $bp + 1;
		wp_add_inline_style(
			'epsh-mobile-header',
			sprintf(
				':root { --epsh-breakpoint: %1$dpx; --epsh-bar-height: 74px; }
				@media (min-width: %2$dpx) {
					.epsh-mobile-only,
					.mobile-only.ep-mobile-header-wrap { display: none !important; }
				}
				@media (max-width: %1$dpx) {
					body.epsh-has-mobile-header { padding-top: var(--epsh-bar-height); }
					body.epsh-menu-open { overflow: hidden; }
					body.epsh-has-mobile-header .site-header,
					body.epsh-has-mobile-header .genesis-header,
					body.epsh-has-mobile-header .genesis-header .wrap,
					body.epsh-has-mobile-header #mega-menu-wrap-primary,
					body.epsh-has-mobile-header .title-area { display: none !important; }
					body.epsh-has-mobile-header #sidebar-menu-btn { display: none !important; }
					body.epsh-has-mobile-header .mobile-only.ep-mobile-header-wrap { display: none !important; }
					body.epsh-has-mobile-header #custom-mobile-header:not(.epsh-mobile-bar) { display: none !important; }
					body.epsh-has-mobile-header .epsh-mobile-only,
					body.epsh-has-mobile-header .epsh-mobile-header-wrap { display: block !important; }
					#epsh-mobile-menu,
					.epsh-mobile-menu,
					#mobile-menu,
					.ep-mobile-menu {
						display: block !important;
						visibility: visible !important;
					}
					.epsh-mobile-menu .epsh-mobile-nav-list li {
						margin: 0 !important;
						padding: 0 !important;
					}
					.epsh-mobile-menu .epsh-mobile-nav-list[data-depth="0"] > li > .epsh-menu-link,
					.epsh-mobile-menu .epsh-mobile-nav-list[data-depth="0"] > li > .epsh-submenu-toggle,
					.epsh-mobile-menu .epsh-mobile-nav-list[data-depth="1"][data-variant="flat"] > li > .epsh-menu-link,
					.epsh-mobile-menu .epsh-mobile-nav-list[data-depth="1"][data-variant="flat"] > li > .epsh-submenu-toggle {
						font-size: 15px !important;
						font-weight: 500 !important;
						padding: 14px 20px !important;
						border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
					}
					.epsh-mobile-menu .epsh-menu-link--indent,
					.epsh-mobile-menu .epsh-mobile-nav-list[data-variant="indent"] > li > .epsh-menu-link,
					.epsh-mobile-menu .epsh-mobile-nav-list[data-depth="2"] > li > .epsh-menu-link {
						font-size: 14px !important;
						font-weight: 400 !important;
						padding: 14px 20px 14px 40px !important;
						border-bottom: none !important;
					}
				}',
				$bp,
				$min_desktop
			)
		);

		wp_enqueue_script(
			'epsh-mobile-header',
			AHF_PLUGIN_URL . 'assets/js/mobile-header.js',
			array(),
			AHF_VERSION,
			true
		);

		wp_localize_script(
			'epsh-mobile-header',
			'ahfMobileHeader',
			array(
				'strings' => array(
					'openMenu'  => __( 'Open menu', 'akaza-header-footer' ),
					'closeMenu' => __( 'Close menu', 'akaza-header-footer' ),
				),
			)
		);
	}

	/**
	 * Output mobile header template.
	 */
	public static function render() {
		static $rendered = false;

		if ( $rendered || ! self::should_load() ) {
			return;
		}

		$template = AHF_PLUGIN_DIR . 'templates/mobile-header.php';

		if ( is_readable( $template ) ) {
			include $template;
			$rendered = true;
		}
	}
}
