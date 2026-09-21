<?php
/**
 * Header notification bar (desktop: inside site header, mobile: bottom strip).
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Top bar notification integrated into the site header.
 */
class AHF_Top_Bar {

	/**
	 * Register hooks.
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'maybe_migrate_legacy_options' ), 5 );
		add_action( 'wp_head', array( __CLASS__, 'output_critical_css' ), 1 );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ), 5 );
		add_action( 'after_setup_theme', array( __CLASS__, 'register_genesis_hooks' ), 25 );
		add_action( 'wp_footer', array( __CLASS__, 'render_mobile' ), 4 );
		add_filter( 'body_class', array( __CLASS__, 'body_class' ) );
	}

	/**
	 * Place the desktop bar inside the header, below the main nav row.
	 *
	 * genesis_header priority 1 runs before genesis_header_markup_open (5), which
	 * previously output the bar as a sibling before <header> and caused a visible gap.
	 */
	public static function register_genesis_hooks() {
		if ( ! function_exists( 'genesis_header_markup_close' ) ) {
			add_action( 'genesis_header', array( __CLASS__, 'render_desktop' ), 14 );
			return;
		}

		remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
		add_action( 'genesis_header', array( __CLASS__, 'finish_genesis_header_markup' ), 15 );
	}

	/**
	 * Close the header wrap, render the desktop top bar, then close </header>.
	 */
	public static function finish_genesis_header_markup() {
		genesis_structural_wrap( 'header', 'close' );

		if ( self::should_show() ) {
			self::render_markup( 'desktop' );
		}

		genesis_markup(
			array(
				'close'   => '</header>',
				'context' => 'site-header',
			)
		);
	}

	/**
	 * Import settings from the old Top Bar plugin once.
	 */
	public static function maybe_migrate_legacy_options() {
		if ( get_option( 'ahf_topbar_migrated' ) ) {
			return;
		}

		$legacy_status = get_option( 'tpbr_status' );
		if ( false === $legacy_status && false === get_option( 'tpbr_message' ) ) {
			update_option( 'ahf_topbar_migrated', 1 );
			return;
		}

		$settings = AHF_Config::get_settings();
		$map      = array(
			'top_bar_status'       => ( 'active' === $legacy_status ) ? 'active' : 'inactive',
			'top_bar_message'      => (string) get_option( 'tpbr_message', '' ),
			'top_bar_color'        => sanitize_hex_color( get_option( 'tpbr_color' ) ) ?: '#12bece',
			'top_bar_show_button'  => ( 'button' === get_option( 'tpbr_yn_button' ) ) ? 'yes' : 'no',
			'top_bar_btn_text'     => (string) get_option( 'tpbr_btn_text', '' ),
			'top_bar_btn_url'      => (string) get_option( 'tpbr_btn_url', '' ),
			'top_bar_btn_behavior' => (string) get_option( 'tpbr_btn_behavior', 'samewindow' ),
			'top_bar_visibility'   => (string) get_option( 'tpbr_guests_or_users', 'all' ),
		);

		$settings = array_merge( $settings, $map );
		$settings['top_bar'] = ( 'active' === $legacy_status ) ? 'yes' : $settings['top_bar'];

		update_option( AHF_OPTION_SETTINGS, $settings );
		update_option( 'ahf_topbar_migrated', 1 );
	}

	/**
	 * @param string[] $classes Body classes.
	 * @return string[]
	 */
	public static function body_class( $classes ) {
		if ( self::should_show() ) {
			$classes[] = 'epsh-has-top-bar';
		}
		return $classes;
	}

	/**
	 * Whether the bar should render for the current visitor.
	 */
	public static function should_show() {
		if ( AHF_AMP::is_amp() || is_admin() || ! AHF_Config::feature_enabled( 'top_bar' ) ) {
			return false;
		}

		$bar = AHF_Config::get_top_bar();
		if ( empty( $bar['message'] ) ) {
			return false;
		}

		if ( self::is_current_page_excluded( $bar['excluded_ids'] ) ) {
			return false;
		}

		$show = self::user_can_see( $bar['visibility'] );

		return (bool) apply_filters( 'ahf_top_bar_should_show', $show, $bar );
	}

	/**
	 * @param int[] $excluded_ids Post/page IDs where the bar is hidden.
	 */
	private static function is_current_page_excluded( $excluded_ids ) {
		if ( empty( $excluded_ids ) ) {
			return false;
		}

		$excluded_ids = array_map( 'absint', (array) $excluded_ids );
		$current_id   = absint( get_queried_object_id() );

		if ( $current_id && in_array( $current_id, $excluded_ids, true ) ) {
			return true;
		}

		return (bool) apply_filters( 'ahf_top_bar_is_page_excluded', false, $excluded_ids, $current_id );
	}

	/**
	 * @param string $visibility all|guests|users.
	 */
	private static function user_can_see( $visibility ) {
		if ( 'guests' === $visibility ) {
			return ! is_user_logged_in();
		}
		if ( 'users' === $visibility ) {
			return is_user_logged_in();
		}
		return true;
	}

