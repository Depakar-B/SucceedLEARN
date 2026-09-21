<?php
/**
 * Shared AMP list/page shell — same bootstrap as newsletter-list.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

remove_all_actions( 'the_content' );
remove_all_actions( 'amp_post_template_content' );
remove_all_actions( 'ampforwp_content' );
remove_all_actions( 'amp_post_template_data' );
remove_all_actions( 'amp_post_template_above_content' );
remove_all_actions( 'amp_post_template_below_content' );

global $wp_query;
status_header( 200 );
if ( isset( $wp_query ) ) {
	$wp_query->is_404      = false;
	$wp_query->is_search   = false;
	$wp_query->is_archive  = false;
	$wp_query->found_posts = 1;
	$wp_query->post_count  = 0;
}
