<?php
/**
 * Extracted from functions.php (inc\contact-handler.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Handle homepage / contact form.
 */
function akaza_handle_contact() {
	if ( ! isset( $_POST['slf_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['slf_contact_nonce'] ) ), 'slf_contact' ) ) {
		wp_safe_redirect( home_url( '/?contact=invalid' ) );
		exit;
	}

	$first   = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
	$last    = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( ! $first || ! $last || ! is_email( $email ) || ! $message ) {
		wp_safe_redirect( akaza_page_url( 'contact-us' ) . '?contact=invalid' );
		exit;
	}

	$content = "Name: {$first} {$last}\nEmail: {$email}\nPhone: {$phone}\n\n{$message}";

	wp_insert_post(
		array(
			'post_type'    => 'post',
			'post_status'  => 'private',
			'post_title'   => 'Lead: ' . $first . ' ' . $last,
			'post_content' => $content,
		)
	);

	$admin = get_option( 'admin_email' );
	if ( $admin ) {
		wp_mail(
			$admin,
			'[SucceedLEARN] New enquiry from ' . $first . ' ' . $last,
			$content,
			array( 'Reply-To: ' . $email )
		);
	}

	wp_safe_redirect( akaza_page_url( 'contact-us' ) . '?contact=sent' );
	exit;
}
add_action( 'admin_post_nopriv_slf_contact', 'akaza_handle_contact' );
add_action( 'admin_post_slf_contact', 'akaza_handle_contact' );
