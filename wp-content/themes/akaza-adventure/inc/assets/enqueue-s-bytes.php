<?php
/**
 * S-Bytes page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue S-Bytes page styles (and scripts when needed).
 */
function akaza_enqueue_s_bytes_assets() {
	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	$folder = 's-bytes';
	$base   = array( 'akaza-main', 'akaza-fonts' );
	$accent = array_merge( $base, array( 'akaza-global-title-accent' ) );
	$panel  = array_merge( $base, array( 'akaza-global-title-accent', 'akaza-global-panel-title' ) );
	$btns   = array_merge( $base, array( 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent', 'akaza-global-panel-title' ) );

	akaza_enqueue_theme_style( 'akaza-sl-sbytes-hero', "{$folder}/sl-sbytes-hero.css", array_merge( $base, array( 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent' ) ) );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-why', "{$folder}/sl-sbytes-why.css", $accent );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-meet', "{$folder}/sl-sbytes-meet.css", $panel );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-consume', "{$folder}/sl-sbytes-consume.css", $panel );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-works', "{$folder}/sl-sbytes-works.css", $panel );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-library', "{$folder}/sl-sbytes-library.css", $btns );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-fatigue', "{$folder}/sl-sbytes-fatigue.css", array_merge( $accent, array( 'akaza-global-list-item' ) ) );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-delivered', "{$folder}/sl-sbytes-delivered.css", $panel );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-visibility', "{$folder}/sl-sbytes-visibility.css", $accent );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-employees', "{$folder}/sl-sbytes-employees.css", $panel );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-suite', "{$folder}/sl-sbytes-suite.css", array( 'akaza-sl-sbytes-employees' ) );
	akaza_enqueue_theme_style( 'akaza-sl-sbytes-funfosec', "{$folder}/sl-sbytes-funfosec.css", $btns );

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', $base );
	akaza_enqueue_theme_style(
		'akaza-sl-sbytes-contact',
		"{$folder}/sl-sbytes-contact.css",
		array_merge( $base, array( 'akaza-sl-sbytes-hero', 'akaza-contact-form', 'akaza-global-title-accent' ) )
	);
}
