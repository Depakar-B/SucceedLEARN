<?php
/**
 * Header performance: logo preload, lazy shuffle phone script.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Lightweight performance helpers for the site header.
 */
class AHF_Performance {

	/** @var string */
	private static $shuffle_script_src = '';

	/**
	 * Register hooks.
	 */
	public static function init() {
		if ( AHF_AMP::is_amp() || is_admin() ) {
			return;
		}

		add_action( 'wp_head', array( __CLASS__, 'preload_logo' ), 1 );
		add_filter( 'get_custom_logo', array( __CLASS__, 'prioritize_header_logo' ) );
		add_filter( 'wp_get_attachment_image_attributes', array( __CLASS__, 'prioritize_attachment_logo' ), 10, 3 );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'defer_shuffle_assets' ), 100 );
		add_action( 'wp_footer', array( __CLASS__, 'lazy_load_shuffle_script' ), 5 );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'dequeue_genesis_responsive_menu' ), 100 );
		add_filter( 'autoptimize_filter_js_exclude', array( __CLASS__, 'autoptimize_exclude_nav_js' ) );
	}

	/**
	 * Keep desktop nav JS out of Autoptimize aggregates so hover/click
	 * bindings are not lost when other bundled scripts error.
	 *
	 * @param string $exclude Comma-separated exclude list.
	 * @return string
	 */
	public static function autoptimize_exclude_nav_js( $exclude ) {
		$exclude = is_string( $exclude ) ? $exclude : '';
		$parts   = array_filter( array_map( 'trim', explode( ',', $exclude ) ) );

		foreach ( array( 'desktop-nav.js', 'epsh-desktop-nav' ) as $needle ) {
			if ( ! in_array( $needle, $parts, true ) ) {
				$parts[] = $needle;
			}
		}

		return implode( ', ', $parts );
	}

	/**
	 * Genesis responsive-menus.js expects a <nav class="nav-*"> next to .menu-toggle.
	 * EPSH uses <div class="nav-primary"> + its own mobile header, so that script
	 * throws: Cannot read properties of undefined (reading 'match').
	 */
	public static function dequeue_genesis_responsive_menu() {
		if ( ! AHF_Config::feature_enabled( 'mobile_header' )
			&& ! AHF_Config::feature_enabled( 'custom_desktop_menu' ) ) {
			return;
		}

		$handle = function_exists( 'genesis_get_theme_handle' )
			? genesis_get_theme_handle() . '-responsive-menu'
			: 'genesis-sample-responsive-menu';

		wp_dequeue_script( $handle );
		wp_deregister_script( $handle );
	}

	/**
	 * Preload configured header logo (single small image — safe for LCP).
	 */
	public static function preload_logo() {
		$logo     = AHF_Config::get()['logo'] ?? array();
		$logo_url = ! empty( $logo['scrolled_url'] ) ? $logo['scrolled_url'] : ( $logo['url'] ?? '' );

		if ( empty( $logo_url ) ) {
			return;
		}

		printf(
			'<link rel="preload" as="image" href="%1$s" fetchpriority="high">' . "\n",
			esc_url( $logo_url )
		);
	}

	/**
	 * @param string $html Custom logo HTML.
	 * @return string
	 */
	public static function prioritize_header_logo( $html ) {
		if ( empty( $html ) || false !== strpos( $html, 'fetchpriority=' ) ) {
			return $html;
		}

		return str_replace( '<img ', '<img fetchpriority="high" decoding="async" ', $html );
	}

	/**
	 * @param array<string, string> $attr       Image attributes.
	 * @param WP_Post               $attachment Attachment post.
	 * @param string|int[]          $size       Image size.
	 * @return array<string, string>
	 */
	public static function prioritize_attachment_logo( $attr, $attachment, $size ) {
		unset( $attachment, $size );

		if ( empty( $attr['class'] ) || false === strpos( $attr['class'], 'custom-logo' ) ) {
			return $attr;
		}

		$attr['fetchpriority'] = 'high';
		$attr['decoding']       = 'async';

		return $attr;
	}

	/**
	 * Defer shuffle-phone plugin assets; lazy-load script after idle.
	 */
	public static function defer_shuffle_assets() {
		$settings = AHF_Config::get_settings();
		$uses_shuffle = isset( $settings['phone_shortcode'] )
			&& false !== stripos( (string) $settings['phone_shortcode'], 'shuffle' );

		if ( ! $uses_shuffle ) {
			return;
		}

		global $wp_scripts;

		if ( isset( $wp_scripts->registered['spn-frontend'] ) ) {
			self::$shuffle_script_src = (string) $wp_scripts->registered['spn-frontend']->src;
		}

		wp_dequeue_style( 'spn-roboto' );
		wp_dequeue_script( 'spn-frontend' );
	}

	/**
	 * Load shuffle phone script after idle so it does not compete with LCP.
	 */
	public static function lazy_load_shuffle_script() {
		if ( empty( self::$shuffle_script_src ) ) {
			return;
		}

		wp_register_script( 'epsh-shuffle-lazy', false, array(), AHF_VERSION, true );
		wp_enqueue_script( 'epsh-shuffle-lazy' );
		wp_localize_script(
			'epsh-shuffle-lazy',
			'epshShuffleLazy',
			array(
				'src'  => self::$shuffle_script_src,
				'rest' => esc_url_raw( rest_url( 'spn/v1/' ) ),
				'ajax' => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
			)
		);

		wp_add_inline_script(
			'epsh-shuffle-lazy',
			'(function () {
				var cfg = window.epshShuffleLazy || {};
				var loaded = false;

				function bootShuffle() {
					if (loaded || !cfg.src) {
						return;
					}

					var targets = document.querySelectorAll(".spn-dynamic");
					if (!targets.length) {
						return;
					}

					loaded = true;
					window.spn_vars = window.spn_vars || { rest: cfg.rest, ajax: cfg.ajax };

					var script = document.createElement("script");
					script.src = cfg.src;
					script.defer = true;
					document.body.appendChild(script);
				}

				if ("requestIdleCallback" in window) {
					requestIdleCallback(bootShuffle, { timeout: 2500 });
				} else {
					window.setTimeout(bootShuffle, 1800);
				}
			})();'
		);
	}
}
