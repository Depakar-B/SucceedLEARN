<?php
/**
 * Extracted from functions.php (inc\solutions-carousel.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Enqueue reusable solutions card grid assets.
 * Safe to call from About, Contact, or any page that includes the template part.
 */
function akaza_enqueue_solutions_carousel() {
	$css = AKAZA_DIR . '/assets/css/solutions-carousel.css';

	wp_enqueue_style(
		'akaza-solutions-carousel',
		AKAZA_URI . '/assets/css/solutions-carousel.css',
		array( 'akaza-main', 'akaza-fonts' ),
		file_exists( $css ) ? (string) filemtime( $css ) : AKAZA_VERSION
	);
}
