<?php
/**
 * Database Management Class
 *
 * Handles database table creation and management for ERP integration
 *
 * @package ElearnPOSH\AMP
 */

namespace ElearnPOSH\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Database Class
 */
class Database {

	/**
	 * Get table name with prefix
	 *
	 * @param string $table_name Table name without prefix.
	 * @return string Full table name with prefix.
	 */
	public static function get_table_name( $table_name ) {
		global $wpdb;
		return $wpdb->prefix . $table_name;
	}

	/**
	 * Create database tables
	 */
	public static function create_tables() {
		global $wpdb;
		
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		
		$charset_collate = $wpdb->get_charset_collate();
		
		// Create wp_erp_contact table
		$table_contact = self::get_table_name( 'erp_contact' );
		$sql_contact = "CREATE TABLE IF NOT EXISTS $table_contact (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			name varchar(255) NOT NULL,
			email varchar(255) NOT NULL,
			phone varchar(50) DEFAULT NULL,
			msg text DEFAULT NULL,
			org varchar(255) DEFAULT NULL,
			erpid varchar(100) DEFAULT NULL,
			privacy varchar(10) DEFAULT NULL,
			posh tinyint(1) DEFAULT 0,
			captcha varchar(50) DEFAULT NULL,
			ip varchar(45) DEFAULT '',
			created_at datetime DEFAULT CURRENT_TIMESTAMP,
			updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (id),
			KEY email (email),
			KEY erpid (erpid)
		) $charset_collate;";
		
		dbDelta( $sql_contact );
		self::ensure_erp_contact_ip_column();
		
