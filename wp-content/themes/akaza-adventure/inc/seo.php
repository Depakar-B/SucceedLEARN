<?php
/**
 * Extracted from functions.php (inc\seo.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Whether Rank Math owns SEO output (titles, meta, schema, sitemap).
 *
 * @return bool
 */
function akaza_rank_math_active() {
	return defined( 'RANK_MATH_VERSION' );
}

/**
 * Clean document titles (fallback only when Rank Math is not active).
 *
 * @param array $parts Title parts.
 * @return array
 */
function akaza_document_title( $parts ) {
	if ( akaza_rank_math_active() ) {
		return $parts;
	}

	if ( is_front_page() || is_page_template( 'page-templates/homepage-fast.php' ) ) {
		$parts['title']   = 'SucceedLEARN | Global Compliance & Security Training';
		$parts['tagline'] = '';
	} elseif ( ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) || ( function_exists( 'learn_press_is_courses' ) && learn_press_is_courses() ) ) {
		$parts['title']   = 'Courses | SucceedLEARN Compliance Training';
		$parts['tagline'] = '';
	} elseif ( function_exists( 'learn_press_is_course' ) && learn_press_is_course() ) {
		$parts['tagline'] = 'SucceedLEARN Course';
	} elseif ( is_page_template( 'page-templates/page-solutions.php' ) ) {
		$parts['title']   = 'Solutions | SucceedLEARN';
		$parts['tagline'] = '';
	} elseif ( is_page_template( 'page-templates/page-about.php' ) ) {
		$parts['title']   = 'About Us | SucceedLEARN';
		$parts['tagline'] = '';
	} elseif ( is_page_template( 'page-templates/page-contact.php' ) ) {
		$parts['title']   = 'Contact Us | SucceedLEARN';
		$parts['tagline'] = '';
	} elseif ( is_page_template( 'page-templates/privacy-policy.php' ) ) {
		$parts['title']   = 'Privacy Policy | SucceedLEARN';
		$parts['tagline'] = '';
	} elseif ( is_page_template( 'page-templates/terms-and-conditions.php' ) ) {
		$parts['title']   = 'Terms and Conditions | SucceedLEARN';
		$parts['tagline'] = '';
	} elseif ( is_page_template( 'page-templates/s-phish-report.php' ) ) {
		$parts['title']   = 'S-PhishReport | SucceedLEARN';
		$parts['tagline'] = '';
	}
	return $parts;
}
add_filter( 'document_title_parts', 'akaza_document_title' );

/**
 * SEO meta + Open Graph + Twitter + JSON-LD.
 * Skips when Rank Math is active so meta/canonical/schema are not duplicated.
 */
function akaza_seo_head() {
	if ( akaza_rank_math_active() ) {
		return;
	}

	$url       = home_url( '/' );
	$site_name = 'SucceedLEARN';
	$image     = AKAZA_URI . '/assets/images/hero.jpg';
	$title     = '';
	$description = '';
	$schema    = null;

	if ( is_front_page() || is_page_template( 'page-templates/homepage-fast.php' ) ) {
		$title       = 'SucceedLEARN | Global Compliance & Security Training';
		$description = 'Global compliance and security awareness training employees actually remember. Measurable behaviour change, audit-ready reporting, and one platform for workplace learning.';
		$url         = home_url( '/' );
		$schema      = akaza_schema_homepage( $url, $title, $description, $image );
	} elseif ( function_exists( 'learn_press_is_course' ) && learn_press_is_course() ) {
		$course_id   = get_the_ID();
		$title       = get_the_title( $course_id ) . ' | SucceedLEARN';
		$description = wp_strip_all_tags( get_the_excerpt( $course_id ) );
		if ( ! $description ) {
			$description = wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $course_id ) ), 40 );
		}
		$url   = get_permalink( $course_id );
		$thumb = get_the_post_thumbnail_url( $course_id, 'akaza-course-hero' );
		if ( $thumb ) {
			$image = $thumb;
		}
		$schema = akaza_schema_course( $course_id, $url, $title, $description, $image );
	} elseif ( ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) || ( function_exists( 'learn_press_is_courses' ) && learn_press_is_courses() ) ) {
		$title       = 'Courses | SucceedLEARN Compliance Training';
		$description = 'Browse SucceedLEARN compliance and security awareness courses. Engaging training with measurable outcomes for modern organisations.';
		$url         = get_post_type_archive_link( akaza_course_post_type() ) ? get_post_type_archive_link( akaza_course_post_type() ) : home_url( '/courses/' );
		$schema      = akaza_schema_course_list( $url, $title, $description );
	} elseif ( is_page() ) {
		$title       = get_the_title() . ' | SucceedLEARN';
		$description = has_excerpt() ? wp_strip_all_tags( get_the_excerpt() ) : wp_trim_words( wp_strip_all_tags( get_the_content() ), 40 );
		if ( ! $description ) {
			$description = 'SucceedLEARN â€” global compliance and security training.';
		}
		$url = get_permalink();
	} else {
		return;
	}

	echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">' . "\n";
	echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
	echo '<link rel="sitemap" type="application/xml" title="Sitemap" href="' . esc_url( home_url( '/akaza-sitemap.xml' ) ) . '">' . "\n";

	echo '<meta property="og:locale" content="en_US">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:site_name" content="' . esc_attr( $site_name ) . '">' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";

	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";

	if ( $schema ) {
		echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}
}
add_action( 'wp_head', 'akaza_seo_head', 2 );

