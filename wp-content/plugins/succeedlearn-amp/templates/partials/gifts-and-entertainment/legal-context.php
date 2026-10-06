<?php
/**
 * Gifts and Entertainment AMP: UK and US Legal Context.
 *
 * Expected vars: $images, $legal_context
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="legal-context" class="sl-section sl-section--alt sl-aml-pe-vc-legal-context" aria-labelledby="sl-gifts-legal-context-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'UK and US Legal Context', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-gifts-legal-context-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'UK Bribery Act and FCPA <span>Gifts and Entertainment Compliance</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'The course places gifts and entertainment decisions within anti-bribery and anti-corruption frameworks relevant to UK and US business environments.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-concept-stack">
			<?php foreach ( $legal_context as $law ) : ?>
				<article class="sl-aml-concept">
					<?php
					$image_key = isset( $law['image'] ) ? (string) $law['image'] : '';
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
									alt="<?php echo esc_attr( $law['alt'] ); ?>"
								></amp-img>
							</div>
						</div>
					<?php endif; ?>

					<span class="sl-aml-concept__code"><?php echo esc_html( $law['code'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $law['title'] ); ?></h3>
					<p class="sl-aml-concept__subtitle"><?php echo esc_html( $law['subtitle'] ); ?></p>
					<p><?php echo esc_html( $law['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-highlight">
			<p>
				<strong><?php esc_html_e( 'Business gifts and hospitality require context.', 'succeedlearn-amp' ); ?></strong>
			</p>
			<p>
				<?php esc_html_e( 'Purpose, value, timing, recipient, transparency, applicable law and organisational policy should all be considered when assessing an activity.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
