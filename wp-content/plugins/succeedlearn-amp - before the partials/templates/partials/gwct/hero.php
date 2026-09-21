<?php
/**
 * GWCT AMP — Hero section.
 *
 * Expected vars: $page_title, $hero_img
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-gwct-hero">
	<div class="sl-wrap sl-gwct-hero__grid">
		<div class="sl-gwct-hero__content">
			<p class="sl-gwct-hero__eyebrow"><?php esc_html_e( 'HR Compliance training', 'succeedlearn-amp' ); ?></p>
			<h1 class="sl-gwct-hero__title"><?php echo esc_html( $page_title ); ?></h1>
			<p class="sl-gwct-hero__subtitle"><?php esc_html_e( 'Build Workplaces Where People and Performance Thrive', 'succeedlearn-amp' ); ?></p>
			<p class="sl-gwct-hero__desc"><?php esc_html_e( 'Whether you’re improving workplace culture, meeting compliance obligations, or preparing your workforce for emerging technologies, SucceedLEARN delivers engaging, scenario-based learning that drives meaningful behaviour change.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-gwct-hero__actions">
				<button type="button" class="sl-btn sl-btn--primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'solutions' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Explore Our Solutions', 'succeedlearn-amp' ); ?></button>
				<button type="button" class="sl-btn sl-btn--secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Book a Demo', 'succeedlearn-amp' ); ?></button>
			</div>
		</div>
		<div class="sl-gwct-hero__media">
			<amp-img
				src="<?php echo esc_url( $hero_img ); ?>"
				width="1600"
				height="1200"
				layout="responsive"
				alt="<?php esc_attr_e( 'Collaborative team reviewing global workplace compliance training on a laptop', 'succeedlearn-amp' ); ?>"
			></amp-img>
		</div>
	</div>
</section>
