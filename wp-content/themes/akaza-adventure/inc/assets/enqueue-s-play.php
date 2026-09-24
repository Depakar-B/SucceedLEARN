<?php
/**
 * S-Play page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue S-Play page styles (and scripts when needed).
 */
function akaza_enqueue_s_play_assets() {
	$folder     = 's-play';
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
		'sl-s-play-hero',
		'sl-s-play-why',
		'sl-s-play-works',
		'sl-s-play-games',
		'sl-s-play-choose',
		'sl-s-play-complements',
		'sl-s-play-comparison',
		'sl-s-play-benefits',
		'sl-s-play-delivery',
		'sl-s-play-employees',
		'sl-s-play-teams',
		'sl-s-play-suite',
		'sl-s-play-experience',
		'sl-s-play-contact',
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
}
