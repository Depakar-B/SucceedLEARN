<?php
/**
 * Insider Trading Learning Audience section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-insider-trading-audience"
	aria-labelledby="sl-insider-trading-audience-title"
>
	<div class="container">

		<div class="sl-insider-trading-audience__grid">

			<div class="sl-insider-trading-audience__media" aria-hidden="true">

				<div class="sl-insider-trading-audience__image sl-insider-trading-audience__image--large">
					<div class="sl-insider-trading-audience__placeholder">
						<span>Image<br>600 × 700px</span>
					</div>
				</div>

				<div class="sl-insider-trading-audience__image sl-insider-trading-audience__image--small">
					<div class="sl-insider-trading-audience__placeholder">
						<span>Image<br>400 × 560px</span>
					</div>
				</div>

			</div>

			<div class="sl-insider-trading-audience__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Insider Trading eLearning Audience', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-insider-trading-audience-title">
					<?php
					echo wp_kses(
						__( 'Who Should Take Insider Trading and Market Abuse <span>Regulation Training?</span>', 'akaza-adventure' ),
						array(
							'span' => array(),
						)
					);
					?>
				</h2>

				<p class="sl-insider-trading-audience__intro">
					<?php
					esc_html_e(
						'Insider Trading eLearning can be particularly relevant to employees who may receive confidential, inside, unpublished or material non-public information.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-insider-trading-audience__list">

					<article class="sl-insider-trading-audience__item">
						<div class="sl-insider-trading-audience__number">
							01
						</div>

						<div class="sl-insider-trading-audience__item-content">
							<h3>
								<?php esc_html_e( 'Employees with Access to Sensitive Information', 'akaza-adventure' ); ?>
							</h3>

							<p>
								<?php
								esc_html_e(
									'Staff receiving financial, strategic, investment or transaction-related information.',
									'akaza-adventure'
								);
								?>
							</p>
						</div>
					</article>

					<article class="sl-insider-trading-audience__item">
						<div class="sl-insider-trading-audience__number">
							02
						</div>

						<div class="sl-insider-trading-audience__item-content">
							<h3>
								<?php esc_html_e( 'Investment, Deal and Transaction Professionals', 'akaza-adventure' ); ?>
							</h3>

							<p>
								<?php
								esc_html_e(
									'Professionals involved in sourcing, due diligence, portfolio activity or execution.',
									'akaza-adventure'
								);
								?>
							</p>
						</div>
					</article>

					<article class="sl-insider-trading-audience__item">
						<div class="sl-insider-trading-audience__number">
							03
						</div>

						<div class="sl-insider-trading-audience__item-content">
							<h3>
								<?php esc_html_e( 'Analysts and Associates', 'akaza-adventure' ); ?>
							</h3>

							<p>
								<?php
								esc_html_e(
									'Employees accessing information through research, modelling or transaction support.',
									'akaza-adventure'
								);
								?>
							</p>
						</div>
					</article>

					<article class="sl-insider-trading-audience__item">
						<div class="sl-insider-trading-audience__number">
							04
						</div>

						<div class="sl-insider-trading-audience__item-content">
							<h3>
								<?php esc_html_e( 'Compliance, Legal, Risk and Finance Teams', 'akaza-adventure' ); ?>
							</h3>

							<p>
								<?php
								esc_html_e(
									'Functions supporting information controls, escalation and employee decision-making.',
									'akaza-adventure'
								);
								?>
							</p>
						</div>
					</article>

				</div>

			</div>

		</div>

	</div>
</section>