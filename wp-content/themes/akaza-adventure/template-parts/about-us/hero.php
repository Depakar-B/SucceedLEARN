<?php
/**
 * About Us — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_url = function_exists( 'akaza_page_url' ) ? akaza_page_url( 'contact-us' ) : home_url( '/contact-us/' );
?>
<section class="sl-about-hero" aria-labelledby="sl-about-hero-title">
	<div class="sl-about-hero__container">

		<div class="sl-about-hero__content">

			<?php
			if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
				akaza_render_hero_breadcrumbs();
			}
			?>

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'About SucceedLearn', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-about-hero-title" class="sl-about-hero__title">
				<?php esc_html_e( 'Empowering Better Learning,', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Building Better Compliance.', 'akaza-adventure' ); ?></span>
			</h1>

			<p class="sl-about-hero__description">
				<?php
				echo wp_kses(
					sprintf(
						/* translators: %s: company name */
						__( 'SucceedLEARN is a product of %s, created to revolutionize how people learn online and simplify compliance eLearning for organizations across the globe.', 'akaza-adventure' ),
						'<strong>Succeed Technologies®</strong>'
					),
					array( 'strong' => array() )
				);
				?>
			</p>

			<p class="sl-about-hero__description sl-about-hero__description--secondary">
				<?php esc_html_e( 'With expertise in corporate training, adult learning, instructional design and multiple industries, we create engaging and impactful learning experiences that make compliance training easier, smarter and more enjoyable.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-about-hero__actions sl-hero-actions">
				<a href="<?php echo esc_url( $contact_url ); ?>" class="sl-hero-btn sl-hero-btn-primary" data-cta="about-contact">
					<?php esc_html_e( 'Get in Touch', 'akaza-adventure' ); ?>
				</a>
			</div>

		</div>

		<div class="sl-about-hero__visual" aria-hidden="true">

			<div class="sl-about-hero__glow"></div>

			<div class="sl-about-hero__card sl-about-hero__card--main">
				<div class="sl-about-hero__icon">
					<span>✓</span>
				</div>
				<div class="sl-about-hero__card-content">
					<span class="sl-about-hero__card-label">
						<?php esc_html_e( 'Compliance Learning', 'akaza-adventure' ); ?>
					</span>
					<h3>
						<?php esc_html_e( 'Learn. Engage.', 'akaza-adventure' ); ?>
						<span><?php esc_html_e( 'Succeed.', 'akaza-adventure' ); ?></span>
					</h3>
				</div>
			</div>

			<div class="sl-about-hero__card sl-about-hero__card--small sl-about-hero__card--top">
				<span class="sl-about-hero__mini-icon">✦</span>
				<div>
					<strong>30+</strong>
					<small><?php esc_html_e( 'Languages', 'akaza-adventure' ); ?></small>
				</div>
			</div>

			<div class="sl-about-hero__card sl-about-hero__card--small sl-about-hero__card--bottom">
				<span class="sl-about-hero__mini-icon">◎</span>
				<div>
					<strong><?php esc_html_e( 'eLearning', 'akaza-adventure' ); ?></strong>
					<small><?php esc_html_e( 'Made Engaging', 'akaza-adventure' ); ?></small>
				</div>
			</div>

		</div>

	</div>
</section>
