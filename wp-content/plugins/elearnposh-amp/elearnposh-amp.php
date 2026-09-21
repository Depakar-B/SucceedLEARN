<?php
/**
 * Plugin Name: eLearnPOSH AMP - Modern
 * Plugin URI: https://elearnposh.com
 * Description: Modern, AMP-compliant custom theme for WordPress with clean architecture and full AMP HTML standards compliance
 * Version: 2.0.79
 * Author: eLearnPOSH Development Team
 * Author URI: https://elearnposh.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: elearnposh-amp
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

namespace ElearnPOSH\AMP;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Prevent fatal errors when duplicate plugin folders are active on production.
if ( defined( 'ELEARNPOSH_AMP_LOADED' ) ) {
	return;
}
define( 'ELEARNPOSH_AMP_LOADED', true );

/**
 * Plugin constants
 */
if ( ! defined( 'ELEARNPOSH_AMP_VERSION' ) ) {
	define( 'ELEARNPOSH_AMP_VERSION', '2.0.79' );
}
if ( ! defined( 'ELEARNPOSH_AMP_PLUGIN_DIR' ) ) {
	define( 'ELEARNPOSH_AMP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'ELEARNPOSH_AMP_PLUGIN_URL' ) ) {
	define( 'ELEARNPOSH_AMP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'ELEARNPOSH_AMP_PLUGIN_BASENAME' ) ) {
	define( 'ELEARNPOSH_AMP_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'ELEARNPOSH_AMP_TEMPLATES_DIR' ) ) {
	define( 'ELEARNPOSH_AMP_TEMPLATES_DIR', ELEARNPOSH_AMP_PLUGIN_DIR . 'templates/' );
}
if ( ! defined( 'ELEARNPOSH_AMP_INCLUDES_DIR' ) ) {
	define( 'ELEARNPOSH_AMP_INCLUDES_DIR', ELEARNPOSH_AMP_PLUGIN_DIR . 'includes/' );
}
if ( ! defined( 'ELEARNPOSH_AMP_ASSETS_DIR' ) ) {
	define( 'ELEARNPOSH_AMP_ASSETS_DIR', ELEARNPOSH_AMP_PLUGIN_DIR . 'assets/' );
}

/**
 * Define AMPFORWP_CUSTOM_THEME constant for compatibility with AMPforWP
 * This constant is required by the main AMPforWP plugin
 */
if ( ! defined( 'AMPFORWP_CUSTOM_THEME' ) ) {
	define( 'AMPFORWP_CUSTOM_THEME', ELEARNPOSH_AMP_PLUGIN_DIR );
}

/**
 * Autoloader for plugin classes
 */
spl_autoload_register( function ( $class ) {
	$prefix = 'ElearnPOSH\\AMP\\';
	$base_dir = ELEARNPOSH_AMP_INCLUDES_DIR;

	$len = strlen( $prefix );
	if ( strncmp( $prefix, $class, $len ) !== 0 ) {
		return;
	}

	$relative_class = substr( $class, $len );
	$file = $base_dir . 'class-' . strtolower( str_replace( array( '\\', '_' ), array( '/', '-' ), $relative_class ) ) . '.php';

	if ( file_exists( $file ) ) {
		require $file;
	}
} );

/**
 * Eager-load core classes (avoids fatal errors if autoload misses a file in a partial ZIP).
 */
$elearnposh_amp_core_files = array(
	'class-erpnext.php',
	'class-database.php',
	'class-config.php',
	'class-plugin.php',
	'class-template-manager.php',
	'class-amp-router.php',
	'class-performance-optimizer.php',
	'class-form-handler.php',
	'class-admin.php',
	'class-email.php',
);
foreach ( $elearnposh_amp_core_files as $elearnposh_amp_file ) {
	$elearnposh_amp_path = ELEARNPOSH_AMP_INCLUDES_DIR . $elearnposh_amp_file;
	if ( is_readable( $elearnposh_amp_path ) ) {
		require_once $elearnposh_amp_path;
	}
}

/**
 * Load helper functions
 */
$elearnposh_amp_helper_files = array(
	'functions-performance.php',
	'functions-image-grid.php',
	'functions-top-courses.php',
	'functions-amp-nav.php',
	'functions-legacy-course-redirects.php',
	'functions-course-sections.php',
	'functions-breadcrumbs.php',
	'functions-schema.php',
	'functions-ai-seo.php',
);
foreach ( $elearnposh_amp_helper_files as $elearnposh_amp_helper_file ) {
	$elearnposh_amp_helper_path = ELEARNPOSH_AMP_INCLUDES_DIR . $elearnposh_amp_helper_file;
	if ( is_readable( $elearnposh_amp_helper_path ) ) {
		require_once $elearnposh_amp_helper_path;
	}
}

/**
 * Contact form helpers load after all plugins so erp-contact-us can take over when active.
 */
add_action(
	'plugins_loaded',
	static function () {
		if ( defined( 'ELEARNPOSH_CONTACT_FORM_LOADED' ) ) {
			return;
		}
		$path = ELEARNPOSH_AMP_INCLUDES_DIR . 'functions-contact-form.php';
		if ( is_readable( $path ) ) {
			require_once $path;
		}
	},
	1
);

/**
 * Initialize the plugin
 */
if ( ! function_exists( __NAMESPACE__ . '\\elearnposh_amp_init' ) ) {
function elearnposh_amp_init() {
	if ( ! class_exists( __NAMESPACE__ . '\\Plugin' ) ) {
		add_action(
			'admin_notices',
			static function () {
				echo '<div class="notice notice-error"><p><strong>eLearnPOSH AMP:</strong> ';
				echo esc_html__( 'Plugin files are incomplete. Delete the plugin folder and upload the full zip again (must include includes/class-plugin.php and all includes/*.php files).', 'elearnposh-amp' );
				echo '</p></div>';
			}
		);
		return;
	}

	// Load text domain for translations
	load_plugin_textdomain( 'elearnposh-amp', false, dirname( ELEARNPOSH_AMP_PLUGIN_BASENAME ) . '/languages' );

	// Initialize main plugin class
	$plugin = Plugin::get_instance();
	$plugin->init();
}
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\elearnposh_amp_init', 5 );

/**
 * Apply one-time settings upgrades when the plugin version changes.
 */
if ( ! function_exists( __NAMESPACE__ . '\\elearnposh_amp_maybe_upgrade_settings' ) ) {
function elearnposh_amp_maybe_upgrade_settings() {
	$stored_version = get_option( 'elearnposh_amp_db_version', '' );
	if ( version_compare( (string) $stored_version, ELEARNPOSH_AMP_VERSION, '>=' ) ) {
		return;
	}

	$settings = get_option( 'elearnposh_amp_settings', array() );
	if ( ! is_array( $settings ) ) {
		$settings = array();
	}

	$default_recipients = class_exists( __NAMESPACE__ . '\\Email' )
		? Email::get_default_admin_recipients()
		: array( 'depakar@succeedtech.com' );

	// Refresh admin notification list to the current defaults on plugin upgrades.
	$settings['contact_email_recipients'] = $default_recipients;

	$settings['version'] = ELEARNPOSH_AMP_VERSION;

	update_option( 'elearnposh_amp_settings', $settings );
	update_option( 'elearnposh_amp_db_version', ELEARNPOSH_AMP_VERSION );
}
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\elearnposh_amp_maybe_upgrade_settings', 4 );

/**
 * Serve llms.txt from the site root when the static file is not reachable via the web server.
 */
if ( ! function_exists( __NAMESPACE__ . '\\elearnposh_amp_serve_llms_txt' ) ) {
function elearnposh_amp_serve_llms_txt() {
	if ( is_admin() || ! isset( $_SERVER['REQUEST_URI'] ) ) {
		return;
	}

	$path = wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH );
	if ( ! is_string( $path ) || ! preg_match( '#/llms\.txt$#', $path ) ) {
		return;
	}

	$file = ABSPATH . 'llms.txt';
	if ( ! is_readable( $file ) ) {
		return;
	}

	status_header( 200 );
	header( 'Content-Type: text/plain; charset=utf-8' );
	header( 'X-Robots-Tag: noindex' );
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- plain-text file passthrough.
	readfile( $file );
	exit;
}
}
add_action( 'template_redirect', __NAMESPACE__ . '\\elearnposh_amp_serve_llms_txt', 0 );

/**
 * Ensure front-page /amp/ route serves the unified AMP home template.
 *
 * Some environments resolve /amp/ through the legacy AMPforWP homepage endpoint,
 * which skips the modern home layout (including the demo form). Redirecting to
 * the explicit query-var route keeps mobile/tablet users on the correct template.
 */
function elearnposh_amp_redirect_legacy_home_amp_route() {
	if ( is_admin() || ( defined( 'WP_CLI' ) && \WP_CLI ) ) {
		return;
	}

	if ( isset( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}

	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	if ( '' === $request_uri ) {
		return;
	}

	$request_path = trailingslashit( (string) wp_parse_url( $request_uri, PHP_URL_PATH ) );
	$home_path    = trailingslashit( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ) );
	$legacy_amp   = trailingslashit( $home_path . 'amp' );

	if ( $legacy_amp !== $request_path ) {
		return;
	}

	wp_safe_redirect( home_url( '/?amp=1' ), 302 );
	exit;
}
add_action( 'template_redirect', __NAMESPACE__ . '\\elearnposh_amp_redirect_legacy_home_amp_route', 1 );



/**
 * Activation hook
 */
register_activation_hook( __FILE__, function() {
	// Set default options
	$defaults = array(
		'version' => ELEARNPOSH_AMP_VERSION,
		'newsletter_page_id' => 18121,
		'blog_page_id' => 17993,
		'home_page_id' => 0,
		'contact_page_id' => 49,
		'terms_page_id' => 16356,
		'press_media_page_id' => 6980,
		'enterprise_features_page_id' => 7689,
		'our_webinars_page_id' => 11438,
		'enable_custom_css' => true,
		'custom_css' => '',
		'erpnext_api_url' => 'https://intranet.succeedtech.com/api/resource/Lead',
		'erpnext_api_key' => class_exists( __NAMESPACE__ . '\\ERPNext' ) ? ERPNext::DEFAULT_API_KEY : 'OWM2ZDc2MmI2ZWQ1MWM3OmYwMzEyNDViMDU3NjNjOA==',
		'contact_email_recipients' => class_exists( __NAMESPACE__ . '\\Email' )
			? Email::get_default_admin_recipients()
			: array( 'depakar@succeedtech.com' ),
		'contact_user_email_brochure_url' => 'https://elearnposh.com/eLearnPOSH-Brochure-2026.pdf',
	);
	
	add_option( 'elearnposh_amp_settings', $defaults );
	
	// Create database tables (skip gracefully if class file was not deployed).
	if ( class_exists( '\ElearnPOSH\AMP\Database' ) ) {
		\ElearnPOSH\AMP\Database::create_tables();
	}
	
	// Flush rewrite rules
	flush_rewrite_rules();
} );

/**
 * Deactivation hook
 */
register_deactivation_hook( __FILE__, function() {
	// Flush rewrite rules
	flush_rewrite_rules();
} );

