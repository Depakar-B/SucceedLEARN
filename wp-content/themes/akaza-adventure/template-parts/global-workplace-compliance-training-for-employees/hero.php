<?php
/**
 * Global Workplace Compliance Training for Employees — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/08/Collaborative-Compliance-Learning.png' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/08/Collaborative-Compliance-Learning.png';
?>
<section class="sl-global-hero">

	<div class="container">

		<div class="row sl-global-hero-row align-items-stretch">

			<div class="col-lg-6">

				<?php
				if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
					akaza_render_hero_breadcrumbs();
				}
				?>

				<div class="sl-global-hero-content">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'HR Compliance training', 'akaza-adventure' ); ?>
					</span>

					<h1>
						<?php esc_html_e( 'Global Workplace Compliance Training for Employees', 'akaza-adventure' ); ?>
					</h1>

					<h2 class="sl-global-hero__tagline">
						<?php esc_html_e( 'Build Workplaces Where People and Performance Thrive', 'akaza-adventure' ); ?>
					</h2>

					<p>
						<?php esc_html_e( 'Whether you’re improving workplace culture, meeting compliance obligations, or preparing your workforce for emerging technologies, SucceedLEARN delivers engaging, scenario-based learning that drives meaningful behaviour change.', 'akaza-adventure' ); ?>
					</p>

					<div class="sl-global-hero-buttons sl-hero-actions">

						<a href="#solutions" class="sl-hero-btn sl-hero-btn-primary">
							<?php esc_html_e( 'Explore Our Solutions', 'akaza-adventure' ); ?>
						</a>

						<a href="#contact" class="sl-hero-btn sl-hero-btn-secondary">
							<?php esc_html_e( 'Book a Demo', 'akaza-adventure' ); ?>
						</a>

					</div>

				</div>

			</div>

			<div class="col-lg-6">

				<div class="sl-global-hero-image">

					<picture>
						<img
							src="<?php echo esc_url( $hero_image ); ?>"
							alt="<?php esc_attr_e( 'Collaborative team reviewing global workplace compliance training on a laptop', 'akaza-adventure' ); ?>"
							width="1600"
							height="1200"
							loading="eager"
							fetchpriority="high"
							decoding="async"
						>
					</picture>

				</div>

			</div>

		</div>

	</div>

</section>
