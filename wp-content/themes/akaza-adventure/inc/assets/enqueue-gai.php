<?php
/**
 * Responsible Use of Generative AI Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Responsible Use of Generative AI Training page styles.
 */
function akaza_enqueue_gai_assets() {
	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	$folder = 'responsible-use-of-generative-ai-training';
	$global = akaza_enqueue_page_foundation();

	$sections = array(
		'sl-gai-hero',
		'sl-gai-why',
		'sl-gai-what',
		'sl-gai-topics',
		'sl-gai-principles',
		'sl-gai-risk',
		'sl-gai-outcomes',
		'sl-gai-audience',
		'sl-gai-policy',
		'sl-gai-cta',
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
		'akaza-sl-gai-contact',
		"{$folder}/sl-gai-contact.css",
		array( $global, 'akaza-contact-form' )
	);

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style(
		'akaza-sl-gai-faq',
		"{$folder}/sl-gai-faq.css",
		array( $global, 'akaza-global-faq' )
	);
}
