<?php
/**
 * SOC 2 Security Awareness — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$soc2_hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp';
$soc2_hero_local = WP_CONTENT_DIR . '/uploads/2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $soc2_hero_local ) ) {
	$soc2_hero_image = akaza_upload_url( '2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp' );
}
?>

<section class="sl-soc2-hero" aria-labelledby="sl-soc2-hero-title">

	<div class="container">

		<div class="sl-soc2-hero__top">

			<?php
			if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
				akaza_render_hero_breadcrumbs();
			}
			?>

			<span class="sl-home-sub-heading sl-soc2-hero__eyebrow">
				<?php esc_html_e( 'SOC 2 · Employee Security Awareness', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-soc2-hero-title">
				<?php
				echo wp_kses(
					__( 'Information Security Awareness Training for <span>SOC 2 Compliance</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h1>

		</div>

		<div class="sl-soc2-hero__grid">

			<div class="sl-soc2-hero__content">

				<h2 class="sl-hero-h2 sl-soc2-hero__subheading">
					<?php esc_html_e( 'Build Employee Security Awareness That Supports Your SOC 2 Readiness', 'akaza-adventure' ); ?>
				</h2>

				<p class="sl-soc2-hero__description">
					<?php esc_html_e( 'SucceedLEARN’s Information Security Awareness Training for SOC 2 Compliance provides practical employee security awareness across the key risk areas most relevant to an organisation’s SOC 2 control environment.', 'akaza-adventure' ); ?>
				</p>

				<p class="sl-soc2-hero__description">
					<?php esc_html_e( 'Through focused learning on account security, data protection, social engineering, malware, insider threats, third-party risk, remote working, physical security and incident reporting, employees build the knowledge needed to make safer security decisions in their everyday work.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-soc2-hero__actions sl-hero-actions">

					<a href="#contact" class="sl-hero-btn sl-hero-btn-primary">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					</a>

					<a href="#security-awareness-modules" class="sl-hero-btn sl-hero-btn-secondary">
						<?php esc_html_e( 'Explore Modules', 'akaza-adventure' ); ?>
					</a>

				</div>

			</div>

			<div class="sl-soc2-hero__visual">
				<div class="sl-soc2-hero__image">
					<img
						src="<?php echo esc_url( $soc2_hero_image ); ?>"
						alt="<?php esc_attr_e( 'Information Security Awareness Training for SOC 2 Compliance', 'akaza-adventure' ); ?>"
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
