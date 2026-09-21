<?php
/**
 * Template Name: Newsletter
 * Template Post Type: page
 * Description: Newsletter listing with card grid, year filter, and load more.
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

get_header();

$sort    = isset( $_GET['sort'] ) ? sanitize_key( wp_unslash( $_GET['sort'] ) ) : 'newest'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
$allowed = array( 'newest', 'oldest', 'a-z', 'z-a' );
$sort    = in_array( $sort, $allowed, true ) ? $sort : 'newest';
$posts   = akaza_get_newsletter_posts( $sort );
$years   = akaza_get_newsletter_years( $posts );

get_template_part(
	'template-parts/newsletter',
	null,
	array(
		'posts' => $posts,
		'years' => $years,
		'sort'  => $sort,
	)
);

get_footer();
