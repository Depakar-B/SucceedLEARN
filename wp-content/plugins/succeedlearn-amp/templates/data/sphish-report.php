<?php
/**
 * S-PhishReport — AMP data.
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
function succeedlearn_amp_get_sphish_report_context() {
	return array(
		'page_type'        => 'sphish_report',
		'canonical'        => succeedlearn_amp_resolve_legal_canonical_url( '/s-phish-report/', array( 's-phish-report', 'sphish-report' ) ),
		'document_title'   => 'S-PhishReport | SucceedLEARN',
		'breadcrumb_label' => __( 'S-PhishReport', 'succeedlearn-amp' ),
		'legal_eyebrow'    => __( 'Legal', 'succeedlearn-amp' ),
		'legal_title'      => __( 'S-PhishReport', 'succeedlearn-amp' ),
		'legal_lead'       => __( 'Privacy Policy and Terms of Use for the S-PhishReport Google Add-On, provided by Succeed Technologies Pvt Ltd.', 'succeedlearn-amp' ),
		'toc_items'        => array(
			array( 'id' => 'introduction', 'title' => __( '1. Introduction', 'succeedlearn-amp' ) ),
			array( 'id' => 'overview', 'title' => __( '2. Overview', 'succeedlearn-amp' ) ),
			array( 'id' => 'key-features', 'title' => __( '3. Key Features', 'succeedlearn-amp' ) ),
			array( 'id' => 'permissions-and-scopes', 'title' => __( '4. Permissions and Scopes', 'succeedlearn-amp' ) ),
			array( 'id' => 'data-privacy-and-security', 'title' => __( '5. Data Privacy and Security', 'succeedlearn-amp' ) ),
			array( 'id' => 'admin-configuration', 'title' => __( '6. Admin Configuration and Deployment', 'succeedlearn-amp' ) ),
			array( 'id' => 'use-of-data', 'title' => __( '7. Use of Data', 'succeedlearn-amp' ) ),
			array( 'id' => 'changes-to-policy', 'title' => __( '8. Changes to This Policy', 'succeedlearn-amp' ) ),
			array( 'id' => 'disclaimer', 'title' => __( '9. Disclaimer', 'succeedlearn-amp' ) ),
		),
		'sections_path'    => function_exists( 'get_theme_file_path' )
			? get_theme_file_path( 'template-parts/s-phish-report/sections.php' )
			: '',
		'amp_components'   => array( 'amp-sidebar', 'amp-accordion' ),
	);
}
