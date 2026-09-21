<?php
/**
 * S-Play — Hero section.
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
		'title'   => __( 'S-Play', 'akaza-adventure' ),
		'lead'    => __( 'Gamified security awareness training that drives engagement.', 'akaza-adventure' ),
	)
);
