<?php
/**
 * PCI DSS — Two Training Modules.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = array(
	array(
		'title'    => __( 'PCI DSS Employee Awareness Training', 'akaza-adventure' ),
		'tagline'  => __( 'Foundational PCI DSS awareness for employees', 'akaza-adventure' ),
		'intro'    => __( 'This module introduces employees to PCI DSS and helps them understand the importance of protecting cardholder and sensitive authentication data.', 'akaza-adventure' ),
		'learn'    => __( 'Employees learn about:', 'akaza-adventure' ),
		'topics'   => array(
			__( 'What PCI DSS is', 'akaza-adventure' ),
			__( 'Who PCI DSS applies to', 'akaza-adventure' ),
			__( 'The history and purpose of PCI DSS', 'akaza-adventure' ),
			__( 'Cardholder Data (CHD)', 'akaza-adventure' ),
			__( 'Sensitive Authentication Data (SAD)', 'akaza-adventure' ),
			__( 'Organisational responsibilities around PCI DSS', 'akaza-adventure' ),
			__( 'PCI DSS goals', 'akaza-adventure' ),
			__( 'PCI DSS requirements and their implementation', 'akaza-adventure' ),
			__( 'PCI data-storage guidelines', 'akaza-adventure' ),
			__( 'Secure and insecure behaviours through interactive activities', 'akaza-adventure' ),
		),
		'meta'     => array(
			__( 'Duration: 20 minutes', 'akaza-adventure' ),
			__( 'Best suited for: Employees requiring general PCI DSS and payment-data awareness.', 'akaza-adventure' ),
		),
	),
	array(
		'title'    => __( 'PCI DSS Training for Cashiers & Payment Handlers', 'akaza-adventure' ),
		'tagline'  => __( 'Practical payment-security awareness for employees handling card transactions', 'akaza-adventure' ),
		'intro'    => __( 'This module focuses on the responsibilities and risks employees encounter when directly processing or handling customer payments.', 'akaza-adventure' ),
		'learn'    => __( 'Employees learn about:', 'akaza-adventure' ),
		'topics'   => array(
			__( 'PCI DSS goals and guidelines', 'akaza-adventure' ),
			__( 'Responsibilities of customer payment handlers', 'akaza-adventure' ),
			__( 'Important PCI DSS definitions', 'akaza-adventure' ),
			__( 'Card-present transactions', 'akaza-adventure' ),
			__( 'Card-not-present transactions', 'akaza-adventure' ),
			__( 'PCI DSS requirements', 'akaza-adventure' ),
			__( 'Social-engineering risks', 'akaza-adventure' ),
			__( 'Phishing', 'akaza-adventure' ),
			__( 'Pretexting', 'akaza-adventure' ),
			__( 'Baiting', 'akaza-adventure' ),
			__( 'Tailgating', 'akaza-adventure' ),
			__( 'Code-10 calls', 'akaza-adventure' ),
			__( 'Payment-security do\'s and don\'ts', 'akaza-adventure' ),
		),
		'meta'     => array(
			__( 'Best suited for: Cashiers, payment handlers and employees directly involved in processing card transactions.', 'akaza-adventure' ),
		),
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
				<?php esc_html_e( 'Two Learning Paths', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-learn-title">
				<?php esc_html_e( 'Two PCI DSS Training Modules.', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'One Awareness Programme.', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-pci-learn__subtitle">
				<?php esc_html_e( 'Choose Training Based on Employee Responsibility', 'akaza-adventure' ); ?>
			</h3>

			<p>
				<?php
				esc_html_e(
					'Rather than providing every employee with identical training, organizations can assign learning based on how employees interact with payment information and the cardholder data environment.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-pci-learn__grid">

			<?php foreach ( $modules as $module ) : ?>

				<article class="sl-pci-learn__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $module['title'] ); ?>
					</h3>
					<p class="sl-pci-learn__tagline">
						<?php echo esc_html( $module['tagline'] ); ?>
					</p>
					<p>
						<?php echo esc_html( $module['intro'] ); ?>
					</p>
					<p>
						<strong><?php echo esc_html( $module['learn'] ); ?></strong>
					</p>
					<ul class="sl-pci-learn__list">
						<?php foreach ( $module['topics'] as $topic ) : ?>
							<li><?php echo esc_html( $topic ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php foreach ( $module['meta'] as $meta_line ) : ?>
						<p class="sl-pci-learn__meta">
							<?php echo esc_html( $meta_line ); ?>
						</p>
					<?php endforeach; ?>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
