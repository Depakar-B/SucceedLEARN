<?php
/**
 * ISO 27001:2022 Staff Awareness Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue ISO 27001:2022 staff awareness training page styles/scripts.
 */
function akaza_enqueue_iso27001_assets() {
	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	$folder = 'iso-27001-2022-staff-awareness-training';
	$global = akaza_enqueue_page_foundation();

	$sections = array(
		'sl-iso27-hero',
		'sl-iso27-why',
		'sl-iso27-learn',
		'sl-iso27-relate',
		'sl-iso27-objectives',
		'sl-iso27-behaviour',
		'sl-iso27-structure',
		'sl-iso27-action',
		'sl-iso27-choose',
		'sl-iso27-customise',
		'sl-iso27-audience',
	);

	foreach ( $sections as $section ) {
		akaza_enqueue_theme_style( "akaza-{$section}", "{$folder}/{$section}.css", array( $global ) );
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
		'akaza-sl-iso27-contact',
		"{$folder}/sl-iso27-contact.css",
		array( $global, 'akaza-contact-form' )
	);

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style(
		'akaza-sl-iso27-faq',
		"{$folder}/sl-iso27-faq.css",
		array( $global, 'akaza-global-faq' )
	);
}
