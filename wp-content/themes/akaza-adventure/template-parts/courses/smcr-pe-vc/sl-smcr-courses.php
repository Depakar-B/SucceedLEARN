<?php
/**
 * SMCR Training for PE & VC Firms — Role-Based Learning.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="courses"
	class="sl-smcr-courses"
	aria-labelledby="sl-smcr-courses-title"
>
	<div class="container">

		<div class="sl-smcr-courses__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Role-Based Learning', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-smcr-courses-title">
				<?php esc_html_e( 'UK SMCR Training Courses for Employees and Senior Managers', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Built Around Their Roles', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e(
					"Choose learning that reflects the learner's responsibilities rather than using the same content for every role.",
					'akaza-adventure'
				); ?>
			</p>

		</div>

		<div class="sl-smcr-courses__table-wrap">

			<table class="sl-smcr-courses__table">
				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'Employees Course', 'akaza-adventure' ); ?>
						</th>

						<th scope="col">
							<?php esc_html_e( 'Senior Managers Course', 'akaza-adventure' ); ?>
						</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>
							<h3 class="sl-panel-title">
								<?php esc_html_e( 'SMCR Training for Employees', 'akaza-adventure' ); ?>
							</h3>

							<p>
								<?php esc_html_e(
									'Build practical understanding of the SMCR framework and the six Individual Conduct Rules through situations relevant to PE and VC employees.',
									'akaza-adventure'
								); ?>
							</p>

							<ul class="sl-smcr-courses__list">
								<li><?php esc_html_e( 'SMCR structure and employee categories', 'akaza-adventure' ); ?></li>
								<li><?php esc_html_e( 'Six Individual Conduct Rules', 'akaza-adventure' ); ?></li>
								<li><?php esc_html_e( 'PE/VC-relevant workplace scenarios', 'akaza-adventure' ); ?></li>
								<li><?php esc_html_e( 'Annual attestation', 'akaza-adventure' ); ?></li>
								<li><?php esc_html_e( 'Reporting and escalation', 'akaza-adventure' ); ?></li>
								<li><?php esc_html_e( 'Scenario-based assessment', 'akaza-adventure' ); ?></li>
							</ul>
						</td>

						<td>
							<h3 class="sl-panel-title">
								<?php esc_html_e( 'SMCR Training for Senior Managers', 'akaza-adventure' ); ?>
							</h3>

							<p>
								<?php esc_html_e(
									'Develop understanding of Senior Manager accountability, reasonable steps, delegation, oversight, documentation and additional Conduct Rules.',
									'akaza-adventure'
								); ?>
							</p>

							<ul class="sl-smcr-courses__list">
								<li><?php esc_html_e( 'Statement of Responsibilities', 'akaza-adventure' ); ?></li>
								<li><?php esc_html_e( 'Duty of Responsibility', 'akaza-adventure' ); ?></li>
								<li><?php esc_html_e( 'Reasonable steps', 'akaza-adventure' ); ?></li>
								<li><?php esc_html_e( 'Additional Senior Manager Conduct Rules', 'akaza-adventure' ); ?></li>
								<li><?php esc_html_e( 'Delegation and oversight', 'akaza-adventure' ); ?></li>
								<li><?php esc_html_e( 'Recordkeeping and breach reporting', 'akaza-adventure' ); ?></li>
							</ul>
						</td>
					</tr>
				</tbody>
			</table>

		</div>

	</div>
</section>