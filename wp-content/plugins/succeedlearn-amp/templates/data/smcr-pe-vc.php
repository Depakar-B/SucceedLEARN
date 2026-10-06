<?php
/**
 * SMCR Training for PE/VC: AMP data helpers.
 *
 * Content mirrors theme: template-parts/courses/smcr-pe-vc/*.php
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an SMCR PE/VC section partial.
 *
 * @param string $name Partial basename without .php.
 * @param array  $args Variables exposed to the partial.
 */
function succeedlearn_amp_smcr_pe_vc_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/smcr-pe-vc/' . sanitize_file_name( (string) $name ) . '.php';
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
function succeedlearn_amp_get_smcr_pe_vc_canonical_url() {
	$canonical = home_url( '/smcr-pe-vc/' );
	$page      = get_page_by_path( 'smcr-pe-vc' );
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
function succeedlearn_amp_get_smcr_pe_vc_page_title() {
	return __( 'SMCR Training for PE/VC', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_smcr_pe_vc_meta_description() {
	return __( 'Role-relevant SMCR training for UK private equity and venture capital teams, with dedicated learning for employees and Senior Managers covering Conduct Rules and accountability.', 'succeedlearn-amp' );
}

/**
 * Page images.
 *
 * @return array<string,string>
 */
function succeedlearn_amp_get_smcr_pe_vc_images() {
	return array(
		'hero'              => succeedlearn_amp_upload_url( '2026/09/SMCR_hero-section-image.webp' ),
		'individuals'       => succeedlearn_amp_upload_url( '2026/09/Image-1-AML.webp' ),
		'organisations'     => succeedlearn_amp_upload_url( '2026/09/organisation-image-1.webp' ),
		'cpd'               => succeedlearn_amp_upload_url( '2026/09/CPD.webp' ),
		'employees'         => succeedlearn_amp_upload_url( '2026/09/Common-page_SMCR.webp' ),
		'conduct_rules'     => succeedlearn_amp_upload_url( '2026/09/SMCR_Employees.webp' ),
		'senior_managers'   => succeedlearn_amp_upload_url( '2026/09/SMCR_Senior-Mnagers.webp' ),
		'fca'               => succeedlearn_amp_upload_url( '2026/09/FCA_SMCR.webp' ),
		'cocon'             => succeedlearn_amp_upload_url( '2026/09/COCON_SMCR.webp' ),
		'pra'               => succeedlearn_amp_upload_url( '2026/09/PRA_SMCR.webp' ),
		'practical_learning'=> succeedlearn_amp_upload_url( '2026/09/SMCR_Scerio-based-image.webp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_smcr_pe_vc_individual_features() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Interactive eLearning', 'succeedlearn-amp' ),
			'text'  => __( 'Practical digital learning supported by SMCR scenarios and knowledge checks.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Role-relevant duration', 'succeedlearn-amp' ),
			'text'  => __( 'Focused learning paths for employees and Senior Managers without a lengthy commitment.', 'succeedlearn-amp' ),
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
function succeedlearn_amp_get_smcr_pe_vc_organisation_features() {
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
			'text'  => __( 'Assign SMCR training to selected teams or learner groups.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '05',
			'title' => __( 'Completion visibility', 'succeedlearn-amp' ),
			'text'  => __( 'Give administrators clear oversight of learner activity.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Role-based learning courses (Employees / Senior Managers).
 *
 * @return array<int,array<string,mixed>>
 */
function succeedlearn_amp_get_smcr_pe_vc_role_courses() {
	return array(
		array(
			'mod'         => 'employee',
			'eyebrow'     => __( 'Employees Course', 'succeedlearn-amp' ),
			'title'       => __( 'SMCR Training for Employees', 'succeedlearn-amp' ),
			'description' => __( 'Build practical understanding of the SMCR framework and the six Individual Conduct Rules through situations relevant to PE and VC employees.', 'succeedlearn-amp' ),
			'features'    => array(
				__( 'SMCR structure and employee categories', 'succeedlearn-amp' ),
				__( 'Six Individual Conduct Rules', 'succeedlearn-amp' ),
				__( 'PE/VC-relevant workplace scenarios', 'succeedlearn-amp' ),
				__( 'Annual attestation', 'succeedlearn-amp' ),
				__( 'Reporting and escalation', 'succeedlearn-amp' ),
				__( 'Scenario-based assessment', 'succeedlearn-amp' ),
			),
		),
		array(
			'mod'         => 'manager',
			'eyebrow'     => __( 'Senior Managers Course', 'succeedlearn-amp' ),
			'title'       => __( 'SMCR Training for Senior Managers', 'succeedlearn-amp' ),
			'description' => __( 'Develop understanding of Senior Manager accountability, reasonable steps, delegation, oversight, documentation and additional Conduct Rules.', 'succeedlearn-amp' ),
			'features'    => array(
				__( 'Statement of Responsibilities', 'succeedlearn-amp' ),
				__( 'Duty of Responsibility', 'succeedlearn-amp' ),
				__( 'Reasonable steps', 'succeedlearn-amp' ),
				__( 'Additional Senior Manager Conduct Rules', 'succeedlearn-amp' ),
				__( 'Delegation and oversight', 'succeedlearn-amp' ),
				__( 'Recordkeeping and breach reporting', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * @return array<int,string>
 */
function succeedlearn_amp_get_smcr_pe_vc_employees_learning_areas() {
	return array(
		__( 'Understand the SMCR structure and relevant categories', 'succeedlearn-amp' ),
		__( 'Recognise what each Individual Conduct Rule expects', 'succeedlearn-amp' ),
		__( 'Apply the rules to practical workplace decisions', 'succeedlearn-amp' ),
		__( 'Understand when concerns should be reported or escalated', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_smcr_pe_vc_conduct_rule_scenarios() {
	return array(
		array(
			'title' => __( 'Investor Reporting', 'succeedlearn-amp' ),
			'text'  => __( 'Recognising and responding appropriately to inaccurate or potentially misleading information.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Due Diligence', 'succeedlearn-amp' ),
			'text'  => __( 'Responding appropriately when important information remains incomplete but commercial pressure is increasing.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Sensitive Information', 'succeedlearn-amp' ),
			'text'  => __( 'Understanding when information requires appropriate clearance before it is shared.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,string>
 */
function succeedlearn_amp_get_smcr_pe_vc_senior_managers_learning_areas() {
	return array(
		__( 'Statements of Responsibilities', 'succeedlearn-amp' ),
		__( 'Duty of Responsibility', 'succeedlearn-amp' ),
		__( 'Reasonable steps', 'succeedlearn-amp' ),
		__( 'Delegation and oversight', 'succeedlearn-amp' ),
		__( 'Additional Senior Manager Conduct Rules', 'succeedlearn-amp' ),
		__( 'Documentation and recordkeeping', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_smcr_pe_vc_accountability_points() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Clear Responsibilities', 'succeedlearn-amp' ),
			'text'  => __( 'Establish clear reporting lines, responsibilities and oversight arrangements.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Active Oversight', 'succeedlearn-amp' ),
			'text'  => __( 'Monitor delegated work, challenge weaknesses and respond to emerging risks or red flags.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Documented Actions', 'succeedlearn-amp' ),
			'text'  => __( 'Maintain records, audit trails and evidence of important decisions and oversight actions.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Employees / Senior Managers course-selection cards.
 *
 * @return array<int,array<string,mixed>>
 */
function succeedlearn_amp_get_smcr_pe_vc_course_selection() {
	return array(
		array(
			'label'       => __( 'Employees Course', 'succeedlearn-amp' ),
			'title'       => __( 'SMCR Training for Employees', 'succeedlearn-amp' ),
			'text'        => __( 'Designed for relevant employees who need to understand the SMCR structure and how the Individual Conduct Rules apply to their responsibilities.', 'succeedlearn-amp' ),
			'focus'       => array(
				__( 'SMCR structure', 'succeedlearn-amp' ),
				__( 'Individual Conduct Rules', 'succeedlearn-amp' ),
				__( 'Workplace responsibilities', 'succeedlearn-amp' ),
			),
			'anchor'      => 'employees-learning',
			'link_label'  => __( 'Explore Employees Course', 'succeedlearn-amp' ),
		),
		array(
			'label'       => __( 'Senior Managers Course', 'succeedlearn-amp' ),
			'title'       => __( 'SMCR Training for Senior Managers', 'succeedlearn-amp' ),
			'text'        => __( 'Designed for relevant Senior Management Function holders who need additional understanding of accountability, reasonable steps, delegation and oversight.', 'succeedlearn-amp' ),
			'focus'       => array(
				__( 'Senior Manager accountability', 'succeedlearn-amp' ),
				__( 'Reasonable steps', 'succeedlearn-amp' ),
				__( 'Delegation and oversight', 'succeedlearn-amp' ),
			),
			'anchor'      => 'senior-managers-learning',
			'link_label'  => __( 'Explore Senior Managers Course', 'succeedlearn-amp' ),
		),
	);
}

/**
 * UK regulatory context cards (FCA / COCON / PRA).
 *
 * @return array<int,array<string,mixed>>
 */
function succeedlearn_amp_get_smcr_pe_vc_regulators() {
	$images = succeedlearn_amp_get_smcr_pe_vc_images();

	return array(
		array(
			'code'     => 'FCA',
			'title'    => __( 'Financial Conduct Authority', 'succeedlearn-amp' ),
			'subtitle' => __( 'Regulator', 'succeedlearn-amp' ),
			'text'     => __( 'The Employees course explains that SMCR was introduced by the FCA to strengthen conduct standards and individual accountability.', 'succeedlearn-amp' ),
			'image'    => $images['fca'],
			'alt'      => __( 'FCA regulatory oversight and SMCR accountability', 'succeedlearn-amp' ),
		),
		array(
			'code'     => 'COCON',
			'title'    => __( 'Code of Conduct Sourcebook: COCON', 'succeedlearn-amp' ),
			'subtitle' => __( 'Sourcebook', 'succeedlearn-amp' ),
			'text'     => __( 'The Employees course identifies COCON as the sourcebook containing the Conduct Rules covered in the training.', 'succeedlearn-amp' ),
			'image'    => $images['cocon'],
			'alt'      => __( 'COCON Conduct Rules sourcebook and workplace standards', 'succeedlearn-amp' ),
		),
		array(
			'code'     => 'PRA',
			'title'    => __( 'Prudential Regulation Authority', 'succeedlearn-amp' ),
			'subtitle' => __( 'Prudential Regulation', 'succeedlearn-amp' ),
			'text'     => __( 'The Senior Managers course also refers to PRA responsibilities in the context of Senior Manager regulatory obligations.', 'succeedlearn-amp' ),
			'image'    => $images['pra'],
			'alt'      => __( 'PRA responsibilities for Senior Managers', 'succeedlearn-amp' ),
		),
	);
}

/**
 * PE/VC-focused learning cards.
 *
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_smcr_pe_vc_evc_cards() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Role-Specific Courses', 'succeedlearn-amp' ),
			'text'  => __( 'Employees and Senior Managers follow separate learning pathways reflecting different responsibilities.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'PE/VC-Relevant Examples', 'succeedlearn-amp' ),
			'text'  => __( 'Situations connect SMCR concepts with investment, reporting, fund operations and oversight.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Practical Decisions', 'succeedlearn-amp' ),
			'text'  => __( 'Scenario questions help learners apply the concepts rather than simply memorise terminology.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_smcr_pe_vc_faq_items() {
	return array(
		array(
			'question' => __( 'What does SMCR stand for?', 'succeedlearn-amp' ),
			'answer'   => __( 'SMCR stands for the Senior Managers and Certification Regime. It is the UK framework for individual accountability within relevant regulated financial services firms.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What are the main parts of SMCR?', 'succeedlearn-amp' ),
			'answer'   => __( 'The SucceedLEARN Employees course explains Senior Managers, Certified Persons and Conduct Rules Staff, alongside the Conduct Rules that apply to relevant individuals.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does SucceedLEARN use PE and VC examples?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The courses include situations involving investments, due diligence, investor reporting, fund operations, valuations, fundraising and portfolio oversight.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What is the difference between the Employees and Senior Managers courses?', 'succeedlearn-amp' ),
			'answer'   => __( 'The Employees course focuses on the SMCR structure and Individual Conduct Rules. The Senior Managers course adds responsibility, reasonable steps, oversight, delegation and additional Senior Manager Conduct Rules.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Do the SucceedLEARN SMCR courses include assessments?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Both supplied courses conclude with scenario-based assessments that test understanding of the course content.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the Employees course cover annual attestation?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The Employees course includes annual attestation and explains the responsibilities learners should consider during the process.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does SMCR training cover reporting and escalation?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The Employees course covers reporting and escalation of potential Conduct Rule breaches. The Senior Managers course also addresses oversight, documentation and breach reporting.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the Senior Managers course cover Statements of Responsibilities?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The Senior Managers course covers Statements of Responsibilities, Duty of Responsibility and evidence of oversight.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Are practical scenarios included in both SMCR courses?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Both courses use scenarios and decision points to connect SMCR principles with practical workplace situations.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Why are there separate SMCR courses for employees and Senior Managers?', 'succeedlearn-amp' ),
			'answer'   => __( 'The two courses address different levels of responsibility. Employees focus on individual conduct, while Senior Managers also explore leadership accountability, reasonable steps, delegation and oversight.', 'succeedlearn-amp' ),
		),
	);
}
