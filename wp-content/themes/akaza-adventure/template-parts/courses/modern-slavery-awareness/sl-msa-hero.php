<?php
/**
 * Modern Slavery Awareness — Hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = '';
?>

<section class="msa-hero" aria-labelledby="msa-hero-title">
	<div class="msa-container msa-hero__grid">

		<div>
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

		<div class="msa-hero__visual">
			<?php if ( $hero_image ) : ?>
				<img
					class="msa-hero__image"
					src="<?php echo esc_url( $hero_image ); ?>"
					alt="<?php esc_attr_e( 'UK professionals discussing responsible business and modern slavery awareness', 'akaza-adventure' ); ?>"
					loading="eager"
					fetchpriority="high"
					decoding="async"
				>
			<?php else : ?>
				<div class="msa-hero__image-fallback">
					<div>
						<strong><?php esc_html_e( 'Modern Slavery Awareness', 'akaza-adventure' ); ?></strong>
						<p><?php esc_html_e( 'Image holder: UK professionals reviewing workplace, supplier or responsible-business risk.', 'akaza-adventure' ); ?></p>
					</div>
				</div>
			<?php endif; ?>

			<div class="msa-hero__card">
				<strong><?php esc_html_e( 'Recognise → Record → Report', 'akaza-adventure' ); ?></strong>
				<p><?php esc_html_e( 'Practical awareness designed to support an appropriate workplace response.', 'akaza-adventure' ); ?></p>
			</div>
		</div>

	</div>
</section>
