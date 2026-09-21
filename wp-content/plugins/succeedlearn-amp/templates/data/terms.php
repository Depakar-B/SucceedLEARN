<?php
/**
 * Terms and Conditions — AMP data.
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
function succeedlearn_amp_get_terms_context() {
	return array(
		'page_type'        => 'terms',
		'canonical'        => succeedlearn_amp_resolve_legal_canonical_url( '/terms-and-conditions/', array( 'terms-and-conditions', 'terms' ) ),
		'document_title'   => 'Terms and Conditions | SucceedLEARN',
		'breadcrumb_label' => __( 'Terms and Conditions', 'succeedlearn-amp' ),
		'legal_eyebrow'    => __( 'Legal', 'succeedlearn-amp' ),
		'legal_title'      => __( 'Terms and Conditions', 'succeedlearn-amp' ),
		'legal_lead'       => __( 'These Terms and Conditions apply to purchases of learning services and subscriptions made through our online portal.', 'succeedlearn-amp' ),
		'toc_items'        => array(
			array( 'id' => 'introduction', 'title' => __( '1. Introduction', 'succeedlearn-amp' ) ),
			array( 'id' => 'purchase-and-payment', 'title' => __( '2. Purchase and Payment', 'succeedlearn-amp' ) ),
			array( 'id' => 'refund-cancellation', 'title' => __( '3. Refund and Cancellation Policy', 'succeedlearn-amp' ) ),
			array( 'id' => 'intellectual-property', 'title' => __( '4. Intellectual Property', 'succeedlearn-amp' ) ),
			array( 'id' => 'usage-and-access', 'title' => __( '5. Usage and Access', 'succeedlearn-amp' ) ),
			array( 'id' => 'governing-law', 'title' => __( '6. Governing Law and Jurisdiction', 'succeedlearn-amp' ) ),
			array( 'id' => 'agreement-override', 'title' => __( '7. Agreement Override', 'succeedlearn-amp' ) ),
			array( 'id' => 'contact-information', 'title' => __( '8. Contact Information', 'succeedlearn-amp' ) ),
		),
		'sections_path'    => function_exists( 'get_theme_file_path' )
			? get_theme_file_path( 'template-parts/terms-and-conditions/sections.php' )
			: '',
		'amp_components'   => array( 'amp-sidebar', 'amp-accordion' ),
	);
}
