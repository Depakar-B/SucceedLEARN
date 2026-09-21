<?php
/**
 * Compliance Training — Hero section.
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
		'eyebrow' => __( 'By Solution', 'akaza-adventure' ),
		'title'   => __( 'Compliance Training', 'akaza-adventure' ),
		'lead'    => __( 'Practical compliance training that helps teams apply policies in real situations.', 'akaza-adventure' ),
	)
);
