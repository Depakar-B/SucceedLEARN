<?php
/**
 * S-Sync AMP — Why Security Awareness Integrations Matter.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_image = function_exists( 'succeedlearn_amp_get_ssync_why_image' )
	? succeedlearn_amp_get_ssync_why_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/Why-Security-Awareness-Integrations-Matter.webp';
?>
<section class="sl-s-sync-why" aria-labelledby="sl-s-sync-why-title">
	<div class="sl-wrap">
		<div class="sl-s-sync-why__grid">
			<div class="sl-s-sync-why__media">
				<div class="sl-s-sync-why__image">
					<amp-img
						src="<?php echo esc_url( $why_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'Why Security Awareness Integrations Matter', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
			<div class="sl-s-sync-why__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Connected Operations', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-s-sync-why-title" class="sl-h2">
					<?php esc_html_e( 'Why Security Awareness', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Integrations Matter', 'succeedlearn-amp' ); ?></span>
				</h2>
				<div class="sl-s-sync-why__copy">
					<p><?php esc_html_e( 'Security awareness programmes involve multiple stakeholders, systems, and processes. Without integration, administrators often spend valuable time manually creating user accounts, updating employee records, assigning training, and managing access across different platforms.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'S-Sync helps organisations connect SucceedLEARN with existing enterprise systems so that identity, learner information and security-awareness administration can work more efficiently together.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'The result is less time spent managing disconnected systems and more time focused on the security-awareness programme itself.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
