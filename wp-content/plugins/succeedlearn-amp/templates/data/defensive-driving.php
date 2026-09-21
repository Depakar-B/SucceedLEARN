<?php
/**
 * Defensive Driving — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Defensive Driving section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_dd_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/defensive-driving/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_dd_canonical_url() {
	$canonical = home_url( '/defensive-driving/' );
	foreach ( array( 'defensive-driving', 'online-defensive-driving-training' ) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
			$link = get_permalink( $page );
			if ( $link ) {
				return $link;
			}
		}
	}
	return $canonical;
}

/**
 * @return string
 */
function succeedlearn_amp_get_dd_hero_image() {
	$uploads   = content_url( '/uploads' );
	$hero_img  = $uploads . '/2026/08/defensive-driving-hero.png';
	$local_img = WP_CONTENT_DIR . '/uploads/2026/08/defensive-driving-hero.png';
	if ( ! file_exists( $local_img ) ) {
		$hero_img = 'https://succeedlearn.com/wp-content/uploads/2026/08/defensive-driving-hero.png';
	}
	return $hero_img;
}

/**
 * @return string
 */
function succeedlearn_amp_get_dd_page_title() {
	return __( 'Online Defensive Driving Training for Employees', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_dd_meta_description() {
	return __( 'Help employees anticipate road hazards, make safer decisions and prevent avoidable collisions with interactive, globally adaptable defensive driving eLearning.', 'succeedlearn-amp' );
}

/**
 * @return array<int, array{value:string,label:string}>
 */
function succeedlearn_amp_get_dd_course_stats() {
	return array(
		array(
			'value' => __( '40 Mins', 'succeedlearn-amp' ),
			'label' => __( 'Total Duration', 'succeedlearn-amp' ),
		),
		array(
			'value' => '$ 15',
			'label' => __( 'Course Price', 'succeedlearn-amp' ),
		),
		array(
			'value' => __( 'Beginner Level', 'succeedlearn-amp' ),
			'label' => __( 'Course Level', 'succeedlearn-amp' ),
		),
		array(
			'value' => __( 'Workplace Health & Safety', 'succeedlearn-amp' ),
			'label' => __( 'Course Category', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_dd_course_features() {
	return array(
		__( 'Assessment', 'succeedlearn-amp' ),
		__( 'Certificate included', 'succeedlearn-amp' ),
		__( 'LMS-ready', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int, array{number:string,title:string,text:string}>
 */
function succeedlearn_amp_get_dd_highlights() {
	return array(
		array(
			'number' => '01',
			'title'  => __( 'Safer drivers', 'succeedlearn-amp' ),
			'text'   => __( 'Build judgement, not just rule recall.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '02',
			'title'  => __( 'Lower road risk', 'succeedlearn-amp' ),
			'text'   => __( 'Address preventable collision factors.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '03',
			'title'  => __( 'Consistent learning', 'succeedlearn-amp' ),
			'text'   => __( 'Reach distributed teams at scale.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '04',
			'title'  => __( 'Trackable evidence', 'succeedlearn-amp' ),
			'text'   => __( 'Assessment and completion records.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{icon:string,title:string,text:string}>
 */
function succeedlearn_amp_get_dd_risk_cards() {
	return array(
		array(
			'icon'  => '◎',
			'title' => __( 'Hazard perception', 'succeedlearn-amp' ),
			'text'  => __( 'Scan ahead, anticipate developing risks and preserve a safe escape route.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => '▣',
			'title' => __( 'Distracted driving', 'succeedlearn-amp' ),
			'text'  => __( 'Manage mobile phones, navigation systems and cognitive distraction.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => '◐',
			'title' => __( 'Fatigue & impairment', 'succeedlearn-amp' ),
			'text'  => __( 'Recognise reduced fitness to drive and choose the safe response.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => '☂',
			'title' => __( 'Weather & visibility', 'succeedlearn-amp' ),
			'text'  => __( 'Adapt speed, space and vehicle control to changing conditions.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => '◇',
			'title' => __( 'Blind spots & spacing', 'succeedlearn-amp' ),
			'text'  => __( 'Maintain safe following distance and avoid high-risk vehicle zones.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => '✓',
			'title' => __( 'Collision prevention', 'succeedlearn-amp' ),
			'text'  => __( 'Apply calm, preventive decisions before a situation becomes critical.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,desc:string}>
 */
function succeedlearn_amp_get_dd_modules() {
	return array(
		array(
			'title' => __( 'Why crashes happen', 'succeedlearn-amp' ),
			'desc'  => __( 'Human, vehicle and environmental factors.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'The Haddon Matrix', 'succeedlearn-amp' ),
			'desc'  => __( 'Prevention before, during and after a collision.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Defensive driving essentials', 'succeedlearn-amp' ),
			'desc'  => __( 'Observation, anticipation, speed and space.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'The Eight Commandments', 'succeedlearn-amp' ),
			'desc'  => __( 'Memorable rules for everyday safe driving.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'High-risk situations', 'succeedlearn-amp' ),
			'desc'  => __( 'Blind spots, weather, night driving and aggression.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Fit vehicle. Fit driver.', 'succeedlearn-amp' ),
			'desc'  => __( 'Checks, distraction, fatigue and impairment.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Every stage of the journey', 'succeedlearn-amp' ),
			'desc'  => __( 'Before starting, while driving and after stopping.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Scenario assessment', 'succeedlearn-amp' ),
			'desc'  => __( 'Decision activities and final assessment.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_dd_learning_points() {
	return array(
		__( 'Animated explanations and real-world examples', 'succeedlearn-amp' ),
		__( 'Scenario-based decisions and knowledge checks', 'succeedlearn-amp' ),
		__( 'Responsive learning on desktop, tablet and mobile', 'succeedlearn-amp' ),
		__( 'Final assessment and configurable certificate', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int, array{code:string,title:string,text:string}>
 */
function succeedlearn_amp_get_dd_regions() {
	return array(
		array(
			'code'  => 'UK',
			'title' => __( 'United Kingdom', 'succeedlearn-amp' ),
			'text'  => __( 'Supports the HSE approach to the journey, driver and vehicle, including grey-fleet use.', 'succeedlearn-amp' ),
		),
		array(
			'code'  => 'US',
			'title' => __( 'United States', 'succeedlearn-amp' ),
			'text'  => __( 'Reflects OSHA guidance on training, distraction, fatigue and vehicle risk.', 'succeedlearn-amp' ),
		),
		array(
			'code'  => 'CA',
			'title' => __( 'Canada', 'succeedlearn-amp' ),
			'text'  => __( 'Designed for localisation to federal, provincial and territorial requirements.', 'succeedlearn-amp' ),
		),
		array(
			'code'  => 'EU',
			'title' => __( 'European Union', 'succeedlearn-amp' ),
			'text'  => __( 'Supports occupational road-risk awareness alongside national laws.', 'succeedlearn-amp' ),
		),
		array(
			'code'  => 'AN',
			'title' => __( 'Australia & New Zealand', 'succeedlearn-amp' ),
			'text'  => __( 'Complements risk-based WHS practices and safe journey planning.', 'succeedlearn-amp' ),
		),
		array(
			'code'  => 'GL',
			'title' => __( 'India & Global', 'succeedlearn-amp' ),
			'text'  => __( 'Can be localised for traffic law, company policy and industry risk.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_dd_audience_points() {
	return array(
		__( 'Company car and grey-fleet drivers', 'succeedlearn-amp' ),
		__( 'Sales and field teams', 'succeedlearn-amp' ),
		__( 'Service engineers and technicians', 'succeedlearn-amp' ),
		__( 'Delivery and logistics personnel', 'succeedlearn-amp' ),
		__( 'Contractors and third-party drivers', 'succeedlearn-amp' ),
		__( 'Fleet managers and safety teams', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int, array{icon:string,title:string,text:string}>
 */
function succeedlearn_amp_get_dd_delivery_cards() {
	return array(
		array(
			'icon'  => '◎',
			'title' => __( 'Reach every driver', 'succeedlearn-amp' ),
			'text'  => __( 'Assign consistent training across teams and regions.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => '↗',
			'title' => __( 'Track completion', 'succeedlearn-amp' ),
			'text'  => __( 'Monitor progress, assessment and records.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => '◉',
			'title' => __( 'Localise at scale', 'succeedlearn-amp' ),
			'text'  => __( 'Adapt language, policy and scenarios.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => '◇',
			'title' => __( 'Certify learning', 'succeedlearn-amp' ),
			'text'  => __( 'Issue configurable completion certificates.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_dd_faq_items() {
	return array(
		array(
			'question' => __( 'What is defensive driving?', 'succeedlearn-amp' ),
			'answer'   => __( 'A proactive approach that helps drivers anticipate hazards, maintain safe speed and space, and act before a collision occurs.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Is defensive driving training mandatory?', 'succeedlearn-amp' ),
			'answer'   => __( 'Not universally under that course name. Employers in many jurisdictions must nevertheless assess driving risks and provide appropriate instruction or training.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does OSHA require defensive driving training?', 'succeedlearn-amp' ),
			'answer'   => __( 'OSHA recommends initial and ongoing driver training. Specific requirements depend on the work, vehicle and applicable federal or state rules.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does it cover distracted and drowsy driving?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. It covers mobile distraction, fatigue signs, journey planning, rest and fitness to drive.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can the course be customised by country?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Policies, legal references, emergency information, vehicle types and scenarios can be localised.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does it include an assessment and certificate?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. It includes knowledge checks, a final assessment and configurable certificate.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can it be delivered through our LMS?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes, subject to confirming technical compatibility and tracking requirements.', 'succeedlearn-amp' ),
		),
	);
}
