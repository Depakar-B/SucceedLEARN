<?php
/**
 * WHP AMP: Which harassment prevention course does my organisation need?
 *
 * Expected vars: $course_selection
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="which-course" class="sl-section sl-section--alt sl-whp-course" aria-labelledby="sl-whp-course-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Course Selection Guide', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-course-title" class="sl-h2">
				<?php esc_html_e( 'Which harassment prevention course does my', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'organisation need?', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-whp-course__table">
			<div class="sl-whp-course__header" aria-hidden="true">
				<span><?php esc_html_e( 'Workforce or role', 'succeedlearn-amp' ); ?></span>
				<span><?php esc_html_e( 'Recommended training', 'succeedlearn-amp' ); ?></span>
			</div>

			<?php foreach ( $course_selection as $course ) : ?>
				<div class="sl-whp-course__row">
					<div class="sl-whp-course__cell sl-whp-course__cell--workforce">
						<span class="sl-whp-course__label"><?php esc_html_e( 'Workforce or role', 'succeedlearn-amp' ); ?></span>
						<p><?php echo esc_html( $course['workforce'] ); ?></p>
					</div>
					<div class="sl-whp-course__cell sl-whp-course__cell--training">
						<span class="sl-whp-course__label"><?php esc_html_e( 'Recommended training', 'succeedlearn-amp' ); ?></span>
						<p><?php echo esc_html( $course['training'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="sl-highlight sl-whp-course__note">
			<h3 class="sl-panel-title"><?php esc_html_e( 'Need more than one course?', 'succeedlearn-amp' ); ?></h3>
			<p><?php esc_html_e( 'An organisation operating in several countries may use more than one course. Assignment should be based on employee location, supervisory status, complaint-handling responsibility and applicable requirements.', 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-content-actions">
			<button
				type="button"
				class="sl-content-btn sl-content-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Help Me Select the Right Course', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</button>
		</div>
	</div>
</section>
