<?php
/**
 * GWCT AMP — FAQ section (shared global accordion UI).
 *
 * Expected vars: $faq_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-section--alt" aria-labelledby="sl-gwct-faq-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading"><?php esc_html_e( 'FAQ', 'succeedlearn-amp' ); ?></span>
		<h2 id="sl-gwct-faq-title" class="sl-h2">
			<?php
			echo wp_kses(
				__( 'The questions buyers <span>actually ask</span>', 'succeedlearn-amp' ),
				array( 'span' => array() )
			);
			?>
		</h2>
		<p class="sl-lead"><?php esc_html_e( 'Clear answers for HR, L&D, and compliance teams evaluating workplace training programmes: from customisation and global deployment to tracking, assessments, and getting started.', 'succeedlearn-amp' ); ?></p>
		<?php
		if ( function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
			succeedlearn_amp_render_faq_accordion( $faq_items );
		}
		?>
	</div>
</section>
