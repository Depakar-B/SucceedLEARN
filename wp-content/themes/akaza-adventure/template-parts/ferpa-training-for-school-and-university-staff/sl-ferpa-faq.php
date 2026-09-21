<?php
/**
 * SucceedLEARN — FERPA Staff Awareness
 *
 * Section: Frequently Asked Questions
 * Uses the shared global FAQ component (global-faq.css / global-faq.js).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'Who needs FERPA training in a school or district?', 'akaza-adventure' ),
		'answer'   => __( 'Anyone with access to student education records. That includes teachers and faculty, registrars and admissions, counsellors, front office and administrative staff, coaches, IT staff who administer student information systems, and contractors acting as school officials.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is FERPA training required by law?', 'akaza-adventure' ),
		'answer'   => __( 'FERPA does not mandate a specific training programme. It does require institutions receiving federal education funding to protect education records and to notify parents and eligible students of their rights annually. Documented staff training is the practical way institutions demonstrate they are meeting that obligation, and it is what reviewers ask to see.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is the difference between FERPA for K-12 and higher education?', 'akaza-adventure' ),
		'answer'   => __( 'The law is the same, but who holds the rights differs. In K-12 the rights generally sit with parents. Once a student turns 18 or enrols in a postsecondary institution, the rights transfer to the student, who becomes an eligible student. This course teaches both paths and branches by learner so each person sees the situation that applies to them.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What counts as an education record under FERPA?', 'akaza-adventure' ),
		'answer'   => __( 'Records directly related to a student and maintained by the institution or a party acting for it. That covers grades, transcripts, disciplinary files, class schedules and much of what sits in a student information system. Some categories, such as certain law enforcement and sole possession records, sit outside the definition, and the course covers which.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How much does FERPA training cost per employee?', 'akaza-adventure' ),
		'answer'   => __( 'This course is $20 per seat per year, dropping to $16 above 100 seats and $13 above 500. Comparable published options include per-learner rates around $110 and annual site subscriptions in the hundreds of dollars, though most providers require an enquiry before quoting.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course work with our LMS?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. It ships as a SCORM package that installs in Canvas, Moodle, Blackboard or any SCORM-compliant system, or we host it with completion dashboards and automated reminders so your team is not chasing people manually.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Do staff receive a certificate?', 'akaza-adventure' ),
		'answer'   => __( 'Yes, a dated completion certificate per learner, plus an exportable completion record for your institutional compliance file.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can we assign it only to certain departments?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. You can assign by department, role or campus, and report on completion the same way, which is useful when the registrar\'s office needs a different cadence to general faculty.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-faq-section--alt sl-ferpa-faq',
		'eyebrow'       => __( 'Questions buyers ask', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently <span>asked questions</span>', 'akaza-adventure' ),
		'numbered'      => true,
		'items'         => $faq_items,
		'schema'        => true,
	)
);
