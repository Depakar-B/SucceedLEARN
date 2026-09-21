<?php
/**
 * Admin and user email notifications (mirrors SCF contact form behaviour).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SSF_Email {

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
	 * Send admin notification.
	 *
	 * @param array $data Submission data.
	 */
	public function send_admin_email( $data ) {
		$variant      = SSF_Variants::normalize( $data['form_variant'] ?? SSF_Variants::DEFAULT );
		$config       = SSF_Variants::get( $variant );
		$admin_emails = function_exists( 'ssf_get_admin_email_recipients' )
			? ssf_get_admin_email_recipients( $variant )
			: array( SSF_ADMIN_EMAIL );

		$subject = sprintf(
			$config['admin_subject'],
			$data['name']
		);

		if ( function_exists( 'ssf_is_admin_email_test_mode' ) && ssf_is_admin_email_test_mode() ) {
			$subject = '[TEST] ' . $subject;
		}

		$headers = array(
			'Content-Type: text/html; charset=UTF-8',
			'From: SucceedLEARN <noreply@succeedlearn.com>',
			'Reply-To: ' . $data['name'] . ' <' . $data['email'] . '>',
		);

		$utm_source_display = ! empty( $data['utm_source'] ) ? $data['utm_source'] : 'Direct';
		$employees_display  = ! empty( $data['employees'] ) ? $data['employees'] : 'N/A';
		$job_title_display  = ! empty( $data['job_title'] ) ? $data['job_title'] : 'N/A';
		$authorised_display = ! empty( $data['authorised_confirm'] ) ? 'Yes' : 'No';

		$extra_rows = '';
		if ( SSF_Variants::is_infosec( $variant ) ) {
			$extra_rows .= '<p><strong>Job Title:</strong> ' . esc_html( $job_title_display ) . '</p>';
			$extra_rows .= '<p><strong>Authorized for phishing simulation enquiry:</strong> ' . esc_html( $authorised_display ) . '</p>';
		}

		$message_row = '';
		if ( ! empty( $data['message'] ) ) {
			$message_row = '<p><strong>Message:</strong><br/>' . nl2br( esc_html( $data['message'] ) ) . '</p>';
		}

		$body = sprintf(
			'<h2>%1$s</h2>
			<p><strong>Variant:</strong> %2$s</p>
			<p><strong>Name:</strong> %3$s</p>
			<p><strong>Email:</strong> %4$s</p>
			%5$s
			<p><strong>%6$s:</strong> %7$s</p>
			%8$s
			<p><strong>UTM Source:</strong> %9$s</p>
			<p><strong>Source Tag:</strong> %10$s</p>
			<p><strong>Page URL:</strong> <a href="%11$s">%11$s</a></p>
			<p><strong>IP:</strong> %12$s</p>',
			esc_html( $config['admin_heading'] ),
			esc_html( $variant ),
			esc_html( $data['name'] ),
			esc_html( $data['email'] ),
			$extra_rows,
			esc_html( $config['employees_label'] ),
			esc_html( $employees_display ),
			$message_row,
			esc_html( $utm_source_display ),
			esc_html( $data['source_tag'] ?? '' ),
			esc_url( $data['page_url'] ?? '' ),
			esc_html( $data['user_ip'] ?? '' )
		);

		/**
		 * Filter the cybersecurity form admin email HTML body.
		 *
		 * @param string $body Email HTML.
		 * @param array  $data Submission data.
		 */
		$body = apply_filters( 'ssf_admin_email_body', $body, $data );

		$this->dispatch_mail( $admin_emails, $subject, $body, $headers, 'admin' );
	}

	/**
	 * Send confirmation email to the user who submitted the form.
	 *
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

		$variant = SSF_Variants::normalize( $data['form_variant'] ?? SSF_Variants::DEFAULT );
		$config  = SSF_Variants::get( $variant );

		$subject = $config['user_subject'];
		$headers = array(
			'Content-Type: text/html; charset=UTF-8',
			'From: SucceedLEARN <noreply@succeedlearn.com>',
			'Reply-To: SucceedLEARN <connect@succeedtech.com>',
		);

		$body_lines = '';
		foreach ( (array) $config['user_body_lines'] as $line ) {
			$body_lines .= '<p>' . esc_html( $line ) . '</p>';
		}

		$message_snippet = '';
		if ( ! empty( $config['show_message'] ) ) {
			$snippet = trim( wp_strip_all_tags( $data['message'] ?? '' ) );
			if ( '' !== $snippet ) {
				$snippet          = wp_trim_words( $snippet, 30, '…' );
				$message_snippet = '<p><strong>Your message:</strong> ' . esc_html( $snippet ) . '</p>';
			}
		}

		$body = sprintf(
			'<p>Hi %1$s,</p>
			%2$s
			%3$s
			<p>Regards,<br/>SucceedLEARN Team</p>',
			esc_html( $data['name'] ),
			$body_lines,
			$message_snippet
		);

		$sent = $this->dispatch_mail( array( $data['email'] ), $subject, $body, $headers, 'user' );
		if ( $sent ) {
			$this->increment_user_reply_email_count( $data['email'] );
		}
	}

	/**
	 * Async fallback — load submission from DB and send emails.
	 *
	 * @param int $submission_id Submission ID.
	 */
	public function send_emails_async( $submission_id ) {
		$database   = SSF_Plugin::instance()->database;
		$submission = $database->get_submission_by_id( (int) $submission_id );

		if ( ! $submission ) {
			$this->log( 'Async email: submission not found for ID ' . $submission_id );
			return;
		}

		$data = array(
			'name'               => $submission->name,
			'email'              => $submission->email,
			'job_title'          => $submission->job_title ?? '',
			'employees'          => $submission->employees ?? '',
			'message'            => $submission->message ?? '',
			'privacy_accepted'   => $submission->privacy_accepted ?? 0,
			'authorised_confirm' => $submission->authorised_confirm ?? 0,
			'form_variant'       => $submission->form_variant ?? SSF_Variants::DEFAULT,
			'utm_source'         => $submission->utm_source ?? '',
			'utm_medium'         => $submission->utm_medium ?? '',
			'utm_campaign'       => $submission->utm_campaign ?? '',
			'utm_term'           => $submission->utm_term ?? '',
			'utm_content'        => $submission->utm_content ?? '',
			'source_tag'         => $submission->source_tag ?? '',
			'page_url'           => $submission->page_url ?? '',
			'user_ip'            => $submission->user_ip ?? '',
			'user_agent'         => $submission->user_agent ?? '',
		);

		$this->log( 'Sending async emails for submission ID: ' . $submission_id );

		try {
			$this->send_admin_email( $data );
			$this->log( 'Admin email sent (async)' );
			$this->send_user_email( $data );
			$this->log( 'User email sent (async)' );
		} catch ( Exception $e ) {
			$this->log( 'Async email error: ' . $e->getMessage() );
		}
	}

	/**
	 * Log wp_mail failures when WP_DEBUG is on.
	 *
	 * @param WP_Error $error Mail error.
	 */
	public function log_wp_mail_error( $error ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG && is_wp_error( $error ) ) {
			error_log( 'SSF wp_mail Error: ' . $error->get_error_message() );
		}
	}

	/**
	 * @param string|array $recipients Recipient email(s).
	 * @param string       $subject    Email subject.
	 * @param string       $body       HTML body.
	 * @param array        $headers    Mail headers.
	 * @param string       $type       admin|user — for logging.
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
		$this->log( 'Subject: ' . $subject );

		$result = wp_mail( $valid, $subject, $body, $headers );

		if ( $result ) {
			$this->log( ucfirst( $type ) . ' email sent successfully' );
		} else {
			$this->log( ucfirst( $type ) . ' email failed to send' );
			global $phpmailer;
			if ( isset( $phpmailer ) && is_object( $phpmailer ) && ! empty( $phpmailer->ErrorInfo ) ) {
				$this->log( 'PHPMailer error: ' . $phpmailer->ErrorInfo );
			}
		}

		return $result;
	}

	/**
	 * Allow a reasonable number of user confirmation emails per address per day.
	 * Uses an SSF-specific option key so common-contact-form counters cannot block cyber form replies.
	 *
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

		$max_replies = (int) apply_filters( 'succeedlearn_ssf_user_reply_limit', 10, $normalized_email );
		if ( $max_replies < 1 ) {
			$max_replies = 1;
		}

		$stored = get_option( $this->get_user_reply_email_count_option_key( $normalized_email ), array() );
		if ( ! is_array( $stored ) ) {
			// Legacy lifetime integer counter: ignore and start a fresh daily bucket.
			$stored = array();
		}

		$day           = gmdate( 'Y-m-d' );
		$current_count = isset( $stored[ $day ] ) ? (int) $stored[ $day ] : 0;
		return $current_count < $max_replies;
	}

	/**
	 * @param string $email User email.
	 * @return void
	 */
	private function increment_user_reply_email_count( $email ) {
		$normalized_email = strtolower( sanitize_email( $email ) );
		if ( '' === $normalized_email ) {
			return;
		}

		$option_key = $this->get_user_reply_email_count_option_key( $normalized_email );
		$stored     = get_option( $option_key, array() );
		if ( ! is_array( $stored ) ) {
			$stored = array();
		}

		$day            = gmdate( 'Y-m-d' );
		$stored[ $day ] = isset( $stored[ $day ] ) ? ( (int) $stored[ $day ] + 1 ) : 1;

		// Keep only a short rolling window.
		$cutoff = gmdate( 'Y-m-d', time() - ( 3 * DAY_IN_SECONDS ) );
		foreach ( array_keys( $stored ) as $key ) {
			if ( (string) $key < $cutoff ) {
				unset( $stored[ $key ] );
			}
		}

		if ( false === get_option( $option_key, false ) ) {
			add_option( $option_key, $stored, '', false );
			return;
		}
		update_option( $option_key, $stored, false );
	}

	/**
	 * @param string $normalized_email Normalized email.
	 * @return string
	 */
	private function get_user_reply_email_count_option_key( $normalized_email ) {
		return 'ssf_user_reply_count_' . md5( $normalized_email );
	}

	/**
	 * @param string $normalized_email Normalized email.
	 * @return bool
	 */
	private function is_user_reply_email_exempt( $normalized_email ) {
		$default_exempt = array(
			'connect@succeedtech.com',
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
	 * @param string $message Debug message.
	 */
	private function log( $message ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			error_log( 'SSF: ' . $message );
		}
	}
}