	/**
	 * @return string
	 */
	private static function button_shade( $hex ) {
		$hex = ltrim( $hex, '#' );
		if ( 6 !== strlen( $hex ) ) {
			return '#0e9aaa';
		}
		$r = max( 0, min( 255, ( hexdec( substr( $hex, 0, 2 ) ) - 31 ) ) );
		$g = max( 0, min( 255, ( hexdec( substr( $hex, 2, 2 ) ) - 31 ) ) );
		$b = max( 0, min( 255, ( hexdec( substr( $hex, 4, 2 ) ) - 31 ) ) );
		return sprintf( '#%02x%02x%02x', $r, $g, $b );
	}

	/**
	 * Critical layout CSS in <head> so the bar does not flash misaligned on slow connections.
	 */
	public static function output_critical_css() {
		if ( ! self::should_show() ) {
			return;
		}

		$config    = AHF_Config::get();
		$bar       = AHF_Config::get_top_bar();
		$bp        = (int) $config['breakpoint'];
		$min       = $bp + 1;
		$btn_color = ! empty( $bar['btn_color'] ) ? $bar['btn_color'] : self::button_shade( $bar['color'] );
		$bg        = esc_attr( $bar['color'] );
		$btn       = esc_attr( $btn_color );

		printf(
			'<style id="epsh-top-bar-critical">:root{--epsh-topbar-bg:%1$s;--epsh-topbar-btn:%2$s;--epsh-header-content-max:1290px}'
			. '@media(min-width:%3$dpx){'
			. 'body.epsh-has-top-bar .site-header,body.epsh-has-top-bar .genesis-header{display:flex!important;flex-direction:column!important;align-items:stretch!important;flex-wrap:nowrap!important;gap:0!important}'
			. 'body.epsh-has-top-bar .site-header>.wrap,body.epsh-has-top-bar .genesis-header>.wrap{flex:0 0 auto;width:100%%!important;max-width:var(--epsh-header-content-max,1290px)!important;padding-left:var(--epsh-header-pad-x,16px)!important;padding-right:var(--epsh-header-pad-x,16px)!important;margin-left:auto!important;margin-right:auto!important;order:1!important;padding-bottom:4px!important;box-sizing:border-box!important}'
			. 'body.epsh-has-top-bar .site-header>.epsh-top-bar--header,'
			. 'body.epsh-has-top-bar .genesis-header>.epsh-top-bar--header,'
			. 'body.epsh-has-top-bar .site-header .epsh-top-bar--header,'
			. 'body.epsh-has-top-bar .genesis-header .epsh-top-bar--header{'
			. 'display:block!important;flex:0 0 auto!important;order:2!important;width:100%%!important;max-width:100%%!important;'
			. 'margin:0!important;background:%1$s!important;color:#fff!important;box-sizing:border-box!important}'
			. '.epsh-top-bar--header .epsh-top-bar__inner{display:block;width:100%%;max-width:var(--epsh-header-content-max,1290px);margin-left:auto;margin-right:auto;text-align:center;padding:3px 16px 4px;line-height:1.45;box-sizing:border-box}'
			. '.epsh-top-bar--header .epsh-top-bar__message{display:inline;margin:0;font-size:15px;line-height:inherit;color:#fff}'
			. '.epsh-top-bar--header .epsh-top-bar__actions{display:inline}'
			. '.epsh-top-bar--header .epsh-top-bar__cta{display:inline-block;margin:1px 0 0 14px;padding:0 12px 1px;border-radius:3px;background:%2$s;color:#fff!important;text-decoration:none;white-space:nowrap}'
			. '.epsh-top-bar--mobile{display:none!important}}'
			. '@media(max-width:%4$dpx){.epsh-top-bar--header{display:none!important}}</style>',
			$bg,
			$btn,
			$min,
			$bp
		);
	}

