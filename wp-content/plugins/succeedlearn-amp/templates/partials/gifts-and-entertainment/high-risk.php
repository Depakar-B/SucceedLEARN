<?php
/**
 * Gifts and Entertainment AMP: High-Risk Scenarios.
 *
 * Expected vars: $images, $high_risk_cards
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="high-risk" class="sl-section sl-aml-pe-vc-high-risk" aria-labelledby="sl-gifts-high-risk-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Course Scenarios', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-gifts-high-risk-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'High-Risk Gifts and Entertainment <span>Scenarios in PE/VC</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Some gifts and entertainment situations require greater scrutiny because of the recipient, timing, commercial relationship or jurisdiction involved.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-concept-stack sl-aml-concept-stack--high-risk">
			<?php foreach ( $high_risk_cards as $card ) : ?>
				<article class="sl-aml-concept">
					<?php
					$image_key = isset( $card['image'] ) ? (string) $card['image'] : '';
					$image_url = ( '' !== $image_key && ! empty( $images[ $image_key ] ) ) ? $images[ $image_key ] : '';
					?>
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

					<h3 class="sl-panel-title"><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
