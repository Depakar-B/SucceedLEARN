<?php
/**
 * S-Aware page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue S-Aware page styles (and scripts when needed).
 */
function akaza_enqueue_s_aware_assets() {
	$folder = 's-aware';
	$global = akaza_enqueue_page_foundation();

	akaza_enqueue_theme_style(
		'akaza-sl-s-aware-hero',
		"{$folder}/sl-s-aware-hero.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-awareness',
		"{$folder}/sl-saware-awareness.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-highlight' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-why',
		"{$folder}/sl-saware-why.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-highlight' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-learning',
		"{$folder}/sl-saware-learning.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title', 'akaza-global-highlight' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-library',
		"{$folder}/sl-saware-library.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title', 'akaza-global-highlight' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-customisation',
		"{$folder}/sl-saware-customisation.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title', 'akaza-global-highlight', 'akaza-global-list-item' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-delivery',
		"{$folder}/sl-saware-delivery.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title', 'akaza-global-highlight', 'akaza-global-list-item' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-progress',
		"{$folder}/sl-saware-progress.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title', 'akaza-global-highlight', 'akaza-global-list-item' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-employees',
		"{$folder}/sl-saware-employees.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title', 'akaza-global-highlight', 'akaza-global-list-item' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-security-teams',
		"{$folder}/sl-saware-security-teams.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title', 'akaza-global-highlight', 'akaza-global-list-item' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-behaviour-change',
		"{$folder}/sl-saware-behaviour-change.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title', 'akaza-global-highlight', 'akaza-global-list-item' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-comparison',
		"{$folder}/sl-saware-comparison.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title', 'akaza-global-highlight', 'akaza-global-list-item' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-saware-contact',
		"{$folder}/sl-saware-contact.css",
		array( $global, 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title', 'akaza-global-highlight', 'akaza-global-list-item' )
	);
}
