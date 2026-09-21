<?php
/**
 * S-Metrics — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => __( 'Security Awareness', 'akaza-adventure' ),
		'title'   => __( 'S-Metrics', 'akaza-adventure' ),
		'lead'    => __( 'Track, measure, and report on security awareness programme outcomes.', 'akaza-adventure' ),
	)
);
