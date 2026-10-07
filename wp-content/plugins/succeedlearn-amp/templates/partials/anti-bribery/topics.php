<?php
/**
 * Anti-Bribery AMP: Topics covered.
 *
 * Expected vars: $topics
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="topics" class="sl-section sl-aml-pe-vc-topics" aria-labelledby="sl-anti-bribery-topics-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Topics Covered', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-topics-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What bribery and corruption risks does ABAC <span>training cover?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'The course connects abstract rules to six familiar areas of work, helping employees identify warning signs before a decision becomes a breach.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $topics as $topic ) : ?>
				<li class="sl-aml-outcome-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $topic['num'] ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $topic['title'] ); ?></h3>
						<p><?php echo esc_html( $topic['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
