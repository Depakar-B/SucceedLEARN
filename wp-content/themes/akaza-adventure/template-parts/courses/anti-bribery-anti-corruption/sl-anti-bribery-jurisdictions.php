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
					'Our UK ABAC course includes UK and US legal content. India-focused ABAC learning is also available within a wider range of courses that can be customised for your organisation\'s needs.',
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
						<?php esc_html_e( 'US Foreign Corrupt Practices Act (FCPA)', 'akaza-adventure' ); ?>
					</h3>
					<p>
						<?php
						esc_html_e(
							'The FCPA prohibits covered individuals and businesses from bribing foreign officials to obtain or retain business. It also contains accounting requirements for issuers, including books and records and internal accounting controls.',
							'akaza-adventure'
						);
						?>
					</p>
					<p>
						<?php
						esc_html_e(
							'Its narrow exception for certain routine governmental action does not make facilitation payments universally lawful. The UK Bribery Act has no equivalent exception, and organisational policy may prohibit such payments.',
							'akaza-adventure'
						);
						?>
					</p>
					<p>
						<?php
						esc_html_e(
							'The UK ABAC course introduces the FCPA alongside UK law to support awareness of cross-border bribery risks.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>
			</article>

			<article class="sl-anti-bribery-jurisdictions__card">
				<div class="sl-anti-bribery-jurisdictions__number" aria-hidden="true">03</div>
				<span class="sl-anti-bribery-jurisdictions__country">
					<?php esc_html_e( 'India', 'akaza-adventure' ); ?>
				</span>
				<div class="sl-anti-bribery-jurisdictions__card-content">
					<h3>
						<?php esc_html_e( 'Prevention of Corruption Act 1988', 'akaza-adventure' ); ?>
					</h3>
					<p>
						<?php
						esc_html_e(
							'The India-focused course covers the Prevention of Corruption Act 1988, including changes introduced by the 2018 amendment. It explains bribery involving public servants and the giving or promising of an undue advantage.',
							'akaza-adventure'
						);
						?>
					</p>
					<p>
						<?php
						esc_html_e(
							'It introduces the offence relating to bribery of a public servant by a commercial organisation, the role of associated persons and potential liability for persons in charge where the statutory conditions are met.',
							'akaza-adventure'
						);
						?>
					</p>
					<p>
						<?php
						esc_html_e(
							'The content can also be aligned with the organisation\'s Code of Conduct, gifts and hospitality policy, whistleblowing process and internal approval controls.',
							'akaza-adventure'
						);
						?>
					</p>
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
