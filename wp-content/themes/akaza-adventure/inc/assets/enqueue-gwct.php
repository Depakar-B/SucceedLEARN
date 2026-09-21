<?php
/**
 * Global Workplace Compliance Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_gwct_assets() {
	$folder     = 'global-workplace-compliance-training-for-employees';
	$foundation = akaza_enqueue_page_foundation();
	$global     = 'akaza-sl-gwct-global';
	$base       = array( 'akaza-main', 'akaza-fonts' );

	wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
		array(),
		'1.11.3'
	);

	/* Page-only --gwct-* aliases. Shared tokens come from foundation. */
	akaza_enqueue_theme_style( $global, "{$folder}/sl-gwct-global.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-global-workplace-hero', "{$folder}/global-workplace-hero.css", array( $global ) );
	akaza_enqueue_theme_style(
		'akaza-global-workplace-behaviour',
		"{$folder}/global-workplace-behaviour.css",
		array_merge( array( $global ), array( 'bootstrap-icons' ) )
	);
	akaza_enqueue_theme_style(
		'akaza-global-workplace-solutions',
		"{$folder}/global-workplace-solutions.css",
		array_merge( array( $global ), array( 'bootstrap-icons', 'akaza-global-workplace-hero' ) )
	);
	akaza_enqueue_theme_style(
		'akaza-global-workplace-why-choose',
		"{$folder}/global-workplace-why-choose.css",
		array_merge( array( $global ), array( 'bootstrap-icons' ) )
	);
	akaza_enqueue_theme_style(
		'akaza-global-workplace-trust',
		"{$folder}/global-workplace-trust.css",
		array( $global, 'akaza-global-workplace-hero' )
	);
	akaza_enqueue_theme_style(
		'akaza-global-workplace-impact',
		"{$folder}/global-workplace-impact.css",
		array_merge( array( $global ), array( 'bootstrap-icons', 'akaza-global-workplace-behaviour' ) )
	);
	akaza_enqueue_theme_style(
		'akaza-global-workplace-cta',
		"{$folder}/global-workplace-cta.css",
		array( $global, 'akaza-global-workplace-hero' )
	);

	akaza_enqueue_stats_clients_assets( $base );

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', $base );
	akaza_enqueue_theme_style(
		'akaza-global-workplace-contact',
		"{$folder}/global-workplace-contact.css",
		array_merge( array( $global ), array( 'akaza-contact-form' ) )
	);
	akaza_enqueue_theme_style(
		'akaza-global-workplace-faq',
		"{$folder}/global-workplace-faq.css",
		array_merge( array( $global ), array( 'bootstrap-icons' ) )
	);
	akaza_enqueue_theme_style(
		'akaza-global-workplace-testimonials',
		"{$folder}/global-workplace-testimonials.css",
		array( $global )
	);
}
