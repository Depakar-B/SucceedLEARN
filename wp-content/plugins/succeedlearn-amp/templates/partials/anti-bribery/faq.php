<?php
/**
 * Anti-Bribery AMP: FAQ.
 *
 * Expected vars: $faq_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="faqs" class="sl-section sl-section--alt sl-aml-pe-vc-faq" aria-labelledby="sl-anti-bribery-faq-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Frequently Asked Questions', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-faq-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Anti-bribery training FAQs: <span>UK Bribery Act, FCPA and India ABAC</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Answers to common questions about ABAC training, course content, legal context, delivery and customisation.', 'succeedlearn-amp' ); ?>
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