		// Create wp_erp_sidebar table (if needed)
		$table_sidebar = self::get_table_name( 'erp_sidebar' );
		$sql_sidebar = "CREATE TABLE IF NOT EXISTS $table_sidebar (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			name varchar(255) NOT NULL,
			email varchar(255) NOT NULL,
			phone varchar(50) DEFAULT NULL,
			msg text DEFAULT NULL,
			org varchar(255) DEFAULT NULL,
			erpid varchar(100) DEFAULT NULL,
			created_at datetime DEFAULT CURRENT_TIMESTAMP,
			updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (id),
			KEY email (email),
			KEY erpid (erpid)
		) $charset_collate;";
		
		dbDelta( $sql_sidebar );
		
		// Create wp_erp_home table (if needed)
		$table_home = self::get_table_name( 'erp_home' );
		$sql_home = "CREATE TABLE IF NOT EXISTS $table_home (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			name varchar(255) NOT NULL,
			email varchar(255) NOT NULL,
			phone varchar(50) DEFAULT NULL,
			msg text DEFAULT NULL,
			org varchar(255) DEFAULT NULL,
			erpid varchar(100) DEFAULT NULL,
			created_at datetime DEFAULT CURRENT_TIMESTAMP,
			updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (id),
			KEY email (email),
			KEY erpid (erpid)
		) $charset_collate;";
		
		dbDelta( $sql_home );
		
		// Create wp_erp_demopage table (if needed)
		$table_demopage = self::get_table_name( 'erp_demopage' );
		$sql_demopage = "CREATE TABLE IF NOT EXISTS $table_demopage (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			name varchar(255) NOT NULL,
			email varchar(255) NOT NULL,
			phone varchar(50) DEFAULT NULL,
			msg text DEFAULT NULL,
			org varchar(255) DEFAULT NULL,
			erpid varchar(100) DEFAULT NULL,
			created_at datetime DEFAULT CURRENT_TIMESTAMP,
			updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (id),
			KEY email (email),
			KEY erpid (erpid)
		) $charset_collate;";
		
		dbDelta( $sql_demopage );
		
		// Create wp_erp_partner table (if needed)
		$table_partner = self::get_table_name( 'erp_partner' );
		$sql_partner = "CREATE TABLE IF NOT EXISTS $table_partner (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			name varchar(255) NOT NULL,
			email varchar(255) NOT NULL,
			phone varchar(50) DEFAULT NULL,
			msg text DEFAULT NULL,
			org varchar(255) DEFAULT NULL,
			erpid varchar(100) DEFAULT NULL,
			created_at datetime DEFAULT CURRENT_TIMESTAMP,
			updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (id),
			KEY email (email),
			KEY erpid (erpid)
		) $charset_collate;";
		
		dbDelta( $sql_partner );
	}

	/**
	 * Create ERP tables when missing (e.g. fresh installs that skipped activation).
	 */
	public static function ensure_tables() {
		global $wpdb;

		$table = self::get_table_name( 'erp_contact' );
		$found = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table ) ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

		if ( $found !== $table ) {
			self::create_tables();
			return;
		}

		self::ensure_erp_contact_ip_column();
	}

	/**
	 * Ensure wp_erp_contact has an ip column.
	 *
	 * @return void
	 */
	public static function ensure_erp_contact_ip_column() {
		global $wpdb;

		static $done = false;
		if ( $done ) {
			return;
		}
		$done = true;

		$table = self::get_table_name( 'erp_contact' );
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery,WordPress.DB.DirectDatabaseQuery.NoCaching
		$col = $wpdb->get_results( $wpdb->prepare( 'SHOW COLUMNS FROM `' . $table . '` LIKE %s', 'ip' ) ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		if ( ! empty( $col ) ) {
			return;
		}

		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery,WordPress.DB.DirectDatabaseQuery.NoCaching,WordPress.DB.DirectDatabaseQuery.SchemaChange
		$wpdb->query( "ALTER TABLE `{$table}` ADD COLUMN `ip` varchar(45) DEFAULT '' AFTER `captcha`" ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
	}

	/**
	 * Check if email exists in any ERP table
	 *
	 * @param string $email Email address.
	 * @return array|false Array with email and erpid, or false if not found.
	 */
	public static function check_email_exists( $email ) {
		global $wpdb;
		
		$tables = array(
			'erp_sidebar',
			'erp_home',
			'erp_demopage',
			'erp_contact',
			'erp_partner',
		);
		
		$query_parts = array();
		foreach ( $tables as $table ) {
			$table_name = self::get_table_name( $table );
			$query_parts[] = $wpdb->prepare( "SELECT email, erpid FROM $table_name WHERE email = %s", $email );
		}
		
		$query = implode( ' UNION ALL ', $query_parts );
		$results = $wpdb->get_results( $query ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		
		if ( ! empty( $results ) ) {
			return array(
				'email' => $results[0]->email,
				'erpid' => $results[0]->erpid,
			);
		}
		
		return false;
	}

	/**
	 * Insert contact into database
	 *
	 * @param string $table_name Table name without prefix.
	 * @param array  $data Data to insert.
	 * @return int|false Insert ID or false on failure.
	 */
	public static function insert_contact( $table_name, $data ) {
		global $wpdb;
		
		$table = self::get_table_name( $table_name );
		
		$defaults = array(
			'name' => '',
			'email' => '',
			'phone' => '',
			'msg' => '',
			'org' => '',
			'erpid' => '',
			'privacy' => '',
			'posh' => 0,
			'captcha' => '',
			'ip' => '',
		);
		
		$data = wp_parse_args( $data, $defaults );
		
		// Sanitize data
		$data = array(
			'name' => sanitize_text_field( $data['name'] ),
			'email' => sanitize_email( $data['email'] ),
			'phone' => sanitize_text_field( $data['phone'] ),
			'msg' => sanitize_textarea_field( $data['msg'] ),
			'org' => sanitize_text_field( $data['org'] ),
			'erpid' => sanitize_text_field( $data['erpid'] ),
			'privacy' => sanitize_text_field( $data['privacy'] ),
			'posh' => absint( $data['posh'] ),
			'captcha' => sanitize_text_field( $data['captcha'] ),
			'ip' => sanitize_text_field( $data['ip'] ),
		);
		
		$result = $wpdb->insert( $table, $data ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
		
		if ( $result ) {
			return $wpdb->insert_id;
		}
		
		return false;
	}

	/**
	 * Update contact in database
	 *
	 * @param string $table_name Table name without prefix.
	 * @param array  $data Data to update.
	 * @param string $email Email to identify the record.
	 * @return int|false Number of rows updated or false on failure.
	 */
	public static function update_contact( $table_name, $data, $email ) {
		global $wpdb;
		
		$table = self::get_table_name( $table_name );
		
		// Sanitize data
		$update_data = array();
		if ( isset( $data['name'] ) ) {
			$update_data['name'] = sanitize_text_field( $data['name'] );
		}
		if ( isset( $data['phone'] ) ) {
			$update_data['phone'] = sanitize_text_field( $data['phone'] );
		}
		if ( isset( $data['msg'] ) ) {
			$update_data['msg'] = sanitize_textarea_field( $data['msg'] );
		}
		if ( isset( $data['org'] ) ) {
			$update_data['org'] = sanitize_text_field( $data['org'] );
		}
		if ( isset( $data['erpid'] ) ) {
			$update_data['erpid'] = sanitize_text_field( $data['erpid'] );
		}
		if ( isset( $data['privacy'] ) ) {
			$update_data['privacy'] = sanitize_text_field( $data['privacy'] );
		}
		if ( isset( $data['posh'] ) ) {
			$update_data['posh'] = absint( $data['posh'] );
		}
		if ( isset( $data['captcha'] ) ) {
			$update_data['captcha'] = sanitize_text_field( $data['captcha'] );
		}
		if ( isset( $data['ip'] ) ) {
			$update_data['ip'] = sanitize_text_field( $data['ip'] );
		}
		
		$result = $wpdb->update(
			$table,
			$update_data,
			array( 'email' => sanitize_email( $email ) ),
			null,
			array( '%s' )
		); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
		
		return $result;
	}
}

