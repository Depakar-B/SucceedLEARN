<?php
/**
 * Welcome — Hero section.
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
		'title'   => __( 'Welcome', 'akaza-adventure' ),
		'lead'    => __( 'Welcome to SucceedLEARN.', 'akaza-adventure' ),
	)
);
