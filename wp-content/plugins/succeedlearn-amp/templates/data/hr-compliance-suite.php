<?php
/**
 * HR Compliance Suite — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a HR Compliance Suite section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_hr_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/hr-compliance-suite/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_hr_canonical_url() {
	$canonical = home_url( '/hr-compliance-suite/' );
	foreach ( array( 'hr-compliance-suite' ) as $slug ) {
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
function succeedlearn_amp_get_hr_page_title() {
	return __( 'HR Compliance Suite', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_hr_meta_description() {
	return '';
}
