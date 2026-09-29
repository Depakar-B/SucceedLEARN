<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * PE/VC Compliance Risk Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-gifts-entertainment-risk"
	aria-labelledby="sl-gifts-entertainment-risk-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-risk__grid">

			<!-- Left: Introductory Content -->
			<div class="sl-gifts-entertainment-risk__intro">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'PE/VC compliance risk',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-gifts-entertainment-risk-title">
					<?php
					echo wp_kses_post(
						__(
							'Gifts and Entertainment Compliance Risks',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<div class="sl-gifts-entertainment-risk__intro-body">

					<p>
						<?php
						esc_html_e(
							'Gifts and entertainment can support legitimate professional relationships, but inappropriate benefits may create actual or perceived conflicts of interest, bribery concerns, regulatory scrutiny or reputational risk.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'This becomes particularly important in PE/VC environments, where professionals regularly engage with investors, advisers, vendors and portfolio company stakeholders around significant commercial decisions.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</div>

			<!-- Right: Compliance Risk Points -->
			<div class="sl-gifts-entertainment-risk__list">

				<article class="sl-gifts-entertainment-risk__item">

					<span
						class="sl-gifts-entertainment-risk__number"
						aria-hidden="true"
					>
						01
					</span>

					<div class="sl-gifts-entertainment-risk__item-content">

						<h3>
							<?php
							esc_html_e(
								'Deal and adviser selection',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Invitations can become sensitive when a provider is being considered for an advisory or commercial role.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</article>

				<article class="sl-gifts-entertainment-risk__item">

					<span
						class="sl-gifts-entertainment-risk__number"
						aria-hidden="true"
					>
						02
					</span>

					<div class="sl-gifts-entertainment-risk__item-content">

						<h3>
							<?php
							esc_html_e(
								'Investor relationships',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Hospitality involving Limited Partners should be considered against business purpose, transparency and policy requirements.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</article>

				<article class="sl-gifts-entertainment-risk__item">

					<span
						class="sl-gifts-entertainment-risk__number"
						aria-hidden="true"
					>
						03
					</span>

					<div class="sl-gifts-entertainment-risk__item-content">

						<h3>
							<?php
							esc_html_e(
								'Vendor relationships',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Particular care may be needed during procurement, onboarding, bidding or contract negotiations.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</article>

			</div>

		</div>

	</div>
</section>