<?php
/**
 * Client logo catalogue for AMP templates.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full client logo list (filename => display name).
 *
 * @return array<string, string>
 */
function succeedlearn_amp_get_client_logos() {
	static $logos = null;

	if ( null !== $logos ) {
		return $logos;
	}

	$logos = array(
		'Autoliv.webp'                 => 'Autoliv',
		'Shipbob.webp'                 => 'Shipbob',
		'Sharechat.webp'               => 'Sharechat',
		'Saint-Gobin.webp'             => 'Saint Gobain',
		'Royal-Enfield.webp'           => 'Royal Enfield',
		'Redchilies.webp'              => 'Redchilies',
		'RazorPay.webp'                => 'RazorPay',
		'PowerGrid.webp'               => 'PowerGrid',
		'Phillips-Machine-Tool.webp'   => 'Phillips Machine Tool',
		'Ocrolus.webp'                 => 'Ocrolus',
		'NXP.webp'                     => 'NXP',
		'Nippon-Express-1.webp'        => 'Nippon Express',
		'MSC-1.webp'                   => 'MSC',
		'Lupin-1.webp'                 => 'Lupin',
		'Lenova-1.webp'                => 'Lenovo',
		'TATA.webp'                    => 'TATA',
		'LatentView-1.webp'            => 'LatentView',
		'Landmark-Group-1.webp'        => 'Landmark Group',
		'Inspira-1.webp'               => 'Inspira',
		'GE-Appliances-1.webp'         => 'GE Appliances',
		'Experion-Technologies-1.webp' => 'Experion Technologies',
		'DHL-1.webp'                   => 'DHL',
		'Cred.webp'                    => 'Cred',
		'Chargebee.webp'               => 'Chargebee',
		'Aggreko.webp'                 => 'Aggreko',
		'Abakkus-1.webp'               => 'Abakkus',
		'Broll.webp'                   => 'Broll',
		'Berkidea.webp'                => 'Berkidea',
		'Arcil.webp'                   => 'Arcil',
		'AirIndia.webp'                => 'Air India',
		'AirAsia.webp'                 => 'AirAsia',
		'Tresvista.webp'               => 'Tresvista',
		'Titan.webp'                   => 'Titan',
		'The-Economist.webp'           => 'The Economist',
		'TCS.webp'                     => 'TCS',
	);

	return $logos;
}

/**
 * Subset of logos for the homepage AMP preview grid.
 *
 * @param int $limit Max logos to return.
 * @return array<string, string>
 */
function succeedlearn_amp_get_home_client_logos( $limit = 10 ) {
	$all = succeedlearn_amp_get_client_logos();
	$limit = max( 1, absint( $limit ) );

	return array_slice( $all, 0, $limit, true );
}

/**
 * Client logo vars for homepage-style AMP sections.
 *
 * @param int $limit Max logos.
 * @return array{client_logos:array,uploads_base:string,show_view_all:bool,clients_page_url:string}
 */
function succeedlearn_amp_prepare_home_clients_context( $limit = 12 ) {
	$client_logos     = succeedlearn_amp_get_home_client_logos( $limit );
	$uploads_base     = content_url( '/uploads/2026/03' );
	$show_view_all    = false;
	$clients_page_url = home_url( '/clients/' );

	if ( class_exists( '\\SucceedLEARN\\AMP\\Plugin' ) ) {
		$config = \SucceedLEARN\AMP\Plugin::get_instance()->get_config();
		if ( $config && method_exists( $config, 'has_clients_page' ) && $config->has_clients_page() ) {
			$show_view_all    = true;
			$clients_page_url = $config->get_clients_url();
			if ( function_exists( 'succeedlearn_amp_url' ) ) {
				$clients_page_url = succeedlearn_amp_url( $clients_page_url );
			}
		}
	}

	return compact( 'client_logos', 'uploads_base', 'show_view_all', 'clients_page_url' );
}

/**
 * Default homepage-style stats for marketing pages.
 *
 * @return array<int, array{0:string,1:string}>
 */
function succeedlearn_amp_get_home_stats() {
	return array(
		array( '1000+', __( 'Organisations Trained', 'succeedlearn-amp' ) ),
		array( '90%+', __( 'Learner Engagement', 'succeedlearn-amp' ) ),
		array( '70%', __( 'Reduction in Phishing Risk', 'succeedlearn-amp' ) ),
		array( '90%', __( 'Compliance Risk Reduced', 'succeedlearn-amp' ) ),
	);
}
