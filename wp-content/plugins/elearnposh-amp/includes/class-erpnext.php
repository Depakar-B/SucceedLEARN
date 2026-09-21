<?php
/**
 * ERPNext API Integration Class
 *
 * Handles sending and updating leads in ERPNext
 *
 * @package ElearnPOSH\AMP
 */

namespace ElearnPOSH\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ERPNext Class
 */
class ERPNext {

	/** ERP API key that authenticates against intranet.succeedtech.com (legacy contact plugin). */
	const DEFAULT_API_KEY = 'OWM2ZDc2MmI2ZWQ1MWM3OmYwMzEyNDViMDU3NjNjOA==';

	/** Previous default key — fails with ERP encryption-key error. */
	const DEPRECATED_API_KEYS = array(
		'NzAxNTJjNjk4MjQ5NzIxOjcxYzRkZGFmYTI1NzM1NA==',
	);

	/**
	 * Format contact message for ERPNext (legacy-compatible HTML wrapper).
	 *
	 * @param string $msg Message body.
	 * @return string
	 */
	public static function format_lead_message_html( $msg ) {
		$text = trim( wp_strip_all_tags( (string) $msg ) );
		return '<div>' . $text . '</div>';
	}

	/**
	 * Attach message content to a lead payload.
	 *
	 * New leads use the `message` field; updates use `notes` (plain HTML string).
	 *
	 * @param array<string, mixed> $lead_data Lead payload.
	 * @param string               $msg       Message body.
	 * @param string               $field     ERP field name (`message` or `notes`).
	 * @return array<string, mixed>
	 */
	private static function apply_lead_message( $lead_data, $msg, $field = 'notes' ) {
		if ( function_exists( 'elearnposh_erp_notes_rows' ) ) {
			$notes = elearnposh_erp_notes_rows( $msg );
			if ( ! empty( $notes ) ) {
				$lead_data['notes'] = $notes;
			}
			return $lead_data;
		}

		$text = trim( wp_strip_all_tags( (string) $msg ) );
		if ( '' === $text ) {
			$text = 'No message provided';
		}

		$lead_data['notes'] = array(
			array(
				'note'     => self::format_lead_message_html( $text ),
				'added_by' => 'Administrator',
				'added_on' => current_time( 'mysql' ),
			),
		);
		return $lead_data;
	}

	/**
	 * Attach optional tracking fields used by desktop ERP plugins.
	 *
	 * @param array<string, mixed> $lead_data  Lead payload.
	 * @param string               $utm_source Traffic source.
	 * @param string               $page_url   Submitted page URL.
	 * @param string               $form_default Valid UTM Source fallback for this form.
	 * @return array<string, mixed>
	 */
	private static function apply_tracking_fields( $lead_data, $utm_source = '', $page_url = '', $form_default = 'epblogs', $ep_vid = '', $email = '' ) {
		$page_url = esc_url_raw( (string) $page_url );

		$utm = function_exists( 'elearnposh_erp_resolve_utm_source' )
			? elearnposh_erp_resolve_utm_source( $utm_source, $form_default )
			: array(
				'primary'  => $form_default,
				'fallback' => '',
			);

		if ( ! empty( $utm['primary'] ) ) {
			$lead_data['utm_source'] = $utm['primary'];
		}
		$lead_data['_utm_fallback'] = isset( $utm['fallback'] ) ? $utm['fallback'] : '';

		if ( '' !== $page_url ) {
			$lead_data['custom_page_url'] = $page_url;
		}

		return $lead_data;
	}

	/**
	 * Whether utm_source is safe to send to ERPNext.
	 *
	 * @param string $utm_source Traffic source value.
	 * @return bool
	 */
	private static function should_send_utm_source( $utm_source ) {
		$utm = strtolower( trim( (string) $utm_source ) );
		if ( '' === $utm ) {
			return false;
		}

		$blocked = array( 'direct', 'localhost', '127.0.0.1' );
		return ! in_array( $utm, $blocked, true );
	}

	/**
	 * Shared HTTP args for ERPNext requests.
	 *
	 * @param array<string, string> $headers Request headers.
	 * @param string                $body    JSON body.
	 * @param string                $method  HTTP method.
	 * @return array<string, mixed>
	 */
	private static function request_args( $headers, $body, $method = 'POST' ) {
		$host     = wp_parse_url( home_url(), PHP_URL_HOST );
		$is_local = in_array( $host, array( 'localhost', '127.0.0.1' ), true );

		return array(
			'method'    => $method,
			'headers'   => $headers,
			'body'      => $body,
			// Keep short so form UX stays responsive if ERP is slow/unreachable.
			'timeout'   => 8,
			'sslverify' => ! $is_local,
		);
	}

