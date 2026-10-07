<?php
/**
 * SOC 2 AMP — Security awareness module cards.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = succeedlearn_amp_get_soc2_modules();
?>
<section
	class="sl-soc2-modules"
	id="security-awareness-modules"
	aria-labelledby="sl-soc2-modules-title"
>
	<div class="sl-wrap">
		<div class="sl-soc2-modules__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Relevant Modules', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-soc2-modules-title" class="sl-h2">
				<?php esc_html_e( 'Security Awareness Modules Relevant to', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'SOC 2', 'succeedlearn-amp' ); ?></span>
			</h2>

			<h3 class="sl-soc2-modules__subtitle">
				<?php esc_html_e( 'Practical Training Across Key Employee Security Risks', 'succeedlearn-amp' ); ?>
			</h3>
		</div>

		<div class="sl-soc2-modules__grid">
			<?php foreach ( $modules as $module ) : ?>
				<article class="sl-soc2-modules__card">
					<div class="sl-soc2-modules__content">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $module['title'] ); ?>
						</h3>

						<p class="sl-soc2-modules__tagline">
							<?php echo esc_html( $module['tagline'] ); ?>
						</p>

						<p class="sl-soc2-modules__text">
							<?php echo esc_html( $module['text'] ); ?>
						</p>

						<p class="sl-soc2-modules__topics">
							<strong><?php esc_html_e( 'Key Topics:', 'succeedlearn-amp' ); ?></strong>
							<?php echo esc_html( $module['topics'] ); ?>
						</p>

						<button
							type="button"
							class="sl-soc2-modules__link"
							data-cta="soc2-module-demo"
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
