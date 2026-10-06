<?php
/**
 * Whistleblowing PE/VC AMP: Inside the Course.
 *
 * Expected vars: $images, $course_slides
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="inside-the-course" class="sl-section sl-aml-pe-vc-course" aria-labelledby="sl-whistleblowing-pe-vc-course-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Course View', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whistleblowing-pe-vc-course-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What Does the Whistleblowing Course Look Like in <span>Practice?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Learners work through clear explanations, visual examples and practical workplace scenarios.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-concept-stack">
			<?php foreach ( $course_slides as $slide ) : ?>
				<?php
				$image_key = isset( $slide['image'] ) ? (string) $slide['image'] : '';
				$image_url = ( '' !== $image_key && ! empty( $images[ $image_key ] ) ) ? $images[ $image_key ] : '';
				?>
				<article class="sl-aml-concept">
					<?php if ( $image_url ) : ?>
						<div class="sl-aml-media">
							<div class="sl-aml-image">
								<amp-img
									src="<?php echo esc_url( $image_url ); ?>"
									width="1200"
									height="800"
									layout="responsive"
									alt="<?php echo esc_attr( $slide['alt'] ); ?>"
								></amp-img>
							</div>
						</div>
					<?php endif; ?>

					<span class="sl-aml-concept__code"><?php echo esc_html( $slide['num'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $slide['label'] ); ?></h3>
					<p><?php echo esc_html( $slide['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
