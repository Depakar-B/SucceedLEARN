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

	// Opt-in bordered pill eyebrow (sl-global-sub-heading.css).
	akaza_enqueue_theme_style(
		'akaza-global-sub-heading',
		'sl-global-sub-heading.css',
		array( 'akaza-main', 'akaza-global-title-accent' )
	);

	$folder = 'courses/insider-trading';
	$deps   = array( 'akaza-course-global', 'akaza-global-sub-heading' );

	$sections = array(
		'sl-insider-trading-hero',
		'sl-insider-trading-risk',
		'sl-insider-trading-regulatory-frameworks',
		'sl-insider-trading-other-jurisdictions',
		'sl-insider-trading-topics',
		'sl-insider-trading-audience',
		'sl-insider-trading-why',
		'sl-insider-trading-contact',
	);

	foreach ( $sections as $section ) {
		akaza_enqueue_theme_style(
			'akaza-' . $section,
			"{$folder}/{$section}.css",
			$deps
		);
	}

	// Individuals / Organisations sections + FCP course suite.
	akaza_enqueue_theme_style( 'akaza-global-course-buy-options', 'sl-global-course-buy-options.css', $deps );
	akaza_enqueue_theme_style( 'akaza-global-fcp-suite', 'sl-global-fcp-suite.css', $deps );

	// Global FAQ accordion (CSS + JS). Registered in enqueue-core.php.
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	// Global contact section + course demo form.
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );
	wp_enqueue_style( 'akaza-global-contact' );

	akaza_enqueue_theme_style(
		'akaza-sl-insider-trading-page',
		"{$folder}/sl-insider-trading-page.css",
		array( 'akaza-global-contact', 'akaza-global-faq', 'akaza-global-fcp-suite', 'akaza-contact-form', 'akaza-sl-insider-trading-contact' )
	);
}
