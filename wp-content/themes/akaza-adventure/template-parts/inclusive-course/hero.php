<?php
/**
 * Inclusive course page — shared hero.
 *
 * Expects $args['course'] from get_template_part.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course = isset( $args['course'] ) && is_array( $args['course'] ) ? $args['course'] : array();
if ( empty( $course ) ) {
	return;
}

$title    = isset( $course['title'] ) ? (string) $course['title'] : '';
$subtitle = isset( $course['subtitle'] ) ? (string) $course['subtitle'] : '';
$tag      = isset( $course['tag'] ) ? (string) $course['tag'] : '';
$icon     = isset( $course['icon'] ) ? (string) $course['icon'] : 'bi-book';
$overview = isset( $course['overview'] ) && is_array( $course['overview'] ) ? $course['overview'] : array();
?>
<section class="sl-iwc-hero" aria-labelledby="sl-iwc-hero-title">
	<div class="container">
		<div class="sl-iwc-hero__grid">
			<div class="sl-iwc-hero__copy">
				<?php
				if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
					akaza_render_hero_breadcrumbs();
				}
				?>

				<span class="sl-home-sub-heading">
					<?php echo esc_html( $tag ? $tag : __( 'Inclusive Workplace', 'akaza-adventure' ) ); ?>
				</span>

				<h1 id="sl-iwc-hero-title"><?php echo esc_html( $title ); ?></h1>

				<?php if ( $subtitle ) : ?>
					<p class="sl-iwc-hero__lede"><?php echo esc_html( $subtitle ); ?></p>
				<?php endif; ?>

				<?php foreach ( array_slice( $overview, 0, 2 ) as $para ) : ?>
					<p><?php echo esc_html( $para ); ?></p>
				<?php endforeach; ?>

				<div class="sl-iwc-actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					</a>
					<a class="sl-hero-btn sl-hero-btn-secondary" href="#course-covers">
						<?php esc_html_e( 'See what the course covers', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>

			<aside class="sl-iwc-hero__panel" aria-hidden="true">
				<span class="sl-iwc-hero__panel-icon">
					<i class="bi <?php echo esc_attr( $icon ); ?>"></i>
				</span>
				<p class="sl-iwc-hero__panel-tag"><?php echo esc_html( $tag ); ?></p>
				<p class="sl-iwc-hero__panel-title"><?php echo esc_html( $title ); ?></p>
				<ul class="sl-iwc-hero__panel-list">
					<li><?php esc_html_e( 'Self-paced employee training', 'akaza-adventure' ); ?></li>
					<li><?php esc_html_e( 'Practical workplace scenarios', 'akaza-adventure' ); ?></li>
					<li><?php esc_html_e( 'Completion evidence for HR & compliance', 'akaza-adventure' ); ?></li>
				</ul>
			</aside>
		</div>
	</div>
</section>
