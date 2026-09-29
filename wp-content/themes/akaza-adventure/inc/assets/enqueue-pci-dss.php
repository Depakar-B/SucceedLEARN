<?php
/**
 * PCI DSS page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue PCI DSS page styles/scripts.
 */
function akaza_enqueue_pci_dss_assets() {
	$folder     = 'pci-dss';
	$foundation = akaza_enqueue_page_foundation();
	$deps       = array(
		$foundation,
		'akaza-global-ui-buttons',
		'akaza-global-buttons',
		'akaza-global-title-accent',
		'akaza-global-panel-title',
	);

	$sections = array(
		'sl-pci-hero',
		'sl-pci-why',
		'sl-pci-learn',
		'sl-pci-laws',
		'sl-pci-structure',
		'sl-pci-topics',
		'sl-pci-screenshots',
		'sl-pci-cases',
		'sl-pci-choose',
		'sl-pci-audience',
		'sl-pci-strengthen',
		'sl-pci-faq',
		'sl-pci-contact',
	);

	foreach ( $sections as $handle ) {
		akaza_enqueue_theme_style(
			"akaza-{$handle}",
			"{$folder}/{$handle}.css",
			$deps
		);
	}

	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_script(
		'akaza-sl-pci-screenshots',
		'pci-dss/sl-pci-screenshots.js'
	);
}
