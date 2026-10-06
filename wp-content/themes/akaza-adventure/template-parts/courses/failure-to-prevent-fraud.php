<?php
/**
 * Failure to Prevent Fraud Training course page wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'Course',
	'name'        => 'Failure to Prevent Fraud',
	'description' => 'Scenario-led eLearning covering the Failure to Prevent Fraud offence, associated-person risk, fraud warning signs, reporting and individual responsibilities.',
	'provider'    => array(
		'@type' => 'Organization',
		'name'  => 'SucceedLEARN',
		'url'   => home_url( '/' ),
	),
	'inLanguage'  => 'en-GB',
);

$sections = array(
	'sl-ftpf-hero',
	'sl-ftpf-law',
	'sl-ftpf-overview',
	'sl-ftpf-outcomes',
	'cpd',
	'sl-ftpf-audience',
	'sl-ftpf-watch',
	'sl-ftpf-reporting',
	'sl-ftpf-responsibility',
	'sl-ftpf-faq',
	'sl-ftpf-contact',
);
?>
<main id="main-content" class="sl-course-page sl-course-page--failure-to-prevent-fraud">
	<script type="application/ld+json"><?php echo wp_json_encode( $course_schema, JSON_UNESCAPED_SLASHES ); ?></script>
	<div class="ftpf-page">
		<?php foreach ( $sections as $section ) : ?>
			<?php
			if ( 'cpd' === $section ) {
				get_template_part( 'template-parts/financial-crime-prevention/sl-fcp-cpd' );
				continue;
			}
			?>
			<?php get_template_part( 'template-parts/courses/failure-to-prevent-fraud/' . $section ); ?>
			<?php
			if ( 'sl-ftpf-hero' === $section ) {
				get_template_part(
					'template-parts/global/course-buy-options',
					null,
					array(
						'course'   => __( 'Fraud Prevention', 'akaza-adventure' ),
						'duration' => __( '16-minute duration', 'akaza-adventure' ),
						'contact'  => '#request-demo',
						'price'    => '$18',
					)
				);
				get_template_part(
					'template-parts/global/fcp-course-suite',
					null,
					array(
						'current' => 'ftpf',
						'contact' => '#request-demo',
					)
				);
			}
			?>
		<?php endforeach; ?>
	</div>
</main>
