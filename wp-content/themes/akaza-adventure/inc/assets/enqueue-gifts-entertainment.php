<?php
/**
 * Gifts and Entertainment course marketing assets.
 *
 * CSS lives in assets/css/courses/gifts-and-entertainment/
 * (one file per section, same pattern as landing pages).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + per-section Gifts & Entertainment styles.
 */
function akaza_enqueue_gifts_entertainment_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	$folder = 'courses/gifts-and-entertainment';
	$deps   = array( 'akaza-course-global' );

	$sections = array(
		'sl-gifts-entertainment-hero',
		'sl-gifts-entertainment-individuals',
		'sl-gifts-entertainment-organisations',
		'sl-gifts-entertainment-pevc-suite',
		'sl-gifts-entertainment-overview',
		'sl-gifts-entertainment-risk',
		'sl-gifts-entertainment-decisions',
		'sl-gifts-entertainment-learning-outcomes',
		'sl-gifts-entertainment-target-audience',
		'sl-gifts-entertainment-high-risk',
		'sl-gifts-entertainment-legal-context',
		'sl-gifts-entertainment-practical-elearning',
		'sl-gifts-entertainment-cta',
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
