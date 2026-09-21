<?php
/**
 * Extracted from functions.php (inc\performance.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Strip default WP bloat.
 */
function akaza_disable_bloat() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'rest_output_link_wp_head' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );

	// Soften LearnPress front CSS when present â€” keep core, drop extras if registered.
	if ( ! is_admin() ) {
		wp_dequeue_style( 'lp-font-awesome-5' );
		wp_dequeue_style( 'learnpress' );
	}
}
add_action( 'wp_enqueue_scripts', 'akaza_disable_bloat', 100 );

/**
 * Minimal LearnPress styles â€” theme provides layout.
 */
function akaza_learnpress_assets() {
	if ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) {
		return;
	}
	if ( ! function_exists( 'learn_press_is_course' ) ) {
		return;
	}
	if ( ! learn_press_is_courses() && ! learn_press_is_course() ) {
		return;
	}
	$path = AKAZA_DIR . '/assets/css/learnpress.css';
	if ( file_exists( $path ) ) {
		wp_enqueue_style(
			'akaza-learnpress',
			AKAZA_URI . '/assets/css/learnpress.css',
			array( 'akaza-main' ),
			(string) filemtime( $path )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'akaza_learnpress_assets', 20 );

/**
 * Performance / security headers.
 */
function akaza_send_headers() {
	if ( headers_sent() ) {
		return;
	}
	header( 'X-Content-Type-Options: nosniff' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'Permissions-Policy: interest-cohort=()' );
}
add_action( 'send_headers', 'akaza_send_headers' );
