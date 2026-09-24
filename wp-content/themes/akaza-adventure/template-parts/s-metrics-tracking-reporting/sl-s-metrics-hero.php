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
						'Security awareness programmes generate valuable data across training, phishing simulations, microlearning, gamified learning and reinforcement activities.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'But data alone is not enough.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Organisations need a clear way to understand whether employees are completing assigned learning, how they respond to simulated threats, where engagement is improving, and which areas may require additional attention.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'S-Metrics is the central analytics and reporting layer of the SucceedLEARN Security Behaviour & Culture Suite (SBCS), bringing security awareness data together in one unified reporting environment.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'From learner progress and campaign performance to phishing behaviour and employee engagement, S-Metrics helps security, compliance and learning teams turn programme activity into measurable insight.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<strong>
						<?php
						esc_html_e(
							'Measure. Analyse. Improve.',
							'akaza-adventure'
						);
						?>
					</strong>
				</p>

				<div class="sl-hero-actions sl-s-metrics-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
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
