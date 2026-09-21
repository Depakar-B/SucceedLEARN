<?php
/**
 * Form variant definitions (default CSA vs infosec Campaign Registration).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SSF_Variants {

	const DEFAULT = 'default';
	const INFOSEC = 'infosec';

	/**
	 * @param string $variant Raw variant id.
	 * @return string
	 */
	public static function normalize( $variant ) {
		$variant = sanitize_key( (string) $variant );
		return self::INFOSEC === $variant ? self::INFOSEC : self::DEFAULT;
	}

	/**
	 * @param string $variant Variant id.
	 * @return bool
	 */
	public static function is_infosec( $variant ) {
		return self::INFOSEC === self::normalize( $variant );
	}

	/**
	 * @param string $variant Variant id.
	 * @return array
	 */
	public static function get( $variant = self::DEFAULT ) {
		$variant  = self::normalize( $variant );
		$configs  = self::all();
		$config   = isset( $configs[ $variant ] ) ? $configs[ $variant ] : $configs[ self::DEFAULT ];
		return (array) apply_filters( 'ssf_variant_config', $config, $variant );
	}

	/**
	 * @return array<string,array>
	 */
	public static function all() {
		$privacy_url = get_privacy_policy_url();
		$privacy_url = $privacy_url ? $privacy_url : '#';

		return array(
			self::DEFAULT => array(
				'id'               => self::DEFAULT,
				'title'            => __( 'Get the special offer', 'seo-form' ),
				'subtitle'         => __( 'Fill in your details and we will reach out shortly.', 'seo-form' ),
				'submit_label'     => __( 'Book a Demo', 'seo-form' ),
				'success_message'  => __( 'Thank you! We will get back to you soon.', 'seo-form' ),
				'source_tag'       => 'cybersecurity',
				'show_message'     => true,
				'show_job_title'   => false,
				'require_authorisation' => false,
				'name_label'       => __( 'Name', 'seo-form' ),
				'email_label'      => __( 'Email', 'seo-form' ),
				'employees_label'  => __( 'No. of Users', 'seo-form' ),
				'admin_recipients_live' => array(
					'connect@succeedtech.com',
				),
				'admin_subject'    => __( 'New Cybersecurity Form Submission from %s', 'seo-form' ),
				'admin_heading'    => __( 'New Cybersecurity Form Submission', 'seo-form' ),
				'user_subject'     => __( 'We received your message', 'seo-form' ),
				'user_body_lines'  => array(
					__( 'Thanks for reaching out to SucceedLEARN. Our team will contact you soon.', 'seo-form' ),
				),
			),
			self::INFOSEC => array(
				'id'               => self::INFOSEC,
				'title'            => __( 'Campaign Registration', 'seo-form' ),
				'subtitle'         => '',
				'submit_label'     => __( 'Submit', 'seo-form' ),
				'success_message'  => __( 'Thank you! We will get back to you soon.', 'seo-form' ),
				'source_tag'       => 'infosec',
				'show_message'     => false,
				'show_job_title'   => true,
				'require_authorisation' => true,
				'name_label'       => __( 'Full Name', 'seo-form' ),
				'email_label'      => __( 'Work Email', 'seo-form' ),
				'job_title_label'  => __( 'Job Title', 'seo-form' ),
				'employees_label'  => __( 'Number of Employees', 'seo-form' ),
				'authorisation_label' => __(
					'I confirm that I am authorized to inquire about and coordinate a phishing simulation on behalf of my organization.',
					'seo-form'
				),
				'terms_privacy_label_html' => sprintf(
					/* translators: 1: terms URL, 2: privacy URL */
					__(
						'I agree to the <a href="%1$s">Campaign Terms &amp; Conditions</a> and <a href="%2$s" target="_blank" rel="noopener">Privacy Policy</a>.',
						'seo-form'
					),
					esc_url( '#terms-and-conditions' ),
					esc_url( $privacy_url )
				),
				'admin_recipients_live' => array( 'vridhi.shah@succeedtech.com' ),
				'admin_subject'    => __( 'New Campaign Registration from %s', 'seo-form' ),
				'admin_heading'    => __( 'New Campaign Registration', 'seo-form' ),
				'user_subject'     => __( 'We received your Campaign Registration', 'seo-form' ),
				'user_body_lines'  => array(
					__( 'Thanks for registering your interest in the Cybersecurity Awareness Month Phishing Simulation.', 'seo-form' ),
					__( 'Our team will contact you within 1 business day to confirm your campaign requirements, participating user count, and next steps.', 'seo-form' ),
				),
			),
		);
	}
}
