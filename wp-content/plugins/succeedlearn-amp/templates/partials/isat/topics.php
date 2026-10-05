<?php
/**
 * ISAT AMP — Topics covered.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topics = succeedlearn_amp_get_isat_topics();
?>
<section
	class="sl-isat-topics"
	id="information-security-topics-covered"
	aria-labelledby="sl-isat-topics-title"
>
	<div class="sl-wrap">
		<div class="sl-isat-topics__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Course Coverage', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-isat-topics-title" class="sl-h2">
				<?php esc_html_e( 'Information Security', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Topics Covered', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course covers essential information security risks and behaviors employees should understand when handling organizational systems, information, and digital tools.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-isat-topics__list">
			<?php foreach ( $topics as $topic ) : ?>
				<li class="sl-isat-topics__item"><?php echo esc_html( $topic ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
