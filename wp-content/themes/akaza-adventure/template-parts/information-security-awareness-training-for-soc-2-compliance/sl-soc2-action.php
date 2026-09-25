<?php
/**
 * SOC 2 Security Awareness — See the Training in Action.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
<<<<<<< HEAD
=======

$soc2_action_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp';
$soc2_action_local = WP_CONTENT_DIR . '/uploads/2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $soc2_action_local ) ) {
	$soc2_action_image = akaza_upload_url( '2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp' );
}
>>>>>>> origin/master
?>

<section
	class="sl-soc2-action"
	id="see-the-training-in-action"
	aria-labelledby="sl-soc2-action-title"
>
	<div class="container">

		<div class="sl-soc2-action__grid">

			<div class="sl-soc2-action__content">

				<span class="sl-home-sub-heading">
<<<<<<< HEAD
					<?php esc_html_e( 'Course Screenshots', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-soc2-action-title">
					<?php esc_html_e( 'See the Training', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'in Action', 'akaza-adventure' ); ?></span>
				</h2>

				<h3 class="sl-soc2-action__subtitle">
					<?php esc_html_e( 'Practical Security Awareness for Everyday Workplace Risks', 'akaza-adventure' ); ?>
				</h3>

=======
					<?php esc_html_e( 'See the Training in Action', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-soc2-action-title">
					<?php esc_html_e( 'Practical Security Awareness for', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Everyday Workplace Risks', 'akaza-adventure' ); ?></span>
				</h2>

>>>>>>> origin/master
				<p class="sl-soc2-action__lead">
					<?php esc_html_e( 'Information security becomes easier to understand when employees can see how threats and secure behaviors appear in realistic situations.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Throughout the programme, learners encounter visual explanations, practical examples and interactive learning across account security, sensitive data handling, malware, physical security, remote working, social engineering, third-party risks, insider threats and incident reporting.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Knowledge checks help employees apply security concepts to everyday workplace decisions rather than simply memorising cybersecurity terminology.', 'akaza-adventure' ); ?>
				</p>

				<a class="sl-content-btn sl-content-btn-primary" href="#contact">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>

			</div>

			<div class="sl-soc2-action__media">
<<<<<<< HEAD
				<div class="sl-soc2-action__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder — Course Screenshots', 'akaza-adventure' ); ?></span>
=======
				<div class="sl-soc2-action__image">
					<img
						src="<?php echo esc_url( $soc2_action_image ); ?>"
						alt="<?php esc_attr_e( 'SOC 2 security awareness course screenshots', 'akaza-adventure' ); ?>"
						width="720"
						height="760"
						loading="lazy"
						decoding="async"
					/>
>>>>>>> origin/master
				</div>
			</div>

		</div>

	</div>
</section>
