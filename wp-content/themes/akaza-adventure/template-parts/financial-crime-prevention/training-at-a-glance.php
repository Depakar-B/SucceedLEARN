<?php
/**
 * Financial Crime Prevention — Training at a glance section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$overview_rows = array(
	array(
		'label' => __( 'Learning Purpose', 'akaza-adventure' ),
		'value' => __( 'Help employees recognise risks, apply relevant controls and escalate concerns appropriately.', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Learning Approach', 'akaza-adventure' ),
		'value' => __( 'Scenario-based eLearning supported by knowledge checks and assessments.', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Suite Coverage', 'akaza-adventure' ),
		'value' => __( 'Eight compliance areas covering financial crime, ethical conduct and emerging workplace risks.', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Employee Application', 'akaza-adventure' ),
		'value' => __( 'Role-relevant decisions involving customers, transactions, third parties, information and technology.', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Delivery', 'akaza-adventure' ),
		'value' => __( 'Hosted learning platform or SCORM-compatible eLearning for an existing LMS.', 'akaza-adventure' ),
	),
	array(
		'label' => __( 'Customisation', 'akaza-adventure' ),
		'value' => __( 'Organisational terminology, policies, branding and reporting routes can be discussed for customisation.', 'akaza-adventure' ),
	),
);
?>
<section
	id="at-a-glance"
	class="sl-fcp-section sl-fcp-glance"
	aria-labelledby="sl-fcp-glance-title"
>
	<div class="container">

		<div class="sl-fcp-section-intro">
			<p class="sl-fcp-eyebrow">
				<?php esc_html_e( 'Learning Overview', 'akaza-adventure' ); ?>
			</p>

			<h2 id="sl-fcp-glance-title">
				<?php esc_html_e( 'Financial Crime Prevention Training at a Glance', 'akaza-adventure' ); ?>
			</h2>

			<p class="sl-fcp-lead">
				<?php esc_html_e( 'A quick overview of how the suite supports employee awareness and organisational learning.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-fcp-table-wrap">
			<table class="sl-fcp-table sl-fcp-table--summary">
				<tbody>
					<?php foreach ( $overview_rows as $row ) : ?>
						<tr>
							<th scope="row"><?php echo esc_html( $row['label'] ); ?></th>
							<td><?php echo esc_html( $row['value'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</section>
