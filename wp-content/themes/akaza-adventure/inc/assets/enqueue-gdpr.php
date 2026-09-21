<?php
/**
 * GDPR Employee Awareness Training page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue GDPR page styles (and scripts when needed).
 */
function akaza_enqueue_gdpr_assets() {
	$folder = 'gdpr-employee-awareness-training';
	$global = akaza_enqueue_page_foundation();

	akaza_enqueue_theme_style( 'akaza-sl-gdpr-hero', "{$folder}/sl-gdpr-hero.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-gdpr-trust', "{$folder}/sl-gdpr-trust.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-gdpr-everyday-risk', "{$folder}/gdpr-everyday-risk.css", array( $global, 'akaza-global-highlight' ) );
	akaza_enqueue_theme_style( 'akaza-sl-gdpr-reasons', "{$folder}/sl-gdpr-reasons.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-gdpr-coverage', "{$folder}/sl-gdpr-coverage.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-gdpcourse-modules', "{$folder}/sl-gdpr-course-modules.css", array( $global ) );
	akaza_enqueue_theme_style( 'akaza-sl-gdpr-sales-marketing', "{$folder}/sl-gdpr-sales-marketing.css", array( $global, 'akaza-global-list-item' ) );
	akaza_enqueue_theme_style( 'akaza-sl-gdpr-completion-proof', "{$folder}/sl-gdpr-completion-proof.css", array( $global, 'akaza-global-list-item' ) );
	akaza_enqueue_theme_style( 'akaza-sl-gdpr-format-delivery', "{$folder}/sl-gdpr-format-delivery.css", array( $global, 'akaza-global-list-item', 'akaza-global-highlight' ) );

	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );
	$contact_form_brand = AKAZA_DIR . '/assets/css/contact-form-brand.css';
	if ( file_exists( $contact_form_brand ) ) {
		wp_enqueue_style(
			'akaza-contact-form-brand',
			AKAZA_URI . '/assets/css/contact-form-brand.css',
			array( 'akaza-contact-form' ),
			akaza_asset_version( $contact_form_brand )
		);
	}

	akaza_enqueue_theme_style(
		'akaza-sl-gdpr-request-preview',
		"{$folder}/sl-gdpr-request-preview.css",
		array( $global, 'akaza-contact-form' )
	);
}
