<?php
/**
 * Code of Conduct — Hero Section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_hero_image_path = WP_CONTENT_DIR . '/uploads/2026/08/Interactive-compliance-learning.webp';
$coc_hero_image_url  = file_exists( $coc_hero_image_path )
	? content_url( '/uploads/2026/08/Interactive-compliance-learning.webp' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/08/Interactive-compliance-learning.webp';
?>

<section
	class="sl-code-of-conduct-hero"
	aria-labelledby="sl-code-of-conduct-hero-title"
>
	<div class="container">

		<div class="sl-code-of-conduct-hero__grid">

			<!-- Hero Content -->
			<div class="sl-code-of-conduct-hero__content">

				<div class="sl-code-of-conduct-hero__breadcrumb">
					<span>
						<?php esc_html_e( 'Home / Code of Conduct', 'akaza-adventure' ); ?>
					</span>
				</div>

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Interactive compliance learning', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-code-of-conduct-hero-title">
					<?php
					echo wp_kses(
						sprintf(
							/* translators: %s: highlighted word "policy" */
							__( 'Interactive Code of Conduct eLearning training that turns %s into everyday behavior', 'akaza-adventure' ),
							'<span class="sl-code-of-conduct-hero__highlight">' . esc_html__( 'policy', 'akaza-adventure' ) . '</span>'
						),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					);
					?>
				</h1>

				<p class="sl-code-of-conduct-hero__lead">
					<?php
					esc_html_e(
						'Build a workplace where employees understand not only what your Code of Conduct says, but how to apply it when real situations arise.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-code-of-conduct-hero__actions sl-hero-actions">

					<a
						class="sl-hero-btn sl-hero-btn-primary"
						href="#brochure"
						data-cta="coc-hero-brochure"
					>
						<?php esc_html_e( 'Download Brochure', 'akaza-adventure' ); ?>
					</a>

					<a
						class="sl-hero-btn sl-hero-btn-secondary"
						href="#preview"
					>
						<?php esc_html_e( 'Watch Course Preview', 'akaza-adventure' ); ?>
						<svg
							class="sl-code-of-conduct-hero__button-icon"
							width="12"
							height="14"
							viewBox="0 0 12 14"
							fill="currentColor"
							aria-hidden="true"
							focusable="false"
						>
							<path d="M0 0v14l12-7L0 0z" />
						</svg>
					</a>

				</div>

			</div>


			<!-- Hero Visual -->
			<div class="sl-code-of-conduct-hero__visual">

				<div class="sl-code-of-conduct-hero__image">
					<img
						src="<?php echo esc_url( $coc_hero_image_url ); ?>"
						alt="<?php esc_attr_e( 'Colleagues reviewing Code of Conduct training together in the workplace', 'akaza-adventure' ); ?>"
						width="1200"
						height="800"
						loading="eager"
						decoding="async"
					/>
				</div>

				<div class="sl-code-of-conduct-hero__floating-label">

					<span class="sl-code-of-conduct-hero__status-dot"></span>

					<span>
						<?php esc_html_e( 'Real workplace decisions', 'akaza-adventure' ); ?>
					</span>

				</div>

			</div>

			<!-- Interactive assessment — centered between columns -->
			<div
				class="sl-code-of-conduct-hero__assessment"
				data-code-of-conduct-assessment
			>

				<div class="sl-code-of-conduct-hero__assessment-top">

					<span class="sl-code-of-conduct-hero__assessment-category">
						<?php esc_html_e( 'Gifts & Hospitality', 'akaza-adventure' ); ?>
					</span>

					<span class="sl-code-of-conduct-hero__assessment-label">
						<?php esc_html_e( 'Decision point', 'akaza-adventure' ); ?>
					</span>

				</div>

				<h3 class="sl-code-of-conduct-hero__question">
					<?php
					esc_html_e(
						'A supplier participating in a tender sends you an expensive gift. What should you do?',
						'akaza-adventure'
					);
					?>
				</h3>

				<div class="sl-code-of-conduct-hero__options">

					<button
						type="button"
						class="sl-code-of-conduct-hero__option"
						data-answer="wrong"
					>
						<?php esc_html_e( 'Accept it — the tender decision is not final.', 'akaza-adventure' ); ?>
					</button>

					<button
						type="button"
						class="sl-code-of-conduct-hero__option"
						data-answer="correct"
					>
						<?php esc_html_e( 'Decline it and disclose the situation.', 'akaza-adventure' ); ?>
					</button>

					<button
						type="button"
						class="sl-code-of-conduct-hero__option"
						data-answer="wrong"
					>
						<?php esc_html_e( 'Accept it once the tender is complete.', 'akaza-adventure' ); ?>
					</button>

				</div>

				<div
					class="sl-code-of-conduct-hero__feedback"
					aria-live="polite"
				></div>

			</div>

		</div>

	</div>
</section>