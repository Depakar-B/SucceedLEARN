<?php
/**
 * S-Phish AMP: How Secure is S-Phish?
 *
 * Expected vars: $security_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="how-secure-is-s-phish" class="sl-section sl-section--alt sl-s-phish-how-secure" aria-labelledby="sl-s-phish-how-secure-title">
	<div class="sl-wrap">
		<div class="sl-s-phish-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Platform Security', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-s-phish-how-secure-title" class="sl-h2">
				<?php esc_html_e( 'How Secure is', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'S-Phish?', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-s-phish-cards sl-s-phish-cards--grid">
			<?php foreach ( $security_items as $item ) : ?>
				<article class="sl-s-phish-card">
					<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
