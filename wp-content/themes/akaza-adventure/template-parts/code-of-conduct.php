<?php
/**
 * Code of Conduct page content wrapper.
 *
 * Add new section template-parts below the hero as you paste them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-coc-page">
	<?php get_template_part( 'template-parts/code-of-conduct/sl-code-of-conduct-hero' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-code-conduct-features' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-code-conduct-definition' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-code-conduct-matters' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-problem' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-coverage' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-emerging-risks' ); ?>
	<?php // get_template_part( 'template-parts/code-of-conduct/sl-coc-interactive' ); // Hidden — restore when section is ready. ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-decision' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-learning' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-customization' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-deployment' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-accessibility' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-reporting' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-audience' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-one-programme' ); ?>
	<?php // get_template_part( 'template-parts/code-of-conduct/sl-coc-buyer-personas' ); // Replaced by sl-coc-one-programme diagram. ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-industries' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-differentiation' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-stats' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-customer-story' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-faq' ); ?>
	<?php get_template_part( 'template-parts/code-of-conduct/sl-coc-contact' ); ?>
</main>
