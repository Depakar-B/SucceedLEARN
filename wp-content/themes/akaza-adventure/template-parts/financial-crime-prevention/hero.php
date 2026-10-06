<?php
/**
 * Financial Crime Prevention — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/10/insider_trading_risk_puzzle_20261006.webp';

$hero_points = array(
	__( 'Scenario-based eLearning', 'akaza-adventure' ),
	__( 'Eight compliance courses', 'akaza-adventure' ),
	__( 'Practical employee awareness', 'akaza-adventure' ),
);
?>
<section class="sl-fcp-hero" aria-labelledby="sl-fcp-hero-title">
	<img
		class="sl-fcp-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'Financial crime prevention training for employees', 'akaza-adventure' ); ?>"
		loading="eager"
		fetchpriority="high"
		decoding="async"
	>

	<div class="container">
		<?php
		if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
			akaza_render_hero_breadcrumbs();
		}
		?>

		<div class="sl-fcp-hero__grid">
			<div class="sl-fcp-hero__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Financial Crime Prevention Training', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-fcp-hero-title">
					<?php esc_html_e( 'Financial Crime Prevention', 'akaza-adventure' ); ?>
					<span class="sl-fcp-highlight"><?php esc_html_e( 'eLearning Compliance Suite', 'akaza-adventure' ); ?></span>
				</h1>

				<p class="sl-fcp-hero__intro">
					<?php esc_html_e( 'Practical compliance eLearning that helps employees recognise key risks, understand warning signs and respond appropriately in real workplace situations.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Explore a connected suite covering financial crime, ethical conduct and emerging compliance risks across the organisation.', 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-fcp-hero__points">
					<?php foreach ( $hero_points as $point ) : ?>
						<li><?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>

				<div class="sl-fcp-cta-row">
					<a href="#suite" class="sl-fcp-cta sl-fcp-cta--solid" data-cta="fcp-explore">
						<?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?>
					</a>
					<a href="#contact" class="sl-fcp-cta sl-fcp-cta--outline" data-cta="fcp-demo">
						<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
