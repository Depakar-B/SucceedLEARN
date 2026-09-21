<?php
/**
 * Financial Crime Prevention — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Financial Crime Prevention section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_fcp_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/financial-crime-prevention/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_fcp_canonical_url() {
	$canonical = home_url( '/financial-crime-prevention/' );
	foreach ( array( 'financial-crime-prevention' ) as $slug ) {
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
function succeedlearn_amp_get_fcp_page_title() {
	return __( 'Financial Crime Prevention', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_fcp_meta_description() {
	return '';
}
