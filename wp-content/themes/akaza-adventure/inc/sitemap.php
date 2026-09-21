<?php
/**
 * Extracted from functions.php (inc\sitemap.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Basic XML sitemap for pages + courses when Rank Math is absent.
 */
function akaza_sitemap_rewrite() {
	if ( akaza_rank_math_active() ) {
		return;
	}
	add_rewrite_rule( '^akaza-sitemap\.xml$', 'index.php?akaza_sitemap=1', 'top' );
}
add_action( 'init', 'akaza_sitemap_rewrite' );

/**
 * Register sitemap query var.
 *
 * @param array $vars Vars.
 * @return array
 */
function akaza_sitemap_query_var( $vars ) {
	$vars[] = 'akaza_sitemap';
	return $vars;
}
add_filter( 'query_vars', 'akaza_sitemap_query_var' );

/**
 * Render basic sitemap (fallback only; Rank Math owns sitemap when active).
 */
function akaza_render_sitemap() {
	if ( akaza_rank_math_active() ) {
		return;
	}
	if ( ! intval( get_query_var( 'akaza_sitemap' ) ) ) {
		return;
	}

	header( 'Content-Type: application/xml; charset=UTF-8' );
	echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

	$urls = array( home_url( '/' ) );

	$pages = get_posts(
		array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => 100,
			'fields'         => 'ids',
		)
	);
	foreach ( $pages as $pid ) {
		$urls[] = get_permalink( $pid );
	}

	$courses = get_posts(
		array(
			'post_type'      => akaza_course_post_type(),
			'post_status'    => 'publish',
			'posts_per_page' => 200,
			'fields'         => 'ids',
		)
	);
	foreach ( $courses as $cid ) {
		$urls[] = get_permalink( $cid );
	}

	$archive = get_post_type_archive_link( akaza_course_post_type() );
	if ( $archive ) {
		$urls[] = $archive;
	}

	$urls = array_unique( array_filter( $urls ) );
	foreach ( $urls as $u ) {
		echo '  <url><loc>' . esc_url( $u ) . '</loc></url>' . "\n";
	}
	echo '</urlset>';
	exit;
}
add_action( 'template_redirect', 'akaza_render_sitemap' );
