<?php
/**
 * Plugin Name:       Akaza Header Footer
 * Plugin URI:        https://succeedlearn.com
 * Description:       Custom desktop mega menu, mobile header, site footer, and notification bar for SucceedLEARN (classic + Genesis themes).
 * Version:           1.14.18
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            SucceedTech
 * Text Domain:       akaza-header-footer
 * Domain Path:       /languages
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AHF_VERSION', '1.14.18' );
define( 'AHF_PLUGIN_FILE', __FILE__ );
define( 'AHF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AHF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'AHF_OPTION_SETTINGS', 'ahf_settings' );

/**
 * Whether a plugin basename looks like the legacy eLearnPOSH header/footer plugin.
 *
 * @param string $basename Plugin basename (folder/file.php).
 */
function ahf_is_legacy_header_basename( $basename ) {
	$basename = (string) $basename;
	return (bool) preg_match( '#^(elearnposh-site-|elearnposh-header|epsh-header)#i', $basename );
}

/**
 * Active legacy header/footer plugin basenames.
 *
 * @return string[]
 */
function ahf_active_legacy_header_plugins() {
	$found  = array();
	$active = (array) get_option( 'active_plugins', array() );
	foreach ( $active as $basename ) {
		if ( ahf_is_legacy_header_basename( $basename ) ) {
			$found[] = (string) $basename;
		}
	}
	return array_values( array_unique( $found ) );
}

/**
 * Whether a legacy eLearnPOSH header/footer plugin is still active.
 */
function ahf_is_legacy_header_plugin_active() {
	return ! empty( ahf_active_legacy_header_plugins() );
}

/**
 * Deactivate legacy header plugins so EPSH_* classes are not declared twice.
 *
 * @return string[] Deactivated plugin basenames.
 */
