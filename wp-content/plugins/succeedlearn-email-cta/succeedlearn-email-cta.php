<?php
/**
 * Plugin Name: SucceedLEARN Email CTA
 * Description: Single-field email CTA shortcode for desktop and AMP. Sends admin and user emails; ERP hook ready for later integration.
 * Version: 1.0.1
 * Author: SucceedTech
 * Text Domain: succeedlearn-email-cta
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SL_ECTA_VERSION', '1.0.1' );
define( 'SL_ECTA_PLUGIN_FILE', __FILE__ );
define( 'SL_ECTA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SL_ECTA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once SL_ECTA_PLUGIN_DIR . 'includes/class-ecta-security.php';
require_once SL_ECTA_PLUGIN_DIR . 'includes/class-ecta-database.php';
require_once SL_ECTA_PLUGIN_DIR . 'includes/class-ecta-email.php';
require_once SL_ECTA_PLUGIN_DIR . 'includes/class-ecta-render.php';
require_once SL_ECTA_PLUGIN_DIR . 'includes/class-ecta-handler.php';
require_once SL_ECTA_PLUGIN_DIR . 'includes/class-ecta-admin.php';
require_once SL_ECTA_PLUGIN_DIR . 'includes/class-ecta-assets.php';
require_once SL_ECTA_PLUGIN_DIR . 'includes/class-ecta-plugin.php';

SL_ECTA_Plugin::instance();
