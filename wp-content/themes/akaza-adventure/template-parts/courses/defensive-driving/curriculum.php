<?php
/**
 * Defensive Driving — content for the shared course curriculum.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/courses/components/curriculum',
	null,
	array(
		'modifier'         => 'defensive-driving',
		'eyebrow'          => __( 'Course Curriculum', 'akaza-adventure' ),
		'title_main'       => __( 'Everything employees need', 'akaza-adventure' ),
		'title_highlight'  => __( 'for safer journeys', 'akaza-adventure' ),
		'description'      => __( 'A focused 40-minute experience combining practical explanations, animated content, realistic decisions and frequent reinforcement.', 'akaza-adventure' ),
		'modules'          => array(
			array(
				'title'       => __( 'Why crashes happen', 'akaza-adventure' ),
				'description' => __( 'Human, vehicle and environmental factors.', 'akaza-adventure' ),
			),
			array(
				'title'       => __( 'The Haddon Matrix', 'akaza-adventure' ),
				'description' => __( 'Prevention before, during and after a collision.', 'akaza-adventure' ),
			),
			array(
				'title'       => __( 'Defensive driving essentials', 'akaza-adventure' ),
				'description' => __( 'Observation, anticipation, speed and space.', 'akaza-adventure' ),
			),
			array(
				'title'       => __( 'The Eight Commandments', 'akaza-adventure' ),
				'description' => __( 'Memorable rules for everyday safe driving.', 'akaza-adventure' ),
			),
			array(
				'title'       => __( 'High-risk situations', 'akaza-adventure' ),
				'description' => __( 'Blind spots, weather, night driving and aggression.', 'akaza-adventure' ),
			),
			array(
				'title'       => __( 'Fit vehicle. Fit driver.', 'akaza-adventure' ),
				'description' => __( 'Checks, distraction, fatigue and impairment.', 'akaza-adventure' ),
			),
			array(
				'title'       => __( 'Every stage of the journey', 'akaza-adventure' ),
				'description' => __( 'Before starting, while driving and after stopping.', 'akaza-adventure' ),
			),
			array(
				'title'       => __( 'Scenario assessment', 'akaza-adventure' ),
				'description' => __( 'Decision activities and final assessment.', 'akaza-adventure' ),
			),
		),
	)
);
