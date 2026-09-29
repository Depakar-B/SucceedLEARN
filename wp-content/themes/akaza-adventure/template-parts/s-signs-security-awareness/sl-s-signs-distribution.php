<?php
/**
 * S-Signs — Build Visual Security Awareness Campaigns Throughout the Year.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$campaigns = array(
	array(
		'title' => __( 'Cybersecurity Awareness Month', 'akaza-adventure' ),
		'text'  => __( 'Create themed awareness campaigns around phishing, passwords, data security, remote working and other priority topics.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Phishing Reinforcement', 'akaza-adventure' ),
		'text'  => __( 'Follow a phishing simulation campaign with visual reminders about suspicious messages, links, verification and reporting.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Remote & Hybrid Working', 'akaza-adventure' ),
		'text'  => __( 'Reinforce safer behaviours around Wi-Fi, devices, information handling and remote access.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Emerging Threat Awareness', 'akaza-adventure' ),
		'text'  => __( 'Use relevant visual content to highlight new or evolving risks such as AI-enabled attacks.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Data Protection Campaigns', 'akaza-adventure' ),
		'text'  => __( 'Keep secure information handling, confidentiality and privacy responsibilities visible.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Security Incident Reporting', 'akaza-adventure' ),
		'text'  => __( 'Remind employees where and when suspicious activity should be reported.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'New Joiner Awareness', 'akaza-adventure' ),
		'text'  => __( 'Include security posters and digital reminders as part of the broader employee onboarding experience.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-signs-distribution"
	aria-labelledby="sl-s-signs-distribution-title"
>
	<div class="container">

		<div class="sl-s-signs-distribution__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Year-Round Campaigns', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-signs-distribution-title">
				<?php esc_html_e( 'Build Visual Security Awareness Campaigns', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Throughout the Year', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Signs can support both ongoing reinforcement and targeted cybersecurity campaigns.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php esc_html_e( 'Organisations can use visual awareness content for:', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-s-signs-distribution__cards">

			<?php foreach ( $campaigns as $campaign ) : ?>

				<article class="sl-s-signs-distribution__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $campaign['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $campaign['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
