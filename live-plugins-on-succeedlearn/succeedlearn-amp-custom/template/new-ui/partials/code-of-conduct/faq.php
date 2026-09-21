<?php
/**
 * Code of Conduct AMP — Faq section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is Code of Conduct training?', 'succeedlearn-amp' ),
		'answer'   => __( 'Code of Conduct training helps employees understand the ethical standards, workplace behaviours and compliance responsibilities expected by their organization and how those principles apply in practical workplace situations.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Why is Code of Conduct training important?', 'succeedlearn-amp' ),
		'answer'   => __( 'It helps bridge the gap between having a written policy and employees understanding how to apply it when ethical or compliance issues arise.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Who should complete Code of Conduct training?', 'succeedlearn-amp' ),
		'answer'   => __( 'Training is generally suitable for employees across levels and can also be adapted for managers, leadership, contractors and relevant third parties.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can the course be customized to our Code of Conduct?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. The training can be customized around your policies, branding, reporting channels, examples, scenarios and other organization-specific requirements.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can we add our organization\'s policies?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. Relevant policies and procedures can be incorporated or referenced within the training.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can we host the course on our LMS?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. Supported SCORM packages can be deployed through compatible Learning Management Systems.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'What happens if we don\'t have an LMS?', 'succeedlearn-amp' ),
		'answer'   => __( 'The training can be delivered through SucceedLEARN\'s hosted learning environment.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Does the course include assessments?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. Assessments and knowledge checks can be incorporated to measure learner understanding.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can employees acknowledge our Code of Conduct?', 'succeedlearn-amp' ),
		'answer'   => __( 'Policy acknowledgement can be incorporated depending on programme requirements and deployment configuration.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Is multilingual Code of Conduct training available?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. Multilingual versions can be developed based on your workforce and project requirements.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can different employees receive different versions?', 'succeedlearn-amp' ),
		'answer'   => __( 'Role-based or audience-specific versions can be created where different employee groups require different learning content.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'How long does Code of Conduct training take?', 'succeedlearn-amp' ),
		'answer'   => __( 'Course duration depends on the modules, level of customization and learning experience selected. The programme can be structured to balance comprehensive coverage with employee engagement.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'How often should employees receive Code of Conduct training?', 'succeedlearn-amp' ),
		'answer'   => __( 'Many organizations include Code of Conduct training during onboarding and provide periodic refresher training. The appropriate frequency should reflect organizational policies, regulatory expectations and risk profile.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'What reporting is available?', 'succeedlearn-amp' ),
		'answer'   => __( 'Depending on deployment, organizations can track assignments, progress, completion, assessment performance and other programme metrics.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can we update the course when our Code changes?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. The course can be updated when organizational policies, reporting channels or compliance requirements change.', 'succeedlearn-amp' ),
	),
);
?>
<section class="sl-section sl-faq-section sl-faq-section--alt sl-coc-faq" id="frequently-asked-questions" aria-labelledby="sl-coc-faq-title">
	<div class="sl-wrap">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'FAQ', 'succeedlearn-amp' ); ?>
		</span>
		<h2 class="sl-h2" id="sl-coc-faq-title">
			<?php echo wp_kses_post( __( 'Frequently Asked Questions About <span>Code of Conduct Training</span>', 'succeedlearn-amp' ) ); ?>
		</h2>
		<?php succeedlearn_amp_render_faq_accordion( $faq_items, 'sl-coc-faq__list' ); ?>
	</div>
</section>
