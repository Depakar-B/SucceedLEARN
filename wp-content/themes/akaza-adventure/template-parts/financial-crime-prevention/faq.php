<?php
/**
 * Financial Crime Prevention — FAQ section.
 *
 * Uses the shared global FAQ component (global-faq.css).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is Financial Crime Prevention?', 'akaza-adventure' ),
		'answer'   => __( 'Financial Crime Prevention is the process of identifying, preventing and responding to financial crime risks through effective policies, internal controls, due diligence and employee awareness. It helps organisations reduce exposure to risks such as money laundering, bribery, fraud, sanctions breaches and tax evasion.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is Financial Crime Prevention Training?', 'akaza-adventure' ),
		'answer'   => __( 'Financial Crime Prevention Training equips employees to recognise financial crime risks, identify red flags, follow internal procedures and report concerns appropriately. Practical, scenario-based learning helps employees apply compliance principles in everyday business situations.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What is the difference between Anti-Money Laundering (AML) and Financial Crime Prevention?', 'akaza-adventure' ),
		'answer'   => __( 'Anti-Money Laundering (AML) focuses on preventing money laundering and terrorist financing, while Financial Crime Prevention is broader and also covers bribery, corruption, sanctions, fraud, tax evasion, insider trading and market abuse. AML forms one key part of a wider financial crime compliance programme.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is Counter-Terrorist Financing (CTF) part of AML?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Counter-Terrorist Financing (CTF) is typically addressed alongside Anti-Money Laundering because both aim to prevent the misuse of financial systems. AML focuses on illicit funds, while CTF focuses on preventing funds from supporting terrorist activities.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who should complete Financial Crime Prevention Training?', 'akaza-adventure' ),
		'answer'   => __( 'Financial Crime Prevention Training should be completed by employees in Compliance, Risk, Internal Audit, Finance, Operations, Procurement, Sales, Customer-Facing roles, Senior Management, and anyone handling customers, payments, third-party relationships or confidential information.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What topics are covered in Financial Crime Prevention Training?', 'akaza-adventure' ),
		'answer'   => __( 'The training covers AML, CTF, KYC, Anti-Bribery and Anti-Corruption (ABAC), Trade Compliance and Sanctions, Prevention of Tax Evasion, Insider Trading and Market Abuse, Failure to Prevent Fraud, along with red flags, reporting procedures and practical workplace scenarios.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Why is Financial Crime Prevention Training important?', 'akaza-adventure' ),
		'answer'   => __( 'Financial Crime Prevention Training helps employees recognise suspicious activity, make informed decisions and comply with organisational policies. It strengthens compliance programmes, reduces financial and reputational risks, and promotes a culture of ethical business conduct.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How often should employees complete Financial Crime Prevention Training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Employees should complete Financial Crime Prevention Training regularly, with the frequency determined by applicable regulations, their role and the organisation’s financial crime risk exposure.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'There is no single training frequency that applies to every organisation or every financial crime topic. As good practice, organisations should provide training:', 'akaza-adventure' ) . '</p>'
			. '<ul>'
			. '<li>' . esc_html__( 'During onboarding, before or soon after employees take on relevant responsibilities.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Periodically thereafter, commonly on an annual basis for employees exposed to financial crime risks.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'When laws, regulations or internal policies change significantly.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'When new or emerging financial crime risks arise, including new fraud, sanctions or money laundering typologies.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'When an employee’s role or responsibilities change, particularly where this increases their exposure to financial crime risks.', 'akaza-adventure' ) . '</li>'
			. '</ul>'
			. '<p>' . esc_html__( 'Higher-risk or regulated roles can require more frequent or targeted refresher training.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can Financial Crime Prevention Training be customised?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. SucceedLEARN’s courses can be customised to reflect your organisation’s policies, procedures, branding, reporting routes and industry-specific compliance requirements.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Are SucceedLEARN’s Financial Crime Prevention courses CPD Certified?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. All Financial Crime Prevention courses are CPD Certified, helping organisations provide independently recognised professional learning while supporting ongoing employee development.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How is SucceedLEARN’s Financial Crime Prevention Training delivered?', 'akaza-adventure' ),
		'answer'   => __( 'Training can be delivered through SucceedLEARN’s hosted learning platform or as SCORM-compatible content for your existing LMS, with assessments, learner tracking and completion certificates included.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is Financial Crime Prevention Training mandatory in the UK?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes, financial crime prevention training is mandatory for many regulated organisations in the UK, although requirements vary by topic, sector and employee role.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'Under the Money Laundering Regulations 2017, regulated businesses must provide relevant employees with regular training on money laundering, terrorist financing and proliferation financing.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'For other financial crime risks:', 'akaza-adventure' ) . '</p>'
			. '<ul>'
			. '<li>' . esc_html__( 'Anti-Bribery and Anti-Corruption (ABAC): Training is not universally mandatory under the Bribery Act 2010, but is recognised in government guidance as an important part of adequate bribery-prevention procedures.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Trade Compliance and Sanctions: Training is not universally mandated, but appropriate staff training is good practice and supports effective sanctions compliance.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Preventing Facilitation of Tax Evasion: The Criminal Finances Act 2017 does not mandate specific training, but training supports the reasonable prevention procedures organisations should implement.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Insider Trading: Training requirements apply to certain regulated firms and relevant staff under UK market-abuse rules.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Failure to Prevent Fraud: The Economic Crime and Corporate Transparency Act 2023 does not mandate a specific training course, but government guidance identifies communication and training as part of reasonable fraud-prevention procedures.', 'akaza-adventure' ) . '</li>'
			. '</ul>',
	),
	array(
		'question' => __( 'Is Financial Crime Prevention Training mandatory in the US?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes, financial crime prevention training is mandatory for many regulated financial institutions in the US, although requirements depend on the sector, applicable regulations and employee responsibilities.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'Under the Bank Secrecy Act (BSA) and applicable FinCEN regulations, covered financial institutions must maintain AML programmes that include training for appropriate personnel.', 'akaza-adventure' ) . '</p>'
			. '<p>' . esc_html__( 'For other financial crime risks:', 'akaza-adventure' ) . '</p>'
			. '<ul>'
			. '<li>' . esc_html__( 'Anti-Bribery and Anti-Corruption: The Foreign Corrupt Practices Act (FCPA) does not specifically mandate employee training, but the Department of Justice (DOJ) recognises risk-based training as an important element of an effective compliance programme.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Trade Compliance and Sanctions: OFAC does not impose a universal training requirement, but its compliance framework identifies training as an essential component of a risk-based sanctions compliance programme.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Preventing Facilitation of Tax Evasion: There is no general federal requirement for organisations to provide specific tax-evasion prevention training, but relevant training is good compliance practice.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Insider Trading: Federal securities laws prohibit insider trading but do not impose a universal employee training requirement. Training is an important compliance control for employees with access to material non-public information.', 'akaza-adventure' ) . '</li>'
			. '<li>' . esc_html__( 'Failure to Prevent Fraud: There is no general federal requirement for all organisations to provide fraud prevention training, but risk-based training is good practice and supports an effective compliance programme.', 'akaza-adventure' ) . '</li>'
			. '</ul>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => '',
		'eyebrow'       => __( 'Common search and buyer questions', 'akaza-adventure' ),
		'title'         => __( 'Financial Crime Prevention FAQs', 'akaza-adventure' ),
		'description'   => __( 'Direct answers to questions organisations and employees commonly ask about financial crime prevention and employee training.', 'akaza-adventure' ),
		'items'         => $faq_items,
		'schema'        => true,
	)
);
