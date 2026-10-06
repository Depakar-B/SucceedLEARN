<?php
/**
 * ISAT AMP — Why information security awareness matters.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_image = succeedlearn_amp_get_isat_why_image();
?>
<section
	class="sl-isat-why"
	id="why-information-security-awareness-matters"
	aria-labelledby="sl-isat-why-title"
>
	<div class="sl-wrap">
		<div class="sl-isat-why__grid">
			<div class="sl-isat-why__media">
				<div class="sl-isat-why__image">
					<amp-img
						src="<?php echo esc_url( $why_image ); ?>"
						width="720"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Why information security awareness matters for employees', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>

			<div class="sl-isat-why__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'The Human Element', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-isat-why-title" class="sl-h2">
					<?php esc_html_e( 'Why Information Security Awareness', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Matters', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-isat-why__copy">
					<p>
						<?php esc_html_e( 'Technology alone cannot protect an organization from every cyber threat.', 'succeedlearn-amp' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Employees interact with organizational systems, emails, applications, devices, confidential information, and digital tools every day. A phishing email, weak password, unsafe download, incorrectly shared document, or compromised device can expose valuable information and create wider organizational risk.', 'succeedlearn-amp' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Information Security Awareness Training helps employees understand the role they play in protecting organizational information and equips them with practical knowledge to recognize and respond to common security threats.', 'succeedlearn-amp' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Rather than overwhelming employees with technical terminology, the course connects information security principles with situations they may encounter during everyday work.', 'succeedlearn-amp' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Employees learn not only what the risks are, but how to respond when those risks appear.', 'succeedlearn-amp' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
