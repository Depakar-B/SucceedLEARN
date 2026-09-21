<?php
/**
 * Insider Trading eLearning course page wrapper.
 *
 * Add new section template-parts below the hero as you paste them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-course-page sl-course-page--insider-trading">
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-hero' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-risk' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-market-abuse' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-risk-cta' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-regulatory-frameworks' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-topics' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-buy-cta' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-interactive' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-audience' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-why' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-faq' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-contact' ); ?>

</main>
