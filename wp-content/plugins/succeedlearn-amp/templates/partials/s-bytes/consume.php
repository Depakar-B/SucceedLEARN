<?php
/**
 * S-Bytes AMP — Designed Around How Employees Learn.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$features = succeedlearn_amp_get_sbytes_consume_items();

if ( empty( $features ) ) {
	return;
}
?>
<section id="designed-for-users" class="sl-sbytes-consume" aria-labelledby="sl-sbytes-consume-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-consume__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'How Users Consume Content', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-sbytes-consume-title" class="sl-h2">
				<?php esc_html_e( 'Designed Around How', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Employees Learn', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Employees already have busy working days. Continuous awareness only works when learning is easy to access, quick to complete and relevant enough to hold attention. S-Bytes is designed around those realities.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-sbytes-consume__grid sl-amp-card-grid">
			<?php foreach ( $features as $feature ) : ?>
				<article class="sl-sbytes-consume__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $feature['title'] ); ?></h3>
					<p><?php echo esc_html( $feature['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
