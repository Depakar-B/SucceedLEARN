<?php
/**
 * S-Phish AMP: Why Organisations Choose S-Phish.
 *
 * Expected vars: $why_choose
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="why-organisations-choose-s-phish" class="sl-section sl-section--alt sl-s-phish-why-choose" aria-labelledby="sl-s-phish-why-choose-title">
	<div class="sl-wrap">
		<div class="sl-s-phish-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Why Choose S-Phish', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-s-phish-why-choose-title" class="sl-h2">
				<?php esc_html_e( 'Why Organisations Choose', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( "SucceedLEARN's Phishing Simulation Tool", 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'S-Phish is designed to support organisations seeking to strengthen employee resilience against phishing attacks while improving visibility into human cyber risk.', 'succeedlearn-amp' ); ?>
			</p>

			<h3 class="sl-panel-title">
				<?php esc_html_e( 'Key capabilities include:', 'succeedlearn-amp' ); ?>
			</h3>
		</div>

		<div class="sl-s-phish-cards sl-s-phish-cards--grid">
			<?php foreach ( $why_choose as $item ) : ?>
				<article class="sl-s-phish-card">
					<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
