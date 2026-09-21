<?php
/**
 * AMP Contact Form helpers and shortcode.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Unified contact forms are provided by erp-contact-us when active.
if ( defined( 'ELEARNPOSH_CONTACT_FORM_LOADED' ) ) {
	return;
}

/**
 * Resolve contact form title from raw shortcode attributes.
 *
 * @param array  $raw_atts      Attributes passed to the shortcode before defaults merge.
 * @param string $default_title Default title when the title attribute is omitted.
 * @return string
 */
function elearnposh_amp_resolve_contact_form_title( $raw_atts, $default_title ) {
	if ( ! is_array( $raw_atts ) ) {
		return $default_title;
	}

	if ( array_key_exists( 'title', $raw_atts ) ) {
		return (string) $raw_atts['title'];
	}

	return $default_title;
}

/**
 * Load contact-func-mail helpers (reCAPTCHA, rate limit, etc.) when available.
 *
 * @return void
 */
function elearnposh_amp_load_contact_mail_helpers() {
	if ( function_exists( 'elearnposh_recaptcha_amp_site_key' ) ) {
		return;
	}

	$mailsend = WP_PLUGIN_DIR . '/contact-func-mail/mailsend.php';
	if ( is_readable( $mailsend ) ) {
		require_once $mailsend;
	}
}

/**
 * Render the AMP contact form partial.
 *
 * @param array $args Partial arguments (see templates/partials/contact-form.php).
 * @return string HTML output.
 */
function elearnposh_amp_render_contact_form( $args = array() ) {
	elearnposh_amp_load_contact_mail_helpers();

	$partial = ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/contact-form.php';
	if ( ! is_readable( $partial ) ) {
		return '';
	}

	ob_start();
	include $partial;
	return ob_get_clean();
}

/**
 * Desktop-matching form title shown above the AMP form (not inside the partial).
 *
 * @param string $context home|contact|posh-act|she-box
 */
function elearnposh_amp_render_contact_form_title_bar( $context = 'home' ) {
	$context = sanitize_key( $context );

	switch ( $context ) {
		case 'contact':
			printf(
				'<h2 class="test-headline m-0 section-main-heading ep-amp-form-title">%s</h2>',
				esc_html__( 'Contact Us', 'elearnposh-amp' )
			);
			break;
		case 'posh-act':
			?>
			<h2 class="posh-act-form-title ep-amp-form-title">
				<span class="posh-act-form-title__lead"><?php esc_html_e( 'Get in Touch', 'elearnposh-amp' ); ?></span>
				<span class="posh-act-form-title__sub"><?php esc_html_e( 'for PoSH Training Implementation', 'elearnposh-amp' ); ?></span>
			</h2>
			<?php
			break;
		case 'she-box':
			printf(
				'<h2 class="she-box-form-title ep-amp-form-title">%s</h2>',
				esc_html__( 'Get in Touch for PoSH Training & SHe-Box Support', 'elearnposh-amp' )
			);
			break;
		case 'home':
		default:
			printf(
				'<h2 class="test-headline m-0 section-main-heading ep-amp-form-title">%s</h2>',
				esc_html__( 'Book a Demo', 'elearnposh-amp' )
			);
			break;
	}
}

/**
 * Compact AMP contact form for guide pages (POSH Act, SHe-Box sidebars and mobile blocks).
 *
 * @param string $page_source Tracking label for ERP/admin email.
 * @param string $form_id     Unique form element ID prefix.
 * @param string $context     Title context: posh-act|she-box.
 * @return string
 */
function elearnposh_amp_render_guide_contact_form( $page_source, $form_id, $context = 'posh-act' ) {
	ob_start();
	echo '<div class="pa-guide-form-card">';
	elearnposh_amp_render_contact_form_title_bar( $context );
	echo '<div class="pa-guide-form-body">';
	echo elearnposh_amp_render_contact_form(
		array(
			'form_id'     => sanitize_key( $form_id ),
			'compact'     => true,
			'title'       => '',
			'description' => '',
			'desktop_ui'  => true,
			'page_source' => sanitize_text_field( $page_source ),
		)
	);
	echo '</div></div>';

	return ob_get_clean();
}

/**
 * Mobile-only contact block for long-form guide AMP pages.
 *
 * @param string $page_source Tracking label for ERP/admin email.
 * @param string $form_id     Unique form element ID prefix.
 * @param string $context     Title context: posh-act|she-box.
 * @return string
 */
