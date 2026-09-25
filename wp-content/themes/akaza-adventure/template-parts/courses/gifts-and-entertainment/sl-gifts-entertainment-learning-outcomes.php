<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * Learning Outcomes Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$learning_outcomes_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Image-3_gifts.webp';
?>

<section
	class="sl-gifts-entertainment-learning-outcomes"
	aria-labelledby="sl-gifts-entertainment-learning-outcomes-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-learning-outcomes__grid">

			<!-- Left: Introduction + Image -->
			<div class="sl-gifts-entertainment-learning-outcomes__intro">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'Learning outcomes',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-gifts-entertainment-learning-outcomes-title">
					<?php
					echo wp_kses_post(
						__(
							'Gifts and Entertainment Training <span>Learning Outcomes for PE/VC Teams</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<div class="sl-gifts-entertainment-learning-outcomes__media">
					<figure class="sl-gifts-entertainment-learning-outcomes__image">
						<img
							src="<?php echo esc_url( $learning_outcomes_image ); ?>"
							alt="<?php esc_attr_e( 'Gifts and entertainment training learning outcomes visual', 'akaza-adventure' ); ?>"
							loading="lazy"
							decoding="async"
						>
					</figure>
				</div>

			</div>

			<!-- Right: Learning Outcomes -->
			<div class="sl-gifts-entertainment-learning-outcomes__list">

				<article class="sl-gifts-entertainment-learning-outcomes__item">

					<span
						class="sl-gifts-entertainment-learning-outcomes__number"
						aria-hidden="true"
					>
						01
					</span>

					<div class="sl-gifts-entertainment-learning-outcomes__item-content">

						<h3>
							<?php
							esc_html_e(
								'Recognise gifts and entertainment',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Identify benefits and business courtesies that may fall within Gifts and Entertainment controls.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</article>

				<article class="sl-gifts-entertainment-learning-outcomes__item">

					<span
						class="sl-gifts-entertainment-learning-outcomes__number"
						aria-hidden="true"
					>
						02
					</span>

					<div class="sl-gifts-entertainment-learning-outcomes__item-content">

						<h3>
							<?php
							esc_html_e(
								'Assess the context',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Consider purpose, value, timing, transparency and the commercial relationship.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</article>

				<article class="sl-gifts-entertainment-learning-outcomes__item">

					<span
						class="sl-gifts-entertainment-learning-outcomes__number"
						aria-hidden="true"
					>
						03
					</span>

					<div class="sl-gifts-entertainment-learning-outcomes__item-content">

						<h3>
							<?php
							esc_html_e(
								'Identify higher-risk situations',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Recognise excessive benefits, cash or cash equivalents, and circumstances involving potential influence.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</article>

				<article class="sl-gifts-entertainment-learning-outcomes__item">

					<span
						class="sl-gifts-entertainment-learning-outcomes__number"
						aria-hidden="true"
					>
						04
					</span>

					<div class="sl-gifts-entertainment-learning-outcomes__item-content">

						<h3>
							<?php
							esc_html_e(
								'Follow approval and reporting procedures',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Understand when internal approval, recording or escalation may be required.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</article>

				<article class="sl-gifts-entertainment-learning-outcomes__item">

					<span
						class="sl-gifts-entertainment-learning-outcomes__number"
						aria-hidden="true"
					>
						05
					</span>

					<div class="sl-gifts-entertainment-learning-outcomes__item-content">

						<h3>
							<?php
							esc_html_e(
								'Apply policy to PE/VC situations',
								'akaza-adventure'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Practise decisions involving investors, advisers, vendors, portfolio company contacts and government officials.',
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