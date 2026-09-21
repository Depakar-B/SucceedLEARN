<?php
/**
 * Genesis primary/secondary nav positioning.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Repositions Genesis navigation when Genesis is active.
 */
class AHF_Genesis_Layout {

	/**
	 * Register hooks.
	 */
	public static function init() {
		add_action( 'after_setup_theme', array( __CLASS__, 'setup' ), 20 );
		add_filter( 'wp_nav_menu_args', array( __CLASS__, 'secondary_menu_args' ) );
		add_filter( 'body_class', array( __CLASS__, 'body_class' ) );
		add_action( 'wp_head', array( __CLASS__, 'critical_header_css' ), 2 );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_sticky_header_assets' ), 40 );
	}

	/**
	 * Server-side header layout classes (avoid JS-driven layout shifts).
	 *
	 * @param string[] $classes Body classes.
	 * @return string[]
	 */
	public static function body_class( $classes ) {
		if ( AHF_AMP::is_amp() || is_admin() || ! AHF_Config::feature_enabled( 'genesis_layout' ) ) {
			return $classes;
		}

		$classes[] = 'epsh-has-fixed-header';

		if ( AHF_Config::feature_enabled( 'smart_header_scroll' ) ) {
			$classes[] = 'epsh-smart-header';
		}

		return $classes;
	}

