<?php
/**
 * Information Security Awareness Training for UK Cyber Essentials — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a UK Cyber Essentials section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_ukce_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/ukce/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_ukce_canonical_url() {
	$canonical = home_url( '/information-security-awareness-training-for-uk-cyber-essentials/' );
	foreach ( array(
		'information-security-awareness-training-for-uk-cyber-essentials',
		'uk-cyber-essentials',
		'ukce',
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
function succeedlearn_amp_get_ukce_page_title() {
	return __( 'Information Security Awareness Training for UK Cyber Essentials', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ukce_meta_description() {
	return __( 'SucceedLEARN\'s Information Security Awareness Training for UK Cyber Essentials builds practical employee awareness around account security, malware and remote working, with supporting modules for broader human-layer cyber risks.', 'succeedlearn-amp' );
}

/**
 * Hero image URL (local upload when present, live CDN otherwise).
 *
 * @return string
 */
function succeedlearn_amp_get_ukce_hero_image() {
	return succeedlearn_amp_upload_url( '2026/10/ISA-UK-Cyber-Essentials-1.webp' );
}

/**
 * Course screenshot URLs.
 *
 * @return string[]
 */
function succeedlearn_amp_get_ukce_screenshots() {
	$files = array(
		'2026/09/UK-Cyber-Essentials-Course-Screenshots.webp',
		'2026/09/UK-Cyber-Essentials-Course-Screenshots-2.webp',
		'2026/09/UK-Cyber-Essentials-Course-Screenshots-3.webp',
		'2026/09/UK-Cyber-Essentials-Course-Screenshots-4.webp',
		'2026/09/UK-Cyber-Essentials-Course-Screenshots-5.webp',
		'2026/09/UK-Cyber-Essentials-Course-Screenshots-6.webp',
	);

	return array_map( 'succeedlearn_amp_upload_url', $files );
}

/**
 * The five Cyber Essentials technical controls.
 *
 * @return string[]
 */
function succeedlearn_amp_get_ukce_controls() {
	return array(
		__( 'Firewalls', 'succeedlearn-amp' ),
		__( 'Secure Configuration', 'succeedlearn-amp' ),
		__( 'Security Update Management', 'succeedlearn-amp' ),
		__( 'User Access Control', 'succeedlearn-amp' ),
		__( 'Malware Protection', 'succeedlearn-amp' ),
	);
}

/**
 * Everyday employee behaviours that touch the technical controls.
 *
 * @return string[]
 */
function succeedlearn_amp_get_ukce_behaviours() {
	return array(
		__( 'Employees use organizational accounts.', 'succeedlearn-amp' ),
		__( 'They authenticate into cloud applications.', 'succeedlearn-amp' ),
		__( 'They work on laptops and mobile devices.', 'succeedlearn-amp' ),
		__( 'They respond to update prompts.', 'succeedlearn-amp' ),
		__( 'They access systems remotely.', 'succeedlearn-amp' ),
		__( 'They download files and applications.', 'succeedlearn-amp' ),
	);
}

/**
 * "What will employees learn?" bullet list.
 *
 * @return string[]
 */
function succeedlearn_amp_get_ukce_learn_items() {
	return array(
		__( 'Protect organizational accounts and authentication credentials.', 'succeedlearn-amp' ),
		__( 'Understand the importance of appropriate access and authentication practices.', 'succeedlearn-amp' ),
		__( 'Recognize malware and potentially unsafe downloads, links, or files.', 'succeedlearn-amp' ),
		__( 'Understand why software and security updates should not be ignored.', 'succeedlearn-amp' ),
		__( 'Recognize risks associated with devices and applications.', 'succeedlearn-amp' ),
		__( 'Work more securely when accessing organizational systems remotely.', 'succeedlearn-amp' ),
		__( 'Understand the security considerations associated with cloud services and remote access.', 'succeedlearn-amp' ),
		__( 'Recognize suspicious activity that may affect organizational systems or devices.', 'succeedlearn-amp' ),
		__( 'Follow organizational security procedures when using company technology.', 'succeedlearn-amp' ),
		__( 'Report potential security concerns through appropriate internal channels.', 'succeedlearn-amp' ),
	);
}

