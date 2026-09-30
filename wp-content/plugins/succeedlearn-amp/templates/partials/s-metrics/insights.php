<?php
/**
 * S-Metrics AMP — Actionable insights.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$insights_image = succeedlearn_amp_get_sm_image( '2026/09/Security-Awareness-Data-to-Action.webp' );
?>
<section class="sl-s-metrics-insights" aria-labelledby="sl-s-metrics-insights-title">
	<div class="sl-wrap">
		<div class="sl-s-metrics-insights__grid">
			<div class="sl-s-metrics-insights__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Actionable Intelligence', 'succeedlearn-amp' ); ?></span>

				<h2 id="sl-s-metrics-insights-title" class="sl-h2">
					<?php esc_html_e( 'Turn Security Awareness Data', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Into Actionable Insight.', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-s-metrics-insights__copy">
					<p><?php esc_html_e( 'Security awareness reporting and analytics should do more than present numbers.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'S-Metrics helps organisations identify knowledge gaps, monitor behavioural improvements, detect high-risk users, evaluate campaign effectiveness, and make informed decisions that continuously strengthen organisational security culture.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Whether reviewing phishing trends, monitoring awareness completion, analysing department-level participation, or preparing for an audit, S-Metrics provides the visibility needed to make security awareness measurable, actionable, and continuously improving.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>

			<div class="sl-s-metrics-insights__media">
				<div class="sl-s-metrics-insights__image">
					<amp-img
						src="<?php echo esc_url( $insights_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'Security Awareness Data to Action', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
