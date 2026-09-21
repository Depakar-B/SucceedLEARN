<?php
/**
 * Contact Us — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/legal.php';

/**
 * Include a Contact Us section partial.
 *
 * Partials are loaded inside this function scope, so page-template vars must be
 * passed via $args (they are not inherited from the caller).
 *
 * @param string               $name Partial basename without .php.
 * @param array<string, mixed> $args Variables to extract into the partial.
 */
function succeedlearn_amp_contact_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/contact/' . sanitize_file_name( (string) $name ) . '.php';
	if ( ! is_readable( $path ) ) {
		return;
	}
	if ( ! empty( $args ) && is_array( $args ) ) {
		extract( $args, EXTR_SKIP ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
	}
	include $path;
}

/**
 * @return string
 */
function succeedlearn_amp_get_contact_canonical_url() {
	return succeedlearn_amp_resolve_legal_canonical_url( '/contact-us/', array( 'contact-us', 'contact' ) );
}

/**
 * @return string
 */
function succeedlearn_amp_get_contact_hero_image() {
	$uploads   = content_url( '/uploads' );
	$hero_img  = $uploads . '/2026/08/Get-Your-Personalized.webp';
	$local_img = WP_CONTENT_DIR . '/uploads/2026/08/Get-Your-Personalized.webp';
	if ( ! file_exists( $local_img ) ) {
		$hero_img = 'https://succeedlearn.com/wp-content/uploads/2026/08/Get-Your-Personalized.webp';
	}
	return $hero_img;
}

/**
 * @return string
 */
function succeedlearn_amp_get_contact_page_title() {
	return __( 'Contact Us', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_contact_meta_description() {
	return __( 'Contact SucceedLEARN for demos, sales enquiries, and support. Our team is ready to help with compliance training questions.', 'succeedlearn-amp' );
}
