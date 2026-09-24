<?php
/**
 * PCI DSS — Frequently Asked Questions.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What PCI DSS training does SucceedLEARN provide?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'SucceedLEARN provides two PCI DSS awareness modules: PCI DSS Employee Awareness Training for foundational employee awareness and PCI DSS Cashier & Payment Handler Training for employees directly involved in processing or handling card payments.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What is the difference between the two PCI DSS modules?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The Employee Awareness module focuses on foundational PCI DSS knowledge, cardholder and sensitive authentication data, PCI DSS requirements and data-storage guidance.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'The Cashier & Payment Handler module focuses more specifically on payment handling, card-present and card-not-present transactions, social engineering and suspicious payment activity.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does every employee need the Cashier & Payment Handler module?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Training should be selected according to employee responsibilities. Employees directly involved in card-payment handling may require the specialised payment-handler module, while other relevant employees may be better suited to foundational PCI DSS awareness.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What does the PCI DSS Employee Awareness module cover?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'It covers what PCI DSS is, who it applies to, cardholder and sensitive authentication data, PCI DSS goals and requirements, data-storage guidelines, interactive learning activities and an assessment.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What does the Cashier & Payment Handler module cover?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'It covers PCI DSS goals, payment-handler responsibilities, card-present and card-not-present transactions, PCI DSS requirements, phishing and other social-engineering techniques, Code-10 calls, and payment-security do\'s and don\'ts.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does PCI DSS require security-awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'PCI DSS Requirement 12.6 establishes security-awareness education as an ongoing activity and requires a formal security-awareness programme for personnel.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does PCI DSS awareness training include phishing and social engineering?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Current PCI DSS requirements specifically include awareness of threats that could affect the cardholder data environment, including phishing, related attacks and social engineering.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the training include an assessment?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The Employee Awareness module includes an assessment to check understanding after relevant learning activities.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can PCI DSS training be delivered through our LMS?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Applicable SucceedLEARN training can be provided through SCORM-based delivery for organisations using their own LMS, subject to the selected deployment model.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can different PCI DSS modules be assigned to different employee groups?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. The two-module structure allows organizations to align training with employee responsibilities - for example, foundational awareness for relevant employees and specialized training for employees directly handling card payments.', 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-faq-section--alt sl-pci-faq',
		'eyebrow'       => __( "FAQ's", 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about SucceedLEARN PCI DSS awareness training for employees and payment handlers.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request Demo', 'akaza-adventure' ),
		'cta_url'       => '#request-demo',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
