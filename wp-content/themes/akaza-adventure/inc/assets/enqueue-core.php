<?php
/**
 * Core theme assets loaded on every page.
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_core_assets() {
	$css_path = AKAZA_DIR . '/assets/css/main.css';
	$js_path  = AKAZA_DIR . '/assets/js/main.js';

	wp_enqueue_style(
		'akaza-main',
		AKAZA_URI . '/assets/css/main.css',
		array( 'akaza-fonts' ),
		file_exists( $css_path ) ? (string) filemtime( $css_path ) : AKAZA_VERSION
	);

	$global_faq_css = AKAZA_DIR . '/assets/css/global-faq.css';
	wp_enqueue_style(
		'akaza-global-faq',
		AKAZA_URI . '/assets/css/global-faq.css',
		array( 'akaza-main' ),
		file_exists( $global_faq_css ) ? (string) filemtime( $global_faq_css ) : AKAZA_VERSION
	);

	$global_faq_js = AKAZA_DIR . '/assets/js/global-faq.js';
	wp_enqueue_script(
		'akaza-global-faq',
		AKAZA_URI . '/assets/js/global-faq.js',
		array(),
		file_exists( $global_faq_js ) ? (string) filemtime( $global_faq_js ) : AKAZA_VERSION,
		true
	);

	wp_enqueue_script(
		'akaza-main',
		AKAZA_URI . '/assets/js/main.js',
		array(),
		file_exists( $js_path ) ? (string) filemtime( $js_path ) : AKAZA_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	// Theme header CSS/JS only when Akaza Header Footer plugin is not rendering.
	if ( ! has_action( 'ahf_render_site_header' ) ) {
		$fb_css = AKAZA_DIR . '/assets/css/header-fallback.css';
		$fb_js  = AKAZA_DIR . '/assets/js/header-fallback.js';

		wp_enqueue_style(
			'akaza-header-fallback',
			AKAZA_URI . '/assets/css/header-fallback.css',
			array( 'akaza-main' ),
			file_exists( $fb_css ) ? (string) filemtime( $fb_css ) : AKAZA_VERSION
		);

		wp_enqueue_script(
			'akaza-header-fallback',
			AKAZA_URI . '/assets/js/header-fallback.js',
			array(),
			file_exists( $fb_js ) ? (string) filemtime( $fb_js ) : AKAZA_VERSION,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}

	$global_ui_buttons_css = AKAZA_DIR . '/assets/css/sl-global-ui-buttons.css';
	wp_enqueue_style(
		'akaza-global-ui-buttons',
		AKAZA_URI . '/assets/css/sl-global-ui-buttons.css',
		array( 'akaza-main' ),
		file_exists( $global_ui_buttons_css ) ? (string) filemtime( $global_ui_buttons_css ) : AKAZA_VERSION
	);

	$global_buttons_css = AKAZA_DIR . '/assets/css/sl-global-buttons.css';
	wp_enqueue_style(
		'akaza-global-buttons',
		AKAZA_URI . '/assets/css/sl-global-buttons.css',
		array( 'akaza-main', 'akaza-global-ui-buttons' ),
		file_exists( $global_buttons_css ) ? (string) filemtime( $global_buttons_css ) : AKAZA_VERSION
	);

	akaza_enqueue_theme_style(
		'akaza-global-title-accent',
		'sl-global-title-accent.css',
		array( 'akaza-global-buttons' )
	);

	akaza_enqueue_theme_style(
		'akaza-global-panel-title',
		'sl-global-panel-title.css',
		array( 'akaza-main', 'akaza-global-title-accent' )
	);

	akaza_enqueue_theme_style(
		'akaza-global-highlight',
		'sl-global-highlight.css',
		array( 'akaza-main' )
	);

	akaza_enqueue_theme_style(
		'akaza-global-list-item',
		'sl-global-list-item.css',
		array( 'akaza-main' )
	);

	akaza_enqueue_theme_style(
		'akaza-global-sbcs',
		'sl-global-sbcs.css',
		array( 'akaza-main', 'akaza-global-panel-title', 'akaza-global-title-accent' )
	);

	akaza_enqueue_theme_style(
		'akaza-global-contact',
		'sl-global-contact.css',
		array( 'akaza-main', 'akaza-global-ui-buttons', 'akaza-global-buttons', 'akaza-global-title-accent' )
	);
}
