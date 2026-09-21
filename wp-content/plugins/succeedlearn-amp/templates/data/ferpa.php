<?php
/**
 * FERPA Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a FERPA Training section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_ferpa_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/ferpa/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_ferpa_canonical_url() {
	$canonical = home_url( '/ferpa-training-for-school-and-university-staff/' );
	foreach ( array( 'ferpa-training-for-school-and-university-staff' ) as $slug ) {
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
function succeedlearn_amp_get_ferpa_page_title() {
	return __( 'FERPA Training for School and University Staff', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ferpa_meta_description() {
	return '';
}
