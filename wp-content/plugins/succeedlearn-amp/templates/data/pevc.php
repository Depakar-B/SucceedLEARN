<?php
/**
 * Private Equity and Venture Capital Suite — AMP data helpers.
 *
 * Mirrors theme pevc homepage: template-parts/pevc-compliance-training-programs/
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a PE/VC Suite section partial.
 *
 * @param string $name Partial basename without .php.
 * @param array  $args Optional vars extracted into the partial.
 */
function succeedlearn_amp_pevc_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/pevc/' . sanitize_file_name( (string) $name ) . '.php';
	if ( ! is_readable( $path ) ) {
		return;
	}
	if ( ! empty( $args ) && is_array( $args ) ) {
		// phpcs:ignore WordPress.PHP.DontExtract.extract_extract
		extract( $args, EXTR_SKIP );
	}
	include $path;
}

/**
 * @return string
 */
function succeedlearn_amp_get_pevc_canonical_url() {
	$canonical = home_url( '/pevc-compliance-training-programs/' );
	foreach ( array(
		'pevc-compliance-training-programs',
		'private-equity-and-venture-capital-suite',
		'private-equity-venture-capital-compliance-training',
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
function succeedlearn_amp_get_pevc_page_title() {
	return __( 'Private Equity and Venture Capital Suite', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_pevc_meta_description() {
	return __(
		'Practical compliance eLearning for Private Equity and Venture Capital firms. Equip teams to recognise risk, meet regulatory expectations and make better-informed decisions.',
		'succeedlearn-amp'
	);
}

/**
 * Resolve an uploads image with CDN fallback.
 *
 * @param string $path Relative path under uploads.
 * @return string
 */
function succeedlearn_amp_get_pevc_image( $path ) {
	$path = ltrim( (string) $path, '/' );
	if ( function_exists( 'succeedlearn_amp_upload_url' ) ) {
		return succeedlearn_amp_upload_url( $path );
	}
	$local   = WP_CONTENT_DIR . '/uploads/' . $path;
	$uploads = content_url( '/uploads/' . $path );
	$cdn     = 'https://succeedlearn.com/wp-content/uploads/' . $path;
	return file_exists( $local ) ? $uploads : $cdn;
}

/**
 * @return array{hero:string,illustration:string}
 */
function succeedlearn_amp_get_pevc_images() {
	return array(
		'hero'         => succeedlearn_amp_get_pevc_image( '2026/10/PEVC-Homepage.webp' ),
		'illustration' => succeedlearn_amp_get_pevc_image( '2026/09/compliance_process_blocks_woman.webp' ),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_pevc_hero_values() {
	return array(
		__( 'Reduce risk', 'succeedlearn-amp' ),
		__( 'Build trust', 'succeedlearn-amp' ),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_pevc_pricing_items() {
	return array(
		__( 'Complete PE/VC compliance learning suite', 'succeedlearn-amp' ),
		__( 'Financial Crime Prevention learning included', 'succeedlearn-amp' ),
		__( 'One simple annual per-user price', 'succeedlearn-amp' ),
		__( 'Assign learning according to role', 'succeedlearn-amp' ),
		__( 'Suitable for firm-wide and targeted programmes', 'succeedlearn-amp' ),
		__( 'Hosted and SCORM delivery options', 'succeedlearn-amp' ),
	);
}

/**
 * Suite course cards.
 *
 * @return array<int, array{num:string,title:string,text:string,href:string}>
 */
function succeedlearn_amp_get_pevc_courses() {
	$url = static function ( $slug ) {
		if ( function_exists( 'succeedlearn_amp_course_suite_page_url' ) ) {
			return succeedlearn_amp_course_suite_page_url( $slug, home_url( '/' . trim( $slug, '/' ) . '/' ) );
		}
		return home_url( '/' . trim( $slug, '/' ) . '/' );
	};

	return array(
		array(
			'num'   => '01',
			'title' => __( 'Security Awareness Training', 'succeedlearn-amp' ),
			'text'  => __( 'Practical awareness of information-security risks and safer employee behaviours.', 'succeedlearn-amp' ),
			'href'  => $url( 'security-awareness' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Phishing Simulation', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce phishing awareness through realistic simulation exercises.', 'succeedlearn-amp' ),
			'href'  => $url( 's-phish' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Data Privacy', 'succeedlearn-amp' ),
			'text'  => __( 'Strengthen responsible handling of personal information and privacy awareness.', 'succeedlearn-amp' ),
			'href'  => $url( 'gdpr-employee-awareness-training' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Preventing Sexual Harassment', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness of workplace conduct and appropriate employee responsibilities.', 'succeedlearn-amp' ),
			'href'  => $url( 'uk-sexual-harassment-prevention-training' ),
		),
		array(
			'num'   => '05',
			'title' => __( 'AML Training', 'succeedlearn-amp' ),
			'text'  => __( 'KYC, CDD, EDD, MLRO, CFT, CPF and financial-crime awareness.', 'succeedlearn-amp' ),
			'href'  => $url( 'aml-pe-vc' ),
		),
		array(
			'num'   => '06',
			'title' => __( 'Preventing Facilitation of Tax Evasion', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness of facilitation risk and unlawful tax-related activity.', 'succeedlearn-amp' ),
			'href'  => $url( 'tax-evasion-facilitation' ),
		),
		array(
			'num'   => '07',
			'title' => __( 'Anti-Bribery and Anti-Corruption', 'succeedlearn-amp' ),
			'text'  => __( 'Recognise bribery, corruption and inappropriate incentives in business relationships.', 'succeedlearn-amp' ),
			'href'  => $url( 'anti-bribery-anti-corruption' ),
		),
		array(
			'num'   => '08',
			'title' => __( 'Gifts and Entertainment', 'succeedlearn-amp' ),
			'text'  => __( 'Understand compliance considerations involving gifts, hospitality and entertainment.', 'succeedlearn-amp' ),
			'href'  => $url( 'gifts-and-entertainment' ),
		),
		array(
			'num'   => '09',
			'title' => __( 'Whistleblowing', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness of speaking up and appropriate reporting channels.', 'succeedlearn-amp' ),
			'href'  => $url( 'whistleblowing-pe-vc' ),
		),
		array(
			'num'   => '10',
			'title' => __( 'Political Donations', 'succeedlearn-amp' ),
			'text'  => __( 'Awareness of political donations within organisational governance and compliance.', 'succeedlearn-amp' ),
			'href'  => $url( 'political-donations-compliance-training' ),
		),
		array(
			'num'   => '11',
			'title' => __( 'SMCR Training for Employees', 'succeedlearn-amp' ),
			'text'  => __( 'Employee-focused awareness of SMCR and regulated-firm conduct responsibilities.', 'succeedlearn-amp' ),
			'href'  => $url( 'smcr-pe-vc' ),
		),
		array(
			'num'   => '12',
			'title' => __( 'SMCR Training for Senior Managers', 'succeedlearn-amp' ),
			'text'  => __( 'Senior-manager awareness of SMCR, accountability and regulatory responsibilities.', 'succeedlearn-amp' ),
			'href'  => $url( 'smcr-pe-vc' ),
		),
	);
}

/**
 * Featured FCP course card.
 *
 * @return array{num:string,title:string,text:string,href:string}
 */
function succeedlearn_amp_get_pevc_fcp_course() {
	$url = home_url( '/financial-crime-prevention-suite/' );
	if ( function_exists( 'succeedlearn_amp_course_suite_page_url' ) ) {
		$url = succeedlearn_amp_course_suite_page_url( 'financial-crime-prevention-suite', $url );
	}

	return array(
		'num'   => '13',
		'title' => __( 'Financial Crime Prevention Training', 'succeedlearn-amp' ),
		'text'  => __(
			'Extend employee awareness across financial-crime risks, including AML, CFT and KYC, Anti-Bribery and Anti-Corruption, Preventing Facilitation of Tax Evasion, sanctions, Insider Trading and Market Abuse, and Failure to Prevent Fraud.',
			'succeedlearn-amp'
		),
		'href'  => $url,
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_pevc_why_items() {
	return array(
		__( 'recognise unusual or higher-risk situations', 'succeedlearn-amp' ),
		__( 'understand their individual responsibilities', 'succeedlearn-amp' ),
		__( 'follow internal approval processes', 'succeedlearn-amp' ),
		__( 'protect sensitive information', 'succeedlearn-amp' ),
		__( 'raise concerns through the right channels', 'succeedlearn-amp' ),
		__( 'make better-informed decisions', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int, array{num:string,title:string,text:string}>
 */
function succeedlearn_amp_get_pevc_decision_steps() {
	return array(
		array(
			'num'   => '1',
			'title' => __( 'Recognise', 'succeedlearn-amp' ),
			'text'  => __( 'Spot the risk or warning sign.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '2',
			'title' => __( 'Consider', 'succeedlearn-amp' ),
			'text'  => __( 'Think about the situation in context.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '3',
			'title' => __( 'Decide', 'succeedlearn-amp' ),
			'text'  => __( 'Choose the appropriate next step.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '4',
			'title' => __( 'Escalate', 'succeedlearn-amp' ),
			'text'  => __( 'Seek approval or specialist guidance.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '5',
			'title' => __( 'Report', 'succeedlearn-amp' ),
			'text'  => __( 'Use the appropriate internal channel.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{num:string,title:string}>
 */
function succeedlearn_amp_get_pevc_audience_roles() {
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Senior Managers & Partners', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '02',
			'title' => __( 'Investment & Deal Teams', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '03',
			'title' => __( 'Compliance, Legal & MLRO Teams', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '04',
			'title' => __( 'Finance, Operations & Fund Administration', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '05',
			'title' => __( 'Investor Relations & Fundraising', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '06',
			'title' => __( 'HR, Learning & Wider Employees', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{num:string,title:string,text:string}>
 */
function succeedlearn_amp_get_pevc_programme_steps() {
	return array(
		array(
			'num'   => '1',
			'title' => __( 'Identify learner groups', 'succeedlearn-amp' ),
			'text'  => __( 'Map teams, responsibilities and decision-making roles.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '2',
			'title' => __( 'Map relevant risks', 'succeedlearn-amp' ),
			'text'  => __( 'Identify which compliance topics matter to each group.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '3',
			'title' => __( 'Assign relevant learning', 'succeedlearn-amp' ),
			'text'  => __( 'Combine broad awareness with specialist learning.', 'succeedlearn-amp' ),
		),
		array(
			'num'   => '4',
			'title' => __( 'Track and refresh', 'succeedlearn-amp' ),
			'text'  => __( 'Monitor learning and refresh as responsibilities or risks change.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_pevc_delivery_options() {
	return array(
		array(
			'title' => __( 'Hosted on SucceedLEARN', 'succeedlearn-amp' ),
			'text'  => __(
				'Assign learning, manage users, configure deadlines and monitor progress through the hosted platform.',
				'succeedlearn-amp'
			),
		),
		array(
			'title' => __( 'SCORM for your LMS', 'succeedlearn-amp' ),
			'text'  => __(
				'Deploy suitable learning through your compatible existing Learning Management System.',
				'succeedlearn-amp'
			),
		),
		array(
			'title' => __( 'Customisation on demand', 'succeedlearn-amp' ),
			'text'  => __(
				'Adapt terminology, policies, reporting routes and relevant scenarios.',
				'succeedlearn-amp'
			),
		),
	);
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_pevc_contact_benefits() {
	return array(
		__( 'See the PE/VC Suite in action', 'succeedlearn-amp' ),
		__( 'Explore the included FCP learning', 'succeedlearn-amp' ),
		__( 'Discuss your learner groups', 'succeedlearn-amp' ),
		__( 'Review hosted and SCORM delivery', 'succeedlearn-amp' ),
		__( 'Explore customisation options', 'succeedlearn-amp' ),
		__( 'Discuss the $24 per-user annual package', 'succeedlearn-amp' ),
	);
}

/**
 * FAQ items for accordion + optional schema.
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_pevc_faq_items() {
	return array(
		array(
			'question' => __( 'What is included in the PE/VC Suite?', 'succeedlearn-amp' ),
			'answer'   => __(
				'The PE/VC Suite includes Security Awareness Training, Phishing Simulation, Data Privacy, Preventing Sexual Harassment, AML Training, Preventing Facilitation of Tax Evasion, Anti-Bribery and Anti-Corruption, Gifts and Entertainment, Whistleblowing, Political Donations, SMCR Training for Employees and SMCR Training for Senior Managers. Financial Crime Prevention Training is also included, extending coverage across additional financial-crime risks.',
				'succeedlearn-amp'
			),
		),
		array(
			'question' => __( 'How much does the complete PE/VC Suite cost?', 'succeedlearn-amp' ),
			'answer'   => __(
				'The PE/VC Suite is available at $24 per user, per year, equivalent to $2 per user, per month.',
				'succeedlearn-amp'
			),
		),
		array(
			'question' => __( 'Is Financial Crime Prevention Training included?', 'succeedlearn-amp' ),
			'answer'   => __(
				'Yes. Financial Crime Prevention Training is included as part of the wider PE/VC Suite.',
				'succeedlearn-amp'
			),
		),
		array(
			'question' => __( 'Can different learning be assigned to different teams?', 'succeedlearn-amp' ),
			'answer'   => __(
				'Yes. Learning can be assigned according to role, team and organisational training requirements.',
				'succeedlearn-amp'
			),
		),
		array(
			'question' => __( 'Can the content be customised?', 'succeedlearn-amp' ),
			'answer'   => __(
				'Subject to agreed scope, content can be adapted to reflect terminology, policies, reporting routes and organisational scenarios.',
				'succeedlearn-amp'
			),
		),
		array(
			'question' => __( 'Can we use the courses in our existing LMS?', 'succeedlearn-amp' ),
			'answer'   => __(
				'Suitable learning can be supplied as SCORM-compatible content for an appropriate existing LMS.',
				'succeedlearn-amp'
			),
		),
	);
}

/**
 * FAQPage JSON-LD.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_pevc_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_pevc_faq_items() as $item ) {
		$entities[] = array(
			'@type'          => 'Question',
			'name'           => wp_strip_all_tags( (string) $item['question'] ),
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => wp_strip_all_tags( (string) $item['answer'] ),
			),
		);
	}

	return array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => $entities,
	);
}
