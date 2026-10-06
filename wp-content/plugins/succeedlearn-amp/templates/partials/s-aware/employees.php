<?php
/**
 * S-Aware AMP — Workforce cards.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$groups = succeedlearn_amp_get_sa_employees();
?>
<section class="sl-saware-workforce" aria-labelledby="sl-saware-workforce-title">
	<div class="sl-wrap">
		<div class="sl-saware-workforce__heading">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Designed for Your Workforce', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-saware-workforce-title" class="sl-h2">
				<?php esc_html_e( 'Built for Every', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Employee', 'succeedlearn-amp' ); ?></span>
			</h2>
			<div class="sl-saware-workforce__intro">
				<p><?php esc_html_e( 'Cybersecurity affects everyone, but employees encounter risk in different ways depending on their roles, responsibilities and working environments.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'S-Aware is designed to make essential security knowledge understandable and relevant across the organisation.', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>
		<div class="sl-saware-workforce__grid">
			<?php foreach ( $groups as $index => $group ) : ?>
				<article class="sl-saware-workforce__card">
					<div class="sl-saware-workforce__card-title">
						<span class="sl-saware-workforce__number" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3 class="sl-panel-title"><?php echo esc_html( $group['title'] ); ?></h3>
					</div>
					<p><?php echo esc_html( $group['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
