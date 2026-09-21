<?php
/**
 * Infosec 2026 Cyber page assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the Infosec 2026 Cyber landing page.
 *
 * @return bool
 */
function akaza_is_infosec_2026_landing_page() {
	static $is_infosec = null;

	if ( null !== $is_infosec ) {
		return $is_infosec;
	}

	$is_infosec = is_page_template( 'page-templates/infosec-2026-cyber.php' )
		|| is_page_template( 'page-templates/infosec-2026-cyber-uk.php' )
		|| is_page(
			array(
				'cybersecurity-awareness',
				'infosec-2026-cyber',
				'infosec-2026',
				'infosec-cybersecurity-awareness',
				'infosec-cybersecurity-awareness-us',
				'infosec-cybersecurity-awareness-uk',
				'infosec-cybersecurity-awareness/us',
				'infosec-cybersecurity-awareness/uk',
				'infosec-cybersecurity-awareness-month-2026',
			)
		);

	return $is_infosec;
}

/**
 * Suppress the global site header on the Infosec landing page.
 *
 * @param bool $show Whether the AHF header should render.
 * @return bool
 */
function akaza_infosec_hide_default_header( $show ) {
	if ( akaza_is_infosec_2026_landing_page() ) {
		return false;
	}

	return $show;
}
add_filter( 'ahf_classic_header_should_render', 'akaza_infosec_hide_default_header' );

/**
 * Suppress the global AHF top bar on the Infosec landing page.
 *
 * @param bool $show Whether the AHF top bar should render.
 * @return bool
 */
function akaza_infosec_hide_default_top_bar( $show ) {
	if ( akaza_is_infosec_2026_landing_page() ) {
		return false;
	}

	return $show;
}
add_filter( 'ahf_top_bar_should_show', 'akaza_infosec_hide_default_top_bar' );

/**
 * Suppress the global AHF mobile header on the Infosec landing page.
 *
 * @param bool $load Whether the mobile header should load.
 * @return bool
 */
function akaza_infosec_hide_mobile_header( $load ) {
	if ( akaza_is_infosec_2026_landing_page() ) {
		return false;
	}

	return $load;
}
add_filter( 'ahf_mobile_header_should_load', 'akaza_infosec_hide_mobile_header' );

/**
 * Remove global header hooks that bypass the classic-header filters.
 */
function akaza_infosec_disable_global_chrome_hooks() {
	if ( ! akaza_is_infosec_2026_landing_page() ) {
		return;
	}

	if ( class_exists( 'AHF_Mobile_Header' ) ) {
		remove_action( 'wp_body_open', array( 'AHF_Mobile_Header', 'render' ), 5 );
		remove_action( 'wp_footer', array( 'AHF_Mobile_Header', 'render' ), 5 );
	}
}
add_action( 'template_redirect', 'akaza_infosec_disable_global_chrome_hooks', 100 );

/**
 * Stop theme-builder headers/footers from replacing the Infosec landing shell.
 */
function akaza_infosec_disable_builder_header_footer() {
	if ( ! akaza_is_infosec_2026_landing_page() ) {
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
add_action( 'template_redirect', 'akaza_infosec_disable_builder_header_footer', 99 );

/**
 * Strip global AHF body classes that add header clearance on the Infosec landing page.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function akaza_infosec_body_class( $classes ) {
	if ( ! akaza_is_infosec_2026_landing_page() ) {
		return $classes;
	}

	$strip = array(
		'epsh-classic-header',
		'epsh-has-fixed-header',
		'epsh-smart-header',
		'epsh-custom-desktop-nav',
		'epsh-has-mobile-header',
		'epsh-has-top-bar',
	);

	return array_values( array_diff( $classes, $strip ) );
}
add_filter( 'body_class', 'akaza_infosec_body_class', 999 );

/**
 * Dequeue global header assets on the Infosec landing page.
 */
function akaza_infosec_dequeue_global_chrome_assets() {
	if ( ! akaza_is_infosec_2026_landing_page() ) {
		return;
	}

	$handles = array(
		'epsh-mobile-header',
		'epsh-desktop-nav',
		'epsh-header-shell',
		'epsh-top-bar',
		'epsh-site-search',
	);

	foreach ( $handles as $handle ) {
		wp_dequeue_style( $handle );
		wp_dequeue_script( $handle );
	}
}
add_action( 'wp_enqueue_scripts', 'akaza_infosec_dequeue_global_chrome_assets', 999 );

/**
 * Enqueue Infosec 2026 Cyber page styles (and scripts when needed).
 * Desktop only — AMP uses plugin styles in succeedlearn-amp.
 */
function akaza_enqueue_infosec_2026_cyber_assets() {
	if (
		( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() )
		|| ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )
		|| ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() )
	) {
		return;
	}

	$folder = 'infosec-2026-cyber';
	$global = akaza_enqueue_page_foundation();

	akaza_enqueue_theme_style(
		'akaza-sl-infosec-2026-header',
		"{$folder}/sl-infosec-2026-header.css",
		array( $global )
	);
	akaza_enqueue_theme_script(
		'akaza-sl-infosec-2026-header',
		"{$folder}/sl-infosec-2026-header.js"
	);

	akaza_enqueue_theme_style(
		'akaza-sl-infosec-2026-cyber-hero',
		"{$folder}/sl-infosec-2026-cyber-hero.css",
		array( 'akaza-sl-infosec-2026-header' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-infosec-2026-cyber-campaign',
		"{$folder}/sl-infosec-2026-cyber-campaign.css",
		array( $global )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-infosec-2026-cyber-testing',
		"{$folder}/sl-infosec-2026-cyber-testing.css",
		array( $global, 'akaza-global-highlight' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-infosec-2026-cyber-challenge',
		"{$folder}/sl-infosec-2026-cyber-challenge.css",
		array( $global, 'akaza-global-highlight' )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-infosec-2026-campaign-works',
		"{$folder}/sl-infosec-2026-campaign-works.css",
		array( $global )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-infosec-2026-understand',
		"{$folder}/sl-infosec-2026-understand.css",
		array( $global )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-infosec-2026-terms',
		"{$folder}/sl-infosec-2026-terms.css",
		array( $global )
	);
	akaza_enqueue_theme_style(
		'akaza-sl-infosec-2026-contact',
		"{$folder}/sl-infosec-2026-contact.css",
		array( $global )
	);

	// Campaign Registration form (US + UK): ensure plugin CSS/JS always load.
	if ( defined( 'SSF_PLUGIN_FILE' ) && defined( 'SSF_VERSION' ) ) {
		wp_enqueue_style(
			'ssf-form',
			plugins_url( 'assets/css/seo-form.css', SSF_PLUGIN_FILE ),
			array( 'akaza-sl-infosec-2026-contact' ),
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
}
