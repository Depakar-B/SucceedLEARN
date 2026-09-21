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
 * Render the SucceedLEARN contact form for AMP pages.
 *
 * Prefers the common SCF shortcode (shared UI + ERP + course variant).
 * Falls back to the legacy AMP partial when SCF is unavailable.
 *
 * @param array $args {
 *     @type string $form_page     Page label for analytics/legacy handlers.
 *     @type string $form_page_url Canonical / page URL.
 *     @type string $form_variant  `default` (Interested In) or `course` (slim course demo).
 *     @type string $title         Optional heading (course variant).
 *     @type bool   $echo          Echo instead of return.
 * }
 * @return string
 */
function succeedlearn_amp_render_contact_form( $args = array() ) {
	$defaults = array(
		'form_page'     => 'Home',
		'form_page_url' => home_url( '/' ),
		'form_variant'  => 'default',
		'title'         => '',
		'echo'          => false,
	);
	$args     = wp_parse_args( $args, $defaults );

	$form_variant = ( 'course' === $args['form_variant'] ) ? 'course' : 'default';
	$form_title   = sanitize_text_field( (string) $args['title'] );

	if ( shortcode_exists( 'contact_form' ) ) {
		$shortcode = sprintf(
			'[contact_form form_variant="%1$s" title="%2$s"]',
			esc_attr( $form_variant ),
			esc_attr( $form_title )
		);
		$html = do_shortcode( $shortcode );
	} else {
		ob_start();
		$partial = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/contact-form.php';
		if ( is_readable( $partial ) ) {
			$form_page     = $args['form_page'];
			$form_page_url = $args['form_page_url'];
			$form_variant  = $form_variant;
			$form_title    = $form_title;
			include $partial;
		}
		$html = ob_get_clean();
	}

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
	static function ( $atts = array() ) {
		$atts = shortcode_atts(
			array(
				'form_variant' => 'default',
				'title'        => '',
			),
			$atts,
			'succeedlearn_amp_contact_form'
		);

		return succeedlearn_amp_render_contact_form(
			array(
				'form_page'     => 'Shortcode',
				'form_page_url' => succeedlearn_amp_is_serving_amp() ? succeedlearn_amp_url( '/' ) : home_url( '/' ),
				'form_variant'  => $atts['form_variant'],
				'title'         => $atts['title'],
			)
		);
	}
);
