<?php
/**
 * Page template → asset handler registry.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Template slug to enqueue callback map.
 *
 * @return array<string, callable>
 */
function akaza_get_page_asset_handlers() {
	return array(
		'page-templates/financial-crime-prevention.php'              => 'akaza_enqueue_fcp_assets',
		'page-templates/security-awareness-and-phishing.php'       => 'akaza_enqueue_sap_assets',
		'page-templates/code-of-conduct.php'                       => 'akaza_enqueue_coc_assets',
		'page-templates/code-of-conduct-elearning-training.php'      => 'akaza_enqueue_coc_assets',
		'page-templates/cybersecurity-awareness.php'               => 'akaza_enqueue_csa_assets',
		'page-templates/cybersecurity-awareness-uk.php'            => 'akaza_enqueue_csa_assets',
		'page-templates/page-about.php'                            => static function () {
			akaza_enqueue_about_contact_assets( 'about' );
		},
		'page-templates/page-contact.php'                          => static function () {
			akaza_enqueue_about_contact_assets( 'contact' );
		},
		'page-templates/page-clients.php'                          => 'akaza_enqueue_clients_assets',
		'page-templates/privacy-policy.php'                          => 'akaza_enqueue_legal_assets',
		'page-templates/terms-and-conditions.php'                    => 'akaza_enqueue_legal_assets',
		'page-templates/s-phish-report.php'                          => 'akaza_enqueue_legal_assets',
		'page-templates/defensive-driving.php'                       => 'akaza_enqueue_defensive_driving_assets',
		'page-templates/inclusive-workplace-training.php'            => 'akaza_enqueue_inclusive_training_assets',
		'page-templates/equality-diversity-inclusion-training.php'   => 'akaza_enqueue_iwc_course_assets',
		'page-templates/unconscious-bias-training.php'               => 'akaza_enqueue_iwc_course_assets',
		'page-templates/bystander-intervention-training.php'       => 'akaza_enqueue_iwc_course_assets',
		'page-templates/global-workplace-compliance-training-for-employees.php' => 'akaza_enqueue_gwct_assets',
		'page-templates/gdpr-employee-awareness-training.php'      => 'akaza_enqueue_gdpr_assets',
		'page-templates/ferpa-training-for-school-and-university-staff.php' => 'akaza_enqueue_ferpa_assets',
		'page-templates/workplace-harassment-prevention-training.php' => 'akaza_enqueue_whp_assets',
		'page-templates/infosec-2026-cyber.php'                   => 'akaza_enqueue_infosec_2026_cyber_assets',
		'page-templates/infosec-2026-cyber-uk.php'                => 'akaza_enqueue_infosec_2026_cyber_assets',
		'page-templates/dpdpa-compliance-training.php'             => 'akaza_enqueue_dpdpa_assets',
		'page-templates/dpdpa-readiness.php'                       => 'akaza_enqueue_dpdpa_readiness_assets',
		'page-templates/hipaa-annual-workforce-training.php'       => 'akaza_enqueue_hipaa_assets',
		'page-templates/s-aware.php'                               => 'akaza_enqueue_s_aware_assets',
		'page-templates/s-phish-phishing-simulation.php'           => 'akaza_enqueue_s_phish_assets',
		'page-templates/us-sexual-harassment-prevention-training.php' => 'akaza_enqueue_us_harassment_assets',
		'page-templates/uk-sexual-harassment-prevention-training.php' => 'akaza_enqueue_uk_harassment_assets',
		'page-templates/gifts-and-entertainment.php'                 => 'akaza_enqueue_gifts_entertainment_assets',
		'page-templates/aml-pe-vc.php'                               => 'akaza_enqueue_aml_pe_vc_assets',
		'page-templates/insider-trading.php'                         => 'akaza_enqueue_insider_trading_assets',
		'page-templates/tax-evasion-facilitation.php'                => 'akaza_enqueue_tax_evasion_assets',
		'page-templates/anti-bribery-anti-corruption.php'            => 'akaza_enqueue_anti_bribery_assets',
		'page-templates/whistleblowing-pe-vc.php'                    => 'akaza_enqueue_whistleblowing_assets',
		'page-templates/political-donations-pe-vc.php'               => 'akaza_enqueue_political_donations_assets',
		'page-templates/smcr-pe-vc.php'                              => 'akaza_enqueue_smcr_assets',
	);
}

/**
 * Enqueue page-specific CSS/JS based on the current template.
 */
function akaza_enqueue_page_assets() {
	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	if ( is_front_page() || is_page_template( 'page-templates/homepage-fast.php' ) ) {
		akaza_enqueue_home_assets();
		return;
	}

	if ( is_page( 'hr-compliance-suite' ) ) {
		akaza_enqueue_gwct_assets();
		return;
	}

	// Live SEO slugs may keep an old template meta; still load the right assets.
	if ( function_exists( 'akaza_is_sap_landing_page' ) && akaza_is_sap_landing_page() ) {
		akaza_enqueue_sap_assets();
		return;
	}

	if ( function_exists( 'akaza_is_infosec_2026_landing_page' ) && akaza_is_infosec_2026_landing_page() ) {
		akaza_enqueue_infosec_2026_cyber_assets();
		return;
	}

	if ( function_exists( 'akaza_is_csa_landing_page' ) && akaza_is_csa_landing_page() ) {
		akaza_enqueue_csa_assets();
		return;
	}

	$slug = (string) get_page_template_slug();
	if ( '' === $slug ) {
		return;
	}

	$handlers = akaza_get_page_asset_handlers();
	if ( ! isset( $handlers[ $slug ] ) ) {
		return;
	}

	$handler = $handlers[ $slug ];
	if ( is_callable( $handler ) ) {
		call_user_func( $handler );
	}
}

/**
 * Main asset loader — core assets plus page dispatcher.
 */
function akaza_enqueue_assets() {
	akaza_enqueue_core_assets();
	akaza_enqueue_page_assets();
}
add_action( 'wp_enqueue_scripts', 'akaza_enqueue_assets' );
