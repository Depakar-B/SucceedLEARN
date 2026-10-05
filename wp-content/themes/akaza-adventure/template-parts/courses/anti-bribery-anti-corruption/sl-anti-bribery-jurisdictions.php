<?php
/**
 * Anti-Bribery and Anti-Corruption — Jurisdiction-Focused Options.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="course-options"
	class="sl-course-jurisdictions sl-anti-bribery-jurisdictions"
	aria-labelledby="sl-anti-bribery-jurisdictions-title"
>
	<div class="container">

		<div class="sl-anti-bribery-jurisdictions__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Jurisdiction-Focused Options', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-anti-bribery-jurisdictions-title">
				<?php esc_html_e( 'UK Bribery Act, US FCPA and India ABAC training:', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'which course does your workforce need?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Our UK ABAC course includes UK and US legal content. India-focused ABAC learning is also available within a wider range of courses that can be customised for your organisation’s needs.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-anti-bribery-jurisdictions__grid">

			<article class="sl-anti-bribery-jurisdictions__card">
				<div class="sl-anti-bribery-jurisdictions__number" aria-hidden="true">01</div>
				<span class="sl-anti-bribery-jurisdictions__country">
					<?php esc_html_e( 'United Kingdom', 'akaza-adventure' ); ?>
				</span>
				<div class="sl-anti-bribery-jurisdictions__card-content">
					<h3>
						<?php esc_html_e( 'UK Bribery Act 2010 (BA 2010) training', 'akaza-adventure' ); ?>
					</h3>
					<p>
						<?php
						esc_html_e(
							'Build awareness of corporate bribery under the Bribery Act 2010. The UK course links the law to gifts, hospitality, organisational policy and practical workplace decisions.',
							'akaza-adventure'
						);
						?>
					</p>
					<ul>
						<li><?php esc_html_e( 'Recognise bribery involving financial and non-financial benefits.', 'akaza-adventure' ); ?></li>
						<li><?php esc_html_e( 'Identify risks in third-party relationships and business hospitality.', 'akaza-adventure' ); ?></li>
						<li><?php esc_html_e( 'Apply approval and reporting procedures when concerns arise.', 'akaza-adventure' ); ?></li>
					</ul>
				</div>
			</article>

			<article class="sl-anti-bribery-jurisdictions__card">
				<div class="sl-anti-bribery-jurisdictions__number" aria-hidden="true">02</div>
				<span class="sl-anti-bribery-jurisdictions__country">
					<?php esc_html_e( 'United States', 'akaza-adventure' ); ?>
				</span>
				<div class="sl-anti-bribery-jurisdictions__card-content">
					<h3>
						<?php esc_html_e( 'US Foreign Corrupt Practices Act (FCPA) training content', 'akaza-adventure' ); ?>
					</h3>
					<p>
						<?php
						esc_html_e(
							'The UK ABAC course also introduces the US Foreign Corrupt Practices Act of 1977. This content provides context for international business and bribery risks involving foreign public officials.',
							'akaza-adventure'
						);
						?>
					</p>
					<ul>
						<li><?php esc_html_e( 'Understand the FCPA’s role in tackling foreign bribery.', 'akaza-adventure' ); ?></li>
						<li><?php esc_html_e( 'Recognise risks involving intermediaries, payments and business benefits.', 'akaza-adventure' ); ?></li>
						<li><?php esc_html_e( 'Distinguish the UK and US approaches to facilitation payments.', 'akaza-adventure' ); ?></li>
					</ul>
				</div>
			</article>

			<article class="sl-anti-bribery-jurisdictions__card">
				<div class="sl-anti-bribery-jurisdictions__number" aria-hidden="true">03</div>
				<span class="sl-anti-bribery-jurisdictions__country">
					<?php esc_html_e( 'India', 'akaza-adventure' ); ?>
				</span>
				<div class="sl-anti-bribery-jurisdictions__card-content">
					<h3>
						<?php esc_html_e( 'India Prevention of Corruption Act training', 'akaza-adventure' ); ?>
					</h3>
					<p>
						<?php
						esc_html_e(
							'India-focused ABAC learning introduces the Prevention of Corruption Act 1988, as amended in 2018. It connects bribery involving public servants and undue advantages with everyday business scenarios.',
							'akaza-adventure'
						);
						?>
					</p>
					<ul>
						<li><?php esc_html_e( 'Identify bribery risks involving public servants and associated persons.', 'akaza-adventure' ); ?></li>
						<li><?php esc_html_e( 'Assess gifts, third-party relationships and improper benefits.', 'akaza-adventure' ); ?></li>
						<li><?php esc_html_e( 'Follow organisational policies, approval routes and escalation processes.', 'akaza-adventure' ); ?></li>
					</ul>
				</div>
			</article>

		</div>

		<div class="sl-anti-bribery-jurisdictions__custom">

			<div class="sl-anti-bribery-jurisdictions__custom-content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Customisable Compliance Learning', 'akaza-adventure' ); ?>
				</span>

				<h3>
					<?php esc_html_e( 'Need a different country, policy or', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'risk profile?', 'akaza-adventure' ); ?></span>
				</h3>

				<p>
					<?php
					esc_html_e(
						'SucceedLEARN can customise content around the jurisdictions in which you operate, your employee roles, sector risks, gifts and hospitality limits, approval routes, reporting channels and branding.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

			<div class="sl-anti-bribery-jurisdictions__custom-actions">
				<div class="sl-content-actions">
					<a class="sl-content-btn sl-content-btn-primary" href="#contact">
						<?php esc_html_e( 'Discuss Customisation', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>
			</div>

		</div>

	</div>
</section>
