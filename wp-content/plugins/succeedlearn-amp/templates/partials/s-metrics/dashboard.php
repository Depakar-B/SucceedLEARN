<?php
/**
 * S-Metrics AMP — Meet S-Metrics / Dashboard.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$dashboard_image = succeedlearn_amp_get_sm_image( '2026/09/Security-Awareness-Reporting-Dashboard-S-Metrics.webp' );
?>
<section
	class="sl-s-metrics-dashboard"
	id="unified-dashboard"
	aria-labelledby="sl-s-metrics-dashboard-title"
>
	<div class="sl-wrap">
		<div class="sl-s-metrics-dashboard__grid">
			<div class="sl-s-metrics-dashboard__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Meet S-Metrics', 'succeedlearn-amp' ); ?></span>

				<h2 id="sl-s-metrics-dashboard-title" class="sl-h2">
					<?php esc_html_e( 'Security Awareness Analytics', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( '& Reports Dashboard', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-s-metrics-dashboard__copy">
					<p><?php esc_html_e( 'S-Metrics is the measurement layer of the SucceedLEARN Security Behaviour & Culture Suite.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'It consolidates data from multiple awareness activities into one central dashboard, helping administrators monitor programme performance without switching between separate reporting systems.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Organisations can use S-Metrics to review learner progress, phishing campaign outcomes, microlearning activity, gamified learning participation and other awareness indicators from one place.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'The result is a clearer view of how employees are engaging with the organisation\'s security awareness programme and where additional reinforcement may be required.', 'succeedlearn-amp' ); ?></p>
					<p><strong><?php esc_html_e( 'One platform. Multiple awareness signals. One clearer view of human cyber risk.', 'succeedlearn-amp' ); ?></strong></p>
				</div>

				<button
					type="button"
					class="sl-content-btn sl-content-btn-primary"
					data-cta="dashboard-walkthrough"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Book A Platform Walkthrough', 'succeedlearn-amp' ); ?>
				</button>
			</div>

			<div class="sl-s-metrics-dashboard__media">
				<div class="sl-s-metrics-dashboard__image">
					<amp-img
						src="<?php echo esc_url( $dashboard_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'Security Awareness Analytics & Reports Dashboard', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
