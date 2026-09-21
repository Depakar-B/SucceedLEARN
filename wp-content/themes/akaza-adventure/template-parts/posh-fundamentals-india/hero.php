<?php
/**
 * POSH Fundamentals India — Hero section.
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
		'title'   => __( 'Prevention of Sexual Harassment (POSH) Fundamentals – India', 'akaza-adventure' ),
		'lead'    => __( 'Foundational POSH awareness training for Indian workplaces.', 'akaza-adventure' ),
	)
);
