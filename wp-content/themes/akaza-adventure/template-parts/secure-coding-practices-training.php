<?php
/**
 * Secure Coding Practices Training — page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-secure-coding-page">
	<?php get_template_part( 'template-parts/secure-coding/sl-sc-hero' ); ?>
	<?php get_template_part( 'template-parts/secure-coding/sl-sc-proof' ); ?>
	<?php get_template_part( 'template-parts/secure-coding/sl-sc-overview' ); ?>
	<?php get_template_part( 'template-parts/secure-coding/sl-sc-outcomes' ); ?>
	<?php get_template_part( 'template-parts/secure-coding/sl-sc-curriculum' ); ?>
	<?php get_template_part( 'template-parts/secure-coding/sl-sc-audience' ); ?>
	<?php get_template_part( 'template-parts/secure-coding/sl-sc-delivery' ); ?>
	<?php get_template_part( 'template-parts/secure-coding/sl-sc-frameworks' ); ?>
	<?php get_template_part( 'template-parts/secure-coding/sl-sc-faq' ); ?>
	<?php get_template_part( 'template-parts/secure-coding/sl-sc-contact' ); ?>
</main>
