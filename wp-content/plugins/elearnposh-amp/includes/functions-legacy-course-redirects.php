<?php
/**
 * Legacy course URL fallbacks and 301 redirects.
 *
 * UI links use canonical helpers; old indexed paths redirect here.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Legacy path => resolver callback for canonical desktop URL.
 *
 * @return array<string, callable>
 */
function elearnposh_amp_get_legacy_course_redirect_rules() {
	return array(
		'posh-courses/posh-for-employees'                                   => 'elearnposh_amp_get_employees_page_url',
		'posh-for-employees'                                                => 'elearnposh_amp_get_employees_page_url',
		'posh-courses/posh-foundation-module'                               => 'elearnposh_amp_get_employees_page_url',
		'posh-foundation-module'                                            => 'elearnposh_amp_get_employees_page_url',
		'posh-foundation'                                                   => 'elearnposh_amp_get_employees_page_url',
		'prevention-of-sexual-harassments-posh-courses/posh-foundation'     => 'elearnposh_amp_get_employees_page_url',

		'posh-courses/posh-for-ic-members'                                  => 'elearnposh_amp_get_ic_members_page_url',
		'posh-for-ic-members'                                               => 'elearnposh_amp_get_ic_members_page_url',
		'prevention-of-sexual-harassments-posh-courses/posh-for-ic-members' => 'elearnposh_amp_get_ic_members_page_url',

		'posh-courses/posh-for-managers'                                    => 'elearnposh_amp_get_managers_page_url',
		'posh-for-managers'                                                 => 'elearnposh_amp_get_managers_page_url',
		'prevention-of-sexual-harassments-posh-courses/posh-for-managers'   => 'elearnposh_amp_get_managers_page_url',

		'posh-courses/pocso-prevention-of-child-sexual-abuse'                => 'elearnposh_amp_get_pocso_page_url',

		'posh-courses/posh-for-higher-educational-institutions'             => 'elearnposh_amp_get_hei_page_url',
		// Old capitalized marketing path (distinct from blog slug posh-in-higher-educational-institutions).
		'Posh-In-Higher-Educational-Institutions'                           => 'elearnposh_amp_get_hei_page_url',

		'posh-courses/posh-for-cms'                                         => 'elearnposh_amp_get_cms_page_url',
		'posh-for-cms'                                                      => 'elearnposh_amp_get_cms_page_url',

		'posh-courses/unconscious-bias'                                     => 'elearnposh_amp_get_unconscious_bias_page_url',

		'global-courses/equality-and-diversity'                             => 'elearnposh_amp_get_equality_diversity_page_url',
		'equality-and-diversity'                                            => 'elearnposh_amp_get_equality_diversity_page_url',
		'global-courses/us-posh'                                            => 'elearnposh_amp_get_sexual_harassment_us_page_url',
	);
}

/**
 * Extra SEO repair redirects (malformed links, not only legacy course paths).
 *
 * @param string $path Normalized request path (no leading/trailing slash).
 * @return string|null Absolute destination URL, or null.
 */
function elearnposh_amp_get_seo_repair_redirect_target( $path ) {
	$path = (string) $path;

	// Relative href="Indirect-Harassment" on the post resolves to this 404 path.
	if ( preg_match( '#(?:^|/)clarifying-indirect-harassment/Indirect-Harassment$#', $path ) ) {
		return home_url( '/clarifying-indirect-harassment/#Indirect-Harassment' );
	}

	return null;
}

/**
 * Strip a trailing /amp paired endpoint from a URL or path.
 *
 * @param string $url URL or path.
 * @return string
 */
function elearnposh_amp_strip_amp_endpoint( $url ) {
	$url = trim( (string) $url );
	if ( '' === $url || '#' === $url ) {
		return $url;
	}

	$parts = wp_parse_url( $url );
	if ( ! is_array( $parts ) ) {
		return preg_replace( '#/amp/?$#i', '/', $url );
	}

	$path = isset( $parts['path'] ) ? (string) $parts['path'] : '';
	$path = preg_replace( '#/amp/?$#i', '/', $path );
	if ( '' === $path ) {
		$path = '/';
	}

	$out = '';
	if ( ! empty( $parts['scheme'] ) && ! empty( $parts['host'] ) ) {
		$out  = $parts['scheme'] . '://' . $parts['host'];
		$out .= ! empty( $parts['port'] ) ? ':' . $parts['port'] : '';
	}
	$out .= user_trailingslashit( $path );

	if ( ! empty( $parts['query'] ) ) {
		parse_str( $parts['query'], $query_args );
		unset( $query_args['amp'] );
		if ( ! empty( $query_args ) ) {
			$out = add_query_arg( $query_args, $out );
		}
	}

	if ( ! empty( $parts['fragment'] ) ) {
		$out .= '#' . $parts['fragment'];
	}

	return $out;
}

/**
 * Normalize request path (no leading/trailing slash, strip /amp suffix).
 *
 * @param string $request_uri Request URI.
 * @return array{0:string,1:bool} Path and whether AMP was requested.
 */
function elearnposh_amp_normalize_legacy_request_path( $request_uri ) {
	$path   = trim( (string) wp_parse_url( $request_uri, PHP_URL_PATH ), '/' );
	$is_amp = false;

	if ( substr( $path, -4 ) === '/amp' ) {
		$path   = trim( substr( $path, 0, -4 ), '/' );
		$is_amp = true;
	}

	return array( $path, $is_amp );
}

/**
 * 301 redirect legacy course URLs (desktop and /amp/) to canonical pages.
 */
function elearnposh_amp_maybe_redirect_legacy_course_urls() {
	if ( is_admin() ) {
		return;
	}

	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	if ( '' === $request_uri ) {
		return;
	}

	list( $path, $is_amp ) = elearnposh_amp_normalize_legacy_request_path( $request_uri );
	$rules                 = elearnposh_amp_get_legacy_course_redirect_rules();

	$repair_target = elearnposh_amp_get_seo_repair_redirect_target( $path );
	if ( is_string( $repair_target ) && '' !== $repair_target ) {
		wp_safe_redirect( $repair_target, 301 );
		exit;
	}

	if ( ! isset( $rules[ $path ] ) || ! is_callable( $rules[ $path ] ) ) {
		return;
	}

	$target = call_user_func( $rules[ $path ] );
	if ( ! is_string( $target ) || '' === $target ) {
		return;
	}

	// Helpers often return AMP URLs already — normalize to canonical first.
	$target = elearnposh_amp_strip_amp_endpoint( $target );

	if ( $is_amp ) {
		$page = elearnposh_amp_resolve_page_by_path( $target );
		if ( $page ) {
			$target = elearnposh_amp_get_post_amp_url( $page->ID );
		} else {
			$target = trailingslashit( untrailingslashit( $target ) ) . 'amp/';
		}
	}

	$current_path = trim( (string) wp_parse_url( $request_uri, PHP_URL_PATH ), '/' );
	$target_path  = trim( (string) wp_parse_url( $target, PHP_URL_PATH ), '/' );

	if ( untrailingslashit( $target_path ) === untrailingslashit( $current_path ) ) {
		return;
	}

	wp_safe_redirect( $target, 301 );
	exit;
}
