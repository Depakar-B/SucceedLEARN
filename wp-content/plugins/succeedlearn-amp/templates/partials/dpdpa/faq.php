<?php
/**
 * DPDPA Compliance Training AMP — Faq section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'Is DPDPA training mandatory for employees in India?', 'succeedlearn-amp' ),
		'answer'   => __( 'The Act does not name employee training as a separate mandatory line item. It does require organisations to apply reasonable security safeguards and to be accountable for how personal data is handled. Since most incidents involve an employee action rather than a system failure, awareness training is one of the most direct ways to support that obligation, and to evidence it later.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'How much does DPDPA training cost per employee?', 'succeedlearn-amp' ),
		'answer'   => __( 'Pricing starts from ₹250 per employee per year, with volume rates above 1,000 employees and bundle pricing alongside our POSH programmes. A 1,000 person workforce works out to roughly ₹2,50,000 a year. Use the calculator above for an indicative figure, or request a demo for an exact quote.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Does the DPDPA apply to employee data and HR records?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. Employee names, contact details, attendance records, salary information, bank details, identity documents, performance records, health related documents and disciplinary records can all be personal data under the DPDPA, and should be accessed only by authorised persons. HR teams typically hold one of the densest concentrations of personal data in any organisation.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'What is the DPDPA compliance deadline for companies?', 'succeedlearn-amp' ),
		'answer'   => __( 'Full compliance obligations, including consent, notice and Data Principal rights, take effect on 13 May 2027. A separate, earlier date in November 2026 relates to Consent Manager registration, a different framework for registered platform businesses that does not apply to most organisations training their employees. Rolling out training across a workforce typically takes three to six months once procurement and integration are included.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'What are the penalties for DPDPA non-compliance?', 'succeedlearn-amp' ),
		'answer'   => __( 'Depending on the violation, penalties may go up to ₹250 crore for certain failures, such as failure to take reasonable security safeguards to prevent a personal data breach.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'How long is the DPDPA employee awareness course?', 'succeedlearn-amp' ),
		'answer'   => __( '25 minutes, self paced. Knowledge checks are built in throughout, plus a final assessment of 5 questions with a minimum of 4 correct required to pass. A certificate is issued automatically on completion.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can we host the DPDPA course on our own LMS?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. Take a SCORM package for your existing LMS, use LTI, or run it on our hosted SaaS platform with a branded portal, SSO and HRIS integration, completion dashboards and automated reminders.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Does this train our DPO, or is it practitioner level?', 'succeedlearn-amp' ),
		'answer'   => __( 'No. It is all-employee awareness training. It gives your workforce a defensible baseline and gives you the completion evidence. It supports a DPO\'s expertise, it does not replace it.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'What is the difference between DPDPA and GDPR employee training?', 'succeedlearn-amp' ),
		'answer'   => __( 'The DPDPA governs digital personal data in India, GDPR governs personal data of people in the EU. Organisations with both Indian operations and EU exposure typically need both. We run a separate GDPR employee awareness course for that.', 'succeedlearn-amp' ),
	),
);
?>
<section class="sl-section">
	<div class="sl-wrap">
		<p class="sl-eyebrow"><?php esc_html_e( 'Questions', 'succeedlearn-amp' ); ?></p>
		<h2 class="sl-h2">
			<?php echo wp_kses_post( __( 'DPDPA Compliance <span>Training FAQs</span>', 'succeedlearn-amp' ) ); ?>
		</h2>
		<p class="sl-lead"><?php esc_html_e( 'Explore key answers on DPDPA obligations, employee awareness, data protection duties, and training rollout.', 'succeedlearn-amp' ); ?></p>
		<?php succeedlearn_amp_render_faq_accordion( $faq_items ); ?>
	</div>
</section>
