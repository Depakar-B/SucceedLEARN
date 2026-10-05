<?php
/**
 * ISO 27001 AMP — FAQ section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = succeedlearn_amp_get_iso27001_faq_items();
?>
<section
	class="sl-iso27-faq"
	id="frequently-asked-questions"
	aria-labelledby="sl-iso27-faq-title"
>
	<div class="sl-wrap">
		<div class="sl-iso27-faq__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'FAQ', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-iso27-faq-title" class="sl-h2">
				<?php esc_html_e( 'Frequently Asked', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Questions', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p class="sl-lead">
				<?php esc_html_e( 'Answers to common questions about SucceedLEARN’s ISO 27001:2022 Staff Awareness Training.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>

		<div class="sl-iso27-faq__cta">
			<button
				type="button"
				class="sl-btn sl-btn--secondary"
				data-cta="iso27001-faq-demo"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
