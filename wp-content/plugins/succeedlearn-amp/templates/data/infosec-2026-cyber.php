<?php
/**
 * Infosec 2026 Cyber — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an Infosec 2026 Cyber section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_infosec_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/infosec-2026-cyber/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * Live SEO canonical for Infosec. Never advertise retired /cybersecurity-awareness/.
 *
 * @return string
 */
function succeedlearn_amp_get_infosec_canonical_url() {
	$path = 'infosec-cybersecurity-awareness/us';
	$page = get_page_by_path( $path );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			return $link;
		}
	}

	return home_url( '/' . trailingslashit( $path ) );
}

/**
 * @return string
 */
function succeedlearn_amp_get_infosec_page_title() {
	return __( 'Infosec Cybersecurity Awareness Month 2026', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_infosec_meta_description() {
	return '';
}

/**
 * @return string
 */
function succeedlearn_amp_get_infosec_hero_image() {
	return 'https://succeedlearn.com/wp-content/uploads/2026/09/Cybersecurity-Awareness-Month-2026.webp';
}

/**
 * @return string
 */
function succeedlearn_amp_get_infosec_campaign_works_image() {
	return 'https://succeedlearn.com/wp-content/uploads/2026/09/How-the-Campaign-Works.webp';
}

/**
 * @return string
 */
function succeedlearn_amp_get_infosec_understand_image() {
	return 'https://succeedlearn.com/wp-content/uploads/2026/09/What-Can-the-Simulation.webp';
}

/**
 * @return string
 */
function succeedlearn_amp_get_infosec_testing_image() {
	return 'https://succeedlearn.com/wp-content/uploads/2026/09/One-Click-Can-Be-Expensive.webp';
}


/**
 * Return the questions measured by the phishing simulation.
 *
 * @return array
 */
function succeedlearn_amp_infosec_testing_questions() {
	return array(
		__(
			'Will employees recognize the warning signs?',
			'succeedlearn-amp'
		),
		__(
			'Will they resist the click?',
			'succeedlearn-amp'
		),
		__(
			'Will they know what to do next?',
			'succeedlearn-amp'
		),
		__(
			'And most importantly: Where can you help them become stronger?',
			'succeedlearn-amp'
		),
	);
}


/**
 * Whether the current Infosec AMP request is the UK variant.
 *
 * @return bool
 */
function succeedlearn_amp_infosec_is_uk() {
	static $is_uk = null;
	if ( null !== $is_uk ) {
		return $is_uk;
	}

	$is_uk = false;

	if ( is_page_template( 'page-templates/infosec-2026-cyber-uk.php' ) ) {
		$is_uk = true;
	} elseif ( ! empty( $_SERVER['REQUEST_URI'] ) ) {
		$path  = (string) wp_parse_url( (string) wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH );
		$path  = '/' . trim( strtolower( $path ), '/' ) . '/';
		$is_uk = false !== strpos( $path, '/infosec-cybersecurity-awareness/uk/' )
			|| false !== strpos( $path, '/infosec-cybersecurity-awareness-uk/' );
	}

	return $is_uk;
}

/**
 * Return the Phishing Resilience Challenge intro copy (UK or US spelling).
 *
 * @return array
 */
function succeedlearn_amp_infosec_challenge_intro() {
	$is_uk = succeedlearn_amp_infosec_is_uk();

	return array(
		'subtitle' => $is_uk
			? __( 'Test your workforce. Measure human risk. Strengthen security behaviour.', 'succeedlearn-amp' )
			: __( 'Test your workforce. Measure human risk. Strengthen security behavior.', 'succeedlearn-amp' ),
		'text'     => $is_uk
			? __( 'Whatever your score, your organisation gets a clear next step toward stronger cyber resilience.', 'succeedlearn-amp' )
			: __( 'Whatever your score, your organization gets a clear next step toward stronger cyber resilience.', 'succeedlearn-amp' ),
		'outro'    => $is_uk
			? __( 'Either way, your organisation comes out stronger.', 'succeedlearn-amp' )
			: __( 'Either way, your organization comes out stronger.', 'succeedlearn-amp' ),
	);
}

/**
 * Return the Phishing Resilience Challenge score criteria.
 *
 * @return array
 */
function succeedlearn_amp_infosec_challenge_criteria() {
	return array(
		array(
			'modifier' => 'achieved',
			'title'    => __( '80+', 'succeedlearn-amp' ),
			'text'     => __( 'Resiliency Score', 'succeedlearn-amp' ),
		),
		array(
			'modifier' => 'improve',
			'title'    => __( 'Below 80', 'succeedlearn-amp' ),
			'text'     => __( 'Resiliency Score', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return the Phishing Resilience Challenge result paths.
 *
 * @return array
 */
function succeedlearn_amp_infosec_challenge_paths() {
	$is_uk = succeedlearn_amp_infosec_is_uk();

	return array(
		array(
			'modifier'  => 'achieved',
			'score'     => __( '80+ Resiliency Score', 'succeedlearn-amp' ),
			'label'     => __( 'Prove & Sustain', 'succeedlearn-amp' ),
			'title'     => __( 'You’ve demonstrated strong phishing resilience.', 'succeedlearn-amp' ),
			'intro'     => __( 'Reward strong performance with recognition, benchmarking and advanced testing.', 'succeedlearn-amp' ),
			'list_head' => __( 'Resilience Reward', 'succeedlearn-amp' ),
			'items'     => array(
				array( 'text' => __( 'Phishing Resilience Certificate / Digital Badge', 'succeedlearn-amp' ) ),
				array( 'text' => __( 'Detailed Benchmark & Resilience Report', 'succeedlearn-amp' ) ),
				array( 'text' => __( 'Complimentary Advanced Phishing Simulation', 'succeedlearn-amp' ) ),
				array( 'text' => __( '6-Month Resilience Tracking Dashboard', 'succeedlearn-amp' ) ),
				array( 'text' => __( 'Executive Security Awareness Summary', 'succeedlearn-amp' ) ),
			),
			'closing'   => array(
				__( 'You’ve built resilience.', 'succeedlearn-amp' ),
				__( 'Now prove you can sustain it.', 'succeedlearn-amp' ),
			),
		),
		array(
			'modifier'  => 'improve',
			'score'     => __( 'Below 80 Resiliency Score', 'succeedlearn-amp' ),
			'label'     => __( 'Learn & Improve', 'succeedlearn-amp' ),
			'title'     => __( 'You’ve identified opportunities to improve.', 'succeedlearn-amp' ),
			'intro'     => $is_uk
				? __( 'Turn assessment insights into measurable behaviour change.', 'succeedlearn-amp' )
				: __( 'Turn assessment insights into measurable behavior change.', 'succeedlearn-amp' ),
			'list_head' => $is_uk
				? __( '90-Day Resilience Improvement Programme', 'succeedlearn-amp' )
				: __( '90-Day Resilience Improvement Program', 'succeedlearn-amp' ),
			'items'     => array(
				array(
					'text'  => __( 'Security Awareness Training', 'succeedlearn-amp' ),
					'badge' => __( 'Complimentary', 'succeedlearn-amp' ),
				),
				array( 'text' => __( '3 Targeted Microlearning Modules', 'succeedlearn-amp' ) ),
				array(
					'text' => $is_uk
						? __( 'Personalised Improvement Roadmap', 'succeedlearn-amp' )
						: __( 'Personalized Improvement Roadmap', 'succeedlearn-amp' ),
				),
				array( 'text' => __( 'Complimentary Phishing Re-test', 'succeedlearn-amp' ) ),
				array( 'text' => __( 'Before-and-After Resilience Report', 'succeedlearn-amp' ) ),
			),
			'closing'   => array(
				__( 'Identify the gap. Build awareness.', 'succeedlearn-amp' ),
				__( 'Measure the improvement.', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * Return the Cyber Readiness campaign steps.
 *
 * @return array
 */
function succeedlearn_amp_infosec_campaign_steps() {
	$is_uk = succeedlearn_amp_infosec_is_uk();

	return array(
		array(
			'number'     => '01',
			'title'      => __( 'Enroll Your Workforce', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__(
					'Choose the employees you want to include in your Cybersecurity Awareness Month campaign.',
					'succeedlearn-amp'
				),
			),
			'note'       => __(
				'Campaign pricing starts at $2/user/month',
				'succeedlearn-amp'
			),
			'list_intro' => '',
			'items'      => array(),
			'closing'    => '',
			'outcomes'   => array(),
			'continue'   => '',
			'cta'        => '',
			'final'      => false,
		),
		array(
			'number'     => '02',
			'title'      => __( 'Launch the Simulation', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__(
					'A controlled phishing simulation is delivered to participating employees.',
					'succeedlearn-amp'
				),
				__(
					'The campaign recreates realistic phishing scenarios in a safe environment without exposing your organization to an actual malicious threat.',
					'succeedlearn-amp'
				),
			),
			'note'       => '',
			'list_intro' => '',
			'items'      => array(),
			'closing'    => '',
			'outcomes'   => array(),
			'continue'   => '',
			'cta'        => '',
			'final'      => false,
		),
		array(
			'number'     => '03',
			'title'      => __( 'Measure Your Cyber Resilience', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__(
					"See how employees respond to the simulated attack and understand your organization's phishing resilience through campaign metrics and insights.",
					'succeedlearn-amp'
				),
			),
			'note'       => '',
			'list_intro' => '',
			'items'      => array(),
			'closing'    => '',
			'outcomes'   => array(),
			'continue'   => '',
			'cta'        => '',
			'final'      => false,
		),
		array(
			'number'     => '04',
			'title'      => __( 'Identify Awareness Gaps', 'succeedlearn-amp' ),
			'paragraphs' => array(),
			'note'       => '',
			'list_intro' => __( 'Your results help identify:', 'succeedlearn-amp' ),
			'items'      => array(
				__( 'Employee susceptibility', 'succeedlearn-amp' ),
				__( 'Phishing resilience', 'succeedlearn-amp' ),
				__( 'Behavioral risk', 'succeedlearn-amp' ),
				__( 'Awareness gaps', 'succeedlearn-amp' ),
				__( 'Areas for reinforcement', 'succeedlearn-amp' ),
			),
			'closing'    => __(
				'Instead of assuming where your vulnerabilities lie, you have measurable insight to work from.',
				'succeedlearn-amp'
			),
			'outcomes'   => array(),
			'continue'   => '',
			'cta'        => '',
			'final'      => false,
		),
		array(
			'number'     => '05',
			'title'      => __( 'Unlock Your Next Step', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'Your Resiliency Score determines what comes next.', 'succeedlearn-amp' ),
			),
			'note'       => '',
			'list_intro' => '',
			'items'      => array(),
			'closing'    => '',
			'outcomes'   => array(
				array(
					'title' => __( '80+ Resiliency Score: Prove & Sustain', 'succeedlearn-amp' ),
					'text'  => __(
						'Demonstrated strong phishing resilience? Unlock your Resilience Reward, including advanced testing, benchmarking and continued resilience tracking.',
						'succeedlearn-amp'
					),
				),
				array(
					'title' => __( 'Below 80 Resiliency Score: Learn & Improve', 'succeedlearn-amp' ),
					'text'  => __(
						$is_uk
							? 'Identified opportunities to improve? Begin your 90-Day Resilience Improvement Programme with targeted awareness, microlearning and a phishing re-test to measure progress.'
							: 'Identified opportunities to improve? Begin your 90-Day Resilience Improvement Program with targeted awareness, microlearning and a phishing re-test to measure progress.',
						'succeedlearn-amp'
					),
				),
			),
			'continue'   => __(
				$is_uk
					? 'Whatever your score, there\'s a clear next step towards stronger phishing resilience.'
					: 'Whatever your score, there\'s a clear next step toward stronger phishing resilience.',
				'succeedlearn-amp'
			),
			'cta'        => __(
				'Take the Phishing Resilience Challenge',
				'succeedlearn-amp'
			),
			'final'      => true,
		),
	);
}

/**
 * Return the insights provided by the phishing simulation.
 *
 * @return array
 */
function succeedlearn_amp_infosec_simulation_insights() {
	return array(
		array(
			'number' => '01',
			'title'  => __( 'Employee Susceptibility', 'succeedlearn-amp' ),
			'text'   => __(
				'Understand how employees respond when confronted with a realistic simulated phishing attempt.',
				'succeedlearn-amp'
			),
		),
		array(
			'number' => '02',
			'title'  => __( 'Phishing Resilience', 'succeedlearn-amp' ),
			'text'   => __(
				"Measure your workforce's ability to recognize and withstand simulated phishing threats.",
				'succeedlearn-amp'
			),
		),
		array(
			'number' => '03',
			'title'  => __( 'Behavioral Risk', 'succeedlearn-amp' ),
			'text'   => __(
				'Identify employee actions that could create exposure during a real-world attack.',
				'succeedlearn-amp'
			),
		),
		array(
			'number' => '04',
			'title'  => __( 'Awareness Gaps', 'succeedlearn-amp' ),
			'text'   => __(
				'Discover areas where employees may require further education or reinforcement.',
				'succeedlearn-amp'
			),
		),
		array(
			'number' => '05',
			'title'  => __( 'Campaign Metrics', 'succeedlearn-amp' ),
			'text'   => __(
				'Use measurable campaign insights to guide future cybersecurity awareness initiatives.',
				'succeedlearn-amp'
			),
		),
	);
}