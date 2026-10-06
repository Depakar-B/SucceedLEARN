<?php
/**
 * Failure to Prevent Fraud Training course marketing assets.
 *
 * CSS lives in assets/css/courses/failure-to-prevent-fraud/
 * (one file per section, same pattern as aml-pe-vc).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + per-section Failure to Prevent Fraud styles.
 */
function akaza_enqueue_failure_to_prevent_fraud_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	wp_enqueue_style(
		'akaza-ftpf-open-sans',
		'https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600&display=swap',
		array(),
		null
	);

	// Opt-in bordered pill eyebrow (sl-global-sub-heading.css).
	akaza_enqueue_theme_style(
		'akaza-global-sub-heading',
		'sl-global-sub-heading.css',
		array( 'akaza-main', 'akaza-global-title-accent' )
	);

	// Enquiry form base styles; sl-ftpf-contact.css restyles them.
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );

	$folder = 'courses/failure-to-prevent-fraud';

	akaza_enqueue_theme_style(
		'akaza-sl-ftpf-global',
		"{$folder}/sl-ftpf-global.css",
		array( 'akaza-course-global', 'akaza-global-sub-heading', 'akaza-contact-form' )
	);

	$sections = array(
		'sl-ftpf-hero',
		'sl-ftpf-law',
		'sl-ftpf-overview',
		'sl-ftpf-outcomes',
		'sl-ftpf-audience',
		'sl-ftpf-watch',
		'sl-ftpf-reporting',
		'sl-ftpf-responsibility',
		'sl-ftpf-faq',
		'sl-ftpf-contact',
	);

	foreach ( $sections as $section ) {
		akaza_enqueue_theme_style(
			'akaza-' . $section,
			"{$folder}/{$section}.css",
			array( 'akaza-sl-ftpf-global' )
		);
	}

	// Individuals / Organisations sections + FCP course suite.
	akaza_enqueue_theme_style( 'akaza-global-course-buy-options', 'sl-global-course-buy-options.css', array( 'akaza-sl-ftpf-global' ) );
	akaza_enqueue_theme_style( 'akaza-global-fcp-suite', 'sl-global-fcp-suite.css', array( 'akaza-sl-ftpf-global' ) );
	akaza_enqueue_theme_style( 'akaza-fcp-sl-fcp-cpd', 'financial-crime-prevention/fcp-sl-fcp-cpd.css', array( 'akaza-sl-ftpf-global' ) );
}
