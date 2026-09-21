<?php
/**
 * Security Awareness — Platform overview section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_platform_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp';
$sa_platform_local = WP_CONTENT_DIR . '/uploads/2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $sa_platform_local ) ) {
	$sa_platform_image = akaza_upload_url( '2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp' );
}
?>

<section
	class="sl-sa-platform"
	id="security-awareness-suite"
	aria-labelledby="sl-sa-platform-title"
>

	<div class="container">

		<div class="sl-sa-platform__grid">

			<div class="sl-sa-platform__media">

				<div class="sl-sa-platform__image">
					<img
						src="<?php echo esc_url( $sa_platform_image ); ?>"
						alt="<?php esc_attr_e( 'SucceedLEARN Security Behaviour Culture Suite platform', 'akaza-adventure' ); ?>"
						width="720"
						height="760"
						loading="lazy"
						decoding="async"
					/>
				</div>

			</div>

			<div class="sl-sa-platform__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Security Behaviour Platform', 'akaza-adventure' ); ?>
				</span>

			<h2 id="sl-sa-platform-title">
				<?php esc_html_e( 'One Platform.', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Continuous Security Behaviour Change.', 'akaza-adventure' ); ?></span>
			</h2>

				<p class="sl-sa-platform__lead">
					<?php esc_html_e(
						'Annual awareness training alone is no longer enough to address today’s evolving cyber threats. Employees require continuous reinforcement, practical learning experiences, phishing simulations and real-time behavioural insights to develop lasting secure habits.',
						'akaza-adventure'
					); ?>
				</p>

				<p>
					<?php esc_html_e(
						'The SucceedLEARN Security Behaviour & Culture Suite brings together everything organisations need from foundational awareness courses and Continuous learning to phishing simulations, gamification and analytics, through a single, integrated platform designed to reduce human cyber risk.',
						'akaza-adventure'
					); ?>
				</p>

				<a
					class="sl-content-btn sl-content-btn-primary"
					href="#contact"
				>
					<?php esc_html_e( 'Explore the Platform', 'akaza-adventure' ); ?>
				</a>

			</div>

		</div>

	</div>

</section>
