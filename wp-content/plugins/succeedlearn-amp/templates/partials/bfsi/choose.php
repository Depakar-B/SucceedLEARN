<?php
/**
 * BFSI & PE/VC AMP — Why cybersecurity awareness training for BFSI & PE/VC?
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = succeedlearn_amp_get_bfsi_choose_items();
?>
<section class="sl-bfsi-choose" aria-labelledby="sl-bfsi-choose-title">
	<div class="sl-wrap">
		<div class="sl-bfsi-choose__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Business Value', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-bfsi-choose-title" class="sl-h2">
				<?php esc_html_e( 'Why Cybersecurity Awareness Training for', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'BFSI & PE/VC?', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-bfsi-choose__grid">
			<?php foreach ( $reasons as $reason ) : ?>
				<article class="sl-bfsi-choose__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $reason['title'] ); ?></h3>
					<p><?php echo esc_html( $reason['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
