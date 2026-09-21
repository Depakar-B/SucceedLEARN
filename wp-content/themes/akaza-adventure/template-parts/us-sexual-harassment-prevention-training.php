<?php
/**
 * US Sexual Harassment Prevention Training page content wrapper.
 *
 * Add new section template-parts below the hero as you paste them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-us-harassment-page">
	<?php get_template_part( 'template-parts/us-sexual-harassment-prevention-training/sl-us-harassment-hero' ); ?>
	<?php get_template_part( 'template-parts/us-sexual-harassment-prevention-training/sl-us-harassment-coverage' ); ?>
	<?php get_template_part( 'template-parts/us-sexual-harassment-prevention-training/sl-us-harassment-requirements' ); ?>
	<?php get_template_part( 'template-parts/us-sexual-harassment-prevention-training/sl-us-harassment-learning-paths' ); ?>
	<?php get_template_part( 'template-parts/us-sexual-harassment-prevention-training/sl-us-harassment-workplace' ); ?>
	<?php get_template_part( 'template-parts/us-sexual-harassment-prevention-training/sl-us-harassment-workforce' ); ?>
	<?php get_template_part( 'template-parts/us-sexual-harassment-prevention-training/sl-us-harassment-faq' ); ?>
	<?php get_template_part( 'template-parts/us-sexual-harassment-prevention-training/sl-us-harassment-contact' ); ?>
</main>
