<?php
/**
 * Private Equity and Venture Capital Suite — Hero section.
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
		'title'   => __( 'Private Equity and Venture Capital Suite', 'akaza-adventure' ),
		'lead'    => __( 'Compliance and risk training tailored for PE and VC organisations.', 'akaza-adventure' ),
	)
);
