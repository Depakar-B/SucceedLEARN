<?php
/**
 * Defensive Driving — content for the shared audience section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image_path = AKAZA_DIR . '/assets/images/courses/defensive-driving/audience.jpg';
$image_url  = file_exists( $image_path )
	? AKAZA_URI . '/assets/images/courses/defensive-driving/audience.jpg'
	: '';

get_template_part(
	'template-parts/courses/components/audience',
	null,
	array(
		'modifier'         => 'defensive-driving',
		'eyebrow'          => __( 'Who should take this course?', 'akaza-adventure' ),
		'title_main'       => __( 'Built for everyone who', 'akaza-adventure' ),
		'title_highlight'  => __( 'drives for work', 'akaza-adventure' ),
		'description'      => __( 'Use it for onboarding, annual safety awareness, targeted refreshers or as part of a wider fleet risk programme.', 'akaza-adventure' ),
		'badge_value'      => __( '1 course', 'akaza-adventure' ),
		'badge_text'       => __( 'for company, fleet, rental and grey-fleet drivers', 'akaza-adventure' ),
		'points'           => array(
			array(
				'text' => __( 'Company car and grey-fleet drivers', 'akaza-adventure' ),
				'icon' => 'car-front-fill',
			),
			array(
				'text' => __( 'Sales and field teams', 'akaza-adventure' ),
				'icon' => 'briefcase-fill',
			),
			array(
				'text' => __( 'Service engineers and technicians', 'akaza-adventure' ),
				'icon' => 'tools',
			),
			array(
				'text' => __( 'Delivery and logistics personnel', 'akaza-adventure' ),
				'icon' => 'box-seam-fill',
			),
			array(
				'text' => __( 'Contractors and third-party drivers', 'akaza-adventure' ),
				'icon' => 'people-fill',
			),
			array(
				'text' => __( 'Fleet managers and safety teams', 'akaza-adventure' ),
				'icon' => 'shield-check',
			),
		),
		'image'            => $image_url,
		'image_alt'        => __( 'Defensive driving course audience', 'akaza-adventure' ),
	)
);
