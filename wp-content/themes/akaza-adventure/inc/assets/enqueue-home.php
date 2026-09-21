<?php
/**
 * Page assets: akaza_enqueue_home_assets
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_home_assets() {
	$hero_css       = AKAZA_DIR . '/assets/css/home-hero.css';
	$stats_css      = AKAZA_DIR . '/assets/css/stats.css';
	$stats_js       = AKAZA_DIR . '/assets/js/stats.js';
	$clients_css    = AKAZA_DIR . '/assets/css/clients.css';
	$clients_js     = AKAZA_DIR . '/assets/js/clients.js';
	$challenges_css = AKAZA_DIR . '/assets/css/todays-challenges.css';
	$solution_css   = AKAZA_DIR . '/assets/css/the-solution.css';
	$solution_js    = AKAZA_DIR . '/assets/js/the-solution.js';
	$platform_css   = AKAZA_DIR . '/assets/css/platform.css';
	$feature_css    = AKAZA_DIR . '/assets/css/feature-product-section.css';
	$outcomes_css   = AKAZA_DIR . '/assets/css/outcomes.css';
	$started_css    = AKAZA_DIR . '/assets/css/Getting-Started-Section.css';
	$started_js     = AKAZA_DIR . '/assets/js/getting-started.js';
	$cta_css           = AKAZA_DIR . '/assets/css/cta-section.css';
	$contact_css       = AKAZA_DIR . '/assets/css/contact-from.css';
	$testimonials_css  = AKAZA_DIR . '/assets/css/dpdpa-testimonials.css';

	wp_enqueue_style(
		'akaza-home-hero',
		AKAZA_URI . '/assets/css/home-hero.css',
		array( 'akaza-main' ),
		file_exists( $hero_css ) ? (string) filemtime( $hero_css ) : AKAZA_VERSION
	);

	wp_enqueue_style(
		'akaza-stats',
		AKAZA_URI . '/assets/css/stats.css',
		array( 'akaza-main' ),
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
		'akaza-todays-challenges',
		AKAZA_URI . '/assets/css/todays-challenges.css',
		array( 'akaza-main' ),
		file_exists( $challenges_css ) ? (string) filemtime( $challenges_css ) : AKAZA_VERSION
	);

	wp_enqueue_style(
		'akaza-the-solution',
		AKAZA_URI . '/assets/css/the-solution.css',
		array( 'akaza-main' ),
		file_exists( $solution_css ) ? (string) filemtime( $solution_css ) : AKAZA_VERSION
	);

	wp_enqueue_script(
		'akaza-the-solution',
		AKAZA_URI . '/assets/js/the-solution.js',
		array(),
		file_exists( $solution_js ) ? (string) filemtime( $solution_js ) : AKAZA_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	wp_enqueue_style(
		'akaza-platform',
		AKAZA_URI . '/assets/css/platform.css',
		array( 'akaza-main' ),
		file_exists( $platform_css ) ? (string) filemtime( $platform_css ) : AKAZA_VERSION
	);

	wp_enqueue_style(
		'akaza-feature-product',
		AKAZA_URI . '/assets/css/feature-product-section.css',
		array( 'akaza-main' ),
		file_exists( $feature_css ) ? (string) filemtime( $feature_css ) : AKAZA_VERSION
	);

	wp_enqueue_style(
		'akaza-outcomes',
		AKAZA_URI . '/assets/css/outcomes.css',
		array( 'akaza-main' ),
		file_exists( $outcomes_css ) ? (string) filemtime( $outcomes_css ) : AKAZA_VERSION
	);

	wp_enqueue_style(
		'akaza-home-testimonials',
		AKAZA_URI . '/assets/css/dpdpa-testimonials.css',
		array( 'akaza-main' ),
		file_exists( $testimonials_css ) ? (string) filemtime( $testimonials_css ) : AKAZA_VERSION
	);

	wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
		array(),
		'1.11.3'
	);

	wp_enqueue_style(
		'akaza-getting-started',
		AKAZA_URI . '/assets/css/Getting-Started-Section.css',
		array( 'akaza-main', 'bootstrap-icons' ),
		file_exists( $started_css ) ? (string) filemtime( $started_css ) : AKAZA_VERSION
	);

	wp_enqueue_script(
		'akaza-getting-started',
		AKAZA_URI . '/assets/js/getting-started.js',
		array(),
		file_exists( $started_js ) ? (string) filemtime( $started_js ) : AKAZA_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	wp_enqueue_style(
		'akaza-cta-section',
		AKAZA_URI . '/assets/css/cta-section.css',
		array( 'akaza-main' ),
		file_exists( $cta_css ) ? (string) filemtime( $cta_css ) : AKAZA_VERSION
	);

	wp_enqueue_style(
		'akaza-contact-form',
		AKAZA_URI . '/assets/css/contact-from.css',
		array( 'akaza-main' ),
		file_exists( $contact_css ) ? (string) filemtime( $contact_css ) : AKAZA_VERSION
	);
}
