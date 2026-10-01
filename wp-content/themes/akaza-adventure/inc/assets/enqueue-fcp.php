<?php
/**
 * Financial Crime Prevention page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_fcp_assets() {
	$folder     = 'financial-crime-prevention';
	$foundation = akaza_enqueue_page_foundation();
	$global     = 'akaza-fcp-global';

	wp_enqueue_style(
		'akaza-fcp-open-sans',
		'https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600&display=swap',
		array(),
		null
	);

	/* Page tokens, typography, buttons, tables. Shared foundation comes first. */
	akaza_enqueue_theme_style( $global, "{$folder}/fcp-global.css", array( $foundation ) );

	$sections = array(
		'fcp-hero'                     => 'fcp-hero.css',
		'fcp-annual-offer'             => 'fcp-annual-offer.css',
		'fcp-course-suite'             => 'fcp-course-suite.css',
		'fcp-what-is-financial-crime'  => 'fcp-what-is-financial-crime.css',
		'fcp-why-it-matters'           => 'fcp-why-it-matters.css',
		'fcp-online-employee-training' => 'fcp-online-employee-training.css',
		'fcp-training-at-a-glance'     => 'fcp-training-at-a-glance.css',
		'fcp-training-by-role'         => 'fcp-training-by-role.css',
		'fcp-flexible-implementation'  => 'fcp-flexible-implementation.css',
		'fcp-sl-fcp-cpd'               => 'fcp-sl-fcp-cpd.css',
	);

	foreach ( $sections as $handle_suffix => $file ) {
		akaza_enqueue_theme_style( "akaza-{$handle_suffix}", "{$folder}/{$file}", array( $global ) );
	}

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );
	akaza_enqueue_theme_style( 'akaza-fcp-faq', "{$folder}/fcp-faq.css", array( $global, 'akaza-global-faq' ) );

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css' );
	akaza_enqueue_theme_style(
		'akaza-fcp-sl-fcp-contact',
		"{$folder}/fcp-sl-fcp-contact.css",
		array( $global, 'akaza-contact-form' )
	);
}
