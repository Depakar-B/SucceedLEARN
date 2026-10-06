<?php
/**
 * WHP AMP: Make your policy part of the learning.
 *
 * Expected vars: $customisation_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="make-policy-part-of-learning" class="sl-section sl-whp-policy" aria-labelledby="sl-whp-policy-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Customised Workplace Learning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-policy-title" class="sl-h2">
				<?php esc_html_e( 'Make your policy part of the', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'learning', 'succeedlearn-amp' ); ?></span>
			</h2>

			<div class="sl-whp-copy">
				<p class="sl-whp-lead"><?php esc_html_e( 'Employees should finish training knowing how your organisation expects them to respond.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Depending on the selected course and project scope, customisation can include:', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>

		<ul class="sl-list sl-whp-list sl-whp-list--2up" role="list">
			<?php foreach ( $customisation_items as $item ) : ?>
				<li class="sl-list-item">
					<span class="sl-whp-check" aria-hidden="true">✓</span>
					<span class="sl-list-item__text"><?php echo esc_html( $item ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="sl-whp-copy sl-whp-after">
			<p><?php esc_html_e( 'Customisation makes the learning more recognisable and helps connect course content with the organisation’s actual procedures.', 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-content-actions">
			<button
				type="button"
				class="sl-content-btn sl-content-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Discuss Customisation', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</button>
		</div>
	</div>
</section>
