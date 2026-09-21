<?php
/**
 * HR Compliance Suite — Hero section.
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
		'title'   => __( 'HR Compliance Suite', 'akaza-adventure' ),
		'lead'    => __( 'Build safer workplaces with practical HR and workplace compliance training.', 'akaza-adventure' ),
	)
);
