<?php
/**
 * DPDPA Compliance Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a DPDPA Compliance Training section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_dpdpa_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/dpdpa/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_dpdpa_canonical_url() {
	$canonical = home_url( '/dpdpa-compliance-training/' );
	foreach ( array( 'dpdpa-compliance-training' ) as $slug ) {
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
function succeedlearn_amp_get_dpdpa_page_title() {
	return __( 'DPDPA Compliance Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_dpdpa_meta_description() {
	return '';
}

/**
 * Return the trusted organisation logos.
 *
 * @return array
 */
function succeedlearn_amp_dpdpa_trusted_logos() {
	return array(
		array(
			'name' => 'TCS',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/TCS-e1786337779729.webp'
			),
		),
		array(
			'name' => 'Tata',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/TATA-e1786337788227.webp'
			),
		),
		array(
			'name' => 'Air India',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/AirIndia-e1786337713550.webp'
			),
		),
		array(
			'name' => 'AirAsia',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/AirAsia-e1786337722388.webp'
			),
		),
		array(
			'name' => 'DHL',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/DHL-1-e1786337623808.webp'
			),
		),
		array(
			'name' => 'RazorPay',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/RazorPay-e1786337838191.webp'
			),
		),
		array(
			'name' => 'Lenovo',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/Lenova-1-e1786337921600.webp'
			),
		),
		array(
			'name' => 'PowerGrid',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/PowerGrid-e1786337848952.webp'
			),
		),
	);
}

/**
 * Return the DPDPA breach scenario image URL.
 *
 * @return string
 */
function succeedlearn_amp_dpdpa_breach_scenario_image_url() {
	return get_template_directory_uri()
		. '/assets/images/dpdpa-breach-scenario.webp';
}


/**
 * Return the main DPDPA course coverage items.
 *
 * @return array
 */
