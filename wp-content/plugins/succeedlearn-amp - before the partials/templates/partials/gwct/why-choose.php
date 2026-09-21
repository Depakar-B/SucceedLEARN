<?php
/**
 * GWCT AMP — Why choose section.
 *
 * Expected vars: $why_choose_cards
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-section--alt">
	<div class="sl-wrap">
		<h2 class="sl-h2"><?php esc_html_e( 'Why Organizations Choose SucceedLEARN', 'succeedlearn-amp' ); ?></h2>
		<p class="sl-lead"><?php esc_html_e( 'Modern organisations need learning experiences that engage employees, support compliance, and create lasting behavioural change.', 'succeedlearn-amp' ); ?></p>
		<div class="sl-gwct-why-grid">
			<?php foreach ( $why_choose_cards as $card ) : ?>
				<article class="sl-gwct-why-card">
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
