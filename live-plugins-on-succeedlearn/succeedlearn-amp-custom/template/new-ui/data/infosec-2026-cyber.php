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
 * Include an Infosec 2026 Cyber section partial (US or UK folder).
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_infosec_partial( $name ) {
	$folder = succeedlearn_amp_infosec_is_uk() ? 'infosec-2026-cyber-uk' : 'infosec-2026-cyber';
	$path   = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/' . $folder . '/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * Whether the current Infosec landing is the UK variant.
 *
 * @return bool
 */
function succeedlearn_amp_infosec_is_uk() {
	static $is_uk = null;
	if ( null !== $is_uk ) {
		return $is_uk;
	}

	$is_uk = false;

	if ( is_singular( 'page' ) ) {
		$post = get_queried_object();
		if ( $post instanceof WP_Post ) {
			$tpl = (string) get_page_template_slug( $post->ID );
			if ( 'page-templates/infosec-2026-cyber-uk.php' === $tpl ) {
				$is_uk = true;
				return $is_uk;
			}
			if ( 'uk' === (string) $post->post_name && (int) $post->post_parent > 0 ) {
				$parent = get_post( (int) $post->post_parent );
				if ( $parent instanceof WP_Post && 'infosec-cybersecurity-awareness' === $parent->post_name ) {
					$is_uk = true;
					return $is_uk;
				}
			}
		}
	}

	if ( ! empty( $_SERVER['REQUEST_URI'] ) ) {
		$path  = trim( (string) wp_parse_url( (string) wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ), '/' );
		$parts = '' === $path ? array() : explode( '/', $path );
		if (
			isset( $parts[0], $parts[1] )
			&& 'infosec-cybersecurity-awareness' === (string) $parts[0]
			&& 'uk' === (string) $parts[1]
		) {
			$is_uk = true;
		}
	}

	return $is_uk;
}

/**
 * Live SEO path for Infosec (US or UK).
 *
 * @return string
 */
function succeedlearn_amp_infosec_current_seo_path() {
	return succeedlearn_amp_infosec_is_uk()
		? 'infosec-cybersecurity-awareness/uk'
		: 'infosec-cybersecurity-awareness/us';
}

/**
 * Live SEO canonical for Infosec. Never advertise retired /cybersecurity-awareness/.
 *
 * @return string
 */
function succeedlearn_amp_get_infosec_canonical_url() {
	$path = succeedlearn_amp_infosec_current_seo_path();

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
	if ( succeedlearn_amp_infosec_is_uk() ) {
		return __( 'Infosec Cybersecurity Awareness Month 2026 (UK)', 'succeedlearn-amp' );
	}
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
	$is_uk = succeedlearn_amp_infosec_is_uk();

	return array(
		__(
			$is_uk
				? 'Will employees recognise the warning signs?'
				: 'Will employees recognize the warning signs?',
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
 * Return the Cyber Readiness Challenge qualification criteria.
 *
 * @return array
 */
function succeedlearn_amp_infosec_challenge_criteria() {
	return array(
		array(
			'number' => '01',
			'title'  => __( 'ZERO (0) Employees', 'succeedlearn-amp' ),
			'text'   => __( 'successfully phished', 'succeedlearn-amp' ),
		),
		array(
			'number' => '02',
			'title'  => __( '80+ Overall', 'succeedlearn-amp' ),
			'text'   => __( 'Resiliency Score', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return the Cyber Readiness Challenge result paths.
 *
 * @return array
 */
function succeedlearn_amp_infosec_challenge_paths() {
	$is_uk = succeedlearn_amp_infosec_is_uk();

	return array(
		array(
			'modifier'   => 'achieved',
			'label'      => __( 'Challenge Achieved', 'succeedlearn-amp' ),
			'title'      => __(
				$is_uk
					? 'Your organisation demonstrates strong resilience.'
					: 'Your organization demonstrates strong resilience.',
				'succeedlearn-amp'
			),
			'intro'      => array(),
			'subheading' => __( 'You Unlock', 'succeedlearn-amp' ),
			'benefits'   => array(
				array(
					'icon'        => 'repeat',
					'title'       => __( 'Another Phishing Simulation', 'succeedlearn-amp' ),
					'label'       => __( 'Complimentary', 'succeedlearn-amp' ),
					'description' => __(
						$is_uk
							? 'Run another round within the following six months to measure how employee behaviour evolves.'
							: 'Run another round within the following six months to measure how employee behavior evolves.',
						'succeedlearn-amp'
					),
				),
				array(
					'icon'        => 'training',
					'title'       => __( '6 Months of Standard Information Security Awareness Training', 'succeedlearn-amp' ),
					'label'       => __( 'Complimentary', 'succeedlearn-amp' ),
					'description' => __( 'Includes 3 Microlearning modules, with the option to choose from a pool of 42 microlearning modules.', 'succeedlearn-amp' ),
				),
			),
			'message'    => array(
				array(
					'text' => __( "You've demonstrated strong resilience. Now keep building on it.", 'succeedlearn-amp' ),
					'lead' => true,
				),
				array(
					'text' => __(
						$is_uk
							? 'Use the next six months to reinforce good behaviours, keep cybersecurity top of mind and test your workforce again to understand whether resilience continues.'
							: 'Use the next six months to reinforce good behaviors, keep cybersecurity top of mind and test your workforce again to understand whether resilience continues.',
						'succeedlearn-amp'
					),
					'lead' => false,
				),
			),
		),
		array(
			'modifier'   => 'awareness',
			'label'      => __( 'Awareness Path', 'succeedlearn-amp' ),
			'title'      => __( 'Didn’t meet the Challenge criteria?', 'succeedlearn-amp' ),
			'intro'      => array(
				wp_kses_post(
					__(
						"That's not a failure. <strong>That's insight.</strong>",
						'succeedlearn-amp'
					)
				),
				__(
					'Your simulation has done exactly what it was designed to do: identify where additional awareness and reinforcement can make a difference.',
					'succeedlearn-amp'
				),
			),
			'subheading' => __( 'You Receive 3 Months Of', 'succeedlearn-amp' ),
			'benefits'   => array(
				array(
					'icon'        => 'training',
					'title'       => __( 'Information Security Awareness Training', 'succeedlearn-amp' ),
					'label'       => __( 'Complimentary', 'succeedlearn-amp' ),
					'description' => '',
				),
				array(
					'icon'        => 'modules',
					'title'       => __( '3 Microlearning Modules', 'succeedlearn-amp' ),
					'label'       => __( 'Complimentary', 'succeedlearn-amp' ),
					'description' => __( 'Choose from a pool of 42 microlearning modules.', 'succeedlearn-amp' ),
				),
			),
			'message'    => array(
				array(
					'text' => __(
						$is_uk
							? 'Use the results from your phishing simulation to focus employee learning on the behaviours and risks that matter.'
							: 'Use the results from your phishing simulation to focus employee learning on the behaviors and risks that matter.',
						'succeedlearn-amp'
					),
					'lead' => false,
				),
				array(
					'text' => __( 'Identify the gap. Build awareness. Come back stronger.', 'succeedlearn-amp' ),
					'lead' => true,
				),
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
			'title'      => __(
				$is_uk ? 'Enrol Your Workforce' : 'Enroll Your Workforce',
				'succeedlearn-amp'
			),
			'paragraphs' => array(
				__(
					'Choose the employees you want to include in your Cybersecurity Awareness Month campaign.',
					'succeedlearn-amp'
				),
			),
			'note'       => __(
				$is_uk
					? 'Campaign pricing starts at £2/user/month'
					: 'Campaign pricing starts at $2/user/month',
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
					$is_uk
						? 'The campaign recreates realistic phishing scenarios in a safe environment without exposing your organisation to an actual malicious threat.'
						: 'The campaign recreates realistic phishing scenarios in a safe environment without exposing your organization to an actual malicious threat.',
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
					$is_uk
						? "See how employees respond to the simulated attack and understand your organisation's phishing resilience through campaign metrics and insights."
						: "See how employees respond to the simulated attack and understand your organization's phishing resilience through campaign metrics and insights.",
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
				__( $is_uk ? 'Behavioural risk' : 'Behavioral risk', 'succeedlearn-amp' ),
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
			'paragraphs' => array(),
			'note'       => '',
			'list_intro' => '',
			'items'      => array(),
			'closing'    => '',
			'outcomes'   => array(
				array(
					'title' => __( 'Challenge Achieved?', 'succeedlearn-amp' ),
					'text'  => __(
						"Unlock 6 months of complimentary standard Information Security Awareness Training + 3 Microlearning modules (option to choose from a pool of 42 microlearning modules), plus another complimentary phishing simulation within six months.",
						'succeedlearn-amp'
					),
				),
				array(
					'title' => __( 'Awareness Path?', 'succeedlearn-amp' ),
					'text'  => __(
						'Receive 3 months of complimentary Information Security Awareness Training + 3 Microlearning modules (option to choose from a pool of 42 microlearning modules) to help address the awareness gaps identified.',
						'succeedlearn-amp'
					),
				),
			),
			'continue'   => __(
				'Whatever the result, learning continues.',
				'succeedlearn-amp'
			),
			'cta'        => __(
				'Take the Cyber Readiness Challenge',
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
	$is_uk = succeedlearn_amp_infosec_is_uk();

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
				$is_uk
					? "Measure your workforce's ability to recognise and withstand simulated phishing threats."
					: "Measure your workforce's ability to recognize and withstand simulated phishing threats.",
				'succeedlearn-amp'
			),
		),
		array(
			'number' => '03',
			'title'  => __( $is_uk ? 'Behavioural Risk' : 'Behavioral Risk', 'succeedlearn-amp' ),
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