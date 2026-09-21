<?php
/**
 * Why Choose SucceedLEARN section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-insider-trading-why"
	aria-labelledby="sl-insider-trading-why-title"
>
	<div class="container">

		<div class="sl-insider-trading-why__grid">

			<div class="sl-insider-trading-why__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'SucceedLEARN Insider Trading eLearning', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-insider-trading-why-title">
					<?php
					echo wp_kses(
						__( 'Why Choose SucceedLEARN for Insider Trading and Market Abuse <span>Regulation Training?</span>', 'akaza-adventure' ),
						array(
							'span' => array(),
						)
					);
					?>
				</h2>

				<p class="sl-insider-trading-why__intro">
					<?php
					esc_html_e(
						'Regulations rarely appear in the workplace as neat definitions. Employees often need to make decisions with incomplete information.',
						'akaza-adventure'
					);
					?>
				</p>

				<p class="sl-insider-trading-why__intro">
					<?php
					esc_html_e(
						'SucceedLEARN connects regulatory concepts with practical workplace scenarios so learners can make decisions, receive feedback and reinforce their understanding.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-insider-trading-why__list">

					<article class="sl-insider-trading-why__item">
						<div class="sl-insider-trading-why__number">
							01
						</div>

						<div class="sl-insider-trading-why__item-content">
							<h3>
								<?php esc_html_e( 'Scenario-Led', 'akaza-adventure' ); ?>
							</h3>

							<p>
								<?php esc_html_e( 'Practical workplace situations.', 'akaza-adventure' ); ?>
							</p>
						</div>
					</article>

					<article class="sl-insider-trading-why__item">
						<div class="sl-insider-trading-why__number">
							02
						</div>

						<div class="sl-insider-trading-why__item-content">
							<h3>
								<?php esc_html_e( 'Interactive', 'akaza-adventure' ); ?>
							</h3>

							<p>
								<?php esc_html_e( 'Decisions and knowledge checks.', 'akaza-adventure' ); ?>
							</p>
						</div>
					</article>

					<article class="sl-insider-trading-why__item">
						<div class="sl-insider-trading-why__number">
							03
						</div>

						<div class="sl-insider-trading-why__item-content">
							<h3>
								<?php esc_html_e( 'Customisable', 'akaza-adventure' ); ?>
							</h3>

							<p>
								<?php esc_html_e( 'Adapt regulations, policies and scenarios.', 'akaza-adventure' ); ?>
							</p>
						</div>
					</article>

					<article class="sl-insider-trading-why__item">
						<div class="sl-insider-trading-why__number">
							04
						</div>

						<div class="sl-insider-trading-why__item-content">
							<h3>
								<?php esc_html_e( 'Region-Specific', 'akaza-adventure' ); ?>
							</h3>

							<p>
								<?php esc_html_e( 'UK MAR, US SEC and India SEBI Regulation options.', 'akaza-adventure' ); ?>
							</p>
						</div>
					</article>

				</div>

			</div>

			<div class="sl-insider-trading-why__media" aria-hidden="true">

				<div class="sl-insider-trading-why__image sl-insider-trading-why__image--large">
					<div class="sl-insider-trading-why__placeholder">
						<span>Image<br>600 × 700px</span>
					</div>
				</div>

				<div class="sl-insider-trading-why__image sl-insider-trading-why__image--small">
					<div class="sl-insider-trading-why__placeholder">
						<span>Image<br>400 × 560px</span>
					</div>
				</div>

			</div>

		</div>

	</div>
</section>