<?php
/**
 * GDPR Employee Awareness — FAQ section.
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
		'question' => __( 'Does this cover California or CCPA?', 'akaza-adventure' ),
		'answer'   => __( 'No. It covers EU GDPR only, and that boundary is stated on this page. If CCPA is what you need, this is not your answer, and we would rather say so now than three weeks into your review. If you need another regime, tell us which and we will log it.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does this train our DPO, or is it practitioner level?', 'akaza-adventure' ),
		'answer'   => __( 'No. It is awareness training for every employee. It gives your workforce a defensible baseline and gives you the completion evidence. It supports a DPO\'s expertise, it does not replace it.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How long does it actually take?', 'akaza-adventure' ),
		'answer'   => __( 'Thirty minutes, self paced, the same length as our DPDPA course. Assessments and engaging questions are built into the course as you go, not saved for a single quiz at the end.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'We already have GDPR training. What\'s different here?', 'akaza-adventure' ),
		'answer'   => __( 'A completion and evidence layer built for accountability, and a module on lawful outreach across the EU that most awareness courses leave out. If your current training cannot produce a clean, exportable record, that alone is worth a preview.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'We\'re not based in the EU. Does GDPR apply to us?', 'akaza-adventure' ),
		'answer'   => __( 'It can. GDPR follows EU personal data, not your address. If you have EU customers, EU staff, or teams contacting people in Europe, it reaches you, and customer contracts often require documented training regardless.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How does it fit our systems?', 'akaza-adventure' ),
		'answer'   => __( 'SCORM or LTI for your existing LMS, or our hosted LMS with branded portals, SSO and HRIS, dashboards, and an Android app.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-faq-section--alt sl-gdpr-faq',
		'eyebrow'       => __( 'Straight answers', 'akaza-adventure' ),
		'title'         => __( 'Frequently asked questions', 'akaza-adventure' ),
		'numbered'      => true,
		'items'         => $faq_items,
		'schema'        => true,
	)
);
