<?php
/**
 * Information Security Awareness Training page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-isat-page">
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-hero' ); ?>
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-why' ); ?>
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-learn' ); ?>
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-modules' ); ?>
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-designed' ); ?>
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-topics' ); ?>
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-action' ); ?>
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-choose' ); ?>
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-audience' ); ?>
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-faq' ); ?>
	<?php get_template_part( 'template-parts/information-security-awareness-training/sl-isat-contact' ); ?>
</main>
