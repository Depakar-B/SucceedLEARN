<?php
/**
 * Generative AI AMP — Learning outcomes.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $gai_outcomes ) || ! is_array( $gai_outcomes ) ) {
	$gai_outcomes = succeedlearn_amp_get_gai_outcomes();
}
?>
<section
	class="sl-gai-outcomes"
	id="learning-outcomes"
	aria-labelledby="sl-gai-outcomes-title"
>
	<div class="sl-wrap">
		<div class="sl-gai-outcomes__heading">
			<h2 id="sl-gai-outcomes-title" class="sl-h2">
				<?php esc_html_e( 'Learning', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'outcomes', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'After completing the course, learners should be able to:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-gai-outcomes__list">
			<?php foreach ( $gai_outcomes as $gai_outcome ) : ?>
				<li class="sl-gai-outcomes__item">
					<?php echo esc_html( $gai_outcome ); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
