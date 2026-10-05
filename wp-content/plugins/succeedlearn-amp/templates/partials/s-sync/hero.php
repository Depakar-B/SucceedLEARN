<?php
/**
 * S-Sync AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: succeedlearn_amp_get_ssync_page_title();

$hero_image = function_exists( 'succeedlearn_amp_get_ssync_hero_image' )
	? succeedlearn_amp_get_ssync_hero_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/Enterpise-Integrations-for-Security-Awareness.webp';
?>
<section class="sl-s-sync-hero" aria-labelledby="sl-s-sync-hero-title">
	<div class="sl-wrap">
		<?php
		if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
			succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
		}
		?>
		<div class="sl-s-sync-hero__grid">
			<div class="sl-s-sync-hero__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'S-Sync', 'succeedlearn-amp' ); ?></span>
				<h1 id="sl-s-sync-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
				<h2 class="sl-hero-h2 sl-s-sync-hero__subheading">
					<?php esc_html_e( 'Connect. Automate. Simplify your security awareness programme', 'succeedlearn-amp' ); ?>
				</h2>
				<p><?php esc_html_e( 'Security awareness programmes become harder to manage as organisations grow.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'New employees join. Existing employees change roles or locations. Others leave the organisation. Learning assignments need to remain accurate, access needs to be managed securely, and security awareness must fit within the technology environment employees already use.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'S-Sync is the enterprise integration layer of the SucceedLEARN Security Behaviour & Culture Suite (SBCS), helping organisations connect security awareness with their existing identity, HR, learning and workplace technology ecosystem.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Through capabilities such as Single Sign-On, automated user provisioning, HR-system synchronisation, LMS compatibility and API-based connectivity, S-Sync helps reduce manual administration and create a more connected learner experience.', 'succeedlearn-amp' ); ?></p>
				<p><strong><?php esc_html_e( 'Connect your systems. Automate administration. Scale security awareness.', 'succeedlearn-amp' ); ?></strong></p>
				<div class="sl-hero-actions sl-s-sync-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="hero-trial"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>
			<div class="sl-s-sync-hero__media">
				<div class="sl-s-sync-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'Enterprise Integrations for Security Awareness', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
