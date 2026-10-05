<?php
/**
 * ISAT AMP — Why choose.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$choose_items = succeedlearn_amp_get_isat_choose_items();
?>
<section
	class="sl-isat-choose"
	id="why-choose-information-security-awareness-training"
	aria-labelledby="sl-isat-choose-title"
>
	<div class="sl-wrap">
		<div class="sl-isat-choose__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-isat-choose-title" class="sl-h2">
				<?php esc_html_e( 'Why Choose Information Security', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Awareness Training', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-isat-choose__grid">
			<?php foreach ( $choose_items as $item ) : ?>
				<article class="sl-isat-choose__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
