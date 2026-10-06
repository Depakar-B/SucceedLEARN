<?php
/**
 * WHP AMP: What is workplace harassment prevention training?
 *
 * Expected vars: $questions
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="what-is-harassment-training" class="sl-section sl-section--alt sl-whp-training" aria-labelledby="sl-whp-training-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Practical Workplace Learning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-training-title" class="sl-h2">
				<?php esc_html_e( 'What is workplace harassment', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'prevention training?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<div class="sl-whp-copy">
				<p><?php esc_html_e( 'Workplace harassment prevention training teaches employees how to recognise inappropriate or potentially unlawful conduct, understand workplace boundaries, raise concerns and respond appropriately when they experience or witness problematic behaviour.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Effective training should help learners answer practical questions:', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>

		<ol class="sl-whp-questions" role="list">
			<?php foreach ( $questions as $index => $question ) : ?>
				<li class="sl-whp-questions__item">
					<span class="sl-whp-number" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<p><?php echo esc_html( $question ); ?></p>
				</li>
			<?php endforeach; ?>
		</ol>

		<div class="sl-highlight">
			<p><?php esc_html_e( 'SucceedLEARN turns these questions into practical learning through clear explanations, workplace examples, scenarios and knowledge checks appropriate to the selected course.', 'succeedlearn-amp' ); ?></p>
		</div>
	</div>
</section>
