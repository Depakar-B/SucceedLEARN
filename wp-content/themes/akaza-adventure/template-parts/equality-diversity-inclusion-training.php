<?php
/**
 * Equality, Diversity and Inclusion Training page content.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course = function_exists( 'akaza_get_inclusive_course' ) ? akaza_get_inclusive_course( 'edi' ) : null;
if ( ! $course ) {
	return;
}
?>
<main id="main-content" class="sl-iwc-page">
	<?php get_template_part( 'template-parts/inclusive-course/hero', null, array( 'course' => $course ) ); ?>
	<?php get_template_part( 'template-parts/home/clients' ); ?>
	<?php get_template_part( 'template-parts/inclusive-course/covers', null, array( 'course' => $course ) ); ?>
	<?php get_template_part( 'template-parts/inclusive-course/related', null, array( 'course_id' => 'edi' ) ); ?>
	<?php get_template_part( 'template-parts/inclusive-course/contact', null, array( 'course' => $course ) ); ?>
</main>
