<?php
/**
 * Blog archive — bottom contact CTA strip.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_url = function_exists( 'akaza_page_url' ) ? akaza_page_url( 'contact-us' ) : home_url( '/contact-us/' );
?>
<section class="slf-blog-cta" aria-labelledby="slf-blog-cta-heading">
	<div class="slf-blog-cta__inner">
		<div class="slf-blog-cta__content">
			<h2 id="slf-blog-cta-heading" class="slf-blog-cta__title">
				<?php esc_html_e( 'Need help building a safer, more compliant workplace?', 'akaza-adventure' ); ?>
			</h2>
			<p class="slf-blog-cta__lead">
				<?php esc_html_e( 'Talk to our team about training programmes tailored for your organisation.', 'akaza-adventure' ); ?>
			</p>
		</div>
		<a class="slf-btn slf-btn--primary" href="<?php echo esc_url( $contact_url ); ?>" data-cta="blog-contact">
			<?php esc_html_e( 'Contact Us', 'akaza-adventure' ); ?>
		</a>
	</div>
</section>
