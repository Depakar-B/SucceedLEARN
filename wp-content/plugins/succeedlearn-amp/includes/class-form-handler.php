<?php
/**
 * Form Handler Class
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Form Handler Class
 */
class Form_Handler {
	const MIN_SUBMIT_SECONDS = 4;
	const MAX_FORM_AGE       = 7200;
	const RATE_LIMIT_SECONDS = 30;

	/**
	 * @var array<int, array<string, mixed>>
	 */
	private static $followup_queue = array();

	public static function init() {
		add_action( 'wp_ajax_succeedlearn_amp_contact_form', array( __CLASS__, 'handle_contact_form' ) );
		add_action( 'wp_ajax_nopriv_succeedlearn_amp_contact_form', array( __CLASS__, 'handle_contact_form' ) );
		add_action( 'succeedlearn_amp_contact_followup', array( __CLASS__, 'run_contact_followup' ) );
		add_action( 'rest_api_init', array( __CLASS__, 'register_rest_routes' ) );
	}

	public static function register_rest_routes() {
		register_rest_route(
			'succeedlearn-amp/v1',
			'/contact',
			array(
				'methods'             => 'POST',
				'callback'            => array( __CLASS__, 'handle_contact_form_rest' ),
				'permission_callback' => '__return_true',
			)
		);
	}

	/**
	 * @param \WP_REST_Request $request Request.
	 * @return \WP_REST_Response
	 */
	public static function handle_contact_form_rest( $request ) {
		$params = $request->get_json_params();
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

		$expose_headers = 'AMP-Access-Control-Allow-Source-Origin';
		if ( ! $is_error && ! empty( $result['redirect_url'] ) ) {
			$response->header( 'AMP-Redirect-To', $result['redirect_url'] );
			$expose_headers .= ', AMP-Redirect-To';
		}

		$response->header( 'Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0' );
		$response->header( 'Pragma', 'no-cache' );
		$response->header( 'X-Accel-Buffering', 'no' );
		$response->header( 'Access-Control-Allow-Credentials', 'true' );
		$response->header( 'Access-Control-Allow-Headers', 'Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token' );
		$response->header( 'Access-Control-Allow-Methods', 'POST, GET, OPTIONS' );
		$response->header( 'Access-Control-Expose-Headers', $expose_headers );

		if ( isset( $_SERVER['HTTP_ORIGIN'] ) ) {
			$origin = esc_url_raw( wp_unslash( $_SERVER['HTTP_ORIGIN'] ) );
			$response->header( 'Access-Control-Allow-Origin', $origin );
			$response->header( 'AMP-Access-Control-Allow-Source-Origin', $origin );
		}

		return $response;
	}

	public static function handle_contact_form() {
		header( 'Access-Control-Allow-Credentials: true' );
		header( 'Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token' );
		header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS' );
		header( 'Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin' );
		header( 'Content-Type: application/json' );

		if ( isset( $_SERVER['HTTP_ORIGIN'] ) ) {
			header( 'Access-Control-Allow-Origin: ' . esc_url_raw( wp_unslash( $_SERVER['HTTP_ORIGIN'] ) ) );
			header( 'AMP-Access-Control-Allow-Source-Origin: ' . esc_url_raw( wp_unslash( $_SERVER['HTTP_ORIGIN'] ) ) );
		}

		if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'OPTIONS' === $_SERVER['REQUEST_METHOD'] ) {
			status_header( 200 );
			exit;
		}

		$result = self::process_contact_form( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		wp_send_json( $result );
	}

