<?php
/**
 * Cybersecurity Awareness page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the Cybersecurity Awareness landing page.
 *
 * Matches the page template and slug so suppression works even if the template
 * meta is missing on demo/staging copies of the page.
 *
 * @return bool
 */
function akaza_is_csa_landing_page() {
	static $is_csa = null;

	if ( null !== $is_csa ) {
		return $is_csa;
	}

	$is_csa = is_page_template( 'page-templates/cybersecurity-awareness.php' )
		|| is_page_template( 'page-templates/cybersecurity-awareness-uk.php' )
		|| is_page( 'us-cyber-aware-october' )
		|| is_page( 'uk-cyber-aware-october' );

	return $is_csa;
}

/**
 * Suppress the global site footer on the Cybersecurity Awareness page.
 *
 * @param bool $show Whether the AHF footer should render.
 * @return bool
 */
function akaza_csa_hide_default_footer( $show ) {
	if ( akaza_is_csa_landing_page() ) {
		return false;
	}

	return $show;
}
add_filter( 'ahf_footer_should_show', 'akaza_csa_hide_default_footer' );

/**
 * Suppress the global site header on the Cybersecurity Awareness page.
 *
 * @param bool $show Whether the AHF header should render.
 * @return bool
 */
function akaza_csa_hide_default_header( $show ) {
	if ( akaza_is_csa_landing_page() ) {
		return false;
	}

	return $show;
}
add_filter( 'ahf_classic_header_should_render', 'akaza_csa_hide_default_header' );

/**
 * Suppress the global AHF top bar on the Cybersecurity Awareness page.
 *
 * @param bool $show Whether the AHF top bar should render.
 * @return bool
 */
function akaza_csa_hide_default_top_bar( $show ) {
	if ( akaza_is_csa_landing_page() ) {
		return false;
	}

	return $show;
}
add_filter( 'ahf_top_bar_should_show', 'akaza_csa_hide_default_top_bar' );

/**
 * Suppress the global AHF mobile header on the Cybersecurity Awareness page.
 *
 * @param bool $load Whether the mobile header should load.
 * @return bool
 */
function akaza_csa_hide_mobile_header( $load ) {
	if ( akaza_is_csa_landing_page() ) {
		return false;
	}

	return $load;
}
add_filter( 'ahf_mobile_header_should_load', 'akaza_csa_hide_mobile_header' );

/**
 * Remove global header/footer hooks that bypass the classic-header filters.
 */
function akaza_csa_disable_global_chrome_hooks() {
	if ( ! akaza_is_csa_landing_page() ) {
		return;
	}

	if ( class_exists( 'AHF_Mobile_Header' ) ) {
		remove_action( 'wp_body_open', array( 'AHF_Mobile_Header', 'render' ), 5 );
		remove_action( 'wp_footer', array( 'AHF_Mobile_Header', 'render' ), 5 );
	}
}
add_action( 'template_redirect', 'akaza_csa_disable_global_chrome_hooks', 100 );

/**
 * Stop theme-builder headers/footers from replacing the CSA landing shell.
 */
function akaza_csa_disable_builder_header_footer() {
	if ( ! akaza_is_csa_landing_page() ) {
		return;
	}

	if ( class_exists( '\Thim_EL_Kit\Modules\HeaderFooter\FrontEnd' ) ) {
		$fe = \Thim_EL_Kit\Modules\HeaderFooter\FrontEnd::instance();
		remove_action( 'get_header', array( $fe, 'override_header' ) );
		remove_action( 'get_footer', array( $fe, 'override_footer' ) );
	}

	if ( class_exists( '\ElementorPro\Plugin' ) && function_exists( 'elementor_theme_do_location' ) ) {
		add_filter( 'elementor/theme/get_location_templates/header', '__return_empty_array', 99 );
		add_filter( 'elementor/theme/get_location_templates/footer', '__return_empty_array', 99 );
	}
}
add_action( 'template_redirect', 'akaza_csa_disable_builder_header_footer', 99 );

/**
 * Strip global AHF body classes that add header clearance on the CSA landing page.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function akaza_csa_body_class( $classes ) {
	if ( ! akaza_is_csa_landing_page() ) {
		return $classes;
	}

	$strip = array(
		'epsh-classic-header',
		'epsh-has-fixed-header',
		'epsh-smart-header',
		'epsh-custom-desktop-nav',
		'epsh-has-mobile-header',
		'epsh-has-top-bar',
		'epsh-has-custom-footer',
	);

	return array_values( array_diff( $classes, $strip ) );
}
add_filter( 'body_class', 'akaza_csa_body_class', 999 );

/**
 * Dequeue global header/footer assets on the CSA landing page.
 */
function akaza_csa_dequeue_global_chrome_assets() {
	if ( ! akaza_is_csa_landing_page() ) {
		return;
	}

	$handles = array(
		'epsh-mobile-header',
		'epsh-desktop-nav',
		'epsh-header-shell',
		'epsh-footer',
		'epsh-top-bar',
		'epsh-site-search',
	);

	foreach ( $handles as $handle ) {
		wp_dequeue_style( $handle );
		wp_dequeue_script( $handle );
	}
}
add_action( 'wp_enqueue_scripts', 'akaza_csa_dequeue_global_chrome_assets', 999 );

