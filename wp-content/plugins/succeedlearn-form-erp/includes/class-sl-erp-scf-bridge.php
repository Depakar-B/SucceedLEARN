<?php
/**
 * Bridge Succeed Common Contact Form submissions to ERPNext.
 *
 * All common contact form submissions are forwarded to ERP with utm_source
 * resolved from the page where the form was submitted (source_tag).
 *
 * @package SucceedLEARN_Form_ERP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hooks scf_after_submission into succeedlearn_form_send_to_erp().
 */
class SL_ERP_SCF_Bridge {

	/**
	 * Map SCF source_tag values to ERP form_key identifiers.
	 *
	 * @var array<string, string>
	 */
	private static $form_key_map = array(
		'SucceedLEARN HomePage'  => 'scf_homepage',
		'SucceedLEARN InfoSEC'   => 'scf_infosec',
		'SucceedLEARN Blog'      => 'scf_blog',
		'SucceedLEARN ContactUs' => 'scf_contact',
		'SucceedLEARN Others'    => 'scf_others',
	);

	/**
	 * Register hooks.
	 */
	public static function init() {
		add_action( 'scf_after_submission', array( __CLASS__, 'handle_submission' ), 10, 2 );
	}

	/**
	 * Forward contact form data to ERP with page-based utm_source.
	 *
	 * @param array       $data     Submission data.
	 * @param array|false $response ERP HTTP response (unused).
	 */
	public static function handle_submission( $data, $response ) {
		if ( ! function_exists( 'succeedlearn_form_send_to_erp' ) ) {
			return;
		}

		$form_variant = 'default';
		if ( ! empty( $data['form_variant'] ) ) {
			$form_variant = sanitize_text_field( (string) $data['form_variant'] );
		} elseif ( isset( $_POST['scf_form_variant'] ) ) {
			$form_variant = sanitize_text_field( wp_unslash( (string) $_POST['scf_form_variant'] ) );
		}

		$source_tag = '';
		if ( ! empty( $data['source_tag'] ) ) {
			$source_tag = sanitize_text_field( (string) $data['source_tag'] );
		}

		// Course demo form always maps to RequestDemo in the mapper.
		if ( 'course' === $form_variant ) {
			$form_key = 'scf_course';
		} elseif ( isset( self::$form_key_map[ $source_tag ] ) ) {
			$form_key = self::$form_key_map[ $source_tag ];
		} else {
			$form_key = 'scf_contact';
		}

		$submission                 = $data;
		$submission['form_variant'] = $form_variant;
		if ( '' !== $source_tag ) {
			$submission['source_tag'] = $source_tag;
		}

		$result = succeedlearn_form_send_to_erp(
			$submission,
			array(
				'form_key'     => $form_key,
				'form_variant' => $form_variant,
			)
		);

		self::record_sync_on_submission( $data, is_array( $result ) ? $result : array() );
	}

	/**
	 * Write ERP result back onto the contact form submission row.
	 *
	 * @param array $data   SCF submission.
	 * @param array $result succeedlearn_form_send_to_erp() result.
	 */
	private static function record_sync_on_submission( $data, $result ) {
		global $wpdb;

		$parsed        = self::summarize_erp_result( $result );
		$submission_id = absint( $data['submission_id'] ?? 0 );
		$table         = (string) ( $data['scf_table'] ?? '' );

		if ( $submission_id < 1 || '' === $table ) {
			$email = sanitize_email( (string) ( $data['email'] ?? '' ) );
			if ( '' !== $email ) {
				$candidates = array(
					$wpdb->prefix . 'scf_contact_submissions',
					$wpdb->prefix . 'scf_course_submissions',
				);
				foreach ( $candidates as $candidate ) {
					$exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $candidate ) );
					if ( $exists !== $candidate ) {
						continue;
					}
					$found = $wpdb->get_var(
						$wpdb->prepare(
							"SELECT id FROM {$candidate} WHERE email = %s ORDER BY id DESC LIMIT 1",
							$email
						)
					);
					if ( $found ) {
						$submission_id = (int) $found;
						$table         = $candidate;
						break;
					}
				}
			}
		}

		if ( $submission_id < 1 || '' === $table ) {
			return;
		}

		if ( function_exists( 'scf_record_erp_sync' ) ) {
			scf_record_erp_sync( $table, $submission_id, $parsed['status'], $parsed['detail'], $parsed['lead_name'] );
			return;
		}

		$wpdb->update(
			$table,
			array(
				'erp_sync_status' => $parsed['status'],
				'erp_sync_detail' => $parsed['detail'],
				'erp_lead_name'   => $parsed['lead_name'],
			),
			array( 'id' => $submission_id ),
			array( '%s', '%s', '%s' ),
			array( '%d' )
		);
	}

	/**
	 * Turn ERP send result into a short admin-facing status.
	 *
	 * @param array $result Plugin send result.
	 * @return array{status:string,detail:string,lead_name:string}
	 */
	private static function summarize_erp_result( $result ) {
		$success  = ! empty( $result['success'] );
		$response = (string) ( $result['response'] ?? '' );
		$decoded  = json_decode( $response, true );
		if ( ! is_array( $decoded ) ) {
			$decoded = array();
		}

		$lead_name = '';
		if ( ! empty( $decoded['data']['name'] ) ) {
			$lead_name = (string) $decoded['data']['name'];
		}

		$detail = '';
		if ( ! empty( $decoded['message'] ) ) {
			$detail = (string) $decoded['message'];
		} elseif ( ! empty( $decoded['exc_type'] ) ) {
			$detail = (string) $decoded['exc_type'];
		} elseif ( ! empty( $decoded['_server_messages'] ) ) {
			$detail = wp_strip_all_tags( (string) $decoded['_server_messages'] );
		} elseif ( ! empty( $decoded['error'] ) ) {
			$detail = (string) $decoded['error'];
		} elseif ( ! empty( $decoded['body'] ) ) {
			$detail = wp_strip_all_tags( (string) $decoded['body'] );
		}

		$detail = wp_strip_all_tags( $detail );
		$blob   = strtolower( $detail . ' ' . $response );
		$is_dup = ( false !== strpos( $blob, 'duplicate' ) || false !== strpos( $blob, 'duplicateentryerror' ) );

		if ( strlen( $detail ) > 500 ) {
			$detail = substr( $detail, 0, 500 ) . '…';
		}

		if ( $is_dup ) {
			return array(
				'status'    => 'duplicate',
				'detail'    => '' !== $detail ? $detail : 'Duplicate entry in ERP',
				'lead_name' => $lead_name,
			);
		}

		if ( $success ) {
			$env  = function_exists( 'scf_is_admin_email_test_mode' ) && scf_is_admin_email_test_mode() ? 'UAT' : 'Production';
			$note = $lead_name ? $lead_name . ' (' . $env . ')' : 'Lead created (' . $env . ')';
			return array(
				'status'    => 'synced',
				'detail'    => $note,
				'lead_name' => $lead_name,
			);
		}

		if ( '' === $detail ) {
			$detail = '' !== $response ? wp_trim_words( wp_strip_all_tags( $response ), 30 ) : 'ERP did not return a Lead';
		}

		return array(
			'status'    => 'failed',
			'detail'    => $detail,
			'lead_name' => $lead_name,
		);
	}
}

