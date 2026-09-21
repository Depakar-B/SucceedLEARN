<?php
/**
 * Inclusive Workplace Training — CTA / demo form section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$moments = array(
	__( 'An employee pauses before allowing an assumption to decide.', 'akaza-adventure' ),
	__( 'A colleague recognises discrimination and knows where to raise it.', 'akaza-adventure' ),
	__( 'A witness sees potential sexual harassment and understands that direct confrontation is not the only way to help.', 'akaza-adventure' ),
);
?>
<section id="contact" class="sl-home-contact-section sl-inclusive-cta" aria-labelledby="sl-inclusive-cta-heading">
	<div class="container">
		<div class="row align-items-start gy-5">
			<div class="col-lg-6">
				<div class="sl-home-contact-content sl-inclusive-cta__content">
					<span class="sl-inclusive-cta__eyebrow"><?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?></span>

					<h2 id="sl-inclusive-cta-heading">
						<?php esc_html_e( 'Make the next workplace moment count', 'akaza-adventure' ); ?>
					</h2>

					<ul class="sl-inclusive-cta__moments" role="list">
						<?php foreach ( $moments as $moment ) : ?>
							<li><?php echo esc_html( $moment ); ?></li>
						<?php endforeach; ?>
					</ul>

					<p>
						<?php esc_html_e( 'That is where inclusive workplace training becomes useful: not only in what employees know, but in what they notice and choose to do next.', 'akaza-adventure' ); ?>
					</p>

					<p class="sl-inclusive-cta__closing">
						<?php esc_html_e( 'Explore the Inclusive Workplace course that addresses your organisation’s priority.', 'akaza-adventure' ); ?>
					</p>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">
					<?php echo do_shortcode( '[contact_form form_variant="course"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
