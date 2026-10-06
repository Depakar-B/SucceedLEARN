<?php
/**
 * Modern Slavery Awareness Training course marketing assets.
 *
 * CSS lives in assets/css/courses/modern-slavery-awareness/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + page styles.
 */
function akaza_enqueue_modern_slavery_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	wp_enqueue_style(
		'akaza-msa-open-sans',
		'https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap',
		array(),
		null
	);

	// Enquiry form base styles; the page stylesheet restyles them.
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );

	// Opt-in bordered pill eyebrow (sl-global-sub-heading.css).
	akaza_enqueue_theme_style(
		'akaza-global-sub-heading',
		'sl-global-sub-heading.css',
		array( 'akaza-main', 'akaza-global-title-accent' )
	);

	akaza_enqueue_theme_style(
		'akaza-sl-msa-page',
		'courses/modern-slavery-awareness/sl-msa-page.css',
		array( 'akaza-course-global', 'akaza-contact-form', 'akaza-global-sub-heading' )
	);

	// Individuals / Organisations sections + FCP course suite.
	akaza_enqueue_theme_style( 'akaza-global-course-buy-options', 'sl-global-course-buy-options.css', array( 'akaza-sl-msa-page' ) );
	akaza_enqueue_theme_style( 'akaza-global-fcp-suite', 'sl-global-fcp-suite.css', array( 'akaza-sl-msa-page' ) );
	akaza_enqueue_theme_style( 'akaza-fcp-sl-fcp-cpd', 'financial-crime-prevention/fcp-sl-fcp-cpd.css', array( 'akaza-sl-msa-page' ) );

	akaza_enqueue_theme_script(
		'akaza-sl-msa-faq',
		'courses/modern-slavery-awareness/sl-msa-faq.js'
	);
}
