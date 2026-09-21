<?php
/**
 * Defensive Driving course page wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-course-page sl-course-page--defensive-driving">
	<?php get_template_part( 'template-parts/courses/defensive-driving/hero' ); ?>
	<?php get_template_part( 'template-parts/courses/defensive-driving/highlights' ); ?>
	<?php get_template_part( 'template-parts/courses/defensive-driving/risk-overview' ); ?>
	<?php get_template_part( 'template-parts/courses/defensive-driving/curriculum' ); ?>
	<?php get_template_part( 'template-parts/courses/defensive-driving/learning' ); ?>
	<?php get_template_part( 'template-parts/courses/defensive-driving/localisation' ); ?>
	<?php get_template_part( 'template-parts/courses/defensive-driving/audience' ); ?>
	<?php get_template_part( 'template-parts/courses/defensive-driving/delivery' ); ?>
	<?php get_template_part( 'template-parts/courses/defensive-driving/faq' ); ?>
	<?php get_template_part( 'template-parts/courses/defensive-driving/cta' ); ?>
</main>
