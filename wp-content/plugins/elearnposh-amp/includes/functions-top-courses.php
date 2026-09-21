<?php
/**
 * Top / related courses section for AMP course pages.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Course catalog (aligned with AMP homepage Our Solutions cards).
 *
 * @return array<string, array<string, string>>
 */
function elearnposh_amp_get_top_courses_catalog() {
	return array(
		'employees'            => array(
			'title'           => 'POSH Training for Employees',
			'url'             => '/solutions/posh-training-for-employees/',
			'image'           => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Employess-Training.webp',
			'alt'             => 'POSH Training for Employees online workplace harassment awareness training for employees',
			'description'     => 'POSH awareness training to help employees understand the law, recognize inappropriate behaviour, and contribute to a safer, more respectful workplace.',
			'category'        => 'posh',
			'category_label'  => 'POSH Courses',
			'subtitle_phrase' => 'employees',
		),
		'managers'             => array(
			'title'           => 'POSH Training For Managers',
			'url'             => '/solutions/posh-training-for-managers/',
			'image'           => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Manager-Training.webp',
			'alt'             => 'POSH for Managers training on workplace harassment prevention and team leadership responsibilities',
			'description'     => 'Equip people managers to handle complaints fairly, work with the Internal Committee, and take proactive measures against workplace sexual harassment.',
			'category'        => 'posh',
			'category_label'  => 'POSH Courses',
			'subtitle_phrase' => 'managers',
		),
		'ic-members'           => array(
			'title'           => 'POSH Training For IC Members',
			'url'             => '/solutions/posh-training-for-ic-members/',
			'image'           => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-%E2%80%93-Internal-Committee-Training.webp',
			'alt'             => 'POSH for Internal Committee members workplace inquiry and compliance training course',
			'description'     => 'Structured IC training and compliance tools so committee members handle complaints with confidence, sensitivity, and accuracy-not just check-the-box workshops.',
			'category'        => 'posh',
			'category_label'  => 'POSH Courses',
			'subtitle_phrase' => 'Internal Committee members',
		),
		'hei'                  => array(
			'title'           => 'POSH Training for HEI',
			'url'             => '/solutions/posh-for-higher-educational-institutions/',
			'image'           => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Higher-Educational-Institution-Training.webp',
			'alt'             => 'POSH training course for higher educational institutions and campus workplace safety awareness',
			'description'     => 'Gender sensitization and sexual harassment prevention eLearning to equip staff and students with knowledge and skills for a respectful campus culture.',
			'category'        => 'posh',
			'category_label'  => 'POSH Courses',
			'subtitle_phrase' => 'higher educational institutions',
		),
		'cms'                  => array(
			'title'           => 'Compliance Management System',
			'url'             => '/solutions/compliance-management-system/',
			'image'           => 'https://elearnposh.com/wp-content/uploads/2026/06/Make-POSH-Compliance-Simpler-When-It-Matters-Most-scaled.webp',
			'alt'             => 'POSH for CMS complaint management system for secure POSH case handling and resolution',
			'description'     => 'A secure, paperless POSH complaint management platform to file complaints, manage cases, track evidence, and ensure timely resolution.',
			'category'        => 'cms',
			'category_label'  => 'Compliance Management System',
			'subtitle_phrase' => 'POSH complaint management',
		),
		'pocso'                => array(
			'title'           => 'POCSO Training',
			'url'             => '/solutions/pocso-prevention-of-child-sexual-abuse/',
			'image'           => 'https://elearnposh.com/wp-content/uploads/2026/06/POCSO-eLearning.webp',
			'alt'             => 'POCSO prevention of child sexual abuse awareness and compliance training course',
			'description'     => 'Introduces staff and students to POCSO law and child protection policy, clarifying duties and responsibilities to ensure a safe learning environment.',
			'category'        => 'posh',
			'category_label'  => 'POSH Courses',
			'subtitle_phrase' => 'POCSO child safety training',
		),
		'unconscious-bias'     => array(
			'title'           => 'Unconscious Bias',
			'url'             => '/solutions/unconscious-bias/',
			'image'           => 'https://elearnposh.com/wp-content/uploads/2026/06/Unconscious-Bias-eLearning.webp',
			'alt'             => 'Unconscious bias workplace inclusion and diversity awareness training program',
			'description'     => 'Helps employees recognize hidden biases that influence hiring, teamwork, and decisions, with practical strategies for a more inclusive workplace.',
			'category'        => 'global',
			'category_label'  => 'Global Courses',
			'subtitle_phrase' => 'unconscious bias awareness',
		),
		'equality-diversity'   => array(
			'title'           => 'Equality and Diversity',
			'url'             => '/equality-and-diversity/',
			'image'           => 'https://elearnposh.com/wp-content/uploads/2026/06/Equality-Diversity-Inclusion-eLearning.webp',
			'alt'             => 'Equality and diversity workplace inclusion and respectful culture training course',
			'description'     => 'Sensitizes employees on diversity and inclusion-from definitions and discrimination to prevention-with engaging, research-backed interactive eLearning.',
			'category'        => 'global',
			'category_label'  => 'Global Courses',
			'subtitle_phrase' => 'equality and diversity',
		),
		'sexual-harassment-us' => array(
			'title'           => 'Sexual Harassment Prevention for US',
			'url'             => '/solutions/sexual-harassment-prevention-for-us/',
			'image'           => 'https://elearnposh.com/wp-content/uploads/2026/06/Sexual-Harassment-Prevention-for-US.webp',
			'alt'             => 'US workplace sexual harassment prevention and compliance training course for employees',
			'description'     => 'Comprehensive, legally vetted US sexual harassment prevention training with real-life scenarios for employees and supervisors across multiple states.',
			'category'        => 'global',
			'category_label'  => 'Global Courses',
			'subtitle_phrase' => 'US sexual harassment prevention',
		),
	);
}

