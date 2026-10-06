<?php
/**
 * Information Security Awareness Training - Audience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_items = array(
	array(
		'title' => __( 'Employees Across Functions', 'akaza-adventure' ),
		'text'  => __( 'Build foundational information security awareness among employees across departments and job roles.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Employees Handling Sensitive Information', 'akaza-adventure' ),
		'text'  => __( 'Support employees who work with confidential, restricted, personal, or intellectual property information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Managers & Senior Leaders', 'akaza-adventure' ),
		'text'  => __( 'Build awareness among employees who may be more frequently targeted through impersonation, social engineering, or targeted phishing attacks.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Remote & Hybrid Employees', 'akaza-adventure' ),
		'text'  => __( 'Reinforce security awareness for employees accessing organisational systems from home, public networks, or distributed working environments.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'New Joiners', 'akaza-adventure' ),
		'text'  => __( 'Introduce essential information security principles as part of employee onboarding and establish secure behaviours from the beginning.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-isat-audience"
	id="who-should-take-information-security-awareness-training"
	aria-labelledby="sl-isat-audience-title"
>
	<div class="container">

		<div class="sl-isat-audience__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Who It\'s For', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-isat-audience-title">
				<?php esc_html_e( 'Built for Employees Across', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'the Organization', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Information security is not only the responsibility of IT or cybersecurity teams.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'The course is designed for employees who interact with organizational systems, information, devices, and digital communication as part of their everyday work.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-isat-audience__grid">
			<?php foreach ( $audience_items as $item ) : ?>
				<article class="sl-isat-audience__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
