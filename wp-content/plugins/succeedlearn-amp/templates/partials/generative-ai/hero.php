<?php
/**
 * Generative AI AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: succeedlearn_amp_get_gai_page_title();
?>
<section class="sl-gai-hero" aria-labelledby="sl-gai-hero-title">
	<div class="sl-wrap">
		<?php
		if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
			succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
		}
		?>

		<div class="sl-gai-hero__grid">
			<div class="sl-gai-hero__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Global HR Compliance Suite', 'succeedlearn-amp' ); ?></span>

				<h1 id="sl-gai-hero-title">
					<?php esc_html_e( 'Responsible Use of Generative AI Training', 'succeedlearn-amp' ); ?>
				</h1>

				<h2 class="sl-hero-h2 sl-gai-hero__subheading">
					<?php esc_html_e( 'Build confidence around everyday AI use', 'succeedlearn-amp' ); ?>
				</h2>

				<p>
					<?php esc_html_e( 'Generative AI can help employees draft, explore ideas, create images and work with information more efficiently. It can also produce inaccurate output, introduce copyright or regulatory concerns, and expose organisational information when used without appropriate care.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'SucceedLEARN\'s Responsible Use of Generative AI Training gives employees a practical foundation for using GenAI tools with greater awareness. The course introduces how generative AI works, where it may be applied and the safeguards employees should consider before relying on its output or connecting it to workplace systems.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'It is designed to support', 'succeedlearn-amp' ); ?>
					<span class="sl-gai-hero__accent"><?php esc_html_e( 'responsible judgement', 'succeedlearn-amp' ); ?></span>
					<?php esc_html_e( 'without requiring learners to have a technical background.', 'succeedlearn-amp' ); ?>
				</p>

				<div class="sl-hero-actions sl-gai-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="hero-trial"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>

					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-secondary"
						data-cta="hero-topics"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'course-topics' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'View Course Topics', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>

			<div class="sl-gai-hero__media">
				<div class="sl-gai-hero__image-placeholder" aria-hidden="true">
					<span><?php esc_html_e( 'Image Placeholder', 'succeedlearn-amp' ); ?></span>
				</div>
			</div>
		</div>
	</div>
</section>
