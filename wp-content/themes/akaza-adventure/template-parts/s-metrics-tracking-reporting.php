<?php
/**
 * S-Metrics page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-s-metrics-page">
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-hero' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-why' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-dashboard' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-suite-reporting' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-insights' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-measure' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-features' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-suite' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-choose' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-comparison' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-faq' ); ?>
	<?php get_template_part( 'template-parts/s-metrics-tracking-reporting/sl-s-metrics-contact' ); ?>
</main>
