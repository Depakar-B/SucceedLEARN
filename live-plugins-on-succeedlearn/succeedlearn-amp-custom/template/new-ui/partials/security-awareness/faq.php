<?php
/**
 * Security Awareness AMP — FAQ section.
 *
 * Uses shared AMP FAQ accordion (global-ui.php .sl-amp-faq*).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = succeedlearn_amp_get_sa_faq_items();
?>
<section
	class="sl-section sl-sap-faq"
	id="frequently-asked-questions"
	aria-labelledby="sl-sap-faq-title"
>
	<div class="sl-wrap">
		<span class="sl-home-sub-heading"><?php esc_html_e( 'FAQ', 'succeedlearn-amp' ); ?></span>
		<h2 id="sl-sap-faq-title" class="sl-h2">
			<?php echo wp_kses_post( __( 'Frequently Asked <span>Questions</span>', 'succeedlearn-amp' ) ); ?>
		</h2>
		<p class="sl-lead">
			<?php
			esc_html_e(
				'Answers to common questions about the SucceedLEARN Security Behaviour & Culture Suite and how the S-Series solutions support continuous security awareness.',
				'succeedlearn-amp'
			);
			?>
		</p>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>

		<div class="sl-sap-faq__cta">
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
