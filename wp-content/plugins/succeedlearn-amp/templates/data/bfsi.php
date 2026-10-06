<?php
/**
 * Cybersecurity Awareness Training for BFSI & PE/VC — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a BFSI & PE/VC section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_bfsi_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/bfsi/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_bfsi_canonical_url() {
	$canonical = home_url( '/security-awareness-training-bfsi-pe-vc/' );
	foreach ( array(
		'security-awareness-training-bfsi-pe-vc',
		'bfsi-pe-vc',
		'bfsi',
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
function succeedlearn_amp_get_bfsi_page_title() {
	return __( 'Cybersecurity Awareness Training for BFSI & PE/VC', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_bfsi_meta_description() {
	return __( 'SucceedLEARN\'s Cybersecurity Awareness Training for BFSI & PE/VC helps financial-services employees recognise social engineering, insider threats, physical security risks, data privacy issues, third-party exposure and AI-enabled attacks.', 'succeedlearn-amp' );
}

/**
 * Hero image URL (local upload when present, live CDN otherwise).
 *
 * @return string
 */
function succeedlearn_amp_get_bfsi_hero_image() {
	return succeedlearn_amp_upload_url( '2026/10/BFSIPEVC.webp' );
}

/**
 * "Why it matters" image URL.
 *
 * @return string
 */
function succeedlearn_amp_get_bfsi_why_image() {
	return succeedlearn_amp_upload_url( '2026/01/BFSI-and-PE-VC-Security-Awareness-Hero-Section-1.webp' );
}

/**
 * Resolve a course page permalink, falling back to a default URL.
 *
 * @param string $slug     Page slug.
 * @param string $fallback Fallback URL.
 * @return string
 */
function succeedlearn_amp_get_bfsi_course_url( $slug, $fallback = '' ) {
	$page = get_page_by_path( (string) $slug );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			return $link;
		}
	}
	return '' !== $fallback ? $fallback : succeedlearn_amp_get_bfsi_canonical_url() . '#contact';
}

/**
 * Course screenshot URLs.
 *
 * @return string[]
 */
function succeedlearn_amp_get_bfsi_screenshots() {
	$urls = array();
	for ( $i = 1; $i <= 8; $i++ ) {
		$urls[] = succeedlearn_amp_upload_url( '2026/09/BFSI-PEVC-Course-Screenshot-' . $i . '.webp' );
	}
	return $urls;
}

/**
 * "What will employees learn?" bullet list.
 *
 * @return string[]
 */
function succeedlearn_amp_get_bfsi_learn_items() {
	return array(
		__( 'Recognize phishing, vishing, smishing, and other social-engineering techniques.', 'succeedlearn-amp' ),
		__( 'Identify warning signs associated with malicious, negligent, and compromised insider threats.', 'succeedlearn-amp' ),
		__( 'Apply appropriate physical security practices in the workplace.', 'succeedlearn-amp' ),
		__( 'Understand how personal and sensitive information should be handled and protected.', 'succeedlearn-amp' ),
		__( 'Recognize risks associated with third parties, vendors, and external data sharing.', 'succeedlearn-amp' ),
		__( 'Identify AI-enabled phishing, deepfakes, and impersonation attempts.', 'succeedlearn-amp' ),
		__( 'Verify suspicious requests before taking action.', 'succeedlearn-amp' ),
		__( 'Recognize when a security or privacy incident may have occurred.', 'succeedlearn-amp' ),
		__( 'Follow appropriate reporting and escalation procedures.', 'succeedlearn-amp' ),
		__( 'Understand how everyday employee decisions can affect organizational cybersecurity.', 'succeedlearn-amp' ),
	);
}

/**
 * Cybersecurity risk cards.
 *
 * @return array<int, array{title:string,copy:string[],topics:string,image:string,alt:string}>
 */
