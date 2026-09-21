<?php
/**
 * AJAX / AMP form submission handler.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_ECTA_Handler {

	/** @var SL_ECTA_Database */
	private $database;

	/** @var SL_ECTA_Security */
	private $security;

	/** @var SL_ECTA_Email */
	private $email;

	public function __construct( SL_ECTA_Database $database, SL_ECTA_Security $security, SL_ECTA_Email $email ) {
		$this->database = $database;
		$this->security = $security;
		$this->email    = $email;
	}

	public function handle() {
		$is_amp = $this->security->is_amp_form_request();

		// Soft-skip nonce in SCF admin email test mode (parity with SCF), otherwise require nonce.
		$skip_nonce = function_exists( 'scf_is_admin_email_test_mode' ) && scf_is_admin_email_test_mode();
		if ( ! $skip_nonce ) {
			$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
			if ( ! $nonce || ! wp_verify_nonce( $nonce, 'sl_ecta_submit' ) ) {
				$this->send_response( __( 'Security check failed. Please refresh and try again.', 'succeedlearn-email-cta' ), false, 403 );
				return;
			}
		}

		$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
		if ( ! is_email( $email ) ) {
			$this->send_response( __( 'Please enter a valid email address.', 'succeedlearn-email-cta' ), false, 400 );
			return;
		}

		if ( $this->security->detect_bot() ) {
			$remaining = $this->security->get_rate_limit_remaining();
			if ( $remaining > 0 ) {
				$this->send_response(
					sprintf(
						/* translators: %d: seconds to wait */
						__( 'Please wait %d seconds before submitting again.', 'succeedlearn-email-cta' ),
						$remaining
					),
					false,
					403
				);
				return;
			}

			$form_token = sanitize_text_field( wp_unslash( $_POST['sl_ecta_form_token'] ?? '' ) );
			if ( empty( $form_token ) || ! $this->security->verify_form_token( $form_token, false ) ) {
				$this->send_response( __( 'Your session expired. Please refresh the page and try again.', 'succeedlearn-email-cta' ), false, 403 );
				return;
			}

			$form_time    = absint( $_POST['sl_ecta_form_time'] ?? 0 );
			$time_elapsed = $form_time > 0 ? ( time() - $form_time ) : 0;
			if ( $form_time > 0 && $time_elapsed < 3 ) {
				$this->send_response( __( 'Please take a moment to complete the form.', 'succeedlearn-email-cta' ), false, 403 );
				return;
			}

			$this->send_response( __( 'There was an issue with your submission. Please try again.', 'succeedlearn-email-cta' ), false, 403 );
			return;
		}

		$page_url = esc_url_raw( wp_unslash( $_POST['page_url'] ?? '' ) );
		$source   = sanitize_text_field( wp_unslash( $_POST['source'] ?? 'EmailCTA' ) );
		if ( '' === $source ) {
			$source = 'EmailCTA';
		}

		$utm = $this->resolve_utm( $page_url );

		$data = array(
			'email'        => $email,
			'source'       => $source,
			'utm_source'   => $utm['utm_source'],
			'utm_medium'   => $utm['utm_medium'],
			'utm_campaign' => $utm['utm_campaign'],
			'utm_term'     => $utm['utm_term'],
			'utm_content'  => $utm['utm_content'],
			'page_url'     => $page_url,
			'user_ip'      => $this->security->get_user_ip(),
			'user_agent'   => sanitize_textarea_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ?? '' ) ),
			'created_at'   => current_time( 'mysql' ),
		);

		$insert_id = $this->database->insert_submission( $data );
		if ( false === $insert_id ) {
			$this->send_response( __( 'Unable to save your submission. Please try again later.', 'succeedlearn-email-cta' ), false, 500 );
			return;
		}

		$this->security->set_rate_limit();

		$form_token = sanitize_text_field( wp_unslash( $_POST['sl_ecta_form_token'] ?? '' ) );
		if ( ! empty( $form_token ) ) {
			$this->security->verify_form_token( $form_token, true );
			$this->security->delete_honeypots( $form_token );
		}

		$success_message = __( 'Thank you! Our team will contact you soon.', 'succeedlearn-email-cta' );

		// Respond immediately, then send mail + ERP in the background.
		$this->send_response_no_exit( $success_message, true, 200, $is_amp );
		$this->close_http_connection();

		$this->email->send_all( $data );
		$this->maybe_send_to_erp( $data, $insert_id );

		/**
		 * Fires after a successful Email CTA submission (mail + optional ERP already attempted).
		 *
		 * @param array $data          Submission data.
		 * @param int   $submission_id Insert ID.
		 */
		do_action( 'sl_email_cta_after_submission', $data, $insert_id );

		exit;
	}

	/**
	 * Optional ERP handoff — safe no-op until a mapper is added.
	 *
	 * @param array $data          Submission data.
	 * @param int   $submission_id Insert ID.
	 */
	private function maybe_send_to_erp( $data, $submission_id ) {
		if ( ! function_exists( 'succeedlearn_form_send_to_erp' ) ) {
			return;
		}

		$submission = array(
			'email'        => $data['email'],
			'name'         => '',
			'source_tag'   => $data['source'],
			'page_url'     => $data['page_url'],
			'utm_source'   => $data['utm_source'],
			'utm_medium'   => $data['utm_medium'],
			'utm_campaign' => $data['utm_campaign'],
			'utm_term'     => $data['utm_term'],
			'utm_content'  => $data['utm_content'],
			'message'      => '',
		);

		$context = array(
			'form_key'      => 'email_cta',
			'form_variant'  => 'email_cta',
			'submission_id' => (int) $submission_id,
		);

		succeedlearn_form_send_to_erp( $submission, $context );
	}

	/**
	 * Resolve UTM params: POST fields → page URL query → HandL cookies → Direct.
	 *
	 * @param string $page_url Page URL with possible UTM params.
	 * @return array<string, string>
	 */
	private function resolve_utm( $page_url ) {
		$keys = array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content' );
		$utm  = array_fill_keys( $keys, '' );

		foreach ( $keys as $key ) {
			if ( isset( $_POST[ $key ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
				$utm[ $key ] = sanitize_text_field( wp_unslash( $_POST[ $key ] ) );
			}
		}

		$from_url = $this->extract_utm_from_url( $page_url );
		foreach ( $keys as $key ) {
			if ( '' === $utm[ $key ] && ! empty( $from_url[ $key ] ) ) {
				$utm[ $key ] = $from_url[ $key ];
			}
		}

		foreach ( $keys as $key ) {
			if ( '' !== $utm[ $key ] ) {
				continue;
			}
			if ( isset( $_COOKIE[ $key ] ) && '' !== (string) $_COOKIE[ $key ] ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				$utm[ $key ] = sanitize_text_field( wp_unslash( $_COOKIE[ $key ] ) );
			}
		}

		if ( '' === $utm['utm_source'] ) {
			$utm['utm_source'] = 'Direct';
		}

		return $utm;
	}

	/**
	 * @param string $page_url Page URL with possible UTM params.
	 * @return array
	 */
	private function extract_utm_from_url( $page_url ) {
		$params = array();
		$parsed = wp_parse_url( $page_url );
		if ( ! empty( $parsed['query'] ) ) {
			parse_str( $parsed['query'], $params );
		}
		return array(
			'utm_source'   => sanitize_text_field( $params['utm_source'] ?? '' ),
			'utm_medium'   => sanitize_text_field( $params['utm_medium'] ?? '' ),
			'utm_campaign' => sanitize_text_field( $params['utm_campaign'] ?? '' ),
			'utm_term'     => sanitize_text_field( $params['utm_term'] ?? '' ),
			'utm_content'  => sanitize_text_field( $params['utm_content'] ?? '' ),
		);
	}

	private function close_http_connection() {
		// Keep PHP alive after the browser gets the JSON success (matches SCF).
		ignore_user_abort( true );

		if ( function_exists( 'session_write_close' ) ) {
			session_write_close();
		}

		if ( function_exists( 'apache_setenv' ) ) {
			@apache_setenv( 'no-gzip', '1' ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
		}
		@ini_set( 'zlib.output_compression', '0' ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged,WordPress.PHP.IniSet.Risky
		@ini_set( 'implicit_flush', '1' ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged,WordPress.PHP.IniSet.Risky

		while ( ob_get_level() > 0 ) {
			ob_end_flush();
		}
		flush();

		if ( function_exists( 'fastcgi_finish_request' ) ) {
			fastcgi_finish_request();
		} elseif ( function_exists( 'litespeed_finish_request' ) ) {
			litespeed_finish_request();
		}

		// Absorb accidental output from mail/ERP so it cannot corrupt the AJAX body.
		ob_start();

		if ( function_exists( 'set_time_limit' ) ) {
			@set_time_limit( 120 ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
		}
	}

	private function send_response( $message, $success = true, $status_code = 200 ) {
		$this->send_response_internal( $message, $success, $status_code, true, $this->security->is_amp_form_request() );
	}

	private function send_response_no_exit( $message, $success = true, $status_code = 200, $is_amp = false ) {
		$this->send_response_internal( $message, $success, $status_code, false, $is_amp );
	}

	/**
	 * @param string $message     Response message.
	 * @param bool   $success     Whether success.
	 * @param int    $status_code HTTP status.
	 * @param bool   $exit        Exit after send.
	 * @param bool   $is_amp      AMP CORS response.
	 */
	private function send_response_internal( $message, $success, $status_code, $exit, $is_amp ) {
		while ( ob_get_level() ) {
			ob_end_clean();
		}

		if ( $is_amp ) {
			if ( ! defined( 'DOING_AJAX' ) ) {
				define( 'DOING_AJAX', true );
			}

			$source_origin  = home_url();
			$request_origin = isset( $_SERVER['HTTP_ORIGIN'] ) ? esc_url_raw( wp_unslash( $_SERVER['HTTP_ORIGIN'] ) ) : '';
			$allow_origin   = $source_origin;

			if ( ! empty( $request_origin ) ) {
				$parsed    = wp_parse_url( $request_origin );
				$host      = ! empty( $parsed['host'] ) ? strtolower( $parsed['host'] ) : '';
				$scheme    = ! empty( $parsed['scheme'] ) ? strtolower( $parsed['scheme'] ) : '';
				$site_host = wp_parse_url( $source_origin, PHP_URL_HOST );
				$site_host = $site_host ? strtolower( (string) $site_host ) : '';

				$is_amp_host = ( 'cdn.ampproject.org' === $host );
				if ( ! $is_amp_host && ! empty( $host ) ) {
					$suffix      = '.ampproject.org';
					$is_amp_host = ( strlen( $host ) > strlen( $suffix ) && substr( $host, -strlen( $suffix ) ) === $suffix );
				}

				if ( ( 'https' === $scheme && $is_amp_host ) || ( ! empty( $site_host ) && $host === $site_host ) ) {
					$allow_origin = $request_origin;
				}
			}

			if ( ! headers_sent() ) {
				header( 'Content-Type: application/json; charset=utf-8' );
				header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $allow_origin ) );
				header( 'Access-Control-Allow-Credentials: true' );
				header( 'AMP-Access-Control-Allow-Source-Origin: ' . esc_url_raw( $source_origin ) );
				header( 'Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin' );
				header( 'Vary: Origin' );
				http_response_code( $status_code );
			}

			if ( $success ) {
				$response = array(
					'success' => true,
					'message' => $message,
				);
			} else {
				$response = array(
					'message' => $message,
				);
			}

			$payload = wp_json_encode( $response );
			if ( ! $exit && ! headers_sent() ) {
				header( 'Content-Length: ' . strlen( $payload ) );
				header( 'Connection: close' );
			}
			echo $payload; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			if ( $exit ) {
				wp_die();
			}
			return;
		}

		if ( ! headers_sent() ) {
			status_header( $status_code );
			header( 'Content-Type: application/json; charset=utf-8' );
		}

		$payload = wp_json_encode(
			array(
				'success' => (bool) $success,
				'message' => $message,
				'data'    => array( 'message' => $message ),
			)
		);

		if ( ! $exit && ! headers_sent() ) {
			header( 'Content-Length: ' . strlen( $payload ) );
			header( 'Connection: close' );
		}

		echo $payload; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		if ( $exit ) {
			wp_die();
		}
	}
}
