<?php
/**
 * Modern Slavery Awareness — Buy the course (enquiry form).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title = __( 'Modern Slavery Awareness Course Enquiry', 'akaza-adventure' );
?>

<section id="buy-course" class="msa-section msa-section--grey" aria-labelledby="msa-buy-title">
	<div class="msa-container msa-buy">

		<div class="msa-buy__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Course Enquiry', 'akaza-adventure' ); ?></span>
			<h2 id="msa-buy-title">
				<?php esc_html_e( 'Buy Modern Slavery Awareness Training', 'akaza-adventure' ); ?>
				<span class="msa-highlight"><?php esc_html_e( 'for Your Organisation', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Tell us about your organisation and training requirements to start your course enquiry.', 'akaza-adventure' ); ?></p>
		</div>

		<div class="msa-buy__form">
			<?php
			if ( shortcode_exists( 'contact_form' ) ) {
				echo do_shortcode( sprintf( '[contact_form form_variant="course" title="%s"]', esc_attr( $form_title ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {
				echo do_shortcode( sprintf( '[succeedlearn_course_form title="%s"]', esc_attr( $form_title ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>

	</div>
</section>
