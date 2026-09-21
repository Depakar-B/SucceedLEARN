<?php
/**
 * DPDPA Readiness page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue DPDPA Readiness page styles.
 */
function akaza_enqueue_dpdpa_readiness_assets() {
	$folder     = 'dpdpa-readiness';
	$foundation = akaza_enqueue_page_foundation();

	akaza_enqueue_theme_style(
		'akaza-sl-dpdpa-readiness-hero',
		"{$folder}/sl-dpdpa-readiness-hero.css",
		array( $foundation, 'akaza-global-list-item', 'akaza-global-ui-buttons', 'akaza-global-buttons' )
	);

	akaza_enqueue_theme_style(
		'akaza-sl-dpdpa-readiness-assessment',
		"{$folder}/sl-dpdpa-readiness-assessment.css",
		array( $foundation )
	);

	akaza_enqueue_theme_script(
		'akaza-sl-dpdpa-readiness-assessment',
		"{$folder}/sl-dpdpa-readiness-assessment.js"
	);

	wp_localize_script(
		'akaza-sl-dpdpa-readiness-assessment',
		'slDpdpaReadiness',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'sl_dpdpa_readiness_email' ),
		)
	);
}
