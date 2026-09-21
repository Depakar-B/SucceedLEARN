<?php
/**
 * Theme search results page — query scope + assets.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once AKAZA_DIR . '/lib/ep-site-search.php';

/**
 * Scope main search query to public content types.
 *
 * @param WP_Query $query Query.
 */
function akaza_search_pre_get_posts( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! $query->is_search() ) {
		return;
	}

	$s = $query->get( 's' );
	if ( ep_site_search_is_trivial_query( (string) $s ) ) {
		// Force an empty result set for stopword-only / empty queries.
		$query->set( 'post__in', array( 0 ) );
		return;
	}

	$query->set( 'post_type', ep_site_search_post_types() );
	$query->set( 'post_status', 'publish' );
	$query->set( 'posts_per_page', 12 );
	$query->set( 'orderby', 'relevance' );

	$excluded = ep_site_search_excluded_ids();
	if ( ! empty( $excluded ) ) {
		$existing = $query->get( 'post__not_in' );
		$existing = is_array( $existing ) ? $existing : array();
		$query->set( 'post__not_in', array_values( array_unique( array_merge( $existing, $excluded ) ) ) );
	}
}
add_action( 'pre_get_posts', 'akaza_search_pre_get_posts' );

/**
 * Body class for search results styling.
 *
 * @param string[] $classes Classes.
 * @return string[]
 */
function akaza_search_body_class( $classes ) {
	if ( is_search() ) {
		$classes[] = 'sl-search-page';
	}
	return $classes;
}
add_filter( 'body_class', 'akaza_search_body_class' );

/**
 * Enqueue search results CSS.
 */
function akaza_enqueue_search_assets() {
	if ( ! is_search() ) {
		return;
	}

	$path = AKAZA_DIR . '/assets/css/search-results.css';
	wp_enqueue_style(
		'akaza-search-results',
		AKAZA_URI . '/assets/css/search-results.css',
		array( 'akaza-main' ),
		file_exists( $path ) ? (string) filemtime( $path ) : AKAZA_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'akaza_enqueue_search_assets', 25 );

/**
 * Format current main-query posts for the search template.
 *
 * @return array
 */
function akaza_get_search_result_rows() {
	$rows = array();

	if ( ! have_posts() ) {
		return $rows;
	}

	while ( have_posts() ) {
		the_post();
		$post = get_post();
		if ( $post instanceof WP_Post ) {
			$rows[] = ep_site_search_format_result( $post );
		}
	}

	rewind_posts();

	$query = get_search_query();
	if ( $query && count( $rows ) > 1 ) {
		// Re-rank only the current page of results for cleaner title matches.
		$posts = array();
		foreach ( $rows as $row ) {
			$p = get_post( $row['id'] );
			if ( $p instanceof WP_Post ) {
				$posts[] = $p;
			}
		}
		$ranked = ep_site_search_rank_posts( $posts, $query );
		$rows   = array();
		foreach ( $ranked as $post ) {
			$rows[] = ep_site_search_format_result( $post );
		}
	}

	return $rows;
}
