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

	wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
		array(),
		'1.11.3'
	);

	akaza_enqueue_theme_style('akaza-sl-s-phish-hero',"{$folder}/sl-s-phish-hero.css",array( $foundation ));
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-why', "{$folder}/sl-s-phish-why.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-meet', "{$folder}/sl-s-phish-meet.css", array( $foundation, 'akaza-global-highlight' ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-works', "{$folder}/sl-s-phish-works.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-learning', "{$folder}/sl-s-phish-learning.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-targeting', "{$folder}/sl-s-phish-targeting.css", array( $foundation, 'akaza-global-list-item' ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-reporting', "{$folder}/sl-s-phish-reporting.css", array( $foundation, 'bootstrap-icons' ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-security-awareness', "{$folder}/sl-s-phish-security-awareness.css", array( $foundation, 'akaza-global-list-item', 'akaza-global-panel-title', 'akaza-global-highlight' ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-security-teams', "{$folder}/sl-s-phish-security-teams.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-comparison', "{$folder}/sl-s-phish-comparison.css", array( $foundation ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-why-choose', "{$folder}/sl-s-phish-why-choose.css", array( $foundation, 'akaza-global-panel-title' ) );
	akaza_enqueue_theme_style( 'akaza-sl-s-phish-human-firewall', "{$folder}/sl-s-phish-human-firewall.css", array( $foundation ) );

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );

	akaza_enqueue_theme_style(
		'akaza-sl-s-phish-contact',
		"{$folder}/sl-s-phish-contact.css",
		array( $foundation, 'akaza-global-contact', 'akaza-contact-form' )
	);

	// Global FAQ component (registered in enqueue-core.php).
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style(
		'akaza-global-sbcs',
		'sl-global-sbcs.css',
		array( $foundation, 'akaza-global-panel-title', 'akaza-global-title-accent' )
	);
}

