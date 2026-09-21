<?php
/**
 * PE/VC Compliance Programs — Hero section.
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
		'title'   => __( 'PE/VC Compliance Programs', 'akaza-adventure' ),
		'lead'    => __( 'Compliance and risk training tailored for private equity and venture capital firms.', 'akaza-adventure' ),
	)
);
