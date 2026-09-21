<?php
define( 'WP_USE_THEMES', false );
require 'C:/wamp64/www/elearnposh/wp-load.php';
require_once WP_PLUGIN_DIR . '/erp-Homepage/erp.php';

$response = erpnext::send(
	'UAT POSH Test ' . gmdate( 'Y-m-d H:i:s' ),
	'posh-uat-test+' . time() . '@succeedtech.com',
	'+91 9999999999',
	'POSH UAT connectivity test',
	'SucceedTech Test Org',
	'ephomepage',
	'http://localhost/elearnposh/'
);

echo $response . PHP_EOL;
exit( ( false === stripos( $response, 'AuthenticationError' ) && false === stripos( $response, '"exc_type"' ) ) ? 0 : 1 );
