<?php
/**
 * SOC 2 Security Awareness — Who Should Take Training.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_items = array(
	array(
		'title' => __( 'Employees Across the Organization', 'akaza-adventure' ),
		'text'  => __( 'Build foundational information security awareness among users who access organizational systems and data.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'New Joiners', 'akaza-adventure' ),
		'text'  => __( 'Introduce security responsibilities and expected behaviors during onboarding.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Remote & Hybrid Employees', 'akaza-adventure' ),
		'text'  => __( 'Address risks associated with accessing organizational resources outside controlled office environments.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Employees Handling Sensitive Data', 'akaza-adventure' ),
		'text'  => __( 'Reinforce secure classification, handling and sharing of sensitive organizational information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Employees Working with Vendors', 'akaza-adventure' ),
		'text'  => __( 'Build awareness around third-party relationships and secure information sharing.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Managers & People Leaders', 'akaza-adventure' ),
		'text'  => __( 'Help leaders understand the security behaviors expected within their teams.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Contractors & Relevant Third Parties', 'akaza-adventure' ),
		'text'  => __( 'Extend appropriate awareness to other users with access to organizational systems or information where applicable.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-soc2-audience"
	id="who-should-take-soc2-training"
	aria-labelledby="sl-soc2-audience-title"
>
	<div class="container">

		<div class="sl-soc2-audience__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Who It’s For', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-soc2-audience-title">
				<?php esc_html_e( 'Who Should Take SOC 2', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Awareness Training?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The programme is suitable for employees and other users who interact with organizational systems, information, or services that form part of the organization\'s security environment.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-soc2-audience__grid">
			<?php foreach ( $audience_items as $item ) : ?>
				<article class="sl-soc2-audience__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
