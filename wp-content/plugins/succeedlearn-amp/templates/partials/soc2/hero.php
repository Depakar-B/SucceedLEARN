<?php
/**
 * SOC 2 AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: succeedlearn_amp_get_soc2_page_title();

$hero_image = succeedlearn_amp_get_soc2_hero_image();
?>
<section class="sl-soc2-hero" aria-labelledby="sl-soc2-hero-title">
	<div class="sl-wrap">
		<div class="sl-soc2-hero__top">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
			}
			?>

			<span class="sl-home-sub-heading sl-soc2-hero__eyebrow">
				<?php esc_html_e( 'SOC 2 · Employee Security Awareness', 'succeedlearn-amp' ); ?>
			</span>

			<h1 id="sl-soc2-hero-title">
				<?php
				echo wp_kses(
					__( 'Information Security Awareness Training for<br><span>SOC 2 Compliance</span>', 'succeedlearn-amp' ),
					array(
						'span' => array(),
						'br'   => array(),
					)
				);
				?>
			</h1>
		</div>

		<div class="sl-soc2-hero__grid">
			<div class="sl-soc2-hero__content">
				<h2 class="sl-hero-h2 sl-soc2-hero__subheading">
					<?php esc_html_e( 'Build Employee Security Awareness That Supports Your SOC 2 Readiness', 'succeedlearn-amp' ); ?>
				</h2>

				<p class="sl-soc2-hero__description">
					<?php esc_html_e( 'SucceedLEARN’s Information Security Awareness Training for SOC 2 Compliance provides practical employee security awareness across the key risk areas most relevant to an organisation’s SOC 2 control environment.', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-soc2-hero__description">
					<?php esc_html_e( 'Through focused learning on account security, data protection, social engineering, malware, insider threats, third-party risk, remote working, physical security and incident reporting, employees build the knowledge needed to make safer security decisions in their everyday work.', 'succeedlearn-amp' ); ?>
				</p>

				<div class="sl-hero-actions sl-soc2-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="soc2-hero-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
					</button>

					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-secondary"
						data-cta="soc2-hero-modules"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'security-awareness-modules' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Explore Modules', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>

			<div class="sl-soc2-hero__visual">
				<div class="sl-soc2-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="720"
						height="800"
						layout="responsive"
						alt="<?php esc_attr_e( 'Information Security Awareness Training for SOC 2 Compliance', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
