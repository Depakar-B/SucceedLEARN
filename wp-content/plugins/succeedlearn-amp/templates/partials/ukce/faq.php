<?php
/**
 * UK Cyber Essentials AMP — FAQ section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = succeedlearn_amp_get_ukce_faq_items();
?>
<section
	class="sl-ukce-faq"
	id="frequently-asked-questions"
	aria-labelledby="sl-ukce-faq-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-faq__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'FAQ', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-ukce-faq-title" class="sl-h2">
				<?php esc_html_e( 'Frequently Asked', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Questions', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p class="sl-lead">
				<?php esc_html_e( 'Answers to common questions about SucceedLEARN’s Information Security Awareness Training for UK Cyber Essentials.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>

		<div class="sl-ukce-faq__cta">
			<button
				type="button"
				class="sl-btn sl-btn--secondary"
				data-cta="ukce-faq-demo"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
