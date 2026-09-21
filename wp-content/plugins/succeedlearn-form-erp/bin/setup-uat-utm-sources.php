<?php
/**
 * Create SucceedLEARN UTM Source values in ERPNext UAT.
 *
 * Usage (from repo root):
 *   php succeedlearn-form-erp/bin/setup-uat-utm-sources.php
 *
 * Reads API URL/key from env or constants:
 *   SUCCEEDLEARN_ERP_API_URL / SUCCEEDLEARN_ERP_API_KEY
 *   ELEARNPOSH_ERP_API_URL / ELEARNPOSH_ERP_API_KEY (fallback)
 */

if ( PHP_SAPI !== 'cli' ) {
	fwrite( STDERR, "CLI only.\n" );
	exit( 1 );
}

$api_url = getenv( 'SUCCEEDLEARN_ERP_API_URL' ) ?: getenv( 'ELEARNPOSH_ERP_API_URL' ) ?: 'https://uaterp.succeedtech.com/api/resource/Lead';
$api_key = getenv( 'SUCCEEDLEARN_ERP_API_KEY' ) ?: getenv( 'ELEARNPOSH_ERP_API_KEY' ) ?: '';

if ( '' === $api_key ) {
	fwrite( STDERR, "Set SUCCEEDLEARN_ERP_API_KEY or ELEARNPOSH_ERP_API_KEY.\n" );
	exit( 1 );
}

$base = preg_replace( '#/api/resource/Lead$#', '', rtrim( $api_url, '/' ) );
$utm_resource = rawurlencode( 'UTM Source' );
$utm_endpoint = $base . '/api/resource/' . $utm_resource;

$sources = array(
	'SucceedLEARN RequestDemo',
	'SucceedLEARN InfoSEC',
	'SucceedLEARN Homepage',
	'SucceedLEARN Blogs',
	'SucceedLEARN ContactUs',
	'direct',
);

function sl_erp_request( $method, $url, $api_key, $payload = null ) {
	$headers = array(
		'Content-Type: application/json',
		'Accept: application/json',
		'Authorization: Basic ' . $api_key,
	);
	$ch = curl_init( $url );
	curl_setopt_array(
		$ch,
		array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT        => 20,
			CURLOPT_CUSTOMREQUEST  => $method,
			CURLOPT_HTTPHEADER     => $headers,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => 0,
		)
	);
	if ( null !== $payload ) {
		curl_setopt( $ch, CURLOPT_POSTFIELDS, wp_json_encode( array( 'data' => $payload ) ) );
	}
	$body   = (string) curl_exec( $ch );
	$status = (int) curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$error  = curl_error( $ch );
	$errno  = curl_errno( $ch );
	curl_close( $ch );
	return array( 'status' => $status, 'body' => $body, 'error' => $error, 'errno' => $errno );
}

if ( ! function_exists( 'wp_json_encode' ) ) {
	function wp_json_encode( $data ) {
		return json_encode( $data );
	}
}

$created = 0;
$skipped = 0;
$failed  = 0;

foreach ( $sources as $source ) {
	$check = sl_erp_request( 'GET', $utm_endpoint . '/' . rawurlencode( $source ), $api_key );
	if ( 200 === $check['status'] ) {
		echo "SKIP (exists): {$source}\n";
		++$skipped;
		continue;
	}

	$response = sl_erp_request(
		'POST',
		$utm_endpoint,
		$api_key,
		array(
			'doctype' => 'UTM Source',
			'name'    => $source,
		)
	);

	if ( in_array( $response['status'], array( 200, 201 ), true ) ) {
		echo "OK: {$source}\n";
		++$created;
		continue;
	}

	if ( false !== stripos( $response['body'], 'DuplicateEntryError' ) ) {
		echo "SKIP (duplicate): {$source}\n";
		++$skipped;
		continue;
	}

	echo "FAIL ({$response['status']}): {$source}";
	if ( ! empty( $response['error'] ) ) {
		echo " curl_error={$response['error']}";
	}
	echo " — {$response['body']}\n";
	++$failed;
}

echo "\nDone. created={$created} skipped={$skipped} failed={$failed}\n";
exit( $failed > 0 ? 1 : 0 );
