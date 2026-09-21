<?php
/**
 * Inclusive Workplace Training — FAQ section.
 *
 * Uses the global FAQ markup and styles (global-faq.css).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is inclusive workplace training?', 'akaza-adventure' ),
		'answer'   => __( 'Inclusive workplace training helps employees understand and respond to issues that can affect fair treatment, dignity, participation and respect at work. SucceedLearn’s Inclusive Workplace category includes separate courses on Equality, Diversity and Inclusion, Unconscious Bias and Bystander Intervention.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Are the three courses one combined programme?', 'akaza-adventure' ),
		'answer'   => __( 'No. They are three independent e-learning modules grouped under the Inclusive Workplace category. Each course has its own subject, objectives and content.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Do employees need to take all three courses?', 'akaza-adventure' ),
		'answer'   => __( 'No. Organisations can select the individual course that best matches their learning requirement. The modules do not need to be completed together or in a particular order.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who should take Equality, Diversity and Inclusion Training?', 'akaza-adventure' ),
		'answer'   => __( 'The course is suitable for employees and managers who need to understand equality, discrimination, global legal context, complaint routes and inclusive workplace behaviour.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who should take Unconscious Bias Training?', 'akaza-adventure' ),
		'answer'   => __( 'Unconscious Bias Training is relevant to employees at every level. It can be particularly valuable for people involved in recruitment, performance reviews, promotions, work allocation and other decisions affecting colleagues.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What does Bystander Intervention Training focus on?', 'akaza-adventure' ),
		'answer'   => __( 'The course focuses on recognising and responding to workplace sexual harassment. It also covers gender identity and gender expression, the bystander effect and four intervention methods: Distract, Direct, Delegate and Delay.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can our workplace policies be incorporated?', 'akaza-adventure' ),
		'answer'   => __( 'Customisation options may include relevant policies, reporting routes, organisational terminology, HR contacts, branding and workplace examples. Speak with SucceedLearn about the requirements for your selected course.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is the training appropriate for international organisations?', 'akaza-adventure' ),
		'answer'   => __( 'The Inclusive Workplace category sits within the Global HR Compliance Suite. The Equality, Diversity and Inclusion course introduces legal frameworks from several global jurisdictions. Organisations should confirm the suitability of any course for their workforce and applicable requirements.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does completing a course guarantee legal compliance?', 'akaza-adventure' ),
		'answer'   => __( 'No. Training can support a wider compliance and workplace-culture programme, but it does not replace jurisdiction-specific legal advice, effective policies, appropriate reporting channels, investigations or consistent management action.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'section_class' => 'sl-faq-section--alt',
		'eyebrow'       => __( 'FAQ', 'akaza-adventure' ),
		'title'         => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'items'         => $faq_items,
	)
);
