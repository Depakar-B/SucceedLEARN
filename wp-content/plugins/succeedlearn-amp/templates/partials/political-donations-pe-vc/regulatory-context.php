<?php
/**
 * Political Donations PE/VC AMP: Regulatory Context.
 *
 * Expected vars: $images, $regulatory_cards
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="regulatory-context" class="sl-section sl-aml-pe-vc-laws" aria-labelledby="sl-political-donations-pe-vc-regulatory-context-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Regulatory context', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-political-donations-pe-vc-regulatory-context-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'UK Political Donations Law, Anti-Bribery Compliance and <span>US Pay-to-Play Rules</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Investment firms operating across jurisdictions may need to consider both UK political contribution controls and US Pay-to-Play requirements.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<?php foreach ( $regulatory_cards as $index => $card ) : ?>
			<?php
			$image_key   = isset( $card['image'] ) ? (string) $card['image'] : '';
			$image_url   = ( '' !== $image_key && ! empty( $images[ $image_key ] ) ) ? $images[ $image_key ] : '';
			$track_class = ( 1 === $index ) ? ' sl-aml-laws-track--us' : '';
			?>
			<div class="sl-aml-laws-track<?php echo esc_attr( $track_class ); ?>">
				<div class="sl-aml-laws-track__head">
					<span class="sl-aml-laws-track__label"><?php echo esc_html( $card['title'] ); ?></span>
					<span class="sl-aml-laws-track__country"><?php echo esc_html( $card['code'] ); ?></span>
				</div>

				<?php if ( $image_url ) : ?>
					<div class="sl-aml-media">
						<div class="sl-aml-image">
							<amp-img
								src="<?php echo esc_url( $image_url ); ?>"
								width="1200"
								height="800"
								layout="responsive"
								alt="<?php echo esc_attr( $card['alt'] ); ?>"
							></amp-img>
						</div>
					</div>
				<?php endif; ?>

				<p><?php echo esc_html( $card['text'] ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>
