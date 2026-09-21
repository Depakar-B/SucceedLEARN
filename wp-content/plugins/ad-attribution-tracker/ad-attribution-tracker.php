<?php
/**
 * Plugin Name: Ad Attribution Tracker
 * Description: Capture advertising attribution and link it to cybersecurity form lead IDs. Existing form UTM capture is left unchanged. Lead linking and admin-email attribution apply to the cybersecurity form only.
 * Version: 1.1.0
 * Author: SucceedTech
 * Requires at least: 6.8
 * Requires PHP: 8.1
 * Text Domain: ad-attribution-tracker
 *
 * Integration:
 *
 *   $attribution = aat_get_attribution();
 *   $visitor_id  = $attribution['visitor_id'];
 *   $ad_id       = $attribution['ad_id'];
 *   $campaign_id = $attribution['campaign_id'];
 *   $platform    = $attribution['platform'];
 *   $source      = $attribution['utm_source'];
 *   $campaign    = $attribution['utm_campaign'];
 *
 * After a form insert succeeds:
 *
 *   aat_link_submission( $lead_id, 'your_form_key', $optional_table_name );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AAT_VERSION', '1.1.0' );
define( 'AAT_PLUGIN_FILE', __FILE__ );
define( 'AAT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once AAT_PLUGIN_DIR . 'includes/class-database.php';
require_once AAT_PLUGIN_DIR . 'includes/class-tracker.php';
require_once AAT_PLUGIN_DIR . 'includes/class-attribution.php';
require_once AAT_PLUGIN_DIR . 'includes/class-linker.php';
require_once AAT_PLUGIN_DIR . 'includes/class-admin.php';

register_activation_hook( __FILE__, array( 'AAT_Database', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'AAT_Database', 'deactivate' ) );

add_action(
	'plugins_loaded',
	static function () {
		AAT_Database::maybe_upgrade();
		AAT_Tracker::instance();
		AAT_Linker::instance();
		if ( is_admin() ) {
			AAT_Admin::instance();
		}
	}
);

add_action( 'aat_cleanup', array( 'AAT_Database', 'cleanup' ) );

/**
 * Return current visitor attribution for any form.
 *
 * @return array<string, string>
 */
function aat_get_attribution() {
	return AAT_Attribution::get_data();
}

/**
 * Link a saved form lead ID to the current visitor's ad attribution.
 *
 * @param int    $form_lead_id Form submission / lead row ID.
 * @param string $form_key     Short form identifier, e.g. scf.
 * @param string $form_table   Optional source table name.
 * @return bool
 */
function aat_link_submission( $form_lead_id, $form_key = 'custom', $form_table = '' ) {
	return AAT_Linker::link_submission( $form_lead_id, $form_key, $form_table );
}

/**
 * Return the human name assigned to an ad ID, or empty string.
 *
 * @param string $ad_id
 * @return string
 */
function aat_get_ad_name( $ad_id ) {
	$row = AAT_Database::get_ad_by_id( $ad_id );
	return $row ? (string) $row['ad_name'] : '';
}
