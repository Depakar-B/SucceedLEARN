<?php
/**
 * PCI DSS — Laws & Regulations Addressed in this Training.
 * Content retained from existing PCI DSS course page.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-pci-laws"
	aria-labelledby="sl-pci-laws-title"
>
	<div class="container">

		<div class="sl-pci-laws__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Regulatory Alignment', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-laws-title">
				<?php esc_html_e( 'Laws & Regulations Addressed in', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'this Training', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-pci-laws__table-wrap">
			<table class="sl-pci-laws__table">
				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'Legislation / Concept', 'akaza-adventure' ); ?>
						</th>
						<th scope="col">
							<?php esc_html_e( 'Relevance in the Course', 'akaza-adventure' ); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<span class="sl-pci-laws__cell sl-pci-laws__cell--highlight">
								<?php esc_html_e( 'Payment Card Industry Data Security Standard (PCI DSS v3.2)', 'akaza-adventure' ); ?>
							</span>
						</td>
						<td>
							<span class="sl-pci-laws__cell">
								<?php
								esc_html_e(
									'The course operationalizes PCI DSS requirements for employees who handle card payments by training them on secure handling of cardholder data, fraud prevention, access controls, social-engineering risks, and incident response (including Code-10 calls), enabling organisations to meet PCI DSS compliance obligations and reduce fraud, chargebacks, penalties, and data-breach risk.',
									'akaza-adventure'
								);
								?>
							</span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
</section>
