<?php
/**
 * BFSI & PE/VC — Built Around Financial-Services Scenarios.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$scenarios = array(
	__( 'Urgent payment instructions appearing to come from senior leadership.', 'akaza-adventure' ),
	__( 'Investor or executive impersonation through email, telephone or video.', 'akaza-adventure' ),
	__( 'Requests to share confidential information with external parties.', 'akaza-adventure' ),
	__( 'Suspicious vendor communications involving organisational or customer data.', 'akaza-adventure' ),
	__( 'Unusual internal activity that could indicate negligent, malicious or compromised behaviour.', 'akaza-adventure' ),
	__( 'AI-generated communications designed to make fraudulent instructions appear authentic.', 'akaza-adventure' ),
	__( 'Physical attempts to access restricted areas, devices or information.', 'akaza-adventure' ),
);
?>

<section
	class="sl-bfsi-scenarios"
	id="financial-services-scenarios"
	aria-labelledby="sl-bfsi-scenarios-title"
>
	<div class="container">

		<div class="sl-bfsi-scenarios__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Workplace Context', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-bfsi-scenarios-title">
				<?php esc_html_e( 'Built Around Financial-Services', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Scenarios', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Generic cybersecurity examples can be difficult for employees to connect with their own responsibilities.',
					'akaza-adventure'
				);
				?>
			</p>

			<p class="sl-bfsi-scenarios__lead">
				<?php
				esc_html_e(
					'This course places security awareness within situations relevant to BFSI and PE/VC environments, where employees may encounter:',
					'akaza-adventure'
				);
				?>
			</p>
		</div>

		<ul class="sl-bfsi-scenarios__list">
			<?php foreach ( $scenarios as $scenario ) : ?>
				<li><?php echo esc_html( $scenario ); ?></li>
			<?php endforeach; ?>
		</ul>

		<p class="sl-bfsi-scenarios__close">
			<?php
			esc_html_e(
				'The objective is to help employees move from simply knowing that cyber threats exist to understanding how to recognise, verify, report and respond to them.',
				'akaza-adventure'
			);
			?>
		</p>

	</div>
</section>
