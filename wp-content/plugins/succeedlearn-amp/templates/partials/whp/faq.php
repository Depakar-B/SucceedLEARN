<?php
/**
 * WHP AMP: FAQ (global accordion).
 *
 * Expected vars: $faq_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="frequently-asked-questions" class="sl-section sl-whp-faq" aria-labelledby="sl-whp-faq-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'FAQ', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-faq-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Frequently Asked Questions About <span>Workplace Harassment Prevention</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p><?php esc_html_e( 'Find answers to common questions about workplace harassment prevention training, regional requirements, delivery and course selection.', 'succeedlearn-amp' ); ?></p>
		</div>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>
	</div>
</section>
