<?php
/**
 * Information Security Awareness Training page assets.
 *
 * Scoped to this page only - does not modify SOC 2 or other course assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Information Security Awareness Training page styles/scripts.
 */
function akaza_enqueue_isat_assets() {
	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	$folder = 'information-security-awareness-training';
	$global = akaza_enqueue_page_foundation();

	$sections = array(
		'sl-isat-hero',
		'sl-isat-why',
		'sl-isat-learn',
		'sl-isat-modules',
		'sl-isat-designed',
		'sl-isat-topics',
		'sl-isat-action',
		'sl-isat-choose',
		'sl-isat-audience',
	);

	foreach ( $sections as $section ) {
		akaza_enqueue_theme_style( "akaza-{$section}", "{$folder}/{$section}.css", array( $global ) );
	}

	akaza_enqueue_theme_script(
		'akaza-sl-isat-action',
		"{$folder}/sl-isat-action.js"
	);

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
		'akaza-sl-isat-contact',
		"{$folder}/sl-isat-contact.css",
		array( $global, 'akaza-contact-form' )
	);

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style(
		'akaza-sl-isat-faq',
		"{$folder}/sl-isat-faq.css",
		array( $global, 'akaza-global-faq' )
	);
}
