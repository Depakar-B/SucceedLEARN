<?php
/**
 * S-Signs page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-s-signs-page">
	<?php get_template_part( 'template-parts/s-signs-security-awareness/sl-s-signs-hero' ); ?>
	<?php get_template_part( 'template-parts/s-signs-security-awareness/sl-s-signs-why' ); ?>
	<?php get_template_part( 'template-parts/s-signs-security-awareness/sl-s-signs-library' ); ?>
	<?php get_template_part( 'template-parts/s-signs-security-awareness/sl-s-signs-filtering' ); ?>
	<?php get_template_part( 'template-parts/s-signs-security-awareness/sl-s-signs-nudges' ); ?>
	<?php get_template_part( 'template-parts/s-signs-security-awareness/sl-s-signs-distribution' ); ?>
	<?php get_template_part( 'template-parts/s-signs-security-awareness/sl-s-signs-choose' ); ?>
	<?php get_template_part( 'template-parts/s-signs-security-awareness/sl-s-signs-suite' ); ?>
	<?php get_template_part( 'template-parts/s-signs-security-awareness/sl-s-signs-reinforce' ); ?>
	<?php get_template_part( 'template-parts/s-signs-security-awareness/sl-s-signs-contact' ); ?>
</main>
