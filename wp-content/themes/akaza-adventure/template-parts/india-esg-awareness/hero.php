<?php
/**
 * India ESG Awareness — Hero section.
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
		'title'   => __( 'India ESG Awareness', 'akaza-adventure' ),
		'lead'    => __( 'Build ESG awareness with training aligned to Indian workplace needs.', 'akaza-adventure' ),
	)
);
