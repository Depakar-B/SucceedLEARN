<?php
/**
 * SucceedLEARN
 * Insider Trading eLearning
 * Understanding Insider Trading Risk Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-insider-trading-risk"
	aria-labelledby="sl-insider-trading-risk-title"
>
	<div class="container">

		<div class="sl-insider-trading-risk__intro">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Understanding Insider Trading Risk',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-insider-trading-risk-title">
				<?php
				echo wp_kses_post(
					__(
						'What Is Insider Trading and Why Does Insider Trading <span>eLearning Matter?</span>',
						'akaza-adventure'
					)
				);
				?>
			</h2>

		</div>

		<div class="sl-insider-trading-risk__grid">

			<!-- Left: Image -->
			<div class="sl-insider-trading-risk__media">

				<img
					class="sl-insider-trading-risk__image"
					src="https://succeedlearn.com/wp-content/uploads/2026/10/insider_trading_monitoring_scene.webp"
					alt="<?php esc_attr_e( 'A person reviewing a trading decision beside confidential information', 'akaza-adventure' ); ?>"
					loading="lazy"
					decoding="async"
				>

			</div>

			<!-- Right: Content -->
			<div class="sl-insider-trading-risk__content">

				<div class="sl-insider-trading-risk__body">

					<p>
						<?php
						esc_html_e(
							'Insider trading generally concerns securities trading in circumstances involving material, inside or otherwise protected non-public information. The precise legal definition and terminology depend on the applicable jurisdiction.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'The risk may arise through transactions, acquisitions, financial results, strategic activity, investments, portfolio businesses or other confidential corporate developments.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</div>

		</div>

		<!-- Highlighted Decision Box -->
		<div class="sl-insider-trading-risk__highlight">

					<h4>
						<?php
						esc_html_e(
							'The practical question employees need to recognise',
							'akaza-adventure'
						);
						?>
					</h4>

					<p class="sl-insider-trading-risk__question">
						<?php
						esc_html_e(
							'“Do I know something that changes what I should do before I trade or share this information?”',
							'akaza-adventure'
						);
						?>
					</p>

					<p class="sl-insider-trading-risk__highlight-copy">
						<?php
						esc_html_e(
							'Effective Insider Trading eLearning helps employees recognise that decision point before they act.',
							'akaza-adventure'
						);
						?>
					</p>

		</div>

	</div>
</section>