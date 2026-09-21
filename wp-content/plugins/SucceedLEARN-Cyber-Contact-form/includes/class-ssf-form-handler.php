<?php
/**
 * AJAX form submission handler.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SSF_Form_Handler {

	/** @var SSF_Database */
	private $database;

	/** @var SSF_Security */
	private $security;

	/** @var SSF_Email */
	private $email;

	/** @var SSF_Form_Render */
	private $form_render;

	public function __construct( SSF_Database $database, SSF_Security $security, SSF_Email $email, SSF_Form_Render $form_render ) {
		$this->database    = $database;
		$this->security    = $security;
		$this->email       = $email;
		$this->form_render = $form_render;
	}

	public function handle() {
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'ssf_submit' ) ) {
			$this->send_response( __( 'Security check failed. Please refresh and try again.', 'seo-form' ), false, 403 );
			return;
		}

		$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
		if ( ! is_email( $email ) ) {
			$this->send_response( __( 'Please enter a valid email address.', 'seo-form' ), false, 400 );
			return;
		}

		if ( $this->security->detect_bot() ) {
			$remaining = $this->security->get_rate_limit_remaining();
			if ( $remaining > 0 ) {
				$this->send_response(
					sprintf(
						/* translators: %d: seconds to wait */
						__( 'Please wait %d seconds before submitting again.', 'seo-form' ),
						$remaining
					),
					false,
					403
				);
				return;
			}

			$form_token = sanitize_text_field( wp_unslash( $_POST['ssf_form_token'] ?? '' ) );
			if ( empty( $form_token ) || ! $this->security->verify_form_token( $form_token, false ) ) {
				$this->send_response( __( 'Your session expired. Please refresh the page and try again.', 'seo-form' ), false, 403 );
				return;
			}

			$form_time    = absint( $_POST['ssf_form_time'] ?? 0 );
			$time_elapsed = $form_time > 0 ? ( time() - $form_time ) : 0;
			if ( $form_time > 0 && $time_elapsed < 3 ) {
				$this->send_response( __( 'Please take a moment to complete the form.', 'seo-form' ), false, 403 );
				return;
			}

			$this->send_response( __( 'There was an issue with your submission. Please try again.', 'seo-form' ), false, 403 );
			return;
		}

		$form_variant = SSF_Variants::normalize( wp_unslash( $_POST['ssf_form_variant'] ?? SSF_Variants::DEFAULT ) );
		$config       = SSF_Variants::get( $form_variant );
		$is_infosec   = SSF_Variants::is_infosec( $form_variant );

		$name              = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
		$job_title         = sanitize_text_field( wp_unslash( $_POST['job_title'] ?? '' ) );
		$employees         = sanitize_text_field( wp_unslash( $_POST['employees'] ?? '' ) );
		$message           = ! empty( $config['show_message'] ) ? wp_kses_post( wp_unslash( $_POST['message'] ?? '' ) ) : '';
		$privacy           = isset( $_POST['privacy'] );
		$authorised        = isset( $_POST['authorised_confirm'] );
		$page_url          = esc_url_raw( wp_unslash( $_POST['page_url'] ?? '' ) );
		$source_tag        = $this->form_render->determine_source_tag( $page_url, $form_variant );
		$utm               = $this->extract_utm( $page_url );
		$employees_int     = absint( $employees );

		$missing_required = empty( $name ) || empty( $email ) || $employees_int < 1 || ! $privacy;
		if ( ! empty( $config['show_job_title'] ) && '' === $job_title ) {
			$missing_required = true;
		}
		if ( ! empty( $config['require_authorisation'] ) && ! $authorised ) {
			$missing_required = true;
		}

		if ( $missing_required ) {
			$this->send_response( __( 'Please fill in all required fields and accept the required confirmations.', 'seo-form' ), false, 400 );
			return;
		}

		$data = array(
			'name'               => $name,
			'email'              => $email,
			'job_title'          => $is_infosec ? $job_title : '',
			'employees'          => (string) $employees_int,
			'message'            => $message,
			'privacy_accepted'   => 1,
			'authorised_confirm' => ( ! empty( $config['require_authorisation'] ) && $authorised ) ? 1 : 0,
			'form_variant'       => $form_variant,
			'utm_source'         => $utm['utm_source'],
			'utm_medium'         => $utm['utm_medium'],
			'utm_campaign'       => $utm['utm_campaign'],
			'utm_term'           => $utm['utm_term'],
			'utm_content'        => $utm['utm_content'],
			'source_tag'         => $source_tag,
			'page_url'           => $page_url,
			'user_ip'            => $this->security->get_user_ip(),
			'user_agent'         => sanitize_textarea_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ?? '' ) ),
			'created_at'         => current_time( 'mysql' ),
		);

		$insert_id = $this->database->insert_submission( $data );
		if ( false === $insert_id ) {
			$this->send_response( __( 'Unable to save your submission. Please try again later.', 'seo-form' ), false, 500 );
			return;
		}

		$data['submission_id'] = (int) $insert_id;
		$data['ssf_table']     = $this->database->get_table_name();

		/**
		 * Fires after a cybersecurity form lead is saved.
		 *
		 * @param array $data      Submission data (includes submission_id).
		 * @param int   $insert_id Lead row ID.
		 */
		do_action( 'ssf_after_submission', $data, (int) $insert_id );

		$this->security->set_rate_limit();

		$form_token = sanitize_text_field( wp_unslash( $_POST['ssf_form_token'] ?? '' ) );
		if ( ! empty( $form_token ) ) {
			$this->security->verify_form_token( $form_token, true );
			$this->security->delete_honeypots( $form_token );
		}

		$success_message = ! empty( $config['success_message'] )
			? $config['success_message']
			: __( 'Thank you! We will get back to you soon.', 'seo-form' );

		$is_amp = $this->is_amp_form_request();
		$this->send_response_no_exit( $success_message, true );

		// Flush the success response to the browser, but keep PHP alive to send mail.
		if ( ! $is_amp ) {
			if ( ob_get_level() ) {
				ob_end_flush();
			}
			flush();
		}

		$this->email->send_all( $data );

		if ( ! $is_amp && function_exists( 'fastcgi_finish_request' ) ) {
			fastcgi_finish_request();
		}

		if ( $is_amp ) {
			exit;
		}
	}

	/**
	 * Prefer posted UTM fields (AMP); fall back to page URL query.
	 *
	 * @param string $page_url Page URL.
	 * @return array
	 */
	private function extract_utm( $page_url ) {
		$from_post = array(
			'utm_source'   => sanitize_text_field( wp_unslash( $_POST['utm_source'] ?? '' ) ),
			'utm_medium'   => sanitize_text_field( wp_unslash( $_POST['utm_medium'] ?? '' ) ),
			'utm_campaign' => sanitize_text_field( wp_unslash( $_POST['utm_campaign'] ?? '' ) ),
			'utm_term'     => sanitize_text_field( wp_unslash( $_POST['utm_term'] ?? '' ) ),
			'utm_content'  => sanitize_text_field( wp_unslash( $_POST['utm_content'] ?? '' ) ),
		);

		if ( ! empty( $from_post['utm_source'] ) || ! empty( $from_post['utm_medium'] ) || ! empty( $from_post['utm_campaign'] ) ) {
			return $from_post;
		}

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

	/**
	 * @return bool
	 */
	private function is_amp_form_request() {
		if ( ! empty( $_POST['amp_submission'] ) ) {
			return true;
		}
		if ( isset( $_GET['__amp_source_origin'] ) || isset( $_REQUEST['__amp_source_origin'] ) ) {
			return true;
		}
		if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() ) {
			return true;
		}
		return false;
	}

	private function send_response( $message, $success = true, $status_code = 200 ) {
		$this->send_response_internal( $message, $success, $status_code, true );
	}

	private function send_response_no_exit( $message, $success = true, $status_code = 200 ) {
		$this->send_response_internal( $message, $success, $status_code, false );
	}

	private function send_response_internal( $message, $success, $status_code, $exit ) {
		if ( $this->is_amp_form_request() ) {
			$this->send_amp_response( $message, $success, $status_code, $exit );
			return;
		}

		while ( ob_get_level() > 0 ) {
			ob_end_clean();
		}

		if ( ! headers_sent() ) {
			status_header( $status_code );
			header( 'Content-Type: application/json; charset=utf-8' );
		}

		echo wp_json_encode(
			array(
				'success' => (bool) $success,
				'data'    => array( 'message' => $message ),
			)
		);

		if ( $exit ) {
			wp_die();
		}
	}

	/**
	 * AMP action-xhr expects CORS headers + flat message shape.
	 *
	 * @param string $message Message.
	 * @param bool   $success Success flag.
	 * @param int    $status_code HTTP status.
	 * @param bool   $exit Exit after send.
	 */
	private function send_amp_response( $message, $success, $status_code, $exit ) {
		if ( ! defined( 'DOING_AJAX' ) ) {
			define( 'DOING_AJAX', true );
		}

		while ( ob_get_level() ) {
			ob_end_clean();
		}

		$source_origin  = home_url();
		$request_origin = isset( $_SERVER['HTTP_ORIGIN'] ) ? esc_url_raw( wp_unslash( $_SERVER['HTTP_ORIGIN'] ) ) : '';
		$allow_origin   = $source_origin;

		if ( ! empty( $request_origin ) ) {
			$parsed      = wp_parse_url( $request_origin );
			$host        = ! empty( $parsed['host'] ) ? strtolower( $parsed['host'] ) : '';
			$scheme      = ! empty( $parsed['scheme'] ) ? strtolower( $parsed['scheme'] ) : '';
			$site_host   = ! empty( wp_parse_url( $source_origin, PHP_URL_HOST ) ) ? strtolower( (string) wp_parse_url( $source_origin, PHP_URL_HOST ) ) : '';
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
			header_remove();
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

		echo wp_json_encode( $response );

		if ( $exit ) {
			exit;
		}
	}
}