function succeedlearn_amp_dpdpa_coverage_items() {
	return array(
		array(
			'title' => __( 'Recognise personal data', 'succeedlearn-amp' ),
			'text'  => __( 'What counts, directly or indirectly, before it gets mishandled.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Consent and lawful grounds', 'succeedlearn-amp' ),
			'text'  => __( 'What makes consent valid, and the legitimate uses that do not need it.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'The full data lifecycle', 'succeedlearn-amp' ),
			'text'  => __( 'Collect, classify, store, share, retain and delete, the way the Act expects.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Data Principal rights', 'succeedlearn-amp' ),
			'text'  => __( 'Recognise a request and route it, rather than answering it informally.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Breach recognition and reporting', 'succeedlearn-amp' ),
			'text'  => __( 'Act in the first minutes, not after checking with five people.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'A real assessment', 'succeedlearn-amp' ),
			'text'  => __( '5 questions, 4 correct required, certificate issued automatically.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return the complete DPDPA course curriculum.
 *
 * @return array
 */
function succeedlearn_amp_dpdpa_curriculum_items() {
	return array(
		array(
			'title' => __( 'Introduction and objectives', 'succeedlearn-amp' ),
			'text'  => __( 'Why this training matters in everyday work.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Why data protection matters', 'succeedlearn-amp' ),
			'text'  => __( 'The real world impact of poor data handling.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'What is the DPDPA', 'succeedlearn-amp' ),
			'text'  => __( 'Overview of the Act and consequences of non-compliance.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Key DPDPA terms', 'succeedlearn-amp' ),
			'text'  => __( 'Personal Data, Data Principal, Data Fiduciary, Data Processor.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Scope of the DPDPA', 'succeedlearn-amp' ),
			'text'  => __( 'What data and which organisations are covered.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Lawful grounds for processing', 'succeedlearn-amp' ),
			'text'  => __( 'Valid consent and the legitimate uses that do not require it.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Privacy by design', 'succeedlearn-amp' ),
			'text'  => __( 'Building privacy into everyday decisions and processes.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Handling data across its lifecycle', 'succeedlearn-amp' ),
			'text'  => __( 'Collection, classification, storage, sharing, retention, deletion.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Data Principal rights and requests', 'succeedlearn-amp' ),
			'text'  => __( 'Consent withdrawal, access, correction, erasure, grievance redressal. Knowledge check included.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Grievances and escalation', 'succeedlearn-amp' ),
			'text'  => __( 'Recognising and routing privacy concerns correctly.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Breach awareness and reporting', 'succeedlearn-amp' ),
			'text'  => __( 'What counts as a breach and how to report it without delay. Knowledge check included.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Your responsibilities', 'succeedlearn-amp' ),
			'text'  => __( "Practical dos and don'ts for everyday data handling.", 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Final assessment and certificate', 'succeedlearn-amp' ),
			'text'  => __( '5 randomised questions, minimum 4 correct to pass.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return the DPDPA progressive pricing tiers.
 *
 * @return array
 */
function succeedlearn_amp_dpdpa_pricing_tiers() {
	return array(
		array(
			'label' => __( 'Employees 1 to 1,000', 'succeedlearn-amp' ),
			'rate'  => '₹200',
		),
		array(
			'label' => __( '1,001 to 2,500', 'succeedlearn-amp' ),
			'rate'  => '₹180',
		),
		array(
			'label' => __( '2,501 to 5,000', 'succeedlearn-amp' ),
			'rate'  => '₹160',
		),
		array(
			'label' => __( 'Above 5,000', 'succeedlearn-amp' ),
			'rate'  => '₹140',
		),
	);
}
/**
 * Return DPDPA training-record cards.
 *
 * @return array
 */
function succeedlearn_amp_dpdpa_training_record_cards() {
	return array(
		array(
			'label' => __( 'Per learner', 'succeedlearn-amp' ),
			'title' => __( 'Dated certificates', 'succeedlearn-amp' ),
			'text'  => __( 'Issued automatically the moment someone passes.', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Dashboard', 'succeedlearn-amp' ),
			'title' => __( 'Completion by team', 'succeedlearn-amp' ),
			'text'  => __( 'See exactly who has finished, and who has not.', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Exportable', 'succeedlearn-amp' ),
			'title' => __( 'Audit-ready records', 'succeedlearn-amp' ),
			'text'  => __( 'Attach directly to a security review or Board update.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return DPDPA training-record screenshots.
 *
 * @return array
 */
function succeedlearn_amp_dpdpa_training_record_images() {
	$image_base_url = trailingslashit( get_stylesheet_directory_uri() )
		. 'assets/images/';

	return array(
		array(
			'url'     => $image_base_url . 'dpdpa-certificate.webp',
			'alt'     => __( 'DPDPA certificate of completion with dummy learner name', 'succeedlearn-amp' ),
			'caption' => __( 'What every learner receives', 'succeedlearn-amp' ),
			'width'   => 900,
			'height'  => 560,
		),
		array(
			'url'     => $image_base_url . 'dpdpa-admin-dashboard.webp',
			'alt'     => __( 'DPDPA admin completion dashboard with dummy organisation data', 'succeedlearn-amp' ),
			'caption' => __( 'What your DPO or HR admin sees', 'succeedlearn-amp' ),
			'width'   => 900,
			'height'  => 560,
		),
	);
}

/**
 * Return the DPDPA format and delivery specifications.
 *
 * @return array
 */
function succeedlearn_amp_dpdpa_format_delivery_rows() {
	return array(
		array(
			'label' => __( 'Duration', 'succeedlearn-amp' ),
			'value' => __( '25 minutes, self paced', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Level', 'succeedlearn-amp' ),
			'value' => __( 'Beginner, foundational awareness for all employees', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Assessment', 'succeedlearn-amp' ),
			'value' => __( '5 questions, minimum 4 correct, plus knowledge checks throughout', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Certificate', 'succeedlearn-amp' ),
			'value' => __( 'Issued automatically on completion', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Language', 'succeedlearn-amp' ),
			'value' => __( 'English now. Hindi in development, coming soon.', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Delivery', 'succeedlearn-amp' ),
			'value' => __( 'Hosted SaaS LMS, SCORM package for your LMS, or LTI', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Platform', 'succeedlearn-amp' ),
			'value' => __( 'Branded portal, SSO, HRIS integration, Android app, automated reminders', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Security', 'succeedlearn-amp' ),
			'value' => __( 'ISO 27001:2022, SOC 2, GDPR-aligned', 'succeedlearn-amp' ),
		),
	);
}