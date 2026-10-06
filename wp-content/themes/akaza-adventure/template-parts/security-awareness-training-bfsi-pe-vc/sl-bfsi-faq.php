<?php
/**
 * BFSI & PE/VC — Frequently Asked Questions.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is cybersecurity awareness training for BFSI and PE/VC Firms?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Cybersecurity awareness training for BFSI helps employees in banking, financial services and insurance recognise cyber threats and understand the behaviours needed to protect organisational systems, financial information, customer data and other sensitive information.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'PE/VC cybersecurity awareness training focuses on security risks employees may encounter when handling confidential investment information, investor data, portfolio-company information, financial transactions and communications with external parties.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Why do BFSI organisations need cybersecurity awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Financial-services employees routinely work with valuable data, financial transactions and external communications. This makes them potential targets for phishing, impersonation, fraud, credential theft and other social-engineering attacks.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What topics are covered in the BFSI & PE/VC security awareness course?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The course covers Social Engineering, Insider Threats, Physical Security, Data Privacy, Third-Party Risk and AI-Based Attacks.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the training cover phishing and social engineering?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Employees learn about different phishing techniques and how to recognise and respond to suspicious communications across multiple channels.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the course cover insider threats?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. The course addresses malicious, negligent and compromised insider threats and helps employees understand preventative and reporting actions.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the course include data privacy training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Data privacy topics include personal data, data handling, data-subject requests, incidents, third-party sharing, cross-border transfers and AI-related privacy risks.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the training cover third-party cyber risk?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Employees learn about third-party risks, approved processes and safer data-sharing practices when interacting with vendors and external organisations.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the course address AI-based cyberattacks?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. The course covers AI-driven threats including deepfakes, AI-generated phishing and impersonation, with an emphasis on verification and escalation.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Who should take the training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The course is relevant to employees, contractors, managers, executives and teams working with organisational systems, financial information, personal data, external vendors or sensitive communications.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the course include an assessment and certificate?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. The course includes knowledge checks, a final assessment and a configurable completion certificate.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can the course be deployed through our LMS?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. SucceedLEARN currently supports SCORM delivery for organisations using their own LMS, as well as SaaS-based delivery.', 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-faq-section--alt sl-bfsi-faq',
		'eyebrow'       => __( "FAQ's", 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about SucceedLEARN Cybersecurity Awareness Training for BFSI and PE/VC organisations.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request a Demo', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
