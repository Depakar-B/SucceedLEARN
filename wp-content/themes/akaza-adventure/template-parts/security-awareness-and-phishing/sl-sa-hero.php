<?php
/**
 * Security Awareness — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp';
$sa_hero_local = WP_CONTENT_DIR . '/uploads/2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $sa_hero_local ) ) {
	$sa_hero_image = akaza_upload_url( '2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp' );
}

// Brochure PDF: force download via ?download= (bridge / Eduma child handler).
$sa_brochure_file = 'Security-Behaviour-Culture-Suite-Brochure.pdf';
$sa_brochure_url  = add_query_arg( 'download', $sa_brochure_file, home_url( '/' ) );
?>

<section class="sl-sa-hero" aria-labelledby="sl-sa-hero-title">

	<div class="container">

		<div class="sl-sa-hero__top">

			<?php
			if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
				akaza_render_hero_breadcrumbs();
			}
			?>

			<span class="sl-home-sub-heading sl-sa-hero__eyebrow">
				<?php esc_html_e( 'Security Awareness & Human Risk', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-sa-hero-title">
				<?php
				echo wp_kses(
					__( 'SucceedLEARN <span>Security Behaviour & Culture Suite</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h1>

		</div>

		<div class="sl-sa-hero__grid">

			<div class="sl-sa-hero__content">

				<h2 class="sl-hero-h2 sl-sa-hero__subheading">
					<?php esc_html_e( 'Build a Security-Aware Workforce. Strengthen Human Risk Resilience.', 'akaza-adventure' ); ?>
				</h2>

				<p class="sl-sa-hero__description">
					<?php esc_html_e( 'The SucceedLEARN Security Behaviour & Culture Suite combines awareness training, phishing simulations, microlearning, gamification, visual nudges, analytics, and seamless integrations into one unified platform that helps organisations reduce human cyber risk while meeting global compliance requirements.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-sa-hero__actions sl-hero-actions">

					<a
						href="#security-behaviour-suite"
						class="sl-hero-btn sl-hero-btn-primary"
					>
						<?php esc_html_e( 'Explore the Suite', 'akaza-adventure' ); ?>
					</a>

					<a
						href="<?php echo esc_url( $sa_brochure_url ); ?>"
						class="sl-hero-btn sl-hero-btn-secondary"
						download="<?php echo esc_attr( $sa_brochure_file ); ?>"
					>
						<?php esc_html_e( 'Download Brochure', 'akaza-adventure' ); ?>
					</a>

				</div>

			</div>

			<div class="sl-sa-hero__visual">
				<div class="sl-sa-hero__image">
					<img
						src="<?php echo esc_url( $sa_hero_image ); ?>"
						alt="<?php esc_attr_e( 'SucceedLEARN Security Behaviour and Culture Suite', 'akaza-adventure' ); ?>"
						width="720"
						height="800"
						loading="eager"
						decoding="async"
					/>
				</div>
			</div>

		</div>

	</div>

</section>
