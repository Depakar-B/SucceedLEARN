<?php
/**
 * Failure to Prevent Fraud — Request a demo.
 *
 * Uses the site contact form shortcode, restyled in sl-ftpf-contact.css.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title     = __( 'Request a course demo', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);

$benefits = array(
	__( 'Review the learning experience', 'akaza-adventure' ),
	__( 'Discuss your audience and rollout needs', 'akaza-adventure' ),
	__( 'Confirm current deployment options', 'akaza-adventure' ),
);
?>

<section id="request-demo" class="ftpf-section ftpf-section--white ftpf-contact" aria-labelledby="ftpf-contact-title">
	<div class="ftpf-container ftpf-contact__grid">

		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?></span>
			<h2 id="ftpf-contact-title">
				<?php esc_html_e( 'Help your people recognise fraud risk', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'before it escalates', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( "See how Failure to Prevent Fraud training could support your organisation's financial crime prevention and employee-awareness programme.", 'akaza-adventure' ); ?></p>

			<ul class="ftpf-contact__benefits">
				<?php foreach ( $benefits as $benefit ) : ?>
					<li><?php echo esc_html( $benefit ); ?></li>
				<?php endforeach; ?>
			</ul>

			<a class="ftpf-contact__email" href="mailto:sales@succeedtech.com">sales@succeedtech.com</a>
		</div>

		<div class="ftpf-contact__form">
			<h3><?php echo esc_html( $form_title ); ?></h3>
			<p class="ftpf-contact__form-intro"><?php esc_html_e( 'Tell us a little about your organisation.', 'akaza-adventure' ); ?></p>
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
</section>
