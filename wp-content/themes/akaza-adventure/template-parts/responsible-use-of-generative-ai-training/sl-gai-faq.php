<?php
/**
 * Responsible Use of Generative AI Training - FAQ.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is responsible use of generative AI training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'It is workplace learning that helps employees understand GenAI capabilities, limitations and risks so they can make more informed choices when using AI tools or their output.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the course require technical knowledge?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'No technical background is assumed. The course introduces how generative AI works and focuses on practical awareness for workplace use.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the course cover AI laws and regulations?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. AI laws and regulations are included as a course topic, together with the principle that regulatory risks may differ by country and use case. The course is not a substitute for legal advice.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the course address confidential or sensitive information?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The course emphasises caution when uploading information or interacting with AI tools. Employees should also follow their organisation’s policies, approved-tool requirements and information-security procedures.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Why must AI-generated output be checked?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Generative AI does not guarantee accuracy. Human review and verification may be necessary before output is relied upon or shared.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the course cover copyright?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Copyright matters are included in the course.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What is AI washing?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'AI washing is included as a course topic. The training helps learners recognise the importance of accurate and responsible claims about the use or capabilities of AI.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can training replace an organisational AI policy?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'No. Training can support awareness and consistent understanding, but organisations still need appropriate policies, controls, approval processes and role-specific guidance.', 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-gai-faq',
		'eyebrow'       => __( 'FAQ', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'cta_text'      => __( 'Request a Demo', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
