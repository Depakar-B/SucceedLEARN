<?php
/**
 * Client logo catalogue for theme templates.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full client logo list (filename => display name).
 *
 * @return array<string, string>
 */
function akaza_get_client_logos() {
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
 * Base URL for client logo uploads (no trailing slash).
 *
 * @return string
 */
function akaza_get_client_logos_uploads_url() {
	return untrailingslashit( content_url( '/uploads/2026/03' ) );
}

/**
 * Marquee row split for the homepage carousel.
 *
 * @return array{row_one: array<string, string>, row_two: array<string, string>}
 */
function akaza_get_client_logos_marquee_rows() {
	$all = akaza_get_client_logos();

	return array(
		'row_one' => array_slice( $all, 0, 16, true ),
		'row_two' => array_slice( $all, 16, null, true ),
	);
}
