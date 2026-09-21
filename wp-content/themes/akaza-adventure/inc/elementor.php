<?php
/**
 * Extracted from functions.php (inc\elementor.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Whether the current request needs Elementor frontend assets.
 *
 * @return bool
 */
function akaza_needs_elementor_assets() {
	if ( ! did_action( 'elementor/loaded' ) || ! class_exists( '\Elementor\Plugin' ) ) {
		return false;
	}

	// Keep assets in the Elementor editor / preview.
	if ( is_admin() || isset( $_GET['elementor-preview'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return true;
	}

	$plugin = \Elementor\Plugin::$instance;
	if ( ! empty( $plugin->preview ) && method_exists( $plugin->preview, 'is_preview_mode' ) && $plugin->preview->is_preview_mode() ) {
		return true;
	}

	// New theme homepage never uses Elementor markup.
	if ( is_front_page() || is_page_template( 'page-templates/homepage-fast.php' ) ) {
		return false;
	}

	// SucceedLearn PHP landings never use Elementor content, even if the WP
	// page still has leftover `_elementor_edit_mode` meta from an old build.
	$template_slug = (string) get_page_template_slug();
	if ( '' !== $template_slug && function_exists( 'akaza_get_page_asset_handlers' ) ) {
		$handlers = akaza_get_page_asset_handlers();
		if ( isset( $handlers[ $template_slug ] ) ) {
			return false;
		}
	}

	if (
		( function_exists( 'akaza_is_sap_landing_page' ) && akaza_is_sap_landing_page() )
		|| ( function_exists( 'akaza_is_csa_landing_page' ) && akaza_is_csa_landing_page() )
		|| ( function_exists( 'akaza_is_infosec_2026_landing_page' ) && akaza_is_infosec_2026_landing_page() )
	) {
		return false;
	}

	if ( ! is_singular() ) {
		return false;
	}

	$post_id = (int) get_queried_object_id();
	if ( ! $post_id ) {
		return false;
	}

	if ( isset( $plugin->db ) && method_exists( $plugin->db, 'is_built_with_elementor' ) ) {
		return (bool) $plugin->db->is_built_with_elementor( $post_id );
	}

	return 'builder' === get_post_meta( $post_id, '_elementor_edit_mode', true );
}

/**
 * Drop Elementor kit / frontend CSS+JS on theme pages so rules like
 * `.elementor-kit-8941 h2` cannot override theme typography.
 */
function akaza_dequeue_elementor_assets() {
	if ( akaza_needs_elementor_assets() ) {
		return;
	}

	$kit_id = (int) get_option( 'elementor_active_kit' );

	$style_handles = array(
		'elementor-frontend',
		'elementor-frontend-css',
		'elementor-frontend-legacy',
		'elementor-icons',
		'elementor-common',
		'elementor-wp-admin-bar',
		'font-awesome',
		'e-animations',
		'e-swiper',
		'swiper',
	);

	if ( $kit_id ) {
		$style_handles[] = 'elementor-post-' . $kit_id;
		$style_handles[] = 'elementor-global';
	}

	foreach ( $style_handles as $handle ) {
		wp_dequeue_style( $handle );
		wp_deregister_style( $handle );
	}

	// Catch remaining Elementor kit / Google Fonts CSS handles.
	global $wp_styles;
	if ( $wp_styles instanceof WP_Styles ) {
		foreach ( array_keys( $wp_styles->registered ) as $handle ) {
			if ( 0 === strpos( $handle, 'elementor-post-' )
				|| 0 === strpos( $handle, 'elementor-gf-' )
				|| 0 === strpos( $handle, 'elementor-' )
			) {
				wp_dequeue_style( $handle );
				wp_deregister_style( $handle );
			}
		}
	}

	$script_handles = array(
		'elementor-frontend',
		'elementor-frontend-modules',
		'elementor-webpack-runtime',
		'elementor-common',
		'elementor-dialog',
		'swiper',
	);

	foreach ( $script_handles as $handle ) {
		wp_dequeue_script( $handle );
		wp_deregister_script( $handle );
	}
}
add_action( 'wp_enqueue_scripts', 'akaza_dequeue_elementor_assets', 9999 );

/**
 * Remove Elementor kit body classes on non-Elementor pages.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function akaza_strip_elementor_body_classes( $classes ) {
	if ( akaza_needs_elementor_assets() ) {
		return $classes;
	}

	return array_values(
		array_filter(
			$classes,
			static function ( $class ) {
				return 0 !== strpos( $class, 'elementor-' );
			}
		)
	);
}
add_filter( 'body_class', 'akaza_strip_elementor_body_classes', 9999 );
