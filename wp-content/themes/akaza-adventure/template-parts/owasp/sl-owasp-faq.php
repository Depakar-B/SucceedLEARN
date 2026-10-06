<?php
/**
 * OWASP — FAQ section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is OWASP Top 10 training?', 'akaza-adventure' ),
		'answer'   => __( 'OWASP Top 10 training helps developers and technical teams understand major categories of web application security risk identified by OWASP, how those weaknesses occur and the development practices that can help reduce them.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is this course based on OWASP Top 10:2025?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The program covers the ten categories in the OWASP Top 10:2025 and connects them with secure-development principles and practical prevention guidance.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who should take this OWASP course?', 'akaza-adventure' ),
		'answer'   => __( 'The course is primarily intended for software developers, QA professionals, DevOps and DevSecOps teams, software architects, technical leads, engineering managers and other roles involved in developing or maintaining applications.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is this an employee cybersecurity-awareness course?', 'akaza-adventure' ),
		'answer'   => __( 'This is a more technical program than general employee security-awareness training. It is designed primarily for development and technical teams responsible for applications, software systems and digital products.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is OWASP Top 10 training the same as secure coding training?', 'akaza-adventure' ),
		'answer'   => __( 'Not exactly. OWASP Top 10 training focuses on major application-security risk categories. Secure coding training focuses more broadly on development principles and practices that reduce security weaknesses. This SucceedLEARN program connects both areas by combining OWASP Top 10 learning with foundational secure coding and Secure SDLC concepts.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course include practical examples?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The training uses scenarios, analogies, examples and knowledge checks to help learners understand how application-security weaknesses occur and how they may be prevented.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Are assessments included?', 'akaza-adventure' ),
		'answer'   => __( 'The learning program contains knowledge checks and assessment questions designed to evaluate practical understanding of the security concepts covered.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can the course be delivered through our LMS?', 'akaza-adventure' ),
		'answer'   => __( 'SCORM delivery can be used for organisations that want to deploy the course through a compatible LMS. The course can also be delivered through the SucceedLEARN platform.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'faq',
		'section_class' => 'sl-faq-section--alt sl-owasp-faq',
		'eyebrow'       => __( 'Frequently asked questions', 'akaza-adventure' ),
		'title_html'    => __( 'OWASP Training <span>FAQs</span>', 'akaza-adventure' ),
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
