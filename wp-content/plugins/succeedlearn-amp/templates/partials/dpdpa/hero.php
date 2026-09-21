<?php
/**
 * DPDPA Compliance Training AMP - Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-section sl-dpdpa-hero"
	aria-labelledby="sl-dpdpa-hero-title"
>
	<div class="sl-wrap">
		<div class="sl-dpdpa-hero__grid">

			<div class="sl-dpdpa-hero__copy">
				<?php
				if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
					succeedlearn_amp_render_hero_breadcrumbs(
						__( 'DPDPA Compliance Training', 'succeedlearn-amp' )
					);
				}
				?>

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'DPDPA compliance training for employees',
						'succeedlearn-amp'
					);
					?>
				</span>

				<h1 id="sl-dpdpa-hero-title">
					<?php
					esc_html_e(
						'Every employee touches personal data. Almost none were ever taught how to handle it.',
						'succeedlearn-amp'
					);
					?>
				</h1>

				<p class="sl-dpdpa-hero__lede">
					<?php
					esc_html_e(
						'A 25-minute DPDPA course that teaches your workforce to handle personal data correctly, and gives you proof that they did.',
						'succeedlearn-amp'
					);
					?>
				</p>

				<div class="sl-dpdpa-actions sl-hero-actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="dpdpa-hero-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a demo', 'succeedlearn-amp' ); ?>
					</button>

					<a
						class="sl-hero-btn sl-hero-btn-secondary"
						href="<?php echo esc_url( home_url( '/dpdpa-readiness-scorecard/' ) ); ?>"
						data-cta="dpdpa-hero-scorecard"
					>
						<?php
						esc_html_e(
							'Take the Readiness Scorecard',
							'succeedlearn-amp'
						);
						?>
					</a>
				</div>

				<p class="sl-dpdpa-hero__fine">
					<?php
					esc_html_e(
						'No obligation. Most demos take 20 minutes.',
						'succeedlearn-amp'
					);
					?>
				</p>

				<p class="sl-dpdpa-hero__trust">
					<strong><?php esc_html_e( '900+', 'succeedlearn-amp' ); ?></strong>
					<?php
					esc_html_e(
						'organisations train with SucceedLearn',
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>

			<div class="sl-dpdpa-hero__media">
				<div
					class="sl-dpdpa-hero__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'DPDPA compliance training hero image placeholder', 'succeedlearn-amp' ); ?>"
				>
					<span class="sl-dpdpa-hero__placeholder-title">
						<?php esc_html_e( 'Hero image placeholder', 'succeedlearn-amp' ); ?>
					</span>

					<span class="sl-dpdpa-hero__placeholder-size">
						<?php esc_html_e( 'Recommended size: 720 × 560 px', 'succeedlearn-amp' ); ?>
					</span>
				</div>
			</div>

		</div>
	</div>
</section>