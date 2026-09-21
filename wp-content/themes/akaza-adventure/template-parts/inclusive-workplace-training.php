<?php
/**
 * Inclusive Workplace Training page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-inclusive-training-page">
	<?php get_template_part( 'template-parts/inclusive-workplace-training/hero' ); ?>
	<?php get_template_part( 'template-parts/home/stats' ); ?>
	<?php get_template_part( 'template-parts/home/clients' ); ?>
	<?php get_template_part( 'template-parts/inclusive-workplace-training/modules-overview' ); ?>
	<?php get_template_part( 'template-parts/inclusive-workplace-training/what-is-inclusive' ); ?>
	<?php get_template_part( 'template-parts/inclusive-workplace-training/why-training' ); ?>
	<?php get_template_part( 'template-parts/inclusive-workplace-training/courses' ); ?>
	<?php get_template_part( 'template-parts/inclusive-workplace-training/choose-training' ); ?>
	<?php get_template_part( 'template-parts/inclusive-workplace-training/customise' ); ?>
	<?php get_template_part( 'template-parts/inclusive-workplace-training/global-workforce' ); ?>
	<?php get_template_part( 'template-parts/inclusive-workplace-training/followthrough' ); ?>
	<?php get_template_part( 'template-parts/inclusive-workplace-training/faq' ); ?>
	<?php get_template_part( 'template-parts/inclusive-workplace-training/cta' ); ?>
</main>
