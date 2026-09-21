<?php
/**
 * S-Signs — Hero section.
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
		'title'   => __( 'S-Signs', 'akaza-adventure' ),
		'lead'    => __( 'Visual security awareness cues that reinforce safe habits.', 'akaza-adventure' ),
	)
);
