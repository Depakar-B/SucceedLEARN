<?php
/**
 * Gifts and Entertainment AMP: Decision-Making.
 *
 * Expected vars: $decision_consider, $decision_avoid
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="decisions" class="sl-section sl-section--alt sl-aml-pe-vc-decisions" aria-labelledby="sl-gifts-decisions-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Practical Compliance Decisions', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-gifts-decisions-title" class="sl-h2">
				<?php esc_html_e( 'Gifts and Entertainment Decision-Making', 'succeedlearn-amp' ); ?>
			</h2>

			<p>
				<?php esc_html_e( 'The course gives learners a practical framework for assessing purpose, value, timing, transparency and the surrounding business relationship.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-cards sl-aml-cards--split">
			<article class="sl-aml-card">
				<h3 class="sl-panel-title"><?php esc_html_e( 'Consider before proceeding', 'succeedlearn-amp' ); ?></h3>
				<ul class="sl-list" role="list">
					<?php foreach ( $decision_consider as $line ) : ?>
						<li class="sl-list-item">
							<span class="sl-aml-check" aria-hidden="true">✓</span>
							<span class="sl-list-item__text"><?php echo esc_html( $line ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</article>

			<article class="sl-aml-card sl-aml-card--warn">
				<h3 class="sl-panel-title"><?php esc_html_e( 'Situations that should not proceed', 'succeedlearn-amp' ); ?></h3>
				<ul class="sl-list" role="list">
					<?php foreach ( $decision_avoid as $line ) : ?>
						<li class="sl-list-item">
							<span class="sl-aml-check sl-aml-check--warn" aria-hidden="true">✕</span>
							<span class="sl-list-item__text"><?php echo esc_html( $line ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</article>
		</div>
	</div>
</section>
