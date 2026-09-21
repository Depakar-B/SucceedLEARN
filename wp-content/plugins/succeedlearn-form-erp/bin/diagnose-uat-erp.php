<?php
/**
 * Diagnose UAT ERP connectivity (reads credentials from wp-config.php).
 */
define( 'WP_USE_THEMES', false );
require dirname( __DIR__, 4 ) . '/wp-load.php';

$client  = new SL_ERP_Client();
$api_url = $client->get_api_url();

echo "=== Config ===\n";
echo 'API URL: ' . $api_url . "\n";
echo 'API key configured: ' . ( '' !== $client->get_api_key() ? 'yes' : 'no' ) . "\n";
echo 'Auth mode: ' . ( '' !== $client->get_api_secret() ? 'token' : 'basic' ) . "\n";

if ( '' === $client->get_api_key() ) {
	echo "\nERROR: No API key found.\n";
	exit( 1 );
}

$submission = array(
	'name'         => 'UAT Debug Lead ' . gmdate( 'Y-m-d H:i:s' ),
	'email'        => 'uat-debug+' . time() . '@succeedtech.com',
	'phone'        => '+91 9999999999',
	'organization' => 'SucceedLEARN UAT Debug',
	'message'      => 'ERP connectivity diagnostic from local WAMP.',
	'page_url'     => home_url( '/' ),
	'source_tag'   => 'SucceedLEARN HomePage',
	'form_variant' => 'default',
);
$context   = array( 'form_key' => 'scf_homepage', 'form_variant' => 'default' );
$lead_data = SL_ERP_Mapper::build_lead_payload( $submission, $context );

echo "\n=== Payload utm_source ===\n";
echo ( $lead_data['utm_source'] ?? '(none)' ) . "\n";

echo "\n=== Via SL_ERP_Client ===\n";
$result   = succeedlearn_form_send_to_erp( $submission, $context );
$response = (string) ( $result['response'] ?? '' );
echo 'success: ' . ( ! empty( $result['success'] ) ? 'yes' : 'no' ) . "\n";
echo 'Client response: ' . ( $response ? substr( $response, 0, 800 ) : '(empty)' ) . "\n";

global $wpdb;
$table  = $wpdb->prefix . 'sl_erp_responses';
$latest = $wpdb->get_row( "SELECT id, form_key, email, utm_source, LEFT(erp_response, 300) AS resp FROM {$table} ORDER BY id DESC LIMIT 1", ARRAY_A );
echo "\n=== Latest ERP log ===\n";
echo wp_json_encode( $latest, JSON_PRETTY_PRINT ) . "\n";

exit( ! empty( $result['success'] ) ? 0 : 1 );
