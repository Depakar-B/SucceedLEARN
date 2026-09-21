<?php
/**
 * Gifts & Entertainment Training
 * Global FAQ Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$faq_items = array(
	array(
		'question' => __( 'What is Gifts and Entertainment Training?', 'akaza-adventure' ),
		'answer'   => __( 'It helps employees assess business gifts, hospitality, meals, invitations and other benefits, and understand when they should accept, decline, seek approval, record or escalate them.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who should take Gifts and Entertainment Training?', 'akaza-adventure' ),
		'answer'   => __( 'It is relevant to PE/VC professionals who interact with investors, advisers, vendors, portfolio companies, government officials and other third parties.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What counts as a gift or entertainment?', 'akaza-adventure' ),
		'answer'   => __( 'Gifts may include merchandise, gift cards, services, personal favours, loans or discounts. Entertainment may include meals, event tickets, cultural outings, travel and hospitality.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What laws are relevant to gifts and entertainment compliance?', 'akaza-adventure' ),
		'answer'   => __( 'The course references the UK Bribery Act 2010 and the U.S. Foreign Corrupt Practices Act, alongside applicable organisational policies and other relevant anti-bribery requirements.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Are business gifts and hospitality always prohibited?', 'akaza-adventure' ),
		'answer'   => __( 'No. Their appropriateness depends on factors including purpose, value, timing, recipient, transparency, applicable law and organisational policy.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can employees accept gifts from vendors or advisers?', 'akaza-adventure' ),
		'answer'   => __( 'It depends on the firm’s policy and circumstances. Particular caution is needed during procurement, bidding, negotiations, adviser selection and vendor onboarding.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Are gifts involving government officials higher risk?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course treats these interactions as higher-risk situations requiring additional scrutiny and appropriate approval.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What should an employee do if unsure about a gift or invitation?', 'akaza-adventure' ),
		'answer'   => __( 'Check the organisation’s Gifts and Entertainment policy and consult Compliance before proceeding.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-gifts-entertainment-faq',
		'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'title_html'    => __( 'Gifts and Entertainment Training <span>FAQs for PE/VC Firms</span>', 'akaza-adventure' ),
		'description'   => __( 'Concise answers to common questions about gifts, hospitality, entertainment and compliance.', 'akaza-adventure' ),
		'cta_text'      => __( 'Speak to a specialist', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
?>