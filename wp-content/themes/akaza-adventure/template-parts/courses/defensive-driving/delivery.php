<?php
/**
 * Defensive Driving — content for the shared delivery / LMS section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/courses/components/delivery',
	null,
	array(
		'modifier'         => 'defensive-driving',
		'eyebrow'          => __( 'Deliver with SucceedLEARN', 'akaza-adventure' ),
		'title_lines'      => array(
			__( 'Simple to deploy. Easy to track. Built to', 'akaza-adventure' ),
		),
		'title_highlight'  => __( 'scale.', 'akaza-adventure' ),
		'description'      => __( 'Deliver through SucceedLEARN or your compatible LMS.', 'akaza-adventure' ),
		'cards'            => array(
			array(
				'icon'  => '◎',
				'title' => __( 'Reach every driver', 'akaza-adventure' ),
				'text'  => __( 'Assign consistent training across teams and regions.', 'akaza-adventure' ),
			),
			array(
				'icon'  => '↗',
				'title' => __( 'Track completion', 'akaza-adventure' ),
				'text'  => __( 'Monitor progress, assessment and records.', 'akaza-adventure' ),
			),
			array(
				'icon'  => '◉',
				'title' => __( 'Localise at scale', 'akaza-adventure' ),
				'text'  => __( 'Adapt language, policy and scenarios.', 'akaza-adventure' ),
			),
			array(
				'icon'  => '◇',
				'title' => __( 'Certify learning', 'akaza-adventure' ),
				'text'  => __( 'Issue configurable completion certificates.', 'akaza-adventure' ),
			),
		),
	)
);
