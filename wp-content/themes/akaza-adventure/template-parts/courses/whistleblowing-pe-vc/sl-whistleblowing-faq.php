<?php
/**
 * Whistleblowing Training — Course FAQs.
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
		'question' => __( 'Is this course designed for UK investment firms?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course is positioned for UK investment environments and uses scenarios relevant to deal, investment and compliance teams.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course include both UK and US whistleblowing laws?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. It introduces the UK framework, including PIDA and FCA SYSC 18, and references selected US legislation including the Sarbanes-Oxley Act, Dodd-Frank Act and False Claims Act.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course use investment-sector examples?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Examples include financial misreporting, market abuse, bribery, conflicts of interest, AML and sanctions concerns and misuse of confidential information.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does whistleblowing training cover personal grievances?', 'akaza-adventure' ),
		'answer'   => __( 'The course explains the difference between a whistleblowing concern and a personal workplace grievance so learners can identify the appropriate route.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the Whistleblowing course include an assessment?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The supplied course includes a scenario-based assessment covering reportable concerns, retaliation, grievances and reporting routes.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What types of misconduct are covered in the course?', 'akaza-adventure' ),
		'answer'   => __( 'Examples include insider dealing or market abuse, financial fraud or misreporting, bribery, conflicts of interest, AML or sanctions concerns and legal or regulatory breaches.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course explain how to raise a whistleblowing concern?', 'akaza-adventure' ),
		'answer'   => __( "Yes. Learners are introduced to the importance of following the organisation's whistleblowing policy, using appropriate reporting routes and maintaining confidentiality.", 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Why is whistleblowing training relevant to investment professionals?', 'akaza-adventure' ),
		'answer'   => __( 'Investment professionals work with sensitive financial, transaction and confidential information. Training helps them recognise potential misconduct and understand how concerns should be escalated.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can managers and compliance teams take this course?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The content is relevant to managers, compliance and risk teams, analysts and other employees who may identify or receive concerns.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is the difference between whistleblowing and a personal grievance?', 'akaza-adventure' ),
		'answer'   => __( "Whistleblowing concerns wrongdoing raised in the public interest, while a personal grievance normally concerns an individual's own employment circumstances.", 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-faq-section--alt sl-whistleblowing-faq',
		'eyebrow'       => __( 'Course FAQs', 'akaza-adventure' ),
		'title_html'    => __( 'What Do Buyers Commonly Ask About Whistleblowing <span>Training?</span>', 'akaza-adventure' ),
		'intro'         => __( 'Quick answers for organisations considering the course.', 'akaza-adventure' ),
		'numbered'      => true,
		'items'         => $faq_items,
		'schema'        => true,
	)
);