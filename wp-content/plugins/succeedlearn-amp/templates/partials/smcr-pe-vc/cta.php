<?php
/**
 * SMCR PE/VC AMP: Course CTA.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="course-cta" class="sl-section sl-smcr-pe-vc-cta" aria-labelledby="sl-smcr-pe-vc-cta-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'SucceedLEARN SMCR Training', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-smcr-pe-vc-cta-title" class="sl-h2">
				<?php esc_html_e( 'Buy SMCR Training for Your UK Private Equity or Venture Capital Team', 'succeedlearn-amp' ); ?>
			</h2>

			<p>
				<?php esc_html_e( 'Choose role-relevant learning for employees, Senior Managers or both audiences within your organisation.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-content-actions">
			<button
				type="button"
				class="sl-content-btn sl-content-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Buy the Course', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</button>
		</div>
	</div>
</section>
