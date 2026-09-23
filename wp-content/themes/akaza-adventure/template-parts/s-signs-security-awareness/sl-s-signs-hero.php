<?php
/**
 * S-Signs — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-signs-hero"
	aria-labelledby="sl-s-signs-hero-title"
>
	<div class="container">

		<div class="sl-s-signs-hero__grid">

			<div class="sl-s-signs-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'S-Signs', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-s-signs-hero-title">
					<?php esc_html_e( 'Visual Security Awareness Posters & Digital Nudges', 'akaza-adventure' ); ?>
				</h1>

				<h2 class="sl-hero-h2">
					<?php esc_html_e( 'Keep Cybersecurity Visible. Reinforce Secure Behaviour Every Day', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Security awareness is most effective when important messages remain visible long after formal training ends.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Employees make security-related decisions throughout their working day — opening emails, handling information, using devices, working remotely, interacting with systems and responding to suspicious activity.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'S-Signs is the visual reinforcement solution within the SucceedLEARN Security Behaviour & Culture Suite, providing organisations with a growing library of professionally designed cybersecurity awareness posters, digital security reminders and behavioural nudges.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'From phishing and password security to remote working, AI security and mobile-device safety, S-Signs helps organisations keep cybersecurity visible across offices, hybrid workplaces and remote teams through clear, memorable visual communication.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'See It. Remember It. Act Securely.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-hero-actions sl-s-signs-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>

			<div class="sl-s-signs-hero__media">
				<div class="sl-s-signs-hero__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
