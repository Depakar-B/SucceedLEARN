<?php
/**
 * ISO 27001:2022 Staff Awareness Training - Audience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_items = array(
	array(
		'title' => __( 'Employees Across Business Functions', 'akaza-adventure' ),
		'text'  => __( 'Employees across business functions who access organizational systems, information or assets.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Managers & Team Leaders', 'akaza-adventure' ),
		'text'  => __( 'Managers and team leaders responsible for reinforcing organizational policies and secure working practices.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Employees Handling Sensitive Information', 'akaza-adventure' ),
		'text'  => __( 'Employees handling sensitive information including business, customer, employee or other protected information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Remote & Hybrid Employees', 'akaza-adventure' ),
		'text'  => __( 'Remote and hybrid employees accessing organizational information outside traditional office environments.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'New Joiners & Contractors', 'akaza-adventure' ),
		'text'  => __( 'New joiners and contractors who require foundational awareness of the organization\'s information security expectations.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-iso27-audience"
	id="who-should-take-iso-27001-training"
	aria-labelledby="sl-iso27-audience-title"
>
	<div class="container">

		<div class="sl-iso27-audience__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Who It\'s For', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-iso27-audience-title">
				<?php esc_html_e( 'Designed for Employees', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Across the Organisation', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'ISO 27001 awareness should not be positioned as training only for cybersecurity or IT teams. This course is suitable for:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-iso27-audience__grid">
			<?php foreach ( $audience_items as $item ) : ?>
				<article class="sl-iso27-audience__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
