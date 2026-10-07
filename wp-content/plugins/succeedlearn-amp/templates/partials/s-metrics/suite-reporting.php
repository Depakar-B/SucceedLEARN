<?php
/**
 * S-Metrics AMP — Suite-wide reporting cards.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$suite_reports = succeedlearn_amp_get_sm_suite_reports();
$report_image  = succeedlearn_amp_get_sm_image( '2026/09/S-Series-Reports-S-Metrics.webp' );
?>
<section class="sl-s-metrics-suite-reporting" aria-labelledby="sl-s-metrics-suite-reporting-title">
	<div class="sl-wrap">
		<div class="sl-s-metrics-suite-reporting__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Suite-Wide Reports', 'succeedlearn-amp' ); ?></span>

			<h2 id="sl-s-metrics-suite-reporting-title" class="sl-h2">
				<?php esc_html_e( 'Reports Across the Entire', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Behaviour & Culture Suite', 'succeedlearn-amp' ); ?></span>
			</h2>

			<h3 class="sl-s-metrics-suite-reporting__subtitle">
				<?php esc_html_e( 'One Reporting Layer Across Multiple Awareness Activities', 'succeedlearn-amp' ); ?>
			</h3>
		</div>

		<div class="sl-s-metrics-suite-reporting__layout">
			<div class="sl-s-metrics-suite-reporting__content">
				<div class="sl-s-metrics-suite-reporting__grid sl-amp-card-grid">
					<?php foreach ( $suite_reports as $report ) : ?>
						<article class="sl-s-metrics-suite-reporting__card">
							<h3 class="sl-panel-title"><?php echo esc_html( $report['title'] ); ?></h3>
							<p><?php echo esc_html( $report['lead'] ); ?></p>
							<p><?php echo esc_html( $report['intro'] ); ?></p>
							<ul class="sl-s-metrics-suite-reporting__list">
								<?php foreach ( $report['items'] as $item ) : ?>
									<li><?php echo esc_html( $item ); ?></li>
								<?php endforeach; ?>
							</ul>
							<p><?php echo esc_html( $report['closing'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="sl-s-metrics-suite-reporting__media">
				<div class="sl-s-metrics-suite-reporting__image">
					<amp-img
						src="<?php echo esc_url( $report_image ); ?>"
						width="1200"
						height="680"
						layout="responsive"
						alt="<?php esc_attr_e( 'S-Series reporting dashboard across the Security Behaviour & Culture Suite', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
