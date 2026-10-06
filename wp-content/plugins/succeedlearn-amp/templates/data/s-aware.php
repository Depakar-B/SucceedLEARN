<?php
/**
 * S-Aware — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an S-Aware section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_sa_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/s-aware/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_canonical_url() {
	$fallback = home_url( '/security-awareness/s-aware/' );
	foreach ( array( 's-aware', 'security-awareness/s-aware' ) as $slug ) {
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
function succeedlearn_amp_get_sa_page_title() {
	return __( 'Security Awareness Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_meta_description() {
	return __( 'S-Aware delivers scenario-based security and privacy awareness training that builds the knowledge foundation for lasting security behaviour change.', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_hero_image() {
	return succeedlearn_amp_upload_url( '2026/09/Security-Awareness-Training.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_why_image() {
	return succeedlearn_amp_upload_url( '2026/09/Why-S-Aware.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_customisation_image() {
	return succeedlearn_amp_upload_url( '2026/09/Learning-that-Reflects-Your-Organisation.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_progress_image() {
	return succeedlearn_amp_upload_url( '2026/09/Visibility-Into-Learning-Progress.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_suite_image() {
	return succeedlearn_amp_upload_url( '2026/09/From-Awareness-to-Real-World-Readiness.webp' );
}

/**
 * Learning cards (desktop orbit → AMP card grid).
 *
 * @return array<int, array{title:string,body:string}>
 */
