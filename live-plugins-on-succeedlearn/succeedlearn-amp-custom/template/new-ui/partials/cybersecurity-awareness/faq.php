<?php
/**
 * Cybersecurity Awareness AMP — FAQ section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = succeedlearn_amp_csa_faq_items();
?>
<section class="sl-section sl-section--alt sl-csa-faq" aria-labelledby="sl-csa-faq-title">
	<div class="sl-wrap">
		<span class="sl-home-sub-heading"><?php esc_html_e( 'FAQ', 'succeedlearn-amp' ); ?></span>
		<h2 id="sl-csa-faq-title" class="sl-h2">
			<?php echo wp_kses_post( __( 'Frequently Asked Questions About <span>Cybersecurity Awareness Month</span>', 'succeedlearn-amp' ) ); ?>
		</h2>
		<p class="sl-lead">
			<?php esc_html_e( 'Need to discuss your environment or campaign scope? Our team can walk you through it.', 'succeedlearn-amp' ); ?>
		</p>

		<?php succeedlearn_amp_render_faq_accordion( $faq_items ); ?>

		<div class="sl-csa-faq__cta">
			<button
				type="button"
				class="sl-btn sl-btn--primary"
				data-cta="faq-specialist"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Speak to a specialist', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
