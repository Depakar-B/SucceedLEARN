<?php
/**
 * S-Metrics — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an S-Metrics section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_sm_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/s-metrics/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_sm_canonical_url() {
	$canonical = home_url( '/security-awareness/s-metrics-tracking-reporting/' );
	foreach ( array(
		's-metrics-tracking-reporting',
		's-metrics',
		'security-awareness/s-metrics-tracking-reporting',
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
function succeedlearn_amp_get_sm_page_title() {
	return __( 'Security Awareness Analytics, Reports & Compliance Dashboard', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sm_meta_description() {
	return __( 'S-Metrics unifies security awareness analytics and reporting across training, phishing simulations, microlearning and gamified learning so teams can measure progress and demonstrate compliance.', 'succeedlearn-amp' );
}

/**
 * Hero image with local uploads fallback to production CDN.
 *
 * @return string
 */
function succeedlearn_amp_get_sm_hero_image() {
	$path      = '2026/09/Security-Awareness-Analytics-S-Metrics.webp';
	$local     = WP_CONTENT_DIR . '/uploads/' . $path;
	$uploads   = content_url( '/uploads/' . $path );
	$cdn       = 'https://succeedlearn.com/wp-content/uploads/' . $path;
	return file_exists( $local ) ? $uploads : $cdn;
}

/**
 * Resolve an uploads image path with CDN fallback.
 *
 * @param string $path Relative path under uploads.
 * @return string
 */
function succeedlearn_amp_get_sm_image( $path ) {
	$path = ltrim( (string) $path, '/' );
	if ( function_exists( 'succeedlearn_amp_upload_url' ) ) {
		return succeedlearn_amp_upload_url( $path );
	}
	$local = WP_CONTENT_DIR . '/uploads/' . $path;
	if ( file_exists( $local ) ) {
		return content_url( '/uploads/' . $path );
	}
	return 'https://succeedlearn.com/wp-content/uploads/' . $path;
}

/**
 * Suite reporting cards.
 *
 * @return array<int, array{title:string,lead:string,intro:string,items:string[],closing:string}>
 */
