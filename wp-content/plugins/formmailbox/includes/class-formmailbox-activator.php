<?php
/**
 * Plugin activation routines.
 *
 * @package FormMailbox
 */

defined( 'ABSPATH' ) || exit;

/**
 * Creates and upgrades the FormMailbox database tables.
 */
final class FormMailbox_Activator {

	/**
	 * Runs activation tasks.
	 *
	 * @return void
	 */
	public static function activate() {
		self::create_tables();
		update_option( 'formmailbox_db_version', FORMMAILBOX_VERSION );
		update_option( 'formmailbox_activation_redirect', true, false );
	}

	/**
	 * Creates shared tables. Individual forms never create their own tables.
	 *
	 * @return void
	 */
	private static function create_tables() {
		global $wpdb;

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		$charset_collate = $wpdb->get_charset_collate();
		$forms_table     = $wpdb->prefix . 'fmbx_forms';
		$entries_table   = $wpdb->prefix . 'fmbx_entries';
		$values_table    = $wpdb->prefix . 'fmbx_entry_values';
		$logs_table      = $wpdb->prefix . 'fmbx_email_logs';

		$sql = "CREATE TABLE {$forms_table} (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			uuid char(36) NOT NULL,
			name varchar(191) NOT NULL,
			slug varchar(191) NOT NULL,
			status varchar(20) NOT NULL DEFAULT 'draft',
			schema_json longtext NOT NULL,
			settings_json longtext NOT NULL,
			created_by bigint(20) unsigned NOT NULL DEFAULT 0,
			created_at datetime NOT NULL,
			updated_at datetime NOT NULL,
			PRIMARY KEY  (id),
			UNIQUE KEY uuid (uuid),
			KEY slug (slug),
			KEY status (status)
		) {$charset_collate};

		CREATE TABLE {$entries_table} (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			uuid char(36) NOT NULL,
			form_id bigint(20) unsigned NOT NULL,
			email_status varchar(30) NOT NULL DEFAULT 'pending',
			source_post_id bigint(20) unsigned NOT NULL DEFAULT 0,
			source_url text NULL,
			created_at datetime NOT NULL,
			PRIMARY KEY  (id),
			UNIQUE KEY uuid (uuid),
			KEY form_id (form_id),
			KEY email_status (email_status),
			KEY created_at (created_at)
		) {$charset_collate};

		CREATE TABLE {$values_table} (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			entry_id bigint(20) unsigned NOT NULL,
			field_key varchar(191) NOT NULL,
			field_type varchar(50) NOT NULL,
			field_value longtext NULL,
			PRIMARY KEY  (id),
			KEY entry_id (entry_id),
			KEY field_key (field_key)
		) {$charset_collate};

		CREATE TABLE {$logs_table} (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			entry_id bigint(20) unsigned NOT NULL,
			notification_type varchar(30) NOT NULL,
			recipient varchar(191) NOT NULL,
			subject text NOT NULL,
			status varchar(30) NOT NULL DEFAULT 'pending',
			error_code varchar(100) NULL,
			error_message text NULL,
			attempt_count smallint(5) unsigned NOT NULL DEFAULT 0,
			attempted_at datetime NULL,
			PRIMARY KEY  (id),
			KEY entry_id (entry_id),
			KEY status (status)
		) {$charset_collate};";

		dbDelta( $sql );
	}
}
