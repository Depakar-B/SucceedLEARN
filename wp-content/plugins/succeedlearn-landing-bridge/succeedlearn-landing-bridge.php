<?php
/**
 * Plugin Name: SucceedLearn Landing Bridge (Cyber + Infosec + SAP)
 * Description: Safely serves Cybersecurity Awareness, Infosec 2026, and Security Awareness (SAP) pages from akaza-adventure while Eduma stays the active site theme. Deactivate this plugin anytime to restore Eduma-only behavior.
 * Version: 1.0.14
 * Author: SucceedLearn
 * Requires at least: 6.0
 * Requires PHP: 7.4
 *
 * SAFE LIVE USAGE:
 * 1. Keep Eduma as the active theme (Appearance → Themes).
 * 2. Upload akaza-adventure into wp-content/themes/ but do NOT activate it.
 * 3. Upload/activate this plugin.
 * 4. Create/publish the allowlisted landing pages and assign the templates below.
 * 5. If anything looks wrong: deactivate this plugin. The rest of the site is untouched.
 *
 * @package SucceedLearn\LandingBridge
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Canonical map: live SEO path → desktop template + live AMP entry file.
 * Upload AMP from live-plugins-on-succeedlearn/succeedlearn-amp-custom/.
 *
 * @return array<string,array{
 *   label:string,
 *   desktop_template:string,
 *   amp_entry:string,
 *   amp_page:string
 * }>
 */
function sl_landing_bridge_linked_pages() {
	return array(
		'us-cyber-aware-october'                 => array(
			'label'            => 'Cybersecurity Awareness (US)',
			'desktop_template' => 'page-templates/cybersecurity-awareness.php',
			'amp_entry'        => 'template/us-cyber-aware-october.php',
			'amp_page'         => 'template/new-ui/pages/cybersecurity-awareness.php',
		),
		'uk-cyber-aware-october'                 => array(
			'label'            => 'Cybersecurity Awareness (UK)',
			'desktop_template' => 'page-templates/cybersecurity-awareness-uk.php',
			'amp_entry'        => 'template/uk-cyber-aware-october.php',
			'amp_page'         => 'template/new-ui/pages/cybersecurity-awareness.php',
		),
		// Live SEO URLs (flat slugs).
		'infosec-cybersecurity-awareness-us'     => array(
			'label'            => 'Infosec 2026 Cyber (US)',
			'desktop_template' => 'page-templates/infosec-2026-cyber.php',
			'amp_entry'        => 'template/infosec-cybersecurity-awareness-us.php',
			'amp_page'         => 'template/new-ui/pages/infosec-2026-cyber.php',
		),
		'infosec-cybersecurity-awareness-uk'     => array(
			'label'            => 'Infosec 2026 Cyber (UK)',
			'desktop_template' => 'page-templates/infosec-2026-cyber-uk.php',
			'amp_entry'        => 'template/infosec-cybersecurity-awareness-uk.php',
			'amp_page'         => 'template/new-ui/pages/infosec-2026-cyber-uk.php',
		),
		'security-awareness'                     => array(
			'label'            => 'Security Awareness / SAP',
			'desktop_template' => 'page-templates/security-awareness-and-phishing.php',
			'amp_entry'        => 'template/security-awareness.php',
			'amp_page'         => 'template/new-ui/pages/security-awareness.php',
		),
	);
}

/**
 * Allowed front-end URL slugs that may switch to akaza-adventure.
 * Add/remove only these landing pages. Nothing else is affected.
 *
 * @return string[]
 */
function sl_landing_bridge_allowed_slugs() {
	return array(
		// Cyber (US October campaign).
		'us-cyber-aware-october',
		// Cyber (UK October campaign).
		'uk-cyber-aware-october',
		// Infosec live SEO URLs (flat).
		'infosec-cybersecurity-awareness-us',
		'infosec-cybersecurity-awareness-uk',
		// Infosec aliases / older paths.
		'infosec-cybersecurity-awareness',
		'cybersecurity-awareness',
		'infosec-cybersecurity-awareness-month-2026',
		'infosec-2026-cyber',
		'infosec-2026',
		// Security Awareness / SAP (live SEO URL).
		'security-awareness',
		// SAP staging / alternate slug.
		'security-awareness-and-phishing',
	);
}

/**
 * Page templates exposed in the editor (Eduma stays active).
 *
 * @return array<string,string> Relative template path => label.
 */
function sl_landing_bridge_templates() {
	$map = array();
	foreach ( sl_landing_bridge_linked_pages() as $page ) {
		$map[ $page['desktop_template'] ] = 'SucceedLearn: ' . $page['label'];
	}
	return $map;
}

/**
 * Absolute path to the dormant akaza-adventure theme.
 *
 * @return string
 */
function sl_landing_bridge_akaza_dir() {
	return trailingslashit( get_theme_root() ) . 'akaza-adventure';
}

/**
 * Whether akaza-adventure exists on disk (not necessarily active).
 *
 * @return bool
 */
function sl_landing_bridge_akaza_exists() {
	$dir = sl_landing_bridge_akaza_dir();
	return is_dir( $dir ) && is_readable( $dir . '/style.css' ) && is_readable( $dir . '/functions.php' );
}

