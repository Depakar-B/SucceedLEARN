<?php
/**
 * Financial Crime Prevention — Annual suite offer banner.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-fcp-offer" aria-labelledby="sl-fcp-offer-title">
	<div class="container sl-fcp-offer__inner">
		<div class="sl-fcp-offer__content">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Complete Compliance Suite', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-offer-title">
				<?php esc_html_e( 'Avail the whole suite for just', 'akaza-adventure' ); ?>
				<strong><?php esc_html_e( '$18 per user per year', 'akaza-adventure' ); ?></strong>
			</h2>

			<p>
				<?php esc_html_e( 'Give your workforce access to the complete Financial Crime Prevention eLearning Compliance Suite through one simple annual option.', 'akaza-adventure' ); ?>
			</p>

			<a href="#suite" class="sl-fcp-cta sl-fcp-cta--solid" data-cta="fcp-offer-suite">
				<?php esc_html_e( 'Explore the Full Suite', 'akaza-adventure' ); ?>
			</a>
		</div>

		<div class="sl-fcp-offer__media">
			<img
				class="sl-fcp-offer__image"
				src="<?php echo esc_url( 'https://succeedlearn.com/wp-content/uploads/2026/10/FCP-Homepage_Image-2.webp' ); ?>"
				alt="<?php esc_attr_e( 'Compliance team reviewing financial crime risk reports together', 'akaza-adventure' ); ?>"
				width="1122"
				height="1402"
				loading="lazy"
				decoding="async"
			>
		</div>
	</div>
</section>
