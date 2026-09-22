<?php
/**
 * OWASP Top 10 Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue OWASP page styles and curriculum script.
 */
function akaza_enqueue_owasp_assets() {
	$folder     = 'owasp';
	$foundation = akaza_enqueue_page_foundation();
	$deps       = array(
		$foundation,
		'akaza-global-ui-buttons',
		'akaza-global-buttons',
		'akaza-global-title-accent',
		'akaza-global-panel-title',
	);

	$sections = array(
		'sl-owasp-hero',
		'sl-owasp-overview',
		'sl-owasp-what-is',
		'sl-owasp-curriculum',
		'sl-owasp-coding',
		'sl-owasp-outcomes',
		'sl-owasp-audience',
		'sl-owasp-experience',
		'sl-owasp-impact',
		'sl-owasp-culture',
		'sl-owasp-delivery',
	);

	foreach ( $sections as $handle ) {
		akaza_enqueue_theme_style(
			"akaza-{$handle}",
			"{$folder}/{$handle}.css",
			$deps
		);
	}

	akaza_enqueue_theme_script(
		'akaza-sl-owasp-curriculum',
		"{$folder}/sl-owasp-curriculum.js"
	);

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );
	akaza_enqueue_theme_style(
		'akaza-sl-owasp-faq',
		"{$folder}/sl-owasp-faq.css",
		array_merge( $deps, array( 'akaza-global-faq' ) )
	);

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css' );
	akaza_enqueue_theme_style(
		'akaza-sl-owasp-contact',
		"{$folder}/sl-owasp-contact.css",
		array_merge( $deps, array( 'akaza-contact-form' ) )
	);
}
