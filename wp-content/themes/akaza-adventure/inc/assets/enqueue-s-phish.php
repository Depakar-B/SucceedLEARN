<?php
/**
 * S-Phish page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue S-Phish page styles (and scripts when needed).
 */
function akaza_enqueue_s_phish_assets() {
	$folder     = 's-phish';
	$foundation = akaza_enqueue_page_foundation();

	akaza_enqueue_theme_style('akaza-sl-s-phish-hero',"{$folder}/sl-s-phish-hero.css",array( $foundation ));
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-why', "{$folder}/sl-s-phish-why.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-meet', "{$folder}/sl-s-phish-meet.css", array( $foundation, 'akaza-global-highlight' ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-works', "{$folder}/sl-s-phish-works.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-learning', "{$folder}/sl-s-phish-learning.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-targeting', "{$folder}/sl-s-phish-targeting.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-reporting', "{$folder}/sl-s-phish-reporting.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-security-awareness', "{$folder}/sl-s-phish-security-awareness.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-security-teams', "{$folder}/sl-s-phish-security-teams.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-suite', "{$folder}/sl-s-phish-suite.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-comparison', "{$folder}/sl-s-phish-comparison.css", array( $foundation ) );
}

