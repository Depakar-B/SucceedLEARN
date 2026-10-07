<?php
/**
 * UK Cyber Essentials AMP — Core module cards.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = succeedlearn_amp_get_ukce_modules();
?>
<section
	class="sl-ukce-modules"
	id="security-awareness-modules"
	aria-labelledby="sl-ukce-modules-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-modules__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Relevant Modules', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-ukce-modules-title" class="sl-h2">
				<?php esc_html_e( 'Security Awareness Modules Relevant to', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Cyber Essentials', 'succeedlearn-amp' ); ?></span>
			</h2>

			<h3 class="sl-ukce-modules__subtitle">
				<?php esc_html_e( 'Focused Employee Awareness Around Key Cyber Essentials Controls', 'succeedlearn-amp' ); ?>
			</h3>
		</div>

		<div class="sl-ukce-modules__grid">
			<?php foreach ( $modules as $module ) : ?>
				<article class="sl-ukce-modules__card">
					<div class="sl-ukce-modules__content">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $module['title'] ); ?>
						</h3>

						<p class="sl-ukce-modules__tagline">
							<?php echo esc_html( $module['tagline'] ); ?>
						</p>

						<p class="sl-ukce-modules__lead">
							<?php echo esc_html( $module['lead'] ); ?>
						</p>

						<p class="sl-ukce-modules__text">
							<?php echo esc_html( $module['text'] ); ?>
						</p>

						<p class="sl-ukce-modules__topics">
							<strong><?php esc_html_e( 'Key Topics:', 'succeedlearn-amp' ); ?></strong>
							<?php echo esc_html( $module['topics'] ); ?>
						</p>

						<p class="sl-ukce-modules__note">
							<?php echo esc_html( $module['note'] ); ?>
						</p>

						<button
							type="button"
							class="sl-ukce-modules__link"
							data-cta="ukce-module-demo"
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
