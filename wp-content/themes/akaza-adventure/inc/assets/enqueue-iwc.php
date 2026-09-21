<?php
/**
 * Page assets: akaza_enqueue_iwc_course_assets
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_iwc_course_assets() {
	$iwc_course_css  = AKAZA_DIR . '/assets/css/sl-iwc-course.css';
	$contact_css     = AKAZA_DIR . '/assets/css/contact-from.css';
	$contact_form_css = AKAZA_DIR . '/assets/css/contact-form-brand.css';
	$clients_css     = AKAZA_DIR . '/assets/css/clients.css';
	$clients_js      = AKAZA_DIR . '/assets/js/clients.js';

	wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
		array(),
		'1.11.3'
	);

	wp_enqueue_style(
		'akaza-sl-iwc-course',
		AKAZA_URI . '/assets/css/sl-iwc-course.css',
		array( 'akaza-main', 'akaza-fonts', 'bootstrap-icons' ),
		file_exists( $iwc_course_css ) ? (string) filemtime( $iwc_course_css ) : AKAZA_VERSION
	);

	wp_enqueue_style(
		'akaza-clients',
		AKAZA_URI . '/assets/css/clients.css',
		array( 'akaza-main' ),
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

	wp_enqueue_style(
		'akaza-contact-form',
		AKAZA_URI . '/assets/css/contact-from.css',
		array( 'akaza-main' ),
		file_exists( $contact_css ) ? (string) filemtime( $contact_css ) : AKAZA_VERSION
	);

	if ( file_exists( $contact_form_css ) ) {
		wp_enqueue_style(
			'akaza-contact-form-brand',
			AKAZA_URI . '/assets/css/contact-form-brand.css',
			array( 'akaza-contact-form' ),
			(string) filemtime( $contact_form_css )
		);
	}
}
