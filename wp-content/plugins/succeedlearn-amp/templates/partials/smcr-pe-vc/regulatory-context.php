<?php
/**
 * SMCR PE/VC AMP: UK Regulatory Context (FCA, COCON, PRA).
 *
 * Expected vars: $regulators
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="uk-regulatory-context" class="sl-section sl-smcr-pe-vc-regulatory-context" aria-labelledby="sl-smcr-pe-vc-regulatory-context-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'UK Regulatory Context', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-smcr-pe-vc-regulatory-context-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'UK SMCR Training: FCA Conduct Rules, COCON and PRA <span>Responsibilities</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-concept-stack">
			<?php foreach ( $regulators as $regulator ) : ?>
				<article class="sl-aml-concept">
					<?php if ( ! empty( $regulator['image'] ) ) : ?>
						<div class="sl-aml-media">
							<div class="sl-aml-image">
								<amp-img
									src="<?php echo esc_url( $regulator['image'] ); ?>"
									width="1200"
									height="800"
									layout="responsive"
									alt="<?php echo esc_attr( $regulator['alt'] ); ?>"
								></amp-img>
							</div>
						</div>
					<?php endif; ?>

					<span class="sl-aml-concept__code"><?php echo esc_html( $regulator['code'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $regulator['title'] ); ?></h3>
					<p class="sl-aml-concept__subtitle"><?php echo esc_html( $regulator['subtitle'] ); ?></p>
					<p><?php echo esc_html( $regulator['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
