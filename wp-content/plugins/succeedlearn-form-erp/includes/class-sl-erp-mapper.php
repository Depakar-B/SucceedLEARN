<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
class SL_ERP_Mapper {
	const UTM_DIRECT = 'direct';
	const UTM_REQUEST_DEMO = 'SucceedLEARN RequestDemo';
	const UTM_INFOSEC = 'SucceedLEARN InfoSEC';
	const UTM_HOMEPAGE = 'SucceedLEARN Homepage';
	const UTM_BLOGS = 'SucceedLEARN Blogs';
	const UTM_CONTACT_US = 'SucceedLEARN ContactUs';
	private static $source_tag_map = array(
		'SucceedLEARN HomePage' => self::UTM_HOMEPAGE,
		'SucceedLEARN InfoSEC' => self::UTM_INFOSEC,
		'SucceedLEARN Blog' => self::UTM_BLOGS,
		'SucceedLEARN ContactUs' => self::UTM_CONTACT_US,
		'SucceedLEARN Others' => self::UTM_DIRECT,
	);
	private static function normalize_course_interest( $course_interest ) {
		if ( is_array( $course_interest ) ) {
			$items = array();
			foreach ( $course_interest as $interest ) {
				$value = sanitize_text_field( (string) $interest );
				if ( '' === $value ) {
					continue;
				}
				$items[] = $value;
			}
			$items = array_values( array_unique( $items ) );
			return implode( ', ', $items );
		}

		return sanitize_text_field( (string) $course_interest );
	}
	/**
	 * Resolve ERP utm_source from the page where the form was submitted.
	 *
	 * Page-based source_tag (Homepage / ContactUs / Blog / InfoSEC) takes
	 * priority over marketing channel UTMs (google, linkedin, etc.) so ERP
	 * always receives a valid UTM Source master value.
	 *
	 * @param array $submission Submission fields.
	 * @param array $context    Optional overrides (utm_override, form_variant).
	 * @return string
	 */
	public static function resolve_utm_source( array $submission, array $context = array() ) {
		if ( ! empty( $context['utm_override'] ) ) {
			return sanitize_text_field( (string) $context['utm_override'] );
		}
		$form_variant = '';
		if ( ! empty( $context['form_variant'] ) ) {
			$form_variant = sanitize_text_field( (string) $context['form_variant'] );
		} elseif ( ! empty( $submission['form_variant'] ) ) {
			$form_variant = sanitize_text_field( (string) $submission['form_variant'] );
		}
		if ( 'course' === $form_variant ) {
			return self::UTM_REQUEST_DEMO;
		}

		// Prefer page-based source (where the form was submitted).
		$source_tag = ! empty( $submission['source_tag'] ) ? sanitize_text_field( (string) $submission['source_tag'] ) : '';
		if ( isset( self::$source_tag_map[ $source_tag ] ) ) {
			return self::$source_tag_map[ $source_tag ];
		}

		// Fall back to marketing utm_source only when it is already a known ERP value.
		$utm      = ! empty( $submission['utm_source'] ) ? sanitize_text_field( (string) $submission['utm_source'] ) : '';
		$known    = array_values( self::$source_tag_map );
		$known[]  = self::UTM_REQUEST_DEMO;
		$known[]  = self::UTM_DIRECT;
		foreach ( $known as $allowed ) {
			if ( '' !== $utm && 0 === strcasecmp( $utm, $allowed ) ) {
				return $allowed;
			}
		}

		return self::UTM_DIRECT;
	}
	public static function build_lead_payload( array $submission, array $context = array() ) {
		$name = sanitize_text_field( (string) ( $submission['name'] ?? '' ) );
		$email = sanitize_email( (string) ( $submission['email'] ?? '' ) );
		$phone = '';
		if ( ! empty( $submission['phone'] ) ) {
			$phone = sanitize_text_field( (string) $submission['phone'] );
		} else {
			$cc = sanitize_text_field( (string) ( $submission['phone_country_code'] ?? '' ) );
			$pn = sanitize_text_field( (string) ( $submission['phone_number'] ?? '' ) );
			$phone = trim( $cc . ' ' . $pn );
		}
		$org = sanitize_text_field( (string) ( $submission['organization'] ?? $submission['org'] ?? '' ) );
		$normalized_interest = ! empty( $submission['course_interest'] )
			? self::normalize_course_interest( $submission['course_interest'] )
			: '';
		$message_parts = array();
		if ( '' !== $normalized_interest ) {
			$message_parts[] = 'Interested In: ' . $normalized_interest;
		}
		if ( ! empty( $submission['message'] ) ) {
			$message_parts[] = sanitize_textarea_field( (string) $submission['message'] );
		}
		$message = trim( implode( "\n\n", $message_parts ) );
		if ( '' === $message ) { $message = 'No message provided'; }
		$page_url = ! empty( $submission['page_url'] ) ? esc_url_raw( (string) $submission['page_url'] ) : '';
		$utm_source = self::resolve_utm_source( $submission, $context );
		$lead_data = array(
			'lead_name' => $name,
			'doctype' => 'Lead',
			'company_name' => $org,
			'lead_owner' => 'Administrator',
			'mobile_no' => $phone,
			'email_id' => $email,
			'status' => 'Lead',
			'company' => 'SUCCEED TECHNOLOGIES PRIVATE LIMITED',
			'utm_source' => $utm_source,
			'notes' => self::build_notes_rows( $message ),
		);
		$naming_series = '';
		if ( ! empty( $context['naming_series'] ) ) {
			$naming_series = sanitize_text_field( (string) $context['naming_series'] );
		} else {
			$naming_series = SL_ERP_Plugin::get_naming_series();
		}
		if ( '' !== $naming_series ) {
			$lead_data['naming_series'] = $naming_series;
		}
		if ( '' !== $page_url ) {
			$lead_data['custom_page_url'] = $page_url;
		}
		if ( '' !== $normalized_interest ) {
			$lead_data['custom_interested_in'] = $normalized_interest;
		}
		if ( ! empty( $submission['custom_lead_path'] ) ) {
			$lead_data['custom_lead_path'] = sanitize_text_field( (string) $submission['custom_lead_path'] );
		} elseif ( ! empty( $submission['cta_path'] ) ) {
			$lead_data['custom_lead_path'] = sanitize_text_field( (string) $submission['cta_path'] );
		}
		return apply_filters( 'succeedlearn_erp_lead_payload', $lead_data, $submission, $context );
	}
	public static function build_notes_rows( $message ) {
		$text = trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( (string) $message ) ) );
		if ( '' === $text ) { $text = 'No message provided'; }
		return array(
			array(
				'note' => '<div>' . esc_html( $text ) . '</div>',
				'added_by' => 'Administrator',
				'added_on' => function_exists( 'current_time' ) ? current_time( 'mysql' ) : gmdate( 'Y-m-d H:i:s' ),
			),
		);
	}
	public static function is_utm_link_error( $response_body ) {
		if ( ! is_string( $response_body ) || '' === $response_body ) { return false; }
		return false !== stripos( $response_body, 'LinkValidationError' ) && false !== stripos( $response_body, 'Source' );
	}
}
