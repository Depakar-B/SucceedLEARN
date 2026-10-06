<?php
/**
 * ISO 27001 AMP — What employees will learn.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learn_items = succeedlearn_amp_get_iso27001_learn_items();
?>
<section
	class="sl-iso27-learn"
	id="what-employees-will-learn"
	aria-labelledby="sl-iso27-learn-title"
>
	<div class="sl-wrap">
		<div class="sl-iso27-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-iso27-learn-title" class="sl-h2">
				<?php esc_html_e( 'What will', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Employees Learn?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'By the end of the ISO 27001:2022 Staff Awareness Training, learners should be able to:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-iso27-learn__list">
			<?php foreach ( $learn_items as $item ) : ?>
				<li><?php echo esc_html( $item ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
