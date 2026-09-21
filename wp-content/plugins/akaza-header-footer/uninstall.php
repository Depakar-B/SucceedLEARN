<?php
/**
 * Uninstall — remove plugin options.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'ahf_settings' );
delete_option( 'epsh_settings' );
delete_option( 'ahf_topbar_migrated' );
delete_option( 'epsh_topbar_migrated' );
