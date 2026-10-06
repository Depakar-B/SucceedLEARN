<?php
/**
 * Political Donations Training for PE/VC: AMP data helpers.
 *
 * Content mirrors theme: template-parts/courses/political-donations-pe-vc/*.php
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Political Donations Training for PE/VC section partial.
 *
 * @param string $name Partial basename without .php.
 * @param array  $args Variables exposed to the partial.
 */
function succeedlearn_amp_political_donations_pe_vc_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/political-donations-pe-vc/' . sanitize_file_name( (string) $name ) . '.php';
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
function succeedlearn_amp_get_political_donations_pe_vc_canonical_url() {
	$page = get_page_by_path( 'political-donations-compliance-training' );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			return $link;
		}
	}

	$legacy = get_page_by_path( 'political-donations-pe-vc' );
	if ( $legacy instanceof WP_Post && 'publish' === $legacy->post_status ) {
		$link = get_permalink( $legacy );
		if ( $link ) {
			return $link;
		}
	}

	return home_url( '/political-donations-compliance-training/' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_political_donations_pe_vc_page_title() {
	return __( 'Political Donations Training for PE/VC', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_political_donations_pe_vc_meta_description() {
	return __( 'Practical political donations training for Private Equity and Venture Capital teams. Build awareness of political contribution risk, anti-bribery considerations and UK and US Pay-to-Play issues.', 'succeedlearn-amp' );
}

/**
 * Page images.
 *
 * @return array<string,string>
 */
function succeedlearn_amp_get_political_donations_pe_vc_images() {
	return array(
		'hero'          => succeedlearn_amp_upload_url( '2026/10/Political-donations_hero-section-image.webp' ),
		'individuals'   => succeedlearn_amp_upload_url( '2026/09/Image-1-AML.webp' ),
		'organisations' => succeedlearn_amp_upload_url( '2026/09/organisation-image-1.webp' ),
		'cpd'           => succeedlearn_amp_upload_url( '2026/09/CPD.webp' ),
		'overview'      => succeedlearn_amp_upload_url( '2026/09/What-is-Political-Donations_Image.webp' ),
		'regulatory_uk' => succeedlearn_amp_upload_url( '2026/09/uk_regulatory_law.webp' ),
		'regulatory_us' => succeedlearn_amp_upload_url( '2026/09/us_pay_to_play_rules.webp' ),
		'inside_1'      => succeedlearn_amp_upload_url( '2026/09/Inside-the-course_Pol.Don_.webp' ),
		'inside_2'      => succeedlearn_amp_upload_url( '2026/09/Inside-the-course_Image-2.webp' ),
		'inside_3'      => succeedlearn_amp_upload_url( '2026/09/Inside-the-coure_Image-3.webp' ),
		'practical'     => succeedlearn_amp_upload_url( '2026/09/Assessment-image.webp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_political_donations_pe_vc_individual_features() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Interactive eLearning', 'succeedlearn-amp' ),
			'text'  => __( 'Practical digital learning supported by political donations scenarios and knowledge checks.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( '8-minute duration', 'succeedlearn-amp' ),
			'text'  => __( 'Complete the core political donations learning in approximately 8 minutes.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Instant access', 'succeedlearn-amp' ),
			'text'  => __( 'Start learning immediately after purchase.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_political_donations_pe_vc_organisation_features() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Reporting and tracking', 'succeedlearn-amp' ),
			'text'  => __( 'Monitor learner progress, completion and training status.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Automatic reminders', 'succeedlearn-amp' ),
			'text'  => __( 'Support completion with automated learner reminders.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'SCORM or SaaS delivery', 'succeedlearn-amp' ),
			'text'  => __( 'Deploy through your LMS or use the SucceedLEARN platform.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Group assignment', 'succeedlearn-amp' ),
			'text'  => __( 'Assign political donations training to selected teams or learner groups.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '05',
			'title' => __( 'Completion visibility', 'succeedlearn-amp' ),
			'text'  => __( 'Give administrators clear oversight of learner activity.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_political_donations_pe_vc_context_cards() {
	return array(
		array(
			'title' => __( 'UK regulatory context', 'succeedlearn-amp' ),
			'text'  => __( 'Explore political donations, anti-bribery considerations and relevant financial-services risk.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'US Pay-to-Play context', 'succeedlearn-amp' ),
			'text'  => __( 'Understand cross-border political contribution issues relevant to investment management.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'PE/VC scenarios', 'succeedlearn-amp' ),
			'text'  => __( 'Apply compliance principles to realistic investment-sector situations.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_political_donations_pe_vc_regulatory_cards() {
	return array(
		array(
			'title' => __( 'UK political donations and anti-bribery considerations', 'succeedlearn-amp' ),
			'text'  => __( 'Relevant considerations can include company law, political finance requirements, anti-bribery risk, FCA expectations and internal firm policies.', 'succeedlearn-amp' ),
			'image' => 'regulatory_uk',
			'alt'   => __( 'UK political donations and anti-bribery regulatory context', 'succeedlearn-amp' ),
			'code'  => 'UK',
		),
		array(
			'title' => __( 'US Pay-to-Play and investment adviser considerations', 'succeedlearn-amp' ),
			'text'  => __( 'International investment firms may need to consider political contribution restrictions where government investment advisory business is involved.', 'succeedlearn-amp' ),
			'image' => 'regulatory_us',
			'alt'   => __( 'US Pay-to-Play investment adviser considerations', 'succeedlearn-amp' ),
			'code'  => 'US',
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_political_donations_pe_vc_outcomes() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Recognise political contribution risk', 'succeedlearn-amp' ),
			'text'  => __( 'Identify anti-bribery, conflict of interest, regulatory and reputational considerations.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Understand different forms of political support', 'succeedlearn-amp' ),
			'text'  => __( 'Consider financial contributions, sponsorship, fundraising, facilities and in-kind support.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Recognise professional identity risk', 'succeedlearn-amp' ),
			'text'  => __( 'Understand how titles, firm names and public visibility can change the compliance context.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Apply internal approval procedures', 'succeedlearn-amp' ),
			'text'  => __( 'Recognise when escalation, reporting or Compliance input may be appropriate.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,string>
 */
function succeedlearn_amp_get_political_donations_pe_vc_activities() {
	return array(
		__( 'Monetary political contributions', 'succeedlearn-amp' ),
		__( 'Paid fundraising events', 'succeedlearn-amp' ),
		__( 'Political sponsorship', 'succeedlearn-amp' ),
		__( 'Use of company facilities', 'succeedlearn-amp' ),
		__( 'In-kind services', 'succeedlearn-amp' ),
		__( 'Professional titles', 'succeedlearn-amp' ),
		__( 'Organisation branding', 'succeedlearn-amp' ),
		__( 'Public political endorsements', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_political_donations_pe_vc_inside_topics() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Political Contributions and Regulatory Scrutiny', 'succeedlearn-amp' ),
			'text'  => __( 'Regulatory scrutiny and political contribution risk', 'succeedlearn-amp' ),
			'image' => 'inside_1',
			'alt'   => __( 'Political contributions and regulatory scrutiny course screen', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'What Constitutes a Political Donation?', 'succeedlearn-amp' ),
			'text'  => __( 'Monetary and in-kind political support', 'succeedlearn-amp' ),
			'image' => 'inside_2',
			'alt'   => __( 'What constitutes a political donation course screen', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Internal Approval and Pre-Clearance', 'succeedlearn-amp' ),
			'text'  => __( 'Internal approval and compliance pre-clearance', 'succeedlearn-amp' ),
			'image' => 'inside_3',
			'alt'   => __( 'Internal approval and pre-clearance course screen', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_political_donations_pe_vc_audiences() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Private equity investment teams', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Deal teams', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Portfolio-facing professionals', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Legal and Governance teams', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '05',
			'title' => __( 'Venture capital professionals', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '06',
			'title' => __( 'Senior managers', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '07',
			'title' => __( 'Compliance and Risk teams', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_political_donations_pe_vc_why_items() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Investment-sector relevance', 'succeedlearn-amp' ),
			'text'  => __( 'PE/VC situations are used instead of generic corporate examples.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'UK and US awareness', 'succeedlearn-amp' ),
			'text'  => __( 'Learners see both domestic and cross-border compliance considerations.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Scenario-led learning', 'succeedlearn-amp' ),
			'text'  => __( 'Employees apply principles to practical decisions.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Clear compliance messaging', 'succeedlearn-amp' ),
			'text'  => __( 'Complex political contribution risks are explained concisely.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_political_donations_pe_vc_faq_items() {
	return array(
		array(
			'question' => __( 'What is political donations training?', 'succeedlearn-amp' ),
			'answer'   => __( 'Political donations training helps employees recognise political activity that may create regulatory, anti-bribery, conflict of interest or reputational risk.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What can count as a political donation?', 'succeedlearn-amp' ),
			'answer'   => __( 'Political donations can include monetary contributions, fundraising participation, sponsorship, facilities, services and in-kind support depending on the circumstances.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Why are political contributions relevant to investment firms?', 'succeedlearn-amp' ),
			'answer'   => __( 'Investment firms may interact with investors, public bodies, portfolio companies and government-linked stakeholders, creating additional influence and conflict risks.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can personal political activity create professional risk?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Risk can arise where an employee\'s professional title, organisation name, business access or firm resources are visible.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the course cover both UK and US political contribution risks?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The course introduces UK political donations and anti-bribery considerations alongside US Pay-to-Play issues relevant to internationally active investment firms.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can using a job title create political contribution risk?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. A professional title can make personal political activity appear connected with the organisation and may create perceived endorsement.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can providing facilities count as political support?', 'succeedlearn-amp' ),
			'answer'   => __( 'Depending on the circumstances, providing facilities, services or organisational resources can constitute in-kind political support.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Who should take political contributions compliance training?', 'succeedlearn-amp' ),
			'answer'   => __( 'It is relevant to investment teams, managers, executives, portfolio-facing professionals and Compliance, Legal and Risk functions.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What is Pay-to-Play in investment management?', 'succeedlearn-amp' ),
			'answer'   => __( 'Pay-to-Play describes concerns around political contributions being connected with obtaining or retaining government investment advisory business.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Why should firms provide political contribution compliance training?', 'succeedlearn-amp' ),
			'answer'   => __( 'Training helps employees recognise risks early, follow internal approval procedures and reduce compliance, conflict and reputational exposure.', 'succeedlearn-amp' ),
		),
	);
}
