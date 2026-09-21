<?php
define( 'WP_USE_THEMES', false );
require 'C:/wamp64/www/Succeedlearn/wp-load.php';

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

$context = array(
	'form_key'     => 'scf_contact',
	'form_variant' => 'default',
);

$result = succeedlearn_form_send_to_erp( $submission, $context );

echo 'success: ' . ( $result['success'] ? 'yes' : 'no' ) . PHP_EOL;
echo 'utm_source: ' . ( $result['utm_source'] ?? '' ) . PHP_EOL;
echo 'custom_interested_in: ' . ( $result['lead_data']['custom_interested_in'] ?? '(none)' ) . PHP_EOL;
echo 'response: ' . ( $result['response'] ?? '' ) . PHP_EOL;

global $wpdb;
$table = $wpdb->prefix . 'sl_erp_responses';
$latest = $wpdb->get_row( "SELECT * FROM {$table} ORDER BY id DESC LIMIT 1" );
if ( $latest ) {
	echo 'log_id: ' . $latest->id . PHP_EOL;
	echo 'log_form_key: ' . $latest->form_key . PHP_EOL;
}

exit( ! empty( $result['success'] ) ? 0 : 1 );
