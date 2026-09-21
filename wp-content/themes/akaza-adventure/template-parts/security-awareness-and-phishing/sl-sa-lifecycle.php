<?php
/**
 * Security Awareness — Employee Lifecycle
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_lifecycle_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Build-Security-Awareness-Around-the-Employee-Lifecycle.webp';
$sa_lifecycle_local = WP_CONTENT_DIR . '/uploads/2026/09/Build-Security-Awareness-Around-the-Employee-Lifecycle.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $sa_lifecycle_local ) ) {
	$sa_lifecycle_image = akaza_upload_url( '2026/09/Build-Security-Awareness-Around-the-Employee-Lifecycle.webp' );
}
?>

<section class="sl-sa-lifecycle" id="employee-lifecycle">
	<div class="container">

		<div class="sl-sa-lifecycle__layout">

			<div class="sl-sa-lifecycle__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'CONTINUOUS SECURITY AWARENESS', 'akaza-adventure' ); ?>
				</span>

				<h2>
					<?php esc_html_e( 'Build Security Awareness Around the', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Employee Lifecycle', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Cyber risk does not begin and end with annual compliance training. Employees encounter different risks depending on their roles, responsibilities, access levels and stage within the organisation.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'A continuous awareness programme can support employees throughout their journey: from initial onboarding and foundational learning to ongoing reinforcement, phishing simulations, refresher learning and targeted interventions.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'This allows organisations to deliver the right awareness experiences at the right moments while maintaining consistent security messaging across the workforce.', 'akaza-adventure' ); ?>
				</p>

			</div>

			<div class="sl-sa-lifecycle__media">
				<div class="sl-sa-lifecycle__image">
					<img
						src="<?php echo esc_url( $sa_lifecycle_image ); ?>"
						alt="<?php esc_attr_e( 'Build security awareness around the employee lifecycle', 'akaza-adventure' ); ?>"
						width="640"
						height="520"
						loading="lazy"
						decoding="async"
					/>
				</div>
			</div>

		</div>

	</div>
</section>
