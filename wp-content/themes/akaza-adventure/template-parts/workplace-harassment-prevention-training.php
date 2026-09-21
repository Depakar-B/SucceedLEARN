<?php
/**
 * Workplace Harassment Prevention Training page content wrapper.
 *
 * Add new section template-parts below the hero as you paste them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-whp-page">
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-whp-hero' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-whp-regions' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-whp-region-specific' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-harassment-training' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-harassment-regional-training' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-harassment-course-selection' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-whpt-recognition' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-harassment-learning' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-harassment-policy-learning' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-harassment-delivery' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-harassment-why' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-harassment-prevention' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-workplace-harassment-faq' ); ?>
	<?php get_template_part( 'template-parts/workplace-harassment-prevention-training/sl-workplace-harassment-contact' ); ?>
	</main>
