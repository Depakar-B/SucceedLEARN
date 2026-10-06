<?php
/**
 * ISAT AMP — See the training in action (screenshot carousel).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$isat_screenshots      = succeedlearn_amp_get_isat_screenshots();
$isat_screenshot_count = count( $isat_screenshots );
$isat_last_index       = max( 0, $isat_screenshot_count - 1 );
?>
<section
	class="sl-isat-action"
	id="see-the-training-in-action"
	aria-labelledby="sl-isat-action-title"
>
	<div class="sl-wrap">
		<div class="sl-isat-action__grid">
			<div class="sl-isat-action__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Screenshots', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-isat-action-title" class="sl-h2">
					<?php esc_html_e( 'See the Training', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'in Action', 'succeedlearn-amp' ); ?></span>
				</h2>

				<h3 class="sl-isat-action__subtitle">
					<?php esc_html_e( 'Turn Information Security Concepts Into Practical Employee Awareness', 'succeedlearn-amp' ); ?>
				</h3>

				<p class="sl-isat-action__lead">
					<?php esc_html_e( 'Information security becomes easier to understand when employees can see how risks appear in practice.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Throughout the course, learners encounter animated explanations and scenarios designed to connect security principles with situations they may face at work.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Knowledge checks are integrated into the learning journey so employees can apply their understanding immediately rather than waiting until the end of the course.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'This helps transform security awareness from passive content consumption into a more practical learning experience.', 'succeedlearn-amp' ); ?>
				</p>

				<button
					type="button"
					class="sl-content-btn sl-content-btn-primary"
					data-cta="isat-action-demo"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
				</button>
			</div>

			<div class="sl-isat-action__media">
				<amp-state id="isatShots">
					<script type="application/json">{"index":0}</script>
				</amp-state>

				<div class="sl-isat-action__viewport">
					<amp-carousel
						id="isatCarousel"
						class="sl-isat-action__carousel"
						type="slides"
						width="720"
						height="390"
						layout="responsive"
						role="region"
						aria-label="<?php esc_attr_e( 'Course screenshots', 'succeedlearn-amp' ); ?>"
						[slide]="isatShots.index"
						on="slideChange:AMP.setState({isatShots:{index:event.index}})"
					>
						<?php foreach ( $isat_screenshots as $index => $src ) : ?>
							<div class="sl-isat-action__slide">
								<amp-img
									src="<?php echo esc_url( $src ); ?>"
									width="720"
									height="390"
									layout="responsive"
									alt="<?php echo esc_attr( sprintf( /* translators: %s: screenshot number */ __( 'Information security awareness training course screenshot %s', 'succeedlearn-amp' ), (string) ( $index + 1 ) ) ); ?>"
								></amp-img>
							</div>
						<?php endforeach; ?>
					</amp-carousel>
				</div>

				<div class="sl-isat-action__controls">
					<button
						type="button"
						class="sl-isat-action__arrow sl-isat-action__arrow--prev"
						aria-label="<?php esc_attr_e( 'Previous screenshot', 'succeedlearn-amp' ); ?>"
						on="tap:AMP.setState({isatShots:{index:isatShots.index>0?isatShots.index-1:<?php echo (int) $isat_last_index; ?>}})"
					>
						<span aria-hidden="true">←</span>
					</button>

					<span
						class="sl-isat-action__counter"
						aria-live="polite"
						[text]="(isatShots.index + 1) + ' / <?php echo (int) $isat_screenshot_count; ?>'"
					><?php echo esc_html( '1 / ' . $isat_screenshot_count ); ?></span>

					<button
						type="button"
						class="sl-isat-action__arrow sl-isat-action__arrow--next"
						aria-label="<?php esc_attr_e( 'Next screenshot', 'succeedlearn-amp' ); ?>"
						on="tap:AMP.setState({isatShots:{index:isatShots.index>=<?php echo (int) $isat_last_index; ?>?0:isatShots.index+1}})"
					>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
