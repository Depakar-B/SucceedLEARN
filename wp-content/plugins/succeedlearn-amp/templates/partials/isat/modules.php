<?php
/**
 * ISAT AMP — 10 module cards.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = succeedlearn_amp_get_isat_modules();
?>
<section
	class="sl-isat-modules"
	id="information-security-awareness-modules"
	aria-labelledby="sl-isat-modules-title"
>
	<div class="sl-wrap">
		<div class="sl-isat-modules__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'S-Aware Modules', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-isat-modules-title" class="sl-h2">
				<?php esc_html_e( '10 Information Security', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Awareness Training Modules', 'succeedlearn-amp' ); ?></span>
			</h2>

			<h3 class="sl-isat-modules__subtitle">
				<?php esc_html_e( 'Build Awareness Across the Cyber Risks Employees Encounter Every Day', 'succeedlearn-amp' ); ?>
			</h3>
		</div>

		<div class="sl-isat-modules__grid">
			<?php foreach ( $modules as $module ) : ?>
				<article class="sl-isat-modules__card">
					<div class="sl-isat-modules__content">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $module['title'] ); ?>
						</h3>

						<p class="sl-isat-modules__tagline">
							<?php echo esc_html( $module['tagline'] ); ?>
						</p>

						<p class="sl-isat-modules__text">
							<?php echo esc_html( $module['text'] ); ?>
						</p>

						<p class="sl-isat-modules__topics">
							<strong><?php esc_html_e( 'Key Topics:', 'succeedlearn-amp' ); ?></strong>
							<?php echo esc_html( $module['topics'] ); ?>
						</p>

						<button
							type="button"
							class="sl-isat-modules__link"
							data-cta="isat-module-demo"
							<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						>
							<?php echo esc_html( $module['cta'] ); ?>
						</button>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
