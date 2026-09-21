<?php
/**
 * Workplace Harassment Prevention Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Workplace Harassment Prevention Training section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_whp_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/whp/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_whp_canonical_url() {
	$canonical = home_url( '/workplace-harassment-prevention-training/' );
	foreach ( array( 'workplace-harassment-prevention-training' ) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
			$link = get_permalink( $page );
			if ( $link ) {
				return $link;
			}
		}
	}
	return $canonical;
}

/**
 * @return string
 */
function succeedlearn_amp_get_whp_page_title() {
	return __( 'Workplace Harassment Prevention Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_whp_meta_description() {
	return '';
}

/**
 * Returns the Workplace Harassment Training regions.
 *
 * @return array
 */
function succeedlearn_amp_workplace_harassment_regions() {
	return array(
		array(
			'icon'  => 'global',
			'label' => __( 'Global and multinational workforces', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'united-states',
			'label' => __( 'Employees and supervisors in the United States', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'united-kingdom',
			'label' => __( 'Workers in the United Kingdom', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'india',
			'label' => __( 'Employees, managers and Internal Committee members in India', 'succeedlearn-amp' ),
		),
	);
}