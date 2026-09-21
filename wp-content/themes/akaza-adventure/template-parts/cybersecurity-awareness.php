<?php
/**
 * Cybersecurity Awareness page content wrapper.
 *
 * Add new section template-parts below the hero as you paste them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="sl-csa-main" class="sl-csa-page">
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cybersecurity-awareness-hero' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cybersecurity-awareness-offer-strip' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cyber-awareness-offer' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cybersecurity-awareness-campaign' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cyber-awareness-readiness' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cybersecurity-phishcue' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cyber-awareness-integration' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cybersecurity-awareness-pricing' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cybersecurity-campaign-journey' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cybersecurity-campaign-measure' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cybersecurity-awareness-faq' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness/sl-cybersecurity-awareness-contact' ); ?>
</main>
