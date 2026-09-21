<?php
/**
 * Cybersecurity Awareness — One Month, One Price Offer
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-cyber-awareness-offer"
	id="one-month-one-price"
	aria-labelledby="sl-cyber-awareness-offer-title"
>

	<div class="container">

		<div class="sl-cyber-awareness-offer__panel">

			<!-- =====================================
			     SECTION HEADING
			===================================== -->

			<div class="sl-cyber-awareness-offer__heading">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'Complete Security Awareness Package',
						'akaza-adventure'
					);
					?>
				</span>

				<div class="sl-cyber-awareness-offer__title-row">
					<h2 id="sl-cyber-awareness-offer-title">
						<?php
						esc_html_e(
							'One month. One price. A once-in-a-lifetime offer.',
							'akaza-adventure'
						);
						?>
					</h2>

					<p class="sl-cyber-awareness-offer__availability">
						<?php esc_html_e( 'Available only for October 2026', 'akaza-adventure' ); ?>
					</p>
				</div>

				<h3 class="sl-panel-title">
					<?php
					esc_html_e(
						'No per-user rate. No implementation charges.',
						'akaza-adventure'
					);
					?>
				</h3>

			</div>


			<!-- =====================================
			     OFFER
			===================================== -->

			<div class="sl-cyber-awareness-offer__offer">

				<!-- Annual Training -->

				<div class="sl-cyber-awareness-offer__item">

					<div class="sl-cyber-awareness-offer__icon" aria-hidden="true">

						<svg
							viewBox="0 0 24 24"
							fill="none"
							focusable="false"
						>
							<path
								d="M5 4.5h9.5a3.5 3.5 0 0 1 3.5 3.5v11.5H8.5A3.5 3.5 0 0 0 5 23V4.5Z"
								stroke="currentColor"
								stroke-width="1.7"
								stroke-linejoin="round"
							/>
							<path
								d="M5 19.5c0-1.93 1.57-3.5 3.5-3.5H18"
								stroke="currentColor"
								stroke-width="1.7"
								stroke-linecap="round"
							/>
							<path
								d="M9 8h5M9 11h4"
								stroke="currentColor"
								stroke-width="1.5"
								stroke-linecap="round"
							/>
						</svg>

					</div>

					<div class="sl-cyber-awareness-offer__item-content">

						<span class="sl-cyber-awareness-offer__item-label">
							<?php esc_html_e( 'Complete package', 'akaza-adventure' ); ?>
						</span>

						<p>
							<?php
							esc_html_e(
								'Comprehensive annual security awareness training',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</div>


				<!-- Plus -->

				<div class="sl-cyber-awareness-offer__operator" aria-hidden="true">
					<span>+</span>
				</div>


				<!-- Phishing -->

				<div class="sl-cyber-awareness-offer__item">

					<div class="sl-cyber-awareness-offer__icon" aria-hidden="true">

						<svg
							viewBox="0 0 24 24"
							fill="none"
							focusable="false"
						>
							<circle
								cx="12"
								cy="12"
								r="8.5"
								stroke="currentColor"
								stroke-width="1.7"
							/>
							<circle
								cx="12"
								cy="12"
								r="4.5"
								stroke="currentColor"
								stroke-width="1.7"
							/>
							<circle
								cx="12"
								cy="12"
								r="1.4"
								fill="currentColor"
							/>
						</svg>

					</div>

					<div class="sl-cyber-awareness-offer__item-content">

						<span class="sl-cyber-awareness-offer__item-label">
							<?php esc_html_e( 'Included', 'akaza-adventure' ); ?>
						</span>

						<p>
							<?php
							esc_html_e(
								'10 phishing simulations per user',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</div>


				<!-- Equals -->

				<div class="sl-cyber-awareness-offer__operator" aria-hidden="true">
					<span>=</span>
				</div>


				<!-- Price -->

				<div class="sl-cyber-awareness-offer__price">

					<span class="sl-cyber-awareness-offer__price-label">
						<?php esc_html_e( 'One complete offer', 'akaza-adventure' ); ?>
					</span>

					<div class="sl-cyber-awareness-offer__price-value">

						<span class="sl-cyber-awareness-offer__currency">
							£
						</span>

						<span class="sl-cyber-awareness-offer__amount">
							50
						</span>

					</div>

					<span class="sl-cyber-awareness-offer__price-note">
						<?php esc_html_e( 'One-month campaign offer', 'akaza-adventure' ); ?>
					</span>

				</div>

			</div>

			<div class="sl-cyber-awareness-offer__footnote">
				<p class="sl-cyber-awareness-offer__footnote-text">
					<?php
					esc_html_e(
						'* This price (£50) is only for up to 100 users. For higher user numbers, the price gets even better.',
						'akaza-adventure'
					);
					?>
				</p>
				<a
					class="sl-content-btn sl-content-btn-primary"
					href="#pricing"
				>
					<?php esc_html_e( 'View Pricing', 'akaza-adventure' ); ?>
				</a>
			</div>

		</div>

	</div>

</section>