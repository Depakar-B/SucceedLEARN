<?php
/**
 * Security Awareness and Phishing — Stats section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="stats-section" aria-label="<?php esc_attr_e( 'Security awareness outcomes at a glance', 'akaza-adventure' ); ?>">
	<div class="container">

		<div class="row">

			<div class="col-6 col-lg-3 stat-item">
				<strong class="counter" data-target="1000">1000</strong><span>+</span>
				<p><?php esc_html_e( 'Organisations Trained', 'akaza-adventure' ); ?></p>
			</div>

			<div class="col-6 col-lg-3 stat-item">
				<strong class="counter" data-target="90">90</strong><span>%+</span>
				<p><?php esc_html_e( 'Training Completion', 'akaza-adventure' ); ?></p>
			</div>

			<div class="col-6 col-lg-3 stat-item">
				<strong class="counter" data-target="70">70</strong><span>%</span>
				<p><?php esc_html_e( 'Reduction in Phishing Risk', 'akaza-adventure' ); ?></p>
			</div>

			<div class="col-6 col-lg-3 stat-item">
				<strong class="counter" data-target="87">87</strong><span>%</span>
				<p><?php esc_html_e( 'Phishing Resilience', 'akaza-adventure' ); ?></p>
			</div>

		</div>

	</div>
</section>
