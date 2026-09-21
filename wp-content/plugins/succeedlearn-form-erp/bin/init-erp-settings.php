<?php
define( 'WP_USE_THEMES', false );
require 'C:/wamp64/www/Succeedlearn/wp-load.php';

update_option(
	'succeedlearn_form_erp_settings',
	array(
		'enabled'       => 1,
		'api_url'       => '',
		'api_key'       => '',
		'naming_series' => '',
	)
);

echo "ERP settings saved (naming series blank, wp-config constants used).\n";