	/**
	 * Reserve header space and disable transitions during first paint.
	 */
	public static function critical_header_css() {
		if ( AHF_AMP::is_amp() || is_admin() || ! AHF_Config::feature_enabled( 'genesis_layout' ) ) {
			return;
		}

		$desktop_min = (int) AHF_Config::get()['breakpoint'] + 1;
		$offset      = 96;

		// Top bar (webinar / promo banner) grows the fixed header; reserve enough
		// space before JS measures so content is not tucked under the taller bar.
		if ( class_exists( 'AHF_Top_Bar' ) && AHF_Top_Bar::should_show() ) {
			$offset += 48;
		}

		$offset = (int) apply_filters( 'ahf_default_header_offset', $offset );

		printf(
			'<style id="epsh-header-critical">html{margin-top:0!important;overflow-x:clip!important}body.epsh-has-fixed-header,body.epsh-smart-header{overflow-x:clip!important}:root{--epsh-header-pad-x:16px;--epsh-header-content-max:1290px}@media (min-width:%1$dpx){:root{--epsh-desktop-header-offset:%2$dpx;--epsh-header-wrap-pad:10px;--epsh-header-logo-max-h:56px}body.epsh-has-fixed-header{scroll-padding-top:var(--epsh-desktop-header-offset)}body.epsh-smart-header .site-header,body.epsh-smart-header .genesis-header{width:100%%!important;max-width:none!important;padding-left:0!important;padding-right:0!important;box-sizing:border-box}body.epsh-custom-desktop-nav .site-header>.wrap,body.epsh-custom-desktop-nav .genesis-header>.wrap,body.epsh-has-top-bar .site-header>.wrap,body.epsh-has-top-bar .genesis-header>.wrap,body.epsh-smart-header .site-header .wrap,body.epsh-smart-header .genesis-header .wrap{width:100%%!important;max-width:var(--epsh-header-content-max,1290px)!important;padding-left:var(--epsh-header-pad-x)!important;padding-right:var(--epsh-header-pad-x)!important;margin-left:auto!important;margin-right:auto!important;box-sizing:border-box!important}.epsh-top-bar--header .epsh-top-bar__inner{width:100%%!important;max-width:var(--epsh-header-content-max,1290px)!important;margin-left:auto!important;margin-right:auto!important;box-sizing:border-box!important}}html.epsh-header-booting body.epsh-smart-header .site-header,html.epsh-header-booting body.epsh-smart-header .genesis-header,html.epsh-header-booting body.epsh-smart-header .site-header .wrap,html.epsh-header-booting body.epsh-smart-header .genesis-header .wrap,html.epsh-header-booting body.epsh-smart-header .title-area img{transition:none!important}</style>' . "\n",
			$desktop_min,
			$offset
		);
		echo "<script>document.documentElement.classList.add('epsh-header-booting');</script>\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Hook Genesis actions only if Genesis is loaded.
	 */
	public static function setup() {
		if ( ! function_exists( 'genesis_do_nav' ) ) {
			return;
		}

		remove_action( 'genesis_after_header', 'genesis_do_nav' );
		remove_action( 'genesis_header', 'genesis_do_nav', 12 );

		if ( AHF_Config::feature_enabled( 'custom_desktop_menu' ) ) {
			add_action( 'genesis_header', array( 'AHF_Custom_Nav', 'render' ), 12 );
		} else {
			add_action( 'genesis_header', 'genesis_do_nav', 12 );
		}

		if ( function_exists( 'genesis_do_subnav' ) && ! AHF_Config::feature_enabled( 'footer' ) ) {
			remove_action( 'genesis_after_header', 'genesis_do_subnav' );
			add_action( 'genesis_footer', 'genesis_do_subnav', 10 );
		}
	}

	/**
	 * Limit secondary menu to one level.
	 *
	 * @param array $args Menu args.
	 * @return array
	 */
	public static function secondary_menu_args( $args ) {
		if ( isset( $args['theme_location'] ) && 'secondary' === $args['theme_location'] ) {
			$args['depth'] = 1;
		}
		return $args;
	}

	/**
	 * Desktop header positioning + smart hide/show on scroll.
	 */
	public static function enqueue_sticky_header_assets() {
		if ( AHF_AMP::is_amp() || is_admin() ) {
			return;
		}

		$config           = AHF_Config::get();
		$breakpoint       = (int) $config['breakpoint'];
		$desktop_min      = $breakpoint + 1;
		$smart_scroll     = AHF_Config::feature_enabled( 'smart_header_scroll' );

		wp_enqueue_style(
			'epsh-header-shell',
			AHF_PLUGIN_URL . 'assets/css/header-shell.css',
			array(),
			AHF_VERSION
		);

		$css = sprintf(
			'@media (min-width: %1$dpx) {
				body.epsh-has-fixed-header .site-header,
				body.epsh-has-fixed-header .genesis-header {
					position: fixed !important;
					top: 0 !important;
					left: 0 !important;
					right: 0 !important;
					width: 100%% !important;
					z-index: 99997 !important;
				}
				body.admin-bar.epsh-has-fixed-header .site-header,
				body.admin-bar.epsh-has-fixed-header .genesis-header {
					top: 32px !important;
				}
				body.epsh-has-fixed-header .epsh-header-spacer {
					display: none !important;
					height: 0 !important;
				}
				body.epsh-has-fixed-header {
					padding-top: 0 !important;
					scroll-padding-top: var(--epsh-desktop-header-offset, 96px);
				}
				body.epsh-has-fixed-header .site-header,
				body.epsh-has-fixed-header .genesis-header {
					margin-bottom: 0 !important;
				}
				body.epsh-has-fixed-header .site-inner,
				body.epsh-has-fixed-header .content-sidebar-wrap {
					margin-top: 0 !important;
					padding-top: 0 !important;
				}
				body.epsh-has-fixed-header.epsh-header-is-hidden {
					scroll-padding-top: 0;
				}
				body.admin-bar.epsh-has-fixed-header.epsh-header-is-hidden {
					scroll-padding-top: 32px;
				}
				html {
					scroll-behavior: smooth;
				}
			}
			@media (prefers-reduced-motion: reduce) {
				html {
					scroll-behavior: auto;
				}
			}
			@media (min-width: %1$dpx) and (max-width: 782px) {
				body.admin-bar.epsh-has-fixed-header .site-header,
				body.admin-bar.epsh-has-fixed-header .genesis-header {
					top: 46px !important;
				}
			}',
			$desktop_min
		);

		wp_register_style( 'epsh-sticky-header', false, array( 'epsh-header-shell' ), AHF_VERSION );
		wp_enqueue_style( 'epsh-sticky-header' );
		wp_add_inline_style( 'epsh-sticky-header', $css );

		// Theme genesis-sample adds position:sticky at wp_head priority 99 — keep plugin sticky header authoritative (no body padding).
		add_action(
			'wp_head',
			static function () use ( $desktop_min ) {
				printf(
					'<style id="epsh-header-fixed-override">@media (min-width:%1$dpx){body.epsh-has-fixed-header,body.epsh-smart-header{padding-top:0!important}body.epsh-has-fixed-header .site-header,body.epsh-has-fixed-header .genesis-header,body.epsh-smart-header .site-header,body.epsh-smart-header .genesis-header{position:fixed!important;top:0!important;left:0!important;right:0!important;width:100%%!important;margin-bottom:0!important}body.admin-bar.epsh-has-fixed-header .site-header,body.admin-bar.epsh-has-fixed-header .genesis-header,body.admin-bar.epsh-smart-header .site-header,body.admin-bar.epsh-smart-header .genesis-header{top:32px!important}body.epsh-has-fixed-header .epsh-header-spacer,body.epsh-smart-header .epsh-header-spacer{display:none!important;height:0!important}body.epsh-has-fixed-header .site-inner,body.epsh-smart-header .site-inner{margin-top:0!important;padding-top:0!important}}</style>' . "\n",
					$desktop_min
				);
			},
			100
		);

		if ( $smart_scroll ) {
			wp_enqueue_script(
				'epsh-header-scroll',
				AHF_PLUGIN_URL . 'assets/js/header-scroll.js',
				array(),
				AHF_VERSION,
				true
			);

			wp_localize_script(
				'epsh-header-scroll',
				'ahfHeaderScroll',
				array(
					'desktopMin'          => $desktop_min,
					'hideAfter'           => 120,
					'distanceThreshold'   => 56,
					'toggleCooldown'      => 280,
				)
			);
			return;
		}

		wp_register_script( 'epsh-sticky-header', '', array(), AHF_VERSION, true );
		wp_enqueue_script( 'epsh-sticky-header' );
		wp_add_inline_script(
			'epsh-sticky-header',
			sprintf(
				'(function () {
					var desktopMin = %1$d;
					function finishBooting() {
						document.documentElement.classList.remove("epsh-header-booting");
					}
					function updateHeaderOffset() {
						var isDesktop = window.matchMedia("(min-width: " + desktopMin + "px)").matches;
						var header = document.querySelector(".site-header, .genesis-header");
						if (!isDesktop || !header) {
							document.documentElement.style.removeProperty("--epsh-desktop-header-offset");
							finishBooting();
							return;
						}
						var offset = Math.ceil(header.getBoundingClientRect().height || 0);
						if (offset < 1) {
							finishBooting();
							return;
						}
						var current = parseFloat(getComputedStyle(document.documentElement).getPropertyValue("--epsh-desktop-header-offset")) || 0;
						if (Math.abs(current - offset) > 2) {
							document.documentElement.style.setProperty("--epsh-desktop-header-offset", offset + "px");
						}
						finishBooting();
					}
					window.addEventListener("load", updateHeaderOffset);
					window.addEventListener("resize", updateHeaderOffset, { passive: true });
					document.addEventListener("DOMContentLoaded", updateHeaderOffset);
				})();',
				$desktop_min
			)
		);
	}
}
