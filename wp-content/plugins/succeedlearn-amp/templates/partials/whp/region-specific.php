<?php
/**
 * WHP AMP: Why does harassment prevention training need to be region-specific?
 *
 * Expected vars: $images, $flags, $region_examples
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="why-region-specific" class="sl-section sl-whp-region-specific" aria-labelledby="sl-whp-region-specific-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Why Regional Context Matters', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-region-specific-title" class="sl-h2">
				<?php esc_html_e( 'Why does harassment prevention training need to be', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'region-specific?', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-whp-media">
			<div class="sl-whp-image">
				<amp-img
					src="<?php echo esc_url( $images['region_specific'] ); ?>"
					width="1200"
					height="800"
					layout="responsive"
					alt="<?php esc_attr_e( 'Team discussing workplace harassment requirements across regions', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-whp-copy">
			<p><?php esc_html_e( 'Workplace harassment laws are not identical around the world.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Definitions, protected individuals, employer responsibilities, reporting channels and training mandates can differ by country and, in the United States, by state and city.', 'succeedlearn-amp' ); ?></p>
		</div>

		<p class="sl-whp-region-specific__label">
			<?php esc_html_e( 'For example:', 'succeedlearn-amp' ); ?>
		</p>

		<ul class="sl-whp-regions" role="list">
			<?php foreach ( $region_examples as $example ) : ?>
				<li class="sl-whp-regions__item">
					<span class="sl-whp-regions__flag sl-whp-regions__flag--<?php echo esc_attr( $example['flag'] ); ?>" role="img" aria-label="<?php echo esc_attr( $example['region'] ); ?>">
						<?php echo $flags[ $example['flag'] ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</span>
					<p><?php echo esc_html( $example['text'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="sl-highlight">
			<p><?php esc_html_e( 'A generic course may communicate broad principles. Region-specific training helps employees understand what those principles mean in the place where they work.', 'succeedlearn-amp' ); ?></p>
		</div>
	</div>
</section>
