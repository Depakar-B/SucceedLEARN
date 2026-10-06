<?php
/**
 * DPDPA Compliance Training AMP - Hero.
 *
 * @package SucceedLEARN\AMP
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$dpdpa_hero_poster = 'https://succeedlearn.com/wp-content/uploads/2026/10/DPDPA-product-video-thumbnail.webp';
$dpdpa_hero_video  = function_exists( 'get_theme_file_uri' )
	? get_theme_file_uri( '/assets/videos/dpdpa/dpdpa-course-overview.mp4' )
	: content_url( '/themes/akaza-adventure/assets/videos/dpdpa/dpdpa-course-overview.mp4' );
?>
<section class="sl-section sl-dpdpa-hero" aria-labelledby="sl-dpdpa-hero-title">
	<div class="sl-wrap">
		<?php
		if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
			succeedlearn_amp_render_hero_breadcrumbs( __( 'DPDPA Compliance Training', 'succeedlearn-amp' ) );
		}
		?>
		<h1 id="sl-dpdpa-hero-title">
			<?php esc_html_e( 'DPDPA compliance training that turns every employee into a ', 'succeedlearn-amp' ); ?><span><?php esc_html_e( 'data safeguard', 'succeedlearn-amp' ); ?></span>
		</h1>
		<div class="sl-dpdpa-hero__grid">
			<div class="sl-dpdpa-hero__copy">
				<p class="sl-dpdpa-hero__lede"><?php echo wp_kses_post( __( 'A short, animated course that shows your people <strong>how to handle personal data</strong> the way the DPDP Act, 2023 expects.', 'succeedlearn-amp' ) ); ?></p>
				<ul class="sl-list sl-dpdpa-hero__points">
					<li class="sl-list-item sl-dpdpa-hero__point"><span aria-hidden="true">✓</span><span><?php esc_html_e( 'About 25 minutes, self-paced', 'succeedlearn-amp' ); ?></span></li>
					<li class="sl-list-item sl-dpdpa-hero__point"><span aria-hidden="true">✓</span><span><?php esc_html_e( 'Build safer data-handling habits', 'succeedlearn-amp' ); ?></span></li>
					<li class="sl-list-item sl-dpdpa-hero__point"><span aria-hidden="true">✓</span><span><?php esc_html_e( 'Verified certificate on completion', 'succeedlearn-amp' ); ?></span></li>
				</ul>
				<div class="sl-dpdpa-hero__security">
					<h2><?php esc_html_e( 'Built on a secure platform', 'succeedlearn-amp' ); ?></h2>
					<div class="sl-dpdpa-hero__badges" aria-label="<?php esc_attr_e( 'Platform security and privacy standards', 'succeedlearn-amp' ); ?>">
						<span>ISO 27001</span><span>SOC 2</span><span>GDPR</span>
					</div>
				</div>
			</div>
			<div class="sl-dpdpa-hero__media">
				<div class="sl-dpdpa-hero__video">
					<amp-video
						src="<?php echo esc_url( $dpdpa_hero_video ); ?>"
						poster="<?php echo esc_url( $dpdpa_hero_poster ); ?>"
						width="16"
						height="9"
						layout="responsive"
						controls
						title="<?php esc_attr_e( 'DPDPA course overview video', 'succeedlearn-amp' ); ?>"
					>
						<div fallback>
							<p><?php esc_html_e( 'Your browser does not support HTML5 video.', 'succeedlearn-amp' ); ?></p>
						</div>
					</amp-video>
				</div>
				<p class="sl-dpdpa-hero__video-caption"><?php esc_html_e( 'Watch the 74-second course overview', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>
		<div class="sl-dpdpa-hero__actions">
			<button type="button" class="sl-hero-btn sl-hero-btn-primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'book' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Book a 20-min demo', 'succeedlearn-amp' ); ?></button>
			<a class="sl-hero-btn sl-hero-btn-secondary" href="<?php echo esc_url( home_url( '/dpdpa-readiness-landing/' ) ); ?>"><?php esc_html_e( 'Check your DPDPA readiness', 'succeedlearn-amp' ); ?></a>
		</div>
	</div>
</section>