function succeedlearn_amp_get_sm_suite_reports() {
	return array(
		array(
			'title'   => __( 'S-Aware Reporting', 'succeedlearn-amp' ),
			'lead'    => __( 'Track foundational learning activity across security awareness courses.', 'succeedlearn-amp' ),
			'intro'   => __( 'Administrators can monitor areas such as:', 'succeedlearn-amp' ),
			'items'   => array(
				__( 'Employee enrolments', 'succeedlearn-amp' ),
				__( 'Course completion', 'succeedlearn-amp' ),
				__( 'Learning progress', 'succeedlearn-amp' ),
				__( 'Assessment performance', 'succeedlearn-amp' ),
				__( 'Certificates', 'succeedlearn-amp' ),
				__( 'Reminders', 'succeedlearn-amp' ),
				__( 'Learners requiring follow-up', 'succeedlearn-amp' ),
			),
			'closing' => __( 'This helps organisations maintain visibility into formal security-awareness learning across the workforce.', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'S-Phish Reporting', 'succeedlearn-amp' ),
			'lead'    => __( 'Gain visibility into employee behaviour during phishing simulation campaigns.', 'succeedlearn-amp' ),
			'intro'   => __( 'Depending on campaign configuration, reporting can include:', 'succeedlearn-amp' ),
			'items'   => array(
				__( 'Email delivery', 'succeedlearn-amp' ),
				__( 'Email opens', 'succeedlearn-amp' ),
				__( 'Reporting behaviour', 'succeedlearn-amp' ),
				__( 'Resiliency scores', 'succeedlearn-amp' ),
				__( 'Remedial training completion', 'succeedlearn-amp' ),
				__( 'User and group-level performance', 'succeedlearn-amp' ),
			),
			'closing' => __( 'These insights help organisations identify patterns in phishing behaviour and determine where additional reinforcement may be needed.', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'S-Bytes Reporting', 'succeedlearn-amp' ),
			'lead'    => __( 'Monitor participation in continuous security-awareness microlearning.', 'succeedlearn-amp' ),
			'intro'   => __( 'Reporting can help administrators understand:', 'succeedlearn-amp' ),
			'items'   => array(
				__( 'Campaign participation', 'succeedlearn-amp' ),
				__( 'Completion', 'succeedlearn-amp' ),
				__( 'Employee engagement', 'succeedlearn-amp' ),
				__( 'Ongoing reinforcement progress', 'succeedlearn-amp' ),
			),
			'closing' => __( 'This helps organisations understand whether continuous awareness activity is reaching the intended workforce.', 'succeedlearn-amp' ),
		),
		array(
			'title'   => __( 'S-Play Reporting', 'succeedlearn-amp' ),
			'lead'    => __( 'Track engagement with gamified security-awareness campaigns.', 'succeedlearn-amp' ),
			'intro'   => __( 'Administrators can monitor:', 'succeedlearn-amp' ),
			'items'   => array(
				__( 'Assigned games', 'succeedlearn-amp' ),
				__( 'Participation', 'succeedlearn-amp' ),
				__( 'Completion', 'succeedlearn-amp' ),
				__( 'Campaign activity', 'succeedlearn-amp' ),
				__( 'Employee interaction', 'succeedlearn-amp' ),
			),
			'closing' => __( 'This helps organisations understand how gamified learning contributes to wider awareness engagement.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Audit / compliance checklist items.
 *
 * @return string[]
 */
function succeedlearn_amp_get_sm_audit_items() {
	return array(
		__( 'Training assignments', 'succeedlearn-amp' ),
		__( 'Completion records', 'succeedlearn-amp' ),
		__( 'Assessment outcomes', 'succeedlearn-amp' ),
		__( 'Certificates', 'succeedlearn-amp' ),
		__( 'Campaign history', 'succeedlearn-amp' ),
		__( 'Awareness participation', 'succeedlearn-amp' ),
		__( 'Relevant reporting activity', 'succeedlearn-amp' ),
	);
}

/**
 * Audience / features team cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sm_team_groups() {
	return array(
		array(
			'title' => __( 'Information Security & Cybersecurity Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Monitor employee awareness, phishing behaviour and campaign performance while identifying areas requiring additional reinforcement.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Compliance & Risk Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Maintain visibility into training records, campaign history and awareness activity that may support governance and audit requirements.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Learning & Development Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Track participation, completion and assessment performance across security learning initiatives.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'HR & People Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Monitor assigned awareness activity across employee populations and support follow-up where required.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Leadership', 'succeedlearn-amp' ),
			'text'  => __( 'Access clearer programme-level reporting that helps communicate security awareness activity and progress across the organisation.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * SBCS journey steps for the suite section.
 *
 * @return array<int, array{name:string,action:string,description:string}>
 */
function succeedlearn_amp_get_sm_suite_items() {
	return array(
		array(
			'name'        => __( 'S-Aware', 'succeedlearn-amp' ),
			'action'      => __( 'Learn', 'succeedlearn-amp' ),
			'description' => __( 'Build foundational cybersecurity and privacy knowledge.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Bytes', 'succeedlearn-amp' ),
			'action'      => __( 'Reinforce', 'succeedlearn-amp' ),
			'description' => __( 'Keep important security concepts fresh through short, continuous microlearning.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Phish', 'succeedlearn-amp' ),
			'action'      => __( 'Test', 'succeedlearn-amp' ),
			'description' => __( 'Give employees practical experience recognising realistic phishing threats.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Play', 'succeedlearn-amp' ),
			'action'      => __( 'Engage', 'succeedlearn-amp' ),
			'description' => __( 'Reinforce security concepts through interactive and gamified learning.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Signs', 'succeedlearn-amp' ),
			'action'      => __( 'Remind', 'succeedlearn-amp' ),
			'description' => __( 'Keep security visible through ongoing awareness campaigns and visual nudges.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Metrics', 'succeedlearn-amp' ),
			'action'      => __( 'Measure', 'succeedlearn-amp' ),
			'description' => __( 'Bring awareness and behavioural data together to understand programme performance.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Sync', 'succeedlearn-amp' ),
			'action'      => __( 'Connect', 'succeedlearn-amp' ),
			'description' => __( "Integrate security awareness with the organisation's wider learning and technology ecosystem.", 'succeedlearn-amp' ),
		),
	);
}

/**
 * Choose / benefits cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sm_choose_reasons() {
	return array(
		array(
			'title' => __( 'One Platform for Complete Visibility', 'succeedlearn-amp' ),
			'text'  => __( 'Consolidate reporting across learning, phishing simulations, gamification, microlearning, and awareness reinforcement.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Informed Decisions', 'succeedlearn-amp' ),
			'text'  => __( 'Use awareness data to identify trends, engagement gaps and areas where additional reinforcement may be useful.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Simplified Audit Readiness', 'succeedlearn-amp' ),
			'text'  => __( 'Maintain accurate training records, completion reports, assessment data, certificates, and campaign history to demonstrate due diligence during audits and regulatory reviews.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Flexible Reports', 'succeedlearn-amp' ),
			'text'  => __( 'Filter data according to users, organisational groups, campaigns, courses and other relevant dimensions.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Executive-Level Reports', 'succeedlearn-amp' ),
			'text'  => __( 'Provide leadership teams with clear, exportable reports that demonstrate programme performance, employee participation, organisational risk, and security awareness maturity.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Continuous Programme Improvement', 'succeedlearn-amp' ),
			'text'  => __( 'Measure awareness outcomes over time, identify improvement opportunities, and refine future awareness campaigns using real organisational data.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Comparison table rows.
 *
 * @return array<int, array{traditional:string,smetrics:string}>
 */
function succeedlearn_amp_get_sm_comparison_rows() {
	return array(
		array(
			'traditional' => __( 'Separate reports across different awareness activities', 'succeedlearn-amp' ),
			'smetrics'    => __( 'Unified security-awareness reporting', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Primarily completion-focused', 'succeedlearn-amp' ),
			'smetrics'    => __( 'Learning, engagement and behavioural visibility', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Manual report consolidation', 'succeedlearn-amp' ),
			'smetrics'    => __( 'Centralised analytics', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Limited filtering', 'succeedlearn-amp' ),
			'smetrics'    => __( 'Flexible filters across users, groups and campaigns', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Campaign-specific information', 'succeedlearn-amp' ),
			'smetrics'    => __( 'Cross-programme awareness visibility', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Difficult to compare trends', 'succeedlearn-amp' ),
			'smetrics'    => __( 'Programme trends can be reviewed over time', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Static reporting', 'succeedlearn-amp' ),
			'smetrics'    => __( 'Data can inform future awareness activity', 'succeedlearn-amp' ),
		),
	);
}

/**
 * FAQ items (HTML answers for accordion).
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_sm_faq_items() {
	return array(
		array(
			'question' => __( 'What is S-Metrics?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Metrics is the security-awareness analytics and reporting solution within the SucceedLEARN Security Behaviour & Culture Suite.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'It consolidates reporting across multiple awareness activities to provide organisations with greater visibility into employee learning, campaign performance and behavioural indicators.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What is a security awareness dashboard?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'A security awareness dashboard brings together data from cybersecurity awareness activities such as employee training, phishing simulations, microlearning and engagement campaigns into a central reporting view.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'It helps administrators understand programme participation and identify areas requiring additional attention.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What can S-Metrics track?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Depending on the SBCS solutions deployed, S-Metrics can provide visibility into learning progress, training completion, assessments, phishing interactions, reporting behaviour, microlearning engagement, gamified-learning participation and other awareness indicators.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can S-Metrics report on phishing simulation performance?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. S-Metrics can incorporate phishing simulation data from S-Phish, including indicators such as email delivery, opens, clicks, reporting behaviour, credential submission, resiliency scores and remedial-learning activity.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can S-Metrics track employee training completion?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. S-Metrics can provide visibility into course assignments, enrolments, completion, progress, assessments and certificates from relevant learning activity.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can reports be exported?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. S-Metrics supports exportable reporting that can be used for management reviews, internal analysis, audit preparation and other organisational reporting requirements.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can S-Metrics support compliance and audit readiness?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Metrics can help organisations maintain visibility into security-awareness activity, completion records, assessments, campaign history and other relevant information that may support audit and compliance processes.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'The specific evidence required depends on the applicable framework, regulatory requirement or audit scope.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'How does S-Metrics work with other SucceedLEARN SBCS products?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Metrics provides the measurement layer of the wider SBCS ecosystem.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'It can bring together data from solutions such as S-Aware, S-Phish, S-Bytes and S-Play, helping organisations understand awareness performance across multiple learning and behavioural activities.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Who typically uses S-Metrics?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Metrics can be useful for Information Security, Cybersecurity, Compliance, Risk, Learning & Development, HR and leadership teams that require visibility into security-awareness activity and programme performance.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does S-Metrics automatically make an organisation compliant?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'No. S-Metrics can provide reporting and records that support governance, audit and compliance activities, but using a reporting platform alone does not establish compliance with a specific regulation or framework.', 'succeedlearn-amp' ) . '</p>',
		),
	);
}

/**
 * FAQPage JSON-LD for the S-Metrics AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_sm_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_sm_faq_items() as $item ) {
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
