<?php
/**
 * Preventing the Facilitation of Tax Evasion Training course page wrapper.
 *
 * Add new section template-parts below the hero as you paste them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-course-page sl-course-page--tax-evasion-facilitation">
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-hero' ); ?>
	<?php
	get_template_part(
		'template-parts/global/course-buy-options',
		null,
		array(
			'course'   => __( 'Tax Evasion Prevention', 'akaza-adventure' ),
			'duration' => __( '30-minute duration', 'akaza-adventure' ),
			'contact'  => '#contact',
			'price'    => '$18',
		)
	);
	get_template_part(
		'template-parts/global/fcp-course-suite',
		null,
		array(
			'current' => 'tax-evasion',
			'contact' => '#contact',
		)
	);
	?>
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-risk' ); ?>
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-understanding' ); ?>
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-cfa' ); ?>
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-course-content' ); ?>
	<?php get_template_part( 'template-parts/financial-crime-prevention/sl-fcp-cpd' ); ?>
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-risk-assessment' ); ?>	
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-cycle' ); ?>
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-audience' ); ?>
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-interactive' ); ?>
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-why-succeedlearn' ); ?>
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-faq' ); ?>
	<?php get_template_part( 'template-parts/courses/tax-evasion-facilitation/sl-tax-evasion-contact' ); ?>

</main>
