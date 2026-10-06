<?php
/**
 * SOC 2 AMP — Additional emerging-risk awareness.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section
	class="sl-soc2-emerging"
	id="additional-emerging-risk-awareness"
	aria-labelledby="sl-soc2-emerging-title"
>
	<div class="sl-wrap">
		<div class="sl-soc2-emerging__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Broader S-Aware Library', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-soc2-emerging-title" class="sl-h2">
				<?php esc_html_e( 'Additional Emerging-Risk', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Awareness', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-soc2-emerging__body">
			<p class="sl-soc2-emerging__label">
				<?php esc_html_e( 'Optional Add-On', 'succeedlearn-amp' ); ?>
			</p>

			<h3 class="sl-panel-title">
				<?php esc_html_e( 'AI-Based Attacks', 'succeedlearn-amp' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'AI-enabled threats such as deepfakes, voice impersonation and increasingly convincing phishing can create additional human-layer risk.', 'succeedlearn-amp' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Although SOC 2 does not prescribe AI-awareness training as a standalone requirement, AI-Based Attack Awareness is available within the broader S-Aware library for organisations that want to address emerging cybersecurity risks.', 'succeedlearn-amp' ); ?>
			</p>

			<button
				type="button"
				class="sl-content-btn sl-content-btn-primary"
				data-cta="soc2-emerging-ai"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Explore AI-Based Attack Awareness', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
