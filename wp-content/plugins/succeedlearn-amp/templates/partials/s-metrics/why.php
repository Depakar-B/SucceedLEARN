<?php
/**
 * S-Metrics AMP — Why Security Awareness Reporting Matters.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_image = succeedlearn_amp_get_sm_image( '2026/09/Why-Security-Awareness-Reporting-Matters.webp' );
?>
<section class="sl-s-metrics-why" aria-labelledby="sl-s-metrics-why-title">
	<div class="sl-wrap">
		<div class="sl-s-metrics-why__grid">
			<div class="sl-s-metrics-why__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Why Reporting Matters', 'succeedlearn-amp' ); ?></span>

				<h2 id="sl-s-metrics-why-title" class="sl-h2">
					<?php esc_html_e( 'Why Security Awareness', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Reporting Matters', 'succeedlearn-amp' ); ?></span>
				</h2>

				<h3 class="sl-s-metrics-why__subtitle">
					<?php esc_html_e( 'Awareness Programmes Need More Than Completion Data', 'succeedlearn-amp' ); ?>
				</h3>

				<div class="sl-s-metrics-why__copy">
					<p><?php esc_html_e( 'Delivering cybersecurity awareness training is only one part of building a resilient workforce. Organisations also need to understand whether employees are completing assigned learning, recognising threats, improving over time, and actively adopting secure behaviours.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Without meaningful reporting, security-awareness programmes can become difficult to evaluate and time-consuming to manage.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'S-Metrics helps organisations move beyond isolated completion records by bringing awareness activity and behavioural indicators into a single reporting environment.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'This provides teams with greater visibility into participation, campaign performance, employee behaviour and programme progress.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>

			<div class="sl-s-metrics-why__media">
				<div class="sl-s-metrics-why__image">
					<amp-img
						src="<?php echo esc_url( $why_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'Why Security Awareness Reporting Matters', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
