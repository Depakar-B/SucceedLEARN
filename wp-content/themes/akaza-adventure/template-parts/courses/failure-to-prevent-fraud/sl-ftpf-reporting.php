<?php
/**
 * Failure to Prevent Fraud — Reporting routes.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$routes = array(
	array(
		'title' => __( 'Line manager', 'akaza-adventure' ),
		'text'  => __( 'Raise a concern through the appropriate management route.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Compliance or Legal', 'akaza-adventure' ),
		'text'  => __( 'Seek guidance where something may involve fraud, misconduct or an internal-control concern.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Speak-up or whistleblowing channel', 'akaza-adventure' ),
		'text'  => __( "Use the organisation's established reporting process where appropriate.", 'akaza-adventure' ),
	),
);
?>

<section id="reporting" class="ftpf-section ftpf-section--grey ftpf-reporting" aria-labelledby="ftpf-reporting-title">
	<div class="ftpf-container ftpf-reporting__grid">

		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Reporting', 'akaza-adventure' ); ?></span>
			<h2 id="ftpf-reporting-title">
				<?php esc_html_e( 'A concern does not need to be', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'proven fraud before it is raised', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'The course reinforces prompt escalation where behaviour may involve fraud, misconduct or a breach of internal controls.', 'akaza-adventure' ); ?></p>
			<p><?php esc_html_e( 'Early reporting gives the organisation an opportunity to understand the issue, investigate where necessary and take appropriate action.', 'akaza-adventure' ); ?></p>
		</div>

		<div class="ftpf-reporting__routes">
			<?php foreach ( $routes as $index => $route ) : ?>
				<div class="ftpf-reporting__route">
					<span class="ftpf-reporting__number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<p>
						<strong><?php echo esc_html( $route['title'] ); ?></strong>
						<?php echo esc_html( $route['text'] ); ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
