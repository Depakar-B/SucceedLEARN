<?php
/**
 * Form Handler Class
 *
 * Handles AMP form submissions
 *
 * @package ElearnPOSH\AMP
 */

namespace ElearnPOSH\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Form Handler Class
 */
class Form_Handler {

	/**
	 * Queued async email + ERP sync jobs.
	 *
	 * @var array<int, array<string, mixed>>
	 */
	private static $followup_queue = array();

	/**
	 * Initialize form handler
	 */
	public static function init() {
		add_action( 'wp_ajax_elearnposh_amp_contact_form', array( __CLASS__, 'handle_contact_form' ) );
		add_action( 'wp_ajax_nopriv_elearnposh_amp_contact_form', array( __CLASS__, 'handle_contact_form' ) );

		add_action( 'elearnposh_amp_contact_followup', array( __CLASS__, 'run_contact_followup' ) );
		
		// Register REST API endpoint for AMP forms
		add_action( 'rest_api_init', array( __CLASS__, 'register_rest_routes' ) );
	}

	/**
	 * Register REST API routes
	 *
	 * Also aliases erp-contact/v1 for cached desktop forms from the
	 * pre-revert unified plugin that still POST to that namespace.
	 */
	public static function register_rest_routes() {
		$namespaces = array( 'elearnposh-amp/v1', 'erp-contact/v1' );

		foreach ( $namespaces as $namespace ) {
			register_rest_route(
				$namespace,
				'/contact',
				array(
					'methods'             => 'POST',
					'callback'            => array( __CLASS__, 'handle_contact_form_rest' ),
					'permission_callback' => '__return_true',
				)
			);
		}
	}

	/**
	 * Handle contact form submission (REST API)
	 *
	 * @param WP_REST_Request $request Request object.
	 * @return WP_REST_Response Response object.
	 */
	public static function handle_contact_form_rest( $request ) {
		$params = $request->get_json_params();
		
		// Handle AMP form submission (form data is sent as form-encoded, not JSON)
		if ( empty( $params ) ) {
			$params = $request->get_body_params();
			if ( empty( $params ) ) {
				$params = $_POST; // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
		}
		
		$result   = self::process_contact_form( $params );
		$is_error = ! empty( $result['error'] );
		
		$response = rest_ensure_response( $result );
		
		if ( $is_error ) {
			$response->set_status( 400 );
		}
		
		// Set AMP-specific headers
		$expose_headers = 'AMP-Access-Control-Allow-Source-Origin';
		if ( ! $is_error && ! empty( $result['redirect_url'] ) ) {
			$response->header( 'AMP-Redirect-To', $result['redirect_url'] );
			$expose_headers .= ', AMP-Redirect-To';
		}
		
		$response->header( 'Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0' );
		$response->header( 'Pragma', 'no-cache' );
		// Ask nginx (and similar) not to hold the AMP response until PHP exits.
		$response->header( 'X-Accel-Buffering', 'no' );

		$response->header( 'Access-Control-Allow-Credentials', 'true' );
		$response->header( 'Access-Control-Allow-Headers', 'Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token' );
		$response->header( 'Access-Control-Allow-Methods', 'POST, GET, OPTIONS' );
		$response->header( 'Access-Control-Expose-Headers', $expose_headers );
		
		if ( isset( $_SERVER['HTTP_ORIGIN'] ) ) {
			$origin = esc_url_raw( $_SERVER['HTTP_ORIGIN'] );
			$response->header( 'Access-Control-Allow-Origin', $origin );
			$response->header( 'AMP-Access-Control-Allow-Source-Origin', $origin );
		}
		
		return $response;
	}

	/**
	 * Handle contact form submission (AJAX)
	 */
	public static function handle_contact_form() {
		// Set AMP-specific headers
		header( 'Access-Control-Allow-Credentials: true' );
		header( 'Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token' );
		header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS' );
		header( 'Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin' );
		header( 'Content-Type: application/json' );
		
		if ( isset( $_SERVER['HTTP_ORIGIN'] ) ) {
			header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $_SERVER['HTTP_ORIGIN'] ) );
			header( 'AMP-Access-Control-Allow-Source-Origin: ' . esc_url_raw( $_SERVER['HTTP_ORIGIN'] ) );
		}
		