	/**
	 * Enqueue top bar assets.
	 */
	public static function enqueue() {
		if ( ! self::should_show() ) {
			return;
		}

		$config = AHF_Config::get();
		$bar       = AHF_Config::get_top_bar();
		$bp        = (int) $config['breakpoint'];
		$min       = $bp + 1;
		$btn_color = ! empty( $bar['btn_color'] ) ? $bar['btn_color'] : self::button_shade( $bar['color'] );

		wp_enqueue_style(
			'epsh-top-bar',
			AHF_PLUGIN_URL . 'assets/css/top-bar.css',
			array(),
			AHF_VERSION
		);

		wp_add_inline_style(
			'epsh-top-bar',
			sprintf(
				':root {
					--epsh-topbar-bg: %1$s;
					--epsh-topbar-btn: %2$s;
					--epsh-header-content-max: 1290px;
				}
				@media (min-width: %3$dpx) {
					body.epsh-has-top-bar .site-header,
					body.epsh-has-top-bar .genesis-header {
						display: flex !important;
						flex-direction: column !important;
						align-items: stretch !important;
						flex-wrap: nowrap !important;
						gap: 0 !important;
					}
					body.epsh-has-top-bar .site-header > .wrap,
					body.epsh-has-top-bar .genesis-header > .wrap {
						flex: 0 0 auto;
						width: 100%% !important;
						max-width: var(--epsh-header-content-max, 1290px) !important;
						padding-left: var(--epsh-header-pad-x, 16px) !important;
						padding-right: var(--epsh-header-pad-x, 16px) !important;
						margin-left: auto !important;
						margin-right: auto !important;
						order: 1 !important;
						padding-bottom: 4px !important;
						box-sizing: border-box !important;
					}
					body.epsh-has-top-bar .site-header .epsh-top-bar--header,
					body.epsh-has-top-bar .genesis-header .epsh-top-bar--header,
					body.epsh-has-top-bar .site-header > .epsh-top-bar--header,
					body.epsh-has-top-bar .genesis-header > .epsh-top-bar--header {
						display: block !important;
						flex: 0 0 auto !important;
						order: 2 !important;
						width: 100%% !important;
						max-width: 100%% !important;
						margin: 0 !important;
						background: var(--epsh-topbar-bg) !important;
						box-sizing: border-box !important;
					}
					body.epsh-has-top-bar .site-header:not(.epsh-header-hidden) .epsh-top-bar--header,
					body.epsh-has-top-bar .genesis-header:not(.epsh-header-hidden) .epsh-top-bar--header {
						visibility: visible !important;
						opacity: 1 !important;
					}
					body.epsh-has-top-bar .site-header.epsh-header-hidden .epsh-top-bar--header,
					body.epsh-has-top-bar .genesis-header.epsh-header-hidden .epsh-top-bar--header {
						display: none !important;
						visibility: hidden !important;
						opacity: 0 !important;
					}
					.epsh-top-bar--mobile { display: none !important; }
				}
				@media (max-width: %4$dpx) {
					.epsh-top-bar--header { display: none !important; }
					.epsh-top-bar--mobile {
						display: block;
						position: fixed;
						left: 0;
						right: 0;
						bottom: 0;
						z-index: 99990;
						width: 100%%;
						max-width: 100vw;
						box-sizing: border-box;
						overflow: hidden;
						background: var(--epsh-topbar-bg);
						color: #fff;
						box-shadow: 0 -4px 16px rgba(0, 0, 0, 0.35);
					}
					body.epsh-has-top-bar {
						padding-bottom: calc(var(--epsh-topbar-mobile-height, 52px) + env(safe-area-inset-bottom, 0px));
					}
					body.epsh-menu-open.epsh-has-top-bar { padding-bottom: 0; }
				}',
				esc_attr( $bar['color'] ),
				esc_attr( $btn_color ),
				$min,
				$bp
			)
		);

		wp_register_script( 'epsh-top-bar', '', array(), AHF_VERSION, true );
		wp_enqueue_script( 'epsh-top-bar' );
		wp_add_inline_script(
			'epsh-top-bar',
			sprintf(
				'(function () {
					var mobileMax = %1$d;

					function setMobileBarHeight() {
						var bar = document.querySelector(".epsh-top-bar--mobile");
						if (!bar || !window.matchMedia("(max-width: " + mobileMax + "px)").matches) {
							document.documentElement.style.removeProperty("--epsh-topbar-mobile-height");
							return;
						}
						var h = Math.ceil(bar.getBoundingClientRect().height || 0);
						if (h > 0) {
							document.documentElement.style.setProperty("--epsh-topbar-mobile-height", h + "px");
						}
					}

					function initTopBar() {
						setMobileBarHeight();
					}

					if (window.ResizeObserver) {
						var ro = new ResizeObserver(setMobileBarHeight);
						document.addEventListener("DOMContentLoaded", function () {
							var bar = document.querySelector(".epsh-top-bar--mobile");
							if (bar) { ro.observe(bar); }
							initTopBar();
						});
					}
					window.addEventListener("load", initTopBar);
					window.addEventListener("resize", initTopBar);
					document.addEventListener("DOMContentLoaded", initTopBar);
				})();',
				$bp
			)
		);
	}

	/**
	 * Desktop bar — last element inside Genesis header (above closing tag).
	 */
	public static function render_desktop() {
		if ( ! self::should_show() ) {
			return;
		}

		self::render_markup( 'desktop' );
	}

	/**
	 * Mobile bar — fixed bottom strip.
	 */
	public static function render_mobile() {
		if ( ! self::should_show() ) {
			return;
		}

		self::render_markup( 'mobile' );
	}

	/**
	 * @param string $placement desktop|mobile.
	 */
	private static function render_markup( $placement ) {
		$bar = AHF_Config::get_top_bar();
		if ( empty( $bar['btn_color'] ) ) {
			$bar['btn_color'] = self::button_shade( $bar['color'] );
		}

		$template = AHF_PLUGIN_DIR . 'templates/top-bar.php';
		if ( ! is_readable( $template ) ) {
			return;
		}

		include $template;
	}
}
