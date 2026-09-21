<?php
define( 'WP_USE_THEMES', false );
require 'C:/wamp64/www/Succeedlearn/wp-load.php';

$active = get_option( 'active_plugins', array() );
$targets = array(
	'succeedlearn-form-erp/succeedlearn-form-erp.php',
	'SucceedLEARN-Common-contact-form/succeed-contact-form.php',
);

foreach ( $targets as $plugin ) {
	echo ( in_array( $plugin, $active, true ) ? 'ACTIVE' : 'INACTIVE' ) . ' ' . $plugin . PHP_EOL;
}

$settings = get_option( 'succeedlearn_form_erp_settings', array() );
echo 'ERP settings: ' . wp_json_encode( $settings ) . PHP_EOL;
