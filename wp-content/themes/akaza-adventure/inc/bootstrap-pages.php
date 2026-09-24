<?php
/**
 * Extracted from functions.php (inc\bootstrap-pages.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Create core marketing pages if missing.
 */
function akaza_bootstrap_pages() {
	$pages = array(
		array(
			'slug'     => 'solutions',
			'title'    => 'Solutions',
			'template' => 'page-templates/page-solutions.php',
		),
		array(
			'slug'     => 'about-us',
			'title'    => 'About Us',
			'template' => 'page-templates/page-about.php',
		),
		array(
			'slug'     => 'contact-us',
			'title'    => 'Contact Us',
			'template' => 'page-templates/page-contact.php',
		),
		array(
			'slug'     => 'privacy-policy',
			'title'    => 'Privacy Policy',
			'template' => 'page-templates/privacy-policy.php',
		),
		array(
			'slug'     => 'terms-and-conditions',
			'title'    => 'Terms and Conditions',
			'template' => 'page-templates/terms-and-conditions.php',
		),
		array(
			'slug'     => 's-phish-report',
			'title'    => 'S-PhishReport',
			'template' => 'page-templates/s-phish-report.php',
		),
		array(
			'slug'     => 'clients',
			'title'    => 'Clients',
			'template' => 'page-templates/page-clients.php',
		),
		array(
			'slug'     => 'defensive-driving',
			'title'    => 'Online Defensive Driving Training for Employees',
			'template' => 'page-templates/defensive-driving.php',
		),
		array(
			'slug'     => 'gifts-and-entertainment',
			'title'    => 'Gifts and Entertainment Training for PE/VC Professionals',
			'template' => 'page-templates/gifts-and-entertainment.php',
		),
		array(
			'slug'     => 'aml-pe-vc',
			'title'    => 'AML Training for Private Equity and Venture Capital',
			'template' => 'page-templates/aml-pe-vc.php',
		),
		array(
			'slug'     => 'insider-trading',
			'title'    => 'Insider Trading eLearning',
			'template' => 'page-templates/insider-trading.php',
		),
		array(
			'slug'     => 'tax-evasion-facilitation',
			'title'    => 'Preventing the Facilitation of Tax Evasion Training',
			'template' => 'page-templates/tax-evasion-facilitation.php',
		),
		array(
			'slug'     => 'anti-bribery-anti-corruption',
			'title'    => 'Anti-Bribery and Anti-Corruption eLearning',
			'template' => 'page-templates/anti-bribery-anti-corruption.php',
		),
		array(
			'slug'     => 'whistleblowing-pe-vc',
			'title'    => 'Whistleblowing Training for Private Equity and Venture Capital',
			'template' => 'page-templates/whistleblowing-pe-vc.php',
		),
		array(
			'slug'     => 'political-donations-pe-vc',
			'title'    => 'Political Donations Training for PE and VC Professionals',
			'template' => 'page-templates/political-donations-pe-vc.php',
		),
		array(
			'slug'     => 'smcr-pe-vc',
			'title'    => 'SMCR Training for Private Equity and Venture Capital Firms',
			'template' => 'page-templates/smcr-pe-vc.php',
		),
		array(
			'slug'     => 'us-cyber-aware-october',
			'title'    => 'US Cyber Aware October',
			'template' => 'page-templates/cybersecurity-awareness.php',
		),
		array(
			'slug'     => 'uk-cyber-aware-october',
			'title'    => 'UK Cyber Aware October',
			'template' => 'page-templates/cybersecurity-awareness-uk.php',
		),
		array(
			'slug'     => 'gdpr-employee-awareness-training',
			'title'    => 'GDPR Employee Awareness Training',
			'template' => 'page-templates/gdpr-employee-awareness-training.php',
		),
		array(
			'slug'     => 'ferpa-training-for-school-and-university-staff',
			'title'    => 'FERPA Training for School and University Staff',
			'template' => 'page-templates/ferpa-training-for-school-and-university-staff.php',
		),
		array(
			'slug'     => 'workplace-harassment-prevention-training',
			'title'    => 'Workplace Harassment Prevention Training',
			'template' => 'page-templates/workplace-harassment-prevention-training.php',
		),
		array(
			'slug'     => 'us-sexual-harassment-prevention-training',
			'title'    => 'US Sexual Harassment Prevention Training for Employees and Supervisors',
			'template' => 'page-templates/us-sexual-harassment-prevention-training.php',
		),
		array(
			'slug'     => 'uk-sexual-harassment-prevention-training',
			'title'    => 'UK Sexual Harassment Prevention Training',
			'template' => 'page-templates/uk-sexual-harassment-prevention-training.php',
		),
		array(
			'slug'     => 's-phish',
			'title'    => 'S-Phish',
			'template' => 'page-templates/s-phish-phishing-simulation.php',
		),
		array(
			'slug'     => 'private-equity-venture-capital-compliance-training',
			'title'    => 'Private Equity and Venture Capital Compliance Training',
			'template' => 'page-templates/pevc-compliance-training-programs.php',
		),
	);

	$created_page = false;

	foreach ( $pages as $page ) {
		$existing = get_page_by_path( $page['slug'] );
		if ( $existing ) {
			$current = get_post_meta( $existing->ID, '_wp_page_template', true );
			if ( $current !== $page['template'] ) {
				update_post_meta( $existing->ID, '_wp_page_template', $page['template'] );
			}
			continue;
		}
		$id = wp_insert_post(
			array(
				'post_title'   => $page['title'],
				'post_name'    => $page['slug'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			)
		);
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, '_wp_page_template', $page['template'] );
			$created_page = true;
		}
	}

	if ( $created_page ) {
		akaza_increment_theme_version();
	}

	update_option( 'akaza_pages_bootstrapped', 1, false );
}
add_action( 'after_switch_theme', 'akaza_bootstrap_pages' );
add_action( 'init', 'akaza_bootstrap_pages' );

/**
 * Register page templates.
 *
 * @param array $templates Templates.
 * @return array
 */
function akaza_page_templates( $templates ) {
	$dir = AKAZA_DIR . '/page-templates';

	if ( ! is_dir( $dir ) ) {
		return $templates;
	}

	foreach ( glob( $dir . '/*.php' ) as $file ) {
		$relative = 'page-templates/' . basename( $file );
		$data     = get_file_data(
			$file,
			array(
				'Template Name' => 'Template Name',
			)
		);

		if ( ! empty( $data['Template Name'] ) ) {
			$templates[ $relative ] = $data['Template Name'];
		}
	}

	return $templates;
}
add_filter( 'theme_page_templates', 'akaza_page_templates' );

/**
 * Course archive URL helper.
 *
 * @return string
 */
function akaza_courses_url() {
	if ( post_type_exists( 'course' ) ) {
		$archive = get_post_type_archive_link( 'course' );
		if ( $archive ) {
			return $archive;
		}
	}
	if ( function_exists( 'learn_press_get_page_link' ) ) {
		$link = learn_press_get_page_link( 'courses' );
		if ( $link ) {
			return $link;
		}
	}
	$archive = get_post_type_archive_link( 'lp_course' );
	return $archive ? $archive : home_url( '/courses/' );
}
