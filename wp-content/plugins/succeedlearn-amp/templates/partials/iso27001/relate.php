<?php
/**
 * ISO 27001 AMP — Standard context + awareness supports table.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$objective_rows = succeedlearn_amp_get_iso27001_objective_rows();
?>
<section
	class="sl-iso27-relate"
	id="iso-27001-and-employee-security-awareness"
	aria-labelledby="sl-iso27-relate-title"
>
	<div class="sl-wrap">
		<div class="sl-iso27-relate__panel">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Standard Context', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-iso27-relate-title" class="sl-h2">
				<?php esc_html_e( 'ISO 27001:2022 and', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Employee Security Awareness', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'ISO 27001:2022 does not prescribe one universal employee training course or a fixed list of cybersecurity topics that every organisation must teach.', 'succeedlearn-amp' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Instead, organisations need to ensure that relevant personnel are appropriately aware of information security requirements and their responsibilities. Awareness and training should therefore reflect the organisation\'s policies, risks, roles and ISMS requirements. Annex A 6.3 specifically addresses information security awareness, education and training.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-iso27-relate__supports">
			<h3 id="how-s-aware-supports-iso-27001-awareness">
				<?php esc_html_e( 'How S-Aware Supports', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'ISO 27001:2022 Awareness', 'succeedlearn-amp' ); ?></span>
			</h3>

			<div class="sl-iso27-objectives__table-wrap">
				<table class="sl-iso27-objectives__table">
					<caption class="sl-iso27-objectives__caption screen-reader-text">
						<?php esc_html_e( 'How the training supports ISO 27001:2022 employee awareness areas', 'succeedlearn-amp' ); ?>
					</caption>
					<thead>
						<tr>
							<th scope="col"><?php esc_html_e( 'ISO 27001:2022 Awareness Area', 'succeedlearn-amp' ); ?></th>
							<th scope="col"><?php esc_html_e( 'How the Training Supports Employees', 'succeedlearn-amp' ); ?></th>
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
	</div>
</section>
