<?php
/**
 * S-Sync — Why Integrations Matter.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-sync-why"
	aria-labelledby="sl-s-sync-why-title"
>
	<div class="container">

		<div class="sl-s-sync-why__grid">

			<div class="sl-s-sync-why__media">
				<div class="sl-s-sync-why__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

			<div class="sl-s-sync-why__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Connected Operations', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-sync-why-title">
					<?php esc_html_e( 'Why Integrations', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Matter', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-sync-why__copy">
					<p>
						<?php
						esc_html_e(
							'Security awareness programmes involve multiple stakeholders, systems, and processes. Without integration, administrators often spend valuable time manually creating user accounts, updating employee records, assigning training, and managing access across different platforms.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Sync simplifies these processes by enabling seamless connectivity between the SucceedLEARN platform and your existing technology ecosystem. Automated synchronisation ensures that user information remains up to date, new employees are onboarded efficiently, and learners can access training using their existing organisational credentials.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'By reducing manual administration and improving operational efficiency, organisations can focus on strengthening security awareness rather than managing technology.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