	/**
	 * Send lead to ERPNext
	 *
	 * @param string $name Name.
	 * @param string $email Email.
	 * @param string $phone Phone.
	 * @param string $msg Message.
	 * @param string $org Organization.
	 * @param string $source Source identifier (default: 'epblogs').
	 * @param string $utm_source Optional UTM / traffic source.
	 * @param string $page_url   Optional submitted page URL.
	 * @return array|WP_Error Response data or WP_Error on failure.
	 */
	public static function send_lead( $name, $email, $phone, $msg, $org, $source = 'epblogs', $utm_source = '', $page_url = '' ) {
		$config = new Config();

		$api_url = $config->get( 'erpnext_api_url', 'https://intranet.succeedtech.com/api/resource/Lead' );
		$api_key = $config->get( 'erpnext_api_key', self::DEFAULT_API_KEY );

		$form_default = sanitize_text_field( (string) $source );
		if ( '' === $form_default ) {
			$form_default = 'epblogs';
		}

		$lead_data = self::apply_lead_message(
			array(
				'lead_name'     => sanitize_text_field( $name ),
				'doctype'       => 'Lead',
				'company_name'  => sanitize_text_field( $org ),
				'lead_owner'    => 'Administrator',
				'mobile_no'     => sanitize_text_field( $phone ),
				'email_id'      => sanitize_email( $email ),
				'status'        => 'Lead',
				'naming_series' => 'ST-EPLEAD-.YYYY.-',
				'company'       => 'SUCCEED TECHNOLOGIES PRIVATE LIMITED',
			),
			$msg
		);
		$lead_data = self::apply_tracking_fields( $lead_data, $utm_source, $page_url, $form_default, '', sanitize_email( $email ) );
		$fallback  = isset( $lead_data['_utm_fallback'] ) ? $lead_data['_utm_fallback'] : '';
		unset( $lead_data['_utm_fallback'] );

		return self::dispatch_lead_request( 'POST', $api_url, $api_key, $lead_data, $fallback );
	}

	/**
	 * Update lead in ERPNext
	 *
	 * @param string $name Name.
	 * @param string $email Email.
	 * @param string $phone Phone.
	 * @param string $msg Message.
	 * @param string $org Organization.
	 * @param string $erpid ERPNext Lead ID.
	 * @param string $source Source identifier (default: 'epblogs').
	 * @param string $utm_source Optional UTM / traffic source.
	 * @param string $page_url   Optional submitted page URL.
	 * @return array|WP_Error Response data or WP_Error on failure.
	 */
	public static function update_lead( $name, $email, $phone, $msg, $org, $erpid, $source = 'epblogs', $utm_source = '', $page_url = '' ) {
		$config = new Config();

		$api_url = $config->get( 'erpnext_api_url', 'https://intranet.succeedtech.com/api/resource/Lead' );
		$api_key = $config->get( 'erpnext_api_key', self::DEFAULT_API_KEY );

		$form_default = sanitize_text_field( (string) $source );
		if ( '' === $form_default ) {
			$form_default = 'epblogs';
		}

		$lead_data = self::apply_lead_message(
			array(
				'lead_name'    => sanitize_text_field( $name ),
				'company_name' => sanitize_text_field( $org ),
				'email_id'     => sanitize_email( $email ),
				'lead_owner'   => 'Administrator',
				'status'       => 'Lead',
				'mobile_no'    => sanitize_text_field( $phone ),
				'doctype'      => 'Lead',
			),
			$msg
		);
		$lead_data = self::apply_tracking_fields( $lead_data, $utm_source, $page_url, $form_default, '', sanitize_email( $email ) );
		$fallback  = isset( $lead_data['_utm_fallback'] ) ? $lead_data['_utm_fallback'] : '';
		unset( $lead_data['_utm_fallback'] );

		$update_url = trailingslashit( $api_url ) . rawurlencode( (string) $erpid );
		return self::dispatch_lead_request( 'PUT', $update_url, $api_key, $lead_data, $fallback );
	}

	/**
	 * Send lead payload; retry with fallback utm_source when Link validation fails.
	 *
	 * @param string               $method    HTTP method.
	 * @param string               $url       API URL.
	 * @param string               $api_key   Basic auth key.
	 * @param array<string, mixed> $lead_data Lead payload.
	 * @param string               $fallback  Alternate utm_source.
	 * @return array|\WP_Error
	 */
	private static function dispatch_lead_request( $method, $url, $api_key, $lead_data, $fallback = '' ) {
		$result = self::perform_lead_request( $method, $url, $api_key, $lead_data );
		if ( ! is_wp_error( $result ) ) {
			return $result;
		}

		$err_msg = $result->get_error_message();
		if ( false !== stripos( $err_msg, 'custom_user_journey' ) || false !== stripos( $err_msg, 'custom_ep_vid' ) ) {
			unset( $lead_data['custom_user_journey'], $lead_data['custom_ep_vid'] );
			$result = self::perform_lead_request( $method, $url, $api_key, $lead_data );
			if ( ! is_wp_error( $result ) ) {
				return $result;
			}
			$err_msg = $result->get_error_message();
		}

		$is_utm_error = false !== stripos( $err_msg, 'Source' )
			|| ( function_exists( 'elearnposh_erp_is_utm_link_error' ) && elearnposh_erp_is_utm_link_error( wp_json_encode( $result->get_error_data() ) ) );

		if ( ! $is_utm_error ) {
			return $result;
		}

		if ( $fallback && ( ! isset( $lead_data['utm_source'] ) || $fallback !== $lead_data['utm_source'] ) ) {
			$lead_data['utm_source'] = $fallback;
			$result                  = self::perform_lead_request( $method, $url, $api_key, $lead_data );
			if ( ! is_wp_error( $result ) ) {
				return $result;
			}
		}

		unset( $lead_data['utm_source'] );
		return self::perform_lead_request( $method, $url, $api_key, $lead_data );
	}

