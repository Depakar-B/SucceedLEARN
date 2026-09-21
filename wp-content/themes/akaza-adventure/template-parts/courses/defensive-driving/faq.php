<?php
/**
 * Defensive Driving — content for the shared course FAQ section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/courses/components/faq',
	null,
	array(
		'modifier'         => 'defensive-driving',
		'eyebrow'          => __( 'Frequently asked questions', 'akaza-adventure' ),
		'title_main'       => __( 'What employers ask about', 'akaza-adventure' ),
		'title_highlight'  => __( 'defensive driving training', 'akaza-adventure' ),
		'description'      => __( 'Clear answers for HR, fleet, EHS and compliance teams.', 'akaza-adventure' ),
		'cta_text'         => __( 'Still have a question? Talk to us', 'akaza-adventure' ),
		'cta_url'          => '#contact',
		'items'            => array(
			array(
				'question' => __( 'What is defensive driving?', 'akaza-adventure' ),
				'answer'   => __( 'A proactive approach that helps drivers anticipate hazards, maintain safe speed and space, and act before a collision occurs.', 'akaza-adventure' ),
			),
			array(
				'question' => __( 'Is defensive driving training mandatory?', 'akaza-adventure' ),
				'answer'   => __( 'Not universally under that course name. Employers in many jurisdictions must nevertheless assess driving risks and provide appropriate instruction or training.', 'akaza-adventure' ),
			),
			array(
				'question' => __( 'Does OSHA require defensive driving training?', 'akaza-adventure' ),
				'answer'   => __( 'OSHA recommends initial and ongoing driver training. Specific requirements depend on the work, vehicle and applicable federal or state rules.', 'akaza-adventure' ),
			),
			array(
				'question' => __( 'Does it cover distracted and drowsy driving?', 'akaza-adventure' ),
				'answer'   => __( 'Yes. It covers mobile distraction, fatigue signs, journey planning, rest and fitness to drive.', 'akaza-adventure' ),
			),
			array(
				'question' => __( 'Can the course be customised by country?', 'akaza-adventure' ),
				'answer'   => __( 'Yes. Policies, legal references, emergency information, vehicle types and scenarios can be localised.', 'akaza-adventure' ),
			),
			array(
				'question' => __( 'Does it include an assessment and certificate?', 'akaza-adventure' ),
				'answer'   => __( 'Yes. It includes knowledge checks, a final assessment and configurable certificate.', 'akaza-adventure' ),
			),
			array(
				'question' => __( 'Can it be delivered through our LMS?', 'akaza-adventure' ),
				'answer'   => __( 'Yes, subject to confirming technical compatibility and tracking requirements.', 'akaza-adventure' ),
			),
		),
	)
);
