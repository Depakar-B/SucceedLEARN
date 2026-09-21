<?php
/*
Plugin Name: SucceedLearn AMP Custom
Plugin URI: https://succeedlearn.com/
Description: Custom AMP theme for SucceedLearn based on AMPforWP structure.
Version: 1.9.13
Author: SucceedLearn Dev Team
Author URI: https://succeedlearn.com/
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: succeedlearn-amp-custom
Domain Path: /languages
Requires at least: 6.0
Requires PHP: 7.4
Tested up to: 6.8
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;


add_filter('ampforwp_cpt_support', function($post_types) {
    $post_types[] = 'page';
    $post_types[] = 'lp_course';
    return array_unique($post_types);
});


// Plugin constants
if ( ! defined( 'SUCCEEDLEARN_AMP_VERSION' ) ) {
    define( 'SUCCEEDLEARN_AMP_VERSION', '1.9.13' );
}
if ( ! defined( 'SUCCEEDLEARN_AMP_PATH' ) ) {
    define( 'SUCCEEDLEARN_AMP_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'SUCCEEDLEARN_AMP_URL' ) ) {
    define( 'SUCCEEDLEARN_AMP_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'AMPFORWP_CUSTOM_THEME' ) ) {
    define( 'AMPFORWP_CUSTOM_THEME', true );
}

/**
 * Live Infosec SEO path (US default for legacy redirects).
 *
 * @return string
 */
function succeedlearn_amp_infosec_seo_path() {
	return 'infosec-cybersecurity-awareness-us';
}

/**
 * Live Infosec UK SEO path.
 *
 * @return string
 */
function succeedlearn_amp_infosec_uk_seo_path() {
	return 'infosec-cybersecurity-awareness-uk';
}

/**
 * Whether a page post is the Infosec campaign landing (US or UK).
 *
 * @param WP_Post|null $post Page post.
 * @return bool
 */
function succeedlearn_amp_is_infosec_page( $post ) {
	if ( ! ( $post instanceof WP_Post ) || 'page' !== $post->post_type ) {
		return false;
	}

	$tpl = (string) get_page_template_slug( $post->ID );
	if (
		'page-templates/infosec-2026-cyber.php' === $tpl
		|| 'page-templates/infosec-2026-cyber-uk.php' === $tpl
	) {
		return true;
	}

	$slug = (string) $post->post_name;
	$legacy = array(
		'cybersecurity-awareness',
		'infosec-cybersecurity-awareness',
		'infosec-cybersecurity-awareness-us',
		'infosec-cybersecurity-awareness-uk',
		'infosec-cybersecurity-awareness-month-2026',
		'infosec-2026-cyber',
		'infosec-2026',
	);
	if ( in_array( $slug, $legacy, true ) ) {
		return true;
	}

	// Nested SEO URL alias: /infosec-cybersecurity-awareness/us|uk/
	if ( in_array( $slug, array( 'us', 'uk' ), true ) && (int) $post->post_parent > 0 ) {
		$parent = get_post( (int) $post->post_parent );
		if ( $parent instanceof WP_Post && 'infosec-cybersecurity-awareness' === $parent->post_name ) {
			return true;
		}
	}

	return false;
}

/**
 * Whether a page post is the Infosec UK landing.
 *
 * @param WP_Post|null $post Page post.
 * @return bool
 */
function succeedlearn_amp_is_infosec_uk_page( $post ) {
	if ( ! ( $post instanceof WP_Post ) || 'page' !== $post->post_type ) {
		return false;
	}

	$tpl = (string) get_page_template_slug( $post->ID );
	if ( 'page-templates/infosec-2026-cyber-uk.php' === $tpl ) {
		return true;
	}

	$slug = (string) $post->post_name;
	if ( 'infosec-cybersecurity-awareness-uk' === $slug ) {
		return true;
	}

	if ( 'uk' === $slug && (int) $post->post_parent > 0 ) {
		$parent = get_post( (int) $post->post_parent );
		if ( $parent instanceof WP_Post && 'infosec-cybersecurity-awareness' === $parent->post_name ) {
			return true;
		}
	}

	// Request-path fallback (flat or nested SEO URL).
	if ( ! empty( $_SERVER['REQUEST_URI'] ) ) {
		$path  = trim( (string) wp_parse_url( (string) wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ), '/' );
		$parts = '' === $path ? array() : explode( '/', $path );
		if ( isset( $parts[0] ) && 'infosec-cybersecurity-awareness-uk' === (string) $parts[0] ) {
			return true;
		}
		if (
			isset( $parts[0], $parts[1] )
			&& 'infosec-cybersecurity-awareness' === (string) $parts[0]
			&& 'uk' === (string) $parts[1]
		) {
			return true;
		}
	}

	return false;
}

/**
 * Redirect retired Infosec alias URLs to the live SEO slug.
 * /cybersecurity-awareness/ no longer exists on live and AMP shows a blank 404.
 */
