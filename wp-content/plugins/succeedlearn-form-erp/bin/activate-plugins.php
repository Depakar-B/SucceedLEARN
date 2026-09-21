<?php
define( 'WP_USE_THEMES', false );
require 'C:/wamp64/www/Succeedlearn/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/plugin.php';

$plugins = array(
	'succeedlearn-form-erp/succeedlearn-form-erp.php',
	'SucceedLEARN-Common-contact-form/succeed-contact-form.php',
);

foreach ( $plugins as $plugin ) {
	$result = activate_plugin( $plugin );
	if ( is_wp_error( $result ) ) {
		echo 'FAIL ' . $plugin . ': ' . $result->get_error_message() . PHP_EOL;
	} else {
		echo 'OK ' . $plugin . PHP_EOL;
	}
}
