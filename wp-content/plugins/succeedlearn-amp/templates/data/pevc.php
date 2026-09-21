<?php
/**
 * Private Equity and Venture Capital Suite — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Private Equity and Venture Capital Suite section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_pevc_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/pevc/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_pevc_canonical_url() {
	$canonical = home_url( '/private-equity-and-venture-capital-suite/' );
	foreach ( array( 'private-equity-and-venture-capital-suite' ) as $slug ) {
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
function succeedlearn_amp_get_pevc_page_title() {
	return __( 'Private Equity and Venture Capital Suite', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_pevc_meta_description() {
	return '';
}
