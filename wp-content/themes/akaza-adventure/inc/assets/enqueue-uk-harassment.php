<?php
/**
 * UK Sexual Harassment Prevention Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue UK Sexual Harassment Prevention Training page styles.
 */
function akaza_enqueue_uk_harassment_assets() {
	$folder     = 'uk-sexual-harassment-prevention-training';
	$foundation = akaza_enqueue_page_foundation();

	akaza_enqueue_theme_style(
		'akaza-sl-uk-harassment-hero',
		"{$folder}/sl-uk-harassment-hero.css",
		array( $foundation )
	);

	akaza_enqueue_theme_style( 'akaza-sl-uk-sexual-harassment-action', "{$folder}/sl-uk-sexual-harassment-action.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-uk-sexual-harassment-prevention', "{$folder}/sl-uk-sexual-harassment-prevention.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-uk-sexual-harassment-learning', "{$folder}/sl-uk-sexual-harassment-learning.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-uk-sexual-harassment-coverage', "{$folder}/sl-uk-sexual-harassment-coverage.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-uk-sexual-harassment-settings', "{$folder}/sl-uk-sexual-harassment-settings.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-uk-sexual-harassment-customisation', "{$folder}/sl-uk-sexual-harassment-customisation.css", array( $foundation ) );

	// Global FAQ accordion (CSS + JS). Registered in enqueue-core.php.
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	// Global contact layout + form chrome.
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );
	wp_enqueue_style( 'akaza-global-contact' );

	akaza_enqueue_theme_style(
		'akaza-sl-uk-sexual-harassment-contact',
		"{$folder}/sl-uk-sexual-harassment-contact.css",
		array( $foundation, 'akaza-global-contact', 'akaza-contact-form' )
	);
}
