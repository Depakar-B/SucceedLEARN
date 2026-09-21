<?php
/**
 * GWCT AMP — Lasting workplace impact section.
 *
 * Expected vars: $impact_themes
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section">
	<div class="sl-wrap sl-gwct-split sl-gwct-split--reverse">
		<div class="sl-gwct-split__content">
			<h2 class="sl-h2"><?php esc_html_e( 'Learning That Creates Lasting Workplace Impact', 'succeedlearn-amp' ); ?></h2>
			<ul class="sl-gwct-points">
				<?php foreach ( $impact_themes as $theme ) : ?>
					<li>
						<strong><?php echo esc_html( $theme['highlight'] ); ?></strong>
						<?php echo esc_html( ' ' . $theme['text'] ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<p class="sl-lead"><?php esc_html_e( 'The most effective workplace learning does more than satisfy compliance requirements. It helps employees build stronger relationships, make better decisions, and contribute to healthier, more productive workplaces.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-gwct-callout">
				<strong><?php esc_html_e( 'That’s the difference', 'succeedlearn-amp' ); ?></strong>
				<?php esc_html_e( ' SucceedLEARN delivers.', 'succeedlearn-amp' ); ?>
			</div>
			<p style="margin-top:18px">
				<button type="button" class="sl-btn sl-btn--primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?></button>
			</p>
		</div>
		<div class="sl-gwct-split__visual">
			<div class="sl-gwct-dashboard">
				<div class="sl-gwct-dashboard__head">
					<span class="sl-gwct-dashboard__icon" aria-hidden="true">I</span>
					<div>
						<p class="sl-gwct-dashboard__label"><?php esc_html_e( 'Lasting Workplace Impact', 'succeedlearn-amp' ); ?></p>
						<h3 class="sl-gwct-dashboard__title"><?php esc_html_e( 'Culture, Trust & Inclusion', 'succeedlearn-amp' ); ?></h3>
					</div>
				</div>
				<div class="sl-gwct-dashboard__meta">
					<span><?php esc_html_e( 'Lasting impact score', 'succeedlearn-amp' ); ?></span>
					<strong>94%</strong>
				</div>
				<div class="sl-gwct-dashboard__bar" role="presentation"><span style="width:94%"></span></div>
				<div class="sl-gwct-dashboard__items">
					<?php foreach ( $impact_themes as $theme ) : ?>
						<div class="sl-gwct-dashboard__item">
							<span aria-hidden="true">●</span>
							<div>
								<strong><?php echo esc_html( $theme['highlight'] . ' ' . $theme['text'] ); ?></strong>
							</div>
							<span aria-hidden="true"><?php echo esc_html( $theme['value'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
