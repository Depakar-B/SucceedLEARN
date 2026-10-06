<?php
/**
 * Information Security Awareness Training (ISA Standard) — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an ISAT section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_isat_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/isat/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_isat_canonical_url() {
	$canonical = home_url( '/information-security-awareness-training/' );
	foreach ( array(
		'information-security-awareness-training',
		'isat',
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
function succeedlearn_amp_get_isat_page_title() {
	return __( 'Information Security Awareness Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_isat_meta_description() {
	return __( 'SucceedLEARN\'s Information Security Awareness Training equips employees with practical knowledge to recognize cyber threats, protect organizational information, and make safer security decisions across 10 focused modules.', 'succeedlearn-amp' );
}

/**
 * Hero image URL (desktop path).
 *
 * @return string
 */
function succeedlearn_amp_get_isat_hero_image() {
	return succeedlearn_amp_upload_url( '2026/01/Information-Security-Awareness-Hero-Section-1.webp' );
}

/**
 * Why-section image URL.
 *
 * @return string
 */
function succeedlearn_amp_get_isat_why_image() {
	return succeedlearn_amp_upload_url( '2026/10/ISA-Standard.webp' );
}

/**
 * Course screenshot URLs.
 *
 * @return string[]
 */
function succeedlearn_amp_get_isat_screenshots() {
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
 * "What will employees learn?" cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_isat_learn_items() {
	return array(
		array(
			'title' => __( 'Understand Their Role in Information Security', 'succeedlearn-amp' ),
			'text'  => __( 'Recognize how individual actions and everyday workplace decisions contribute to protecting organizational systems, information, and digital assets.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Recognise Common Cyber Threats', 'succeedlearn-amp' ),
			'text'  => __( 'Identify common security threats including phishing, social engineering, malware, suspicious online activity, and other techniques used to compromise information and systems.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Respond to Phishing & Social Engineering', 'succeedlearn-amp' ),
			'text'  => __( 'Understand different phishing techniques and learn how to assess suspicious communications before clicking, sharing information, or taking action.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Protect Accounts & Access', 'succeedlearn-amp' ),
			'text'  => __( 'Apply safer password practices and understand how authentication measures such as two-factor authentication and Multi-Factor Authentication (MFA) help protect organisational accounts.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Handle Information Securely', 'succeedlearn-amp' ),
			'text'  => __( 'Understand how information can be classified based on sensitivity and why different types of organisational information require appropriate handling and protection.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Protect Physical & Digital Assets', 'succeedlearn-amp' ),
			'text'  => __( 'Recognise the security considerations associated with laptops, mobile phones, removable storage devices, workspaces, and physical access.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Use AI More Safely', 'succeedlearn-amp' ),
			'text'  => __( 'Understand responsible use of AI tools and develop greater awareness of security risks associated with AI-enabled threats.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Identify & Report Security Incidents', 'succeedlearn-amp' ),
			'text'  => __( 'Recognize situations that may indicate a security incident and understand the importance of reporting potential threats promptly.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Module cards (10).
 *
 * @return array<int, array{title:string,tagline:string,text:string,topics:string,cta:string}>
 */
function succeedlearn_amp_get_isat_modules() {
	return array(
		array(
			'title'   => __( 'Account Security', 'succeedlearn-amp' ),
			'tagline' => __( 'Protect Accounts and Credentials', 'succeedlearn-amp' ),
			'text'    => __( 'Help employees understand secure authentication, password practices, MFA and the importance of protecting organisational accounts from unauthorised access.', 'succeedlearn-amp' ),
			'topics'  => __( 'Password Security · MFA · Authentication · Credential Protection · Account Access', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Account Security Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'AI-Based Attacks', 'succeedlearn-amp' ),
			'tagline' => __( 'Recognise Emerging AI-Enabled Threats', 'succeedlearn-amp' ),
			'text'    => __( 'Build employee awareness of how artificial intelligence can be used to create increasingly convincing phishing, impersonation, deepfake and social-engineering attacks.', 'succeedlearn-amp' ),
			'topics'  => __( 'AI-Generated Phishing · Deepfakes · Voice Impersonation · AI Social Engineering · Verification', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore AI-Based Attack Awareness Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Data Classification', 'succeedlearn-amp' ),
			'tagline' => __( 'Know the Information. Handle It Appropriately.', 'succeedlearn-amp' ),
			'text'    => __( 'Help employees understand different classifications of organisational information and why appropriate storage, access, sharing and handling matter.', 'succeedlearn-amp' ),
			'topics'  => __( 'Data Classification · Sensitive Information · Secure Handling · Data Sharing · Information Protection', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Data Classification Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Malware', 'succeedlearn-amp' ),
			'tagline' => __( 'Recognise Malicious Activity Before It Causes Harm', 'succeedlearn-amp' ),
			'text'    => __( 'Help employees recognise common malware risks and understand how malicious links, attachments, downloads and software can compromise organisational systems.', 'succeedlearn-amp' ),
			'topics'  => __( 'Malware · Ransomware · Malicious Attachments · Suspicious Links · Unsafe Downloads', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Malware Awareness Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Physical Security', 'succeedlearn-amp' ),
			'tagline' => __( 'Protect Information Beyond the Screen', 'succeedlearn-amp' ),
			'text'    => __( 'Build awareness around physical access, unattended devices, confidential documents, visitors and other workplace security risks.', 'succeedlearn-amp' ),
			'topics'  => __( 'Physical Access · Tailgating · Device Security · Clean Desk Practices · Visitor Awareness', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Physical Security Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Remote Work Security', 'succeedlearn-amp' ),
			'tagline' => __( 'Work Anywhere. Stay Security-Aware.', 'succeedlearn-amp' ),
			'text'    => __( 'Reinforce secure behaviors when employees access organizational information, systems and devices outside controlled office environments.', 'succeedlearn-amp' ),
			'topics'  => __( 'Remote Working · Wi-Fi Security · Device Protection · Secure Access · Working Outside the Office', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Remote Work Security Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Social Engineering', 'succeedlearn-amp' ),
			'tagline' => __( 'Recognize When Attackers Target People', 'succeedlearn-amp' ),
			'text'    => __( 'Help employees recognize manipulation, urgency, authority and impersonation techniques used to persuade people to disclose information or take unsafe actions.', 'succeedlearn-amp' ),
			'topics'  => __( 'Phishing · Smishing · Vishing · Impersonation · Suspicious Requests · Verification', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Social Engineering Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Vendor & Third-Party Risk Management', 'succeedlearn-amp' ),
			'tagline' => __( 'Understand Security Risks Beyond Your Organisation', 'succeedlearn-amp' ),
			'text'    => __( 'Help employees understand their security responsibilities when interacting with vendors, service providers and other external organisations.', 'succeedlearn-amp' ),
			'topics'  => __( 'Vendor Risk · Third-Party Security · Secure Data Sharing · Approved Vendors · Escalation', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Third-Party Risk Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Incident Reporting', 'succeedlearn-amp' ),
			'tagline' => __( 'Recognize It. Report It. Respond Faster.', 'succeedlearn-amp' ),
			'text'    => __( 'Help employees identify potential security incidents and understand why prompt reporting through the appropriate organisational channels matters.', 'succeedlearn-amp' ),
			'topics'  => __( 'Security Incidents · Warning Signs · Reporting · Escalation · Employee Responsibilities', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Incident Reporting Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Insider Threat', 'succeedlearn-amp' ),
			'tagline' => __( 'Recognise Risks From Within', 'succeedlearn-amp' ),
			'text'    => __( 'Help employees understand how malicious actions, negligence and compromised accounts can create insider risk and how suspicious activity should be reported.', 'succeedlearn-amp' ),
			'topics'  => __( 'Malicious Insiders · Negligent Behaviour · Compromised Accounts · Warning Signs · Reporting', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Insider Threat Training', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Learning element cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_isat_designed_elements() {
	return array(
		array(
			'title' => __( 'Animated Micro-Modules', 'succeedlearn-amp' ),
			'text'  => __( 'Visually engaging, animated explainers help simplify information security concepts and make learning easier to consume.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Real-World Cyberattack Scenarios', 'succeedlearn-amp' ),
			'text'  => __( 'Employees encounter practical scenarios that demonstrate how cyber threats and security risks can appear during everyday work.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Continuous Knowledge Checks', 'succeedlearn-amp' ),
			'text'  => __( 'Knowledge checks are incorporated throughout the course, allowing employees to apply what they have learned as they progress.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Practical Decision-Making', 'succeedlearn-amp' ),
			'text'  => __( 'Scenario-based activities encourage employees to think about how they would respond when faced with suspicious or potentially risky situations.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Final Assessment', 'succeedlearn-amp' ),
			'text'  => __( 'A structured final assessment helps evaluate employees\' understanding of the key security concepts covered throughout the course.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Topics covered.
 *
 * @return string[]
 */
function succeedlearn_amp_get_isat_topics() {
	return array(
		__( 'Account Security', 'succeedlearn-amp' ),
		__( 'AI-Based Attack', 'succeedlearn-amp' ),
		__( 'Data Classification', 'succeedlearn-amp' ),
		__( 'Malware', 'succeedlearn-amp' ),
		__( 'Physical Security', 'succeedlearn-amp' ),
		__( 'Remote Work Security', 'succeedlearn-amp' ),
		__( 'Social Engineering', 'succeedlearn-amp' ),
		__( 'Vendor and Third-Party Risk Management', 'succeedlearn-amp' ),
		__( 'Incident Reporting', 'succeedlearn-amp' ),
		__( 'Insider Threat', 'succeedlearn-amp' ),
	);
}

/**
 * "Why choose" cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_isat_choose_items() {
	return array(
		array(
			'title' => __( 'Build Foundational Cybersecurity Knowledge', 'succeedlearn-amp' ),
			'text'  => __( 'Give employees a practical understanding of the security risks they may encounter during everyday work.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Address the Human Element of Cyber Risk', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees recognize when attackers are targeting human behavior rather than attempting to defeat technology directly.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Cover Multiple Areas of Employee Risk', 'succeedlearn-amp' ),
			'text'  => __( 'Bring account security, data protection, malware, social engineering, remote work, physical security, third-party risk and emerging threats into one structured programme.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Reinforce Security Responsibilities', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees understand that protecting organisational information and systems is a shared responsibility.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Encourage Earlier Incident Reporting', 'succeedlearn-amp' ),
			'text'  => __( 'Give employees the awareness needed to recognize suspicious activity and understand when it should be escalated.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Support Wider Security & Compliance Objectives', 'succeedlearn-amp' ),
			'text'  => __( 'Information security awareness can form part of an organisation\'s wider cybersecurity, risk-management and compliance programme.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Audience cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_isat_audience_items() {
	return array(
		array(
			'title' => __( 'Employees Across Functions', 'succeedlearn-amp' ),
			'text'  => __( 'Build foundational information security awareness among employees across departments and job roles.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Employees Handling Sensitive Information', 'succeedlearn-amp' ),
			'text'  => __( 'Support employees who work with confidential, restricted, personal, or intellectual property information.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Managers & Senior Leaders', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness among employees who may be more frequently targeted through impersonation, social engineering, or targeted phishing attacks.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Remote & Hybrid Employees', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce security awareness for employees accessing organisational systems from home, public networks, or distributed working environments.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'New Joiners', 'succeedlearn-amp' ),
			'text'  => __( 'Introduce essential information security principles as part of employee onboarding and establish secure behaviours from the beginning.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * FAQ items (HTML answers for accordion).
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_isat_faq_items() {
	return array(
		array(
			'question' => __( 'What is information security awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Information security awareness training helps employees understand cybersecurity risks, recognise potential threats and develop safer behaviours when using organisational information, accounts, systems and devices.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Who should complete information security awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Training can be relevant to employees, managers, contractors and other users who access organisational information, systems, applications or devices.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What topics are covered in SucceedLEARN\'s Information Security Awareness Training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The programme includes Account Security, AI-Based Attack, Data Classification, Malware, Physical Security, Remote Work Security, Social Engineering, Vendor and Third-Party Risk Management, Incident Reporting and Insider Threat.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the training cover phishing and social engineering?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Social Engineering is a dedicated module within the programme and helps employees recognise manipulation, phishing, impersonation and suspicious requests.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the training cover AI-based cyber threats?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. The AI-Based Attack module builds awareness around emerging threats involving AI-enabled phishing, impersonation and other forms of AI-assisted social engineering.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the training include remote work security?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Remote Work Security addresses security behaviours relevant to employees accessing organisational information and systems outside controlled office environments.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the programme include insider threat awareness?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Insider Threat is one of the 10 modules and addresses malicious, negligent and compromised insider risks.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can the training support cybersecurity compliance programmes?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Information security awareness training can support broader cybersecurity, risk-management and compliance objectives. The specific training required should depend on the organisation\'s policies, risks and applicable framework or regulatory requirements.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can organisations deliver the training through their own LMS?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. SucceedLEARN supports SCORM-based delivery for organisations using their own learning management system, alongside SaaS delivery through SucceedLEARN.', 'succeedlearn-amp' ) . '</p>',
		),
	);
}

/**
 * FAQPage JSON-LD for the ISAT AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_isat_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_isat_faq_items() as $item ) {
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
