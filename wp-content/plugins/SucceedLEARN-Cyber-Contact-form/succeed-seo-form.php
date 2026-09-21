<?php
/**
 * Plugin Name: Succeed Cybersecurity Form
 * Description: Lightweight contact form for Cybersecurity Awareness and InfoSec Campaign Registration. Supports form variants via [cybersecurity_form variant="infosec"].
 * Version: 1.3.5
 * Author: SucceedTech
 * Text Domain: seo-form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SSF_VERSION', '1.3.5' );
define( 'SSF_PLUGIN_FILE', __FILE__ );
define( 'SSF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SSF_ADMIN_EMAIL', 'connect@succeedtech.com' );
define( 'SSF_OPTION_KEY', 'ssf_settings' );

/**
 * Whether admin notifications should go to the test inbox list.
 *
 * @return bool
 */
function ssf_is_admin_email_test_mode() {
	$settings = get_option( SSF_OPTION_KEY, array() );
	if ( is_array( $settings ) && array_key_exists( 'admin_email_test_mode', $settings ) ) {
		$enabled = ! empty( $settings['admin_email_test_mode'] );
	} else {
		// Before first save: local/debug installs default to test inbox.
		$enabled = defined( 'WP_DEBUG' ) && WP_DEBUG;
	}
	return (bool) apply_filters( 'ssf_is_admin_email_test_mode', $enabled );
}

/**
 * Admin notification recipients for a form variant.
 * Test mode → connect@succeedtech.com.
 * Live infosec → vridhi.shah@succeedtech.com.
 * Live default (CSA / US Cyber) → connect@succeedtech.com.
 *
 * @param string $variant Form variant id.
 * @return string[]
 */
function ssf_get_admin_email_recipients( $variant = 'default' ) {
	if ( ssf_is_admin_email_test_mode() ) {
		$recipients = array( SSF_ADMIN_EMAIL );
		return apply_filters( 'ssf_admin_email_recipients', $recipients, $variant );
	}

	$config     = SSF_Variants::get( $variant );
	$recipients = ! empty( $config['admin_recipients_live'] ) && is_array( $config['admin_recipients_live'] )
		? $config['admin_recipients_live']
		: array( SSF_ADMIN_EMAIL );

	return apply_filters( 'ssf_admin_email_recipients', $recipients, $variant );
}

require_once SSF_PLUGIN_DIR . 'includes/class-ssf-variants.php';
require_once SSF_PLUGIN_DIR . 'includes/class-ssf-security.php';
require_once SSF_PLUGIN_DIR . 'includes/class-ssf-database.php';
require_once SSF_PLUGIN_DIR . 'includes/class-ssf-email.php';
require_once SSF_PLUGIN_DIR . 'includes/class-ssf-form-render.php';
require_once SSF_PLUGIN_DIR . 'includes/class-ssf-form-handler.php';
require_once SSF_PLUGIN_DIR . 'includes/class-ssf-admin.php';
require_once SSF_PLUGIN_DIR . 'includes/class-ssf-assets.php';
require_once SSF_PLUGIN_DIR . 'includes/class-ssf-plugin.php';

SSF_Plugin::instance();
