<?php
/**
 * Contact form helpers for AMP.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @param array $args Args.
 * @return string
 */
function succeedlearn_amp_render_contact_form( $args = array() ) {
	$defaults = array(
		'form_page'     => 'Home',
		'form_page_url' => home_url( '/' ),
		'echo'          => false,
	);
	$args     = wp_parse_args( $args, $defaults );

	ob_start();
	$partial = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/contact-form.php';
	if ( is_readable( $partial ) ) {
		$form_page     = $args['form_page'];
		$form_page_url = $args['form_page_url'];
		include $partial;
	}
	$html = ob_get_clean();

	if ( ! empty( $args['echo'] ) ) {
		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		return '';
	}
	return $html;
}

/**
 * @param string $context Context key.
 */
function succeedlearn_amp_render_contact_form_title_bar( $context = 'home' ) {
	$title = ( 'home' === $context )
		? __( 'Book a Demo', 'succeedlearn-amp' )
		: __( 'Contact Us', 'succeedlearn-amp' );
	echo '<div class="slcf-title-bar"><h3 class="slcf-title">' . esc_html( $title ) . '</h3></div>';
}

/**
 * @param array $data Form data.
 * @return string
 */
function succeedlearn_amp_extract_utm( $data ) {
	foreach ( array( 'utm_source', 'utm', 'traffic_source' ) as $key ) {
		if ( ! empty( $data[ $key ] ) ) {
			return sanitize_text_field( (string) $data[ $key ] );
		}
	}
	return 'direct';
}

/**
 * @param array $data Form data.
 * @return string
 */
function succeedlearn_amp_extract_form_page( $data ) {
	if ( ! empty( $data['form_page'] ) ) {
		return sanitize_text_field( (string) $data['form_page'] );
	}
	return 'Home';
}

/**
 * @param array $data Form data.
 * @return string
 */
function succeedlearn_amp_extract_form_page_url( $data ) {
	if ( ! empty( $data['form_page_url'] ) ) {
		return esc_url_raw( (string) $data['form_page_url'] );
	}
	return home_url( '/' );
}

add_shortcode(
	'succeedlearn_amp_contact_form',
	static function () {
		return succeedlearn_amp_render_contact_form(
			array(
				'form_page'     => 'Shortcode',
				'form_page_url' => succeedlearn_amp_is_serving_amp() ? succeedlearn_amp_url( '/' ) : home_url( '/' ),
			)
		);
	}
);
