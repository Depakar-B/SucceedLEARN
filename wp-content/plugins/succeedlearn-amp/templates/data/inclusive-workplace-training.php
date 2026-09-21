<?php
/**
 * Inclusive Workplace Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Inclusive Workplace Training section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_iwt_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/inclusive-workplace-training/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_iwt_canonical_url() {
	$canonical = home_url( '/inclusive-workplace-training/' );
	foreach ( array( 'inclusive-workplace-training' ) as $slug ) {
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
function succeedlearn_amp_get_iwt_page_title() {
	return __( 'Inclusive Workplace Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_iwt_meta_description() {
	return '';
}
