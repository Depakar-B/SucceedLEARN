<?php
/**
 * India ESG Awareness — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a India ESG Awareness section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_esg_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/india-esg-awareness/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_esg_canonical_url() {
	$canonical = home_url( '/india-esg-awareness/' );
	foreach ( array( 'india-esg-awareness' ) as $slug ) {
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
function succeedlearn_amp_get_esg_page_title() {
	return __( 'India ESG Awareness', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_esg_meta_description() {
	return '';
}
