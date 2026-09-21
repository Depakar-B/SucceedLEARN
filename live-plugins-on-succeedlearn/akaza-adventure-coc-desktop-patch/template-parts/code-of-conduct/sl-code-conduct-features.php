<?php
/**
 * Code of Conduct — Features section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-code-conduct-features"
	aria-labelledby="sl-code-conduct-features-title"
>
	<div class="container">

		<div class="sl-code-conduct-features__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Interactive Code of Conduct Training', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-code-conduct-features-title">
				<?php
				echo wp_kses(
					__( 'Built for learning. <span>Designed for enterprise.</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e(
					'SucceedLEARN’s interactive Code of Conduct training combines realistic workplace scenarios, decision-based learning, assessments and organisation-specific customization to help employees recognize ethical risks and make responsible decisions.',
					'akaza-adventure'
				); ?>
			</p>

		</div>

		<div class="sl-code-conduct-features__grid">

			<!-- 01 -->
			<article class="sl-code-conduct-features__card">

				<div class="sl-code-conduct-features__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img" focusable="false">
						<path d="M16 4v4M9.5 7.5l2.5 2.5M22.5 7.5L20 10M7 15h4M21 15h4" />
						<path d="M12 21h8M14 25h4" />
						<path d="M11 18c-1.8-1.3-3-3.4-3-5.7A8 8 0 0 1 24 12.3c0 2.3-1.2 4.4-3 5.7-.8.6-1 1.3-1 2H12c0-.7-.2-1.4-1-2Z" />
					</svg>
				</div>

				<span class="sl-code-conduct-features__label">
					<?php esc_html_e( 'Scenario-Based Learning', 'akaza-adventure' ); ?>
				</span>

			</article>

			<!-- 02 -->
			<article class="sl-code-conduct-features__card">

				<div class="sl-code-conduct-features__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img" focusable="false">
						<circle cx="16" cy="10" r="4" />
						<path d="M8 26c.7-5 3.5-8 8-8s7.3 3 8 8" />
						<path d="M25 5v6M22 8h6" />
					</svg>
				</div>

				<span class="sl-code-conduct-features__label">
					<?php esc_html_e( 'Customizable', 'akaza-adventure' ); ?>
				</span>

			</article>

			<!-- 03 -->
			<article class="sl-code-conduct-features__card">

				<div class="sl-code-conduct-features__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img" focusable="false">
						<path d="m16 5 11 5-11 5-11-5 11-5Z" />
						<path d="m5 15 11 5 11-5" />
						<path d="m5 20 11 5 11-5" />
					</svg>
				</div>

				<span class="sl-code-conduct-features__label">
					<?php esc_html_e( 'SCORM Compatible', 'akaza-adventure' ); ?>
				</span>

			</article>

			<!-- 04 -->
			<article class="sl-code-conduct-features__card">

				<div class="sl-code-conduct-features__icon" aria-hidden="true">
					<!-- Branding icon: Blue upward arrow with investment-raising tail, styled in SucceedLearn blue (#1472ba) -->
					<svg viewBox="0 0 32 32" role="img" focusable="false">
						<!-- Upward arrowhead (filled, SucceedLearn primary blue) -->
						<polygon points="16,7 23,15 20,15 20,23 12,23 12,15 9,15" fill="#1472ba"/>
						<!-- Arrow tail with a "raising/investment" curve (primary blue stroke) -->
						<path d="M16 23c0-3.5 3-5.5 6-6" fill="none" stroke="#1472ba" stroke-width="2" stroke-linecap="round"/>
						<!-- Optional: subtle shadow under arrow for dimension -->
						<ellipse cx="16" cy="25.7" rx="5" ry="1" fill="#f5f5f5" opacity="0.9"/>
					</svg>
				</div>

				<span class="sl-code-conduct-features__label">
					<?php esc_html_e( 'Branding', 'akaza-adventure' ); ?>
				</span>

			</article>

			<!-- 05 -->
			<article class="sl-code-conduct-features__card">

				<div class="sl-code-conduct-features__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img" focusable="false">
						<circle cx="16" cy="16" r="10" />
						<path d="m12 16 3 3 6-7" />
						<path d="M11 7 9 4M21 7l2-3M8 20l-3 2M24 20l3 2" />
					</svg>
				</div>

				<span class="sl-code-conduct-features__label">
					<?php esc_html_e( 'Certificates', 'akaza-adventure' ); ?>
				</span>

			</article>

			<!-- 06 -->
			<article class="sl-code-conduct-features__card">

				<div class="sl-code-conduct-features__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img" focusable="false">
						<rect x="7" y="5" width="18" height="22" rx="2" />
						<path d="M11 10h10M11 14h6M11 19h7" />
						<path d="m21 18 3 3-5 5-3-3 5-5Z" />
					</svg>
				</div>

				<span class="sl-code-conduct-features__label">
					<?php esc_html_e( 'Assessments', 'akaza-adventure' ); ?>
				</span>

			</article>

			<!-- 07 -->
			<article class="sl-code-conduct-features__card">

				<div class="sl-code-conduct-features__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img" focusable="false">
						<rect x="5" y="9" width="15" height="11" rx="1" />
						<path d="M9 24h7M12.5 20v4" />
						<rect x="21" y="5" width="6" height="10" rx="1" />
						<path d="M24 15v3M22 18h4" />
					</svg>
				</div>

				<span class="sl-code-conduct-features__label">
					<?php esc_html_e( 'Mobile Responsive', 'akaza-adventure' ); ?>
				</span>

			</article>

			<!-- 08 -->
			<article class="sl-code-conduct-features__card">

				<div class="sl-code-conduct-features__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img" focusable="false">
						<rect x="6" y="5" width="20" height="22" rx="2" />
						<path d="M10 21v-5M14 21v-8M18 21v-3M22 21v-11" />
						<path d="M10 10h6" />
					</svg>
				</div>

				<span class="sl-code-conduct-features__label">
					<?php esc_html_e( 'Reporting', 'akaza-adventure' ); ?>
				</span>

			</article>

		</div>

	</div>
</section>