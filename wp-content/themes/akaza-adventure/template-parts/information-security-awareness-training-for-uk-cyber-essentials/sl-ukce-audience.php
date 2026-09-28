<?php
/**
 * UK Cyber Essentials — Who Should Take Training.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_items = array(
	array(
		'title' => __( 'Employees Across the Organization', 'akaza-adventure' ),
		'text'  => __( 'Build foundational awareness around secure account, device and system use.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'New Joiners', 'akaza-adventure' ),
		'text'  => __( 'Introduce employees to basic security expectations when they begin using organisational technology.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Remote & Hybrid Employees', 'akaza-adventure' ),
		'text'  => __( 'Reinforce security behaviors relevant to devices, networks and remote access.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Employees Using Cloud Services', 'akaza-adventure' ),
		'text'  => __( 'Build awareness around authentication, secure access and responsible use of organizational cloud platforms.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Managers & People Leaders', 'akaza-adventure' ),
		'text'  => __( 'Help leaders reinforce secure technology practices within their teams.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Contractors & Relevant Third Parties', 'akaza-adventure' ),
		'text'  => __( 'Extend appropriate security awareness to users with access to organizational devices or systems where relevant.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-ukce-audience"
	id="who-should-take-cyber-essentials-training"
	aria-labelledby="sl-ukce-audience-title"
>
	<div class="container">

		<div class="sl-ukce-audience__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Who It’s For', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ukce-audience-title">
				<?php esc_html_e( 'Who Should Take Cyber Essentials', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Awareness Training?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The training is suitable for employees and other users whose everyday actions interact with organizational technology and security controls.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-ukce-audience__grid">
			<?php foreach ( $audience_items as $item ) : ?>
				<article class="sl-ukce-audience__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
