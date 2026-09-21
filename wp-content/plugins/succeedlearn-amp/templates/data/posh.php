<?php
/**
 * POSH Fundamentals India — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a POSH Fundamentals India section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_posh_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/posh/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_posh_canonical_url() {
	$canonical = home_url( '/posh-fundamentals-india/' );
	foreach ( array( 'posh-fundamentals-india', 'prevention-of-sexual-harassment-posh-fundamentals-india' ) as $slug ) {
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
function succeedlearn_amp_get_posh_page_title() {
	return __( 'POSH Fundamentals India', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_posh_meta_description() {
	return '';
}
