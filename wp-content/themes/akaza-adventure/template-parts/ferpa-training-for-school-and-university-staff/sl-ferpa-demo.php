<?php
/**
 * SucceedLEARN — FERPA Staff Awareness
 *
 * Section: Request a Demo / Contact
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title     = __( 'Request a Demo', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);

$ferpa_demo_points = array(
	__( 'Walkthrough of both the K-12 and higher education paths', 'akaza-adventure' ),
	__( 'Sample certificate and completion report', 'akaza-adventure' ),
	__( 'SCORM package details for Canvas, Moodle or Blackboard', 'akaza-adventure' ),
	__( 'A quote for your exact staff count', 'akaza-adventure' ),
);
?>

<section
	class="sl-ferpa-demo"
	id="contact"
	aria-labelledby="sl-ferpa-demo-title"
>
	<div class="container">

		<div class="sl-ferpa-demo__grid">

			<div class="sl-ferpa-demo__content">

				<div class="sl-ferpa-demo__heading">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'See it before you buy it', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-ferpa-demo-title">
						<?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?>
						<span>
							<?php esc_html_e( 'of the course.', 'akaza-adventure' ); ?>
						</span>
					</h2>

					<p>
						<?php esc_html_e( 'A guided walkthrough, a sample completion report, and SCORM details for your environment. No obligation.', 'akaza-adventure' ); ?>
					</p>

				</div>

				<ul class="sl-ferpa-demo__points">

					<?php foreach ( $ferpa_demo_points as $point ) : ?>

						<li class="sl-ferpa-demo__point">

							<span
								class="sl-ferpa-demo__check"
								aria-hidden="true"
							>
								<svg
									viewBox="0 0 24 24"
									focusable="false"
								>
									<circle
										cx="12"
										cy="12"
										r="9"
										fill="none"
										stroke="currentColor"
										stroke-width="1.7"
									/>
									<path
										d="m8 12.2 2.6 2.6 5.4-5.6"
										fill="none"
										stroke="currentColor"
										stroke-width="1.8"
										stroke-linecap="round"
										stroke-linejoin="round"
									/>
								</svg>
							</span>

							<span class="sl-ferpa-demo__point-text">
								<?php echo esc_html( $point ); ?>
							</span>

						</li>

					<?php endforeach; ?>

				</ul>

			</div>

			<div class="sl-ferpa-demo__form-wrap">
				<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">
					<?php
					if ( shortcode_exists( 'contact_form' ) ) {
						echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					} elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {
						echo do_shortcode( sprintf( '[succeedlearn_course_form title="%s"]', esc_attr( $form_title ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					?>
				</div>
			</div>

		</div>

	</div>
</section>
