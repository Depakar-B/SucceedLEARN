<?php
/**
 * Page assets: akaza_enqueue_legal_assets
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_legal_assets() {
	$legal_css = AKAZA_DIR . '/assets/css/legal-page.css';
	wp_enqueue_style(
		'akaza-legal-page',
		AKAZA_URI . '/assets/css/legal-page.css',
		array( 'akaza-main', 'akaza-fonts' ),
		file_exists( $legal_css ) ? (string) filemtime( $legal_css ) : AKAZA_VERSION
	);
}
