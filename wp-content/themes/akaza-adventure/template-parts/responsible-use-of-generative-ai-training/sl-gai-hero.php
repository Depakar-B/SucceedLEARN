<?php
/**
 * Responsible Use of Generative AI Training - Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-gai-hero"
	aria-labelledby="sl-gai-hero-title"
>
	<div class="container">

		<?php
		if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
			akaza_render_hero_breadcrumbs();
		}
		?>

		<div class="sl-gai-hero__grid">

			<div class="sl-gai-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Global HR Compliance Suite', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-gai-hero-title">
					<?php esc_html_e( 'Responsible Use of Generative AI Training', 'akaza-adventure' ); ?>
				</h1>

				<h2 class="sl-hero-h2">
					<?php esc_html_e( 'Build confidence around everyday AI use', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php esc_html_e( 'Generative AI can help employees draft, explore ideas, create images and work with information more efficiently. It can also produce inaccurate output, introduce copyright or regulatory concerns, and expose organisational information when used without appropriate care.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'SucceedLEARN’s Responsible Use of Generative AI Training gives employees a practical foundation for using GenAI tools with greater awareness. The course introduces how generative AI works, where it may be applied and the safeguards employees should consider before relying on its output or connecting it to workplace systems.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'It is designed to support', 'akaza-adventure' ); ?>
					<span class="sl-gai-hero__accent"><?php esc_html_e( 'responsible judgement', 'akaza-adventure' ); ?></span>
					<?php esc_html_e( 'without requiring learners to have a technical background.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-hero-actions sl-gai-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true"></span>
					</a>

					<a class="sl-hero-btn sl-hero-btn-secondary" href="#course-topics">
						<?php esc_html_e( 'View Course Topics', 'akaza-adventure' ); ?>
					</a>
				</div>

			</div>

			<div class="sl-gai-hero__media">
				<div class="sl-gai-hero__image-placeholder" aria-hidden="true">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
