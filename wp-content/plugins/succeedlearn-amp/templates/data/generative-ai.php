<?php
/**
 * Responsible Use of Generative AI Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Generative AI section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_gai_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/generative-ai/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_gai_canonical_url() {
	$canonical = home_url( '/responsible-use-of-generative-ai-training/' );
	foreach ( array(
		'responsible-use-of-generative-ai-training',
		'generative-ai-training',
		'generative-ai',
	) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
			$link = get_permalink( $page );
			if ( $link ) {
				return $link;
			}
		}
	}
	return $canonical;
}

/**
 * @return string
 */
function succeedlearn_amp_get_gai_page_title() {
	return __( 'Responsible Use of Generative AI Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_gai_meta_description() {
	return __( 'SucceedLEARN\'s Responsible Use of Generative AI Training gives employees a practical foundation for using GenAI tools with greater awareness, covering capabilities, limitations, information handling, approvals, accuracy, copyright and regulatory variation.', 'succeedlearn-amp' );
}

/**
 * Course topic list items.
 *
 * @return string[]
 */
function succeedlearn_amp_get_gai_topics() {
	return array(
		__( 'The impact of generative AI', 'succeedlearn-amp' ),
		__( 'How generative AI works', 'succeedlearn-amp' ),
		__( 'Applications of generative AI', 'succeedlearn-amp' ),
		__( 'How generative AI creates images', 'succeedlearn-amp' ),
		__( 'AI laws and regulations', 'succeedlearn-amp' ),
		__( 'Understanding a risk-based approach', 'succeedlearn-amp' ),
		__( 'Risks and limitations of generative AI', 'succeedlearn-amp' ),
		__( 'Caution when uploading information or interacting with AI tools', 'succeedlearn-amp' ),
		__( 'Prior approval for system integration', 'succeedlearn-amp' ),
		__( 'The accuracy of AI-generated output', 'succeedlearn-amp' ),
		__( 'Regulatory risks across countries and use cases', 'succeedlearn-amp' ),
		__( 'Copyright considerations', 'succeedlearn-amp' ),
		__( 'AI washing', 'succeedlearn-amp' ),
		__( 'Knowledge checks and a final assessment', 'succeedlearn-amp' ),
	);
}

/**
 * Five principles cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_gai_principles() {
	return array(
		array(
			'title' => __( 'Protect information', 'succeedlearn-amp' ),
			'text'  => __( 'Consider what is being shared before entering content into a generative AI tool.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Seek approval', 'succeedlearn-amp' ),
			'text'  => __( 'Obtain the required approval before integrating AI with organisational systems.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Check the output', 'succeedlearn-amp' ),
			'text'  => __( 'Treat AI-generated responses as material that may require verification and human review.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Consider the context', 'succeedlearn-amp' ),
			'text'  => __( 'Recognise that regulatory expectations can vary by country, industry and use case.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Respect ownership', 'succeedlearn-amp' ),
			'text'  => __( 'Consider copyright and permitted use when creating, adapting or sharing AI-generated material.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Learning outcomes.
 *
 * @return string[]
 */
function succeedlearn_amp_get_gai_outcomes() {
	return array(
		__( 'Describe the impact and common applications of generative AI', 'succeedlearn-amp' ),
		__( 'Outline how generative AI works and creates images', 'succeedlearn-amp' ),
		__( 'Recognise key risks and limitations of GenAI tools', 'succeedlearn-amp' ),
		__( 'Use greater care when uploading information or interacting with AI systems', 'succeedlearn-amp' ),
		__( 'Understand that system integration may require prior approval', 'succeedlearn-amp' ),
		__( 'Recognise that AI-generated output may be inaccurate', 'succeedlearn-amp' ),
		__( 'Consider regulatory variation across countries and use cases', 'succeedlearn-amp' ),
		__( 'Identify relevant copyright considerations', 'succeedlearn-amp' ),
		__( 'Recognise AI washing', 'succeedlearn-amp' ),
		__( 'Apply a risk-based approach to workplace use of generative AI', 'succeedlearn-amp' ),
	);
}

/**
 * Policy moment questions.
 *
 * @return string[]
 */
function succeedlearn_amp_get_gai_policy_questions() {
	return array(
		__( 'Is this information appropriate to upload?', 'succeedlearn-amp' ),
		__( 'Does this use require approval?', 'succeedlearn-amp' ),
		__( 'Has the output been checked?', 'succeedlearn-amp' ),
		__( 'Are copyright or regulatory considerations relevant?', 'succeedlearn-amp' ),
	);
}

/**
 * FAQ items (HTML answers for accordion).
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_gai_faq_items() {
	return array(
		array(
			'question' => __( 'What is responsible use of generative AI training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'It is workplace learning that helps employees understand GenAI capabilities, limitations and risks so they can make more informed choices when using AI tools or their output.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the course require technical knowledge?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'No technical background is assumed. The course introduces how generative AI works and focuses on practical awareness for workplace use.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the course cover AI laws and regulations?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. AI laws and regulations are included as a course topic, together with the principle that regulatory risks may differ by country and use case. The course is not a substitute for legal advice.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the course address confidential or sensitive information?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The course emphasises caution when uploading information or interacting with AI tools. Employees should also follow their organisation\'s policies, approved-tool requirements and information-security procedures.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Why must AI-generated output be checked?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Generative AI does not guarantee accuracy. Human review and verification may be necessary before output is relied upon or shared.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the course cover copyright?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Copyright matters are included in the course.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What is AI washing?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'AI washing is included as a course topic. The training helps learners recognise the importance of accurate and responsible claims about the use or capabilities of AI.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can training replace an organisational AI policy?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'No. Training can support awareness and consistent understanding, but organisations still need appropriate policies, controls, approval processes and role-specific guidance.', 'succeedlearn-amp' ) . '</p>',
		),
	);
}

/**
 * FAQPage JSON-LD for the Generative AI AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_gai_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_gai_faq_items() as $item ) {
		$entities[] = array(
			'@type'          => 'Question',
			'name'           => $item['question'],
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => wp_strip_all_tags( $item['answer'] ),
			),
		);
	}

	return array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => $entities,
	);
}