add_action(
	'template_redirect',
	static function () {
		if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			return;
		}
		if ( ( $_SERVER['REQUEST_METHOD'] ?? 'GET' ) !== 'GET' ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			return;
		}

		$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		$path        = trim( (string) wp_parse_url( $request_uri, PHP_URL_PATH ), '/' );
		$home_path   = trim( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ), '/' );
		if ( '' !== $home_path && 0 === strpos( $path, $home_path . '/' ) ) {
			$path = substr( $path, strlen( $home_path ) + 1 );
		} elseif ( $path === $home_path ) {
			$path = '';
		}
		$path  = trim( (string) $path, '/' );
		$parts = '' === $path ? array() : explode( '/', $path );
		$slug  = isset( $parts[0] ) ? (string) $parts[0] : '';
		if ( isset( $parts[1] ) && 'amp' === $parts[1] ) {
			// Keep slug as $parts[0]; amp path style is handled below via query.
		}

		$legacy_infosec_slugs = array(
			'cybersecurity-awareness',
			'infosec-cybersecurity-awareness-month-2026',
			'infosec-2026-cyber',
			'infosec-2026',
		);
		$infosec_seo_us = succeedlearn_amp_infosec_seo_path();
		$infosec_seo_uk = succeedlearn_amp_infosec_uk_seo_path();

		$build_infosec_redirect = static function ( $seo_path ) use ( $request_uri, $parts ) {
			$target = home_url( '/' . $seo_path . '/' );
			$args   = array();
			$query  = (string) wp_parse_url( $request_uri, PHP_URL_QUERY );
			if ( $query ) {
				parse_str( $query, $args );
			}
			if ( isset( $parts[1] ) && 'amp' === $parts[1] && empty( $args['amp'] ) ) {
				$args['amp'] = '1';
			}
			if ( isset( $parts[2] ) && 'amp' === $parts[2] && empty( $args['amp'] ) ) {
				$args['amp'] = '1';
			}
			return $args ? add_query_arg( $args, $target ) : $target;
		};

		// Nested /infosec-cybersecurity-awareness/us|uk/ → flat live SEO URLs.
		if (
			'infosec-cybersecurity-awareness' === $slug
			&& isset( $parts[1] )
			&& in_array( (string) $parts[1], array( 'us', 'uk' ), true )
		) {
			$nested_target = ( 'uk' === (string) $parts[1] ) ? $infosec_seo_uk : $infosec_seo_us;
			$existing_flat = get_page_by_path( $nested_target );
			if ( $existing_flat instanceof WP_Post && 'publish' === $existing_flat->post_status ) {
				wp_safe_redirect( $build_infosec_redirect( $nested_target ), 301 );
				exit;
			}
		}

		// Former single Infosec slug → flat US SEO URL when US page exists.
		if ( 'infosec-cybersecurity-awareness' === $slug && ( ! isset( $parts[1] ) || 'amp' === (string) $parts[1] ) ) {
			$existing_us = get_page_by_path( $infosec_seo_us );
			if ( $existing_us instanceof WP_Post && 'publish' === $existing_us->post_status ) {
				wp_safe_redirect( $build_infosec_redirect( $infosec_seo_us ), 301 );
				exit;
			}
		}

		if ( '' === $slug || ! in_array( $slug, $legacy_infosec_slugs, true ) ) {
			return;
		}

		// If an alias page is still published, leave it alone (AMP slug router can serve it).
		$existing = get_page_by_path( $slug );
		if ( $existing instanceof WP_Post && 'publish' === $existing->post_status ) {
			return;
		}

		wp_safe_redirect( $build_infosec_redirect( $infosec_seo_us ), 301 );
		exit;
	},
	0
);

/**
 * Normalize bare ?amp (empty value) and homepage /amp/ to ?amp=1 so AMPforWP engages.
 * Live amphtml links advertise ?amp, but AMPforWP only treats amp=1 as AMP.
 */
