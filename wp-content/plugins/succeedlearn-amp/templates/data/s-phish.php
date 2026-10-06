<?php
/**
 * S-Phish Phishing Simulation: AMP data helpers.
 *
 * Copy mirrors theme: template-parts/s-phish-phishing-simulation/*.php
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an S-Phish section partial.
 *
 * @param string               $name Partial basename without .php.
 * @param array<string, mixed> $args Optional vars extracted into the partial scope.
 */
function succeedlearn_amp_s_phish_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/s-phish/' . sanitize_file_name( (string) $name ) . '.php';
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
function succeedlearn_amp_get_s_phish_canonical_url() {
	$canonical = home_url( '/s-phish/' );
	$page      = get_page_by_path( 's-phish' );
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
function succeedlearn_amp_get_s_phish_page_title() {
	return __( 'S-Phish Phishing Simulation Tool', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_s_phish_meta_description() {
	return __( "S-Phish is SucceedLEARN's enterprise phishing simulation tool. Run realistic phishing campaigns, trigger targeted remedial training and measure employee resilience with behavioural analytics.", 'succeedlearn-amp' );
}

/**
 * Image URLs used on the page.
 *
 * @return array<string, string>
 */
function succeedlearn_amp_get_s_phish_images() {
	return array(
		'hero'      => 'https://succeedlearn.com/wp-content/uploads/2026/09/Phishing-Simulation-Tool.webp',
		'learning'  => 'https://succeedlearn.com/wp-content/uploads/2026/09/S-Phish-Continuous-Improvement-Cycle.webp',
		'works'     => 'https://succeedlearn.com/wp-content/uploads/2026/09/Phishing-Campaign-Five-Steps.webp',
		'targeting' => 'https://succeedlearn.com/wp-content/uploads/2026/09/Target-the-right-employees-with-the-right-simulation.webp',
		'phishcue'  => 'https://succeedlearn.com/wp-content/uploads/2026/09/phishcue-reporting-workflow.webp',
	);
}

/**
 * @return array<int, array{title:string, paras:string[]}>
 */
function succeedlearn_amp_get_s_phish_works_steps() {
	return array(
		array(
			'title' => __( 'Select Attack', 'succeedlearn-amp' ),
			'paras' => array(
				__( 'Choose from a comprehensive library of phishing attack scenarios. Administrators can select professionally designed phishing templates or combine multiple templates within a single campaign to closely replicate real-world attack patterns.', 'succeedlearn-amp' ),
			),
		),
		array(
			'title' => __( 'Select Targets', 'succeedlearn-amp' ),
			'paras' => array(
				__( 'Campaigns can be deployed organisation-wide or customised for specific groups based on teams, location, custom user groups etc. This flexibility enables organisations to assess different user populations based on their security risk profile.', 'succeedlearn-amp' ),
			),
		),
		array(
			'title' => __( 'Schedule', 'succeedlearn-amp' ),
			'paras' => array(
				__( 'S-Phish provides flexible campaign scheduling options to align with your security awareness strategy.', 'succeedlearn-amp' ),
				__( 'Flexible scheduling allows administrators to control campaign delivery rather than sending every simulation to every participant at exactly the same moment.', 'succeedlearn-amp' ),
				__( 'Campaign timing can be structured to create a more natural experience and better reflect the unpredictability of real phishing attacks.', 'succeedlearn-amp' ),
			),
		),
		array(
			'title' => __( 'NIST Premises - Optional', 'succeedlearn-amp' ),
			'paras' => array(
				__( 'As an optional step, phishing campaigns can be mapped to the NIST Cybersecurity Framework to support broader governance and compliance initiatives.', 'succeedlearn-amp' ),
				__( 'This helps organisations strengthen their security awareness programmes while demonstrating alignment with globally recognised cybersecurity best practices.', 'succeedlearn-amp' ),
			),
		),
		array(
			'title' => __( 'Review & Phish', 'succeedlearn-amp' ),
			'paras' => array(
				__( 'Before deployment, administrators can review every campaign setting. Once reviewed, campaigns can be launched with a single click, allowing organisations to immediately begin assessing employee behaviour through realistic phishing simulations.', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_s_phish_campaign_types() {
	return array(
		__( 'Organisation-Wide Campaigns', 'succeedlearn-amp' ),
		__( 'Department or Team Campaigns', 'succeedlearn-amp' ),
		__( 'Location-Based Campaigns', 'succeedlearn-amp' ),
		__( 'Higher-Risk Populations', 'succeedlearn-amp' ),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_s_phish_report_items() {
	return array(
		__( 'Resiliency Score', 'succeedlearn-amp' ),
		__( 'Campaign Performance', 'succeedlearn-amp' ),
		__( 'Email Delivery Status', 'succeedlearn-amp' ),
		__( 'Email Opens', 'succeedlearn-amp' ),
		__( 'Link Clicks', 'succeedlearn-amp' ),
		__( 'Reporting Behaviour', 'succeedlearn-amp' ),
		__( 'Training Completion Status', 'succeedlearn-amp' ),
		__( 'Department-wise Performance', 'succeedlearn-amp' ),
		__( 'User-wise Risk Analysis', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int, array{title:string, body:string}>
 */
function succeedlearn_amp_get_s_phish_security_items() {
	return array(
		array(
			'title' => __( 'Privacy by Design', 'succeedlearn-amp' ),
			'body'  => __( 'S-Phish is designed with privacy in mind. Data processed through the platform is protected using appropriate security controls, and S-Phish does not read or inspect users\' mailbox contents as part of normal phishing simulation activities.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Encryption in Transit & at Rest', 'succeedlearn-amp' ),
			'body'  => __( 'Customer data is protected using encryption both in transit and at rest. Communications with the platform are secured using TLS 1.2 or higher, while stored data is protected using encryption-at-rest mechanisms.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Security & Privacy Compliance', 'succeedlearn-amp' ),
			'body'  => __( 'SucceedLEARN follows established security and privacy practices and maintains applicable certifications and attestations, including ISO 27001 and SOC 2 (Compliance frameworks followed by Succeed Technologies Private Limited).', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Secure Authentication & Access Control', 'succeedlearn-amp' ),
			'body'  => __( 'S-Phish supports secure authentication mechanisms, including Single Sign-On (SSO) and OAuth-based authentication, allowing organisations to integrate with their existing identity and authentication environments.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Role-Based Access Control (RBAC)', 'succeedlearn-amp' ),
			'body'  => __( 'Role-Based Access Control ensures that users and administrators can access only the functionality and information permitted for their assigned roles, supporting the principle of least privilege.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Audit Logging & Security Monitoring', 'succeedlearn-amp' ),
			'body'  => __( 'Security-relevant activities and administrative actions are logged to support monitoring, troubleshooting, security investigations and compliance requirements. Security monitoring mechanisms help identify and respond to potentially suspicious activity.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'API Security', 'succeedlearn-amp' ),
			'body'  => __( 'S-Phish incorporates security controls for API-based connectivity to help protect communication and data exchange between the platform and connected enterprise systems.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Vulnerability Management & Penetration Testing', 'succeedlearn-amp' ),
			'body'  => __( 'S-Phish undergoes security testing practices including vulnerability scanning and penetration testing to help identify and address potential security weaknesses.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Data Retention', 'succeedlearn-amp' ),
			'body'  => __( 'S-Phish follows defined data-retention practices to ensure information is retained only in accordance with applicable organisational, contractual and security requirements.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string, text:string}>
 */
function succeedlearn_amp_get_s_phish_phishcue_features() {
	return array(
		array(
			'title' => __( 'One-Click Outlook Reporting', 'succeedlearn-amp' ),
			'text'  => __( 'Report suspicious emails using Outlook’s familiar default Report button.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Centralised Email Collection', 'succeedlearn-amp' ),
			'text'  => __( 'Bring employee-reported messages into one place for easier security-team review.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Detailed Threat Analysis', 'succeedlearn-amp' ),
			'text'  => __( 'Analyse email headers, links and attachments to support investigation.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Classification & Tracking', 'succeedlearn-amp' ),
			'text'  => __( 'Classify reported messages and track them through the review process.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Automated Employee Confirmation', 'succeedlearn-amp' ),
			'text'  => __( 'Let employees know their report has been received without adding manual follow-up.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Security-Team Dashboard', 'succeedlearn-amp' ),
			'text'  => __( 'Give IT and security teams a central view for reviewing and managing reported emails.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Turn Real Phishing Into Future Simulations', 'succeedlearn-amp' ),
			'text'  => __( 'Convert confirmed phishing emails into simulation templates to help employees learn from threats actually targeting the organisation.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string, body:string}>
 */
function succeedlearn_amp_get_s_phish_teams() {
	return array(
		array(
			'title' => __( 'Information Security & Cybersecurity Teams', 'succeedlearn-amp' ),
			'body'  => __( 'Create and manage phishing simulations, assess employee behaviour, identify potential areas of human cyber risk and monitor phishing resilience over time.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Compliance & Risk Teams', 'succeedlearn-amp' ),
			'body'  => __( 'Use structured campaign activity and reporting to support security awareness governance, programme reviews and relevant compliance initiatives.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Learning & Development Teams', 'succeedlearn-amp' ),
			'body'  => __( 'Connect simulation outcomes with targeted learning interventions that help employees strengthen their understanding after risky behaviour occurs.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'HR & People Teams', 'succeedlearn-amp' ),
			'body'  => __( 'Support organisation-wide security culture initiatives and help employees understand their role in recognising and reporting suspicious communications.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Leadership', 'succeedlearn-amp' ),
			'body'  => __( 'Gain greater visibility into organisational phishing resilience, behavioural trends and areas where continued awareness investment may be required.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{traditional:string, sphish:string}>
 */
function succeedlearn_amp_get_s_phish_comparison_rows() {
	return array(
		array(
			'traditional' => __( 'Employees are told what phishing looks like', 'succeedlearn-amp' ),
			'sphish'      => __( 'Employees experience controlled phishing simulations', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Generic phishing examples', 'succeedlearn-amp' ),
			'sphish'      => __( 'Realistic simulated attack scenarios', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Same approach for everyone', 'succeedlearn-amp' ),
			'sphish'      => __( 'Flexible employee and group targeting', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'One-off testing', 'succeedlearn-amp' ),
			'sphish'      => __( 'Campaigns can be conducted continuously', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Click rate as the primary metric', 'succeedlearn-amp' ),
			'sphish'      => __( 'Multiple behavioural indicators', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Failures recorded', 'succeedlearn-amp' ),
			'sphish'      => __( 'Risky behaviour can trigger remedial learning', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Limited behavioural visibility', 'succeedlearn-amp' ),
			'sphish'      => __( 'Campaign, group and user-level reporting', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Standalone phishing activity', 'succeedlearn-amp' ),
			'sphish'      => __( 'Connected to the wider SBCS ecosystem', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string, body:string}>
 */
function succeedlearn_amp_get_s_phish_why_choose() {
	return array(
		array(
			'title' => __( 'Realistic Phishing Simulations', 'succeedlearn-amp' ),
			'body'  => __( 'Test employees using realistic phishing templates designed to reflect the types of deceptive communications they may encounter in their everyday digital environment.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Configurable', 'succeedlearn-amp' ),
			'body'  => __( 'Select attack scenarios, define target populations, manage scheduling and review campaign settings through a structured workflow.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Behaviour-Focused', 'succeedlearn-amp' ),
			'body'  => __( 'Measure what employees actually do when they encounter a simulated threat rather than relying solely on awareness completion.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Educational', 'succeedlearn-amp' ),
			'body'  => __( 'Turn risky interactions into opportunities for targeted remedial learning and immediate reinforcement.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Measurable', 'succeedlearn-amp' ),
			'body'  => __( 'Monitor opens, clicks, reporting, information submission, training completion and other campaign indicators through detailed reporting.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Actionable', 'succeedlearn-amp' ),
			'body'  => __( 'Use campaign results to identify where additional awareness, reinforcement or testing may be required.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{question:string, answer:string}>
 */
function succeedlearn_amp_get_s_phish_faq_items() {
	return array(
		array(
			'question' => __( 'What is S-Phish?', 'succeedlearn-amp' ),
			'answer'   => __( "S-Phish is SucceedLEARN's enterprise phishing simulation tool designed to help organisations assess how employees respond to simulated phishing threats. It enables administrators to create campaigns, select phishing templates, target employee groups, schedule simulations, monitor employee behaviour, assign remedial learning if required and analyse campaign performance through detailed reporting.", 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What is phishing simulation?', 'succeedlearn-amp' ),
			'answer'   => __( 'Phishing simulation is a controlled cybersecurity awareness exercise in which employees receive simulated phishing communications designed to resemble real-world threats. The objective is to safely evaluate how employees recognise and respond to suspicious communication while identifying opportunities for additional awareness and reinforcement.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Why should organisations conduct phishing simulations?', 'succeedlearn-amp' ),
			'answer'   => __( 'Security awareness training helps employees understand phishing, but simulation provides a practical way to assess how that knowledge is applied. Regular simulations can help organisations identify risky behaviours, measure employee reporting behaviour, reinforce learning and understand how phishing resilience develops over time.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can phishing simulations be targeted to specific employee groups?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. S-Phish allows campaigns to be directed towards selected employee populations rather than requiring every simulation to be sent organisation-wide. Depending on organisational configuration, campaigns can be structured around groups such as teams, locations and business units.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can S-Phish campaigns be scheduled?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. S-Phish provides campaign scheduling capabilities that enable administrators to control how and when simulated phishing communications are delivered. This helps organisations conduct simulations in a more structured and less predictable manner.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What does S-Phish measure?', 'succeedlearn-amp' ),
			'answer'   => __( 'Depending on the campaign, reporting can include indicators such as email delivery, email opens, link clicks, information submission, reporting behaviour, user-level analysis and the S-Phish Resiliency Score. These metrics provide organisations with greater visibility into how employees respond to simulated threats.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does S-Phish provide individual and organisation-wide reporting?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. S-Phish provides reporting that can support both organisation-level and user-level analysis. This enables administrators to understand broader workforce patterns while also identifying areas where more targeted reinforcement may be appropriate.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How does S-Phish work with S-Metrics?', 'succeedlearn-amp' ),
			'answer'   => __( 'S-Phish provides detailed phishing campaign and behavioural data. Within the wider SucceedLEARN Security Behaviour & Culture Suite, S-Metrics can bring phishing-related insights together with other awareness and engagement information to provide a broader view of programme performance and workforce security behaviour.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How does S-Phish fit into the SucceedLEARN Security Behaviour & Culture Suite?', 'succeedlearn-amp' ),
			'answer'   => __( 'S-Phish provides the testing and practical simulation layer of SBCS. S-Aware builds foundational knowledge, S-Bytes reinforces concepts through microlearning, S-Phish tests employees against simulated threats, S-Play provides gamified reinforcement, S-Signs maintains visual awareness, S-Metrics supports measurement and S-Sync connects the wider ecosystem. Together, the solutions help organisations move from periodic awareness activities towards continuous security behaviour development.', 'succeedlearn-amp' ),
		),
	);
}
