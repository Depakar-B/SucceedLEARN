<?php
/**
 * ISAT AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: succeedlearn_amp_get_isat_page_title();

$hero_image = succeedlearn_amp_get_isat_hero_image();
?>
<section class="sl-isat-hero" aria-labelledby="sl-isat-hero-title">
	<div class="sl-wrap">
		<div class="sl-isat-hero__top">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
			}
			?>

			<span class="sl-home-sub-heading sl-isat-hero__eyebrow">
				<?php esc_html_e( 'Security Awareness', 'succeedlearn-amp' ); ?>
			</span>

			<h1 id="sl-isat-hero-title">
				<?php esc_html_e( 'Information Security Awareness Training', 'succeedlearn-amp' ); ?>
			</h1>
		</div>

		<div class="sl-isat-hero__grid">
			<div class="sl-isat-hero__content">
				<h2 class="sl-hero-h2 sl-isat-hero__subheading">
					<?php esc_html_e( 'Build a Security-Aware Workforce. Reduce Human-Led Cyber Risk.', 'succeedlearn-amp' ); ?>
				</h2>

				<p class="sl-isat-hero__description">
					<?php esc_html_e( 'Equip employees with the practical knowledge they need to recognize cyber threats, protect organizational information, and make safer security decisions every day.', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-isat-hero__description">
					<?php esc_html_e( 'SucceedLEARN\'s Information Security Awareness Training is an employee-focused eLearning course designed to help organizations strengthen information security awareness and support their security and compliance requirements.', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-isat-hero__description">
					<?php esc_html_e( 'Through 10 focused security sub awareness modules, employees build practical knowledge across account security, social engineering, malware, data classification, physical security, remote working, third-party risk, insider threats, incident reporting and emerging AI-based attacks.', 'succeedlearn-amp' ); ?>
				</p>

				<div class="sl-isat-hero__meta" aria-label="<?php esc_attr_e( 'Course details', 'succeedlearn-amp' ); ?>">
					<span class="sl-isat-hero__meta-item">
						<strong><?php esc_html_e( 'Course Category:', 'succeedlearn-amp' ); ?></strong>
						<?php esc_html_e( 'Security Awareness', 'succeedlearn-amp' ); ?>
					</span>
				</div>

				<div class="sl-hero-actions sl-isat-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="isat-hero-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
					</button>

					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-secondary"
						data-cta="isat-hero-modules"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'information-security-awareness-modules' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Explore Modules', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>

			<div class="sl-isat-hero__media">
				<div class="sl-isat-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="720"
						height="540"
						layout="responsive"
						alt="<?php esc_attr_e( 'Information Security Awareness Training for employees', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
