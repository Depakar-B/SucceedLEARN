<?php
/**
 * Secure Coding Practices Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Secure Coding page styles (and FAQ script).
 */
function akaza_enqueue_secure_coding_assets() {
	$folder     = 'secure-coding';
	$foundation = akaza_enqueue_page_foundation();
	$deps       = array(
		$foundation,
		'akaza-global-ui-buttons',
		'akaza-global-buttons',
		'akaza-global-title-accent',
		'akaza-global-panel-title',
	);

	$sections = array(
		'sl-sc-hero',
		'sl-sc-proof',
		'sl-sc-overview',
		'sl-sc-outcomes',
		'sl-sc-curriculum',
		'sl-sc-audience',
		'sl-sc-delivery',
		'sl-sc-frameworks',
	);

	foreach ( $sections as $handle ) {
		akaza_enqueue_theme_style(
			"akaza-{$handle}",
			"{$folder}/{$handle}.css",
			$deps
		);
	}

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );
	akaza_enqueue_theme_style(
		'akaza-sl-sc-faq',
		"{$folder}/sl-sc-faq.css",
		array_merge( $deps, array( 'akaza-global-faq' ) )
	);

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css' );
	akaza_enqueue_theme_style(
		'akaza-sl-sc-contact',
		"{$folder}/sl-sc-contact.css",
		array_merge( $deps, array( 'akaza-contact-form' ) )
	);
}