function succeedlearn_amp_get_sa_learning_cards() {
	return array(
		array(
			'title' => __( 'Scenario-Based Learning', 'succeedlearn-amp' ),
			'body'  => __( 'Put security concepts into context through realistic workplace situations that encourage employees to think about how they would respond.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Interactive Learning Experiences', 'succeedlearn-amp' ),
			'body'  => __( 'Move beyond passive content consumption with interactions, knowledge checks and assessments that encourage active participation throughout the learning journey.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Practical Cybersecurity Knowledge', 'succeedlearn-amp' ),
			'body'  => __( 'Translate security concepts and policies into practical actions employees can apply during their everyday work.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Relevant, Accessible Learning', 'succeedlearn-amp' ),
			'body'  => __( 'Deliver security awareness in a format designed for employees across roles, departments and levels of technical expertise.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Continuous Knowledge Building', 'succeedlearn-amp' ),
			'body'  => __( 'Use S-Aware as the foundation of a wider programme in which knowledge can be reinforced throughout the year through additional SBCS interventions.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Library overview rows for the scrollable table.
 *
 * @return array<int, array{category:string,what:string,areas:string}>
 */
function succeedlearn_amp_get_sa_library_overview() {
	return array(
		array(
			'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ),
			'what'     => __( 'Security, privacy and compliance awareness training relevant to recognised frameworks and regulatory requirements.', 'succeedlearn-amp' ),
			'areas'    => __( 'SOC 2 · UK Cyber Essentials · ISO/IEC 27001:2022 · HIPAA · PCI DSS · GDPR & UK Data Protection · CCPA · FERPA', 'succeedlearn-amp' ),
		),
		array(
			'category' => __( 'Industry-Focused Training', 'succeedlearn-amp' ),
			'what'     => __( 'Security awareness designed around the risks, responsibilities and threat environments relevant to specific industries.', 'succeedlearn-amp' ),
			'areas'    => __( 'Security Awareness Training for BFSI & PE/VC', 'succeedlearn-amp' ),
		),
		array(
			'category' => __( 'Core & Emerging Topics', 'succeedlearn-amp' ),
			'what'     => __( 'Foundational security awareness and emerging topics that help employees recognise and respond to everyday and evolving workplace risks.', 'succeedlearn-amp' ),
			'areas'    => __( 'Information Security Awareness · Responsible Use of AI', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Flattened library course cards with category colour keys.
 *
 * @return array<int, array{category:string,category_key:string,title:string,description:string,url:string,image:string}>
 */
function succeedlearn_amp_get_sa_library_cards() {
	$uploads = 'https://succeedlearn.com/wp-content/uploads/2026/09';

	$resolve = static function ( $slug ) {
		$slug = sanitize_title( (string) $slug );
		$url  = $slug ? home_url( '/' . $slug . '/' ) : home_url( '/courses/' );
		if ( $slug ) {
			foreach ( array( 'course', 'lp_course', 'page' ) as $post_type ) {
				if ( 'page' !== $post_type && ! post_type_exists( $post_type ) ) {
					continue;
				}
				$found = get_page_by_path( $slug, OBJECT, $post_type );
				if ( $found instanceof WP_Post ) {
					$link = get_permalink( $found );
					if ( $link ) {
						$url = $link;
					}
					break;
				}
			}
		}
		return $url;
	};

	$cards = array(
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'Information Security Awareness Training for SOC 2 Compliance', 'succeedlearn-amp' ), 'description' => __( 'Build employee security habits that support SOC 2 trust service criteria.', 'succeedlearn-amp' ), 'slug' => 'information-security-awareness-training-for-soc-2-compliance', 'image' => $uploads . '/ISA-SOC2.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'Information Security Awareness Training for UK Cyber Essentials', 'succeedlearn-amp' ), 'description' => __( 'Strengthen staff awareness aligned to UK Cyber Essentials expectations.', 'succeedlearn-amp' ), 'slug' => 'information-security-awareness-training-for-uk-cyber-essentials', 'image' => $uploads . '/ISA-UK-Cyber-Essentials.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'ISO 27001 Staff Awareness eLearning Training', 'succeedlearn-amp' ), 'description' => __( 'Help teams understand ISO 27001 responsibilities and everyday secure behaviours.', 'succeedlearn-amp' ), 'slug' => 'iso-27001-2022-staff-awareness-training', 'image' => $uploads . '/ISO-27001.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'HIPAA Covered Entity Compliance Training', 'succeedlearn-amp' ), 'description' => __( 'Train covered entities on HIPAA privacy and security duties in everyday work.', 'succeedlearn-amp' ), 'slug' => 'hipaa-annual-workforce-training', 'image' => $uploads . '/HIPAA-Covered-Entity.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'HIPAA Non-Covered Entity Compliance Training', 'succeedlearn-amp' ), 'description' => __( 'Help non-covered entities understand HIPAA-aligned privacy and security expectations.', 'succeedlearn-amp' ), 'slug' => 'hipaa-annual-workforce-training', 'image' => $uploads . '/HIPAA-Non-Covered-Entity.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'PCI DSS Employee Training', 'succeedlearn-amp' ), 'description' => __( 'Give employees clear guidance on protecting cardholder data day to day.', 'succeedlearn-amp' ), 'slug' => 'pci-dss', 'image' => $uploads . '/PCI-DSS-Employee.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'PCI DSS Cashier & Payments Handler Training', 'succeedlearn-amp' ), 'description' => __( 'Prepare cashiers and payment handlers for secure POS practices.', 'succeedlearn-amp' ), 'slug' => 'pci-dss', 'image' => $uploads . '/PCI-DSS-UK-Cyber-Essentials.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'GDPR Training', 'succeedlearn-amp' ), 'description' => __( 'Cover GDPR fundamentals for everyday data handling decisions.', 'succeedlearn-amp' ), 'slug' => 'gdpr-employee-awareness-training', 'image' => $uploads . '/GDPR-Training.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'Data Protection Awareness Training', 'succeedlearn-amp' ), 'description' => __( 'Help employees protect personal data and follow UK data protection expectations.', 'succeedlearn-amp' ), 'slug' => 'gdpr-employee-awareness-training', 'image' => $uploads . '/DPA-Training.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'California Consumer Privacy Act (CCPA) eLearning Course', 'succeedlearn-amp' ), 'description' => __( 'Help staff recognise CCPA consumer rights and responsible data practices.', 'succeedlearn-amp' ), 'slug' => 'ccpa-awareness-training', 'image' => $uploads . '/CCPA.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'FERPA Eligible Student eLearning Course', 'succeedlearn-amp' ), 'description' => __( 'Support education teams in protecting eligible student education records under FERPA.', 'succeedlearn-amp' ), 'slug' => 'ferpa-training-for-school-and-university-staff', 'image' => $uploads . '/FERPA-Eligible-Student.webp' ),
		array( 'category' => __( 'Frameworks & Regulations', 'succeedlearn-amp' ), 'category_key' => 'frameworks', 'title' => __( 'FERPA Non-Eligible Student eLearning Course', 'succeedlearn-amp' ), 'description' => __( 'Help staff handle non-eligible student records with FERPA-aligned privacy practices.', 'succeedlearn-amp' ), 'slug' => 'ferpa-training-for-school-and-university-staff', 'image' => $uploads . '/FERPA-Non-Eligible-Student.webp' ),
		array( 'category' => __( 'Industry-Specific', 'succeedlearn-amp' ), 'category_key' => 'industry', 'title' => __( 'Security Awareness Training for BFSI & PE/VC', 'succeedlearn-amp' ), 'description' => __( 'Build employee awareness around cybersecurity risks relevant to banking, financial services, private equity and venture capital environments.', 'succeedlearn-amp' ), 'slug' => 'security-awareness-training-bfsi-pe-vc', 'image' => $uploads . '/BFSIPEVC.webp' ),
		array( 'category' => __( 'Core & Emerging Topics', 'succeedlearn-amp' ), 'category_key' => 'core', 'title' => __( 'Information Security Awareness Training', 'succeedlearn-amp' ), 'description' => __( 'Build foundational employee awareness across everyday cybersecurity risks and secure workplace behaviours.', 'succeedlearn-amp' ), 'slug' => 'information-security-awareness-training', 'image' => $uploads . '/ISA-Standard.webp' ),
		array( 'category' => __( 'Core & Emerging Topics', 'succeedlearn-amp' ), 'category_key' => 'core', 'title' => __( 'Responsible Use of AI', 'succeedlearn-amp' ), 'description' => __( 'Help employees understand how to use AI technologies more responsibly while recognising the security, privacy and organisational risks associated with workplace AI use.', 'succeedlearn-amp' ), 'slug' => 'responsible-use-of-generative-ai-training', 'image' => $uploads . '/Responsible-Use-of-AI-Thumbnail.webp' ),
	);

	$out = array();
	foreach ( $cards as $card ) {
		$out[] = array(
			'category'     => $card['category'],
			'category_key' => $card['category_key'],
			'title'        => $card['title'],
			'description'  => $card['description'],
			'url'          => $resolve( $card['slug'] ),
			'image'        => $card['image'],
		);
	}
	return $out;
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_sa_customisation_items() {
	return array(
		__( 'Organisational branding', 'succeedlearn-amp' ),
		__( 'Internal security policies', 'succeedlearn-amp' ),
		__( 'Processes and procedures', 'succeedlearn-amp' ),
		__( 'Organisation-specific examples', 'succeedlearn-amp' ),
		__( 'Internal reporting mechanisms', 'succeedlearn-amp' ),
		__( 'Industry or workforce context', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int, array{title:string,subtitle:string,paragraphs:string[],ideal:string,link?:array{url:string,label:string}}>
 */
function succeedlearn_amp_get_sa_delivery_options() {
	return array(
		array(
			'title'      => __( 'SucceedLEARN SaaS Platform', 'succeedlearn-amp' ),
			'subtitle'   => __( 'Deliver and manage training in one environment', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'Deploy S-Aware directly through the SucceedLEARN platform, giving employees access to assigned learning while enabling administrators to manage learners, track progress and monitor training activity from a central environment.', 'succeedlearn-amp' ),
			),
			'ideal'      => __( 'Organisations looking for a fully hosted security awareness learning environment.', 'succeedlearn-amp' ),
		),
		array(
			'title'      => __( 'SCORM for Your Existing LMS', 'succeedlearn-amp' ),
			'subtitle'   => __( 'Bring S-Aware into the LMS you already use', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'Deploy selected S-Aware courses as SCORM-compatible packages through your existing Learning Management System, allowing employees to complete security awareness training within the learning environment they already use.', 'succeedlearn-amp' ),
			),
			'ideal'      => __( 'Organisations that want to host and manage S-Aware training through their existing LMS.', 'succeedlearn-amp' ),
		),
		array(
			'title'      => __( 'SCORMBridge', 'succeedlearn-amp' ),
			'subtitle'   => __( 'Use your LMS. Deliver SucceedLEARN-hosted content.', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'SCORMBridge enables organisations to deliver SucceedLEARN-hosted training through their existing LMS, providing an alternative for organisations that want to retain their current learning environment while securely accessing SucceedLEARN content.', 'succeedlearn-amp' ),
			),
			'ideal'      => __( 'Organisations that want to continue using their existing LMS while accessing SucceedLEARN-hosted learning content.', 'succeedlearn-amp' ),
		),
		array(
			'title'      => __( 'Enterprise Integrations', 'succeedlearn-amp' ),
			'subtitle'   => __( 'Connect learning with your existing enterprise ecosystem', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'Integrate SucceedLEARN with supported identity, workforce and enterprise systems to simplify learner access, user management and programme administration.', 'succeedlearn-amp' ),
				__( 'Supported capabilities can include Single Sign-On (SSO), automated user provisioning and HR/HCM system synchronisation, helping security awareness fit more naturally into your existing technology environment.', 'succeedlearn-amp' ),
			),
			'ideal'      => __( 'Organisations looking to automate administration and connect security awareness with existing enterprise systems.', 'succeedlearn-amp' ),
			'link'       => array(
				'url'   => home_url( '/s-sync/' ),
				'label' => __( 'Explore S-Sync Integrations', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'      => __( 'API-Based Connectivity', 'succeedlearn-amp' ),
			'subtitle'   => __( 'Extend SucceedLEARN to fit your technology environment', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'For organisations with additional integration requirements, API-based connectivity provides greater flexibility to connect SucceedLEARN with relevant internal systems and third-party applications.', 'succeedlearn-amp' ),
			),
			'ideal'      => __( 'Organisations requiring customised connectivity or more integrated enterprise workflows.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,subtitle:string,icon:string}>
 */
function succeedlearn_amp_get_sa_delivery_summary() {
	return array(
		array( 'title' => __( 'SucceedLEARN SaaS', 'succeedlearn-amp' ), 'subtitle' => __( 'Hosted Learning Environment', 'succeedlearn-amp' ), 'icon' => 'cloud' ),
		array( 'title' => __( 'SCORM', 'succeedlearn-amp' ), 'subtitle' => __( 'Your LMS', 'succeedlearn-amp' ), 'icon' => 'monitor' ),
		array( 'title' => __( 'SCORMBridge', 'succeedlearn-amp' ), 'subtitle' => __( 'Your LMS + SucceedLEARN Content', 'succeedlearn-amp' ), 'icon' => 'bridge' ),
		array( 'title' => __( 'Enterprise Integrations', 'succeedlearn-amp' ), 'subtitle' => __( 'Connected Enterprise Systems', 'succeedlearn-amp' ), 'icon' => 'gear' ),
		array( 'title' => __( 'API Connectivity', 'succeedlearn-amp' ), 'subtitle' => __( 'Flexible System Connectivity', 'succeedlearn-amp' ), 'icon' => 'api' ),
	);
}

/**
 * @param string $icon Icon key.
 * @return string
 */
function succeedlearn_amp_sa_delivery_summary_icon( $icon ) {
	$svgs = array(
		'cloud'   => '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7.5 18h9.2a3.8 3.8 0 0 0 .5-7.55 5.2 5.2 0 0 0-9.95-1.3A3.9 3.9 0 0 0 7.5 18z"/></svg>',
		'monitor' => '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8M12 16v4"/></svg>',
		'bridge'  => '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 8H3l4-4M17 8h4l-4-4M7 16H3l4 4M17 16h4l-4 4M8 12h8"/></svg>',
		'gear'    => '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path d="M12 3v2.1M12 18.9V21M4.9 4.9l1.5 1.5M17.6 17.6l1.5 1.5M3 12h2.1M18.9 12H21M4.9 19.1l1.5-1.5M17.6 6.4l1.5-1.5"/></svg>',
		'api'     => '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 7 4.5 12 9 17M15 7l4.5 5L15 17M13.2 5.5l-2.4 13"/></svg>',
	);
	return isset( $svgs[ $icon ] ) ? $svgs[ $icon ] : $svgs['cloud'];
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_sa_progress_items() {
	return array(
		__( 'Course participation', 'succeedlearn-amp' ),
		__( 'Training completion', 'succeedlearn-amp' ),
		__( 'Assessment performance', 'succeedlearn-amp' ),
		__( 'Learner progress', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sa_employees() {
	return array(
		array( 'title' => __( 'New Joiners', 'succeedlearn-amp' ), 'text' => __( 'Establish security expectations from the beginning by incorporating cybersecurity awareness into employee onboarding and helping new employees understand their responsibilities from day one.', 'succeedlearn-amp' ) ),
		array( 'title' => __( 'Employees Across the Organisation', 'succeedlearn-amp' ), 'text' => __( "Build a consistent foundation of security awareness across departments and functions, regardless of an employee's level of technical knowledge.", 'succeedlearn-amp' ) ),
		array( 'title' => __( 'Managers & People Leaders', 'succeedlearn-amp' ), 'text' => __( 'Help managers understand important security risks and reinforce responsible security behaviours within their teams.', 'succeedlearn-amp' ) ),
		array( 'title' => __( 'Remote & Hybrid Workforces', 'succeedlearn-amp' ), 'text' => __( 'Support employees working across offices, homes and distributed environments with awareness of the security considerations associated with modern ways of working.', 'succeedlearn-amp' ) ),
		array( 'title' => __( 'Role-Relevant & Higher-Risk Groups', 'succeedlearn-amp' ), 'text' => __( 'Where required, organisations can build learning programmes around the security awareness needs of particular employee groups, functions or risk profiles.', 'succeedlearn-amp' ) ),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sa_teams() {
	return array(
		array( 'title' => __( 'Information Security & Cybersecurity Teams', 'succeedlearn-amp' ), 'text' => __( "Build employee understanding of cyber threats and reinforce the behaviours that support the organisation's wider security strategy.", 'succeedlearn-amp' ) ),
		array( 'title' => __( 'Compliance & Risk Teams', 'succeedlearn-amp' ), 'text' => __( 'Deliver structured awareness programmes that can support relevant internal, regulatory and framework-based training requirements.', 'succeedlearn-amp' ) ),
		array( 'title' => __( 'Learning & Development Teams', 'succeedlearn-amp' ), 'text' => __( 'Provide employees with engaging and measurable learning experiences that can be incorporated into broader organisational learning programmes.', 'succeedlearn-amp' ) ),
		array( 'title' => __( 'HR & People Teams', 'succeedlearn-amp' ), 'text' => __( "Introduce security awareness during onboarding and reinforce employees' responsibilities throughout their lifecycle within the organisation.", 'succeedlearn-amp' ) ),
		array( 'title' => __( 'Leadership', 'succeedlearn-amp' ), 'text' => __( 'Gain greater visibility into awareness initiatives and demonstrate organisational commitment to developing a stronger security culture.', 'succeedlearn-amp' ) ),
	);
}

/**
 * @return array<int, array{name:string,action:string,description:string}>
 */
function succeedlearn_amp_get_sa_suite_items() {
	if ( function_exists( 'succeedlearn_amp_get_sp_suite_items' ) ) {
		return succeedlearn_amp_get_sp_suite_items();
	}
	return array(
		array( 'name' => __( 'S-Aware', 'succeedlearn-amp' ), 'action' => __( 'Learn', 'succeedlearn-amp' ), 'description' => __( 'Build foundational cybersecurity and privacy knowledge.', 'succeedlearn-amp' ) ),
		array( 'name' => __( 'S-Bytes', 'succeedlearn-amp' ), 'action' => __( 'Reinforce', 'succeedlearn-amp' ), 'description' => __( 'Keep important security concepts fresh through continuous microlearning.', 'succeedlearn-amp' ) ),
		array( 'name' => __( 'S-Phish', 'succeedlearn-amp' ), 'action' => __( 'Test', 'succeedlearn-amp' ), 'description' => __( 'Give employees practical experience recognising realistic phishing threats.', 'succeedlearn-amp' ) ),
		array( 'name' => __( 'S-Play', 'succeedlearn-amp' ), 'action' => __( 'Engage', 'succeedlearn-amp' ), 'description' => __( 'Reinforce cybersecurity concepts through interactive and gamified learning.', 'succeedlearn-amp' ) ),
		array( 'name' => __( 'S-Signs', 'succeedlearn-amp' ), 'action' => __( 'Remind', 'succeedlearn-amp' ), 'description' => __( 'Keep security visible through ongoing awareness campaigns and visual nudges.', 'succeedlearn-amp' ) ),
		array( 'name' => __( 'S-Metrics', 'succeedlearn-amp' ), 'action' => __( 'Measure', 'succeedlearn-amp' ), 'description' => __( 'Bring awareness and behavioural data together to understand programme performance.', 'succeedlearn-amp' ) ),
		array( 'name' => __( 'S-Sync', 'succeedlearn-amp' ), 'action' => __( 'Connect', 'succeedlearn-amp' ), 'description' => __( "Integrate security awareness with the organisation's wider learning and technology ecosystem.", 'succeedlearn-amp' ) ),
	);
}

/**
 * @return array<int, array{traditional:string,saware:string}>
 */
function succeedlearn_amp_get_sa_comparison_items() {
	return array(
		array( 'traditional' => __( 'Annual compliance exercise', 'succeedlearn-amp' ), 'saware' => __( 'Foundation for continuous knowledge building', 'succeedlearn-amp' ) ),
		array( 'traditional' => __( 'Passive content consumption', 'succeedlearn-amp' ), 'saware' => __( 'Interactive scenario-based learning', 'succeedlearn-amp' ) ),
		array( 'traditional' => __( 'Generic awareness', 'succeedlearn-amp' ), 'saware' => __( 'Relevant security and privacy learning', 'succeedlearn-amp' ) ),
		array( 'traditional' => __( 'Limited Learner Interaction', 'succeedlearn-amp' ), 'saware' => __( 'Knowledge checks and assessments', 'succeedlearn-amp' ) ),
		array( 'traditional' => __( 'Difficult to measure understanding', 'succeedlearn-amp' ), 'saware' => __( 'Progress tracking and assessments insights', 'succeedlearn-amp' ) ),
		array( 'traditional' => __( 'Standalone Training Activity', 'succeedlearn-amp' ), 'saware' => __( 'Part of a wider Security Behaviour and Culture ecosystem', 'succeedlearn-amp' ) ),
	);
}

/**
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_sa_faq_items() {
	return array(
		array(
			'question' => __( 'What is S-Aware?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Aware is SucceedLEARN\'s security and privacy awareness elearning solution and the foundational training layer of the SucceedLEARN Security Behaviour & Culture Suite.', 'succeedlearn-amp' ) . '</p><p>' . esc_html__( 'It helps organisations build essential cybersecurity knowledge across their workforce through practical, engaging and scenario-based learning.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What is security awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Security awareness training helps employees understand cybersecurity risks and the actions they can take to protect organisational information, systems and data.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Who is S-Aware designed for?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Aware is designed for organisations that want to build cybersecurity and privacy awareness across their workforce. The programme can be managed by Information Security, Cybersecurity, Compliance, Risk, Learning & Development and HR teams.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What topics can be covered through S-Aware?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Depending on the selected courses, topics can include information security, phishing and social engineering, password and account security, data protection and privacy, malware awareness, remote working, information handling, incident reporting and other relevant cybersecurity topics.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can S-Aware support ISO 27001 and other compliance requirements?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Aware can support security awareness initiatives associated with recognised frameworks such as ISO 27001, SOC 2, GDPR, HIPAA, FERPA and PCI DSS, depending on the courses selected and organisational requirements.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can S-Aware content be customised for our organisation?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Depending on the agreed scope, customisation may include branding, internal policies, processes, terminology, examples, reporting procedures or other organisation-specific information.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can S-Aware be deployed on our existing LMS?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Organisations with an existing Learning Management System can use SCORM-compatible S-Aware content for deployment through their own LMS, subject to the selected licensing and implementation model.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can employee progress and training completion be tracked?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. S-Aware supports tracking of course participation, completion, progress and assessment performance depending on the deployment configuration.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'How does S-Aware work with the other SucceedLEARN SBCS solutions?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Aware establishes foundational security knowledge, while S-Bytes, S-Phish, S-Play, S-Signs, S-Metrics and S-Sync help organisations reinforce, test, engage, measure and connect the broader awareness programme.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can S-Aware be used as a standalone solution?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Organisations can use S-Aware as their security awareness learning solution without implementing the entire Security Behaviour & Culture Suite.', 'succeedlearn-amp' ) . '</p>',
		),
	);
}
