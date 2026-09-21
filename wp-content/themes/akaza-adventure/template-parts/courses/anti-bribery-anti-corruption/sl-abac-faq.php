<?php
/**
 * ABAC Frequently Asked Questions.
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
        'question' => __( 'What does ABAC mean?', 'akaza-adventure' ),
        'answer'   => __( 'ABAC means Anti-Bribery and Anti-Corruption. It covers the rules, controls and behaviours used to prevent improper influence in business and public-sector dealings.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'What is Anti-Bribery and Anti-Corruption training?', 'akaza-adventure' ),
        'answer'   => __( 'It is workplace training that helps employees recognise, prevent and report bribery and corruption risks in everyday business decisions.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'Who should take an ABAC course?', 'akaza-adventure' ),
        'answer'   => __( 'Employees, managers and relevant contractors should take it, especially anyone dealing with suppliers, customers, agents, expenses, gifts, hospitality or public officials.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'What laws does the UK ABAC course cover?', 'akaza-adventure' ),
        'answer'   => __( 'The UK ABAC course covers the UK Bribery Act 2010 (BA 2010) and introduces the US Foreign Corrupt Practices Act (FCPA) for international business context.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'What topics are included in ABAC training?', 'akaza-adventure' ),
        'answer'   => __( 'The course covers gifts and hospitality, third parties, travel and entertainment, charitable donations, facilitation payments, nepotism, cronyism, approvals and reporting.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'Are all gifts and hospitality prohibited?', 'akaza-adventure' ),
		'answer'   => __( 'No. Genuine, proportionate and transparent business hospitality may be permitted, subject to applicable law and the organisation\'s approval and record-keeping rules.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'Is this ABAC course CPD certified?', 'akaza-adventure' ),
        'answer'   => __( 'Yes. The UK ABAC course is CPD certified.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'How long does the ABAC course take?', 'akaza-adventure' ),
        'answer'   => __( 'The course takes approximately 30 minutes and includes practical scenarios, knowledge checks and a final assessment.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'How is the course delivered?', 'akaza-adventure' ),
        'answer'   => __( 'It can be delivered through the SucceedLEARN SaaS platform or as a SCORM package for a compatible learning management system.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'Can the ABAC course be customised?', 'akaza-adventure' ),
        'answer'   => __( 'Yes. Policy wording, reporting routes, gift limits, branding, jurisdictions and workplace scenarios can be tailored to the organisation’s needs. ABAC forms part of a wider customisable course range.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'What is the FCPA?', 'akaza-adventure' ),
        'answer'   => __( 'The Foreign Corrupt Practices Act is a US law addressing bribery of foreign officials. It also sets accounting requirements for issuers. FCPA content is included in the UK ABAC course.', 'akaza-adventure' ),
    ),

    array(
        'question' => __( 'Which law does India ABAC training cover?', 'akaza-adventure' ),
        'answer'   => __( 'The India-focused course covers the Prevention of Corruption Act 1988, including the 2018 amendments, with scenarios involving public servants, undue advantages and business conduct.', 'akaza-adventure' ),
    ),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'faqs',
		'section_class' => 'sl-abac-faq',
		'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'title_html'    => __( 'Anti-bribery training FAQs: <span>UK Bribery Act, FCPA and India ABAC</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about ABAC training, course content, legal context, delivery and customisation.', 'akaza-adventure' ),
		'cta_text'      => __( 'Speak to a specialist', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);