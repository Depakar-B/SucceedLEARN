<?php
/**
 * Database table creation and submission queries.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SSF_Database {

	/** @var string|null */
	private $table_name = null;

	public function get_table_name() {
		global $wpdb;
		if ( null === $this->table_name ) {
			$this->table_name = "{$wpdb->prefix}ssf_seo_submissions";
		}
		return $this->table_name;
	}

	public function create_table() {
		global $wpdb;
		$table_name      = $this->get_table_name();
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE {$table_name} (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL,
			email VARCHAR(255) NOT NULL,
			phone_country_code VARCHAR(10) DEFAULT '',
			phone_number VARCHAR(30) DEFAULT '',
			job_title VARCHAR(255) DEFAULT '',
			employees VARCHAR(50) DEFAULT '',
			message TEXT,
			privacy_accepted TINYINT(1) DEFAULT 0,
			authorised_confirm TINYINT(1) DEFAULT 0,
			form_variant VARCHAR(32) DEFAULT 'default',
			utm_source VARCHAR(255) DEFAULT '',
			utm_medium VARCHAR(255) DEFAULT '',
			utm_campaign VARCHAR(255) DEFAULT '',
			utm_term VARCHAR(255) DEFAULT '',
			utm_content VARCHAR(255) DEFAULT '',
			source_tag VARCHAR(100) DEFAULT '',
			page_url TEXT,
			user_ip VARCHAR(100) DEFAULT '',
			user_agent TEXT,
			created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (id),
			KEY email (email),
			KEY created_at (created_at),
			KEY form_variant (form_variant)
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
			return;
		}

		$this->maybe_add_column( 'employees', "ALTER TABLE `{$table_name}` ADD COLUMN employees VARCHAR(50) DEFAULT '' AFTER phone_number" );
		$this->maybe_add_column( 'job_title', "ALTER TABLE `{$table_name}` ADD COLUMN job_title VARCHAR(255) DEFAULT '' AFTER phone_number" );
		$this->maybe_add_column( 'authorised_confirm', "ALTER TABLE `{$table_name}` ADD COLUMN authorised_confirm TINYINT(1) DEFAULT 0 AFTER privacy_accepted" );
		$this->maybe_add_column( 'form_variant', "ALTER TABLE `{$table_name}` ADD COLUMN form_variant VARCHAR(32) DEFAULT 'default' AFTER authorised_confirm" );
	}

	/**
	 * @param string $column Column name.
	 * @param string $alter_sql ALTER TABLE statement.
	 */
	private function maybe_add_column( $column, $alter_sql ) {
		global $wpdb;
		$table_name = $this->get_table_name();
		$exists     = $wpdb->get_results( $wpdb->prepare( 'SHOW COLUMNS FROM `' . $table_name . '` LIKE %s', $column ) ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		if ( empty( $exists ) ) {
			$wpdb->query( $alter_sql ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
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
		if ( ! empty( $filters['form_variant'] ) ) {
			$where[]   = 'form_variant = %s';
			$prepare[] = sanitize_key( $filters['form_variant'] );
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
				'SELECT * FROM ' . $this->get_table_name() . ' WHERE id = %d',
				$id
			)
		);
	}
}