	/**
	 * @param array $data Form data.
	 * @return array
	 */
	private static function process_contact_form( $data ) {
		Database::ensure_tables();

		if ( ! isset( $data['contact_form'] ) ) {
			return array(
				'output_message' => 'Invalid form submission.',
				'error'          => true,
			);
		}

		$is_amp = ! empty( $data['amp_submission'] );

		if ( ! empty( $data['website_url'] ) ) {
			return array(
				'output_message' => 'Thank you for contacting us, we will be in touch shortly.',
				'redirect_url'   => self::get_thankyou_redirect_url( $is_amp ),
			);
		}

		$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';

		if ( ! self::validate_submission_integrity( $data, $ip ) ) {
			return array(
				'output_message' => 'Please refresh the page and submit again.',
				'error'          => true,
			);
		}

		if ( ! self::check_rate_limit( $data, $ip ) ) {
			return array(
				'output_message' => 'Please wait before submitting again.',
				'error'          => true,
			);
		}

		$name        = isset( $data['name'] ) ? sanitize_text_field( $data['name'] ) : '';
		$email       = isset( $data['email'] ) ? sanitize_email( $data['email'] ) : '';
		$phone       = isset( $data['phone'] ) ? sanitize_text_field( $data['phone'] ) : '';
		$msg         = isset( $data['msg'] ) ? sanitize_textarea_field( $data['msg'] ) : '';
		$org         = isset( $data['org'] ) ? sanitize_text_field( $data['org'] ) : '';
		$privacy     = isset( $data['privacy'] ) ? sanitize_text_field( $data['privacy'] ) : '';
		$posh        = isset( $data['posh'] ) ? 1 : 0;
		$captcha     = isset( $data['captcha'] ) ? sanitize_text_field( $data['captcha'] ) : 'amp';
		$utm         = function_exists( 'succeedlearn_amp_extract_utm' ) ? succeedlearn_amp_extract_utm( $data ) : 'direct';
		$page_source = function_exists( 'succeedlearn_amp_extract_form_page' ) ? succeedlearn_amp_extract_form_page( $data ) : 'Home';
		$page_url    = function_exists( 'succeedlearn_amp_extract_form_page_url' ) ? succeedlearn_amp_extract_form_page_url( $data ) : '';

		if ( empty( $name ) || empty( $email ) || empty( $phone ) ) {
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

		if ( ! is_email( $email ) ) {
			return array(
				'output_message' => 'Please enter a valid email address.',
				'error'          => true,
			);
		}

		if ( ! preg_match( '/^[6-9][0-9]{9}$/', preg_replace( '/\D+/', '', $phone ) ) ) {
			return array(
				'output_message' => 'Please enter a valid 10-digit mobile number.',
				'error'          => true,
			);
		}

		$existing   = Database::check_email_exists( $email );
		$table_name = 'erp_contact';

		if ( $existing && $existing['email'] === $email ) {
			$erpid  = ! empty( $existing['erpid'] ) ? $existing['erpid'] : self::generate_local_lead_id( $email );
			$record = array(
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
					'mode'        => 'update',
					'erpid'       => $erpid,
					'name'        => $name,
					'email'       => $email,
					'phone'       => $phone,
					'msg'         => $msg,
					'org'         => $org,
					'privacy'     => $privacy,
					'posh'        => $posh,
					'utm'         => $utm,
					'page_source' => $page_source,
					'page_url'    => $page_url,
					'ip'          => $ip,
				)
			);
			return self::success_contact_response( $is_amp );
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
				'mode'        => 'create',
				'temp_erpid'  => $temp_id,
				'name'        => $name,
				'email'       => $email,
				'phone'       => $phone,
				'msg'         => $msg,
				'org'         => $org,
				'privacy'     => $privacy,
				'posh'        => $posh,
				'utm'         => $utm,
				'page_source' => $page_source,
				'page_url'    => $page_url,
				'ip'          => $ip,
			)
		);
		return self::success_contact_response( $is_amp );
	}

	/**
	 * Validate timestamp/signature fields for AMP submissions.
	 *
	 * @param array  $data Form payload.
	 * @param string $ip   Client IP.
	 * @return bool
	 */
	private static function validate_submission_integrity( $data, $ip ) {
		$form_ts  = isset( $data['form_ts'] ) ? absint( $data['form_ts'] ) : 0;
		$form_sig = isset( $data['form_sig'] ) ? sanitize_text_field( (string) $data['form_sig'] ) : '';
		$page_url = isset( $data['form_page_url'] ) ? esc_url_raw( (string) $data['form_page_url'] ) : '';

		if ( $form_ts <= 0 || '' === $form_sig || '' === $page_url ) {
			return false;
		}

		$expected = wp_hash( (string) $form_ts . '|' . $page_url, 'nonce' );
		if ( ! hash_equals( (string) $expected, (string) $form_sig ) ) {
			return false;
		}

		$age = time() - $form_ts;
		if ( $age < self::MIN_SUBMIT_SECONDS || $age > self::MAX_FORM_AGE ) {
			return false;
		}

		// Optional source-origin check for AMP cache submissions.
		if ( isset( $_SERVER['HTTP_ORIGIN'] ) ) {
			$origin_host = wp_parse_url( esc_url_raw( wp_unslash( $_SERVER['HTTP_ORIGIN'] ) ), PHP_URL_HOST );
			$page_host   = wp_parse_url( $page_url, PHP_URL_HOST );
			if ( $origin_host && $page_host && $origin_host !== $page_host && false === strpos( (string) $origin_host, 'ampproject.org' ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Basic per-IP/per-email throttling to reduce burst spam.
	 *
	 * @param array  $data Form payload.
	 * @param string $ip   Client IP.
	 * @return bool
	 */
	private static function check_rate_limit( $data, $ip ) {
		$email = isset( $data['email'] ) ? strtolower( sanitize_email( (string) $data['email'] ) ) : '';
		$keys  = array();

		if ( '' !== $ip ) {
			$keys[] = 'slamp_rl_ip_' . md5( $ip );
		}
		if ( '' !== $email ) {
			$keys[] = 'slamp_rl_email_' . md5( $email );
		}

		foreach ( $keys as $key ) {
			if ( get_transient( $key ) ) {
				return false;
			}
		}

		foreach ( $keys as $key ) {
			set_transient( $key, 1, self::RATE_LIMIT_SECONDS );
		}

		return true;
	}

	/**
	 * @param bool $is_amp AMP flag.
	 * @return array
	 */
	private static function success_contact_response( $is_amp = false ) {
		return array(
			'output_message' => 'Thank you for contacting us, we will be in touch shortly.',
			'redirect_url'   => self::get_thankyou_redirect_url( $is_amp ),
		);
	}

	/**
	 * @param bool $is_amp AMP flag.
	 * @return string
	 */
	private static function get_thankyou_redirect_url( $is_amp = false ) {
		$config = new Config();
		$url    = $config->get_thankyou_url();
		if ( $is_amp ) {
			return function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $url ) : add_query_arg( 'amp', '1', $url );
		}
		return $url;
	}

	/**
	 * @param string $table_name Table.
	 * @param array  $record Record.
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
	 * @param string $email Email.
	 * @return string
	 */
	private static function generate_local_lead_id( $email ) {
		return 'LOCAL-' . gmdate( 'YmdHis' ) . '-' . strtoupper( substr( md5( $email . wp_rand() ), 0, 6 ) );
	}

	/**
	 * @param array $payload Payload.
	 */
	public static function dispatch_contact_followup( $payload ) {
		self::$followup_queue[] = $payload;
		if ( ! has_action( 'shutdown', array( __CLASS__, 'process_queued_followups' ) ) ) {
			add_action( 'shutdown', array( __CLASS__, 'process_queued_followups' ), 999 );
		}
	}

	public static function process_queued_followups() {
		if ( empty( self::$followup_queue ) ) {
			return;
		}
		$jobs                 = self::$followup_queue;
		self::$followup_queue = array();

		if ( function_exists( 'fastcgi_finish_request' ) ) {
			fastcgi_finish_request();
		} elseif ( function_exists( 'litespeed_finish_request' ) ) {
			\litespeed_finish_request();
		}

		foreach ( $jobs as $job ) {
			self::run_contact_followup( $job );
		}
	}

	/**
	 * @param array $payload Payload.
	 */
	public static function run_contact_followup( $payload ) {
		if ( ! is_array( $payload ) ) {
			return;
		}

		$name        = isset( $payload['name'] ) ? $payload['name'] : '';
		$email       = isset( $payload['email'] ) ? $payload['email'] : '';
		$phone       = isset( $payload['phone'] ) ? $payload['phone'] : '';
		$msg         = isset( $payload['msg'] ) ? $payload['msg'] : '';
		$org         = isset( $payload['org'] ) ? $payload['org'] : '';
		$privacy     = isset( $payload['privacy'] ) ? $payload['privacy'] : '';
		$posh        = ! empty( $payload['posh'] );
		$utm         = isset( $payload['utm'] ) ? $payload['utm'] : '';
		$page_source = isset( $payload['page_source'] ) ? $payload['page_source'] : '';
		$page_url    = isset( $payload['page_url'] ) ? $payload['page_url'] : '';
		$ip          = isset( $payload['ip'] ) ? $payload['ip'] : '';
		$mode        = isset( $payload['mode'] ) ? $payload['mode'] : 'create';

		Email::send_contact_email( $name, $email, $phone, $org, $msg, $privacy, $posh, $utm, $page_source, $page_url, $ip );
		Email::send_user_confirmation_email( $name, $email );

		if ( 'update' === $mode && ! empty( $payload['erpid'] ) && 0 !== strpos( (string) $payload['erpid'], 'LOCAL-' ) ) {
			$result = ERPNext::update_lead( $name, $email, $phone, $msg, $org, $payload['erpid'], 'succeedlearn', $utm, $page_url );
		} else {
			$result = ERPNext::send_lead( $name, $email, $phone, $msg, $org, 'succeedlearn', $utm, $page_url );
			if ( ! is_wp_error( $result ) ) {
				$lead_id = ERPNext::extract_lead_id( $result );
				if ( $lead_id ) {
					Database::update_contact( 'erp_contact', array( 'erpid' => $lead_id ), $email );
				}
			}
		}

		if ( is_wp_error( $result ) && defined( 'SUCCEEDLEARN_REQUIRE_ERP_LEAD' ) && \SUCCEEDLEARN_REQUIRE_ERP_LEAD ) {
			// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
			error_log( 'SucceedLEARN ERP lead failed: ' . $result->get_error_message() );
		}
	}
}
