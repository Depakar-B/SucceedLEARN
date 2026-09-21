<?php
/**
 * ERPNext API Integration Class
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ERPNext Class — API key from settings / wp-config only (no baked-in secret).
 */
class ERPNext {

	/**
	 * @param string $msg Message.
	 * @return string
	 */
	public static function format_lead_message_html( $msg ) {
		$text = trim( wp_strip_all_tags( (string) $msg ) );
		return '<div>' . $text . '</div>';
	}

	/**
	 * @param array  $lead_data Lead payload.
	 * @param string $msg Message.
	 * @return array
	 */
	private static function apply_lead_message( $lead_data, $msg ) {
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
	 * @param array  $lead_data Lead payload.
	 * @param string $utm_source UTM.
	 * @param string $page_url Page URL.
	 * @param string $form_default Default source.
	 * @return array
	 */
	private static function apply_tracking_fields( $lead_data, $utm_source = '', $page_url = '', $form_default = 'succeedlearn' ) {
		$page_url = esc_url_raw( (string) $page_url );
		$utm      = strtolower( trim( (string) $utm_source ) );
		if ( '' === $utm || in_array( $utm, array( 'direct', 'localhost', '127.0.0.1' ), true ) ) {
			$utm = $form_default;
		}
		if ( $utm ) {
			$lead_data['utm_source'] = $utm;
		}
		if ( '' !== $page_url ) {
			$lead_data['custom_page_url'] = $page_url;
		}
		return $lead_data;
	}

	/**
	 * @param array  $headers Headers.
	 * @param string $body Body.
	 * @param string $method Method.
	 * @return array
	 */
	private static function request_args( $headers, $body, $method = 'POST' ) {
		$host     = wp_parse_url( home_url(), PHP_URL_HOST );
		$is_local = in_array( $host, array( 'localhost', '127.0.0.1' ), true );
		return array(
			'method'    => $method,
			'headers'   => $headers,
			'body'      => $body,
			'timeout'   => 8,
			'sslverify' => ! $is_local,
		);
	}

	/**
	 * @return array|\WP_Error
	 */
	public static function send_lead( $name, $email, $phone, $msg, $org, $source = 'succeedlearn', $utm_source = '', $page_url = '' ) {
		$config  = new Config();
		$api_url = $config->get( 'erpnext_api_url', 'https://intranet.succeedtech.com/api/resource/Lead' );
		$api_key = $config->get( 'erpnext_api_key', '' );

		if ( '' === trim( (string) $api_key ) ) {
			return new \WP_Error( 'erpnext_missing_key', 'ERPNext API key is not configured.' );
		}

		$form_default = sanitize_text_field( (string) $source );
		if ( '' === $form_default ) {
			$form_default = 'succeedlearn';
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
		$lead_data = self::apply_tracking_fields( $lead_data, $utm_source, $page_url, $form_default );

		return self::perform_lead_request( 'POST', $api_url, $api_key, $lead_data );
	}

	/**
	 * @return array|\WP_Error
	 */
	public static function update_lead( $name, $email, $phone, $msg, $org, $erpid, $source = 'succeedlearn', $utm_source = '', $page_url = '' ) {
		$config  = new Config();
		$api_url = $config->get( 'erpnext_api_url', 'https://intranet.succeedtech.com/api/resource/Lead' );
		$api_key = $config->get( 'erpnext_api_key', '' );

		if ( '' === trim( (string) $api_key ) ) {
			return new \WP_Error( 'erpnext_missing_key', 'ERPNext API key is not configured.' );
		}

		$form_default = sanitize_text_field( (string) $source );
		if ( '' === $form_default ) {
			$form_default = 'succeedlearn';
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
		$lead_data = self::apply_tracking_fields( $lead_data, $utm_source, $page_url, $form_default );

		$update_url = trailingslashit( $api_url ) . rawurlencode( (string) $erpid );
		return self::perform_lead_request( 'PUT', $update_url, $api_key, $lead_data );
	}

	/**
	 * @return array|\WP_Error
	 */
	private static function perform_lead_request( $method, $url, $api_key, $lead_data ) {
		$headers = array(
			'Content-Type'  => 'application/json',
			'Accept'        => 'application/json',
			'Authorization' => 'Basic ' . $api_key,
		);

		$response = wp_remote_request(
			$url,
			self::request_args( $headers, wp_json_encode( array( 'data' => $lead_data ) ), $method )
		);

		if ( is_wp_error( $response ) ) {
			return $response;
		}

		$status_code = (int) wp_remote_retrieve_response_code( $response );
		$body        = wp_remote_retrieve_body( $response );
		$data        = json_decode( $body, true );

		if ( ! is_array( $data ) ) {
			return new \WP_Error( 'erpnext_invalid_response', 'Invalid response from lead service.', array( 'status_code' => $status_code, 'body' => $body ) );
		}

		if ( $status_code < 200 || $status_code >= 300 || ! empty( $data['exception'] ) || ! empty( $data['exc_type'] ) ) {
			$msg = ! empty( $data['message'] ) && is_string( $data['message'] ) ? $data['message'] : 'Lead service returned an error.';
			return new \WP_Error( 'erpnext_http_error', $msg, array( 'status_code' => $status_code, 'response' => $data ) );
		}

		return $data;
	}

	/**
	 * @param array|null $response Response.
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
		return '';
	}
}
