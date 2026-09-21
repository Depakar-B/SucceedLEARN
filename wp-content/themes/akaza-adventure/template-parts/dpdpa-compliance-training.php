<?php
/**
 * DPDPA Compliance Training page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$dpdpa_faq_items = array(
	array(
		'question' => 'Is DPDPA training mandatory for employees in India?',
		'answer'   => 'The Act does not name employee training as a separate mandatory line item. It does require organisations to apply reasonable security safeguards and to be accountable for how personal data is handled. Since most incidents involve an employee action rather than a system failure, awareness training is one of the most direct ways to support that obligation, and to evidence it later.',
	),
	array(
		'question' => 'How much does DPDPA training cost per employee?',
		'answer'   => 'Pricing starts from ₹250 per employee per year, with volume rates above 1,000 employees and bundle pricing alongside our POSH programmes. A 1,000 person workforce works out to roughly ₹2,50,000 a year. Use the calculator above for an indicative figure, or request a demo for an exact quote.',
	),
	array(
		'question' => 'Does the DPDPA apply to employee data and HR records?',
		'answer'   => 'Yes. Employee names, contact details, attendance records, salary information, bank details, identity documents, performance records, health related documents and disciplinary records can all be personal data under the DPDPA, and should be accessed only by authorised persons. HR teams typically hold one of the densest concentrations of personal data in any organisation.',
	),
	array(
		'question' => 'What is the DPDPA compliance deadline for companies?',
		'answer'   => 'Full compliance obligations, including consent, notice and Data Principal rights, take effect on 13 May 2027. A separate, earlier date in November 2026 relates to Consent Manager registration, a different framework for registered platform businesses that does not apply to most organisations training their employees. Rolling out training across a workforce typically takes three to six months once procurement and integration are included.',
	),
	array(
		'question' => 'What are the penalties for DPDPA non-compliance?',
		'answer'   => 'Depending on the violation, penalties may go up to ₹250 crore for certain failures, such as failure to take reasonable security safeguards to prevent a personal data breach.',
	),
	array(
		'question' => 'How long is the DPDPA employee awareness course?',
		'answer'   => '25 minutes, self paced. Knowledge checks are built in throughout, plus a final assessment of 5 questions with a minimum of 4 correct required to pass. A certificate is issued automatically on completion.',
	),
	array(
		'question' => 'Can we host the DPDPA course on our own LMS?',
		'answer'   => 'Yes. Take a SCORM package for your existing LMS, use LTI, or run it on our hosted SaaS platform with a branded portal, SSO and HRIS integration, completion dashboards and automated reminders.',
	),
	array(
		'question' => 'Does this train our DPO, or is it practitioner level?',
		'answer'   => 'No. It is all-employee awareness training. It gives your workforce a defensible baseline and gives you the completion evidence. It supports a DPO\'s expertise, it does not replace it.',
	),
	array(
		'question' => 'What is the difference between DPDPA and GDPR employee training?',
		'answer'   => 'The DPDPA governs digital personal data in India, GDPR governs personal data of people in the EU. Organisations with both Indian operations and EU exposure typically need both. We run a separate GDPR employee awareness course for that.',
	),
);
?>
<main id="main-content" class="sl-training-page sl-dpdpa-page">
	<?php get_template_part( 'template-parts/dpdpa-compliance-training/hero' ); ?>
	<?php get_template_part( 'template-parts/dpdpa-compliance-training/sl-dpdpa-trusted' ); ?>
	<?php get_template_part( 'template-parts/dpdpa-compliance-training/sl-dpdpa-breach-scenario' ); ?>
	<?php get_template_part( 'template-parts/dpdpa-compliance-training/sl-dpdpa-course-coverage' ); ?>
	<?php get_template_part( 'template-parts/dpdpa-compliance-training/sl-dpdpa-learning' ); ?>
	<?php get_template_part( 'template-parts/dpdpa-compliance-training/pricing' ); ?>
	<?php get_template_part( 'template-parts/dpdpa-compliance-training/scorecard-cta' ); ?>
	<?php get_template_part( 'template-parts/dpdpa-compliance-training/training-records' ); ?>
	<?php get_template_part( 'template-parts/dpdpa-compliance-training/format-delivery' ); ?>
	<?php
	get_template_part(
		'template-parts/global/faq',
		null,
		array(
			'eyebrow'     => 'Questions',
			'title_html'  => 'DPDPA Compliance <span>Training FAQs</span>',
			'description' => 'Explore key answers on DPDPA obligations, employee awareness, data protection duties, and training rollout.',
			'items'       => $dpdpa_faq_items,
		)
	);
	?>
	<?php get_template_part( 'template-parts/dpdpa-compliance-training/contact' ); ?>
</main>
