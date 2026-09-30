<?php
/**
 * BFSI & PE/VC AMP — What will employees learn?
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learn_items = succeedlearn_amp_get_bfsi_learn_items();
?>
<section
	class="sl-bfsi-learn"
	id="what-will-employees-learn"
	aria-labelledby="sl-bfsi-learn-title"
>
	<div class="sl-wrap">
		<div class="sl-bfsi-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-bfsi-learn-title" class="sl-h2">
				<?php esc_html_e( 'What Will Employees', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Learn?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p class="sl-bfsi-learn__lead">
				<?php esc_html_e( 'By the end of the BFSI & PE/VC Cybersecurity Awareness Training, learners will be better equipped to:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-bfsi-learn__list">
			<?php foreach ( $learn_items as $item ) : ?>
				<li><?php echo esc_html( $item ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
