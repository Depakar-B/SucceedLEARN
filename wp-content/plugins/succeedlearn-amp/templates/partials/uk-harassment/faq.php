<?php
/**
 * AMP partial — UK Sexual Harassment Prevention Training — FAQ.
 *
 * Expected vars: $faq_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $faq_items ) || ! is_array( $faq_items ) ) {
	$faq_items = function_exists( 'succeedlearn_amp_get_uk_harassment_faq_items' )
		? succeedlearn_amp_get_uk_harassment_faq_items()
		: array();
}
?>
<section
	id="frequently-asked-questions"
	class="sl-section sl-section--alt sl-uk-harassment-faq"
	aria-labelledby="sl-uk-harassment-faq-title"
>
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'Frequently Asked Questions', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-uk-harassment-faq-title" class="sl-h2">
			<?php
			echo wp_kses(
				__( 'Frequently Asked <span>Questions</span>', 'succeedlearn-amp' ),
				array( 'span' => array() )
			);
			?>
		</h2>

		<p class="sl-lead">
			<?php esc_html_e( 'Answers to common questions about UK Preventing Sexual Harassment Training.', 'succeedlearn-amp' ); ?>
		</p>

		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>
	</div>
</section>
