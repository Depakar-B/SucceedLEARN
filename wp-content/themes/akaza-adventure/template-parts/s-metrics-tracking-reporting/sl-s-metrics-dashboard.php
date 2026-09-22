<?php
/**
 * S-Metrics — One Dashboard. Complete Visibility.
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
					<?php esc_html_e( 'Unified Visibility', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-metrics-dashboard-title">
					<?php esc_html_e( 'One Dashboard.', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Complete Visibility.', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-metrics-dashboard__copy">
					<p>
						<?php
						esc_html_e(
							'S-Metrics consolidates reporting across every component of your security awareness programme, providing administrators with a single source of truth for monitoring employee participation, measuring behavioural improvements, and supporting compliance initiatives.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Instead of switching between multiple reporting systems, administrators can monitor awareness performance across courses, phishing simulations, microlearning campaigns, gamified learning, and reinforcement activities from one intuitive dashboard.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

				<a class="sl-content-btn sl-content-btn-primary" href="#request-demo">
					<?php esc_html_e( 'Explore the Dashboard', 'akaza-adventure' ); ?>
				</a>

			</div>

			<div class="sl-s-metrics-dashboard__media">
				<div class="sl-s-metrics-dashboard__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
