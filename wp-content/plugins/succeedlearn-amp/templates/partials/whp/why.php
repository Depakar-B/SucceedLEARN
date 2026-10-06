<?php
/**
 * WHP AMP: Why organisations choose SucceedLEARN.
 *
 * Expected vars: $reasons
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="why-succeedlearn" class="sl-section sl-whp-why" aria-labelledby="sl-whp-why-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-why-title" class="sl-h2">
				<?php esc_html_e( 'Why organisations choose', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'SucceedLEARN', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-whp-cards sl-whp-cards--grid">
			<?php foreach ( $reasons as $reason ) : ?>
				<article class="sl-whp-card">
					<h3 class="sl-panel-title"><?php echo esc_html( $reason['title'] ); ?></h3>
					<p><?php echo esc_html( $reason['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
