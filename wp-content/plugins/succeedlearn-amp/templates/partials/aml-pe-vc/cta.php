<?php
/**
 * AML PE/VC AMP: Get Started CTA.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="buy" class="sl-section sl-section--alt sl-aml-pe-vc-cta" aria-labelledby="sl-aml-pe-vc-cta-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Get Started', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-aml-pe-vc-cta-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Choose the AML Training Option <span>That Fits Your Needs</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['cta'] ); ?>"
					width="1200"
					height="800"
					layout="responsive"
					alt="<?php esc_attr_e( 'SucceedLEARN AML Course Preview', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<p class="sl-aml-lead">
			<?php esc_html_e( 'Buy the individual AML course at $20 or enquire about organisational deployment, SCORM delivery and the wider SucceedLEARN compliance learning suites.', 'succeedlearn-amp' ); ?>
		</p>

		<div class="sl-content-actions">
			<button
				type="button"
				class="sl-content-btn sl-content-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
