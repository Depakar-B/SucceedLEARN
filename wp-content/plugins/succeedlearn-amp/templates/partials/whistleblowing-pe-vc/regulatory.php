<?php
/**
 * Whistleblowing PE/VC AMP: Legal & Regulatory Context.
 *
 * Expected vars: $images, $regulatory_frameworks
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="legal-regulatory-context" class="sl-section sl-aml-pe-vc-laws" aria-labelledby="sl-whistleblowing-pe-vc-regulatory-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Legal & Regulatory Context', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whistleblowing-pe-vc-regulatory-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Which UK and US Whistleblowing Laws Does the Course <span>Cover?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'The course introduces the main legal frameworks included in the learning material while keeping the focus on practical awareness.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<?php foreach ( $regulatory_frameworks as $index => $framework ) : ?>
			<?php
			$image_key   = isset( $framework['image'] ) ? (string) $framework['image'] : '';
			$image_url   = ( '' !== $image_key && ! empty( $images[ $image_key ] ) ) ? $images[ $image_key ] : '';
			$track_class = ( 1 === $index ) ? ' sl-aml-laws-track--us' : '';
			?>
			<div class="sl-aml-laws-track<?php echo esc_attr( $track_class ); ?>">
				<div class="sl-aml-laws-track__head">
					<span class="sl-aml-laws-track__label"><?php echo esc_html( $framework['title'] ); ?></span>
					<span class="sl-aml-laws-track__country"><?php echo esc_html( $framework['code'] ); ?></span>
				</div>

				<?php if ( $image_url ) : ?>
					<div class="sl-aml-media">
						<div class="sl-aml-image">
							<amp-img
								src="<?php echo esc_url( $image_url ); ?>"
								width="1200"
								height="800"
								layout="responsive"
								alt="<?php echo esc_attr( $framework['alt'] ); ?>"
							></amp-img>
						</div>
					</div>
				<?php endif; ?>

				<p class="sl-aml-concept__subtitle"><?php echo esc_html( $framework['subtitle'] ); ?></p>

				<ul class="sl-list sl-aml-list" role="list">
					<?php foreach ( $framework['items'] as $item ) : ?>
						<li class="sl-list-item">
							<span class="sl-aml-check" aria-hidden="true">✓</span>
							<span class="sl-list-item__text"><?php echo esc_html( $item ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endforeach; ?>

		<div class="sl-highlight sl-aml-after">
			<p>
				<?php esc_html_e( 'The precise requirements applying to an organisation depend on jurisdiction, regulatory status and circumstances. This course is awareness training and should be used alongside current internal policies and appropriate legal or compliance advice.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
