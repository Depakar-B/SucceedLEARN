<?php
/**
 * Email Sending Class
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Email Class
 */
class Email {

	const ADMIN_RECIPIENT = 'sales@succeedtech.com';

	/**
	 * @return array<int, string>
	 */
	public static function get_default_admin_recipients() {
		$recipients = array(
			'sales@succeedtech.com',
			'info@succeedtech.com',
		);
		return apply_filters( 'succeedlearn_amp_default_contact_email_recipients', $recipients );
	}

	/**
	 * @return array<int, string>
	 */
	private static function get_admin_recipients() {
		if ( function_exists( 'scf_is_admin_email_test_mode' ) && scf_is_admin_email_test_mode() ) {
			$test_recipient = class_exists( 'SCF_Contact_Form_Plugin' )
				? \SCF_Contact_Form_Plugin::ADMIN_EMAIL_TEST_RECIPIENT
				: 'depakar@succeedtech.com';
			return array( sanitize_email( $test_recipient ) );
		}

		if ( defined( 'SUCCEEDLEARN_FORM_EMAIL_TEST_MODE' ) && SUCCEEDLEARN_FORM_EMAIL_TEST_MODE ) {
			$test = defined( 'SUCCEEDLEARN_FORM_EMAIL_TEST_RECIPIENT' ) && is_email( SUCCEEDLEARN_FORM_EMAIL_TEST_RECIPIENT )
				? sanitize_email( SUCCEEDLEARN_FORM_EMAIL_TEST_RECIPIENT )
				: self::ADMIN_RECIPIENT;
			return array( $test );
		}

		$recipients = array();
		$settings   = get_option( 'succeedlearn_amp_settings', array() );
		if ( is_array( $settings ) && ! empty( $settings['contact_email_recipients'] ) ) {
			$saved = $settings['contact_email_recipients'];
			if ( is_string( $saved ) ) {
				$saved = preg_split( '/[\s,;]+/', $saved );
			}
			if ( is_array( $saved ) ) {
				$recipients = $saved;
			}
		}

		if ( empty( $recipients ) ) {
			$recipients = self::get_default_admin_recipients();
		}

		if ( defined( 'SUCCEEDLEARN_AMP_ADMIN_EMAIL' ) && is_email( SUCCEEDLEARN_AMP_ADMIN_EMAIL ) ) {
			$extra = sanitize_email( SUCCEEDLEARN_AMP_ADMIN_EMAIL );
			if ( ! in_array( $extra, $recipients, true ) ) {
				$recipients[] = $extra;
			}
		}

		$recipients = array_values(
			array_unique(
				array_filter(
					array_map( 'sanitize_email', $recipients ),
					'is_email'
				)
			)
		);

		return apply_filters( 'succeedlearn_amp_contact_email_recipients', $recipients );
	}

	/**
	 * @return string
	 */
	private static function get_from_email() {
		$postman = get_option( 'postman_options', array() );
		if ( is_array( $postman ) && ! empty( $postman['sender_email'] ) && is_email( $postman['sender_email'] ) ) {
			return sanitize_email( $postman['sender_email'] );
		}
		$admin_email = get_option( 'admin_email' );
		if ( $admin_email && is_email( $admin_email ) ) {
			return sanitize_email( $admin_email );
		}
		return 'noreply@succeedlearn.com';
	}

	/**
	 * @param string $reply_name Reply name.
	 * @param string $reply_email Reply email.
	 * @return array<int, string>
	 */
	private static function build_mail_headers( $reply_name = '', $reply_email = '' ) {
		$site_name  = get_bloginfo( 'name' );
		$from_email = self::get_from_email();
		$headers    = array(
			'Content-Type: text/html; charset=UTF-8',
			sprintf( 'From: %s <%s>', $site_name ? $site_name : 'SucceedLEARN', $from_email ),
		);
		if ( $reply_email && is_email( $reply_email ) ) {
			$safe_name = sanitize_text_field( $reply_name );
			$headers[] = sprintf( 'Reply-To: %s <%s>', $safe_name ? $safe_name : $reply_email, sanitize_email( $reply_email ) );
		}
		return $headers;
	}

