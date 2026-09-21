<?php
/**
 * Shared asset enqueue helpers.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Version string for a theme asset file.
 *
 * @param string $absolute_path Full filesystem path.
 * @return string
 */
function akaza_asset_version( $absolute_path ) {
	return file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : AKAZA_VERSION;
}

/**
 * Enqueue a CSS file from assets/css/.
 *
 * @param string   $handle        Style handle.
 * @param string   $relative_path Path under assets/css/.
 * @param string[] $deps          Dependencies.
 */
function akaza_enqueue_theme_style( $handle, $relative_path, $deps = array( 'akaza-main', 'akaza-fonts' ) ) {
	$relative_path = ltrim( $relative_path, '/' );
	$path          = AKAZA_DIR . '/assets/css/' . $relative_path;

	wp_enqueue_style(
		$handle,
		AKAZA_URI . '/assets/css/' . $relative_path,
		$deps,
		akaza_asset_version( $path )
	);
}

/**
 * Shared training-page foundation (tokens, container, headings, eyebrows).
 *
 * Use on every new marketing/training page:
 * 1. Add class `sl-training-page` on <main>
 * 2. Call this before section styles; depend section CSS on the returned handle
 * 3. Skip creating a per-page *-global.css unless the page needs unique overrides
 *
 * @return string Style handle.
 */
function akaza_enqueue_page_foundation() {
	akaza_enqueue_theme_style(
		'akaza-page-foundation',
		'sl-page-foundation.css',
		array( 'akaza-main' )
	);

	return 'akaza-page-foundation';
}

/**
 * Enqueue a JS file from assets/js/ with defer in footer.
 *
 * @param string   $handle        Script handle.
 * @param string   $relative_path Path under assets/js/.
 * @param string[] $deps          Dependencies.
 */
function akaza_enqueue_theme_script( $handle, $relative_path, $deps = array() ) {
	$relative_path = ltrim( $relative_path, '/' );
	$path          = AKAZA_DIR . '/assets/js/' . $relative_path;

	wp_enqueue_script(
		$handle,
		AKAZA_URI . '/assets/js/' . $relative_path,
		$deps,
		akaza_asset_version( $path ),
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}

/**
 * Enqueue stats + clients blocks used on many landing pages.
 *
 * @param string[] $extra_style_deps Extra style dependencies.
 */
function akaza_enqueue_stats_clients_assets( $extra_style_deps = array() ) {
	$style_deps = array_merge( array( 'akaza-main', 'akaza-fonts' ), $extra_style_deps );

	akaza_enqueue_theme_style( 'akaza-stats', 'stats.css', $style_deps );
	akaza_enqueue_theme_script( 'akaza-stats', 'stats.js' );
	akaza_enqueue_theme_style( 'akaza-clients', 'clients.css', $style_deps );
	akaza_enqueue_theme_script( 'akaza-clients', 'clients.js' );
}
