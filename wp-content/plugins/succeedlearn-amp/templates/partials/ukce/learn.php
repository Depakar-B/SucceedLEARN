<?php
/**
 * UK Cyber Essentials AMP — What will employees learn.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learn_items = succeedlearn_amp_get_ukce_learn_items();
?>
<section
	class="sl-ukce-learn"
	id="what-will-employees-learn"
	aria-labelledby="sl-ukce-learn-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-ukce-learn-title" class="sl-h2">
				<?php esc_html_e( 'What Will Employees', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Learn?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Through the training, employees can build practical awareness around security behaviours relevant to the Cyber Essentials environment.', 'succeedlearn-amp' ); ?>
			</p>

			<p class="sl-ukce-learn__lead">
				<?php esc_html_e( 'Learners will be equipped to:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-ukce-learn__list">
			<?php foreach ( $learn_items as $item ) : ?>
				<li><?php echo esc_html( $item ); ?></li>
			<?php endforeach; ?>
		</ul>

		<div class="sl-ukce-learn__note">
			<p>
				<?php esc_html_e( 'The aim is not to make employees responsible for implementing Cyber Essentials technical controls. It is to help them understand the secure behaviours that complement those controls.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
