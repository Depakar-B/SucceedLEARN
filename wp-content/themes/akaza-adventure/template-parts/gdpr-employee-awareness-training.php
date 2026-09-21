<?php
/**
 * GDPR Employee Awareness Training page content wrapper.
 *
 * Add new section template-parts below the hero as you paste them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-gdpr-page">
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/sl-gdpr-hero' ); ?>
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/sl-gdpr-trust' ); ?>
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/gdpr-everyday-risk' ); ?>
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/sl-gdpr-reasons' ); ?>
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/sl-gdpr-coverage' ); ?>
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/sl-gdpr-course-modules' ); ?>
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/sl-gdpr-sales-marketing' ); ?>
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/sl-gdpr-completion-proof' ); ?>
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/sl-gdpr-format-delivery' ); ?>
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/sl-gdpr-faq' ); ?>
	<?php get_template_part( 'template-parts/gdpr-employee-awareness-training/sl-gdpr-request-preview' ); ?>
</main>
