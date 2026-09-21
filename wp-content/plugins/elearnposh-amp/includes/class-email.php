<?php
/**
 * Email Sending Class
 *
 * Handles email sending using WordPress wp_mail with SMTP support
 *
 * @package ElearnPOSH\AMP
 */

namespace ElearnPOSH\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Email Class
 */
class Email {

	/** Primary admin contact (legacy constant / admin UI label). */
	const ADMIN_RECIPIENT = 'depakar@succeedtech.com';

	/**
	 * Default admin notification recipients for contact form submissions.
	 *
	 * @return array<int, string>
	 */
	public static function get_default_admin_recipients() {
		$recipients = array(
			'santhosh.kt@succeedtech.com',
			'vivek@succeedtech.com',
			'vinay@succeedtech.com',
			'pooja.wagh@succeedtech.com',
			'vridhi.shah@succeedtech.com',
			'vishwadeep@succeedtech.com',
			'depakar@succeedtech.com',
		);

		// Prefer shared legacy/desktop list when available.
		if ( function_exists( 'elearnposh_get_admin_mail_recipients' ) ) {
			$shared = elearnposh_get_admin_mail_recipients();
			if ( ! empty( $shared ) ) {
				$recipients = $shared;
			}
		}

		return apply_filters( 'elearnposh_amp_default_contact_email_recipients', $recipients );
	}

