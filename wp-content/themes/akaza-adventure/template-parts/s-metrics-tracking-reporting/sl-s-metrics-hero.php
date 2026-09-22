<?php
/**
 * S-Metrics — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-metrics-hero"
	aria-labelledby="sl-s-metrics-hero-title"
>
	<div class="container">

		<div class="sl-s-metrics-hero__grid">

			<div class="sl-s-metrics-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'S-Metrics', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-s-metrics-hero-title">
					<?php esc_html_e( 'Security Awareness Analytics, Reporting & Compliance Dashboard', 'akaza-adventure' ); ?>
				</h1>

				<h2 class="sl-hero-h2">
					<?php esc_html_e( 'Measure Learning. Track Behaviour. Demonstrate Compliance.', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Security awareness programmes generate valuable data - but without meaningful reporting, organisations struggle to understand employee behaviour, measure programme effectiveness, or demonstrate compliance during audits.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'S-Metrics is the central analytics and reporting platform within the SucceedLEARN Security Behaviour & Culture Suite, bringing together learning progress, phishing simulation results, microlearning engagement, gamified learning participation, and awareness reinforcement into one unified dashboard.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'With powerful reporting, intelligent filtering, exportable reports, and organisation-wide visibility, S-Metrics enables administrators to measure awareness performance, identify areas of risk, demonstrate due diligence, and continuously strengthen their cybersecurity awareness programme.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-hero-actions sl-s-metrics-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>

			<div class="sl-s-metrics-hero__media">
				<div class="sl-s-metrics-hero__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
