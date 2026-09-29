<?php
/**
 * ISO 27001:2022 Staff Awareness Training — FAQ.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is ISO 27001:2022?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'ISO/IEC 27001:2022 is the international standard specifying requirements for an Information Security Management System (ISMS). It provides a framework for organizations to manage information security risks and continually improve how information is protected.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What is ISO 27001 awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'ISO 27001 awareness training helps employees understand information security, their organisation’s ISMS and the responsibilities they have for protecting information and supporting information security objectives.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What is ISO 27001:2022 Annex A Control 6.3?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Annex A Control 6.3 concerns Information Security Awareness, Education and Training and addresses appropriate awareness and training for personnel and relevant interested parties according to their roles.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Who should take ISO 27001 staff awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Training can be relevant to employees, managers, contractors, new joiners, and others whose work involves organizational information, systems, or information assets. The appropriate training should reflect their responsibilities and the organization’s requirements.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What is an ISMS?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'An Information Security Management System is the framework an organization uses to systematically manage information security risks through policies, processes, responsibilities, controls and continual improvement.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What does the CIA triad mean?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The CIA triad represents Confidentiality, Integrity and Availability — three foundational principles used when considering the protection of information.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What changed between ISO 27001:2013 and ISO 27001:2022?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Among other changes, the 2022 edition reorganised Annex A from 114 controls across 14 categories to 93 controls grouped into Organisational, People, Physical and Technological themes.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does completing this course make an organization ISO 27001 certified?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'No. Employee awareness training can support an organization’s ISO 27001 programme, but completing a training course alone does not establish ISO 27001 certification.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the course include an assessment?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. The existing SucceedLEARN course includes knowledge checks and a final assessment.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can the ISO 27001 training be customized?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Based on the agreed customization scope, training can be adapted to reflect relevant organizational branding, policies, terminology, processes, and reporting mechanisms.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can we deliver the ISO 27001 course through our own LMS?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. SucceedLEARN currently offers SCORM delivery for organisations using their own LMS as well as SaaS-based delivery.', 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-iso27-faq',
		'eyebrow'       => __( 'FAQ', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about SucceedLEARN’s ISO 27001:2022 Staff Awareness Training.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request a Demo', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
