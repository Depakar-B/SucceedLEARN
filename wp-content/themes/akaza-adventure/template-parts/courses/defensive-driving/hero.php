<?php
/**
 * Defensive Driving — content for the shared course hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image_url = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/08/defensive-driving-hero.png' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/08/defensive-driving-hero.png';

get_template_part(
	'template-parts/courses/components/hero',
	null,
	array(
		'modifier'         => 'defensive-driving',
		'background_image' => $hero_image_url,
		'eyebrow'          => __( 'Workplace Health & Safety eLearning', 'akaza-adventure' ),
		'title_main'       => __( 'Online Defensive Driving', 'akaza-adventure' ),
		'title_highlight'  => __( 'Training for Employees', 'akaza-adventure' ),
		'description'      => __( 'Help employees anticipate road hazards, make safer decisions and prevent avoidable collisions-with interactive, globally adaptable eLearning built for people who drive for work.', 'akaza-adventure' ),
		'ctas'             => array(
			array(
				'label' => __( 'For Enterprise', 'akaza-adventure' ),
				'text'  => __( 'Request Demo', 'akaza-adventure' ),
				'url'   => '#contact',
				'style' => 'primary',
			),
			array(
				'label' => __( 'For Individual', 'akaza-adventure' ),
				'text'  => __( 'Buy Now', 'akaza-adventure' ),
				'url'   => '#',
				'style' => 'secondary',
			),
		),
		'meta'             => array(
			array(
				'icon'  => '◫',
				'label' => __( '8 modules', 'akaza-adventure' ),
			),
			array(
				'icon'  => '◯',
				'label' => __( '100% online learning', 'akaza-adventure' ),
			),
			array(
				'icon'  => '◇',
				'label' => __( 'Globally adaptable', 'akaza-adventure' ),
			),
		),
		'card_badge'       => __( 'Interactive eLearning', 'akaza-adventure' ),
		'card_title'       => __( 'Defensive Driving Essentials', 'akaza-adventure' ),
		'card_description' => __( 'Practical awareness for safer journeys-before, during and after driving.', 'akaza-adventure' ),
		'stats'            => array(
			array(
				'value' => __( '40 Mins', 'akaza-adventure' ),
				'label' => __( 'Total Duration', 'akaza-adventure' ),
			),
			array(
				'value' => __( '$ 15', 'akaza-adventure' ),
				'label' => __( 'Course Price', 'akaza-adventure' ),
			),
			array(
				'value' => __( 'Beginner Level', 'akaza-adventure' ),
				'label' => __( 'Course Level', 'akaza-adventure' ),
			),
			array(
				'value' => __( 'Workplace Health & Safety', 'akaza-adventure' ),
				'label' => __( 'Course Category', 'akaza-adventure' ),
			),
		),
		'features'         => array(
			__( 'Assessment', 'akaza-adventure' ),
			__( 'Certificate included', 'akaza-adventure' ),
			__( 'LMS-ready', 'akaza-adventure' ),
		),
	)
);
