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
					<?php esc_html_e( 'Connect. Automate. Simplify your security awareness programme', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Security awareness programmes become harder to manage as organisations grow.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'New employees join. Existing employees change roles or locations. Others leave the organisation. Learning assignments need to remain accurate, access needs to be managed securely, and security awareness must fit within the technology environment employees already use.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'S-Sync is the enterprise integration layer of the SucceedLEARN Security Behaviour & Culture Suite (SBCS), helping organisations connect security awareness with their existing identity, HR, learning and workplace technology ecosystem.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Through capabilities such as Single Sign-On, automated user provisioning, HR-system synchronisation, LMS compatibility and API-based connectivity, S-Sync helps reduce manual administration and create a more connected learner experience.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<strong>
						<?php
						esc_html_e(
							'Connect your systems. Automate administration. Scale security awareness.',
							'akaza-adventure'
						);
						?>
					</strong>
				</p>

				<div class="sl-hero-actions sl-s-sync-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
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
