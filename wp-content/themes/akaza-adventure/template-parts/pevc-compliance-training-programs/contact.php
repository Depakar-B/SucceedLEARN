<?php
/**
 * PE/VC Homepage — Request a Demo / contact.
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

$benefits = array(
	__( 'See the PE/VC Suite in action', 'akaza-adventure' ),
	__( 'Explore the included FCP learning', 'akaza-adventure' ),
	__( 'Discuss your learner groups', 'akaza-adventure' ),
	__( 'Review hosted and SCORM delivery', 'akaza-adventure' ),
	__( 'Explore customisation options', 'akaza-adventure' ),
	__( 'Discuss the $24 per-user annual package', 'akaza-adventure' ),
);
?>
<section
	id="contact"
	class="sl-pevc-contact"
	aria-labelledby="sl-pevc-contact-title"
>
	<div class="container">
		<div class="sl-pevc-contact__layout">

			<div class="sl-pevc-contact__copy">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Get started', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-pevc-contact-title">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</h2>

				<p class="sl-pevc-contact__lead">
					<?php
					esc_html_e(
						'Tell us about your organisation and your PE/VC compliance training requirements.',
						'akaza-adventure'
					);
					?>
				</p>

				<ul class="sl-pevc-contact__benefits">
					<?php foreach ( $benefits as $benefit ) : ?>
						<li><?php echo esc_html( $benefit ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-pevc-contact__form-wrap">
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
