<?php
/**
 * PCI DSS — What Will Employees Learn?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$outcomes = array(
	array(
		'title' => __( 'Understand PCI DSS Goals', 'akaza-adventure' ),
		'text'  => __( 'Explain the six PCI DSS goals and understand how they contribute to protecting cardholder information and maintaining secure payment environments.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Handle Cardholder Information Securely', 'akaza-adventure' ),
		'text'  => __( 'Identify sensitive cardholder information and understand appropriate practices when accessing, processing, or handling payment data.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Recognize Payment Fraud', 'akaza-adventure' ),
		'text'  => __( 'Identify warning signs associated with potentially fraudulent card-present and card-not-present transactions and understand the importance of following established payment-verification procedures.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Recognize Social Engineering', 'akaza-adventure' ),
		'text'  => __( 'Understand common social-engineering techniques including phishing, pretexting, baiting, and tailgating, and how these techniques can be used to compromise payment information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Respond to Suspicious Transactions', 'akaza-adventure' ),
		'text'  => __( 'Understand when and how Code-10 authorization calls may be used when card fraud is suspected.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Apply Secure Payment Practices', 'akaza-adventure' ),
		'text'  => __( 'Recognize practical do\'s and don\'ts for protecting cardholder information during everyday payment-handling activities.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-pci-learn"
	aria-labelledby="sl-pci-learn-title"
>
	<div class="container">

		<div class="sl-pci-learn__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-learn-title">
				<?php esc_html_e( 'What Will Employees', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Learn?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'By the end of the PCI DSS Cashier and Payments Handler Compliance eLearning Training, learners will be able to:',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-pci-learn__grid">

			<?php foreach ( $outcomes as $outcome ) : ?>

				<article class="sl-pci-learn__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $outcome['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $outcome['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
