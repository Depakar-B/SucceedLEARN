<?php
/**
 * ISO 27001:2022 Staff Awareness Training - How S-Aware Supports ISO 27001:2022 Awareness.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$objective_rows = array(
	array(
		'area'    => __( 'Information Security Awareness', 'akaza-adventure' ),
		'support' => __( 'Introduces employees to information security and why organisational information needs protection.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Information Security Policy', 'akaza-adventure' ),
		'support' => __( 'Helps employees understand the importance of following organisational security policies and procedures.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'ISMS Awareness', 'akaza-adventure' ),
		'support' => __( 'Explains what an Information Security Management System is and how employees contribute to its effectiveness.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Confidentiality, Integrity & Availability', 'akaza-adventure' ),
		'support' => __( 'Makes the CIA principles understandable through practical workplace situations.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Roles & Responsibilities', 'akaza-adventure' ),
		'support' => __( 'Reinforces that information security is a shared organisational responsibility rather than solely an IT function.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Information Security Risks', 'akaza-adventure' ),
		'support' => __( 'Helps employees recognise behaviours and situations that can expose organisational information to risk.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Secure Information Handling', 'akaza-adventure' ),
		'support' => __( 'Reinforces appropriate handling and protection of organisational information and assets.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Security Incident Reporting', 'akaza-adventure' ),
		'support' => __( 'Helps employees recognise potential security incidents and understand the importance of prompt reporting.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Awareness, Education & Training', 'akaza-adventure' ),
		'support' => __( 'Supports organisation-wide awareness objectives associated with ISO 27001:2022 Annex A Control 6.3.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-iso27-objectives"
	id="how-s-aware-supports-iso-27001-awareness"
	aria-labelledby="sl-iso27-objectives-title"
>
	<div class="container">

		<div class="sl-iso27-objectives__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Awareness Alignment', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-iso27-objectives-title">
				<?php esc_html_e( 'How S-Aware Supports', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'ISO 27001:2022 Awareness', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-iso27-objectives__table-wrap">
			<table class="sl-iso27-objectives__table">
				<caption class="screen-reader-text">
					<?php esc_html_e( 'How the training supports ISO 27001:2022 employee awareness areas', 'akaza-adventure' ); ?>
				</caption>
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'ISO 27001:2022 Awareness Area', 'akaza-adventure' ); ?></th>
						<th scope="col"><?php esc_html_e( 'How the Training Supports Employees', 'akaza-adventure' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $objective_rows as $row ) : ?>
						<tr>
							<td>
								<span class="sl-iso27-objectives__cell sl-iso27-objectives__cell--strong">
									<?php echo esc_html( $row['area'] ); ?>
								</span>
							</td>
							<td>
								<span class="sl-iso27-objectives__cell">
									<?php echo esc_html( $row['support'] ); ?>
								</span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</section>
