<?php
/**
 * Information Security Awareness Training - Why Information Security Awareness Matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$isat_why_file  = '2026/01/F-Information-Security-Awareness.webp';
$isat_why_image = 'https://succeedlearn.com/wp-content/uploads/' . $isat_why_file;
$isat_why_local = WP_CONTENT_DIR . '/uploads/' . $isat_why_file;

if ( function_exists( 'akaza_upload_url' ) && file_exists( $isat_why_local ) ) {
	$isat_why_image = akaza_upload_url( $isat_why_file );
}
?>

<section
	class="sl-isat-why"
	id="why-information-security-awareness-matters"
	aria-labelledby="sl-isat-why-title"
>
	<div class="container">

		<div class="sl-isat-why__grid">

			<div class="sl-isat-why__media">
				<div class="sl-isat-why__image">
					<img
						src="<?php echo esc_url( $isat_why_image ); ?>"
						alt="<?php esc_attr_e( 'Why information security awareness matters for employees', 'akaza-adventure' ); ?>"
						width="720"
						height="720"
						loading="lazy"
						decoding="async"
					/>
				</div>
			</div>

			<div class="sl-isat-why__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'The Human Element', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-isat-why-title">
					<?php esc_html_e( 'Why Information Security Awareness', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Matters', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-isat-why__copy">
					<p>
						<?php esc_html_e( 'Technology alone cannot protect an organization from every cyber threat.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Employees interact with organizational systems, emails, applications, devices, confidential information, and digital tools every day. A phishing email, weak password, unsafe download, incorrectly shared document, or compromised device can expose valuable information and create wider organizational risk.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Information Security Awareness Training helps employees understand the role they play in protecting organizational information and equips them with practical knowledge to recognize and respond to common security threats.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Rather than overwhelming employees with technical terminology, the course connects information security principles with situations they may encounter during everyday work.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Employees learn not only what the risks are, but how to respond when those risks appear.', 'akaza-adventure' ); ?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
