<?php
/**
 * Workplace Harassment Prevention Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue WHP page styles (and scripts when needed).
 */
function akaza_enqueue_whp_assets() {
	$folder = 'workplace-harassment-prevention-training';
	$global = akaza_enqueue_page_foundation();

	akaza_enqueue_theme_style( 'akaza-sl-whp-hero', "{$folder}/sl-whp-hero.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-whp-regions', "{$folder}/sl-whp-regions.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-whp-region-specific', "{$folder}/sl-whp-region-specific.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-harassment-training', "{$folder}/sl-harassment-training.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-harassment-regional-training', "{$folder}/sl-harassment-regional-training.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-harassment-course-selection', "{$folder}/sl-harassment-course-selection.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-harassment-learning', "{$folder}/sl-harassment-learning.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-harassment-policy-learning', "{$folder}/sl-harassment-policy-learning.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-harassment-delivery', "{$folder}/sl-harassment-delivery.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-harassment-why', "{$folder}/sl-harassment-why.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-harassment-prevention', "{$folder}/sl-harassment-prevention.css", array( $global ) );

	// Global FAQ accordion (CSS + JS). Registered/enqueued in enqueue-core.php.
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	// Optional page-only FAQ layout tweaks; depends on global FAQ styles.
	akaza_enqueue_theme_style(
		'akaza-sl-workplace-harassment-faq',
		"{$folder}/sl-workplace-harassment-faq.css",
		array( $global, 'akaza-global-faq' )
	);
	akaza_enqueue_theme_style('akaza-sl-workplace-harassment-contact', "{$folder}/sl-workplace-harassment-contact.css", array( $global, 'akaza-global-faq' ) );
	akaza_enqueue_theme_style('akaza-sl-whpt-recognition', "{$folder}/sl-whpt-recognition.css", array( $global ) );
}
