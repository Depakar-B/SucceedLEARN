<?php
/**
 * Category archive — blog card grid scoped to one topic.
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$term = get_queried_object();
if ( ! ( $term instanceof WP_Term ) || ! function_exists( 'akaza_is_blog_category' ) || ! akaza_is_blog_category() ) {
	get_header();
	get_footer();
	return;
}

get_header();

$sort    = isset( $_GET['sort'] ) ? sanitize_key( wp_unslash( $_GET['sort'] ) ) : 'newest'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
$allowed = array( 'newest', 'oldest', 'a-z', 'z-a' );
$sort    = in_array( $sort, $allowed, true ) ? $sort : 'newest';
$posts   = function_exists( 'akaza_get_blog_posts_for_category' )
	? akaza_get_blog_posts_for_category( (int) $term->term_id, $sort )
	: array();

get_template_part(
	'template-parts/blog',
	null,
	array(
		'posts'               => $posts,
		'categories'          => array(),
		'sort'                => $sort,
		'term'                => $term,
		'hide_category_pills' => true,
	)
);

get_footer();
