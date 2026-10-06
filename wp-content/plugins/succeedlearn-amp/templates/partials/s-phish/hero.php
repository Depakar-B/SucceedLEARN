<?php
/**
 * S-Phish AMP: Hero.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="hero" class="sl-section sl-s-phish-hero" aria-labelledby="sl-s-phish-hero-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'S-Phish', 'succeedlearn-amp' ); ?>
		</span>

		<h1 id="sl-s-phish-hero-title">
			<?php esc_html_e( 'Phishing Simulation', 'succeedlearn-amp' ); ?>
			<span><?php esc_html_e( 'Tool', 'succeedlearn-amp' ); ?></span>
		</h1>

		<h2 class="sl-s-phish-hero__tagline">
			<?php esc_html_e( 'Enterprise Phishing Simulation Tool for Building a Stronger Human Firewall', 'succeedlearn-amp' ); ?>
		</h2>

		<div class="sl-s-phish-media">
			<div class="sl-s-phish-image">
				<amp-img
					src="<?php echo esc_url( $images['hero'] ); ?>"
					width="1280"
					height="853"
					layout="responsive"
					alt="<?php esc_attr_e( 'S-Phish phishing simulation tool: Test, Train, Measure & Strengthen', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-s-phish-copy">
			<p>
				<?php esc_html_e( 'Email continues to be one of the most exploited attack vectors, with phishing remaining the leading cause of credential theft, ransomware, and business email compromise. While technical security controls block thousands of malicious emails every day, it only takes one successful click to create a costly security incident.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( "S-Phish is SucceedLEARN's enterprise phishing simulation platform, designed to transform phishing awareness from theoretical knowledge into practical experience through realistic simulations, behaviour-based learning interventions and actionable analytics.", 'succeedlearn-amp' ); ?>
			</p>
			<p class="sl-s-phish-hero__pillars">
				<?php esc_html_e( 'Test | Train | Measure & Strengthen', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-hero-actions sl-s-phish-hero__actions">
			<button
				type="button"
				class="sl-hero-btn sl-hero-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</button>
			<button
				type="button"
				class="sl-hero-btn sl-hero-btn-secondary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'meet-s-phish' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Watch Video', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</button>
		</div>
	</div>
</section>
