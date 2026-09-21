<?php
/**
 * SucceedLEARN
 * Insider Trading eLearning
 * Market Abuse Regulations and Insider Trading Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-insider-trading-market-abuse"
	aria-labelledby="sl-insider-trading-market-abuse-title"
>
	<div class="container">

		<div class="sl-insider-trading-market-abuse__intro">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Market Abuse Regulations and Insider Trading',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-insider-trading-market-abuse-title">
				<?php
				echo wp_kses_post(
					__(
						'What Market Abuse Regulation and Insider Trading <span>Terms Should Employees Know?</span>',
						'akaza-adventure'
					)
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Insider-trading terminology differs between regulatory frameworks. Employees need to recognise the regulator and information concept relevant to the environment in which they operate.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-insider-trading-market-abuse__cards">

			<article class="sl-insider-trading-market-abuse__card">

				<span class="sl-insider-trading-market-abuse__label">
					<?php
					esc_html_e(
						'UK MAR',
						'akaza-adventure'
					);
					?>
				</span>

				<h3>
					<?php
					esc_html_e(
						'Inside Information',
						'akaza-adventure'
					);
					?>
				</h3>

				<p>
					<?php
					esc_html_e(
						'UK MAR is central to the UK\'s Market Abuse Regulation framework and addresses inside information, insider dealing and related market-abuse risks.',
						'akaza-adventure'
					);
					?>
				</p>

			</article>

			<article class="sl-insider-trading-market-abuse__card">

				<span class="sl-insider-trading-market-abuse__label">
					<?php
					esc_html_e(
						'US SEC',
						'akaza-adventure'
					);
					?>
				</span>

				<h3>
					<?php
					esc_html_e(
						'Material Non-Public Information',
						'akaza-adventure'
					);
					?>
				</h3>

				<p>
					<?php
					esc_html_e(
						'The US SEC, the Securities and Exchange Commission (SEC), is a key regulator within the US securities framework.',
						'akaza-adventure'
					);
					?>
				</p>

			</article>

			<article class="sl-insider-trading-market-abuse__card">

				<span class="sl-insider-trading-market-abuse__label">
					<?php
					esc_html_e(
						'India SEBI',
						'akaza-adventure'
					);
					?>
				</span>

				<h3>
					<?php
					esc_html_e(
						'Unpublished Price Sensitive Information',
						'akaza-adventure'
					);
					?>
				</h3>

				<p>
					<?php
					esc_html_e(
						'India SEBI Regulation uses UPSI as an important concept when considering insider-trading and information-handling risks.',
						'akaza-adventure'
					);
					?>
				</p>

			</article>

		</div>

	</div>
</section>