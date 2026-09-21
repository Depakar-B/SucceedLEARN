<?php
/**
 * Security Awareness and Phishing page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Security Awareness and Phishing page styles/scripts.
 *
 * Note: SAP uses secondary global header + footer (akaza chrome).
 */
function akaza_enqueue_sap_assets() {
	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	$folder = 'security-awareness-and-phishing';
	$base   = array( 'akaza-main', 'akaza-fonts' );

	akaza_enqueue_theme_style( 'akaza-sl-sa-hero', "{$folder}/sl-sa-hero.css", $base );

	$annual_deps = $base;
	akaza_enqueue_theme_style( 'akaza-sl-sa-annual-training', "{$folder}/sl-sa-annual-training.css", $annual_deps );

	$sections = array(
		'sl-sa-platform'                 => array( 'sl-sa-platform.css', $annual_deps ),
		'sl-sa-definition'               => array( 'sl-sa-definition.css', $annual_deps ),
		'sl-sa-comparison'               => array( 'sl-sa-comparison.css', $annual_deps ),
		'sl-sa-security-behaviour-suite' => array( 'sl-sa-security-behaviour-suite.css', $annual_deps ),
		'sl-sa-lifecycle'                => array( 'sl-sa-lifecycle.css', $annual_deps ),
		'sl-sa-process'                  => array( 'sl-sa-process.css', array_merge( $annual_deps, array( 'akaza-sl-sa-annual-training' ) ) ),
		'sl-sa-leadership'               => array( 'sl-sa-leadership.css', array_merge( $annual_deps, array( 'akaza-sl-sa-annual-training' ) ) ),
		'sl-sa-achieve'                  => array( 'sl-sa-achieve.css', array_merge( $annual_deps, array( 'akaza-sl-sa-annual-training' ) ) ),
		'sl-sa-behaviour'                => array( 'sl-sa-behaviour.css', array_merge( $annual_deps, array( 'akaza-sl-sa-annual-training' ) ) ),
	);

	foreach ( $sections as $handle => $config ) {
		akaza_enqueue_theme_style( "akaza-{$handle}", "{$folder}/{$config[0]}", $config[1] );
	}

	akaza_enqueue_theme_script( 'akaza-sl-sa-dashboard-activity', "{$folder}/sl-sa-dashboard-activity.js" );
	akaza_enqueue_theme_script( 'akaza-sl-sa-security-behaviour-suite', "{$folder}/sl-sa-security-behaviour-suite.js" );

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', $base );
	akaza_enqueue_theme_style(
		'akaza-sl-sa-contact',
		"{$folder}/sl-sa-contact.css",
		array_merge( $base, array( 'akaza-sl-sa-hero', 'akaza-contact-form' ) )
	);

	// Global FAQ accordion (CSS + JS). Registered in enqueue-core.php.
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style(
		'akaza-sl-sa-faq',
		"{$folder}/sl-sa-faq.css",
		array_merge( $base, array( 'akaza-global-faq' ) )
	);

	// Load last so SucceedLearn h1–h4 win over Elementor kit / Eduma leftovers.
	akaza_enqueue_theme_style(
		'akaza-sl-sa-typography',
		"{$folder}/sl-sa-typography.css",
		array_merge(
			$base,
			array(
				'akaza-sl-sa-hero',
				'akaza-sl-sa-contact',
				'akaza-sl-sa-faq',
				'akaza-global-faq',
				'akaza-global-title-accent',
				'akaza-global-panel-title',
			)
		)
	);
}
