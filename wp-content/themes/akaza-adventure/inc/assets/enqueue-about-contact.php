<?php
/**
 * About / Contact page assets.
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @param string $page One of about|contact.
 */
function akaza_enqueue_about_contact_assets( $page ) {
	akaza_enqueue_solutions_carousel();
	$is_about_page = ( 'about' === $page );
	$is_contact_page = ( 'contact' === $page );
	$stats_css   = AKAZA_DIR . '/assets/css/stats.css';
	$stats_js    = AKAZA_DIR . '/assets/js/stats.js';
	$clients_css = AKAZA_DIR . '/assets/css/clients.css';
	$clients_js  = AKAZA_DIR . '/assets/js/clients.js';
	$page_style  = $is_about_page ? 'akaza-about-us' : 'akaza-contact-us';

	if ( $is_about_page ) {
		$about_css = AKAZA_DIR . '/assets/css/about-us.css';
		wp_enqueue_style(
			'akaza-about-us',
			AKAZA_URI . '/assets/css/about-us.css',
			array( 'akaza-main', 'akaza-fonts' ),
			file_exists( $about_css ) ? (string) filemtime( $about_css ) : AKAZA_VERSION
		);
	}

	if ( $is_contact_page ) {
		$contact_page_css = AKAZA_DIR . '/assets/css/contact-us.css';
		$contact_form_css = AKAZA_DIR . '/assets/css/contact-from.css';

		wp_enqueue_style(
			'akaza-contact-form',
			AKAZA_URI . '/assets/css/contact-from.css',
			array( 'akaza-main', 'akaza-fonts' ),
			file_exists( $contact_form_css ) ? (string) filemtime( $contact_form_css ) : AKAZA_VERSION
		);

		wp_enqueue_style(
			'akaza-contact-us',
			AKAZA_URI . '/assets/css/contact-us.css',
			array( 'akaza-main', 'akaza-fonts', 'akaza-contact-form' ),
			file_exists( $contact_page_css ) ? (string) filemtime( $contact_page_css ) : AKAZA_VERSION
		);
	}

	wp_enqueue_style(
		'akaza-stats',
		AKAZA_URI . '/assets/css/stats.css',
		array( 'akaza-main', 'akaza-fonts', $page_style ),
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

	wp_enqueue_style(
		'akaza-clients',
		AKAZA_URI . '/assets/css/clients.css',
		array( 'akaza-main', 'akaza-fonts', $page_style ),
		file_exists( $clients_css ) ? (string) filemtime( $clients_css ) : AKAZA_VERSION
	);

	wp_enqueue_script(
		'akaza-clients',
		AKAZA_URI . '/assets/js/clients.js',
		array(),
		file_exists( $clients_js ) ? (string) filemtime( $clients_js ) : AKAZA_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
