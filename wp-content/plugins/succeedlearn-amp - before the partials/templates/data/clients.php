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
