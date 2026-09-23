<?php
/**
 * S-Sync — Frequently Asked Questions.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is S-Sync?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Sync is the enterprise integration layer of the SucceedLEARN Security Behaviour & Culture Suite.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'It helps organisations connect security-awareness administration with existing identity, HR, learning and workplace technology systems.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What systems can S-Sync integrate with?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Depending on the required configuration, S-Sync can support connectivity involving identity and authentication systems, HR platforms, Learning Management Systems, Microsoft and Google environments, and API-enabled internal or third-party applications.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does S-Sync support Single Sign-On?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. S-Sync supports Single Sign-On capabilities that enable employees to access training using their organisational authentication environment rather than maintaining separate learner credentials.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can S-Sync automate user provisioning?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Automated user provisioning can help organisations synchronise learner accounts between connected systems and SucceedLEARN, reducing the need for repetitive manual user administration.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can S-Sync connect with HR systems?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. HR-system synchronisation can support the transfer of relevant workforce information used for learner administration, such as departments, locations and organisational groupings depending on the integration configuration.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can organisations use SucceedLEARN SBCS content in their existing LMS?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Applicable SucceedLEARN SBCS learning content can be delivered through SCORM-compatible packages for organisations using an existing Learning Management System.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does S-Sync support Microsoft and Google environments?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Sync can support integration with commonly used Microsoft and Google workplace environments for relevant authentication and user-management use cases.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does S-Sync provide API integration?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. API-based connectivity can support organisations that require integration between SucceedLEARN and relevant internal or third-party applications.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( "The exact scope depends on the organisation's use case and agreed integration requirements.", 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How does S-Sync reduce security-awareness administration?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'By connecting identity, workforce and learning systems, S-Sync can reduce tasks such as manual account creation, employee-record updates, authentication management and repeated learner-list maintenance.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can S-Sync support employee onboarding and offboarding?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Connected user-management processes can help organisations reflect relevant employee additions, changes and departures more efficiently within the security-awareness environment.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Who is S-Sync designed for?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Sync is designed for organisations that want to integrate security-awareness programmes with existing enterprise systems.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'It can be particularly relevant to IT, Information Security, Identity & Access Management, HR systems, Learning & Development and Compliance teams.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How does S-Sync work with the wider SucceedLEARN SBCS?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'S-Sync provides the Connect layer of SBCS.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( "It helps integrate the technology environment supporting S-Aware, S-Bytes, S-Phish, S-Play, S-Signs and S-Metrics with the organisation's broader enterprise ecosystem.", 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-s-sync-faq',
		'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about S-Sync and enterprise integrations for security awareness.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request Demo', 'akaza-adventure' ),
		'cta_url'       => '#request-demo',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
