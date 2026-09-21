<?php
/**
 * Contact Us — Hero / intro section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/08/Get-Your-Personalized.webp' )
	: '';

if ( '' === $hero_image && function_exists( 'akaza_img' ) ) {
	$hero_image = akaza_img( 'form-img.jpg' );
}
?>
<section class="sl-contact-hero" aria-labelledby="sl-contact-hero-title">
	<div class="sl-contact-hero__container">

		<div class="sl-contact-hero__content">

			<?php
			if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
				akaza_render_hero_breadcrumbs();
			}
			?>

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Contact Us', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-contact-hero-title" class="sl-contact-hero__title">
				<?php esc_html_e( 'Your perspective is invaluable to us.', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'We eagerly await your input.', 'akaza-adventure' ); ?></span>
			</h1>

			<h2 class="sl-contact-hero__heading">
				<?php esc_html_e( "We're here to help!", 'akaza-adventure' ); ?>
			</h2>

			<p class="sl-contact-hero__lead">
				<?php esc_html_e( 'Got questions or feedback?', 'akaza-adventure' ); ?>
			</p>

			<p class="sl-contact-hero__description">
				<?php esc_html_e( 'Our dedicated support team is available to assist you with any inquiries or concerns you may have. We strive to provide prompt and helpful assistance to ensure your learning experience with us is seamless and enjoyable.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-contact-hero__email">
				<span class="sl-contact-hero__email-label">
					<?php esc_html_e( 'Email Us:', 'akaza-adventure' ); ?>
				</span>
				<a href="mailto:info@succeedtech.com">info@succeedtech.com</a>
			</div>

		</div>

		<figure class="sl-contact-hero__media">
			<img
				src="<?php echo esc_url( $hero_image ); ?>"
				alt="<?php esc_attr_e( 'SucceedLEARN team ready to help', 'akaza-adventure' ); ?>"
				width="720"
				height="640"
				loading="eager"
				decoding="async"
			>
		</figure>

	</div>
</section>
