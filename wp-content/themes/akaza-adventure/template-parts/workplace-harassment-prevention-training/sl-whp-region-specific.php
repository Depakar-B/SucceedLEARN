<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: Why does harassment prevention training need to be region-specific?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$harassment_region_examples = array(
	array(
		'number' => '01',
		'region' => 'United States',
		'text'   => 'In the United States, federal anti-discrimination law applies alongside state and local requirements, including mandatory training in certain jurisdictions.',
		'class'  => 'us',
	),
	array(
		'number' => '02',
		'region' => 'United Kingdom',
		'text'   => 'In the United Kingdom, employers have a positive duty to take reasonable steps to prevent sexual harassment.',
		'class'  => 'uk',
	),
	array(
		'number' => '03',
		'region' => 'India',
		'text'   => 'In India, the POSH Act establishes specific prevention, awareness and complaint-redressal responsibilities, including the role of the Internal Committee.',
		'class'  => 'india',
	),
	array(
		'number' => '04',
		'region' => 'Other countries',
		'text'   => 'Across other countries, organisations may need to consider local employment, equality, anti-discrimination and workplace-safety requirements.',
		'class'  => 'global',
	),
);
?>

<section
	class="sl-harassment-region-specific"
	id="why-region-specific"
	aria-labelledby="sl-harassment-region-specific-title"
>

	<div class="container">

		<div class="sl-harassment-region-specific__grid">

			<!-- =====================================
			     LEFT CONTENT
			===================================== -->

			<div class="sl-harassment-region-specific__content">

				<div class="sl-harassment-region-specific__heading">

					<span class="sl-home-sub-heading">
						<?php
						esc_html_e(
							'Why Regional Context Matters',
							'akaza-adventure'
						);
						?>
					</span>

					<h2 id="sl-harassment-region-specific-title">
						<?php
						esc_html_e(
							'Why does harassment prevention training need to be',
							'akaza-adventure'
						);
						?>
						<span>
							<?php
							esc_html_e(
								'region-specific?',
								'akaza-adventure'
							);
							?>
						</span>
					</h2>

				</div>


				<div class="sl-harassment-region-specific__intro">

					<p>
						<?php
						esc_html_e(
							'Workplace harassment laws are not identical around the world.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Definitions, protected individuals, employer responsibilities, reporting channels and training mandates can differ by country—and, in the United States, by state and city.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>


				<!-- =====================================
				     EXAMPLES
				===================================== -->

				<div class="sl-harassment-region-specific__examples">

					<p class="sl-harassment-region-specific__examples-label">
						<?php
						esc_html_e(
							'For example:',
							'akaza-adventure'
						);
						?>
					</p>


					<ul class="sl-harassment-region-specific__list">

						<?php foreach ( $harassment_region_examples as $example ) : ?>

							<li
								class="sl-harassment-region-specific__item sl-harassment-region-specific__item--<?php echo esc_attr( $example['class'] ); ?>"
							>

								<span class="sl-harassment-region-specific__number">
									<?php echo esc_html( $example['number'] ); ?>
								</span>

								<div class="sl-harassment-region-specific__item-content">

									<p>
										<?php echo esc_html( $example['text'] ); ?>
									</p>

								</div>


								<div
									class="sl-harassment-region-specific__item-visual"
									aria-hidden="true"
								>

									<?php if ( 'us' === $example['class'] ) : ?>

										<span>US</span>

									<?php elseif ( 'uk' === $example['class'] ) : ?>

										<span>UK</span>

									<?php elseif ( 'india' === $example['class'] ) : ?>

										<span>IN</span>

									<?php else : ?>

										<span>GL</span>

									<?php endif; ?>

								</div>

							</li>

						<?php endforeach; ?>

					</ul>

				</div>


				<!-- =====================================
				     CLOSING CONTENT
				===================================== -->

				<div class="sl-harassment-region-specific__conclusion">

					<p>
						<?php
						esc_html_e(
							'A generic course may communicate broad principles. Region-specific training helps employees understand what those principles mean in the place where they work.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</div>


			<!-- =====================================
			     RIGHT VISUAL
			===================================== -->

			<div class="sl-harassment-region-specific__visual">

				<div class="sl-harassment-region-specific__visual-card">

					<div class="sl-harassment-region-specific__visual-placeholder">

						<div class="sl-harassment-region-specific__visual-icon">

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
									stroke-width="1.6"
								/>

								<path
									d="M3.8 12h16.4"
									stroke="currentColor"
									stroke-width="1.6"
									stroke-linecap="round"
								/>

								<path
									d="M12 3.5c2.2 2.3 3.3 5.1 3.3 8.5S14.2 18.2 12 20.5c-2.2-2.3-3.3-5.1-3.3-8.5S9.8 5.8 12 3.5Z"
									stroke="currentColor"
									stroke-width="1.5"
								/>

							</svg>

						</div>

						<span class="sl-harassment-region-specific__visual-title">
							<?php
							esc_html_e(
								'Regional Training Context',
								'akaza-adventure'
							);
							?>
						</span>

						<span class="sl-harassment-region-specific__visual-size">
							<?php
							esc_html_e(
								'Image placeholder — 620 × 620 px',
								'akaza-adventure'
							);
							?>
						</span>

					</div>


					<div class="sl-harassment-region-specific__visual-caption">

						<span>
							<?php
							esc_html_e(
								'One standard',
								'akaza-adventure'
							);
							?>
						</span>

						<strong>
							<?php
							esc_html_e(
								'Different regional context',
								'akaza-adventure'
							);
							?>
						</strong>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>