		// Handle OPTIONS request
		if ( 'OPTIONS' === $_SERVER['REQUEST_METHOD'] ) {
			status_header( 200 );
			exit;
		}
		
		$result = self::process_contact_form( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		
		wp_send_json( $result );
	}

	/**
	 * Process contact form submission
	 *
	 * @param array $data Form data.
	 * @return array Result array with output_message.
	 */
	private static function process_contact_form( $data ) {
		Database::ensure_tables();
		self::maybe_load_contact_helpers();

		// Check if this is a contact form submission
		if ( ! isset( $data['contact_form'] ) ) {
			return array(
				'output_message' => 'Invalid form submission.',
				'error'          => true,
			);
		}

		$is_amp = self::is_amp_form_submission( $data );

		// Honeypot spam check (replaces JS captcha for AMP)
		if ( ! empty( $data['website_url'] ) ) {
			return array(
				'output_message' => 'Thank you for contacting us, we will be in touch shortly.',
				'redirect_url'   => self::get_thankyou_redirect_url( $is_amp ),
			);
		}

		if ( $is_amp && function_exists( 'elearnposh_recaptcha_amp_required' ) && elearnposh_recaptcha_amp_required() ) {
			$recaptcha_token = function_exists( 'elearnposh_extract_recaptcha_response' )
				? elearnposh_extract_recaptcha_response( $data )
				: '';
			if ( ! function_exists( 'elearnposh_verify_recaptcha' ) || ! elearnposh_verify_recaptcha( $recaptcha_token, 'amp' ) ) {
				return array(
					'output_message' => 'Please complete the reCAPTCHA.',
					'error'          => true,
				);
			}
		}

		$ip = function_exists( 'elearnposh_get_client_ip' ) ? elearnposh_get_client_ip() : '';
		if ( function_exists( 'elearnposh_contact_form_rate_limit_ok' ) && ! elearnposh_contact_form_rate_limit_ok( $ip ) ) {
			$message = function_exists( 'elearnposh_contact_form_rate_limit_message' )
				? elearnposh_contact_form_rate_limit_message()
				: "You've reached the submission limit. Please try again after 6 hours — we'd love to hear from you then.";
			return array(
				'output_message' => $message,
				'error'          => true,
			);
		}
		
		// Sanitize input
		$name = isset( $data['name'] ) ? sanitize_text_field( $data['name'] ) : '';
		$email = isset( $data['email'] ) ? sanitize_email( $data['email'] ) : '';
		$phone = isset( $data['phone'] ) ? sanitize_text_field( $data['phone'] ) : '';
		$msg = isset( $data['msg'] ) ? sanitize_textarea_field( $data['msg'] ) : '';
		$org = isset( $data['org'] ) ? sanitize_text_field( $data['org'] ) : '';
		$privacy = isset( $data['privacy'] ) ? sanitize_text_field( $data['privacy'] ) : '';
		$posh = isset( $data['posh'] ) ? 1 : 0;
		$captcha = isset( $data['captcha'] ) ? sanitize_text_field( $data['captcha'] ) : 'amp';
		$utm = function_exists( 'elearnposh_amp_extract_utm' ) ? elearnposh_amp_extract_utm( $data ) : 'direct';
		$page_source = function_exists( 'elearnposh_amp_extract_form_page' ) ? elearnposh_amp_extract_form_page( $data ) : '';
		$page_url    = function_exists( 'elearnposh_amp_extract_form_page_url' ) ? elearnposh_amp_extract_form_page_url( $data ) : '';
		$ep_vid      = isset( $data['ep_vid'] ) ? sanitize_text_field( (string) $data['ep_vid'] ) : '';
		if ( '' === $ep_vid && isset( $_COOKIE['ep_vid'] ) ) {
			$ep_vid = sanitize_text_field( wp_unslash( $_COOKIE['ep_vid'] ) );
		}
		if ( $ep_vid ) {
			$GLOBALS['elearnposh_current_ep_vid'] = $ep_vid;
		}
		
		// Validate required fields
		if ( empty( $name ) || empty( $email ) ) {
			return array(
				'output_message' => 'Please fill the required fields.',
				'error'          => true,
			);
		}

		if ( empty( $privacy ) ) {
			return array(
				'output_message' => 'Please accept the privacy policy.',
				'error'          => true,
			);
		}
		
		// Check if email exists in any ERP table
		$existing = Database::check_email_exists( $email );
		
		$table_name = 'erp_contact';
		
		if ( $existing && $existing['email'] === $email ) {
			if ( empty( $phone ) ) {
				return array(
					'output_message' => 'Please fill the required fields.',
					'error'          => true,
				);
			}

			$erpid = ! empty( $existing['erpid'] ) ? $existing['erpid'] : self::generate_local_lead_id( $email );
			$record  = array(
				'name'    => $name,
				'email'   => $email,
				'erpid'   => $erpid,
				'phone'   => $phone,
				'msg'     => $msg,
				'org'     => $org,
				'privacy' => $privacy,
				'posh'    => $posh,
				'captcha' => $captcha,
				'ip'      => $ip,
			);

			if ( ! self::save_contact_record( $table_name, $record ) ) {
				return array(
					'output_message' => 'Error saving record. Please try again.',
					'error'          => true,
				);
			}

			self::dispatch_contact_followup(
				array(
					'mode'    => 'update',
					'erpid'   => $erpid,
					'name'    => $name,
					'email'   => $email,
					'phone'   => $phone,
					'msg'     => $msg,
					'org'     => $org,
					'privacy' => $privacy,
					'posh'    => $posh,
					'utm'         => $utm,
					'page_source' => $page_source,
					'page_url'    => $page_url,
					'ep_vid'      => $ep_vid,
					'ip'          => $ip,
				)
			);

			return self::success_contact_response( $is_amp );
		} else {
			// New email, create new lead
			if ( empty( $name ) || empty( $email ) || empty( $phone ) ) {
				return array(
					'output_message' => 'Please fill the required fields.',
					'error'          => true,
				);
			}

			$temp_id = self::generate_local_lead_id( $email );
			$record  = array(
				'name'    => $name,
				'email'   => $email,
				'erpid'   => $temp_id,
				'phone'   => $phone,
				'msg'     => $msg,
				'org'     => $org,
				'privacy' => $privacy,
				'posh'    => $posh,
				'captcha' => $captcha,
				'ip'      => $ip,
			);

			if ( ! self::save_contact_record( $table_name, $record ) ) {
				return array(
					'output_message' => 'Error saving record. Please try again.',
					'error'          => true,
				);
			}

			self::dispatch_contact_followup(
				array(
					'mode'       => 'create',
					'temp_erpid' => $temp_id,
					'name'       => $name,
					'email'      => $email,
					'phone'      => $phone,
					'msg'        => $msg,
					'org'        => $org,
					'privacy'     => $privacy,
					'posh'        => $posh,
					'utm'         => $utm,
					'page_source' => $page_source,
					'page_url'    => $page_url,
					'ep_vid'      => $ep_vid,
					'ip'          => $ip,
				)
			);

			return self::success_contact_response( $is_amp );
		}
	}

