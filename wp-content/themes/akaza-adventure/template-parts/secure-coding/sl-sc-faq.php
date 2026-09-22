<?php
/**
 * Secure Coding — FAQ section.
 *
 * Uses the shared global FAQ component (global-faq.css / global-faq.js).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is secure coding training?', 'akaza-adventure' ),
		'answer'   => __( 'Secure coding training helps software teams understand how vulnerabilities can arise from design and implementation choices, and how to use safer patterns for input handling, access control, data protection, errors, dependencies and verification.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How long is this course?', 'akaza-adventure' ),
		'answer'   => __( 'The SucceedLEARN Secure Coding Practices course is approximately 45 minutes and is self-paced.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is the course suitable for beginners?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course is designed to be accessible to developers who are new to application security while still reinforcing useful habits for experienced engineering teams.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the training cover OWASP Top 10 risks?', 'akaza-adventure' ),
		'answer'   => __( 'The course themes address secure coding practices directly relevant to major OWASP application-security risks, including access control, injection, authentication, cryptography, secure configuration, software supply-chain risk, integrity, logging and exception handling. Confirm any formal mapping requirement during the demo.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can we deliver it through our own LMS?', 'akaza-adventure' ),
		'answer'   => __( 'SucceedLEARN supports enterprise and LMS delivery options across its learning portfolio. Your required LMS, SCORM version, SSO or integration approach should be confirmed during implementation planning.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can the course be customised for our organisation?', 'akaza-adventure' ),
		'answer'   => __( 'Branding, organisational examples, policies or technology-specific context can be discussed as part of the requirement. The final customisation scope should be confirmed with the SucceedLEARN team.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'faq',
		'section_class' => 'sl-faq-section--alt sl-sc-faq',
		'eyebrow'       => __( 'Frequently asked questions', 'akaza-adventure' ),
		'title_html'    => __( 'Secure coding training <span>FAQs</span>', 'akaza-adventure' ),
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
