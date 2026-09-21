<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * Higher-Risk Situations Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-gifts-entertainment-high-risk"
	aria-labelledby="sl-gifts-entertainment-high-risk-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-high-risk__intro">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Higher-Risk Situations',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-gifts-entertainment-high-risk-title">
				<?php
				echo wp_kses_post(
					__(
						'High-Risk Gifts and Entertainment <span>Scenarios in PE/VC</span>',
						'akaza-adventure'
					)
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Some gifts and entertainment situations require greater scrutiny because of the recipient, timing, commercial relationship or jurisdiction involved.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-gifts-entertainment-high-risk__grid">

			<!-- Government Officials -->
			<article class="sl-gifts-entertainment-high-risk__card">

				<div class="sl-gifts-entertainment-high-risk__media">

					<div
						class="sl-gifts-entertainment-high-risk__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'Government official or public-sector interaction image placeholder', 'akaza-adventure' ); ?>"
					>
						<span>
							<?php
							esc_html_e(
								'IMAGE PLACEHOLDER',
								'akaza-adventure'
							);
							?>
						</span>

						<small>
							<?php
							esc_html_e(
								'Government official or public-sector interaction',
								'akaza-adventure'
							);
							?>
						</small>
					</div>

				</div>

				<div class="sl-gifts-entertainment-high-risk__content">

					<h3>
						<?php
						esc_html_e(
							'Government officials',
							'akaza-adventure'
						);
						?>
					</h3>

					<p>
						<?php
						esc_html_e(
							'Gifts and entertainment involving government officials require additional scrutiny and appropriate approval.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</article>

			<!-- Vendors and Third Parties -->
			<article class="sl-gifts-entertainment-high-risk__card">

				<div class="sl-gifts-entertainment-high-risk__media">

					<div
						class="sl-gifts-entertainment-high-risk__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'Vendor, adviser or third-party meeting image placeholder', 'akaza-adventure' ); ?>"
					>
						<span>
							<?php
							esc_html_e(
								'IMAGE PLACEHOLDER',
								'akaza-adventure'
							);
							?>
						</span>

						<small>
							<?php
							esc_html_e(
								'Vendor, adviser or third-party meeting',
								'akaza-adventure'
							);
							?>
						</small>
					</div>

				</div>

				<div class="sl-gifts-entertainment-high-risk__content">

					<h3>
						<?php
						esc_html_e(
							'Vendors and third parties',
							'akaza-adventure'
						);
						?>
					</h3>

					<p>
						<?php
						esc_html_e(
							'Particular care is needed during procurement, bidding, onboarding and contract negotiations.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</article>

			<!-- Travel and Accommodation -->
			<article class="sl-gifts-entertainment-high-risk__card">

				<div class="sl-gifts-entertainment-high-risk__media">

					<div
						class="sl-gifts-entertainment-high-risk__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'Business travel or accommodation scenario image placeholder', 'akaza-adventure' ); ?>"
					>
						<span>
							<?php
							esc_html_e(
								'IMAGE PLACEHOLDER',
								'akaza-adventure'
							);
							?>
						</span>

						<small>
							<?php
							esc_html_e(
								'Business travel or accommodation scenario',
								'akaza-adventure'
							);
							?>
						</small>
					</div>

				</div>

				<div class="sl-gifts-entertainment-high-risk__content">

					<h3>
						<?php
						esc_html_e(
							'Travel and accommodation',
							'akaza-adventure'
						);
						?>
					</h3>

					<p>
						<?php
						esc_html_e(
							'Offers from external parties may require careful review and approval before acceptance.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</article>

			<!-- Cross-Cultural Gift-Giving -->
			<article class="sl-gifts-entertainment-high-risk__card">

				<div class="sl-gifts-entertainment-high-risk__media">

					<div
						class="sl-gifts-entertainment-high-risk__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'International or cross-cultural gift-giving image placeholder', 'akaza-adventure' ); ?>"
					>
						<span>
							<?php
							esc_html_e(
								'IMAGE PLACEHOLDER',
								'akaza-adventure'
							);
							?>
						</span>

						<small>
							<?php
							esc_html_e(
								'International or cross-cultural gift-giving',
								'akaza-adventure'
							);
							?>
						</small>
					</div>

				</div>

				<div class="sl-gifts-entertainment-high-risk__content">

					<h3>
						<?php
						esc_html_e(
							'Cross-cultural gift-giving',
							'akaza-adventure'
						);
						?>
					</h3>

					<p>
						<?php
						esc_html_e(
							'Local customs should still be assessed against applicable UK or US requirements and organisational policy.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</article>

		</div>

	</div>
</section>