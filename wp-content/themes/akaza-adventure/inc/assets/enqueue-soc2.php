<?php
/**
 * Information Security Awareness Training for SOC 2 Compliance page assets.
 *
 * Scoped to this page only — does not modify SAP or other course assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue SOC 2 security awareness training page styles/scripts.
 */
function akaza_enqueue_soc2_assets() {
	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	$folder = 'information-security-awareness-training-for-soc-2-compliance';
	$global = akaza_enqueue_page_foundation();

	$sections = array(
		'sl-soc2-hero',
		'sl-soc2-why',
		'sl-soc2-learn',
		'sl-soc2-modules',
		'sl-soc2-emerging',
		'sl-soc2-relate',
		'sl-soc2-objectives',
		'sl-soc2-designed',
		'sl-soc2-action',
		'sl-soc2-choose',
		'sl-soc2-audience',
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
		'akaza-sl-soc2-contact',
		"{$folder}/sl-soc2-contact.css",
		array( $global, 'akaza-contact-form' )
	);

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style(
		'akaza-sl-soc2-faq',
		"{$folder}/sl-soc2-faq.css",
		array( $global, 'akaza-global-faq' )
	);
}
