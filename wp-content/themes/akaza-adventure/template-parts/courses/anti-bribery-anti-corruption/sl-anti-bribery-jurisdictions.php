<?php
/**
 * Anti-Bribery and Anti-Corruption — Jurisdiction-Focused Options.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$jurisdictions = array(
	array(
		'label'  => __( '01 / United Kingdom', 'akaza-adventure' ),
		'title'  => __( 'UK Bribery Act 2010 (BA 2010) training', 'akaza-adventure' ),
		'text'   => __( 'Build awareness of corporate bribery under the Bribery Act 2010. The UK course links the law to gifts, hospitality, organisational policy and practical workplace decisions.', 'akaza-adventure' ),
		'points' => array(
			__( 'Recognise bribery involving financial and non-financial benefits.', 'akaza-adventure' ),
			__( 'Identify risks in third-party relationships and business hospitality.', 'akaza-adventure' ),
			__( 'Apply approval and reporting procedures when concerns arise.', 'akaza-adventure' ),
		),
	),
	array(
		'label'  => __( '02 / United States', 'akaza-adventure' ),
		'title'  => __( 'US Foreign Corrupt Practices Act (FCPA) training content', 'akaza-adventure' ),
		'text'   => __( 'The UK ABAC course also introduces the US Foreign Corrupt Practices Act of 1977. This content provides context for international business and bribery risks involving foreign public officials.', 'akaza-adventure' ),
		'points' => array(
			__( 'Understand the FCPA’s role in tackling foreign bribery.', 'akaza-adventure' ),
			__( 'Recognise risks involving intermediaries, payments and business benefits.', 'akaza-adventure' ),
			__( 'Distinguish the UK and US approaches to facilitation payments.', 'akaza-adventure' ),
		),
	),
	array(
		'label'  => __( '03 / India', 'akaza-adventure' ),
		'title'  => __( 'India Prevention of Corruption Act training', 'akaza-adventure' ),
		'text'   => __( 'India-focused ABAC learning introduces the Prevention of Corruption Act 1988, as amended in 2018. It connects bribery involving public servants and undue advantages with everyday business scenarios.', 'akaza-adventure' ),
		'points' => array(
			__( 'Identify bribery risks involving public servants and associated persons.', 'akaza-adventure' ),
			__( 'Assess gifts, third-party relationships and improper benefits.', 'akaza-adventure' ),
			__( 'Follow organisational policies, approval routes and escalation processes.', 'akaza-adventure' ),
		),
	),
);
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

		<div class="sl-anti-bribery-jurisdictions__rows">
			<?php foreach ( $jurisdictions as $jurisdiction ) : ?>
				<article class="sl-anti-bribery-jurisdictions__row">
					<div class="sl-anti-bribery-jurisdictions__label">
						<?php echo esc_html( $jurisdiction['label'] ); ?>
					</div>
					<h3><?php echo esc_html( $jurisdiction['title'] ); ?></h3>
					<p><?php echo esc_html( $jurisdiction['text'] ); ?></p>
					<ul>
						<?php foreach ( $jurisdiction['points'] as $point ) : ?>
							<li><?php echo esc_html( $point ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-anti-bribery-jurisdictions__custom">

			<div class="sl-anti-bribery-jurisdictions__custom-heading">
				<p class="sl-anti-bribery-jurisdictions__custom-eyebrow">
					<?php esc_html_e( 'Customisable Compliance Learning', 'akaza-adventure' ); ?>
				</p>

				<h3><?php esc_html_e( 'Need a different country, policy or risk profile?', 'akaza-adventure' ); ?></h3>
			</div>

			<p>
				<?php
				esc_html_e(
					'SucceedLEARN can customise content around the jurisdictions in which you operate, your employee roles, sector risks, gifts and hospitality limits, approval routes, reporting channels and branding.',
					'akaza-adventure'
				);
				?>
			</p>

			<div class="sl-anti-bribery-jurisdictions__custom-actions">
				<a class="sl-content-btn sl-content-btn-secondary" href="#contact">
					<?php esc_html_e( 'Discuss Customisation', 'akaza-adventure' ); ?>
				</a>
			</div>

		</div>

	</div>
</section>
