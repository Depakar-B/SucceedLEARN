<?php
/**
 * UK Cyber Essentials — FAQ.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is Cyber Essentials?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Cyber Essentials is a UK government-backed cybersecurity certification scheme designed to help organisations protect themselves against common cyber attacks through five technical controls: Firewalls, Secure Configuration, Security Update Management, User Access Control and Malware Protection.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What is Cyber Essentials security awareness training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Cyber Essentials security awareness training refers to employee learning that reinforces secure behaviours relevant to the technical controls used within the Cyber Essentials scheme.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'Training can help employees understand areas such as account security, malware risks, secure remote working and responsible use of organisational technology.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does Cyber Essentials require employee cybersecurity training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Cyber Essentials certification is based on implementation of its five technical controls rather than a prescribed employee-training syllabus. Employee awareness can support secure behaviour around those controls, but training alone does not satisfy the certification requirements.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'What are the five Cyber Essentials controls?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'The five controls are:', 'akaza-adventure' ) . '</p>'
			. '<ul>'
			. '<li>' . esc_html__( 'Firewalls', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Secure Configuration', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Security Update Management', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'User Access Control', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Malware Protection', 'akaza-adventure' ) . '</li>'
			. '</ul>'
			. '<p>' . esc_html__( 'These form the foundation of the Cyber Essentials certification scheme.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Which SucceedLEARN modules are most relevant to Cyber Essentials?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'From the current S-Aware library, the strongest directly relevant employee-awareness modules are:', 'akaza-adventure' ) . '</p>'
			. '<ul>'
			. '<li>' . esc_html__( 'Account Security', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Malware', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Remote Work Security', 'akaza-adventure' ) . '</li>'
			. '</ul>'
			. '<p>' . esc_html__( 'Additional security-awareness modules are available for organisations that want broader employee cybersecurity learning.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Is account security relevant to Cyber Essentials?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. User Access Control is one of the five Cyber Essentials technical controls. Employee awareness around authentication, passwords, MFA and credential protection can support safer account behaviour.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Is malware awareness relevant to Cyber Essentials?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Malware Protection is one of the five Cyber Essentials controls. Employee awareness can help users recognise suspicious files, links, downloads and other behaviours that may increase malware exposure.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does Cyber Essentials cover remote working and cloud services?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Cyber Essentials requirements apply to relevant systems and services within certification scope. The scheme has been updated over time to account for home working, BYOD and cloud services, and current v3.3 guidance states that cloud services cannot simply be excluded from scope.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does the training cover Secure Configuration and Security Update Management?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Your current 10-module S-Aware library does not contain standalone modules titled Secure Configuration or Security Update Management.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'Employee awareness can reinforce behaviours such as using approved systems and not ignoring authorised software updates, but organisations must still implement the corresponding Cyber Essentials technical controls themselves.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Does completing the training make an organisation Cyber Essentials certified?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'No. Cyber Essentials certification requires the organisation to meet the applicable technical requirements across all five controls and complete the relevant certification process. Employee awareness training can complement that programme but does not provide certification by itself.', 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-ukce-faq',
		'eyebrow'       => __( 'FAQ', 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about SucceedLEARN’s Information Security Awareness Training for UK Cyber Essentials.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request a Demo', 'akaza-adventure' ),
		'cta_url'       => '#contact',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
