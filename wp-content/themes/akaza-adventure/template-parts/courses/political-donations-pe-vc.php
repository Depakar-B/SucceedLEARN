<?php
/**
 * Political Donations Training for PE/VC course page wrapper.
 *
 * Add new section template-parts below the hero as you paste them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-course-page sl-course-page--political-donations-pe-vc">
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-hero' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-individuals' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-organisations' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-pevc-suite' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-cpd' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-context' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-overview' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-regulatory-context' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-learning-outcomes' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-activity' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-inside' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-practical' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-audience' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-why' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-faq' ); ?>
	<?php get_template_part( 'template-parts/courses/political-donations-pe-vc/sl-political-donations-contact' ); ?>
</main>