	/**
	 * @param string               $context Context.
	 * @param string|array<string> $to Recipients.
	 * @param bool                 $sent Sent flag.
	 */
	private static function log_mail_result( $context, $to, $sent ) {
		if ( $sent ) {
			return;
		}
		global $phpmailer;
		$recipient = is_array( $to ) ? implode( ', ', $to ) : $to;
		$error     = ( is_object( $phpmailer ) && ! empty( $phpmailer->ErrorInfo ) ) ? $phpmailer->ErrorInfo : 'unknown';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		error_log( sprintf( 'SucceedLEARN contact mail failed (%s) to %s: %s', $context, $recipient, $error ) );
	}

	/**
	 * @return bool
	 */
	public static function send_contact_email( $name, $email, $phone, $org, $msg, $privacy, $posh, $utm = '', $page_source = '', $page_url = '', $ip = '' ) {
		$recipients = self::get_admin_recipients();
		if ( empty( $recipients ) ) {
			return false;
		}
		$subject = sprintf(
			'New form submission from SucceedLEARN - %s',
			sanitize_text_field( $page_source ? $page_source : 'Home Page' )
		);
		$message = self::build_email_template( $name, $email, $phone, $org, $msg, $privacy, $posh, $utm, $page_source, $page_url, $ip );
		$headers = self::build_mail_headers( $name, $email );
		$sent    = wp_mail( $recipients, $subject, $message, $headers );
		self::log_mail_result( 'admin', $recipients, $sent );
		return $sent;
	}

	/**
	 * @return bool
	 */
	public static function send_user_confirmation_email( $name, $email ) {
		if ( empty( $email ) || ! is_email( $email ) ) {
			return false;
		}
		if ( ! self::can_send_user_confirmation_email( $email ) ) {
			return false;
		}
		$subject = __( 'Thank you for contacting SucceedLEARN', 'succeedlearn-amp' );
		$headers = self::build_mail_headers();
		$message = self::build_user_confirmation_template( $name );
		$sent    = wp_mail( $email, $subject, $message, $headers );
		self::log_mail_result( 'user', $email, $sent );
		if ( $sent ) {
			self::increment_user_confirmation_email_count( $email );
		}
		return $sent;
	}

	/**
	 * @param string $email User email.
	 * @return bool
	 */
	private static function can_send_user_confirmation_email( $email ) {
		$normalized_email = strtolower( sanitize_email( $email ) );
		if ( '' === $normalized_email ) {
			return false;
		}
		if ( self::is_user_reply_email_exempt( $normalized_email ) ) {
			return true;
		}
		$max_replies = (int) apply_filters( 'succeedlearn_user_reply_limit', 2, $normalized_email );
		if ( $max_replies < 1 ) {
			$max_replies = 1;
		}
		$current_count = (int) get_option( self::get_user_confirmation_count_option_key( $normalized_email ), 0 );
		return $current_count < $max_replies;
	}

	/**
	 * @param string $email User email.
	 * @return void
	 */
	private static function increment_user_confirmation_email_count( $email ) {
		$normalized_email = strtolower( sanitize_email( $email ) );
		if ( '' === $normalized_email ) {
			return;
		}
		$option_key   = self::get_user_confirmation_count_option_key( $normalized_email );
		$current      = (int) get_option( $option_key, 0 );
		$next_counter = $current + 1;
		if ( false === get_option( $option_key, false ) ) {
			add_option( $option_key, $next_counter, '', false );
			return;
		}
		update_option( $option_key, $next_counter, false );
	}

	/**
	 * @param string $normalized_email Sanitized email.
	 * @return string
	 */
	private static function get_user_confirmation_count_option_key( $normalized_email ) {
		return 'succeedlearn_user_reply_count_' . md5( $normalized_email );
	}

