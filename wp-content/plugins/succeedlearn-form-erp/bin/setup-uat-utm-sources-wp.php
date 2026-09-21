<?php
define( 'WP_USE_THEMES', false );
require 'C:/wamp64/www/Succeedlearn/wp-load.php';

putenv( 'SUCCEEDLEARN_ERP_API_URL=' . ( defined( 'SUCCEEDLEARN_ERP_API_URL' ) ? SUCCEEDLEARN_ERP_API_URL : '' ) );
putenv( 'SUCCEEDLEARN_ERP_API_KEY=' . ( defined( 'SUCCEEDLEARN_ERP_API_KEY' ) ? SUCCEEDLEARN_ERP_API_KEY : '' ) );

require __DIR__ . '/setup-uat-utm-sources.php';
