<?php
/**
 * US Sexual Harassment Prevention Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue US Sexual Harassment Prevention Training page styles.
 */
function akaza_enqueue_us_harassment_assets() {
	$folder     = 'us-sexual-harassment-prevention-training';
	$foundation = akaza_enqueue_page_foundation();

	akaza_enqueue_theme_style(
		'akaza-sl-us-harassment-hero',
		"{$folder}/sl-us-harassment-hero.css",
		array( $foundation )
	);

	akaza_enqueue_theme_style(
		'akaza-sl-us-harassment-coverage',
		"{$folder}/sl-us-harassment-coverage.css",
		array( $foundation )
	);

	akaza_enqueue_theme_style(
		'akaza-sl-us-harassment-requirements',
		"{$folder}/sl-us-harassment-requirements.css",
		array( $foundation )
	);

	akaza_enqueue_theme_style(
		'akaza-sl-us-harassment-learning-paths',
		"{$folder}/sl-us-harassment-learning-paths.css",
		array( $foundation )
	);

	akaza_enqueue_theme_style(
		'akaza-sl-us-harassment-workplace',
		"{$folder}/sl-us-harassment-workplace.css",
		array( $foundation )
	);

	akaza_enqueue_theme_style(
		'akaza-sl-us-harassment-workforce',
		"{$folder}/sl-us-harassment-workforce.css",
		array( $foundation )
	);

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );

	akaza_enqueue_theme_style(
		'akaza-sl-us-harassment-contact',
		"{$folder}/sl-us-harassment-contact.css",
		array( $foundation, 'akaza-global-contact', 'akaza-contact-form' )
	);

	// Global FAQ accordion (CSS + JS). Registered in enqueue-core.php.
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );
}
