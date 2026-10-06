<?php
/**
 * US Sexual Harassment Prevention Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a US harassment section partial.
 *
 * @param string               $name Partial basename without .php.
 * @param array<string, mixed> $args Optional vars extracted into the partial scope.
 */
function succeedlearn_amp_us_harassment_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/us-harassment/' . sanitize_file_name( (string) $name ) . '.php';
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
 * Canonical URL for the US harassment page.
 *
 * @return string
 */
function succeedlearn_amp_get_us_harassment_canonical_url() {
	$canonical = home_url( '/us-sexual-harassment-prevention-training/' );
	$page      = get_page_by_path( 'us-sexual-harassment-prevention-training' );
	if ( $page ) {
		$url = get_permalink( $page );
		if ( $url ) {
			$canonical = $url;
		}
	}
	return $canonical;
}

/**
 * Page title.
 *
 * @return string
 */
function succeedlearn_amp_get_us_harassment_page_title() {
	return __( 'US Sexual Harassment Prevention Training for Employees and Supervisors', 'succeedlearn-amp' );
}

/**
 * Meta description.
 *
 * @return string
 */
function succeedlearn_amp_get_us_harassment_meta_description() {
	return __(
		'US sexual harassment prevention training for employees and supervisors. Separate learning paths covering federal principles and selected state and local requirements.',
		'succeedlearn-amp'
	);
}

/**
 * FAQ items.
 *
 * @return array<int, array{question: string, answer: string}>
 */
