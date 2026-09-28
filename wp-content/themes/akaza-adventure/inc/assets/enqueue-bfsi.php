<?php
/**
 * Cybersecurity Awareness Training for BFSI & PE/VC page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue BFSI & PE/VC cybersecurity awareness training page styles/scripts.
 */
function akaza_enqueue_bfsi_assets() {
	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	$folder     = 'security-awareness-training-bfsi-pe-vc';
	$foundation = akaza_enqueue_page_foundation();
	$deps       = array(
		$foundation,
		'akaza-global-ui-buttons',
		'akaza-global-buttons',
		'akaza-global-title-accent',
		'akaza-global-panel-title',
		'akaza-global-list-item',
	);

	$sections = array(
		'sl-bfsi-hero',
		'sl-bfsi-why',
		'sl-bfsi-learn',
		'sl-bfsi-risks',
		'sl-bfsi-scenarios',
		'sl-bfsi-laws',
		'sl-bfsi-structure',
		'sl-bfsi-outline',
		'sl-bfsi-action',
		'sl-bfsi-cases',
		'sl-bfsi-choose',
		'sl-bfsi-audience',
		'sl-bfsi-more',
	);

	foreach ( $sections as $handle ) {
		akaza_enqueue_theme_style(
			"akaza-{$handle}",
			"{$folder}/{$handle}.css",
			$deps
		);
	}

	akaza_enqueue_theme_script(
		'akaza-sl-bfsi-action',
		"{$folder}/sl-bfsi-action.js"
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
		'akaza-sl-bfsi-contact',
		"{$folder}/sl-bfsi-contact.css",
		array( $foundation, 'akaza-contact-form' )
	);

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style(
		'akaza-sl-bfsi-faq',
		"{$folder}/sl-bfsi-faq.css",
		array( $foundation, 'akaza-global-faq' )
	);
}
