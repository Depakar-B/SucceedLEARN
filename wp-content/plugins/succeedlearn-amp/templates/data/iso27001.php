<?php
/**
 * ISO 27001:2022 Staff Awareness Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an ISO 27001 section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_iso27001_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/iso27001/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_iso27001_canonical_url() {
	$canonical = home_url( '/iso-27001-2022-staff-awareness-training/' );
	foreach ( array(
		'iso-27001-2022-staff-awareness-training',
		'iso-27001',
		'iso27001',
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
function succeedlearn_amp_get_iso27001_page_title() {
	return __( 'ISO 27001:2022 Staff Awareness Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_iso27001_meta_description() {
	return __( 'SucceedLEARN\'s ISO 27001:2022 Staff Awareness Training helps employees understand their information security responsibilities, the ISMS, CIA principles, and everyday behaviours that strengthen organisational information security.', 'succeedlearn-amp' );
}

/**
 * Hero image URL.
 *
 * @return string
 */
function succeedlearn_amp_get_iso27001_hero_image() {
	return succeedlearn_amp_upload_url( '2026/10/ISO-27001-1.webp' );
}

/**
 * Why-section image URL.
 *
 * @return string
 */
function succeedlearn_amp_get_iso27001_why_image() {
	return succeedlearn_amp_upload_url( '2026/10/ISO-27001.webp' );
}

/**
 * Customise-section image URL.
 *
 * @return string
 */
function succeedlearn_amp_get_iso27001_customise_image() {
	return succeedlearn_amp_upload_url( '2026/01/ISO-27001-1.webp' );
}

/**
 * "What will employees learn?" bullet list.
 *
 * @return string[]
 */
function succeedlearn_amp_get_iso27001_learn_items() {
	return array(
		__( 'Understand the purpose of ISO/IEC 27001:2022 and why information security matters.', 'succeedlearn-amp' ),
		__( 'Understand the role of an Information Security Management System (ISMS).', 'succeedlearn-amp' ),
		__( 'Explain the principles of Confidentiality, Integrity and Availability (CIA).', 'succeedlearn-amp' ),
		__( 'Recognize their individual responsibilities for protecting organizational information.', 'succeedlearn-amp' ),
		__( 'Understand information security risks and the importance of appropriate controls.', 'succeedlearn-amp' ),
		__( 'Follow organizational information security policies and procedures.', 'succeedlearn-amp' ),
		__( 'Recognize common information security threats and unsafe behaviors.', 'succeedlearn-amp' ),
		__( 'Handle information and organizational assets more securely.', 'succeedlearn-amp' ),
		__( 'Identify and report information security incidents through appropriate organizational channels.', 'succeedlearn-amp' ),
		__( 'Understand how their everyday behavior contributes to the effectiveness of the organization\'s ISMS.', 'succeedlearn-amp' ),
	);
}

/**
 * Awareness-supports table rows (2 columns: area / support).
 *
 * @return array<int, array{area:string,support:string}>
 */
