<?php
/**
 * AMP partial — US Sexual Harassment Prevention Training — FAQ.
 *
 * Expected vars: $faq_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $faq_items ) || ! is_array( $faq_items ) ) {
	$faq_items = function_exists( 'succeedlearn_amp_get_us_harassment_faq_items' )
		? succeedlearn_amp_get_us_harassment_faq_items()
		: array();
}
?>
<section class="sl-section sl-section--alt sl-us-harassment-faq" aria-labelledby="sl-us-harassment-faq-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'Frequently Asked Questions', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-us-harassment-faq-title" class="sl-h2">
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
