<?php
/**
 * UK Cyber Essentials AMP — Why choose.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$choose_items = succeedlearn_amp_get_ukce_choose_items();
?>
<section
	class="sl-ukce-choose"
	id="why-choose-cyber-essentials-training"
	aria-labelledby="sl-ukce-choose-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-choose__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-ukce-choose-title" class="sl-h2">
				<?php esc_html_e( 'Why Choose Security Awareness Training', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'for Cyber Essentials?', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-ukce-choose__grid">
			<?php foreach ( $choose_items as $item ) : ?>
				<article class="sl-ukce-choose__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
