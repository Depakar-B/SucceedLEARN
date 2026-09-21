<?php
/**
 * Global Workplace Compliance Training for Employees — Lasting Workplace Impact section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$impact_themes = array(
	array(
		'icon'            => 'bi-diagram-3',
		'highlight'       => __( 'Every interaction', 'akaza-adventure' ),
		'text'            => __( 'shapes workplace culture.', 'akaza-adventure' ),
		'dashboard_title' => __( 'Workplace Culture', 'akaza-adventure' ),
		'dashboard_meta'  => __( 'Daily interactions build respectful habits', 'akaza-adventure' ),
		'dashboard_value' => '96%',
		'done'            => true,
	),
	array(
		'icon'            => 'bi-shield-check',
		'highlight'       => __( 'Every decision', 'akaza-adventure' ),
		'text'            => __( 'builds trust.', 'akaza-adventure' ),
		'dashboard_title' => __( 'Trust & Accountability', 'akaza-adventure' ),
		'dashboard_meta'  => __( 'Better decisions strengthen team confidence', 'akaza-adventure' ),
		'dashboard_value' => '93%',
		'done'            => true,
	),
	array(
		'icon'            => 'bi-chat-heart',
		'highlight'       => __( 'Every conversation', 'akaza-adventure' ),
		'text'            => __( 'creates opportunities for inclusion.', 'akaza-adventure' ),
		'dashboard_title' => __( 'Inclusion Opportunities', 'akaza-adventure' ),
		'dashboard_meta'  => __( 'Open dialogue supports belonging at work', 'akaza-adventure' ),
		'dashboard_value' => '91%',
		'done'            => false,
	),
);
?>
<section class="sl-global-impact-section">

	<div class="container">

		<div class="row align-items-center gy-5">

			<div class="col-lg-7 order-lg-1">

				<div class="sl-global-impact-content">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Lasting impact', 'akaza-adventure' ); ?>
					</span>

					<h2 class="sl-global-impact-title">
						<?php
						echo wp_kses(
							__( 'Learning That Creates Lasting <span>Workplace Impact</span>', 'akaza-adventure' ),
							array( 'span' => array() )
						);
						?>
					</h2>

					<ul class="sl-global-impact-points" role="list">
						<?php foreach ( $impact_themes as $index => $theme ) : ?>
							<li class="sl-global-impact-point">
								<span class="sl-global-impact-point__index" aria-hidden="true">
									<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
								</span>
								<div class="sl-global-impact-point__body">
									<span class="sl-global-impact-point__icon" aria-hidden="true">
										<i class="bi <?php echo esc_attr( $theme['icon'] ); ?>"></i>
									</span>
									<p class="sl-global-impact-point__text">
										<span class="sl-global-impact-point__highlight"><?php echo esc_html( $theme['highlight'] ); ?></span>
										<span class="sl-global-impact-point__rest"><?php echo esc_html( $theme['text'] ); ?></span>
									</p>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>

					<p class="sl-global-impact-description">
						<?php esc_html_e( 'The most effective workplace learning does more than satisfy compliance requirements. It helps employees build stronger relationships, make better decisions, and contribute to healthier, more productive workplaces.', 'akaza-adventure' ); ?>
					</p>

					<p class="sl-global-impact-description sl-global-impact-description--emphasis">
						<span class="sl-global-impact-description__highlight"><?php esc_html_e( 'That’s the difference', 'akaza-adventure' ); ?></span>
						<?php esc_html_e( ' SucceedLEARN delivers.', 'akaza-adventure' ); ?>
					</p>

					<div class="sl-global-impact-actions">
						<a href="#contact" class="sl-content-btn sl-content-btn-primary">
							<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						</a>
					</div>

				</div>

			</div>

			<div class="col-lg-5 order-lg-2">

				<div class="sl-global-behaviour-visual sl-global-impact-visual">

					<div class="sl-global-behaviour-visual-card">

						<div class="sl-global-behaviour-visual-top">
							<span class="sl-global-behaviour-dot"></span>
							<span class="sl-global-behaviour-dot"></span>
							<span class="sl-global-behaviour-dot"></span>
							<span class="sl-global-behaviour-visual-top-title">
								<?php esc_html_e( 'Workplace Impact Dashboard', 'akaza-adventure' ); ?>
							</span>
						</div>

						<div class="sl-global-behaviour-visual-body">

							<div class="sl-global-behaviour-dashboard-head">
								<div class="sl-global-behaviour-visual-icon" aria-hidden="true">
									<i class="bi bi-activity"></i>
								</div>

								<div>
									<p class="sl-global-behaviour-dashboard-label">
										<span class="sl-global-impact-dashboard__eyebrow"><?php esc_html_e( 'Lasting Workplace Impact', 'akaza-adventure' ); ?></span>
									</p>
									<h3 class="sl-global-behaviour-dashboard-title">
										<?php esc_html_e( 'Culture, Trust & Inclusion', 'akaza-adventure' ); ?>
									</h3>
									<div class="sl-global-impact-dashboard__tags">
										<span><?php esc_html_e( 'Culture', 'akaza-adventure' ); ?></span>
										<span><?php esc_html_e( 'Trust', 'akaza-adventure' ); ?></span>
										<span><?php esc_html_e( 'Inclusion', 'akaza-adventure' ); ?></span>
									</div>
								</div>
							</div>

							<div class="sl-global-behaviour-progress">
								<div class="sl-global-behaviour-progress__meta">
									<span><?php esc_html_e( 'Lasting impact score', 'akaza-adventure' ); ?></span>
									<strong>94%</strong>
								</div>
								<div class="sl-global-behaviour-progress__bar" role="presentation">
									<span style="width: 94%;"></span>
								</div>
								<p class="sl-global-behaviour-progress__note">
									<span class="sl-global-impact-dashboard__note-label"><?php esc_html_e( 'Beyond compliance', 'akaza-adventure' ); ?></span>
									<?php esc_html_e( ' · Stronger relationships · Better decisions · Healthier workplaces', 'akaza-adventure' ); ?>
								</p>
							</div>

							<div class="sl-global-behaviour-visual-items">
								<?php foreach ( $impact_themes as $theme ) : ?>
									<div class="sl-global-behaviour-visual-item<?php echo empty( $theme['done'] ) ? ' is-pending' : ''; ?>">
										<span class="sl-global-behaviour-visual-item__icon" aria-hidden="true">
											<i class="bi <?php echo esc_attr( $theme['icon'] ); ?>"></i>
										</span>
										<div class="sl-global-behaviour-visual-item__content">
											<strong>
												<span class="sl-global-impact-metric__highlight"><?php echo esc_html( $theme['highlight'] ); ?></span>
												<span class="sl-global-impact-metric__title"><?php echo esc_html( $theme['dashboard_title'] ); ?></span>
											</strong>
											<small>
												<span class="sl-global-impact-metric__meta"><?php echo esc_html( $theme['dashboard_meta'] ); ?></span>
											</small>
										</div>
										<span class="sl-global-behaviour-visual-item__status sl-global-impact-metric__value" aria-hidden="true">
											<?php echo esc_html( $theme['dashboard_value'] ); ?>
										</span>
									</div>
								<?php endforeach; ?>
							</div>

						</div>

					</div>

					<div class="sl-global-behaviour-floating-card sl-global-impact-floating-card">

						<span class="sl-global-behaviour-floating-icon" aria-hidden="true">
							<i class="bi bi-stars"></i>
						</span>

						<div>
							<strong><?php esc_html_e( 'SucceedLEARN', 'akaza-adventure' ); ?></strong>
							<small>
								<span class="sl-global-impact-floating__label"><?php esc_html_e( 'Lasting impact', 'akaza-adventure' ); ?></span>
							</small>
						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>
