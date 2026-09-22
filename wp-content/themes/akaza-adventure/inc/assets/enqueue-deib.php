<?php
/**
 * DEI&B training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Diversity, Equality, Inclusion and Belonging page styles.
 */
function akaza_enqueue_deib_assets() {
	$folder     = 'diversity-equality-inclusion-belonging-training';
	$foundation = akaza_enqueue_page_foundation();
	$deps       = array(
		$foundation,
		'akaza-global-ui-buttons',
		'akaza-global-buttons',
		'akaza-global-title-accent',
		'akaza-global-panel-title',
	);

	wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
		array(),
		'1.11.3'
	);

	$sections = array(
		'sl-deib-hero',
		'sl-deib-buyer-fit',
		'sl-deib-concepts',
		'sl-deib-covers',
		'sl-deib-experience',
		'sl-deib-outcomes',
		'sl-deib-audience',
		'sl-deib-implementation',
		'sl-deib-faq',
		'sl-deib-final-cta',
		'sl-deib-contact',
	);

	foreach ( $sections as $handle ) {
		akaza_enqueue_theme_style(
			"akaza-{$handle}",
			"{$folder}/{$handle}.css",
			array_merge( $deps, array( 'bootstrap-icons' ) )
		);
	}

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main', 'akaza-fonts' ) );
}
