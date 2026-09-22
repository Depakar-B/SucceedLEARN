<?php
/**
 * S-Sync page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue S-Sync page styles (and scripts when needed).
 */
function akaza_enqueue_s_sync_assets() {
	$folder     = 's-sync';
	$foundation = akaza_enqueue_page_foundation();
	$deps       = array(
		$foundation,
		'akaza-global-ui-buttons',
		'akaza-global-buttons',
		'akaza-global-title-accent',
		'akaza-global-panel-title',
	);

	$sections = array(
		'sl-s-sync-hero',
		'sl-s-sync-why',
		'sl-s-sync-integrations',
		'sl-s-sync-choose',
		'sl-s-sync-enterprise',
		'sl-s-sync-suite',
		'sl-s-sync-connect',
		'sl-s-sync-contact',
	);

	foreach ( $sections as $handle ) {
		akaza_enqueue_theme_style(
			"akaza-{$handle}",
			"{$folder}/{$handle}.css",
			$deps
		);
	}
}
