<?php
/**
 * UK Cyber Essentials AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: succeedlearn_amp_get_ukce_page_title();

$hero_image = succeedlearn_amp_get_ukce_hero_image();
?>
<section class="sl-ukce-hero" aria-labelledby="sl-ukce-hero-title">
	<div class="sl-wrap">
		<div class="sl-ukce-hero__top">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
			}
			?>

			<span class="sl-home-sub-heading sl-ukce-hero__eyebrow">
				<?php esc_html_e( 'UK Cyber Essentials · Employee Security Awareness', 'succeedlearn-amp' ); ?>
			</span>

			<h1 id="sl-ukce-hero-title">
				<?php
				echo wp_kses(
					__( 'Information Security Awareness Training for <span>UK Cyber Essentials</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h1>
		</div>

		<div class="sl-ukce-hero__grid">
			<div class="sl-ukce-hero__content">
				<h2 class="sl-hero-h2 sl-ukce-hero__subheading">
					<?php esc_html_e( 'Build Employee Security Awareness That Supports Cyber Essentials', 'succeedlearn-amp' ); ?>
				</h2>

				<p class="sl-ukce-hero__description">
					<?php esc_html_e( 'SucceedLEARN’s Information Security Awareness Training for UK Cyber Essentials provides practical employee awareness around the security behaviors most relevant to the Cyber Essentials control environment.', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-ukce-hero__description">
					<?php esc_html_e( 'Through focused learning on account security, malware, remote working and other supporting cyber-risk topics, employees gain practical knowledge that can complement the organization\'s wider Cyber Essentials programme.', 'succeedlearn-amp' ); ?>
				</p>

				<div class="sl-hero-actions sl-ukce-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="ukce-hero-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
					</button>

					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-secondary"
						data-cta="ukce-hero-modules"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'security-awareness-modules' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Explore Modules', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>

			<div class="sl-ukce-hero__visual">
				<div class="sl-ukce-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="720"
						height="800"
						layout="responsive"
						alt="<?php esc_attr_e( 'Information Security Awareness Training for UK Cyber Essentials', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
