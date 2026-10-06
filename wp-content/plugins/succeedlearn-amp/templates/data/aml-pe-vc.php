<?php
/**
 * AML Training for PE/VC: AMP data helpers.
 *
 * Content mirrors theme: template-parts/courses/aml-pe-vc/*.php
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an AML PE/VC section partial.
 *
 * @param string $name Partial basename without .php.
 * @param array  $args Variables exposed to the partial.
 */
function succeedlearn_amp_aml_pe_vc_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/aml-pe-vc/' . sanitize_file_name( (string) $name ) . '.php';
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
function succeedlearn_amp_get_aml_pe_vc_canonical_url() {
	$canonical = home_url( '/aml-pe-vc/' );
	$page      = get_page_by_path( 'aml-pe-vc' );
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
function succeedlearn_amp_get_aml_pe_vc_page_title() {
	return __( 'AML Training for PE/VC', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_aml_pe_vc_meta_description() {
	return __( 'Practical AML training for Private Equity and Venture Capital teams. Build awareness of CDD, EDD, MLRO responsibilities, CFT, CPF and key UK and US anti-money laundering frameworks.', 'succeedlearn-amp' );
}

/**
 * Page images.
 *
 * @return array<string,string>
 */
function succeedlearn_amp_get_aml_pe_vc_images() {
	return array(
		'hero'         => succeedlearn_amp_upload_url( '2026/09/AML_Hero-section-image.webp' ),
		'individuals'  => succeedlearn_amp_upload_url( '2026/09/Image-1-AML.webp' ),
		'organisations'=> succeedlearn_amp_upload_url( '2026/09/organisation-image-1.webp' ),
		'cpd'          => succeedlearn_amp_upload_url( '2026/09/CPD.webp' ),
		'overview'     => succeedlearn_amp_upload_url( '2026/09/aml_compliance_office_illustration.webp' ),
		'cdd'          => succeedlearn_amp_upload_url( '2026/09/CDD_image.webp' ),
		'edd'          => succeedlearn_amp_upload_url( '2026/09/EDD_image.webp' ),
		'cft'          => succeedlearn_amp_upload_url( '2026/09/CFT_image.webp' ),
		'cpf'          => succeedlearn_amp_upload_url( '2026/09/CPF_image.webp' ),
		'interactive'  => succeedlearn_amp_upload_url( '2026/09/Assessment-section-image.webp' ),
		'cta'          => succeedlearn_amp_upload_url( '2026/09/last-image_AML.webp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_aml_pe_vc_individual_features() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Interactive eLearning', 'succeedlearn-amp' ),
			'text'  => __( 'Practical digital learning supported by AML scenarios and knowledge checks.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( '40-minute duration', 'succeedlearn-amp' ),
			'text'  => __( 'Complete the core AML learning in approximately half an hour.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'CPD Certificate on Completion', 'succeedlearn-amp' ),
			'text'  => __( 'Receive a completion certificate after successfully finishing the learning.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Instant access', 'succeedlearn-amp' ),
			'text'  => __( 'Start learning immediately after purchase.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_aml_pe_vc_organisation_features() {
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
			'text'  => __( 'Assign AML training to selected teams or learner groups.', 'succeedlearn-amp' ),
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
function succeedlearn_amp_get_aml_pe_vc_outcomes() {
	return array(
		array(
			'title' => __( 'Understand money laundering', 'succeedlearn-amp' ),
			'text'  => __( 'Recognise placement, layering and integration.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Recognise suspicious activity', 'succeedlearn-amp' ),
			'text'  => __( 'Identify unusual ownership, funds, jurisdictions and transactions.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Understand due diligence', 'succeedlearn-amp' ),
			'text'  => __( 'Learn how identification, CDD and EDD support AML controls.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Understand CFT and CPF', 'succeedlearn-amp' ),
			'text'  => __( 'Recognise terrorist financing and proliferation financing risks.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Understand AML legislation', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness of key UK and US AML frameworks.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Know when to escalate', 'succeedlearn-amp' ),
			'text'  => __( 'Understand MLRO reporting and appropriate escalation.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array{uk:array<int,array<string,string>>,us:array<int,array<string,string>>}
 */
function succeedlearn_amp_get_aml_pe_vc_laws() {
	return array(
		'uk' => array(
			array(
				'year'  => '2002',
				'title' => __( 'Proceeds of Crime Act', 'succeedlearn-amp' ),
				'text'  => __( 'Addresses criminal property, money laundering offences and the reporting of relevant suspicions.', 'succeedlearn-amp' ),
			),
			array(
				'year'  => '2017',
				'title' => __( 'Money Laundering Regulations', 'succeedlearn-amp' ),
				'text'  => __( 'Cover areas including customer due diligence, risk assessment, ongoing monitoring and record keeping.', 'succeedlearn-amp' ),
			),
			array(
				'year'  => '2018',
				'title' => __( 'Sanctions and Anti-Money Laundering Act', 'succeedlearn-amp' ),
				'text'  => __( 'Provides an important UK statutory framework for sanctions and anti-money laundering measures.', 'succeedlearn-amp' ),
			),
		),
		'us' => array(
			array(
				'year'  => '1970',
				'title' => __( 'Bank Secrecy Act', 'succeedlearn-amp' ),
				'text'  => __( 'A foundational US AML framework involving financial record keeping and reporting requirements.', 'succeedlearn-amp' ),
			),
			array(
				'year'  => '2001',
				'title' => __( 'USA PATRIOT Act', 'succeedlearn-amp' ),
				'text'  => __( 'Strengthened US AML controls, including customer identification and due diligence measures.', 'succeedlearn-amp' ),
			),
			array(
				'year'  => '2020',
				'title' => __( 'Anti-Money Laundering Act', 'succeedlearn-amp' ),
				'text'  => __( 'Modernised elements of the US AML framework and strengthened its focus on transparency.', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_aml_pe_vc_concepts() {
	return array(
		array(
			'code'     => 'CDD',
			'title'    => __( 'Customer Due Diligence', 'succeedlearn-amp' ),
			'subtitle' => __( 'Understanding the relationship and its risk', 'succeedlearn-amp' ),
			'text'     => __( 'CDD goes beyond identity checks to understand ownership, business purpose, source of funds and the nature of the relationship. It helps determine whether the customer or investment presents standard or higher financial crime risk.', 'succeedlearn-amp' ),
			'image'    => 'cdd',
			'alt'      => __( 'Customer Due Diligence checklist and investor review', 'succeedlearn-amp' ),
		),
		array(
			'code'     => 'EDD',
			'title'    => __( 'Enhanced Due Diligence', 'succeedlearn-amp' ),
			'subtitle' => __( 'Deeper checks for higher-risk relationships', 'succeedlearn-amp' ),
			'text'     => __( 'EDD applies deeper scrutiny where higher risks are identified, such as PEP exposure, opaque ownership structures or connections to high-risk jurisdictions. Reviews can include source of wealth, source of funds, UBO transparency and additional supporting evidence.', 'succeedlearn-amp' ),
			'image'    => 'edd',
			'alt'      => __( 'Enhanced Due Diligence high-risk investor review', 'succeedlearn-amp' ),
		),
		array(
			'code'     => 'CFT',
			'title'    => __( 'Combating the Financing of Terrorism', 'succeedlearn-amp' ),
			'subtitle' => __( 'Preventing funds from supporting terrorist activity', 'succeedlearn-amp' ),
			'text'     => __( 'CFT focuses on identifying and preventing funds or financial services from being used to support terrorist activity. Learners consider why unusual transactions, counterparties and fund flows may require further scrutiny and escalation.', 'succeedlearn-amp' ),
			'image'    => 'cft',
			'alt'      => __( 'Combating the Financing of Terrorism monitoring and prevention', 'succeedlearn-amp' ),
		),
		array(
			'code'     => 'CPF',
			'title'    => __( 'Counter Proliferation Financing', 'succeedlearn-amp' ),
			'subtitle' => __( 'Preventing financing linked to weapons proliferation', 'succeedlearn-amp' ),
			'text'     => __( 'CPF focuses on preventing financing connected to the proliferation of weapons of mass destruction. In investment contexts, relevant risks can involve sanctioned parties, high-risk jurisdictions or businesses connected to dual-use technologies.', 'succeedlearn-amp' ),
			'image'    => 'cpf',
			'alt'      => __( 'Counter Proliferation Financing risk awareness', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_aml_pe_vc_interactive_cards() {
	return array(
		array(
			'title' => __( 'Recognise warning signs', 'succeedlearn-amp' ),
			'text'  => __( 'Identify suspicious ownership, funds and investment activity.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Assess investor profiles', 'succeedlearn-amp' ),
			'text'  => __( 'Consider when standard CDD or deeper EDD may be appropriate.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Practise escalation', 'succeedlearn-amp' ),
			'text'  => __( 'Understand when concerns should be raised through the MLRO process.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_aml_pe_vc_faq_items() {
	return array(
		array(
			'question' => __( 'What is Anti-money Laundering?', 'succeedlearn-amp' ),
			'answer'   => __( 'Anti-Money Laundering (AML) refers to the laws, processes and controls used to detect, prevent and report attempts to disguise illegally obtained funds as legitimate.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Who should take this AML course?', 'succeedlearn-amp' ),
			'answer'   => __( 'The course is relevant to professionals involved in investment activity, compliance, risk, finance, operations and investor onboarding who need practical AML awareness.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How much does the individual AML course cost?', 'succeedlearn-amp' ),
			'answer'   => __( 'For an individual learner, the standalone AML course is available at $20. For organisations with more than 10 users, the complete Financial Crime Prevention Suite is available at $1.50 per user per month, equivalent to $18 per user per year.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How long does the AML course take?', 'succeedlearn-amp' ),
			'answer'   => __( 'The individual course is designed as approximately 40 minutes of focused eLearning.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the AML course cover UK anti-money laundering laws?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The course covers key UK AML frameworks including POCA 2002, the Money Laundering Regulations 2017 and SAMLA 2018.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the course cover US AML laws?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The course introduces the Bank Secrecy Act, USA PATRIOT Act and Anti-Money Laundering Act of 2020.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the course cover CDD and EDD?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The course covers customer identification, Customer Due Diligence and Enhanced Due Diligence within a risk-based AML approach.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What does MLRO mean in AML training?', 'succeedlearn-amp' ),
			'answer'   => __( "MLRO means Money Laundering Reporting Officer. The course explains the MLRO's role in reviewing concerns, reporting suspicious activity and overseeing AML processes.", 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What are CFT and CPF?', 'succeedlearn-amp' ),
			'answer'   => __( 'CFT refers to Combating the Financing of Terrorism, while CPF refers to Counter Proliferation Financing. Both form part of the wider financial crime risks addressed by the course.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can organisations deploy the AML course through their own LMS?', 'succeedlearn-amp' ),
			'answer'   => __( 'Organisations can explore SCORM delivery for an existing LMS or SaaS delivery through SucceedLEARN.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does organisational AML training include reporting and reminders?', 'succeedlearn-amp' ),
			'answer'   => __( 'Organisational delivery can support learner reporting, completion tracking and automatic reminders.', 'succeedlearn-amp' ),
		),
	);
}
