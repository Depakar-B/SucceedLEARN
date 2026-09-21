<?php
/**
 * Preventing the Facilitation of Tax Evasion Training — Hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="course-hero"
	class="sl-tax-evasion-hero"
	aria-labelledby="sl-tax-evasion-hero-title"
>
	<div class="container">

		<div class="sl-tax-evasion-hero__grid">

			<!-- Hero Content -->
			<div class="sl-tax-evasion-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'UK Financial Crime Prevention Training', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-tax-evasion-hero-title">
					<?php esc_html_e( 'Preventing the Facilitation of', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Tax Evasion Training', 'akaza-adventure' ); ?></span>
				</h1>

				<div class="sl-tax-evasion-hero__copy">

					<p>
						<?php
						echo wp_kses_post(
							__( 'SucceedLEARN’s <strong>Preventing the Facilitation of Tax Evasion</strong> training helps senior leaders and relevant employees understand the Criminal Finances Act 2017, recognise tax evasion facilitation risks and understand how those risks can be identified, prevented and reported.', 'akaza-adventure' )
						);
						?>
					</p>

					<p>
						<?php esc_html_e( 'Learners explore tax evasion, risk assessment, due diligence, policy development, communication and training, internal reporting, and ongoing monitoring and review.', 'akaza-adventure' ); ?>
					</p>

				</div>
				<div class="sl-hero-actions">

<a
	class="sl-hero-btn sl-hero-btn-primary"
	href="#course-preview"
>
	<?php esc_html_e( 'Explore the Course', 'akaza-adventure' ); ?>
	<span aria-hidden="true">→</span>
</a>

<a
	class="sl-hero-btn sl-hero-btn-secondary"
	href="#contact"
>
	<?php esc_html_e( 'Buy the Course', 'akaza-adventure' ); ?>
	<span aria-hidden="true">→</span>
</a>

</div>

				<div
					class="sl-tax-evasion-hero__tags"
					aria-label="<?php esc_attr_e( 'Course features', 'akaza-adventure' ); ?>"
				>

					<span class="sl-tax-evasion-hero__tag">
						<?php esc_html_e( 'CPD-Certified', 'akaza-adventure' ); ?>
					</span>

					<span class="sl-tax-evasion-hero__tag">
						<?php esc_html_e( '30-Minute eLearning', 'akaza-adventure' ); ?>
					</span>

					<span class="sl-tax-evasion-hero__tag">
						<?php esc_html_e( 'Knowledge Checks', 'akaza-adventure' ); ?>
					</span>

					<span class="sl-tax-evasion-hero__tag">
						<?php esc_html_e( 'Assessment Included', 'akaza-adventure' ); ?>
					</span>

				</div>

			</div>

			<!-- Hero Visual -->
			<div
				class="sl-tax-evasion-hero__media"
				aria-label="<?php esc_attr_e( 'Course visual previews', 'akaza-adventure' ); ?>"
			>

				<!-- Main Course Image -->
				<div class="sl-tax-evasion-hero__main-image">

					<div class="sl-tax-evasion-hero__image-placeholder">

						<span class="sl-tax-evasion-hero__placeholder-label">
							<?php esc_html_e( 'Course Image 01', 'akaza-adventure' ); ?>
						</span>

						<strong>
							<?php esc_html_e( 'Main SucceedLEARN Course Screen', 'akaza-adventure' ); ?>
						</strong>

					</div>

				</div>

				<!-- Knowledge Check Image -->
				<div class="sl-tax-evasion-hero__secondary-image">

					<div class="sl-tax-evasion-hero__image-placeholder">

						<span class="sl-tax-evasion-hero__placeholder-label">
							<?php esc_html_e( 'Course Image 02', 'akaza-adventure' ); ?>
						</span>

						<strong>
							<?php esc_html_e( 'Knowledge Check / Assessment', 'akaza-adventure' ); ?>
						</strong>

					</div>

				</div>

				<!-- CPD Badge -->
				<div
					class="sl-tax-evasion-hero__cpd"
					aria-label="<?php esc_attr_e( 'Approved CPD logo placeholder', 'akaza-adventure' ); ?>"
				>

					<span>
						<?php esc_html_e( 'APPROVED', 'akaza-adventure' ); ?>
					</span>

					<strong>
						<?php esc_html_e( 'CPD', 'akaza-adventure' ); ?>
					</strong>

					<span>
						<?php esc_html_e( 'LOGO', 'akaza-adventure' ); ?>
					</span>

				</div>

			</div>

		</div>

	</div>
</section>