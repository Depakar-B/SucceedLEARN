<?php
/**
 * Whistleblowing Training — About / Overview.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="overview"
	class="sl-whistleblowing-overview"
	aria-labelledby="sl-whistleblowing-overview-title"
>
	<div class="container">
		<div class="sl-whistleblowing-overview__grid">

			<div class="sl-whistleblowing-overview__intro">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Whistleblowing Training Explained', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-whistleblowing-overview-title">
					<?php esc_html_e( 'What Is Whistleblowing Training and Why Does It', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Matter?', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-whistleblowing-overview__content">
					<p>
						<?php esc_html_e( 'Whistleblowing training helps employees recognise potential wrongdoing, understand when a concern may need to be raised and follow the appropriate process for speaking up.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'In investment environments, concerns can arise around sensitive financial information, transaction activity, market conduct, conflicts of interest and regulatory obligations.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'SucceedLEARN brings these principles into a practical business context so learners can understand what to look for and how to respond appropriately.', 'akaza-adventure' ); ?>
					</p>
				</div>
			</div>

			<figure class="sl-whistleblowing-overview__media">
				<img
					src="<?php echo esc_url( 'https://succeedlearn.com/wp-content/uploads/2026/09/whistleblowing_course_look_in_practice_1.webp' ); ?>"
					alt="<?php esc_attr_e( 'Whistleblowing training explained for investment professionals', 'akaza-adventure' ); ?>"
					loading="lazy"
					decoding="async"
				>
			</figure>

		</div>
	</div>
</section>
