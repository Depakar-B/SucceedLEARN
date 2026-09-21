<?php
/**
 * Inclusive Workplace Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_inclusive_training_assets() {
	$gwct_folder = 'global-workplace-compliance-training-for-employees';

	wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
		array(),
		'1.11.3'
	);

	akaza_enqueue_theme_style( 'akaza-global-workplace-hero', "{$gwct_folder}/global-workplace-hero.css" );
	akaza_enqueue_theme_style(
		'akaza-global-workplace-behaviour',
		"{$gwct_folder}/global-workplace-behaviour.css",
		array( 'akaza-main', 'akaza-fonts', 'bootstrap-icons' )
	);
	akaza_enqueue_theme_style( 'akaza-global-workplace-cta', "{$gwct_folder}/global-workplace-cta.css" );
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css' );
	akaza_enqueue_theme_style(
		'akaza-inclusive-workplace-training',
		'inclusive-workplace-training/inclusive-workplace-training.css',
		array(
			'akaza-main',
			'akaza-fonts',
			'akaza-global-workplace-hero',
			'akaza-global-workplace-behaviour',
			'akaza-global-workplace-cta',
			'akaza-contact-form',
		)
	);

	akaza_enqueue_stats_clients_assets();
}
