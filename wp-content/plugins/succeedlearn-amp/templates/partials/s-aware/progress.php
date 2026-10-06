<?php
/**
 * S-Aware AMP — Progress (content first, image at end).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = succeedlearn_amp_get_sa_progress_items();
$image = succeedlearn_amp_get_sa_progress_image();
?>
<section class="sl-saware-progress" aria-labelledby="saware-progress-title">
	<div class="sl-wrap">
		<div class="sl-saware-progress__stack">
			<div class="sl-saware-progress__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Learning Progress', 'succeedlearn-amp' ); ?></span>
				<h2 id="saware-progress-title" class="sl-h2">
					<?php esc_html_e( 'Visibility Into', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Learning Progress', 'succeedlearn-amp' ); ?></span>
				</h2>
				<div class="sl-saware-progress__intro">
					<p><?php esc_html_e( 'Security awareness should be measurable.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'S-Aware enables organisations to monitor learning activity and understand how employees are progressing through assigned awareness programmes.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Depending on the deployment and programme configuration, organisations can use learning data and assessments to monitor areas such as:', 'succeedlearn-amp' ); ?></p>
				</div>
				<ul class="sl-saware-progress__list" role="list">
					<?php foreach ( $items as $item ) : ?>
						<li class="sl-saware-progress__list-item"><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
				<div class="sl-saware-progress__copy">
					<p><?php esc_html_e( 'These insights help security, compliance and learning teams understand programme participation and identify opportunities for additional communication, learning or reinforcement.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'For organisations using the wider SucceedLEARN Security Behaviour & Culture Suite, awareness data can form part of a broader view of employee security engagement and behaviour through S-Metrics.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>
			<div class="sl-saware-progress__media">
				<div class="sl-saware-progress__image">
					<amp-img
						src="<?php echo esc_url( $image ); ?>"
						width="720"
						height="900"
						layout="responsive"
						alt="<?php esc_attr_e( 'Visibility into learning progress and training analytics', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
