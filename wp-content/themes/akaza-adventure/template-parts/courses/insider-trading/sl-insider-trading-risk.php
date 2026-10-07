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

			<div class="sl-insider-trading-risk__media">

				<img
					class="sl-insider-trading-risk__image"
					src="https://succeedlearn.com/wp-content/uploads/2026/10/insider_trading_monitoring_scene.webp"
					alt="<?php esc_attr_e( 'A person reviewing a trading decision beside confidential information', 'akaza-adventure' ); ?>"
					loading="lazy"
					decoding="async"
				>

			</div>

		</div>

	</div>
</section>