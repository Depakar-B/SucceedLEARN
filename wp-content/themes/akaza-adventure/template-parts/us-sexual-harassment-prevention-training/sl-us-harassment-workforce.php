<?php
/**
 * US Sexual Harassment Prevention Training — Workforce Configuration
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$workforce_requirements = array(
	__( 'Employee’s actual work location', 'akaza-adventure' ),
	__( 'Role and supervisory status', 'akaza-adventure' ),
	__( 'Required duration', 'akaza-adventure' ),
	__( 'Training recurrence', 'akaza-adventure' ),
	__( 'Interactivity requirements', 'akaza-adventure' ),
	__( 'Language requirements', 'akaza-adventure' ),
	__( 'Accessibility requirements', 'akaza-adventure' ),
	__( 'Recordkeeping needs', 'akaza-adventure' ),
);

$customisation_items = array(
	__( 'Organization branding and terminology', 'akaza-adventure' ),
	__( 'Anti-harassment, discrimination and retaliation policies', 'akaza-adventure' ),
	__( 'Reporting and escalation channels', 'akaza-adventure' ),
	__( 'HR, ethics or compliance contact details', 'akaza-adventure' ),
	__( 'Leadership messages', 'akaza-adventure' ),
	__( 'Industry- or role-relevant examples', 'akaza-adventure' ),
	__( 'Selected state or local content', 'akaza-adventure' ),
	__( 'Assessment, acknowledgement and completion requirements', 'akaza-adventure' ),
);
?>

<section class="sl-us-harassment-workforce" aria-labelledby="sl-us-harassment-workforce-title">
	<div class="container">

		<!-- Select training -->
		<div class="sl-us-harassment-workforce__intro">
			<h2 id="sl-us-harassment-workforce-title">
				<?php esc_html_e( 'Select training for every U.S. work', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'location', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course catalogue includes federal content and selected jurisdictional material, including California, Connecticut, Delaware, Maine, New York, Illinois, New Jersey, Washington, D.C., Puerto Rico and Washington State. Availability and coverage should be confirmed when the organization’s learner population is mapped.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'For each assignment, check the employee’s actual work location, role, required duration, recurrence, interactivity, language, accessibility and recordkeeping needs. Multistate employers may require more than one configuration.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<!-- Workforce assignment emphasis -->
		<div class="sl-us-harassment-workforce__assignment">
			<h3>
				<?php esc_html_e( 'One U.S. workforce may require more than one training assignment.', 'akaza-adventure' ); ?>
			</h3>
		</div>

		<!-- Configure training -->
		<div class="sl-us-harassment-workforce__configure">
			<h4>
				<?php esc_html_e( 'Configure the training for your workforce', 'akaza-adventure' ); ?>
			</h4>

			<div class="sl-us-harassment-workforce__configure-intro">
				<p>
					<?php esc_html_e( 'Relevant organizational details help learners connect course concepts with the process they should actually follow. Depending on the selected course and project scope, customization may include:', 'akaza-adventure' ); ?>
				</p>
			</div>

			<div class="sl-us-harassment-workforce__list-area">

				<div class="sl-us-harassment-workforce__list-content">
					<ul class="sl-list sl-us-harassment-workforce__list">
						<?php foreach ( $customisation_items as $index => $item ) : ?>
							<li class="sl-list-item">
								<span class="sl-list-item__label" aria-hidden="true">
									<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
								</span>

								<span class="sl-list-item__text">
									<?php echo esc_html( $item ); ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="sl-us-harassment-workforce__media">
					<div class="sl-us-harassment-workforce__image">
						<div class="sl-us-harassment-workforce__image-placeholder">
							<span>
								<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
							</span>
						</div>
					</div>
				</div>

			</div>

			<div class="sl-us-harassment-workforce__configure-closing">
				<p>
					<?php esc_html_e( 'SucceedLEARN can help your organization determine which employee and supervisor paths align with the workforce information you provide.', 'akaza-adventure' ); ?>
				</p>
			</div>
		</div>

		<!-- Delivery -->
		<div class="sl-us-harassment-workforce__delivery">
			<h3 class="sl-panel-title">
				<?php esc_html_e( 'Deliver and document assigned training', 'akaza-adventure' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'Courses can be delivered through the SucceedLEARN LMS or, where supported, as SCORM-compatible packages through an existing learning management system. Mobile and desktop access, assessments, certificates and completion reporting depend on the selected course and delivery configuration.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-content-actions sl-us-harassment-workforce__actions">
				<a class="sl-content-btn sl-content-btn-primary" href="#request-demo">
					<?php esc_html_e( 'Request Delivery Details', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</div>
		</div>

	</div>
</section>