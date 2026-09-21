<?php
/**
 * Database table creation and submission queries.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_ECTA_Database {

	/** @var string|null */
	private $table_name = null;

	public function get_table_name() {
		global $wpdb;
		if ( null === $this->table_name ) {
			$this->table_name = "{$wpdb->prefix}sl_ecta_submissions";
		}
		return $this->table_name;
	}

	public function create_table() {
		global $wpdb;
		$table_name      = $this->get_table_name();
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE {$table_name} (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			email VARCHAR(255) NOT NULL,
			source VARCHAR(100) DEFAULT '',
			utm_source VARCHAR(255) DEFAULT '',
			utm_medium VARCHAR(255) DEFAULT '',
			utm_campaign VARCHAR(255) DEFAULT '',
			utm_term VARCHAR(255) DEFAULT '',
			utm_content VARCHAR(255) DEFAULT '',
			page_url TEXT,
			user_ip VARCHAR(100) DEFAULT '',
			user_agent TEXT,
			created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (id),
			KEY email (email),
			KEY created_at (created_at),
			KEY source (source)
		) {$charset_collate};";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}

	public function ensure_table_exists() {
		global $wpdb;
		$table_name = $this->get_table_name();
		$exists     = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table_name ) );
		if ( $exists !== $table_name ) {
			$this->create_table();
		}
	}

	/**
	 * @param array $data Row data.
	 * @return int|false Insert ID or false on failure.
	 */
	public function insert_submission( $data ) {
		global $wpdb;
		$this->ensure_table_exists();
		$result = $wpdb->insert( $this->get_table_name(), $data );
		return false === $result ? false : (int) $wpdb->insert_id;
	}

	/**
	 * @param array $filters Filter values.
	 * @return array
	 */
	public function get_submissions( $filters = array() ) {
		global $wpdb;
		$where   = array();
		$prepare = array();

		if ( ! empty( $filters['start_date'] ) ) {
			$where[]   = 'created_at >= %s';
			$prepare[] = gmdate( 'Y-m-d 00:00:00', strtotime( $filters['start_date'] ) );
		}
		if ( ! empty( $filters['end_date'] ) ) {
			$where[]   = 'created_at <= %s';
			$prepare[] = gmdate( 'Y-m-d 23:59:59', strtotime( $filters['end_date'] ) );
		}
		if ( ! empty( $filters['email'] ) ) {
			$where[]   = 'email LIKE %s';
			$prepare[] = '%' . $wpdb->esc_like( $filters['email'] ) . '%';
		}
		if ( ! empty( $filters['source'] ) ) {
			$where[]   = 'source LIKE %s';
			$prepare[] = '%' . $wpdb->esc_like( $filters['source'] ) . '%';
		}

		$sql = 'SELECT * FROM ' . $this->get_table_name();
		if ( $where ) {
			$sql .= ' WHERE ' . implode( ' AND ', $where );
		}
		$sql .= ' ORDER BY created_at DESC LIMIT 200';

		if ( $prepare ) {
			$sql = $wpdb->prepare( $sql, $prepare ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		}

		return $wpdb->get_results( $sql );
	}

	/**
	 * @param int $id Submission ID.
	 * @return object|null
	 */
	public function get_submission_by_id( $id ) {
		global $wpdb;
		if ( $id <= 0 ) {
			return null;
		}
		$this->ensure_table_exists();
		return $wpdb->get_row(
			$wpdb->prepare(
				'SELECT * FROM ' . $this->get_table_name() . ' WHERE id = %d', // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
				$id
			)
		);
	}
}
