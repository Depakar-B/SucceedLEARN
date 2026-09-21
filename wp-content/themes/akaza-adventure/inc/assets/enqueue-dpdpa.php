<?php
/**
 * DPDPA Compliance Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_dpdpa_assets() {
	$folder     = 'dpdpa-compliance-training';
	$foundation = akaza_enqueue_page_foundation();
	$global     = 'akaza-sl-dpdpa-global';

	/* Page-only utilities (section heading / actions). Shared tokens come from foundation. */
	akaza_enqueue_theme_style( $global, "{$folder}/sl-dpdpa-global.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-dpdpa-hero', "{$folder}/sl-dpdpa-hero.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-dpdpa-trusted', "{$folder}/sl-dpdpa-trusted.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-dpdpa-breach-scenario', "{$folder}/sl-dpdpa-breach-scenario.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-dpdpa-course-coverage', "{$folder}/sl-dpdpa-course-coverage.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-dpdpa-learning', "{$folder}/sl-dpdpa-learning.css", array( $global ) );

	$sections = array(
		'sl-dpdpa-pricing',
		'sl-dpdpa-scorecard-cta',
		'sl-dpdpa-training-records',
		'sl-dpdpa-format-delivery',
	);

	foreach ( $sections as $slug ) {
		akaza_enqueue_theme_style( "akaza-{$slug}", "{$folder}/{$slug}.css", array( $global ) );
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
		'akaza-sl-dpdpa-contact',
		"{$folder}/sl-dpdpa-contact.css",
		array( $global, 'akaza-contact-form' )
	);

	akaza_enqueue_theme_script( 'akaza-dpdpa-workday', "{$folder}/dpdpa-workday.js" );
	akaza_enqueue_theme_script( 'akaza-dpdpa-pricing', "{$folder}/dpdpa-pricing.js" );
	akaza_enqueue_theme_script( 'akaza-sl-dpdpa-course-coverage', 'sl-dpdpa-course-coverage.js' );
}
