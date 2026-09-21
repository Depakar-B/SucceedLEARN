<?php
/**
 * Defensive Driving - content for the shared CTA / demo section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/courses/components/cta',
	null,
	array(
		'modifier'         => 'defensive-driving',
		'eyebrow'          => __( 'Ready to reduce road risk?', 'akaza-adventure' ),
		'title_main'       => __( 'Build safer drivers -', 'akaza-adventure' ),
		'title_highlight'  => __( 'one decision at a time.', 'akaza-adventure' ),
		'description'      => __( 'Preview the course and see how SucceedLEARN can customise, deploy and track it for your workforce.', 'akaza-adventure' ),
		'points'           => array(
			__( 'Course preview', 'akaza-adventure' ),
			__( 'Deployment guidance', 'akaza-adventure' ),
			__( 'Customisation options', 'akaza-adventure' ),
		),
		'form_title'       => __( 'Request a course demo', 'akaza-adventure' ),
	)
);
