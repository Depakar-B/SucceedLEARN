<?php
/**
 * SMCR PE/VC AMP: Hero.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_tags = array(
	__( 'UK SMCR Training', 'succeedlearn-amp' ),
	__( 'Employees Course', 'succeedlearn-amp' ),
	__( 'Senior Managers Course', 'succeedlearn-amp' ),
	__( 'PE/VC Scenarios', 'succeedlearn-amp' ),
);
?>
<section id="hero" class="sl-section sl-smcr-pe-vc-hero" aria-labelledby="sl-smcr-pe-vc-hero-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'SMCR Compliance Training', 'succeedlearn-amp' ); ?>
		</span>

		<h1 id="sl-smcr-pe-vc-hero-title">
			<?php esc_html_e( 'SMCR Training for Private Equity & Venture Capital Firms', 'succeedlearn-amp' ); ?>
		</h1>

		<div class="sl-aml-media">
			<div class="sl-aml-image sl-aml-image--wide">
				<amp-img
					src="<?php echo esc_url( $images['hero'] ); ?>"
					width="1600"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'SMCR compliance training', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p class="sl-aml-lead">
				<?php esc_html_e( 'Role-relevant SMCR training for UK private equity and venture capital teams, with dedicated learning for employees and Senior Managers.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Help learners connect Conduct Rules and individual accountability with practical decisions involving investments, investor reporting, operations, oversight and escalation.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-tags" role="list">
			<?php foreach ( $hero_tags as $tag ) : ?>
				<li><?php echo esc_html( $tag ); ?></li>
			<?php endforeach; ?>
		</ul>

		<div class="sl-hero-actions sl-aml-hero__actions">
			<div class="sl-aml-hero__cta-item">
				<span class="sl-aml-hero__cta-label"><?php esc_html_e( 'Individual', 'succeedlearn-amp' ); ?></span>
				<button
					type="button"
					class="sl-hero-btn sl-hero-btn-primary"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Buy Now @ $20', 'succeedlearn-amp' ); ?>
					<span aria-hidden="true">→</span>
				</button>
			</div>
			<div class="sl-aml-hero__cta-item">
				<span class="sl-aml-hero__cta-label"><?php esc_html_e( 'Organisation', 'succeedlearn-amp' ); ?></span>
				<button
					type="button"
					class="sl-hero-btn sl-hero-btn-secondary"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'organisations' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?>
				</button>
			</div>
		</div>
	</div>
</section>
