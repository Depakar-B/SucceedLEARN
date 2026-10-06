<?php
/**
 * AMP partial — US Sexual Harassment Prevention Training — workforce.
 *
 * Expected vars: $customisation_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $customisation_items ) || ! is_array( $customisation_items ) ) {
	$customisation_items = function_exists( 'succeedlearn_amp_get_us_harassment_customisation_items' )
		? succeedlearn_amp_get_us_harassment_customisation_items()
		: array();
}

$images = function_exists( 'succeedlearn_amp_get_us_harassment_images' )
	? succeedlearn_amp_get_us_harassment_images()
	: array();
$workforce_image = isset( $images['workforce'] ) ? $images['workforce'] : '';
?>
<section class="sl-section sl-section--alt sl-us-harassment-workforce" aria-labelledby="sl-us-harassment-workforce-title">
	<div class="sl-wrap">
		<div class="sl-us-harassment-workforce__intro">
			<h2 id="sl-us-harassment-workforce-title" class="sl-h2">
				<?php esc_html_e( 'One training for every United States work', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'location', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p class="sl-lead">
				<?php
				esc_html_e(
					'The course catalogue includes federal content and selected jurisdictional material, including California, Connecticut, Delaware, Maine, New York, Illinois, New Jersey, Washington, D.C., Puerto Rico and Washington State. Availability and coverage should be confirmed when the organization’s learner population is mapped.',
					'succeedlearn-amp'
				);
				?>
			</p>
			<p>
				<?php
				esc_html_e(
					'For each assignment, check the employee’s actual work location, role, required duration, recurrence, interactivity, language, accessibility and recordkeeping needs. Multistate employers may require more than one configuration.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</div>

		<div class="sl-us-harassment-workforce__configure">
			<div class="sl-us-harassment-workforce__list-area">
				<div class="sl-us-harassment-workforce__list-content">
					<div class="sl-us-harassment-workforce__assignment">
						<h3>
							<?php esc_html_e( 'One United States workforce may require more than one training assignment.', 'succeedlearn-amp' ); ?>
						</h3>
					</div>

					<h4>
						<?php esc_html_e( 'Configure the training for your workforce', 'succeedlearn-amp' ); ?>
					</h4>

					<p class="sl-us-harassment-workforce__configure-intro">
						<?php
						esc_html_e(
							'Relevant organizational details help learners connect course concepts with the process they should actually follow. Depending on the selected course and project scope, customization may include:',
							'succeedlearn-amp'
						);
						?>
					</p>

					<ul class="sl-us-harassment-bullets sl-us-harassment-workforce__list">
						<?php foreach ( $customisation_items as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="sl-us-harassment-workforce__media">
					<?php if ( $workforce_image ) : ?>
						<div class="sl-us-harassment-workforce__image">
							<amp-img
								src="<?php echo esc_url( $workforce_image ); ?>"
								width="560"
								height="420"
								layout="responsive"
								alt="<?php esc_attr_e( 'Learning path configuration for a United States workforce harassment prevention programme.', 'succeedlearn-amp' ); ?>"
							></amp-img>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<p class="sl-us-harassment-workforce__configure-closing">
				<?php
				esc_html_e(
					'SucceedLEARN can help your organization determine which employee and supervisor paths align with the workforce information you provide.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</div>

		<div class="sl-us-harassment-workforce__delivery">
			<h3 class="sl-panel-title">
				<?php esc_html_e( 'Deliver and document assigned training', 'succeedlearn-amp' ); ?>
			</h3>

			<p>
				<?php
				esc_html_e(
					'Courses can be delivered through the SucceedLEARN LMS or, where supported, as SCORM-compatible packages through an existing learning management system. Mobile and desktop access, assessments, certificates and completion reporting depend on the selected course and delivery configuration.',
					'succeedlearn-amp'
				);
				?>
			</p>

			<div class="sl-content-actions sl-us-harassment-workforce__actions">
				<button
					type="button"
					class="sl-content-btn sl-content-btn-primary"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Request Delivery Details', 'succeedlearn-amp' ); ?>
					<span aria-hidden="true">→</span>
				</button>
			</div>
		</div>
	</div>
</section>
