<?php
/**
 * S-Sync — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-sync-hero"
	aria-labelledby="sl-s-sync-hero-title"
>
	<div class="container">

		<div class="sl-s-sync-hero__grid">

			<div class="sl-s-sync-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'S-Sync', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-s-sync-hero-title">
					<?php esc_html_e( 'Enterprise Integrations for Security Awareness & Compliance Training', 'akaza-adventure' ); ?>
				</h1>

				<h2 class="sl-hero-h2">
					<?php esc_html_e( 'Connect. Automate. Simplify.', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Deploying a security awareness programme should not require manual user management or disconnected systems. As organisations grow, managing employees, synchronising user data, and integrating learning platforms with existing IT infrastructure becomes increasingly important for maintaining efficiency and ensuring a seamless learner experience.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'S-Sync is the integration layer of the SucceedLEARN Security Behaviour & Culture Suite, enabling organisations to connect their existing identity providers, HR systems, Learning Management Systems (LMS), and productivity platforms with ease. By automating user provisioning, authentication, and data synchronisation, S-Sync helps organisations reduce administrative effort, improve data accuracy, and deliver a connected security awareness experience.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-hero-actions sl-s-sync-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>

			<div class="sl-s-sync-hero__media">
				<div class="sl-s-sync-hero__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
