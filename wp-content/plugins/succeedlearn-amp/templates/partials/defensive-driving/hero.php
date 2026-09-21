<?php
/**
 * Defensive Driving AMP — Hero section.
 *
 * Expected vars: $course_stats, $course_features
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-dd-hero">
	<div class="sl-dd-hero__bg" aria-hidden="true"></div>
	<div class="sl-dd-hero__overlay" aria-hidden="true"></div>
	<div class="sl-wrap sl-dd-hero__grid">
		<div class="sl-dd-hero__content">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( __( 'Online Defensive Driving Training for Employees', 'succeedlearn-amp' ) );
			}
			?>
			<p class="sl-dd-hero__eyebrow"><?php esc_html_e( 'Workplace Health & Safety eLearning', 'succeedlearn-amp' ); ?></p>
			<h1 class="sl-dd-hero__title">
				<?php esc_html_e( 'Online Defensive Driving', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Training for Employees', 'succeedlearn-amp' ); ?></span>
			</h1>
			<p class="sl-dd-hero__desc"><?php esc_html_e( 'Help employees anticipate road hazards, make safer decisions and prevent avoidable collisions-with interactive, globally adaptable eLearning built for people who drive for work.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-dd-hero__meta">
				<li><?php esc_html_e( '8 modules', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( '100% online learning', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( 'Globally adaptable', 'succeedlearn-amp' ); ?></li>
			</ul>
			<div class="sl-dd-hero__actions">
				<div class="sl-dd-hero__cta-group">
					<span class="sl-dd-hero__cta-label"><?php esc_html_e( 'For Enterprise', 'succeedlearn-amp' ); ?></span>
					<button type="button" class="sl-btn sl-btn--primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?></button>
				</div>
			</div>
		</div>
		<aside class="sl-dd-course-card" aria-label="<?php esc_attr_e( 'Course overview', 'succeedlearn-amp' ); ?>">
			<span class="sl-dd-course-card__badge"><?php esc_html_e( 'Interactive eLearning', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-dd-course-card__title"><?php esc_html_e( 'Defensive Driving Essentials', 'succeedlearn-amp' ); ?></h2>
			<p class="sl-dd-course-card__desc"><?php esc_html_e( 'Practical awareness for safer journeys-before, during and after driving.', 'succeedlearn-amp' ); ?></p>
			<ul class="sl-dd-course-card__stats">
				<?php foreach ( $course_stats as $stat ) : ?>
					<li>
						<strong><?php echo esc_html( $stat['value'] ); ?></strong>
						<span><?php echo esc_html( $stat['label'] ); ?></span>
					</li>
				<?php endforeach; ?>
			</ul>
			<ul class="sl-dd-course-card__features">
				<?php foreach ( $course_features as $feature ) : ?>
					<li><?php echo esc_html( $feature ); ?></li>
				<?php endforeach; ?>
			</ul>
		</aside>
	</div>
</section>
