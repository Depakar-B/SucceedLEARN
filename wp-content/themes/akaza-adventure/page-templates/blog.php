<?php
/**
 * Template Name: Blog
 * Template Post Type: page
 * Description: Blog listing with card grid, filters, and load more.
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

get_header();

$sort       = isset( $_GET['sort'] ) ? sanitize_key( wp_unslash( $_GET['sort'] ) ) : 'newest'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
$allowed    = array( 'newest', 'oldest', 'a-z', 'z-a' );
$sort       = in_array( $sort, $allowed, true ) ? $sort : 'newest';
$posts      = akaza_get_blog_posts( $sort );
$categories = akaza_get_blog_categories();

get_template_part(
	'template-parts/blog',
	null,
	array(
		'posts'      => $posts,
		'categories' => $categories,
		'sort'       => $sort,
	)
);

get_footer();
