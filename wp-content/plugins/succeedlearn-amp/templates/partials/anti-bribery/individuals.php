<?php
/**
 * Anti-Bribery AMP: For Individuals.
 *
 * Expected vars: $images, $individual_features
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="individuals" class="sl-section sl-section--alt sl-aml-pe-vc-individuals" aria-labelledby="sl-anti-bribery-individuals-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Individual ABAC eLearning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-individuals-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'ABAC Training <span>For Individuals</span> - Start Immediately', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['individuals'] ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'Individual ABAC course preview', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<p class="sl-aml-lead">
			<?php esc_html_e( 'A focused learning experience for professionals who want practical ABAC awareness without a lengthy training commitment.', 'succeedlearn-amp' ); ?>
		</p>

		<ul class="sl-aml-feature-list" role="list">
			<?php foreach ( $individual_features as $feature ) : ?>
				<li class="sl-aml-feature-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $feature['num'] ); ?></span>
					<div>
						<strong><?php echo esc_html( $feature['title'] ); ?></strong>
						<span><?php echo esc_html( $feature['text'] ); ?></span>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="sl-content-actions">
			<button
				type="button"
				class="sl-content-btn sl-content-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Buy Now @ $18', 'succeedlearn-amp' ); ?>
			</button>
			<button
				type="button"
				class="sl-content-btn sl-content-btn-secondary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
