<?php
/**
 * Insider Trading eLearning FAQs.
 *
 * Uses the global FAQ partial.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is Insider Trading eLearning?', 'akaza-adventure' ),
		'answer'   => __( 'Insider Trading eLearning helps employees recognise sensitive or non-public information, understand how that information may affect trading and disclosure decisions, and know when they should pause and seek guidance.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is UK MAR?', 'akaza-adventure' ),
		'answer'   => __( 'UK MAR refers to the UK Market Abuse Regulation. It addresses areas including inside information, insider dealing, unlawful disclosure and market manipulation.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is MNPI?', 'akaza-adventure' ),
		'answer'   => __( 'MNPI means Material Non-Public Information. Material information is information that may be important to an investor when making an investment decision, while non-public information has not been broadly disclosed to the investing public. In the US, MNPI is an important insider-trading compliance concept. Employees who receive MNPI may need to consider whether trading, sharing the information or taking another action could create a compliance concern.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is UPSI?', 'akaza-adventure' ),
		'answer'   => __( 'UPSI means Unpublished Price Sensitive Information and is an important concept under the India SEBI Regulation framework. UPSI broadly concerns information that is not generally available and that may materially affect the price of relevant securities if it became generally available. Employees who receive UPSI need to understand restrictions that may apply to trading, communication and information handling.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is the role of the US SEC in insider trading?', 'akaza-adventure' ),
		'answer'   => __( 'The Securities and Exchange Commission (SEC) is the US federal securities regulator. Insider-trading compliance sits within the wider federal securities-law framework, SEC rules and relevant case law.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What does India SEBI Regulation cover?', 'akaza-adventure' ),
		'answer'   => __( 'India\'s insider-trading framework includes the SEBI (Prohibition of Insider Trading) Regulations, 2015. Important concepts include UPSI, insiders, connected persons, information communication and trading-related controls.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can SucceedLEARN customise the course?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. SucceedLEARN can discuss customising Insider Trading eLearning around organisational policies, terminology, learner roles, workplace scenarios and jurisdiction-specific requirements.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does SucceedLEARN offer courses for other countries?', 'akaza-adventure' ),
		'answer'   => __( 'SucceedLEARN provides existing regional courses for the UK, US and India. For other jurisdictions, organisations can discuss off-the-shelf options where available or a customised course developed around agreed regulatory sources and organisational requirements.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-insider-trading-faq',
		'eyebrow'       => __( 'Insider Trading eLearning FAQs', 'akaza-adventure' ),
		'title_html'    => __( 'What Are the Most Common Questions About Insider Trading and <span>Market Abuse Regulations?</span>', 'akaza-adventure' ),
		'description'  => __( 'Find concise answers to common questions about Insider Trading eLearning, UK MAR, US SEC requirements, India SEBI Regulation and course customisation.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request a Demo', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);