add_action(
	'template_redirect',
	static function () {
		if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			return;
		}

		$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		$path        = (string) wp_parse_url( $request_uri, PHP_URL_PATH );
		$query       = (string) wp_parse_url( $request_uri, PHP_URL_QUERY );
		$home_path   = trailingslashit( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ) );
		$amp_path    = trailingslashit( $home_path . 'amp' );

		$needs_amp1       = false;
		$is_home_amp_path = ( trailingslashit( $path ) === $amp_path );

		// Bare ?amp or ?amp= (AMPforWP only treats amp=1 as AMP).
		if ( isset( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$amp_val = wp_unslash( $_GET['amp'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( '' === $amp_val || 'true' === $amp_val || 'yes' === $amp_val ) {
				$needs_amp1 = true;
			}
		}

		// Legacy homepage /amp/ endpoint.
		if ( $is_home_amp_path ) {
			$needs_amp1 = true;
		}

		if ( ! $needs_amp1 ) {
			return;
		}

		// Already correct.
		if ( isset( $_GET['amp'] ) && '1' === (string) wp_unslash( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		// Keep the current page (e.g. /us-cyber-aware-october/?amp → ?amp=1).
		$target = $is_home_amp_path ? home_url( '/' ) : home_url( $path ? $path : '/' );
		$args   = array();
		if ( $query ) {
			parse_str( $query, $args );
		}
		$args['amp'] = '1';
		unset( $args['noamp'] );

		wp_safe_redirect( add_query_arg( $args, $target ), 302 );
		exit;
	},
	0
);

/**
 * Prefer amp=1 in advertised amphtml URLs (matches AMPforWP endpoint detection).
 */
add_filter(
	'ampforwp_modify_rel_canonical',
	static function ( $amp_url ) {
		if ( ! is_string( $amp_url ) || '' === $amp_url ) {
			return $amp_url;
		}
		$parts = wp_parse_url( $amp_url );
		$query = array();
		if ( ! empty( $parts['query'] ) ) {
			parse_str( $parts['query'], $query );
		}
		if ( isset( $query['amp'] ) && '1' !== (string) $query['amp'] ) {
			$query['amp'] = '1';
			$base         = ( isset( $parts['scheme'] ) ? $parts['scheme'] . '://' : '' )
				. ( isset( $parts['host'] ) ? $parts['host'] : '' )
				. ( isset( $parts['path'] ) ? $parts['path'] : '' );
			return add_query_arg( $query, $base ? $base : $amp_url );
		}
		// Bare ?amp with empty value often serializes without =1.
		if ( false !== strpos( $amp_url, '?amp' ) && false === strpos( $amp_url, 'amp=1' ) ) {
			return add_query_arg( 'amp', '1', remove_query_arg( 'amp', $amp_url ) );
		}
		return $amp_url;
	},
	20
);

/**
 * Force AMP on mobile/tablet for Cyber + Infosec campaign pages only.
 * Desktop URLs stay desktop; ?noamp=1 keeps desktop on mobile.
 */
add_action(
	'template_redirect',
	static function () {
		if ( is_admin() || is_preview() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			return;
		}
		if ( ( $_SERVER['REQUEST_METHOD'] ?? 'GET' ) !== 'GET' ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			return;
		}
		if ( isset( $_GET['noamp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return;
		}
		// Already on an AMP query (including bare ?amp handled by earlier redirect).
		if ( isset( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		$slug = '';
		$post = null;
		if ( is_singular( 'page' ) ) {
			$post = get_queried_object();
			if ( $post && ! empty( $post->post_name ) ) {
				$slug = (string) $post->post_name;
			}
		}
		if ( '' === $slug ) {
			$path = (string) wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '', PHP_URL_PATH );
			$slug = trim( basename( untrailingslashit( $path ) ) );
		}

		$force_amp_slugs = array(
			'us-cyber-aware-october',
			'uk-cyber-aware-october',
			'cybersecurity-awareness',
			'infosec-cybersecurity-awareness-month-2026',
			'infosec-cybersecurity-awareness',
			'infosec-cybersecurity-awareness-us',
			'infosec-cybersecurity-awareness-uk',
			'infosec-2026-cyber',
			'infosec-2026',
			'security-awareness',
			'security-awareness-and-phishing',
			'code-of-conduct',
			'code-of-conduct-elearning-training',
		);
		$is_force = in_array( $slug, $force_amp_slugs, true )
			|| ( $post instanceof WP_Post && function_exists( 'succeedlearn_amp_is_infosec_page' ) && succeedlearn_amp_is_infosec_page( $post ) );
		if ( ! $is_force ) {
			return;
		}

		$ua = isset( $_SERVER['HTTP_USER_AGENT'] ) ? (string) wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) : '';
		$is_phone_or_tablet = false;
		if ( function_exists( 'wp_is_mobile' ) && wp_is_mobile() ) {
			$is_phone_or_tablet = true;
		} elseif ( $ua ) {
			// Cover tablets WP sometimes misses (esp. modern iPad desktop UA).
			$is_phone_or_tablet = (bool) preg_match(
				'/(android(?!.*mobile)|ipad|tablet|kindle|silk|playbook|nexus\s?(7|9|10)|sm-t|tab)/i',
				$ua
			);
		}
		if ( ! $is_phone_or_tablet ) {
			return;
		}

		$target = is_singular( 'page' ) ? get_permalink() : home_url( '/' . $slug . '/' );
		if ( ! $target ) {
			return;
		}

		wp_safe_redirect( add_query_arg( 'amp', '1', $target ), 302 );
		exit;
	},
	1
);

/**
 * Desktop-friendly shortcode for the Clients page content.
 * Usage: [succeedlearn_clients_grid]
 */
add_shortcode( 'succeedlearn_clients_grid', function( $atts = array() ) {
	$atts = shortcode_atts(
		array(
			'max' => 0,
		),
		(array) $atts,
		'succeedlearn_clients_grid'
	);

	require_once SUCCEEDLEARN_AMP_PATH . 'template/clients-marquee.php';
	if ( ! function_exists( 'succeedlearn_get_client_logos' ) ) {
		return '';
	}

	$logos = succeedlearn_get_client_logos();
	$max   = max( 0, intval( $atts['max'] ) );
	if ( $max > 0 ) {
		$logos = array_slice( $logos, 0, $max );
	}

	ob_start();
	?>
	<style>
		.succeedlearn-clients-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px;max-width:1200px;margin:24px auto}
		.succeedlearn-clients-item{background:#fff;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,.08);padding:12px;display:flex;align-items:center;justify-content:center}
		.succeedlearn-clients-item img{width:100%;max-width:180px;height:auto;object-fit:contain;display:block}
		@media (min-width:641px){.succeedlearn-clients-grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}}
		@media (min-width:768px){.succeedlearn-clients-grid{grid-template-columns:repeat(4,minmax(0,1fr));gap:18px}}
		@media (min-width:1024px){.succeedlearn-clients-grid{grid-template-columns:repeat(6,minmax(0,1fr));gap:20px}}
	</style>
	<div class="succeedlearn-clients-grid" aria-label="Client logos">
		<?php foreach ( $logos as $logo ) : ?>
			<div class="succeedlearn-clients-item">
				<img src="<?php echo esc_url( $logo['src'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" loading="lazy" decoding="async">
			</div>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();
} );

// ✅ Force redirect Homepage and LearnPress single course pages to AMP
add_action('template_redirect', function() {
    // LearnPress course redirect
    if (is_singular('lp_course') && !is_amp_endpoint() && wp_is_mobile()) {
        wp_redirect(add_query_arg('amp', '1', get_permalink()), 302);
        exit;
    }
});




// Remove AMPforWP's default templates
add_action('init','succeedlearn_amp_cleanup_defaults', 11);
function succeedlearn_amp_cleanup_defaults() {
    remove_action('pre_amp_render_post', 'ampforwp_stylesheet_file_insertion', 12);
    remove_filter('amp_post_template_file', 'ampforwp_custom_header', 10, 3);
    remove_filter('amp_post_template_file', 'ampforwp_custom_template', 10, 3);
}

// Register custom templates
add_action('init','succeedlearn_amp_register_templates', 12);
function succeedlearn_amp_register_templates() {
    add_filter('amp_post_template_file', 'succeedlearn_amp_header_file', 10, 2);
    add_filter('amp_post_template_file', 'succeedlearn_amp_footer_file', 10, 2);
    add_filter('amp_post_template_file', 'succeedlearn_amp_main_template_file', 10, 3);
}

// Load custom header
function succeedlearn_amp_header_file($file, $type) {
    if ($type === 'menu') {
        return SUCCEEDLEARN_AMP_PATH . 'template/menu.php';
    }
    return $file;
}

// Load custom footer
function succeedlearn_amp_footer_file($file, $type) {
    if ($type === 'footer') {
        return SUCCEEDLEARN_AMP_PATH . 'template/footer.php';
    }
    return $file;
}

// Helper function: return AMP version of a page if in AMP
function succeedlearn_get_amp_link( $page_id ) {
    $url = get_permalink( $page_id );
    if ( function_exists('is_amp_endpoint') && is_amp_endpoint() ) {
        $url = add_query_arg( 'amp', '', $url );
    }
    return esc_url( $url );
}

// Load custom main template
function succeedlearn_amp_main_template_file($file, $type, $post) {

    if ($type !== 'single' || ! $post) {
        return $file;
    }

    $page_id   = $post->ID;
    $post_type = get_post_type($post);
    $slug      = $post->post_name;

    // LearnPress course
    if ($post_type === 'lp_course') {
        return SUCCEEDLEARN_AMP_PATH . 'template/single-course-amp.php';
    }

    // Common text pages → global-course.php
    $common_pages = array(
        'terms-and-conditions',
        'privacy-policy',
        'refund-policy',
        'help',
        'support',
        'disclaimer',
        'cookies-policy'
    );

    if ($post_type === 'page' && in_array($slug, $common_pages, true)) {
        return SUCCEEDLEARN_AMP_PATH . 'template/global-course.php';
    }

    // New-UI landings (Cyber + Infosec + SAP). Scoped templates; do not use style.php.
    if ( $post_type === 'page' ) {
        if ( 'us-cyber-aware-october' === $slug ) {
            return SUCCEEDLEARN_AMP_PATH . 'template/us-cyber-aware-october.php';
        }
        if ( 'uk-cyber-aware-october' === $slug ) {
            return SUCCEEDLEARN_AMP_PATH . 'template/uk-cyber-aware-october.php';
        }
        if ( 'infosec-cybersecurity-awareness-uk' === $slug ) {
            return SUCCEEDLEARN_AMP_PATH . 'template/infosec-cybersecurity-awareness-uk.php';
        }
        if ( 'infosec-cybersecurity-awareness-us' === $slug ) {
            return SUCCEEDLEARN_AMP_PATH . 'template/infosec-cybersecurity-awareness-us.php';
        }
        if ( succeedlearn_amp_is_infosec_page( $post ) ) {
            if ( succeedlearn_amp_is_infosec_uk_page( $post ) ) {
                return SUCCEEDLEARN_AMP_PATH . 'template/infosec-cybersecurity-awareness-uk.php';
            }
            return SUCCEEDLEARN_AMP_PATH . 'template/infosec-cybersecurity-awareness-us.php';
        }
        if (
            'cybersecurity-awareness' === $slug
            || 'infosec-cybersecurity-awareness-month-2026' === $slug
            || 'infosec-cybersecurity-awareness' === $slug
            || 'infosec-2026-cyber' === $slug
            || 'infosec-2026' === $slug
        ) {
            return SUCCEEDLEARN_AMP_PATH . 'template/infosec-cybersecurity-awareness-us.php';
        }
        if ( 'security-awareness' === $slug || 'security-awareness-and-phishing' === $slug ) {
            return SUCCEEDLEARN_AMP_PATH . 'template/security-awareness.php';
        }

        if ( 'code-of-conduct' === $slug || 'code-of-conduct-elearning-training' === $slug ) {
            return SUCCEEDLEARN_AMP_PATH . 'template/code-of-conduct.php';
        }
    }

    // Static homepage
    if (is_front_page()) {
        return SUCCEEDLEARN_AMP_PATH . 'template/home.php';
    }

    switch ($page_id) {

        case 47613:
            return SUCCEEDLEARN_AMP_PATH . 'template/home.php';

		case 61527:
            return SUCCEEDLEARN_AMP_PATH . 'template/clients.php';

        case 2901:
            return SUCCEEDLEARN_AMP_PATH . 'template/about-us.php';

        case 87:
            return SUCCEEDLEARN_AMP_PATH . 'template/contact-us.php';
			
		case 54398:
            return SUCCEEDLEARN_AMP_PATH . 'template/courses.php';

        case 37337:
            // Legacy page ID fallback → new-UI SAP template.
            return SUCCEEDLEARN_AMP_PATH . 'template/security-awareness.php';

        case 34867:
            return SUCCEEDLEARN_AMP_PATH . 'template/s-aware.php';

        case 37751:
            return SUCCEEDLEARN_AMP_PATH . 'template/s-phish.php';

        case 48598:
            return SUCCEEDLEARN_AMP_PATH . 'template/s-bytes.php';

        case 38574:
            return SUCCEEDLEARN_AMP_PATH . 'template/s-metrics.php';

        case 39642:
            return SUCCEEDLEARN_AMP_PATH . 'template/s-play.php';

        case 40052:
            return SUCCEEDLEARN_AMP_PATH . 'template/s-signs.php';

        case 38326:
            return SUCCEEDLEARN_AMP_PATH . 'template/s-sync.php';

        case 43515:
            return SUCCEEDLEARN_AMP_PATH . 'template/respect-inclusion-suite.php';

        case 43603:
            return SUCCEEDLEARN_AMP_PATH . 'template/prevention-of-sexual-harassment-(POSH)-fundamentals-india.php';

        case 45678:
            return SUCCEEDLEARN_AMP_PATH . 'template/sexual-harassment-prevention-training-usa.php';

        case 50893:
            return SUCCEEDLEARN_AMP_PATH . 'template/financial-crime-prevention-training.php';

        case 50712:
            return SUCCEEDLEARN_AMP_PATH . 'template/workplace-health-and-safety-training.php';

        case 50754:
            return SUCCEEDLEARN_AMP_PATH . 'template/private-equity-and-venture-capital-suite.php';

        case 51624:
            return SUCCEEDLEARN_AMP_PATH . 'template/code-of-conduct.php';

        case 53375:
            return SUCCEEDLEARN_AMP_PATH . 'template/landing-page.php';

        case 53448:
            return SUCCEEDLEARN_AMP_PATH . 'template/esg-india-awareness.php';

        case 54435:
            return SUCCEEDLEARN_AMP_PATH . 'template/pe-vc-compliance-programs.php';
			
		case 55602:
            return SUCCEEDLEARN_AMP_PATH . 'template/succeedlearn-marketing-landing-from.php';
			
		case 54608:
            return SUCCEEDLEARN_AMP_PATH . 'template/s-phish-report.php';
			
		 case 57296:
            return SUCCEEDLEARN_AMP_PATH . 'template/thank-you.php';
			
		case 57340:
            return SUCCEEDLEARN_AMP_PATH . 'template/welcome.php';
    }

    if ($page_id === get_option('page_for_posts')) {
        return SUCCEEDLEARN_AMP_PATH . 'template/blog.php';
    }

    return SUCCEEDLEARN_AMP_PATH . 'template/single.php';
}

function succeedlearn_amp_get_favicon_url() {
    $favicon_url = '';
    if ( function_exists('get_site_icon_url') ) {
        $favicon_url = get_site_icon_url( 32 );
    }

    if ( ! $favicon_url ) {
        $favicon_url = home_url('/favicon.ico');
    }

    return $favicon_url;
}

add_action('amp_post_template_head', function() {
    if ( ! function_exists('is_amp_endpoint') || ! is_amp_endpoint() ) {
        return;
    }

    $favicon_url = succeedlearn_amp_get_favicon_url();

    printf('<link rel="icon" href="%1$s" sizes="32x32">', esc_url($favicon_url));
    printf('<link rel="shortcut icon" href="%1$s">', esc_url($favicon_url));
}, 5);

/**
 * Enable AMP components used for scroll progress button.
 */
add_action('amp_post_template_head', function() {
    if ( ! function_exists('is_amp_endpoint') || ! is_amp_endpoint() ) {
        return;
    }

    echo '<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>';
    echo '<script async custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js"></script>';
}, 6);

/**
 * Improve AMP LCP discovery with early connection hints and image preload.
 */
add_action('amp_post_template_head', function() {
    if ( ! function_exists('is_amp_endpoint') || ! is_amp_endpoint() ) {
        return;
    }

    echo '<link rel="preconnect" href="https://cdn.ampproject.org" crossorigin>';
    echo '<link rel="dns-prefetch" href="//cdn.ampproject.org">';

    $post = get_post();
    if ( ! $post instanceof WP_Post ) {
        return;
    }

    $content = (string) $post->post_content;
    $lcp_url = '';

    if ( preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $content, $m) ) {
        $lcp_url = $m[1];
    } elseif ( preg_match('/<amp-img[^>]+src=["\']([^"\']+)["\']/i', $content, $m) ) {
        $lcp_url = $m[1];
    } else {
        $thumb_id = get_post_thumbnail_id( $post->ID );
        if ( $thumb_id ) {
            $thumb_url = wp_get_attachment_image_url( $thumb_id, 'full' );
            if ( $thumb_url ) {
                $lcp_url = $thumb_url;
            }
        }
    }

    if ( ! $lcp_url ) {
        return;
    }

    printf(
        '<link rel="preload" as="image" href="%1$s" fetchpriority="high" crossorigin>',
        esc_url( $lcp_url )
    );
}, 30);

/**
 * Mark first content image as eager/high-priority for AMP pages.
 */
add_filter('the_content', function($content) {
    if ( is_admin() || ! function_exists('is_amp_endpoint') || ! is_amp_endpoint() ) {
        return $content;
    }

    $image_index = 0;
    $updated = preg_replace_callback(
        '/<img\b([^>]*)>/i',
        function($matches) use (&$image_index) {
            $tag  = 'img';
            $attr = $matches[1];
            $is_first = 0 === $image_index;

            if ( ! preg_match('/\sfetchpriority=/i', $attr) ) {
                $attr .= $is_first ? ' fetchpriority="high"' : ' fetchpriority="low"';
            }

            if ( 'img' === $tag && ! preg_match('/\sdecoding=/i', $attr) ) {
                $attr .= ' decoding="async"';
            }

            $image_index++;
            return '<' . $tag . $attr . '>';
        },
        $content
    );

    return $updated ?: $content;
}, 20);

/**
 * Remove duplicate AMP runtime/component script tags in final AMP output.
 */
add_action('template_redirect', function() {
    if ( ! function_exists('is_amp_endpoint') || ! is_amp_endpoint() ) {
        return;
    }

    ob_start(function($html) {
        if ( stripos($html, 'cdn.ampproject.org') === false ) {
            return $html;
        }

        // Remove invalid xml:lang attributes for AMP validation (quoted or unquoted).
        $html = preg_replace('/\sxml:lang(?:=(?:"[^"]*"|\'[^\']*\'|[^\s>]+))?/i', '', $html);

        // Ensure favicon links exist even on templates with custom <head> output.
        if ( stripos($html, 'rel="icon"') === false && stripos($html, "rel='icon'") === false ) {
            $favicon_url = esc_url( succeedlearn_amp_get_favicon_url() );
            $favicon_markup = '<link rel="icon" href="' . $favicon_url . '" sizes="32x32"><link rel="shortcut icon" href="' . $favicon_url . '">';
            $html = preg_replace('/<\/head>/i', $favicon_markup . '</head>', $html, 1);
        }

        // Ensure AMP runtime script (v0.js) never has custom-element/custom-template (quoted or unquoted attrs).
        $html = preg_replace_callback(
            '/<script\b[^>]*\bsrc\s*=\s*(?:"(?:https?:)?\/\/[^"]*cdn\.ampproject\.org\/v0\.js[^"]*"|\'(?:https?:)?\/\/[^\']*cdn\.ampproject\.org\/v0\.js[^\']*\'|(?:https?:)?\/\/[^\s>]*cdn\.ampproject\.org\/v0\.js[^\s>]*)[^>]*><\/script>/i',
            function($m) {
                $script_tag = $m[0];
                $script_tag = preg_replace('/\s+custom-(?:element|template)\s*=\s*(?:"[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $script_tag);
                $script_tag = preg_replace('/\s+async(?=[\s>])/i', '', $script_tag);
                return '<script async src="https://cdn.ampproject.org/v0.js"></script>';
            },
            $html
        );

        // Enforce exactly one canonical AMP runtime script in <head>.
        $runtime_script = '<script async src="https://cdn.ampproject.org/v0.js"></script>';
        $html = preg_replace(
            '/<script\b[^>]*\bsrc\s*=\s*(?:"(?:https?:)?\/\/[^"]*cdn\.ampproject\.org\/v0\.js[^"]*"|\'(?:https?:)?\/\/[^\']*cdn\.ampproject\.org\/v0\.js[^\']*\'|(?:https?:)?\/\/[^\s>]*cdn\.ampproject\.org\/v0\.js[^\s>]*)[^>]*><\/script>/i',
            '',
            $html
        );
        if ( stripos($html, '</head>') !== false ) {
            if ( preg_match('/<meta[^>]+name=(["\'])viewport\1[^>]*>/i', $html, $vp) && ! empty($vp[0]) ) {
                $html = preg_replace('/' . preg_quote($vp[0], '/') . '/i', $vp[0] . $runtime_script, $html, 1);
            } else {
                $html = preg_replace('/<\/head>/i', $runtime_script . '</head>', $html, 1);
            }
        }

        // Strip invalid inline JS on AMP pages; keep JSON scripts used by AMP/state/schema.
        $html = preg_replace_callback(
            '/<script\b(?![^>]*\bsrc=)([^>]*)>([\s\S]*?)<\/script>/i',
            function($m) {
                $attrs = $m[1] ?? '';
                if ( preg_match('/\btype=(["\'])(application\/(?:json|ld\+json)|amp-mustache)\1/i', $attrs) ) {
                    return $m[0];
                }
                return '';
            },
            $html
        );

        // AMP allows only amp-custom and amp-boilerplate style tags.
        $html = preg_replace(
            '/<style\b(?![^>]*\bamp-(?:custom|boilerplate)\b)[^>]*>[\s\S]*?<\/style>/i',
            '',
            $html
        );

        // Normalize amp-custom styles so they always live in <head> as a single block.
        if ( preg_match_all('/<style\s+amp-custom\b[^>]*>([\s\S]*?)<\/style>/i', $html, $style_matches) ) {
            $css_chunks = array();
            foreach ( ($style_matches[1] ?? array()) as $chunk ) {
                $chunk = trim((string) $chunk);
                if ( '' !== $chunk ) {
                    $css_chunks[] = $chunk;
                }
            }

            if ( ! empty($css_chunks) ) {
                $merged_css = implode("\n", $css_chunks);
                if ( false !== strpos( $html, 'sl-infosec-2026-terms__accordion' ) ) {
                    $merged_css .= 'amp-accordion.sl-infosec-2026-terms__accordion{display:flex!important;flex-direction:column!important;gap:12px!important}'
                        . 'amp-accordion.sl-infosec-2026-terms__accordion>section.sl-infosec-2026-terms__item,.sl-infosec-2026-terms__item{'
                        . 'display:block!important;margin:0!important;border:1px solid rgba(107,124,147,.18)!important;border-radius:14px!important;'
                        . 'background:#fff!important;box-shadow:0 8px 22px rgba(22,35,78,.04)!important;overflow:hidden!important;box-sizing:border-box!important}'
                        . 'amp-accordion.sl-infosec-2026-terms__accordion>section[expanded],.sl-infosec-2026-terms__item[expanded]{'
                        . 'border-color:rgba(20,114,186,.35)!important;box-shadow:0 12px 28px rgba(22,35,78,.08)!important}'
                        . 'amp-accordion.sl-infosec-2026-terms__accordion>section>.sl-infosec-2026-terms__summary,.sl-infosec-2026-terms__summary{'
                        . 'display:flex!important;align-items:center!important;justify-content:space-between!important;gap:16px!important;'
                        . 'width:100%!important;margin:0!important;padding:16px 16px 16px 18px!important;box-sizing:border-box!important;'
                        . 'font-size:17px!important;line-height:1.4!important;font-weight:700!important;color:#16234e!important;'
                        . 'background:transparent!important;background-image:none!important;border:0!important;border-left:3px solid transparent!important;cursor:pointer}'
                        . 'amp-accordion.sl-infosec-2026-terms__accordion>section>.sl-infosec-2026-terms__summary::after,.sl-infosec-2026-terms__summary::after{'
                        . 'content:""!important;display:block!important;flex:0 0 34px!important;width:34px!important;height:34px!important;'
                        . 'margin:0 0 0 auto!important;padding:0!important;border:0!important;border-radius:10px!important;'
                        . 'background-color:rgba(20,114,186,.1)!important;'
                        . 'background-image:url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\'%3E%3Cpath d=\'M6 9l6 6 6-6\' stroke=\'%231472ba\' stroke-width=\'2.25\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/%3E%3C/svg%3E")!important;'
                        . 'background-repeat:no-repeat!important;background-position:center!important;background-size:16px 16px!important}'
                        . 'amp-accordion.sl-infosec-2026-terms__accordion>section[expanded]>.sl-infosec-2026-terms__summary,.sl-infosec-2026-terms__item[expanded]>.sl-infosec-2026-terms__summary{'
                        . 'color:#1472ba!important;border-left-color:#1472ba!important;background:rgba(20,114,186,.04)!important}'
                        . 'amp-accordion.sl-infosec-2026-terms__accordion>section[expanded]>.sl-infosec-2026-terms__summary::after,.sl-infosec-2026-terms__item[expanded]>.sl-infosec-2026-terms__summary::after{'
                        . 'content:""!important;transform:rotate(180deg);background-color:rgba(20,114,186,.16)!important}'
                        . '.sl-infosec-2026-terms__panel{padding:4px 18px 18px 21px;border-top:1px solid rgba(107,124,147,.12);font-size:14px;line-height:1.7;color:#4A4A4A}';
                }
                $html = preg_replace('/<style\s+amp-custom\b[^>]*>[\s\S]*?<\/style>/i', '', $html);
                if ( stripos($html, '</head>') !== false ) {
                    $html = preg_replace('/<\/head>/i', '<style amp-custom>' . $merged_css . '</style></head>', $html, 1);
                }
            }
        }

        // Ensure required AMP boilerplate tags always exist in <head>.
        $has_amp_boilerplate = (bool) preg_match('/<style\s+amp-boilerplate\b[^>]*>[\s\S]*?<\/style>/i', $html);
        $has_noscript_boilerplate = (bool) preg_match('/<noscript>\s*<style\s+amp-boilerplate\b[^>]*>[\s\S]*?<\/style>\s*<\/noscript>/i', $html);
        if ( ( ! $has_amp_boilerplate || ! $has_noscript_boilerplate ) && stripos($html, '</head>') !== false ) {
            $boilerplate_markup = '';
            if ( ! $has_amp_boilerplate ) {
                $boilerplate_markup .= '<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>';
            }
            if ( ! $has_noscript_boilerplate ) {
                $boilerplate_markup .= '<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>';
            }
            $html = preg_replace('/<\/head>/i', $boilerplate_markup . '</head>', $html, 1);
        }

        // Prevent AMP auto-lightbox from attaching to images on AMP pages.
        $html = preg_replace_callback(
            '/<amp-img\b([^>]*)>/i',
            function($m) {
                $attr = $m[1];
                // Remove attributes not allowed on amp-img.
                $attr = preg_replace('/\s(?:loading|decoding|fetchpriority)=(["\']).*?\1/i', '', $attr);
                if ( preg_match('/\sdata-amp-auto-lightbox-disable\b/i', $attr) ) {
                    return $m[0];
                }
                return '<amp-img' . $attr . ' data-amp-auto-lightbox-disable>';
            },
            $html
        );

        // Remove attributes not allowed on amp-video.
        $html = preg_replace_callback(
            '/<amp-video\b([^>]*)>/i',
            function($m) {
                $attr = $m[1];
                $attr = preg_replace('/\splaysinline(?:=(?:"[^"]*"|\'[^\']*\'|[^\s>]+))?/i', '', $attr);
                return '<amp-video' . $attr . '>';
            },
            $html
        );

        // Avoid invalid loading values in AMP validator for plain img tags.
        $html = preg_replace_callback(
            '/<img\b([^>]*)>/i',
            function($m) {
                $attr = $m[1];
                $attr = preg_replace('/\sloading=(["\']).*?\1/i', '', $attr);
                return '<img' . $attr . '>';
            },
            $html
        );

        // Ensure country-code select has an effective accessible name.
        $html = preg_replace_callback(
            '/<select\b([^>]*\bid=(["\'])scf-phone-country-code\2[^>]*)>/i',
            function($m) {
                $attrs = $m[1];
                if ( preg_match('/\s(?:aria-label|aria-labelledby)=/i', $attrs) ) {
                    return '<select' . $attrs . '>';
                }
                return '<select' . $attrs . ' aria-label="Country code">';
            },
            $html
        );

        // Ensure the first meaningful content image (inside <main>) gets high priority.
        $html = preg_replace_callback(
            '/<main\b[^>]*>[\s\S]*?<\/main>/i',
            function($main_match) {
                $main_html = $main_match[0];
                // Add AMP scroll observer once to drive step-based scroll progress UI.
                if ( stripos($main_html, '<amp-position-observer') === false ) {
                    $main_html = preg_replace(
                        '/<main\b[^>]*>/i',
                        '$0<amp-position-observer on="scroll:AMP.setState({scrollProgress:{p:event.percent}})" layout="nodisplay"></amp-position-observer>',
                        $main_html,
                        1
                    );
                }
                $main_html = preg_replace_callback(
                    '/<img\b([^>]*)>/i',
                    function($img_match) {
                        static $main_first_done = false;
                        if ( $main_first_done ) {
                            return $img_match[0];
                        }
                        $main_first_done = true;
                        $tag  = 'img';
                        $attr = $img_match[1];

                        if ( preg_match('/\sfetchpriority=/i', $attr) ) {
                            $attr = preg_replace('/\sfetchpriority=(["\']).*?\1/i', ' fetchpriority="high"', $attr);
                        } else {
                            $attr .= ' fetchpriority="high"';
                        }

                        if ( ! preg_match('/\sdecoding=/i', $attr) ) {
                            $attr .= ' decoding="async"';
                        }

                        return '<' . $tag . $attr . '>';
                    },
                    $main_html,
                    1
                );
                return $main_html;
            },
            $html,
            1
        );

        // Strip style/script content before extension detection to avoid false positives.
        $html_markup_only = preg_replace('/<style\b[^>]*>[\s\S]*?<\/style>|<script\b[^>]*>[\s\S]*?<\/script>/i', '', $html);
        if ( ! is_string($html_markup_only) ) {
            $html_markup_only = $html;
        }

        $signals = array(
            'amp-sidebar'        => stripos($html_markup_only, '<amp-sidebar') !== false,
            'amp-accordion'      => stripos($html_markup_only, '<amp-accordion') !== false,
            'amp-carousel'       => stripos($html_markup_only, '<amp-carousel') !== false,
            'amp-form'           => stripos($html_markup_only, 'action-xhr=') !== false || stripos($html_markup_only, 'custom-validation-reporting=') !== false,
            'amp-consent'        => stripos($html_markup_only, '<amp-consent') !== false,
            'amp-video'          => stripos($html_markup_only, '<amp-video') !== false,
            'amp-youtube'        => stripos($html_markup_only, '<amp-youtube') !== false,
            'amp-vimeo'          => stripos($html_markup_only, '<amp-vimeo') !== false,
            'amp-selector'       => stripos($html_markup_only, '<amp-selector') !== false,
            'amp-analytics'      => stripos($html_markup_only, '<amp-analytics') !== false,
            'amp-mustache'       => stripos($html_markup_only, 'type="amp-mustache"') !== false || stripos($html_markup_only, "type='amp-mustache'") !== false,
            'amp-bind'           => stripos($html_markup_only, '<amp-state') !== false || preg_match('/<[^>]*\s\[[a-z0-9:-]+\]=/i', $html_markup_only),
            'amp-state'          => stripos($html_markup_only, '<amp-state') !== false,
            'amp-lightbox'       => stripos($html_markup_only, '<amp-lightbox') !== false,
            'amp-lightbox-gallery' => stripos($html_markup_only, '<amp-lightbox-gallery') !== false || preg_match('/\slightbox(?:=["\'][^"\']*["\'])?/i', $html_markup_only),
        );

        $seen = array();
        $deduped = preg_replace_callback(
            '/<script\b([^>]*)\bsrc\s*=\s*(?:"((?:https?:)?\/\/cdn\.ampproject\.org\/[^"]+)"|\'((?:https?:)?\/\/cdn\.ampproject\.org\/[^\']+)\'|((?:https?:)?\/\/cdn\.ampproject\.org\/[^\s>]+))([^>]*)><\/script>/i',
            function($m) use (&$seen, $signals) {
                $attrs = strtolower((string) ($m[1] ?? '') . ' ' . (string) ($m[5] ?? ''));
                $src = strtolower((string) ($m[2] ?: $m[3] ?: $m[4]));
                $dedupe_key = $src;

                // Dedupe AMP runtime by canonical key.
                if ( strpos($src, '/v0.js') !== false ) {
                    $dedupe_key = 'amp-runtime';
                }

                // Prefer explicit component key from custom-element/template attrs.
                if ( preg_match('/\bcustom-(?:element|template)\s*=\s*(["\'])(amp-[a-z0-9-]+)\1/i', $attrs, $em) ) {
                    $dedupe_key = strtolower($em[2]);
                }

                if ( preg_match('#/v0/(amp-[a-z0-9-]+)-#i', $src, $cm) ) {
                    $component = strtolower($cm[1]);
                    if ( isset($signals[$component]) && ! $signals[$component] ) {
                        return '';
                    }
                    // Dedupe by component name regardless of version alias.
                    $dedupe_key = $component;
                }

                if ( isset($seen[$dedupe_key]) ) {
                    return '';
                }

                $seen[$dedupe_key] = true;
                return $m[0];
            },
            $html
        );

        return is_string($deduped) ? $deduped : $html;
    });
}, 1);

/**
 * Add browser cache headers for static files served via WordPress.
 */
add_action('send_headers', function() {
    if ( is_admin() ) {
        return;
    }

    $request_uri = isset($_SERVER['REQUEST_URI']) ? (string) $_SERVER['REQUEST_URI'] : '';
    if ( ! $request_uri ) {
        return;
    }

    if ( preg_match('/\.(?:webp|png|jpg|jpeg|svg|gif|ico|css|js|woff2?|ttf|eot)(?:\?.*)?$/i', $request_uri) ) {
        header('Cache-Control: public, max-age=31536000, immutable');
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
    }
}, 20);

// Load fallback Google fonts (optional additional font)
function amp_post_template_add_custom_google_font( $amp_template ) {
    $font_urls = $amp_template->get( 'font_urls', array() );
    $font_urls['source_serif_pro'] = 'https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600|Source+Sans+Pro:400,700';
    ?>
    <link rel="stylesheet" href="<?php echo esc_url( $font_urls['source_serif_pro'] ); ?>">
    <?php
}

// NOTE: Do not inject global AMP CSS here.
// Every custom template in /template already prints its own <style amp-custom> block
// (including template/style.php). Injecting again duplicates CSS, increases HTML size,
// and adds unnecessary server-side processing during output normalization.

/**
 * Remove non-beneficial origin preconnect on AMP pages.
 */
add_filter('wp_resource_hints', function($hints, $relation_type) {
    if ( ! function_exists('is_amp_endpoint') || ! is_amp_endpoint() ) {
        return $hints;
    }

    if ( 'preconnect' !== $relation_type ) {
        return $hints;
    }

    $filtered = array();
    foreach ( $hints as $hint ) {
        $href = is_array($hint) ? ($hint['href'] ?? '') : $hint;
        if ( is_string($href) && strpos($href, 'https://succeedlearn.com') === 0 ) {
            continue;
        }
        $filtered[] = $hint;
    }

    return $filtered;
}, 20, 2);