/**
 * Homepage schema graph.
 *
 * @param string $url URL.
 * @param string $title Title.
 * @param string $description Description.
 * @param string $image Image.
 * @return array
 */
function akaza_schema_homepage( $url, $title, $description, $image ) {
	return array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'  => 'Organization',
				'@id'    => $url . '#organization',
				'name'   => 'SucceedLEARN',
				'url'    => $url,
				'logo'   => array(
					'@type' => 'ImageObject',
					'url'   => AKAZA_URI . '/assets/images/logo-mark.svg',
				),
				'email'  => 'sales@succeedtech.com',
				'sameAs' => array(
					'https://www.linkedin.com/company/succeedlearn',
					'https://www.youtube.com/@succeedlearn',
				),
			),
			array(
				'@type'           => 'WebSite',
				'@id'             => $url . '#website',
				'url'             => $url,
				'name'            => 'SucceedLEARN',
				'description'     => $description,
				'publisher'       => array( '@id' => $url . '#organization' ),
				'inLanguage'      => 'en-US',
				'potentialAction' => array(
					'@type'       => 'SearchAction',
					'target'      => $url . '?s={search_term_string}',
					'query-input' => 'required name=search_term_string',
				),
			),
			array(
				'@type'       => 'WebPage',
				'@id'         => $url . '#webpage',
				'url'         => $url,
				'name'        => $title,
				'isPartOf'    => array( '@id' => $url . '#website' ),
				'about'       => array( '@id' => $url . '#organization' ),
				'description' => $description,
				'inLanguage'  => 'en-US',
				'primaryImageOfPage' => array(
					'@type' => 'ImageObject',
					'url'   => $image,
				),
			),
		),
	);
}

/**
 * Single course schema.
 *
 * @param int    $course_id Course ID.
 * @param string $url URL.
 * @param string $title Title.
 * @param string $description Description.
 * @param string $image Image.
 * @return array
 */
function akaza_schema_course( $course_id, $url, $title, $description, $image ) {
	$course = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'Course',
		'name'        => get_the_title( $course_id ),
		'description' => $description,
		'url'         => $url,
		'image'       => $image,
		'provider'    => array(
			'@type' => 'Organization',
			'name'  => 'SucceedLEARN',
			'url'   => home_url( '/' ),
		),
	);

	if ( function_exists( 'learn_press_get_course' ) ) {
		$lp = learn_press_get_course( $course_id );
		if ( $lp ) {
			$price = method_exists( $lp, 'get_price' ) ? $lp->get_price() : '';
			if ( '' !== $price && null !== $price ) {
				$course['offers'] = array(
					'@type'         => 'Offer',
					'price'         => (float) $price,
					'priceCurrency' => 'USD',
					'availability'  => 'https://schema.org/InStock',
					'url'           => $url,
				);
			}
		}
	}

	return $course;
}

/**
 * Course archive ItemList schema.
 *
 * @param string $url URL.
 * @param string $title Title.
 * @param string $description Description.
 * @return array
 */
function akaza_schema_course_list( $url, $title, $description ) {
	$items = array();
	$query = new WP_Query(
		array(
			'post_type'      => akaza_course_post_type(),
			'posts_per_page' => 20,
			'post_status'    => 'publish',
			'no_found_rows'  => true,
		)
	);
	$pos = 1;
	while ( $query->have_posts() ) {
		$query->the_post();
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $pos,
			'url'      => get_permalink(),
			'name'     => get_the_title(),
		);
		$pos++;
	}
	wp_reset_postdata();

	return array(
		'@context'        => 'https://schema.org',
		'@type'           => 'CollectionPage',
		'name'            => $title,
		'description'     => $description,
		'url'             => $url,
		'mainEntity'      => array(
			'@type'           => 'ItemList',
			'itemListElement' => $items,
		),
	);
}
