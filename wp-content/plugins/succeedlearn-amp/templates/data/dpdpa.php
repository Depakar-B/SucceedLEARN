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
	foreach ( array( 'dpdpa-compliance-training', 'dpdpa' ) as $slug ) {
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
	return __( 'DPDPA compliance training for employees: a 25-minute animated course covering personal data, consent, safe handling, rights requests, breach reporting, assessment and verified certification.', 'succeedlearn-amp' );
}

/**
 * Allowed SVG tags/attrs for DPDPA AMP icons.
 *
 * @return array
 */
function succeedlearn_amp_dpdpa_allowed_svg() {
	// wp_kses lowercases attribute names, so viewBox must be listed as viewbox.
	return array(
		'svg'     => array(
			'viewbox'         => true,
			'width'           => true,
			'height'          => true,
			'fill'            => true,
			'stroke'          => true,
			'stroke-width'    => true,
			'stroke-linecap'  => true,
			'stroke-linejoin' => true,
			'aria-hidden'     => true,
			'class'           => true,
			'role'            => true,
			'focusable'       => true,
		),
		'path'    => array( 'd' => true ),
		'circle'  => array(
			'cx' => true,
			'cy' => true,
			'r'  => true,
		),
		'rect'    => array(
			'x'      => true,
			'y'      => true,
			'width'  => true,
			'height' => true,
			'rx'     => true,
		),
		'ellipse' => array(
			'cx' => true,
			'cy' => true,
			'rx' => true,
			'ry' => true,
		),
	);
}

/**
 * Desktop-matching DPDPA icon SVGs for AMP cards.
 *
 * @param string $key Icon key.
 * @return string
 */
function succeedlearn_amp_dpdpa_icon_svg( $key ) {
	$icons = array(
		'mail'        => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></svg>',
		'link'        => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 13a5 5 0 0 0 7.1 0l2-2a5 5 0 0 0-7.1-7.1l-1.1 1.1"></path><path d="M14 11a5 5 0 0 0-7.1 0l-2 2A5 5 0 0 0 12 20.1l1.1-1.1"></path></svg>',
		'print'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 8V3h10v5"></path><rect x="5" y="14" width="14" height="7" rx="1"></rect><path d="M5 17H3V10a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v7h-2"></path><path d="M17 11h.01"></path></svg>',
		'search'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m16 16 4 4"></path><path d="M8.5 11h5"></path><path d="M11 8.5v5"></path></svg>',
		'layers'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 3 8 4-8 4-8-4 8-4Z"></path><path d="m4 12 8 4 8-4"></path><path d="m4 17 8 4 8-4"></path></svg>',
		'inbox'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5h16l1 12H3L4 5Z"></path><path d="M3 14h5l2 3h4l2-3h5"></path></svg>',
		'flag'        => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 21V4"></path><path d="M5 5h11l-2 4 2 4H5"></path></svg>',
		'collect'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="3" width="14" height="18" rx="2"></rect><path d="M8 7h8"></path><path d="M8 11h8"></path><path d="M8 15h5"></path></svg>',
		'classify'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 13 11 22l-9-9V4h9l9 9Z"></path><circle cx="7" cy="9" r="1.5"></circle></svg>',
		'store'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><ellipse cx="12" cy="5" rx="7" ry="3"></ellipse><path d="M5 5v6c0 1.7 3.1 3 7 3s7-1.3 7-3V5"></path><path d="M5 11v6c0 1.7 3.1 3 7 3s7-1.3 7-3v-6"></path></svg>',
		'share'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><path d="m8.6 10.5 6.8-4"></path><path d="m8.6 13.5 6.8 4"></path></svg>',
		'retain'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 7v5l3 2"></path></svg>',
		'delete'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7h16"></path><path d="M9 7V4h6v3"></path><path d="m7 7 1 13h8l1-13"></path><path d="M10 11v5"></path><path d="M14 11v5"></path></svg>',
		'hand'        => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 11V6.5a1.5 1.5 0 0 1 3 0V10"/><path d="M10 10V5a1.5 1.5 0 0 1 3 0v5"/><path d="M13 10V6a1.5 1.5 0 0 1 3 0v5"/><path d="M16 11V8a1.5 1.5 0 0 1 3 0v6c0 4-2.5 7-6.5 7H11c-2.5 0-4.2-1.2-5.5-3L3 14.5a1.6 1.6 0 0 1 2.5-2l1.5 1.3V11Z"/></svg>',
		'chart'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20V10"/><path d="M10 20V4"/><path d="M16 20v-7"/><path d="M22 20H2"/></svg>',
		'bell'        => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/><path d="M10 21h4"/></svg>',
		'verified'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3 4.5 6v5.5c0 4.4 3 7.5 7.5 9.5 4.5-2 7.5-5.1 7.5-9.5V6L12 3Z"/><path d="m8.5 11.8 2.3 2.3 4.7-4.7"/></svg>',
		'box'         => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m4 7 8-4 8 4-8 4-8-4Z"/><path d="M4 7v10l8 4 8-4V7"/><path d="M12 11v10"/></svg>',
		'clock'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 7v5l3 2"></path></svg>',
		'users'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="8" r="2.5"></circle><circle cx="16.5" cy="9" r="2"></circle><path d="M4.5 18v-1.5A4.5 4.5 0 0 1 9 12h.5a4.5 4.5 0 0 1 4.5 4.5V18"></path><path d="M15 13.5a4 4 0 0 1 4.5 4V18"></path></svg>',
		'video'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="5" width="16" height="12" rx="2"></rect><path d="m10 9 5 2.5-5 2.5V9Z"></path><path d="M9 20h6"></path></svg>',
		'check'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6.5 12.5 3.2 3.2 7.8-7.8"></path></svg>',
		'certificate' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 3 2 1 2.2-.2 1.1 1.9 2 1-.2 2.2 1 2-1.5 1.6.2 2.2-2 1-1.1 1.9-2.2-.2-2 1-2-1-2.2.2-1.1-1.9-2-1 .2-2.2-1.5-1.6 1-2-.2-2.2 2-1 1.1-1.9 2.2.2 2-1Z"></path><path d="m9 11.5 2 2 4-4"></path></svg>',
		'cube'        => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 3.5 7 4v9l-7 4-7-4v-9l7-4Z"></path><path d="m5 7.5 7 4 7-4"></path><path d="M12 11.5v9"></path></svg>',
		'scale'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 4v16"></path><path d="M7 6h10"></path><path d="m7 6-3 6h6L7 6Z"></path><path d="m17 6-3 6h6l-3-6Z"></path><path d="M8 20h8"></path></svg>',
	);

	$key = sanitize_key( (string) $key );
	return isset( $icons[ $key ] ) ? $icons[ $key ] : '';
}

/**
 * Echo a DPDPA AMP icon SVG.
 *
 * @param string $key Icon key.
 */
function succeedlearn_amp_dpdpa_render_icon( $key ) {
	$svg = succeedlearn_amp_dpdpa_icon_svg( $key );
	if ( '' === $svg ) {
		return;
	}
	echo wp_kses( $svg, succeedlearn_amp_dpdpa_allowed_svg() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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