/**
 * Normalize the current front request path (no leading/trailing slash).
 *
 * @return string
 */
function sl_landing_bridge_request_path() {
	if ( empty( $_SERVER['REQUEST_URI'] ) ) {
		return '';
	}

	$path = (string) wp_parse_url( (string) $_SERVER['REQUEST_URI'], PHP_URL_PATH );
	$path = trim( $path, '/' );

	// Strip site subdirectory if WP is in a subfolder.
	$home_path = (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	$home_path = trim( $home_path, '/' );
	if ( '' !== $home_path && 0 === strpos( $path, $home_path . '/' ) ) {
		$path = substr( $path, strlen( $home_path ) + 1 );
	} elseif ( $path === $home_path ) {
		$path = '';
	}

	return trim( (string) $path, '/' );
}

/**
 * Detect if the current front request is one of the allowlisted landings.
 * Uses the request path only (safe before main query).
 *
 * Important: match the landing page itself only.
 * Child Elementor pages under /security-awareness/s-phish-.../ must stay on Eduma.
 *
 * @return bool
 */
function sl_landing_bridge_is_landing_request() {
	if ( is_admin() || wp_doing_ajax() || wp_doing_cron() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return false;
	}

	$path = sl_landing_bridge_request_path();
	if ( '' === $path ) {
		return false;
	}

	$parts = explode( '/', $path );
	$slug  = (string) $parts[0];
	$depth = count( $parts );

	// Nested Infosec aliases: /infosec-cybersecurity-awareness/us|uk/ (+ optional /amp/).
	if (
		'infosec-cybersecurity-awareness' === $slug
		&& isset( $parts[1] )
		&& in_array( (string) $parts[1], array( 'us', 'uk' ), true )
		&& (
			2 === $depth
			|| ( 3 === $depth && 'amp' === (string) $parts[2] )
		)
	) {
		return true;
	}

	// Exact landing: /infosec-cybersecurity-awareness-us/
	// AMP path style: /infosec-cybersecurity-awareness-us/amp/
	// Do NOT match children: /security-awareness/s-phish-phishing-simulation/
	if ( $depth > 1 && 'amp' !== (string) $parts[1] ) {
		return false;
	}

	if ( $depth > 2 ) {
		return false;
	}

	return in_array( $slug, sl_landing_bridge_allowed_slugs(), true );
}

/**
 * Current request path slug (first segment), or empty string.
 *
 * @return string
 */
function sl_landing_bridge_request_slug() {
	$path = sl_landing_bridge_request_path();
	if ( '' === $path ) {
		return '';
	}

	$parts = explode( '/', $path );
	return (string) $parts[0];
}

/**
 * Page slugs that use secondary global chrome (custom header + footer).
 *
 * Keep in sync with akaza_secondary_header_slugs() in the theme.
 *
 * @return string[]
 */
function sl_landing_bridge_secondary_header_slugs() {
	$slugs = array(
		'security-awareness',
		'security-awareness-and-phishing',
	);

	if ( function_exists( 'akaza_secondary_header_slugs' ) ) {
		$slugs = akaza_secondary_header_slugs();
	}

	/**
	 * Filter secondary-header slugs for the landing bridge.
	 *
	 * @param string[] $slugs Slugs.
	 */
	return array_values( array_unique( array_map( 'strval', (array) apply_filters( 'sl_landing_bridge_secondary_header_slugs', $slugs ) ) ) );
}

/**
 * Whether this request should use secondary global chrome (header + footer).
 *
 * @return bool
 */
function sl_landing_bridge_uses_secondary_header() {
	if ( function_exists( 'akaza_uses_secondary_header' ) ) {
		return (bool) akaza_uses_secondary_header();
	}

	// Fallback before theme loads: exact landing only (not child pages).
	if ( ! sl_landing_bridge_is_landing_request() ) {
		return false;
	}

	return in_array( sl_landing_bridge_request_slug(), sl_landing_bridge_secondary_header_slugs(), true );
}

/**
 * SAP landing helper (subset of secondary-header pages).
 *
 * @return bool
 */
function sl_landing_bridge_is_sap_request() {
	return in_array(
		sl_landing_bridge_request_slug(),
		array(
			'security-awareness',
			'security-awareness-and-phishing',
		),
		true
	);
}

/**
 * Show templates in Page Attributes while Eduma is active.
 *
 * @param array $templates Templates.
 * @return array
 */
function sl_landing_bridge_register_templates( $templates ) {
	if ( ! sl_landing_bridge_akaza_exists() ) {
		return $templates;
	}
	return array_merge( (array) $templates, sl_landing_bridge_templates() );
}
add_filter( 'theme_page_templates', 'sl_landing_bridge_register_templates' );

/**
 * For these landings only, load akaza-adventure for the current request.
 * Eduma remains the saved/active theme in wp-admin.
 *
 * @param string $theme Theme stylesheet/template slug.
 * @return string
 */
function sl_landing_bridge_maybe_switch_theme( $theme ) {
	if ( ! sl_landing_bridge_akaza_exists() ) {
		return $theme;
	}
	if ( ! sl_landing_bridge_is_landing_request() ) {
		return $theme;
	}
	return 'akaza-adventure';
}
add_filter( 'template', 'sl_landing_bridge_maybe_switch_theme', 1 );
add_filter( 'stylesheet', 'sl_landing_bridge_maybe_switch_theme', 1 );

/**
 * Strip Elementor kit body classes on bridged landings so theme typography wins.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function sl_landing_bridge_strip_elementor_body_classes( $classes ) {
	if ( ! sl_landing_bridge_is_landing_request() ) {
		return $classes;
	}

	return array_values(
		array_filter(
			(array) $classes,
			static function ( $class ) {
				return 0 !== strpos( (string) $class, 'elementor-' );
			}
		)
	);
}
add_filter( 'body_class', 'sl_landing_bridge_strip_elementor_body_classes', 9999 );

/**
 * Drop Elementor kit / frontend CSS on bridged landings.
 * Prevents rules like `.elementor-kit-XXXX h2` from overriding SucceedLearn h1–h4.
 */
function sl_landing_bridge_dequeue_elementor_assets() {
	if ( ! sl_landing_bridge_is_landing_request() ) {
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
		'elementor-global',
		'font-awesome',
		'e-animations',
		'e-swiper',
		'swiper',
	);

	if ( $kit_id ) {
		$style_handles[] = 'elementor-post-' . $kit_id;
	}

	foreach ( $style_handles as $handle ) {
		wp_dequeue_style( $handle );
		wp_deregister_style( $handle );
	}

	global $wp_styles;
	if ( $wp_styles instanceof WP_Styles ) {
		foreach ( array_keys( $wp_styles->registered ) as $handle ) {
			if (
				0 === strpos( $handle, 'elementor-post-' )
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
add_action( 'wp_enqueue_scripts', 'sl_landing_bridge_dequeue_elementor_assets', 9999 );

/**
 * Stop Elementor Theme Builder from swapping header/footer on bridged landings.
 * Secondary chrome pages: custom akaza header + footer.
 */
function sl_landing_bridge_disable_builder_header_footer() {
	if ( ! sl_landing_bridge_is_landing_request() ) {
		return;
	}

	if ( sl_landing_bridge_uses_secondary_header() ) {
		if ( class_exists( '\Thim_EL_Kit\Modules\HeaderFooter\FrontEnd' ) ) {
			$fe = \Thim_EL_Kit\Modules\HeaderFooter\FrontEnd::instance();
			remove_action( 'get_header', array( $fe, 'override_header' ) );
			remove_action( 'get_footer', array( $fe, 'override_footer' ) );
		}

		if ( class_exists( '\ElementorPro\Plugin' ) && function_exists( 'elementor_theme_do_location' ) ) {
			add_filter( 'elementor/theme/get_location_templates/header', '__return_empty_array', 99 );
			add_filter( 'elementor/theme/get_location_templates/footer', '__return_empty_array', 99 );
		}

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
add_action( 'template_redirect', 'sl_landing_bridge_disable_builder_header_footer', 99 );

/**
 * Admin notice if theme folder is missing.
 */
function sl_landing_bridge_admin_notice() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	if ( sl_landing_bridge_akaza_exists() ) {
		return;
	}
	echo '<div class="notice notice-warning"><p>';
	echo esc_html__( 'SucceedLearn Landing Bridge: upload the akaza-adventure theme folder to wp-content/themes/ (do not activate it). Until then, Cyber/Infosec/SAP templates will not load.', 'succeedlearn-landing-bridge' );
	echo '</p></div>';
}
add_action( 'admin_notices', 'sl_landing_bridge_admin_notice' );

/**
 * Force-download allowlisted brochure PDFs (same pattern as Eduma child ESG download).
 */
function sl_landing_bridge_force_pdf_download() {
	if ( empty( $_GET['download'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}

	$requested = basename( (string) wp_unslash( $_GET['download'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$allowed   = array(
		'Security-Behaviour-Culture-Suite-Brochure.pdf' => WP_CONTENT_DIR . '/uploads/2026/09/Security-Behaviour-Culture-Suite-Brochure.pdf',
		'SucceedLEARN_ESG_Brochure.pdf'                 => WP_CONTENT_DIR . '/uploads/2025/11/SucceedLEARN_ESG_Brochure.pdf',
	);

	if ( ! isset( $allowed[ $requested ] ) ) {
		return;
	}

	$file = $allowed[ $requested ];
	if ( ! is_readable( $file ) ) {
		wp_die( esc_html__( 'File not found.', 'succeedlearn-landing-bridge' ) );
	}

	nocache_headers();
	header( 'Content-Description: File Transfer' );
	header( 'Content-Type: application/octet-stream' );
	header( 'Content-Disposition: attachment; filename="' . basename( $file ) . '"' );
	header( 'Content-Transfer-Encoding: binary' );
	header( 'Content-Length: ' . (string) filesize( $file ) );

	// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_readfile
	readfile( $file );
	exit;
}
add_action( 'init', 'sl_landing_bridge_force_pdf_download', 1 );
