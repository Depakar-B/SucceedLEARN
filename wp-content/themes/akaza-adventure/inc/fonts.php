<?php
/**
 * Extracted from functions.php (inc\fonts.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Preload LCP hero + critical fonts (homepage only for hero).
 */
function akaza_resource_hints() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";

	if ( is_front_page() || is_page_template( 'page-templates/homepage-fast.php' ) ) {
		$hero = AKAZA_URI . '/assets/images/hero.jpg';
		echo '<link rel="preload" as="image" href="' . esc_url( $hero ) . '" fetchpriority="high">' . "\n";
	}
}
add_action( 'wp_head', 'akaza_resource_hints', 1 );

/**
 * Load brand fonts site-wide (same stack as the homepage).
 */
function akaza_enqueue_fonts() {
	if ( is_admin() ) {
		return;
	}

	wp_enqueue_style(
		'akaza-fonts',
		'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'akaza_enqueue_fonts', 5 );

/**
 * Ensure plugin/header styles load after theme fonts.
 */
function akaza_font_dependencies() {
	if ( ! wp_style_is( 'akaza-fonts', 'enqueued' ) ) {
		return;
	}

	$wp_styles = wp_styles();
	if ( ! $wp_styles ) {
		return;
	}

	foreach ( array( 'epsh-header-shell', 'epsh-desktop-nav', 'epsh-mobile-header', 'epsh-footer' ) as $handle ) {
		if ( ! isset( $wp_styles->registered[ $handle ] ) ) {
			continue;
		}

		$deps = (array) $wp_styles->registered[ $handle ]->deps;
		if ( ! in_array( 'akaza-fonts', $deps, true ) ) {
			$wp_styles->registered[ $handle ]->deps[] = 'akaza-fonts';
		}
	}
}
add_action( 'wp_enqueue_scripts', 'akaza_font_dependencies', 50 );
