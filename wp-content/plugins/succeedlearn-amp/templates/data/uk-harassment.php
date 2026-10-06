<?php
/**
 * UK Sexual Harassment Prevention Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a UK harassment section partial.
 *
 * @param string               $name Partial basename without .php.
 * @param array<string, mixed> $args Optional vars extracted into the partial scope.
 */
function succeedlearn_amp_uk_harassment_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/uk-harassment/' . sanitize_file_name( (string) $name ) . '.php';
	if ( ! is_readable( $path ) ) {
		return;
	}

	if ( ! empty( $args ) && is_array( $args ) ) {
		// phpcs:ignore WordPress.PHP.DontExtract.extract_extract -- scoped vars for AMP partials.
		extract( $args, EXTR_SKIP );
	}

	include $path;
}

/**
 * Canonical URL for the UK harassment page.
 *
 * @return string
 */
function succeedlearn_amp_get_uk_harassment_canonical_url() {
	$canonical = home_url( '/uk-sexual-harassment-prevention-training/' );
	$page      = get_page_by_path( 'uk-sexual-harassment-prevention-training' );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$url = get_permalink( $page );
		if ( $url ) {
			return $url;
		}
	}
	return $canonical;
}

/**
 * Page title.
 *
 * @return string
 */
function succeedlearn_amp_get_uk_harassment_page_title() {
	return __( 'UK Sexual Harassment Prevention Training', 'succeedlearn-amp' );
}

/**
 * Meta description.
 *
 * @return string
 */
function succeedlearn_amp_get_uk_harassment_meta_description() {
	return __(
		'UK Preventing Sexual Harassment Training for workers in England, Scotland and Wales. Focused online learning that supports a proactive preventive approach.',
		'succeedlearn-amp'
	);
}

/**
 * Policy-to-action numbered points.
 *
 * @return array<int, string>
 */
function succeedlearn_amp_get_uk_harassment_action_points() {
	return array(
		__( 'Notice when workplace conduct may require attention', 'succeedlearn-amp' ),
		__( 'Think more carefully about personal and professional boundaries', 'succeedlearn-amp' ),
		__( 'Respond appropriately to concerning situations', 'succeedlearn-amp' ),
		__( "Use the organisation's reporting routes with greater confidence", 'succeedlearn-amp' ),
		__( 'Understand their role in maintaining a respectful workplace', 'succeedlearn-amp' ),
	);
}

/**
 * Prevention support numbered points.
 *
 * @return array<int, string>
 */
function succeedlearn_amp_get_uk_harassment_prevention_points() {
	return array(
		__( 'Communicating expected standards of behaviour', 'succeedlearn-amp' ),
		__( 'Helping workers recognise and report concerns', 'succeedlearn-amp' ),
		__( 'Reinforcing policies and reporting procedures', 'succeedlearn-amp' ),
		__( 'Demonstrating an active commitment to prevention', 'succeedlearn-amp' ),
	);
}

/**
 * Learning experience points (label + text).
 *
 * @return array<int, array{label:string,text:string}>
 */
