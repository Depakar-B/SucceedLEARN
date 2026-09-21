<?php
/**
 * GDPR Employee Awareness Training - AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load a GDPR AMP section partial.
 *
 * @param string $name Partial name.
 * @return void
 */
function succeedlearn_amp_gdpr_partial( $name ) {
	$name = sanitize_file_name( (string) $name );
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/gdpr/' . $name . '.php';

	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * Return the canonical GDPR page URL.
 *
 * @return string
 */
function succeedlearn_amp_get_gdpr_canonical_url() {
	$fallback = home_url( '/gdpr-employee-awareness-training/' );

	foreach (
		array(
			'gdpr-employee-awareness-training',
			'gdpr-training-for-employees',
		)
		as $slug
	) {
		$page = get_page_by_path( $slug );

		if (
			$page instanceof WP_Post &&
			'publish' === $page->post_status
		) {
			$url = get_permalink( $page );

			if ( $url ) {
				return $url;
			}
		}
	}

	return $fallback;
}

/**
 * Return the GDPR page title.
 *
 * @return string
 */
function succeedlearn_amp_get_gdpr_page_title() {
	return __( 'GDPR Employee Awareness Training', 'succeedlearn-amp' );
}

/**
 * Return the GDPR page meta description.
 *
 * @return string
 */
function succeedlearn_amp_get_gdpr_meta_description() {
	return __(
		'Practical GDPR employee awareness training with workplace scenarios, integrated assessments, SCORM and LTI delivery, and completion records.',
		'succeedlearn-amp'
	);
}

/**
 * Return GDPR client logos.
 *
 * Add only raw image URLs or use succeedlearn_amp_upload_url().
 * Do not use Markdown links such as [url](url).
 *
 * @return array
 */
function succeedlearn_amp_get_gdpr_clients() {
	return array(
		array(
			'name' => 'TCS',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/TCS-e1786337779729.webp'
			),
		),
		array(
			'name' => 'Air India',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/AirIndia-e1786337713550.webp'
			),
		),
		array(
			'name' => 'DHL',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/DHL-1-e1786337623808.webp'
			),
		),
		array(
			'name' => 'Lupin',
			'url'  => '',
		),
		array(
			'name' => 'RazorPay',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/RazorPay-e1786337838191.webp'
			),
		),
		array(
			'name' => 'Chargebee',
			'url'  => '',
		),
		array(
			'name' => 'Lenovo',
			'url'  => succeedlearn_amp_upload_url(
				'2026/03/Lenova-1-e1786337921600.webp'
			),
		),
		array(
			'name' => 'The Economist',
			'url'  => '',
		),
	);
}

/**
 * Return GDPR trust standards.
 *
 * @return array
 */
