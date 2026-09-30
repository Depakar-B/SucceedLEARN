<?php
/**
 * SOC 2 AMP — What will employees learn.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learn_items = succeedlearn_amp_get_soc2_learn_items();
?>
<section
	class="sl-soc2-learn"
	id="what-will-employees-learn"
	aria-labelledby="sl-soc2-learn-title"
>
	<div class="sl-wrap">
		<div class="sl-soc2-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-soc2-learn-title" class="sl-h2">
				<?php esc_html_e( 'What Will Employees', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Learn?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'By completing the training, employees will be better equipped to:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-soc2-learn__list">
			<?php foreach ( $learn_items as $item ) : ?>
				<li><?php echo esc_html( $item ); ?></li>
			<?php endforeach; ?>
		</ul>

		<p class="sl-soc2-learn__note">
			<?php esc_html_e( 'The objective is not to make employees SOC 2 specialists. It is to help them understand the security behaviours that can support the organisation’s information security controls and SOC 2 readiness.', 'succeedlearn-amp' ); ?>
		</p>
	</div>
</section>
