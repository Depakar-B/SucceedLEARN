<?php
/**
 * Generative AI AMP — Final call to action.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section
	class="sl-gai-cta"
	id="help-employees-approach-generative-ai"
	aria-labelledby="sl-gai-cta-title"
>
	<div class="sl-wrap">
		<div class="sl-gai-cta__inner">
			<h2 id="sl-gai-cta-title" class="sl-h2">
				<?php esc_html_e( 'Help employees approach generative AI', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'with greater care', 'succeedlearn-amp' ); ?></span>
			</h2>

			<div class="sl-gai-cta__copy">
				<p>
					<?php esc_html_e( 'Give your workforce a clear introduction to the opportunities, limitations and responsibilities involved in using generative AI at work.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Build a shared foundation for more considered decisions about information, approvals, accuracy, copyright and regulatory risk.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<div class="sl-hero-actions sl-gai-cta__actions">
				<button
					type="button"
					class="sl-hero-btn sl-hero-btn-primary"
					data-cta="cta-demo"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
					<span aria-hidden="true">→</span>
				</button>
			</div>
		</div>
	</div>
</section>
