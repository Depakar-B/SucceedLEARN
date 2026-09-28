<?php
/**
 * S-Sync — Connect Your Security Awareness Programme.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-sync-connect"
	aria-labelledby="sl-s-sync-connect-title"
>
	<div class="container">

		<div class="sl-s-sync-connect__grid">

			<div class="sl-s-sync-connect__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Get Started', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-sync-connect-title">
					<?php esc_html_e( 'Connect Your Security', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Awareness Programme', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-sync-connect__copy">
					<p>
						<?php
						esc_html_e(
							"The success of a security awareness programme depends not only on the quality of training but also on how easily it integrates with your organisation's existing technology landscape.",
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Sync enables organisations to automate user management, simplify administration, and create a seamless learning experience by connecting the SucceedLEARN platform with the systems employees and administrators already use every day.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<strong>
							<?php
							esc_html_e(
								'Discover how S-Sync can simplify deployment and integrate security awareness into your existing enterprise ecosystem.',
								'akaza-adventure'
							);
							?>
						</strong>
					</p>
				</div>

			</div>

			<div class="sl-s-sync-connect__media">
				<img
					class="sl-s-sync-connect__image"
					src="<?php echo esc_url( akaza_upload_url( '2026/09/The-integration-layer-of-SucceedLEARN-SBCS.webp' ) ); ?>"
					alt="<?php esc_attr_e( 'The integration layer of SucceedLEARN SBCS', 'akaza-adventure' ); ?>"
					width="800"
					height="600"
					loading="lazy"
					decoding="async"
				>
			</div>

		</div>

	</div>
</section>
