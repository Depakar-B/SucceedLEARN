<?php
define( 'WP_USE_THEMES', false );
require 'C:/wamp64/www/Succeedlearn/wp-load.php';

global $wpdb;
$table = $wpdb->prefix . 'sl_erp_responses';
$rows  = $wpdb->get_results( "SELECT id, form_key, email, utm_source, LEFT(response, 500) AS response FROM {$table} ORDER BY id DESC LIMIT 5", ARRAY_A );
echo json_encode( $rows, JSON_PRETTY_PRINT ) . PHP_EOL;
