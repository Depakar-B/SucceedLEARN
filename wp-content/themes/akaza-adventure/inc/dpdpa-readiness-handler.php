<?php
/**
 * DPDPA Readiness assessment email delivery.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Category labels for the readiness report.
 *
 * @return array<int, string>
 */
function akaza_dpdpa_readiness_category_labels() {
	return array(
		1 => 'Recognising data',
		2 => 'Consent & lawful use',
		3 => 'Everyday handling',
		4 => 'Rights & requests',
		5 => 'Breach reporting',
	);
}

/**
 * Category tips for the readiness report.
 *
 * @return array<int, string>
 */
function akaza_dpdpa_readiness_category_tips() {
	return array(
		1 => 'Map the personal data your teams touch every day.',
		2 => 'Tighten consent and purpose checks before processing.',
		3 => 'Reinforce secure sharing, storage, and disposal habits.',
		4 => 'Set a clear process for access, correction, and erasure.',
		5 => 'Practice early escalation so incidents are not delayed.',
	);
}

/**
 * Build a plain-text report body.
 *
 * @param string               $band            Result band title.
 * @param int                  $percentage      Overall percentage.
 * @param array<int, int|string> $category_scores Category scores keyed 1-5.
 * @return string
 */
function akaza_dpdpa_readiness_build_email_body( $band, $percentage, $category_scores ) {
	$labels = akaza_dpdpa_readiness_category_labels();
	$tips   = akaza_dpdpa_readiness_category_tips();

	$lines   = array();
	$lines[] = 'Your DPDPA Readiness Scorecard';
	$lines[] = '';
	$lines[] = 'Overall readiness: ' . $percentage . '%';
	$lines[] = 'Result band: ' . $band;
	$lines[] = '';
	$lines[] = 'Category breakdown (out of 6):';

	foreach ( $labels as $id => $label ) {
		$score   = isset( $category_scores[ $id ] ) ? (int) $category_scores[ $id ] : 0;
		$lines[] = '- ' . $label . ': ' . $score . '/6';
		if ( isset( $tips[ $id ] ) ) {
			$lines[] = '  Tip: ' . $tips[ $id ];
		}
	}

	$lines[] = '';
	$lines[] = 'This report was generated from the SucceedLearn DPDPA Readiness Scorecard.';
	$lines[] = home_url( '/' );

	return implode( "\n", $lines );
}

/**
 * AJAX: email the DPDPA readiness report to the visitor.
 */
function akaza_ajax_dpdpa_readiness_email_report() {
	check_ajax_referer( 'sl_dpdpa_readiness_email', 'nonce' );

	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';

	if ( ! $email || ! is_email( $email ) ) {
		wp_send_json_error(
			array(
				'message' => 'Please enter a valid email address.',
			),
			400
		);
	}

	$percentage = isset( $_POST['percentage'] ) ? absint( $_POST['percentage'] ) : 0;
	$percentage = min( 100, $percentage );

	$band = isset( $_POST['band'] ) ? sanitize_text_field( wp_unslash( $_POST['band'] ) ) : '';
	if ( '' === $band ) {
		$band = 'Readiness result';
	}

	$raw_scores = array();
	if ( isset( $_POST['category_scores'] ) ) {
		$decoded = json_decode( wp_unslash( $_POST['category_scores'] ), true );
		if ( is_array( $decoded ) ) {
			$raw_scores = $decoded;
		}
	}

	$category_scores = array();
	for ( $i = 1; $i <= 5; $i++ ) {
		$category_scores[ $i ] = isset( $raw_scores[ $i ] ) ? min( 6, absint( $raw_scores[ $i ] ) ) : 0;
	}

	$subject = sprintf(
		/* translators: %d: readiness percentage */
		'[SucceedLearn] Your DPDPA Readiness Scorecard (%d%%)',
		$percentage
	);

	$body    = akaza_dpdpa_readiness_build_email_body( $band, $percentage, $category_scores );
	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );

	$sent = wp_mail( $email, $subject, $body, $headers );

	$admin = get_option( 'admin_email' );
	if ( $admin && is_email( $admin ) ) {
		$admin_body  = "A DPDPA Readiness Scorecard was requested.\n\n";
		$admin_body .= 'Visitor email: ' . $email . "\n\n";
		$admin_body .= $body;

		wp_mail(
			$admin,
			'[SucceedLearn] DPDPA Readiness lead: ' . $email,
			$admin_body,
			array( 'Reply-To: ' . $email )
		);
	}

	if ( ! $sent ) {
		wp_send_json_error(
			array(
				'message' => 'We unlocked your breakdown on this page, but the email could not be sent. Please try again in a moment.',
			),
			500
		);
	}

	wp_send_json_success(
		array(
			'message' => 'Report sent. Check your inbox for the full category breakdown. Your scores are unlocked on this page.',
		)
	);
}
add_action( 'wp_ajax_sl_dpdpa_readiness_email', 'akaza_ajax_dpdpa_readiness_email_report' );
add_action( 'wp_ajax_nopriv_sl_dpdpa_readiness_email', 'akaza_ajax_dpdpa_readiness_email_report' );
