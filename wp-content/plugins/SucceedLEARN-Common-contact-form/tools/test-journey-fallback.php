<?php
define( 'WP_USE_THEMES', false );
require dirname( __DIR__, 4 ) . '/wp-load.php';

$plugin = SCF_Contact_Form_Plugin::instance();
$ref    = new ReflectionClass( $plugin );
$method = $ref->getMethod( 'resolve_custom_lead_path' );
$method->setAccessible( true );

$page_url = home_url( '/contact-us/' );
$result   = $method->invoke( $plugin, '', $page_url );

echo "Empty POST + page_url fallback:\n";
echo $result . "\n\n";

$display = $ref->getMethod( 'format_custom_lead_path_display' );
$display->setAccessible( true );
echo "Email label:\n";
echo $display->invoke( $plugin, $result ) . "\n";
