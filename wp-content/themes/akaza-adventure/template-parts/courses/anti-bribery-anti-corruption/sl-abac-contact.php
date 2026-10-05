<?php
/**
 * Anti-Bribery and Anti-Corruption — Contact / Buy ABAC Training.
 *
 * Uses the global SucceedLEARN contact layout.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title     = __( 'ABAC Course Enquiry', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);

$steps = array(
	array(
		'number' => '01',
		'title'  => __( 'Preview the course', 'akaza-adventure' ),
		'text'   => __( 'Explore scenarios, interactions and assessment style.', 'akaza-adventure' ),
	),
	array(
		'number' => '02',
		'title'  => __( 'Discuss your requirements', 'akaza-adventure' ),
		'text'   => __( 'Cover jurisdictions, policies, delivery and customisation.', 'akaza-adventure' ),
	),
	array(
		'number' => '03',
		'title'  => __( 'Plan deployment', 'akaza-adventure' ),
		'text'   => __( 'Choose SucceedLEARN SaaS or a SCORM package.', 'akaza-adventure' ),
	),
);
?>

<section
	id="contact"
	class="sl-contact sl-contact--on-soft sl-abac-contact"
	aria-labelledby="sl-abac-contact-title"
>
	<div class="container">

		<div class="sl-contact__grid">

			<div class="sl-contact__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Your Next Step', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-abac-contact-title">
					<?php esc_html_e( 'Buy ABAC training for your', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'organisation', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-contact__copy">
					<p>
						<?php
						esc_html_e(
							'Tell us about your UK Bribery Act, US FCPA or India ABAC training needs. We can discuss the appropriate course, delivery option and any customisation required for your organisation.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

				<div class="sl-abac-contact__cards" role="list">
					<?php foreach ( $steps as $step ) : ?>
						<article class="sl-abac-contact__card" role="listitem">
							<span class="sl-abac-contact__card-number" aria-hidden="true">
								<?php echo esc_html( $step['number'] ); ?>
							</span>
							<div class="sl-abac-contact__card-body">
								<h3><?php echo esc_html( $step['title'] ); ?></h3>
								<p><?php echo esc_html( $step['text'] ); ?></p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>

				<div class="sl-contact__actions">

					<a class="sl-contact-btn sl-contact-btn--email" href="mailto:connect@succeedtech.com">
						<span class="sl-contact-btn__stack">
							<span class="sl-contact-btn__label">
								<?php esc_html_e( 'Email us', 'akaza-adventure' ); ?>
							</span>
							<span class="sl-contact-btn__value">
								<?php esc_html_e( 'connect@succeedtech.com', 'akaza-adventure' ); ?>
							</span>
						</span>
					</a>

				</div>

			</div>

			<div class="sl-contact__form-panel">
				<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">
					<?php
					if ( shortcode_exists( 'contact_form' ) ) {
						echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					} elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {
						echo do_shortcode(
							sprintf(
								'[succeedlearn_course_form title="%s"]',
								esc_attr( $form_title )
							)
						); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					?>
				</div>
			</div>

		</div>

	</div>
</section>
