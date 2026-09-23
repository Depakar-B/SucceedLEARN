<?php
/**
 * S-Metrics — Frequently Asked Questions.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is S-Metrics?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Metrics is the security-awareness analytics and reporting solution within the SucceedLEARN Security Behaviour & Culture Suite.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'It consolidates reporting across multiple awareness activities to provide organisations with greater visibility into employee learning, campaign performance and behavioural indicators.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What is a security awareness dashboard?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'A security awareness dashboard brings together data from cybersecurity awareness activities such as employee training, phishing simulations, microlearning and engagement campaigns into a central reporting view.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'It helps administrators understand programme participation and identify areas requiring additional attention.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What can S-Metrics track?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Depending on the SBCS solutions deployed, S-Metrics can provide visibility into learning progress, training completion, assessments, phishing interactions, reporting behaviour, microlearning engagement, gamified-learning participation and other awareness indicators.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can S-Metrics report on phishing simulation performance?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. S-Metrics can incorporate phishing simulation data from S-Phish, including indicators such as email delivery, opens, clicks, reporting behaviour, credential submission, resiliency scores and remedial-learning activity.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can S-Metrics track employee training completion?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. S-Metrics can provide visibility into course assignments, enrolments, completion, progress, assessments and certificates from relevant learning activity.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can reports be exported?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. S-Metrics supports exportable reporting that can be used for management reviews, internal analysis, audit preparation and other organisational reporting requirements.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can S-Metrics support compliance and audit readiness?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Metrics can help organisations maintain visibility into security-awareness activity, completion records, assessments, campaign history and other relevant information that may support audit and compliance processes.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'The specific evidence required depends on the applicable framework, regulatory requirement or audit scope.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How does S-Metrics work with other SucceedLEARN SBCS products?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Metrics provides the measurement layer of the wider SBCS ecosystem.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'It can bring together data from solutions such as S-Aware, S-Phish, S-Bytes and S-Play, helping organisations understand awareness performance across multiple learning and behavioural activities.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Who typically uses S-Metrics?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Metrics can be useful for Information Security, Cybersecurity, Compliance, Risk, Learning & Development, HR and leadership teams that require visibility into security-awareness activity and programme performance.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does S-Metrics automatically make an organisation compliant?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'No. S-Metrics can provide reporting and records that support governance, audit and compliance activities, but using a reporting platform alone does not establish compliance with a specific regulation or framework.', 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-s-metrics-faq',
		'eyebrow'       => __( "FAQ's", 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about S-Metrics and security awareness analytics and reporting.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request Demo', 'akaza-adventure' ),
		'cta_url'       => '#request-demo',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
