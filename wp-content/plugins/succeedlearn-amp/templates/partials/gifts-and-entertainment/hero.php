<?php
/**
 * Gifts and Entertainment AMP: Hero.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_tags = array(
	__( 'PE/VC-specific scenarios', 'succeedlearn-amp' ),
	__( 'UK and US context', 'succeedlearn-amp' ),
	__( 'Interactive decision-making', 'succeedlearn-amp' ),
);
?>
<section id="hero" class="sl-section sl-aml-pe-vc-hero" aria-labelledby="sl-gifts-hero-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'Gifts and entertainment compliance', 'succeedlearn-amp' ); ?>
		</span>

		<h1 id="sl-gifts-hero-title">
			<?php
			echo wp_kses(
				__( 'Gifts and Entertainment Training for <span>PE/VC Professionals</span>', 'succeedlearn-amp' ),
				array( 'span' => array() )
			);
			?>
		</h1>

		<div class="sl-aml-media">
			<div class="sl-aml-image sl-aml-image--wide">
				<amp-img
					src="<?php echo esc_url( $images['hero'] ); ?>"
					width="1600"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'Gifts and entertainment compliance training', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p class="sl-aml-lead">
				<?php esc_html_e( 'Make informed decisions. Build trusted relationships.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Help your teams recognise when gifts, entertainment and hospitality are reasonable business courtesies, and when they may create a compliance concern.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Designed for private equity and venture capital professionals, this scenario-led eLearning course uses situations relevant to both the UK and the US, including interactions with investors, advisers, vendors, portfolio company contacts and government officials.', 'succeedlearn-amp' ); ?>
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
