<?php
/**
 * Single course — Akaza Adventure override.
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

get_header( 'course' );

do_action( 'learn-press/before-main-content' );
do_action( 'learn-press/before-main-content-single-course' );

$rendered = false;

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/single', 'course' );
		$rendered = true;
	}
}

if ( ! $rendered && defined( 'LP_COURSE_CPT' ) ) {
	$args = array(
		'name'        => get_query_var( LP_COURSE_CPT ),
		'post_type'   => LP_COURSE_CPT,
		'numberposts' => 1,
		'post_status' => 'any',
	);

	if ( isset( $_REQUEST['preview'] ) && ( isset( $_REQUEST['p'] ) || isset( $_REQUEST['preview_id'] ) ) ) {
		unset( $args['name'] );
		$args['include'] = isset( $_REQUEST['p'] ) ? array( (int) $_REQUEST['p'] ) : array( (int) $_REQUEST['preview_id'] );
	}

	$posts = get_posts( $args );
	$post  = $posts[0] ?? null;

	if ( $post instanceof WP_Post ) {
		if ( 'publish' !== $post->post_status && ( ! current_user_can( 'manage_options' ) && get_current_user_id() !== (int) $post->post_author ) ) {
			get_template_part( '404' );
		} else {
			setup_postdata( $post );
			get_template_part( 'template-parts/single', 'course' );
			wp_reset_postdata();
		}
	}
}

do_action( 'learn-press/after-main-content-single-course' );
do_action( 'learn-press/after-main-content' );

get_footer( 'course' );
