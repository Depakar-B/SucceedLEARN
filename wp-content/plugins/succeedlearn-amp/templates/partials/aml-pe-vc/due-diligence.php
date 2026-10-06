<?php
/**
 * AML PE/VC AMP: Due Diligence / Financial Crime Concepts.
 *
 * Expected vars: $images, $concepts
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="due-diligence" class="sl-section sl-section--alt sl-aml-pe-vc-due-diligence" aria-labelledby="sl-aml-pe-vc-due-diligence-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Risk-Based Financial Crime Awareness', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-aml-pe-vc-due-diligence-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'From Investor Due Diligence to <span>Wider Financial Crime Risk</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Understand five core concepts that help investment professionals identify who they are dealing with, apply the right level of due diligence and recognise wider financial crime risks.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-concept-stack">
			<?php foreach ( $concepts as $concept ) : ?>
				<article class="sl-aml-concept">
					<?php
					$image_key = isset( $concept['image'] ) ? (string) $concept['image'] : '';
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
									alt="<?php echo esc_attr( $concept['alt'] ); ?>"
								></amp-img>
							</div>
						</div>
					<?php endif; ?>

					<span class="sl-aml-concept__code"><?php echo esc_html( $concept['code'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $concept['title'] ); ?></h3>
					<p class="sl-aml-concept__subtitle"><?php echo esc_html( $concept['subtitle'] ); ?></p>
					<p><?php echo esc_html( $concept['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
