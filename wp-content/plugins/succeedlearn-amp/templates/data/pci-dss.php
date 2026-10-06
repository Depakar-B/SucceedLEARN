<?php
/**
 * PCI DSS Awareness Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a PCI DSS section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_pci_dss_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/pci-dss/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_pci_dss_canonical_url() {
	$canonical = home_url( '/pci-dss/' );
	foreach ( array( 'pci-dss', 'pci' ) as $slug ) {
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
function succeedlearn_amp_get_pci_dss_page_title() {
	return __( 'PCI DSS Awareness Training for Employees & Payment Handlers', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_pci_dss_meta_description() {
	return __( 'SucceedLEARN\'s PCI DSS Awareness Training delivers role-relevant modules for employees and cashiers/payment handlers covering cardholder data, PCI DSS requirements, payment fraud and social engineering.', 'succeedlearn-amp' );
}

/**
 * Hero image URL.
 *
 * @return string
 */
function succeedlearn_amp_get_pci_dss_hero_image() {
	return succeedlearn_amp_upload_url( '2026/10/PCI-DSS-Employee.webp' );
}

/**
 * "Why it matters" image URL.
 *
 * @return string
 */
function succeedlearn_amp_get_pci_dss_why_image() {
	return succeedlearn_amp_upload_url( '2026/01/PCI-DSS-Hero-Section-1.webp' );
}

/**
 * Two PCI DSS training modules.
 *
 * @return array<int, array{title:string,tagline:string,intro:string,learn:string,topics:string[],meta:string[]}>
 */
