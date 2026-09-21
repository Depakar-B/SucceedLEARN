<?php
/**
 * Security Awareness AMP — Suite products (card grid).
 *
 * Mirrors desktop suite content as fully expanded cards (no accordion).
 * Numbers removed to match desktop suite panels.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $suite_products ) || ! is_array( $suite_products ) ) {
	$suite_products = succeedlearn_amp_get_sa_suite_products();
}

if ( empty( $suite_products ) || ! is_array( $suite_products ) ) {
	return;
}
?>
<section class="sl-suite-section" id="security-behaviour-suite" aria-labelledby="sl-sa-behaviour-suite-title">
	<div class="sl-wrap">
		<div class="sl-suite-intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Introduction to the Suite', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-sa-behaviour-suite-title">
				<?php esc_html_e( 'Everything You Need to Build a', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security-Aware Organisation', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Whether your objective is improving phishing resilience, meeting ISO 27001 awareness requirements, strengthening regulatory compliance, or reducing human cyber risk, the SucceedLEARN Security Behaviour & Culture Suite provides a comprehensive set of integrated solutions that work together throughout the employee lifecycle.', 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-suite-grid">
			<?php foreach ( $suite_products as $product ) : ?>
				<article class="sl-suite-card">
					<header class="sl-suite-card__header">
						<div class="sl-suite-card__header-main">
							<span class="sl-suite-product-label"><?php echo esc_html( $product['name'] ); ?></span>
							<h3 class="sl-suite-card__title"><?php echo esc_html( $product['title'] ); ?></h3>
							<?php if ( ! empty( $product['subtitle'] ) ) : ?>
								<p class="sl-suite-card__subtitle"><?php echo esc_html( $product['subtitle'] ); ?></p>
							<?php endif; ?>
						</div>
					</header>

					<div class="sl-suite-card__body">
						<?php if ( ! empty( $product['paras'] ) && is_array( $product['paras'] ) ) : ?>
							<?php foreach ( $product['paras'] as $para ) : ?>
								<?php if ( $para ) : ?>
									<p class="sl-suite-card__text"><?php echo esc_html( $para ); ?></p>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>

						<?php if ( ! empty( $product['highlight'] ) ) : ?>
							<strong class="sl-suite-highlight"><?php echo esc_html( $product['highlight'] ); ?></strong>
						<?php endif; ?>

						<?php if ( ! empty( $product['url'] ) ) : ?>
							<p class="sl-suite-card__actions">
								<a
									class="sl-content-btn sl-content-btn-primary sl-suite-panel-cta"
									href="<?php echo esc_url( $product['url'] ); ?>"
								>
									<?php esc_html_e( 'View Content', 'succeedlearn-amp' ); ?>
								</a>
							</p>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
