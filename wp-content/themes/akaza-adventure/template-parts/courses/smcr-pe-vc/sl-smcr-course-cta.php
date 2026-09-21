<?php
/**
 * SMCR Training — Course CTA.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="course-cta"
	class="sl-smcr-course-cta"
	aria-labelledby="sl-smcr-course-cta-title"
>
	<div class="container">

		<div class="sl-smcr-course-cta__panel">

			<div class="sl-smcr-course-cta__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'SucceedLEARN SMCR Training', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-smcr-course-cta-title">
					<?php esc_html_e( 'Buy SMCR Training for Your UK Private Equity or Venture Capital', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Team', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Choose role-relevant learning for employees, Senior Managers or both audiences within your organisation.', 'akaza-adventure' ); ?>
				</p>

			</div>

			<div class="sl-smcr-course-cta__actions">

				<a
					class="sl-smcr-course-cta__button sl-smcr-course-cta__button--primary"
					href="#courses"
				>
					<?php esc_html_e( 'Explore the Course', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>

				<a
					class="sl-smcr-course-cta__button sl-smcr-course-cta__button--secondary"
					href="#enquiry"
				>
					<?php esc_html_e( 'Buy the Course', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>

			</div>

		</div>

	</div>
</section>