<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * Target Audience Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-gifts-entertainment-target-audience"
	aria-labelledby="sl-gifts-entertainment-target-audience-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-target-audience__grid">

			<!-- Left: Introduction -->
			<div class="sl-gifts-entertainment-target-audience__intro">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'Target Audience',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-gifts-entertainment-target-audience-title">
					<?php
					echo wp_kses_post(
						__(
							'Gifts and Entertainment Training for <span>PE/VC Investment, IR and Compliance Teams</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'The course is relevant to professionals whose roles involve external relationships, commercial decisions, transactions, procurement or investor engagement.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

			<!-- Right: Audience List -->
			<div class="sl-gifts-entertainment-target-audience__list">

				<article class="sl-gifts-entertainment-target-audience__item">

					<span
						class="sl-gifts-entertainment-target-audience__number"
						aria-hidden="true"
					>
						PE
					</span>

					<div class="sl-gifts-entertainment-target-audience__item-content">

						<h3>
							<?php
							esc_html_e(
								'Investment professionals',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Professionals involved in sourcing, diligence, transactions and portfolio-related decisions.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</article>

				<article class="sl-gifts-entertainment-target-audience__item">

					<span
						class="sl-gifts-entertainment-target-audience__number"
						aria-hidden="true"
					>
						IR
					</span>

					<div class="sl-gifts-entertainment-target-audience__item-content">

						<h3>
							<?php
							esc_html_e(
								'Investor relations teams',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Professionals interacting with Limited Partners and other external stakeholders.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</article>

				<article class="sl-gifts-entertainment-target-audience__item">

					<span
						class="sl-gifts-entertainment-target-audience__number"
						aria-hidden="true"
					>
						CO
					</span>

					<div class="sl-gifts-entertainment-target-audience__item-content">

						<h3>
							<?php
							esc_html_e(
								'Compliance and risk teams',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Functions responsible for policy interpretation, approvals, reporting and escalation.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</article>

				<article class="sl-gifts-entertainment-target-audience__item">

					<span
						class="sl-gifts-entertainment-target-audience__number"
						aria-hidden="true"
					>
						OP
					</span>

					<div class="sl-gifts-entertainment-target-audience__item-content">

						<h3>
							<?php
							esc_html_e(
								'Operations and procurement teams',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Professionals managing vendors, advisers and third-party appointments.',
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