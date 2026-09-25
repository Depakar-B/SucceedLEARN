<?php
/**
 * SMCR Training — Frequently Asked Questions.
 *
 * Uses the global FAQ component.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What does SMCR stand for?', 'akaza-adventure' ),
		'answer'   => __( 'SMCR stands for the Senior Managers and Certification Regime. It is the UK framework for individual accountability within relevant regulated financial services firms.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What are the main parts of SMCR?', 'akaza-adventure' ),
		'answer'   => __( 'The SucceedLEARN Employees course explains Senior Managers, Certified Persons and Conduct Rules Staff, alongside the Conduct Rules that apply to relevant individuals.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does SucceedLEARN use PE and VC examples?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The courses include situations involving investments, due diligence, investor reporting, fund operations, valuations, fundraising and portfolio oversight.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is the difference between the Employees and Senior Managers courses?', 'akaza-adventure' ),
		'answer'   => __( 'The Employees course focuses on the SMCR structure and Individual Conduct Rules. The Senior Managers course adds responsibility, reasonable steps, oversight, delegation and additional Senior Manager Conduct Rules.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Do the SucceedLEARN SMCR courses include assessments?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Both supplied courses conclude with scenario-based assessments that test understanding of the course content.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the Employees course cover annual attestation?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The Employees course includes annual attestation and explains the responsibilities learners should consider during the process.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does SMCR training cover reporting and escalation?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The Employees course covers reporting and escalation of potential Conduct Rule breaches. The Senior Managers course also addresses oversight, documentation and breach reporting.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the Senior Managers course cover Statements of Responsibilities?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The Senior Managers course covers Statements of Responsibilities, Duty of Responsibility and evidence of oversight.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Are practical scenarios included in both SMCR courses?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Both courses use scenarios and decision points to connect SMCR principles with practical workplace situations.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Why are there separate SMCR courses for employees and Senior Managers?', 'akaza-adventure' ),
		'answer'   => __( 'The two courses address different levels of responsibility. Employees focus on individual conduct, while Senior Managers also explore leadership accountability, reasonable steps, delegation and oversight.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-smcr-faq',
		'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'title_html'    => __( 'SMCR Training FAQs for UK Private Equity and Venture Capital <span>Firms</span>', 'akaza-adventure' ),
		'intro'         => __( 'Concise answers to additional questions buyers and learners may have when considering SucceedLEARN SMCR training.', 'akaza-adventure' ),
		'numbered'      => true,
		'items'         => $faq_items,
		'schema'        => true,
	)
);