	/**
	 * Execute one ERP lead HTTP request and normalize the response.
	 *
	 * @param string               $method    HTTP method.
	 * @param string               $url       API URL.
	 * @param string               $api_key   Basic auth key.
	 * @param array<string, mixed> $lead_data Lead payload.
	 * @return array|\WP_Error
	 */
	private static function perform_lead_request( $method, $url, $api_key, $lead_data ) {
		$headers = array(
			'Content-Type'  => 'application/json',
			'Accept'        => 'application/json',
			'Authorization' => 'Basic ' . $api_key,
		);

		$request_body = wp_json_encode( array( 'data' => $lead_data ) );
		$response     = wp_remote_request(
			$url,
			self::request_args( $headers, $request_body, $method )
		);

		if ( is_wp_error( $response ) ) {
			return $response;
		}

		$status_code = (int) wp_remote_retrieve_response_code( $response );
		$body        = wp_remote_retrieve_body( $response );
		$data        = json_decode( $body, true );

		if ( ! is_array( $data ) ) {
			return new \WP_Error(
				'erpnext_invalid_response',
				'Invalid response from lead service.',
				array(
					'status_code' => $status_code,
					'body'        => $body,
				)
			);
		}

		if ( $status_code < 200 || $status_code >= 300 ) {
			return new \WP_Error(
				'erpnext_http_error',
				self::get_response_error_message( $data ) ?: 'Lead service returned an error.',
				array(
					'status_code' => $status_code,
					'response'    => $data,
				)
			);
		}

		if ( self::response_has_exception( $data ) ) {
			return new \WP_Error(
				'erpnext_api_error',
				self::get_response_error_message( $data ) ?: 'Lead service rejected the request.',
				$data
			);
		}

		return $data;
	}

	/**
	 * Whether the ERP payload contains an exception/error.
	 *
	 * @param array<string, mixed> $response Decoded ERP response.
	 * @return bool
	 */
	public static function response_has_exception( $response ) {
		return is_array( $response ) && ( ! empty( $response['exception'] ) || ! empty( $response['exc_type'] ) );
	}

	/**
	 * Extract a readable ERP error message.
	 *
	 * @param array<string, mixed>|string|null $response Decoded ERP response.
	 * @return string
	 */
	public static function get_response_error_message( $response ) {
		if ( ! is_array( $response ) ) {
			return '';
		}

		if ( ! empty( $response['message'] ) && is_string( $response['message'] ) ) {
			return $response['message'];
		}

		if ( ! empty( $response['_server_messages'] ) ) {
			$messages = json_decode( $response['_server_messages'], true );
			if ( is_array( $messages ) ) {
				foreach ( $messages as $message ) {
					$decoded = json_decode( $message, true );
					if ( is_array( $decoded ) && ! empty( $decoded['message'] ) ) {
						return wp_strip_all_tags( (string) $decoded['message'] );
					}
				}
			}
		}

		if ( ! empty( $response['exception'] ) && is_string( $response['exception'] ) ) {
			return $response['exception'];
		}

		return '';
	}

	/**
	 * Extract the ERP lead document ID from an API response.
	 *
	 * @param array<string, mixed>|null $response Decoded ERP response.
	 * @return string
	 */
	public static function extract_lead_id( $response ) {
		if ( ! is_array( $response ) || empty( $response ) ) {
			return '';
		}

		$candidates = array(
			$response['data']['name'] ?? '',
			$response['name'] ?? '',
			$response['message']['name'] ?? '',
		);

		foreach ( $candidates as $candidate ) {
			if ( is_string( $candidate ) && '' !== trim( $candidate ) ) {
				return trim( $candidate );
			}
		}

		if ( isset( $response['data'] ) && is_array( $response['data'] ) && ! empty( $response['data']['name'] ) ) {
			return trim( (string) $response['data']['name'] );
		}

		foreach ( $response as $item ) {
			if ( ! is_array( $item ) ) {
				continue;
			}
			if ( ! empty( $item['name'] ) && is_string( $item['name'] ) ) {
				return trim( $item['name'] );
			}
			if ( ! empty( $item['data']['name'] ) && is_string( $item['data']['name'] ) ) {
				return trim( (string) $item['data']['name'] );
			}
		}

		return '';
	}
}
