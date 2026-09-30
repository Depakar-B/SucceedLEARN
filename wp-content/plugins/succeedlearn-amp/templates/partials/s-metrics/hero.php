<?php
/**
 * S-Metrics AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: succeedlearn_amp_get_sm_page_title();

$hero_image = function_exists( 'succeedlearn_amp_get_sm_hero_image' )
	? succeedlearn_amp_get_sm_hero_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/Security-Awareness-Analytics-S-Metrics.webp';
?>
<section class="sl-s-metrics-hero" aria-labelledby="sl-s-metrics-hero-title">
	<div class="sl-wrap">
		<div class="sl-s-metrics-hero__top">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
			}
			?>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'S-Metrics', 'succeedlearn-amp' ); ?></span>
			<h1 id="sl-s-metrics-hero-title">
				<?php esc_html_e( 'Security Awareness Analytics, Reporting & Compliance Dashboard', 'succeedlearn-amp' ); ?>
			</h1>
		</div>

		<div class="sl-s-metrics-hero__grid">
			<div class="sl-s-metrics-hero__content">
				<h2 class="sl-hero-h2 sl-s-metrics-hero__subheading">
					<?php esc_html_e( 'Measure Learning. Track Behaviour. Demonstrate Compliance.', 'succeedlearn-amp' ); ?>
				</h2>

				<p><?php esc_html_e( 'Security awareness programmes generate valuable data across training, phishing simulations, microlearning, gamified learning and reinforcement activities.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'But data alone is not enough.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Organisations need a clear way to understand whether employees are completing assigned learning, how they respond to simulated threats, where engagement is improving, and which areas may require additional attention.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'S-Metrics is the central analytics and reporting layer of the SucceedLEARN Security Behaviour & Culture Suite (SBCS), bringing security awareness data together in one unified reporting environment.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'From learner progress and campaign performance to phishing behaviour and employee engagement, S-Metrics helps security, compliance and learning teams turn programme activity into measurable insight.', 'succeedlearn-amp' ); ?></p>
				<p><strong><?php esc_html_e( 'Measure. Analyse. Improve.', 'succeedlearn-amp' ); ?></strong></p>

				<div class="sl-hero-actions sl-s-metrics-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="hero-trial"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>

			<div class="sl-s-metrics-hero__media">
				<div class="sl-s-metrics-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'Security Awareness Analytics, Reporting & Compliance Dashboard', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
