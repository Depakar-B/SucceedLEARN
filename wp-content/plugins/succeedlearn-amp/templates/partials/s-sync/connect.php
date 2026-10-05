<?php
/**
 * S-Sync AMP — Meet S-Sync / The integration layer of SucceedLEARN SBCS.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$support_items = function_exists( 'succeedlearn_amp_get_ssync_connect_items' )
	? succeedlearn_amp_get_ssync_connect_items()
	: array();

$connect_image = function_exists( 'succeedlearn_amp_get_ssync_connect_image' )
	? succeedlearn_amp_get_ssync_connect_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/The-integration-layer-of-SucceedLEARN-SBCS.webp';
?>
<section class="sl-s-sync-connect" aria-labelledby="sl-s-sync-connect-title">
	<div class="sl-wrap">
		<div class="sl-s-sync-connect__grid">
			<div class="sl-s-sync-connect__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Meet S-Sync', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-s-sync-connect-title" class="sl-h2">
					<?php esc_html_e( 'The integration layer of', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'SucceedLEARN SBCS', 'succeedlearn-amp' ); ?></span>
				</h2>
				<div class="sl-s-sync-connect__copy">
					<p><?php esc_html_e( 'S-Sync connects the SucceedLEARN security awareness environment with the systems organisations already use to manage employees, identities and learning.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Instead of introducing security awareness as another disconnected platform, S-Sync helps organisations integrate relevant administrative and access processes into their existing technology environment.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( "Depending on the organisation's requirements and integration model, S-Sync can support:", 'succeedlearn-amp' ); ?></p>
					<?php if ( ! empty( $support_items ) ) : ?>
						<ul class="sl-s-sync-connect__list">
							<?php foreach ( $support_items as $item ) : ?>
								<li><?php echo esc_html( $item ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<p><?php esc_html_e( 'This helps create a more seamless experience for both administrators managing the programme and employees accessing security awareness learning.', 'succeedlearn-amp' ); ?></p>
					<p><strong><?php esc_html_e( 'One security-awareness ecosystem. Connected to the systems you already use.', 'succeedlearn-amp' ); ?></strong></p>
				</div>
			</div>
			<div class="sl-s-sync-connect__media">
				<div class="sl-s-sync-connect__image">
					<amp-img
						src="<?php echo esc_url( $connect_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'The integration layer of SucceedLEARN SBCS', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
