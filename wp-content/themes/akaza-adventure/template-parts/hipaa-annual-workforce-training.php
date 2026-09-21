<?php
/**
 * HIPAA Annual Workforce Training page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-hipaa-page">
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/sl-hipaa-hero' ); ?>
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/sl-hipaa-trust' ); ?>
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/stats' ); ?>
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/sl-hipaa-problem' ); ?>
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/sl-hipaa-audit' ); ?>
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/sl-hipaa-outline' ); ?>
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/sl-hipaa-audience' ); ?>
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/sl-hipaa-penalties' ); ?>
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/sl-hipaa-comparison' ); ?>
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/sl-hipaa-why-us' ); ?>
	<?php get_template_part( 'template-parts/hipaa-annual-workforce-training/sl-hipaa-faq' ); ?>
</main>