function succeedlearn_amp_get_us_harassment_faq_items() {
	return array(
		array(
			'question' => __( 'Is sexual harassment prevention training mandatory throughout the United States?', 'succeedlearn-amp' ),
			'answer'   => __( 'There is no single training schedule that applies identically to every private employer nationwide. Federal principles operate alongside state and local mandates. Requirements depend on factors such as work location, employer size, industry and role.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Do all employees take the same United States course?', 'succeedlearn-amp' ),
			'answer'   => __( 'Not necessarily. Nonsupervisory employees and supervisors may need different content or duration. Course assignment should reflect work location and actual responsibilities.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Why is supervisor training different?', 'succeedlearn-amp' ),
			'answer'   => __( 'Supervisors may receive complaints, make employment decisions, trigger employer responsibilities and need to prevent retaliation. Their training therefore includes escalation, documentation, privacy, investigation support and policy-enforcement responsibilities.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the training cover harassment beyond sexual conduct?', 'succeedlearn-amp' ),
			'answer'   => __( 'The course addresses sexual harassment and may also cover harassment linked to other protected characteristics, stereotyping, abusive conduct and related workplace expectations, depending on the selected learning path.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can remote employees complete the training online?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes, subject to the selected platform and technical configuration. Employers should still verify whether the applicable jurisdiction specifies interactivity, timing, language, accessibility or other delivery standards.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can our policy and reporting information be included?', 'succeedlearn-amp' ),
			'answer'   => __( 'Customization may include policies, reporting channels, contacts, branding and selected workplace examples, depending on project scope.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does completing the course guarantee legal compliance?', 'succeedlearn-amp' ),
			'answer'   => __( 'No. Training can support a prevention and compliance program, but it does not replace current legal advice, effective policies, accessible reporting, impartial investigations, corrective action or protection against retaliation.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Coverage checklist items (confirm before assigning).
 *
 * @return array<int, string>
 */
function succeedlearn_amp_get_us_harassment_coverage_items() {
	return array(
		__( 'The state, city or territory where each employee works', 'succeedlearn-amp' ),
		__( 'Whether the learner has supervisory authority', 'succeedlearn-amp' ),
		__( 'Employer-size and industry thresholds', 'succeedlearn-amp' ),
		__( 'Required course length, frequency and delivery format', 'succeedlearn-amp' ),
		__( 'Policy, notice, certificate and record-retention obligations', 'succeedlearn-amp' ),
	);
}

/**
 * Selected jurisdiction cards.
 *
 * @return array<int, array{title: string, description: string}>
 */
function succeedlearn_amp_get_us_harassment_jurisdictions() {
	return array(
		array(
			'title'       => __( 'California', 'succeedlearn-amp' ),
			'description' => __( 'Covered employers generally provide at least one hour of training to nonsupervisory employees and two hours to supervisors every two years.', 'succeedlearn-amp' ),
		),
		array(
			'title'       => __( 'New York State', 'succeedlearn-amp' ),
			'description' => __( 'Employers provide annual interactive sexual-harassment prevention training that meets the state’s minimum standards.', 'succeedlearn-amp' ),
		),
		array(
			'title'       => __( 'Illinois', 'succeedlearn-amp' ),
			'description' => __( 'Covered employers provide annual sexual-harassment prevention training; additional rules may apply in particular industries or locations.', 'succeedlearn-amp' ),
		),
		array(
			'title'       => __( 'Connecticut', 'succeedlearn-amp' ),
			'description' => __( 'Requirements vary according to employer size and supervisory status.', 'succeedlearn-amp' ),
		),
		array(
			'title'       => __( 'Maine', 'succeedlearn-amp' ),
			'description' => __( 'Covered employers train new employees and provide additional information to supervisory and managerial employees.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Employee learning path topics.
 *
 * @return array<int, string>
 */
function succeedlearn_amp_get_us_harassment_employee_topics() {
	return array(
		__( 'Harassment and sexual harassment', 'succeedlearn-amp' ),
		__( 'Hostile work environment and quid pro quo harassment', 'succeedlearn-amp' ),
		__( 'Who may experience or engage in harassment', 'succeedlearn-amp' ),
		__( 'Conduct inside, outside and beyond a traditional workplace', 'succeedlearn-amp' ),
		__( 'Protected characteristics, stereotyping and abusive conduct', 'succeedlearn-amp' ),
		__( 'Active-bystander response options', 'succeedlearn-amp' ),
		__( 'Reporting procedures, investigations and corrective action', 'succeedlearn-amp' ),
		__( 'Retaliation and conduct that is not retaliation', 'succeedlearn-amp' ),
		__( 'Selected state and local protections and remedies', 'succeedlearn-amp' ),
	);
}

/**
 * Supervisor learning path topics.
 *
 * @return array<int, string>
 */
function succeedlearn_amp_get_us_harassment_supervisor_topics() {
	return array(
		__( 'Who may be treated as a supervisor', 'succeedlearn-amp' ),
		__( 'Tangible employment actions and employer liability', 'succeedlearn-amp' ),
		__( 'Policy communication and consistent enforcement', 'succeedlearn-amp' ),
		__( 'Mandatory reporting and escalation responsibilities', 'succeedlearn-amp' ),
		__( 'Receiving, documenting and responding to concerns', 'succeedlearn-amp' ),
		__( 'Privacy, confidentiality and protection against retaliation', 'succeedlearn-amp' ),
		__( 'Responding appropriately when personally accused', 'succeedlearn-amp' ),
		__( 'Supporting investigations and follow-up', 'succeedlearn-amp' ),
	);
}

/**
 * Decision table rows.
 *
 * @return array<int, array{label: string, employee: string, supervisor: string}>
 */
function succeedlearn_amp_get_us_harassment_decision_rows() {
	return array(
		array(
			'label'      => __( 'Primary purpose', 'succeedlearn-amp' ),
			'employee'   => __( 'Recognition, reporting and bystander awareness', 'succeedlearn-amp' ),
			'supervisor' => __( 'Prevention, escalation and complaint response', 'succeedlearn-amp' ),
		),
		array(
			'label'      => __( 'Typical learner', 'succeedlearn-amp' ),
			'employee'   => __( 'Nonsupervisory employee', 'succeedlearn-amp' ),
			'supervisor' => __( 'Supervisor or manager', 'succeedlearn-amp' ),
		),
		array(
			'label'      => __( 'Added focus', 'succeedlearn-amp' ),
			'employee'   => __( 'Workplace protections and response options', 'succeedlearn-amp' ),
			'supervisor' => __( 'Authority, liability, documentation and follow-up', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Workplace learning journey steps.
 *
 * @return array<int, string>
 */
function succeedlearn_amp_get_us_harassment_journey() {
	return array(
		__( 'Recognize concerning conduct and relevant workplace boundaries', 'succeedlearn-amp' ),
		__( 'Consider the context, policy and people affected', 'succeedlearn-amp' ),
		__( 'Respond safely as an employee, witness or supervisor', 'succeedlearn-amp' ),
		__( 'Report or escalate through the appropriate channel', 'succeedlearn-amp' ),
		__( 'Support fair follow-up without retaliation', 'succeedlearn-amp' ),
	);
}

/**
 * Workforce customisation checklist.
 *
 * @return array<int, string>
 */
function succeedlearn_amp_get_us_harassment_customisation_items() {
	return array(
		__( 'Organization branding and terminology', 'succeedlearn-amp' ),
		__( 'Anti-harassment, discrimination and retaliation policies', 'succeedlearn-amp' ),
		__( 'Reporting and escalation channels', 'succeedlearn-amp' ),
		__( 'HR, ethics or compliance contact details', 'succeedlearn-amp' ),
		__( 'Leadership messages', 'succeedlearn-amp' ),
		__( 'Industry- or role-relevant examples', 'succeedlearn-amp' ),
		__( 'Selected state or local content', 'succeedlearn-amp' ),
		__( 'Assessment, acknowledgement and completion requirements', 'succeedlearn-amp' ),
	);
}

/**
 * Section images for the US harassment page.
 *
 * @return array<string, string>
 */
function succeedlearn_amp_get_us_harassment_images() {
	return array(
		'hero'       => succeedlearn_amp_upload_url( '2026/09/USA-Sexual-Harassment-Prevention-Training.png' ),
		'coverage'   => succeedlearn_amp_upload_url( '2026/09/What-Should-U.S.-Harassment-Prevention-Training-Cover-1.webp' ),
		'requirements' => succeedlearn_amp_upload_url( '2026/09/Federal-Principles-and-Selected-State-Requirements.webp' ),
		'employee'   => succeedlearn_amp_upload_url( '2026/09/choose-appropriate-learning.webp' ),
		'supervisor' => succeedlearn_amp_upload_url( '2026/09/supervisor-training.webp' ),
		'workplace'  => succeedlearn_amp_upload_url( '2026/09/Learning-for-Real-Workplace-Situations.webp' ),
		'workforce'  => succeedlearn_amp_upload_url( '2026/09/Learning-Path.webp' ),
	);
}
