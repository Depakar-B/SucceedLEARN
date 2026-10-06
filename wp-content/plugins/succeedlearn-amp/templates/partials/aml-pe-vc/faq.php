<?php
/**
 * AML PE/VC AMP: FAQ.
 *
 * Expected vars: $faq_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="faq" class="sl-section sl-aml-pe-vc-faq" aria-labelledby="sl-aml-pe-vc-faq-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Frequently Asked Questions', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-aml-pe-vc-faq-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Anti-Money Laundering Awareness Training <span>FAQs</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Concise answers to common questions about AML training for PE/VC professionals.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>

		<div class="sl-content-actions">
			<button
				type="button"
				class="sl-content-btn sl-content-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Speak to a specialist', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
