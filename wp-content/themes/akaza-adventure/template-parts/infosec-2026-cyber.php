<?php
/**
 * Infosec 2026 Cyber page content wrapper.
 *
 * Add new section template-parts below the hero as you paste them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-infosec-2026-cyber-page">
	<?php get_template_part( 'template-parts/infosec-2026-cyber/sl-infosec-2026-cyber-hero' ); ?>
	<?php get_template_part( 'template-parts/infosec-2026-cyber/sl-infosec-2026-cyber-campaign' ); ?>
	<?php get_template_part( 'template-parts/infosec-2026-cyber/sl-infosec-2026-cyber-testing' ); ?>
	<?php get_template_part( 'template-parts/infosec-2026-cyber/sl-infosec-2026-cyber-challenge' ); ?>
	<?php get_template_part( 'template-parts/infosec-2026-cyber/sl-infosec-2026-campaign-works' ); ?>
	<?php get_template_part( 'template-parts/infosec-2026-cyber/sl-infosec-2026-understand' ); ?>
	<?php get_template_part( 'template-parts/infosec-2026-cyber/sl-infosec-2026-terms' ); ?>
	<?php get_template_part( 'template-parts/infosec-2026-cyber/sl-infosec-2026-contact' ); ?>
</main>
