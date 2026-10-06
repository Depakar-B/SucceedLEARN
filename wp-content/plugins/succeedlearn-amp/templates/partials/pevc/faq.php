<?php
/**
 * PE/VC Suite AMP — FAQ.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $faq_items ) || ! is_array( $faq_items ) ) {
	$faq_items = succeedlearn_amp_get_pevc_faq_items();
}
?>
<section
	class="sl-section sl-pevc-faq"
	id="faqs"
	aria-labelledby="sl-pevc-faq-title"
>
	<div class="sl-wrap">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Frequently asked questions', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-pevc-faq-title" class="sl-h2">
			<?php esc_html_e( 'PE/VC Compliance Training FAQs', 'succeedlearn-amp' ); ?>
		</h2>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>
	</div>
</section>
