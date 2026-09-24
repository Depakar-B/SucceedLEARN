<?php
/**
 * SMCR Training for PE/VC Firms course marketing assets.
 *
 * CSS lives in assets/css/courses/smcr-pe-vc/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + per-section styles.
 */
function akaza_enqueue_smcr_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	$folder = 'courses/smcr-pe-vc';
	$deps   = array( 'akaza-course-global' );

	$sections = array(
		'sl-smcr-hero',
		'sl-smcr-individuals',
		'sl-smcr-organisations',
		'sl-smcr-pevc-suite',
		'sl-smcr-highlights',
		'sl-smcr-about',
		'sl-smcr-courses',
		'sl-smcr-employees',
		'sl-smcr-conduct-rules',
		'sl-smcr-senior-managers',
		'sl-smcr-accountability',
		'sl-smcr-course-selection',
		'sl-smcr-regulatory-context',
		'sl-smcr-practical-learning',
		'sl-smcr-evc-learning',
		'sl-smcr-course-cta',
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

	// Global contact section + course form + page-specific contact extras.
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );
	wp_enqueue_style( 'akaza-global-contact' );
	akaza_enqueue_theme_style(
		'akaza-sl-smcr-contact',
		"{$folder}/sl-global-contact.css",
		array( 'akaza-course-global', 'akaza-global-contact', 'akaza-contact-form' )
	);
}
