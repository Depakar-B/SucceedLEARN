<?php
/**
 * SOC 2 AMP — See the training in action (screenshot carousel).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$soc2_screenshots      = succeedlearn_amp_get_soc2_screenshots();
$soc2_screenshot_count = count( $soc2_screenshots );
$soc2_last_index       = max( 0, $soc2_screenshot_count - 1 );
?>
<section
	class="sl-soc2-action"
	id="see-the-training-in-action"
	aria-labelledby="sl-soc2-action-title"
>
	<div class="sl-wrap">
		<div class="sl-soc2-action__grid">
			<div class="sl-soc2-action__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Screenshots', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-soc2-action-title" class="sl-h2">
					<?php esc_html_e( 'See the Training', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'in Action', 'succeedlearn-amp' ); ?></span>
				</h2>

				<h3 class="sl-soc2-action__subtitle">
					<?php esc_html_e( 'Practical Security Awareness for Everyday Workplace Risks', 'succeedlearn-amp' ); ?>
				</h3>

				<p class="sl-soc2-action__lead">
					<?php esc_html_e( 'Information security becomes easier to understand when employees can see how threats and secure behaviors appear in realistic situations.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Throughout the programme, learners encounter visual explanations, practical examples and interactive learning across account security, sensitive data handling, malware, physical security, remote working, social engineering, third-party risks, insider threats and incident reporting.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Knowledge checks help employees apply security concepts to everyday workplace decisions rather than simply memorising cybersecurity terminology.', 'succeedlearn-amp' ); ?>
				</p>

				<button
					type="button"
					class="sl-content-btn sl-content-btn-primary"
					data-cta="soc2-action-demo"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
				</button>
			</div>

			<div class="sl-soc2-action__media">
				<amp-state id="soc2Shots">
					<script type="application/json">{"index":0}</script>
				</amp-state>

				<div class="sl-soc2-action__viewport">
					<amp-carousel
						id="soc2Carousel"
						class="sl-soc2-action__carousel"
						type="slides"
						width="720"
						height="390"
						layout="responsive"
						role="region"
						aria-label="<?php esc_attr_e( 'Course screenshots', 'succeedlearn-amp' ); ?>"
						[slide]="soc2Shots.index"
						on="slideChange:AMP.setState({soc2Shots:{index:event.index}})"
					>
						<?php foreach ( $soc2_screenshots as $index => $src ) : ?>
							<div class="sl-soc2-action__slide">
								<amp-img
									src="<?php echo esc_url( $src ); ?>"
									width="720"
									height="390"
									layout="responsive"
									alt="<?php echo esc_attr( sprintf( /* translators: %s: screenshot number */ __( 'SOC 2 security awareness course screenshot %s', 'succeedlearn-amp' ), (string) ( $index + 1 ) ) ); ?>"
								></amp-img>
							</div>
						<?php endforeach; ?>
					</amp-carousel>
				</div>

				<div class="sl-soc2-action__controls">
					<button
						type="button"
						class="sl-soc2-action__arrow sl-soc2-action__arrow--prev"
						aria-label="<?php esc_attr_e( 'Previous screenshot', 'succeedlearn-amp' ); ?>"
						on="tap:AMP.setState({soc2Shots:{index:soc2Shots.index>0?soc2Shots.index-1:<?php echo (int) $soc2_last_index; ?>}})"
					>
						<span aria-hidden="true">←</span>
					</button>

					<span
						class="sl-soc2-action__counter"
						aria-live="polite"
						[text]="(soc2Shots.index + 1) + ' / <?php echo (int) $soc2_screenshot_count; ?>'"
					><?php echo esc_html( '1 / ' . $soc2_screenshot_count ); ?></span>

					<button
						type="button"
						class="sl-soc2-action__arrow sl-soc2-action__arrow--next"
						aria-label="<?php esc_attr_e( 'Next screenshot', 'succeedlearn-amp' ); ?>"
						on="tap:AMP.setState({soc2Shots:{index:soc2Shots.index>=<?php echo (int) $soc2_last_index; ?>?0:soc2Shots.index+1}})"
					>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
