<?php
define( 'WP_USE_THEMES', false );
require dirname( __DIR__, 4 ) . '/wp-load.php';
global $wpdb;
$table = $wpdb->prefix . 'scf_contact_submissions';
$row   = $wpdb->get_row( "SELECT id, name, email, custom_lead_path, page_url, created_at FROM {$table} ORDER BY id DESC LIMIT 1", ARRAY_A );
echo json_encode( $row, JSON_PRETTY_PRINT ) . PHP_EOL;
