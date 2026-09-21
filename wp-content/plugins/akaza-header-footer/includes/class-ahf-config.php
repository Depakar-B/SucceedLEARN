<?php
/**
 * Plugin configuration (defaults + saved settings).
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Central config for the site header plugin.
 */
class AHF_Config {

	/**
	 * Default settings stored on activation.
	 *
	 * @return array<string, mixed>
	 */
	public static function default_settings() {
		return array(
			'enabled'              => 'yes',
			'genesis_layout'       => 'yes',
			'custom_desktop_menu'  => 'yes',
			'smart_header_scroll'  => 'yes',
			'desktop_extras'       => 'yes',
			'mega_menu_fix'        => 'yes',
			'mobile_header'        => 'yes',
			'footer'               => 'yes',
			'top_bar'              => 'yes',
			'top_bar_status'       => 'active',
			'top_bar_message'      => '',
			'top_bar_color'         => '#12bece',
			'top_bar_btn_color'     => '',
			'top_bar_show_button'   => 'no',
			'top_bar_btn_text'      => '',
			'top_bar_btn_url'       => '',
			'top_bar_btn_behavior'  => 'samewindow',
			'top_bar_show_button_2' => 'no',
			'top_bar_btn2_text'     => '',
			'top_bar_btn2_url'      => '',
			'top_bar_btn2_behavior' => 'samewindow',
			'top_bar_visibility'      => 'all',
			'top_bar_excluded_ids'    => array(),
			'top_bar_excluded_extra'  => '',
			'breakpoint'              => 1200,
			'contact_email'        => 'sales@succeedtech.com',
			'phone_shortcode'      => '',
			'icon_email'           => 'https://succeedlearn.com/wp-content/uploads/2025/08/icons8-envelope-16.png',
			'icon_phone'           => 'https://succeedlearn.com/wp-content/uploads/2025/08/icons8-call-24.png',
			'logo_url'             => 'https://succeedlearn.com/wp-content/uploads/2025/11/logo.webp',
			'logo_scrolled_url'    => 'https://succeedlearn.com/wp-content/uploads/2025/12/logo.webp',
			'logo_alt'             => 'SucceedLEARN',
			'cta_label'            => 'Request Demo',
			'cta_url'              => '/contact-us/',
			'primary_menu_location' => 'primary',
		);
	}

	/**
	 * Merged settings from database.
	 *
	 * @return array<string, mixed>
	 */
	public static function get_settings() {
		$saved    = get_option( AHF_OPTION_SETTINGS, array() );
		$defaults = self::default_settings();
		$settings = wp_parse_args( is_array( $saved ) ? $saved : array(), $defaults );

		$settings = self::normalize_legacy_settings( $settings );

		return apply_filters( 'ahf_settings', $settings );
	}

	/**
	 * One-time normalizations for legacy saved values.
	 *
	 * @param array<string, mixed> $settings Settings array.
	 * @return array<string, mixed>
	 */
	private static function normalize_legacy_settings( $settings ) {
		$legacy_cta_labels = array(
			'Schedule a Demo',
			'Schedule an Demo',
			'Schedule a demo',
			'Contact us',
			'Contact Us',
		);

		if ( isset( $settings['cta_label'] ) && in_array( $settings['cta_label'], $legacy_cta_labels, true ) ) {
			$settings['cta_label'] = 'Request Demo';
		}

		$logo = (string) ( $settings['logo_url'] ?? '' );
		if ( '' === $logo || false !== stripos( $logo, 'elearnposh' ) || false !== stripos( $logo, 'eLearn-posh' ) ) {
			$settings['logo_url'] = 'https://succeedlearn.com/wp-content/uploads/2025/11/logo.webp';
			$settings['logo_alt'] = 'SucceedLEARN';
		}

		$cta_url = (string) ( $settings['cta_url'] ?? '' );
		if ( '' === $cta_url || false !== stripos( $cta_url, 'elearnposh' ) ) {
			$settings['cta_url'] = '/contact-us/';
		}

		$settings['contact_email'] = 'sales@succeedtech.com';

		return $settings;
	}

	/**
	 * Whether the plugin is globally enabled.
	 */
	public static function is_enabled() {
		$settings = self::get_settings();
		$enabled  = ( 'yes' === $settings['enabled'] );

		return (bool) apply_filters( 'ahf_is_enabled', $enabled );
	}

	/**
	 * Whether a feature flag is on.
	 *
	 * @param string $key Settings key (e.g. genesis_layout).
	 */
	public static function feature_enabled( $key ) {
		if ( ! self::is_enabled() ) {
			return false;
		}

		$settings = self::get_settings();
		return isset( $settings[ $key ] ) && 'yes' === $settings[ $key ];
	}

