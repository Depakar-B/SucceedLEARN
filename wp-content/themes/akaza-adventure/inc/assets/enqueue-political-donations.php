<?php
/**
 * Political Donations Training for PE/VC course marketing assets.
 *
 * CSS lives in assets/css/courses/political-donations-pe-vc/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + per-section styles.
 */
function akaza_enqueue_political_donations_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	$folder = 'courses/political-donations-pe-vc';
	$deps   = array( 'akaza-course-global' );

	$sections = array(
		'sl-political-donations-hero',
		'sl-political-donations-individuals',
		'sl-political-donations-organisations',
		'sl-political-donations-pevc-suite',
		'sl-political-donations-context',
		'sl-political-donations-overview',
		'sl-political-donations-regulatory-context',
		'sl-political-donations-learning-outcomes',
		'sl-political-donations-activity',
		'sl-political-donations-inside',
		'sl-political-donations-practical',
		'sl-political-donations-audience',
		'sl-political-donations-why',
	);

	foreach ( $sections as $section ) {
		akaza_enqueue_theme_style(
			'akaza-' . $section,
			"{$folder}/{$section}.css",
			$deps
		);
	}

	// Opt-in bordered pill eyebrow (sl-global-sub-heading.css).
	akaza_enqueue_theme_style(
		'akaza-global-sub-heading',
		'sl-global-sub-heading.css',
		array( 'akaza-main', 'akaza-global-title-accent' )
	);

	// Global FAQ accordion (CSS + JS). Registered in enqueue-core.php.
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	// Global contact section + course demo form.
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );
	wp_enqueue_style( 'akaza-global-contact' );
}
