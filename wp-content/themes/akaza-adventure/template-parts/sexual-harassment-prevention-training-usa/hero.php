<?php
/**
 * Sexual Harassment Prevention USA — Hero section.
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
		'eyebrow' => __( 'HR Compliance Suite', 'akaza-adventure' ),
		'title'   => __( 'Sexual Harassment Prevention Training – USA', 'akaza-adventure' ),
		'lead'    => __( 'Workplace harassment prevention training aligned to US requirements.', 'akaza-adventure' ),
	)
);
