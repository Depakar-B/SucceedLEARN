<?php
/**
 * Settings and debug lists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AAT_Admin {

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_action( 'admin_menu', array( $this, 'menu' ) );
		add_action( 'admin_init', array( $this, 'save_settings' ) );
		add_action( 'admin_init', array( $this, 'handle_ads' ) );
	}

	public function menu() {
		add_menu_page(
			__( 'Marketing Attribution', 'ad-attribution-tracker' ),
			__( 'Marketing Attribution', 'ad-attribution-tracker' ),
			'manage_options',
			'aat-attribution',
			array( $this, 'render_leads' ),
			'dashicons-megaphone',
			58
		);

		add_submenu_page(
			'aat-attribution',
			__( 'Lead to Ad', 'ad-attribution-tracker' ),
			__( 'Lead to Ad', 'ad-attribution-tracker' ),
			'manage_options',
			'aat-attribution',
			array( $this, 'render_leads' )
		);

		add_submenu_page(
			'aat-attribution',
			__( 'Ads', 'ad-attribution-tracker' ),
			__( 'Ads', 'ad-attribution-tracker' ),
			'manage_options',
			'aat-ads',
			array( $this, 'render_ads' )
		);

		add_submenu_page(
			'aat-attribution',
			__( 'Visitors', 'ad-attribution-tracker' ),
			__( 'Visitors', 'ad-attribution-tracker' ),
			'manage_options',
			'aat-visitors',
			array( $this, 'render_visitors' )
		);

		add_submenu_page(
			'aat-attribution',
			__( 'Settings', 'ad-attribution-tracker' ),
			__( 'Settings', 'ad-attribution-tracker' ),
			'manage_options',
			'aat-settings',
			array( $this, 'render_settings' )
		);
	}

	public function save_settings() {
		if ( ! isset( $_POST['aat_settings_nonce'] ) ) {
			return;
		}
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['aat_settings_nonce'] ) ), 'aat_save_settings' ) ) {
			return;
		}

		$settings = AAT_Database::get_settings();
		$settings['enabled']             = isset( $_POST['aat_enabled'] ) ? 1 : 0;
		$settings['cookie_days']         = max( 1, min( 730, absint( $_POST['aat_cookie_days'] ?? 90 ) ) );
		$settings['retention_days']      = max( 1, min( 730, absint( $_POST['aat_retention_days'] ?? 90 ) ) );
		$settings['delete_on_uninstall'] = isset( $_POST['aat_delete_on_uninstall'] ) ? 1 : 0;

		update_option( 'aat_settings', $settings );
		wp_safe_redirect( add_query_arg( array( 'page' => 'aat-settings', 'updated' => '1' ), admin_url( 'admin.php' ) ) );
		exit;
	}

	public function handle_ads() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( isset( $_GET['aat_delete_ad'], $_GET['_wpnonce'] ) && 'aat-ads' === ( $_GET['page'] ?? '' ) ) {
			if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'aat_delete_ad' ) ) {
				return;
			}
			AAT_Database::delete_ad( sanitize_text_field( wp_unslash( $_GET['aat_delete_ad'] ) ) );
			wp_safe_redirect( add_query_arg( array( 'page' => 'aat-ads', 'deleted' => '1' ), admin_url( 'admin.php' ) ) );
			exit;
		}

		if ( ! isset( $_POST['aat_ads_nonce'] ) ) {
			return;
		}
		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['aat_ads_nonce'] ) ), 'aat_save_ad' ) ) {
			return;
		}

		$ok = AAT_Database::save_ad(
			array(
				'ad_id'         => sanitize_text_field( wp_unslash( $_POST['aat_ad_id'] ?? '' ) ),
				'ad_name'       => sanitize_text_field( wp_unslash( $_POST['aat_ad_name'] ?? '' ) ),
				'platform'      => sanitize_text_field( wp_unslash( $_POST['aat_ad_platform'] ?? '' ) ),
				'campaign_id'   => sanitize_text_field( wp_unslash( $_POST['aat_ad_campaign_id'] ?? '' ) ),
				'campaign_name' => sanitize_text_field( wp_unslash( $_POST['aat_ad_campaign'] ?? '' ) ),
				'creative_id'   => sanitize_text_field( wp_unslash( $_POST['aat_ad_creative_id'] ?? '' ) ),
				'utm_source'    => sanitize_text_field( wp_unslash( $_POST['aat_ad_utm_source'] ?? '' ) ),
				'utm_medium'    => sanitize_text_field( wp_unslash( $_POST['aat_ad_utm_medium'] ?? '' ) ),
				'utm_campaign'  => sanitize_text_field( wp_unslash( $_POST['aat_ad_utm_campaign'] ?? '' ) ),
				'utm_content'   => sanitize_text_field( wp_unslash( $_POST['aat_ad_utm_content'] ?? '' ) ),
				'ad_url'        => esc_url_raw( wp_unslash( $_POST['aat_ad_url'] ?? '' ) ),
				'notes'         => sanitize_text_field( wp_unslash( $_POST['aat_ad_notes'] ?? '' ) ),
			)
		);

		wp_safe_redirect(
			add_query_arg(
				array(
					'page'    => 'aat-ads',
					'updated' => $ok ? '1' : '0',
				),
				admin_url( 'admin.php' )
			)
		);
		exit;
	}

	public function render_ads() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$ads     = AAT_Database::get_ads();
		$prefill = isset( $_GET['ad_id'] ) ? sanitize_text_field( wp_unslash( $_GET['ad_id'] ) ) : '';
		$edit    = $prefill ? AAT_Database::get_ad_by_id( $prefill ) : null;

		echo '<div class="wrap">';
		echo '<h1>' . esc_html__( 'Ads', 'ad-attribution-tracker' ) . '</h1>';
		echo '<p>' . esc_html__( 'Ads are created automatically when a visitor lands with ad_id in the URL. You can rename them, add the live ad link, or create one ahead of launch.', 'ad-attribution-tracker' ) . '</p>';

		if ( isset( $_GET['updated'] ) && '1' === $_GET['updated'] ) {
			echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Ad saved.', 'ad-attribution-tracker' ) . '</p></div>';
		}
		if ( isset( $_GET['updated'] ) && '0' === $_GET['updated'] ) {
			echo '<div class="notice notice-error is-dismissible"><p>' . esc_html__( 'Ad ID and ad name are required.', 'ad-attribution-tracker' ) . '</p></div>';
		}
		if ( isset( $_GET['deleted'] ) ) {
			echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Ad removed.', 'ad-attribution-tracker' ) . '</p></div>';
		}

		echo '<h2>' . esc_html__( 'Save / update ad', 'ad-attribution-tracker' ) . '</h2>';
		echo '<form method="post" style="max-width:820px;">';
		wp_nonce_field( 'aat_save_ad', 'aat_ads_nonce' );
		echo '<table class="form-table" role="presentation">';
		echo '<tr><th><label for="aat_ad_id">' . esc_html__( 'Ad ID', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_id" id="aat_ad_id" type="text" class="regular-text" required value="' . esc_attr( $edit['ad_id'] ?? $prefill ) . '" placeholder="987654"></td></tr>';
		echo '<tr><th><label for="aat_ad_name">' . esc_html__( 'Ad name', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_name" id="aat_ad_name" type="text" class="regular-text" required value="' . esc_attr( $edit['ad_name'] ?? '' ) . '" placeholder="Security Awareness Google Search"></td></tr>';
		echo '<tr><th><label for="aat_ad_url">' . esc_html__( 'Ad / landing link', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_url" id="aat_ad_url" type="url" class="large-text" value="' . esc_attr( $edit['ad_url'] ?? '' ) . '" placeholder="https://yoursite.com/page/?utm_source=google&ad_id=987654"><p class="description">' . esc_html__( 'Paste the final URL you run in Google / Meta / LinkedIn. Auto-created ads fill this from the first tracked visit.', 'ad-attribution-tracker' ) . '</p></td></tr>';
		echo '<tr><th><label for="aat_ad_platform">' . esc_html__( 'Platform', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_platform" id="aat_ad_platform" type="text" class="regular-text" value="' . esc_attr( $edit['platform'] ?? '' ) . '" placeholder="google, meta, linkedin"></td></tr>';
		echo '<tr><th><label for="aat_ad_campaign_id">' . esc_html__( 'Campaign ID', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_campaign_id" id="aat_ad_campaign_id" type="text" class="regular-text" value="' . esc_attr( $edit['campaign_id'] ?? '' ) . '"></td></tr>';
		echo '<tr><th><label for="aat_ad_campaign">' . esc_html__( 'Campaign name', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_campaign" id="aat_ad_campaign" type="text" class="regular-text" value="' . esc_attr( $edit['campaign_name'] ?? '' ) . '"></td></tr>';
		echo '<tr><th><label for="aat_ad_creative_id">' . esc_html__( 'Creative ID', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_creative_id" id="aat_ad_creative_id" type="text" class="regular-text" value="' . esc_attr( $edit['creative_id'] ?? '' ) . '"></td></tr>';
		echo '<tr><th><label for="aat_ad_utm_source">' . esc_html__( 'utm_source', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_utm_source" id="aat_ad_utm_source" type="text" class="regular-text" value="' . esc_attr( $edit['utm_source'] ?? '' ) . '"></td></tr>';
		echo '<tr><th><label for="aat_ad_utm_medium">' . esc_html__( 'utm_medium', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_utm_medium" id="aat_ad_utm_medium" type="text" class="regular-text" value="' . esc_attr( $edit['utm_medium'] ?? '' ) . '"></td></tr>';
		echo '<tr><th><label for="aat_ad_utm_campaign">' . esc_html__( 'utm_campaign', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_utm_campaign" id="aat_ad_utm_campaign" type="text" class="regular-text" value="' . esc_attr( $edit['utm_campaign'] ?? '' ) . '"></td></tr>';
		echo '<tr><th><label for="aat_ad_utm_content">' . esc_html__( 'utm_content', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_utm_content" id="aat_ad_utm_content" type="text" class="regular-text" value="' . esc_attr( $edit['utm_content'] ?? '' ) . '"></td></tr>';
		echo '<tr><th><label for="aat_ad_notes">' . esc_html__( 'Notes', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_ad_notes" id="aat_ad_notes" type="text" class="regular-text" value="' . esc_attr( $edit['notes'] ?? '' ) . '"></td></tr>';
		echo '</table>';
		submit_button( __( 'Save Ad', 'ad-attribution-tracker' ) );
		echo '</form>';

		echo '<h2>' . esc_html__( 'Tracked ads', 'ad-attribution-tracker' ) . '</h2>';
		echo '<table class="widefat striped"><thead><tr>';
		foreach ( array( 'Ad ID', 'Ad name', 'Platform', 'Campaign', 'Link', 'Source', '' ) as $h ) {
			echo '<th>' . esc_html( $h ) . '</th>';
		}
		echo '</tr></thead><tbody>';
		if ( empty( $ads ) ) {
			echo '<tr><td colspan="7">' . esc_html__( 'No ads yet. Open a landing URL that includes ad_id=... and this list will fill automatically.', 'ad-attribution-tracker' ) . '</td></tr>';
		} else {
			foreach ( $ads as $ad ) {
				$edit_url = add_query_arg( array( 'page' => 'aat-ads', 'ad_id' => $ad['ad_id'] ), admin_url( 'admin.php' ) );
				$del      = wp_nonce_url(
					add_query_arg(
						array(
							'page'          => 'aat-ads',
							'aat_delete_ad' => $ad['ad_id'],
						),
						admin_url( 'admin.php' )
					),
					'aat_delete_ad'
				);
				$source = ! empty( $ad['auto_created'] ) ? __( 'Auto', 'ad-attribution-tracker' ) : __( 'Manual', 'ad-attribution-tracker' );
				$link   = (string) ( $ad['ad_url'] ?? '' );
				echo '<tr>';
				echo '<td><code>' . esc_html( (string) $ad['ad_id'] ) . '</code></td>';
				echo '<td><a href="' . esc_url( $edit_url ) . '">' . esc_html( (string) $ad['ad_name'] ) . '</a></td>';
				echo '<td>' . esc_html( (string) $ad['platform'] ) . '</td>';
				echo '<td>' . esc_html( (string) $ad['campaign_name'] ) . '</td>';
				if ( '' !== $link ) {
					echo '<td><a href="' . esc_url( $link ) . '" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Open link', 'ad-attribution-tracker' ) . '</a></td>';
				} else {
					echo '<td></td>';
				}
				echo '<td>' . esc_html( $source ) . '</td>';
				echo '<td><a href="' . esc_url( $edit_url ) . '">' . esc_html__( 'Edit', 'ad-attribution-tracker' ) . '</a> | <a href="' . esc_url( $del ) . '" onclick="return confirm(\'Remove this ad?\');">' . esc_html__( 'Remove', 'ad-attribution-tracker' ) . '</a></td>';
				echo '</tr>';
			}
		}
		echo '</tbody></table></div>';
	}

	private function format_ad( $ad_id, $names ) {
		$ad_id = (string) $ad_id;
		if ( '' === $ad_id ) {
			return '';
		}
		if ( ! empty( $names[ $ad_id ] ) ) {
			return $names[ $ad_id ] . ' (' . $ad_id . ')';
		}
		return $ad_id;
	}

	public function render_settings() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$s = AAT_Database::get_settings();
		echo '<div class="wrap">';
		echo '<h1>' . esc_html__( 'Ad Attribution Settings', 'ad-attribution-tracker' ) . '</h1>';
		if ( isset( $_GET['updated'] ) ) {
			echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Settings saved.', 'ad-attribution-tracker' ) . '</p></div>';
		}
		echo '<form method="post">';
		wp_nonce_field( 'aat_save_settings', 'aat_settings_nonce' );
		echo '<table class="form-table" role="presentation">';
		echo '<tr><th>' . esc_html__( 'Enable Tracking', 'ad-attribution-tracker' ) . '</th><td><label><input type="checkbox" name="aat_enabled" value="1" ' . checked( 1, (int) $s['enabled'], false ) . '> ' . esc_html__( 'Capture advertising parameters on frontend visits', 'ad-attribution-tracker' ) . '</label></td></tr>';
		echo '<tr><th><label for="aat_cookie_days">' . esc_html__( 'Cookie Duration (days)', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_cookie_days" id="aat_cookie_days" type="number" min="1" max="730" value="' . esc_attr( (string) $s['cookie_days'] ) . '" class="small-text"></td></tr>';
		echo '<tr><th><label for="aat_retention_days">' . esc_html__( 'Data Retention (days)', 'ad-attribution-tracker' ) . '</label></th><td><input name="aat_retention_days" id="aat_retention_days" type="number" min="1" max="730" value="' . esc_attr( (string) $s['retention_days'] ) . '" class="small-text"></td></tr>';
		echo '<tr><th>' . esc_html__( 'Uninstall', 'ad-attribution-tracker' ) . '</th><td><label><input type="checkbox" name="aat_delete_on_uninstall" value="1" ' . checked( 1, (int) $s['delete_on_uninstall'], false ) . '> ' . esc_html__( 'Delete tracking tables and settings when the plugin is deleted', 'ad-attribution-tracker' ) . '</label></td></tr>';
		echo '</table>';
		submit_button( __( 'Save Settings', 'ad-attribution-tracker' ) );
		echo '</form></div>';
	}

	public function render_leads() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$search = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';
		$rows   = AAT_Database::get_link_rows( $search );
		$names  = AAT_Database::get_ad_name_map();

		echo '<div class="wrap">';
		echo '<h1>' . esc_html__( 'Lead to Ad', 'ad-attribution-tracker' ) . '</h1>';
		echo '<p>' . esc_html__( 'Cybersecurity form leads only. Each row matches a cybersecurity lead ID to the advertising visitor and ad snapshot at submit time.', 'ad-attribution-tracker' ) . '</p>';
		$this->search_form( 'aat-attribution', $search );
		echo '<table class="widefat striped"><thead><tr>';
		foreach ( array( 'Lead ID', 'Form', 'Visitor ID', 'Platform', 'Ad', 'Campaign ID', 'UTM Source', 'UTM Campaign', 'Click IDs', 'Linked At' ) as $h ) {
			echo '<th>' . esc_html( $h ) . '</th>';
		}
		echo '</tr></thead><tbody>';

		if ( empty( $rows ) ) {
			echo '<tr><td colspan="10">' . esc_html__( 'No linked form submissions yet.', 'ad-attribution-tracker' ) . '</td></tr>';
		} else {
			foreach ( $rows as $row ) {
				$clicks = array();
				foreach ( array( 'gclid', 'fbclid', 'li_fat_id' ) as $cid ) {
					if ( ! empty( $row[ $cid ] ) ) {
						$clicks[] = $cid . '=' . $row[ $cid ];
					}
				}
				echo '<tr>';
				echo '<td>' . esc_html( (string) $row['form_lead_id'] ) . '</td>';
				echo '<td>' . esc_html( (string) $row['form_key'] ) . '</td>';
				echo '<td><code>' . esc_html( (string) $row['visitor_id'] ) . '</code></td>';
				echo '<td>' . esc_html( (string) $row['platform'] ) . '</td>';
				echo '<td>' . esc_html( $this->format_ad( $row['ad_id'], $names ) ) . '</td>';
				echo '<td>' . esc_html( (string) $row['campaign_id'] ) . '</td>';
				echo '<td>' . esc_html( (string) $row['utm_source'] ) . '</td>';
				echo '<td>' . esc_html( (string) $row['utm_campaign'] ) . '</td>';
				echo '<td>' . esc_html( implode( ', ', $clicks ) ) . '</td>';
				echo '<td>' . esc_html( (string) $row['created_at'] ) . '</td>';
				echo '</tr>';
			}
		}

		echo '</tbody></table></div>';
	}

	public function render_visitors() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$search = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';
		$rows   = AAT_Database::get_tracking_rows( $search );
		$names  = AAT_Database::get_ad_name_map();

		echo '<div class="wrap">';
		echo '<h1>' . esc_html__( 'Visitors', 'ad-attribution-tracker' ) . '</h1>';
		$this->search_form( 'aat-visitors', $search );
		echo '<table class="widefat striped"><thead><tr>';
		foreach ( array( 'Visitor ID', 'First Source', 'First Campaign', 'First Ad ID', 'Last Source', 'Last Campaign', 'Last Ad ID', 'Platform', 'Landing Page', 'First Seen', 'Last Seen' ) as $h ) {
			echo '<th>' . esc_html( $h ) . '</th>';
		}
		echo '</tr></thead><tbody>';

		if ( empty( $rows ) ) {
			echo '<tr><td colspan="11">' . esc_html__( 'No visitors tracked yet.', 'ad-attribution-tracker' ) . '</td></tr>';
		} else {
			foreach ( $rows as $row ) {
				$platform = ! empty( $row['last_platform'] ) ? $row['last_platform'] : $row['first_platform'];
				echo '<tr>';
				echo '<td><code>' . esc_html( (string) $row['visitor_id'] ) . '</code></td>';
				echo '<td>' . esc_html( (string) $row['first_source'] ) . '</td>';
				echo '<td>' . esc_html( (string) $row['first_campaign'] ) . '</td>';
				echo '<td>' . esc_html( $this->format_ad( $row['first_ad_id'], $names ) ) . '</td>';
				echo '<td>' . esc_html( (string) $row['last_source'] ) . '</td>';
				echo '<td>' . esc_html( (string) $row['last_campaign'] ) . '</td>';
				echo '<td>' . esc_html( $this->format_ad( $row['last_ad_id'], $names ) ) . '</td>';
				echo '<td>' . esc_html( (string) $platform ) . '</td>';
				echo '<td>' . esc_html( (string) $row['landing_page'] ) . '</td>';
				echo '<td>' . esc_html( (string) $row['first_seen'] ) . '</td>';
				echo '<td>' . esc_html( (string) $row['last_seen'] ) . '</td>';
				echo '</tr>';
			}
		}

		echo '</tbody></table></div>';
	}

	private function search_form( $page, $search ) {
		echo '<form method="get" style="margin:12px 0;">';
		echo '<input type="hidden" name="page" value="' . esc_attr( $page ) . '">';
		echo '<input type="search" name="s" value="' . esc_attr( $search ) . '" placeholder="' . esc_attr__( 'Search lead ID, visitor, ad ID', 'ad-attribution-tracker' ) . '"> ';
		submit_button( __( 'Search', 'ad-attribution-tracker' ), 'secondary', '', false );
		echo '</form>';
	}
}
