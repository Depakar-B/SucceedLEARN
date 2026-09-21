<?php
/**
 * GWCT AMP — Testimonials section.
 *
 * Expected vars: $testimonials
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-testimonials">
	<div class="sl-wrap">
		<p class="sl-eyebrow"><?php esc_html_e( 'What clients say', 'succeedlearn-amp' ); ?></p>
		<h2 class="sl-h2"><?php esc_html_e( 'From teams who rolled it out', 'succeedlearn-amp' ); ?></h2>
		<p class="sl-lead"><?php esc_html_e( 'Organisations use SucceedLEARN to roll out compliance training that people complete — and remember.', 'succeedlearn-amp' ); ?></p>
		<div class="sl-testimonials__grid">
			<?php foreach ( $testimonials as $item ) : ?>
				<figure class="sl-testimonials__card">
					<blockquote>
						<p>&ldquo;<?php echo esc_html( $item['quote'] ); ?>&rdquo;</p>
					</blockquote>
					<?php if ( ! empty( $item['note'] ) ) : ?>
						<p class="sl-gwct-testimonials-note"><?php echo esc_html( $item['note'] ); ?></p>
					<?php endif; ?>
					<figcaption>
						<strong><?php echo esc_html( $item['name'] ); ?></strong>
						<span><?php echo esc_html( $item['role'] ); ?></span>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>