function elearnposh_amp_render_guide_mobile_contact_section( $page_source, $form_id, $context = 'posh-act' ) {
	$form_html = elearnposh_amp_render_guide_contact_form( $page_source, $form_id, $context );
	if ( '' === trim( $form_html ) ) {
		return '';
	}

	return sprintf(
		'<section class="pa-guide-contact-mobile" id="pa-guide-contact-mobile" aria-label="%1$s">%2$s</section>',
		esc_attr__( 'Contact form', 'elearnposh-amp' ),
		$form_html
	);
}

/**
 * Render the desktop contact form partial.
 *
 * Archived: desktop unified markup moved to
 * wp-content/backups/unified-desktop-forms-unused/. Desktop uses old ERP shortcodes.
 *
 * @param array $args Partial arguments (unused).
 * @return string Empty string — desktop unified form is disabled.
 */
function elearnposh_amp_render_desktop_contact_form( $args = array() ) {
	return '';
}

/**
 * Get shared contact form CSS for desktop enqueue.
 *
 * @return string
 */
function elearnposh_amp_get_contact_form_css() {
	static $css = null;

	if ( null !== $css ) {
		return $css;
	}

	$style_file = ELEARNPOSH_AMP_TEMPLATES_DIR . 'styles/contact-form.php';
	if ( ! is_readable( $style_file ) ) {
		$css = '';
		return $css;
	}

	ob_start();
	include $style_file;
	$css  = ob_get_clean();
	$css .= '
.bg-forms .epcf-wrap,
.contact .epcf-wrap--desktop {
	max-width: 100%;
	padding: 0;
}
#demo > .epcf-wrap--desktop {
	max-width: 100%;
}
.contact #demo:has(> .test-headline) > .epcf-wrap--desktop,
.contact .ep-home-contact-form:has(> .test-headline) > .epcf-wrap--desktop,
#demo.ep-contact-conversion__form:has(> .test-headline) > .epcf-wrap--desktop {
	padding: 20px;
}
.contact #demo:has(> .test-headline) .epcf-form--desktop,
.contact .ep-home-contact-form:has(> .test-headline) .epcf-form--desktop,
#demo.ep-contact-conversion__form:has(> .test-headline) .epcf-form--desktop {
	padding: 0;
}
.contact #demo:has(> .test-headline) .epcf-hero,
.contact .ep-home-contact-form:has(> .test-headline) .epcf-hero,
.ep-contact-conversion__form:has(> .test-headline) .epcf-hero {
	display: none;
}
.bg-forms,
#demo .bg-forms {
	text-align: left;
}
.epcf-wrap--desktop .epcf-card,
.bg-forms .epcf-card,
#demo .epcf-card {
	background: transparent;
	border: none;
	border-radius: 0;
	padding: 0;
	box-shadow: none;
}
.epcf-wrap--desktop .epcf-form,
.bg-forms .epcf-form--desktop,
#demo .epcf-form--desktop {
	gap: 8px;
}
.epcf-wrap--desktop .epcf-fields,
.bg-forms .epcf-fields,
#demo .epcf-fields {
	display: flex;
	flex-direction: column;
	gap: 8px;
}
.epcf-wrap--desktop .epcf-field,
.bg-forms .epcf-field,
#demo .epcf-field {
	gap: 4px;
	margin: 0 0 8px;
}
.epcf-wrap--desktop .epcf-hero h3,
.bg-forms .epcf-hero h3,
#demo .epcf-hero h3 {
	color: #002a38;
	font-size: 1.25rem;
	font-weight: 700;
	line-height: 1.3;
	margin: 0 0 12px;
	text-align: left;
}
.epcf-wrap--desktop .epcf-hero,
.bg-forms .epcf-hero,
#demo .epcf-hero {
	margin-bottom: 12px;
	text-align: left;
}
.epcf-wrap--desktop .epcf-label,
.bg-forms .epcf-label,
#demo .epcf-label {
	margin: 0 !important;
	padding: 0;
	line-height: 1.2;
}
.epcf-wrap--desktop .epcf-input,
.epcf-wrap--desktop .epcf-textarea,
.bg-forms .epcf-input,
.bg-forms .epcf-textarea,
#demo .epcf-input,
#demo .epcf-textarea {
	min-height: 38px;
	padding: 7px 12px;
	font-size: 14px;
}
.epcf-wrap--desktop .epcf-textarea,
.bg-forms .epcf-textarea,
#demo .epcf-textarea {
	min-height: 72px;
}
.epcf-wrap--desktop .epcf-checks,
.bg-forms .epcf-checks,
#demo .epcf-checks {
	gap: 8px;
	margin-top: 0;
}
.epcf-wrap--desktop .epcf-submit-wrap,
.bg-forms .epcf-submit-wrap,
#demo .epcf-submit-wrap {
	margin-top: 2px;
	text-align: left;
}
.epcf-wrap--desktop .epcf-submit,
.bg-forms .epcf-submit,
#demo .epcf-submit {
	background: #002a38;
	background-image: none;
	border-radius: 8px;
	box-shadow: none;
	min-width: 140px;
	padding: 10px 28px;
	font-weight: 700;
	text-transform: none;
	letter-spacing: 0.02em;
}
.epcf-wrap--desktop .epcf-submit:hover,
.bg-forms .epcf-submit:hover,
#demo .epcf-submit:hover {
	background: #123456;
	border-radius: 8px;
	box-shadow: none;
}
.epcf-wrap--desktop .epcf-submit[disabled],
.epcf-wrap--desktop .epcf-submit[disabled]:hover,
.bg-forms .epcf-submit[disabled],
.bg-forms .epcf-submit[disabled]:hover,
#demo .epcf-submit[disabled],
#demo .epcf-submit[disabled]:hover {
	background: #002a38;
	border-radius: 8px;
	opacity: 0.7;
	box-shadow: none;
}
';

	return $css;
}

