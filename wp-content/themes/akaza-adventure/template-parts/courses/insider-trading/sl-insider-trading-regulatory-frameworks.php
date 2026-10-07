<?php
/**
 * SucceedLEARN
 * Insider Trading eLearning
 * Market Abuse Regulations and Insider Trading
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-insider-trading-regulatory-frameworks"
	aria-labelledby="sl-insider-trading-regulatory-frameworks-title"
>
	<div class="container">

		<div class="sl-insider-trading-regulatory-frameworks__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Market Abuse Regulations', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-insider-trading-regulatory-frameworks-title">
				<?php
				echo wp_kses_post(
					__(
						'How Do Market Abuse Regulations, UK MAR, US SEC and India SEBI Regulation Address <span>Insider Trading?</span>',
						'akaza-adventure'
					)
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Market-abuse and insider-trading frameworks share a broad concern with misuse of protected non-public information, but their legal structures, terminology and detailed requirements differ.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-insider-trading-regulatory-frameworks__cards">

			<article
				class="sl-insider-trading-regulatory-frameworks__card sl-insider-trading-regulatory-frameworks__card--uk"
				aria-labelledby="sl-insider-trading-uk-title"
			>
				<div class="sl-insider-trading-regulatory-frameworks__media">
					<img
						src="https://succeedlearn.com/wp-content/uploads/2026/10/uk_mar_market_abuse_regulation.webp"
						alt="<?php esc_attr_e( 'UK MAR and financial markets regulations on a desk overlooking Parliament', 'akaza-adventure' ); ?>"
						loading="lazy"
					>
					<span class="sl-insider-trading-regulatory-frameworks__flag" aria-hidden="true">🇬🇧</span>
				</div>

				<div class="sl-insider-trading-regulatory-frameworks__content">
					<span class="sl-insider-trading-regulatory-frameworks__label">
						<?php esc_html_e( 'United Kingdom', 'akaza-adventure' ); ?>
					</span>

					<h3 id="sl-insider-trading-uk-title">
						<?php esc_html_e( 'UK MAR and Market Abuse Regulations', 'akaza-adventure' ); ?>
					</h3>

					<div class="sl-insider-trading-regulatory-frameworks__description">
						<p>
							<strong><?php esc_html_e( 'UK MAR', 'akaza-adventure' ); ?></strong>
							<?php esc_html_e( ' addresses insider dealing, unlawful disclosure of inside information and market manipulation.', 'akaza-adventure' ); ?>
						</p>
						<p>
							<?php esc_html_e( 'Inside information is assessed using criteria including whether information is precise, non-public, connected to relevant issuers or financial instruments and likely to have a significant effect on price if made public.', 'akaza-adventure' ); ?>
						</p>
					</div>

					<div class="sl-insider-trading-regulatory-frameworks__topics">
						<span class="sl-insider-trading-regulatory-frameworks__topics-label">
							<?php esc_html_e( 'Key topics', 'akaza-adventure' ); ?>
						</span>
						<ul>
							<li><?php esc_html_e( 'Inside information', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Insider dealing', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Unlawful disclosure', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Market manipulation', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Personal account dealing', 'akaza-adventure' ); ?></li>
						</ul>
					</div>

					<div class="sl-insider-trading-regulatory-frameworks__question">
						<span><?php esc_html_e( 'Employee question', 'akaza-adventure' ); ?></span>
						<p>
							<?php esc_html_e( 'Could this be inside information, and should I trade, disclose it or seek guidance?', 'akaza-adventure' ); ?>
						</p>
					</div>
				</div>
			</article>

			<article
				class="sl-insider-trading-regulatory-frameworks__card sl-insider-trading-regulatory-frameworks__card--us"
				aria-labelledby="sl-insider-trading-us-title"
			>
				<div class="sl-insider-trading-regulatory-frameworks__media">
					<img
						src="https://succeedlearn.com/wp-content/uploads/2026/10/us_sec_insider_trading_framework.webp"
						alt="<?php esc_attr_e( 'US SEC insider trading books beside a confidential MNPI file', 'akaza-adventure' ); ?>"
						loading="lazy"
					>
					<span class="sl-insider-trading-regulatory-frameworks__flag" aria-hidden="true">🇺🇸</span>
				</div>

				<div class="sl-insider-trading-regulatory-frameworks__content">
					<span class="sl-insider-trading-regulatory-frameworks__label">
						<?php esc_html_e( 'United States', 'akaza-adventure' ); ?>
					</span>

					<h3 id="sl-insider-trading-us-title">
						<?php esc_html_e( 'US SEC Insider Trading Framework', 'akaza-adventure' ); ?>
					</h3>

					<div class="sl-insider-trading-regulatory-frameworks__description">
						<p>
							<?php esc_html_e( 'The US SEC, formally the Securities and Exchange Commission (SEC), administers and enforces important parts of the US federal securities framework.', 'akaza-adventure' ); ?>
						</p>
						<p>
							<?php esc_html_e( 'Material Non-Public Information (MNPI) is an important concept when evaluating how information may affect trading and disclosure decisions.', 'akaza-adventure' ); ?>
						</p>
					</div>

					<div class="sl-insider-trading-regulatory-frameworks__topics">
						<span class="sl-insider-trading-regulatory-frameworks__topics-label">
							<?php esc_html_e( 'Key topics', 'akaza-adventure' ); ?>
						</span>
						<ul>
							<li><?php esc_html_e( 'Material Non-Public Information', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Trading involving MNPI', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Improper disclosure', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Tipping', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Trading controls', 'akaza-adventure' ); ?></li>
						</ul>
					</div>

					<div class="sl-insider-trading-regulatory-frameworks__question">
						<span><?php esc_html_e( 'Employee question', 'akaza-adventure' ); ?></span>
						<p>
							<?php esc_html_e( 'Is this information material and non-public, and what should I do before trading or sharing it?', 'akaza-adventure' ); ?>
						</p>
					</div>
				</div>
			</article>

			<article
				class="sl-insider-trading-regulatory-frameworks__card sl-insider-trading-regulatory-frameworks__card--india"
				aria-labelledby="sl-insider-trading-india-title"
			>
				<div class="sl-insider-trading-regulatory-frameworks__media">
					<img
						src="https://succeedlearn.com/wp-content/uploads/2026/10/india_sebi_insider_trading_regulations.webp"
						alt="<?php esc_attr_e( 'India SEBI insider trading regulations beside a confidential UPSI file', 'akaza-adventure' ); ?>"
						loading="lazy"
					>
					<span class="sl-insider-trading-regulatory-frameworks__flag" aria-hidden="true">🇮🇳</span>
				</div>

				<div class="sl-insider-trading-regulatory-frameworks__content">
					<span class="sl-insider-trading-regulatory-frameworks__label">
						<?php esc_html_e( 'India', 'akaza-adventure' ); ?>
					</span>

					<h3 id="sl-insider-trading-india-title">
						<?php esc_html_e( 'India SEBI Regulation', 'akaza-adventure' ); ?>
					</h3>

					<div class="sl-insider-trading-regulatory-frameworks__description">
						<p>
							<?php esc_html_e( 'A key framework is the SEBI (Prohibition of Insider Trading) Regulations, 2015.', 'akaza-adventure' ); ?>
						</p>
						<p>
							<?php esc_html_e( 'The India SEBI Regulation framework places significant emphasis on Unpublished Price Sensitive Information (UPSI), insiders, communication of UPSI and trading-related restrictions.', 'akaza-adventure' ); ?>
						</p>
					</div>

					<div class="sl-insider-trading-regulatory-frameworks__topics">
						<span class="sl-insider-trading-regulatory-frameworks__topics-label">
							<?php esc_html_e( 'Key topics', 'akaza-adventure' ); ?>
						</span>
						<ul>
							<li><?php esc_html_e( 'UPSI', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Insiders', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Connected persons', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Communication of UPSI', 'akaza-adventure' ); ?></li>
							<li><?php esc_html_e( 'Trading-related controls', 'akaza-adventure' ); ?></li>
						</ul>
					</div>

					<div class="sl-insider-trading-regulatory-frameworks__question">
						<span><?php esc_html_e( 'Employee question', 'akaza-adventure' ); ?></span>
						<p>
							<?php esc_html_e( 'Am I in possession of UPSI, and what does that mean for what I can trade or communicate?', 'akaza-adventure' ); ?>
						</p>
					</div>
				</div>
			</article>

		</div>

	</div>
</section>
