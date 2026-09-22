<?php
/**
 * S-Sync page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-s-sync-page">
	<?php get_template_part( 'template-parts/s-sync-security-awareness/sl-s-sync-hero' ); ?>
	<?php get_template_part( 'template-parts/s-sync-security-awareness/sl-s-sync-why' ); ?>
	<?php get_template_part( 'template-parts/s-sync-security-awareness/sl-s-sync-integrations' ); ?>
	<?php get_template_part( 'template-parts/s-sync-security-awareness/sl-s-sync-choose' ); ?>
	<?php get_template_part( 'template-parts/s-sync-security-awareness/sl-s-sync-enterprise' ); ?>
	<?php get_template_part( 'template-parts/s-sync-security-awareness/sl-s-sync-suite' ); ?>
	<?php get_template_part( 'template-parts/s-sync-security-awareness/sl-s-sync-connect' ); ?>
	<?php get_template_part( 'template-parts/s-sync-security-awareness/sl-s-sync-contact' ); ?>
</main>
