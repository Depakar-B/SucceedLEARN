<?php
/**
 * S-Sync — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an S-Sync section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_ssync_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/s-sync/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_ssync_canonical_url() {
	$fallback = home_url( '/security-awareness/s-sync-security-awareness/' );
	foreach ( array(
		's-sync',
		's-sync-security-awareness',
		'security-awareness/s-sync-security-awareness',
		'security-awareness/s-sync',
	) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
			$link = get_permalink( $page );
			if ( $link ) {
				return $link;
			}
		}
	}
	return $fallback;
}

/**
 * @return string
 */
function succeedlearn_amp_get_ssync_page_title() {
	return __( 'Enterprise Integrations for Security Awareness & Compliance Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ssync_meta_description() {
	return __( 'S-Sync is the enterprise integration layer of the SucceedLEARN Security Behaviour & Culture Suite, helping organisations connect security awareness with identity, HR, learning and workplace technology systems.', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ssync_hero_image() {
	return succeedlearn_amp_upload_url( '2026/09/Enterpise-Integrations-for-Security-Awareness.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ssync_why_image() {
	return succeedlearn_amp_upload_url( '2026/09/Why-Security-Awareness-Integrations-Matter.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_ssync_connect_image() {
	return succeedlearn_amp_upload_url( '2026/09/The-integration-layer-of-SucceedLEARN-SBCS.webp' );
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_ssync_connect_items() {
	return array(
		__( 'Secure user authentication', 'succeedlearn-amp' ),
		__( 'Automated user provisioning', 'succeedlearn-amp' ),
		__( 'Employee-data synchronisation', 'succeedlearn-amp' ),
		__( 'HR-system connectivity', 'succeedlearn-amp' ),
		__( 'LMS-based learning deployment', 'succeedlearn-amp' ),
		__( 'Microsoft and Google ecosystem integration', 'succeedlearn-amp' ),
		__( 'API-based connectivity', 'succeedlearn-amp' ),
	);
}

/**
 * Enterprise integration groups with logo upload paths (mirrors desktop theme).
 *
 * Logo keys use `url` (preferred) or `file` for Media Library paths under uploads/.
 *
 * @return array<int, array{title:string,lead:string,text:string,supports?:string,logos:array<int, array{name:string,url?:string,file?:string}>}>
 */
function succeedlearn_amp_get_ssync_integration_groups() {
	return array(
		array(
			'title'    => __( 'Single Sign-On & Identity', 'succeedlearn-amp' ),
			'lead'     => __( 'Secure access through your existing identity environment', 'succeedlearn-amp' ),
			'text'     => __( 'Enable employees to securely access SucceedLEARN through supported SAML-based Single Sign-On (SSO), reducing the need for separate credentials and simplifying access management.', 'succeedlearn-amp' ),
			'supports' => __( 'Supported Integrations:', 'succeedlearn-amp' ),
			'logos'    => array(
				array(
					'name' => __( 'Microsoft Entra ID', 'succeedlearn-amp' ),
					'url'  => '2026/10/Microsoft-Azure.webp',
				),
				array(
					'name' => __( 'OneLogin', 'succeedlearn-amp' ),
					'url'  => '2026/10/onelogin.webp',
				),
				array(
					'name' => __( 'Okta', 'succeedlearn-amp' ),
					'url'  => '2026/10/octa.webp',
				),
				array(
					'name' => __( 'JumpCloud', 'succeedlearn-amp' ),
					'url'  => '2026/10/jumpcloud.webp',
				),
				array(
					'name' => __( 'Other SAML 2.0 Identity Providers', 'succeedlearn-amp' ),
					'url'  => '2026/10/others.webp',
				),
			),
		),
		array(
			'title'    => __( 'Workplace Authentication', 'succeedlearn-amp' ),
			'lead'     => __( 'Connect with familiar workplace accounts', 'succeedlearn-amp' ),
			'text'     => __( 'Allow users to securely sign in through supported workplace accounts, creating a simpler and more familiar authentication experience.', 'succeedlearn-amp' ),
			'supports' => __( 'Supported Integrations:', 'succeedlearn-amp' ),
			'logos'    => array(
				array(
					'name' => __( 'Google', 'succeedlearn-amp' ),
					'url'  => '2026/10/google.webp',
				),
				array(
					'name' => __( 'Microsoft', 'succeedlearn-amp' ),
					'url'  => '2026/10/microsoft.webp',
				),
			),
		),
		array(
			'title'    => __( 'HR & HCM Systems', 'succeedlearn-amp' ),
			'lead'     => __( 'Keep learner information aligned with your workforce', 'succeedlearn-amp' ),
			'text'     => __( 'Connect SucceedLEARN with supported HR and HCM systems to help automate employee onboarding, synchronise workforce information and maintain accurate learner records as your organisation changes.', 'succeedlearn-amp' ),
			'supports' => __( 'Supported Integrations:', 'succeedlearn-amp' ),
			'logos'    => array(
				array(
					'name' => __( 'Keka', 'succeedlearn-amp' ),
					'url'  => '2026/10/keka.webp',
				),
				array(
					'name' => __( 'Darwinbox', 'succeedlearn-amp' ),
					'url'  => '2026/10/darwinbox.webp',
				),
				array(
					'name' => __( 'Zoho People', 'succeedlearn-amp' ),
					'url'  => '2026/10/zoho-people.webp',
				),
				array(
					'name' => __( 'BambooHR', 'succeedlearn-amp' ),
					'url'  => '2026/10/bamboohr.webp',
				),
				array(
					'name' => __( 'Workday', 'succeedlearn-amp' ),
					'url'  => '2026/10/workday.webp',
				),
			),
		),
		array(
			'title'    => __( 'Automated User Provisioning', 'succeedlearn-amp' ),
			'lead'     => __( 'Keep user access aligned as your workforce changes', 'succeedlearn-amp' ),
			'text'     => __( 'Use SCIM-based provisioning to help automate user creation and relevant profile updates, reducing manual administration as employees join, move within or leave the organisation.', 'succeedlearn-amp' ),
			'supports' => __( 'Supported Integration:', 'succeedlearn-amp' ),
			'logos'    => array(
				array(
					'name' => __( 'SCIM', 'succeedlearn-amp' ),
					'url'  => '2026/10/scim.webp',
				),
			),
		),
		array(
			'title'    => __( 'LMS Compatibility', 'succeedlearn-amp' ),
			'lead'     => __( 'Deliver learning through your existing LMS environment', 'succeedlearn-amp' ),
			'text'     => __( 'Integrate applicable SucceedLEARN content with existing Learning Management Systems through SCORM-compatible packages, allowing organisations to deliver training within their preferred learning environment.', 'succeedlearn-amp' ),
			'supports' => __( 'Supported Delivery:', 'succeedlearn-amp' ),
			'logos'    => array(
				array(
					'name' => __( 'SCORM-Compatible LMS', 'succeedlearn-amp' ),
				),
			),
		),
		array(
			'title'    => __( 'Compliance Automation', 'succeedlearn-amp' ),
			'lead'     => __( 'Connect security awareness with your compliance ecosystem', 'succeedlearn-amp' ),
			'text'     => __( 'Connect SucceedLEARN with supported compliance platforms to help synchronise relevant security-awareness training and completion information.', 'succeedlearn-amp' ),
			'supports' => __( 'Supported Integration:', 'succeedlearn-amp' ),
			'logos'    => array(
				array(
					'name' => __( 'Vanta', 'succeedlearn-amp' ),
					'url'  => '2026/10/vanta.webp',
				),
			),
		),
		array(
			'title'    => __( 'API-Based Connectivity', 'succeedlearn-amp' ),
			'lead'     => __( 'Connect beyond pre-built integrations', 'succeedlearn-amp' ),
			'text'     => __( 'For organisations with additional integration requirements, S-Sync supports API-based connectivity, providing greater flexibility to connect SucceedLEARN with relevant internal systems and third-party applications.', 'succeedlearn-amp' ),
			'supports' => __( 'Capability:', 'succeedlearn-amp' ),
			'logos'    => array(
				array(
					'name' => __( 'API Connectivity', 'succeedlearn-amp' ),
				),
			),
		),
	);
}

/**
 * @deprecated Use succeedlearn_amp_get_ssync_integration_groups().
 * @return array<int, array{title:string,lead:string,text:string,supports?:string,logos:array}>
 */
function succeedlearn_amp_get_ssync_system_groups() {
	return succeedlearn_amp_get_ssync_integration_groups();
}

/**
 * Resolve a logo upload path from `url` or `file` keys.
 *
 * @param array{name?:string,url?:string,file?:string} $logo Logo item.
 * @return string Empty when no path.
 */
function succeedlearn_amp_ssync_logo_path( $logo ) {
	if ( ! empty( $logo['url'] ) ) {
		return (string) $logo['url'];
	}
	if ( ! empty( $logo['file'] ) ) {
		return (string) $logo['file'];
	}
	return '';
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_ssync_enterprise_items() {
	return array(
		array(
			'title' => __( 'IT & Infrastructure Teams', 'succeedlearn-amp' ),
			'text'  => __( "Connect security awareness with the organisation's broader technology environment while reducing repetitive user administration.", 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Identity & Access Management Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Support secure learner authentication and user provisioning through relevant identity-management processes.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Information Security & Cybersecurity Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Deploy awareness programmes across changing workforce populations without relying exclusively on manually maintained user lists.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'HR & People Systems Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Support synchronisation of relevant workforce information used for learning administration.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Learning & Development Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Integrate applicable security-awareness content with existing learning environments and organisational workflows.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Compliance & Risk Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Benefit from more accurate learner populations and structured awareness programme administration.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_ssync_choose_items() {
	return array(
		array(
			'title' => __( 'Simplified User Management', 'succeedlearn-amp' ),
			'text'  => __( 'Reduce manual administration by automatically synchronising employee information across connected systems.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Faster Programme Deployment', 'succeedlearn-amp' ),
			'text'  => __( 'Accelerate onboarding and training assignments through automated provisioning and integrated workflows.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Accurate Data Synchronisation', 'succeedlearn-amp' ),
			'text'  => __( 'Ensure learner information remains consistent across organisational systems, reducing errors caused by manual updates.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Enterprise Scalability', 'succeedlearn-amp' ),
			'text'  => __( 'Support growing organisations by integrating with existing enterprise infrastructure without increasing administrative complexity.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Flexible Integration Options', 'succeedlearn-amp' ),
			'text'  => __( 'Choose the integration approach that best fits your organisation, whether through SSO, SCORM, HRMS synchronisation, or APIs.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{name:string,role:string,text:string}>
 */
function succeedlearn_amp_get_ssync_suite_items() {
	return array(
		array(
			'name' => __( 'S-Aware', 'succeedlearn-amp' ),
			'role' => __( 'Learn', 'succeedlearn-amp' ),
			'text' => __( 'Build foundational cybersecurity and privacy knowledge.', 'succeedlearn-amp' ),
		),
		array(
			'name' => __( 'S-Bytes', 'succeedlearn-amp' ),
			'role' => __( 'Reinforce', 'succeedlearn-amp' ),
			'text' => __( 'Keep important security concepts fresh through short, continuous microlearning.', 'succeedlearn-amp' ),
		),
		array(
			'name' => __( 'S-Phish', 'succeedlearn-amp' ),
			'role' => __( 'Test', 'succeedlearn-amp' ),
			'text' => __( 'Give employees practical experience recognising realistic phishing threats.', 'succeedlearn-amp' ),
		),
		array(
			'name' => __( 'S-Play', 'succeedlearn-amp' ),
			'role' => __( 'Engage', 'succeedlearn-amp' ),
			'text' => __( 'Reinforce security concepts through interactive and gamified learning.', 'succeedlearn-amp' ),
		),
		array(
			'name' => __( 'S-Signs', 'succeedlearn-amp' ),
			'role' => __( 'Remind', 'succeedlearn-amp' ),
			'text' => __( 'Keep security visible through ongoing visual awareness campaigns and nudges.', 'succeedlearn-amp' ),
		),
		array(
			'name' => __( 'S-Metrics', 'succeedlearn-amp' ),
			'role' => __( 'Measure', 'succeedlearn-amp' ),
			'text' => __( 'Bring awareness and behavioural data together to understand programme performance.', 'succeedlearn-amp' ),
		),
		array(
			'name' => __( 'S-Sync', 'succeedlearn-amp' ),
			'role' => __( 'Connect', 'succeedlearn-amp' ),
			'text' => __( "Integrate security awareness with the organisation's wider learning and technology ecosystem.", 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_ssync_faq_items() {
	$pairs = array(
		array(
			__( 'What is S-Sync?', 'succeedlearn-amp' ),
			array(
				__( 'S-Sync is the enterprise integration layer of the SucceedLEARN Security Behaviour & Culture Suite.', 'succeedlearn-amp' ),
				__( 'It helps organisations connect security-awareness administration with existing identity, HR, learning and workplace technology systems.', 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'What systems can S-Sync integrate with?', 'succeedlearn-amp' ),
			array(
				__( 'Depending on the required configuration, S-Sync can support connectivity involving identity and authentication systems, HR platforms, Learning Management Systems, Microsoft and Google environments, and API-enabled internal or third-party applications.', 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'Does S-Sync support Single Sign-On?', 'succeedlearn-amp' ),
			array(
				__( 'Yes. S-Sync supports Single Sign-On capabilities that enable employees to access training using their organisational authentication environment rather than maintaining separate learner credentials.', 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'Can S-Sync automate user provisioning?', 'succeedlearn-amp' ),
			array(
				__( 'Yes. Automated user provisioning can help organisations synchronise learner accounts between connected systems and SucceedLEARN, reducing the need for repetitive manual user administration.', 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'Can S-Sync connect with HR systems?', 'succeedlearn-amp' ),
			array(
				__( 'Yes. HR-system synchronisation can support the transfer of relevant workforce information used for learner administration, such as departments, locations and organisational groupings depending on the integration configuration.', 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'Can organisations use SucceedLEARN SBCS content in their existing LMS?', 'succeedlearn-amp' ),
			array(
				__( 'Yes. Applicable SucceedLEARN SBCS learning content can be delivered through SCORM-compatible packages for organisations using an existing Learning Management System.', 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'Does S-Sync support Microsoft and Google environments?', 'succeedlearn-amp' ),
			array(
				__( 'S-Sync can support integration with commonly used Microsoft and Google workplace environments for relevant authentication and user-management use cases.', 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'Does S-Sync provide API integration?', 'succeedlearn-amp' ),
			array(
				__( 'Yes. API-based connectivity can support organisations that require integration between SucceedLEARN and relevant internal or third-party applications.', 'succeedlearn-amp' ),
				__( "The exact scope depends on the organisation's use case and agreed integration requirements.", 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'How does S-Sync reduce security-awareness administration?', 'succeedlearn-amp' ),
			array(
				__( 'By connecting identity, workforce and learning systems, S-Sync can reduce tasks such as manual account creation, employee-record updates, authentication management and repeated learner-list maintenance.', 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'Can S-Sync support employee onboarding and offboarding?', 'succeedlearn-amp' ),
			array(
				__( 'Connected user-management processes can help organisations reflect relevant employee additions, changes and departures more efficiently within the security-awareness environment.', 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'Who is S-Sync designed for?', 'succeedlearn-amp' ),
			array(
				__( 'S-Sync is designed for organisations that want to integrate security-awareness programmes with existing enterprise systems.', 'succeedlearn-amp' ),
				__( 'It can be particularly relevant to IT, Information Security, Identity & Access Management, HR systems, Learning & Development and Compliance teams.', 'succeedlearn-amp' ),
			),
		),
		array(
			__( 'How does S-Sync work with the wider SucceedLEARN SBCS?', 'succeedlearn-amp' ),
			array(
				__( 'S-Sync provides the Connect layer of SBCS.', 'succeedlearn-amp' ),
				__( "It helps integrate the technology environment supporting S-Aware, S-Bytes, S-Phish, S-Play, S-Signs and S-Metrics with the organisation's broader enterprise ecosystem.", 'succeedlearn-amp' ),
			),
		),
	);

	$items = array();
	foreach ( $pairs as $pair ) {
		$paragraphs = '';
		foreach ( $pair[1] as $para ) {
			$paragraphs .= '<p>' . esc_html( $para ) . '</p>';
		}
		$items[] = array(
			'question' => $pair[0],
			'answer'   => $paragraphs,
		);
	}

	return $items;
}

/**
 * FAQPage JSON-LD for the S-Sync AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_ssync_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_ssync_faq_items() as $item ) {
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
