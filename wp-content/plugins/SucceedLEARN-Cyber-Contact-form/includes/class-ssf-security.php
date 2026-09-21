<?php
/**
 * Bot protection: tokens, honeypots, rate limiting, IP detection.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SSF_Security {

	public function generate_form_token() {
		$token     = wp_generate_password( 32, false );
		$token_key = 'ssf_token_' . md5( $token );
		set_transient( $token_key, time(), 10800 );
		return $token;
	}

	public function verify_form_token( $token, $delete = false ) {
		if ( empty( $token ) ) {
			return false;
		}
		$token_key = 'ssf_token_' . md5( $token );
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
	 * @return array Honeypot field names keyed by type.
	 */
	public function create_honeypots( $form_token ) {
		$names = array(
			'website' => 'website_' . wp_generate_password( 6, false ),
			'company' => 'company_' . wp_generate_password( 6, false ),
		);
		set_transient( 'ssf_honeypots_' . md5( $form_token ), $names, 3600 );
		return $names;
	}

	public function delete_honeypots( $form_token ) {
		delete_transient( 'ssf_honeypots_' . md5( $form_token ) );
	}

	/**
	 * @return bool True if bot detected.
	 */
	public function detect_bot() {
		$form_token = sanitize_text_field( wp_unslash( $_POST['ssf_form_token'] ?? '' ) );
		if ( ! $this->verify_form_token( $form_token, false ) ) {
			return true;
		}

		$honeypot_key   = 'ssf_honeypots_' . md5( $form_token );
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

		$user_agent = sanitize_textarea_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ?? '' ) );
		if ( empty( $user_agent ) || strlen( $user_agent ) < 10 ) {
			return true;
		}

		$user_ip = $this->get_user_ip();
		if ( ! empty( $user_ip ) && false !== get_transient( 'ssf_rate_limit_' . md5( $user_ip ) ) ) {
			return true;
		}

		$form_time = absint( $_POST['ssf_form_time'] ?? 0 );
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
			set_transient( 'ssf_rate_limit_' . md5( $user_ip ), time(), 30 );
		}
	}

	public function get_rate_limit_remaining() {
		$user_ip = $this->get_user_ip();
		if ( empty( $user_ip ) ) {
			return 0;
		}
		$last = get_transient( 'ssf_rate_limit_' . md5( $user_ip ) );
		if ( false === $last ) {
			return 0;
		}
		return max( 1, 30 - ( time() - $last ) );
	}

	public function get_user_ip() {
		$keys = array( 'HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR' );
		foreach ( $keys as $key ) {
			if ( empty( $_SERVER[ $key ] ) ) {
				continue;
			}
			$ip = sanitize_text_field( wp_unslash( $_SERVER[ $key ] ) );
			if ( strpos( $ip, ',' ) !== false ) {
				$ip = trim( explode( ',', $ip )[0] );
			}
			if ( filter_var( $ip, FILTER_VALIDATE_IP ) ) {
				return $ip;
			}
		}
		return '';
	}
}
