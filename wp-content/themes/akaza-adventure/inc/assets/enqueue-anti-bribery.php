<?php
/**
 * Anti-Bribery and Anti-Corruption eLearning course marketing assets.
 *
 * CSS lives in assets/css/courses/anti-bribery-anti-corruption/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + per-section styles.
 */
function akaza_enqueue_anti_bribery_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	$folder = 'courses/anti-bribery-anti-corruption';
	$deps   = array( 'akaza-course-global' );

	$sections = array(
		'sl-anti-bribery-hero',
		'sl-anti-bribery-overview',
		'sl-anti-bribery-learning-outcomes',
		'sl-anti-bribery-topics',
		'sl-anti-bribery-decision-journey',
		'sl-abac-scenario-showcase',
		'sl-abac-delivery-options',
		'sl-abac-target-audience',
		'sl-abac-laws-covered',
		'sl-abac-compliance-library',
	);

	foreach ( $sections as $section ) {
		akaza_enqueue_theme_style(
			'akaza-' . $section,
			"{$folder}/{$section}.css",
			$deps
		);
	}

	akaza_enqueue_theme_script(
		'akaza-sl-abac-scenario-showcase',
		'courses/anti-bribery-anti-corruption/sl-abac-scenario-showcase.js'
	);
	akaza_enqueue_theme_script(
		'akaza-sl-abac-laws-covered',
		'courses/anti-bribery-anti-corruption/sl-abac-laws-covered.js'
	);

	// Opt-in bordered pill eyebrow (sl-global-sub-heading.css).
	akaza_enqueue_theme_style(
		'akaza-global-sub-heading',
		'sl-global-sub-heading.css',
		array( 'akaza-main', 'akaza-global-title-accent' )
	);

	// Individuals / Organisations sections + FCP course suite.
	akaza_enqueue_theme_style( 'akaza-global-course-buy-options', 'sl-global-course-buy-options.css', array( 'akaza-course-global' ) );
	akaza_enqueue_theme_style( 'akaza-global-fcp-suite', 'sl-global-fcp-suite.css', array( 'akaza-course-global' ) );
	akaza_enqueue_theme_style( 'akaza-fcp-sl-fcp-cpd', 'financial-crime-prevention/fcp-sl-fcp-cpd.css', array( 'akaza-course-global' ) );

	// Global FAQ component (registered in enqueue-core.php).
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style(
		'akaza-sl-abac-faq',
		"{$folder}/sl-abac-faq.css",
		array( 'akaza-course-global', 'akaza-global-faq' )
	);

	// Global contact section + course enquiry form.
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );
	wp_enqueue_style( 'akaza-global-contact' );
	akaza_enqueue_theme_style(
		'akaza-sl-abac-contact',
		"{$folder}/sl-abac-contact.css",
		array( 'akaza-course-global', 'akaza-global-contact', 'akaza-contact-form' )
	);

	// Page-level background rhythm; loads after every section stylesheet.
	akaza_enqueue_theme_style(
		'akaza-sl-anti-bribery-page',
		"{$folder}/sl-anti-bribery-page.css",
		array( 'akaza-sl-abac-contact', 'akaza-sl-abac-faq', 'akaza-global-fcp-suite', 'akaza-fcp-sl-fcp-cpd' )
	);
}