/**
 * Normalized request path without trailing /amp.
 *
 * @return string
 */
function elearnposh_amp_top_courses_get_current_path() {
	$current_url = '';

	if ( function_exists( 'get_permalink' ) ) {
		$permalink = get_permalink();
		if ( is_string( $permalink ) ) {
			$current_url = $permalink;
		}
	}

	if ( ! $current_url && isset( $_SERVER['REQUEST_URI'] ) ) {
		$current_url = (string) wp_unslash( $_SERVER['REQUEST_URI'] ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}

	$path = wp_parse_url( $current_url, PHP_URL_PATH );
	if ( ! is_string( $path ) ) {
		return '';
	}

	$path = untrailingslashit( $path );
	if ( substr( $path, -4 ) === '/amp' ) {
		$path = untrailingslashit( substr( $path, 0, -4 ) );
	}

	return $path;
}

/**
 * Resolve catalog key for the current page.
 *
 * @param array|null $catalog Optional catalog override.
 * @return string
 */
function elearnposh_amp_top_courses_get_current_key( $catalog = null ) {
	if ( null === $catalog ) {
		$catalog = elearnposh_amp_get_top_courses_catalog();
	}

	$current_path = elearnposh_amp_top_courses_get_current_path();
	if ( ! $current_path ) {
		return '';
	}

	foreach ( $catalog as $key => $course ) {
		$course_url = isset( $course['url'] ) ? (string) $course['url'] : '';
		if ( '' === $course_url ) {
			continue;
		}

		$page = elearnposh_amp_resolve_page_by_path( $course_url );
		if ( $page ) {
			$course_path = wp_parse_url( get_permalink( $page->ID ), PHP_URL_PATH );
		} else {
			$course_path = wp_parse_url( $course_url, PHP_URL_PATH );
		}

		if ( is_string( $course_path ) && $current_path === untrailingslashit( $course_path ) ) {
			return $key;
		}
	}

	return '';
}

/**
 * Build subtitle from visible course phrases.
 *
 * @param array<int, string> $phrases Subtitle phrases.
 * @return string
 */
function elearnposh_amp_build_top_courses_subtitle( array $phrases ) {
	$phrases = array_values( array_filter( $phrases ) );
	$count   = count( $phrases );

	if ( 0 === $count ) {
		return __( 'Explore specialized learning paths for workplace compliance and prevention training.', 'elearnposh-amp' );
	}

	if ( 1 === $count ) {
		return sprintf(
			/* translators: %s: audience or course focus phrase */
			__( 'Explore specialized learning paths for %s.', 'elearnposh-amp' ),
			$phrases[0]
		);
	}

	$last = array_pop( $phrases );

	return sprintf(
		/* translators: 1: comma-separated phrases, 2: final phrase */
		__( 'Explore specialized learning paths for %1$s, and %2$s.', 'elearnposh-amp' ),
		implode( ', ', $phrases ),
		$last
	);
}

/**
 * Canonical permalink for the POSH Training for Employees page.
 *
 * @return string
 */
function elearnposh_amp_get_employees_page_url() {
	static $cached = null;

	if ( null !== $cached ) {
		return elearnposh_amp_to_amp_url( $cached );
	}

	foreach ( array( 15820, 66 ) as $page_id ) {
		if ( $page_id > 0 && get_post_status( $page_id ) ) {
			$cached = get_permalink( $page_id );
			return elearnposh_amp_to_amp_url( $cached );
		}
	}

	foreach ( array(
		'solutions/posh-training-for-employees',
		'posh-training-for-employees',
		'posh-courses/posh-for-employees',
		'posh-for-employees',
		'posh-courses/posh-foundation-module',
		'posh-foundation-module',
	) as $path ) {
		$page = get_page_by_path( $path );
		if ( $page && ! is_wp_error( $page ) ) {
			$cached = get_permalink( $page->ID );
			return elearnposh_amp_to_amp_url( $cached );
		}
	}

	$cached = home_url( '/solutions/posh-training-for-employees/' );
	return elearnposh_amp_to_amp_url( $cached );
}

/**
 * Canonical permalink for the POSH Training for IC Members page.
 *
 * @return string
 */
function elearnposh_amp_get_ic_members_page_url() {
	static $cached = null;

	if ( null !== $cached ) {
		return elearnposh_amp_to_amp_url( $cached );
	}

	foreach ( array(
		'solutions/posh-training-for-ic-members',
		'posh-training-for-ic-members',
		'posh-courses/posh-for-ic-members',
		'posh-for-ic-members',
	) as $path ) {
		$page = get_page_by_path( $path );
		if ( $page && ! is_wp_error( $page ) ) {
			$cached = get_permalink( $page->ID );
			return elearnposh_amp_to_amp_url( $cached );
		}
	}

	$cached = home_url( '/solutions/posh-training-for-ic-members/' );
	return elearnposh_amp_to_amp_url( $cached );
}

/**
 * Canonical permalink for the POSH Training for Managers page.
 *
 * @return string
 */
function elearnposh_amp_get_managers_page_url() {
	static $cached = null;

	if ( null !== $cached ) {
		return elearnposh_amp_to_amp_url( $cached );
	}

	foreach ( array(
		'solutions/posh-training-for-managers',
		'posh-training-for-managers',
		'posh-courses/posh-for-managers',
		'posh-for-managers',
	) as $path ) {
		$page = get_page_by_path( $path );
		if ( $page && ! is_wp_error( $page ) ) {
			$cached = get_permalink( $page->ID );
			return elearnposh_amp_to_amp_url( $cached );
		}
	}

	$cached = elearnposh_amp_url( '/solutions/posh-training-for-managers/' );
	return elearnposh_amp_to_amp_url( $cached );
}

/**
 * Canonical permalink for the Compliance Management System page.
 *
 * @return string
 */
function elearnposh_amp_get_cms_page_url() {
	static $cached = null;

	if ( null !== $cached ) {
		return elearnposh_amp_to_amp_url( $cached );
	}

	foreach ( array(
		'solutions/compliance-management-system',
		'compliance-management-system',
		'posh-courses/posh-for-cms',
		'posh-for-cms',
	) as $path ) {
		$page = get_page_by_path( $path );
		if ( $page && ! is_wp_error( $page ) ) {
			$cached = get_permalink( $page->ID );
			return elearnposh_amp_to_amp_url( $cached );
		}
	}

	$cached = elearnposh_amp_url( '/solutions/compliance-management-system/' );
	return elearnposh_amp_to_amp_url( $cached );
}

/**
 * Resolve the canonical POSH for HEI page URL.
 *
 * @return string
 */
function elearnposh_amp_get_hei_page_url() {
	static $cached = null;

	if ( null !== $cached ) {
		return elearnposh_amp_to_amp_url( $cached );
	}

	if ( 8100 > 0 && get_post_status( 8100 ) ) {
		$cached = get_permalink( 8100 );
		return elearnposh_amp_to_amp_url( $cached );
	}

	foreach ( array(
		'solutions/posh-for-higher-educational-institutions',
		'posh-for-higher-educational-institutions',
		'posh-courses/posh-for-higher-educational-institutions',
	) as $path ) {
		$page = get_page_by_path( $path );
		if ( $page && ! is_wp_error( $page ) ) {
			$cached = get_permalink( $page->ID );
			return elearnposh_amp_to_amp_url( $cached );
		}
	}

	$cached = home_url( '/solutions/posh-for-higher-educational-institutions/' );
	return elearnposh_amp_to_amp_url( $cached );
}

/**
 * Resolve the canonical POCSO page URL.
 *
 * @return string
 */
function elearnposh_amp_get_pocso_page_url() {
	static $cached = null;

	if ( null !== $cached ) {
		return elearnposh_amp_to_amp_url( $cached );
	}

	if ( 8244 > 0 && get_post_status( 8244 ) ) {
		$cached = get_permalink( 8244 );
		return elearnposh_amp_to_amp_url( $cached );
	}

	foreach ( array(
		'solutions/pocso-prevention-of-child-sexual-abuse',
		'pocso-prevention-of-child-sexual-abuse',
		'posh-courses/pocso-prevention-of-child-sexual-abuse',
	) as $path ) {
		$page = get_page_by_path( $path );
		if ( $page && ! is_wp_error( $page ) ) {
			$cached = get_permalink( $page->ID );
			return elearnposh_amp_to_amp_url( $cached );
		}
	}

	$cached = home_url( '/solutions/pocso-prevention-of-child-sexual-abuse/' );
	return elearnposh_amp_to_amp_url( $cached );
}

/**
 * Resolve the canonical Equality and Diversity page URL.
 *
 * @return string
 */
function elearnposh_amp_get_equality_diversity_page_url() {
	static $cached = null;

	if ( null !== $cached ) {
		return elearnposh_amp_to_amp_url( $cached );
	}

	foreach ( array(
		'solutions/equality-and-diversity',
		'equality-and-diversity',
		'global-courses/equality-and-diversity',
	) as $path ) {
		$page = get_page_by_path( $path );
		if ( $page && ! is_wp_error( $page ) ) {
			$cached = get_permalink( $page->ID );
			return elearnposh_amp_to_amp_url( $cached );
		}
	}

	$cached = home_url( '/solutions/equality-and-diversity/' );
	return elearnposh_amp_to_amp_url( $cached );
}

/**
 * Resolve the canonical Unconscious Bias page URL.
 *
 * @return string
 */
function elearnposh_amp_get_unconscious_bias_page_url() {
	static $cached = null;

	if ( null !== $cached ) {
		return elearnposh_amp_to_amp_url( $cached );
	}

	if ( 15159 > 0 && get_post_status( 15159 ) ) {
		$cached = get_permalink( 15159 );
		return elearnposh_amp_to_amp_url( $cached );
	}

	foreach ( array(
		'solutions/unconscious-bias',
		'unconscious-bias',
		'posh-courses/unconscious-bias',
		'bias',
	) as $path ) {
		$page = get_page_by_path( $path );
		if ( $page && ! is_wp_error( $page ) ) {
			$cached = get_permalink( $page->ID );
			return elearnposh_amp_to_amp_url( $cached );
		}
	}

	$cached = home_url( '/solutions/unconscious-bias/' );
	return elearnposh_amp_to_amp_url( $cached );
}

/**
 * Resolve the canonical Sexual Harassment Prevention for US page URL.
 *
 * @return string
 */
function elearnposh_amp_get_sexual_harassment_us_page_url() {
	static $cached = null;

	if ( null !== $cached ) {
		return elearnposh_amp_to_amp_url( $cached );
	}

	foreach ( array(
		'solutions/sexual-harassment-prevention-for-us',
		'sexual-harassment-prevention-for-us',
		'global-courses/us-posh',
	) as $path ) {
		$page = get_page_by_path( $path );
		if ( $page && ! is_wp_error( $page ) ) {
			$cached = get_permalink( $page->ID );
			return elearnposh_amp_to_amp_url( $cached );
		}
	}

	$cached = home_url( '/solutions/sexual-harassment-prevention-for-us/' );
	return elearnposh_amp_to_amp_url( $cached );
}

/**
 * Resolve a page from a relative site path.
 *
 * @param string $relative_url Relative URL or path.
 * @return WP_Post|null
 */
function elearnposh_amp_resolve_page_by_path( $relative_url ) {
	$path = trim( (string) wp_parse_url( $relative_url, PHP_URL_PATH ), '/' );
	if ( '' === $path ) {
		return null;
	}

	$page = get_page_by_path( $path );
	if ( $page && ! is_wp_error( $page ) ) {
		return $page;
	}

	$segments = explode( '/', $path );
	for ( $i = 1, $count = count( $segments ); $i < $count; $i++ ) {
		$try  = implode( '/', array_slice( $segments, $i ) );
		$page = get_page_by_path( $try );
		if ( $page && ! is_wp_error( $page ) ) {
			return $page;
		}
	}

	return null;
}

/**
 * Strip request/tracking query args from AMP discovery URLs (rel=amphtml).
 *
 * AMPforWP's ampforwp_url_purifier() copies the current request QUERY_STRING onto
 * singular amphtml hrefs. Newsletter/email UTMs then get baked into page cache, so
 * Googlebot discovers amphtml like /post/amp/?utm_source=brevo… and drops the AMP
 * pairing from Search Console (posts/newsletters vanish from valid and invalid).
 *
 * @param string $url AMP URL candidate.
 * @return string Clean AMP URL (keeps only ?amp= when that endpoint style is used).
 */
function elearnposh_amp_clean_amphtml_url( $url ) {
	$url = trim( (string) $url );
	if ( '' === $url ) {
		return $url;
	}

	$fragment = '';
	if ( false !== strpos( $url, '#' ) ) {
		list( $url, $fragment ) = explode( '#', $url, 2 );
	}

	$parsed = wp_parse_url( $url );
	if ( empty( $parsed['query'] ) ) {
		return $fragment ? $url . '#' . $fragment : $url;
	}

	parse_str( $parsed['query'], $query_args );
	if ( ! is_array( $query_args ) || array() === $query_args ) {
		return $fragment ? $url . '#' . $fragment : $url;
	}

	$keep = array();
	if ( array_key_exists( 'amp', $query_args ) ) {
		$keep['amp'] = $query_args['amp'];
	}

	$url = remove_query_arg( array_keys( $query_args ), $url );
	if ( $keep ) {
		$url = add_query_arg( $keep, $url );
	}

	if ( $fragment ) {
		$url .= '#' . $fragment;
	}

	return $url;
}

/**
 * AMP URL for a page ID.
 *
 * @param int $post_id Page ID.
 * @return string
 */
function elearnposh_amp_get_post_amp_url( $post_id ) {
	$url = get_permalink( $post_id );
	if ( ! $url ) {
		return '';
	}

	$candidates = array();
	if ( function_exists( 'ampforwp_amp_nonamp_convert' ) ) {
		$candidates[] = ampforwp_amp_nonamp_convert( $url, 'amp' );
	}
	if ( function_exists( 'amp_add_paired_endpoint' ) ) {
		$candidates[] = amp_add_paired_endpoint( $url );
	}

	$canonical = untrailingslashit( $url );
	foreach ( $candidates as $candidate ) {
		if ( ! empty( $candidate ) && untrailingslashit( $candidate ) !== $canonical ) {
			return $candidate;
		}
	}

	$trail = trailingslashit( $url );
	if ( false === strpos( $trail, '/amp/' ) ) {
		return $trail . 'amp/';
	}

	return add_query_arg( 'amp', '1', $url );
}

/**
 * Whether a URL belongs to this WordPress site (ignores www. prefix).
 *
 * @param string $url URL to check.
 * @return bool
 */
function elearnposh_amp_is_internal_url( $url ) {
	$parsed = wp_parse_url( $url );
	if ( empty( $parsed['host'] ) ) {
		return true;
	}

	$site_host = wp_parse_url( home_url( '/' ), PHP_URL_HOST );
	if ( ! $site_host ) {
		return false;
	}

	$normalize = static function ( $host ) {
		return preg_replace( '/^www\./i', '', strtolower( (string) $host ) );
	};

	return $normalize( $parsed['host'] ) === $normalize( $site_host );
}

/**
 * Whether internal links from AMP templates should use the AMP URL.
 *
 * @param int $post_id Post ID.
 * @return bool
 */
function elearnposh_amp_post_should_use_amp_link( $post_id ) {
	$post_id = absint( $post_id );
	if ( ! $post_id ) {
		return false;
	}

	if ( class_exists( '\ElearnPOSH\AMP\Plugin' ) ) {
		$config = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
		if ( $config ) {
			if ( method_exists( $config, 'is_non_amp_page' ) && $config->is_non_amp_page( $post_id ) ) {
				return false;
			}
			if ( method_exists( $config, 'is_plugin_custom_amp_page' ) && $config->is_plugin_custom_amp_page( $post_id ) ) {
				return true;
			}
		}
	}

	if ( 'post' === get_post_type( $post_id ) ) {
		return true;
	}

	if ( (int) get_option( 'page_on_front' ) === $post_id ) {
		return true;
	}

	return false;
}

/**
 * Convert a canonical site URL to its AMP equivalent when available.
 *
 * @param string $url Canonical or absolute URL.
 * @return string
 */
function elearnposh_amp_to_amp_url( $url ) {
	$url = trim( (string) $url );
	if ( '' === $url || '#' === $url ) {
		return $url;
	}

	if ( preg_match( '#^(mailto:|tel:)#i', $url ) ) {
		return esc_url( $url );
	}

	if ( preg_match( '~/amp/?($|\?|#)|[?&]amp=1~', $url ) ) {
		return esc_url( $url );
	}

	$fragment = '';
	if ( false !== strpos( $url, '#' ) ) {
		list( $url, $fragment ) = explode( '#', $url, 2 );
	}

	$query_args = array();
	$parsed     = wp_parse_url( $url );
	if ( ! empty( $parsed['query'] ) ) {
		parse_str( $parsed['query'], $query_args );
		$url = remove_query_arg( array_keys( $query_args ), $url );
	}

	if ( ! empty( $parsed['host'] ) && ! elearnposh_amp_is_internal_url( $url ) ) {
		$out = $url . ( $fragment ? '#' . $fragment : '' );
		return esc_url( $out );
	}

	$post_id = url_to_postid( $url );
	if ( ! $post_id ) {
		$path = isset( $parsed['path'] ) ? $parsed['path'] : '';
		if ( $path ) {
			$page = elearnposh_amp_resolve_page_by_path( $path );
			if ( $page ) {
				$post_id = $page->ID;
			}
		}
	}

	if ( ! $post_id && ! empty( $parsed['path'] ) && class_exists( '\ElearnPOSH\AMP\Plugin' ) ) {
		$path_slug = basename( untrailingslashit( (string) $parsed['path'] ) );
		if ( in_array( $path_slug, array( 'contact-us', 'contact' ), true ) ) {
			$config  = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
			$post_id = $config ? absint( $config->resolve_page_id_by_map_key( 'contact' ) ) : 0;
		}
	}

	if ( ! $post_id && empty( trim( (string) ( $parsed['path'] ?? '' ), '/' ) ) ) {
		$post_id = (int) get_option( 'page_on_front' );
	}

	if ( ! $post_id || ! elearnposh_amp_post_should_use_amp_link( $post_id ) ) {
		$out = $url;
		if ( $query_args ) {
			$out = add_query_arg( $query_args, $out );
		}
		if ( $fragment ) {
			$out .= '#' . $fragment;
		}
		return esc_url( $out );
	}

	$amp_url = elearnposh_amp_get_post_amp_url( $post_id );
	if ( ! $amp_url ) {
		$amp_url = $url;
	}

	if ( $query_args ) {
		$amp_url = add_query_arg( $query_args, $amp_url );
	}
	if ( $fragment ) {
		$amp_url .= '#' . $fragment;
	}

	return esc_url( $amp_url );
}

/**
 * Resolve a relative or absolute internal path to a direct AMP URL.
 *
 * @param string $path_or_url Site path (e.g. /contact-us/#demo) or absolute URL.
 * @return string
 */
function elearnposh_amp_url( $path_or_url ) {
	if ( empty( $path_or_url ) || '#' === $path_or_url ) {
		return '#';
	}

	$input = (string) $path_or_url;
	if ( preg_match( '#^(mailto:|tel:)#i', $input ) ) {
		return esc_url( $input );
	}

	if ( preg_match( '#^https?://#i', $input ) ) {
		return elearnposh_amp_to_amp_url( $input );
	}

	return elearnposh_amp_to_amp_url( home_url( $input ) );
}

/**
 * Whether the current request is the contact page.
 *
 * @return bool
 */
function elearnposh_amp_is_contact_page() {
	static $is_contact = null;

	if ( null !== $is_contact ) {
		return $is_contact;
	}

	$is_contact = false;
	$post_id    = absint( get_queried_object_id() );

	if ( ! $post_id || ! class_exists( '\ElearnPOSH\AMP\Plugin' ) ) {
		return $is_contact;
	}

	$config     = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
	$contact_id = $config ? absint( $config->resolve_page_id_by_map_key( 'contact' ) ) : 0;

	if ( $contact_id && $post_id === $contact_id ) {
		$is_contact = true;
		return $is_contact;
	}

	$post = get_post( $post_id );
	if ( $post && in_array( $post->post_name, array( 'contact-us', 'contact' ), true ) ) {
		$is_contact = true;
	}

	return $is_contact;
}

/**
 * AMP URL for the contact page demo form (#demo).
 *
 * Uses #demo on the contact page itself; full AMP URL elsewhere.
 *
 * @return string
 */
function elearnposh_amp_get_contact_demo_url() {
	if ( elearnposh_amp_is_contact_page() ) {
		return '#demo';
	}

	if ( class_exists( '\ElearnPOSH\AMP\Plugin' ) ) {
		$config     = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
		$contact_id = $config ? absint( $config->resolve_page_id_by_map_key( 'contact' ) ) : 0;
		if ( $contact_id ) {
			$amp_url = elearnposh_amp_get_post_amp_url( $contact_id );
			if ( $amp_url ) {
				return $amp_url . '#demo';
			}
		}
	}

	return elearnposh_amp_url( '/contact-us/#demo' );
}

/**
 * AMP URL for a course path.
 *
 * @param string $relative_url Course path.
 * @return string
 */
function elearnposh_amp_top_courses_amp_url( $relative_url ) {
	return elearnposh_amp_url( $relative_url );
}

/**
 * Output shared top courses CSS once per page.
 */
function elearnposh_amp_output_top_courses_styles() {
	static $printed = false;

	if ( $printed ) {
		return;
	}

	$printed = true;
	include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/course-top-courses-styles.php';
}

/**
 * Render the top / related courses grid section.
 *
 * @param array $args {
 *     @type string $exclude  Catalog key to exclude.
 *     @type string $title    Section heading.
 *     @type string $subtitle Subtitle override.
 * }
 */
function elearnposh_amp_render_top_courses_section( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'exclude'  => '',
			'title'    => '',
			'subtitle' => '',
		)
	);

	$catalog       = elearnposh_amp_get_top_courses_catalog();
	$current_key   = elearnposh_amp_top_courses_get_current_key( $catalog );
	$exclude       = is_string( $args['exclude'] ) && $args['exclude'] !== '' ? $args['exclude'] : $current_key;
	$courses       = array();
	$current_path  = elearnposh_amp_top_courses_get_current_path();
	$title         = $args['title'];
	$subtitle      = $args['subtitle'];

	if ( ! $title ) {
		$title = $exclude
			? __( 'Our Other Solutions', 'elearnposh-amp' )
			: __( 'Our Top Courses', 'elearnposh-amp' );
	}

	foreach ( $catalog as $key => $course ) {
		if ( $exclude && $key === $exclude ) {
			continue;
		}

		$course_path = isset( $course['url'] ) ? wp_parse_url( $course['url'], PHP_URL_PATH ) : '';
		if ( $current_path && is_string( $course_path ) && $current_path === untrailingslashit( $course_path ) ) {
			continue;
		}

		$courses[ $key ] = $course;
	}

	if ( empty( $courses ) ) {
		return;
	}

	if ( ! $subtitle ) {
		$phrases = array();
		foreach ( $courses as $course ) {
			$phrases[] = $course['subtitle_phrase'];
		}
		$subtitle = elearnposh_amp_build_top_courses_subtitle( $phrases );
	}
	?>
	<section class="pfe-section-sm" id="pfe-top-courses">
		<div class="pfe-wrap">
			<h2 class="pfe-title"><?php echo esc_html( $title ); ?></h2>
			<p class="pfe-sub pfe-sub-wide"><?php echo esc_html( $subtitle ); ?></p>
			<div class="course-showcase__grid">
				<?php foreach ( $courses as $course ) : ?>
				<article class="course-showcase__item">
					<div class="course-showcase__card">
						<a href="<?php echo esc_url( elearnposh_amp_top_courses_amp_url( $course['url'] ) ); ?>" class="course-showcase__image">
							<amp-img
								src="<?php echo esc_url( $course['image'] ); ?>"
								alt="<?php echo esc_attr( $course['alt'] ); ?>"
								width="640"
								height="400"
								layout="responsive"
							></amp-img>
						</a>
						<span class="course-showcase__category course-showcase__category--<?php echo esc_attr( $course['category'] ); ?>"><?php echo esc_html( $course['category_label'] ); ?></span>
						<div class="course-showcase__body">
							<h3><?php echo esc_html( $course['title'] ); ?></h3>
							<?php if ( ! empty( $course['description'] ) ) : ?>
							<p class="course-showcase__desc"><?php echo esc_html( $course['description'] ); ?></p>
							<?php endif; ?>
							<a href="<?php echo esc_url( elearnposh_amp_top_courses_amp_url( $course['url'] ) ); ?>" class="course-showcase__cta"><?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?></a>
						</div>
					</div>
				</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php
}
