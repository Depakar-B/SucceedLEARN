<?php
/**
 * Search results template.
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

get_header();

$query   = get_search_query();
$trivial = function_exists( 'ep_site_search_is_trivial_query' ) && ep_site_search_is_trivial_query( $query );
$results = ( ! $trivial && function_exists( 'akaza_get_search_result_rows' ) ) ? akaza_get_search_result_rows() : array();
$total   = ( ! $trivial && isset( $GLOBALS['wp_query'] ) && $GLOBALS['wp_query'] instanceof WP_Query )
	? (int) $GLOBALS['wp_query']->found_posts
	: 0;

get_template_part(
	'template-parts/search-results',
	null,
	array(
		'query'   => $query,
		'results' => $results,
		'total'   => $total,
		'trivial' => $trivial,
	)
);

get_footer();
