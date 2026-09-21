<?php
/**
 * Preventing the Facilitation of Tax Evasion Training course marketing assets.
 *
 * CSS lives in assets/css/courses/tax-evasion-facilitation/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + per-section styles.
 */
function akaza_enqueue_tax_evasion_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	$folder = 'courses/tax-evasion-facilitation';
	$deps   = array( 'akaza-course-global' );

	$sections = array(
		'sl-tax-evasion-hero',
		'sl-tax-evasion-risk',
		'sl-tax-evasion-understanding',
		'sl-tax-evasion-cfa',	
		'sl-tax-evasion-course-content',
		'sl-tax-evasion-risk-assessment',
		'sl-tax-evasion-cycle',
		'sl-tax-evasion-interactive',
		'sl-tax-evasion-audience',
		'sl-tax-evasion-why-succeedlearn',
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
