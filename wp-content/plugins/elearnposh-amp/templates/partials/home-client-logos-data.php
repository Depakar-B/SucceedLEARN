<?php
/**
 * Carousel client logos for AMP home / contact teaser grid.
 *
 * Reads from the theme carousel file — same logos as the scrolling marquee, not the full client list.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$row_a = array();
$row_b = array();

$theme_carousel_data = get_stylesheet_directory() . '/partials/home-client-logos-data.php';
if ( is_readable( $theme_carousel_data ) ) {
	require $theme_carousel_data;
	if ( isset( $eposh_client_logos_row_a ) && is_array( $eposh_client_logos_row_a ) ) {
		$row_a = $eposh_client_logos_row_a;
	}
	if ( isset( $eposh_client_logos_row_b ) && is_array( $eposh_client_logos_row_b ) ) {
		$row_b = $eposh_client_logos_row_b;
	}
}

$client_logos = array_merge( $row_a, $row_b );

// Fallback when theme data was loaded in global scope (e.g. theme templates).
if ( empty( $client_logos ) && function_exists( 'ep_get_carousel_client_logos' ) ) {
	$client_logos = ep_get_carousel_client_logos();
}
