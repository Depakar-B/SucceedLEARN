<?php
/**
 * Cybersecurity Awareness (UK) page content wrapper.
 * Same sections/UI as US; edit copy and payment links in the UK partials only.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="sl-csa-main" class="sl-csa-page sl-csa-page--uk">
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cybersecurity-awareness-hero' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cybersecurity-awareness-offer-strip' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cyber-awareness-offer' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cybersecurity-awareness-campaign' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cyber-awareness-readiness' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cybersecurity-phishcue' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cyber-awareness-integration' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cybersecurity-awareness-pricing' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cybersecurity-campaign-journey' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cybersecurity-campaign-measure' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cybersecurity-awareness-faq' ); ?>
	<?php get_template_part( 'template-parts/cybersecurity-awareness-uk/sl-cybersecurity-awareness-contact' ); ?>
</main>
