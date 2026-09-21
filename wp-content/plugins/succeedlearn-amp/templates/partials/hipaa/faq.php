<?php
/**
 * HIPAA Annual Workforce Training AMP — Faq section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'Is HIPAA training required annually?', 'succeedlearn-amp' ),
		'answer'   => __( 'HIPAA requires training for all workforce members on privacy policies and procedures, and periodically thereafter, but it does not name a fixed interval. In practice, most covered entities and business associates run it annually plus at onboarding because that is the cadence auditors and clients expect to see documented.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'How quickly can we roll this out?', 'succeedlearn-amp' ),
		'answer'   => __( 'If you have your own LMS, the SCORM package can be installed the same day you receive it. If we host it, we can typically have your branded portal live and learners invited within a few working days of receiving your staff list.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'What records do we get for an audit?', 'succeedlearn-amp' ),
		'answer'   => __( 'You receive a dated completion certificate for every learner, plus exportable completion reports by department, manager or individual in Excel and PDF. That is the documentation you produce when a regulator, an auditor or a covered entity client asks whether your workforce was trained.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Will our staff actually finish it?', 'succeedlearn-amp' ),
		'answer'   => __( 'Across our compliance courses, we see a 95 percent completion rate. The course is scenario-led rather than narrated slides, and automated reminders follow up with incomplete learners so your team does not have to do it manually.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Who needs HIPAA training in an organization?', 'succeedlearn-amp' ),
		'answer'   => __( 'Every workforce member who could come into contact with protected health information. That includes clinical staff, front desk and scheduling teams, billing, IT, facilities staff with ward access and contractors. Business associates and their staff need it too, not only covered entities.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Do business associates need HIPAA training?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. Business associates are directly liable under HIPAA for certain requirements, and covered entities routinely require evidence of workforce training in the business associate agreement. This course covers the distinction and what each party is responsible for.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'What happens if staff are not trained on HIPAA?', 'succeedlearn-amp' ),
		'answer'   => __( 'Civil monetary penalties are tiered by culpability, from unknowing violations through willful neglect, with substantially higher penalties where an organization knew or should have known. Absence of documented training is a common finding in enforcement actions because it can point towards willful neglect.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'How much does HIPAA training cost per employee?', 'succeedlearn-amp' ),
		'answer'   => __( 'This course is $20 per seat per year, dropping to $16 above 100 seats and $13 above 500 seats. Published industry benchmarks put ongoing annual HIPAA training at approximately $50 to $100 per employee.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Is this advanced training for privacy officers?', 'succeedlearn-amp' ),
		'answer'   => __( 'No. This is workforce awareness training for everyone who handles PHI. It gives your staff a defensible baseline and gives you the completion evidence. Privacy and security officers will typically need deeper role-specific training in addition, and we would rather explain that now than have you discover it during a review.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can we see the course before committing?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. Request a demo and we will walk you through the full course, show you a sample certificate and completion report, and provide the SCORM details for your environment. There is no obligation and no pressure.', 'succeedlearn-amp' ),
	),
);
?>
<section class="sl-section">
	<div class="sl-wrap">
		<p class="sl-eyebrow"><?php esc_html_e( 'Questions buyers ask', 'succeedlearn-amp' ); ?></p>
		<h2 class="sl-h2"><?php esc_html_e( 'Frequently asked questions.', 'succeedlearn-amp' ); ?></h2>
		<p class="sl-lead"><?php esc_html_e( 'Clear answers about requirements, rollout, audit records, course scope and pricing.', 'succeedlearn-amp' ); ?></p>
		<?php succeedlearn_amp_render_faq_accordion( $faq_items ); ?>
		<p style="margin-top:18px">
			<button
				type="button"
				class="sl-btn sl-btn--secondary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request a demo', 'succeedlearn-amp' ); ?>
			</button>
		</p>
	</div>
</section>
