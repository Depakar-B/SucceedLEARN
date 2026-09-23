<?php
/**
 * UK Cyber Essentials — See the Training in Action.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ukce_action_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp';
$ukce_action_local = WP_CONTENT_DIR . '/uploads/2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $ukce_action_local ) ) {
	$ukce_action_image = akaza_upload_url( '2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp' );
}
?>

<section
	class="sl-ukce-action"
	id="see-the-training-in-action"
	aria-labelledby="sl-ukce-action-title"
>
	<div class="container">

		<div class="sl-ukce-action__grid">

			<div class="sl-ukce-action__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'See the Training in Action', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-ukce-action-title">
					<?php esc_html_e( 'Practical Cybersecurity Awareness for', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Everyday Technology Use', 'akaza-adventure' ); ?></span>
				</h2>

				<p class="sl-ukce-action__lead">
					<?php esc_html_e( 'Cyber Essentials focuses on fundamental technical security controls. Employee awareness helps reinforce how those controls are supported through everyday use of accounts, devices, applications and remote-working environments.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Through practical examples and interactive learning, employees develop awareness around account protection, malware risks and secure remote-working behaviours.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Knowledge checks encourage learners to apply security principles to the technology decisions they make during everyday work.', 'akaza-adventure' ); ?>
				</p>

				<a class="sl-content-btn sl-content-btn-primary" href="#contact">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>

			</div>

			<div class="sl-ukce-action__media">
				<div class="sl-ukce-action__image">
					<img
						src="<?php echo esc_url( $ukce_action_image ); ?>"
						alt="<?php esc_attr_e( 'UK Cyber Essentials security awareness course screenshots', 'akaza-adventure' ); ?>"
						width="720"
						height="760"
						loading="lazy"
						decoding="async"
					/>
				</div>
			</div>

		</div>

	</div>
</section>
