<?php
/**
 * S-Metrics — Turn Security Awareness Data Into Actionable Insight.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-metrics-insights"
	aria-labelledby="sl-s-metrics-insights-title"
>
	<div class="container">

		<div class="sl-s-metrics-insights__grid">

			<div class="sl-s-metrics-insights__media">
				<div class="sl-s-metrics-insights__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

			<div class="sl-s-metrics-insights__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Actionable Intelligence', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-metrics-insights-title">
					<?php esc_html_e( 'Turn Security Awareness Data', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Into Actionable Insight.', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-metrics-insights__copy">
					<p>
						<?php
						esc_html_e(
							'Security awareness reporting and analytics should do more than present numbers.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Metrics helps organisations identify knowledge gaps, monitor behavioural improvements, detect high-risk users, evaluate campaign effectiveness, and make informed decisions that continuously strengthen organisational security culture.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Whether reviewing phishing trends, monitoring awareness completion, analysing department-level participation, or preparing for an audit, S-Metrics provides the visibility needed to make security awareness measurable, actionable, and continuously improving.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
