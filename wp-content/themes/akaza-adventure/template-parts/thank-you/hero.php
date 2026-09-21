<?php
/**
 * Thank You — Hero section.
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
		'eyebrow' => __( 'SucceedLEARN', 'akaza-adventure' ),
		'title'   => __( 'Thank You', 'akaza-adventure' ),
		'lead'    => __( 'Thanks for getting in touch — we will respond shortly.', 'akaza-adventure' ),
	)
);
