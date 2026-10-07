<?php
/**
 * S-Metrics AMP — How Security Analytics & Reports Dashboard is beneficial.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = succeedlearn_amp_get_sm_choose_reasons();
?>
<section class="sl-s-metrics-choose" aria-labelledby="sl-s-metrics-choose-title">
	<div class="sl-wrap">
		<div class="sl-s-metrics-choose__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Programme Benefits', 'succeedlearn-amp' ); ?></span>

			<h2 id="sl-s-metrics-choose-title" class="sl-h2">
				<?php esc_html_e( 'How Security Analytics & Reports', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Dashboard is beneficial', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-s-metrics-choose__grid sl-amp-card-grid">
			<?php foreach ( $reasons as $reason ) : ?>
				<article class="sl-s-metrics-choose__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $reason['title'] ); ?></h3>
					<p><?php echo esc_html( $reason['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
