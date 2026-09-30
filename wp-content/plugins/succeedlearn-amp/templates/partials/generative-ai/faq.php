<?php
/**
 * Generative AI AMP — FAQ section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = succeedlearn_amp_get_gai_faq_items();
?>
<section
	class="sl-gai-faq"
	id="frequently-asked-questions"
	aria-labelledby="sl-gai-faq-title"
>
	<div class="sl-wrap">
		<span class="sl-home-sub-heading"><?php esc_html_e( 'FAQ', 'succeedlearn-amp' ); ?></span>

		<h2 id="sl-gai-faq-title" class="sl-h2">
			<?php echo wp_kses_post( __( 'Frequently Asked <span>Questions</span>', 'succeedlearn-amp' ) ); ?>
		</h2>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>

		<div class="sl-gai-faq__cta">
			<button
				type="button"
				class="sl-btn sl-btn--primary"
				data-cta="faq-demo"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
