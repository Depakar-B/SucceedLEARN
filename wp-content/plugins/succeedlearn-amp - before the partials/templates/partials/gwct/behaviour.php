<?php
/**
 * GWCT AMP — Behaviour / learning dashboard section.
 *
 * Expected vars: $behaviour_modules
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section">
	<div class="sl-wrap sl-gwct-split">
		<div class="sl-gwct-split__visual">
			<div class="sl-gwct-dashboard">
				<div class="sl-gwct-dashboard__head">
					<span class="sl-gwct-dashboard__icon" aria-hidden="true">L</span>
					<div>
						<p class="sl-gwct-dashboard__label"><?php esc_html_e( 'Workplace Compliance', 'succeedlearn-amp' ); ?></p>
						<h3 class="sl-gwct-dashboard__title"><?php esc_html_e( 'Employee Learning Progress', 'succeedlearn-amp' ); ?></h3>
					</div>
				</div>
				<div class="sl-gwct-dashboard__meta">
					<span><?php esc_html_e( 'Overall completion', 'succeedlearn-amp' ); ?></span>
					<strong>87%</strong>
				</div>
				<div class="sl-gwct-dashboard__bar" role="presentation"><span style="width:87%"></span></div>
				<p class="sl-gwct-dashboard__meta"><?php esc_html_e( '1,248 employees trained across 6 global modules', 'succeedlearn-amp' ); ?></p>
				<div class="sl-gwct-dashboard__items">
					<?php foreach ( $behaviour_modules as $module ) : ?>
						<div class="sl-gwct-dashboard__item<?php echo empty( $module['done'] ) ? ' is-pending' : ''; ?>">
							<span aria-hidden="true">●</span>
							<div>
								<strong><?php echo esc_html( $module['title'] ); ?></strong>
								<small><?php echo esc_html( $module['meta'] ); ?></small>
							</div>
							<span aria-hidden="true"><?php echo ! empty( $module['done'] ) ? '✓' : '…'; ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="sl-gwct-split__content">
			<h2 class="sl-h2"><?php esc_html_e( 'More Than Compliance. Learning That Changes Workplace Behaviour', 'succeedlearn-amp' ); ?></h2>
			<ul class="sl-gwct-points">
				<li><?php esc_html_e( 'Policies establish expectations.', 'succeedlearn-amp' ); ?></li>
				<li><?php esc_html_e( 'People shape workplace culture.', 'succeedlearn-amp' ); ?></li>
			</ul>
			<p class="sl-lead"><?php esc_html_e( 'Effective workplace learning goes beyond checking compliance boxes. It empowers employees to make better decisions, build stronger relationships, and contribute to workplaces where everyone feels respected, valued, and able to succeed.', 'succeedlearn-amp' ); ?></p>
			<p class="sl-lead"><?php esc_html_e( 'SucceedLEARN combines storytelling, realistic workplace scenarios, interactive decision-making, and globally relevant content to help learners confidently apply what they’ve learned in everyday workplace situations.', 'succeedlearn-amp' ); ?></p>
		</div>
	</div>
</section>
