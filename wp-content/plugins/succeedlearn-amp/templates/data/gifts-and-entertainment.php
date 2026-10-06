<?php
/**
 * Gifts and Entertainment Training for PE/VC: AMP data helpers.
 *
 * Content mirrors theme: template-parts/courses/gifts-and-entertainment/*.php
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Gifts and Entertainment section partial.
 *
 * @param string $name Partial basename without .php.
 * @param array  $args Variables exposed to the partial.
 */
function succeedlearn_amp_gifts_and_entertainment_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/gifts-and-entertainment/' . sanitize_file_name( (string) $name ) . '.php';
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
function succeedlearn_amp_get_gifts_and_entertainment_canonical_url() {
	$canonical = home_url( '/gifts-and-entertainment/' );
	$page      = get_page_by_path( 'gifts-and-entertainment' );
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
function succeedlearn_amp_get_gifts_and_entertainment_page_title() {
	return __( 'Gifts and Entertainment Training for PE/VC Professionals', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_gifts_and_entertainment_meta_description() {
	return __( 'Scenario-led Gifts and Entertainment compliance training for PE/VC professionals. Build practical awareness of gifts, hospitality and entertainment risk across UK and US business environments.', 'succeedlearn-amp' );
}

/**
 * Page images.
 *
 * @return array<string,string>
 */
function succeedlearn_amp_get_gifts_and_entertainment_images() {
	return array(
		'hero'               => succeedlearn_amp_upload_url( '2026/09/Gifts_Hero-section-image.webp' ),
		'individuals'        => succeedlearn_amp_upload_url( '2026/09/Image-1-AML.webp' ),
		'organisations'      => succeedlearn_amp_upload_url( '2026/09/organisation-image-1.webp' ),
		'cpd'                => succeedlearn_amp_upload_url( '2026/09/CPD.webp' ),
		'overview'           => succeedlearn_amp_upload_url( '2026/09/Gifts-and-entertainemnt.webp' ),
		'learning_outcomes'  => succeedlearn_amp_upload_url( '2026/09/Image-3_gifts.webp' ),
		'high_risk_government' => succeedlearn_amp_upload_url( '2026/09/Image-4_gifts.webp' ),
		'high_risk_vendors'  => succeedlearn_amp_upload_url( '2026/09/Image-5_gifts.webp' ),
		'high_risk_travel'   => succeedlearn_amp_upload_url( '2026/09/Image-6_gifts.webp' ),
		'high_risk_cross_cultural' => succeedlearn_amp_upload_url( '2026/09/Image-7_gifts.webp' ),
		'practical_elearning' => succeedlearn_amp_upload_url( '2026/09/Image-8_gifts.webp' ),
		'legal_uk'           => succeedlearn_amp_upload_url( '2026/09/UK-Bribery-Act.webp' ),
		'legal_us'           => succeedlearn_amp_upload_url( '2026/09/US-FCPA-Act.webp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_gifts_and_entertainment_individual_features() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Interactive eLearning', 'succeedlearn-amp' ),
			'text'  => __( 'Practical digital learning supported by gifts and entertainment scenarios and knowledge checks.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( '12-minute duration', 'succeedlearn-amp' ),
			'text'  => __( 'Complete the core gifts and entertainment learning in a short, focused session.', 'succeedlearn-amp' ),
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
function succeedlearn_amp_get_gifts_and_entertainment_organisation_features() {
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
			'text'  => __( 'Assign gifts and entertainment training to selected teams or learner groups.', 'succeedlearn-amp' ),
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
function succeedlearn_amp_get_gifts_and_entertainment_risk_items() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Deal and adviser selection', 'succeedlearn-amp' ),
			'text'  => __( 'Invitations can become sensitive when a provider is being considered for an advisory or commercial role.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Investor relationships', 'succeedlearn-amp' ),
			'text'  => __( 'Hospitality involving Limited Partners should be considered against business purpose, transparency and policy requirements.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Vendor relationships', 'succeedlearn-amp' ),
			'text'  => __( 'Particular care may be needed during procurement, onboarding, bidding or contract negotiations.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,string>
 */
function succeedlearn_amp_get_gifts_and_entertainment_decision_consider() {
	return array(
		__( 'Does it serve a legitimate business purpose?', 'succeedlearn-amp' ),
		__( 'Is the value modest and reasonable?', 'succeedlearn-amp' ),
		__( 'Would I be comfortable if it were disclosed publicly?', 'succeedlearn-amp' ),
		__( 'Is the venue or content appropriate?', 'succeedlearn-amp' ),
		__( 'Is the timing appropriate?', 'succeedlearn-amp' ),
		__( 'Is it separate from an active deal or decision?', 'succeedlearn-amp' ),
		__( 'Has required approval been obtained?', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int,string>
 */
function succeedlearn_amp_get_gifts_and_entertainment_decision_avoid() {
	return array(
		__( 'It creates or may create a sense of obligation.', 'succeedlearn-amp' ),
		__( 'It could influence or appear to influence a decision.', 'succeedlearn-amp' ),
		__( 'It conflicts with organisational policy.', 'succeedlearn-amp' ),
		__( 'It may conflict with applicable law.', 'succeedlearn-amp' ),
		__( 'It involves cash or a cash equivalent.', 'succeedlearn-amp' ),
		__( 'It occurs during a sensitive commercial process.', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_gifts_and_entertainment_outcomes() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Recognise gifts and entertainment', 'succeedlearn-amp' ),
			'text'  => __( 'Identify benefits and business courtesies that may fall within Gifts and Entertainment controls.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Assess the context', 'succeedlearn-amp' ),
			'text'  => __( 'Consider purpose, value, timing, transparency and the commercial relationship.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Identify higher-risk situations', 'succeedlearn-amp' ),
			'text'  => __( 'Recognise excessive benefits, cash or cash equivalents, and circumstances involving potential influence.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Follow approval and reporting procedures', 'succeedlearn-amp' ),
			'text'  => __( 'Understand when internal approval, recording or escalation may be required.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '05',
			'title' => __( 'Apply policy to PE/VC situations', 'succeedlearn-amp' ),
			'text'  => __( 'Practise decisions involving investors, advisers, vendors, portfolio company contacts and government officials.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_gifts_and_entertainment_audience() {
	return array(
		array(
			'num'   => '1',
			'title' => __( 'Investment professionals', 'succeedlearn-amp' ),
			'text'  => __( 'Professionals involved in sourcing, diligence, transactions and portfolio-related decisions.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '2',
			'title' => __( 'Investor relations teams', 'succeedlearn-amp' ),
			'text'  => __( 'Professionals interacting with Limited Partners and other external stakeholders.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '3',
			'title' => __( 'Compliance and risk teams', 'succeedlearn-amp' ),
			'text'  => __( 'Functions responsible for policy interpretation, approvals, reporting and escalation.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '4',
			'title' => __( 'Operations and procurement teams', 'succeedlearn-amp' ),
			'text'  => __( 'Professionals managing vendors, advisers and third-party appointments.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_gifts_and_entertainment_high_risk_cards() {
	return array(
		array(
			'image' => 'high_risk_government',
			'alt'   => __( 'Government official or public-sector interaction', 'succeedlearn-amp' ),
			'title' => __( 'Government officials', 'succeedlearn-amp' ),
			'text'  => __( 'Gifts and entertainment involving government officials require additional scrutiny and appropriate approval.', 'succeedlearn-amp' ),
		),
		array(
			'image' => 'high_risk_vendors',
			'alt'   => __( 'Vendor, adviser or third-party meeting', 'succeedlearn-amp' ),
			'title' => __( 'Vendors and third parties', 'succeedlearn-amp' ),
			'text'  => __( 'Particular care is needed during procurement, bidding, onboarding and contract negotiations.', 'succeedlearn-amp' ),
		),
		array(
			'image' => 'high_risk_travel',
			'alt'   => __( 'Business travel or accommodation scenario', 'succeedlearn-amp' ),
			'title' => __( 'Travel and accommodation', 'succeedlearn-amp' ),
			'text'  => __( 'Offers from external parties may require careful review and approval before acceptance.', 'succeedlearn-amp' ),
		),
		array(
			'image' => 'high_risk_cross_cultural',
			'alt'   => __( 'International or cross-cultural gift-giving', 'succeedlearn-amp' ),
			'title' => __( 'Cross-cultural gift-giving', 'succeedlearn-amp' ),
			'text'  => __( 'Local customs should still be assessed against applicable UK or US requirements and organisational policy.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_gifts_and_entertainment_legal_context() {
	return array(
		array(
			'code'     => 'UK',
			'title'    => __( 'UK Bribery Act 2010', 'succeedlearn-amp' ),
			'subtitle' => __( 'United Kingdom', 'succeedlearn-amp' ),
			'text'     => __( 'The course references the UK Bribery Act 2010 when explaining bribery risks, gifts and hospitality, foreign public officials and organisational anti-bribery controls.', 'succeedlearn-amp' ),
			'image'    => 'legal_uk',
			'alt'      => __( 'UK Bribery Act 2010 gifts and hospitality compliance', 'succeedlearn-amp' ),
		),
		array(
			'code'     => 'US',
			'title'    => __( 'U.S. Foreign Corrupt Practices Act', 'succeedlearn-amp' ),
			'subtitle' => __( 'United States', 'succeedlearn-amp' ),
			'text'     => __( 'The course references the FCPA in the context of interactions with foreign government officials and risks involving gifts, travel, entertainment and other things of value.', 'succeedlearn-amp' ),
			'image'    => 'legal_us',
			'alt'      => __( 'U.S. FCPA foreign government official interactions', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int,array<string,string>>
 */
function succeedlearn_amp_get_gifts_and_entertainment_faq_items() {
	return array(
		array(
			'question' => __( 'What is Gifts and Entertainment Training?', 'succeedlearn-amp' ),
			'answer'   => __( 'It helps employees assess business gifts, hospitality, meals, invitations and other benefits, and understand when they should accept, decline, seek approval, record or escalate them.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Who should take Gifts and Entertainment Training?', 'succeedlearn-amp' ),
			'answer'   => __( 'It is relevant to PE/VC professionals who interact with investors, advisers, vendors, portfolio companies, government officials and other third parties.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What counts as a gift or entertainment?', 'succeedlearn-amp' ),
			'answer'   => __( 'Gifts may include merchandise, gift cards, services, personal favours, loans or discounts. Entertainment may include meals, event tickets, cultural outings, travel and hospitality.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What laws are relevant to gifts and entertainment compliance?', 'succeedlearn-amp' ),
			'answer'   => __( 'The course references the UK Bribery Act 2010 and the U.S. Foreign Corrupt Practices Act, alongside applicable organisational policies and other relevant anti-bribery requirements.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Are business gifts and hospitality always prohibited?', 'succeedlearn-amp' ),
			'answer'   => __( 'No. Their appropriateness depends on factors including purpose, value, timing, recipient, transparency, applicable law and organisational policy.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can employees accept gifts from vendors or advisers?', 'succeedlearn-amp' ),
			'answer'   => __( "It depends on the firm's policy and circumstances. Particular caution is needed during procurement, bidding, negotiations, adviser selection and vendor onboarding.", 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Are gifts involving government officials higher risk?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. The course treats these interactions as higher-risk situations requiring additional scrutiny and appropriate approval.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What should an employee do if unsure about a gift or invitation?', 'succeedlearn-amp' ),
			'answer'   => __( "Check the organisation's Gifts and Entertainment policy and consult Compliance before proceeding.", 'succeedlearn-amp' ),
		),
	);
}
