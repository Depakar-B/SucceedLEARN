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
				<img
					class="sl-s-sync-why__image"
					src="<?php echo esc_url( akaza_upload_url( '2026/09/Why-Security-Awareness-Integrations-Matter.webp' ) ); ?>"
					alt="<?php esc_attr_e( 'Why Integrations Matter', 'akaza-adventure' ); ?>"
					width="800"
					height="600"
					loading="lazy"
					decoding="async"
				>
			</div>

			<div class="sl-s-sync-why__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Connected Operations', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-sync-why-title">
					<?php esc_html_e( 'Why', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Integrations Matter', 'akaza-adventure' ); ?></span>
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
							'S-Sync helps organisations connect SucceedLEARN with existing enterprise systems so that identity, learner information and security-awareness administration can work more efficiently together.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'The result is less time spent managing disconnected systems and more time focused on the security-awareness programme itself.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
