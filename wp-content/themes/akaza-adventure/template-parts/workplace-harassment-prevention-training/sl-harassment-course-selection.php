<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: Which harassment prevention course does my organisation need?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_selection = array(
	array(
		'workforce'   => 'Employees across multiple countries',
		'training'    => 'Global Sexual Harassment Prevention Training',
	),
	array(
		'workforce'   => 'Employees working in the United States',
		'training'    => 'US Employee Harassment Prevention Training',
	),
	array(
		'workforce'   => 'US supervisors and managers',
		'training'    => 'US Supervisor Harassment Prevention Training',
	),
	array(
		'workforce'   => 'Workers in England, Scotland or Wales',
		'training'    => 'Preventing Sexual Harassment at Work: UK',
	),
	array(
		'workforce'   => 'Employees working in India',
		'training'    => 'POSH Foundation Training',
	),
	array(
		'workforce'   => 'Managers working in India',
		'training'    => 'POSH Manager Training',
	),
	array(
		'workforce'   => 'India Internal Committee members',
		'training'    => 'POSH IC Member Training',
	),
);
?>

<section
	class="sl-harassment-course-selection"
	id="which-course"
	aria-labelledby="sl-harassment-course-selection-title"
>

	<div class="container">

		<!-- =====================================
		     SECTION HEADING
		===================================== -->

		<div class="sl-harassment-course-selection__heading">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Course Selection Guide',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-harassment-course-selection-title">
				<?php
				esc_html_e(
					'Which harassment prevention course does my',
					'akaza-adventure'
				);
				?>
				<span>
					<?php
					esc_html_e(
						'organisation need?',
						'akaza-adventure'
					);
				?>
				</span>
			</h2>

		</div>


		<!-- =====================================
		     COURSE SELECTION TABLE
		===================================== -->

		<div class="sl-harassment-course-selection__table">

			<!-- Table Header -->

			<div class="sl-harassment-course-selection__header">

				<div class="sl-harassment-course-selection__header-cell">
					<h3 class="sl-panel-title">
						<?php
						esc_html_e(
							'Workforce or role',
							'akaza-adventure'
						);
						?>
					</h3>
				</div>

				<div class="sl-harassment-course-selection__header-cell">
					<h3 class="sl-panel-title">
						<?php
						esc_html_e(
							'Recommended training',
							'akaza-adventure'
						);
						?>
					</h3>
				</div>

			</div>


			<!-- Table Rows -->

			<div class="sl-harassment-course-selection__rows">

				<?php foreach ( $course_selection as $index => $course ) : ?>

					<div class="sl-harassment-course-selection__row">

						<div
							class="sl-harassment-course-selection__workforce"
							data-label="<?php esc_attr_e( 'Workforce or role', 'akaza-adventure' ); ?>"
						>

							<span class="sl-harassment-course-selection__number">
								<?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?>
							</span>

							<p>
								<?php echo esc_html( $course['workforce'] ); ?>
							</p>

						</div>


						<div
							class="sl-harassment-course-selection__training"
							data-label="<?php esc_attr_e( 'Recommended training', 'akaza-adventure' ); ?>"
						>

							<p>
								<?php echo esc_html( $course['training'] ); ?>
							</p>

						</div>

					</div>

				<?php endforeach; ?>

			</div>

		</div>


		<!-- =====================================
		     SUPPORTING CONTENT
		===================================== -->

		<div class="sl-harassment-course-selection__note">

			<span class="sl-harassment-course-selection__note-title">
				<?php
				esc_html_e(
					'Need more than one course?',
					'akaza-adventure'
				);
				?>
			</span>

			<p>
				<?php
				esc_html_e(
					'An organisation operating in several countries may use more than one course. Assignment should be based on employee location, supervisory status, complaint-handling responsibility and applicable requirements.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>


		<!-- =====================================
		     CTA
		===================================== -->

		<div class="sl-content-actions">

			<a
				class="sl-content-btn sl-content-btn-primary"
				href="#contact"
			>
				<?php
				esc_html_e(
					'Help Me Select the Right Course',
					'akaza-adventure'
				);
				?>
				<span aria-hidden="true">→</span>
			</a>

		</div>

	</div>

</section>