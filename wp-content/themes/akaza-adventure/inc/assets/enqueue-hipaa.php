<?php
/**
 * HIPAA Annual Workforce Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_hipaa_assets() {
	$folder = 'hipaa-annual-workforce-training';
	$global = akaza_enqueue_page_foundation();

	akaza_enqueue_theme_style( 'akaza-sl-hipaa-hero', "{$folder}/sl-hipaa-hero.css", array( $global ) );

	akaza_enqueue_theme_style( 'akaza-stats', 'stats.css', array( $global ) );
	akaza_enqueue_theme_script( 'akaza-stats', 'stats.js' );

	$sections = array(
		'sl-hipaa-trust',
		'sl-hipaa-problem',
		'sl-hipaa-audit',
		'sl-hipaa-outline',
	);

	foreach ( $sections as $slug ) {
		akaza_enqueue_theme_style( "akaza-{$slug}", "{$folder}/{$slug}.css", array( $global ) );
	}

	akaza_enqueue_theme_style( 'akaza-sl-coc-reporting', 'code-of-conduct/sl-coc-reporting.css', array( $global ) );
	akaza_enqueue_theme_style(
		'akaza-sl-hipaa-audience',
		"{$folder}/sl-hipaa-audience.css",
		array( $global, 'akaza-sl-coc-reporting' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-hipaa-penalties',
		"{$folder}/sl-hipaa-penalties.css",
		array( $global, 'akaza-sl-coc-reporting' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-hipaa-comparison',
		"{$folder}/sl-hipaa-comparison.css",
		array( $global, 'akaza-sl-coc-reporting' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-hipaa-why-us',
		"{$folder}/sl-hipaa-why-us.css",
		array( $global, 'akaza-sl-coc-reporting' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-hipaa-faq',
		"{$folder}/sl-hipaa-faq.css",
		array( $global, 'akaza-sl-coc-reporting' )
	);
	akaza_enqueue_theme_script( 'akaza-sl-hipaa-faq', "{$folder}/sl-hipaa-faq.js" );
}
