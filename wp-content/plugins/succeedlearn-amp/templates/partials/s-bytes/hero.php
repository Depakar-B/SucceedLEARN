<?php
/**
 * S-Bytes AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: succeedlearn_amp_get_sbytes_page_title();

$hero_image = function_exists( 'succeedlearn_amp_get_sbytes_hero_image' )
	? succeedlearn_amp_get_sbytes_hero_image()
	: succeedlearn_amp_upload_url( '2026/09/Meet-S-Bytes-FunFoSec.webp' );
?>
<section class="sl-sbytes-hero" aria-labelledby="sl-sbytes-hero-title">
	<div class="sl-wrap">
		<?php
		if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
			succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
		}
		?>
		<div class="sl-sbytes-hero__top">
			<span class="sl-home-sub-heading sl-sbytes-hero__eyebrow"><?php esc_html_e( 'S-Bytes', 'succeedlearn-amp' ); ?></span>
			<h1 id="sl-sbytes-hero-title">
				<?php esc_html_e( 'Information', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Awareness Microlearning Series', 'succeedlearn-amp' ); ?></span>
			</h1>
		</div>
		<div class="sl-sbytes-hero__grid">
			<div class="sl-sbytes-hero__content">
				<h2 class="sl-hero-h2 sl-sbytes-hero__subheading">
					<?php esc_html_e( 'Bite-Sized Security Awareness That Keeps Cybersecurity Top of Mind', 'succeedlearn-amp' ); ?>
				</h2>
				<p><?php esc_html_e( 'Reinforce essential security behaviours throughout the year with short, engaging and memorable microlearning designed to fit naturally into the employee workday.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Welcome to FunFoSec, the information security awareness microlearning series from SucceedLEARN Security Behaviour & Culture Suite that redefines how your employees interact with cybersecurity. It transforms complex cybersecurity topics into quick, relatable learning experiences that help employees remember what matters and apply secure behaviours in everyday situations.', 'succeedlearn-amp' ); ?></p>
				<p class="sl-sbytes-hero__tagline"><?php esc_html_e( 'Short enough to consume. Engaging enough to remember. Continuous enough to build habits.', 'succeedlearn-amp' ); ?></p>
				<div class="sl-hero-actions sl-sbytes-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="hero-trial"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'request-demo' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-secondary"
						data-cta="hero-video"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'meet-s-bytes' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Explore the Video', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>
			<div class="sl-sbytes-hero__media">
				<div class="sl-sbytes-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="960"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Meet S-Bytes FunFoSec microlearning', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
