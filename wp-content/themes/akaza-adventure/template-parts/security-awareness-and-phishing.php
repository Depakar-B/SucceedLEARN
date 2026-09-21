<?php
/**
 * Security Awareness and Phishing page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-sap-page">
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-hero' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-platform' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-security-behaviour-suite' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-behaviour' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-lifecycle' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-achieve' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-leadership' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-annual-training' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-process' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-comparison' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-faq' ); ?>
	<?php get_template_part( 'template-parts/security-awareness-and-phishing/sl-sa-contact' ); ?>
</main>
