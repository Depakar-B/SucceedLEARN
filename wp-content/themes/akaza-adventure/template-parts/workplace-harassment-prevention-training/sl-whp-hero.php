<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention Training
 *
 * Hero Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-harassment-hero"
	id="workplace-harassment-training"
	aria-labelledby="sl-harassment-hero-title"
>

	<div class="container">

		<div class="sl-harassment-hero__grid">

			<!-- =====================================
			     LEFT CONTENT
			===================================== -->

			<div class="sl-harassment-hero__content">

				<div class="sl-harassment-hero__heading">

					<span class="sl-home-sub-heading">
						<?php
						esc_html_e(
							'Global Workplace Compliance Training',
							'akaza-adventure'
						);
						?>
					</span>

					<h1 id="sl-harassment-hero-title">
						<?php
						esc_html_e(
							'Workplace Harassment Prevention Training for Global Teams',
							'akaza-adventure'
						);
						?>
					</h1>

					<h2>
						<?php
						esc_html_e(
							'One workplace standard. Training shaped for every region.',
							'akaza-adventure'
						);
						?>
					</h2>

				</div>


				<div class="sl-harassment-hero__intro">

					<p>
						<?php
						esc_html_e(
							'A workplace policy may apply across your organisation. However, the laws, responsibilities and reporting procedures behind it can change from one location to another.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Employees need to recognise inappropriate conduct. Supervisors need to know when and how to respond. Complaint-handling teams may need a deeper understanding of procedures, confidentiality and fair inquiry.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							"SucceedLEARN's online Workplace Harassment Prevention Training helps organisations assign learning according to each employee's location, role and responsibilities.",
							'akaza-adventure'
						);
						?>
					</p>

				</div>


				<!-- =====================================
				     CTA
				===================================== -->

				<div class="sl-harassment-hero__actions sl-hero-actions">

					<a
						class="sl-hero-btn sl-hero-btn-primary"
						href="#training-by-region"
					>
						<?php
						esc_html_e(
							'Explore Training by Region',
							'akaza-adventure'
						);
						?>

						<span aria-hidden="true">→</span>
					</a>

					<a
						class="sl-hero-btn sl-hero-btn-secondary"
						href="#contact"
					>
						<?php
						esc_html_e(
							'Request a Demo',
							'akaza-adventure'
						);
						?>
					</a>

				</div>

			</div>


			<!-- =====================================
			     RIGHT VISUAL
			===================================== -->

			<div class="sl-harassment-hero__visual">

				<div
					class="sl-harassment-hero__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'Workplace harassment prevention training visual placeholder', 'akaza-adventure' ); ?>"
				>

					<div class="sl-harassment-hero__placeholder-content">

						<span
							class="sl-harassment-hero__placeholder-icon"
							aria-hidden="true"
						>

							<svg
								viewBox="0 0 24 24"
								fill="none"
								focusable="false"
							>
								<path
									d="M12 3.5 19 6v5.5c0 4.3-2.8 7.6-7 9-4.2-1.4-7-4.7-7-9V6l7-2.5Z"
									stroke="currentColor"
									stroke-width="1.6"
									stroke-linejoin="round"
								/>
								<path
									d="m9 12 2 2 4-4"
									stroke="currentColor"
									stroke-width="1.6"
									stroke-linecap="round"
									stroke-linejoin="round"
								/>
							</svg>

						</span>

						<span class="sl-harassment-hero__placeholder-title">
							<?php
							esc_html_e(
								'Hero Image Placeholder',
								'akaza-adventure'
							);
							?>
						</span>

						<span class="sl-harassment-hero__placeholder-size">
							<?php
							esc_html_e(
								'Recommended: 720 × 760 px',
								'akaza-adventure'
							);
							?>
						</span>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>