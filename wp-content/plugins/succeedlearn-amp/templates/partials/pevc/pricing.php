<?php
/**
 * PE/VC Suite AMP — Pricing banner.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $pricing_items ) || ! is_array( $pricing_items ) ) {
	$pricing_items = succeedlearn_amp_get_pevc_pricing_items();
}
?>
<section class="sl-pevc-pricing" aria-labelledby="sl-pevc-pricing-title">
	<div class="sl-wrap">
		<div class="sl-pevc-pricing__banner">
			<div class="sl-pevc-pricing__copy">
				<span class="sl-pevc-pricing__badge">
					<?php esc_html_e( 'Complete PE/VC Suite', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-pevc-pricing-title" class="sl-h2">
					<?php esc_html_e( 'Avail the whole PE/VC Suite', 'succeedlearn-amp' ); ?>
				</h2>

				<div class="sl-pevc-pricing__price">
					<?php esc_html_e( '$24 per user, per year', 'succeedlearn-amp' ); ?>
				</div>

				<p class="sl-pevc-pricing__lead">
					<?php
					echo wp_kses_post(
						__(
							'Equivalent to just <strong>$2 per user, per month</strong> for the complete PE/VC compliance learning package.',
							'succeedlearn-amp'
						)
					);
					?>
				</p>

				<div class="sl-hero-actions sl-pevc-pricing__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="pricing-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
					</button>
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-secondary"
						data-cta="pricing-explore"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'courses' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Explore the Suite', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>

			<ul class="sl-pevc-pricing__list sl-list">
				<?php foreach ( $pricing_items as $item ) : ?>
					<li class="sl-list-item">
						<span aria-hidden="true">✓</span>
						<?php echo esc_html( $item ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
