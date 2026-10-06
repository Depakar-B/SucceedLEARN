<?php
/**
 * Generative AI AMP — What the course covers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $gai_topics ) || ! is_array( $gai_topics ) ) {
	$gai_topics = succeedlearn_amp_get_gai_topics();
}
?>
<section
	class="sl-gai-topics"
	id="course-topics"
	aria-labelledby="sl-gai-topics-title"
>
	<div class="sl-wrap">
		<div class="sl-gai-topics__heading">
			<h2 id="sl-gai-topics-title" class="sl-h2">
				<?php esc_html_e( 'What the', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'course covers', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course introduces the following topics:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-gai-topics__list">
			<?php foreach ( $gai_topics as $gai_topic ) : ?>
				<li class="sl-gai-topics__item">
					<?php echo esc_html( $gai_topic ); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
