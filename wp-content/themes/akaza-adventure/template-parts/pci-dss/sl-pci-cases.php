<?php
/**
 * PCI DSS — Case Studies: Real Consequences of Non-Compliance.
 * Content retained from existing PCI DSS course page.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cases = array(
	array(
		'title' => __( 'Home Depot (2014 – Payment Card Breach)', 'akaza-adventure' ),
		'text'  => __( 'Home Depot suffered a breach affecting approximately 56 million payment card numbers after attackers exploited weaknesses in point-of-sale systems. Investigations highlighted inadequate controls and monitoring at the payment-handling level. The company paid over USD 200 million in settlements, remediation costs, and card-brand penalties - costs that PCI DSS-aligned employee practices are intended to mitigate.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'British Airways (2018 – Payment Data Compromise)', 'akaza-adventure' ),
		'text'  => __( 'British Airways was fined £20 million by the UK ICO (Information Commissioner’s Office) following a breach that exposed customer payment data. While GDPR was the enforcement mechanism, investigations highlighted weaknesses in payment data protection controls and monitoring - areas directly addressed through PCI DSS training and secure payment-handling practices.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-pci-cases"
	aria-labelledby="sl-pci-cases-title"
>
	<div class="container">

		<div class="sl-pci-cases__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Real-World Impact', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-cases-title">
				<?php esc_html_e( 'Case Studies: Real Consequences of', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Non-Compliance', 'akaza-adventure' ); ?></span>
			</h2>

			<div class="sl-pci-cases__copy">
				<p>
					<?php
					esc_html_e(
						'PCI DSS awareness training is mandatory for organisations that handle cardholder data. Under PCI DSS Requirement 12.6, organisations must provide security awareness training to personnel who process, store, or transmit cardholder data, ensuring employees understand payment-data risks and follow secure handling practices as part of ongoing PCI DSS compliance.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Below are real cases where organisations faced financial penalties, regulatory action, or severe business impact due to failures that PCI DSS training is specifically designed to help reduce the risk of:',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

		</div>

		<div class="sl-pci-cases__grid">

			<?php foreach ( $cases as $index => $case ) : ?>

				<article class="sl-pci-cases__card">
					<span class="sl-pci-cases__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<h3 class="sl-panel-title">
						<?php echo esc_html( $case['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $case['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
