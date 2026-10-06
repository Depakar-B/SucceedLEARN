<?php
/**
 * S-Aware AMP — Learning cards (replaces desktop orbit/circle UI).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = succeedlearn_amp_get_sa_learning_cards();
?>
<section class="sl-saware-learning" aria-labelledby="sl-saware-learning-title">
	<div class="sl-wrap">
		<div class="sl-saware-learning__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'How Employees Learn', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-saware-learning-title" class="sl-h2">
				<?php esc_html_e( 'Designed Around How Employees', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Actually Learn', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Effective security awareness goes beyond policy documents, lengthy presentations and information-heavy courses. Employees retain knowledge better when they experience realistic situations, make decisions, receive immediate feedback, and revisit concepts regularly.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'S-Aware combines these learning principles to create awareness programmes that are engaging, measurable, and applicable to everyday work.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-saware-learning__cards">
			<?php foreach ( $cards as $index => $card ) : ?>
				<article class="sl-saware-learning__card">
					<span class="sl-saware-learning__number" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
