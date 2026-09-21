<?php
/**
 * Security Awareness AMP — Platform overview section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$platform_image = function_exists( 'succeedlearn_amp_get_sa_platform_image' )
	? succeedlearn_amp_get_sa_platform_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp';
?>
<section class="sl-sa-platform" id="security-awareness-suite" aria-labelledby="sl-sa-platform-title">
	<div class="sl-wrap">
		<div class="sl-sa-platform__grid">
			<div class="sl-sa-platform__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Security Behaviour Platform', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-sa-platform-title">
					<?php esc_html_e( 'One Platform.', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Continuous Security Behaviour Change.', 'succeedlearn-amp' ); ?></span>
				</h2>
				<p class="sl-sa-platform__lead"><?php esc_html_e( 'Annual awareness training alone is no longer enough to address today’s evolving cyber threats. Employees require continuous reinforcement, practical learning experiences, phishing simulations and real-time behavioural insights to develop lasting secure habits.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'The SucceedLEARN Security Behaviour & Culture Suite brings together everything organisations need from foundational awareness courses and Continuous learning to phishing simulations, gamification and analytics, through a single, integrated platform designed to reduce human cyber risk.', 'succeedlearn-amp' ); ?></p>
				<p class="sl-sa-platform__actions">
					<button type="button" class="sl-content-btn sl-content-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Explore the Platform', 'succeedlearn-amp' ); ?></button>
				</p>
			</div>
			<div class="sl-sa-platform__media">
				<div class="sl-sa-platform__image">
					<amp-img
						src="<?php echo esc_url( $platform_image ); ?>"
						width="720"
						height="760"
						layout="responsive"
						alt="<?php esc_attr_e( 'SucceedLEARN Security Behaviour Culture Suite platform', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
