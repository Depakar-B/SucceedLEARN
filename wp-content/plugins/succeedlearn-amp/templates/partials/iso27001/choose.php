<?php
/**
 * ISO 27001 AMP — Why choose.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$choose_items = succeedlearn_amp_get_iso27001_choose_items();
?>
<section
	class="sl-iso27-choose"
	id="why-choose-iso-27001-training"
	aria-labelledby="sl-iso27-choose-title"
>
	<div class="sl-wrap">
		<div class="sl-iso27-choose__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-iso27-choose-title" class="sl-h2">
				<?php esc_html_e( 'Why Choose SucceedLEARN for', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'ISO 27001:2022 Awareness Training?', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-iso27-choose__grid">
			<?php foreach ( $choose_items as $item ) : ?>
				<article class="sl-iso27-choose__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