/**
 * Enqueue desktop contact form assets once.
 *
 * No-op: desktop unified assets archived to
 * wp-content/backups/unified-desktop-forms-unused/.
 */
function elearnposh_amp_enqueue_desktop_contact_form_assets() {
}

/**
 * Shortcode: [elearnposh_amp_contact_form]
 *
 * Attributes:
 * - title, description, show_highlights (yes/no), heading_tag (h1/h2), form_id
 *
 * @param array $atts Shortcode attributes.
 * @return string
 */
function elearnposh_amp_contact_form_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'title'           => __( 'Book Your Personalized Demo', 'elearnposh-amp' ),
			'description'     => __( 'Our team is happy to show you how we can simplify your POSH Compliance. Fill out the form and we\'ll be in touch as soon as possible.', 'elearnposh-amp' ),
			'show_highlights' => 'no',
			'heading_tag'     => 'h2',
			'form_id'         => 'epcf-sc',
			'compact'         => 'no',
		),
		$atts,
		'elearnposh_amp_contact_form'
	);

	return elearnposh_amp_render_contact_form(
		array(
			'title'           => $atts['title'],
			'description'     => $atts['description'],
			'show_highlights' => ( 'yes' === strtolower( $atts['show_highlights'] ) ),
			'heading_tag'     => $atts['heading_tag'],
			'form_id'         => sanitize_key( $atts['form_id'] ),
			'compact'         => ( 'yes' === strtolower( $atts['compact'] ) ),
		)
	);
}
add_shortcode( 'elearnposh_amp_contact_form', 'elearnposh_amp_contact_form_shortcode' );

/**
 * Shortcode: [contact_form] — desktop homepage form with AMP-matching UI.
 *
 * @param array $atts Shortcode attributes.
 * @return string
 */
function elearnposh_amp_desktop_contact_form_shortcode( $atts ) {
	$raw_atts = is_array( $atts ) ? $atts : array();
	$atts     = shortcode_atts(
		array(
			'title'           => '',
			'description'     => '',
			'show_highlights' => 'no',
			'heading_tag'     => 'h3',
			'form_id'         => 'epcf-home-desktop',
			'compact'         => 'no',
			'page_source'     => __( 'Desktop Home Page', 'elearnposh-amp' ),
		),
		$atts,
		'contact_form'
	);

	return elearnposh_amp_render_desktop_contact_form(
		array(
			'title'           => elearnposh_amp_resolve_contact_form_title( $raw_atts, '' ),
			'description'     => $atts['description'],
			'show_highlights' => ( 'yes' === strtolower( $atts['show_highlights'] ) ),
			'heading_tag'     => $atts['heading_tag'],
			'form_id'         => sanitize_key( $atts['form_id'] ),
			'compact'         => ( 'yes' === strtolower( $atts['compact'] ) ),
			'page_source'     => $atts['page_source'],
		)
	);
}

