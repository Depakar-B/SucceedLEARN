<?php
/**
 * S-Phish AMP: Reporting & Behavioural Analytics.
 *
 * Expected vars: $report_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="measure-campaign-performance" class="sl-section sl-s-phish-reporting" aria-labelledby="sl-s-phish-reporting-title">
	<div class="sl-wrap">
		<div class="sl-s-phish-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Reporting & Behavioural Analytics', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-s-phish-reporting-title" class="sl-h2">
				<?php esc_html_e( 'Measure More Than', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Campaign Completion', 'succeedlearn-amp' ); ?></span>
			</h2>

			<h3 class="sl-panel-title">
				<?php esc_html_e( 'Powerful Reporting & Behavioural Analytics', 'succeedlearn-amp' ); ?>
			</h3>

			<div class="sl-s-phish-copy">
				<p><?php esc_html_e( 'A phishing campaign creates valuable behavioural data. S-Phish turns that data into visibility that security teams can use to understand campaign performance, identify potential areas of human risk and monitor changes over time.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Campaign reports include:', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>

		<ul class="sl-list sl-s-phish-list sl-s-phish-list--3up" role="list">
			<?php foreach ( $report_items as $report_item ) : ?>
				<li class="sl-list-item">
					<span class="sl-s-phish-check" aria-hidden="true">✓</span>
					<span class="sl-list-item__text"><?php echo esc_html( $report_item ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="sl-s-phish-copy sl-s-phish-reporting__after">
			<p><?php esc_html_e( 'For broader organisational insights, S-Phish seamlessly integrates with S-Metrics, providing enterprise dashboards that consolidate organisation-wide phishing campaign performance, behavioural trends, and workforce security maturity into a single reporting interface.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Reports can also be exported or printed to support management reporting, compliance audits, and continuous programme improvement.', 'succeedlearn-amp' ); ?></p>
		</div>
	</div>
</section>
