<?php
/**
 * Code of Conduct page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_coc_assets() {
	$folder = 'code-of-conduct';
	$hero   = 'akaza-sl-code-of-conduct-hero';

	akaza_enqueue_theme_style( $hero, "{$folder}/sl-code-of-conduct-hero.css" );
	akaza_enqueue_theme_script( $hero, "{$folder}/sl-code-of-conduct-hero.js" );

	$hero_deps = array( $hero );

	$sections = array(
		'sl-coc-section-close',
		'sl-code-conduct-features',
		'sl-code-conduct-definition',
		'sl-code-conduct-matters',
		'sl-coc-problem',
		'sl-coc-coverage',
		'sl-coc-emerging-risks',
		// 'sl-coc-interactive', // Hidden — restore with template part when section is ready.
		'sl-coc-decision',
		'sl-coc-learning',
		'sl-coc-customization',
		'sl-coc-deployment',
		'sl-coc-accessibility',
		'sl-coc-reporting',
		'sl-coc-audience',
		'sl-coc-one-programme',
		// 'sl-coc-buyer-personas', // Replaced by sl-coc-one-programme diagram.
		'sl-coc-industries',
		'sl-coc-differentiation',
		'sl-coc-stats',
		'sl-coc-customer-story',
	);

	foreach ( $sections as $slug ) {
		akaza_enqueue_theme_style( "akaza-{$slug}", "{$folder}/{$slug}.css", $hero_deps );
	}

	akaza_enqueue_theme_script( 'akaza-sl-coc-decision', "{$folder}/sl-coc-decision.js" );
	akaza_enqueue_theme_script( 'akaza-sl-coc-stats', "{$folder}/sl-coc-stats.js" );

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );
	akaza_enqueue_theme_style(
		'akaza-sl-coc-faq',
		"{$folder}/sl-coc-faq.css",
		array_merge( $hero_deps, array( 'akaza-global-faq' ) )
	);

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css' );
	akaza_enqueue_theme_style(
		'akaza-sl-coc-contact',
		"{$folder}/sl-coc-contact.css",
		array( $hero, 'akaza-contact-form' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-coc-fixed-typography',
		"{$folder}/sl-coc-fixed-typography.css",
		array( 'akaza-sl-coc-contact' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-coc-section-rhythm',
		"{$folder}/sl-coc-section-rhythm.css",
		array( 'akaza-sl-coc-fixed-typography', 'akaza-sl-coc-faq', 'akaza-global-faq' )
	);
}
