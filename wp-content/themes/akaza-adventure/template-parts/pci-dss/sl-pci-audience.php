<?php
/**
 * PCI DSS — Who Should Take PCI DSS Training?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	array(
		'title'  => __( 'PCI DSS Employee Awareness Training', 'akaza-adventure' ),
		'lead'   => __( 'Suitable for employees who require foundational awareness of PCI DSS and payment-data security, including relevant:', 'akaza-adventure' ),
		'people' => array(
			__( 'Employees working within PCI DSS-scoped environments', 'akaza-adventure' ),
			__( 'Operational teams', 'akaza-adventure' ),
			__( 'Customer-support teams', 'akaza-adventure' ),
			__( 'Administrative employees', 'akaza-adventure' ),
			__( 'Managers and supervisors', 'akaza-adventure' ),
			__( 'Employees who may encounter payment or cardholder information', 'akaza-adventure' ),
		),
	),
	array(
		'title'  => __( 'Cashier & Payment Handler Training', 'akaza-adventure' ),
		'lead'   => __( 'Suitable for employees directly involved in accepting, processing or handling card payments, including:', 'akaza-adventure' ),
		'people' => array(
			__( 'Cashiers', 'akaza-adventure' ),
			__( 'Retail employees', 'akaza-adventure' ),
			__( 'Front-desk employees', 'akaza-adventure' ),
			__( 'Customer-service representatives processing payments', 'akaza-adventure' ),
			__( 'Telephone payment handlers', 'akaza-adventure' ),
			__( 'Hospitality employees', 'akaza-adventure' ),
			__( 'Payment operations teams', 'akaza-adventure' ),
			__( 'Supervisors responsible for payment-handling teams', 'akaza-adventure' ),
		),
	),
);
?>

<section
	class="sl-pci-audience"
	aria-labelledby="sl-pci-audience-title"
>
	<div class="container">

		<div class="sl-pci-audience__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Target Audience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-audience-title">
				<?php esc_html_e( 'Who Should Take', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'PCI DSS Training?', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-pci-audience__subtitle">
				<?php esc_html_e( 'Assign Awareness Based on Employee Responsibilities', 'akaza-adventure' ); ?>
			</h3>

		</div>

		<div class="sl-pci-audience__grid">

			<?php foreach ( $audiences as $audience ) : ?>

				<article class="sl-pci-audience__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $audience['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $audience['lead'] ); ?>
					</p>
					<ul class="sl-pci-audience__list">
						<?php foreach ( $audience['people'] as $person ) : ?>
							<li><?php echo esc_html( $person ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
