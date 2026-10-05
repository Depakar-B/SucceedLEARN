<?php
/**
 * Anti-Bribery and Anti-Corruption eLearning Hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/ABAC_Hero-section-image.webp';
?>

<section
	id="anti-bribery-hero"
	class="sl-anti-bribery-hero"
	aria-labelledby="sl-anti-bribery-hero-title"
>

	<img
		class="sl-anti-bribery-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'Anti-bribery and anti-corruption training journey', 'akaza-adventure' ); ?>"
		loading="eager"
		fetchpriority="high"
		decoding="async"
	>

	<div class="sl-anti-bribery-hero__container">

		<div class="sl-anti-bribery-hero__grid">

			<!-- =====================================================
			     Hero Content
			====================================================== -->

			<div class="sl-anti-bribery-hero__content">

				<span class="sl-home-sub-heading">
					CPD-Certified Compliance eLearning
				</span>

				<h1 id="sl-anti-bribery-hero-title">
					Anti-Bribery and Anti-Corruption eLearning
				</h1>

				<div class="sl-anti-bribery-hero__description">

					<p>
						Help employees recognise, resist and report bribery risks. Explore UK Bribery Act 2010 and US Foreign Corrupt Practices Act (FCPA) content in our UK ABAC course, alongside India-focused learning and options tailored to your organisation.
					</p>

				</div>

				<div class="sl-hero-actions">

					<a
						class="sl-hero-btn sl-hero-btn-primary"
						href="#course-options"
					>
						Explore the course
						<span aria-hidden="true">→</span>
					</a>

					<a
						class="sl-hero-btn sl-hero-btn-secondary"
						href="#contact"
					>
						Buy the course
					</a>

				</div>

				<!-- =================================================
				     Course Highlights
				================================================== -->

				<ul
					class="sl-anti-bribery-hero__highlights"
					aria-label="Course highlights"
				>

					<li class="sl-anti-bribery-hero__highlight">

						<span class="sl-anti-bribery-hero__highlight-value">
							30 minutes
						</span>

						<span class="sl-anti-bribery-hero__highlight-label">
							Focused learning
						</span>

					</li>

					<li class="sl-anti-bribery-hero__highlight">

						<span class="sl-anti-bribery-hero__highlight-value">
							CPD certified
						</span>

						<span class="sl-anti-bribery-hero__highlight-label">
							Completion certificate
						</span>

					</li>

					<li class="sl-anti-bribery-hero__highlight">

						<span class="sl-anti-bribery-hero__highlight-value">
							SaaS or SCORM
						</span>

						<span class="sl-anti-bribery-hero__highlight-label">
							Flexible delivery
						</span>

					</li>

				</ul>

			</div>

		</div>

	</div>

</section>