<?php
/**
 * S-Metrics — Meet S-Metrics / Security Awareness Analytics & Reporting Dashboard.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-metrics-dashboard"
	id="unified-dashboard"
	aria-labelledby="sl-s-metrics-dashboard-title"
>
	<div class="container">

		<div class="sl-s-metrics-dashboard__grid">

			<div class="sl-s-metrics-dashboard__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Meet S-Metrics', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-metrics-dashboard-title">
					<?php esc_html_e( 'Security Awareness Analytics', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( '& Reporting Dashboard', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-metrics-dashboard__copy">
					<p>
						<?php
						esc_html_e(
							'S-Metrics is the measurement layer of the SucceedLEARN Security Behaviour & Culture Suite.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'It consolidates data from multiple awareness activities into one central dashboard, helping administrators monitor programme performance without switching between separate reporting systems.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Organisations can use S-Metrics to review learner progress, phishing campaign outcomes, microlearning activity, gamified learning participation and other awareness indicators from one place.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'The result is a clearer view of how employees are engaging with the organisation\'s security awareness programme and where additional reinforcement may be required.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<strong>
							<?php
							esc_html_e(
								'One platform. Multiple awareness signals. One clearer view of human cyber risk.',
								'akaza-adventure'
							);
							?>
						</strong>
					</p>
				</div>

				<a
					class="sl-content-btn sl-content-btn-primary"
					href="#request-demo"
				>
					<?php esc_html_e( 'Book A Platform Walkthrough', 'akaza-adventure' ); ?>
				</a>

			</div>

			<div class="sl-s-metrics-dashboard__media">
				<img
					class="sl-s-metrics-dashboard__image"
					src="<?php echo esc_url( akaza_upload_url( '2026/09/Security-Awareness-Reporting-Dashboard-S-Metrics.webp' ) ); ?>"
					alt="<?php esc_attr_e( 'Security Awareness Analytics & Reporting Dashboard', 'akaza-adventure' ); ?>"
					width="800"
					height="600"
					loading="lazy"
					decoding="async"
				>
			</div>

		</div>

	</div>
</section>
