<?php
/**
 * S-Play AMP — Why Choose Gamified Security Awareness Training?
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = function_exists( 'succeedlearn_amp_get_sp_choose_items' )
	? succeedlearn_amp_get_sp_choose_items()
	: array();

if ( empty( $reasons ) ) {
	return;
}
?>
<section class="sl-s-play-choose" aria-labelledby="sl-s-play-choose-title">
	<div class="sl-wrap">
		<div class="sl-s-play-choose__intro">
			<h2 id="sl-s-play-choose-title" class="sl-h2">
				<?php esc_html_e( 'Why Choose', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Gamified Security Awareness Training?', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>
		<div class="sl-s-play-choose__grid sl-amp-card-grid">
			<?php foreach ( $reasons as $reason ) : ?>
				<article class="sl-s-play-choose__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $reason['title'] ); ?></h3>
					<p><?php echo esc_html( $reason['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
