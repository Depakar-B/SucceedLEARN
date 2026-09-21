<?php
/**
 * Infosec Cybersecurity Awareness Month 2026 AMP - Campaign offer.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-section sl-infosec-2026-cyber-campaign"
	aria-labelledby="sl-infosec-2026-cyber-campaign-title"
>
	<div class="sl-wrap">
		<div class="sl-infosec-2026-cyber-campaign__card">
			<div class="sl-infosec-2026-cyber-campaign__content">
				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'CYBERSECURITY AWARENESS MONTH 2026',
						'succeedlearn-amp'
					);
					?>
				</span>

				<h2
					id="sl-infosec-2026-cyber-campaign-title"
					class="sl-h2"
				>
					<?php
					echo wp_kses_post(
						__(
							'Cybersecurity Awareness Month 2026 <span>Limited-Time Campaign</span>',
							'succeedlearn-amp'
						)
					);
					?>
				</h2>

				<p class="sl-lead sl-infosec-2026-cyber-campaign__lead">
					<?php
					esc_html_e(
						'Put your employees’ cyber awareness into practice with a controlled phishing simulation designed to measure real-world readiness.',
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>

			<div class="sl-infosec-2026-cyber-campaign__offer">
				<span class="sl-infosec-2026-cyber-campaign__offer-label">
					<?php esc_html_e( 'CAMPAIGN OFFER', 'succeedlearn-amp' ); ?>
				</span>

				<div
					class="sl-infosec-2026-cyber-campaign__price"
					aria-label="<?php esc_attr_e( 'Two dollars per user per month', 'succeedlearn-amp' ); ?>"
				>
					<span
						class="sl-infosec-2026-cyber-campaign__currency"
						aria-hidden="true"
					>$</span>

					<span
						class="sl-infosec-2026-cyber-campaign__amount"
						aria-hidden="true"
					>2</span>

					<span
						class="sl-infosec-2026-cyber-campaign__unit"
						aria-hidden="true"
					>
						<?php esc_html_e( '/User/Month', 'succeedlearn-amp' ); ?>
					</span>
				</div>

				<div class="sl-infosec-2026-cyber-campaign__actions">
					<button
						type="button"
						class="sl-btn sl-btn--primary sl-infosec-2026-cyber-campaign__cta sl-infosec-2026-cyber-campaign__cta--primary"
						data-cta="campaign-start-challenge"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php
						esc_html_e(
							'Start Your Cyber Readiness Challenge',
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
					</button>
				</div>

				<p class="sl-infosec-2026-cyber-campaign__terms">
					<?php
					esc_html_e(
						'Limited-period campaign. Terms & Conditions apply.',
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>
		</div>
	</div>
</section>