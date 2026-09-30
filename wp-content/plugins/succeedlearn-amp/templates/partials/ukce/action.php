<?php
/**
 * UK Cyber Essentials AMP — See the training in action (screenshot carousel).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ukce_screenshots      = succeedlearn_amp_get_ukce_screenshots();
$ukce_screenshot_count = count( $ukce_screenshots );
$ukce_last_index       = max( 0, $ukce_screenshot_count - 1 );
?>
<section
	class="sl-ukce-action"
	id="see-the-training-in-action"
	aria-labelledby="sl-ukce-action-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-action__grid">
			<div class="sl-ukce-action__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Screenshots', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-ukce-action-title" class="sl-h2">
					<?php esc_html_e( 'See the Training', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'in Action', 'succeedlearn-amp' ); ?></span>
				</h2>

				<h3 class="sl-ukce-action__subtitle">
					<?php esc_html_e( 'Practical Cybersecurity Awareness for Everyday Technology Use', 'succeedlearn-amp' ); ?>
				</h3>

				<p class="sl-ukce-action__lead">
					<?php esc_html_e( 'Cyber Essentials focuses on fundamental technical security controls. Employee awareness helps reinforce how those controls are supported through everyday use of accounts, devices, applications and remote-working environments.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Through practical examples and interactive learning, employees develop awareness around account protection, malware risks and secure remote-working behaviours.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Knowledge checks encourage learners to apply security principles to the technology decisions they make during everyday work.', 'succeedlearn-amp' ); ?>
				</p>

				<button
					type="button"
					class="sl-content-btn sl-content-btn-primary"
					data-cta="ukce-action-demo"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
				</button>
			</div>

			<div class="sl-ukce-action__media">
				<amp-state id="ukceShots">
					<script type="application/json">{"index":0}</script>
				</amp-state>

				<div class="sl-ukce-action__viewport">
					<amp-carousel
						id="ukceCarousel"
						class="sl-ukce-action__carousel"
						type="slides"
						width="720"
						height="520"
						layout="responsive"
						role="region"
						aria-label="<?php esc_attr_e( 'Course screenshots', 'succeedlearn-amp' ); ?>"
						[slide]="ukceShots.index"
						on="slideChange:AMP.setState({ukceShots:{index:event.index}})"
					>
						<?php foreach ( $ukce_screenshots as $index => $src ) : ?>
							<div class="sl-ukce-action__slide">
								<amp-img
									src="<?php echo esc_url( $src ); ?>"
									width="720"
									height="520"
									layout="responsive"
									alt="<?php echo esc_attr( sprintf( /* translators: %s: screenshot number */ __( 'UK Cyber Essentials course screenshot %s', 'succeedlearn-amp' ), (string) ( $index + 1 ) ) ); ?>"
								></amp-img>
							</div>
						<?php endforeach; ?>
					</amp-carousel>
				</div>

				<div class="sl-ukce-action__controls">
					<button
						type="button"
						class="sl-ukce-action__arrow sl-ukce-action__arrow--prev"
						aria-label="<?php esc_attr_e( 'Previous screenshot', 'succeedlearn-amp' ); ?>"
						on="tap:AMP.setState({ukceShots:{index:ukceShots.index>0?ukceShots.index-1:<?php echo (int) $ukce_last_index; ?>}})"
					>
						<span aria-hidden="true">←</span>
					</button>

					<span
						class="sl-ukce-action__counter"
						aria-live="polite"
						[text]="(ukceShots.index + 1) + ' / <?php echo (int) $ukce_screenshot_count; ?>'"
					><?php echo esc_html( '1 / ' . $ukce_screenshot_count ); ?></span>

					<button
						type="button"
						class="sl-ukce-action__arrow sl-ukce-action__arrow--next"
						aria-label="<?php esc_attr_e( 'Next screenshot', 'succeedlearn-amp' ); ?>"
						on="tap:AMP.setState({ukceShots:{index:ukceShots.index>=<?php echo (int) $ukce_last_index; ?>?0:ukceShots.index+1}})"
					>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
