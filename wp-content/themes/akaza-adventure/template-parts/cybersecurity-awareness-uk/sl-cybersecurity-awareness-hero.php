<?php
/**
 * SucceedLEARN — UK Cyber Security Awareness Month Hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$csa_hero_image_url = 'https://succeedlearn.com/wp-content/uploads/2026/09/october-cybersecurity-awareness-hero.webp';
$csa_hero_local     = WP_CONTENT_DIR . '/uploads/2026/09/october-cybersecurity-awareness-hero.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $csa_hero_local ) ) {
	$csa_hero_image_url = akaza_upload_url( '2026/09/october-cybersecurity-awareness-hero.webp' );
}

?>

<section class="sl-cyber-awareness-hero" aria-labelledby="sl-cyber-awareness-hero-title">
	<div class="container">

		<div class="sl-cyber-awareness-hero__grid">

			<div class="sl-cyber-awareness-hero__content">

				<span class="sl-home-sub-heading">
					<?php
					echo wp_kses(
						__( 'Unbelievable Offer for October 2026', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</span>

				<h1 id="sl-cyber-awareness-hero-title">
					<?php
					echo wp_kses(
						__( 'Cyber Security Awareness Month <span>October 2026</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h1>

				<h2 class="sl-cyber-awareness-hero__tagline">
					<?php esc_html_e( 'Train your people. Test their readiness. Strengthen your human firewall.', 'akaza-adventure' ); ?>
				</h2>

				<p class="sl-cyber-awareness-hero__description">
					<?php esc_html_e( 'Turn Cyber Security Awareness Month into measurable action. Combine practical employee training, realistic phishing simulations, simple suspicious-email reporting and clear campaign results in one coordinated experience.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-cyber-awareness-hero__actions sl-hero-actions">

					<a
						class="sl-hero-btn sl-hero-btn-primary"
						href="#pricing"
					>
						<?php
						echo wp_kses(
							__( 'Claim the <span class="sl-csa-oct-tag">October Offer</span> ', 'akaza-adventure' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						);
						?>

						<svg
							viewBox="0 0 24 24"
							aria-hidden="true"
							focusable="false"
						>
							<path d="M5 12h13M13 6l6 6-6 6" />
						</svg>
					</a>

					<a
						class="sl-hero-btn sl-hero-btn-secondary"
						href="#contact"
					>
						<?php esc_html_e( 'Book a Demo', 'akaza-adventure' ); ?>
					</a>

				</div>

			</div>

			<div class="sl-cyber-awareness-hero__visual">
				<div class="sl-cyber-awareness-hero__image">
					<img
						src="<?php echo esc_url( $csa_hero_image_url ); ?>"
						alt="<?php esc_attr_e( 'October Cyber Security Awareness: measurable action', 'akaza-adventure' ); ?>"
						width="1200"
						height="900"
						loading="eager"
						decoding="async"
					/>
				</div>
			</div>

		</div>

	</div>
</section>
