<?php
/**
 * Modern Slavery Awareness Training course page wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_schema = array(
	'@context'         => 'https://schema.org',
	'@type'            => 'Course',
	'name'             => 'Modern Slavery Awareness',
	'description'      => 'UK-focused Modern Slavery Awareness Training covering modern slavery, warning signs, reporting and escalation, procurement and supply-chain risk.',
	'provider'         => array(
		'@type' => 'Organization',
		'name'  => 'SucceedLEARN',
	),
	'inLanguage'       => 'en-GB',
	'educationalLevel' => 'Professional',
	'teaches'          => array(
		'What modern slavery is',
		'Forms of modern slavery',
		'Recognising warning signs',
		'Reporting and escalation',
		'Procurement and vendor risk',
		'Supply-chain risk',
	),
);

$parts = array(
	'sl-msa-hero',
	'sl-msa-overview',
	'sl-msa-why-it-matters',
	'sl-msa-audience',
	'sl-msa-learning-outcomes',
	'cpd',
	'sl-msa-inside-course',
	'sl-msa-uk-law',
	'sl-msa-procurement',
	'sl-msa-reporting',
	'sl-msa-faq',
	'sl-msa-sales-band',
	'sl-msa-buy-course',
);
?>
<main id="main-content" class="sl-course-page sl-course-page--modern-slavery-awareness">
	<script type="application/ld+json"><?php echo wp_json_encode( $course_schema, JSON_UNESCAPED_SLASHES ); ?></script>
	<div class="msa-page">
		<?php foreach ( $parts as $part ) : ?>
			<?php
			if ( 'cpd' === $part ) {
				get_template_part( 'template-parts/financial-crime-prevention/sl-fcp-cpd' );
				continue;
			}
			?>
			<?php get_template_part( 'template-parts/courses/modern-slavery-awareness/' . $part ); ?>
			<?php
			if ( 'sl-msa-hero' === $part ) {
				get_template_part(
					'template-parts/global/course-buy-options',
					null,
					array(
						'course'   => __( 'Modern Slavery', 'akaza-adventure' ),
						'duration' => __( '15-minute duration', 'akaza-adventure' ),
						'contact'  => '#buy-course',
						'price'    => '$18',
					)
				);
				get_template_part(
					'template-parts/global/fcp-course-suite',
					null,
					array(
						'current' => 'msa',
						'contact' => '#buy-course',
					)
				);
			}
			?>
		<?php endforeach; ?>
	</div>
</main>
