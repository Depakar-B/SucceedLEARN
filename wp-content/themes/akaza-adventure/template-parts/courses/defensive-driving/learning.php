<?php
/**
 * Defensive Driving — content for the shared learning experience section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image_path = AKAZA_DIR . '/assets/images/courses/defensive-driving/learning.jpg';
$image_url  = file_exists( $image_path )
	? AKAZA_URI . '/assets/images/courses/defensive-driving/learning.jpg'
	: '';

get_template_part(
	'template-parts/courses/components/learning',
	null,
	array(
		'modifier'         => 'defensive-driving',
		'eyebrow'          => __( 'Learning that changes behaviour', 'akaza-adventure' ),
		'title_main'       => __( 'Put learners in the', 'akaza-adventure' ),
		'title_highlight'  => __( 'driver’s seat', 'akaza-adventure' ),
		'description'      => __( 'Decision-based activities move employees from passive awareness to active judgement. Learners encounter tailgating, blind spots, mobile distraction, fatigue, weather and low visibility-and choose the safest response.', 'akaza-adventure' ),
		'points'           => array(
			array(
				'text' => __( 'Animated explanations and real-world examples', 'akaza-adventure' ),
				'icon' => 'play-btn-fill',
			),
			array(
				'text' => __( 'Scenario-based decisions and knowledge checks', 'akaza-adventure' ),
				'icon' => 'ui-checks',
			),
			array(
				'text' => __( 'Responsive learning on desktop, tablet and mobile', 'akaza-adventure' ),
				'icon' => 'phone',
			),
			array(
				'text' => __( 'Final assessment and configurable certificate', 'akaza-adventure' ),
				'icon' => 'award-fill',
			),
		),
		'image'            => $image_url,
		'image_alt'        => __( 'Defensive driving course scenario', 'akaza-adventure' ),
	)
);
