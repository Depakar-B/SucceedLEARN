<?php
/**
 * WHP AMP: Training is one part of prevention.
 *
 * Expected vars: $prevention_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="training-part-of-prevention" class="sl-section sl-section--alt sl-whp-prevention" aria-labelledby="sl-whp-prevention-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Beyond Training', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-prevention-title" class="sl-h2">
				<?php esc_html_e( 'Training is one part of', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'prevention', 'succeedlearn-amp' ); ?></span>
			</h2>

			<div class="sl-whp-copy">
				<p><?php esc_html_e( 'Training can build knowledge, establish shared expectations and clarify reporting options. It cannot create a harassment-free workplace on its own.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'A credible prevention framework may also require:', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>

		<ul class="sl-list sl-whp-list sl-whp-list--2up" role="list">
			<?php foreach ( $prevention_items as $item ) : ?>
				<li class="sl-list-item">
					<span class="sl-whp-check" aria-hidden="true">✓</span>
					<span class="sl-list-item__text"><?php echo esc_html( $item ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="sl-highlight sl-whp-after">
			<p><?php esc_html_e( 'Training becomes meaningful when employees see its principles reflected in everyday decisions and in the organisation’s response to concerns.', 'succeedlearn-amp' ); ?></p>
		</div>
	</div>
</section>
