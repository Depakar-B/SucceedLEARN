<?php
/**
 * GWCT AMP — Hero section.
 *
 * Button fills: global-ui.php (.sl-btn--primary / .sl-btn--secondary).
 * Layout classes: .sl-gwct-hero__cta* in styles/gwct.php.
 * Desktop: right-bleed image with soft left fade (matches theme).
 *
 * Expected vars: $page_title, $hero_img
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section
	class="sl-section sl-gwct-hero"
	aria-labelledby="sl-gwct-hero-title"
>
	<div class="sl-wrap sl-gwct-hero__wrap">
		<div class="sl-gwct-hero__content">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( $page_title );
			}
			?>

			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'HR Compliance training', 'succeedlearn-amp' ); ?>
			</span>

			<h1 id="sl-gwct-hero-title">
				<?php echo esc_html( $page_title ); ?>
			</h1>

			<h2 class="sl-gwct-hero__tagline">
				<?php esc_html_e( 'Build Workplaces Where People and Performance Thrive', 'succeedlearn-amp' ); ?>
			</h2>

			<p class="sl-gwct-hero__description">
				<?php
				esc_html_e(
					'Whether you’re improving workplace culture, meeting compliance obligations, or preparing your workforce for emerging technologies, SucceedLEARN delivers engaging, scenario-based learning that drives meaningful behaviour change.',
					'succeedlearn-amp'
				);
				?>
			</p>

			<div class="sl-gwct-hero__actions">
				<button
					type="button"
					class="sl-btn sl-btn--primary sl-gwct-hero__cta sl-gwct-hero__cta--primary"
					data-cta="hero-solutions"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'solutions' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Explore Our Solutions', 'succeedlearn-amp' ); ?>
				</button>

				<button
					type="button"
					class="sl-btn sl-btn--secondary sl-gwct-hero__cta sl-gwct-hero__cta--secondary"
					data-cta="hero-demo"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Book a Demo', 'succeedlearn-amp' ); ?>
				</button>
			</div>
		</div>
	</div>

	<?php if ( ! empty( $hero_img ) ) : ?>
		<div class="sl-gwct-hero__visual">
			<div class="sl-gwct-hero__image">
				<amp-img
					src="<?php echo esc_url( $hero_img ); ?>"
					width="1600"
					height="900"
					layout="fill"
					alt="<?php esc_attr_e( 'Hybrid workplace team collaborating during global compliance training', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>
	<?php endif; ?>
</section>
