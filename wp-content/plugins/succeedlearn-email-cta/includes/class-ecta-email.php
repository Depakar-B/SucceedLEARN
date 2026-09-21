<?php
/**
 * Admin and user email notifications (mirrors SCF contact form behaviour).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_ECTA_Email {

	/** @var bool */
	private $is_sending = false;

	/**
	 * Default production admin recipients (same list as SCF).
	 *
	 * @return array<int, string>
	 */
	public function get_admin_email_recipients() {
		if ( function_exists( 'scf_is_admin_email_test_mode' ) && scf_is_admin_email_test_mode() ) {
			$recipients = array( 'depakar@succeedtech.com' );
		} else {
			$recipients = array(
				'santhosh.kt@succeedtech.com',
				'vivek@succeedtech.com',
				'Vinay@succeedtech.com',
				'vishwadeep@succeedtech.com',
				'vridhi.shah@succeedtech.com',
				'pooja.wagh@succeedtech.com',
				'depakar@succeedtech.com',
				'sanmathi@succeedtech.com',
			);
		}

		/**
		 * Filter Email CTA admin recipients.
		 *
		 * @param array $recipients Email addresses.
		 */
		$recipients = apply_filters( 'sl_ecta_admin_email_recipients', $recipients );

		// Fall back to SCF filter if our filter left the default and SCF is loaded.
		if ( has_filter( 'scf_admin_email_recipients' ) ) {
			$recipients = apply_filters( 'scf_admin_email_recipients', $recipients );
		}

		return array_values(
			array_unique(
				array_filter(
					array_map( 'sanitize_email', (array) $recipients ),
					'is_email'
				)
			)
		);
	}

	/**
	 * Send both admin and user emails.
	 *
	 * @param array $data Submission data.
	 */
	public function send_all( $data ) {
		$this->send_admin_email( $data );
		$this->send_user_email( $data );
	}

	/**
	 * @param array $data Submission data.
	 */
	public function send_admin_email( $data ) {
		$admin_emails = $this->get_admin_email_recipients();
		if ( empty( $admin_emails ) ) {
			$this->log( 'No admin recipients configured' );
			return;
		}

		$test_prefix = ( function_exists( 'scf_is_admin_email_test_mode' ) && scf_is_admin_email_test_mode() )
			? '[TEST] '
			: '';

		$subject = $test_prefix . sprintf(
			/* translators: %s: submitter email */
			__( 'New Email CTA from %s', 'succeedlearn-email-cta' ),
			$data['email']
		);

		$headers = $this->build_mail_headers( $data['email'], $data['email'] );

		$body = sprintf(
			'<h2>%1$s</h2>
			<p><strong>%2$s</strong> %3$s</p>
			<p><strong>%4$s</strong> %5$s</p>
			<p><strong>%6$s</strong> %7$s</p>
			<p><strong>%8$s</strong> <a href="%9$s">%9$s</a></p>
			<p><strong>%10$s</strong> %11$s</p>
			<p><strong>%12$s</strong> %13$s</p>',
			esc_html__( 'New Email CTA Submission', 'succeedlearn-email-cta' ),
			esc_html__( 'Email:', 'succeedlearn-email-cta' ),
			esc_html( $data['email'] ),
			esc_html__( 'Source:', 'succeedlearn-email-cta' ),
			esc_html( $data['source'] ?? 'EmailCTA' ),
			esc_html__( 'UTM Source:', 'succeedlearn-email-cta' ),
			esc_html( ! empty( $data['utm_source'] ) ? $data['utm_source'] : 'Direct' ),
			esc_html__( 'Page URL:', 'succeedlearn-email-cta' ),
			esc_url( $data['page_url'] ?? '' ),
			esc_html__( 'IP:', 'succeedlearn-email-cta' ),
			esc_html( $data['user_ip'] ?? '' ),
			esc_html__( 'Form:', 'succeedlearn-email-cta' ),
			esc_html__( 'Email CTA', 'succeedlearn-email-cta' )
		);

		foreach ( $admin_emails as $to ) {
			$this->dispatch_mail( $to, $subject, $body, $headers, 'admin' );
		}
	}

	/**
	 * @param array $data Submission data.
	 */
	public function send_user_email( $data ) {
		if ( ! is_email( $data['email'] ) ) {
			$this->log( 'Invalid user email address: ' . ( $data['email'] ?? '' ) );
			return;
		}
		if ( ! $this->can_send_user_reply_email( $data['email'] ) ) {
			$this->log( 'User confirmation suppressed because reply limit reached for: ' . $data['email'] );
			return;
		}

		$subject = __( 'We received your message', 'succeedlearn-email-cta' );
		$headers = $this->build_mail_headers();

		$body = sprintf(
			'<p>%1$s</p>
			<p>%2$s</p>
			<p>%3$s<br/>%4$s</p>',
			esc_html__( 'Hi,', 'succeedlearn-email-cta' ),
			esc_html__( 'Thanks for reaching out to SucceedLEARN. Our team will contact you soon.', 'succeedlearn-email-cta' ),
			esc_html__( 'Regards,', 'succeedlearn-email-cta' ),
			esc_html__( 'SucceedLEARN Team', 'succeedlearn-email-cta' )
		);

		$sent = $this->dispatch_mail( $data['email'], $subject, $body, $headers, 'user' );
		if ( $sent ) {
			$this->increment_user_reply_email_count( $data['email'] );
		}
	}

	/**
	 * @param WP_Error $error Mail error.
	 */
	public function log_wp_mail_error( $error ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG && is_wp_error( $error ) ) {
			error_log( 'SL_ECTA wp_mail Error: ' . $error->get_error_message() ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		}
	}

	/**
	 * @return string
	 */
	private function get_mail_from_email() {
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
	 * @return string
	 */
	private function get_mail_from_name() {
		$postman = get_option( 'postman_options', array() );
		if ( is_array( $postman ) && ! empty( $postman['sender_name'] ) ) {
			return sanitize_text_field( (string) $postman['sender_name'] );
		}

		$site_name = get_bloginfo( 'name' );
		return $site_name ? $site_name : 'SucceedLEARN';
	}

	/**
	 * @param string $reply_name  Reply-to name.
	 * @param string $reply_email Reply-to email.
	 * @return array<int, string>
	 */
	private function build_mail_headers( $reply_name = '', $reply_email = '' ) {
		$from_email = $this->get_mail_from_email();
		$from_name  = $this->get_mail_from_name();
		$headers    = array(
			'Content-Type: text/html; charset=UTF-8',
			sprintf( 'From: %s <%s>', $from_name, $from_email ),
		);

		if ( ! empty( $reply_email ) && is_email( $reply_email ) ) {
			$safe_name = sanitize_text_field( $reply_name );
			$headers[] = sprintf(
				'Reply-To: %s <%s>',
				$safe_name ? $safe_name : sanitize_email( $reply_email ),
				sanitize_email( $reply_email )
			);
		}

		return $headers;
	}

	/**
	 * Scoped wp_mail_from filter.
	 *
	 * @param string $email Original from email.
	 * @return string
	 */
	public function filter_from_email( $email ) {
		if ( $this->is_sending ) {
			return $this->get_mail_from_email();
		}
		return $email;
	}

	/**
	 * Scoped wp_mail_from_name filter.
	 *
	 * @param string $name Original from name.
	 * @return string
	 */
	public function filter_from_name( $name ) {
		if ( $this->is_sending ) {
			return $this->get_mail_from_name();
		}
		return $name;
	}

	/**
	 * @param string|array $recipients Recipient email(s).
	 * @param string       $subject    Email subject.
	 * @param string       $body       HTML body.
	 * @param array        $headers    Mail headers.
	 * @param string       $type       admin|user.
	 * @return bool
	 */
	private function dispatch_mail( $recipients, $subject, $body, $headers, $type ) {
		if ( ! function_exists( 'wp_mail' ) ) {
			$this->log( 'wp_mail function does not exist!' );
			return false;
		}

		$valid = array();
		foreach ( (array) $recipients as $email ) {
			if ( is_email( $email ) ) {
				$valid[] = $email;
			} else {
				$this->log( 'Invalid ' . $type . ' email address: ' . $email );
			}
		}

		if ( empty( $valid ) ) {
			$this->log( 'No valid ' . $type . ' email addresses to send to' );
			return false;
		}

		$this->log( 'Sending ' . $type . ' email to: ' . implode( ', ', $valid ) );

		$this->is_sending = true;
		add_filter( 'wp_mail_from', array( $this, 'filter_from_email' ) );
		add_filter( 'wp_mail_from_name', array( $this, 'filter_from_name' ) );

		$result = wp_mail( $valid, $subject, $body, $headers );

		remove_filter( 'wp_mail_from', array( $this, 'filter_from_email' ) );
		remove_filter( 'wp_mail_from_name', array( $this, 'filter_from_name' ) );
		$this->is_sending = false;

		if ( $result ) {
			$this->log( ucfirst( $type ) . ' email sent successfully' );
		} else {
			$this->log( ucfirst( $type ) . ' email failed to send' );
		}

		return (bool) $result;
	}

	/**
	 * @param string $email User email.
	 * @return bool
	 */
	private function can_send_user_reply_email( $email ) {
		$normalized_email = strtolower( sanitize_email( $email ) );
		if ( '' === $normalized_email ) {
			return false;
		}
		if ( $this->is_user_reply_email_exempt( $normalized_email ) ) {
			return true;
		}
		$max_replies = (int) apply_filters( 'succeedlearn_user_reply_limit', 2, $normalized_email );
		if ( $max_replies < 1 ) {
			$max_replies = 1;
		}
		$current_count = (int) get_option( $this->get_user_reply_email_count_option_key( $normalized_email ), 0 );
		return $current_count < $max_replies;
	}

	/**
	 * @param string $email User email.
	 */
	private function increment_user_reply_email_count( $email ) {
		$normalized_email = strtolower( sanitize_email( $email ) );
		if ( '' === $normalized_email ) {
			return;
		}
		$option_key   = $this->get_user_reply_email_count_option_key( $normalized_email );
		$current      = (int) get_option( $option_key, 0 );
		$next_counter = $current + 1;
		if ( false === get_option( $option_key, false ) ) {
			add_option( $option_key, $next_counter, '', false );
			return;
		}
		update_option( $option_key, $next_counter, false );
	}

	/**
	 * @param string $normalized_email Normalized email.
	 * @return string
	 */
	private function get_user_reply_email_count_option_key( $normalized_email ) {
		// Separate counter from the full contact forms so CTA confirmations are not blocked
		// by prior [contact_form] replies on the same address.
		return 'sl_ecta_user_reply_count_' . md5( $normalized_email );
	}

	/**
	 * @param string $normalized_email Normalized email.
	 * @return bool
	 */
	private function is_user_reply_email_exempt( $normalized_email ) {
		$default_exempt = array( 'depakar@succeedtech.com' );
		$exempt_emails  = apply_filters( 'succeedlearn_user_reply_exempt_emails', $default_exempt );
		$exempt_emails  = is_array( $exempt_emails ) ? $exempt_emails : array();
		$exempt_emails  = array_filter(
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
	 * @param string $message Debug message.
	 */
	private function log( $message ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			error_log( 'SL_ECTA: ' . $message ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		}
	}
}
