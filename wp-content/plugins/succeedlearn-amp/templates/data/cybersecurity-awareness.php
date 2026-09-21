<?php
/**
 * Cybersecurity Awareness — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Include a Cybersecurity Awareness section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_csa_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/cybersecurity-awareness/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * Whether the current CSA landing is the UK October campaign.
 *
 * @return bool
 */
function succeedlearn_amp_csa_is_uk() {
	static $is_uk = null;
	if ( null !== $is_uk ) {
		return $is_uk;
	}

	$slug = '';
	if ( is_singular( 'page' ) ) {
		$post = get_queried_object();
		if ( $post instanceof WP_Post && ! empty( $post->post_name ) ) {
			$slug = (string) $post->post_name;
		}
	}
	if ( '' === $slug && ! empty( $_SERVER['REQUEST_URI'] ) ) {
		$path = (string) wp_parse_url( (string) wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH );
		$slug = trim( basename( untrailingslashit( $path ) ) );
		if ( 'amp' === $slug ) {
			$parts = array_values( array_filter( explode( '/', trim( $path, '/' ) ) ) );
			$slug  = ! empty( $parts[0] ) ? (string) $parts[0] : '';
		}
	}

	$is_uk = ( 'uk-cyber-aware-october' === $slug );
	return $is_uk;
}

/**
 * Currency symbol for the CSA offer price card.
 *
 * @return string
 */
function succeedlearn_amp_csa_currency_symbol() {
	return succeedlearn_amp_csa_is_uk() ? '£' : '$';
}

/**
 * @return string
 */
