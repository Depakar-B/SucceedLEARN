<?php
/**
 * Defensive Driving — content for the shared localisation section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/courses/components/localisation',
	null,
	array(
		'modifier'         => 'defensive-driving',
		'eyebrow'          => __( 'Global road-safety alignment', 'akaza-adventure' ),
		'title_main'       => __( 'One core course.', 'akaza-adventure' ),
		'title_highlight'  => __( 'Localised where it matters.', 'akaza-adventure' ),
		'description'      => __( 'Local law, company policy and regulated-driver requirements can be added for each workforce.', 'akaza-adventure' ),
		'callout_title'    => __( 'A clear compliance position', 'akaza-adventure' ),
		'callout_text'     => __( 'Defensive driving training is not universally mandated by that specific name. Employers in many jurisdictions must nevertheless assess and control work-related driving risks and provide appropriate information, instruction or training.', 'akaza-adventure' ),
		'regions'          => array(
			array(
				'code'  => 'UK',
				'title' => __( 'United Kingdom', 'akaza-adventure' ),
				'text'  => __( 'Supports the HSE approach to the journey, driver and vehicle, including grey-fleet use.', 'akaza-adventure' ),
			),
			array(
				'code'  => 'US',
				'title' => __( 'United States', 'akaza-adventure' ),
				'text'  => __( 'Reflects OSHA guidance on training, distraction, fatigue and vehicle risk.', 'akaza-adventure' ),
			),
			array(
				'code'  => 'CA',
				'title' => __( 'Canada', 'akaza-adventure' ),
				'text'  => __( 'Designed for localisation to federal, provincial and territorial requirements.', 'akaza-adventure' ),
			),
			array(
				'code'  => 'EU',
				'title' => __( 'European Union', 'akaza-adventure' ),
				'text'  => __( 'Supports occupational road-risk awareness alongside national laws.', 'akaza-adventure' ),
			),
			array(
				'code'  => 'AN',
				'title' => __( 'Australia & New Zealand', 'akaza-adventure' ),
				'text'  => __( 'Complements risk-based WHS practices and safe journey planning.', 'akaza-adventure' ),
			),
			array(
				'code'  => 'GL',
				'title' => __( 'India & Global', 'akaza-adventure' ),
				'text'  => __( 'Can be localised for traffic law, company policy and industry risk.', 'akaza-adventure' ),
			),
		),
		'note'             => __( 'This course complements-but does not replace-valid licensing, Driver CPC, CDL, vocational, practical or vehicle-specific training where required.', 'akaza-adventure' ),
	)
);
