<?php
/**
 * S-Phish page content wrapper.
 *
 * Add new section template-parts below the hero as you create them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-s-phish-page">
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-hero' ); ?>
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-why' ); ?>
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-meet' ); ?>
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-works' ); ?>
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-learning' ); ?>
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-targeting' ); ?>
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-reporting' ); ?>
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-security-awareness' ); ?>
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-security-teams' ); ?>
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-suite' ); ?>
	<?php get_template_part( 'template-parts/s-phish-phishing-simulation/sl-s-phish-comparison' ); ?>
</main>