	/**
	 * Standard success payload for contact submissions.
	 *
	 * @param bool $is_amp Whether the submission came from an AMP form.
	 * @return array<string, mixed>
	 */
	private static function success_contact_response( $is_amp = false ) {
		return array(
			'output_message' => 'Thank you for contacting us, we will be in touch shortly.',
			'redirect_url'   => self::get_thankyou_redirect_url( $is_amp ),
		);
	}

	/**
	 * Resolve thank-you redirect URL (AMP or desktop).
	 *
	 * @param bool $is_amp Whether to return the AMP thank-you URL.
	 * @return string
	 */
	private static function get_thankyou_redirect_url( $is_amp = false ) {
		if ( ! $is_amp ) {
			return home_url( '/thankyou/' );
		}

		if ( function_exists( 'elearnposh_amp_url' ) ) {
			return elearnposh_amp_url( '/thankyou/' );
		}

		return trailingslashit( home_url( '/thankyou/' ) ) . 'amp/';
	}

	/**
	 * Whether the submission originated from the AMP contact form.
	 *
	 * @param array<string, mixed> $data Form data.
	 * @return bool
	 */
	private static function is_amp_form_submission( $data ) {
		return ! empty( $data['amp_submission'] );
	}

	/**
	 * Load shared contact helpers (IP + rate limit) from contact-func-mail when available.
	 *
	 * @return void
	 */
	private static function maybe_load_contact_helpers() {
		if ( function_exists( 'elearnposh_get_client_ip' ) ) {
			return;
		}

		$mailsend = WP_PLUGIN_DIR . '/contact-func-mail/mailsend.php';
		if ( is_readable( $mailsend ) ) {
			require_once $mailsend;
		}
	}

