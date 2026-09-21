<?php
/**
 * Contact Us AMP — Hero section.
 *
 * Expected vars: $hero_img
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-contact-hero">
	<div class="sl-wrap sl-contact-hero__grid">
		<div class="sl-contact-hero__content">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( __( 'Contact Us', 'succeedlearn-amp' ) );
			}
			?>
			<p class="sl-contact-hero__eyebrow"><?php esc_html_e( 'Contact Us', 'succeedlearn-amp' ); ?></p>
			<h1 class="sl-contact-hero__title">
				<?php esc_html_e( 'Your perspective is invaluable to us.', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'We eagerly await your input.', 'succeedlearn-amp' ); ?></span>
			</h1>
			<h2 class="sl-contact-hero__heading"><?php esc_html_e( "We're here to help!", 'succeedlearn-amp' ); ?></h2>
			<p class="sl-contact-hero__lead"><?php esc_html_e( 'Got questions or feedback?', 'succeedlearn-amp' ); ?></p>
			<p class="sl-contact-hero__desc"><?php esc_html_e( 'Our dedicated support team is available to assist you with any inquiries or concerns you may have. We strive to provide prompt and helpful assistance to ensure your learning experience with us is seamless and enjoyable.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-contact-hero__email">
				<span class="sl-contact-hero__email-label"><?php esc_html_e( 'Email Us:', 'succeedlearn-amp' ); ?></span>
				<a href="mailto:info@succeedtech.com">info@succeedtech.com</a>
			</div>
		</div>
		<div class="sl-contact-hero__media">
			<amp-img
				src="<?php echo esc_url( $hero_img ); ?>"
				width="720"
				height="640"
				layout="responsive"
				alt="<?php esc_attr_e( 'SucceedLEARN team ready to help', 'succeedlearn-amp' ); ?>"
			></amp-img>
		</div>
	</div>
</section>
