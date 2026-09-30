<?php
/**
 * BFSI & PE/VC AMP — Course structure.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_elements = succeedlearn_amp_get_bfsi_learning_elements();
?>
<section
	class="sl-bfsi-structure"
	id="course-structure"
	aria-labelledby="sl-bfsi-structure-title"
>
	<div class="sl-wrap">
		<div class="sl-bfsi-structure__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'How the Course is Built', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-bfsi-structure-title" class="sl-h2">
				<?php esc_html_e( 'Course', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Structure', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<p class="sl-bfsi-structure__subhead">
			<?php esc_html_e( 'Learning Elements', 'succeedlearn-amp' ); ?>
		</p>

		<div class="sl-bfsi-structure__grid">
			<?php foreach ( $learning_elements as $element ) : ?>
				<article class="sl-bfsi-structure__card">
					<h3><?php echo esc_html( $element['title'] ); ?></h3>
					<p><?php echo esc_html( $element['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-bfsi-structure__details">
			<div class="sl-bfsi-structure__detail">
				<h3><?php esc_html_e( 'Format & Accessibility', 'succeedlearn-amp' ); ?></h3>
				<p><?php esc_html_e( 'Responsive learning across desktop, tablet and mobile devices.', 'succeedlearn-amp' ); ?></p>
			</div>

			<div class="sl-bfsi-structure__detail">
				<h3><?php esc_html_e( 'Certificate', 'succeedlearn-amp' ); ?></h3>
				<p><?php esc_html_e( 'On successful completion and assessment, learners can generate a completion certificate, configurable according to organisational requirements.', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>
	</div>
</section>
