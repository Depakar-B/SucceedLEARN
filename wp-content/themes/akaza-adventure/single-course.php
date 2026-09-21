<?php
/**
 * Single course — WordPress template for course / lp_course post types.
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$mapped_template_part = function_exists( 'akaza_get_mapped_course_template_part' ) ? akaza_get_mapped_course_template_part() : '';
$use_mapped_template  = '' !== $mapped_template_part;

if ( $use_mapped_template ) {
	get_header();
} else {
	get_header( 'course' );
}

while ( have_posts() ) :
	the_post();
	if ( $use_mapped_template ) {
		get_template_part( $mapped_template_part );
	} else {
		get_template_part( 'template-parts/single', 'course' );
	}
endwhile;

if ( $use_mapped_template ) {
	get_footer();
} else {
	get_footer( 'course' );
}
