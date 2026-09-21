<?php
/**
 * Public attribution API for any WordPress form.
 *
 * Example:
 *
 *   $attribution = aat_get_attribution();
 *   $visitor_id  = $attribution['visitor_id'];
 *   $ad_id       = $attribution['ad_id'];
 *   $campaign_id = $attribution['campaign_id'];
 *   $platform    = $attribution['platform'];
 *   $source      = $attribution['utm_source'];
 *   $campaign    = $attribution['utm_campaign'];
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AAT_Attribution {

	/**
	 * Primary short keys use last-touch, falling back to first-touch.
	 *
	 * @return array<string, string>
	 */
	public static function get_data() {
		$empty = self::empty_payload();
		$visitor_id = AAT_Tracker::current_visitor_id();
		if ( '' === $visitor_id ) {
			return $empty;
		}

		$row = AAT_Database::get_by_visitor_id( $visitor_id );
		if ( null === $row ) {
			$empty['visitor_id'] = $visitor_id;
			return $empty;
		}

		$last = array(
			'utm_source'   => (string) $row['last_source'],
			'utm_medium'   => (string) $row['last_medium'],
			'utm_campaign' => (string) $row['last_campaign'],
			'utm_term'     => (string) $row['last_term'],
			'utm_content'  => (string) $row['last_content'],
			'platform'     => (string) $row['last_platform'],
			'campaign_id'  => (string) $row['last_campaign_id'],
			'ad_id'        => (string) $row['last_ad_id'],
			'creative_id'  => (string) $row['last_creative_id'],
		);

		$first = array(
			'utm_source'   => (string) $row['first_source'],
			'utm_medium'   => (string) $row['first_medium'],
			'utm_campaign' => (string) $row['first_campaign'],
			'utm_term'     => (string) $row['first_term'],
			'utm_content'  => (string) $row['first_content'],
			'platform'     => (string) $row['first_platform'],
			'campaign_id'  => (string) $row['first_campaign_id'],
			'ad_id'        => (string) $row['first_ad_id'],
			'creative_id'  => (string) $row['first_creative_id'],
		);

		$primary = array();
		foreach ( $last as $key => $value ) {
			$primary[ $key ] = ( '' !== $value ) ? $value : $first[ $key ];
		}

		return array_merge(
			$empty,
			$primary,
			array(
				'visitor_id'        => (string) $row['visitor_id'],
				'gclid'             => (string) $row['gclid'],
				'gbraid'            => (string) $row['gbraid'],
				'wbraid'            => (string) $row['wbraid'],
				'fbclid'            => (string) $row['fbclid'],
				'li_fat_id'         => (string) $row['li_fat_id'],
				'landing_page'      => AAT_Database::normalize_landing_path( (string) $row['landing_page'] ),
				'referrer'          => (string) $row['referrer'],
				'first_source'      => (string) $row['first_source'],
				'first_medium'      => (string) $row['first_medium'],
				'first_campaign'    => (string) $row['first_campaign'],
				'first_term'        => (string) $row['first_term'],
				'first_content'     => (string) $row['first_content'],
				'first_platform'    => (string) $row['first_platform'],
				'first_campaign_id' => (string) $row['first_campaign_id'],
				'first_ad_id'       => (string) $row['first_ad_id'],
				'first_creative_id' => (string) $row['first_creative_id'],
				'first_click_id'    => (string) $row['first_click_id'],
				'last_source'       => (string) $row['last_source'],
				'last_medium'       => (string) $row['last_medium'],
				'last_campaign'     => (string) $row['last_campaign'],
				'last_term'         => (string) $row['last_term'],
				'last_content'      => (string) $row['last_content'],
				'last_platform'     => (string) $row['last_platform'],
				'last_campaign_id'  => (string) $row['last_campaign_id'],
				'last_ad_id'        => (string) $row['last_ad_id'],
				'last_creative_id'  => (string) $row['last_creative_id'],
				'last_click_id'     => (string) $row['last_click_id'],
				'first_seen'        => (string) $row['first_seen'],
				'last_seen'         => (string) $row['last_seen'],
			)
		);
	}

	/**
	 * @return array<string, string>
	 */
	private static function empty_payload() {
		return array(
			'visitor_id'        => '',
			'utm_source'        => '',
			'utm_medium'        => '',
			'utm_campaign'      => '',
			'utm_term'          => '',
			'utm_content'       => '',
			'platform'          => '',
			'campaign_id'       => '',
			'ad_id'             => '',
			'creative_id'       => '',
			'gclid'             => '',
			'gbraid'            => '',
			'wbraid'            => '',
			'fbclid'            => '',
			'li_fat_id'         => '',
			'landing_page'      => '',
			'referrer'          => '',
			'first_source'      => '',
			'first_medium'      => '',
			'first_campaign'    => '',
			'first_term'        => '',
			'first_content'     => '',
			'first_platform'    => '',
			'first_campaign_id' => '',
			'first_ad_id'       => '',
			'first_creative_id' => '',
			'first_click_id'    => '',
			'last_source'       => '',
			'last_medium'       => '',
			'last_campaign'     => '',
			'last_term'         => '',
			'last_content'      => '',
			'last_platform'     => '',
			'last_campaign_id'  => '',
			'last_ad_id'        => '',
			'last_creative_id'  => '',
			'last_click_id'     => '',
			'first_seen'        => '',
			'last_seen'         => '',
		);
	}

	/**
	 * HTML block for admin notification emails.
	 *
	 * @return string
	 */
	public static function email_html_block() {
		$attr = self::get_data();
		$ad_name = '';
		if ( function_exists( 'aat_get_ad_name' ) && ! empty( $attr['ad_id'] ) ) {
			$ad_name = aat_get_ad_name( $attr['ad_id'] );
		}

		$rows = array(
			'Visitor ID'   => $attr['visitor_id'] !== '' ? $attr['visitor_id'] : 'n/a',
			'Platform'     => $attr['platform'] !== '' ? $attr['platform'] : 'n/a',
			'Ad ID'        => $attr['ad_id'] !== '' ? $attr['ad_id'] : 'n/a',
			'Ad Name'      => $ad_name !== '' ? $ad_name : 'n/a',
			'Campaign ID'  => $attr['campaign_id'] !== '' ? $attr['campaign_id'] : 'n/a',
			'Creative ID'  => $attr['creative_id'] !== '' ? $attr['creative_id'] : 'n/a',
			'UTM Source'   => $attr['utm_source'] !== '' ? $attr['utm_source'] : 'n/a',
			'UTM Campaign' => $attr['utm_campaign'] !== '' ? $attr['utm_campaign'] : 'n/a',
			'Landing Page' => $attr['landing_page'] !== '' ? $attr['landing_page'] : 'n/a',
		);

		$html = '<hr style="border:none;border-top:1px solid #ddd;margin:16px 0;" />';
		$html .= '<h3 style="margin:0 0 8px;">Ad Attribution</h3>';
		foreach ( $rows as $label => $value ) {
			$html .= '<p style="margin:4px 0;"><strong>' . esc_html( $label ) . ':</strong> ' . esc_html( (string) $value ) . '</p>';
		}

		return $html;
	}
}
