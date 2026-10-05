<?php
/**
 * S-Sync AMP — Connect SucceedLEARN with the systems you already use.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$system_groups = function_exists( 'succeedlearn_amp_get_ssync_system_groups' )
	? succeedlearn_amp_get_ssync_system_groups()
	: array();

if ( empty( $system_groups ) ) {
	return;
}
?>
<section class="sl-s-sync-systems" aria-labelledby="sl-s-sync-systems-title">
	<div class="sl-wrap">
		<div class="sl-s-sync-systems__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Connected Systems', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-sync-systems-title" class="sl-h2">
				<?php esc_html_e( 'Connect SucceedLEARN with the', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'systems you already use', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'S-Sync supports integrations across identity management, workplace authentication, HR and HCM systems, compliance platforms and other enterprise environments—helping organisations connect security awareness with their existing technology stack.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'From Single Sign-On and automated user provisioning to workforce synchronisation and compliance workflows, organisations can select the integrations that fit their existing infrastructure and deployment requirements.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-s-sync-systems__groups sl-amp-card-grid">
			<?php foreach ( $system_groups as $group ) : ?>
				<?php
				$logo_names = array();
				foreach ( $group['logos'] as $logo ) {
					if ( ! empty( $logo['name'] ) ) {
						$logo_names[] = $logo['name'];
					}
				}
				?>
				<article class="sl-s-sync-systems__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $group['title'] ); ?></h3>
					<p class="sl-s-sync-systems__lead"><?php echo esc_html( $group['lead'] ); ?></p>
					<p><?php echo esc_html( $group['text'] ); ?></p>
					<?php if ( ! empty( $logo_names ) ) : ?>
						<p class="sl-s-sync-systems__names"><?php echo esc_html( implode( ' · ', $logo_names ) ); ?></p>
					<?php endif; ?>
					<div class="sl-s-sync-systems__logos" role="list">
						<?php foreach ( $group['logos'] as $logo ) : ?>
							<?php
							$logo_path = function_exists( 'succeedlearn_amp_ssync_logo_path' )
								? succeedlearn_amp_ssync_logo_path( $logo )
								: '';
							$logo_url  = $logo_path ? succeedlearn_amp_upload_url( $logo_path ) : '';
							?>
							<div class="sl-s-sync-systems__logo" role="listitem">
								<?php if ( $logo_url ) : ?>
									<amp-img
										src="<?php echo esc_url( $logo_url ); ?>"
										width="120"
										height="48"
										layout="fixed"
										alt="<?php echo esc_attr( $logo['name'] ); ?>"
									></amp-img>
								<?php else : ?>
									<span class="sl-s-sync-systems__logo-label"><?php echo esc_html( $logo['name'] ); ?></span>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
