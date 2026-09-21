<?php
/**
 * Visitor cookie and URL parameter capture.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AAT_Tracker {

	const COOKIE_NAME = 'aat_visitor_id';

	private static $instance = null;
	private static $visitor_id = '';

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_action( 'init', array( $this, 'capture' ), 5 );
	}

	public static function current_visitor_id() {
		if ( '' !== self::$visitor_id ) {
			return self::$visitor_id;
		}

		$raw = isset( $_COOKIE[ self::COOKIE_NAME ] ) ? wp_unslash( $_COOKIE[ self::COOKIE_NAME ] ) : '';
		$raw = self::sanitize_visitor_id( $raw );
		if ( '' !== $raw ) {
			self::$visitor_id = $raw;
		}
		return self::$visitor_id;
	}

	public function capture() {
		if ( is_admin() || wp_doing_cron() || wp_doing_ajax() ) {
			return;
		}

		if ( isset( $GLOBALS['pagenow'] ) && 'wp-login.php' === $GLOBALS['pagenow'] ) {
			return;
		}

		$settings = AAT_Database::get_settings();
		if ( empty( $settings['enabled'] ) ) {
			return;
		}

		if ( function_exists( 'HandLCookieConsented' ) ) {
			$consent = HandLCookieConsented();
			if ( is_array( $consent ) && empty( $consent['good2go'] ) ) {
				return;
			}
			if ( false === $consent ) {
				return;
			}
		}

		$visitor_id = self::current_visitor_id();
		$is_new     = ( '' === $visitor_id );
		if ( $is_new ) {
			$visitor_id = self::generate_visitor_id();
		}

		self::$visitor_id = $visitor_id;
		self::set_visitor_cookie( $visitor_id, (int) $settings['cookie_days'] );

		$params  = self::read_params();
		$has_ads = self::has_attribution( $params );
		$now     = current_time( 'mysql' );
		$existing = AAT_Database::get_by_visitor_id( $visitor_id );

		if ( $has_ads && ! empty( $params['ad_id'] ) ) {
			$tracking_url = AAT_Database::build_tracking_url( $params, self::current_landing_page() );
			AAT_Database::auto_register_ad( $params, $tracking_url );
		}

		if ( null === $existing ) {
			$row = self::empty_row( $visitor_id, $now );
			if ( $has_ads ) {
				$row = self::apply_first_and_last( $row, $params, $now );
			} else {
				$row['landing_page'] = '';
				$row['referrer']     = '';
			}
			AAT_Database::insert_tracking( $row );
			return;
		}

		$update = array(
			'last_seen'  => $now,
			'updated_at' => $now,
		);

		if ( $has_ads ) {
			$update = array_merge( $update, self::last_touch_fields( $params ) );
			$update = array_merge( $update, self::click_id_fields( $params ) );
			if ( '' === (string) $existing['landing_page'] ) {
				$update['landing_page'] = self::current_landing_page();
			}
			if ( '' === (string) $existing['referrer'] ) {
				$update['referrer'] = self::current_referrer();
			}
			if ( self::first_touch_empty( $existing ) ) {
				$update = array_merge( $update, self::first_touch_fields( $params ) );
			}
		}

		AAT_Database::update_tracking( $visitor_id, $update );
	}

	private static function generate_visitor_id() {
		return 'v_' . bin2hex( random_bytes( 5 ) );
	}

	private static function sanitize_visitor_id( $value ) {
		$value = sanitize_text_field( (string) $value );
		if ( ! preg_match( '/^v_[a-f0-9]{10}$/', $value ) ) {
			return '';
		}
		return $value;
	}

	private static function set_visitor_cookie( $visitor_id, $days ) {
		$days    = max( 1, min( 730, (int) $days ) );
		$expires = time() + ( $days * DAY_IN_SECONDS );
		$secure  = is_ssl();

		if ( PHP_VERSION_ID >= 70300 ) {
			setcookie(
				self::COOKIE_NAME,
				$visitor_id,
				array(
					'expires'  => $expires,
					'path'     => '/',
					'secure'   => $secure,
					'httponly' => true,
					'samesite' => 'Lax',
				)
			);
		} else {
			setcookie( self::COOKIE_NAME, $visitor_id, $expires, '/', '', $secure, true );
		}

		$_COOKIE[ self::COOKIE_NAME ] = $visitor_id;
	}

	/**
	 * @return array<string, string>
	 */
	private static function read_params() {
		$keys = array(
			'utm_source',
			'utm_medium',
			'utm_campaign',
			'utm_term',
			'utm_content',
			'platform',
			'campaign_id',
			'ad_id',
			'creative_id',
			'gclid',
			'gbraid',
			'wbraid',
			'fbclid',
			'li_fat_id',
		);

		$out = array();
		foreach ( $keys as $key ) {
			$raw       = isset( $_GET[ $key ] ) ? wp_unslash( $_GET[ $key ] ) : '';
			$out[ $key ] = self::clip( sanitize_text_field( (string) $raw ) );
		}
		return $out;
	}

	private static function has_attribution( $params ) {
		foreach ( $params as $value ) {
			if ( '' !== $value ) {
				return true;
			}
		}
		return false;
	}

	private static function primary_click_id( $params ) {
		foreach ( array( 'gclid', 'gbraid', 'wbraid', 'fbclid', 'li_fat_id' ) as $key ) {
			if ( '' !== $params[ $key ] ) {
				return $params[ $key ];
			}
		}
		return '';
	}

	private static function current_landing_page() {
		$request = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/';
		return self::clip( AAT_Database::normalize_landing_path( (string) $request ), 500 );
	}

	private static function current_referrer() {
		$ref = isset( $_SERVER['HTTP_REFERER'] ) ? wp_unslash( $_SERVER['HTTP_REFERER'] ) : '';
		$ref = esc_url_raw( (string) $ref );
		return self::clip( $ref, 500 );
	}

	private static function clip( $value, $max = 255 ) {
		$value = (string) $value;
		if ( strlen( $value ) > $max ) {
			return substr( $value, 0, $max );
		}
		return $value;
	}

	private static function empty_row( $visitor_id, $now ) {
		return array(
			'visitor_id'        => $visitor_id,
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
			'gclid'             => '',
			'gbraid'            => '',
			'wbraid'            => '',
			'fbclid'            => '',
			'li_fat_id'         => '',
			'landing_page'      => self::current_landing_page(),
			'referrer'          => self::current_referrer(),
			'first_seen'        => $now,
			'last_seen'         => $now,
			'created_at'        => $now,
			'updated_at'        => $now,
		);
	}

	private static function first_touch_fields( $params ) {
		return array(
			'first_source'      => $params['utm_source'],
			'first_medium'      => $params['utm_medium'],
			'first_campaign'    => $params['utm_campaign'],
			'first_term'        => $params['utm_term'],
			'first_content'     => $params['utm_content'],
			'first_platform'    => $params['platform'],
			'first_campaign_id' => $params['campaign_id'],
			'first_ad_id'       => $params['ad_id'],
			'first_creative_id' => $params['creative_id'],
			'first_click_id'    => self::primary_click_id( $params ),
		);
	}

	private static function last_touch_fields( $params ) {
		$map = array(
			'last_source'      => 'utm_source',
			'last_medium'      => 'utm_medium',
			'last_campaign'    => 'utm_campaign',
			'last_term'        => 'utm_term',
			'last_content'     => 'utm_content',
			'last_platform'    => 'platform',
			'last_campaign_id' => 'campaign_id',
			'last_ad_id'       => 'ad_id',
			'last_creative_id' => 'creative_id',
		);

		$out = array();
		foreach ( $map as $column => $key ) {
			if ( '' !== $params[ $key ] ) {
				$out[ $column ] = $params[ $key ];
			}
		}

		$click = self::primary_click_id( $params );
		if ( '' !== $click ) {
			$out['last_click_id'] = $click;
		}

		return $out;
	}

	private static function click_id_fields( $params ) {
		$out = array();
		foreach ( array( 'gclid', 'gbraid', 'wbraid', 'fbclid', 'li_fat_id' ) as $key ) {
			if ( '' !== $params[ $key ] ) {
				$out[ $key ] = $params[ $key ];
			}
		}
		return $out;
	}

	private static function apply_first_and_last( $row, $params, $now ) {
		$row = array_merge( $row, self::first_touch_fields( $params ), self::last_touch_fields( $params ), self::click_id_fields( $params ) );
		$row['landing_page'] = self::current_landing_page();
		$row['referrer']     = self::current_referrer();
		$row['first_seen']   = $now;
		$row['last_seen']    = $now;
		$row['updated_at']   = $now;
		return $row;
	}

	private static function first_touch_empty( $row ) {
		$keys = array( 'first_source', 'first_platform', 'first_ad_id', 'first_campaign_id', 'first_click_id' );
		foreach ( $keys as $key ) {
			if ( ! empty( $row[ $key ] ) ) {
				return false;
			}
		}
		return true;
	}
}
