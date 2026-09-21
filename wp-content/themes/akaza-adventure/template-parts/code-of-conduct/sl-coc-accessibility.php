<?php
/**
 * Code of Conduct — Accessibility.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sl-coc-accessibility" aria-labelledby="sl-coc-accessibility-title">
	<div class="container">

		<div class="sl-coc-accessibility__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Accessibility', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-accessibility-title">
				<?php
				echo wp_kses(
					__( 'Designed for <span>Today’s Workforce</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Code of Conduct training may need to reach employees across roles, locations, languages and devices.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-coc-accessibility__content">

			<h3>
				<?php esc_html_e( 'SucceedLEARN supports flexible enterprise deployment through:', 'akaza-adventure' ); ?>
			</h3>

			<div class="sl-coc-accessibility__features">

				<span class="sl-coc-accessibility__feature">
					<?php esc_html_e( 'Mobile-Responsive Learning', 'akaza-adventure' ); ?>
				</span>

				<span class="sl-coc-accessibility__feature">
					<?php esc_html_e( 'Multilingual Delivery', 'akaza-adventure' ); ?>
				</span>

				<span class="sl-coc-accessibility__feature">
					<?php esc_html_e( 'Accessibility-Focused Course Design', 'akaza-adventure' ); ?>
				</span>

				<span class="sl-coc-accessibility__feature">
					<?php esc_html_e( 'LMS Integration', 'akaza-adventure' ); ?>
				</span>

				<span class="sl-coc-accessibility__feature">
					<?php esc_html_e( 'Hosted Deployment Options', 'akaza-adventure' ); ?>
				</span>

			</div>

			<div class="sl-coc-section-close">
				<p class="sl-coc-section-close__text">
					<?php esc_html_e( 'Where applicable, courses can be designed to support WCAG accessibility requirements.', 'akaza-adventure' ); ?>
				</p>
			</div>

		</div>

	</div>
</section>