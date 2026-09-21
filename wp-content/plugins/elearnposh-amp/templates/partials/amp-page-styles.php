<?php
/**
 * Inline AMP styles for menu, footer, notification (no upload cache — always works).
 *
 * Usage: elearnposh_amp_include_inline_styles( array( 'menu', 'footer', 'notification' ) );
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include style partials directly into amp-custom (bypasses CSS file cache).
 *
 * @param array $style_files Style names under templates/styles/.
 */
function elearnposh_amp_include_inline_styles( $style_files = array() ) {
	$defaults = array( 'menu', 'footer', 'bottom-bar', 'demo-btn', 'breadcrumbs' );
	$files    = array_merge( $defaults, (array) $style_files );
	$files    = array_unique( $files );

	foreach ( $files as $file ) {
		$path = ELEARNPOSH_AMP_TEMPLATES_DIR . 'styles/' . $file . '.php';
		if ( is_readable( $path ) ) {
			include $path;
		}
	}
}
