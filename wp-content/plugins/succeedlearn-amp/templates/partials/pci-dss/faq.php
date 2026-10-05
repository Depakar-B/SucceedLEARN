<?php
/**
 * PCI DSS AMP — FAQ section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = succeedlearn_amp_get_pci_dss_faq_items();
?>
<section
	class="sl-pci-faq"
	id="frequently-asked-questions"
	aria-labelledby="sl-pci-faq-title"
>
	<div class="sl-wrap">
		<div class="sl-pci-faq__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( "FAQ's", 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-pci-faq-title" class="sl-h2">
				<?php esc_html_e( 'Frequently Asked', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Questions', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p class="sl-lead">
				<?php esc_html_e( 'Answers to common questions about SucceedLEARN PCI DSS awareness training for employees and payment handlers.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>

		<div class="sl-pci-faq__cta">
			<button
				type="button"
				class="sl-btn sl-btn--secondary"
				data-cta="pci-dss-faq-demo"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'request-demo' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
