<?php
/**
 * About Us — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/legal.php';

/**
 * Include an About Us section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_about_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/about-us/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_about_canonical_url() {
	return succeedlearn_amp_resolve_legal_canonical_url( '/about-us/', array( 'about-us', 'about' ) );
}

/**
 * @return string
 */
function succeedlearn_amp_get_about_contact_amp_url() {
	$contact_url = home_url( '/contact-us/' );
	return function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $contact_url ) : $contact_url;
}

/**
 * @return string
 */
function succeedlearn_amp_get_about_page_title() {
	return __( 'About Us', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_about_meta_description() {
	return __( 'SucceedLEARN is a product of Succeed Technologies, created to revolutionize compliance eLearning for organizations across the globe.', 'succeedlearn-amp' );
}
