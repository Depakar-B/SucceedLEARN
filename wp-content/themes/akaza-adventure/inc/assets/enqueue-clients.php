<?php
/**
 * Page assets: akaza_enqueue_clients_assets
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_clients_assets() {
	$clients_page_css = AKAZA_DIR . '/assets/css/clients-page.css';
	$stats_css        = AKAZA_DIR . '/assets/css/stats.css';
	$stats_js         = AKAZA_DIR . '/assets/js/stats.js';

	wp_enqueue_style(
		'akaza-clients-page',
		AKAZA_URI . '/assets/css/clients-page.css',
		array( 'akaza-main', 'akaza-fonts' ),
		file_exists( $clients_page_css ) ? (string) filemtime( $clients_page_css ) : AKAZA_VERSION
	);

	wp_enqueue_style(
		'akaza-stats',
		AKAZA_URI . '/assets/css/stats.css',
		array( 'akaza-main', 'akaza-fonts', 'akaza-clients-page' ),
		file_exists( $stats_css ) ? (string) filemtime( $stats_css ) : AKAZA_VERSION
	);

	wp_enqueue_script(
		'akaza-stats',
		AKAZA_URI . '/assets/js/stats.js',
		array(),
		file_exists( $stats_js ) ? (string) filemtime( $stats_js ) : AKAZA_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
