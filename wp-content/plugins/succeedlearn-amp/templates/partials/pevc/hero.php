<?php
/**
 * PE/VC Suite AMP — Hero (single column).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $images ) || ! is_array( $images ) ) {
	$images = succeedlearn_amp_get_pevc_images();
}
if ( empty( $hero_values ) || ! is_array( $hero_values ) ) {
	$hero_values = succeedlearn_amp_get_pevc_hero_values();
}

$hero_image = isset( $images['hero'] ) ? $images['hero'] : '';
?>
<section class="sl-pevc-hero" aria-labelledby="sl-pevc-hero-title">
	<div class="sl-wrap">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Private Equity and Venture Capital', 'succeedlearn-amp' ); ?>
		</span>

		<h1 id="sl-pevc-hero-title">
			<?php esc_html_e( 'Private Equity and Venture Capital |', 'succeedlearn-amp' ); ?>
			<span><?php esc_html_e( 'Compliance eLearning', 'succeedlearn-amp' ); ?></span>
		</h1>

		<div class="sl-pevc-hero__content">
			<p class="sl-pevc-hero__lead">
				<?php
				esc_html_e(
					'Equip your people with the knowledge to recognise risk, understand their responsibilities, meet regulatory expectations and make better-informed decisions.',
					'succeedlearn-amp'
				);
				?>
			</p>
			<p>
				<?php
				esc_html_e(
					'Practical compliance eLearning designed around the realities of Private Equity and Venture Capital firms.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</div>

		<div class="sl-hero-actions sl-pevc-hero__actions">
			<button
				type="button"
				class="sl-hero-btn sl-hero-btn-primary"
				data-cta="hero-demo"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>

		<?php if ( $hero_image ) : ?>
			<div class="sl-pevc-hero__media">
				<div class="sl-pevc-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="960"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Private Equity and Venture Capital compliance training', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $hero_values ) ) : ?>
			<ul class="sl-pevc-hero__highlights">
				<?php foreach ( $hero_values as $value ) : ?>
					<li class="sl-pevc-hero__highlight">
						<span class="sl-pevc-hero__highlight-title"><?php echo esc_html( $value ); ?></span>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
