<?php
/**
 * Ready-made form templates.
 *
 * @package FormMailbox
 */

defined( 'ABSPATH' ) || exit;

/** Template catalog. */
final class FormMailbox_Templates {
	/** @return array<string,array> */
	public static function all() {
		return array(
			'contact'  => array(
				'name'        => __( 'Contact Form', 'formmailbox' ),
				'description' => __( 'A simple form for general website enquiries.', 'formmailbox' ),
				'fields'      => self::fields( array( 'name', 'email', 'phone', 'subject', 'message', 'consent' ) ),
			),
			'quote'    => array(
				'name'        => __( 'Request a Quote', 'formmailbox' ),
				'description' => __( 'Collect contact details and project requirements.', 'formmailbox' ),
				'fields'      => self::fields( array( 'name', 'email', 'phone', 'company', 'service', 'budget', 'message', 'consent' ) ),
			),
			'course'   => array(
				'name'        => __( 'Course Enquiry', 'formmailbox' ),
				'description' => __( 'Collect training requirements and learner numbers.', 'formmailbox' ),
				'fields'      => self::fields( array( 'name', 'email', 'phone', 'company', 'course', 'learners', 'delivery', 'start_date', 'message', 'consent' ) ),
			),
			'feedback' => array(
				'name'        => __( 'Feedback Form', 'formmailbox' ),
				'description' => __( 'Gather a simple rating and written feedback.', 'formmailbox' ),
				'fields'      => self::fields( array( 'name_optional', 'email_optional', 'rating', 'feedback' ) ),
			),
			'blank'    => array(
				'name'        => __( 'Blank Form', 'formmailbox' ),
				'description' => __( 'Start with no predefined fields.', 'formmailbox' ),
				'fields'      => array(),
			),
		);
	}

	/** @return array */
	public static function default_settings() {
		return array(
			'admin_email'        => get_option( 'admin_email' ),
			'admin_subject'      => __( 'New submission from {form_name}', 'formmailbox' ),
			'confirmation'       => false,
			'confirmation_subject'=> __( 'We received your submission', 'formmailbox' ),
			'confirmation_message'=> __( 'Thank you. We received your submission and will respond shortly.', 'formmailbox' ),
			'success_message'    => __( 'Thank you. Your submission has been received.', 'formmailbox' ),
			'honeypot'           => true,
			'timing'             => true,
			'captcha_provider'   => 'none',
			'recaptcha_site_key' => '',
			'recaptcha_secret_key' => '',
		);
	}

	/** @param array<string> $keys Field keys. @return array */
	private static function fields( array $keys ) {
		$catalog = array(
			'name'           => self::field( 'name', 'text', __( 'Name', 'formmailbox' ), true ),
			'name_optional'  => self::field( 'name', 'text', __( 'Name', 'formmailbox' ), false ),
			'email'          => self::field( 'email', 'email', __( 'Email', 'formmailbox' ), true ),
			'email_optional' => self::field( 'email', 'email', __( 'Email', 'formmailbox' ), false ),
			'phone'          => self::field( 'phone', 'tel', __( 'Telephone', 'formmailbox' ), false ),
			'company'        => self::field( 'company', 'text', __( 'Company', 'formmailbox' ), false ),
			'subject'        => self::field( 'subject', 'text', __( 'Subject', 'formmailbox' ), false ),
			'service'        => self::choice( 'service', 'select', __( 'Service required', 'formmailbox' ), array( __( 'General enquiry', 'formmailbox' ), __( 'Consultation', 'formmailbox' ), __( 'Other', 'formmailbox' ) ), true ),
			'budget'         => self::field( 'budget', 'number', __( 'Estimated budget', 'formmailbox' ), false ),
			'course'         => self::field( 'course', 'text', __( 'Course required', 'formmailbox' ), true ),
			'learners'       => self::field( 'learners', 'number', __( 'Number of learners', 'formmailbox' ), false ),
			'delivery'       => self::choice( 'delivery', 'select', __( 'Delivery preference', 'formmailbox' ), array( __( 'Online', 'formmailbox' ), __( 'In person', 'formmailbox' ), __( 'Not sure', 'formmailbox' ) ), false ),
			'start_date'     => self::field( 'start_date', 'date', __( 'Preferred start date', 'formmailbox' ), false ),
			'message'        => self::field( 'message', 'textarea', __( 'Message', 'formmailbox' ), true ),
			'feedback'       => self::field( 'feedback', 'textarea', __( 'Feedback', 'formmailbox' ), true ),
			'rating'         => self::choice( 'rating', 'radio', __( 'How would you rate your experience?', 'formmailbox' ), array( __( 'Excellent', 'formmailbox' ), __( 'Good', 'formmailbox' ), __( 'Average', 'formmailbox' ), __( 'Poor', 'formmailbox' ) ), true ),
			'consent'        => self::choice( 'consent', 'checkbox', __( 'Privacy consent', 'formmailbox' ), array( __( 'I agree that this website may store my submitted information.', 'formmailbox' ) ), true ),
		);

		$fields = array();
		foreach ( $keys as $key ) {
			if ( isset( $catalog[ $key ] ) ) {
				$fields[] = $catalog[ $key ];
			}
		}
		return $fields;
	}

	/** @return array */
	private static function field( $key, $type, $label, $required ) {
		return array( 'key' => $key, 'type' => $type, 'label' => $label, 'required' => (bool) $required, 'placeholder' => '', 'options' => array() );
	}

	/** @return array */
	private static function choice( $key, $type, $label, array $options, $required ) {
		$field            = self::field( $key, $type, $label, $required );
		$field['options'] = $options;
		return $field;
	}
}
