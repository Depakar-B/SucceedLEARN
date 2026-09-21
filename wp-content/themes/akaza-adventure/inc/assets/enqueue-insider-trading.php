<?php
/**
 * Insider Trading eLearning course marketing assets.
 *
 * CSS lives in assets/css/courses/insider-trading/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + per-section styles.
 */
function akaza_enqueue_insider_trading_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	$folder = 'courses/insider-trading';
	$deps   = array( 'akaza-course-global' );

	$sections = array(
		'sl-insider-trading-hero',
		'sl-insider-trading-risk',
		'sl-insider-trading-market-abuse',
		'sl-insider-trading-regulatory-frameworks',
		'sl-insider-trading-topics',
		'sl-insider-trading-interactive',
		'sl-insider-trading-audience',
		'sl-insider-trading-why',
		'sl-insider-trading-risk-cta',
		'sl-insider-trading-buy-cta',
		'sl-insider-trading-contact',
	);

	foreach ( $sections as $section ) {
		akaza_enqueue_theme_style(
			'akaza-' . $section,
			"{$folder}/{$section}.css",
			$deps
		);
	}

	// Global FAQ accordion (CSS + JS). Registered in enqueue-core.php.
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	// Global contact section + course demo form.
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );
	wp_enqueue_style( 'akaza-global-contact' );
}
