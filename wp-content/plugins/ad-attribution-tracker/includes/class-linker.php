<?php
/**
 * Link form lead IDs to visitor attribution.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AAT_Linker {

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_action( 'ssf_after_submission', array( $this, 'on_ssf_submission' ), 20, 2 );
		add_filter( 'ssf_admin_email_body', array( $this, 'append_email_attribution' ), 20, 2 );
	}

	/**
	 * Auto-link Cybersecurity / SEO form leads only.
	 *
	 * @param array $data      Submission payload.
	 * @param int   $insert_id Lead ID.
	 */
	public function on_ssf_submission( $data, $insert_id = 0 ) {
		$lead_id = absint( $insert_id );
		if ( $lead_id < 1 && is_array( $data ) ) {
			$lead_id = absint( $data['submission_id'] ?? 0 );
		}
		if ( $lead_id < 1 ) {
			return;
		}

		$table = '';
		if ( is_array( $data ) ) {
			$table = sanitize_text_field( (string) ( $data['ssf_table'] ?? '' ) );
		}
		self::link_submission( $lead_id, 'cybersecurity', $table );
	}

	/**
	 * Append visitor / ad attribution block to cybersecurity admin emails only.
	 *
	 * @param string $body Email HTML.
	 * @param array  $data Submission data.
	 * @return string
	 */
	public function append_email_attribution( $body, $data = array() ) {
		unset( $data );
		return (string) $body . AAT_Attribution::email_html_block();
	}

	/**
	 * @param int    $form_lead_id
	 * @param string $form_key
	 * @param string $form_table
	 * @return bool
	 */
	public static function link_submission( $form_lead_id, $form_key = 'custom', $form_table = '' ) {
		$form_lead_id = absint( $form_lead_id );
		$form_key     = sanitize_key( (string) $form_key );
		$form_table   = sanitize_text_field( (string) $form_table );

		if ( $form_lead_id < 1 ) {
			return false;
		}
		if ( '' === $form_key ) {
			$form_key = 'custom';
		}

		if ( AAT_Database::link_exists( $form_key, $form_lead_id ) ) {
			return true;
		}

		$attr       = AAT_Attribution::get_data();
		$visitor_id = (string) $attr['visitor_id'];

		AAT_Database::insert_link(
			array(
				'visitor_id'         => $visitor_id,
				'form_key'           => $form_key,
				'form_lead_id'       => $form_lead_id,
				'form_table'         => $form_table,
				'platform'           => $attr['platform'],
				'ad_id'              => $attr['ad_id'],
				'campaign_id'        => $attr['campaign_id'],
				'creative_id'        => $attr['creative_id'],
				'utm_source'         => $attr['utm_source'],
				'utm_medium'         => $attr['utm_medium'],
				'utm_campaign'       => $attr['utm_campaign'],
				'utm_term'           => $attr['utm_term'],
				'utm_content'        => $attr['utm_content'],
				'gclid'              => $attr['gclid'],
				'gbraid'             => $attr['gbraid'],
				'wbraid'             => $attr['wbraid'],
				'fbclid'             => $attr['fbclid'],
				'li_fat_id'          => $attr['li_fat_id'],
				'attribution_touch'  => 'last',
				'created_at'         => current_time( 'mysql' ),
			)
		);

		return true;
	}
}
