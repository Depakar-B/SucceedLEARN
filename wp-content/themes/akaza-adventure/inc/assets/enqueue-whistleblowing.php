<?php
/**
 * Whistleblowing Training for PE/VC course marketing assets.
 *
 * CSS lives in assets/css/courses/whistleblowing-pe-vc/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + per-section styles.
 */
function akaza_enqueue_whistleblowing_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	$folder = 'courses/whistleblowing-pe-vc';
	$deps   = array( 'akaza-course-global' );

	$sections = array(
		'sl-whistleblowing-hero',
		'sl-whistleblowing-individuals',
		'sl-whistleblowing-organisations',
		'sl-whistleblowing-pevc-suite',
		'sl-whistleblowing-outcomes',
		'sl-whistleblowing-overview',
		'sl-whistleblowing-designed',
		'sl-whistleblowing-audience',
		'sl-whistleblowing-misconduct',
		'sl-whistleblowing-course',
		'sl-whistleblowing-regulatory',
		'sl-whistleblowing-outcomes-section',
		'sl-whistleblowing-content',
		'sl-whistleblowing-cta',
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

	// Global contact section + course form.
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );
	wp_enqueue_style( 'akaza-global-contact' );
}
