<?php
/**
 * Whistleblowing PE/VC AMP: Hero.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_tags = array(
	__( 'US & UK-Focused Learning', 'succeedlearn-amp' ),
	__( 'Investment-Sector Scenarios', 'succeedlearn-amp' ),
	__( 'Practical Examples', 'succeedlearn-amp' ),
);
?>
<section id="hero" class="sl-section sl-aml-pe-vc-hero" aria-labelledby="sl-whistleblowing-pe-vc-hero-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'Whistleblowing Compliance', 'succeedlearn-amp' ); ?>
		</span>

		<h1 id="sl-whistleblowing-pe-vc-hero-title">
			<?php
			echo wp_kses(
				__( 'Whistleblowing Training for <span>Private Equity &amp; Venture Capital</span>', 'succeedlearn-amp' ),
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
					alt="<?php esc_attr_e( 'Whistleblowing Course Hero Image', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p class="sl-aml-lead">
				<?php esc_html_e( 'Recognise concerns, understand the protections and know when and how to speak up.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Practical whistleblowing training created for investment professionals, using scenarios relevant to financial information, deal activity, conflicts, conduct and reporting concerns.', 'succeedlearn-amp' ); ?>
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
