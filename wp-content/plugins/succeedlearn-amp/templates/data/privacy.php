<?php
/**
 * Privacy Policy — AMP data.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/legal.php';

/**
 * @return array<string, mixed>
 */
function succeedlearn_amp_get_privacy_context() {
	return array(
		'page_type'        => 'privacy',
		'canonical'        => succeedlearn_amp_resolve_legal_canonical_url( '/privacy-policy/', array( 'privacy-policy' ) ),
		'document_title'   => 'Privacy Policy | SucceedLEARN',
		'breadcrumb_label' => __( 'Privacy Policy', 'succeedlearn-amp' ),
		'legal_eyebrow'    => __( 'Legal', 'succeedlearn-amp' ),
		'legal_title'      => __( 'Privacy Policy', 'succeedlearn-amp' ),
		'legal_lead'       => __( 'How SucceedLEARN collects, uses, and protects your personal information when you visit our website, purchase or subscribe to our courses, enrol in training programs, or interact with our platform.', 'succeedlearn-amp' ),
		'toc_items'        => array(
			array( 'id' => 'introduction', 'title' => __( '1. Introduction', 'succeedlearn-amp' ) ),
			array( 'id' => 'information-we-collect', 'title' => __( '2. Information We Collect', 'succeedlearn-amp' ) ),
			array( 'id' => 'how-we-collect', 'title' => __( '3. How We Collect Information', 'succeedlearn-amp' ) ),
			array( 'id' => 'how-we-use', 'title' => __( '4. How We Use Your Information', 'succeedlearn-amp' ) ),
			array( 'id' => 'cookies', 'title' => __( '5. Cookies', 'succeedlearn-amp' ) ),
			array( 'id' => 'data-security', 'title' => __( '6. Data Security', 'succeedlearn-amp' ) ),
			array( 'id' => 'third-party', 'title' => __( '7. Third-Party Access and Disclosure', 'succeedlearn-amp' ) ),
			array( 'id' => 'data-retention', 'title' => __( '8. Data Retention Policy', 'succeedlearn-amp' ) ),
			array( 'id' => 'international-transfer', 'title' => __( '10. International Data Transfers', 'succeedlearn-amp' ) ),
			array( 'id' => 'representative', 'title' => __( '11. Representative', 'succeedlearn-amp' ) ),
			array( 'id' => 'user-rights', 'title' => __( '12. User Rights and Controls', 'succeedlearn-amp' ) ),
			array( 'id' => 'policy-updates', 'title' => __( '13. Policy Updates', 'succeedlearn-amp' ) ),
			array( 'id' => 'contact-us', 'title' => __( '14. Contact Us', 'succeedlearn-amp' ) ),
		),
		'sections_path'    => function_exists( 'get_theme_file_path' )
			? get_theme_file_path( 'template-parts/privacy-policy/sections.php' )
			: '',
		'amp_components'   => array( 'amp-sidebar', 'amp-accordion' ),
	);
}
