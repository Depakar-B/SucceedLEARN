<?php
/**
 * Cybersecurity Awareness AMP — Measure section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$metrics = succeedlearn_amp_csa_measure_metrics();
?>
<section
	class="sl-section sl-cybersecurity-campaign-measure"
	aria-labelledby="sl-cybersecurity-campaign-measure-title"
>
	<div class="sl-wrap">
		<div class="sl-cybersecurity-campaign-measure__content">
			<div class="sl-cybersecurity-campaign-measure__details">
				<div class="sl-cybersecurity-campaign-measure__heading">
					<span class="sl-home-sub-heading"><?php esc_html_e( 'Measure What Matters', 'succeedlearn-amp' ); ?></span>
					<h2 id="sl-cybersecurity-campaign-measure-title" class="sl-h2">
						<?php echo wp_kses_post( __( 'Understand more than <span>who completed a course</span>', 'succeedlearn-amp' ) ); ?>
					</h2>
					<p class="sl-lead">
						<?php esc_html_e( 'See how employees respond to realistic scenarios, where risks remain and how results change across the campaign.', 'succeedlearn-amp' ); ?>
					</p>
				</div>
				<ul class="sl-cybersecurity-campaign-measure__metrics">
					<?php foreach ( $metrics as $metric ) : ?>
						<li class="sl-cybersecurity-campaign-measure__metric">
							<span class="sl-cybersecurity-campaign-measure__icon" aria-hidden="true">
								<svg viewBox="0 0 16 16" width="16" height="16" focusable="false">
									<path d="M3 8.5 6.2 12 13 4.5" />
								</svg>
							</span>
							<span class="sl-cybersecurity-campaign-measure__label"><?php echo esc_html( $metric ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="sl-cybersecurity-campaign-measure__visual">
				<div class="sl-cybersecurity-campaign-measure__image">
					<amp-img
						src="<?php echo esc_url( succeedlearn_amp_get_csa_measure_image() ); ?>"
						width="1600"
						height="1067"
						layout="responsive"
						alt="<?php esc_attr_e( 'Team reviewing campaign insight dashboards together', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
