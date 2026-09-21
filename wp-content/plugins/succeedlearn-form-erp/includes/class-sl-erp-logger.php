<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_ERP_Logger {
	public static function table_name() {
		global $wpdb;
		return $wpdb->prefix . 'sl_erp_responses';
	}

	public static function create_table() {
		global $wpdb;
		$table   = self::table_name();
		$charset = $wpdb->get_charset_collate();
		$sql     = "CREATE TABLE {$table} (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			form_key varchar(100) NOT NULL DEFAULT '',
			email varchar(255) NOT NULL DEFAULT '',
			utm_source varchar(255) NOT NULL DEFAULT '',
			erp_response longtext NOT NULL,
			payload_json longtext NOT NULL,
			created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (id),
			KEY form_key (form_key),
			KEY email (email)
		) {$charset};";
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}

	public static function log( $form_key, $email, $utm_source, $erp_response, array $lead_data ) {
		global $wpdb;
		self::create_table();
		$wpdb->insert(
			self::table_name(),
			array(
				'form_key'       => sanitize_text_field( (string) $form_key ),
				'email'          => sanitize_email( (string) $email ),
				'utm_source'     => sanitize_text_field( (string) $utm_source ),
				'erp_response'   => (string) $erp_response,
				'payload_json'   => wp_json_encode( $lead_data ),
				'created_at'     => current_time( 'mysql' ),
			),
			array( '%s', '%s', '%s', '%s', '%s', '%s' )
		);
	}
}
