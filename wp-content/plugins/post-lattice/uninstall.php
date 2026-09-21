<?php
/**
 * Uninstall cleanup.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'plt_options' );
delete_option( 'plt_profiles' );
