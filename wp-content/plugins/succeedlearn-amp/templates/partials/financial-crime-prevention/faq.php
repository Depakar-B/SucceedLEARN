<?php
/**
 * Financial Crime Prevention AMP — Faq section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is Financial Crime Prevention?', 'succeedlearn-amp' ),
		'answer'   => __( 'Financial Crime Prevention is the process of identifying, preventing and responding to financial crime risks through effective policies, internal controls, due diligence and employee awareness. It helps organisations reduce exposure to risks such as money laundering, bribery, fraud, sanctions breaches and tax evasion.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'What is Financial Crime Prevention Training?', 'succeedlearn-amp' ),
		'answer'   => __( 'Financial Crime Prevention Training equips employees to recognise financial crime risks, identify red flags, follow internal procedures and report concerns appropriately. Practical, scenario-based learning helps employees apply compliance principles in everyday business situations.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'What is the difference between Anti-Money Laundering (AML) and Financial Crime Prevention?', 'succeedlearn-amp' ),
		'answer'   => __( 'Anti-Money Laundering (AML) focuses on preventing money laundering and terrorist financing, while Financial Crime Prevention is broader and also covers bribery, corruption, sanctions, fraud, tax evasion, insider trading and market abuse. AML forms one key part of a wider financial crime compliance programme.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Is Counter-Terrorist Financing (CTF) part of AML?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. Counter-Terrorist Financing (CTF) is typically addressed alongside Anti-Money Laundering because both aim to prevent the misuse of financial systems. AML focuses on illicit funds, while CTF focuses on preventing funds from supporting terrorist activities.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Who should complete Financial Crime Prevention Training?', 'succeedlearn-amp' ),
		'answer'   => __( 'Financial Crime Prevention Training should be completed by employees in Compliance, Risk, Internal Audit, Finance, Operations, Procurement, Sales, Customer-Facing roles, Senior Management, and anyone handling customers, payments, third-party relationships or confidential information.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'What topics are covered in Financial Crime Prevention Training?', 'succeedlearn-amp' ),
		'answer'   => __( 'The training covers AML, CTF, KYC, Anti-Bribery and Anti-Corruption (ABAC), Trade Compliance and Sanctions, Prevention of Tax Evasion, Insider Trading and Market Abuse, Failure to Prevent Fraud, along with red flags, reporting procedures and practical workplace scenarios.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Why is Financial Crime Prevention Training important?', 'succeedlearn-amp' ),
		'answer'   => __( 'Financial Crime Prevention Training helps employees recognise suspicious activity, make informed decisions and comply with organisational policies. It strengthens compliance programmes, reduces financial and reputational risks, and promotes a culture of ethical business conduct.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'How often should employees complete Financial Crime Prevention Training?', 'succeedlearn-amp' ),
		'answer'   => __( 'Employees should complete Financial Crime Prevention Training regularly, with the frequency determined by applicable regulations, their role and the organisation\'s financial crime risk exposure. There is no single training frequency that applies to every organisation or every financial crime topic. As good practice, organisations should provide training during onboarding, before or soon after employees take on relevant responsibilities; periodically thereafter, commonly on an annual basis for employees exposed to financial crime risks; when laws, regulations or internal policies change significantly; when new or emerging financial crime risks arise, including new fraud, sanctions or money laundering typologies; and when an employee\'s role or responsibilities change, particularly where this increases their exposure to financial crime risks. Higher-risk or regulated roles can require more frequent or targeted refresher training.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Can Financial Crime Prevention Training be customised?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. SucceedLEARN\'s courses can be customised to reflect your organisation\'s policies, procedures, branding, reporting routes and industry-specific compliance requirements.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Are SucceedLEARN\'s Financial Crime Prevention courses CPD Certified?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes. All Financial Crime Prevention courses are CPD Certified, helping organisations provide independently recognised professional learning while supporting ongoing employee development.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'How is SucceedLEARN\'s Financial Crime Prevention Training delivered?', 'succeedlearn-amp' ),
		'answer'   => __( 'Training can be delivered through SucceedLEARN\'s hosted learning platform or as SCORM-compatible content for your existing LMS, with assessments, learner tracking and completion certificates included.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Is Financial Crime Prevention Training mandatory in the UK?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes, financial crime prevention training is mandatory for many regulated organisations in the UK, although requirements vary by topic, sector and employee role. Under the Money Laundering Regulations 2017, regulated businesses must provide relevant employees with regular training on money laundering, terrorist financing and proliferation financing. For other financial crime risks: Anti-Bribery and Anti-Corruption (ABAC) training is not universally mandatory under the Bribery Act 2010, but is recognised in government guidance as an important part of adequate bribery-prevention procedures. Trade Compliance and Sanctions training is not universally mandated, but appropriate staff training is good practice and supports effective sanctions compliance. Preventing Facilitation of Tax Evasion: the Criminal Finances Act 2017 does not mandate specific training, but training supports the reasonable prevention procedures organisations should implement. Insider Trading training requirements apply to certain regulated firms and relevant staff under UK market-abuse rules. Failure to Prevent Fraud: the Economic Crime and Corporate Transparency Act 2023 does not mandate a specific training course, but government guidance identifies communication and training as part of reasonable fraud-prevention procedures.', 'succeedlearn-amp' ),
	),
	array(
		'question' => __( 'Is Financial Crime Prevention Training mandatory in the US?', 'succeedlearn-amp' ),
		'answer'   => __( 'Yes, financial crime prevention training is mandatory for many regulated financial institutions in the US, although requirements depend on the sector, applicable regulations and employee responsibilities. Under the Bank Secrecy Act (BSA) and applicable FinCEN regulations, covered financial institutions must maintain AML programmes that include training for appropriate personnel. For other financial crime risks: Anti-Bribery and Anti-Corruption training under the Foreign Corrupt Practices Act (FCPA) is not specifically mandated, but the Department of Justice (DOJ) recognises risk-based training as an important element of an effective compliance programme. Trade Compliance and Sanctions: OFAC does not impose a universal training requirement, but its compliance framework identifies training as an essential component of a risk-based sanctions compliance programme. Preventing Facilitation of Tax Evasion: there is no general federal requirement for organisations to provide specific tax-evasion prevention training, but relevant training is good compliance practice. Insider Trading: federal securities laws prohibit insider trading but do not impose a universal employee training requirement. Training is an important compliance control for employees with access to material non-public information. Failure to Prevent Fraud: there is no general federal requirement for all organisations to provide fraud prevention training, but risk-based training is good practice and supports an effective compliance programme.', 'succeedlearn-amp' ),
	),
);
?>
<section class="sl-section">
	<div class="sl-wrap">
		<p class="sl-eyebrow"><?php esc_html_e( 'Common search and buyer questions', 'succeedlearn-amp' ); ?></p>
		<h2 class="sl-h2"><?php esc_html_e( 'Financial Crime Prevention FAQs', 'succeedlearn-amp' ); ?></h2>
		<p class="sl-lead"><?php esc_html_e( 'Direct answers to questions organisations and employees commonly ask about financial crime prevention and employee training.', 'succeedlearn-amp' ); ?></p>
		<?php succeedlearn_amp_render_faq_accordion( $faq_items ); ?>
	</div>
</section>
