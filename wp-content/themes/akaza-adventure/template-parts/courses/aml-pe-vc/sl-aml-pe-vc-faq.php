<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — FAQ
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$faq_items = array(
	array(
		'question' => __( 'What is AML training for Private Equity and Venture Capital?', 'akaza-adventure' ),
		'answer'   => __( 'It is anti-money laundering awareness training tailored to financial crime risks encountered in investment environments, including investor onboarding, ownership structures and due diligence.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who should take this AML course?', 'akaza-adventure' ),
		'answer'   => __( 'The course is relevant to professionals involved in investment activity, compliance, risk, finance, operations and investor onboarding who need practical AML awareness.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How much does the individual AML course cost?', 'akaza-adventure' ),
		'answer'   => __( 'For an individual learner, the standalone AML course is available at $20. For organisations with more than 10 users, the complete Financial Crime Prevention Suite is available at $1.50 per user per month, equivalent to $18 per user per year.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How long does the AML course take?', 'akaza-adventure' ),
		'answer'   => __( 'The individual course is designed as approximately 40 minutes of focused eLearning.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the AML course cover UK anti-money laundering laws?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course covers key UK AML frameworks including POCA 2002, the Money Laundering Regulations 2017 and SAMLA 2018.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course cover US AML laws?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course introduces the Bank Secrecy Act, USA PATRIOT Act and Anti-Money Laundering Act of 2020.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course cover CDD and EDD?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course covers customer identification, Customer Due Diligence and Enhanced Due Diligence within a risk-based AML approach.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What does MLRO mean in AML training?', 'akaza-adventure' ),
		'answer'   => __( 'MLRO means Money Laundering Reporting Officer. The course explains the MLRO\'s role in reviewing concerns, reporting suspicious activity and overseeing AML processes.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What are CFT and CPF?', 'akaza-adventure' ),
		'answer'   => __( 'CFT refers to Combating the Financing of Terrorism, while CPF refers to Counter Proliferation Financing. Both form part of the wider financial crime risks addressed by the course.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can organisations deploy the AML course through their own LMS?', 'akaza-adventure' ),
		'answer'   => __( 'Organisations can explore SCORM delivery for an existing LMS or SaaS delivery through SucceedLEARN.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does organisational AML training include reporting and reminders?', 'akaza-adventure' ),
		'answer'   => __( 'Organisational delivery can support learner reporting, completion tracking and automatic reminders.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'faq',
		'section_class' => 'sl-aml-pe-vc-faq sl-faq-section--alt',
		'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'title_html'    => __( 'Anti-Money Laundering Awareness Training <span>FAQs</span>', 'akaza-adventure' ),
		'description'   => __( 'Concise answers to common questions about AML training for PE/VC professionals.', 'akaza-adventure' ),
		'cta_text'      => __( 'Speak to a specialist', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
