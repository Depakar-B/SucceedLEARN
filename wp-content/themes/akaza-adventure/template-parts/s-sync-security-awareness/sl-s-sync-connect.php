<?php
/**
 * S-Sync — Meet S-Sync / The integration layer of SucceedLEARN SBCS.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$support_items = array(
	__( 'Secure user authentication', 'akaza-adventure' ),
	__( 'Automated user provisioning', 'akaza-adventure' ),
	__( 'Employee-data synchronisation', 'akaza-adventure' ),
	__( 'HR-system connectivity', 'akaza-adventure' ),
	__( 'LMS-based learning deployment', 'akaza-adventure' ),
	__( 'Microsoft and Google ecosystem integration', 'akaza-adventure' ),
	__( 'API-based connectivity', 'akaza-adventure' ),
);
?>

<section
	class="sl-s-sync-connect"
	aria-labelledby="sl-s-sync-connect-title"
>
	<div class="container">

		<div class="sl-s-sync-connect__grid">

			<div class="sl-s-sync-connect__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Meet S-Sync', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-sync-connect-title">
					<?php esc_html_e( 'The integration layer of', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'SucceedLEARN SBCS', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-sync-connect__copy">
					<p>
						<?php
						esc_html_e(
							'S-Sync connects the SucceedLEARN security awareness environment with the systems organisations already use to manage employees, identities and learning.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Instead of introducing security awareness as another disconnected platform, S-Sync helps organisations integrate relevant administrative and access processes into their existing technology environment.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							"Depending on the organisation's requirements and integration model, S-Sync can support:",
							'akaza-adventure'
						);
						?>
					</p>

					<ul class="sl-s-sync-connect__list">
						<?php foreach ( $support_items as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>

					<p>
						<?php
						esc_html_e(
							'This helps create a more seamless experience for both administrators managing the programme and employees accessing security awareness learning.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'One security-awareness ecosystem. Connected to the systems you already use.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

			<div class="sl-s-sync-connect__media">
				<div class="sl-s-sync-connect__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
