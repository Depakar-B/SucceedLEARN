<?php
/**
 * S-Sync AMP — Enterprise Integrations (consolidated systems + capabilities).
 *
 * Mirrors theme: template-parts/s-sync-security-awareness/sl-s-sync-integrations.php
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$integration_groups = function_exists( 'succeedlearn_amp_get_ssync_integration_groups' )
	? succeedlearn_amp_get_ssync_integration_groups()
	: array();

if ( empty( $integration_groups ) ) {
	return;
}
?>
<section class="sl-s-sync-integrations" id="enterprise-integrations" aria-labelledby="sl-s-sync-integrations-title">
	<div class="sl-wrap">
		<div class="sl-s-sync-integrations__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Enterprise Integrations', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-sync-integrations-title" class="sl-h2">
				<?php esc_html_e( 'Connect SucceedLEARN With the', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Systems You Already Use', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'S-Sync connects SucceedLEARN with your existing identity, workforce, learning and compliance ecosystem—helping organisations simplify authentication, automate user management, synchronise employee information and streamline security-awareness administration.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'From Single Sign-On and automated provisioning to HR system synchronisation and compliance automation, S-Sync helps security awareness work more efficiently within your existing technology environment.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-s-sync-integrations__groups sl-amp-card-grid">
			<?php foreach ( $integration_groups as $group ) : ?>
				<?php
				$logo_names  = array();
				$image_logos = array();
				foreach ( $group['logos'] as $logo ) {
					if ( ! empty( $logo['name'] ) ) {
						$logo_names[] = $logo['name'];
					}
					$logo_path = function_exists( 'succeedlearn_amp_ssync_logo_path' )
						? succeedlearn_amp_ssync_logo_path( $logo )
						: '';
					if ( $logo_path ) {
						$logo['src']   = succeedlearn_amp_upload_url( $logo_path );
						$image_logos[] = $logo;
					}
				}
				?>
				<article class="sl-s-sync-integrations__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $group['title'] ); ?></h3>
					<p class="sl-s-sync-integrations__lead"><?php echo esc_html( $group['lead'] ); ?></p>
					<p><?php echo esc_html( $group['text'] ); ?></p>
					<?php if ( ! empty( $group['supports'] ) ) : ?>
						<p class="sl-s-sync-integrations__supports"><?php echo esc_html( $group['supports'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $logo_names ) ) : ?>
						<p class="sl-s-sync-integrations__names"><?php echo esc_html( implode( ' · ', $logo_names ) ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $image_logos ) ) : ?>
						<div class="sl-s-sync-integrations__logos" role="list">
							<?php foreach ( $image_logos as $logo ) : ?>
								<div class="sl-s-sync-integrations__logo" role="listitem">
									<amp-img
										src="<?php echo esc_url( $logo['src'] ); ?>"
										width="120"
										height="48"
										layout="fixed"
										alt="<?php echo esc_attr( $logo['name'] ); ?>"
									></amp-img>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
