<?php
/**
 * PE/VC Homepage — FAQ section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is included in the PE/VC Suite?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__(
			'The PE/VC Suite includes Security Awareness Training, Phishing Simulation, Data Privacy, Preventing Sexual Harassment, AML Training, Preventing Facilitation of Tax Evasion, Anti-Bribery and Anti-Corruption, Gifts and Entertainment, Whistleblowing, Political Donations, SMCR Training – Employees and SMCR Training – Senior Managers.',
			'akaza-adventure'
		) . '</p><p>' . esc_html__(
			'Financial Crime Prevention Training is also included, extending coverage across additional financial-crime risks.',
			'akaza-adventure'
		) . '</p>',
	),
	array(
		'question' => __( 'How much does the complete PE/VC Suite cost?', 'akaza-adventure' ),
		'answer'   => wp_kses_post(
			__(
				'The PE/VC Suite is available at <strong>$24 per user, per year</strong>, equivalent to <strong>$2 per user, per month</strong>.',
				'akaza-adventure'
			)
		),
	),
	array(
		'question' => __( 'Is Financial Crime Prevention Training included?', 'akaza-adventure' ),
		'answer'   => __(
			'Yes. Financial Crime Prevention Training is included as part of the wider PE/VC Suite.',
			'akaza-adventure'
		),
	),
	array(
		'question' => __( 'Can different learning be assigned to different teams?', 'akaza-adventure' ),
		'answer'   => __(
			'Yes. Learning can be assigned according to role, team and organisational training requirements.',
			'akaza-adventure'
		),
	),
	array(
		'question' => __( 'Can the content be customised?', 'akaza-adventure' ),
		'answer'   => __(
			'Subject to agreed scope, content can be adapted to reflect terminology, policies, reporting routes and organisational scenarios.',
			'akaza-adventure'
		),
	),
	array(
		'question' => __( 'Can we use the courses in our existing LMS?', 'akaza-adventure' ),
		'answer'   => __(
			'Suitable learning can be supplied as SCORM-compatible content for an appropriate existing LMS.',
			'akaza-adventure'
		),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'faqs',
		'section_class' => 'sl-pevc-faq',
		'eyebrow'       => __( 'Frequently asked questions', 'akaza-adventure' ),
		'title'         => __( 'PE/VC Compliance Training FAQs', 'akaza-adventure' ),
		'description'   => '',
		'items'         => $faq_items,
		'schema'        => true,
	)
);
