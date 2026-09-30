<?php
/**
 * S-Metrics AMP — Designed for the Teams Driving Security Culture.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team_groups = succeedlearn_amp_get_sm_team_groups();
?>
<section class="sl-s-metrics-features" aria-labelledby="sl-s-metrics-features-title">
	<div class="sl-wrap">
		<div class="sl-s-metrics-features__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Security Culture Across the Organisation', 'succeedlearn-amp' ); ?></span>

			<h2 id="sl-s-metrics-features-title" class="sl-h2">
				<?php esc_html_e( 'Designed for the Teams Driving', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Culture', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p class="sl-s-metrics-features__lead sl-lead">
				<?php esc_html_e( 'S-Metrics gives different organisational teams a shared view of security-awareness activity and programme performance.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-s-metrics-features__grid sl-amp-card-grid">
			<?php foreach ( $team_groups as $index => $team_group ) : ?>
				<article class="sl-s-metrics-features__card">
					<div class="sl-s-metrics-features__card-title sl-s-metrics-features__head">
						<span class="sl-s-metrics-features__number" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<h3 class="sl-panel-title"><?php echo esc_html( $team_group['title'] ); ?></h3>
					</div>
					<p><?php echo esc_html( $team_group['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
