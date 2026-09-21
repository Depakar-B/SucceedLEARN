<?php
/**
 * US Sexual Harassment Prevention Training — FAQ.
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
		'question' => __( 'Is sexual harassment prevention training mandatory throughout the United States?', 'akaza-adventure' ),
		'answer'   => __( 'There is no single training schedule that applies identically to every private employer nationwide. Federal principles operate alongside state and local mandates. Requirements depend on factors such as work location, employer size, industry and role.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Do all employees take the same U.S. course?', 'akaza-adventure' ),
		'answer'   => __( 'Not necessarily. Nonsupervisory employees and supervisors may need different content or duration. Course assignment should reflect work location and actual responsibilities.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Why is supervisor training different?', 'akaza-adventure' ),
		'answer'   => __( 'Supervisors may receive complaints, make employment decisions, trigger employer responsibilities and need to prevent retaliation. Their training therefore includes escalation, documentation, privacy, investigation support and policy-enforcement responsibilities.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the training cover harassment beyond sexual conduct?', 'akaza-adventure' ),
		'answer'   => __( 'The course addresses sexual harassment and may also cover harassment linked to other protected characteristics, stereotyping, abusive conduct and related workplace expectations, depending on the selected learning path.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can remote employees complete the training online?', 'akaza-adventure' ),
		'answer'   => __( 'Yes, subject to the selected platform and technical configuration. Employers should still verify whether the applicable jurisdiction specifies interactivity, timing, language, accessibility or other delivery standards.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can our policy and reporting information be included?', 'akaza-adventure' ),
		'answer'   => __( 'Customization may include policies, reporting channels, contacts, branding and selected workplace examples, depending on project scope.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does completing the course guarantee legal compliance?', 'akaza-adventure' ),
		'answer'   => __( 'No. Training can support a prevention and compliance program, but it does not replace current legal advice, effective policies, accessible reporting, impartial investigations, corrective action or protection against retaliation.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-faq-section--alt sl-us-harassment-faq',
		'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'numbered'      => true,
		'items'         => $faq_items,
		'schema'        => true,
	)
);
