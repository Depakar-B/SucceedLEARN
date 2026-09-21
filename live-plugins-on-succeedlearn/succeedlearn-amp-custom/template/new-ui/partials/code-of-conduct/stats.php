<?php
/**
 * Code of Conduct — Social Proof Statistics.
 *
 * Static numbers without JavaScript counters.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_stats      = succeedlearn_amp_get_coc_stats_data();
$coc_stats_list = $coc_stats['stats'];
?>

<section
	class="sl-section sl-coc-stats"
	aria-labelledby="sl-coc-stats-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-stats__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_stats['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-stats-title">
				<?php echo esc_html( $coc_stats['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_stats['highlight'] ); ?>
				</span>
			</h2>
		</div>

		<div class="sl-coc-stats__grid sl-amp-card-grid">
			<?php foreach ( $coc_stats_list as $stat ) : ?>
				<div class="sl-coc-stats__item">
					<strong class="sl-coc-stats__value">
						<?php echo esc_html( $stat['value'] ); ?>
					</strong>

					<p class="sl-coc-stats__label">
						<?php echo esc_html( $stat['label'] ); ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>