/**
 * Core module cards.
 *
 * @return array<int, array{title:string,tagline:string,lead:string,text:string,topics:string,note:string,cta:string}>
 */
function succeedlearn_amp_get_ukce_modules() {
	return array(
		array(
			'title'   => __( 'Account Security', 'succeedlearn-amp' ),
			'tagline' => __( 'Support Secure User Access', 'succeedlearn-amp' ),
			'lead'    => __( 'User Access Control is one of the five Cyber Essentials technical controls.', 'succeedlearn-amp' ),
			'text'    => __( 'The Account Security module helps employees understand secure authentication and the importance of protecting organisational accounts and credentials.', 'succeedlearn-amp' ),
			'topics'  => __( 'Password Security · Authentication · MFA · Credential Protection · Account Access', 'succeedlearn-amp' ),
			'note'    => __( 'The Cyber Essentials requirements include controls around user accounts, authentication and appropriate access.', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Account Security Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Malware', 'succeedlearn-amp' ),
			'tagline' => __( 'Strengthen Employee Malware Awareness', 'succeedlearn-amp' ),
			'lead'    => __( 'Malware Protection is another of the five Cyber Essentials technical controls.', 'succeedlearn-amp' ),
			'text'    => __( 'The Malware module helps employees recognise behaviours that may expose organisational devices and systems to malicious software, including suspicious links, attachments and downloads.', 'succeedlearn-amp' ),
			'topics'  => __( 'Malware · Ransomware · Suspicious Links · Malicious Attachments · Unsafe Downloads', 'succeedlearn-amp' ),
			'note'    => __( 'Cyber Essentials explicitly includes Malware Protection as one of its core technical controls.', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Malware Awareness Training', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'Remote Work Security', 'succeedlearn-amp' ),
			'tagline' => __( 'Reinforce Secure Working Beyond the Office', 'succeedlearn-amp' ),
			'lead'    => __( 'Cyber Essentials requirements apply to relevant devices and services within scope, including environments involving home working and cloud services.', 'succeedlearn-amp' ),
			'text'    => __( 'The Remote Work Security module helps employees understand secure behaviour when accessing organisational systems and information outside controlled office environments.', 'succeedlearn-amp' ),
			'topics'  => __( 'Remote Working · Wi-Fi Security · Device Protection · Secure Access · Cloud Security Awareness', 'succeedlearn-amp' ),
			'note'    => __( 'Cyber Essentials has evolved to account for home working, BYOD and cloud services, and current v3.3 requirements state that cloud services cannot simply be excluded from scope.', 'succeedlearn-amp' ),
			'cta'     => __( 'Explore Remote Work Security Training', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Additional supporting awareness cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_ukce_supporting_items() {
	return array(
		array(
			'title' => __( 'Social Engineering', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness around phishing, impersonation and manipulation techniques that may lead to credential compromise or unsafe actions.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Physical Security', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce secure behaviours around devices, physical access, unattended information and workplace security.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Incident Reporting', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees recognise suspicious activity and understand when security concerns should be escalated.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Data Classification', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees understand how sensitive information should be identified and handled.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Insider Threat', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness around malicious, negligent and compromised insider behaviour.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Vendor & Third-Party Risk Management', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce secure behaviour when employees interact with vendors and external organisations.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'AI-Based Attacks', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees recognise emerging AI-enabled phishing, deepfake and impersonation risks.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Control-mapping table rows.
 *
 * @return array<int, array{control:string,topics:string,support:string}>
 */
function succeedlearn_amp_get_ukce_control_rows() {
	return array(
		array(
			'control' => __( 'Firewalls', 'succeedlearn-amp' ),
			'topics'  => __( 'Remote Work Security', 'succeedlearn-amp' ),
			'support' => __( 'Reinforces awareness of secure networks, remote access and safer use of organisational devices outside controlled environments', 'succeedlearn-amp' ),
		),
		array(
			'control' => __( 'Secure Configuration', 'succeedlearn-amp' ),
			'topics'  => __( 'Remote Work Security / supporting awareness', 'succeedlearn-amp' ),
			'support' => __( 'Helps employees understand the importance of using approved devices, applications and security settings', 'succeedlearn-amp' ),
		),
		array(
			'control' => __( 'Security Update Management', 'succeedlearn-amp' ),
			'topics'  => __( 'Supporting awareness within device/security learning', 'succeedlearn-amp' ),
			'support' => __( 'Reinforces why employees should not ignore approved software and security updates', 'succeedlearn-amp' ),
		),
		array(
			'control' => __( 'User Access Control', 'succeedlearn-amp' ),
			'topics'  => __( 'Account Security', 'succeedlearn-amp' ),
			'support' => __( 'Builds awareness around authentication, passwords, MFA, credentials and responsible account access', 'succeedlearn-amp' ),
		),
		array(
			'control' => __( 'Malware Protection', 'succeedlearn-amp' ),
			'topics'  => __( 'Malware', 'succeedlearn-amp' ),
			'support' => __( 'Helps employees recognise suspicious links, downloads, attachments and malware-related risks', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Learning element cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_ukce_learning_elements() {
	return array(
		array(
			'title' => __( 'Focused Learning Modules', 'succeedlearn-amp' ),
			'text'  => __( 'Selected modules address employee security behaviours relevant to Cyber Essentials and the organisation’s broader cybersecurity environment.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Scenario-Based Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Practical workplace situations help employees understand how security risks may appear during everyday use of organisational systems and devices.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Knowledge Checks', 'succeedlearn-amp' ),
			'text'  => __( 'Interactive questions reinforce important security concepts throughout the learning journey.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Final Assessment', 'succeedlearn-amp' ),
			'text'  => __( 'A final assessment helps evaluate understanding after completion of the assigned training.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Flexible Online Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Training can be delivered digitally across supported devices to office-based, remote and hybrid workforces.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * "Why choose" cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_ukce_choose_items() {
	return array(
		array(
			'title' => __( 'Reinforce Secure Account Behaviour', 'succeedlearn-amp' ),
			'text'  => __( 'Help employees understand password, authentication, MFA and credential-protection practices relevant to secure access.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Strengthen Malware Awareness', 'succeedlearn-amp' ),
			'text'  => __( 'Build employee awareness around malicious files, links, software and other malware-related risks.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Support Secure Remote Working', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce safer practices when employees access organisational systems from homes, public locations or distributed environments.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Help Employees Understand Technical Security Practices', 'succeedlearn-amp' ),
			'text'  => __( 'Give employees enough context to understand why approved configurations, updates, access restrictions and security software matter.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Build Wider Security Awareness', 'succeedlearn-amp' ),
			'text'  => __( 'Organisations can extend beyond the core mapped modules with additional S-Aware learning on phishing, incident reporting, data handling, insider threats and other human-layer risks.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Audience cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_ukce_audience_items() {
	return array(
		array(
			'title' => __( 'Employees Across the Organization', 'succeedlearn-amp' ),
			'text'  => __( 'Build foundational awareness around secure account, device and system use.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'New Joiners', 'succeedlearn-amp' ),
			'text'  => __( 'Introduce employees to basic security expectations when they begin using organisational technology.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Remote & Hybrid Employees', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce security behaviors relevant to devices, networks and remote access.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Employees Using Cloud Services', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness around authentication, secure access and responsible use of organizational cloud platforms.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Managers & People Leaders', 'succeedlearn-amp' ),
			'text'  => __( 'Help leaders reinforce secure technology practices within their teams.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Contractors & Relevant Third Parties', 'succeedlearn-amp' ),
			'text'  => __( 'Extend appropriate security awareness to users with access to organizational devices or systems where relevant.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * FAQ items (HTML answers for accordion).
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_ukce_faq_items() {
	return array(
		array(
			'question' => __( 'What is Cyber Essentials?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Cyber Essentials is a UK government-backed cybersecurity certification scheme designed to help organisations protect themselves against common cyber attacks through five technical controls: Firewalls, Secure Configuration, Security Update Management, User Access Control and Malware Protection.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What is Cyber Essentials security awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Cyber Essentials security awareness training refers to employee learning that reinforces secure behaviours relevant to the technical controls used within the Cyber Essentials scheme.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'Training can help employees understand areas such as account security, malware risks, secure remote working and responsible use of organisational technology.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does Cyber Essentials require employee cybersecurity training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Cyber Essentials certification is based on implementation of its five technical controls rather than a prescribed employee-training syllabus. Employee awareness can support secure behaviour around those controls, but training alone does not satisfy the certification requirements.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What are the five Cyber Essentials controls?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The five controls are:', 'succeedlearn-amp' ) . '</p>'
				. '<ul>'
				. '<li>' . esc_html__( 'Firewalls', 'succeedlearn-amp' ) . '</li>'
				. '<li>' . esc_html__( 'Secure Configuration', 'succeedlearn-amp' ) . '</li>'
				. '<li>' . esc_html__( 'Security Update Management', 'succeedlearn-amp' ) . '</li>'
				. '<li>' . esc_html__( 'User Access Control', 'succeedlearn-amp' ) . '</li>'
				. '<li>' . esc_html__( 'Malware Protection', 'succeedlearn-amp' ) . '</li>'
				. '</ul>'
				. '<p>' . esc_html__( 'These form the foundation of the Cyber Essentials certification scheme.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Which SucceedLEARN modules are most relevant to Cyber Essentials?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'From the current S-Aware library, the strongest directly relevant employee-awareness modules are:', 'succeedlearn-amp' ) . '</p>'
				. '<ul>'
				. '<li>' . esc_html__( 'Account Security', 'succeedlearn-amp' ) . '</li>'
				. '<li>' . esc_html__( 'Malware', 'succeedlearn-amp' ) . '</li>'
				. '<li>' . esc_html__( 'Remote Work Security', 'succeedlearn-amp' ) . '</li>'
				. '</ul>'
				. '<p>' . esc_html__( 'Additional security-awareness modules are available for organisations that want broader employee cybersecurity learning.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Is account security relevant to Cyber Essentials?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. User Access Control is one of the five Cyber Essentials technical controls. Employee awareness around authentication, passwords, MFA and credential protection can support safer account behaviour.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Is malware awareness relevant to Cyber Essentials?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Malware Protection is one of the five Cyber Essentials controls. Employee awareness can help users recognise suspicious files, links, downloads and other behaviours that may increase malware exposure.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does Cyber Essentials cover remote working and cloud services?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Cyber Essentials requirements apply to relevant systems and services within certification scope. The scheme has been updated over time to account for home working, BYOD and cloud services, and current v3.3 guidance states that cloud services cannot simply be excluded from scope.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the training cover Secure Configuration and Security Update Management?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Your current 10-module S-Aware library does not contain standalone modules titled Secure Configuration or Security Update Management.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'Employee awareness can reinforce behaviours such as using approved systems and not ignoring authorised software updates, but organisations must still implement the corresponding Cyber Essentials technical controls themselves.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does completing the training make an organisation Cyber Essentials certified?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'No. Cyber Essentials certification requires the organisation to meet the applicable technical requirements across all five controls and complete the relevant certification process. Employee awareness training can complement that programme but does not provide certification by itself.', 'succeedlearn-amp' ) . '</p>',
		),
	);
}

/**
 * FAQPage JSON-LD for the UK Cyber Essentials AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_ukce_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_ukce_faq_items() as $item ) {
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
