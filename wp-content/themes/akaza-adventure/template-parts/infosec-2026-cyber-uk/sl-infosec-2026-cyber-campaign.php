<?php
/**
 * SucceedLEARN
 * Cybersecurity Awareness Month 2026
 * Limited-Time Campaign Section
 *
 * @package Akaza_Adventure
 */
?>

<section
	id="campaign"
	class="sl-infosec-2026-cyber-campaign"
	aria-labelledby="sl-infosec-2026-cyber-campaign-title"
>
	<div class="container">

		<div class="sl-infosec-2026-cyber-campaign__card">

			<div class="sl-infosec-2026-cyber-campaign__content">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'CYBERSECURITY AWARENESS MONTH 2026',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-infosec-2026-cyber-campaign-title">
					<?php
					echo wp_kses_post(
						__(
							'Cybersecurity Awareness Month 2026 <span>Limited-Time Campaign</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p class="sl-infosec-2026-cyber-campaign__lead">
					<?php
					esc_html_e(
						'Put your employees’ cyber awareness into practice with a controlled phishing simulation designed to measure real-world readiness.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

			<div class="sl-infosec-2026-cyber-campaign__offer">

				<span class="sl-infosec-2026-cyber-campaign__offer-label">
					<?php
					esc_html_e(
						'Campaign Offer',
						'akaza-adventure'
					);
					?>
				</span>

				<div class="sl-infosec-2026-cyber-campaign__price">
					<span class="sl-infosec-2026-cyber-campaign__currency">£</span>

					<span class="sl-infosec-2026-cyber-campaign__amount">
						2
					</span>

					<span class="sl-infosec-2026-cyber-campaign__unit">
						<?php
						esc_html_e(
							'/user/month',
							'akaza-adventure'
						);
						?>
					</span>
				</div>

				<div class="sl-content-actions sl-infosec-2026-cyber-campaign__actions">

					<a
						class="sl-content-btn sl-content-btn-primary"
						href="#contact"
					>
						<?php
						esc_html_e(
							'Start Your Cyber Readiness Challenge',
							'akaza-adventure'
						);
						?>
						<span aria-hidden="true">→</span>
					</a>

				</div>

				<p class="sl-infosec-2026-cyber-campaign__terms">
					<?php
					esc_html_e(
						'Limited-period campaign. Terms & Conditions apply.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

		</div>

	</div>
</section>