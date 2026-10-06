<?php
/**
 * WHP AMP: Choose Workplace Harassment Prevention Training by region.
 *
 * Expected vars: $regional_training
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="training-by-region" class="sl-section sl-whp-regional" aria-labelledby="sl-whp-regional-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Regional Training Solutions', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-regional-title" class="sl-h2">
				<?php esc_html_e( 'Choose Workplace Harassment Prevention Training', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'by region', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-whp-regional__list">
			<?php foreach ( $regional_training as $training ) : ?>
				<article class="sl-whp-regional__item">
					<h3 class="sl-panel-title"><?php echo esc_html( $training['title'] ); ?></h3>
					<p class="sl-whp-regional__subtitle"><?php echo esc_html( $training['subtitle'] ); ?></p>

					<div class="sl-whp-copy">
						<?php foreach ( $training['content'] as $paragraph ) : ?>
							<p><?php echo esc_html( $paragraph ); ?></p>
						<?php endforeach; ?>
					</div>

					<?php if ( ! empty( $training['roles'] ) ) : ?>
						<div class="sl-whp-regional__roles">
							<?php foreach ( $training['roles'] as $role ) : ?>
								<div class="sl-whp-regional__role">
									<strong><?php echo esc_html( $role['title'] ); ?></strong>
									<p><?php echo esc_html( $role['text'] ); ?></p>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<div class="sl-whp-regional__best">
						<strong><?php esc_html_e( 'Best suited for:', 'succeedlearn-amp' ); ?></strong>
						<p><?php echo esc_html( $training['best_suited'] ); ?></p>
					</div>

					<div class="sl-content-actions">
						<a class="sl-content-btn sl-content-btn-primary" href="<?php echo esc_url( $training['cta_url'] ); ?>">
							<?php echo esc_html( $training['cta'] ); ?>
							<span aria-hidden="true">→</span>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
