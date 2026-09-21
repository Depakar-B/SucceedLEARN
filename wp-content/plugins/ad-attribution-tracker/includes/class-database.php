<?php
/**
 * Tracking and lead-link tables.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AAT_Database {

	const DB_VERSION = '1.2.1';

	public static function tracking_table() {
		global $wpdb;
		return $wpdb->prefix . 'aat_tracking';
	}

	public static function links_table() {
		global $wpdb;
		return $wpdb->prefix . 'aat_form_links';
	}

	public static function ads_table() {
		global $wpdb;
		return $wpdb->prefix . 'aat_ads';
	}

	public static function maybe_upgrade() {
		$current = get_option( 'aat_db_version' );
		if ( $current !== self::DB_VERSION ) {
			self::create_tables();
			self::repair_landing_pages();
		}
	}

	public static function activate() {
		self::create_tables();
		self::ensure_defaults();
		if ( ! wp_next_scheduled( 'aat_cleanup' ) ) {
			wp_schedule_event( time() + HOUR_IN_SECONDS, 'daily', 'aat_cleanup' );
		}
	}

	public static function deactivate() {
		wp_clear_scheduled_hook( 'aat_cleanup' );
	}

	public static function ensure_defaults() {
		$defaults = array(
			'enabled'             => 1,
			'cookie_days'         => 90,
			'retention_days'      => 90,
			'delete_on_uninstall' => 0,
		);
		$current = get_option( 'aat_settings', array() );
		if ( ! is_array( $current ) ) {
			$current = array();
		}
		update_option( 'aat_settings', array_merge( $defaults, $current ) );
		update_option( 'aat_db_version', self::DB_VERSION );
	}

	public static function get_settings() {
		$defaults = array(
			'enabled'             => 1,
			'cookie_days'         => 90,
			'retention_days'      => 90,
			'delete_on_uninstall' => 0,
		);
		$saved = get_option( 'aat_settings', array() );
		if ( ! is_array( $saved ) ) {
			$saved = array();
		}
		return array_merge( $defaults, $saved );
	}

	public static function create_tables() {
		global $wpdb;

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		$charset  = $wpdb->get_charset_collate();
		$tracking = self::tracking_table();
		$links    = self::links_table();
		$ads      = self::ads_table();

		dbDelta(
			"CREATE TABLE {$tracking} (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				visitor_id VARCHAR(64) NOT NULL,
				first_source VARCHAR(255) NOT NULL DEFAULT '',
				first_medium VARCHAR(255) NOT NULL DEFAULT '',
				first_campaign VARCHAR(255) NOT NULL DEFAULT '',
				first_term VARCHAR(255) NOT NULL DEFAULT '',
				first_content VARCHAR(255) NOT NULL DEFAULT '',
				first_platform VARCHAR(255) NOT NULL DEFAULT '',
				first_campaign_id VARCHAR(255) NOT NULL DEFAULT '',
				first_ad_id VARCHAR(255) NOT NULL DEFAULT '',
				first_creative_id VARCHAR(255) NOT NULL DEFAULT '',
				first_click_id VARCHAR(255) NOT NULL DEFAULT '',
				last_source VARCHAR(255) NOT NULL DEFAULT '',
				last_medium VARCHAR(255) NOT NULL DEFAULT '',
				last_campaign VARCHAR(255) NOT NULL DEFAULT '',
				last_term VARCHAR(255) NOT NULL DEFAULT '',
				last_content VARCHAR(255) NOT NULL DEFAULT '',
				last_platform VARCHAR(255) NOT NULL DEFAULT '',
				last_campaign_id VARCHAR(255) NOT NULL DEFAULT '',
				last_ad_id VARCHAR(255) NOT NULL DEFAULT '',
				last_creative_id VARCHAR(255) NOT NULL DEFAULT '',
				last_click_id VARCHAR(255) NOT NULL DEFAULT '',
				gclid VARCHAR(255) NOT NULL DEFAULT '',
				gbraid VARCHAR(255) NOT NULL DEFAULT '',
				wbraid VARCHAR(255) NOT NULL DEFAULT '',
				fbclid VARCHAR(255) NOT NULL DEFAULT '',
				li_fat_id VARCHAR(255) NOT NULL DEFAULT '',
				landing_page VARCHAR(500) NOT NULL DEFAULT '',
				referrer VARCHAR(500) NOT NULL DEFAULT '',
				first_seen DATETIME NOT NULL,
				last_seen DATETIME NOT NULL,
				created_at DATETIME NOT NULL,
				updated_at DATETIME NOT NULL,
				PRIMARY KEY  (id),
				UNIQUE KEY visitor_id (visitor_id),
				KEY last_ad_id (last_ad_id),
				KEY last_campaign_id (last_campaign_id),
				KEY last_platform (last_platform)
			) {$charset};"
		);

		dbDelta(
			"CREATE TABLE {$links} (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				visitor_id VARCHAR(64) NOT NULL DEFAULT '',
				form_key VARCHAR(64) NOT NULL DEFAULT '',
				form_lead_id BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
				form_table VARCHAR(191) NOT NULL DEFAULT '',
				platform VARCHAR(255) NOT NULL DEFAULT '',
				ad_id VARCHAR(255) NOT NULL DEFAULT '',
				campaign_id VARCHAR(255) NOT NULL DEFAULT '',
				creative_id VARCHAR(255) NOT NULL DEFAULT '',
				utm_source VARCHAR(255) NOT NULL DEFAULT '',
				utm_medium VARCHAR(255) NOT NULL DEFAULT '',
				utm_campaign VARCHAR(255) NOT NULL DEFAULT '',
				utm_term VARCHAR(255) NOT NULL DEFAULT '',
				utm_content VARCHAR(255) NOT NULL DEFAULT '',
				gclid VARCHAR(255) NOT NULL DEFAULT '',
				gbraid VARCHAR(255) NOT NULL DEFAULT '',
				wbraid VARCHAR(255) NOT NULL DEFAULT '',
				fbclid VARCHAR(255) NOT NULL DEFAULT '',
				li_fat_id VARCHAR(255) NOT NULL DEFAULT '',
				attribution_touch VARCHAR(16) NOT NULL DEFAULT 'last',
				created_at DATETIME NOT NULL,
				PRIMARY KEY  (id),
				UNIQUE KEY form_lead (form_key, form_lead_id),
				KEY visitor_id (visitor_id),
				KEY form_lead_id (form_lead_id),
				KEY ad_id (ad_id)
			) {$charset};"
		);

		dbDelta(
			"CREATE TABLE {$ads} (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				ad_id VARCHAR(255) NOT NULL,
				ad_name VARCHAR(255) NOT NULL DEFAULT '',
				platform VARCHAR(255) NOT NULL DEFAULT '',
				campaign_id VARCHAR(255) NOT NULL DEFAULT '',
				campaign_name VARCHAR(255) NOT NULL DEFAULT '',
				creative_id VARCHAR(255) NOT NULL DEFAULT '',
				utm_source VARCHAR(255) NOT NULL DEFAULT '',
				utm_medium VARCHAR(255) NOT NULL DEFAULT '',
				utm_campaign VARCHAR(255) NOT NULL DEFAULT '',
				utm_content VARCHAR(255) NOT NULL DEFAULT '',
				ad_url VARCHAR(1000) NOT NULL DEFAULT '',
				notes VARCHAR(500) NOT NULL DEFAULT '',
				auto_created TINYINT(1) NOT NULL DEFAULT 0,
				created_at DATETIME NOT NULL,
				updated_at DATETIME NOT NULL,
				PRIMARY KEY  (id),
				UNIQUE KEY ad_id (ad_id)
			) {$charset};"
		);

		update_option( 'aat_db_version', self::DB_VERSION );
	}

	/**
	 * @return array<string, string>|null
	 */
	public static function get_by_visitor_id( $visitor_id ) {
		global $wpdb;

		$visitor_id = sanitize_text_field( (string) $visitor_id );
		if ( '' === $visitor_id ) {
			return null;
		}

		$row = $wpdb->get_row(
			$wpdb->prepare(
				'SELECT * FROM ' . self::tracking_table() . ' WHERE visitor_id = %s LIMIT 1',
				$visitor_id
			),
			ARRAY_A
		);

		return is_array( $row ) ? $row : null;
	}

	/**
	 * @param array<string, mixed> $data
	 * @return int
	 */
	public static function insert_tracking( $data ) {
		global $wpdb;
		$wpdb->insert( self::tracking_table(), $data );
		return (int) $wpdb->insert_id;
	}

	/**
	 * @param string               $visitor_id
	 * @param array<string, mixed> $data
	 */
	public static function update_tracking( $visitor_id, $data ) {
		global $wpdb;
		$wpdb->update(
			self::tracking_table(),
			$data,
			array( 'visitor_id' => $visitor_id )
		);
	}

	/**
	 * @param string $form_key
	 * @param int    $form_lead_id
	 */
	public static function link_exists( $form_key, $form_lead_id ) {
		global $wpdb;

		$id = $wpdb->get_var(
			$wpdb->prepare(
				'SELECT id FROM ' . self::links_table() . ' WHERE form_key = %s AND form_lead_id = %d LIMIT 1',
				$form_key,
				$form_lead_id
			)
		);

		return ! empty( $id );
	}

	/**
	 * @param array<string, mixed> $data
	 * @return int
	 */
	public static function insert_link( $data ) {
		global $wpdb;
		$wpdb->insert( self::links_table(), $data );
		return (int) $wpdb->insert_id;
	}

	/**
	 * @param string $search
	 * @param int    $limit
	 * @return array<int, array<string, string>>
	 */
	public static function get_tracking_rows( $search = '', $limit = 100 ) {
		global $wpdb;

		$limit = max( 1, min( 200, (int) $limit ) );
		$table = self::tracking_table();

		if ( '' !== $search ) {
			$like = '%' . $wpdb->esc_like( $search ) . '%';
			return $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM {$table} WHERE visitor_id LIKE %s OR last_ad_id LIKE %s OR first_ad_id LIKE %s OR last_campaign LIKE %s ORDER BY last_seen DESC LIMIT %d",
					$like,
					$like,
					$like,
					$like,
					$limit
				),
				ARRAY_A
			);
		}

		return $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM {$table} ORDER BY last_seen DESC LIMIT %d",
				$limit
			),
			ARRAY_A
		);
	}

	/**
	 * @param string $search
	 * @param int    $limit
	 * @return array<int, array<string, string>>
	 */
	public static function get_link_rows( $search = '', $limit = 100 ) {
		global $wpdb;

		$limit = max( 1, min( 200, (int) $limit ) );
		$table = self::links_table();

		if ( '' !== $search ) {
			$like = '%' . $wpdb->esc_like( $search ) . '%';
			return $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM {$table} WHERE visitor_id LIKE %s OR ad_id LIKE %s OR campaign_id LIKE %s OR form_lead_id LIKE %s OR platform LIKE %s ORDER BY created_at DESC LIMIT %d",
					$like,
					$like,
					$like,
					$like,
					$like,
					$limit
				),
				ARRAY_A
			);
		}

		return $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM {$table} ORDER BY created_at DESC LIMIT %d",
				$limit
			),
			ARRAY_A
		);
	}

	public static function cleanup() {
		global $wpdb;

		$settings = self::get_settings();
		$days     = max( 1, (int) $settings['retention_days'] );

		$wpdb->query(
			$wpdb->prepare(
				'DELETE FROM ' . self::tracking_table() . ' WHERE last_seen < DATE_SUB(NOW(), INTERVAL %d DAY)',
				$days
			)
		);
		$wpdb->query(
			$wpdb->prepare(
				'DELETE FROM ' . self::links_table() . ' WHERE created_at < DATE_SUB(NOW(), INTERVAL %d DAY)',
				$days
			)
		);
	}

	/**
	 * @return array<string, string> ad_id => ad_name
	 */
	public static function get_ad_name_map() {
		global $wpdb;

		$rows = $wpdb->get_results(
			'SELECT ad_id, ad_name FROM ' . self::ads_table(),
			ARRAY_A
		);
		$map = array();
		if ( is_array( $rows ) ) {
			foreach ( $rows as $row ) {
				$map[ (string) $row['ad_id'] ] = (string) $row['ad_name'];
			}
		}
		return $map;
	}

	/**
	 * @return array<int, array<string, string>>
	 */
	public static function get_ads() {
		global $wpdb;
		$rows = $wpdb->get_results(
			'SELECT * FROM ' . self::ads_table() . ' ORDER BY ad_name ASC',
			ARRAY_A
		);
		return is_array( $rows ) ? $rows : array();
	}

	/**
	 * @return array<string, string>|null
	 */
	public static function get_ad_by_id( $ad_id ) {
		global $wpdb;
		$ad_id = sanitize_text_field( (string) $ad_id );
		if ( '' === $ad_id ) {
			return null;
		}
		$row = $wpdb->get_row(
			$wpdb->prepare(
				'SELECT * FROM ' . self::ads_table() . ' WHERE ad_id = %s LIMIT 1',
				$ad_id
			),
			ARRAY_A
		);
		return is_array( $row ) ? $row : null;
	}

	/**
	 * @param array<string, string> $data
	 * @return bool
	 */
	public static function save_ad( $data ) {
		global $wpdb;

		$ad_id = sanitize_text_field( (string) ( $data['ad_id'] ?? '' ) );
		$name  = sanitize_text_field( (string) ( $data['ad_name'] ?? '' ) );
		if ( '' === $ad_id || '' === $name ) {
			return false;
		}

		$now = current_time( 'mysql' );
		$row = array(
			'ad_id'         => $ad_id,
			'ad_name'       => $name,
			'platform'      => sanitize_text_field( (string) ( $data['platform'] ?? '' ) ),
			'campaign_id'   => sanitize_text_field( (string) ( $data['campaign_id'] ?? '' ) ),
			'campaign_name' => sanitize_text_field( (string) ( $data['campaign_name'] ?? '' ) ),
			'creative_id'   => sanitize_text_field( (string) ( $data['creative_id'] ?? '' ) ),
			'utm_source'    => sanitize_text_field( (string) ( $data['utm_source'] ?? '' ) ),
			'utm_medium'    => sanitize_text_field( (string) ( $data['utm_medium'] ?? '' ) ),
			'utm_campaign'  => sanitize_text_field( (string) ( $data['utm_campaign'] ?? '' ) ),
			'utm_content'   => sanitize_text_field( (string) ( $data['utm_content'] ?? '' ) ),
			'ad_url'        => esc_url_raw( (string) ( $data['ad_url'] ?? '' ) ),
			'notes'         => sanitize_text_field( (string) ( $data['notes'] ?? '' ) ),
			'auto_created'  => 0,
			'updated_at'    => $now,
		);

		$existing = self::get_ad_by_id( $ad_id );
		if ( $existing ) {
			$wpdb->update( self::ads_table(), $row, array( 'ad_id' => $ad_id ) );
			return true;
		}

		$row['created_at'] = $now;
		$wpdb->insert( self::ads_table(), $row );
		return true;
	}

	/**
	 * Auto-create or fill an ad registry row from landing URL params.
	 * Does not overwrite a manually set ad_name or ad_url.
	 *
	 * @param array<string, string> $params Sanitized attribution params.
	 * @param string                $ad_url Canonical tracking URL without click IDs.
	 */
	public static function auto_register_ad( $params, $ad_url = '' ) {
		global $wpdb;

		$ad_id = sanitize_text_field( (string) ( $params['ad_id'] ?? '' ) );
		if ( '' === $ad_id ) {
			return;
		}

		$now      = current_time( 'mysql' );
		$existing = self::get_ad_by_id( $ad_id );
		$auto_name = self::build_auto_ad_name( $params );

		$incoming = array(
			'platform'      => sanitize_text_field( (string) ( $params['platform'] ?? '' ) ),
			'campaign_id'   => sanitize_text_field( (string) ( $params['campaign_id'] ?? '' ) ),
			'campaign_name' => sanitize_text_field( (string) ( $params['utm_campaign'] ?? '' ) ),
			'creative_id'   => sanitize_text_field( (string) ( $params['creative_id'] ?? '' ) ),
			'utm_source'    => sanitize_text_field( (string) ( $params['utm_source'] ?? '' ) ),
			'utm_medium'    => sanitize_text_field( (string) ( $params['utm_medium'] ?? '' ) ),
			'utm_campaign'  => sanitize_text_field( (string) ( $params['utm_campaign'] ?? '' ) ),
			'utm_content'   => sanitize_text_field( (string) ( $params['utm_content'] ?? '' ) ),
			'ad_url'        => esc_url_raw( (string) $ad_url ),
		);

		if ( null === $existing ) {
			$wpdb->insert(
				self::ads_table(),
				array_merge(
					$incoming,
					array(
						'ad_id'        => $ad_id,
						'ad_name'      => $auto_name,
						'notes'        => 'Auto-created from first tracked visit',
						'auto_created' => 1,
						'created_at'   => $now,
						'updated_at'   => $now,
					)
				)
			);
			return;
		}

		$update = array( 'updated_at' => $now );
		foreach ( $incoming as $key => $value ) {
			if ( '' === $value ) {
				continue;
			}
			if ( 'ad_url' === $key && ! empty( $existing['ad_url'] ) ) {
				continue;
			}
			if ( empty( $existing[ $key ] ) ) {
				$update[ $key ] = $value;
			}
		}

		if ( ! empty( $existing['auto_created'] ) && '' !== $auto_name ) {
			$current_name = (string) $existing['ad_name'];
			if ( '' === $current_name || 0 === strpos( $current_name, 'Ad ' ) ) {
				$update['ad_name'] = $auto_name;
			}
		}

		if ( count( $update ) > 1 ) {
			$wpdb->update( self::ads_table(), $update, array( 'ad_id' => $ad_id ) );
		}
	}

	/**
	 * @param array<string, string> $params
	 */
	public static function build_auto_ad_name( $params ) {
		$parts = array();
		foreach ( array( 'platform', 'utm_campaign', 'utm_content' ) as $key ) {
			if ( ! empty( $params[ $key ] ) ) {
				$parts[] = sanitize_text_field( (string) $params[ $key ] );
			}
		}
		if ( empty( $parts ) && ! empty( $params['ad_id'] ) ) {
			return 'Ad ' . sanitize_text_field( (string) $params['ad_id'] );
		}
		if ( empty( $parts ) ) {
			return 'Untitled ad';
		}
		$name = implode( ' · ', $parts );
		if ( strlen( $name ) > 255 ) {
			return substr( $name, 0, 255 );
		}
		return $name;
	}

	/**
	 * Build a reusable tracking URL (click IDs stripped).
	 *
	 * @param array<string, string> $params
	 * @param string                $path Request path or full URL.
	 */
	public static function build_tracking_url( $params, $path = '/' ) {
		$path = (string) $path;
		if ( 0 === strpos( $path, 'http://' ) || 0 === strpos( $path, 'https://' ) ) {
			$path = (string) wp_parse_url( $path, PHP_URL_PATH );
		}

		$path = self::normalize_landing_path( $path );
		$home_path = untrailingslashit( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ) );

		if ( '' !== $home_path && '/' !== $home_path && 0 === strpos( $path, $home_path ) ) {
			$relative = substr( $path, strlen( $home_path ) );
			if ( '' === $relative ) {
				$relative = '/';
			}
			$clean = home_url( $relative );
		} else {
			$clean = home_url( $path ? $path : '/' );
		}

		$query = array();
		foreach ( array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'platform', 'campaign_id', 'ad_id', 'creative_id' ) as $key ) {
			if ( ! empty( $params[ $key ] ) ) {
				$query[ $key ] = $params[ $key ];
			}
		}

		return empty( $query ) ? $clean : add_query_arg( $query, $clean );
	}

	/**
	 * Remove doubled subdirectory paths like /Succeedlearn/Succeedlearn/...
	 *
	 * @param string $path
	 * @return string
	 */
	public static function normalize_landing_path( $path ) {
		$path = (string) $path;
		if ( 0 === strpos( $path, 'http://' ) || 0 === strpos( $path, 'https://' ) ) {
			$path = (string) wp_parse_url( $path, PHP_URL_PATH );
		} else {
			$path = (string) wp_parse_url( $path, PHP_URL_PATH );
		}
		if ( '' === $path ) {
			$path = '/';
		}

		$home_path = untrailingslashit( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ) );
		if ( '' !== $home_path && '/' !== $home_path ) {
			$doubled = $home_path . $home_path;
			while ( false !== strpos( $path, $doubled ) ) {
				$path = str_replace( $doubled, $home_path, $path );
			}
		}

		return $path;
	}

	/**
	 * Repair doubled landing_page values already stored.
	 */
	public static function repair_landing_pages() {
		global $wpdb;

		$home_path = untrailingslashit( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ) );
		if ( '' === $home_path || '/' === $home_path ) {
			return;
		}

		$doubled = $home_path . $home_path;
		$table   = self::tracking_table();
		$wpdb->query(
			$wpdb->prepare(
				"UPDATE {$table} SET landing_page = REPLACE(landing_page, %s, %s) WHERE landing_page LIKE %s",
				$doubled,
				$home_path,
				'%' . $wpdb->esc_like( $doubled ) . '%'
			)
		);
	}

	public static function delete_ad( $ad_id ) {
		global $wpdb;
		$ad_id = sanitize_text_field( (string) $ad_id );
		if ( '' === $ad_id ) {
			return;
		}
		$wpdb->delete( self::ads_table(), array( 'ad_id' => $ad_id ) );
	}

	/**
	 * Ad IDs seen in tracking/leads that have no name yet.
	 *
	 * @return array<int, string>
	 */
	public static function get_unlabeled_ad_ids() {
		global $wpdb;

		$seen = $wpdb->get_col( 'SELECT DISTINCT last_ad_id FROM ' . self::tracking_table() . " WHERE last_ad_id <> ''" );
		$first = $wpdb->get_col( 'SELECT DISTINCT first_ad_id FROM ' . self::tracking_table() . " WHERE first_ad_id <> ''" );
		$linked = $wpdb->get_col( 'SELECT DISTINCT ad_id FROM ' . self::links_table() . " WHERE ad_id <> ''" );
		$named  = $wpdb->get_col( 'SELECT ad_id FROM ' . self::ads_table() );

		$all = array_unique( array_merge( (array) $seen, (array) $first, (array) $linked ) );
		$named = array_map( 'strval', (array) $named );
		$out   = array();
		foreach ( $all as $id ) {
			$id = (string) $id;
			if ( '' !== $id && ! in_array( $id, $named, true ) ) {
				$out[] = $id;
			}
		}
		sort( $out );
		return $out;
	}
}
