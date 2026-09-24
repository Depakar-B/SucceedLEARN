<?php
/**
 * PE/VC Homepage assets.
 *
 * CSS lives in assets/css/pevc-homepage/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue PE/VC homepage styles.
 */
function akaza_enqueue_pevc_homepage_assets() {
	$folder     = 'pevc-homepage';
	$foundation = akaza_enqueue_page_foundation();

	$sections = array(
		'sl-pevc-hero',
		'sl-pevc-pricing',
		'sl-pevc-suite',
		'sl-pevc-why',
		'sl-pevc-decision',
		'sl-pevc-audience',
		'sl-pevc-programme',
		'sl-pevc-delivery',
	);

	foreach ( $sections as $slug ) {
		akaza_enqueue_theme_style( "akaza-{$slug}", "{$folder}/{$slug}.css", array( $foundation ) );
	}

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
		'akaza-sl-pevc-contact',
		"{$folder}/sl-pevc-contact.css",
		array( $foundation, 'akaza-contact-form' )
	);

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );
}