	/**
	 * Runtime config for templates and assets.
	 *
	 * @return array<string, mixed>
	 */
	public static function get() {
		static $config = null;

		if ( null !== $config ) {
			return $config;
		}

		$settings = self::get_settings();
		$bp       = max( 768, (int) $settings['breakpoint'] );

		$config = array(
			'version'    => AHF_VERSION,
			'plugin_dir' => AHF_PLUGIN_DIR,
			'plugin_url' => AHF_PLUGIN_URL,
			'breakpoint' => $bp,
			'contact'    => array(
				'email'           => $settings['contact_email'],
				'phone_shortcode' => $settings['phone_shortcode'],
			),
			'icons'      => array(
				'email' => $settings['icon_email'],
				'phone' => $settings['icon_phone'],
			),
			'logo'       => array(
				/* Default/light asset — used as white footer logo. */
				'url'          => $settings['logo_url'],
				/* Company-colour mark — header + mobile (was scroll-state logo). */
				'scrolled_url' => ! empty( $settings['logo_scrolled_url'] )
					? $settings['logo_scrolled_url']
					: 'https://succeedlearn.com/wp-content/uploads/2025/12/logo.webp',
				'white_url'    => $settings['logo_url'],
				'alt'          => $settings['logo_alt'],
				'home'         => home_url( '/' ),
			),
			'cta'        => array(
				'label' => $settings['cta_label'],
				'url'   => $settings['cta_url'],
			),
			'primary_menu_location' => $settings['primary_menu_location'],
		);

		return apply_filters( 'ahf_config', $config );
	}

	/**
	 * Parse a comma/space-separated list of post IDs.
	 *
	 * @param string|int[] $raw IDs as array or string.
	 * @return int[]
	 */
	public static function parse_id_list( $raw ) {
		if ( is_array( $raw ) ) {
			return array_values( array_filter( array_map( 'absint', $raw ) ) );
		}

		$parts = preg_split( '/[\s,]+/', (string) $raw, -1, PREG_SPLIT_NO_EMPTY );
		if ( ! is_array( $parts ) ) {
			return array();
		}

		return array_values( array_filter( array_map( 'absint', $parts ) ) );
	}

	/**
	 * Top bar notification settings.
	 *
	 * @return array<string, mixed>
	 */
	public static function get_top_bar() {
		$settings = self::get_settings();

		$btn_color = sanitize_hex_color( $settings['top_bar_btn_color'] ?? '' );
		$excluded  = array_values(
			array_unique(
				array_merge(
					self::parse_id_list( $settings['top_bar_excluded_ids'] ?? array() ),
					self::parse_id_list( $settings['top_bar_excluded_extra'] ?? '' )
				)
			)
		);

		return array(
			'active'          => self::feature_enabled( 'top_bar' ),
			'message'         => (string) ( $settings['top_bar_message'] ?? '' ),
			'color'           => sanitize_hex_color( $settings['top_bar_color'] ?? '#12bece' ) ?: '#12bece',
			'btn_color'       => $btn_color ?: '',
			'show_button'     => ( $settings['top_bar_show_button'] ?? 'no' ),
			'btn_text'        => (string) ( $settings['top_bar_btn_text'] ?? '' ),
			'btn_url'         => (string) ( $settings['top_bar_btn_url'] ?? '' ),
			'btn_behavior'    => (string) ( $settings['top_bar_btn_behavior'] ?? 'samewindow' ),
			'show_button_2'   => ( $settings['top_bar_show_button_2'] ?? 'no' ),
			'btn2_text'       => (string) ( $settings['top_bar_btn2_text'] ?? '' ),
			'btn2_url'        => (string) ( $settings['top_bar_btn2_url'] ?? '' ),
			'btn2_behavior'   => (string) ( $settings['top_bar_btn2_behavior'] ?? 'samewindow' ),
			'visibility'      => (string) ( $settings['top_bar_visibility'] ?? 'all' ),
			'excluded_ids'    => $excluded,
		);
	}

	/**
	 * Resolve menu path to URL (desktop / non-AMP — never emits /amp/ links).
	 *
	 * @param string $path Relative or absolute URL.
	 */
	public static function menu_url( $path ) {
		if ( empty( $path ) ) {
			return '#';
		}

		if ( 0 === strpos( $path, 'http' ) ) {
			$cleaned = preg_replace( '@/amp/?([?#]|$)@i', '/$1', $path );
			return esc_url( is_string( $cleaned ) ? $cleaned : $path );
		}

		$path = AHF_Menu_Items::strip_amp_from_path( $path );
		return esc_url( home_url( $path ) );
	}

	/**
	 * Normalize a relative or absolute menu path for comparisons.
	 *
	 * @param string $path Menu path or URL.
	 */
	public static function normalize_menu_path( $path ) {
		if ( empty( $path ) || '#' === $path ) {
			return '';
		}

		if ( 0 === strpos( $path, 'http' ) ) {
			$parsed = wp_parse_url( $path, PHP_URL_PATH );
			$path   = is_string( $parsed ) ? $parsed : '';
		}

		$path = AHF_Menu_Items::strip_amp_from_path( '/' . ltrim( (string) $path, '/' ) );
		$path = '/' . trim( $path, '/' ) . '/';

		return ( '//' === $path ) ? '/' : $path;
	}

	/**
	 * Current request path (trailing slash).
	 */
	public static function get_current_path() {
		if ( is_front_page() ) {
			return '/';
		}

		global $wp;

		$request = isset( $wp->request ) ? (string) $wp->request : '';
		$path    = wp_parse_url( home_url( $request ), PHP_URL_PATH );

		return self::normalize_menu_path( is_string( $path ) ? $path : '/' );
	}

	/**
	 * Whether a menu item URL matches the current page.
	 *
	 * @param string $path Menu path or URL.
	 */
	public static function is_menu_url_active( $path ) {
		$target  = self::normalize_menu_path( $path );
		$current = self::get_current_path();

		if ( '' === $target ) {
			return false;
		}

		if ( $target === $current ) {
			return true;
		}

		if ( '/' !== $target && 0 === strpos( $current, $target ) ) {
			return true;
		}

		return false;
	}
}
