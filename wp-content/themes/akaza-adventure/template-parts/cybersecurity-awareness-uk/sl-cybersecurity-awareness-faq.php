<?php
/**
 * Cybersecurity Awareness (UK) — FAQ section.
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
		'question' => __( 'Is this an annual subscription?', 'akaza-adventure' ),
		'answer'   => __( 'No, not under this special offer. The offer covers the Cyber Security Awareness Month campaign for October 2026. If you extend the service beyond October, you will receive a 50% discount on the first-year extension.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does ‘up to 10 emails per user’ mean the same 10 simulations must be sent to everyone?', 'akaza-adventure' ),
		'answer'   => __( '<p>No. Administrators can choose from a library of 300+ phishing templates and assign different simulations to different departments or employee groups.</p><p>For example, the Finance team can receive 10 finance-relevant campaigns, while another department can receive a different set of templates. Each individual end user will receive a maximum of 10 simulation emails overall during the campaign.</p>', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Are there unlimited users?', 'akaza-adventure' ),
		'answer'   => __( 'There is no separate per-user charge within the selected employee band. Choose the band that matches the number of active participants in your organisation.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is Microsoft 365 integration included?', 'akaza-adventure' ),
		'answer'   => __( 'Standard support for one Microsoft 365 tenant is included. Custom development, complex tenant remediation and third-party integrations are outside the promotional package.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is PhishCue?', 'akaza-adventure' ),
		'answer'   => __( 'PhishCue is SucceedLEARN’s reported-email solution. It gives employees a simple way to report suspicious emails and provides security teams with one place to review and manage those reports.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can different phishing simulations be used for different departments?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Administrators can select department-relevant templates from the library, so teams such as Finance, HR and IT can receive simulations that reflect the risks they are most likely to face.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the solution work with Google Workspace?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. SucceedLEARN’s Security Awareness Training and Phishing Simulations are fully compatible with Google Workspace. However, PhishCue, our phishing reporting, analysis and security management platform, is currently available only for Microsoft 365.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How long is this offer available?', 'akaza-adventure' ),
		'answer'   => __( 'This special introductory offer is available until 15 October 2026. Succeed Technologies reserves the right to modify or withdraw the offer at any time during the promotional period.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What if my organisation has more than 10,000 users?', 'akaza-adventure' ),
		'answer'   => __( 'For organisations with more than 10,000 users, request a demo and our team will be happy to understand your requirements and provide a customised offer.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can the Security Awareness eLearning content be customised?', 'akaza-adventure' ),
		'answer'   => __( '<p>Yes. The eLearning content can be customised to reflect your organisation’s policies, branding or specific training requirements.</p><p>Customisation will involve an additional cost and may require additional implementation time. The scope, pricing and delivery timeline will be agreed before work begins.</p>', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How long is the service period?', 'akaza-adventure' ),
		'answer'   => __( '<p>This special offer provides access to the service for 30 consecutive calendar days from the agreed go-live date.</p><p>Any training, phishing simulations or other included services not used within this period will expire, unless an extension is discussed and agreed in writing by the customer and Succeed Technologies.</p>', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-csa-faq',
		'eyebrow'       => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'title_html'    => __( 'Cyber Security Awareness Month <span>FAQs</span>', 'akaza-adventure' ),
		'description'   => __( 'Need to discuss your environment or campaign scope? Our team can talk you through it.', 'akaza-adventure' ),
		'cta_text'      => __( 'Speak to a specialist', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'items'         => $faq_items,
		'schema'        => true,
	)
);
