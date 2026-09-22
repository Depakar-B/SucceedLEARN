<?php
/**
 * PCI DSS — Frequently Asked Questions.
 * Content retained from existing PCI DSS course page.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is PCI DSS?', 'akaza-adventure' ),
		'answer'   => __( 'PCI DSS (Payment Card Industry Data Security Standard) is a global security standard designed to protect cardholder data. It sets requirements for organizations that store, process, or transmit credit and debit card information to reduce fraud and prevent data breaches. Businesses that handle payment card data must comply with PCI DSS to maintain secure payment environments and avoid penalties.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Why is PCI DSS awareness training required for our employees?', 'akaza-adventure' ),
		'answer'   => __( 'PCI DSS requires organisations to ensure that employees who handle cardholder data understand secure payment-handling practices, fraud risks, and data-protection responsibilities to prevent breaches, penalties, and chargebacks.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is the PCI Council?', 'akaza-adventure' ),
		'answer'   => __( 'The PCI Council, formally known as the Payment Card Industry Security Standards Council (PCI SSC), is the body formed in 2005 by major card brands - Visa, Mastercard, American Express, Discover, and JCB - to develop and maintain the PCI Data Security Standard (PCI DSS). The Council establishes security guidelines for organisations that store, process, or transmit cardholder data, helping ensure consistent and secure payment practices across the global payment ecosystem.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is this training mandatory for our organisation?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. PCI DSS awareness training is mandatory in practice under Requirement 12.6 for organisations that accept, process, store, or transmit cardholder data, and is enforced through card-brand and acquiring-bank compliance obligations.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Which employees should complete this training?', 'akaza-adventure' ),
		'answer'   => __( 'Cashiers, payment handlers, and any staff involved in card-present or card-not-present transactions, as well as supervisors overseeing payment operations, should complete this training.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How does this training reduce business risk?', 'akaza-adventure' ),
		'answer'   => __( 'The course reduces fraud, chargebacks, and data-breach risk by training employees to securely handle card data, recognise social-engineering attacks, and escalate suspicious activity appropriately.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does this training help during PCI audits and investigations?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Completion records provide documented evidence of employee awareness and due diligence, which is routinely expected during PCI DSS audits, forensic investigations, and bank reviews.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What happens if employees are not trained?', 'akaza-adventure' ),
		'answer'   => __( 'Lack of training can lead to PCI non-compliance findings, increased transaction fees, financial penalties, mandatory forensic audits, reputational damage, or suspension of card-processing privileges.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Does the training cover real-world payment scenarios?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The course uses practical scenarios such as card authentication, declined transactions, Code-10 calls, and social-engineering attempts to reinforce correct behaviour at the point of payment.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is the role of the IT security team in relation to this training?', 'akaza-adventure' ),
		'answer'   => __( 'The IT security team is responsible for implementing and maintaining PCI DSS technical controls (such as firewalls, system security, monitoring, and testing), while this training ensures employees correctly follow those controls in daily payment operations - together forming a complete, auditable PCI DSS compliance framework.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How often should PCI DSS Cashier and Payments Handler Compliance eLearning Training be delivered?', 'akaza-adventure' ),
		'answer'   => __( 'PCI DSS expects security awareness training to be ongoing. Most organisations deliver this training at onboarding and refresh it annually or whenever payment-handling processes change.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Do you have another training covering the PCI DSS Goals in brief?', 'akaza-adventure' ),
		'answer'   => __( 'Yes, we have a separate course called Payment Card Security (PCI DSS) that covers the application to Merchants, Processors, Service Providers and Acquirers outlining the PCI DSS definitions and requirements.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How are the courses delivered?', 'akaza-adventure' ),
		'answer'   => __( 'The delivery is fully flexible. If you have an in-house LMS, we can provide the course as a SCORM-compliant package. If not, we offer a seamless SaaS-based hosting option for easy access and deployment.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can we customize the training to our policies and workflows?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. The PCI DSS Compliance training can be tailored to your internal security policies, acceptable use rules, and payment workflows; PCI SSC (Payment Card Industry Security Standards Council) guidance stresses building an awareness program around organizational roles and context.', 'akaza-adventure' ),
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-faq-section--alt sl-pci-faq',
		'eyebrow'       => __( 'Straight answers', 'akaza-adventure' ),
		'title'         => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'numbered'      => true,
		'items'         => $faq_items,
		'schema'        => true,
	)
);
