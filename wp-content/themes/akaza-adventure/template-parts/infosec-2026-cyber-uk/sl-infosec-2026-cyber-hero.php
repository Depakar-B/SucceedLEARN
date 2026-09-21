<?php
/**
 * SucceedLEARN
 * Cybersecurity Awareness Month 2026
 * Hero Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$infosec_hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Cybersecurity-Awareness-Month-2026.webp';
$infosec_hero_local = WP_CONTENT_DIR . '/uploads/2026/09/Cybersecurity-Awareness-Month-2026.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $infosec_hero_local ) ) {
	$infosec_hero_image = akaza_upload_url( '2026/09/Cybersecurity-Awareness-Month-2026.webp' );
}
?>

<section
	class="sl-infosec-2026-cyber-hero"
	aria-labelledby="sl-infosec-2026-cyber-hero-title"
>
	<div class="container">
		<div class="sl-infosec-2026-cyber-hero__head">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Limited-period campaign', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-infosec-2026-cyber-hero-title">
				<?php
				echo wp_kses(
					__( 'Cybersecurity Awareness Month <span>2026</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h1>
		</div>

		<div class="sl-infosec-2026-cyber-hero__grid">

			<div class="sl-infosec-2026-cyber-hero__content">

				<h2 class="sl-infosec-2026-cyber-hero__tagline">
					<?php esc_html_e( 'Don’t Just Train Your Employees. Test Their Cyber Readiness.', 'akaza-adventure' ); ?>
				</h2>

				<div class="sl-infosec-2026-cyber-hero__intro">
					<p>
						<?php
						esc_html_e(
							'Your employees are one of your organisation’s most important lines of defence.',
							'akaza-adventure'
						);
						?>
					</p>
					<p>
						<?php
						esc_html_e(
							'But phishing attacks are becoming harder to recognise. AI-assisted emails, impersonation, social engineering and increasingly convincing fraudulent communications mean that knowing about phishing isn’t always enough.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

				<p class="sl-infosec-2026-cyber-hero__hook">
					<?php
					echo wp_kses(
						__( 'The real question:<br>what happens when the <strong>phishing email actually arrives?</strong>', 'akaza-adventure' ),
						array(
							'br'     => array(),
							'strong' => array(),
						)
					);
					?>
				</p>

				<p class="sl-infosec-2026-cyber-hero__closing">
					<?php
					esc_html_e(
						'This Cybersecurity Awareness Month gives your employees the opportunity to put their awareness into practice through a controlled phishing simulation and gives your organisation measurable insight into how prepared your workforce really is.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-hero-actions sl-infosec-2026-cyber-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
						<?php esc_html_e( 'Be a part of the cyber readiness challenge', 'akaza-adventure' ); ?>
					</a>
					<a class="sl-hero-btn sl-hero-btn-secondary" href="#terms-and-conditions">
						<?php esc_html_e( 'View Terms', 'akaza-adventure' ); ?>
					</a>
				</div>

			</div>

			<div class="sl-infosec-2026-cyber-hero__media">
				<div class="sl-infosec-2026-cyber-hero__image">
					<img
						src="<?php echo esc_url( $infosec_hero_image ); ?>"
						alt="<?php esc_attr_e( 'Cybersecurity Awareness Month 2026', 'akaza-adventure' ); ?>"
						width="720"
						height="720"
						loading="eager"
						decoding="async"
					/>
				</div>
			</div>

		</div>
	</div>
</section>
