<?php
/**
 * Homepage content (Figma: Website - Home - 01).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><main id="main-content">
	<?php get_template_part( 'template-parts/home/hero' ); ?>

	<?php get_template_part( 'template-parts/home/stats' ); ?>

	<?php get_template_part( 'template-parts/home/clients' ); ?>

	<?php get_template_part( 'template-parts/home/todays-challenges' ); ?>

	<?php get_template_part( 'template-parts/home/the-solutions' ); ?>

	<?php get_template_part( 'template-parts/home/platform' ); ?>

	<?php get_template_part( 'template-parts/home/feature-product-section' ); ?>

	<?php get_template_part( 'template-parts/home/outcomes' ); ?>

	<?php get_template_part( 'template-parts/home/Getting-Started-Section' ); ?>

	<?php get_template_part( 'template-parts/home/cta-section' ); ?>

	<?php get_template_part( 'template-parts/home/testimonials' ); ?>

	<?php get_template_part( 'template-parts/home/contact-form' ); ?>

</main>
