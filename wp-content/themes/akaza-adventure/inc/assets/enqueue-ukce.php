<?php
/**
 * Information Security Awareness Training for UK Cyber Essentials page assets.
 *
 * Scoped to this page only — does not modify SAP, SOC 2, or other course assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue UK Cyber Essentials security awareness training page styles/scripts.
 */
function akaza_enqueue_ukce_assets() {
	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	$folder = 'information-security-awareness-training-for-uk-cyber-essentials';
	$global = akaza_enqueue_page_foundation();

	$sections = array(
		'sl-ukce-hero',
		'sl-ukce-why',
		'sl-ukce-learn',
		'sl-ukce-modules',
		'sl-ukce-supporting',
		'sl-ukce-controls',
		'sl-ukce-requires',
		'sl-ukce-designed',
		'sl-ukce-action',
		'sl-ukce-choose',
		'sl-ukce-audience',
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
		'akaza-sl-ukce-contact',
		"{$folder}/sl-ukce-contact.css",
		array( $global, 'akaza-contact-form' )
	);

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style(
		'akaza-sl-ukce-faq',
		"{$folder}/sl-ukce-faq.css",
		array( $global, 'akaza-global-faq' )
	);
}
