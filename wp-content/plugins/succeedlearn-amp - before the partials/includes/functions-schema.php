<?php
/**
 * Schema / JSON-LD helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @return array
 */
function succeedlearn_amp_get_organization_schema_entity() {
	$logo = get_template_directory_uri() . '/assets/images/logo-word.svg';
	return array(
		'@type'      => 'Organization',
		'@id'        => home_url( '/#organization' ),
		'name'       => 'SucceedLEARN',
		'legalName'  => 'Succeed Technologies Private Limited',
		'url'        => home_url( '/' ),
		'logo'       => array(
			'@type' => 'ImageObject',
			'url'   => $logo,
		),
		'email'      => 'sales@succeedtech.com',
		'sameAs'     => array(
			'https://www.linkedin.com/company/succeedlearn',
			'https://www.youtube.com/@succeedlearn',
		),
		'description'=> 'SucceedLEARN is a global compliance and security training provider helping teams transform mandatory training into measurable outcomes.',
	);
}

/**
 * @return array
 */
function succeedlearn_amp_get_website_schema_entity() {
	return array(
		'@type'           => 'WebSite',
		'@id'             => home_url( '/#website' ),
		'url'             => home_url( '/' ),
		'name'            => 'SucceedLEARN',
		'publisher'       => array( '@id' => home_url( '/#organization' ) ),
		'inLanguage'      => 'en-US',
	);
}

/**
 * @return array
 */
function succeedlearn_amp_get_homepage_schema_graph() {
	return array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			succeedlearn_amp_get_organization_schema_entity(),
			succeedlearn_amp_get_website_schema_entity(),
			array(
				'@type'       => 'WebPage',
				'@id'         => home_url( '/#webpage' ),
				'url'         => home_url( '/' ),
				'name'        => 'SucceedLEARN | Global Compliance & Security Training',
				'isPartOf'    => array( '@id' => home_url( '/#website' ) ),
				'about'       => array( '@id' => home_url( '/#organization' ) ),
				'description' => 'Global compliance and security training that employees actually remember.',
			),
		),
	);
}
