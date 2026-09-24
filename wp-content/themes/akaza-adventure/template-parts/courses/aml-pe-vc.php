<?php
/**
 * AML Training for PE/VC course page wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-course-page sl-course-page--aml-pe-vc">
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/hero' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-individuals' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-organisations' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-pevc-suite' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-fcp-suite' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-overview' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-learning-outcomes' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-laws' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-due-diligence' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-interactive' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-assessment' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-faq' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-cta' ); ?>
	<?php get_template_part( 'template-parts/courses/aml-pe-vc/sl-aml-pe-vc-contact' ); ?>
</main>
