<?php
/**
 * Plugin Name: SucceedLEARN AMP
 * Plugin URI: https://succeedlearn.com
 * Description: AMP custom theme overlay for SucceedLEARN (AMPforWP). Desktop stays on the WordPress theme; mobile/tablet uses AMP templates from this plugin.
 * Version: 1.0.0
 * Author: SucceedLEARN Development Team
 * Author URI: https://succeedlearn.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: succeedlearn-amp
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( defined( 'SUCCEEDLEARN_AMP_LOADED' ) ) {
	return;
}
define( 'SUCCEEDLEARN_AMP_LOADED', true );

if ( ! defined( 'SUCCEEDLEARN_AMP_VERSION' ) ) {
	define( 'SUCCEEDLEARN_AMP_VERSION', '1.0.38' );
}
if ( ! defined( 'SUCCEEDLEARN_AMP_PLUGIN_DIR' ) ) {
	define( 'SUCCEEDLEARN_AMP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'SUCCEEDLEARN_AMP_PLUGIN_URL' ) ) {
	define( 'SUCCEEDLEARN_AMP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'SUCCEEDLEARN_AMP_PLUGIN_BASENAME' ) ) {
	define( 'SUCCEEDLEARN_AMP_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'SUCCEEDLEARN_AMP_TEMPLATES_DIR' ) ) {
	define( 'SUCCEEDLEARN_AMP_TEMPLATES_DIR', SUCCEEDLEARN_AMP_PLUGIN_DIR . 'templates/' );
}
if ( ! defined( 'SUCCEEDLEARN_AMP_INCLUDES_DIR' ) ) {
	define( 'SUCCEEDLEARN_AMP_INCLUDES_DIR', SUCCEEDLEARN_AMP_PLUGIN_DIR . 'includes/' );
}
if ( ! defined( 'SUCCEEDLEARN_AMP_ASSETS_DIR' ) ) {
	define( 'SUCCEEDLEARN_AMP_ASSETS_DIR', SUCCEEDLEARN_AMP_PLUGIN_DIR . 'assets/' );
}

/**
 * Point AMPforWP at this plugin via filter (do NOT define AMPFORWP_CUSTOM_THEME here).
 * AMPforWP theme-loader.php always define()s the constant; pre-defining it causes a Warning.
 */
add_filter(
	'ampforwp_theme_dir',
	static function () {
		return SUCCEEDLEARN_AMP_PLUGIN_DIR;
	},
	5
);

/**
 * Normalize bare ?amp (empty value) and homepage /amp/ to ?amp=1 so AMPforWP engages.
 */
