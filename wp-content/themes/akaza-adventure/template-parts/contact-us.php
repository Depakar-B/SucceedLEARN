<?php
/**
 * Contact Us page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-contact-page">
	<?php get_template_part( 'template-parts/contact-us/hero' ); ?>
	<?php get_template_part( 'template-parts/home/contact-form' ); ?>
	<?php get_template_part( 'template-parts/home/stats' ); ?>
	<?php get_template_part( 'template-parts/home/clients' ); ?>
	<?php get_template_part( 'template-parts/global/solutions-carousel' ); ?>
</main>
