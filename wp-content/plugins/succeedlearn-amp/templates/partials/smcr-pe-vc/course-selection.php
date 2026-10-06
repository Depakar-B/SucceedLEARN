<?php
/**
 * SMCR PE/VC AMP: Course Selection.
 *
 * Expected vars: $course_selection
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="course-selection" class="sl-section sl-section--alt sl-smcr-pe-vc-course-selection" aria-labelledby="sl-smcr-pe-vc-course-selection-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Course Selection', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-smcr-pe-vc-course-selection-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Who Should Take SMCR Training in a UK PE or VC <span>Firm?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( "Choose the learning path that best matches the learner's role and responsibilities within the firm.", 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-cards sl-smcr-pe-vc-course-selection__grid">
			<?php foreach ( $course_selection as $card ) : ?>
				<article class="sl-aml-card">
					<span class="sl-smcr-pe-vc-course-selection__label"><?php echo esc_html( $card['label'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['text'] ); ?></p>

					<ul class="sl-smcr-pe-vc-course-selection__focus" role="list">
						<?php foreach ( $card['focus'] as $focus ) : ?>
							<li><?php echo esc_html( $focus ); ?></li>
						<?php endforeach; ?>
					</ul>

					<button
						type="button"
						class="sl-content-btn sl-content-btn-secondary"
						<?php echo succeedlearn_amp_scroll_tap_attr( $card['anchor'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php echo esc_html( $card['link_label'] ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