	/**
	 * @param string $normalized_email Normalized email.
	 * @return bool
	 */
	private static function is_user_reply_email_exempt( $normalized_email ) {
		$default_exempt = array(
			'depakar@succeedtech.com',
		);
		$exempt_emails = apply_filters( 'succeedlearn_user_reply_exempt_emails', $default_exempt );
		$exempt_emails = is_array( $exempt_emails ) ? $exempt_emails : array();
		$exempt_emails = array_filter(
			array_map(
				static function ( $email ) {
					return strtolower( sanitize_email( (string) $email ) );
				},
				$exempt_emails
			)
		);
		return in_array( $normalized_email, $exempt_emails, true );
	}

	/**
	 * @return string
	 */
	private static function build_email_template( $name, $email, $phone, $org, $msg, $privacy, $posh, $utm = '', $page_source = '', $page_url = '', $ip = '' ) {
		$privacy_text  = ! empty( $privacy ) ? 'Yes' : 'No';
		$updates_text  = $posh ? 'Yes' : 'No';
		$page_label    = $page_source ? $page_source : 'Home Page';
		$page_url      = esc_url( $page_url );
		$page_url_cell = $page_url ? '<a href="' . $page_url . '">' . esc_html( $page_url ) . '</a>' : 'N/A';
		$msg_cell      = ( '' !== trim( (string) $msg ) ) ? nl2br( esc_html( $msg ) ) : 'N/A';
		$utm_display   = '' !== trim( (string) $utm ) ? $utm : 'N/A';
		$ip_display    = '' !== trim( (string) $ip ) ? $ip : 'N/A';

		return '
		<html>
			<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
			<body>
				<table style="width:600px;">
					<tr><td style="width:150px"><strong>Name: </strong></td><td style="width:400px">' . esc_html( $name ) . '</td></tr>
					<tr><td><strong>Email ID: </strong></td><td>' . esc_html( $email ) . '</td></tr>
					<tr><td><strong>Mobile No: </strong></td><td>' . esc_html( $phone ) . '</td></tr>
					<tr><td><strong>Organization: </strong></td><td>' . esc_html( $org ) . '</td></tr>
					<tr><td><strong>Message: </strong></td><td>' . $msg_cell . '</td></tr>
					<tr><td><strong>Privacy: </strong></td><td>' . esc_html( $privacy_text ) . '</td></tr>
					<tr><td><strong>Updates: </strong></td><td>' . esc_html( $updates_text ) . '</td></tr>
					<tr><td><strong>Page: </strong></td><td>' . esc_html( $page_label ) . '</td></tr>
					<tr><td><strong>Page URL: </strong></td><td>' . $page_url_cell . '</td></tr>
					<tr><td><strong>UTM Source: </strong></td><td>' . esc_html( $utm_display ) . '</td></tr>
					<tr><td><strong>IP Address: </strong></td><td>' . esc_html( $ip_display ) . '</td></tr>
				</table>
				<p>This message is from succeedlearn.com</p>
			</body>
		</html>';
	}

	/**
	 * @param string $name Name.
	 * @return string
	 */
	private static function build_user_confirmation_template( $name ) {
		$greeting_name = $name ? esc_html( $name ) : __( 'there', 'succeedlearn-amp' );
		return '
		<html>
			<body style="font-family: Arial, sans-serif; color: #2d3748; line-height: 1.6;">
				<p>' . sprintf(
					/* translators: %s: user name */
					esc_html__( 'Dear %s,', 'succeedlearn-amp' ),
					$greeting_name
				) . '</p>
				<p>' . esc_html__( 'Thank you for reaching out to SucceedLEARN. We have received your request and our team will be in touch with you shortly.', 'succeedlearn-amp' ) . '</p>
				<p>' . esc_html__( 'Best regards,', 'succeedlearn-amp' ) . '<br>' . esc_html__( 'SucceedLEARN Team', 'succeedlearn-amp' ) . '</p>
			</body>
		</html>';
	}
}
