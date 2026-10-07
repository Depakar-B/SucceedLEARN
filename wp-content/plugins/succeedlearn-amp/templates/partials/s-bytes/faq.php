<?php
/**
 * S-Bytes AMP — FAQ section.
 *
 * Uses shared AMP FAQ accordion (global-ui.php .sl-amp-faq*).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = function_exists( 'succeedlearn_amp_get_sbytes_faq_items' )
	? succeedlearn_amp_get_sbytes_faq_items()
	: array();
?>
<section
	class="sl-sbytes-faq"
	id="frequently-asked-questions"
	aria-labelledby="sl-sbytes-faq-title"
>
	<div class="sl-wrap">
		<span class="sl-home-sub-heading"><?php esc_html_e( 'FAQ', 'succeedlearn-amp' ); ?></span>
		<h2 id="sl-sbytes-faq-title" class="sl-h2">
			<?php echo wp_kses_post( __( 'Frequently Asked <span>Questions</span>', 'succeedlearn-amp' ) ); ?>
		</h2>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) && ! empty( $faq_items ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>
	</div>
</section>
