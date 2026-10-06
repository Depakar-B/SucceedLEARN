<?php
/**
 * SOC 2 AMP — Why choose.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$choose_items = succeedlearn_amp_get_soc2_choose_items();
?>
<section
	class="sl-soc2-choose"
	id="why-choose-soc2-training"
	aria-labelledby="sl-soc2-choose-title"
>
	<div class="sl-wrap">
		<div class="sl-soc2-choose__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-soc2-choose-title" class="sl-h2">
				<?php esc_html_e( 'Why Choose Information Security Awareness Training', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'for SOC 2?', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-soc2-choose__grid">
			<?php foreach ( $choose_items as $item ) : ?>
				<article class="sl-soc2-choose__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
