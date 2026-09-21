<?php
/**
 * Database access for forms and entries.
 *
 * @package FormMailbox
 */

defined( 'ABSPATH' ) || exit;

/**
 * Provides a small, centralized data layer.
 */
final class FormMailbox_Repository {
	/** @var wpdb */
	private $db;

	/** @var string */
	private $forms_table;

	/** @var string */
	private $entries_table;

	/** @var string */
	private $values_table;

	/** @var string */
	private $logs_table;

	/** Constructor. */
	public function __construct() {
		global $wpdb;
		$this->db            = $wpdb;
		$this->forms_table   = $wpdb->prefix . 'fmbx_forms';
		$this->entries_table = $wpdb->prefix . 'fmbx_entries';
		$this->values_table  = $wpdb->prefix . 'fmbx_entry_values';
		$this->logs_table    = $wpdb->prefix . 'fmbx_email_logs';
	}

	/** @return array<object> */
	public function get_forms() {
		return (array) $this->db->get_results( "SELECT * FROM {$this->forms_table} ORDER BY updated_at DESC" ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
	}

	/** @param int $form_id Form ID. @return object|null */
	public function get_form( $form_id ) {
		return $this->db->get_row(
			$this->db->prepare( "SELECT * FROM {$this->forms_table} WHERE id = %d", absint( $form_id ) ) // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
		);
	}

	/**
	 * Creates a form.
	 *
	 * @param string $name Form name.
	 * @param array  $fields Field schema.
	 * @param array  $settings Settings.
	 * @return int
	 */
	public function create_form( $name, array $fields, array $settings ) {
		$now  = current_time( 'mysql' );
		$slug = sanitize_title( $name );

		$this->db->insert(
			$this->forms_table,
			array(
				'uuid'          => wp_generate_uuid4(),
				'name'          => sanitize_text_field( $name ),
				'slug'          => $slug,
				'status'        => 'draft',
				'schema_json'   => wp_json_encode( $fields ),
				'settings_json' => wp_json_encode( $settings ),
				'created_by'    => get_current_user_id(),
				'created_at'    => $now,
				'updated_at'    => $now,
			),
			array( '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%s' )
		);

		return absint( $this->db->insert_id );
	}

	/**
	 * Updates a form.
	 *
	 * @param int    $form_id Form ID.
	 * @param string $name Form name.
	 * @param string $status Status.
	 * @param array  $fields Field schema.
	 * @param array  $settings Settings.
	 * @return bool
	 */
	public function update_form( $form_id, $name, $status, array $fields, array $settings ) {
		$result = $this->db->update(
			$this->forms_table,
			array(
				'name'          => sanitize_text_field( $name ),
				'slug'          => sanitize_title( $name ),
				'status'        => in_array( $status, array( 'draft', 'published' ), true ) ? $status : 'draft',
				'schema_json'   => wp_json_encode( $fields ),
				'settings_json' => wp_json_encode( $settings ),
				'updated_at'    => current_time( 'mysql' ),
			),
			array( 'id' => absint( $form_id ) ),
			array( '%s', '%s', '%s', '%s', '%s', '%s' ),
			array( '%d' )
		);

		return false !== $result;
	}

	/** @param int $form_id Form ID. @return int */
	public function duplicate_form( $form_id ) {
		$form = $this->get_form( $form_id );
		if ( ! $form ) {
			return 0;
		}

		return $this->create_form(
			sprintf( /* translators: %s: original form name. */ __( '%s – Copy', 'formmailbox' ), $form->name ),
			$this->decode_json( $form->schema_json ),
			$this->decode_json( $form->settings_json )
		);
	}

	/** @param int $form_id Form ID. @return bool */
	public function delete_form( $form_id ) {
		$count = (int) $this->db->get_var(
			$this->db->prepare( "SELECT COUNT(*) FROM {$this->entries_table} WHERE form_id = %d", absint( $form_id ) ) // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
		);
		if ( $count > 0 ) {
			return false;
		}

		return false !== $this->db->delete( $this->forms_table, array( 'id' => absint( $form_id ) ), array( '%d' ) );
	}

	/**
	 * Creates an entry and its values.
	 *
	 * @param int   $form_id Form ID.
	 * @param array $values Sanitized values keyed by field key.
	 * @param array $fields Form schema.
	 * @param int   $source_post_id Source post ID.
	 * @param string $source_url Source URL.
	 * @return int
	 */
	public function create_entry( $form_id, array $values, array $fields, $source_post_id, $source_url ) {
		$this->db->insert(
			$this->entries_table,
			array(
				'uuid'           => wp_generate_uuid4(),
				'form_id'        => absint( $form_id ),
				'email_status'   => 'pending',
				'source_post_id' => absint( $source_post_id ),
				'source_url'     => esc_url_raw( $source_url ),
				'created_at'     => current_time( 'mysql' ),
			),
			array( '%s', '%d', '%s', '%d', '%s', '%s' )
		);

		$entry_id = absint( $this->db->insert_id );
		if ( ! $entry_id ) {
			return 0;
		}

		$field_types = array();
		foreach ( $fields as $field ) {
			$field_types[ $field['key'] ] = $field['type'];
		}

		foreach ( $values as $key => $value ) {
			$this->db->insert(
				$this->values_table,
				array(
					'entry_id'   => $entry_id,
					'field_key'  => sanitize_key( $key ),
					'field_type' => isset( $field_types[ $key ] ) ? sanitize_key( $field_types[ $key ] ) : 'text',
					'field_value' => is_array( $value ) ? wp_json_encode( $value ) : $value,
				),
				array( '%d', '%s', '%s', '%s' )
			);
		}

		return $entry_id;
	}

	/** @param int $entry_id Entry ID. @param string $status Status. @return void */
	public function update_entry_email_status( $entry_id, $status ) {
		$this->db->update( $this->entries_table, array( 'email_status' => sanitize_key( $status ) ), array( 'id' => absint( $entry_id ) ), array( '%s' ), array( '%d' ) );
	}

	/** @param int $limit Maximum rows. @return array<object> */
	public function get_entries( $limit = 100 ) {
		return (array) $this->db->get_results(
			$this->db->prepare(
				"SELECT e.*, f.name AS form_name FROM {$this->entries_table} e LEFT JOIN {$this->forms_table} f ON f.id = e.form_id ORDER BY e.created_at DESC LIMIT %d", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
				absint( $limit )
			)
		);
	}

	/** @param int $entry_id Entry ID. @return object|null */
	public function get_entry( $entry_id ) {
		$entry = $this->db->get_row(
			$this->db->prepare(
				"SELECT e.*, f.name AS form_name, f.schema_json, f.settings_json FROM {$this->entries_table} e LEFT JOIN {$this->forms_table} f ON f.id = e.form_id WHERE e.id = %d", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
				absint( $entry_id )
			)
		);
		if ( ! $entry ) {
			return null;
		}

		$entry->values = $this->db->get_results(
			$this->db->prepare( "SELECT field_key, field_type, field_value FROM {$this->values_table} WHERE entry_id = %d ORDER BY id ASC", absint( $entry_id ) ) // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
		);
		$entry->logs   = $this->db->get_results(
			$this->db->prepare( "SELECT * FROM {$this->logs_table} WHERE entry_id = %d ORDER BY id DESC", absint( $entry_id ) ) // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
		);

		return $entry;
	}

	/** @param int $entry_id Entry ID. @return bool */
	public function delete_entry( $entry_id ) {
		$this->db->delete( $this->logs_table, array( 'entry_id' => absint( $entry_id ) ), array( '%d' ) );
		$this->db->delete( $this->values_table, array( 'entry_id' => absint( $entry_id ) ), array( '%d' ) );
		return false !== $this->db->delete( $this->entries_table, array( 'id' => absint( $entry_id ) ), array( '%d' ) );
	}

	/**
	 * Logs an email attempt.
	 *
	 * @param int    $entry_id Entry ID.
	 * @param string $type Notification type.
	 * @param string $recipient Recipient.
	 * @param string $subject Subject.
	 * @param string $status Status.
	 * @return void
	 */
	public function log_email( $entry_id, $type, $recipient, $subject, $status ) {
		$this->db->insert(
			$this->logs_table,
			array(
				'entry_id'         => absint( $entry_id ),
				'notification_type'=> sanitize_key( $type ),
				'recipient'        => sanitize_email( $recipient ),
				'subject'          => sanitize_text_field( $subject ),
				'status'           => sanitize_key( $status ),
				'attempt_count'    => 1,
				'attempted_at'     => current_time( 'mysql' ),
			),
			array( '%d', '%s', '%s', '%s', '%s', '%d', '%s' )
		);
	}

	/** @return array<string,int> */
	public function get_counts() {
		return array(
			'forms'   => (int) $this->db->get_var( "SELECT COUNT(*) FROM {$this->forms_table}" ), // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
			'entries' => (int) $this->db->get_var( "SELECT COUNT(*) FROM {$this->entries_table}" ), // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
			'failed'  => (int) $this->db->get_var( "SELECT COUNT(*) FROM {$this->entries_table} WHERE email_status = 'failed'" ), // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
		);
	}

	/** @param string $json JSON string. @return array */
	public function decode_json( $json ) {
		$decoded = json_decode( (string) $json, true );
		return is_array( $decoded ) ? $decoded : array();
	}
}