	/**
	 * Insert or update wp_erp_contact for an email address.
	 *
	 * @param string               $table_name Table key without prefix.
	 * @param array<string, mixed> $record     Contact row data.
	 * @return bool
	 */
	private static function save_contact_record( $table_name, $record ) {
		global $wpdb;

		$table           = Database::get_table_name( $table_name );
		$existing_record = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM $table WHERE email = %s", $record['email'] ) ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared

		if ( ! $existing_record ) {
			return (bool) Database::insert_contact( $table_name, $record );
		}

		return false !== Database::update_contact( $table_name, $record, $record['email'] );
	}

	/**
	 * Send admin notification and user confirmation emails.
	 *
	 * @param string $name    Name.
	 * @param string $email   Email.
	 * @param string $phone   Phone.
	 * @param string $org     Organization.
	 * @param string $msg     Message.
	 * @param string $privacy Privacy consent.
	 * @param int    $posh    POSH updates consent.
	 * @param string $utm         Traffic source label.
	 * @param string $page_source Submitted page name.
	 * @param string $page_url    Submitted page URL.
	 */
	private static function send_contact_emails( $name, $email, $phone, $org, $msg, $privacy, $posh, $utm, $page_source = '', $page_url = '', $ip = '' ) {
		Email::send_contact_email( $name, $email, $phone, $org, $msg, $privacy, $posh, $utm, $page_source, $page_url, $ip );
		Email::send_user_confirmation_email( $name, $email );
	}

	/**
	 * Queue emails + ERP sync after the HTTP response is sent when possible.
	 *
	 * @param array<string, mixed> $payload Follow-up job data.
	 */
	public static function dispatch_contact_followup( $payload ) {
		self::$followup_queue[] = $payload;

		if ( ! has_action( 'shutdown', array( __CLASS__, 'process_queued_followups' ) ) ) {
			add_action( 'shutdown', array( __CLASS__, 'process_queued_followups' ), 999 );
		}
	}

	/**
	 * Flush queued email + ERP jobs at the end of the request.
	 *
	 * Prefer closing the HTTP response first (fastcgi/litespeed), then run
	 * mail+ERP in this worker. If finish_request is unavailable, schedule
	 * WP-Cron only (never block the browser on SMTP/ERP).
	 */
	public static function process_queued_followups() {
		if ( empty( self::$followup_queue ) ) {
			return;
		}

		$jobs                 = self::$followup_queue;
		self::$followup_queue = array();

		$can_finish_early = function_exists( 'fastcgi_finish_request' ) || function_exists( 'litespeed_finish_request' );

		if ( $can_finish_early ) {
			ignore_user_abort( true );
			if ( function_exists( 'session_write_close' ) ) {
				session_write_close();
			}
			while ( ob_get_level() > 0 ) {
				ob_end_flush();
			}
			flush();
			if ( function_exists( 'fastcgi_finish_request' ) ) {
				fastcgi_finish_request();
			} else {
				litespeed_finish_request();
			}

			foreach ( $jobs as $payload ) {
				self::run_contact_followup( $payload );
			}
			return;
		}

		// No finish_request (e.g. Apache/mod_php): schedule only — do not block.
		foreach ( $jobs as $payload ) {
			$payload['_uid'] = uniqid( 'cf_', true );
			wp_schedule_single_event( time(), 'elearnposh_amp_contact_followup', array( $payload ) );
		}

		if ( function_exists( 'spawn_cron' ) ) {
			spawn_cron();
		}
	}

