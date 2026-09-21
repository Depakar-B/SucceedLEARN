<?php
/**
 * Akaza theme — clean starter for SucceedLEARN redesign.
 *
 * @package Akaza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AKAZA_VERSION', '1.0.0' );
define( 'AKAZA_DIR', get_template_directory() );
define( 'AKAZA_URI', get_template_directory_uri() );

/**
 * Theme supports and menus.
 */
function akaza_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'akaza' ),
			'footer'  => __( 'Footer Menu', 'akaza' ),
		)
	);
}
add_action( 'after_setup_theme', 'akaza_setup' );

/**
 * Front-end assets.
 */
function akaza_assets() {
	wp_enqueue_style(
		'akaza-main',
		AKAZA_URI . '/assets/css/main.css',
		array(),
		AKAZA_VERSION
	);

	wp_enqueue_script(
		'akaza-main',
		AKAZA_URI . '/assets/js/main.js',
		array(),
		AKAZA_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'akaza_assets' );