add_action(
	'template_redirect',
	static function () {
		if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			return;
		}

		$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		$path        = (string) wp_parse_url( $request_uri, PHP_URL_PATH );
		$query       = (string) wp_parse_url( $request_uri, PHP_URL_QUERY );
		$home_path   = trailingslashit( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ) );
		$amp_path    = trailingslashit( $home_path . 'amp' );

		$needs_amp1 = false;
		$is_home_amp_path = ( trailingslashit( $path ) === $amp_path );

		// Bare ?amp or ?amp= (AMPforWP only treats amp=1 as AMP).
		if ( isset( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$amp_val = wp_unslash( $_GET['amp'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( '' === $amp_val || 'true' === $amp_val || 'yes' === $amp_val ) {
				$needs_amp1 = true;
			}
		}

		// Legacy homepage /amp/ endpoint.
		if ( $is_home_amp_path ) {
			$needs_amp1 = true;
		}

		if ( ! $needs_amp1 ) {
			return;
		}

		// Already correct.
		if ( isset( $_GET['amp'] ) && '1' === (string) wp_unslash( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		// Keep the current page (e.g. /blog/?amp → /blog/?amp=1), not the homepage.
		$target = $is_home_amp_path ? home_url( '/' ) : home_url( $path ? $path : '/' );
		$args   = array();
		if ( $query ) {
			parse_str( $query, $args );
		}
		$args['amp'] = '1';
		unset( $args['noamp'] );

		wp_safe_redirect( add_query_arg( $args, $target ), 302 );
		exit;
	},
	0
);

spl_autoload_register(
	static function ( $class ) {
		$prefix   = 'SucceedLEARN\\AMP\\';
		$base_dir = SUCCEEDLEARN_AMP_INCLUDES_DIR;
		$len      = strlen( $prefix );
		if ( strncmp( $prefix, $class, $len ) !== 0 ) {
			return;
		}
		$relative_class = substr( $class, $len );
		$file           = $base_dir . 'class-' . strtolower( str_replace( array( '\\', '_' ), array( '/', '-' ), $relative_class ) ) . '.php';
		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);

$succeedlearn_amp_core_files = array(
	'class-erpnext.php',
	'class-database.php',
	'class-email.php',
	'class-config.php',
	'class-plugin.php',
	'class-template-manager.php',
	'class-amp-router.php',
	'class-performance-optimizer.php',
	'class-form-handler.php',
	'class-admin.php',
);
foreach ( $succeedlearn_amp_core_files as $succeedlearn_amp_file ) {
	$path = SUCCEEDLEARN_AMP_INCLUDES_DIR . $succeedlearn_amp_file;
	if ( is_readable( $path ) ) {
		require_once $path;
	}
}

$succeedlearn_amp_helper_files = array(
	'functions-performance.php',
	'functions-amp-nav.php',
	'functions-schema.php',
);
foreach ( $succeedlearn_amp_helper_files as $helper_file ) {
	$path = SUCCEEDLEARN_AMP_INCLUDES_DIR . $helper_file;
	if ( is_readable( $path ) ) {
		require_once $path;
	}
}

add_action(
	'plugins_loaded',
	static function () {
		if ( defined( 'SUCCEEDLEARN_CONTACT_FORM_LOADED' ) ) {
			return;
		}
		$path = SUCCEEDLEARN_AMP_INCLUDES_DIR . 'functions-contact-form.php';
		if ( is_readable( $path ) ) {
			require_once $path;
		}
	},
	1
);

function succeedlearn_amp_init() {
	if ( ! class_exists( __NAMESPACE__ . '\\Plugin' ) ) {
		add_action(
			'admin_notices',
			static function () {
				echo '<div class="notice notice-error"><p><strong>SucceedLEARN AMP:</strong> ';
				echo esc_html__( 'Plugin files are incomplete.', 'succeedlearn-amp' );
				echo '</p></div>';
			}
		);
		return;
	}

	load_plugin_textdomain( 'succeedlearn-amp', false, dirname( SUCCEEDLEARN_AMP_PLUGIN_BASENAME ) . '/languages' );

	$plugin = Plugin::get_instance();
	$plugin->init();
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\succeedlearn_amp_init', 5 );

register_activation_hook(
	__FILE__,
	static function () {
		$defaults = array(
			'version'                       => SUCCEEDLEARN_AMP_VERSION,
			'home_page_id'                  => 0,
			'clients_page_id'               => 0,
			'contact_page_id'               => 0,
			'thankyou_page_id'              => 0,
			'blog_page_id'                  => 0,
			'enable_custom_css'             => true,
			'custom_css'                    => '',
			'erpnext_api_url'               => 'https://intranet.succeedtech.com/api/resource/Lead',
			'erpnext_api_key'               => '',
			'contact_email_recipients'      => class_exists( __NAMESPACE__ . '\\Email' )
				? Email::get_default_admin_recipients()
				: array( 'sales@succeedtech.com' ),
			'contact_user_email_brochure_url' => '',
		);

		add_option( 'succeedlearn_amp_settings', $defaults );

		if ( class_exists( __NAMESPACE__ . '\\Database' ) ) {
			Database::create_tables();
		}

		flush_rewrite_rules();
	}
);

register_deactivation_hook(
	__FILE__,
	static function () {
		flush_rewrite_rules();
	}
);
