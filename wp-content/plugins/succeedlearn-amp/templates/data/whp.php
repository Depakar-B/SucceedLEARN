<?php
/**
 * Workplace Harassment Prevention Training: AMP data helpers.
 *
 * Content mirrors theme: template-parts/workplace-harassment-prevention-training/*.php
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Workplace Harassment Prevention Training section partial.
 *
 * @param string $name Partial basename without .php.
 * @param array  $args Variables exposed to the partial.
 */
function succeedlearn_amp_whp_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/whp/' . sanitize_file_name( (string) $name ) . '.php';
	if ( ! is_readable( $path ) ) {
		return;
	}

	if ( ! empty( $args ) && is_array( $args ) ) {
		// phpcs:ignore WordPress.PHP.DontExtract.extract_extract -- scoped vars for AMP partials.
		extract( $args, EXTR_SKIP );
	}

	include $path;
}

/**
 * @return string
 */
function succeedlearn_amp_get_whp_canonical_url() {
	$canonical = home_url( '/workplace-harassment-prevention-training/' );
	$page      = get_page_by_path( 'workplace-harassment-prevention-training' );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			return $link;
		}
	}
	return $canonical;
}

/**
 * @return string
 */
function succeedlearn_amp_get_whp_page_title() {
	return __( 'Workplace Harassment Prevention Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_whp_meta_description() {
	return __( 'Online workplace harassment prevention training for global teams. Assign region-specific courses for the US, UK, India and multinational workforces by location, role and responsibility.', 'succeedlearn-amp' );
}

/**
 * Page images.
 *
 * @return array<string,string>
 */
function succeedlearn_amp_get_whp_images() {
	return array(
		'hero'            => succeedlearn_amp_upload_url( '2026/09/global-sexual-harassment-prevention-framework-hero.webp' ),
		'region_specific' => succeedlearn_amp_upload_url( '2026/08/Collaborative-Compliance-Learning.png' ),
		'recognition'     => succeedlearn_amp_upload_url( '2026/09/workplace-sexual-harassment-prevention.webp' ),
	);
}

/**
 * Inline flag / globe icons for the region examples.
 *
 * @return array<string,string>
 */
function succeedlearn_amp_get_whp_flags() {
	return array(
		'us'     => '<svg viewBox="0 0 30 20" focusable="false"><rect width="30" height="20" fill="#b22234"/><path d="M0 2.31h30M0 5.38h30M0 8.46h30M0 11.54h30M0 14.62h30M0 17.69h30" stroke="#ffffff" stroke-width="1.54"/><rect width="12" height="10.77" fill="#3c3b6e"/></svg>',
		'uk'     => '<svg viewBox="0 0 60 30" focusable="false"><clipPath id="sl-whp-uk-clip"><path d="M30 15h30v15zv15H0zH0V0zV0h30z"/></clipPath><rect width="60" height="30" fill="#012169"/><path d="M0 0l60 30M60 0L0 30" stroke="#ffffff" stroke-width="6"/><path d="M0 0l60 30M60 0L0 30" clip-path="url(#sl-whp-uk-clip)" stroke="#c8102e" stroke-width="4"/><path d="M30 0v30M0 15h60" stroke="#ffffff" stroke-width="10"/><path d="M30 0v30M0 15h60" stroke="#c8102e" stroke-width="6"/></svg>',
		'india'  => '<svg viewBox="0 0 30 20" focusable="false"><rect width="30" height="6.67" fill="#ff9933"/><rect y="6.67" width="30" height="6.66" fill="#ffffff"/><rect y="13.33" width="30" height="6.67" fill="#138808"/><circle cx="15" cy="10" r="2.6" fill="none" stroke="#000080" stroke-width="0.6"/><circle cx="15" cy="10" r="0.6" fill="#000080"/></svg>',
		'global' => '<svg viewBox="0 0 24 24" fill="none" focusable="false"><circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.6"/><path d="M3.8 12h16.4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M12 3.5c2.2 2.3 3.3 5.1 3.3 8.5S14.2 18.2 12 20.5c-2.2-2.3-3.3-5.1-3.3-8.5S9.8 5.8 12 3.5Z" stroke="currentColor" stroke-width="1.5"/></svg>',
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whp_region_examples() {
	return array(
		array(
			'region' => __( 'United States', 'succeedlearn-amp' ),
			'text'   => __( 'In the United States, federal anti-discrimination law applies alongside state and local requirements, including mandatory training in certain jurisdictions.', 'succeedlearn-amp' ),
			'flag'   => 'us',
		),
		array(
			'region' => __( 'United Kingdom', 'succeedlearn-amp' ),
			'text'   => __( 'In the United Kingdom, employers have a positive duty to take reasonable steps to prevent sexual harassment.', 'succeedlearn-amp' ),
			'flag'   => 'uk',
		),
		array(
			'region' => __( 'India', 'succeedlearn-amp' ),
			'text'   => __( 'In India, the POSH Act establishes specific prevention, awareness and complaint-redressal responsibilities, including the role of the Internal Committee.', 'succeedlearn-amp' ),
			'flag'   => 'india',
		),
		array(
			'region' => __( 'Other countries', 'succeedlearn-amp' ),
			'text'   => __( 'Across other countries, organisations may need to consider local employment, equality, anti-discrimination and workplace-safety requirements.', 'succeedlearn-amp' ),
			'flag'   => 'global',
		),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_whp_questions() {
	return array(
		__( 'What conduct may constitute harassment?', 'succeedlearn-amp' ),
		__( 'Can harassment occur virtually or away from the office?', 'succeedlearn-amp' ),
		__( 'Can a client, customer, supplier or contractor be involved?', 'succeedlearn-amp' ),
		__( 'What is the difference between intent and impact?', 'succeedlearn-amp' ),
		__( 'How can an employee raise a concern?', 'succeedlearn-amp' ),
		__( 'What should a witness do?', 'succeedlearn-amp' ),
		__( 'What responsibilities does a supervisor have?', 'succeedlearn-amp' ),
		__( 'What happens after a complaint is reported?', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int,array<string,mixed>>
 */
function succeedlearn_amp_get_whp_regional_training() {
	return array(
		array(
			'title'       => __( 'Global Sexual Harassment Prevention Training', 'succeedlearn-amp' ),
			'subtitle'    => __( 'Create a shared standard for an international workforce', 'succeedlearn-amp' ),
			'content'     => array(
				__( 'Provide employees in different countries with a consistent understanding of workplace sexual harassment while recognising that legal definitions, reporting procedures and employee protections vary by location.', 'succeedlearn-amp' ),
				__( 'The course introduces essential prevention principles, workplace boundaries, bystander responses, retaliation and reporting. It also provides country-relevant guidance to help employees connect the organisation’s global expectations with the procedures available where they work.', 'succeedlearn-amp' ),
			),
			'roles'       => array(),
			'best_suited' => __( 'Multinational organisations and internationally distributed teams that require a consistent awareness programme supported by regional reporting information.', 'succeedlearn-amp' ),
			'cta'         => __( 'Explore Global Sexual Harassment Prevention Training', 'succeedlearn-amp' ),
			'cta_url'     => '#global-sexual-harassment-training',
		),
		array(
			'title'       => __( 'US Sexual Harassment Prevention Training', 'succeedlearn-amp' ),
			'subtitle'    => __( 'Training shaped by location and supervisory responsibility', 'succeedlearn-amp' ),
			'content'     => array(
				__( 'U.S. harassment-prevention requirements can vary by state, locality, employer size and employee role.', 'succeedlearn-amp' ),
				__( 'SucceedLEARN provides separate learning paths for employees and supervisors. Employee training focuses on recognising harassment, reporting concerns, retaliation and appropriate workplace responses. Supervisor training addresses additional responsibilities such as policy enforcement, escalation, documentation and complaint handling.', 'succeedlearn-amp' ),
				__( 'Employers should select the appropriate course according to each employee’s work location and responsibilities.', 'succeedlearn-amp' ),
			),
			'roles'       => array(),
			'best_suited' => __( 'US-based employees, supervisors and managers requiring training selected according to their location and responsibilities.', 'succeedlearn-amp' ),
			'cta'         => __( 'Explore US Harassment Prevention Training', 'succeedlearn-amp' ),
			'cta_url'     => '#us-harassment-prevention-training',
		),
		array(
			'title'       => __( 'Preventing Sexual Harassment at Work: UK', 'succeedlearn-amp' ),
			'subtitle'    => __( 'Support the employer’s preventive approach', 'succeedlearn-amp' ),
			'content'     => array(
				__( 'UK employers have a positive legal duty to take reasonable steps to prevent sexual harassment of workers.', 'succeedlearn-amp' ),
				__( 'Relevant and regularly reviewed training can support this wider preventive approach when reinforced by appropriate policies, reporting channels, risk assessment and organisational action.', 'succeedlearn-amp' ),
				__( 'The course helps workers recognise sexual harassment, understand the importance of purpose, effect and context, identify reporting options and respond appropriately when they experience or witness concerning conduct.', 'succeedlearn-amp' ),
			),
			'roles'       => array(),
			'best_suited' => __( 'Organisations with workers in England, Scotland or Wales seeking awareness training that supports their broader harassment-prevention framework.', 'succeedlearn-amp' ),
			'cta'         => __( 'Explore UK Sexual Harassment Prevention Training', 'succeedlearn-amp' ),
			'cta_url'     => '#uk-sexual-harassment-training',
		),
		array(
			'title'       => __( 'India POSH Training', 'succeedlearn-amp' ),
			'subtitle'    => __( 'Build awareness and capability across every POSH responsibility', 'succeedlearn-amp' ),
			'content'     => array(
				__( 'India’s Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act, 2013 places specific responsibilities on employers relating to prevention, awareness and complaint redressal.', 'succeedlearn-amp' ),
				__( 'Different audiences require different levels of knowledge. SucceedLEARN provides role-specific POSH learning for employees, managers and Internal Committee members.', 'succeedlearn-amp' ),
			),
			'roles'       => array(
				array(
					'title' => __( 'POSH Foundation Training for employees', 'succeedlearn-amp' ),
					'text'  => __( 'Helps employees recognise sexual harassment, understand the scope of the workplace, identify reporting options and learn about the role of the Internal Committee.', 'succeedlearn-amp' ),
				),
				array(
					'title' => __( 'POSH Training for managers', 'succeedlearn-amp' ),
					'text'  => __( 'Helps managers receive concerns sensitively, explain available options, document information objectively, escalate matters appropriately and support employees during and after the complaint process.', 'succeedlearn-amp' ),
				),
				array(
					'title' => __( 'POSH Training for Internal Committee members', 'succeedlearn-amp' ),
					'text'  => __( 'Develops deeper understanding of IC jurisdiction, conciliation, inquiry procedure, statutory timelines, natural justice, confidentiality, interim measures, inquiry reports and annual reporting responsibilities.', 'succeedlearn-amp' ),
				),
			),
			'best_suited' => __( 'Organisations operating in India that need role-relevant POSH awareness and capability-building.', 'succeedlearn-amp' ),
			'cta'         => __( 'Explore India POSH Training', 'succeedlearn-amp' ),
			'cta_url'     => '#india-posh-training',
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whp_course_selection() {
	return array(
		array(
			'workforce' => __( 'Employees across multiple countries', 'succeedlearn-amp' ),
			'training'  => __( 'Global Sexual Harassment Prevention Training', 'succeedlearn-amp' ),
		),
		array(
			'workforce' => __( 'Employees working in the United States', 'succeedlearn-amp' ),
			'training'  => __( 'US Employee Harassment Prevention Training', 'succeedlearn-amp' ),
		),
		array(
			'workforce' => __( 'US supervisors and managers', 'succeedlearn-amp' ),
			'training'  => __( 'US Supervisor Harassment Prevention Training', 'succeedlearn-amp' ),
		),
		array(
			'workforce' => __( 'Workers in England, Scotland or Wales', 'succeedlearn-amp' ),
			'training'  => __( 'Preventing Sexual Harassment at Work: UK', 'succeedlearn-amp' ),
		),
		array(
			'workforce' => __( 'Employees working in India', 'succeedlearn-amp' ),
			'training'  => __( 'POSH Foundation Training', 'succeedlearn-amp' ),
		),
		array(
			'workforce' => __( 'Managers working in India', 'succeedlearn-amp' ),
			'training'  => __( 'POSH Manager Training', 'succeedlearn-amp' ),
		),
		array(
			'workforce' => __( 'India Internal Committee members', 'succeedlearn-amp' ),
			'training'  => __( 'POSH IC Member Training', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whp_audiences() {
	return array(
		array(
			'number' => '01',
			'title'  => __( 'Employees', 'succeedlearn-amp' ),
			'text'   => __( 'Employees learn to recognise concerning behaviour, understand organisational expectations, identify reporting routes and consider appropriate bystander responses.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '02',
			'title'  => __( 'Supervisors and managers', 'succeedlearn-amp' ),
			'text'   => __( 'People managers learn how to receive concerns, avoid dismissive or prejudicial responses, document essential information and escalate matters through the correct channels.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '03',
			'title'  => __( 'Complaint-handling teams', 'succeedlearn-amp' ),
			'text'   => __( 'Specialist audiences, including India Internal Committee members, receive deeper procedural learning appropriate to their responsibilities.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_whp_customisation_items() {
	return array(
		__( 'Organisation branding', 'succeedlearn-amp' ),
		__( 'Anti-harassment or POSH policy', 'succeedlearn-amp' ),
		__( 'Reporting and escalation channels', 'succeedlearn-amp' ),
		__( 'HR and compliance contact details', 'succeedlearn-amp' ),
		__( 'India Internal Committee information', 'succeedlearn-amp' ),
		__( 'Leadership messages', 'succeedlearn-amp' ),
		__( 'Industry-relevant examples', 'succeedlearn-amp' ),
		__( 'Assessments and completion requirements', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whp_delivery_options() {
	return array(
		array(
			'title' => __( 'SucceedLEARN LMS', 'succeedlearn-amp' ),
			'text'  => __( 'Assign courses, monitor participation and manage learning through our hosted platform.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'SCORM delivery', 'succeedlearn-amp' ),
			'text'  => __( 'Deploy compatible course packages through your organisation’s existing learning management system.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Mobile and desktop access', 'succeedlearn-amp' ),
			'text'  => __( 'Enable employees to complete assigned learning using supported mobile devices, desktops or laptops.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Completion reporting', 'succeedlearn-amp' ),
			'text'  => __( 'Monitor course completion and obtain relevant learner records and reports according to the selected delivery model.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Assessments and LinkedIn sharable certificates', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce learning and document completion through course assessments and certificates where included in the selected module.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whp_reasons() {
	return array(
		array(
			'title' => __( 'Region-relevant content', 'succeedlearn-amp' ),
			'text'  => __( 'Choose learning designed around the workforce location and regional context instead of relying on one generic course for every employee.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Role-specific learning', 'succeedlearn-amp' ),
			'text'  => __( 'Provide employees, supervisors, managers and Internal Committee members with content relevant to their responsibilities.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Workplace-based scenarios', 'succeedlearn-amp' ),
			'text'  => __( 'Help learners apply concepts through situations that reflect contemporary office, remote, digital and customer-facing work.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Customisation support', 'succeedlearn-amp' ),
			'text'  => __( 'Incorporate branding, policies, reporting routes and selected organisational information.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Flexible implementation', 'succeedlearn-amp' ),
			'text'  => __( 'Use the SucceedLEARN platform or deliver courses through a compatible organisational LMS.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Compliance learning expertise', 'succeedlearn-amp' ),
			'text'  => __( 'Access content developed with input from subject-matter experts and supported by Succeed Technologies’ experience in workplace compliance learning.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_whp_prevention_items() {
	return array(
		__( 'Current regional policies', 'succeedlearn-amp' ),
		__( 'Workplace risk assessments', 'succeedlearn-amp' ),
		__( 'Accessible reporting channels', 'succeedlearn-amp' ),
		__( 'Prompt and impartial investigations', 'succeedlearn-amp' ),
		__( 'Appropriate corrective action', 'succeedlearn-amp' ),
		__( 'Periodic review of training and policies', 'succeedlearn-amp' ),
		__( 'Protection from retaliation or victimisation', 'succeedlearn-amp' ),
		__( 'Trained managers and complaint handlers', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_whp_faq_items() {
	return array(
		array(
			'question' => __( 'Is workplace harassment prevention training legally required?', 'succeedlearn-amp' ),
			'answer'   => __( 'Requirements depend on the employee’s location, employer size, industry and role. Certain US states and cities prescribe training. India’s POSH framework requires regular awareness programmes and orientation for Internal Committee members. UK employers have a positive duty to take reasonable steps to prevent sexual harassment, although the law does not prescribe one universal course duration for every employer.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can one global course satisfy every country’s legal requirements?', 'succeedlearn-amp' ),
			'answer'   => __( 'No single course should automatically be assumed to satisfy every national, state or local requirement. A global course can create a shared foundation, while regional modules provide more specific legal and procedural context.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can the courses include our policy and reporting information?', 'succeedlearn-amp' ),
			'answer'   => __( 'Customisation may include organisational branding, relevant policy information, reporting routes, HR contacts and India Internal Committee details, depending on the selected course and scope.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can employees complete the training on mobile devices?', 'succeedlearn-amp' ),
			'answer'   => __( 'The courses can be delivered for supported mobile and desktop access, subject to the selected platform, course format and technical configuration.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can the training be deployed through our LMS?', 'succeedlearn-amp' ),
			'answer'   => __( 'SCORM-compatible delivery can be discussed for organisations that want to deploy content through an existing LMS. Hosted delivery through the SucceedLEARN platform is also available.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does course completion guarantee legal compliance?', 'succeedlearn-amp' ),
			'answer'   => __( 'No. Training can support an organisation’s compliance and prevention programme, but it does not replace legal advice, appropriate policies, reporting systems, risk assessment, properly conducted investigations or corrective action.', 'succeedlearn-amp' ),
		),
	);
}
