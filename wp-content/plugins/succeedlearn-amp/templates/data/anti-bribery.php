<?php
/**
 * Anti-Bribery and Anti-Corruption: AMP data helpers.
 *
 * Content mirrors theme: template-parts/courses/anti-bribery-anti-corruption/*.php
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an Anti-Bribery section partial.
 *
 * @param string $name Partial basename without .php.
 * @param array  $args Variables exposed to the partial.
 */
function succeedlearn_amp_anti_bribery_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/anti-bribery/' . sanitize_file_name( (string) $name ) . '.php';
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
function succeedlearn_amp_get_anti_bribery_canonical_url() {
	$canonical = home_url( '/anti-bribery-anti-corruption/' );
	$page      = get_page_by_path( 'anti-bribery-anti-corruption' );
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
function succeedlearn_amp_get_anti_bribery_page_title() {
	return __( 'Anti-Bribery and Anti-Corruption eLearning', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_anti_bribery_meta_description() {
	return __( 'Help employees recognise, resist and report bribery risks. Explore UK Bribery Act 2010 and US Foreign Corrupt Practices Act content, alongside India-focused learning.', 'succeedlearn-amp' );
}

/**
 * Page images.
 *
 * @return array<string,string>
 */
function succeedlearn_amp_get_anti_bribery_images() {
	return array(
		'hero'          => succeedlearn_amp_upload_url( '2026/09/ABAC_Hero-section-image.webp' ),
		'individuals'   => succeedlearn_amp_upload_url( '2026/09/Image-1-AML.webp' ),
		'organisations' => succeedlearn_amp_upload_url( '2026/09/organisation-image-1.webp' ),
		'cpd'           => succeedlearn_amp_upload_url( '2026/09/CPD.webp' ),
		'overview'      => succeedlearn_amp_upload_url( '2026/10/What-is-ABAC-Pic.webp' ),
		'scenario_1'    => succeedlearn_amp_upload_url( '2026/10/Course-image-1_ABAC.webp' ),
		'scenario_2'    => succeedlearn_amp_upload_url( '2026/10/Course-image-2_ABAC.webp' ),
		'scenario_3'    => succeedlearn_amp_upload_url( '2026/10/Course-image-3_ABAC.webp' ),
		'journey'       => succeedlearn_amp_upload_url( '2026/10/Course-journey-image.webp' ),
		'law_uk'        => succeedlearn_amp_upload_url( '2026/10/UK_ABAC.webp' ),
		'law_us'        => succeedlearn_amp_upload_url( '2026/10/FCPA_ABAC.webp' ),
		'law_india'     => succeedlearn_amp_upload_url( '2026/10/India_ABAC.webp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_anti_bribery_individual_features() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Interactive eLearning', 'succeedlearn-amp' ),
			'text'  => __( 'Practical digital learning supported by ABAC scenarios and knowledge checks.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( '30-minute duration', 'succeedlearn-amp' ),
			'text'  => __( 'Complete the core ABAC learning at your own pace.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'CPD Certificate on Completion', 'succeedlearn-amp' ),
			'text'  => __( 'Receive a completion certificate after successfully finishing the learning.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Instant access', 'succeedlearn-amp' ),
			'text'  => __( 'Start learning immediately after purchase.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_anti_bribery_organisation_features() {
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
			'text'  => __( 'Assign ABAC training to selected teams or learner groups.', 'succeedlearn-amp' ),
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
function succeedlearn_amp_get_anti_bribery_outcomes() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Explain corporate bribery', 'succeedlearn-amp' ),
			'text'  => __( 'Understand that a bribe may be financial or non-financial and can be offered, promised, given, requested or accepted.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Recognise relevant laws', 'succeedlearn-amp' ),
			'text'  => __( 'Identify the main legal principles relevant to the chosen jurisdiction and understand why cross-border activity increases risk.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Judge hospitality appropriately', 'succeedlearn-amp' ),
			'text'  => __( 'Distinguish reasonable, transparent business hospitality from excessive or improperly motivated benefits.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Apply organisational policy', 'succeedlearn-amp' ),
			'text'  => __( 'Follow internal approval, documentation, gifts, travel and reporting requirements consistently.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '05',
			'title' => __( 'Identify bribery practices', 'succeedlearn-amp' ),
			'text'  => __( 'Spot risks involving third parties, donations, expenses, facilitation payments, nepotism and cronyism.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '06',
			'title' => __( 'Counter and report concerns', 'succeedlearn-amp' ),
			'text'  => __( 'Refuse inappropriate requests, seek guidance and use the correct internal escalation channel without delay.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_anti_bribery_topics() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Gifts & hospitality', 'succeedlearn-amp' ),
			'text'  => __( 'Value, timing, frequency, purpose, approvals and accurate records.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Third parties & agents', 'succeedlearn-amp' ),
			'text'  => __( 'Indirect payments, unusual commissions and associated-person exposure.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Travel & entertainment', 'succeedlearn-amp' ),
			'text'  => __( 'Reasonable business purpose, pre-approval, receipts and transparency.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Facilitation payments', 'succeedlearn-amp' ),
			'text'  => __( 'Requests to speed up routine action and the correct response under policy and law.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '05',
			'title' => __( 'Donations & sponsorships', 'succeedlearn-amp' ),
			'text'  => __( 'Links to decision-makers, destination of funds and hidden commercial motives.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '06',
			'title' => __( 'Nepotism & cronyism', 'succeedlearn-amp' ),
			'text'  => __( 'Employment or favours offered to influence or reward a business decision.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,string>
 */
function succeedlearn_amp_get_anti_bribery_scenario_features() {
	return array(
		__( 'Short narrated explanations', 'succeedlearn-amp' ),
		__( 'Click-to-explore legal content', 'succeedlearn-amp' ),
		__( 'Corporate hospitality decisions', 'succeedlearn-amp' ),
		__( 'Gamified business-trip scenarios', 'succeedlearn-amp' ),
		__( 'Knowledge checks and final assessment', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_anti_bribery_scenarios() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Scenario journey', 'succeedlearn-amp' ),
			'text'  => __( 'Applying ABAC decisions during business travel.', 'succeedlearn-amp' ),
			'image' => 'scenario_1',
			'alt'   => __( 'ABAC eLearning scenario showing a briefcase of cash and handcuffs outside an office building', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Interactive activity', 'succeedlearn-amp' ),
			'text'  => __( 'Deciding which business gifts may be accepted.', 'succeedlearn-amp' ),
			'image' => 'scenario_2',
			'alt'   => __( 'Anti-bribery law applying to every level of an organisation in the ABAC course', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Click-to-explore learning', 'succeedlearn-amp' ),
			'text'  => __( 'Legal context across jurisdictions.', 'succeedlearn-amp' ),
			'image' => 'scenario_3',
			'alt'   => __( 'ABAC eLearning scenario with employees being offered a car as a business gift', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_anti_bribery_journey() {
	return array(
		array(
			'num'   => '1',
			'title' => __( 'Understand', 'succeedlearn-amp' ),
			'text'  => __( 'Corporate bribery, corruption and their impact.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '2',
			'title' => __( 'Explore', 'succeedlearn-amp' ),
			'text'  => __( 'Relevant laws and organisational policy.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '3',
			'title' => __( 'Decide', 'succeedlearn-amp' ),
			'text'  => __( 'Gifts, hospitality and third-party scenarios.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '4',
			'title' => __( 'Respond', 'succeedlearn-amp' ),
			'text'  => __( 'Refusal, escalation and reporting actions.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '5',
			'title' => __( 'Demonstrate', 'succeedlearn-amp' ),
			'text'  => __( 'Final assessment and CPD certificate.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_anti_bribery_delivery() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'SaaS delivery', 'succeedlearn-amp' ),
			'text'  => __( 'Assign and manage training through SucceedLEARN with learner enrolment, progress tracking, reminders, assessments, certificates and reporting.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'SCORM package', 'succeedlearn-amp' ),
			'text'  => __( 'Deploy the course through your existing SCORM-compatible LMS and retain training within your established learning infrastructure.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Customisation', 'succeedlearn-amp' ),
			'text'  => __( 'Reflect your policy terminology, reporting routes, branding, approval process and suitable workplace scenarios.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_anti_bribery_audience() {
	return array(
		array( 'num' => '01', 'title' => __( 'Procurement', 'succeedlearn-amp' ) ),
		array( 'num' => '02', 'title' => __( 'Finance', 'succeedlearn-amp' ) ),
		array( 'num' => '03', 'title' => __( 'Compliance', 'succeedlearn-amp' ) ),
		array( 'num' => '04', 'title' => __( 'Business development', 'succeedlearn-amp' ) ),
		array( 'num' => '05', 'title' => __( 'International operations', 'succeedlearn-amp' ) ),
		array( 'num' => '06', 'title' => __( 'Sales', 'succeedlearn-amp' ) ),
		array( 'num' => '07', 'title' => __( 'Legal', 'succeedlearn-amp' ) ),
		array( 'num' => '08', 'title' => __( 'Audit', 'succeedlearn-amp' ) ),
		array( 'num' => '09', 'title' => __( 'Vendor management', 'succeedlearn-amp' ) ),
	);
}

/**
 * @return array<int,array<string,mixed>>
 */
function succeedlearn_amp_get_anti_bribery_laws() {
	return array(
		array(
			'code'       => __( 'UK', 'succeedlearn-amp' ),
			'title'      => __( 'UK Bribery Act 2010', 'succeedlearn-amp' ),
			'image'      => 'law_uk',
			'alt'        => __( 'UK Bribery Act 2010 offences: offering, receiving and foreign official bribery, failure to prevent bribery', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'The Bribery Act 2010 covers offering or giving bribes, requesting or accepting bribes, bribery of foreign public officials and failure by commercial organisations to prevent bribery by associated persons.', 'succeedlearn-amp' ),
				__( 'The adequate-procedures defence relates to the corporate failure-to-prevent offence. Ministry of Justice guidance sets out six principles: proportionate procedures, top-level commitment, risk assessment, due diligence, communication including training, and monitoring and review.', 'succeedlearn-amp' ),
				__( 'Where useful for international business, the course contrasts the UK approach with the US Foreign Corrupt Practices Act, including the different treatment of facilitation payments.', 'succeedlearn-amp' ),
			),
		),
		array(
			'code'       => __( 'US', 'succeedlearn-amp' ),
			'title'      => __( 'US Foreign Corrupt Practices Act (FCPA)', 'succeedlearn-amp' ),
			'image'      => 'law_us',
			'alt'        => __( 'US FCPA 1977 themes: anti-bribery, books and records, third-party risk, foreign officials and business gifts', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'The FCPA prohibits covered individuals and businesses from bribing foreign officials to obtain or retain business. It also contains accounting requirements for issuers, including books and records and internal accounting controls.', 'succeedlearn-amp' ),
				__( 'Its narrow exception for certain routine governmental action does not make facilitation payments universally lawful. The UK Bribery Act has no equivalent exception, and organisational policy may prohibit such payments.', 'succeedlearn-amp' ),
				__( 'The UK ABAC course introduces the FCPA alongside UK law to support awareness of cross-border bribery risks.', 'succeedlearn-amp' ),
			),
		),
		array(
			'code'       => __( 'India', 'succeedlearn-amp' ),
			'title'      => __( 'Prevention of Corruption Act 1988', 'succeedlearn-amp' ),
			'image'      => 'law_india',
			'alt'        => __( 'India Prevention of Corruption Act 1988 themes: public servants, undue advantage, gifts, approvals and reporting', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'The India-focused course covers the Prevention of Corruption Act 1988, including changes introduced by the 2018 amendment. It explains bribery involving public servants and the giving or promising of an undue advantage.', 'succeedlearn-amp' ),
				__( 'It introduces the offence relating to bribery of a public servant by a commercial organisation, the role of associated persons and potential liability for persons in charge where the statutory conditions are met.', 'succeedlearn-amp' ),
				__( 'The content can also be aligned with the organisation’s Code of Conduct, gifts and hospitality policy, whistleblowing process and internal approval controls.', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_anti_bribery_contact_steps() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Preview the course', 'succeedlearn-amp' ),
			'text'  => __( 'Explore scenarios, interactions and assessment style.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Discuss your requirements', 'succeedlearn-amp' ),
			'text'  => __( 'Cover jurisdictions, policies, delivery and customisation.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Plan deployment', 'succeedlearn-amp' ),
			'text'  => __( 'Choose SucceedLEARN SaaS or a SCORM package.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_anti_bribery_faq_items() {
	return array(
		array(
			'question' => __( 'What does ABAC mean?', 'succeedlearn-amp' ),
			'answer'   => __( 'ABAC means Anti-Bribery and Anti-Corruption. It covers the rules, controls and behaviours used to prevent improper influence in business and public-sector dealings.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What is Anti-Bribery and Anti-Corruption training?', 'succeedlearn-amp' ),
			'answer'   => __( 'It is workplace training that helps employees recognise, prevent and report bribery and corruption risks in everyday business decisions.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Who should take an ABAC course?', 'succeedlearn-amp' ),
			'answer'   => __( 'Employees, managers and relevant contractors should take it, especially anyone dealing with suppliers, customers, agents, expenses, gifts, hospitality or public officials.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What laws does the UK ABAC course cover?', 'succeedlearn-amp' ),
			'answer'   => __( 'The UK ABAC course covers the UK Bribery Act 2010 (BA 2010) and introduces the US Foreign Corrupt Practices Act (FCPA) for international business context.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What topics are included in ABAC training?', 'succeedlearn-amp' ),
			'answer'   => __( 'The course covers gifts and hospitality, third parties, travel and entertainment, charitable donations, facilitation payments, nepotism, cronyism, approvals and reporting.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Are all gifts and hospitality prohibited?', 'succeedlearn-amp' ),
			'answer'   => __( 'No. Genuine, proportionate and transparent business hospitality may be permitted, subject to applicable law and the organisation’s approval and record-keeping rules.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Is this ABAC course CPD certified?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The UK ABAC course is CPD certified.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How long does the ABAC course take?', 'succeedlearn-amp' ),
			'answer'   => __( 'The course takes approximately 30 minutes and includes practical scenarios, knowledge checks and a final assessment.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How is the course delivered?', 'succeedlearn-amp' ),
			'answer'   => __( 'It can be delivered through the SucceedLEARN SaaS platform or as a SCORM package for a compatible learning management system.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can the ABAC course be customised?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Policy wording, reporting routes, gift limits, branding, jurisdictions and workplace scenarios can be tailored to the organisation’s needs. ABAC forms part of a wider customisable course range.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What is the FCPA?', 'succeedlearn-amp' ),
			'answer'   => __( 'The Foreign Corrupt Practices Act is a US law addressing bribery of foreign officials. It also sets accounting requirements for issuers. FCPA content is included in the UK ABAC course.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Which law does India ABAC training cover?', 'succeedlearn-amp' ),
			'answer'   => __( 'The India-focused course covers the Prevention of Corruption Act 1988, including the 2018 amendments, with scenarios involving public servants, undue advantages and business conduct.', 'succeedlearn-amp' ),
		),
	);
}
