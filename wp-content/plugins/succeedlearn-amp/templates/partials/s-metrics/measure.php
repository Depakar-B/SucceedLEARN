<?php
/**
 * S-Metrics AMP — Audit & compliance readiness.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audit_items   = succeedlearn_amp_get_sm_audit_items();
$measure_image = succeedlearn_amp_get_sm_image( '2026/09/Audit-Compliance-Reporting.webp' );
?>
<section class="sl-s-metrics-measure" aria-labelledby="sl-s-metrics-measure-title">
	<div class="sl-wrap">
		<div class="sl-s-metrics-measure__grid">
			<div class="sl-s-metrics-measure__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Audit & Compliance', 'succeedlearn-amp' ); ?></span>

				<h2 id="sl-s-metrics-measure-title" class="sl-h2">
					<?php esc_html_e( 'Turn Awareness Activity', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Into Audit-Ready Evidence', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-s-metrics-measure__copy">
					<p><?php esc_html_e( 'Security awareness programmes often need to demonstrate that learning and awareness activities have taken place.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'S-Metrics can help organisations maintain visibility into information such as:', 'succeedlearn-amp' ); ?></p>

					<ul class="sl-list sl-s-metrics-measure__list">
						<?php foreach ( $audit_items as $item ) : ?>
							<li class="sl-list-item">
								<span aria-hidden="true">✓</span>
								<?php echo esc_html( $item ); ?>
							</li>
						<?php endforeach; ?>
					</ul>

					<p><?php esc_html_e( 'Exportable reports can support internal governance, audit preparation and compliance reviews.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>

			<div class="sl-s-metrics-measure__media">
				<div class="sl-s-metrics-measure__image">
					<amp-img
						src="<?php echo esc_url( $measure_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'Audit & Compliance Reporting', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
