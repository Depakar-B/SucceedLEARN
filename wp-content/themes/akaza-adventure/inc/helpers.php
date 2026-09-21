<?php
/**
 * Extracted from functions.php (inc\helpers.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Theme image URL helper.
 *
 * @param string $path Relative path under assets/images/.
 * @return string
 */
function akaza_img( $path ) {
	return AKAZA_URI . '/assets/images/' . ltrim( $path, '/' );
}

/**
 * Backward-compatible alias used in existing templates.
 *
 * @param string $path Path.
 * @return string
 */
function slf_img( $path ) {
	return akaza_img( $path );
}

/**
 * Uploads folder URL — uses local file when synced, otherwise production.
 *
 * @param string $path Path under wp-content/uploads/ (e.g. "2026/08/Security.svg").
 * @return string
 */
function akaza_upload_url( $path ) {
	$path = ltrim( $path, '/' );
	$path = preg_replace( '#^uploads/#', '', $path );
	$local = WP_CONTENT_DIR . '/uploads/' . $path;
	if ( file_exists( $local ) ) {
		return content_url( '/uploads/' . $path );
	}
	return 'https://succeedlearn.com/wp-content/uploads/' . $path;
}

/**
 * Page URL by slug.
 *
 * @param string $slug Page slug.
 * @return string
 */
function akaza_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' . trim( $slug, '/' ) . '/' );
}

/**
 * Inline an SVG from theme assets/images/.
 *
 * @param string $path Relative path under assets/images/ (e.g. "icons/platform/security.svg").
 * @return string Safe SVG markup, or empty string if missing.
 */
function akaza_inline_theme_svg( $path ) {
	$path = ltrim( (string) $path, '/' );
	$file = AKAZA_DIR . '/assets/images/' . $path;

	if ( ! is_readable( $file ) ) {
		return '';
	}

	$svg = file_get_contents( $file );
	if ( false === $svg || '' === trim( $svg ) ) {
		return '';
	}

	$svg = preg_replace( '/<\?xml.*?\?>\s*/', '', $svg );

	$allowed = array(
		'svg'    => array(
			'xmlns'           => true,
			'viewbox'         => true,
			'width'           => true,
			'height'          => true,
			'fill'            => true,
			'stroke'          => true,
			'stroke-width'    => true,
			'stroke-linecap'  => true,
			'stroke-linejoin' => true,
			'aria-hidden'     => true,
			'role'            => true,
			'class'           => true,
		),
		'path'   => array(
			'd'               => true,
			'fill'            => true,
			'stroke'          => true,
			'stroke-width'    => true,
			'stroke-linecap'  => true,
			'stroke-linejoin' => true,
		),
		'circle' => array(
			'cx'              => true,
			'cy'              => true,
			'r'               => true,
			'fill'            => true,
			'stroke'          => true,
			'stroke-width'    => true,
		),
		'rect'   => array(
			'x'               => true,
			'y'               => true,
			'width'           => true,
			'height'          => true,
			'rx'              => true,
			'fill'            => true,
			'stroke'          => true,
			'stroke-width'    => true,
		),
	);

	return wp_kses( trim( $svg ), $allowed );
}

/**
 * Increment theme patch version in style.css and functions.php.
 *
 * @return string New version, or empty string on failure.
 */
function akaza_increment_theme_version() {
	$style_file     = AKAZA_DIR . '/style.css';
	$functions_file = AKAZA_DIR . '/functions.php';

	if ( ! is_readable( $style_file ) || ! is_writable( $style_file ) ) {
		return '';
	}
	if ( ! is_readable( $functions_file ) || ! is_writable( $functions_file ) ) {
		return '';
	}

	$style = file_get_contents( $style_file );
	if ( ! preg_match( '/Version:\s*([\d.]+)/', $style, $matches ) ) {
		return '';
	}

	$parts   = explode( '.', $matches[1] );
	$parts[] = 0;
	$parts   = array_slice( $parts, 0, 3 );
	$parts[2] = (string) ( (int) $parts[2] + 1 );
	$new_version = implode( '.', $parts );

	$style = preg_replace( '/Version:\s*[\d.]+/', 'Version: ' . $new_version, $style, 1 );
	file_put_contents( $style_file, $style );

	$functions = file_get_contents( $functions_file );
	$functions = preg_replace(
		"/define\\(\\s*'AKAZA_VERSION'\\s*,\\s*'[\\d.]+'\\s*\\)/",
		"define( 'AKAZA_VERSION', '" . $new_version . "' )",
		$functions,
		1
	);
	file_put_contents( $functions_file, $functions );

	return $new_version;
}
