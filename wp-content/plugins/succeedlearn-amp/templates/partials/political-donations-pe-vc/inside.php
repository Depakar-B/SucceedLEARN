<?php
/**
 * Political Donations PE/VC AMP: Inside the Course.
 *
 * Expected vars: $images, $inside_topics
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="course-inside" class="sl-section sl-aml-pe-vc-course" aria-labelledby="sl-political-donations-pe-vc-inside-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Inside the course', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-political-donations-pe-vc-inside-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Explore Scenario-Based Compliance E-Learning for <span>Investment Professionals</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Visual explanations and practical scenarios help learners understand how political activity can become a compliance issue.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-concept-stack">
			<?php foreach ( $inside_topics as $topic ) : ?>
				<?php
				$image_key = isset( $topic['image'] ) ? (string) $topic['image'] : '';
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
									alt="<?php echo esc_attr( $topic['alt'] ); ?>"
								></amp-img>
							</div>
						</div>
					<?php endif; ?>

					<span class="sl-aml-concept__code"><?php echo esc_html( $topic['num'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $topic['title'] ); ?></h3>
					<p><?php echo esc_html( $topic['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
