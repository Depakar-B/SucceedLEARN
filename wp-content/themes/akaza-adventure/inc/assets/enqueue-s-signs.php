<?php
/**
 * S-Signs page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue S-Signs page styles (and scripts when needed).
 */
function akaza_enqueue_s_signs_assets() {
	$folder     = 's-signs';
	$foundation = akaza_enqueue_page_foundation();
	$deps       = array(
		$foundation,
		'akaza-global-ui-buttons',
		'akaza-global-buttons',
		'akaza-global-title-accent',
		'akaza-global-panel-title',
		'akaza-global-list-item',
	);

	$sections = array(
		'sl-s-signs-hero',
		'sl-s-signs-why',
		'sl-s-signs-library',
		'sl-s-signs-filtering',
		'sl-s-signs-nudges',
		'sl-s-signs-distribution',
		'sl-s-signs-choose',
		'sl-s-signs-suite',
		'sl-s-signs-reinforce',
		'sl-s-signs-contact',
	);

	foreach ( $sections as $handle ) {
		akaza_enqueue_theme_style(
			"akaza-{$handle}",
			"{$folder}/{$handle}.css",
			$deps
		);
	}
}
