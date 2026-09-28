<?php
/**
 * UK Cyber Essentials — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ukce_hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp';
$ukce_hero_local = WP_CONTENT_DIR . '/uploads/2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $ukce_hero_local ) ) {
	$ukce_hero_image = akaza_upload_url( '2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp' );
}
?>

<section class="sl-ukce-hero" aria-labelledby="sl-ukce-hero-title">

	<div class="container">

		<div class="sl-ukce-hero__top">

			<?php
			if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
				akaza_render_hero_breadcrumbs();
			}
			?>

			<span class="sl-home-sub-heading sl-ukce-hero__eyebrow">
				<?php esc_html_e( 'UK Cyber Essentials · Employee Security Awareness', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-ukce-hero-title">
				<?php
				echo wp_kses(
					__( 'Information Security Awareness Training for <span>UK Cyber Essentials</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h1>

		</div>

		<div class="sl-ukce-hero__grid">

			<div class="sl-ukce-hero__content">

				<h2 class="sl-hero-h2 sl-ukce-hero__subheading">
					<?php esc_html_e( 'Build Employee Security Awareness That Supports Cyber Essentials', 'akaza-adventure' ); ?>
				</h2>

				<p class="sl-ukce-hero__description">
					<?php esc_html_e( 'SucceedLEARN’s Information Security Awareness Training for UK Cyber Essentials provides practical employee awareness around the security behaviors most relevant to the Cyber Essentials control environment.', 'akaza-adventure' ); ?>
				</p>

				<p class="sl-ukce-hero__description">
					<?php esc_html_e( 'Through focused learning on account security, malware, remote working and other supporting cyber-risk topics, employees gain practical knowledge that can complement the organization\'s wider Cyber Essentials programme.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-ukce-hero__actions sl-hero-actions">

					<a href="#contact" class="sl-hero-btn sl-hero-btn-primary">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					</a>

					<a href="#security-awareness-modules" class="sl-hero-btn sl-hero-btn-secondary">
						<?php esc_html_e( 'Explore Modules', 'akaza-adventure' ); ?>
					</a>

				</div>

			</div>

			<div class="sl-ukce-hero__visual">
				<div class="sl-ukce-hero__image">
					<img
						src="<?php echo esc_url( $ukce_hero_image ); ?>"
						alt="<?php esc_attr_e( 'Information Security Awareness Training for UK Cyber Essentials', 'akaza-adventure' ); ?>"
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