	/**
	 * Send emails first, then ERP sync (background).
	 *
	 * @param array<string, mixed> $payload Follow-up job data.
	 */
	public static function run_contact_followup( $payload ) {
		if ( empty( $payload['email'] ) || ! is_email( $payload['email'] ) ) {
			return;
		}

		$name    = isset( $payload['name'] ) ? $payload['name'] : '';
		$email   = $payload['email'];
		$phone   = isset( $payload['phone'] ) ? $payload['phone'] : '';
		$msg     = isset( $payload['msg'] ) ? $payload['msg'] : '';
		$org     = isset( $payload['org'] ) ? $payload['org'] : '';
		$privacy = isset( $payload['privacy'] ) ? $payload['privacy'] : '';
		$posh    = ! empty( $payload['posh'] ) ? 1 : 0;
		$utm         = isset( $payload['utm'] ) ? $payload['utm'] : 'direct';
		$page_source = isset( $payload['page_source'] ) ? $payload['page_source'] : '';
		$page_url    = isset( $payload['page_url'] ) ? $payload['page_url'] : '';
		$ip          = isset( $payload['ip'] ) ? $payload['ip'] : '';
		$mode        = isset( $payload['mode'] ) ? $payload['mode'] : 'create';
		$ep_vid      = isset( $payload['ep_vid'] ) ? $payload['ep_vid'] : '';
		if ( $ep_vid ) {
			$GLOBALS['elearnposh_current_ep_vid'] = $ep_vid;
		}

		self::send_contact_emails( $name, $email, $phone, $org, $msg, $privacy, $posh, $utm, $page_source, $page_url, $ip );

		if ( 'update' === $mode ) {
			$erpid = isset( $payload['erpid'] ) ? (string) $payload['erpid'] : '';
			if ( '' !== $erpid && 0 !== strpos( $erpid, 'LOCAL-' ) ) {
				$erp_response = ERPNext::update_lead( $name, $email, $phone, $msg, $org, $erpid, 'epblogs', $utm, $page_url );
				if ( is_wp_error( $erp_response ) ) {
					error_log( 'eLearnPOSH lead update (async): ' . $erp_response->get_error_message() ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
				}
			} else {
				$erp_response = ERPNext::send_lead( $name, $email, $phone, $msg, $org, 'epblogs', $utm, $page_url );
				$lead_id      = self::resolve_lead_id_from_erp_response( $erp_response, $email );
				if ( $lead_id && $lead_id !== $erpid ) {
					Database::update_contact( 'erp_contact', array( 'erpid' => $lead_id ), $email );
				}
			}
		} else {
			$temp_erpid   = isset( $payload['temp_erpid'] ) ? (string) $payload['temp_erpid'] : '';
			$erp_response = ERPNext::send_lead( $name, $email, $phone, $msg, $org, 'epblogs', $utm, $page_url );
			$lead_id      = self::resolve_lead_id_from_erp_response( $erp_response, $email );
			if ( $lead_id && $lead_id !== $temp_erpid ) {
				Database::update_contact( 'erp_contact', array( 'erpid' => $lead_id ), $email );
			}
		}
	}

	/**
	 * Resolve ERP lead ID; fall back to a local reference when ERP is unavailable.
	 *
	 * @param array|\WP_Error $erp_response ERP API response.
	 * @param string          $email        Submitter email (for fallback ID generation).
	 * @return string
	 */
	private static function resolve_lead_id_from_erp_response( $erp_response, $email ) {
		if ( ! is_wp_error( $erp_response ) ) {
			$lead_id = ERPNext::extract_lead_id( $erp_response );
			if ( ! empty( $lead_id ) ) {
				return $lead_id;
			}
		}

		if ( self::require_erp_lead_id() ) {
			return '';
		}

		if ( is_wp_error( $erp_response ) ) {
			error_log( 'eLearnPOSH lead fallback (ERP error): ' . $erp_response->get_error_message() ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		} else {
			error_log( 'eLearnPOSH lead fallback (missing ERP lead ID): ' . wp_json_encode( $erp_response ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		}

		return self::generate_local_lead_id( $email );
	}

	/**
	 * Whether form submission must abort when ERPNext does not return a lead ID.
	 *
	 * @return bool
	 */
	private static function require_erp_lead_id() {
		if ( defined( 'ELEARNPOSH_REQUIRE_ERP_LEAD' ) ) {
			return (bool) ELEARNPOSH_REQUIRE_ERP_LEAD;
		}

		return false;
	}

	/**
	 * Generate a temporary local lead ID when ERPNext is unavailable.
	 *
	 * @param string $email Submitter email.
	 * @return string
	 */
	private static function generate_local_lead_id( $email ) {
		$hash = substr( md5( strtolower( trim( $email ) ) . '|' . microtime( true ) ), 0, 10 );
		return 'LOCAL-' . gmdate( 'YmdHis' ) . '-' . strtoupper( $hash );
	}
}

