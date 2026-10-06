<?php
/**
 * Information Security Awareness Training - FAQ.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is information security awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Information security awareness training helps employees understand cybersecurity risks, recognise potential threats and develop safer behaviours when using organisational information, accounts, systems and devices.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Who should complete information security awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Training can be relevant to employees, managers, contractors and other users who access organisational information, systems, applications or devices.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What topics are covered in SucceedLEARN\'s Information Security Awareness Training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The programme includes Account Security, AI-Based Attack, Data Classification, Malware, Physical Security, Remote Work Security, Social Engineering, Vendor and Third-Party Risk Management, Incident Reporting and Insider Threat.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the training cover phishing and social engineering?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Social Engineering is a dedicated module within the programme and helps employees recognise manipulation, phishing, impersonation and suspicious requests.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the training cover AI-based cyber threats?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. The AI-Based Attack module builds awareness around emerging threats involving AI-enabled phishing, impersonation and other forms of AI-assisted social engineering.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the training include remote work security?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Remote Work Security addresses security behaviours relevant to employees accessing organisational information and systems outside controlled office environments.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the programme include insider threat awareness?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Insider Threat is one of the 10 modules and addresses malicious, negligent and compromised insider risks.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can the training support cybersecurity compliance programmes?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Information security awareness training can support broader cybersecurity, risk-management and compliance objectives. The specific training required should depend on the organisation\'s policies, risks and applicable framework or regulatory requirements.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can organisations deliver the training through their own LMS?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. SucceedLEARN supports SCORM-based delivery for organisations using their own learning management system, alongside SaaS delivery through SucceedLEARN.', 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-isat-faq',
		'eyebrow'       => __( 'FAQ', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about SucceedLEARN\'s Information Security Awareness Training.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request a Demo', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
