<?php
/**
 * Code of Conduct — FAQ section.
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
		'question' => __( 'What is Code of Conduct training?', 'akaza-adventure' ),
		'answer'   => __( 'Code of Conduct training helps employees understand the ethical standards, workplace behaviours and compliance responsibilities expected by their organization and how those principles apply in practical workplace situations.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Why is Code of Conduct training important?', 'akaza-adventure' ),
		'answer'   => __( 'It helps bridge the gap between having a written policy and employees understanding how to apply it when ethical or compliance issues arise.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who should complete Code of Conduct training?', 'akaza-adventure' ),
		'answer'   => __( 'Training is generally suitable for employees across levels and can also be adapted for managers, leadership, contractors and relevant third parties.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can the course be customized to our Code of Conduct?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The training can be customized around your policies, branding, reporting channels, examples, scenarios and other organization-specific requirements.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can we add our organization\'s policies?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Relevant policies and procedures can be incorporated or referenced within the training.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can we host the course on our LMS?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Supported SCORM packages can be deployed through compatible Learning Management Systems.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What happens if we don\'t have an LMS?', 'akaza-adventure' ),
		'answer'   => __( 'The training can be delivered through SucceedLEARN\'s hosted learning environment.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the course include assessments?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Assessments and knowledge checks can be incorporated to measure learner understanding.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can employees acknowledge our Code of Conduct?', 'akaza-adventure' ),
		'answer'   => __( 'Policy acknowledgement can be incorporated depending on programme requirements and deployment configuration.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is multilingual Code of Conduct training available?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Multilingual versions can be developed based on your workforce and project requirements.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can different employees receive different versions?', 'akaza-adventure' ),
		'answer'   => __( 'Role-based or audience-specific versions can be created where different employee groups require different learning content.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How long does Code of Conduct training take?', 'akaza-adventure' ),
		'answer'   => __( 'Course duration depends on the modules, level of customization and learning experience selected. The programme can be structured to balance comprehensive coverage with employee engagement.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How often should employees receive Code of Conduct training?', 'akaza-adventure' ),
		'answer'   => __( 'Many organizations include Code of Conduct training during onboarding and provide periodic refresher training. The appropriate frequency should reflect organizational policies, regulatory expectations and risk profile.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What reporting is available?', 'akaza-adventure' ),
		'answer'   => __( 'Depending on deployment, organizations can track assignments, progress, completion, assessment performance and other programme metrics.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can we update the course when our Code changes?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course can be updated when organizational policies, reporting channels or compliance requirements change.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-faq-section--alt sl-coc-faq',
		'eyebrow'       => __( 'FAQ', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked Questions About <span>Code of Conduct Training</span>', 'akaza-adventure' ),
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
