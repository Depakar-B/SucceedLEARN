<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_ERP_Client {
	public function create_lead( array $lead_data ) {
		return $this->request_with_utm_fallback( 'POST', $this->get_api_url(), $lead_data, SL_ERP_Mapper::UTM_DIRECT );
	}

	/**
	 * Whether SCF admin email test mode is active.
	 *
	 * @return bool
	 */
	private function is_test_mode() {
		return function_exists( 'scf_is_admin_email_test_mode' ) && scf_is_admin_email_test_mode();
	}

	/**
	 * @return array<string, mixed>
	 */
	private function get_settings() {
		return SL_ERP_Plugin::get_settings();
	}

	/**
	 * Admin-only URL: UAT fields in test mode, production fields otherwise.
	 *
	 * @return string
	 */
	public function get_api_url() {
		$settings = $this->get_settings();

		if ( $this->is_test_mode() ) {
			if ( ! empty( $settings['uat_api_url'] ) ) {
				return (string) $settings['uat_api_url'];
			}
			return SL_ERP_Plugin::DEFAULT_UAT_API_URL;
		}

		if ( ! empty( $settings['api_url'] ) ) {
			return (string) $settings['api_url'];
		}
		return SL_ERP_Plugin::DEFAULT_PROD_API_URL;
	}

	/**
	 * Admin-only API key.
	 *
	 * @return string
	 */
	public function get_api_key() {
		$settings = $this->get_settings();

		if ( $this->is_test_mode() ) {
			return ! empty( $settings['uat_api_key'] ) ? (string) $settings['uat_api_key'] : '';
		}

		return ! empty( $settings['api_key'] ) ? (string) $settings['api_key'] : '';
	}

	/**
	 * Admin-only API secret.
	 *
	 * @return string
	 */
	public function get_api_secret() {
		$settings = $this->get_settings();

		if ( $this->is_test_mode() ) {
			return ! empty( $settings['uat_api_secret'] ) ? (string) $settings['uat_api_secret'] : '';
		}

		return ! empty( $settings['api_secret'] ) ? (string) $settings['api_secret'] : '';
	}

	private function get_authorization_header() {
		$api_key    = $this->get_api_key();
		$api_secret = $this->get_api_secret();
		if ( '' === $api_key ) {
			return '';
		}
		if ( '' !== $api_secret ) {
			return 'token ' . $api_key . ':' . $api_secret;
		}
		if ( false !== strpos( $api_key, ':' ) ) {
			return 'token ' . $api_key;
		}
		return 'Basic ' . $api_key;
	}

	private function should_disable_ssl_verify( $url ) {
		$host = wp_parse_url( $url, PHP_URL_HOST );
		if ( $host && false !== stripos( (string) $host, 'uaterp.' ) ) {
			return true;
		}
		$site_host = wp_parse_url( home_url(), PHP_URL_HOST );
		if ( in_array( $site_host, array( 'localhost', '127.0.0.1' ), true ) ) {
			return true;
		}
		return defined( 'WP_ENVIRONMENT_TYPE' ) && in_array( WP_ENVIRONMENT_TYPE, array( 'local', 'development' ), true );
	}

	private function request_with_utm_fallback( $method, $url, array $lead_data, $fallback = '' ) {
		$response = $this->request( $method, $url, $lead_data );
		if ( ! SL_ERP_Mapper::is_utm_link_error( $response ) ) {
			return $response;
		}
		if ( $fallback && ( ! isset( $lead_data['utm_source'] ) || $fallback !== $lead_data['utm_source'] ) ) {
			$lead_data['utm_source'] = $fallback;
			$response = $this->request( $method, $url, $lead_data );
			if ( ! SL_ERP_Mapper::is_utm_link_error( $response ) ) {
				return $response;
			}
		}
		unset( $lead_data['utm_source'] );
		return $this->request( $method, $url, $lead_data );
	}

	private function request( $method, $url, array $lead_data ) {
		$authorization = $this->get_authorization_header();
		if ( '' === $authorization ) {
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'SucceedLEARN ERP: API key is not configured in admin settings.' );
			}
			return wp_json_encode(
				array(
					'success' => false,
					'error'   => 'missing_api_credentials',
					'message' => 'SucceedLEARN ERP API key/authorization is not configured in Settings → SucceedLEARN ERP.',
				)
			);
		}
		$payload_json = wp_json_encode( array( 'data' => $lead_data ) );
		if ( function_exists( 'curl_init' ) ) {
			return $this->request_via_curl( $method, $url, $payload_json, $authorization );
		}
		$response = wp_remote_request(
			$url,
			array(
				'method'    => $method,
				'timeout'   => 12,
				'headers'   => array(
					'Content-Type'  => 'application/json',
					'Accept'        => 'application/json',
					'Authorization' => $authorization,
				),
				'body'      => $payload_json,
				'sslverify' => ! $this->should_disable_ssl_verify( $url ),
			)
		);
		if ( is_wp_error( $response ) ) {
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'SucceedLEARN ERP request failed: ' . $response->get_error_message() );
			}
			return wp_json_encode(
				array(
					'success' => false,
					'error'   => 'wp_remote_request_failed',
					'message' => $response->get_error_message(),
				)
			);
		}
		$status = (int) wp_remote_retrieve_response_code( $response );
		$body   = (string) wp_remote_retrieve_body( $response );
		if ( $status >= 400 || '' === $body ) {
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'SucceedLEARN ERP request failed: status=' . $status . ' body=' . $body );
			}
			return wp_json_encode(
				array(
					'success' => false,
					'status'  => $status,
					'error'   => 'erp_http_error',
					'body'    => $body,
				)
			);
		}
		return $body;
	}

	private function request_via_curl( $method, $url, $payload_json, $authorization ) {
		$handle = curl_init();
		curl_setopt_array(
			$handle,
			array(
				CURLOPT_URL            => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_TIMEOUT        => 12,
				CURLOPT_CUSTOMREQUEST  => $method,
				CURLOPT_POSTFIELDS     => $payload_json,
				CURLOPT_HTTPHEADER     => array(
					'Content-Type: application/json',
					'Accept: application/json',
					'Authorization: ' . $authorization,
				),
			)
		);
		if ( $this->should_disable_ssl_verify( $url ) ) {
			curl_setopt( $handle, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $handle, CURLOPT_SSL_VERIFYHOST, 0 );
		}
		$response = curl_exec( $handle );
		$errno    = curl_errno( $handle );
		$error    = curl_error( $handle );
		$status   = (int) curl_getinfo( $handle, CURLINFO_HTTP_CODE );
		curl_close( $handle );
		if ( $errno || $status >= 400 || '' === (string) $response ) {
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'SucceedLEARN ERP request failed: status=' . $status . ' errno=' . $errno . ' error=' . $error . ' response=' . (string) $response );
			}
			return wp_json_encode(
				array(
					'success' => false,
					'status'  => $status,
					'errno'   => $errno,
					'error'   => '' !== $error ? $error : 'erp_curl_error',
					'body'    => (string) $response,
				)
			);
		}
		return (string) $response;
	}
}
