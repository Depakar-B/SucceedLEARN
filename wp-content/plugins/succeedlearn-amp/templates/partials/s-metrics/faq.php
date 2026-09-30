<?php
/**
 * S-Metrics AMP — FAQ section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = succeedlearn_amp_get_sm_faq_items();
?>
<section
	class="sl-section sl-s-metrics-faq"
	id="frequently-asked-questions"
	aria-labelledby="sl-s-metrics-faq-title"
>
	<div class="sl-wrap">
		<span class="sl-home-sub-heading"><?php esc_html_e( "FAQ's", 'succeedlearn-amp' ); ?></span>

		<h2 id="sl-s-metrics-faq-title" class="sl-h2">
			<?php echo wp_kses_post( __( 'Frequently Asked <span>Questions</span>', 'succeedlearn-amp' ) ); ?>
		</h2>

		<p class="sl-lead">
			<?php
			esc_html_e(
				'Answers to common questions about S-Metrics and security awareness analytics and reporting.',
				'succeedlearn-amp'
			);
			?>
		</p>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>

		<div class="sl-s-metrics-faq__cta">
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
