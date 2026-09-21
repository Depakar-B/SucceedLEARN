<?php
/**
 * Compare ERP API keys against UAT (no secrets printed).
 */
define( 'WP_USE_THEMES', false );
require 'C:/wamp64/www/Succeedlearn/wp-load.php';

$api_url = 'https://uaterp.succeedtech.com/api/resource/Lead';
$keys    = array(
	'wp_config'  => defined( 'SUCCEEDLEARN_ERP_API_KEY' ) ? SUCCEEDLEARN_ERP_API_KEY : '',
	'elearnposh' => 'OWM2ZDc2MmI2ZWQ1MWM3OmYwMzEyNDViMDU3NjNjOA==',
);

$payload = wp_json_encode(
	array(
		'data' => array(
			'lead_name'    => 'Key Test ' . gmdate( 'H:i:s' ),
			'doctype'      => 'Lead',
			'company_name' => 'Key Test Org',
			'lead_owner'   => 'Administrator',
			'mobile_no'    => '+91 9999999999',
			'email_id'     => 'key-test+' . time() . '@succeedtech.com',
			'status'       => 'Lead',
			'company'      => 'SUCCEED TECHNOLOGIES PRIVATE LIMITED',
			'utm_source'   => 'direct',
			'notes'        => array(
				array(
					'note'     => '<div>Key test</div>',
					'added_by' => 'Administrator',
					'added_on' => gmdate( 'Y-m-d H:i:s' ),
				),
			),
		),
	)
);

foreach ( $keys as $label => $api_key ) {
	if ( '' === $api_key ) {
		echo "{$label}: (missing)\n";
		continue;
	}

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
	$errno  = curl_errno( $ch );
	$error  = curl_error( $ch );
	curl_close( $ch );

	$exc = '';
	if ( preg_match( '/"exc_type"\s*:\s*"([^"]+)"/', $body, $m ) ) {
		$exc = $m[1];
	}

	echo "{$label}: HTTP {$status}";
	if ( $errno ) {
		echo " curl_errno={$errno} error={$error}";
	}
	if ( $exc ) {
		echo " exc_type={$exc}";
	}
	if ( $status >= 200 && $status < 300 && false === stripos( $body, '"exc_type"' ) ) {
		echo ' OK';
	}
	echo "\n";
}
