<?php
/**
 * Preventing Facilitation of Tax Evasion — FAQs.
 *
 * Uses the global SucceedLEARN FAQ component.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is tax evasion?', 'akaza-adventure' ),
		'answer'   => __( 'Tax evasion is the deliberate and dishonest avoidance of tax that is legally due.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is the facilitation of tax evasion?', 'akaza-adventure' ),
		'answer'   => __( 'Criminal facilitation occurs when another person deliberately and dishonestly helps someone commit tax evasion.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is Preventing the Facilitation of Tax Evasion training?', 'akaza-adventure' ),
		'answer'   => __( 'It is UK-focused eLearning that helps learners understand tax evasion, the Criminal Finances Act 2017, risk assessment, due diligence, associated persons, reporting and monitoring.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What does the Criminal Finances Act 2017 mean for organisations?', 'akaza-adventure' ),
		'answer'   => __( 'Part 3 of the Criminal Finances Act 2017 introduced corporate offences relating to failure to prevent the criminal facilitation of tax evasion.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who should take Preventing Facilitation of Tax Evasion training?', 'akaza-adventure' ),
		'answer'   => __( 'The course is relevant to senior management, employees and managers, finance and accounts teams, procurement and vendor teams, compliance and risk professionals, legal and audit teams, people working with third parties or intermediaries, and other roles exposed to tax compliance risk.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What does the course cover for senior management?', 'akaza-adventure' ),
		'answer'   => __( 'The course covers leadership responsibility, risk assessment, due diligence, policy development, communication and training, reporting, and ongoing monitoring and review.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course include knowledge checks and assessments?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course includes knowledge checks, scenario-based learning and assessment activities.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How long is the course?', 'akaza-adventure' ),
		'answer'   => __( 'The course duration is 30 minutes.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is the Preventing Facilitation of Tax Evasion course CPD-certified?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course is CPD-certified.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-faq-section--alt sl-tax-evasion-faq',
		'eyebrow'       => __( 'Preventing Facilitation of Tax Evasion FAQs', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked Questions About Preventing Facilitation of Tax Evasion <span>Training</span>', 'akaza-adventure' ),
		'intro'         => __( 'Clear answers to common questions about tax evasion, the Criminal Finances Act 2017 and the SucceedLEARN course.', 'akaza-adventure' ),
		'numbered'      => true,
		'items'         => $faq_items,
		'schema'        => true,
	)
);