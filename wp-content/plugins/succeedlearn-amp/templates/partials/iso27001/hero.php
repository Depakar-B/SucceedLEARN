<?php
/**
 * ISO 27001 AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: succeedlearn_amp_get_iso27001_page_title();

$hero_image = succeedlearn_amp_get_iso27001_hero_image();
?>
<section class="sl-iso27-hero" aria-labelledby="sl-iso27-hero-title">
	<div class="sl-wrap">
		<div class="sl-iso27-hero__top">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
			}
			?>

			<span class="sl-home-sub-heading sl-iso27-hero__eyebrow">
				<?php esc_html_e( 'ISO 27001 Awareness', 'succeedlearn-amp' ); ?>
			</span>

			<h1 id="sl-iso27-hero-title">
				<?php
				echo wp_kses(
					__( 'ISO 27001:<span>2022 Staff Awareness Training</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h1>
		</div>

		<div class="sl-iso27-hero__grid">
			<div class="sl-iso27-hero__content">
				<h2 class="sl-hero-h2 sl-iso27-hero__subheading">
					<?php esc_html_e( 'Build Employee Awareness. Strengthen Your Information Security Management System.', 'succeedlearn-amp' ); ?>
				</h2>

				<p class="sl-iso27-hero__description">
					<?php esc_html_e( 'Help employees understand their information security responsibilities with engaging ISO 27001:2022 staff awareness training designed for today\'s workplace.', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-iso27-hero__description">
					<?php esc_html_e( 'The course introduces employees to ISO/IEC 27001:2022, the Information Security Management System (ISMS), the principles of confidentiality, integrity and availability, information security risks, and the everyday behaviors that help protect organizational information.', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-iso27-hero__description">
					<?php esc_html_e( 'Through practical examples, interactive learning and knowledge checks, employees learn how their actions contribute to information security and the effectiveness of the organization\'s ISMS.', 'succeedlearn-amp' ); ?>
				</p>

				<div class="sl-iso27-hero__meta" aria-label="<?php esc_attr_e( 'Course details', 'succeedlearn-amp' ); ?>">
					<span class="sl-iso27-hero__meta-item">
						<strong><?php esc_html_e( 'Course Category:', 'succeedlearn-amp' ); ?></strong>
						<?php esc_html_e( 'Security Awareness', 'succeedlearn-amp' ); ?>
					</span>
					<span class="sl-iso27-hero__meta-item">
						<strong><?php esc_html_e( 'Total Duration:', 'succeedlearn-amp' ); ?></strong>
						<?php esc_html_e( '30 mins', 'succeedlearn-amp' ); ?>
					</span>
				</div>

				<div class="sl-hero-actions sl-iso27-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="iso27001-hero-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>

			<div class="sl-iso27-hero__media">
				<div class="sl-iso27-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="720"
						height="540"
						layout="responsive"
						alt="<?php esc_attr_e( 'ISO 27001:2022 staff awareness training for employees', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
