<?php
/**
 * DPDPA Compliance Training AMP - Scorecard CTA.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-section sl-dpdpa-scorecard-cta"
	aria-labelledby="sl-dpdpa-scorecard-cta-title"
>
	<div class="sl-wrap">
		<div class="sl-dpdpa-scorecard-cta__inner">

			<span class="sl-home-sub-heading sl-dpdpa-scorecard-cta__eyebrow">
				<?php esc_html_e( 'Not ready to talk yet?', 'succeedlearn-amp' ); ?>
			</span>

			<h2
				id="sl-dpdpa-scorecard-cta-title"
				class="sl-h2"
			>
				<?php esc_html_e( 'Find your ', 'succeedlearn-amp' ); ?>

				<span>
					<?php esc_html_e( 'DPDPA training gaps', 'succeedlearn-amp' ); ?>
				</span>

				<?php esc_html_e( ' in four minutes', 'succeedlearn-amp' ); ?>
			</h2>

			<p class="sl-dpdpa-scorecard-cta__description">
				<?php
				esc_html_e(
					'Fifteen questions, a scored result you can forward to whoever else signs off.',
					'succeedlearn-amp'
				);
				?>
			</p>

			<div class="sl-dpdpa-scorecard-cta__actions">
				<a
					class="sl-content-btn sl-content-btn-primary sl-dpdpa-scorecard-cta__button"
					href="<?php echo esc_url( home_url( '/dpdpa-readiness-scorecard/' ) ); ?>"
					data-cta="dpdpa-scorecard"
				>
					<?php
					esc_html_e(
						'Take the Readiness Scorecard',
						'succeedlearn-amp'
					);
					?>

					<svg
						viewBox="0 0 24 24"
						aria-hidden="true"
						focusable="false"
					>
						<path d="M5 12h13M13 6l6 6-6 6" />
					</svg>
				</a>
			</div>

		</div>
	</div>
</section>