<?php
/**
 * Main plugin orchestrator.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once AHF_PLUGIN_DIR . 'includes/class-ahf-footer-items.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-footer.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-genesis-layout.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-classic-layout.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-custom-nav.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-desktop-menu.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-mega-menu.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-mega-menu-data.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-mobile-header.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-top-bar.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-performance.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-site-search.php';

if ( is_admin() ) {
	require_once AHF_PLUGIN_DIR . 'admin/class-ahf-settings.php';
}

/**
 * Boots plugin components.
 */
class AHF_Plugin {

	/** @var AHF_Plugin|null */
	private static $instance = null;

	/**
	 * @return AHF_Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		if ( is_admin() ) {
			AHF_Settings::init();
		}

		if ( ! AHF_Config::is_enabled() ) {
			return;
		}

		// Remove Gallery from any fallback WP menus as well.
		add_filter( 'wp_nav_menu_objects', array( __CLASS__, 'remove_gallery_menu_item' ), 20, 2 );

		if ( AHF_Config::feature_enabled( 'genesis_layout' ) ) {
			if ( function_exists( 'genesis_do_nav' ) ) {
				AHF_Genesis_Layout::init();
			} else {
				AHF_Classic_Layout::init();
			}
		} elseif ( ! function_exists( 'genesis_do_nav' ) ) {
			// Classic themes still need a header shell when custom desktop menu is on.
			AHF_Classic_Layout::init();
		}

		if ( AHF_Config::feature_enabled( 'custom_desktop_menu' ) ) {
			AHF_Custom_Nav::init();
			AHF_Site_Search::init();
		}

		if ( AHF_Config::feature_enabled( 'desktop_extras' ) && ! AHF_Config::feature_enabled( 'custom_desktop_menu' ) ) {
			AHF_Desktop_Menu::init();
		}

		if ( AHF_Config::feature_enabled( 'mega_menu_fix' ) && ! AHF_Config::feature_enabled( 'custom_desktop_menu' ) ) {
			AHF_Mega_Menu::init();
		}

		if ( AHF_Config::feature_enabled( 'mobile_header' ) ) {
			AHF_Mobile_Header::init();
		}

		if ( AHF_Config::feature_enabled( 'top_bar' ) ) {
			AHF_Top_Bar::init();
		}

		if ( AHF_Config::feature_enabled( 'footer' ) ) {
			AHF_Footer::init();
		}

		AHF_Performance::init();
	}

	/**
	 * Strip Gallery links from WordPress menu objects.
	 *
	 * @param array<int, WP_Post> $items Menu items.
	 * @param stdClass            $args  Menu args.
	 * @return array<int, WP_Post>
	 */
	public static function remove_gallery_menu_item( $items, $args ) {
		unset( $args );

		if ( empty( $items ) || ! is_array( $items ) ) {
			return $items;
		}

		$filtered = array_filter(
			$items,
			static function ( $item ) {
				$url = (string) ( $item->url ?? '' );

				if ( '' === $url ) {
					return true;
				}

				$path = wp_parse_url( $url, PHP_URL_PATH );
				$path = is_string( $path ) ? untrailingslashit( strtolower( $path ) ) : '';

				return '/gallery' !== $path;
			}
		);

		return array_values( $filtered );
	}
}
