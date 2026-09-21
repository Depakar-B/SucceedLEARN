<?php
/**
 * FERPA Training for School and University Staff page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue FERPA page styles (and scripts when needed).
 */
function akaza_enqueue_ferpa_assets() {
	$folder     = 'ferpa-training-for-school-and-university-staff';
	$foundation = akaza_enqueue_page_foundation();
	akaza_enqueue_theme_style( 'akaza-sl-ferpa-hero', "{$folder}/sl-ferpa-hero.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-ferpa-trusted', "{$folder}/sl-ferpa-trusted.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-ferpa-reasons', "{$folder}/sl-ferpa-reasons.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-ferpa-outline', "{$folder}/sl-ferpa-outline.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-ferpa-audience', "{$folder}/sl-ferpa-audience.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-ferpa-scenarios', "{$folder}/sl-ferpa-scenarios.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-ferpa-pricing', "{$folder}/sl-ferpa-pricing.css", array( $foundation ) );

	// Global FAQ accordion (CSS + JS). Registered in enqueue-core.php.
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );
	$contact_form_brand = AKAZA_DIR . '/assets/css/contact-form-brand.css';
	if ( file_exists( $contact_form_brand ) ) {
		wp_enqueue_style(
			'akaza-contact-form-brand',
			AKAZA_URI . '/assets/css/contact-form-brand.css',
			array( 'akaza-contact-form' ),
			akaza_asset_version( $contact_form_brand )
		);
	}

	akaza_enqueue_theme_style(
		'akaza-sl-ferpa-demo',
		"{$folder}/sl-ferpa-demo.css",
		array( $foundation, 'akaza-contact-form' )
	);
}
