<?php
/**
 * S-Sync — Why Organisations Choose S-Sync.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = array(
	array(
		'title' => __( 'Simplified User Management', 'akaza-adventure' ),
		'text'  => __( 'Reduce manual administration by automatically synchronising employee information across connected systems.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Faster Programme Deployment', 'akaza-adventure' ),
		'text'  => __( 'Accelerate onboarding and training assignments through automated provisioning and integrated workflows.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Improved Learner Experience', 'akaza-adventure' ),
		'text'  => __( 'Allow employees to access training using familiar organisational credentials through Single Sign-On.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Accurate Data Synchronisation', 'akaza-adventure' ),
		'text'  => __( 'Ensure learner information remains consistent across organisational systems, reducing errors caused by manual updates.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Enterprise Scalability', 'akaza-adventure' ),
		'text'  => __( 'Support growing organisations by integrating with existing enterprise infrastructure without increasing administrative complexity.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Flexible Integration Options', 'akaza-adventure' ),
		'text'  => __( 'Choose the integration approach that best fits your organisation, whether through SSO, SCORM, HRMS synchronisation, or APIs.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-sync-choose"
	aria-labelledby="sl-s-sync-choose-title"
>
	<div class="container">

		<div class="sl-s-sync-choose__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why Choose S-Sync', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-sync-choose-title">
				<?php esc_html_e( 'Why Organisations Choose', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'S-Sync', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-s-sync-choose__grid">

			<?php foreach ( $reasons as $reason ) : ?>

				<article class="sl-s-sync-choose__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $reason['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $reason['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
