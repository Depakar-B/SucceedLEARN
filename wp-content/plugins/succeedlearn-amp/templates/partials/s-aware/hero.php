<?php
/**
 * S-Aware AMP — Hero (single column; image at end).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title ) ? $page_title : succeedlearn_amp_get_sa_page_title();
$hero_image = succeedlearn_amp_get_sa_hero_image();
?>
<section class="sl-saware-hero" aria-labelledby="sl-saware-hero-title">
	<div class="sl-wrap">
		<?php
		if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
			succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
		}
		?>
		<div class="sl-saware-hero__stack">
			<div class="sl-saware-hero__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'S-Aware', 'succeedlearn-amp' ); ?></span>
				<h1 id="sl-saware-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
				<h2 class="sl-hero-h2 sl-saware-hero__subheading">
					<?php esc_html_e( 'Security Awareness Training That Builds the Foundation for', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Lasting Behaviour Change', 'succeedlearn-amp' ); ?></span>
				</h2>
				<p><?php esc_html_e( 'Equip employees with the knowledge and practical understanding they need to recognise cyber risks, make informed security decisions, and contribute to a stronger security culture.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'S-Aware delivers engaging, scenario-based security and privacy awareness training designed to help organisations move beyond compliance-driven learning and build the knowledge foundation for continuous security behaviour change.', 'succeedlearn-amp' ); ?></p>
				<div class="sl-hero-actions sl-saware-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="hero-trial"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>
			<div class="sl-saware-hero__media">
				<div class="sl-saware-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="720"
						height="900"
						layout="responsive"
						alt="<?php esc_attr_e( 'Security awareness training', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
