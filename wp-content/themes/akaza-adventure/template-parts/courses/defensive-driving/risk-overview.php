<?php
/**
 * SucceedLEARN Defensive Driving — Course Risk Overview.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-course-risk">
	<div class="sl-course-risk__container">
		<div class="sl-course-risk__intro">
			<span class="sl-course-risk__eyebrow">
				<?php esc_html_e( 'Safety Beyond the Workplace Gate', 'akaza-adventure' ); ?>
			</span>

			<h2 class="sl-course-risk__title">
				<span class="sl-course-risk__title-main">
					<?php esc_html_e( 'Driving for work is work.', 'akaza-adventure' ); ?>
				</span>
				<span class="sl-course-risk__title-highlight">
					<?php esc_html_e( 'Manage the risk.', 'akaza-adventure' ); ?>
				</span>
			</h2>

			<div class="sl-course-risk__description">
				<p>
					<?php esc_html_e( 'Employees drive to meet customers, make deliveries, travel between sites and complete everyday business tasks. Each journey can expose the employee, the public and the organisation to risk.', 'akaza-adventure' ); ?>
					<?php esc_html_e( 'Defensive driving training goes beyond traffic rules. It builds a proactive mindset: observe earlier, anticipate mistakes, preserve time and space, and choose the safest response.', 'akaza-adventure' ); ?>
				</p>
			</div>
		</div>

		<div class="sl-course-risk__grid">
			<article class="sl-course-risk-card">
				<div class="sl-course-risk-card__icon">◎</div>
				<h3 class="sl-course-risk-card__title"><?php esc_html_e( 'Hazard perception', 'akaza-adventure' ); ?></h3>
				<p class="sl-course-risk-card__text"><?php esc_html_e( 'Scan ahead, anticipate developing risks and preserve a safe escape route.', 'akaza-adventure' ); ?></p>
			</article>

			<article class="sl-course-risk-card">
				<div class="sl-course-risk-card__icon">▣</div>
				<h3 class="sl-course-risk-card__title"><?php esc_html_e( 'Distracted driving', 'akaza-adventure' ); ?></h3>
				<p class="sl-course-risk-card__text"><?php esc_html_e( 'Manage mobile phones, navigation systems and cognitive distraction.', 'akaza-adventure' ); ?></p>
			</article>

			<article class="sl-course-risk-card">
				<div class="sl-course-risk-card__icon">◐</div>
				<h3 class="sl-course-risk-card__title"><?php esc_html_e( 'Fatigue & impairment', 'akaza-adventure' ); ?></h3>
				<p class="sl-course-risk-card__text"><?php esc_html_e( 'Recognise reduced fitness to drive and choose the safe response.', 'akaza-adventure' ); ?></p>
			</article>

			<article class="sl-course-risk-card">
				<div class="sl-course-risk-card__icon">☂</div>
				<h3 class="sl-course-risk-card__title"><?php esc_html_e( 'Weather & visibility', 'akaza-adventure' ); ?></h3>
				<p class="sl-course-risk-card__text"><?php esc_html_e( 'Adapt speed, space and vehicle control to changing conditions.', 'akaza-adventure' ); ?></p>
			</article>

			<article class="sl-course-risk-card">
				<div class="sl-course-risk-card__icon">◇</div>
				<h3 class="sl-course-risk-card__title"><?php esc_html_e( 'Blind spots & spacing', 'akaza-adventure' ); ?></h3>
				<p class="sl-course-risk-card__text"><?php esc_html_e( 'Maintain safe following distance and avoid high-risk vehicle zones.', 'akaza-adventure' ); ?></p>
			</article>

			<article class="sl-course-risk-card">
				<div class="sl-course-risk-card__icon">✓</div>
				<h3 class="sl-course-risk-card__title"><?php esc_html_e( 'Collision prevention', 'akaza-adventure' ); ?></h3>
				<p class="sl-course-risk-card__text"><?php esc_html_e( 'Apply calm, preventive decisions before a situation becomes critical.', 'akaza-adventure' ); ?></p>
			</article>
		</div>
	</div>
</section>
