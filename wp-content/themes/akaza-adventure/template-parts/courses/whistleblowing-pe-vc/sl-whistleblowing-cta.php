<?php
/**
 * Whistleblowing Training — CTA Section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="buy"
	class="sl-whistleblowing-cta"
	aria-labelledby="sl-whistleblowing-cta-title"
>
	<div class="container">
		<div class="sl-whistleblowing-cta__inner">

			<div class="sl-whistleblowing-cta__content">
				<span class="sl-whistleblowing-cta__eyebrow">
					<?php esc_html_e( 'SucceedLEARN Whistleblowing Training', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-whistleblowing-cta-title">
					<?php esc_html_e( 'Are You Ready to Strengthen Speak-Up Awareness?', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php esc_html_e( 'Give your teams practical whistleblowing awareness built around the situations and conduct risks they may encounter.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<div class="sl-whistleblowing-cta__actions">
				<a
					class="sl-hero-btn sl-hero-btn-secondary"
					href="#contact"
				>
					<?php esc_html_e( 'Buy the Course', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</div>

		</div>
	</div>
</section>
