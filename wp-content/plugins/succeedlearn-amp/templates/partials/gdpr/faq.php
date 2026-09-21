<?php
/**
 * GDPR Employee Awareness Training AMP — FAQ section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'Does this cover California or CCPA?', 'succeedlearn-amp' ),
		'answer'   => __( 'No. It covers EU GDPR only, and that boundary is stated on this page. If CCPA is what you need, this is not your answer, and we would rather say so now than three weeks into your review. If you need another regime, tell us which and we will log it.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Does this train our DPO, or is it practitioner level?', 'succeedlearn-amp' ),
		'answer'   => __( 'No. It is awareness training for every employee. It gives your workforce a defensible baseline and gives you the completion evidence. It supports a DPO\'s expertise, it does not replace it.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'How long does it actually take?', 'succeedlearn-amp' ),
		'answer'   => __( 'Thirty minutes, self paced, the same length as our DPDPA course. Assessments and engaging questions are built into the course as you go, not saved for a single quiz at the end.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'We already have GDPR training. What\'s different here?', 'succeedlearn-amp' ),
		'answer'   => __( 'A completion and evidence layer built for accountability, and a module on lawful outreach across the EU that most awareness courses leave out. If your current training cannot produce a clean, exportable record, that alone is worth a preview.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'We\'re not based in the EU. Does GDPR apply to us?', 'succeedlearn-amp' ),
		'answer'   => __( 'It can. GDPR follows EU personal data, not your address. If you have EU customers, EU staff, or teams contacting people in Europe, it reaches you, and customer contracts often require documented training regardless.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'How does it fit our systems?', 'succeedlearn-amp' ),
		'answer'   => __( 'SCORM or LTI for your existing LMS, or our hosted LMS with branded portals, SSO and HRIS, dashboards, and an Android app.', 'succeedlearn-amp' ),
	),
);
?>
<section
	class="sl-section sl-gdpr-faq"
	id="frequently-asked-questions"
	aria-labelledby="sl-gdpr-faq-title"
>
	<div class="sl-wrap">
		<span class="sl-home-sub-heading"><?php esc_html_e( 'Straight answers', 'succeedlearn-amp' ); ?></span>
		<h2 id="sl-gdpr-faq-title" class="sl-h2">
			<?php echo wp_kses_post( __( 'Frequently asked <span>questions</span>', 'succeedlearn-amp' ) ); ?>
		</h2>
		<p class="sl-lead">
			<?php
			esc_html_e(
				'Clear answers on scope, audience, duration, delivery, and how this course differs from generic GDPR awareness training.',
				'succeedlearn-amp'
			);
			?>
		</p>
		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>
	</div>
</section>
