<?php
/**
 * ISAT AMP — What will employees learn.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learn_items = succeedlearn_amp_get_isat_learn_items();
?>
<section
	class="sl-isat-learn"
	id="what-will-employees-learn"
	aria-labelledby="sl-isat-learn-title"
>
	<div class="sl-wrap">
		<div class="sl-isat-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-isat-learn-title" class="sl-h2">
				<?php esc_html_e( 'What Will Employees', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Learn?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'By the end of the Information Security Awareness Training, employees will be able to:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-isat-learn__grid">
			<?php foreach ( $learn_items as $item ) : ?>
				<article class="sl-isat-learn__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
