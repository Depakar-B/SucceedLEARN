<?php
/**
 * US Sexual Harassment Prevention Training — Federal & State Requirements
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$jurisdiction_examples = array(
	array(
		'title'       => __( 'California', 'akaza-adventure' ),
		'description' => __( 'Covered employers generally provide at least one hour of training to nonsupervisory employees and two hours to supervisors every two years.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'New York State', 'akaza-adventure' ),
		'description' => __( 'Employers provide annual interactive sexual-harassment prevention training that meets the state’s minimum standards.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Illinois', 'akaza-adventure' ),
		'description' => __( 'Covered employers provide annual sexual-harassment prevention training; additional rules may apply in particular industries or locations.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Connecticut', 'akaza-adventure' ),
		'description' => __( 'Requirements vary according to employer size and supervisory status.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Maine', 'akaza-adventure' ),
		'description' => __( 'Covered employers train new employees and provide additional information to supervisory and managerial employees.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-us-harassment-requirements" aria-labelledby="sl-us-harassment-requirements-title">
	<div class="container">

		<div class="sl-us-harassment-requirements__grid">

			<div class="sl-us-harassment-requirements__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Federal & State Requirements', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-us-harassment-requirements-title">
					<?php esc_html_e( 'Federal Principles and Selected', 'akaza-adventure' ); ?>
					<span>
						<?php esc_html_e( 'State Requirements', 'akaza-adventure' ); ?>
					</span>
				</h2>

				<div class="sl-us-harassment-requirements__intro">

					<p>
						<?php esc_html_e( 'At federal level, Title VII of the Civil Rights Act prohibits employment discrimination based on sex and other protected characteristics for covered employers. Federal law does not create one universal harassment-training timetable for every private employer, but effective prevention, reporting and corrective practices remain important parts of workplace risk management.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Several jurisdictions impose more specific training duties. Examples include:', 'akaza-adventure' ); ?>
					</p>

				</div>

				<div class="sl-us-harassment-requirements__cards">

					<?php foreach ( $jurisdiction_examples as $jurisdiction ) : ?>

						<article class="sl-us-harassment-requirements__card">

							<div class="sl-us-harassment-requirements__card-content">

								<h3 class="sl-panel-title">
									<?php echo esc_html( $jurisdiction['title'] ); ?>
								</h3>

								<p>
									<?php echo esc_html( $jurisdiction['description'] ); ?>
								</p>

							</div>

						</article>

					<?php endforeach; ?>

				</div>

				<div class="sl-us-harassment-requirements__closing">

					<p>
						<?php esc_html_e( 'Other state, city and territorial rules may also apply. Requirements can change, so employers should verify current obligations for each work location and obtain legal advice where appropriate.', 'akaza-adventure' ); ?>
					</p>

				</div>

			</div>

			<div class="sl-us-harassment-requirements__media">

				<div class="sl-us-harassment-requirements__image">

					<div class="sl-us-harassment-requirements__image-placeholder">
						<span>
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</span>
					</div>

				</div>

			</div>

		</div>

	</div>
</section>