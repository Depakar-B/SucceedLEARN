<?php
/**
 * SucceedLEARN
 * Insider Trading eLearning
 * Course Hero Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-insider-trading-hero"
	aria-labelledby="sl-insider-trading-hero-title"
>
	<div class="container">

		<div class="sl-insider-trading-hero__grid">

			<!-- Left: Hero Content -->
			<div class="sl-insider-trading-hero__content">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'Financial Crime Prevention',
						'akaza-adventure'
					);
					?>
				</span>

				<h1 id="sl-insider-trading-hero-title">
					<?php
					echo wp_kses_post(
						__(
							'Insider Trading <span>eLearning</span>',
							'akaza-adventure'
						)
					);
					?>
				</h1>

				<div class="sl-insider-trading-hero__description">

					<p>
						<strong>
							<?php
							esc_html_e(
								'Insider Trading eLearning',
								'akaza-adventure'
							);
							?>
						</strong>
						<?php
						esc_html_e(
							' helps employees recognise sensitive or non-public information, understand when trading or sharing information may create compliance risk, and make better-informed decisions before they act.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'The learning connects workplace decisions with important concepts associated with Market Abuse Regulations, UK MAR, US SEC requirements and India SEBI Regulation.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

				<div class="sl-hero-actions">

					<a
						class="sl-hero-btn sl-hero-btn-primary"
						href="#contact"
					>
						<?php
						esc_html_e(
							'Request a Demo',
							'akaza-adventure'
						);
						?>
						<span aria-hidden="true">→</span>
					</a>

					<a
						class="sl-hero-btn sl-hero-btn-secondary"
						href="#"
					>
						<?php
						esc_html_e(
							'Buy the Course',
							'akaza-adventure'
						);
						?>
					</a>

				</div>

			</div>

			<!-- Right: Three Image Composition -->
			<div class="sl-insider-trading-hero__media">

				<!-- Main Image -->
				<div class="sl-insider-trading-hero__image sl-insider-trading-hero__image--main">

					<div
						class="sl-insider-trading-hero__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'Insider Trading eLearning course image', 'akaza-adventure' ); ?>"
					>
						<span>
							<?php
							esc_html_e(
								'Image placeholder',
								'akaza-adventure'
							);
							?>
						</span>

						<small>
							<?php
							esc_html_e(
								'Recommended: 800 × 500 px',
								'akaza-adventure'
							);
							?>
						</small>
					</div>

					<div class="sl-insider-trading-hero__image-label">
						<?php
						esc_html_e(
							'Insider Trading eLearning',
							'akaza-adventure'
						);
						?>
					</div>

				</div>

				<!-- Secondary Images -->
				<div class="sl-insider-trading-hero__image-row">

					<div class="sl-insider-trading-hero__image sl-insider-trading-hero__image--secondary">

						<div
							class="sl-insider-trading-hero__image-placeholder"
							role="img"
							aria-label="<?php esc_attr_e( 'Insider Trading training scenario image', 'akaza-adventure' ); ?>"
						>
							<span>
								<?php
								esc_html_e(
									'Image placeholder',
									'akaza-adventure'
								);
								?>
							</span>

							<small>
								<?php
								esc_html_e(
									'Recommended: 400 × 280 px',
									'akaza-adventure'
								);
								?>
							</small>
						</div>

					</div>

					<div class="sl-insider-trading-hero__image sl-insider-trading-hero__image--secondary">

						<div
							class="sl-insider-trading-hero__image-placeholder"
							role="img"
							aria-label="<?php esc_attr_e( 'Insider Trading compliance scenario image', 'akaza-adventure' ); ?>"
						>
							<span>
								<?php
								esc_html_e(
									'Image placeholder',
									'akaza-adventure'
								);
								?>
							</span>

							<small>
								<?php
								esc_html_e(
									'Recommended: 400 × 280 px',
									'akaza-adventure'
								);
								?>
							</small>
						</div>

					</div>

				</div>

			</div>

		</div>

	</div>
</section>