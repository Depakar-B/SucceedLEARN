<?php
/**
 * PCI DSS — Why Organisations Choose SucceedLEARN PCI DSS Training.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = array(
	array(
		'title' => __( 'Two Role-Relevant Learning Paths', 'akaza-adventure' ),
		'text'  => __( 'Provide foundational awareness and more specialised payment-handler training without treating every employee as having identical responsibilities.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Practical Employee Awareness', 'akaza-adventure' ),
		'text'  => __( 'Translate PCI DSS concepts into learning employees can understand in the context of their work.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Payment-Handler Specific Learning', 'akaza-adventure' ),
		'text'  => __( 'Addresses card-present and card-not-present transactions, social engineering, Code-10 calls and secure payment-handling practices.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Interactive Learning', 'akaza-adventure' ),
		'text'  => __( 'Use activities, scenarios and assessments to reinforce important concepts rather than relying exclusively on passive content.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Supports Security Awareness Objectives', 'akaza-adventure' ),
		'text'  => __( 'Help organisations provide structured awareness as part of their wider PCI DSS security-awareness programme.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Flexible Delivery', 'akaza-adventure' ),
		'text'  => __( 'Deploy training through the SucceedLEARN environment or applicable SCORM delivery options for organisations using their own LMS.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-pci-choose"
	aria-labelledby="sl-pci-choose-title"
>
	<div class="container">

		<div class="sl-pci-choose__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Business Value', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-choose-title">
				<?php esc_html_e( 'Why Organisations Choose SucceedLEARN', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'PCI DSS Training', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-pci-choose__grid">

			<?php foreach ( $reasons as $reason ) : ?>

				<article class="sl-pci-choose__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $reason['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $reason['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
