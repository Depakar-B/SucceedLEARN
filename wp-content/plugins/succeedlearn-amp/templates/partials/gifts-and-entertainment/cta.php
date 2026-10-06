<?php
/**
 * Gifts and Entertainment AMP: CTA.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="buy" class="sl-section sl-aml-pe-vc-cta" aria-labelledby="sl-gifts-cta-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'SucceedLEARN PE/VC Compliance', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-gifts-cta-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Gifts and Entertainment Training for Your <span>PE/VC Compliance Programme</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<p class="sl-aml-lead">
			<?php esc_html_e( 'Explore practical, scenario-led learning designed to help PE/VC professionals recognise gifts and entertainment compliance risks across UK and US business environments.', 'succeedlearn-amp' ); ?>
		</p>

		<div class="sl-content-actions">
			<button
				type="button"
				class="sl-content-btn sl-content-btn-secondary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Buy the Course', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