	/**
	 * Resolve admin notification recipients for contact form submissions.
	 *
	 * Prefers saved plugin settings, then defaults, then optional wp-config constant.
	 *
	 * @return array<int, string>
	 */
	private static function get_admin_recipients() {
		if ( defined( 'ELEARNPOSH_FORM_EMAIL_TEST_MODE' ) && ELEARNPOSH_FORM_EMAIL_TEST_MODE ) {
			$test = defined( 'ELEARNPOSH_FORM_EMAIL_TEST_RECIPIENT' ) && is_email( ELEARNPOSH_FORM_EMAIL_TEST_RECIPIENT )
				? sanitize_email( ELEARNPOSH_FORM_EMAIL_TEST_RECIPIENT )
				: 'depakar@succeedtech.com';
			return array( $test );
		}

		$recipients = array();

		$settings = get_option( 'elearnposh_amp_settings', array() );
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

		if ( defined( 'ELEARNPOSH_AMP_ADMIN_EMAIL' ) && is_email( ELEARNPOSH_AMP_ADMIN_EMAIL ) ) {
			$extra = sanitize_email( ELEARNPOSH_AMP_ADMIN_EMAIL );
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

		return apply_filters( 'elearnposh_amp_contact_email_recipients', $recipients );
	}

	/**
	 * Resolve the outbound From address for wp_mail.
	 *
	 * POST SMTP rejects mail when the From header does not match the authenticated
	 * SMTP account (SMTP Error: data not accepted / SendAsDenied).
	 *
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

		return 'noreply@elearnposh.com';
	}

	/**
	 * Build standard HTML mail headers aligned with POST SMTP / wp_mail.
	 *
	 * @param string $reply_name Optional reply-to display name.
	 * @param string $reply_email Optional reply-to email.
	 * @return array<int, string>
	 */
	private static function build_mail_headers( $reply_name = '', $reply_email = '' ) {
		$site_name  = get_bloginfo( 'name' );
		$from_email = self::get_from_email();

		$headers = array(
			'Content-Type: text/html; charset=UTF-8',
			sprintf( 'From: %s <%s>', $site_name ? $site_name : 'eLearnPOSH', $from_email ),
		);

		if ( $reply_email && is_email( $reply_email ) ) {
			$safe_name = sanitize_text_field( $reply_name );
			$headers[] = sprintf( 'Reply-To: %s <%s>', $safe_name ? $safe_name : $reply_email, sanitize_email( $reply_email ) );
		}

		return $headers;
	}

	/**
	 * Log wp_mail failures with PHPMailer detail when available.
	 *
	 * @param string               $context Short context label.
	 * @param string|array<string> $to Recipient(s).
	 * @param bool                 $sent Whether wp_mail returned true.
	 */
	private static function log_mail_result( $context, $to, $sent ) {
		if ( $sent ) {
			return;
		}

		global $phpmailer;
		$recipient = is_array( $to ) ? implode( ', ', $to ) : $to;
		$error     = 'unknown';

		if ( is_object( $phpmailer ) && ! empty( $phpmailer->ErrorInfo ) ) {
			$error = $phpmailer->ErrorInfo;
		}

		// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		error_log( sprintf( 'eLearnPOSH contact mail failed (%s) to %s: %s', $context, $recipient, $error ) );
	}

	/**
	 * Send contact form email to admins.
	 *
	 * @param string $name Name.
	 * @param string $email Email.
	 * @param string $phone Phone.
	 * @param string $org Organization.
	 * @param string $msg Message.
	 * @param string $privacy Privacy consent.
	 * @param bool   $posh POSH updates consent.
	 * @param string $utm UTM / traffic source label (optional).
	 * @param string $page_source Page name for email subject (optional).
	 * @param string $page_url Page URL where the form was submitted (optional).
	 * @param string $ip Client IP address (optional).
	 * @return bool Whether email was sent successfully.
	 */
	public static function send_contact_email( $name, $email, $phone, $org, $msg, $privacy, $posh, $utm = '', $page_source = '', $page_url = '', $ip = '' ) {
		$recipients = self::get_admin_recipients();
		if ( empty( $recipients ) ) {
			return false;
		}

		$subject = sprintf(
			'New form submission from eLearnPOSH - %s',
			sanitize_text_field( $page_source ? $page_source : 'Contact Us Page' )
		);
		$message = self::build_email_template( $name, $email, $phone, $org, $msg, $privacy, $posh, $utm, $page_source, $page_url, $ip );
		$headers = self::build_mail_headers( $name, $email );

		$sent = wp_mail( $recipients, $subject, $message, $headers );
		self::log_mail_result( 'admin', $recipients, $sent );

		return $sent;
	}

	/**
	 * Send confirmation email to the user with brochure attachment.
	 *
	 * @param string $name User name.
	 * @param string $email User email.
	 * @return bool Whether email was sent successfully.
	 */
	public static function send_user_confirmation_email( $name, $email ) {
		if ( empty( $email ) || ! is_email( $email ) ) {
			return false;
		}

		$subject       = __( 'Thank you for contacting eLearnPOSH', 'elearnposh-amp' );
		$headers       = self::build_mail_headers();
		$brochure_path = self::resolve_brochure_attachment();

		if ( $brochure_path ) {
			$message = self::build_user_confirmation_template( $name, true );
			$sent    = wp_mail( $email, $subject, $message, $headers, array( $brochure_path ) );
			self::log_mail_result( 'user-with-attachment', $email, $sent );
			if ( $sent ) {
				return true;
			}
		}

		$message = self::build_user_confirmation_template( $name, false );
		$sent    = wp_mail( $email, $subject, $message, $headers );
		self::log_mail_result( 'user', $email, $sent );

		return $sent;
	}

	/**
	 * Resolve brochure file path for user email attachment.
	 *
	 * @return string Local file path, or empty string when unavailable.
	 */
	private static function resolve_brochure_attachment() {
		$config = new Config();
		$source = $config->get( 'contact_user_email_brochure_url', 'https://elearnposh.com/eLearnPOSH-Brochure-2026.pdf' );

		if ( empty( $source ) ) {
			return '';
		}

		if ( file_exists( $source ) ) {
			return $source;
		}

		$upload_dir = wp_upload_dir();
		if ( ! empty( $upload_dir['error'] ) ) {
			return '';
		}

		$cache_dir  = trailingslashit( $upload_dir['basedir'] ) . 'elearnposh-amp';
		$cache_file = trailingslashit( $cache_dir ) . 'eLearnPOSH-Brochure-2026.pdf';

		if ( file_exists( $cache_file ) ) {
			return $cache_file;
		}

		$response = wp_remote_get(
			$source,
			array(
				'timeout' => 5,
			)
		);

		if ( is_wp_error( $response ) || 200 !== (int) wp_remote_retrieve_response_code( $response ) ) {
			return '';
		}

		$body = wp_remote_retrieve_body( $response );
		if ( empty( $body ) ) {
			return '';
		}

		if ( ! wp_mkdir_p( $cache_dir ) ) {
			return '';
		}

		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_file_put_contents
		if ( false === file_put_contents( $cache_file, $body ) ) {
			return '';
		}

		return $cache_file;
	}

	/**
	 * Build admin notification email HTML template.
	 *
	 * Matches desktop contact-func-mail/mailsend.php structure.
	 *
	 * @param string $name Name.
	 * @param string $email Email.
	 * @param string $phone Phone.
	 * @param string $org Organization.
	 * @param string $msg Message.
	 * @param string $privacy Privacy consent.
	 * @param bool   $posh POSH updates consent.
	 * @param string $utm UTM / traffic source label (optional).
	 * @param string $page_source Page name for the Page row (optional).
	 * @param string $page_url Page URL where the form was submitted (optional).
	 * @param string $ip Client IP address (optional).
	 * @return string HTML email content.
	 */
	private static function build_email_template( $name, $email, $phone, $org, $msg, $privacy, $posh, $utm = '', $page_source = '', $page_url = '', $ip = '' ) {
		$privacy_text = ! empty( $privacy ) ? 'Yes' : 'No';
		$posh_text    = $posh ? 'Yes' : 'No';
		$page_label   = $page_source ? $page_source : 'Contact Us Page';
		$page_url      = esc_url( $page_url );
		$page_url_cell = $page_url
			? '<a href="' . $page_url . '">' . esc_html( $page_url ) . '</a>'
			: 'N/A';
		$msg_cell    = ( '' !== trim( (string) $msg ) ) ? nl2br( esc_html( $msg ) ) : 'N/A';
		$utm_display = '' !== trim( (string) $utm ) ? $utm : 'N/A';
		if ( '' === trim( (string) $ip ) && function_exists( 'elearnposh_get_client_ip' ) ) {
			$ip = elearnposh_get_client_ip();
		}
		$ip_display = '' !== trim( (string) $ip ) ? $ip : 'N/A';

		$html = '
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
					<tr><td><strong>POSH: </strong></td><td>' . esc_html( $posh_text ) . '</td></tr>
					<tr><td><strong>Page: </strong></td><td>' . esc_html( $page_label ) . '</td></tr>
					<tr><td><strong>Page URL: </strong></td><td>' . $page_url_cell . '</td></tr>
					<tr><td><strong>UTM Source: </strong></td><td>' . esc_html( $utm_display ) . '</td></tr>
					<tr><td><strong>IP Address: </strong></td><td>' . esc_html( $ip_display ) . '</td></tr>
				</table>
				<p>This message is from elearnposh.com</p>
			</body>
		</html>
		';

		return $html;
	}

	/**
	 * Build user confirmation email HTML template.
	 *
	 * @param string $name User name.
	 * @param bool   $with_brochure Whether brochure attachment is included.
	 * @return string HTML email content.
	 */
	private static function build_user_confirmation_template( $name, $with_brochure = true ) {
		$greeting_name = $name ? esc_html( $name ) : __( 'there', 'elearnposh-amp' );

		$brochure_line = $with_brochure
			? '<p>' . esc_html__( 'Please find our product brochure attached for your reference.', 'elearnposh-amp' ) . '</p>'
			: '';

		return '
		<html>
			<body style="font-family: Arial, sans-serif; color: #2d3748; line-height: 1.6;">
				<p>' . sprintf(
					/* translators: %s: user name */
					esc_html__( 'Dear %s,', 'elearnposh-amp' ),
					$greeting_name
				) . '</p>
				<p>' . esc_html__( 'Thank you for reaching out to eLearnPOSH. We have received your request and our team will be in touch with you shortly.', 'elearnposh-amp' ) . '</p>
				' . $brochure_line . '
				<p>' . esc_html__( 'Best regards,', 'elearnposh-amp' ) . '<br>' . esc_html__( 'eLearnPOSH Team', 'elearnposh-amp' ) . '</p>
			</body>
		</html>';
	}
}
