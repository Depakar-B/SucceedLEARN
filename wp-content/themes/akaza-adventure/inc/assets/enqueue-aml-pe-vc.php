<?php
/**
 * AML PE/VC course marketing assets.
 *
 * CSS lives in assets/css/courses/aml-pe-vc/
 * (one file per section, same pattern as gifts-and-entertainment).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + per-section AML PE/VC styles.
 */
function akaza_enqueue_aml_pe_vc_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	$folder = 'courses/aml-pe-vc';
	$deps   = array( 'akaza-course-global' );

	$sections = array(
		'sl-aml-pe-vc-hero',
		'sl-aml-pe-vc-individuals',
		'sl-aml-pe-vc-organisations',
		'sl-aml-pe-vc-pevc-suite',
		'sl-aml-pe-vc-fcp-suite',
		'sl-aml-pe-vc-overview',
		'sl-aml-pe-vc-learning-outcomes',
		'sl-aml-pe-vc-laws',
		'sl-aml-pe-vc-due-diligence',
		'sl-aml-pe-vc-interactive',
		'sl-aml-pe-vc-assessment',
		'sl-aml-pe-vc-cta',
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
