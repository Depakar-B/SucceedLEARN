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

			<div class="sl-s-sync-connect__media">
				<div class="sl-s-sync-connect__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

			<div class="sl-s-sync-connect__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Simplify Deployment', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-sync-connect-title">
					<?php esc_html_e( 'Connect Your', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Security Awareness Programme', 'akaza-adventure' ); ?></span>
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
						<?php
						esc_html_e(
							'Discover how S-Sync can simplify deployment and integrate security awareness into your existing enterprise ecosystem.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

				<a class="sl-content-btn sl-content-btn-primary" href="#request-demo">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>

			</div>

		</div>

	</div>
</section>
