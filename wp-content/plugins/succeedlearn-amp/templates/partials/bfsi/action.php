<?php
/**
 * BFSI & PE/VC AMP — See the training in action (screenshot carousel).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bfsi_screenshots      = succeedlearn_amp_get_bfsi_screenshots();
$bfsi_screenshot_count = count( $bfsi_screenshots );
$bfsi_last_index       = max( 0, $bfsi_screenshot_count - 1 );
?>
<section
	class="sl-bfsi-action"
	id="see-the-training-in-action"
	aria-labelledby="sl-bfsi-action-title"
>
	<div class="sl-wrap">
		<div class="sl-bfsi-action__grid">
			<div class="sl-bfsi-action__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Screenshots', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-bfsi-action-title" class="sl-h2">
					<?php esc_html_e( 'See the Training', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'in Action', 'succeedlearn-amp' ); ?></span>
				</h2>

				<h3 class="sl-bfsi-action__subtitle">
					<?php esc_html_e( 'Learn Through Real-World Cybersecurity Scenarios', 'succeedlearn-amp' ); ?>
				</h3>

				<p class="sl-bfsi-action__lead">
					<?php esc_html_e( 'Cybersecurity risks become easier to recognise when employees can see how they appear in realistic workplace situations.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Throughout the course, learners encounter visual explanations, financial-services scenarios and interactive learning covering areas such as social engineering, insider threats, physical security, data privacy, third-party risk and AI-enabled attacks.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Knowledge checks reinforce key concepts throughout the learning journey, helping employees practise how to recognise suspicious activity, make safer decisions and respond appropriately when something does not look right.', 'succeedlearn-amp' ); ?>
				</p>

				<button
					type="button"
					class="sl-content-btn sl-content-btn-primary"
					data-cta="bfsi-action-demo"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
				</button>
			</div>

			<div class="sl-bfsi-action__media">
				<amp-state id="bfsiShots">
					<script type="application/json">{"index":0}</script>
				</amp-state>

				<div class="sl-bfsi-action__viewport">
					<amp-carousel
						id="bfsiCarousel"
						class="sl-bfsi-action__carousel"
						type="slides"
						width="720"
						height="520"
						layout="responsive"
						role="region"
						aria-label="<?php esc_attr_e( 'Course screenshots', 'succeedlearn-amp' ); ?>"
						[slide]="bfsiShots.index"
						on="slideChange:AMP.setState({bfsiShots:{index:event.index}})"
					>
						<?php foreach ( $bfsi_screenshots as $index => $src ) : ?>
							<div class="sl-bfsi-action__slide">
								<amp-img
									src="<?php echo esc_url( $src ); ?>"
									width="720"
									height="520"
									layout="responsive"
									alt="<?php echo esc_attr( sprintf( /* translators: %s: screenshot number */ __( 'BFSI & PE/VC cybersecurity awareness course screenshot %s', 'succeedlearn-amp' ), (string) ( $index + 1 ) ) ); ?>"
								></amp-img>
							</div>
						<?php endforeach; ?>
					</amp-carousel>
				</div>

				<div class="sl-bfsi-action__controls">
					<button
						type="button"
						class="sl-bfsi-action__arrow sl-bfsi-action__arrow--prev"
						aria-label="<?php esc_attr_e( 'Previous screenshot', 'succeedlearn-amp' ); ?>"
						on="tap:AMP.setState({bfsiShots:{index:bfsiShots.index>0?bfsiShots.index-1:<?php echo (int) $bfsi_last_index; ?>}})"
					>
						<span aria-hidden="true">←</span>
					</button>

					<span
						class="sl-bfsi-action__counter"
						aria-live="polite"
						[text]="(bfsiShots.index + 1) + ' / <?php echo (int) $bfsi_screenshot_count; ?>'"
					><?php echo esc_html( '1 / ' . $bfsi_screenshot_count ); ?></span>

					<button
						type="button"
						class="sl-bfsi-action__arrow sl-bfsi-action__arrow--next"
						aria-label="<?php esc_attr_e( 'Next screenshot', 'succeedlearn-amp' ); ?>"
						on="tap:AMP.setState({bfsiShots:{index:bfsiShots.index>=<?php echo (int) $bfsi_last_index; ?>?0:bfsiShots.index+1}})"
					>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
