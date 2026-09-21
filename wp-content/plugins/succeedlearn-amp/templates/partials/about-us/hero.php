<?php
/**
 * About Us AMP — Hero section.
 *
 * Expected vars: $contact_amp
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-about-hero">
	<div class="sl-wrap sl-about-hero__grid">
		<div class="sl-about-hero__content">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( __( 'About Us', 'succeedlearn-amp' ) );
			}
			?>
			<p class="sl-about-hero__eyebrow"><?php esc_html_e( 'About SucceedLearn', 'succeedlearn-amp' ); ?></p>
			<h1 class="sl-about-hero__title">
				<?php esc_html_e( 'Empowering Better Learning,', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Building Better Compliance.', 'succeedlearn-amp' ); ?></span>
			</h1>
			<p class="sl-about-hero__desc">
				<?php
				echo wp_kses(
					sprintf(
						/* translators: %s: company name */
						__( 'SucceedLEARN is a product of %s, created to revolutionize how people learn online and simplify compliance eLearning for organizations across the globe.', 'succeedlearn-amp' ),
						'<strong>Succeed Technologies®</strong>'
					),
					array( 'strong' => array() )
				);
				?>
			</p>
			<p class="sl-about-hero__desc"><?php esc_html_e( 'With expertise in corporate training, adult learning, instructional design and multiple industries, we create engaging and impactful learning experiences that make compliance training easier, smarter and more enjoyable.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-about-hero__actions">
				<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $contact_amp ); ?>" data-cta="about-contact"><?php esc_html_e( 'Get in Touch', 'succeedlearn-amp' ); ?></a>
			</div>
		</div>
		<div class="sl-about-hero__visual" aria-hidden="true">
			<div class="sl-about-hero__card sl-about-hero__card--main">
				<div class="sl-about-hero__icon"><span>✓</span></div>
				<div>
					<span class="sl-about-hero__card-label"><?php esc_html_e( 'Compliance Learning', 'succeedlearn-amp' ); ?></span>
					<h3>
						<?php esc_html_e( 'Learn. Engage.', 'succeedlearn-amp' ); ?>
						<span><?php esc_html_e( 'Succeed.', 'succeedlearn-amp' ); ?></span>
					</h3>
				</div>
			</div>
			<div class="sl-about-hero__mini-grid">
				<div class="sl-about-hero__card sl-about-hero__card--small">
					<span class="sl-about-hero__mini-icon">✦</span>
					<div>
						<strong>30+</strong>
						<small><?php esc_html_e( 'Languages', 'succeedlearn-amp' ); ?></small>
					</div>
				</div>
				<div class="sl-about-hero__card sl-about-hero__card--small">
					<span class="sl-about-hero__mini-icon">◎</span>
					<div>
						<strong><?php esc_html_e( 'eLearning', 'succeedlearn-amp' ); ?></strong>
						<small><?php esc_html_e( 'Made Engaging', 'succeedlearn-amp' ); ?></small>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
