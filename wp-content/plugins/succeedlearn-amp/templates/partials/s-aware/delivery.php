<?php
/**
 * S-Aware AMP — Delivery options + summary cards.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$options = succeedlearn_amp_get_sa_delivery_options();
$summary = succeedlearn_amp_get_sa_delivery_summary();
?>
<section class="sl-saware-delivery" aria-labelledby="saware-delivery-title">
	<div class="sl-wrap">
		<div class="sl-saware-delivery__intro-block">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Flexible Delivery & Integration', 'succeedlearn-amp' ); ?></span>
			<h2 id="saware-delivery-title" class="sl-h2">
				<?php esc_html_e( 'Deliver Security Awareness', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Your Way', 'succeedlearn-amp' ); ?></span>
			</h2>
			<div class="sl-saware-delivery__intro">
				<p><?php esc_html_e( 'Every organisation has a different learning and technology environment. S-Aware offers flexible delivery and integration options, allowing organisations to deploy security awareness through SucceedLEARN, their existing LMS, or a connected enterprise environment.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Choose the approach that best fits your infrastructure, learner experience and programme requirements.', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>

		<div class="sl-saware-delivery__options">
			<?php foreach ( $options as $option ) : ?>
				<article class="sl-saware-delivery__option">
					<div class="sl-saware-delivery__option-header">
						<h3 class="sl-panel-title"><?php echo esc_html( $option['title'] ); ?></h3>
						<p class="sl-saware-delivery__option-subtitle"><?php echo esc_html( $option['subtitle'] ); ?></p>
					</div>
					<div class="sl-saware-delivery__option-content">
						<?php foreach ( $option['paragraphs'] as $paragraph ) : ?>
							<p><?php echo esc_html( $paragraph ); ?></p>
						<?php endforeach; ?>
						<p class="sl-saware-delivery__option-ideal">
							<strong><?php esc_html_e( 'Ideal for:', 'succeedlearn-amp' ); ?></strong>
							<?php echo esc_html( $option['ideal'] ); ?>
						</p>
						<?php if ( ! empty( $option['link'] ) ) : ?>
							<a class="sl-saware-delivery__option-link" href="<?php echo esc_url( $option['link']['url'] ); ?>">
								<?php echo esc_html( $option['link']['label'] ); ?>
								<span aria-hidden="true">→</span>
							</a>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-saware-delivery__summary">
			<h3 class="sl-saware-delivery__summary-title">
				<?php esc_html_e( 'Your Learning Environment. Your Choice of Delivery.', 'succeedlearn-amp' ); ?>
			</h3>
			<ul class="sl-saware-delivery__summary-list">
				<?php foreach ( $summary as $item ) : ?>
					<li class="sl-saware-delivery__summary-item">
						<span class="sl-saware-delivery__summary-icon" aria-hidden="true">
							<?php echo succeedlearn_amp_sa_delivery_summary_icon( $item['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted inline SVG. ?>
						</span>
						<span class="sl-saware-delivery__summary-copy">
							<strong class="sl-saware-delivery__summary-label"><?php echo esc_html( $item['title'] ); ?></strong>
							<span class="sl-saware-delivery__summary-note"><?php echo esc_html( $item['subtitle'] ); ?></span>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
