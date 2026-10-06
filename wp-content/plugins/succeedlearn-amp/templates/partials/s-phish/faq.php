<?php
/**
 * S-Phish AMP: FAQ (global accordion).
 *
 * Expected vars: $faq_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="frequently-asked-questions" class="sl-section sl-section--alt sl-s-phish-faq" aria-labelledby="sl-s-phish-faq-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'Frequently Asked Questions', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-s-phish-faq-title" class="sl-h2">
			<?php
			echo wp_kses(
				__( 'Frequently Asked <span>Questions</span>', 'succeedlearn-amp' ),
				array( 'span' => array() )
			);
			?>
		</h2>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>
	</div>
</section>
