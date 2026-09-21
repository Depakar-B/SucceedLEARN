<?php
/**
 * FormMailbox uninstall routine.
 *
 * Data is preserved unless the site owner explicitly enables removal.
 *
 * @package FormMailbox
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

if ( ! get_option( 'formmailbox_delete_data_on_uninstall', false ) ) {
	return;
}

global $wpdb;

$tables = array(
	$wpdb->prefix . 'fmbx_email_logs',
	$wpdb->prefix . 'fmbx_entry_values',
	$wpdb->prefix . 'fmbx_entries',
	$wpdb->prefix . 'fmbx_forms',
);

foreach ( $tables as $table ) {
	// Table names are constructed exclusively from the trusted WordPress prefix.
	$wpdb->query( "DROP TABLE IF EXISTS `{$table}`" ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
}

delete_option( 'formmailbox_db_version' );
delete_option( 'formmailbox_delete_data_on_uninstall' );
delete_option( 'formmailbox_activation_redirect' );