function succeedlearn_amp_get_gdpr_standards() {
	return array(
		array(
			'title' => __( 'ISO 27001:2022', 'succeedlearn-amp' ),
			'text'  => __( 'Information security aligned', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'SOC 2', 'succeedlearn-amp' ),
			'text'  => __( 'Security and control focused', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'GDPR-aligned', 'succeedlearn-amp' ),
			'text'  => __( 'Privacy awareness focused', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return everyday GDPR risk examples.
 *
 * @return array
 */
function succeedlearn_amp_get_gdpr_risks() {
	return array(
		array(
			'number' => '01',
			'title'  => __( 'Everyday Risk', 'succeedlearn-amp' ),
			'text'   => __( 'A list exported and kept with no purpose.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '02',
			'title'  => __( 'Everyday Risk', 'succeedlearn-amp' ),
			'text'   => __( 'The wrong attachment on an outgoing email.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '03',
			'title'  => __( 'Everyday Risk', 'succeedlearn-amp' ),
			'text'   => __( 'A prospect emailed who never opted in.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '04',
			'title'  => __( 'Everyday Risk', 'succeedlearn-amp' ),
			'text'   => __( 'A laptop with client data left on a bus.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return the GDPR accountability reasons.
 *
 * @return array
 */
function succeedlearn_amp_get_gdpr_reasons() {
	return array(
		array(
			'icon'  => 'shield',
			'title' => __( 'If you own accountability', 'succeedlearn-amp' ),
			'text'  => __( 'Show, not just say, that staff are trained. Every learner gets a dated certificate and a completion record, ready to export the moment someone asks.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'risk',
			'title' => __( 'If you own the risk', 'succeedlearn-amp' ),
			'text'  => __( 'Controls stop technical failures. They cannot stop a well meaning person sending data to the wrong recipient. This course targets that exposure directly.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'people',
			'title' => __( 'If you own the rollout', 'succeedlearn-amp' ),
			'text'  => __( 'Thirty minutes, scenario led, written for every function. Certificates and dashboards make completion visible without adding to your workload.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return the GDPR course coverage image.
 *
 * Add the path relative to wp-content/uploads/.
 *
 * @return string
 */
function succeedlearn_amp_get_gdpr_coverage_image() {
	$image_path = '';

	if ( empty( $image_path ) ) {
		return '';
	}

	return succeedlearn_amp_upload_url( $image_path );
}

/**
 * Return the GDPR course modules.
 *
 * @return array
 */
function succeedlearn_amp_get_gdpr_course_modules() {
	return array(
		array(
			'number'   => '01',
			'title'    => __( 'GDPR overview and why it matters', 'succeedlearn-amp' ),
			'text'     => __( 'What changed, who it applies to, and the penalties for getting it wrong.', 'succeedlearn-amp' ),
			'featured' => false,
		),
		array(
			'number'   => '02',
			'title'    => __( 'The core definitions', 'succeedlearn-amp' ),
			'text'     => __( 'Data subject, controller, processor and processing, with a payroll example.', 'succeedlearn-amp' ),
			'featured' => false,
		),
		array(
			'number'   => '03',
			'title'    => __( 'Personal data vs special categories', 'succeedlearn-amp' ),
			'text'     => __( 'What counts as personal data, and what needs extra care.', 'succeedlearn-amp' ),
			'featured' => false,
		),
		array(
			'number'   => '04',
			'title'    => __( 'The seven data protection principles', 'succeedlearn-amp' ),
			'text'     => __( 'Lawfulness, purpose limitation, minimisation, accuracy, storage limits, security, accountability.', 'succeedlearn-amp' ),
			'featured' => false,
		),
		array(
			'number'   => '05',
			'title'    => __( 'The lawful bases for processing', 'succeedlearn-amp' ),
			'text'     => __( 'Consent, contract, legal obligation, vital interests, public task, legitimate interests.', 'succeedlearn-amp' ),
			'featured' => false,
		),
		array(
			'number'   => '06',
			'label'    => __( 'Signature Module', 'succeedlearn-amp' ),
			'title'    => __( 'Sales and marketing outreach', 'succeedlearn-amp' ),
			'text'     => __( 'What revenue teams may legally send, by country.', 'succeedlearn-amp' ),
			'badge'    => __( 'Rare in awareness training', 'succeedlearn-amp' ),
			'featured' => true,
		),
		array(
			'number'   => '07',
			'title'    => __( 'Data subject rights', 'succeedlearn-amp' ),
			'text'     => __( 'All eight rights, and how to recognise and route a request.', 'succeedlearn-amp' ),
			'featured' => false,
		),
		array(
			'number'   => '08',
			'title'    => __( 'Privacy by design and impact assessments', 'succeedlearn-amp' ),
			'text'     => __( 'Building protection in from the start.', 'succeedlearn-amp' ),
			'featured' => false,
		),
		array(
			'number'   => '09',
			'title'    => __( 'Breach recognition and response', 'succeedlearn-amp' ),
			'text'     => __( 'Ten worked examples and what to do next.', 'succeedlearn-amp' ),
			'featured' => false,
		),
	);
}

/**
 * Return the GDPR sales and marketing learning points.
 *
 * @return array
 */
function succeedlearn_amp_get_gdpr_sales_marketing_points() {
	return array(
		array(
			'label' => __( 'Consent vs legitimate interests', 'succeedlearn-amp' ),
			'text'  => __( 'in sales and marketing.', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Opt-out vs opt-in countries', 'succeedlearn-amp' ),
			'text'  => __( 'where cold email needs an objection route versus documented consent first.', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Existing customer exemptions', 'succeedlearn-amp' ),
			'text'  => __( 'in some opt-in countries.', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Opt-out as withdrawal', 'succeedlearn-amp' ),
			'text'  => __( 'plus the documented phone-then-email consent route.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return the GDPR country outreach examples.
 *
 * @return array
 */
function succeedlearn_amp_get_gdpr_country_rules() {
	return array(
		array(
			'country' => __( 'United Kingdom', 'succeedlearn-amp' ),
			'tag'     => __( 'Cold email permitted', 'succeedlearn-amp' ),
			'text'    => __( 'Allowed if the recipient can object to further contact.', 'succeedlearn-amp' ),
			'type'    => 'opt-out',
		),
		array(
			'country' => __( 'Ireland', 'succeedlearn-amp' ),
			'tag'     => __( 'Cold email permitted', 'succeedlearn-amp' ),
			'text'    => __( 'Same model, objection route required.', 'succeedlearn-amp' ),
			'type'    => 'opt-out',
		),
		array(
			'country' => __( 'Germany', 'succeedlearn-amp' ),
			'tag'     => __( 'Documented consent first', 'succeedlearn-amp' ),
			'text'    => __( 'No email without previously documented consent.', 'succeedlearn-amp' ),
			'type'    => 'opt-in',
		),
		array(
			'country' => __( 'Netherlands', 'succeedlearn-amp' ),
			'tag'     => __( 'Documented consent first', 'succeedlearn-amp' ),
			'text'    => __( 'Some existing customer or contract negotiation exemptions apply.', 'succeedlearn-amp' ),
			'type'    => 'opt-in',
		),
		array(
			'country' => __( 'France', 'succeedlearn-amp' ),
			'tag'     => __( 'Conditional outreach', 'succeedlearn-amp' ),
			'text'    => __( 'Rules depend on the nature of the contact and the relationship with the recipient.', 'succeedlearn-amp' ),
			'type'    => 'opt-out',
		),
	);
}

/**
 * Return GDPR completion evidence items.
 *
 * @return array
 */
function succeedlearn_amp_get_gdpr_completion_proof_items() {
	return array(
		array(
			'label' => __( 'Per learner certificates', 'succeedlearn-amp' ),
			'text'  => __( 'Dated and automatic.', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'Coverage dashboard', 'succeedlearn-amp' ),
			'text'  => __( 'By team and function.', 'succeedlearn-amp' ),
		),
		array(
			'label' => __( 'One-page review pack', 'succeedlearn-amp' ),
			'text'  => __( 'For DPA and security reviews.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return GDPR course format statistics.
 *
 * @return array
 */
function succeedlearn_amp_get_gdpr_format_stats() {
	return array(
		array(
			'title' => __( '30 min', 'succeedlearn-amp' ),
			'text'  => __( 'Self paced, same runtime as our DPDPA course.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'In-course', 'succeedlearn-amp' ),
			'text'  => __( 'Assessments and questions throughout, not just at the end.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Certificate', 'succeedlearn-amp' ),
			'text'  => __( 'Issued automatically on completion.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'All staff', 'succeedlearn-amp' ),
			'text'  => __( 'Foundational awareness, every function.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return GDPR course delivery formats.
 *
 * @return array
 */
function succeedlearn_amp_get_gdpr_delivery_formats() {
	return array(
		__( 'SCORM', 'succeedlearn-amp' ),
		__( 'LTI', 'succeedlearn-amp' ),
		__( 'Hosted SaaS LMS', 'succeedlearn-amp' ),
		__( 'Branded portals', 'succeedlearn-amp' ),
		__( 'SSO / HRIS', 'succeedlearn-amp' ),
		__( 'Completion dashboards', 'succeedlearn-amp' ),
		__( 'Android app', 'succeedlearn-amp' ),
	);
}