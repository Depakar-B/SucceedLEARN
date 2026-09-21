<?php
/**
 * Workplace Health and Safety — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Workplace Health and Safety section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_whs_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/workplace-health-and-safety/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_whs_canonical_url() {
	$canonical = home_url( '/workplace-health-and-safety/' );
	foreach ( array( 'workplace-health-and-safety' ) as $slug ) {
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
function succeedlearn_amp_get_whs_page_title() {
	return __( 'Workplace Health and Safety', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_whs_meta_description() {
	return '';
}
