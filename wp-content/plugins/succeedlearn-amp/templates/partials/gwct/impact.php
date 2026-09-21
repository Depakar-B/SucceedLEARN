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
			<span class="sl-eyebrow"><?php esc_html_e( 'Lasting impact', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Learning That Creates Lasting <span>Workplace Impact</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<ul class="sl-list sl-gwct-points">
				<?php foreach ( $impact_themes as $theme ) : ?>
					<li class="sl-list-item">
						<?php
						if ( ! empty( $theme['icon'] ) ) {
							succeedlearn_amp_gwct_render_point_icon( $theme['icon'] );
						}
						?>
						<span class="sl-list-item__text">
							<strong><?php echo esc_html( $theme['highlight'] ); ?></strong>
							<?php echo esc_html( ' ' . $theme['text'] ); ?>
						</span>
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
			<div class="sl-gwct-dashboard-wrap">
				<div class="sl-gwct-dashboard">
					<div class="sl-gwct-dashboard__top">
						<span class="sl-gwct-dashboard__dot" aria-hidden="true"></span>
						<span class="sl-gwct-dashboard__dot" aria-hidden="true"></span>
						<span class="sl-gwct-dashboard__dot" aria-hidden="true"></span>
						<span class="sl-gwct-dashboard__top-title">
							<?php esc_html_e( 'Workplace Impact Dashboard', 'succeedlearn-amp' ); ?>
						</span>
					</div>

					<div class="sl-gwct-dashboard__body">
						<div class="sl-gwct-dashboard__head">
							<?php succeedlearn_amp_gwct_render_icon( 'activity', 'sl-gwct-dashboard__icon' ); ?>
							<div>
								<p class="sl-gwct-dashboard__label">
									<?php esc_html_e( 'Lasting Workplace Impact', 'succeedlearn-amp' ); ?>
								</p>
								<h3 class="sl-gwct-dashboard__title">
									<?php esc_html_e( 'Culture, Trust & Inclusion', 'succeedlearn-amp' ); ?>
								</h3>
								<div class="sl-gwct-dashboard__tags">
									<span><?php esc_html_e( 'Culture', 'succeedlearn-amp' ); ?></span>
									<span><?php esc_html_e( 'Trust', 'succeedlearn-amp' ); ?></span>
									<span><?php esc_html_e( 'Inclusion', 'succeedlearn-amp' ); ?></span>
								</div>
							</div>
						</div>

						<div class="sl-gwct-dashboard__progress">
							<div class="sl-gwct-dashboard__meta">
								<span><?php esc_html_e( 'Lasting impact score', 'succeedlearn-amp' ); ?></span>
								<strong>94%</strong>
							</div>
							<div class="sl-gwct-dashboard__bar" role="presentation"><span style="width:94%"></span></div>
							<p class="sl-gwct-dashboard__note">
								<strong><?php esc_html_e( 'Beyond compliance', 'succeedlearn-amp' ); ?></strong>
								<?php esc_html_e( ' · Stronger relationships · Better decisions · Healthier workplaces', 'succeedlearn-amp' ); ?>
							</p>
						</div>

						<div class="sl-gwct-dashboard__items">
							<?php foreach ( $impact_themes as $theme ) : ?>
								<?php
								$item_class = 'sl-gwct-dashboard__item';
								if ( empty( $theme['done'] ) ) {
									$item_class .= ' is-pending';
								}
								?>
								<div class="<?php echo esc_attr( $item_class ); ?>">
									<?php
									if ( ! empty( $theme['icon'] ) ) {
										succeedlearn_amp_gwct_render_icon( $theme['icon'], 'sl-gwct-dashboard__item-icon' );
									}
									?>
									<div class="sl-gwct-dashboard__item-copy">
										<strong>
											<span class="sl-gwct-dashboard__item-highlight"><?php echo esc_html( $theme['highlight'] ); ?></span>
											<span class="sl-gwct-dashboard__item-title"><?php echo esc_html( $theme['dashboard_title'] ); ?></span>
										</strong>
										<small><?php echo esc_html( $theme['dashboard_meta'] ); ?></small>
									</div>
									<span class="sl-gwct-dashboard__item-value" aria-hidden="true">
										<?php echo esc_html( $theme['dashboard_value'] ); ?>
									</span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

				<div class="sl-gwct-dashboard__float">
					<?php succeedlearn_amp_gwct_render_icon( 'stars', 'sl-gwct-dashboard__float-icon' ); ?>
					<div>
						<strong><?php esc_html_e( 'SucceedLEARN', 'succeedlearn-amp' ); ?></strong>
						<small><?php esc_html_e( 'Lasting impact', 'succeedlearn-amp' ); ?></small>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
