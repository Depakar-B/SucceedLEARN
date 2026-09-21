<?php
/**
 * Cookie Policy — AMP data.
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
function succeedlearn_amp_get_cookie_policy_context() {
	return array(
		'page_type'        => 'cookie_policy',
		'canonical'        => succeedlearn_amp_resolve_legal_canonical_url( '/cookie-policy/', array( 'cookie-policy', 'cookies' ) ),
		'document_title'   => 'Cookie Policy | SucceedLEARN',
		'breadcrumb_label' => __( 'Cookie Policy', 'succeedlearn-amp' ),
		'legal_eyebrow'    => __( 'Legal', 'succeedlearn-amp' ),
		'legal_title'      => __( 'Cookie Policy', 'succeedlearn-amp' ),
		'legal_lead'       => __( 'How SucceedLEARN uses cookies and similar technologies on this website.', 'succeedlearn-amp' ),
		'toc_items'        => array(
			array( 'id' => 'what-are-cookies', 'title' => __( '1. What Are Cookies', 'succeedlearn-amp' ) ),
			array( 'id' => 'how-we-use-cookies', 'title' => __( '2. How We Use Cookies', 'succeedlearn-amp' ) ),
			array( 'id' => 'managing-cookies', 'title' => __( '3. Managing Cookies', 'succeedlearn-amp' ) ),
			array( 'id' => 'contact-us', 'title' => __( '4. Contact Us', 'succeedlearn-amp' ) ),
		),
		'sections_path'    => function_exists( 'get_theme_file_path' )
			? get_theme_file_path( 'template-parts/cookie-policy/sections.php' )
			: '',
		'amp_components'   => array( 'amp-sidebar' ),
	);
}
