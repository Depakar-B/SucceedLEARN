<?php
/**
 * Anti-Bribery and Anti-Corruption eLearning course page wrapper.
 *
 * Add new section template-parts below the hero as you paste them.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-course-page sl-course-page--anti-bribery-anti-corruption">
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-anti-bribery-hero' ); ?>
	<?php
	get_template_part(
		'template-parts/global/course-buy-options',
		null,
		array(
			'course'   => 'ABAC',
			'duration' => __( '30-minute duration', 'akaza-adventure' ),
			'contact'  => '#contact',
		)
	);
	get_template_part(
		'template-parts/global/fcp-course-suite',
		null,
		array(
			'current' => 'abac',
			'contact' => '#contact',
		)
	);
	?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-anti-bribery-overview' ); ?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-anti-bribery-learning-outcomes' ); ?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-anti-bribery-topics' ); ?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-abac-scenario-showcase' ); ?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-anti-bribery-decision-journey' ); ?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-abac-delivery-options' ); ?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-abac-target-audience' ); ?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-abac-laws-covered' ); ?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-abac-compliance-library' ); ?>
	<?php get_template_part( 'template-parts/financial-crime-prevention/sl-fcp-cpd' ); ?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-abac-faq' ); ?>
	<?php get_template_part( 'template-parts/courses/anti-bribery-anti-corruption/sl-abac-contact' ); ?>

</main>
