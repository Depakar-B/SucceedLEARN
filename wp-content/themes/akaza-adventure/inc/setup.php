<?php
/**
 * Extracted from functions.php (inc\setup.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Theme setup.
 */
function akaza_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 56,
			'width'       => 180,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'akaza-adventure' ),
			'footer'  => __( 'Footer Menu', 'akaza-adventure' ),
		)
	);

	add_image_size( 'akaza-course-card', 640, 400, true );
	add_image_size( 'akaza-blog-card', 640, 400, true );
	add_image_size( 'akaza-course-hero', 1200, 675, true );
}
add_action( 'after_setup_theme', 'akaza_setup' );
