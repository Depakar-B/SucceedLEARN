<?php
/**
 * One-off CLI test: submit form with custom_lead_path and verify admin email body.
 *
 * Usage: php tools/test-lead-path-email.php
 */

define( 'WP_USE_THEMES', false );
require_once dirname( __DIR__, 4 ) . '/wp-load.php';

if ( ! class_exists( 'SCF_Contact_Form_Plugin' ) ) {
	fwrite( STDERR, "SCF plugin not loaded.\n" );
	exit( 1 );
}

$plugin = SCF_Contact_Form_Plugin::instance();
$nonce  = wp_create_nonce( 'scf_submit' );

$_POST = array(
	'action'             => 'scf_submit_form',
	'nonce'              => $nonce,
	'name'               => 'CTA Path Test User',
	'email'              => 'cta-test@succeedtech.com',
	'organization'       => 'SucceedTech QA',
	'course_interest'    => array( 'Security Awareness & Phishing' ),
	'message'            => 'Automated test submission for user journey email field.',
	'privacy'            => '1',
	'page_url'           => home_url( '/contact-us/' ),
	'custom_lead_path'   => '',
	'scf_form_time'      => (string) ( time() - 30 ),
	'scf_website'        => '',
);

// Bypass bot timing via reflection on is_spam if needed — test mode helps.
$settings = get_option( 'scf_settings', array() );
$settings['admin_email_test_mode'] = 1;
update_option( 'scf_settings', $settings );

echo "Submitting test form with empty custom_lead_path (page_url fallback expected)\n";
echo "Admin email test mode: ON (recipient: depakar@succeedtech.com)\n";

try {
	$plugin->handle_form_submission();
	echo "handle_form_submission completed.\n";
} catch ( Throwable $e ) {
	fwrite( STDERR, 'Error: ' . $e->getMessage() . "\n" );
	exit( 1 );
}
