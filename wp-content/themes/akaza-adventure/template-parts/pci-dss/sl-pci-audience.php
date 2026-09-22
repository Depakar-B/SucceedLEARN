<?php
/**
 * PCI DSS — Who Should Take PCI DSS Compliance Training?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	array(
		'title' => __( 'Cashiers & Frontline Employees', 'akaza-adventure' ),
		'text'  => __( 'Employees responsible for processing card-present transactions and interacting directly with customers at the point of payment.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Card-Not-Present Payment Handlers', 'akaza-adventure' ),
		'text'  => __( 'Employees processing payments through phone, email, online, or other card-not-present channels.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Retail, Hospitality & Service Employees', 'akaza-adventure' ),
		'text'  => __( 'Employees with access to PoS systems or responsibilities involving customer payment processing.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Payment Handlers', 'akaza-adventure' ),
		'text'  => __( 'Employees responsible for verifying payment cards, processing transactions, recognizing suspicious activity, and following payment-security procedures.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Employees with Access to Cardholder Data', 'akaza-adventure' ),
		'text'  => __( 'Employees authorized to store, access, manage, or otherwise handle cardholder information and transaction receipts.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Supervisors & Managers', 'akaza-adventure' ),
		'text'  => __( 'Employees responsible for overseeing payment operations, supporting frontline payment handlers, and managing escalation procedures such as Code-10 calls.', 'akaza-adventure' ),
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
				<?php esc_html_e( 'Who Should Take PCI DSS', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Compliance Training?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The course is designed for employees who handle card payments, cardholder information, payment systems, or related transaction data as part of their role.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-pci-audience__grid">

			<?php foreach ( $audiences as $audience ) : ?>

				<article class="sl-pci-audience__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $audience['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $audience['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
