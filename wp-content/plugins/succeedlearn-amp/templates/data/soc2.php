<?php
/**
 * Information Security Awareness Training for SOC 2 Compliance — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a SOC 2 section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_soc2_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/soc2/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_soc2_canonical_url() {
	$canonical = home_url( '/information-security-awareness-training-for-soc-2-compliance/' );
	foreach ( array(
		'information-security-awareness-training-for-soc-2-compliance',
		'soc-2',
		'soc2',
	) as $slug ) {
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
function succeedlearn_amp_get_soc2_page_title() {
	return __( 'Information Security Awareness Training for SOC 2 Compliance', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_soc2_meta_description() {
	return __( 'SucceedLEARN\'s Information Security Awareness Training for SOC 2 Compliance builds practical employee security awareness across account security, data protection, social engineering, malware, insider threats, third-party risk, remote working, physical security and incident reporting.', 'succeedlearn-amp' );
}

/**
 * Hero image URL (local upload when present, live CDN otherwise).
 *
 * @return string
 */
function succeedlearn_amp_get_soc2_hero_image() {
	return succeedlearn_amp_upload_url( '2026/10/ISA-SOC2.webp' );
}

/**
 * Course screenshot URLs.
 *
 * @return string[]
 */
function succeedlearn_amp_get_soc2_screenshots() {
	$files = array(
		'2026/09/Soc-2-InfoSec-Course-Screenshots.webp',
		'2026/09/Soc-2-InfoSec-Course-Screenshots-2.webp',
		'2026/09/Soc-2-InfoSec-Course-Screenshots-3.webp',
		'2026/09/Soc-2-InfoSec-Course-Screenshots-4.webp',
		'2026/09/Soc-2-InfoSec-Course-Screenshots-5.webp',
		'2026/09/Soc-2-InfoSec-Course-Screenshots-6.webp',
		'2026/09/Soc-2-InfoSec-Course-Screenshots-7.webp',
		'2026/09/Soc-2-InfoSec-Course-Screenshots-8.webp',
		'2026/09/Soc-2-InfoSec-Course-Screenshots-9.webp',
	);

	return array_map( 'succeedlearn_amp_upload_url', $files );
}

/**
 * "What will employees learn?" bullet list.
 *
 * @return string[]
 */
function succeedlearn_amp_get_soc2_learn_items() {
	return array(
		__( 'Protect organisational accounts and authentication credentials.', 'succeedlearn-amp' ),
		__( 'Recognise phishing, impersonation and social-engineering attempts.', 'succeedlearn-amp' ),
		__( 'Handle sensitive information according to its classification.', 'succeedlearn-amp' ),
		__( 'Recognise malware and potentially unsafe digital activity.', 'succeedlearn-amp' ),
		__( 'Apply appropriate physical-security practices.', 'succeedlearn-amp' ),
		__( 'Work more securely in remote and hybrid environments.', 'succeedlearn-amp' ),
		__( 'Understand security risks associated with vendors and third parties.', 'succeedlearn-amp' ),
		__( 'Recognise insider threats and suspicious internal behaviour.', 'succeedlearn-amp' ),
		__( 'Identify and report potential information security incidents.', 'succeedlearn-amp' ),
		__( 'Understand how everyday employee actions can affect the organisation’s wider security control environment.', 'succeedlearn-amp' ),
	);
}

/**
 * Module cards.
 *
 * @return array<int, array{title:string,tagline:string,text:string,topics:string,cta:string}>
 */
