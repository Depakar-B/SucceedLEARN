<?php
/**
 * Plugin Name: SucceedLEARN Form ERP
 * Plugin URI:  https://succeedlearn.com/
 * Description: Global ERPNext Lead sync for all SucceedLEARN website forms.
 * Version:     1.0.2
 * Author:      Succeed Technologies
 * Text Domain: succeedlearn-form-erp
 *
 * @package SucceedLEARN_Form_ERP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SUCCEEDLEARN_FORM_ERP_VERSION', '1.0.2' );
define( 'SUCCEEDLEARN_FORM_ERP_FILE', __FILE__ );
define( 'SUCCEEDLEARN_FORM_ERP_PATH', plugin_dir_path( __FILE__ ) );
define( 'SUCCEEDLEARN_FORM_ERP_URL', plugin_dir_url( __FILE__ ) );

require_once SUCCEEDLEARN_FORM_ERP_PATH . 'includes/class-sl-erp-logger.php';
require_once SUCCEEDLEARN_FORM_ERP_PATH . 'includes/class-sl-erp-mapper.php';
require_once SUCCEEDLEARN_FORM_ERP_PATH . 'includes/class-sl-erp-client.php';
require_once SUCCEEDLEARN_FORM_ERP_PATH . 'includes/class-sl-erp-plugin.php';
require_once SUCCEEDLEARN_FORM_ERP_PATH . 'includes/class-sl-form-recaptcha.php';
require_once SUCCEEDLEARN_FORM_ERP_PATH . 'includes/functions.php';
require_once SUCCEEDLEARN_FORM_ERP_PATH . 'includes/class-sl-erp-scf-bridge.php';

register_activation_hook( __FILE__, array( 'SL_ERP_Logger', 'create_table' ) );

add_action(
	'plugins_loaded',
	static function () {
		SL_ERP_Plugin::instance();
		SL_Form_Recaptcha::instance();
		SL_ERP_SCF_Bridge::init();
	}
);
