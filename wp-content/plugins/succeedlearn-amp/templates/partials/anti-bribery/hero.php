<?php
/**
 * Anti-Bribery AMP: Hero.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_tags = array(
	__( '30 minutes', 'succeedlearn-amp' ),
	__( 'CPD certified', 'succeedlearn-amp' ),
	__( 'SaaS or SCORM', 'succeedlearn-amp' ),
);
?>
<section id="hero" class="sl-section sl-aml-pe-vc-hero" aria-labelledby="sl-anti-bribery-hero-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'ABAC Compliance eLearning', 'succeedlearn-amp' ); ?>
		</span>

		<h1 id="sl-anti-bribery-hero-title">
			<?php esc_html_e( 'Anti-Bribery and Anti-Corruption eLearning', 'succeedlearn-amp' ); ?>
		</h1>

		<div class="sl-aml-media">
			<div class="sl-aml-image sl-aml-image--wide">
				<amp-img
					src="<?php echo esc_url( $images['hero'] ); ?>"
					width="1600"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'Anti-bribery and anti-corruption training journey', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p class="sl-aml-lead">
				<?php esc_html_e( 'Help employees recognise, resist and report bribery risks. Explore UK Bribery Act 2010 and US Foreign Corrupt Practices Act (FCPA) content in our UK ABAC course, alongside India-focused learning and options tailored to your organisation.', 'succeedlearn-amp' ); ?>
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
					<?php esc_html_e( 'Buy Now @ $18', 'succeedlearn-amp' ); ?>
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
