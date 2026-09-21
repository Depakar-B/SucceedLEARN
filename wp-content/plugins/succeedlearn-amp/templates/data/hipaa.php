<?php
/**
 * HIPAA Annual Workforce Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a HIPAA Annual Workforce Training section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_hipaa_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/hipaa/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_hipaa_canonical_url() {
	$canonical = home_url( '/hipaa-annual-workforce-training/' );
	foreach ( array( 'hipaa-annual-workforce-training' ) as $slug ) {
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
function succeedlearn_amp_get_hipaa_page_title() {
	return __( 'HIPAA Annual Workforce Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_hipaa_meta_description() {
	return '';
}
