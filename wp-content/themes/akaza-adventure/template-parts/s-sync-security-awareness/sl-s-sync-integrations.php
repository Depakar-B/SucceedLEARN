<?php
/**
 * S-Sync — Enterprise Integration Capabilities.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$integrations = array(
	array(
		'title' => __( 'Single Sign-On (SSO)', 'akaza-adventure' ),
		'text'  => __( 'Provide employees with secure, seamless access using their existing organisational credentials. By eliminating the need for separate usernames and passwords, Single Sign-On can help create a more familiar learner experience while reducing unnecessary credential management.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Automated User Provisioning', 'akaza-adventure' ),
		'text'  => __( 'Automatically synchronise employee information between organisational systems and the SucceedLEARN platform. New users can be onboarded quickly, while role changes and employee exits are reflected without manual intervention.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'HR System Synchronisation', 'akaza-adventure' ),
		'text'  => __( 'Maintain accurate learner records by synchronising employee information such as departments, locations, reporting managers, and organisational hierarchy from your HR platform.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'LMS Compatibility', 'akaza-adventure' ),
		'text'  => __( 'Integrate SucceedLEARN content with existing Learning Management Systems through SCORM-compatible packages, allowing organisations to manage training within their preferred learning environment while maintaining a consistent learner experience.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Microsoft & Google Integration', 'akaza-adventure' ),
		'text'  => __( 'Enable seamless authentication and user management through widely adopted workplace platforms, simplifying deployment and reducing administrative overhead.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'API-Based Connectivity', 'akaza-adventure' ),
		'text'  => __( 'For organisations with unique business requirements, S-Sync supports API-based integration, allowing secure communication with internal systems and third-party applications.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-sync-integrations"
	aria-labelledby="sl-s-sync-integrations-title"
>
	<div class="container">

		<div class="sl-s-sync-integrations__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Enterprise Integrations', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-sync-integrations-title">
				<?php esc_html_e( 'Enterprise Integration', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'capabilities', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-s-sync-integrations__subtitle">
				<?php esc_html_e( 'Connect Security Awareness With Your Existing Technology Environment', 'akaza-adventure' ); ?>
			</h3>

			<p>
				<?php
				esc_html_e(
					'S-Sync is designed to fit naturally within your existing IT environment, helping organisations automate user management and streamline security awareness deployment.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-sync-integrations__grid">

			<?php foreach ( $integrations as $item ) : ?>

				<article class="sl-s-sync-integrations__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $item['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $item['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
