<?php
/**
 * S-Metrics page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue S-Metrics page styles (and scripts when needed).
 */
function akaza_enqueue_s_metrics_assets() {
	$folder     = 's-metrics';
	$foundation = akaza_enqueue_page_foundation();
	$deps       = array(
		$foundation,
		'akaza-global-ui-buttons',
		'akaza-global-buttons',
		'akaza-global-title-accent',
		'akaza-global-panel-title',
	);

	$sections = array(
		'sl-s-metrics-hero',
		'sl-s-metrics-why',
		'sl-s-metrics-dashboard',
		'sl-s-metrics-suite-reporting',
		'sl-s-metrics-features',
		'sl-s-metrics-insights',
		'sl-s-metrics-choose',
		'sl-s-metrics-suite',
		'sl-s-metrics-measure',
		'sl-s-metrics-contact',
	);

	foreach ( $sections as $handle ) {
		akaza_enqueue_theme_style(
			"akaza-{$handle}",
			"{$folder}/{$handle}.css",
			$deps
		);
	}
}
