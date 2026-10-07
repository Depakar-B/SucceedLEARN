<?php
/**
 * Anti-Bribery AMP: For Organisations.
 *
 * Expected vars: $images, $organisation_features
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="organisations" class="sl-section sl-aml-pe-vc-organisations" aria-labelledby="sl-anti-bribery-organisations-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Enterprise ABAC eLearning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-organisations-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'ABAC Training <span>For Organisations</span> - Built for Scale', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['organisations'] ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'Organisational Training Dashboard', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<p>
			<?php esc_html_e( 'Deliver ABAC awareness across teams while giving administrators the controls needed to assign training, monitor completion and manage recurring compliance activity.', 'succeedlearn-amp' ); ?>
		</p>

		<ul class="sl-aml-feature-list" role="list">
			<?php foreach ( $organisation_features as $feature ) : ?>
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
				<?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?>
			</button>
			<button
				type="button"
				class="sl-content-btn sl-content-btn-secondary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'fcp-suite' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
