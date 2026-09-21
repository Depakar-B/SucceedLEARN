<?php
/**
 * UK Sexual Harassment Prevention Training page content wrapper.
 *
 * Add new section template-parts below the hero as you create them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-uk-harassment-page">
	<?php get_template_part( 'template-parts/uk-sexual-harassment-prevention-training/sl-uk-harassment-hero' ); ?>
	<?php get_template_part( 'template-parts/uk-sexual-harassment-prevention-training/sl-uk-sexual-harassment-action' ); ?>
	<?php get_template_part( 'template-parts/uk-sexual-harassment-prevention-training/sl-uk-sexual-harassment-prevention' ); ?>
	<?php get_template_part( 'template-parts/uk-sexual-harassment-prevention-training/sl-uk-sexual-harassment-learning' ); ?>
	<?php get_template_part( 'template-parts/uk-sexual-harassment-prevention-training/sl-uk-sexual-harassment-coverage' ); ?>
	<?php get_template_part( 'template-parts/uk-sexual-harassment-prevention-training/sl-uk-sexual-harassment-settings' ); ?>
	<?php get_template_part( 'template-parts/uk-sexual-harassment-prevention-training/sl-uk-sexual-harassment-customisation' ); ?>
	<?php get_template_part( 'template-parts/uk-sexual-harassment-prevention-training/sl-uk-sexual-harassment-faq' ); ?>
	<?php get_template_part( 'template-parts/uk-sexual-harassment-prevention-training/sl-uk-sexual-harassment-contact' ); ?>
</main>
