<?php
/**
 * S-Signs AMP — Why choose Visual Security Awareness Reinforcements.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = function_exists( 'succeedlearn_amp_get_ss_choose_items' )
	? succeedlearn_amp_get_ss_choose_items()
	: array();

if ( empty( $reasons ) ) {
	return;
}
?>
<section class="sl-s-signs-choose" aria-labelledby="sl-s-signs-choose-title">
	<div class="sl-wrap">
		<div class="sl-s-signs-choose__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Why Choose S-Signs', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-signs-choose-title" class="sl-h2">
				<?php esc_html_e( 'Why choose', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Visual Security Awareness Reinforcements', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>
		<div class="sl-s-signs-choose__grid sl-amp-card-grid">
			<?php foreach ( $reasons as $reason ) : ?>
				<article class="sl-s-signs-choose__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $reason['title'] ); ?></h3>
					<p><?php echo esc_html( $reason['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
