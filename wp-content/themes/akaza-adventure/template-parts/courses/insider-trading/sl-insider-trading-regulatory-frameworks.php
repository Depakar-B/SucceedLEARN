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

		<!-- Section Intro -->
		<div class="sl-insider-trading-regulatory-frameworks__intro">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Market Abuse Regulations',
					'akaza-adventure'
				);
				?>
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
				<?php
				esc_html_e(
					'Market-abuse and insider-trading frameworks share a broad concern with misuse of protected non-public information, but their legal structures, terminology and detailed requirements differ.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>


		<!-- United Kingdom -->
		<article
			class="sl-insider-trading-regulatory-frameworks__card sl-insider-trading-regulatory-frameworks__card--uk"
			aria-labelledby="sl-insider-trading-uk-title"
		>

			<div class="sl-insider-trading-regulatory-frameworks__content">

				<span class="sl-insider-trading-regulatory-frameworks__label">
					<?php
					esc_html_e(
						'United Kingdom',
						'akaza-adventure'
					);
					?>
				</span>

				<h3 id="sl-insider-trading-uk-title">
					<?php
					esc_html_e(
						'UK MAR and Market Abuse Regulations',
						'akaza-adventure'
					);
					?>
				</h3>

				<div class="sl-insider-trading-regulatory-frameworks__description">

					<p>
						<strong><?php esc_html_e( 'UK MAR', 'akaza-adventure' ); ?></strong>
						<?php
						esc_html_e(
							' addresses insider dealing, unlawful disclosure of inside information and market manipulation.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Inside information is assessed using criteria including whether information is precise, non-public, connected to relevant issuers or financial instruments and likely to have a significant effect on price if made public.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

				<div class="sl-insider-trading-regulatory-frameworks__topics">

					<span class="sl-insider-trading-regulatory-frameworks__topics-label">
						<?php
						esc_html_e(
							'Key topics',
							'akaza-adventure'
						);
						?>
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

					<span>
						<?php
						esc_html_e(
							'Employee question',
							'akaza-adventure'
						);
						?>
					</span>

					<p>
						<?php
						esc_html_e(
							'Could this be inside information, and should I trade, disclose it or seek guidance?',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

				<div class="sl-content-actions">

					<a
						class="sl-content-btn sl-content-btn-primary"
						href="#uk-course-link"
					>
						<?php
						esc_html_e(
							'Explore the Course',
							'akaza-adventure'
						);
						?>
						<span aria-hidden="true">→</span>
					</a>

				</div>

			</div>

			<div class="sl-insider-trading-regulatory-frameworks__media">

				<img
					src="https://images.unsplash.com/photo-1522083165195-3424ed129620?auto=format&fit=crop&w=900&q=85"
					alt="<?php esc_attr_e( 'US financial market representing insider trading compliance', 'akaza-adventure' ); ?>"
					loading="lazy"
				>

			</div>

		</article>


		<!-- United States -->
		<article
			class="sl-insider-trading-regulatory-frameworks__card sl-insider-trading-regulatory-frameworks__card--us"
			aria-labelledby="sl-insider-trading-us-title"
		>

			<div class="sl-insider-trading-regulatory-frameworks__media">

				<img
					src="https://images.unsplash.com/photo-1522083165195-3424ed129620?auto=format&fit=crop&w=900&q=85"
					alt="<?php esc_attr_e( 'US financial market representing US SEC insider trading compliance', 'akaza-adventure' ); ?>"
					loading="lazy"
				>

			</div>

			<div class="sl-insider-trading-regulatory-frameworks__content">

				<span class="sl-insider-trading-regulatory-frameworks__label">
					<?php
					esc_html_e(
						'United States',
						'akaza-adventure'
					);
					?>
				</span>

				<h3 id="sl-insider-trading-us-title">
					<?php
					esc_html_e(
						'US SEC Insider Trading Framework',
						'akaza-adventure'
					);
					?>
				</h3>

				<div class="sl-insider-trading-regulatory-frameworks__description">

					<p>
						<?php
						esc_html_e(
							'The US SEC, formally the Securities and Exchange Commission (SEC), administers and enforces important parts of the US federal securities framework.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Material Non-Public Information (MNPI) is an important concept when evaluating how information may affect trading and disclosure decisions.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

				<div class="sl-insider-trading-regulatory-frameworks__topics">

					<span class="sl-insider-trading-regulatory-frameworks__topics-label">
						<?php
						esc_html_e(
							'Key topics',
							'akaza-adventure'
						);
						?>
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

					<span>
						<?php
						esc_html_e(
							'Employee question',
							'akaza-adventure'
						);
						?>
					</span>

					<p>
						<?php
						esc_html_e(
							'Is this information material and non-public, and what should I do before trading or sharing it?',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

				<div class="sl-content-actions">

					<a
						class="sl-content-btn sl-content-btn-primary"
						href="#us-course-link"
					>
						<?php
						esc_html_e(
							'Explore the Course',
							'akaza-adventure'
						);
						?>
						<span aria-hidden="true">→</span>
					</a>

				</div>

			</div>

		</article>


		<!-- India -->
		<article
			class="sl-insider-trading-regulatory-frameworks__card sl-insider-trading-regulatory-frameworks__card--india"
			aria-labelledby="sl-insider-trading-india-title"
		>

			<div class="sl-insider-trading-regulatory-frameworks__content">

				<span class="sl-insider-trading-regulatory-frameworks__label">
					<?php
					esc_html_e(
						'India',
						'akaza-adventure'
					);
					?>
				</span>

				<h3 id="sl-insider-trading-india-title">
					<?php
					esc_html_e(
						'India SEBI Regulation',
						'akaza-adventure'
					);
					?>
				</h3>

				<div class="sl-insider-trading-regulatory-frameworks__description">

					<p>
						<?php
						esc_html_e(
							'A key framework is the SEBI (Prohibition of Insider Trading) Regulations, 2015.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'The India SEBI Regulation framework places significant emphasis on Unpublished Price Sensitive Information (UPSI), insiders, communication of UPSI and trading-related restrictions.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

				<div class="sl-insider-trading-regulatory-frameworks__topics">

					<span class="sl-insider-trading-regulatory-frameworks__topics-label">
						<?php
						esc_html_e(
							'Key topics',
							'akaza-adventure'
						);
						?>
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

					<span>
						<?php
						esc_html_e(
							'Employee question',
							'akaza-adventure'
						);
						?>
					</span>

					<p>
						<?php
						esc_html_e(
							'Am I in possession of UPSI, and what does that mean for what I can trade or communicate?',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

				<div class="sl-content-actions">

					<a
						class="sl-content-btn sl-content-btn-primary"
						href="#india-course-link"
					>
						<?php
						esc_html_e(
							'Explore the Course',
							'akaza-adventure'
						);
						?>
						<span aria-hidden="true">→</span>
					</a>

				</div>

			</div>

			<div class="sl-insider-trading-regulatory-frameworks__media">

				<img
					src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?auto=format&fit=crop&w=900&q=85"
					alt="<?php esc_attr_e( 'India representing India SEBI Regulation for insider trading', 'akaza-adventure' ); ?>"
					loading="lazy"
				>

			</div>

		</article>


		<!-- Other Jurisdictions -->
		<div class="sl-insider-trading-regulatory-frameworks__other">

			<div class="sl-insider-trading-regulatory-frameworks__other-content">

				<span class="sl-insider-trading-regulatory-frameworks__label">
					<?php
					esc_html_e(
						'Other jurisdictions',
						'akaza-adventure'
					);
					?>
				</span>

				<h3>
					<?php
					esc_html_e(
						'Need Insider Trading eLearning for Another Jurisdiction?',
						'akaza-adventure'
					);
					?>
				</h3>

				<p>
					<?php
					esc_html_e(
						'SucceedLEARN already provides regional Insider Trading eLearning for the United Kingdom, United States and India.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Organisations can select an existing off-the-shelf course where an appropriate course is available, or work with SucceedLEARN to customise learning around their organisation, jurisdiction and internal requirements.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'For other countries, SucceedLEARN can discuss available off-the-shelf options where relevant or develop a customised course using agreed regulatory sources, organisational policies, terminology, learner roles and workplace scenarios.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-content-actions">

					<a
						class="sl-content-btn sl-content-btn-primary"
						href="#contact"
					>
						<?php
						esc_html_e(
							'Discuss Your Requirements',
							'akaza-adventure'
						);
						?>
						<span aria-hidden="true">→</span>
					</a>

				</div>

			</div>

		</div>


		<!-- Regulatory Note -->
		<div class="sl-insider-trading-regulatory-frameworks__note">

			<p>
				<strong>
					<?php
					esc_html_e(
						'Regulatory note:',
						'akaza-adventure'
					);
					?>
				</strong>

				<?php
				esc_html_e(
					'These summaries provide high-level learning context and are not legal advice. Applicable requirements depend on jurisdiction, circumstances and organisational policies.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

	</div>
</section>