function succeedlearn_amp_get_iso27001_objective_rows() {
	return array(
		array(
			'area'    => __( 'Information Security Awareness', 'succeedlearn-amp' ),
			'support' => __( 'Introduces employees to information security and why organisational information needs protection.', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Information Security Policy', 'succeedlearn-amp' ),
			'support' => __( 'Helps employees understand the importance of following organisational security policies and procedures.', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'ISMS Awareness', 'succeedlearn-amp' ),
			'support' => __( 'Explains what an Information Security Management System is and how employees contribute to its effectiveness.', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Confidentiality, Integrity & Availability', 'succeedlearn-amp' ),
			'support' => __( 'Makes the CIA principles understandable through practical workplace situations.', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Roles & Responsibilities', 'succeedlearn-amp' ),
			'support' => __( 'Reinforces that information security is a shared organisational responsibility rather than solely an IT function.', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Information Security Risks', 'succeedlearn-amp' ),
			'support' => __( 'Helps employees recognise behaviours and situations that can expose organisational information to risk.', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Secure Information Handling', 'succeedlearn-amp' ),
			'support' => __( 'Reinforces appropriate handling and protection of organisational information and assets.', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Security Incident Reporting', 'succeedlearn-amp' ),
			'support' => __( 'Helps employees recognise potential security incidents and understand the importance of prompt reporting.', 'succeedlearn-amp' ),
		),
		array(
			'area'    => __( 'Awareness, Education & Training', 'succeedlearn-amp' ),
			'support' => __( 'Supports organisation-wide awareness objectives associated with ISO 27001:2022 Annex A Control 6.3.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Learning element cards (course structure).
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_iso27001_learning_elements() {
	return array(
		array(
			'title' => __( 'Visually Engaging Animated Explainers', 'succeedlearn-amp' ),
			'text'  => __( 'Visually engaging animated explainers that simplify ISO 27001 concepts, ISMS principles and information security responsibilities', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Short, Structured Learning Modules', 'succeedlearn-amp' ),
			'text'  => __( 'Short, structured learning modules', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Interactive Decision-Making Scenarios', 'succeedlearn-amp' ),
			'text'  => __( 'Interactive decision-making scenarios', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Workplace-Relevant Information Security Examples', 'succeedlearn-amp' ),
			'text'  => __( 'Workplace-relevant information security examples', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Embedded Knowledge Checks and Security Quizzes', 'succeedlearn-amp' ),
			'text'  => __( 'Embedded knowledge checks and security quizzes', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Final Assessment', 'succeedlearn-amp' ),
			'text'  => __( 'Final assessment', 'succeedlearn-amp' ),
		),
	);
}

/**
 * "Why choose" cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_iso27001_choose_items() {
	return array(
		array(
			'title' => __( 'Built for Employees, Not Just Security Specialists', 'succeedlearn-amp' ),
			'text'  => __( 'Complex information security concepts are translated into practical, understandable learning for employees across functions.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Focused on Workplace Behavior', 'succeedlearn-amp' ),
			'text'  => __( 'The training connects ISO 27001 principles with the actions employees take when working with information, systems, and organizational assets.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Interactive Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Scenarios, knowledge checks, and assessments help employees engage with the subject rather than passively consuming information.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Supports Awareness and Audit Readiness', 'succeedlearn-amp' ),
			'text'  => __( 'Course completion and assessment records can support an organization in demonstrating that awareness activities have taken place. They should be considered part of the organization\'s wider ISO 27001 programme rather than proof of ISO 27001 compliance by themselves.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Flexible Deployment', 'succeedlearn-amp' ),
			'text'  => __( 'Deliver training through SucceedLEARN or deploy it through your existing LMS using SCORM.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Customizable to Your Organization', 'succeedlearn-amp' ),
			'text'  => __( 'Where required, learning can be adapted to better reflect organizational policies, terminology, and reporting processes.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Customise list items.
 *
 * @return string[]
 */
function succeedlearn_amp_get_iso27001_customise_items() {
	return array(
		__( 'Branding', 'succeedlearn-amp' ),
		__( 'Internal terminology', 'succeedlearn-amp' ),
		__( 'Organization-specific examples', 'succeedlearn-amp' ),
		__( 'Relevant workforce or industry context', 'succeedlearn-amp' ),
	);
}

/**
 * Audience cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_iso27001_audience_items() {
	return array(
		array(
			'title' => __( 'Employees Across Business Functions', 'succeedlearn-amp' ),
			'text'  => __( 'Employees across business functions who access organizational systems, information or assets.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Managers & Team Leaders', 'succeedlearn-amp' ),
			'text'  => __( 'Managers and team leaders responsible for reinforcing organizational policies and secure working practices.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Employees Handling Sensitive Information', 'succeedlearn-amp' ),
			'text'  => __( 'Employees handling sensitive information including business, customer, employee or other protected information.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Remote & Hybrid Employees', 'succeedlearn-amp' ),
			'text'  => __( 'Remote and hybrid employees accessing organizational information outside traditional office environments.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'New Joiners & Contractors', 'succeedlearn-amp' ),
			'text'  => __( 'New joiners and contractors who require foundational awareness of the organization\'s information security expectations.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * FAQ items (HTML answers for accordion).
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_iso27001_faq_items() {
	return array(
		array(
			'question' => __( 'What is ISO 27001:2022?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'ISO/IEC 27001:2022 is the international standard specifying requirements for an Information Security Management System (ISMS). It provides a framework for organizations to manage information security risks and continually improve how information is protected.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What is ISO 27001 awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'ISO 27001 awareness training helps employees understand information security, their organisation’s ISMS and the responsibilities they have for protecting information and supporting information security objectives.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What is ISO 27001:2022 Annex A Control 6.3?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Annex A Control 6.3 concerns Information Security Awareness, Education and Training and addresses appropriate awareness and training for personnel and relevant interested parties according to their roles.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Who should take ISO 27001 staff awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Training can be relevant to employees, managers, contractors, new joiners, and others whose work involves organizational information, systems, or information assets. The appropriate training should reflect their responsibilities and the organization’s requirements.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What is an ISMS?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'An Information Security Management System is the framework an organization uses to systematically manage information security risks through policies, processes, responsibilities, controls and continual improvement.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What does the CIA triad mean?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The CIA triad represents Confidentiality, Integrity and Availability — three foundational principles used when considering the protection of information.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What changed between ISO 27001:2013 and ISO 27001:2022?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Among other changes, the 2022 edition reorganised Annex A from 114 controls across 14 categories to 93 controls grouped into Organisational, People, Physical and Technological themes.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does completing this course make an organization ISO 27001 certified?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'No. Employee awareness training can support an organization’s ISO 27001 programme, but completing a training course alone does not establish ISO 27001 certification.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does the course include an assessment?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. The existing SucceedLEARN course includes knowledge checks and a final assessment.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can the ISO 27001 training be customized?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Based on the agreed customization scope, training can be adapted to reflect relevant organizational branding, policies, terminology, processes, and reporting mechanisms.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can we deliver the ISO 27001 course through our own LMS?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. SucceedLEARN currently offers SCORM delivery for organisations using their own LMS as well as SaaS-based delivery.', 'succeedlearn-amp' ) . '</p>',
		),
	);
}

/**
 * FAQPage JSON-LD for the ISO 27001 AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_iso27001_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_iso27001_faq_items() as $item ) {
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
