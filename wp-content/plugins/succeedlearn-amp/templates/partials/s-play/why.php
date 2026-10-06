<?php
/**
 * S-Play AMP — Why Gamified Security Awareness Matters.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_items = function_exists( 'succeedlearn_amp_get_sp_why_items' )
	? succeedlearn_amp_get_sp_why_items()
	: array();
?>
<section class="sl-s-play-why" aria-labelledby="sl-s-play-why-title">
	<div class="sl-wrap">
		<div class="sl-s-play-why__content">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Engagement That Lasts', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-play-why-title" class="sl-h2">
				<?php esc_html_e( 'Why Gamified Security', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Awareness Matters', 'succeedlearn-amp' ); ?></span>
			</h2>
			<h3 class="sl-s-play-why__subtitle">
				<?php esc_html_e( 'Move Employees From Passive Learning to Active Participation', 'succeedlearn-amp' ); ?>
			</h3>
			<div class="sl-s-play-why__copy">
				<p><?php esc_html_e( 'Creating security awareness is only the beginning. Employees also need opportunities to apply what they know.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( "They are expected to recognise suspicious communications, protect information, make secure decisions and respond appropriately when something doesn't look right. When awareness relies entirely on passive learning, important concepts can become easier to forget.", 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Gamified cybersecurity training introduces a more active learning experience.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Instead of only reading or watching security content, employees interact with challenges, answer questions, solve problems and make decisions based on cybersecurity scenarios.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'This creates opportunities to:', 'succeedlearn-amp' ); ?></p>
				<?php if ( ! empty( $why_items ) ) : ?>
					<ul class="sl-list sl-s-play-why__list">
						<?php foreach ( $why_items as $item ) : ?>
							<li class="sl-list-item"><span aria-hidden="true">✓</span> <?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<p><?php esc_html_e( "The objective isn't to turn cybersecurity into entertainment. It is to use game-based learning to make security awareness more participative, memorable and practical.", 'succeedlearn-amp' ); ?></p>
			</div>
		</div>
	</div>
</section>