function ahf_deactivate_legacy_header_plugins() {
	if ( ! function_exists( 'deactivate_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	$to_off = ahf_active_legacy_header_plugins();
	if ( ! empty( $to_off ) ) {
		deactivate_plugins( $to_off, true );
	}

	return $to_off;
}

/**
 * Safe class_alias — never fatals if the alias already exists (legacy plugin).
 *
 * @param string $original Original class.
 * @param string $alias    Alias class.
 */
function ahf_safe_class_alias( $original, $alias ) {
	if ( ! class_exists( $original, false ) ) {
		return;
	}
	if ( class_exists( $alias, false ) ) {
		return;
	}
	class_alias( $original, $alias );
}

/**
 * Copy legacy option once if the new key is missing.
 */
function ahf_maybe_migrate_settings() {
	if ( ! class_exists( 'AHF_Config', false ) ) {
		return;
	}

	$current = get_option( AHF_OPTION_SETTINGS, false );
	if ( false !== $current ) {
		return;
	}

	$legacy = get_option( 'epsh_settings', false );
	if ( false !== $legacy && is_array( $legacy ) ) {
		update_option( AHF_OPTION_SETTINGS, $legacy );
		return;
	}

	update_option( AHF_OPTION_SETTINGS, AHF_Config::default_settings() );
}

// Always register activation — must run even when we bail on a conflicted request.
register_activation_hook(
	__FILE__,
	static function () {
		ahf_deactivate_legacy_header_plugins();
		if ( ! class_exists( 'AHF_Config', false ) ) {
			require_once AHF_PLUGIN_DIR . 'includes/class-ahf-config.php';
		}
		ahf_maybe_migrate_settings();
	}
);

/*
 * If the legacy plugin already booted this request, do not load a second header stack.
 * (Alphabetically "akaza-*" usually loads first; activation deactivates the legacy plugin.)
 */
if ( class_exists( 'EPSH_Plugin', false ) && ! class_exists( 'AHF_Plugin', false ) ) {
	add_action(
		'admin_notices',
		static function () {
			if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}
			echo '<div class="notice notice-error"><p>';
			echo esc_html__( 'Akaza Header Footer could not start because the legacy eLearnPOSH header/footer plugin is still active. Deactivate any plugin whose folder starts with elearnposh-site- or elearnposh-header, then activate Akaza Header Footer again.', 'akaza-header-footer' );
			echo '</p></div>';
		}
	);
	add_action(
		'plugins_loaded',
		static function () {
			$off = ahf_deactivate_legacy_header_plugins();
			if ( ! empty( $off ) ) {
				set_transient( 'ahf_deactivated_legacy_header', $off, MINUTE_IN_SECONDS * 10 );
			}
		},
		0
	);
	return;
}

require_once AHF_PLUGIN_DIR . 'includes/class-ahf-config.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-amp.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-menu-items.php';
require_once AHF_PLUGIN_DIR . 'includes/class-ahf-plugin.php';

/*
 * Only register EPSH_* aliases when the legacy plugin is not active.
 * Creating aliases while the old plugin still loads later causes:
 * "Cannot declare class EPSH_* because the name is already in use".
 */
if ( ! ahf_is_legacy_header_plugin_active() ) {
	ahf_safe_class_alias( 'AHF_Plugin', 'EPSH_Plugin' );
	ahf_safe_class_alias( 'AHF_Config', 'EPSH_Config' );
	ahf_safe_class_alias( 'AHF_AMP', 'EPSH_Amp' );
	ahf_safe_class_alias( 'AHF_Menu_Items', 'EPSH_Menu_Items' );
	ahf_safe_class_alias( 'AHF_Footer', 'EPSH_Footer' );
	ahf_safe_class_alias( 'AHF_Footer_Items', 'EPSH_Footer_Items' );
	ahf_safe_class_alias( 'AHF_Classic_Layout', 'EPSH_Classic_Layout' );
	ahf_safe_class_alias( 'AHF_Genesis_Layout', 'EPSH_Genesis_Layout' );
	ahf_safe_class_alias( 'AHF_Custom_Nav', 'EPSH_Custom_Nav' );
	ahf_safe_class_alias( 'AHF_Mobile_Header', 'EPSH_Mobile_Header' );
	ahf_safe_class_alias( 'AHF_Top_Bar', 'EPSH_Top_Bar' );
	ahf_safe_class_alias( 'AHF_Site_Search', 'EPSH_Site_Search' );
}

if ( ! function_exists( 'ahf_plugin' ) ) {
	/**
	 * @return AHF_Plugin
	 */
	function ahf_plugin() {
		ahf_maybe_migrate_settings();
		return AHF_Plugin::instance();
	}
}

/*
 * Do not declare epsh_plugin() while the legacy plugin is still active — that plugin
 * also defines epsh_plugin() and would fatal with "Cannot redeclare".
 */
if ( ! function_exists( 'epsh_plugin' ) && ! ahf_is_legacy_header_plugin_active() ) {
	/**
	 * @deprecated Use ahf_plugin()
	 * @return AHF_Plugin
	 */
	function epsh_plugin() {
		return ahf_plugin();
	}
}

add_action( 'plugins_loaded', 'ahf_plugin' );

/*
 * Auto-disable the legacy plugin when both end up active (prevents EPSH_* redeclaration fatals
 * and duplicate eLearnPOSH headers on SucceedLEARN).
 */
add_action(
	'plugins_loaded',
	static function () {
		if ( ! ahf_is_legacy_header_plugin_active() ) {
			return;
		}
		$off = ahf_deactivate_legacy_header_plugins();
		if ( ! empty( $off ) ) {
			set_transient( 'ahf_deactivated_legacy_header', $off, MINUTE_IN_SECONDS * 10 );
		}
	},
	0
);

add_action(
	'admin_notices',
	static function () {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$off = get_transient( 'ahf_deactivated_legacy_header' );
		if ( empty( $off ) || ! is_array( $off ) ) {
			return;
		}
		delete_transient( 'ahf_deactivated_legacy_header' );

		echo '<div class="notice notice-success is-dismissible"><p>';
		echo esc_html(
			sprintf(
				/* translators: %s: comma-separated plugin file names */
				__( 'Akaza Header Footer deactivated the legacy header plugin to prevent a fatal conflict: %s. You can delete that old plugin folder from wp-content/plugins.', 'akaza-header-footer' ),
				implode( ', ', $off )
			)
		);
		echo '</p></div>';
	}
);