function succeedlearn_amp_get_pci_dss_modules() {
	return array(
		array(
			'title'   => __( 'PCI DSS Employee Awareness Training', 'succeedlearn-amp' ),
			'tagline' => __( 'Foundational PCI DSS awareness for employees', 'succeedlearn-amp' ),
			'intro'   => __( 'This module introduces employees to PCI DSS and helps them understand the importance of protecting cardholder and sensitive authentication data.', 'succeedlearn-amp' ),
			'learn'   => __( 'Employees learn about:', 'succeedlearn-amp' ),
			'topics'  => array(
				__( 'What PCI DSS is', 'succeedlearn-amp' ),
				__( 'Who PCI DSS applies to', 'succeedlearn-amp' ),
				__( 'The history and purpose of PCI DSS', 'succeedlearn-amp' ),
				__( 'Cardholder Data (CHD)', 'succeedlearn-amp' ),
				__( 'Sensitive Authentication Data (SAD)', 'succeedlearn-amp' ),
				__( 'Organisational responsibilities around PCI DSS', 'succeedlearn-amp' ),
				__( 'PCI DSS goals', 'succeedlearn-amp' ),
				__( 'PCI DSS requirements and their implementation', 'succeedlearn-amp' ),
				__( 'PCI data-storage guidelines', 'succeedlearn-amp' ),
				__( 'Secure and insecure behaviours through interactive activities', 'succeedlearn-amp' ),
			),
			'meta'    => array(
				__( 'Duration: 20 minutes', 'succeedlearn-amp' ),
				__( 'Best suited for: Employees requiring general PCI DSS and payment-data awareness.', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'   => __( 'PCI DSS Training for Cashiers & Payment Handlers', 'succeedlearn-amp' ),
			'tagline' => __( 'Practical payment-security awareness for employees handling card transactions', 'succeedlearn-amp' ),
			'intro'   => __( 'This module focuses on the responsibilities and risks employees encounter when directly processing or handling customer payments.', 'succeedlearn-amp' ),
			'learn'   => __( 'Employees learn about:', 'succeedlearn-amp' ),
			'topics'  => array(
				__( 'PCI DSS goals and guidelines', 'succeedlearn-amp' ),
				__( 'Responsibilities of customer payment handlers', 'succeedlearn-amp' ),
				__( 'Important PCI DSS definitions', 'succeedlearn-amp' ),
				__( 'Card-present transactions', 'succeedlearn-amp' ),
				__( 'Card-not-present transactions', 'succeedlearn-amp' ),
				__( 'PCI DSS requirements', 'succeedlearn-amp' ),
				__( 'Social-engineering risks', 'succeedlearn-amp' ),
				__( 'Phishing', 'succeedlearn-amp' ),
				__( 'Pretexting', 'succeedlearn-amp' ),
				__( 'Baiting', 'succeedlearn-amp' ),
				__( 'Tailgating', 'succeedlearn-amp' ),
				__( 'Code-10 calls', 'succeedlearn-amp' ),
				__( 'Payment-security do\'s and don\'ts', 'succeedlearn-amp' ),
			),
			'meta'    => array(
				__( 'Best suited for: Cashiers, payment handlers and employees directly involved in processing card transactions.', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * Comparison table rows: [label, employee_bool, cashier_bool].
 *
 * @return array<int, array{0:string,1:bool,2:bool}>
 */
function succeedlearn_amp_get_pci_dss_comparison_rows() {
	return array(
		array( __( 'Understand what PCI DSS is', 'succeedlearn-amp' ), true, true ),
		array( __( 'Understand PCI DSS goals', 'succeedlearn-amp' ), true, true ),
		array( __( 'General PCI DSS awareness', 'succeedlearn-amp' ), true, true ),
		array( __( 'Understand Cardholder & Sensitive Authentication Data', 'succeedlearn-amp' ), true, false ),
		array( __( 'PCI data-storage awareness', 'succeedlearn-amp' ), true, false ),
		array( __( 'Interactive PCI compliance scenarios', 'succeedlearn-amp' ), true, false ),
		array( __( 'Card-present transactions', 'succeedlearn-amp' ), false, true ),
		array( __( 'Card-not-present transactions', 'succeedlearn-amp' ), false, true ),
		array( __( 'Social engineering', 'succeedlearn-amp' ), false, true ),
		array( __( 'Phishing', 'succeedlearn-amp' ), false, true ),
		array( __( 'Pretexting & baiting', 'succeedlearn-amp' ), false, true ),
		array( __( 'Tailgating', 'succeedlearn-amp' ), false, true ),
		array( __( 'Code-10 calls', 'succeedlearn-amp' ), false, true ),
		array( __( 'Payment-handling do\'s & don\'ts', 'succeedlearn-amp' ), false, true ),
	);
}

/**
 * Learning element cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_pci_dss_learning_elements() {
	return array(
		array(
			'title' => __( 'Interactive eLearning', 'succeedlearn-amp' ),
			'text'  => __( 'Structured digital learning designed to make PCI DSS concepts easier for employees to understand.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Role-Relevant Content', 'succeedlearn-amp' ),
			'text'  => __( 'Different learning experiences based on whether employees require foundational PCI DSS awareness or practical payment-handler training.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Workplace Scenarios', 'succeedlearn-amp' ),
			'text'  => __( 'Examples and activities help employees connect payment-security principles with workplace situations.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Knowledge Checks', 'succeedlearn-amp' ),
			'text'  => __( 'Interactive questions reinforce understanding throughout the learning experience.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Assessment', 'succeedlearn-amp' ),
			'text'  => __( 'Assess employee understanding after relevant learning activities.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Employee awareness course outline: [topic, coverage].
 *
 * @return array<int, array{0:string,1:string}>
 */
function succeedlearn_amp_get_pci_dss_employee_outline() {
	return array(
		array(
			__( 'Introduction & Objectives', 'succeedlearn-amp' ),
			'',
		),
		array(
			__( 'Understanding PCI DSS', 'succeedlearn-amp' ),
			__( 'What is PCI DSS? · Who does it apply to? · History of PCI DSS', 'succeedlearn-amp' ),
		),
		array(
			__( 'Understanding Payment Data', 'succeedlearn-amp' ),
			__( 'Cardholder Data · Sensitive Authentication Data', 'succeedlearn-amp' ),
		),
		array(
			__( 'Your Organisation & PCI DSS', 'succeedlearn-amp' ),
			__( 'Approach to PCI DSS Compliance · Security Check: Violation or No Violation?', 'succeedlearn-amp' ),
		),
		array(
			__( 'PCI DSS Goals & Requirements', 'succeedlearn-amp' ),
			__( 'PCI DSS Goals · Requirements and How They\'re Implemented', 'succeedlearn-amp' ),
		),
		array(
			__( 'PCI Data Storage Guidelines', 'succeedlearn-amp' ),
			__( 'Do\'s · Examples · Don\'ts · Examples', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Cashier & payment handler course outline: [topic, coverage].
 *
 * @return array<int, array{0:string,1:string}>
 */
function succeedlearn_amp_get_pci_dss_cashier_outline() {
	return array(
		array(
			__( 'PCI DSS Foundations', 'succeedlearn-amp' ),
			__( 'PCI Council · PCI DSS Goals · Why PCI DSS Guidelines Matter', 'succeedlearn-amp' ),
		),
		array(
			__( 'Customer Payment Handlers', 'succeedlearn-amp' ),
			__( 'Responsibilities · PCI DSS Definitions', 'succeedlearn-amp' ),
		),
		array(
			__( 'Handling Card Transactions', 'succeedlearn-amp' ),
			__( 'Card-Present · Card-Not-Present', 'succeedlearn-amp' ),
		),
		array(
			__( 'PCI DSS Requirements', 'succeedlearn-amp' ),
			'',
		),
		array(
			__( 'Social Engineering & Payment Security Threats', 'succeedlearn-amp' ),
			__( 'Phishing · Pretexting · Baiting · Tailgating', 'succeedlearn-amp' ),
		),
		array(
			__( 'Responding to Suspicious Activity', 'succeedlearn-amp' ),
			__( 'Code-10 Calls', 'succeedlearn-amp' ),
		),
		array(
			__( 'Secure Payment Practices', 'succeedlearn-amp' ),
			__( 'Do\'s & Don\'ts', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Screenshot carousels keyed by module.
 *
 * @return array<string, array{label:string,slides:array<int, array{src:string,alt:string}>}>
 */
function succeedlearn_amp_get_pci_dss_screenshot_modules() {
	return array(
		'employee' => array(
			'label'  => __( 'Employee Awareness', 'succeedlearn-amp' ),
			'slides' => array(
				array(
					'src' => succeedlearn_amp_upload_url( '2026/09/PCI-DSS-Empoyee-Course-Screenshots.webp' ),
					'alt' => __( 'PCI DSS Employee Awareness training screenshot 1', 'succeedlearn-amp' ),
				),
				array(
					'src' => succeedlearn_amp_upload_url( '2026/09/PCI-DSS-Empoyee-Course-Screenshots-2.webp' ),
					'alt' => __( 'PCI DSS Employee Awareness training screenshot 2', 'succeedlearn-amp' ),
				),
				array(
					'src' => succeedlearn_amp_upload_url( '2026/09/PCI-DSS-Empoyee-Course-Screenshots-3.webp' ),
					'alt' => __( 'PCI DSS Employee Awareness training screenshot 3', 'succeedlearn-amp' ),
				),
				array(
					'src' => succeedlearn_amp_upload_url( '2026/09/PCI-DSS-Empoyee-Course-Screenshots-4.webp' ),
					'alt' => __( 'PCI DSS Employee Awareness training screenshot 4', 'succeedlearn-amp' ),
				),
			),
		),
		'cashier'  => array(
			'label'  => __( 'Cashier & Payment Handler', 'succeedlearn-amp' ),
			'slides' => array(
				array(
					'src' => succeedlearn_amp_upload_url( '2026/09/PCI-DSS-Cashier-Payment-handler-Course-Screenshot.webp' ),
					'alt' => __( 'PCI DSS Cashier and Payment Handler training screenshot 1', 'succeedlearn-amp' ),
				),
				array(
					'src' => succeedlearn_amp_upload_url( '2026/09/PCI-DSS-Cashier-Payment-handler-Course-Screenshot-2.webp' ),
					'alt' => __( 'PCI DSS Cashier and Payment Handler training screenshot 2', 'succeedlearn-amp' ),
				),
				array(
					'src' => succeedlearn_amp_upload_url( '2026/09/PCI-DSS-Cashier-Payment-handler-Course-Screenshot-3.webp' ),
					'alt' => __( 'PCI DSS Cashier and Payment Handler training screenshot 3', 'succeedlearn-amp' ),
				),
				array(
					'src' => succeedlearn_amp_upload_url( '2026/09/PCI-DSS-Cashier-Payment-handler-Course-Screenshot-4.webp' ),
					'alt' => __( 'PCI DSS Cashier and Payment Handler training screenshot 4', 'succeedlearn-amp' ),
				),
			),
		),
	);
}

/**
 * Audience cards.
 *
 * @return array<int, array{title:string,lead:string,people:string[]}>
 */
function succeedlearn_amp_get_pci_dss_audiences() {
	return array(
		array(
			'title'  => __( 'PCI DSS Employee Awareness Training', 'succeedlearn-amp' ),
			'lead'   => __( 'Suitable for employees who require foundational awareness of PCI DSS and payment-data security, including relevant:', 'succeedlearn-amp' ),
			'people' => array(
				__( 'Employees working within PCI DSS-scoped environments', 'succeedlearn-amp' ),
				__( 'Operational teams', 'succeedlearn-amp' ),
				__( 'Customer-support teams', 'succeedlearn-amp' ),
				__( 'Administrative employees', 'succeedlearn-amp' ),
				__( 'Managers and supervisors', 'succeedlearn-amp' ),
				__( 'Employees who may encounter payment or cardholder information', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'  => __( 'Cashier & Payment Handler Training', 'succeedlearn-amp' ),
			'lead'   => __( 'Suitable for employees directly involved in accepting, processing or handling card payments, including:', 'succeedlearn-amp' ),
			'people' => array(
				__( 'Cashiers', 'succeedlearn-amp' ),
				__( 'Retail employees', 'succeedlearn-amp' ),
				__( 'Front-desk employees', 'succeedlearn-amp' ),
				__( 'Customer-service representatives processing payments', 'succeedlearn-amp' ),
				__( 'Telephone payment handlers', 'succeedlearn-amp' ),
				__( 'Hospitality employees', 'succeedlearn-amp' ),
				__( 'Payment operations teams', 'succeedlearn-amp' ),
				__( 'Supervisors responsible for payment-handling teams', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * "Why choose" cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_pci_dss_choose_items() {
	return array(
		array(
			'title' => __( 'Two Role-Relevant Learning Paths', 'succeedlearn-amp' ),
			'text'  => __( 'Provide foundational awareness and more specialised payment-handler training without treating every employee as having identical responsibilities.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Practical Employee Awareness', 'succeedlearn-amp' ),
			'text'  => __( 'Translate PCI DSS concepts into learning employees can understand in the context of their work.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Payment-Handler Specific Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Addresses card-present and card-not-present transactions, social engineering, Code-10 calls and secure payment-handling practices.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Interactive Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Use activities, scenarios and assessments to reinforce important concepts rather than relying exclusively on passive content.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Supports Security Awareness Objectives', 'succeedlearn-amp' ),
			'text'  => __( 'Help organisations provide structured awareness as part of their wider PCI DSS security-awareness programme.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Flexible Delivery', 'succeedlearn-amp' ),
			'text'  => __( 'Deploy training through the SucceedLEARN environment or applicable SCORM delivery options for organisations using their own LMS.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * FAQ items (HTML answers for accordion).
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_pci_dss_faq_items() {
	return array(
		array(
			'question' => __( 'What PCI DSS training does SucceedLEARN provide?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'SucceedLEARN provides two PCI DSS awareness modules: PCI DSS Employee Awareness Training for foundational employee awareness and PCI DSS Cashier & Payment Handler Training for employees directly involved in processing or handling card payments.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What is the difference between the two PCI DSS modules?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The Employee Awareness module focuses on foundational PCI DSS knowledge, cardholder and sensitive authentication data, PCI DSS requirements and data-storage guidance.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'The Cashier & Payment Handler module focuses more specifically on payment handling, card-present and card-not-present transactions, social engineering and suspicious payment activity.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does every employee need the Cashier & Payment Handler module?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Training should be selected according to employee responsibilities. Employees directly involved in card-payment handling may require the specialised payment-handler module, while other relevant employees may be better suited to foundational PCI DSS awareness.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What does the PCI DSS Employee Awareness module cover?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'It covers what PCI DSS is, who it applies to, cardholder and sensitive authentication data, PCI DSS goals and requirements, data-storage guidelines, interactive learning activities and an assessment.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What does the Cashier & Payment Handler module cover?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'It covers PCI DSS goals, payment-handler responsibilities, card-present and card-not-present transactions, PCI DSS requirements, phishing and other social-engineering techniques, Code-10 calls, and payment-security do\'s and don\'ts.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does PCI DSS require security-awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'PCI DSS Requirement 12.6 establishes security-awareness education as an ongoing activity and requires a formal security-awareness programme for personnel.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does PCI DSS awareness training include phishing and social engineering?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Current PCI DSS requirements specifically include awareness of threats that could affect the cardholder data environment, including phishing, related attacks and social engineering.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the training include an assessment?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The Employee Awareness module includes an assessment to check understanding after relevant learning activities.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can PCI DSS training be delivered through our LMS?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Applicable SucceedLEARN training can be provided through SCORM-based delivery for organisations using their own LMS, subject to the selected deployment model.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can different PCI DSS modules be assigned to different employee groups?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. The two-module structure allows organizations to align training with employee responsibilities - for example, foundational awareness for relevant employees and specialized training for employees directly handling card payments.', 'succeedlearn-amp' ) . '</p>',
		),
	);
}

/**
 * FAQPage JSON-LD for the PCI DSS AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_pci_dss_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_pci_dss_faq_items() as $item ) {
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