function succeedlearn_amp_get_csa_canonical_url() {
	$slug      = succeedlearn_amp_csa_is_uk() ? 'uk-cyber-aware-october' : 'us-cyber-aware-october';
	$canonical = home_url( '/' . $slug . '/' );
	$page      = get_page_by_path( $slug );
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
function succeedlearn_amp_get_csa_page_title() {
	if ( succeedlearn_amp_csa_is_uk() ) {
		return __( 'Cyber Security Awareness Month October 2026', 'succeedlearn-amp' );
	}
	return __( 'Cybersecurity Awareness Month October 2026', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_csa_meta_description() {
	if ( succeedlearn_amp_csa_is_uk() ) {
		return __( 'Turn Cyber Security Awareness Month into measurable action. Combine practical employee training, realistic phishing simulations, simple suspicious-email reporting and clear campaign results in one coordinated experience.', 'succeedlearn-amp' );
	}
	return __( 'Turn Cybersecurity Awareness Month into measurable action. Combine practical employee training, realistic phishing simulations, simple suspicious-email reporting and clear campaign results in one coordinated experience.', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_csa_hero_image() {
	return succeedlearn_amp_upload_url( '2026/09/october-cybersecurity-awareness-hero.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_csa_measure_image() {
	return succeedlearn_amp_upload_url( '2026/09/campaign-insights-team-review.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_csa_integration_image() {
	return succeedlearn_amp_upload_url( '2026/09/enterprise-integration-web.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_csa_phishcue_image() {
	return succeedlearn_amp_upload_url( '2026/09/phishcue-reporting-workflow.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_csa_training_image() {
	return 'https://succeedlearn.com/wp-content/uploads/2026/09/Comprehensive-security-awareness-training-2.webp';
}

/**
 * @return string
 */
function succeedlearn_amp_get_csa_phishing_image() {
	return 'https://succeedlearn.com/wp-content/uploads/2026/09/Realistic-phishing-simulations-1.webp';
}

/**
 * @return array<int, string>
 */
function succeedlearn_amp_csa_measure_metrics() {
	return array(
		__( 'Training completion rate', 'succeedlearn-amp' ),
		__( 'Assessment performance', 'succeedlearn-amp' ),
		__( 'Simulation interaction rate', 'succeedlearn-amp' ),
		__( 'Employee reporting rate', 'succeedlearn-amp' ),
		__( "Department-level patterns /org's resilience score", 'succeedlearn-amp' ),
		__( 'Baseline vs follow-up performance', 'succeedlearn-amp' ),
	);
}

/**
 * Returns the Cybersecurity Awareness Month offer highlights.
 *
 * @return array
 */
function succeedlearn_amp_cybersecurity_awareness_offer_highlights() {
	$from_price = succeedlearn_amp_csa_is_uk()
		? __( 'Starts from £50', 'succeedlearn-amp' )
		: __( 'Starts from $50', 'succeedlearn-amp' );

	return array(
		array(
			'title' => __( 'One domain', 'succeedlearn-amp' ),
			'text'  => __( 'One fixed fee', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'No per-user charges', 'succeedlearn-amp' ),
			'text'  => __( 'Within your selected band', 'succeedlearn-amp' ),
		),
		array(
			'title' => $from_price,
			'text'  => __( 'Complete October campaign', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Returns the Cybersecurity Awareness Month readiness cards.
 *
 * @return array
 */
function succeedlearn_amp_cybersecurity_awareness_readiness_cards() {
	$is_uk = succeedlearn_amp_csa_is_uk();

	return array(
		array(
			'number' => '01',
			'icon'   => 'learn',
			'title'  => __( 'Learn', 'succeedlearn-amp' ),
			'text'   => $is_uk
				? __( 'Build practical cyber security knowledge employees can use every day.', 'succeedlearn-amp' )
				: __( 'Build practical cybersecurity knowledge employees can use every day.', 'succeedlearn-amp' ),
			'footer' => __( 'Build awareness', 'succeedlearn-amp' ),
		),
		array(
			'number' => '02',
			'icon'   => 'test',
			'title'  => __( 'Test', 'succeedlearn-amp' ),
			'text'   => __( 'Measure employee responses through realistic, approved phishing simulations.', 'succeedlearn-amp' ),
			'footer' => __( 'Test readiness', 'succeedlearn-amp' ),
		),
		array(
			'number' => '03',
			'icon'   => 'report',
			'title'  => __( 'Report', 'succeedlearn-amp' ),
			'text'   => __( 'Help employees report suspicious emails easily using PhishCue.', 'succeedlearn-amp' ),
			'footer' => __( 'Enable reporting', 'succeedlearn-amp' ),
		),
	);
}

/** @return array */
function succeedlearn_amp_csa_campaign_data() {
	$is_uk = succeedlearn_amp_csa_is_uk();

	return array(
		'intro' => $is_uk
			? __( 'Learning, testing and active email reporting, delivered as one coordinated Cyber Security Awareness Month campaign.', 'succeedlearn-amp' )
			: __( 'Learning, testing and active email reporting, delivered as one coordinated Cybersecurity Awareness Month campaign.', 'succeedlearn-amp' ),
		'rows'  => array(
			array(
				'number' => '01',
				'title'  => __( 'Comprehensive security awareness training', 'succeedlearn-amp' ),
				'text'   => $is_uk
					? __( 'Equip employees to identify common cyber risks, verify unusual requests, protect business information and make safer decisions in their everyday work.', 'succeedlearn-amp' )
					: __( 'Equip employees to identify common cyber risks, verify unusual requests, protect business information and make safer decisions in everyday work.', 'succeedlearn-amp' ),
				'items'  => array(
					__( 'Account Security', 'succeedlearn-amp' ),
					__( 'AI-based Attack', 'succeedlearn-amp' ),
					__( 'Data Classification', 'succeedlearn-amp' ),
					__( 'Malware', 'succeedlearn-amp' ),
					__( 'Physical Security', 'succeedlearn-amp' ),
					__( 'Remote Work Security', 'succeedlearn-amp' ),
					__( 'Social Engineering', 'succeedlearn-amp' ),
					__( 'Vendor and Third-Party Risk Management', 'succeedlearn-amp' ),
				),
				'image'  => succeedlearn_amp_get_csa_training_image(),
				'alt'    => __( 'Employee correctly identifying and avoiding a phishing attempt', 'succeedlearn-amp' ),
			),
			array(
				'number' => '02',
				'title'  => __( 'Realistic phishing simulations', 'succeedlearn-amp' ),
				'text'   => $is_uk
					? __( 'Test how employees respond to realistic but controlled phishing scenarios. Each simulation is approved in advance, delivered safely and measured without collecting genuine passwords.', 'succeedlearn-amp' )
					: __( 'Test how employees respond to realistic but controlled phishing scenarios. Each simulation is approved in advance, safely delivered and measured without collecting genuine passwords.', 'succeedlearn-amp' ),
				'items'  => array(
					__( 'Link-click phishing', 'succeedlearn-amp' ),
					__( 'Credential harvesting', 'succeedlearn-amp' ),
					__( 'Malicious attachments', 'succeedlearn-amp' ),
					__( 'QR-code phishing', 'succeedlearn-amp' ),
					__( 'Reply-to-email attacks', 'succeedlearn-amp' ),
					__( 'Business email compromise', 'succeedlearn-amp' ),
					__( 'Spear-phishing scenarios', 'succeedlearn-amp' ),
					__( 'Executive impersonation', 'succeedlearn-amp' ),
				),
				'image'  => succeedlearn_amp_get_csa_phishing_image(),
				'alt'    => __( 'Create a phishing simulation campaign with multiple attack types', 'succeedlearn-amp' ),
			),
		),
	);
}

/** @return array */
function succeedlearn_amp_csa_pricing_bands() {
	if ( succeedlearn_amp_csa_is_uk() ) {
		return array(
			array(
				'users'  => __( 'Up to 100 users', 'succeedlearn-amp' ),
				'price'  => '£50',
				'stripe' => 'https://buy.stripe.com/eVq28t8q8g2V4KRcVG3F60j',
			),
			array(
				'users'    => __( '101–1,000 users', 'succeedlearn-amp' ),
				'price'    => '£100',
				'stripe'   => 'https://buy.stripe.com/3cIeVf9uc181dhncVG3F60k',
				'featured' => true,
			),
			array(
				'users'  => __( '1,001–5,000 users', 'succeedlearn-amp' ),
				'price'  => '£500',
				'stripe' => 'https://buy.stripe.com/5kQ00l49SeYRgtzbRC3F60l',
			),
			array(
				'users'  => __( '5,001–10,000 users', 'succeedlearn-amp' ),
				'price'  => '£1,000',
				'stripe' => 'https://buy.stripe.com/6oU4gB6i0dUNgtzcVG3F60m',
			),
		);
	}

	return array(
		array(
			'users'  => __( 'Up to 100 users', 'succeedlearn-amp' ),
			'price'  => '$50',
			'stripe' => 'https://buy.stripe.com/cNibJ3dKs5ohdhnf3O3F60f',
		),
		array(
			'users'    => __( '101–1,000 users', 'succeedlearn-amp' ),
			'price'    => '$100',
			'stripe'   => 'https://buy.stripe.com/aFa14p5dW5ohelr08U3F60g',
			'featured' => true,
		),
		array(
			'users'  => __( '1,001–5,000 users', 'succeedlearn-amp' ),
			'price'  => '$500',
			'stripe' => 'https://buy.stripe.com/9B64gB0XG2c591708U3F60h',
		),
		array(
			'users'  => __( '5,001–10,000 users', 'succeedlearn-amp' ),
			'price'  => '$1,000',
			'stripe' => 'https://buy.stripe.com/bJe14p6i0cQJfpvg7S3F60i',
		),
	);
}

/** @return array */
function succeedlearn_amp_csa_faq_items() {
	$is_uk = succeedlearn_amp_csa_is_uk();
	$month = $is_uk ? 'Cyber Security Awareness Month' : 'Cybersecurity Awareness Month';

	return array(
		array(
			'question' => __( 'Is this an annual subscription?', 'succeedlearn-amp' ),
			'answer'   => sprintf(
				/* translators: %s: campaign month name */
				__( 'No, not under this special offer. The offer covers the %s campaign for October 2026. If you extend the service beyond October, you will receive a 50%% discount on the first-year extension.', 'succeedlearn-amp' ),
				$month
			),
		),
		array(
			'question' => __( 'Does “up to 10 emails per user” mean the same 10 simulations must be sent to everyone?', 'succeedlearn-amp' ),
			'answer'   => __( 'No. Administrators can choose from a library of 300+ phishing templates and assign different simulations to different departments or employee groups. For example, the Finance team can receive 10 finance-relevant campaigns, while another department can receive a different set of templates. Each individual end user will receive a maximum of 10 simulation emails overall during the campaign.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Are there unlimited users?', 'succeedlearn-amp' ),
			'answer'   => $is_uk
				? __( 'There is no separate per-user charge within the selected employee band. Choose the band that matches the number of active participants in your organisation.', 'succeedlearn-amp' )
				: __( 'There is no separate per-user charge within the selected employee band. Choose the band that matches the number of active participants in your business.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Is Microsoft 365 integration included?', 'succeedlearn-amp' ),
			'answer'   => __( 'Standard support for one Microsoft 365 tenant is included. Custom development, complex tenant remediation and third-party integrations are outside the promotional package.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What is PhishCue?', 'succeedlearn-amp' ),
			'answer'   => __( 'PhishCue is SucceedLEARN’s reported-email solution. It gives employees a simple way to report suspicious emails and provides security teams with one place to review and manage those reports.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can different phishing simulations be used for different departments?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Administrators can select department-relevant templates from the library, so teams such as Finance, HR and IT can receive simulations that reflect the risks they are most likely to face.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the solution work with Google Workspace?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. SucceedLEARN’s Security Awareness Training and Phishing Simulations are fully compatible with Google Workspace. However, PhishCue, our phishing reporting, analysis, and security management platform, is currently available only for Microsoft 365.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How long is this offer available?', 'succeedlearn-amp' ),
			'answer'   => $is_uk
				? __( 'This special introductory offer is available until 15 October 2026. Succeed Technologies reserves the right to modify or withdraw the offer at any time during the promotional period.', 'succeedlearn-amp' )
				: __( 'This special introductory offer is available until October 15, 2026. Succeed Technologies reserves the right to modify or withdraw the offer at any time during the promotional period.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'What if my organization has more than 10,000 users?', 'succeedlearn-amp' ),
			'answer'   => $is_uk
				? __( 'For organisations with more than 10,000 users, request a demo or email us at <a href="mailto:connect@succeedtech.com">connect@succeedtech.com</a>. We’ll be happy to understand your requirements and provide a customised offer.', 'succeedlearn-amp' )
				: __( 'For organizations with more than 10,000 users, request a demo or email us at <a href="mailto:connect@succeedtech.com">connect@succeedtech.com</a>. We’ll be happy to understand your requirements and provide a customized offer.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can the Security Awareness eLearning content be customized?', 'succeedlearn-amp' ),
			'answer'   => $is_uk
				? __( 'Yes. The eLearning content can be customised to reflect your organisation’s policies, branding, or specific training requirements. Customisation will involve an additional cost and may require additional implementation time. The scope, pricing, and delivery timeline will be agreed upon before work begins.', 'succeedlearn-amp' )
				: __( 'Yes. The eLearning content can be customized to reflect your organization’s policies, branding, or specific training requirements. Customization will involve an additional cost and may require additional implementation time. The scope, pricing, and delivery timeline will be agreed upon before work begins.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How long is the service period?', 'succeedlearn-amp' ),
			'answer'   => __( 'This special offer provides access to the service for 30 consecutive calendar days from the agreed go-live date. Any training, phishing simulations, or other included services not used within this period will expire, unless an extension is discussed and agreed upon in writing by the customer and Succeed Technologies.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * FAQPage structured data for the AMP document.
 *
 * @return array
 */
function succeedlearn_amp_csa_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_csa_faq_items() as $item ) {
		$entities[] = array(
			'@type'          => 'Question',
			'name'           => wp_strip_all_tags( $item['question'] ),
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
