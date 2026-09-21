<?php
/**
 * Uninstall cleanup. Data is removed only when the setting is enabled.
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

$settings = get_option( 'aat_settings', array() );
if ( ! is_array( $settings ) || empty( $settings['delete_on_uninstall'] ) ) {
	return;
}

$ads      = $wpdb->prefix . 'aat_ads';

// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$wpdb->query( "DROP TABLE IF EXISTS {$tracking}" );
// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$wpdb->query( "DROP TABLE IF EXISTS {$links}" );
// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$wpdb->query( "DROP TABLE IF EXISTS {$ads}" );

delete_option( 'aat_settings' );
delete_option( 'aat_db_version' );
wp_clear_scheduled_hook( 'aat_cleanup' );
