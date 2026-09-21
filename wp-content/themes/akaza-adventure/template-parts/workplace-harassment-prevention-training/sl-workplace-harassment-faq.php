<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * FAQ section
 *
 * Uses the global SucceedLEARN FAQ component.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'Is workplace harassment prevention training legally required?', 'akaza-adventure' ),
		'answer'   => __( 'Requirements depend on the employee’s location, employer size, industry and role. Certain US states and cities prescribe training. India’s POSH framework requires regular awareness programmes and orientation for Internal Committee members. UK employers have a positive duty to take reasonable steps to prevent sexual harassment, although the law does not prescribe one universal course duration for every employer.', 'akaza-adventure' ),
	),

	array(
		'question' => __( 'Can one global course satisfy every country’s legal requirements?', 'akaza-adventure' ),
		'answer'   => __( 'No single course should automatically be assumed to satisfy every national, state or local requirement. A global course can create a shared foundation, while regional modules provide more specific legal and procedural context.', 'akaza-adventure' ),
	),

	array(
		'question' => __( 'Can the courses include our policy and reporting information?', 'akaza-adventure' ),
		'answer'   => __( 'Customisation may include organisational branding, relevant policy information, reporting routes, HR contacts and India Internal Committee details, depending on the selected course and scope.', 'akaza-adventure' ),
	),

	array(
		'question' => __( 'Can employees complete the training on mobile devices?', 'akaza-adventure' ),
		'answer'   => __( 'The courses can be delivered for supported mobile and desktop access, subject to the selected platform, course format and technical configuration.', 'akaza-adventure' ),
	),

	array(
		'question' => __( 'Can the training be deployed through our LMS?', 'akaza-adventure' ),
		'answer'   => __( 'SCORM-compatible delivery can be discussed for organisations that want to deploy content through an existing LMS. Hosted delivery through the SucceedLEARN platform is also available.', 'akaza-adventure' ),
	),

	array(
		'question' => __( 'Does course completion guarantee legal compliance?', 'akaza-adventure' ),
		'answer'   => __( 'No. Training can support an organisation’s compliance and prevention programme, but it does not replace legal advice, appropriate policies, reporting systems, risk assessment, properly conducted investigations or corrective action.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-workplace-harassment-faq',
		'eyebrow'       => __( 'FAQ', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked Questions About <span>Workplace Harassment Prevention</span>', 'akaza-adventure' ),
		'description'   => __( 'Find answers to common questions about workplace harassment prevention training, regional requirements, delivery and course selection.', 'akaza-adventure' ),
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);