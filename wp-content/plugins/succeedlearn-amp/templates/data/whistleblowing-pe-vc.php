<?php
/**
 * Whistleblowing Training for PE/VC: AMP data helpers.
 *
 * Content mirrors theme: template-parts/courses/whistleblowing-pe-vc/*.php
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Whistleblowing Training for PE/VC section partial.
 *
 * @param string $name Partial basename without .php.
 * @param array  $args Variables exposed to the partial.
 */
function succeedlearn_amp_whistleblowing_pe_vc_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/whistleblowing-pe-vc/' . sanitize_file_name( (string) $name ) . '.php';
	if ( ! is_readable( $path ) ) {
		return;
	}

	if ( ! empty( $args ) && is_array( $args ) ) {
		// phpcs:ignore WordPress.PHP.DontExtract.extract_extract -- scoped vars for AMP partials.
		extract( $args, EXTR_SKIP );
	}

	include $path;
}

/**
 * @return string
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_canonical_url() {
	$canonical = home_url( '/whistleblowing-pe-vc/' );
	$page      = get_page_by_path( 'whistleblowing-pe-vc' );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			return $link;
		}
	}
	return $canonical;
}

/**
 * @return string
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_page_title() {
	return __( 'Whistleblowing Training for PE/VC', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_meta_description() {
	return __( 'Practical whistleblowing training for Private Equity and Venture Capital teams. Build awareness of protected disclosures, reporting channels and UK and US whistleblower protections.', 'succeedlearn-amp' );
}

/**
 * Page images.
 *
 * @return array<string,string>
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_images() {
	return array(
		'hero'           => succeedlearn_amp_upload_url( '2026/09/Whistleblowing_hero-section-image.webp' ),
		'individuals'    => succeedlearn_amp_upload_url( '2026/09/Image-1-AML.webp' ),
		'organisations'  => succeedlearn_amp_upload_url( '2026/09/organisation-image-1.webp' ),
		'cpd'            => succeedlearn_amp_upload_url( '2026/09/CPD.webp' ),
		'overview'       => succeedlearn_amp_upload_url( '2026/09/Whistleblowing.webp' ),
		'course_1'       => succeedlearn_amp_upload_url( '2026/09/Whistleblowing-image-1.webp' ),
		'course_2'       => succeedlearn_amp_upload_url( '2026/09/Whistleblowing-image-2.webp' ),
		'course_3'       => succeedlearn_amp_upload_url( '2026/09/Whistleblowing-image-3.webp' ),
		'regulatory_uk'  => succeedlearn_amp_upload_url( '2026/09/uk_whistleblowing_law-1.webp' ),
		'regulatory_us'  => succeedlearn_amp_upload_url( '2026/09/us_whistleblower_protection.webp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_individual_features() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Interactive eLearning', 'succeedlearn-amp' ),
			'text'  => __( 'Practical digital learning supported by whistleblowing scenarios and knowledge checks.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( '12-minute duration', 'succeedlearn-amp' ),
			'text'  => __( 'Complete the core whistleblowing learning in approximately 12 minutes.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Instant access', 'succeedlearn-amp' ),
			'text'  => __( 'Start learning immediately after purchase.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_organisation_features() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Reporting and tracking', 'succeedlearn-amp' ),
			'text'  => __( 'Monitor learner progress, completion and training status.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Automatic reminders', 'succeedlearn-amp' ),
			'text'  => __( 'Support completion with automated learner reminders.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'SCORM or SaaS delivery', 'succeedlearn-amp' ),
			'text'  => __( 'Deploy through your LMS or use the SucceedLEARN platform.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Group assignment', 'succeedlearn-amp' ),
			'text'  => __( 'Assign whistleblowing training to selected teams or learner groups.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '05',
			'title' => __( 'Completion visibility', 'succeedlearn-amp' ),
			'text'  => __( 'Give administrators clear oversight of learner activity.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_designed_features() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Relevant scenarios', 'succeedlearn-amp' ),
			'text'  => __( 'Connect whistleblowing principles with financial, transaction and investment situations.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Clear distinctions', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees distinguish whistleblowing concerns from personal grievances.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Reporting awareness', 'succeedlearn-amp' ),
			'text'  => __( "Reinforce the importance of following the organisation's reporting process.", 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Speak-up awareness', 'succeedlearn-amp' ),
			'text'  => __( 'Give employees greater clarity about recognising and raising concerns.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_audiences() {
	return array(
		array(
			'title' => __( 'Deal and investment teams', 'succeedlearn-amp' ),
			'text'  => __( 'Professionals working with transaction materials, target companies and sensitive financial information.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Analysts and associates', 'succeedlearn-amp' ),
			'text'  => __( 'Employees who may identify discrepancies or concerning behaviour during research and deal work.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Compliance, legal and risk teams', 'succeedlearn-amp' ),
			'text'  => __( 'Teams supporting policies, reporting arrangements and escalation processes.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Managers and wider employees', 'succeedlearn-amp' ),
			'text'  => __( 'Employees who need to understand what speaking up means and how concerns should be handled.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_misconduct_items() {
	return array(
		array(
			'title' => __( 'Financial misreporting', 'succeedlearn-amp' ),
			'text'  => __( 'Concerns about discrepancies or misleading financial information.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Insider dealing and market abuse', 'succeedlearn-amp' ),
			'text'  => __( 'Potential misuse of information or inappropriate market conduct.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Bribery and conflicts', 'succeedlearn-amp' ),
			'text'  => __( 'Conduct involving improper influence or unmanaged conflicts of interest.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'AML and sanctions concerns', 'succeedlearn-amp' ),
			'text'  => __( 'Potential issues relating to anti-money laundering or sanctions obligations.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Confidential information', 'succeedlearn-amp' ),
			'text'  => __( 'Concerns involving unauthorised access to or misuse of sensitive information.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Retaliation for speaking up', 'succeedlearn-amp' ),
			'text'  => __( 'Unfair treatment linked to the raising of a legitimate concern.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Inside-the-course preview slides.
 *
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_course_slides() {
	return array(
		array(
			'image' => 'course_1',
			'alt'   => __( 'Whistleblowing concern compared with personal grievances', 'succeedlearn-amp' ),
			'num'   => '01',
			'label' => __( 'Concern vs grievance', 'succeedlearn-amp' ),
			'text'  => __( 'See the difference between whistleblowing concerns and personal grievances.', 'succeedlearn-amp' ),
		),
		array(
			'image' => 'course_2',
			'alt'   => __( 'Confidentiality, fiduciary responsibility and investment ethics in whistleblowing training', 'succeedlearn-amp' ),
			'num'   => '02',
			'label' => __( 'PE/VC principles', 'succeedlearn-amp' ),
			'text'  => __( 'Connect speaking up with confidentiality, fiduciary duty and investment ethics.', 'succeedlearn-amp' ),
		),
		array(
			'image' => 'course_3',
			'alt'   => __( 'Interactive scenario asking which situations should be reported as a whistleblowing concern', 'succeedlearn-amp' ),
			'num'   => '03',
			'label' => __( 'Practice scenario', 'succeedlearn-amp' ),
			'text'  => __( 'Work through scenarios to decide what should be reported.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * UK and US regulatory frameworks.
 *
 * @return array<int,array<string,mixed>>
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_regulatory_frameworks() {
	return array(
		array(
			'code'     => 'UK',
			'title'    => __( 'UK whistleblowing framework', 'succeedlearn-amp' ),
			'subtitle' => __( 'Key UK laws and regulatory channels introduced in the course', 'succeedlearn-amp' ),
			'items'    => array(
				__( 'Employment Rights Act 1996 protected-disclosure framework', 'succeedlearn-amp' ),
				__( 'Public Interest Disclosure Act 1998 (PIDA)', 'succeedlearn-amp' ),
				__( 'FCA SYSC 18 whistleblowing framework', 'succeedlearn-amp' ),
				__( 'FCA and PRA as relevant external regulatory channels in the course material', 'succeedlearn-amp' ),
			),
			'image'    => 'regulatory_uk',
			'alt'      => __( 'UK whistleblowing legal and regulatory framework', 'succeedlearn-amp' ),
		),
		array(
			'code'     => 'US',
			'title'    => __( 'US whistleblower protections introduced', 'succeedlearn-amp' ),
			'subtitle' => __( 'Selected US legislation referenced in the learning material', 'succeedlearn-amp' ),
			'items'    => array(
				__( 'Sarbanes-Oxley Act', 'succeedlearn-amp' ),
				__( 'Dodd-Frank Act', 'succeedlearn-amp' ),
				__( 'False Claims Act', 'succeedlearn-amp' ),
			),
			'image'    => 'regulatory_us',
			'alt'      => __( 'US whistleblower protection legislation', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whistleblowing_pe_vc_faq_items() {
	return array(
		array(
			'question' => __( 'What is whistleblowing?', 'succeedlearn-amp' ),
			'answer'   => __( 'Whistleblowing is the act of raising a concern about potential wrongdoing in the workplace, typically in the public interest, through appropriate reporting channels.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the course include both UK and US whistleblowing laws?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. It introduces the UK framework, including PIDA and FCA SYSC 18, and references selected US legislation including the Sarbanes-Oxley Act, Dodd-Frank Act and False Claims Act.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the course use investment-sector examples?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Examples include financial misreporting, market abuse, bribery, conflicts of interest, AML and sanctions concerns and misuse of confidential information.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does whistleblowing training cover personal grievances?', 'succeedlearn-amp' ),
			'answer'   => __( 'The course explains the difference between a whistleblowing concern and a personal workplace grievance so learners can identify the appropriate route.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the Whistleblowing course include an assessment?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The supplied course includes a scenario-based assessment covering reportable concerns, retaliation, grievances and reporting routes.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What types of misconduct are covered in the course?', 'succeedlearn-amp' ),
			'answer'   => __( 'Examples include insider dealing or market abuse, financial fraud or misreporting, bribery, conflicts of interest, AML or sanctions concerns and legal or regulatory breaches.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the course explain how to raise a whistleblowing concern?', 'succeedlearn-amp' ),
			'answer'   => __( "Yes. Learners are introduced to the importance of following the organisation's whistleblowing policy, using appropriate reporting routes and maintaining confidentiality.", 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Why is whistleblowing training relevant to investment professionals?', 'succeedlearn-amp' ),
			'answer'   => __( 'Investment professionals work with sensitive financial, transaction and confidential information. Training helps them recognise potential misconduct and understand how concerns should be escalated.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can managers and compliance teams take this course?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The content is relevant to managers, compliance and risk teams, analysts and other employees who may identify or receive concerns.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What is the difference between whistleblowing and a personal grievance?', 'succeedlearn-amp' ),
			'answer'   => __( "Whistleblowing concerns wrongdoing raised in the public interest, while a personal grievance normally concerns an individual's own employment circumstances.", 'succeedlearn-amp' ),
		),
	);
}
