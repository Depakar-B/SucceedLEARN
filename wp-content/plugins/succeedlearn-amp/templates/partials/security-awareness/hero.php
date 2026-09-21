<?php
/**
 * Security Awareness AMP — Hero section.
 *
 * Expected vars: $page_title
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: __( 'SucceedLEARN Security Behaviour & Culture Suite', 'succeedlearn-amp' );

$hero_image = function_exists( 'succeedlearn_amp_get_sa_hero_image' )
	? succeedlearn_amp_get_sa_hero_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp';
?>
<section class="sl-sa-hero" aria-labelledby="sl-sa-hero-title">
	<div class="sl-wrap">
		<div class="sl-sa-hero__top">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
			}
			?>
			<span class="sl-home-sub-heading sl-sa-hero__eyebrow"><?php esc_html_e( 'Security Awareness & Human Risk', 'succeedlearn-amp' ); ?></span>
			<h1 id="sl-sa-hero-title">
				<?php
				echo wp_kses(
					__( 'SucceedLEARN <span>Security Behaviour & Culture Suite</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h1>
		</div>
		<div class="sl-sa-hero__grid">
			<div class="sl-sa-hero__content">
				<h2 class="sl-hero-h2 sl-sa-hero__subheading"><?php esc_html_e( 'Build a Security-Aware Workforce. Strengthen Human Risk Resilience.', 'succeedlearn-amp' ); ?></h2>
				<p class="sl-sa-hero__description"><?php esc_html_e( 'The SucceedLEARN Security Behaviour & Culture Suite combines awareness training, phishing simulations, microlearning, gamification, visual nudges, analytics, and seamless integrations into one unified platform that helps organisations reduce human cyber risk while meeting global compliance requirements.', 'succeedlearn-amp' ); ?></p>
				<div class="sl-sa-hero__actions">
					<button type="button" class="sl-btn sl-btn--primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?></button>
					<button type="button" class="sl-btn sl-btn--secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'security-behaviour-suite' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Explore the Suite', 'succeedlearn-amp' ); ?></button>
				</div>
			</div>

			<div class="sl-sa-hero__visual">
				<div class="sl-sa-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="720"
						height="800"
						layout="responsive"
						alt="<?php esc_attr_e( 'SucceedLEARN Security Behaviour and Culture Suite', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
