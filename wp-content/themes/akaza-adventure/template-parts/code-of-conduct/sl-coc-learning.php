<?php
/**
 * Code of Conduct — Learning Experience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sl-coc-learning" aria-labelledby="sl-coc-learning-title">
	<div class="container">

		<div class="sl-coc-learning__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Experience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-learning-title">
				<?php
				echo wp_kses(
					__( 'Designed for <span>Engagement.</span> Built for Compliance.', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Create a learning experience that keeps employees engaged while helping your organisation build stronger understanding of Code of Conduct requirements.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-coc-learning__grid">

			<article class="sl-coc-learning__card">

				<div class="sl-coc-learning__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img">
						<path d="M16 4c-4.4 0-8 3.3-8 7.5 0 2.7 1.5 4.7 3.3 6.2.9.8 1.5 1.8 1.5 3V22h6.4v-1.3c0-1.2.6-2.2 1.5-3 1.8-1.5 3.3-3.5 3.3-6.2C24 7.3 20.4 4 16 4Z" />
						<path d="M13 25h6M14 28h4" />
					</svg>
				</div>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Scenario-Based Learning', 'akaza-adventure' ); ?>
				</h3>

				<p>
					<?php esc_html_e( 'Bring workplace ethics to life through realistic situations and decision-making exercises.', 'akaza-adventure' ); ?>
				</p>

			</article>

			<article class="sl-coc-learning__card">

				<div class="sl-coc-learning__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img">
						<circle cx="16" cy="9" r="4" />
						<path d="M8 27c.5-5.3 3.2-8 8-8s7.5 2.7 8 8" />
						<circle cx="24.5" cy="7" r="2" />
					</svg>
				</div>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Interactive Knowledge Checks', 'akaza-adventure' ); ?>
				</h3>

				<p>
					<?php esc_html_e( 'Reinforce important concepts throughout the learning journey.', 'akaza-adventure' ); ?>
				</p>

			</article>

			<article class="sl-coc-learning__card">

				<div class="sl-coc-learning__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img">
						<rect x="8" y="5" width="16" height="22" rx="2" />
						<path d="M12 10h8M12 14h8M12 19h5" />
					</svg>
				</div>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Assessments', 'akaza-adventure' ); ?>
				</h3>

				<p>
					<?php esc_html_e( 'Measure employee understanding and define completion criteria based on your requirements.', 'akaza-adventure' ); ?>
				</p>

			</article>

			<article class="sl-coc-learning__card">

				<div class="sl-coc-learning__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img">
						<path d="M5 12 16 7l11 5-11 5L5 12Z" />
						<path d="M9 14v6c3 2.5 11 2.5 14 0v-6" />
						<path d="M27 13v6" />
						<path d="M25.5 21.5h3" />
					</svg>
				</div>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Gamified Learning', 'akaza-adventure' ); ?>
				</h3>

				<p>
					<?php esc_html_e( 'Use interactive learning elements to make mandatory training more engaging.', 'akaza-adventure' ); ?>
				</p>

			</article>

			<article class="sl-coc-learning__card">

				<div class="sl-coc-learning__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img">
						<rect x="5" y="8" width="17" height="12" rx="1.5" />
						<path d="M9 24h9M13.5 20v4" />
						<rect x="23" y="5" width="5" height="11" rx="1" />
					</svg>
				</div>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Mobile-Responsive Learning', 'akaza-adventure' ); ?>
				</h3>

				<p>
					<?php esc_html_e( 'Allow employees to complete training across supported devices.', 'akaza-adventure' ); ?>
				</p>

			</article>

			<article class="sl-coc-learning__card">

				<div class="sl-coc-learning__icon" aria-hidden="true">
					<svg viewBox="0 0 32 32" role="img">
						<circle cx="16" cy="13" r="6" />
						<path d="M12 19v8l4-2 4 2v-8" />
						<path d="m13.5 13 1.5 1.5 3.5-3.5" />
					</svg>
				</div>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Completion Certificates', 'akaza-adventure' ); ?>
				</h3>

				<p>
					<?php esc_html_e( 'Provide certificates upon successful course completion where required.', 'akaza-adventure' ); ?>
				</p>

			</article>

		</div>

	</div>
</section>