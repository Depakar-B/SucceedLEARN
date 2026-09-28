<?php
/**
 * S-Metrics — Why Security Awareness Reporting Matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-metrics-why"
	aria-labelledby="sl-s-metrics-why-title"
>
	<div class="container">

		<div class="sl-s-metrics-why__grid">

			<div class="sl-s-metrics-why__media">
				<img
					class="sl-s-metrics-why__image"
					src="<?php echo esc_url( akaza_upload_url( '2026/09/Why-Security-Awareness-Reporting-Matters.webp' ) ); ?>"
					alt="<?php esc_attr_e( 'Why Security Awareness Reporting Matters', 'akaza-adventure' ); ?>"
					width="800"
					height="600"
					loading="lazy"
					decoding="async"
				>
			</div>

			<div class="sl-s-metrics-why__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Why Reporting Matters', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-metrics-why-title">
					<?php esc_html_e( 'Why Security Awareness', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Reporting Matters', 'akaza-adventure' ); ?></span>
				</h2>

				<h3 class="sl-s-metrics-why__subtitle">
					<?php esc_html_e( 'Awareness Programmes Need More Than Completion Data', 'akaza-adventure' ); ?>
				</h3>

				<div class="sl-s-metrics-why__copy">
					<p>
						<?php
						esc_html_e(
							'Delivering cybersecurity awareness training is only one part of building a resilient workforce. Organisations also need to understand whether employees are completing assigned learning, recognising threats, improving over time, and actively adopting secure behaviours.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Without meaningful reporting, security-awareness programmes can become difficult to evaluate and time-consuming to manage.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Metrics helps organisations move beyond isolated completion records by bringing awareness activity and behavioural indicators into a single reporting environment.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'This provides teams with greater visibility into participation, campaign performance, employee behaviour and programme progress.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
