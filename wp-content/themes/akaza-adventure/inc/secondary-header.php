<?php
/**
 * Secondary global header + footer (opt-in by page slug).
 *
 * Use for landings that need custom chrome instead of Eduma/Elementor header/footer.
 * Add/remove slugs in akaza_secondary_header_slugs() or via the
 * `akaza_secondary_header_slugs` filter.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Page slugs that use the secondary global header + footer.
 *
 * @return string[]
 */
function akaza_secondary_header_slugs() {
	$slugs = array(
		// SAP (live + alias).
		'security-awareness',
		'security-awareness-and-phishing',
		// Add more landing slugs here as needed.
	);

	/**
	 * Filter secondary chrome page slugs (header + footer).
	 *
	 * @param string[] $slugs Slugs.
	 */
	return array_values( array_unique( array_map( 'strval', (array) apply_filters( 'akaza_secondary_header_slugs', $slugs ) ) ) );
}

/**
 * Current front request slug (first path segment).
 *
 * @return string
 */
function akaza_secondary_header_request_slug() {
	if ( function_exists( 'sl_landing_bridge_request_slug' ) ) {
		return (string) sl_landing_bridge_request_slug();
	}

	if ( empty( $_SERVER['REQUEST_URI'] ) ) {
		return '';
	}

	$path = (string) wp_parse_url( (string) $_SERVER['REQUEST_URI'], PHP_URL_PATH );
	$path = trim( $path, '/' );

	$home_path = (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	$home_path = trim( $home_path, '/' );
	if ( '' !== $home_path && 0 === strpos( $path, $home_path . '/' ) ) {
		$path = substr( $path, strlen( $home_path ) + 1 );
	} elseif ( $path === $home_path ) {
		$path = '';
	}

	$path = trim( (string) $path, '/' );
	if ( '' === $path ) {
		return '';
	}

	$parts = explode( '/', $path );
	return (string) $parts[0];
}

/**
 * Whether the current request should render secondary global header + footer.
 *
 * Uses the actual page slug when available so child pages under
 * /security-awareness/.../ do not inherit SAP secondary chrome.
 *
 * @return bool
 */
function akaza_uses_secondary_header() {
	if ( is_admin() ) {
		return false;
	}

	$slugs = akaza_secondary_header_slugs();

	// Prefer the queried page slug (leaf), not the parent path segment.
	if ( function_exists( 'is_page' ) && is_page() ) {
		$page = get_queried_object();
		if ( $page && ! empty( $page->post_name ) ) {
			return in_array( (string) $page->post_name, $slugs, true );
		}
	}

	$path = '';
	if ( function_exists( 'sl_landing_bridge_request_path' ) ) {
		$path = (string) sl_landing_bridge_request_path();
	} elseif ( ! empty( $_SERVER['REQUEST_URI'] ) ) {
		$path = (string) wp_parse_url( (string) $_SERVER['REQUEST_URI'], PHP_URL_PATH );
		$path = trim( $path, '/' );
	}

	if ( '' === $path ) {
		return false;
	}

	$parts = explode( '/', $path );
	// Only exact landing (or /slug/amp/), never child paths.
	if ( count( $parts ) > 1 && 'amp' !== (string) $parts[1] ) {
		return false;
	}

	$slug = (string) $parts[0];
	return '' !== $slug && in_array( $slug, $slugs, true );
}

/**
 * Alias for secondary chrome (header + footer).
 *
 * @return bool
 */
function akaza_uses_secondary_chrome() {
	return akaza_uses_secondary_header();
}

/**
 * Body class for secondary chrome pages (hides leftover Thim header/footer).
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function akaza_secondary_header_body_class( $classes ) {
	if ( akaza_uses_secondary_header() ) {
		$classes[] = 'sl-secondary-header-active';
	}
	return $classes;
}
add_filter( 'body_class', 'akaza_secondary_header_body_class' );

/**
 * Enqueue secondary header + footer assets on opted-in pages.
 */
function akaza_enqueue_secondary_header_assets() {
	if ( ! akaza_uses_secondary_header() ) {
		return;
	}

	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	akaza_enqueue_theme_style( 'akaza-sl-secondary-header', 'sl-secondary-header.css', array() );
	$footer_deps = array( 'akaza-sl-secondary-header' );
	if ( wp_style_is( 'akaza-scroll-to-top', 'registered' ) || wp_style_is( 'akaza-scroll-to-top', 'enqueued' ) ) {
		$footer_deps[] = 'akaza-scroll-to-top';
	}
	if ( wp_style_is( 'akaza-contact-form-brand', 'registered' ) || wp_style_is( 'akaza-contact-form-brand', 'enqueued' ) ) {
		$footer_deps[] = 'akaza-contact-form-brand';
	}
	akaza_enqueue_theme_style( 'akaza-sl-secondary-footer', 'sl-secondary-footer.css', $footer_deps );
	akaza_enqueue_theme_script( 'akaza-sl-secondary-header', 'sl-secondary-header.js' );
}
add_action( 'wp_enqueue_scripts', 'akaza_enqueue_secondary_header_assets', 30 );
