<?php
/**
 * Bot protection: tokens, honeypots, rate limiting, IP detection.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_ECTA_Security {

	public function generate_form_token() {
		$token     = wp_generate_password( 32, false );
		$token_key = 'sl_ecta_token_' . md5( $token );
		set_transient( $token_key, time(), 10800 );
		return $token;
	}

	public function verify_form_token( $token, $delete = false ) {
		if ( empty( $token ) ) {
			return false;
		}
		$token_key = 'sl_ecta_token_' . md5( $token );
		$stored    = get_transient( $token_key );
		if ( false === $stored ) {
			return false;
		}
		if ( $delete ) {
			delete_transient( $token_key );
		}
		return true;
	}

	/**
	 * @param string $form_token Form token.
	 * @return array Honeypot field names keyed by type.
	 */
	public function create_honeypots( $form_token ) {
		$names = array(
			'website' => 'website_' . wp_generate_password( 6, false ),
			'company' => 'company_' . wp_generate_password( 6, false ),
		);
		set_transient( 'sl_ecta_honeypots_' . md5( $form_token ), $names, 3600 );
		return $names;
	}

	public function delete_honeypots( $form_token ) {
		delete_transient( 'sl_ecta_honeypots_' . md5( $form_token ) );
	}

	/**
	 * @return bool True if bot detected.
	 */
	public function detect_bot() {
		$form_token = sanitize_text_field( wp_unslash( $_POST['sl_ecta_form_token'] ?? '' ) );
		if ( ! $this->verify_form_token( $form_token, false ) ) {
			return true;
		}

		$honeypot_key   = 'sl_ecta_honeypots_' . md5( $form_token );
		$honeypot_names = get_transient( $honeypot_key );
		if ( $honeypot_names && is_array( $honeypot_names ) ) {
			foreach ( $honeypot_names as $field_name ) {
				if ( ! empty( sanitize_text_field( wp_unslash( $_POST[ $field_name ] ?? '' ) ) ) ) {
					delete_transient( $honeypot_key );
					$this->verify_form_token( $form_token, true );
					return true;
				}
			}
		}

		// AMP fallback honeypot names.
		foreach ( array( 'website', 'company', 'url' ) as $amp_hp ) {
			if ( ! empty( sanitize_text_field( wp_unslash( $_POST[ $amp_hp ] ?? '' ) ) ) ) {
				return true;
			}
		}

		$user_agent = sanitize_textarea_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ?? '' ) );
		if ( empty( $user_agent ) || strlen( $user_agent ) < 10 ) {
			return true;
		}

		$user_ip = $this->get_user_ip();
		if ( ! empty( $user_ip ) && false !== get_transient( 'sl_ecta_rate_limit_' . md5( $user_ip ) ) ) {
			return true;
		}

		$form_time = absint( $_POST['sl_ecta_form_time'] ?? 0 );
		if ( $form_time > 0 ) {
			$elapsed = time() - $form_time;
			if ( $elapsed < 3 || $elapsed > 10800 ) {
				return true;
			}
		}

		return false;
	}

	public function set_rate_limit() {
		$user_ip = $this->get_user_ip();
		if ( ! empty( $user_ip ) ) {
			set_transient( 'sl_ecta_rate_limit_' . md5( $user_ip ), time(), 30 );
		}
	}

	public function get_rate_limit_remaining() {
		$user_ip = $this->get_user_ip();
		if ( empty( $user_ip ) ) {
			return 0;
		}
		$last = get_transient( 'sl_ecta_rate_limit_' . md5( $user_ip ) );
		if ( false === $last ) {
			return 0;
		}
		return max( 1, 30 - ( time() - $last ) );
	}

	public function get_user_ip() {
		$keys = array(
			'HTTP_CF_CONNECTING_IP',
			'HTTP_TRUE_CLIENT_IP',
			'HTTP_X_REAL_IP',
			'HTTP_CLIENT_IP',
			'HTTP_X_FORWARDED_FOR',
			'REMOTE_ADDR',
		);

		foreach ( $keys as $key ) {
			if ( empty( $_SERVER[ $key ] ) ) {
				continue;
			}
			$ip = sanitize_text_field( wp_unslash( $_SERVER[ $key ] ) );
			if ( strpos( $ip, ',' ) !== false ) {
				$ip = trim( explode( ',', $ip )[0] );
			}
			$ip = $this->normalize_ip( $ip );
			if ( '' !== $ip ) {
				return $ip;
			}
		}

		return '';
	}

	/**
	 * Normalize loopback / mapped IPv6 addresses for readable admin display.
	 *
	 * @param string $ip Raw IP.
	 * @return string
	 */
	private function normalize_ip( $ip ) {
		$ip = trim( (string) $ip );
		if ( '' === $ip ) {
			return '';
		}

		// IPv4-mapped IPv6: ::ffff:127.0.0.1 → 127.0.0.1
		if ( preg_match( '/^::ffff:(\d{1,3}(?:\.\d{1,3}){3})$/i', $ip, $m ) ) {
			$ip = $m[1];
		}

		// Localhost IPv6 → IPv4 loopback.
		if ( in_array( strtolower( $ip ), array( '::1', '0:0:0:0:0:0:0:1' ), true ) ) {
			$ip = '127.0.0.1';
		}

		if ( ! filter_var( $ip, FILTER_VALIDATE_IP ) ) {
			return '';
		}

		return $ip;
	}

	/**
	 * Detect AMP page render or AMP form XHR.
	 *
	 * @return bool
	 */
	public function is_amp() {
		if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() ) {
			return true;
		}
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return true;
		}
		if ( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() ) {
			return true;
		}
		if ( isset( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return true;
		}
		$uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		return (bool) ( $uri && preg_match( '#/amp/?(\?|$)#', $uri ) );
	}

	/**
	 * Detect AMP form submissions (page render or AJAX/XHR).
	 *
	 * @return bool
	 */
	public function is_amp_form_request() {
		if ( $this->is_amp() ) {
			return true;
		}
		if ( ! empty( $_POST['amp_submission'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			return true;
		}
		if ( isset( $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) && 'true' === $_SERVER['HTTP_AMP_SAME_ORIGIN'] ) {
			return true;
		}
		if ( isset( $_SERVER['HTTP_ORIGIN'] ) && false !== strpos( (string) $_SERVER['HTTP_ORIGIN'], 'cdn.ampproject.org' ) ) {
			return true;
		}
		if ( isset( $_GET['__amp_source_origin'] ) || isset( $_REQUEST['__amp_source_origin'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended,WordPress.Security.NonceVerification.Missing
			return true;
		}
		return false;
	}
}
