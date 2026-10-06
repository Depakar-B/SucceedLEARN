<?php
/**
 * AMP partial — US Sexual Harassment Prevention Training — learning paths.
 *
 * Expected vars: $employee_topics, $supervisor_topics, $decision_rows
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $employee_topics ) || ! is_array( $employee_topics ) ) {
	$employee_topics = function_exists( 'succeedlearn_amp_get_us_harassment_employee_topics' )
		? succeedlearn_amp_get_us_harassment_employee_topics()
		: array();
}

if ( empty( $supervisor_topics ) || ! is_array( $supervisor_topics ) ) {
	$supervisor_topics = function_exists( 'succeedlearn_amp_get_us_harassment_supervisor_topics' )
		? succeedlearn_amp_get_us_harassment_supervisor_topics()
		: array();
}

if ( empty( $decision_rows ) || ! is_array( $decision_rows ) ) {
	$decision_rows = function_exists( 'succeedlearn_amp_get_us_harassment_decision_rows' )
		? succeedlearn_amp_get_us_harassment_decision_rows()
		: array();
}

$images = function_exists( 'succeedlearn_amp_get_us_harassment_images' )
	? succeedlearn_amp_get_us_harassment_images()
	: array();
$employee_image   = isset( $images['employee'] ) ? $images['employee'] : '';
$supervisor_image = isset( $images['supervisor'] ) ? $images['supervisor'] : '';
?>
<section class="sl-section sl-section--alt sl-us-harassment-learning-paths" aria-labelledby="sl-us-harassment-learning-paths-title">
	<div class="sl-wrap">
		<div class="sl-us-harassment-learning-paths__heading">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Choose the Appropriate Learning Path', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-us-harassment-learning-paths-title" class="sl-h2">
				<?php esc_html_e( 'Choose the Appropriate', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Learning Path', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-us-harassment-learning-paths__path sl-us-harassment-learning-paths__path--employee">
			<div class="sl-us-harassment-learning-paths__content">
				<span class="sl-us-harassment-learning-paths__path-label">
					<?php esc_html_e( 'Learning Path 01', 'succeedlearn-amp' ); ?>
				</span>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Sexual Harassment Prevention Training for Employees', 'succeedlearn-amp' ); ?>
				</h3>

				<p class="sl-lead sl-us-harassment-learning-paths__lead">
					<?php esc_html_e( 'The employee course builds awareness of conduct, reporting options and workplace protections. Learners explore:', 'succeedlearn-amp' ); ?>
				</p>

				<ul class="sl-us-harassment-bullets sl-us-harassment-learning-paths__list">
					<?php foreach ( $employee_topics as $topic ) : ?>
						<li><?php echo esc_html( $topic ); ?></li>
					<?php endforeach; ?>
				</ul>

				<div class="sl-highlight sl-us-harassment-learning-paths__best-suited">
					<p>
						<strong><?php esc_html_e( 'Best suited for:', 'succeedlearn-amp' ); ?></strong>
						<?php esc_html_e( ' United States-based employees who need practical awareness training selected for their work location.', 'succeedlearn-amp' ); ?>
					</p>
				</div>
			</div>

			<div class="sl-us-harassment-learning-paths__media">
				<?php if ( $employee_image ) : ?>
					<div class="sl-us-harassment-learning-paths__image">
						<amp-img
							src="<?php echo esc_url( $employee_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'Employees choosing the appropriate sexual harassment prevention learning path.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="sl-us-harassment-learning-paths__path sl-us-harassment-learning-paths__path--supervisor">
			<div class="sl-us-harassment-learning-paths__content">
				<span class="sl-us-harassment-learning-paths__path-label">
					<?php esc_html_e( 'Learning Path 02', 'succeedlearn-amp' ); ?>
				</span>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Sexual Harassment Prevention Training for Supervisors', 'succeedlearn-amp' ); ?>
				</h3>

				<p class="sl-lead sl-us-harassment-learning-paths__lead">
					<?php esc_html_e( 'The supervisor course addresses the additional responsibility that comes with authority over people or employment decisions. It includes:', 'succeedlearn-amp' ); ?>
				</p>

				<ul class="sl-us-harassment-bullets sl-us-harassment-learning-paths__list">
					<?php foreach ( $supervisor_topics as $topic ) : ?>
						<li><?php echo esc_html( $topic ); ?></li>
					<?php endforeach; ?>
				</ul>

				<div class="sl-highlight sl-us-harassment-learning-paths__best-suited">
					<p>
						<strong><?php esc_html_e( 'Best suited for:', 'succeedlearn-amp' ); ?></strong>
						<?php esc_html_e( ' United States supervisors and managers who may receive concerns, make employment decisions or act on behalf of the organization.', 'succeedlearn-amp' ); ?>
					</p>
				</div>
			</div>

			<div class="sl-us-harassment-learning-paths__media">
				<?php if ( $supervisor_image ) : ?>
					<div class="sl-us-harassment-learning-paths__image">
						<amp-img
							src="<?php echo esc_url( $supervisor_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'Supervisor sexual harassment prevention training session in a modern workplace.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="sl-us-harassment-learning-paths__decision">
			<div class="sl-us-harassment-learning-paths__decision-heading">
				<span class="sl-us-harassment-learning-paths__path-label">
					<?php esc_html_e( 'Decision Point', 'succeedlearn-amp' ); ?>
				</span>
				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Which Learning Path Fits?', 'succeedlearn-amp' ); ?>
				</h3>
			</div>

			<div class="sl-us-harassment-learning-paths__table-wrap">
				<table class="sl-us-harassment-learning-paths__table">
					<thead>
						<tr>
							<th scope="col"><?php esc_html_e( 'Decision Point', 'succeedlearn-amp' ); ?></th>
							<th scope="col"><?php esc_html_e( 'Employee Course', 'succeedlearn-amp' ); ?></th>
							<th scope="col"><?php esc_html_e( 'Supervisor Course', 'succeedlearn-amp' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $decision_rows as $row ) : ?>
							<tr>
								<th scope="row"><?php echo esc_html( $row['label'] ); ?></th>
								<td><?php echo esc_html( $row['employee'] ); ?></td>
								<td><?php echo esc_html( $row['supervisor'] ); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
