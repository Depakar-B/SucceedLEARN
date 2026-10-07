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
	<?php
	get_template_part(
		'template-parts/global/course-buy-options',
		null,
		array(
			'course'  => __( 'Insider Trading', 'akaza-adventure' ),
			'contact' => '#contact',
			'price'   => '$18',
		)
	);
	get_template_part(
		'template-parts/global/fcp-course-suite',
		null,
		array(
			'current' => 'insider-trading',
			'contact' => '#contact',
		)
	);
	?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-risk' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-regulatory-frameworks' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-other-jurisdictions' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-topics' ); ?>
	<?php get_template_part( 'template-parts/financial-crime-prevention/sl-fcp-cpd' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-audience' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-why' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-faq' ); ?>
	<?php get_template_part( 'template-parts/courses/insider-trading/sl-insider-trading-contact' ); ?>

</main>
