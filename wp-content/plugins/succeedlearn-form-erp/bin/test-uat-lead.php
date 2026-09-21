<?php
/**
 * Send a test SucceedLEARN Lead payload to UAT ERPNext.
 *
 * Usage:
 *   php succeedlearn-form-erp/bin/test-uat-lead.php
 */

if ( PHP_SAPI !== 'cli' ) {
	fwrite( STDERR, "CLI only.\n" );
	exit( 1 );
}

$repo_root = dirname( __DIR__, 2 );
require_once $repo_root . '/succeedlearn-form-erp/includes/class-sl-erp-mapper.php';

$api_url = getenv( 'SUCCEEDLEARN_ERP_API_URL' ) ?: getenv( 'ELEARNPOSH_ERP_API_URL' ) ?: 'https://uaterp.succeedtech.com/api/resource/Lead';
$api_key = getenv( 'SUCCEEDLEARN_ERP_API_KEY' ) ?: getenv( 'ELEARNPOSH_ERP_API_KEY' ) ?: '';

if ( '' === $api_key ) {
	fwrite( STDERR, "Set SUCCEEDLEARN_ERP_API_KEY or ELEARNPOSH_ERP_API_KEY.\n" );
	exit( 1 );
}

$submission = array(
	'name'            => 'UAT Test Lead ' . gmdate( 'Y-m-d H:i:s' ),
	'email'           => 'uat-test+' . time() . '@succeedtech.com',
	'phone'           => '+91 9999999999',
	'organization'    => 'SucceedLEARN UAT Test',
	'message'         => 'Automated UAT test from succeedlearn-form-erp.',
	'course_interest' => 'Security Awareness & Phishing',
	'page_url'        => 'http://localhost/Succeedlearn/contact/',
	'source_tag'      => 'SucceedLEARN ContactUs',
	'utm_source'      => '',
	'form_variant'    => 'default',
);

$context   = array( 'form_key' => 'scf_contact', 'form_variant' => 'default' );
$lead_data = SL_ERP_Mapper::build_lead_payload( $submission, $context );

$expected_interest = 'Security Awareness & Phishing';
if ( empty( $lead_data['custom_interested_in'] ) || $lead_data['custom_interested_in'] !== $expected_interest ) {
	fwrite(
		STDERR,
		"Payload missing or incorrect custom_interested_in. Expected: {$expected_interest}; got: " . ( $lead_data['custom_interested_in'] ?? '(none)' ) . "\n"
	);
	exit( 1 );
}

$payload   = json_encode( array( 'data' => $lead_data ) );

$ch = curl_init( $api_url );
curl_setopt_array(
	$ch,
	array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT        => 20,
		CURLOPT_POST           => true,
		CURLOPT_POSTFIELDS     => $payload,
		CURLOPT_HTTPHEADER     => array(
			'Content-Type: application/json',
			'Accept: application/json',
			'Authorization: Basic ' . $api_key,
		),
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => 0,
	)
);

$body   = (string) curl_exec( $ch );
$status = (int) curl_getinfo( $ch, CURLINFO_HTTP_CODE );
curl_close( $ch );

echo "POST {$api_url}\n";
echo "Status: {$status}\n";
echo "Payload utm_source: " . ( $lead_data['utm_source'] ?? '(none)' ) . "\n";
echo "Payload custom_interested_in: " . ( $lead_data['custom_interested_in'] ?? '(none)' ) . "\n";
echo "Response:\n{$body}\n";

exit ( $status >= 200 && $status < 300 && false === stripos( $body, '"exc_type"' ) ) ? 0 : 1;
