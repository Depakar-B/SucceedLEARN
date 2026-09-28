<?php
/**
 * SOC 2 Security Awareness — FAQ.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is SOC 2 security awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'SOC 2 security awareness training refers to employee information security training designed to reinforce behaviors relevant to an organization\'s security control environment and SOC 2 readiness programme.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does SOC 2 require employee security awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'SOC 2 evaluates controls relevant to the applicable Trust Services Criteria. Organisations commonly include employee security awareness activities within their control environment, but the specific training needed depends on the organization\'s systems, risks, policies and controls.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does SOC 2 specify mandatory cybersecurity training topics?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'No. SOC 2 does not prescribe one universal employee-training syllabus. Training topics should reflect the organization\'s security risks, responsibilities, systems and control environment.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Which security awareness topics are covered in SucceedLEARN’s SOC 2-focused training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The core programme includes Account Security, Data Classification, Malware, Physical Security, Remote Work Security, Social Engineering, Vendor and Third-Party Risk Management, Incident Reporting and Insider Threat.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Is phishing awareness relevant to SOC 2?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes, phishing and social engineering can be relevant to an organization\'s security-awareness programme because they can compromise accounts, systems and information. The degree of relevance depends on the organization\'s particular control environment.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Is data classification training relevant to SOC 2?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'It can be particularly relevant where employees handle sensitive or confidential information and organizational controls require that data be identified, handled or shared appropriately.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Is third-party risk awareness relevant to SOC 2?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Third-party relationships can affect an organization\'s security environment, and employee awareness can support secure interaction with vendors and service providers.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Is AI-based attack awareness required for SOC 2?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'SOC 2 does not prescribe a standalone AI-awareness requirement. SucceedLEARN offers AI-Based Attack Awareness as an additional module for organizations that want to address emerging AI-enabled cyber risks.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can training completion support a SOC 2 audit?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Training records can help demonstrate that awareness activities were performed. However, the evidence required in a SOC 2 examination depends on the organization\'s controls and the procedures performed by the service auditor.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does completing the training make an organization SOC 2 compliant?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'No. Information security awareness training can support a wider SOC 2 readiness programme, but completing a course alone does not establish SOC 2 compliance or result in a SOC 2 report.', 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-soc2-faq',
		'eyebrow'       => __( 'FAQ', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about SucceedLEARN’s Information Security Awareness Training for SOC 2 Compliance.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request a Demo', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
