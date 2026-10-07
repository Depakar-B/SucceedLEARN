<?php
/**
 * Anti-Bribery AMP: Laws covered.
 *
 * Expected vars: $images, $laws
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="laws" class="sl-section sl-section--alt sl-aml-pe-vc-laws" aria-labelledby="sl-anti-bribery-laws-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Laws Covered', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-laws-title" class="sl-h2">
				<?php esc_html_e( 'What do the UK Bribery Act 2010, US FCPA and India’s anti-corruption law cover?', 'succeedlearn-amp' ); ?>
			</h2>

			<p>
				<?php esc_html_e( 'Explore the legal context behind the course content, in UK, US and India order.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-concept-stack sl-abac-law-grid">
			<?php foreach ( $laws as $law ) : ?>
				<article class="sl-aml-concept sl-abac-law-card">
					<?php
					$image_key = isset( $law['image'] ) ? (string) $law['image'] : '';
					$image_url = ( '' !== $image_key && ! empty( $images[ $image_key ] ) ) ? $images[ $image_key ] : '';
					?>
					<?php if ( $image_url ) : ?>
						<div class="sl-aml-media">
							<div class="sl-aml-image">
								<amp-img
									src="<?php echo esc_url( $image_url ); ?>"
									width="1536"
									height="1024"
									layout="responsive"
									alt="<?php echo esc_attr( $law['alt'] ); ?>"
								></amp-img>
							</div>
						</div>
					<?php endif; ?>

					<span class="sl-abac-law-card__region"><?php echo esc_html( $law['region'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $law['title'] ); ?></h3>
					<div class="sl-aml-copy">
						<?php foreach ( (array) $law['paragraphs'] as $paragraph ) : ?>
							<p><?php echo esc_html( $paragraph ); ?></p>
						<?php endforeach; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