function akaza_enqueue_csa_assets() {
	$base_deps = array( 'akaza-main', 'akaza-fonts' );

	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-awareness-header',
		'cybersecurity-awareness/sl-cybersecurity-awareness-header.css',
		$base_deps
	);
	akaza_enqueue_theme_script(
		'akaza-sl-cybersecurity-awareness-header',
		'cybersecurity-awareness/sl-cybersecurity-awareness-header.js'
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-awareness-top-bar',
		'cybersecurity-awareness/sl-cybersecurity-awareness-top-bar.css',
		array( 'akaza-sl-cybersecurity-awareness-header' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-awareness-hero',
		'cybersecurity-awareness/sl-cybersecurity-awareness-hero.css',
		array( 'akaza-sl-cybersecurity-awareness-top-bar' )
	);
	akaza_enqueue_theme_script(
		'akaza-sl-cybersecurity-awareness-hero',
		'cybersecurity-awareness/sl-cybersecurity-awareness-hero.js'
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-awareness-offer-strip',
		'cybersecurity-awareness/sl-cybersecurity-awareness-offer-strip.css',
		array( 'akaza-sl-cybersecurity-awareness-hero' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cyber-awareness-offer',
		'cybersecurity-awareness/sl-cyber-awareness-offer.css',
		array( 'akaza-sl-cybersecurity-awareness-offer-strip' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cyber-awareness-readiness',
		'cybersecurity-awareness/sl-cyber-awareness-readiness.css',
		array( 'akaza-sl-cyber-awareness-offer' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-awareness-campaign',
		'cybersecurity-awareness/sl-cybersecurity-awareness-campaign.css',
		array( 'akaza-sl-cyber-awareness-readiness' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-phishcue',
		'cybersecurity-awareness/sl-cybersecurity-phishcue.css',
		array( 'akaza-sl-cybersecurity-awareness-campaign' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cyber-awareness-integration',
		'cybersecurity-awareness/sl-cyber-awareness-integration.css',
		array( 'akaza-sl-cybersecurity-phishcue' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-awareness-pricing',
		'cybersecurity-awareness/sl-cybersecurity-awareness-pricing.css',
		array( 'akaza-sl-cyber-awareness-integration' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-campaign-journey',
		'cybersecurity-awareness/sl-cybersecurity-campaign-journey.css',
		array( 'akaza-sl-cybersecurity-awareness-pricing' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-campaign-measure',
		'cybersecurity-awareness/sl-cybersecurity-campaign-measure.css',
		array( 'akaza-sl-cybersecurity-campaign-journey' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-awareness-faq',
		'cybersecurity-awareness/sl-cybersecurity-awareness-faq.css',
		array( 'akaza-sl-cybersecurity-campaign-measure', 'akaza-global-faq' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-awareness-contact',
		'cybersecurity-awareness/sl-cybersecurity-awareness-contact.css',
		array( 'akaza-sl-cybersecurity-awareness-faq' )
	);

	// Ensure the cyber form plugin CSS/JS always load on CSA (US + UK).
	if ( defined( 'SSF_PLUGIN_FILE' ) && defined( 'SSF_VERSION' ) ) {
		wp_enqueue_style(
			'ssf-form',
			plugins_url( 'assets/css/seo-form.css', SSF_PLUGIN_FILE ),
			array( 'akaza-sl-cybersecurity-awareness-contact' ),
			SSF_VERSION
		);
		wp_enqueue_script(
			'ssf-form',
			plugins_url( 'assets/js/seo-form.js', SSF_PLUGIN_FILE ),
			array(),
			SSF_VERSION,
			true
		);
		wp_localize_script(
			'ssf-form',
			'SSF_FORM',
			array(
				'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'ssf_submit' ),
				'messages' => array(
					'success' => __( 'Thank you! We will get back to you soon.', 'seo-form' ),
					'error'   => __( 'Something went wrong. Please try again.', 'seo-form' ),
					'privacy' => __( 'Please accept the privacy policy to continue.', 'seo-form' ),
				),
			)
		);
	}

	akaza_enqueue_theme_style(
		'akaza-sl-csa-section-rhythm',
		'cybersecurity-awareness/sl-csa-section-rhythm.css',
		array( 'akaza-sl-cybersecurity-awareness-contact', 'akaza-global-faq', 'akaza-sl-cybersecurity-awareness-faq' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-cybersecurity-awareness-footer',
		'cybersecurity-awareness/sl-cybersecurity-awareness-footer.css',
		array( 'akaza-sl-csa-section-rhythm' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-csa-typography',
		'cybersecurity-awareness/sl-csa-typography.css',
		array( 'akaza-sl-cybersecurity-awareness-footer' )
	);
}
