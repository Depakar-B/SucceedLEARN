<?php
/**
 * Database Management Class
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Database Class
 */
class Database {

	/**
	 * @param string $table_name Table without prefix.
	 * @return string
	 */
	public static function get_table_name( $table_name ) {
		global $wpdb;
		return $wpdb->prefix . $table_name;
	}

	public static function create_tables() {
		global $wpdb;
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		$charset_collate = $wpdb->get_charset_collate();
		$table_contact   = self::get_table_name( 'erp_contact' );

		$sql = "CREATE TABLE IF NOT EXISTS $table_contact (
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

		dbDelta( $sql );
		self::ensure_erp_contact_ip_column();
	}

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

	public static function ensure_erp_contact_ip_column() {
		global $wpdb;
		static $done = false;
		if ( $done ) {
			return;
		}
		$done  = true;
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
	 * @param string $email Email.
	 * @return array|false
	 */
	public static function check_email_exists( $email ) {
		global $wpdb;
		$table = self::get_table_name( 'erp_contact' );
		$row   = $wpdb->get_row( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
			$wpdb->prepare( "SELECT email, erpid FROM $table WHERE email = %s LIMIT 1", $email )
		);
		if ( $row ) {
			return array(
				'email' => $row->email,
				'erpid' => $row->erpid,
			);
		}
		return false;
	}

	/**
	 * @param string $table_name Table without prefix.
	 * @param array  $data Data.
	 * @return int|false
	 */
	public static function insert_contact( $table_name, $data ) {
		global $wpdb;
		$table    = self::get_table_name( $table_name );
		$defaults = array(
			'name'    => '',
			'email'   => '',
			'phone'   => '',
			'msg'     => '',
			'org'     => '',
			'erpid'   => '',
			'privacy' => '',
			'posh'    => 0,
			'captcha' => '',
			'ip'      => '',
		);
		$data     = wp_parse_args( $data, $defaults );
		$data     = array(
			'name'    => sanitize_text_field( $data['name'] ),
			'email'   => sanitize_email( $data['email'] ),
			'phone'   => sanitize_text_field( $data['phone'] ),
			'msg'     => sanitize_textarea_field( $data['msg'] ),
			'org'     => sanitize_text_field( $data['org'] ),
			'erpid'   => sanitize_text_field( $data['erpid'] ),
			'privacy' => sanitize_text_field( $data['privacy'] ),
			'posh'    => absint( $data['posh'] ),
			'captcha' => sanitize_text_field( $data['captcha'] ),
			'ip'      => sanitize_text_field( $data['ip'] ),
		);
		$result = $wpdb->insert( $table, $data ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
		return $result ? $wpdb->insert_id : false;
	}

	/**
	 * @param string $table_name Table without prefix.
	 * @param array  $data Data.
	 * @param string $email Email key.
	 * @return int|false
	 */
	public static function update_contact( $table_name, $data, $email ) {
		global $wpdb;
		$table       = self::get_table_name( $table_name );
		$update_data = array();
		foreach ( array( 'name', 'phone', 'msg', 'org', 'erpid', 'privacy', 'captcha', 'ip' ) as $key ) {
			if ( isset( $data[ $key ] ) ) {
				$update_data[ $key ] = ( 'msg' === $key )
					? sanitize_textarea_field( $data[ $key ] )
					: sanitize_text_field( $data[ $key ] );
			}
		}
		if ( isset( $data['posh'] ) ) {
			$update_data['posh'] = absint( $data['posh'] );
		}
		return $wpdb->update( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
			$table,
			$update_data,
			array( 'email' => sanitize_email( $email ) ),
			null,
			array( '%s' )
		);
	}
}
