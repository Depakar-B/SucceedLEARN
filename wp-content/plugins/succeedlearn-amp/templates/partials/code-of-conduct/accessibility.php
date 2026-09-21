<?php
/**
 * Code of Conduct — Accessibility.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_accessibility          = succeedlearn_amp_get_coc_accessibility_data();
$coc_accessibility_features = $coc_accessibility['features'];
?>

<section
	class="sl-section sl-coc-accessibility"
	aria-labelledby="sl-coc-accessibility-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-accessibility__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_accessibility['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-accessibility-title">
				<?php echo esc_html( $coc_accessibility['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_accessibility['highlight'] ); ?>
				</span>
			</h2>

			<p>
				<?php echo esc_html( $coc_accessibility['intro'] ); ?>
			</p>
		</div>

		<div class="sl-coc-accessibility__content">
			<h3 class="sl-panel-title sl-coc-accessibility__list-title">
				<?php echo esc_html( $coc_accessibility['list_title'] ); ?>
			</h3>

			<div class="sl-coc-accessibility__features sl-amp-card-grid">
				<?php foreach ( $coc_accessibility_features as $feature ) : ?>
					<div class="sl-coc-accessibility__feature">
						<span class="sl-coc-accessibility__feature-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="m6.5 12.5 3.5 3.5 7.5-8" />
							</svg>
						</span>

						<span class="sl-coc-accessibility__feature-label">
							<?php echo esc_html( $feature ); ?>
						</span>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="sl-highlight sl-coc-accessibility__close">
				<p class="sl-coc-accessibility__close-text">
					<?php echo esc_html( $coc_accessibility['closing'] ); ?>
				</p>
			</div>
		</div>

	</div>
</section>