/**
 * Replace legacy homepage contact form shortcode with the new desktop UI.
 *
 * Disabled: desktop unified shortcodes archived; old ERP shortcodes + MU plugin own
 * [contact_form] / [erp_contact_page_form].
 */
function elearnposh_amp_register_desktop_contact_form_shortcode() {
	// Intentionally empty — do not rebind legacy shortcodes.
}
// Registration removed so AMP never hijacks [contact_form] / [erp_contact_page_form].
// add_action( 'init', 'elearnposh_amp_register_desktop_contact_form_shortcode', 100 );

/**
 * Shortcode: [erp_contact_page_form] — desktop contact page form.
 *
 * @param array $atts Shortcode attributes.
 * @return string
 */
function elearnposh_amp_contact_page_desktop_shortcode( $atts ) {
	$raw_atts = is_array( $atts ) ? $atts : array();
	$atts     = shortcode_atts(
		array(
			'title'           => __( 'Contact Us', 'elearnposh-amp' ),
			'description'     => '',
			'show_highlights' => 'no',
			'heading_tag'     => 'h3',
			'form_id'         => 'epcf-page-desktop',
			'compact'         => 'no',
			'page_source'     => __( 'Contact Us Page', 'elearnposh-amp' ),
		),
		$atts,
		'erp_contact_page_form'
	);

	return elearnposh_amp_render_desktop_contact_form(
		array(
			'title'           => elearnposh_amp_resolve_contact_form_title( $raw_atts, __( 'Contact Us', 'elearnposh-amp' ) ),
			'description'     => $atts['description'],
			'show_highlights' => ( 'yes' === strtolower( $atts['show_highlights'] ) ),
			'heading_tag'     => $atts['heading_tag'],
			'form_id'         => sanitize_key( $atts['form_id'] ),
			'compact'         => ( 'yes' === strtolower( $atts['compact'] ) ),
			'page_source'     => $atts['page_source'],
		)
	);
}

/**
 * Infer a readable traffic source label from a referrer URL.
 *
 * @param string $referrer Referrer URL or "direct".
 * @return string
 */
function elearnposh_amp_infer_source_from_referrer( $referrer ) {
	$referrer = trim( (string) $referrer );

	if ( '' === $referrer || 'direct' === strtolower( $referrer ) ) {
		return 'direct';
	}

	$host = wp_parse_url( $referrer, PHP_URL_HOST );
	if ( ! $host ) {
		return 'direct';
	}

	$host = strtolower( preg_replace( '/^www\./', '', $host ) );

	if ( in_array( $host, array( 'localhost', '127.0.0.1' ), true ) ) {
		return 'direct';
	}

	// Google AMP Cache (e.g. elearnposh-com.cdn.ampproject.org).
	if ( false !== strpos( $host, 'cdn.ampproject.org' ) || false !== strpos( $host, 'ampproject.org' ) ) {
		return 'google-amp';
	}

	if ( false !== strpos( $host, 'google.' ) ) {
		return 'google';
	}
	if ( false !== strpos( $host, 'youtube.' ) || 'youtu.be' === $host ) {
		return 'youtube';
	}
	if ( false !== strpos( $host, 'facebook.' ) || 'fb.com' === $host ) {
		return 'facebook';
	}
	if ( false !== strpos( $host, 'linkedin.' ) ) {
		return 'linkedin';
	}
	if ( false !== strpos( $host, 'bing.' ) ) {
		return 'bing';
	}
	if ( false !== strpos( $host, 'instagram.' ) ) {
		return 'instagram';
	}

	return $host;
}

/**
 * Read a tracking cookie value from the current request.
 *
 * @param string $name Cookie name without prefix.
 * @return string
 */
