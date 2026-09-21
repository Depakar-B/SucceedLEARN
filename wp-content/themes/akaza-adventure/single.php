<?php
/**
 * Single post — blog and newsletter articles.
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	$is_newsletter = function_exists( 'akaza_is_newsletter_post' ) && akaza_is_newsletter_post( get_the_ID() );

	get_template_part(
		'template-parts/single-post',
		null,
		array(
			'is_newsletter' => $is_newsletter,
		)
	);
endwhile;

get_footer();