function succeedlearn_amp_get_uk_harassment_learning_points() {
	return array(
		array(
			'label' => __( 'Relevant', 'succeedlearn-amp' ),
			'text'  => __( 'created for the UK workplace context', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Practical', 'succeedlearn-amp' ),
			'text'  => __( 'focused on workplace decisions and responses', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Engaging', 'succeedlearn-amp' ),
			'text'  => __( 'supported by scenarios and knowledge checks', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Accessible', 'succeedlearn-amp' ),
			'text'  => __( 'available through online learning', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Action oriented', 'succeedlearn-amp' ),
			'text'  => __( 'connected to organisational expectations', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Course coverage topics.
 *
 * @return array<int, string>
 */
function succeedlearn_amp_get_uk_harassment_course_topics() {
	return array(
		__( 'Harassment and sexual harassment', 'succeedlearn-amp' ),
		__( 'Who may be affected or involved', 'succeedlearn-amp' ),
		__( 'Where workplace sexual harassment may occur', 'succeedlearn-amp' ),
		__( 'Purpose, effect and reasonable workplace behaviour', 'succeedlearn-amp' ),
		__( 'Personal relationships and professional boundaries', 'succeedlearn-amp' ),
		__( 'Bystander intervention', 'succeedlearn-amp' ),
		__( 'Reporting concerns', 'succeedlearn-amp' ),
		__( 'Conduct that is not sexual harassment', 'succeedlearn-amp' ),
		__( 'Victimisation', 'succeedlearn-amp' ),
		__( 'Summative and formative assessment', 'succeedlearn-amp' ),
	);
}

/**
 * Workplace settings list.
 *
 * @return array<int, string>
 */
function succeedlearn_amp_get_uk_harassment_workplace_settings() {
	return array(
		__( 'Offices and operational locations', 'succeedlearn-amp' ),
		__( 'Remote and hybrid environments', 'succeedlearn-amp' ),
		__( 'Digital communication channels', 'succeedlearn-amp' ),
		__( 'Client and customer locations', 'succeedlearn-amp' ),
		__( 'Conferences, events and work-related social occasions', 'succeedlearn-amp' ),
	);
}

/**
 * Customisation items.
 *
 * @return array<int, string>
 */
function succeedlearn_amp_get_uk_harassment_customisation_items() {
	return array(
		__( 'Your branding', 'succeedlearn-amp' ),
		__( 'Relevant policy information', 'succeedlearn-amp' ),
		__( 'Reporting and escalation routes', 'succeedlearn-amp' ),
		__( 'HR or employee-support contacts', 'succeedlearn-amp' ),
		__( 'Leadership messages', 'succeedlearn-amp' ),
		__( 'Organisation-specific terminology', 'succeedlearn-amp' ),
	);
}

/**
 * FAQ items.
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_uk_harassment_faq_items() {
	return array(
		array(
			'question' => __( 'Who is this course designed for?', 'succeedlearn-amp' ),
			'answer'   => __( 'The course is designed for workers in England, Scotland and Wales. Organisations should assign additional role-specific learning where managers or specialist teams have responsibilities beyond general employee awareness.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How does the course support UK employers?', 'succeedlearn-amp' ),
			'answer'   => __( 'It helps organisations communicate expected standards and build worker awareness as part of a wider preventive approach. Training alone does not fulfil every organisational responsibility.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the website show the complete course content?', 'succeedlearn-amp' ),
			'answer'   => __( 'No. The website provides a concise overview. A detailed course outline or demonstration can be requested from SucceedLEARN.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can we include our policy and reporting information?', 'succeedlearn-amp' ),
			'answer'   => __( 'Customisation may include relevant policies, reporting routes, organisational contacts, branding and terminology, depending on the agreed scope.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Is the training suitable for remote workers?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The learning considers conduct across physical, remote, digital and other work-connected environments.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does completing the course guarantee legal compliance?', 'succeedlearn-amp' ),
			'answer'   => __( "No. Training can support an employer's preventive measures, but it does not replace legal advice, risk assessment, effective policies, suitable reporting arrangements or appropriate action when concerns arise.", 'succeedlearn-amp' ),
		),
	);
}

/**
 * Section images for the UK harassment page.
 *
 * @return array<string, string>
 */
function succeedlearn_amp_get_uk_harassment_images() {
	return array(
		'hero'           => succeedlearn_amp_upload_url( '2026/10/uk-sexual-harassment-prevention-training-amp-hero.webp' ),
		'action'         => succeedlearn_amp_upload_url( '2026/09/awareness-to-action-workplace-training.webp' ),
		'prevention'     => succeedlearn_amp_upload_url( '2026/09/uk-posh-workplace-law.webp' ),
		'learning'       => succeedlearn_amp_upload_url( '2026/09/uk-posh-learning-experience.webp' ),
		'coverage'       => succeedlearn_amp_upload_url( '2026/10/uk-posh-fancy-course-collage.webp' ),
		'settings'       => succeedlearn_amp_upload_url( '2026/09/uk-workplace-context.webp' ),
		'customisation'  => succeedlearn_amp_upload_url( '2026/09/course-customisation-block-diagram.webp' ),
	);
}
