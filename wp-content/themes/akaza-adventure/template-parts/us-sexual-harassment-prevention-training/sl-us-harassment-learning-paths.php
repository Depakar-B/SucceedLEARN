<?php
/**
 * US Sexual Harassment Prevention Training — Learning Paths
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$employee_topics = array(
	__( 'Harassment and sexual harassment', 'akaza-adventure' ),
	__( 'Hostile work environment and quid pro quo harassment', 'akaza-adventure' ),
	__( 'Who may experience or engage in harassment', 'akaza-adventure' ),
	__( 'Conduct inside, outside and beyond a traditional workplace', 'akaza-adventure' ),
	__( 'Protected characteristics, stereotyping and abusive conduct', 'akaza-adventure' ),
	__( 'Active-bystander response options', 'akaza-adventure' ),
	__( 'Reporting procedures, investigations and corrective action', 'akaza-adventure' ),
	__( 'Retaliation and conduct that is not retaliation', 'akaza-adventure' ),
	__( 'Selected state and local protections and remedies', 'akaza-adventure' ),
);

$supervisor_topics = array(
	__( 'Who may be treated as a supervisor', 'akaza-adventure' ),
	__( 'Tangible employment actions and employer liability', 'akaza-adventure' ),
	__( 'Policy communication and consistent enforcement', 'akaza-adventure' ),
	__( 'Mandatory reporting and escalation responsibilities', 'akaza-adventure' ),
	__( 'Receiving, documenting and responding to concerns', 'akaza-adventure' ),
	__( 'Privacy, confidentiality and protection against retaliation', 'akaza-adventure' ),
	__( 'Responding appropriately when personally accused', 'akaza-adventure' ),
	__( 'Supporting investigations and follow-up', 'akaza-adventure' ),
);

$decision_rows = array(
	array(
		'label'    => __( 'Primary purpose', 'akaza-adventure' ),
		'employee' => __( 'Recognition, reporting and bystander awareness', 'akaza-adventure' ),
		'supervisor' => __( 'Prevention, escalation and complaint response', 'akaza-adventure' ),
	),
	array(
		'label'    => __( 'Typical learner', 'akaza-adventure' ),
		'employee' => __( 'Nonsupervisory employee', 'akaza-adventure' ),
		'supervisor' => __( 'Supervisor or manager', 'akaza-adventure' ),
	),
	array(
		'label'    => __( 'Added focus', 'akaza-adventure' ),
		'employee' => __( 'Workplace protections and response options', 'akaza-adventure' ),
		'supervisor' => __( 'Authority, liability, documentation and follow-up', 'akaza-adventure' ),
	),
	array(
		'label'    => __( 'Assignment basis', 'akaza-adventure' ),
		'employee' => __( 'Work location and applicable rules', 'akaza-adventure' ),
		'supervisor' => __( 'Work location, rules and supervisory status', 'akaza-adventure' ),
	),
);
?>

<section class="sl-us-harassment-learning-paths" aria-labelledby="sl-us-harassment-learning-paths-title">

	<div class="container">

		<div class="sl-us-harassment-learning-paths__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Choose the Appropriate Learning Path', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-us-harassment-learning-paths-title">
				<?php esc_html_e( 'Choose the Appropriate', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Learning Path', 'akaza-adventure' ); ?></span>
			</h2>

		</div>


		<!-- Employee Learning Path -->

		<div class="sl-us-harassment-learning-paths__path sl-us-harassment-learning-paths__path--employee">

			<div class="sl-us-harassment-learning-paths__media">

				<div class="sl-us-harassment-learning-paths__image">

					<div class="sl-us-harassment-learning-paths__image-placeholder">
						<span>
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</span>
					</div>

				</div>

			</div>


			<div class="sl-us-harassment-learning-paths__content">

				<span class="sl-us-harassment-learning-paths__path-label">
					<?php esc_html_e( 'Learning Path 01', 'akaza-adventure' ); ?>
				</span>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Sexual Harassment Prevention Training for Employees', 'akaza-adventure' ); ?>
				</h3>

				<p class="sl-us-harassment-learning-paths__lead">
					<?php esc_html_e( 'The employee course builds awareness of conduct, reporting options and workplace protections. Learners explore:', 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-list sl-us-harassment-learning-paths__list">

					<?php foreach ( $employee_topics as $index => $topic ) : ?>

						<li class="sl-list-item">

							<span class="sl-list-item__label" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<span class="sl-list-item__text">
								<?php echo esc_html( $topic ); ?>
							</span>

						</li>

					<?php endforeach; ?>

				</ul>

				<div class="sl-highlight sl-us-harassment-learning-paths__best-suited">

					<strong><?php esc_html_e( 'Best suited for:', 'akaza-adventure' ); ?></strong>

					<?php esc_html_e( ' U.S.-based employees who need practical awareness training selected for their work location.', 'akaza-adventure' ); ?>

				</div>

			</div>

		</div>


		<!-- Supervisor Learning Path -->

		<div class="sl-us-harassment-learning-paths__path sl-us-harassment-learning-paths__path--supervisor">

			<div class="sl-us-harassment-learning-paths__content">

				<span class="sl-us-harassment-learning-paths__path-label">
					<?php esc_html_e( 'Learning Path 02', 'akaza-adventure' ); ?>
				</span>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Sexual Harassment Prevention Training for Supervisors', 'akaza-adventure' ); ?>
				</h3>

				<p class="sl-us-harassment-learning-paths__lead">
					<?php esc_html_e( 'The supervisor course addresses the additional responsibility that comes with authority over people or employment decisions. It includes:', 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-list sl-us-harassment-learning-paths__list">

					<?php foreach ( $supervisor_topics as $index => $topic ) : ?>

						<li class="sl-list-item">

							<span class="sl-list-item__label" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<span class="sl-list-item__text">
								<?php echo esc_html( $topic ); ?>
							</span>

						</li>

					<?php endforeach; ?>

				</ul>

				<div class="sl-highlight sl-us-harassment-learning-paths__best-suited">

					<strong><?php esc_html_e( 'Best suited for:', 'akaza-adventure' ); ?></strong>

					<?php esc_html_e( ' U.S. supervisors and managers who may receive concerns, make employment decisions or act on behalf of the organization.', 'akaza-adventure' ); ?>

				</div>

			</div>


			<div class="sl-us-harassment-learning-paths__media">

				<div class="sl-us-harassment-learning-paths__image">

					<div class="sl-us-harassment-learning-paths__image-placeholder">
						<span>
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</span>
					</div>

				</div>

			</div>

		</div>


		<!-- Decision Table -->

		<div class="sl-us-harassment-learning-paths__decision">

			<div class="sl-us-harassment-learning-paths__decision-heading">

				<span class="sl-us-harassment-learning-paths__path-label">
					<?php esc_html_e( 'Decision Point', 'akaza-adventure' ); ?>
				</span>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Which Learning Path Fits?', 'akaza-adventure' ); ?>
				</h3>

			</div>


			<div class="sl-us-harassment-learning-paths__table-wrap">

				<table class="sl-us-harassment-learning-paths__table">

					<thead>

						<tr>

							<th scope="col">
								<?php esc_html_e( 'Decision Point', 'akaza-adventure' ); ?>
							</th>

							<th scope="col">
								<?php esc_html_e( 'Employee Course', 'akaza-adventure' ); ?>
							</th>

							<th scope="col">
								<?php esc_html_e( 'Supervisor Course', 'akaza-adventure' ); ?>
							</th>

						</tr>

					</thead>

					<tbody>

						<?php foreach ( $decision_rows as $row ) : ?>

							<tr>

								<th scope="row">
									<?php echo esc_html( $row['label'] ); ?>
								</th>

								<td>
									<?php echo esc_html( $row['employee'] ); ?>
								</td>

								<td>
									<?php echo esc_html( $row['supervisor'] ); ?>
								</td>

							</tr>

						<?php endforeach; ?>

					</tbody>

				</table>

			</div>

		</div>

	</div>

</section>