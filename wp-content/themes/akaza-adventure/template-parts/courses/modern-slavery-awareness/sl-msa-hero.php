<?php
/**
 * Modern Slavery Awareness — Hero.
 *
 * Full-bleed background image pattern (matches PE/VC homepage hero).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Modern-Slavery-Image_Hero-section.webp';
?>

<section class="msa-hero" aria-labelledby="msa-hero-title">
	<img
		class="msa-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'Modern slavery risk across offices, factories, construction sites and public buildings', 'akaza-adventure' ); ?>"
		decoding="async"
		fetchpriority="high"
	>

	<div class="msa-container">
		<div class="msa-hero__content">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'UK Compliance Training', 'akaza-adventure' ); ?></span>

			<h1 id="msa-hero-title">
				<?php esc_html_e( 'Modern Slavery Awareness Training', 'akaza-adventure' ); ?>
				<span class="msa-highlight"><?php esc_html_e( 'for UK Organisations', 'akaza-adventure' ); ?></span>
			</h1>

			<div class="msa-hero__tagline">
				<?php esc_html_e( 'Recognise the signs. Report concerns appropriately.', 'akaza-adventure' ); ?>
			</div>

			<p class="msa-hero__copy">
				<?php esc_html_e( 'A concise UK-focused course that helps employees understand modern slavery, recognise possible warning signs and know how to respond through the appropriate internal channels.', 'akaza-adventure' ); ?>
			</p>

			<ul class="msa-hero__pointers">
				<li><?php esc_html_e( 'Practical workplace scenarios', 'akaza-adventure' ); ?></li>
				<li><?php esc_html_e( 'Optional procurement and vendor-selection pathway', 'akaza-adventure' ); ?></li>
			</ul>

			<div class="msa-cta-row">
				<a href="#explore" class="msa-cta msa-cta--outline"><?php esc_html_e( 'Explore the course', 'akaza-adventure' ); ?></a>
				<a href="#buy-course" class="msa-cta msa-cta--solid"><?php esc_html_e( 'Buy the course', 'akaza-adventure' ); ?></a>
			</div>
		</div>
	</div>
</section>