function succeedlearn_amp_get_bfsi_risks() {
	return array(
		array(
			'title'  => __( 'Social Engineering', 'succeedlearn-amp' ),
			'copy'   => array(
				__( 'Social-engineering attacks exploit trust, urgency, authority and human behaviour to persuade employees to disclose information, transfer funds, provide credentials or take unsafe actions.', 'succeedlearn-amp' ),
				__( 'Employees learn to recognise different forms of phishing and impersonation across email, SMS, telephone and video, identify common warning signs and apply appropriate verification and reporting steps.', 'succeedlearn-amp' ),
			),
			'topics' => __( 'Phishing · Smishing · Vishing · Impersonation · Suspicious Requests · Verification · Reporting', 'succeedlearn-amp' ),
			'image'  => succeedlearn_amp_upload_url( '2026/09/Social-Engineering-Awareness.webp' ),
			'alt'    => __( 'Social engineering awareness for financial-services employees', 'succeedlearn-amp' ),
		),
		array(
			'title'  => __( 'Insider Threats', 'succeedlearn-amp' ),
			'copy'   => array(
				__( 'Not every cybersecurity threat originates outside the organisation.', 'succeedlearn-amp' ),
				__( 'The course introduces malicious, negligent and compromised insider threats, helping employees understand how legitimate access can be misused intentionally, accidentally or after an account has been compromised.', 'succeedlearn-amp' ),
				__( 'Learners explore warning signs, preventative behaviours and appropriate reporting actions.', 'succeedlearn-amp' ),
			),
			'topics' => __( 'Malicious Insiders · Negligent Behaviour · Compromised Accounts · Data Misuse · Reporting', 'succeedlearn-amp' ),
			'image'  => succeedlearn_amp_upload_url( '2026/09/Insider-Risk-and-Trust-management.webp' ),
			'alt'    => __( 'Insider threat awareness training', 'succeedlearn-amp' ),
		),
		array(
			'title'  => __( 'Physical Security', 'succeedlearn-amp' ),
			'copy'   => array(
				__( 'Cybersecurity also depends on protecting physical access to people, devices, documents and facilities.', 'succeedlearn-amp' ),
				__( 'Employees learn to recognise risks such as tailgating, unsecured devices, forged or misused access credentials and unattended confidential information, while reinforcing appropriate workplace security practices.', 'succeedlearn-amp' ),
			),
			'topics' => __( 'Access Control · Tailgating · Device Security · Visitor Security · Confidential Information', 'succeedlearn-amp' ),
			'image'  => succeedlearn_amp_upload_url( '2026/09/Workplace-Security-Asset-protection.webp' ),
			'alt'    => __( 'Physical security awareness in the workplace', 'succeedlearn-amp' ),
		),
		array(
			'title'  => __( 'Data Privacy', 'succeedlearn-amp' ),
			'copy'   => array(
				__( 'Employees regularly interact with personal and sensitive information, making appropriate data handling an important part of security awareness.', 'succeedlearn-amp' ),
				__( 'The training helps learners distinguish different types of personal information and understand principles around lawful processing, data handling, retention, data-subject requests, incident reporting, third-party sharing and cross-border transfers.', 'succeedlearn-amp' ),
				__( 'It also introduces privacy considerations associated with AI.', 'succeedlearn-amp' ),
			),
			'topics' => __( 'Personal Data · Sensitive Data · Data Handling · DSARs · Data Incidents · Third-Party Sharing · Responsible AI', 'succeedlearn-amp' ),
			'image'  => succeedlearn_amp_upload_url( '2026/09/Data-Protection-Privacy-Essentials.webp' ),
			'alt'    => __( 'Data privacy awareness for BFSI and PE/VC employees', 'succeedlearn-amp' ),
		),
		array(
			'title'  => __( 'Third-Party Risk', 'succeedlearn-amp' ),
			'copy'   => array(
				__( 'Vendors, service providers and external platforms can introduce cybersecurity and data-protection risks even when an organisation maintains strong internal controls.', 'succeedlearn-amp' ),
				__( 'Employees learn their role in following approved processes for vendor engagement, data sharing, onboarding and escalation, helping ensure established third-party controls are followed in day-to-day work.', 'succeedlearn-amp' ),
			),
			'topics' => __( 'Vendor Risk · Approved Third Parties · Secure Data Sharing · Due Diligence · Escalation', 'succeedlearn-amp' ),
			'image'  => succeedlearn_amp_upload_url( '2026/09/Third-party-Security-Governance.webp' ),
			'alt'    => __( 'Third-party risk awareness for financial services', 'succeedlearn-amp' ),
		),
		array(
			'title'  => __( 'AI-Based Attacks', 'succeedlearn-amp' ),
			'copy'   => array(
				__( 'Artificial intelligence is increasing the realism and scalability of social-engineering and impersonation attempts.', 'succeedlearn-amp' ),
				__( 'The course helps employees recognize AI-generated phishing, deepfake video, voice impersonation, and other AI-enabled deception techniques, including disinformation, market manipulation and data leak risks.', 'succeedlearn-amp' ),
			),
			'topics' => __( 'Deepfakes · Voice Cloning · AI Phishing · Impersonation · Disinformation & Market Manipulation · Data Leak Risks', 'succeedlearn-amp' ),
			'image'  => succeedlearn_amp_upload_url( '2026/09/AI-Enabled-Cyber-Risk.webp' ),
			'alt'    => __( 'AI-based cyberattack awareness', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Financial-services scenarios list.
 *
 * @return string[]
 */
function succeedlearn_amp_get_bfsi_scenarios() {
	return array(
		__( 'Urgent payment instructions appearing to come from senior leadership.', 'succeedlearn-amp' ),
		__( 'Investor or executive impersonation through email, telephone or video.', 'succeedlearn-amp' ),
		__( 'Requests to share confidential information with external parties.', 'succeedlearn-amp' ),
		__( 'Suspicious vendor communications involving organisational or customer data.', 'succeedlearn-amp' ),
		__( 'Unusual internal activity that could indicate negligent, malicious or compromised behaviour.', 'succeedlearn-amp' ),
		__( 'AI-generated communications designed to make fraudulent instructions appear authentic.', 'succeedlearn-amp' ),
		__( 'Physical attempts to access restricted areas, devices or information.', 'succeedlearn-amp' ),
	);
}

/**
 * Laws & regulations table rows.
 *
 * @return array<int, array{law:string,relevance:string}>
 */
function succeedlearn_amp_get_bfsi_law_rows() {
	return array(
		array(
			'law'       => __( 'General Data Protection Regulation (GDPR)', 'succeedlearn-amp' ),
			'relevance' => __( 'The Data Privacy Training is designed to operationalise GDPR requirements by training employees on lawful basis, personal and special-category data handling, data minimisation, retention, DSAR routing, breach identification and 72-hour reporting, third-party sharing, cross-border transfers, and accountability, helping employers demonstrate compliance through workforce awareness and defensible controls.', 'succeedlearn-amp' ),
		),
		array(
			'law'       => __( 'EU Digital Operational Resilience Act (DORA)', 'succeedlearn-amp' ),
			'relevance' => __( 'Establishes direct accountability for organisations, particularly financial entities, for ICT (Information and Communication Technology) and security risks arising from third-party service providers, making employee awareness of vendor onboarding, data sharing, and ongoing oversight a regulatory necessity addressed by this training.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Learning element cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_bfsi_learning_elements() {
	return array(
		array(
			'title' => __( 'Animated Explainers', 'succeedlearn-amp' ),
			'text'  => __( 'Visually engaging animated explainers help employees understand cybersecurity concepts in a clear, accessible way.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Narrated Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Concise narrated learning keeps attention on the behaviours that matter in financial-services work.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Real-World Cases', 'succeedlearn-amp' ),
			'text'  => __( 'Real-world case examples connect security awareness with situations employees may actually encounter.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Knowledge Checks', 'succeedlearn-amp' ),
			'text'  => __( 'Frequent knowledge checks and quizzes reinforce understanding throughout the learning journey.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Final Assessment', 'succeedlearn-amp' ),
			'text'  => __( 'A final assessment checks whether employees can apply the security behaviours covered in the course.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Course outline modules.
 *
 * @return array<int, array{title:string,topics:string[]}>
 */
function succeedlearn_amp_get_bfsi_outline_modules() {
	return array(
		array(
			'title'  => __( 'Social Engineering', 'succeedlearn-amp' ),
			'topics' => array(
				__( 'Introduction', 'succeedlearn-amp' ),
				__( 'Your Role', 'succeedlearn-amp' ),
				__( 'Types of Phishing', 'succeedlearn-amp' ),
				__( 'Spot Phishing Scams with the SCAR Test', 'succeedlearn-amp' ),
				__( 'Calls & Video: Verify with CALL-BACK', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'  => __( 'Insider Threat', 'succeedlearn-amp' ),
			'topics' => array(
				__( 'What is an Insider Threat?', 'succeedlearn-amp' ),
				__( 'Examples of Insider Threats', 'succeedlearn-amp' ),
				__( 'Preventing Insider Threats', 'succeedlearn-amp' ),
				__( 'What to Do if You Suspect an Insider Threat?', 'succeedlearn-amp' ),
				__( 'Consequences of Misuse', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'  => __( 'Physical Threat', 'succeedlearn-amp' ),
			'topics' => array(
				__( 'Introduction', 'succeedlearn-amp' ),
				__( 'Case Study', 'succeedlearn-amp' ),
				__( 'Your Safeguards', 'succeedlearn-amp' ),
				__( 'Employee Responsibilities', 'succeedlearn-amp' ),
				__( 'Consequences of Non-Compliance', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'  => __( 'Data Privacy Training', 'succeedlearn-amp' ),
			'topics' => array(
				__( 'Foundations & Principles', 'succeedlearn-amp' ),
				__( 'Handling Personal Data & Classification', 'succeedlearn-amp' ),
				__( 'Incident Response & Breach Reporting', 'succeedlearn-amp' ),
				__( 'Third-Party Sharing & Cross-Border Transfers', 'succeedlearn-amp' ),
				__( 'Privacy Culture & Responsible AI', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'  => __( 'Third Party Risk', 'succeedlearn-amp' ),
			'topics' => array(
				__( 'Why Third-Party Risk Matters', 'succeedlearn-amp' ),
				__( 'How Your Firm Manages Third-Party Risk', 'succeedlearn-amp' ),
				__( 'Your Role in Managing Third-Party Risk', 'succeedlearn-amp' ),
				__( 'Best Practices for Third-Party Data Sharing', 'succeedlearn-amp' ),
				__( 'Consequences of Non-Compliance', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'  => __( 'AI Based Attacks', 'succeedlearn-amp' ),
			'topics' => array(
				__( 'Types of AI-based Attacks', 'succeedlearn-amp' ),
				__( 'Deepfakes & AI-generated Phishing', 'succeedlearn-amp' ),
				__( 'Disinformation & Market Manipulation', 'succeedlearn-amp' ),
				__( 'Learner’s Role', 'succeedlearn-amp' ),
				__( 'What Happens If You Miss Out', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * Case study cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_bfsi_cases() {
	return array(
		array(
			'title' => __( 'Interserve Group Limited (UK)', 'succeedlearn-amp' ),
			'text'  => __( 'Interserve Group Limited (UK) was fined £4.4 million by the UK Information Commissioner’s Office (ICO) after a phishing email enabled attackers to access internal systems and compromise the personal data of over 100,000 employees. The regulator concluded that the breach stemmed from a social-engineering attack combined with inadequate security awareness and response controls, highlighting the compliance risk of insufficient employee training.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Morgan Stanley: Insider Data Misuse (United States)', 'succeedlearn-amp' ),
			'text'  => __( 'In 2016, Morgan Stanley faced regulatory action after a former financial advisor misused authorised system access to extract data relating to approximately 350,000 client accounts and attempted to transfer it externally. The incident resulted in enforcement scrutiny, litigation exposure, reputational damage, and a significant compliance remediation programme, highlighting how failure to adequately prevent, monitor, and train employees on insider threat risks can lead to severe regulatory and business consequences.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Target Corporation (2013)', 'succeedlearn-amp' ),
			'text'  => __( 'A major data breach occurred after attackers accessed Target’s network through a compromised third-party vendor, exposing millions of customer records. Target paid USD 18.5 million in regulatory settlements with U.S. states and incurred substantial remediation and legal costs, highlighting how weak third-party oversight and lack of employee awareness can lead to severe financial and reputational consequences.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * "Why choose" cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_bfsi_choose_items() {
	return array(
		array(
			'title' => __( 'Protect Sensitive Financial and Investor Information', 'succeedlearn-amp' ),
			'text'  => __( 'Employees across BFSI and PE/VC may access confidential financial, customer, investor, employee and transaction information. Awareness training helps reinforce the behaviours needed to protect that information.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Strengthen the Human Layer of Cybersecurity', 'succeedlearn-amp' ),
			'text'  => __( 'Technical controls remain essential, but attackers also target employees through manipulation, impersonation and fraudulent requests. Training helps employees recognise when they are being targeted.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Reduce Social-Engineering and Fraud Risk', 'succeedlearn-amp' ),
			'text'  => __( 'Employees learn to slow down, verify suspicious requests and report potential threats before acting, which is particularly important when instructions involve payments, credentials, sensitive information or senior executives.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Address Emerging AI-Enabled Threats', 'succeedlearn-amp' ),
			'text'  => __( 'Deepfakes, voice cloning and AI-generated phishing make fraudulent communications increasingly convincing. Employees need practical verification habits, not simply awareness that AI threats exist.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Reinforce Third-Party Security Behaviour', 'succeedlearn-amp' ),
			'text'  => __( 'Training helps employees understand their responsibilities when working with vendors, service providers and external platforms.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Encourage Earlier Incident Reporting', 'succeedlearn-amp' ),
			'text'  => __( 'Employees who can recognise suspicious activity and know how to escalate it can help security teams investigate and respond earlier.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Audience bullet list.
 *
 * @return string[]
 */
function succeedlearn_amp_get_bfsi_audience_items() {
	return array(
		__( 'Finance and investment professionals handling transactions, investor information and financial data.', 'succeedlearn-amp' ),
		__( 'Senior leaders and executive assistants who may be targeted by impersonation, whaling and deepfake attacks.', 'succeedlearn-amp' ),
		__( 'Customer and client-facing employees receiving external communications and handling sensitive information.', 'succeedlearn-amp' ),
		__( 'HR, Legal, Risk and Compliance teams working with personal, confidential or regulated information.', 'succeedlearn-amp' ),
		__( 'IT and Information Security teams responsible for systems, access and security controls.', 'succeedlearn-amp' ),
		__( 'Employees working with vendors and service providers who may introduce third-party risks.', 'succeedlearn-amp' ),
		__( 'Remote and hybrid employees accessing organisational information outside controlled office environments.', 'succeedlearn-amp' ),
		__( 'All employees and contractors who access organisational systems, data or physical premises.', 'succeedlearn-amp' ),
	);
}

/**
 * Related training cards.
 *
 * @return array<int, array{title:string,href:string}>
 */
function succeedlearn_amp_get_bfsi_more_courses() {
	return array(
		array(
			'title' => __( 'Security Tips for Remote Workforce', 'succeedlearn-amp' ),
			'href'  => succeedlearn_amp_get_bfsi_course_url( 'remote-workforce-security-training', 'https://succeedlearn.com/courses/remote-workforce-security-training/' ),
		),
		array(
			'title' => __( 'Political Donations', 'succeedlearn-amp' ),
			'href'  => succeedlearn_amp_get_bfsi_course_url( 'political-donations-pe-vc' ),
		),
		array(
			'title' => __( 'Security & Privacy Awareness Training: UK', 'succeedlearn-amp' ),
			'href'  => succeedlearn_amp_get_bfsi_course_url( 'information-security-awareness-training-for-uk-cyber-essentials' ),
		),
		array(
			'title' => __( 'Gifts and Entertainment', 'succeedlearn-amp' ),
			'href'  => succeedlearn_amp_get_bfsi_course_url( 'gifts-and-entertainment' ),
		),
		array(
			'title' => __( 'Whistleblowing', 'succeedlearn-amp' ),
			'href'  => succeedlearn_amp_get_bfsi_course_url( 'whistleblowing-pe-vc' ),
		),
		array(
			'title' => __( 'SMCR Training: Senior Managers', 'succeedlearn-amp' ),
			'href'  => succeedlearn_amp_get_bfsi_course_url( 'smcr-pe-vc' ),
		),
		array(
			'title' => __( 'SMCR Training: Employees', 'succeedlearn-amp' ),
			'href'  => succeedlearn_amp_get_bfsi_course_url( 'smcr-pe-vc' ),
		),
		array(
			'title' => __( 'Modern Slavery Awareness', 'succeedlearn-amp' ),
			'href'  => succeedlearn_amp_get_bfsi_course_url( 'modern-slavery-awareness' ),
		),
	);
}

/**
 * FAQ items (HTML answers for accordion).
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_bfsi_faq_items() {
	return array(
		array(
			'question' => __( 'What is cybersecurity awareness training for BFSI and PE/VC Firms?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Cybersecurity awareness training for BFSI helps employees in banking, financial services and insurance recognise cyber threats and understand the behaviours needed to protect organisational systems, financial information, customer data and other sensitive information.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'PE/VC cybersecurity awareness training focuses on security risks employees may encounter when handling confidential investment information, investor data, portfolio-company information, financial transactions and communications with external parties.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Why do BFSI organisations need cybersecurity awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Financial-services employees routinely work with valuable data, financial transactions and external communications. This makes them potential targets for phishing, impersonation, fraud, credential theft and other social-engineering attacks.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What topics are covered in the BFSI & PE/VC security awareness course?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The course covers Social Engineering, Insider Threats, Physical Security, Data Privacy, Third-Party Risk and AI-Based Attacks.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the training cover phishing and social engineering?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Employees learn about different phishing techniques and how to recognise and respond to suspicious communications across multiple channels.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the course cover insider threats?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. The course addresses malicious, negligent and compromised insider threats and helps employees understand preventative and reporting actions.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the course include data privacy training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Data privacy topics include personal data, data handling, data-subject requests, incidents, third-party sharing, cross-border transfers and AI-related privacy risks.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the training cover third-party cyber risk?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Employees learn about third-party risks, approved processes and safer data-sharing practices when interacting with vendors and external organisations.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the course address AI-based cyberattacks?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. The course covers AI-driven threats including deepfakes, AI-generated phishing and impersonation, with an emphasis on verification and escalation.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Who should take the training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The course is relevant to employees, contractors, managers, executives and teams working with organisational systems, financial information, personal data, external vendors or sensitive communications.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the course include an assessment and certificate?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. The course includes knowledge checks, a final assessment and a configurable completion certificate.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can the course be deployed through our LMS?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. SucceedLEARN currently supports SCORM delivery for organisations using their own LMS, as well as SaaS-based delivery.', 'succeedlearn-amp' ) . '</p>',
		),
	);
}

/**
 * FAQPage JSON-LD for the BFSI & PE/VC AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_bfsi_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_bfsi_faq_items() as $item ) {
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
