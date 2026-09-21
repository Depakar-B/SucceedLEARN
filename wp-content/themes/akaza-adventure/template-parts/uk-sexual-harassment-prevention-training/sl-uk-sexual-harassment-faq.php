<?php
/**
 * UK Sexual Harassment Prevention — FAQs.
 *
 * Uses the global FAQ component and styling.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$faq_items = array(
    array(
        'question' => __( 'Who is this course designed for?', 'akaza-adventure' ),
        'answer'   => __( 'The course is designed for workers in England, Scotland and Wales. Organisations should assign additional role-specific learning where managers or specialist teams have responsibilities beyond general employee awareness.', 'akaza-adventure' ),
    ),
    array(
        'question' => __( 'How does the course support UK employers?', 'akaza-adventure' ),
        'answer'   => __( 'It helps organisations communicate expected standards and build worker awareness as part of a wider preventive approach. Training alone does not fulfil every organisational responsibility.', 'akaza-adventure' ),
    ),
    array(
        'question' => __( 'Does the website show the complete course content?', 'akaza-adventure' ),
        'answer'   => __( 'No. The website provides a concise overview. A detailed course outline or demonstration can be requested from SucceedLEARN.', 'akaza-adventure' ),
    ),
    array(
        'question' => __( 'Can we include our policy and reporting information?', 'akaza-adventure' ),
        'answer'   => __( 'Customisation may include relevant policies, reporting routes, organisational contacts, branding and terminology, depending on the agreed scope.', 'akaza-adventure' ),
    ),
    array(
        'question' => __( 'Is the training suitable for remote workers?', 'akaza-adventure' ),
        'answer'   => __( 'Yes. The learning considers conduct across physical, remote, digital and other work-connected environments.', 'akaza-adventure' ),
    ),
    array(
        'question' => __( 'Does completing the course guarantee legal compliance?', 'akaza-adventure' ),
        'answer'   => __( "No. Training can support an employer's preventive measures, but it does not replace legal advice, risk assessment, effective policies, suitable reporting arrangements or appropriate action when concerns arise.", 'akaza-adventure' ),
    ),
);

get_template_part(
    'template-parts/global/faq',
    null,
    array(
        'id'            => 'frequently-asked-questions',
        'section_class' => 'sl-faq-section--alt sl-uk-sexual-harassment-faq',
        'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
        'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
        'intro'         => __( 'Answers to common questions about UK Preventing Sexual Harassment Training.', 'akaza-adventure' ),
        'numbered'      => true,
        'items'         => $faq_items,
        'schema'        => true,
    )
);