function succeedlearn_amp_get_soc2_modules() {
	return array(
		array(
			'title'   => __( 'Account Security', 'succeedlearn-amp' ),
			'tagline' => __( 'Protect Accounts and Strengthen Access Security', 'succeedlearn-amp' ),
			'text'    => __( 'Employees learn why account security matters and how secure authentication practices help reduce the risk of unauthorised access.', 'succeedlearn-amp' ),
			'topics'  => __( 'Strong Password Creation · Password Security · NIST Guidance · 2FA · MFA Fatigue Attacks', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Account Security Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Data Classification', 'succeedlearn-amp' ),
			'tagline' => __( 'Handle Sensitive Information Appropriately', 'succeedlearn-amp' ),
			'text'    => __( 'Help employees understand how information is classified and why different types of data require different levels of protection.', 'succeedlearn-amp' ),
			'topics'  => __( 'Data Classification · Sensitive Information · Secure Handling · Data Sharing · Information Protection', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Data Classification Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Malware', 'succeedlearn-amp' ),
			'tagline' => __( 'Recognise Malicious Activity Before It Causes Harm', 'succeedlearn-amp' ),
			'text'    => __( 'Employees learn how malware can enter organisational environments and the behaviours that can reduce exposure.', 'succeedlearn-amp' ),
			'topics'  => __( 'Malware · Ransomware · Suspicious Links · Malicious Attachments · Unsafe Downloads', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Malware Awareness Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Physical Security', 'succeedlearn-amp' ),
			'tagline' => __( 'Protect Information Beyond Digital Systems', 'succeedlearn-amp' ),
			'text'    => __( 'Information security also depends on controlling physical access to devices, documents, workspaces and facilities.', 'succeedlearn-amp' ),
			'topics'  => __( 'Physical Access · Tailgating · Device Security · Clean Desk Practices · Visitor Awareness', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Physical Security Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Remote Work Security', 'succeedlearn-amp' ),
			'tagline' => __( 'Stay Security-Aware Outside the Office', 'succeedlearn-amp' ),
			'text'    => __( 'Employees learn safer behaviours for accessing organisational systems and information from remote and hybrid working environments.', 'succeedlearn-amp' ),
			'topics'  => __( 'Remote Working · Wi-Fi Security · Secure Access · Device Protection · Working Outside the Office', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Remote Work Security Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Social Engineering', 'succeedlearn-amp' ),
			'tagline' => __( 'Recognise When Attackers Target People', 'succeedlearn-amp' ),
			'text'    => __( 'Help employees identify manipulation, urgency, impersonation and phishing techniques used to influence employee behaviour.', 'succeedlearn-amp' ),
			'topics'  => __( 'Phishing · Smishing · Vishing · Impersonation · Suspicious Requests · Verification', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Social Engineering Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Vendor & Third-Party Risk Management', 'succeedlearn-amp' ),
			'tagline' => __( 'Understand Security Risks Beyond Your Organisation', 'succeedlearn-amp' ),
			'text'    => __( 'Employees learn why third-party relationships can introduce risk and how approved processes, secure information sharing and appropriate escalation help protect organisational information.', 'succeedlearn-amp' ),
			'topics'  => __( 'Vendor Risk · Third-Party Security · Secure Data Sharing · Approved Vendors · Escalation', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Third-Party Risk Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Incident Reporting', 'succeedlearn-amp' ),
			'tagline' => __( 'Recognise It. Report It. Respond Faster.', 'succeedlearn-amp' ),
			'text'    => __( 'Employees learn how to identify suspicious activity and why timely reporting through approved organisational channels matters.', 'succeedlearn-amp' ),
			'topics'  => __( 'Security Incidents · Warning Signs · Reporting · Escalation · Employee Responsibilities', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Incident Reporting Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Insider Threat', 'succeedlearn-amp' ),
			'tagline' => __( 'Recognise Security Risks From Within', 'succeedlearn-amp' ),
			'text'    => __( 'Help employees understand how malicious actions, negligence and compromised accounts can create insider risk.', 'succeedlearn-amp' ),
			'topics'  => __( 'Malicious Insiders · Negligent Behaviour · Compromised Accounts · Warning Signs · Reporting', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Insider Threat Training', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Security-objectives table rows.
 *
 * @return array<int, array{area:string,module:string,support:string}>
 */
function succeedlearn_amp_get_soc2_objective_rows() {
	return array(
		array(
			'area'    => __( 'Account & Access Security', 'succeedlearn-amp' ),
			'module'  => __( 'Account Security', 'succeedlearn-amp' ),
			'support' => __( 'Reinforces secure authentication, credential protection and access behaviours', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Information Protection', 'succeedlearn-amp' ),
			'module'  => __( 'Data Classification', 'succeedlearn-amp' ),
			'support' => __( 'Helps employees understand how sensitive information should be handled and protected', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Threat Awareness', 'succeedlearn-amp' ),
			'module'  => __( 'Malware', 'succeedlearn-amp' ),
			'support' => __( 'Builds awareness around malicious software, suspicious files and unsafe digital behaviour', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Physical Protection', 'succeedlearn-amp' ),
			'module'  => __( 'Physical Security', 'succeedlearn-amp' ),
			'support' => __( 'Reinforces secure behaviour around physical access, devices and workplace information', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Distributed Workforce Security', 'succeedlearn-amp' ),
			'module'  => __( 'Remote Work Security', 'succeedlearn-amp' ),
			'support' => __( 'Addresses security risks associated with accessing organisational systems outside controlled environments', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Human-Layer Threats', 'succeedlearn-amp' ),
			'module'  => __( 'Social Engineering', 'succeedlearn-amp' ),
			'support' => __( 'Helps employees recognise phishing, manipulation and impersonation attempts', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Third-Party Security', 'succeedlearn-amp' ),
			'module'  => __( 'Vendor & Third-Party Risk Management', 'succeedlearn-amp' ),
			'support' => __( 'Reinforces secure employee behaviour when interacting with vendors and external parties', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Security Event Awareness', 'succeedlearn-amp' ),
			'module'  => __( 'Incident Reporting', 'succeedlearn-amp' ),
			'support' => __( 'Helps employees recognise and escalate suspicious activity', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Internal Security Risk', 'succeedlearn-amp' ),
			'module'  => __( 'Insider Threat', 'succeedlearn-amp' ),
			'support' => __( 'Builds awareness around malicious, negligent and compromised insider behaviour', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Learning element cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_soc2_learning_elements() {
	return array(
		array(
			'title' => __( 'Focused Learning Modules', 'succeedlearn-amp' ),
			'text'  => __( 'Individual modules address specific areas of information security, allowing employees to build knowledge across the risks most relevant to their work.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Scenario-Based Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Workplace situations help employees connect information security principles with decisions they may encounter in practice.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Knowledge Checks', 'succeedlearn-amp' ),
			'text'  => __( 'Interactive questions reinforce important concepts and help learners check their understanding.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Final Assessment', 'succeedlearn-amp' ),
			'text'  => __( 'A final assessment helps evaluate learner understanding after completion of the assigned training.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Flexible Online Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Training can be accessed digitally across supported devices for office-based, remote and hybrid workforces.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * "Why choose" cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_soc2_choose_items() {
	return array(
		array(
			'title' => __( 'Support Your SOC 2 Readiness Programme', 'succeedlearn-amp' ),
			'text'  => __( 'Build employee awareness around security risks and behaviors that may support controls within the organization\'s SOC 2 environment.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Strengthen Account and Access Behavior', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce password, authentication and credential-protection practices among employees.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Protect Sensitive Information', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees understand information classification and secure handling matters are important.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Reduce Human-Layer Cyber Risk', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness around phishing, social engineering, malware and insider threats.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Strengthen Third-Party Security Awareness', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees understand the security implications of working with vendors and external service providers.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Encourage Faster Incident Reporting', 'succeedlearn-amp' ),
			'text'  => __( 'Give employees greater confidence to recognise and report suspicious activity.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Maintain Evidence of Awareness Activity', 'succeedlearn-amp' ),
			'text'  => __( 'Training completion and assessment records can form part of an organisation’s evidence that employee awareness activities have taken place. The specific evidence needed for a SOC 2 examination depends on the organisation’s controls and the auditor’s procedures.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Audience cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_soc2_audience_items() {
	return array(
		array(
			'title' => __( 'Employees Across the Organization', 'succeedlearn-amp' ),
			'text'  => __( 'Build foundational information security awareness among users who access organizational systems and data.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'New Joiners', 'succeedlearn-amp' ),
			'text'  => __( 'Introduce security responsibilities and expected behaviors during onboarding.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Remote & Hybrid Employees', 'succeedlearn-amp' ),
			'text'  => __( 'Address risks associated with accessing organizational resources outside controlled office environments.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Employees Handling Sensitive Data', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce secure classification, handling and sharing of sensitive organizational information.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Employees Working with Vendors', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness around third-party relationships and secure information sharing.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Managers & People Leaders', 'succeedlearn-amp' ),
			'text'  => __( 'Help leaders understand the security behaviors expected within their teams.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Contractors & Relevant Third Parties', 'succeedlearn-amp' ),
			'text'  => __( 'Extend appropriate awareness to other users with access to organizational systems or information where applicable.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * FAQ items (HTML answers for accordion).
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_soc2_faq_items() {
	return array(
		array(
			'question' => __( 'What is SOC 2 security awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'SOC 2 security awareness training refers to employee information security training designed to reinforce behaviors relevant to an organization\'s security control environment and SOC 2 readiness programme.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does SOC 2 require employee security awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'SOC 2 evaluates controls relevant to the applicable Trust Services Criteria. Organisations commonly include employee security awareness activities within their control environment, but the specific training needed depends on the organization\'s systems, risks, policies and controls.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does SOC 2 specify mandatory cybersecurity training topics?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'No. SOC 2 does not prescribe one universal employee-training syllabus. Training topics should reflect the organization\'s security risks, responsibilities, systems and control environment.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Which security awareness topics are covered in SucceedLEARN’s SOC 2-focused training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The core programme includes Account Security, Data Classification, Malware, Physical Security, Remote Work Security, Social Engineering, Vendor and Third-Party Risk Management, Incident Reporting and Insider Threat.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Is phishing awareness relevant to SOC 2?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes, phishing and social engineering can be relevant to an organization\'s security-awareness programme because they can compromise accounts, systems and information. The degree of relevance depends on the organization\'s particular control environment.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Is data classification training relevant to SOC 2?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'It can be particularly relevant where employees handle sensitive or confidential information and organizational controls require that data be identified, handled or shared appropriately.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Is third-party risk awareness relevant to SOC 2?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Third-party relationships can affect an organization\'s security environment, and employee awareness can support secure interaction with vendors and service providers.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Is AI-based attack awareness required for SOC 2?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'SOC 2 does not prescribe a standalone AI-awareness requirement. SucceedLEARN offers AI-Based Attack Awareness as an additional module for organizations that want to address emerging AI-enabled cyber risks.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can training completion support a SOC 2 audit?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Training records can help demonstrate that awareness activities were performed. However, the evidence required in a SOC 2 examination depends on the organization\'s controls and the procedures performed by the service auditor.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does completing the training make an organization SOC 2 compliant?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'No. Information security awareness training can support a wider SOC 2 readiness programme, but completing a course alone does not establish SOC 2 compliance or result in a SOC 2 report.', 'succeedlearn-amp' ) . '</p>',
		),
	);
}

/**
 * FAQPage JSON-LD for the SOC 2 AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_soc2_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_soc2_faq_items() as $item ) {
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
