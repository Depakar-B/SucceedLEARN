<?php
/**
 * Financial Crime Prevention — FAQ section.
 *
 * Uses the shared global FAQ component (global-faq.css).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is Financial Crime Prevention Training?', 'akaza-adventure' ),
		'answer'   => __( 'Financial Crime Prevention Training helps employees recognise financial crime and compliance risks, understand relevant controls and respond appropriately when concerns arise.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is the difference between AML and Financial Crime Prevention?', 'akaza-adventure' ),
		'answer'   => __( 'AML focuses specifically on money laundering risks, while Financial Crime Prevention is broader and can include bribery, sanctions, tax evasion, fraud and market-related misconduct.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who should complete Financial Crime Prevention Training?', 'akaza-adventure' ),
		'answer'   => __( 'Relevant employees may include compliance, risk, finance, operations, procurement, sales, customer-facing teams, managers and employees handling transactions, third parties, sensitive information or AI tools.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What courses are included in the SucceedLEARN suite?', 'akaza-adventure' ),
		'answer'   => __( 'The suite includes AML, ABAC, Preventing Facilitation of Tax Evasion, Insider Trading, Trade Compliance and Sanctions, Failure to Prevent Fraud, Modern Slavery Awareness and Responsible Use of AI.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can Financial Crime Prevention Training be customised?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. SucceedLEARN courses can be customised to reflect organisational policies, terminology, branding, reporting routes and relevant internal procedures.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How is Financial Crime Prevention Training delivered?', 'akaza-adventure' ),
		'answer'   => __( 'Training can be delivered through SucceedLEARN’s hosted learning platform or supplied as SCORM-compatible content for an organisation’s existing LMS.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'faqs',
		'section_class' => 'sl-fcp-faq',
		'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'title'         => __( 'Financial Crime Prevention FAQs', 'akaza-adventure' ),
		'items'         => $faq_items,
		'schema'        => true,
	)
);
