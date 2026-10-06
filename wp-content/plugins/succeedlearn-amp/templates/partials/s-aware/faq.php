<?php
/**
 * S-Aware AMP — FAQ.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = succeedlearn_amp_get_sa_faq_items();
?>
<section class="sl-saware-faq" id="frequently-asked-questions" aria-labelledby="sl-saware-faq-title">
	<div class="sl-wrap">
		<span class="sl-home-sub-heading"><?php esc_html_e( 'FAQs', 'succeedlearn-amp' ); ?></span>
		<h2 id="sl-saware-faq-title" class="sl-h2">
			<?php echo wp_kses_post( __( 'Frequently Asked <span>Questions</span>', 'succeedlearn-amp' ) ); ?>
		</h2>
		<p class="sl-lead"><?php esc_html_e( 'Answers to common questions about S-Aware and security awareness training.', 'succeedlearn-amp' ); ?></p>
		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) && ! empty( $faq_items ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>
		<div class="sl-saware-faq__cta">
			<button
				type="button"
				class="sl-btn sl-btn--primary"
				data-cta="faq-demo"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
