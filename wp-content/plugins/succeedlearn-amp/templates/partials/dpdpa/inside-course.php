<?php
/**
 * DPDPA AMP - Inside the course.
 * Static card grid of desktop tab previews (image + category + caption).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$inside_uploads = 'https://succeedlearn.com/wp-content/uploads/2026/10/';

$items = array(
	array(
		'title'  => __( 'Animated lessons', 'succeedlearn-amp' ),
		'text'   => __( 'Reveal cards explain terms like Data Fiduciary in words employees remember.', 'succeedlearn-amp' ),
		'src'    => $inside_uploads . 'animated-lessons-screenshot.webp',
		'alt'    => __( 'Animated DPDPA lesson explaining personal data', 'succeedlearn-amp' ),
		'width'  => 1158,
		'height' => 648,
	),
	array(
		'title'  => __( 'Drag-and-drop', 'succeedlearn-amp' ),
		'text'   => __( 'Employees drag real examples into the right box, with instant feedback.', 'succeedlearn-amp' ),
		'src'    => $inside_uploads . 'drag-and-drop-screenshot.webp',
		'alt'    => __( 'Drag-and-drop activity: personal data or not', 'succeedlearn-amp' ),
		'width'  => 1158,
		'height' => 648,
	),
	array(
		'title'  => __( 'Scenario checks', 'succeedlearn-amp' ),
		'text'   => __( 'Real workplace moments, like the wrong attachment, and what to do next.', 'succeedlearn-amp' ),
		'src'    => $inside_uploads . 'scenario-checks-screenshot.webp',
		'alt'    => __( 'Scenario check with a workplace email decision', 'succeedlearn-amp' ),
		'width'  => 1158,
		'height' => 648,
	),
	array(
		'title'  => __( 'Verified certificate', 'succeedlearn-amp' ),
		'text'   => __( 'Pass the final check and a verified certificate is issued automatically.', 'succeedlearn-amp' ),
		'src'    => $inside_uploads . 'dpdpa-certificate.webp',
		'alt'    => __( 'Sample SucceedLEARN DPDPA course completion certificate', 'succeedlearn-amp' ),
		'width'  => 1052,
		'height' => 744,
	),
	array(
		'title'  => __( 'Admin reports', 'succeedlearn-amp' ),
		'text'   => __( 'Completion and scores by department, and who still needs a nudge. Illustrative data.', 'succeedlearn-amp' ),
		'src'    => $inside_uploads . 'admin-dashboard-screenshot.webp',
		'alt'    => __( 'Admin report dashboard with completion trend and assessment scores', 'succeedlearn-amp' ),
		'width'  => 1168,
		'height' => 688,
	),
);
?>
<section class="sl-section sl-dpdpa-inside-course" id="inside" aria-labelledby="sl-dpdpa-inside-title">
	<div class="sl-wrap">
		<header class="sl-dpdpa-section-head">
			<h2 id="sl-dpdpa-inside-title" class="sl-h2">
				<?php esc_html_e( 'See exactly what your employees ', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'will see', 'succeedlearn-amp' ); ?></span>
			</h2>
		</header>

		<div class="sl-dpdpa-inside-course__grid">
			<?php foreach ( $items as $item ) : ?>
				<article class="sl-dpdpa-inside-course__card">
					<div class="sl-dpdpa-inside-course__media">
						<amp-img
							src="<?php echo esc_url( $item['src'] ); ?>"
							width="<?php echo esc_attr( (string) $item['width'] ); ?>"
							height="<?php echo esc_attr( (string) $item['height'] ); ?>"
							layout="responsive"
							alt="<?php echo esc_attr( $item['alt'] ); ?>"
						></amp-img>
					</div>
					<div class="sl-dpdpa-inside-course__body">
						<h3 class="sl-dpdpa-inside-course__category"><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-dpdpa-section-actions">
			<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'book' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<?php esc_html_e( 'Request a course preview', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