function elearnposh_amp_read_tracking_cookie( $name ) {
	$keys = array( $name, '_uc_' . $name );

	foreach ( $keys as $key ) {
		if ( empty( $_COOKIE[ $key ] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			continue;
		}

		$value = sanitize_text_field( wp_unslash( $_COOKIE[ $key ] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		if ( '' !== $value ) {
			return $value;
		}
	}

	return '';
}

/**
 * Resolve traffic source (utm_source) for contact form submissions.
 *
 * Priority: explicit POST fields, UTM Tracker fields/cookies, referrer, then "direct".
 *
 * @param array $data Form data.
 * @return string
 */
function elearnposh_amp_resolve_traffic_source( $data = array() ) {
	$candidates = array();

	if ( ! empty( $data['utm_source'] ) ) {
		$candidates[] = sanitize_text_field( $data['utm_source'] );
	}

	if ( ! empty( $data['USOURCE'] ) ) {
		$candidates[] = sanitize_text_field( $data['USOURCE'] );
	}

	if ( ! empty( $data['IUSOURCE'] ) ) {
		$candidates[] = sanitize_text_field( $data['IUSOURCE'] );
	}

	if ( ! empty( $data['utm'] ) ) {
		$utm_raw = $data['utm'];
		$decoded = json_decode( stripslashes( $utm_raw ), true );
		if ( JSON_ERROR_NONE === json_last_error() && is_array( $decoded ) && ! empty( $decoded['utm_source'] ) ) {
			$candidates[] = sanitize_text_field( $decoded['utm_source'] );
		} else {
			$candidates[] = sanitize_text_field( $utm_raw );
		}
	}

	$candidates[] = elearnposh_amp_read_tracking_cookie( 'utm_source' );

	if ( ! empty( $data['gclid'] ) || '' !== elearnposh_amp_read_tracking_cookie( 'gclid' ) ) {
		$candidates[] = 'google';
	}

	foreach ( $candidates as $candidate ) {
		if ( '' !== $candidate ) {
			return elearnposh_amp_normalize_utm_source_label( $candidate );
		}
	}

	$referrers = array();
	if ( ! empty( $data['LREFERRER'] ) ) {
		$referrers[] = $data['LREFERRER'];
	}
	if ( ! empty( $data['IREFERRER'] ) ) {
		$referrers[] = $data['IREFERRER'];
	}
	$referrers[] = elearnposh_amp_read_tracking_cookie( 'last_referrer' );
	$referrers[] = elearnposh_amp_read_tracking_cookie( 'referrer' );

	if ( ! empty( $_SERVER['HTTP_REFERER'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$referrers[] = esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}

	foreach ( $referrers as $referrer ) {
		$source = elearnposh_amp_infer_source_from_referrer( $referrer );
		if ( 'direct' !== $source ) {
			return elearnposh_amp_normalize_utm_source_label( $source );
		}
	}

	return 'direct';
}

/**
 * Normalize known CDN / viewer hosts into admin-readable utm_source labels.
 *
 * @param string $source Raw traffic source.
 * @return string
 */
function elearnposh_amp_normalize_utm_source_label( $source ) {
	$source = sanitize_text_field( (string) $source );
	if ( '' === $source ) {
		return '';
	}

	$lower = strtolower( $source );
	if ( false !== strpos( $lower, 'cdn.ampproject.org' ) || false !== strpos( $lower, 'ampproject.org' ) ) {
		return 'google-amp';
	}

	return $source;
}

/**
 * Extract UTM source from form submission data.
 *
 * @param array $data Form data.
 * @return string
 */
function elearnposh_amp_extract_utm( $data ) {
	return elearnposh_amp_resolve_traffic_source( $data );
}

/**
 * Current page URL for contact form hidden field prefill.
 *
 * @return string
 */
function elearnposh_amp_current_page_url() {
	if ( is_singular() ) {
		$post_id = get_queried_object_id();
		if ( $post_id && function_exists( 'elearnposh_amp_get_post_amp_url' ) ) {
			$amp_url = elearnposh_amp_get_post_amp_url( $post_id );
			if ( $amp_url ) {
				return $amp_url;
			}
		}

		return (string) get_permalink();
	}

	global $wp;
	if ( isset( $wp->request ) && '' !== $wp->request ) {
		return trailingslashit( home_url( '/' . $wp->request ) );
	}

	if ( ! empty( $_SERVER['HTTP_HOST'] ) && ! empty( $_SERVER['REQUEST_URI'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$scheme = is_ssl() ? 'https' : 'http';
		$host   = sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$uri    = wp_unslash( $_SERVER['REQUEST_URI'] ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$uri    = strtok( $uri, '#' );

		return esc_url_raw( $scheme . '://' . $host . $uri );
	}

	return home_url( '/' );
}

/**
 * Extract submitted page URL from form data.
 *
 * @param array $data Form data.
 * @return string
 */
function elearnposh_amp_extract_form_page_url( $data ) {
	if ( ! empty( $data['form_page_url'] ) ) {
		return esc_url_raw( $data['form_page_url'] );
	}

	if ( ! empty( $_SERVER['HTTP_REFERER'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$referer = esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		if ( 0 === strpos( $referer, home_url() ) ) {
			return $referer;
		}
	}

	return '';
}

/**
 * Default human-readable page name for contact form source tracking.
 *
 * @param string $form_title Optional form section title.
 * @return string
 */
function elearnposh_amp_default_form_page_source( $form_title = '' ) {
	if ( $form_title ) {
		return sanitize_text_field( $form_title );
	}

	if ( is_front_page() ) {
		return __( 'Home Page', 'elearnposh-amp' );
	}

	$page_title = get_the_title();
	if ( $page_title ) {
		return sanitize_text_field( $page_title );
	}

	return __( 'Website', 'elearnposh-amp' );
}

/**
 * Extract submitted page/source label from form data.
 *
 * @param array $data Form data.
 * @return string
 */
function elearnposh_amp_extract_form_page( $data ) {
	if ( ! empty( $data['form_page'] ) ) {
		return sanitize_text_field( $data['form_page'] );
	}

	if ( ! empty( $data['page'] ) ) {
		return sanitize_text_field( $data['page'] );
	}

	return elearnposh_amp_default_form_page_source();
}

/**
 * Contact page key points (theme data with plugin fallback).
 *
 * @return array<int, string>
 */
function elearnposh_amp_get_contact_key_points() {
	static $cached = null;

	if ( null !== $cached ) {
		return $cached;
	}

	$ep_contact_key_points = array();
	$ep_contact_highlights = array();

	$theme_data = get_stylesheet_directory() . '/partials/contact-page-data.php';
	if ( is_readable( $theme_data ) ) {
		require $theme_data;
	}

	if ( ! empty( $ep_contact_key_points ) ) {
		$cached = array_values( array_filter( array_map( 'strval', $ep_contact_key_points ) ) );
		if ( function_exists( 'elearnposh_capitalize_key_point' ) ) {
			$cached = array_map( 'elearnposh_capitalize_key_point', $cached );
		}
		return $cached;
	}

	if ( ! empty( $ep_contact_highlights ) ) {
		$cached = array_values( array_filter( array_map( 'strval', $ep_contact_highlights ) ) );
		if ( function_exists( 'elearnposh_capitalize_key_point' ) ) {
			$cached = array_map( 'elearnposh_capitalize_key_point', $cached );
		}
		return $cached;
	}

	$cached = array(
		'POSH Courses available in English & 8 regional languages including Hindi, Marathi, Kannada, Tamil, Malayalam, Telugu, Bengali and Gujarati.',
		'More than 450,000 POSH Aware users',
		'Legally curated role-based courses',
		'Extremely Cost-effective',
		'Fully customizable courses',
		'Flexible delivery options (SCORM and SaaS with SSO and SAML authentication).',
	);

	if ( function_exists( 'elearnposh_capitalize_key_point' ) ) {
		$cached = array_map( 'elearnposh_capitalize_key_point', $cached );
	}

	return $cached;
}

/**
 * Render contact page highlights block for AMP.
 *
 * @return string
 */
function elearnposh_amp_render_contact_highlights() {
	$ep_contact_key_points = elearnposh_amp_get_contact_key_points();
	if ( empty( $ep_contact_key_points ) ) {
		return '';
	}

	$partial = ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/contact-page-highlights.php';
	if ( ! is_readable( $partial ) ) {
		return '';
	}

	ob_start();
	include $partial;
	return ob_get_clean();
}

/**
 * Output contact highlights CSS inline (avoids stale optimizer cache).
 */
function elearnposh_amp_output_contact_highlights_css() {
	$style_file = ELEARNPOSH_AMP_TEMPLATES_DIR . 'styles/contact-highlights.php';
	if ( ! is_readable( $style_file ) ) {
		return;
	}

	ob_start();
	include $style_file;
	$css = ob_get_clean();
	$css = preg_replace( '/<\?php.*?\?>/s', '', $css );
	echo $css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
