<?php
/**
 * PE/VC Suite AMP — Course suite grid.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $courses ) || ! is_array( $courses ) ) {
	$courses = succeedlearn_amp_get_pevc_courses();
}
if ( empty( $fcp_course ) || ! is_array( $fcp_course ) ) {
	$fcp_course = succeedlearn_amp_get_pevc_fcp_course();
}
?>
<section id="courses" class="sl-pevc-suite" aria-labelledby="sl-pevc-suite-title">
	<div class="sl-wrap">
		<div class="sl-pevc-suite__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'The PE/VC Compliance Suite', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-pevc-suite-title" class="sl-h2">
				<?php esc_html_e( 'Online PE and VC Compliance', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Training for Employees', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p class="sl-pevc-suite__lead">
				<?php
				esc_html_e(
					'A connected compliance learning suite covering regulatory, financial-crime, information-security and workplace risks across PE and VC firms.',
					'succeedlearn-amp'
				);
				?>
			</p>

			<aside class="sl-pevc-suite__offer">
				<span class="sl-pevc-suite__offer-label">
					<?php esc_html_e( 'Complete PE/VC Suite', 'succeedlearn-amp' ); ?>
				</span>
				<div class="sl-pevc-suite__offer-price">
					<?php esc_html_e( '$2 per user / month', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Billed annually at $24 per user', 'succeedlearn-amp' ); ?></span>
				</div>
				<button
					type="button"
					class="sl-content-btn sl-content-btn-primary"
					data-cta="suite-demo"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
				</button>
			</aside>
		</div>

		<div class="sl-pevc-suite__grid">
			<?php foreach ( $courses as $course ) : ?>
				<article class="sl-pevc-suite__card">
					<span class="sl-pevc-suite__number" aria-hidden="true">
						<?php echo esc_html( $course['num'] ); ?>
					</span>
					<h3 class="sl-panel-title"><?php echo esc_html( $course['title'] ); ?></h3>
					<p><?php echo esc_html( $course['text'] ); ?></p>
					<a class="sl-pevc-suite__explore" href="<?php echo esc_url( $course['href'] ); ?>">
						<?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?>
					</a>
				</article>
			<?php endforeach; ?>

			<article class="sl-pevc-suite__card sl-pevc-suite__card--fcp">
				<span class="sl-pevc-suite__number" aria-hidden="true">
					<?php echo esc_html( $fcp_course['num'] ); ?>
				</span>
				<h3 class="sl-panel-title"><?php echo esc_html( $fcp_course['title'] ); ?></h3>
				<p><?php echo esc_html( $fcp_course['text'] ); ?></p>
				<a class="sl-pevc-suite__explore" href="<?php echo esc_url( $fcp_course['href'] ); ?>">
					<?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?>
				</a>
			</article>
		</div>
	</div>
</section>
